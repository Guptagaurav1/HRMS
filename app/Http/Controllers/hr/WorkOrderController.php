<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Models\WoContactDetail;
use App\Models\Organization;
use App\Models\State;
use App\Models\City;
use App\Models\Project;
use App\Models\EmpSalarySlip;
use App\Models\EmpDetail;
use Throwable;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\ReportLog;
use App\Models\EmailHistory;
use PDF;
use App;
use stdClass;
use Mail;
use App\Mail\ReportMail;
use App\Models\User;
use Illuminate\Support\Facades\File;



class WorkOrderController extends Controller
{


    public function index(Request $request)
    {
        // Initialize WorkOrder query with eager loading for project and contacts
        // $totalWorkOrders = WorkOrder::with(['project.organizations', 'contacts' => function ($query) {
        //     $query->orderBy('id', 'desc');
        // }]);
        $totalWorkOrders = WorkOrder::select('id', 'wo_number', 'wo_start_date', 'wo_end_date', 'wo_date_of_issue', 'wo_location', 'wo_city', 'wo_amount', 'wo_project_coordinator', 'wo_no_of_resources', 'project_id', 'created_at', 'wo_attached_file')
            ->with([
                'project' => function ($query) {
                    $query->select('id', 'project_name', 'organisation_id', 'project_number', 'empanelment_reference');
                },
                'project.organizations' => function ($query) {
                    $query->select('id', 'name');
                },
                'contacts' => function ($query) {
                    $query->orderBy('id', 'desc');
                }
            ]);


        // Get search term from request
        $searchValue = $request->search;
        $woStart = $request->start_date;
        $woEnd = $request->end_date;
        $organisation = $request->organisation;
        $project_name = $request->project_name;
        // filter for workorder start and end date
        if (!empty($woStart) && !empty($woStart) && empty($project_name) && empty($organisation)) {
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($woStart, $woEnd) {
                $query->whereDate('wo_start_date', '>=', $woStart)
                    ->whereDate('wo_end_date', '<=', $woEnd);
            });
        } elseif (empty($project_name) && (!empty($organisation) && empty($woStart) && empty($woStart))) {
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation) {
                $query->WhereHas('project.organizations', function ($query) use ($organisation) {
                    $query->where('id', 'like', "%$organisation%");
                });
            });
        } elseif (!empty($project_name) && (!empty($organisation)) && empty($woStart) && empty($woStart)) {
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation, $project_name) {
                $query->WhereHas('project.organizations', function ($query) use ($organisation, $project_name) {
                    $query->where('id', 'like', "%$organisation%");
                })
                    ->WhereHas('project', function ($query) use ($project_name) {
                        $query->where('id', 'like', "%$project_name%");
                    });
            });
        } elseif (!empty($project_name) && (!empty($organisation)) && !empty($woStart) && !empty($woStart)) {
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation, $project_name, $woStart, $woEnd) {
                $query->whereDate('wo_start_date', '>=', $woStart)
                    ->whereDate('wo_end_date', '<=', $woEnd);
                $query->WhereHas('project.organizations', function ($query) use ($organisation) {
                    $query->where('id', 'like', "%$organisation%");
                })
                    ->WhereHas('project', function ($query) use ($project_name) {
                        $query->where('id', 'like', "%$project_name%");
                    });
            });
        }
        // Apply filters if search value is provided
        if (!empty($searchValue)) {
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($searchValue) {
                $query->where('wo_internal_ref_no', 'like', '%' . $searchValue . '%')
                    ->orWhere('wo_number', 'like', '%' . $searchValue . '%')
                    ->orWhere('wo_date_of_issue', 'like', '%' . $searchValue . '%')
                    ->orWhere('wo_project_coordinator', 'like', '%' . $searchValue . '%')
                    ->orWhere('prev_wo_no', 'like', '%' . $searchValue . '%')
                    ->orWhere('wo_amount', 'like', '%' . $searchValue . '%')
                    ->orWhereHas('project', function ($query) use ($searchValue) {
                        $query->where('project_name', 'like', "%$searchValue%")
                            ->orWhere('empanelment_reference', 'like', '%' . $searchValue . '%')
                            ->orWhere('project_number', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhereHas('contacts', function ($query) use ($searchValue) {
                        $query->where('wo_client_contact_person', 'like', '%' . $searchValue . '%')
                            ->orWhere('wo_client_email', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhereHas('project.organizations', function ($query) use ($searchValue) {
                        $query->where('name', 'like', "%$searchValue%");
                    });
            });
        }
        $totalWorkOrders = $totalWorkOrders->orderBy('id', 'desc')->paginate(25);

        // Add contact details for each work order
        foreach ($totalWorkOrders as $key => $value) {
            // Check contacts exist 
            if (!empty($value['contacts'][0])) {
                $wo_details = $value['contacts'][0]['wo_client_contact_person'] . '/' . $value['contacts'][0]['wo_client_email'];
            } else {
                $wo_details = "Not Available";
            }

            // Add the contact details to the work order
            $totalWorkOrders[$key]->contacts_details = $wo_details;
        }
        $organization_data = Organization::orderBy('id', 'desc')->get();
        $projects = Project::where('organisation_id', $organisation)->get();
        return view("hr.workOrder.work-order-list", compact('totalWorkOrders', 'searchValue', 'woStart', 'woEnd', 'organization_data', 'organisation', 'project_name', 'projects'));
    }



    public function create(Request $request)
    {
        $project_id = $request->project_id ?? NULL;
        $project = Project::where('id', $project_id)->first();
        // dd($project);

        $organization = Organization::select('id', 'name')->orderBy('id', 'desc')->get();
        $states = State::select('id', 'state')->orderBy('state')->where('country_id', 1)->get();

        $projects = project::select('id', 'project_name')->orderBy('id', 'desc')->get();
        return view("hr.workOrder.add-work-order", compact('organization', 'states', 'project', 'projects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'organisation' => 'required',
            'project_name' => 'required',
            'attachment' => 'file|mimes:jpg,jpeg,png,pdf|max:2048',
            'wo_number' => ['required', Rule::unique('work_orders')->whereNull('deleted_at')],

        ]);
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

            $file = $request->file('attachment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploadWorkOrder', $fileName, 'public');
        } else {
            $fileName = "";
        }

        try {
            DB::beginTransaction();
            $workOrder = new WorkOrder();
            $workOrder->wo_internal_ref_no = $request->internal_reference;
            $workOrder->project_id = $request->project_name;
            $workOrder->wo_number = $request->wo_number;
            $workOrder->prev_wo_no = $request->prev_wo_no;
            $workOrder->wo_date_of_issue = $request->issue_date;
            $workOrder->wo_concern_ministry = $request->concern_ministry;
            $workOrder->wo_no_of_resources = $request->no_of_resource;
            $workOrder->wo_project_duration = $request->project_duration_month;
            $workOrder->wo_project_duration_day = $request->project_duration_days;
            $workOrder->wo_start_date = $request->start_date;
            $workOrder->wo_end_date = $request->end_date;
            $workOrder->wo_location = $request->location;
            $workOrder->wo_city = $request->city;
            $workOrder->wo_amount = $request->amount;
            $workOrder->wo_project_coordinator = $request->coordinator_name;
            $workOrder->wo_invoice_address = $request->invoice_address;
            $workOrder->wo_invoice_name = $request->invoice_client_name;

            $workOrder->wo_state = $request->state;
            $workOrder->wo_pin = $request->pincode;

            $workOrder->wo_invoice_state = $request->invoice_state;
            $workOrder->wo_invoice_city = $request->invoice_city;
            $workOrder->wo_invoice_pincode = $request->invoice_pin;
            $workOrder->amendment_number = $request->amendment_number;
            $workOrder->amendment_date = $request->amendment_date;
            $workOrder->previous_order_no = $request->prev_order_no;
            $workOrder->wo_remarks = $request->remarks;
            $workOrder->wo_attached_file = $fileName;
            // dd($workOrder);

            $workOrder->save();

            $c_person_name = $request->input('c_person_name');
            if (is_array($request->c_person_name)) {
                foreach ($request->c_person_name as $key => $value) {
                    // dd($value);
                    $woContactDetail = new WoContactDetail();
                    $woContactDetail->wo_client_contact_person = $value;
                    $woContactDetail->wo_client_designation = $request->c_designation[$key];
                    $woContactDetail->wo_client_contact = $request->c_contact[$key];
                    $woContactDetail->wo_client_email = $request->c_email[$key];
                    $woContactDetail->wo_client_remarks = $request->c_remarks[$key];
                    $woContactDetail->work_order_id = $workOrder->id;
                    // dd($woContactDetail);
                    $woContactDetail->save();
                }
            }
            DB::commit();
            return redirect()->route('work-order-list')->with(['success' => true, 'message' => 'WorkOrder created successfully.']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Server Error.']);
        }
    }
    public function edit(string $id)
    {

        $workOrder = WorkOrder::with('project.organizations', 'contacts')->findOrFail($id);
        $organization = Organization::orderBy('id', 'desc')->get();
        $states = State::select('id', 'state')->orderBy('state')->where('country_id', 1)->get();
        $wo_state = $workOrder->wo_state ?? NULL;
        $cities = " ";
        if (!empty($wo_state)) {
            $cities = City::select('id', 'city_name')->orderBy('city_name')->where('state_code', $wo_state)->get();
        }
        // dd($workOrder->wo_city);
        $projects = project::select('id', 'project_name')->orderBy('id', 'desc')->get();
        return view("hr.workOrder.edit-work-order", compact('workOrder', 'organization', 'states', 'projects', 'cities'));
    }
    public function update(Request $request, string $id)
    {

        $request->validate([
            'attachment' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
            // 'organisation' => 'required',
            'project_name' => 'required',
            'wo_number' => ['required', Rule::unique('work_orders')->whereNull('deleted_at')->ignore($id)],
        ]);
        try {
            DB::beginTransaction();
            $workOrder = WorkOrder::find($id);

            // update attechment of workorder
            if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

                $file = $request->file('attachment');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploadWorkOrder', $fileName, 'public');
            } else {
                $fileName =  $workOrder->wo_attached_file ?? NULL;
            }

            $workOrder->wo_internal_ref_no = $request->internal_reference;
            $workOrder->project_id = $request->project_name;
            $workOrder->wo_number = $request->wo_number;
            $workOrder->prev_wo_no = $request->prev_wo_no;
            $workOrder->wo_date_of_issue = $request->issue_date;

            $workOrder->wo_concern_ministry = $request->concern_ministry;
            $workOrder->wo_no_of_resources = $request->no_of_resource;
            $workOrder->wo_project_duration = $request->project_duration_month;
            $workOrder->wo_project_duration_day = $request->project_duration_days;
            $workOrder->wo_start_date = $request->start_date;
            $workOrder->wo_end_date = $request->end_date;
            $workOrder->wo_location = $request->location;
            $workOrder->wo_city = $request->city;
            $workOrder->wo_amount = $request->amount;
            $workOrder->wo_project_coordinator = $request->coordinator_name;
            $workOrder->wo_invoice_address = $request->invoice_address;
            $workOrder->wo_invoice_name = $request->invoice_client_name;

            $workOrder->wo_state = $request->state;
            $workOrder->wo_pin = $request->pincode;

            $workOrder->wo_invoice_state = $request->invoice_state;
            $workOrder->wo_invoice_city = $request->invoice_city;
            $workOrder->wo_invoice_pincode = $request->invoice_pin;
            $workOrder->amendment_number = $request->amendment_number;
            $workOrder->amendment_date = $request->amendment_date;
            $workOrder->previous_order_no = $request->prev_order_no;
            $workOrder->wo_remarks = $request->remarks;
            $workOrder->wo_attached_file = $fileName ?? NULL;

            $workOrder->save();

            $contactsData = $request->c_person_name;
            if (!empty($contactsData)) {
                foreach ($contactsData as $key => $value) {
                    $woContactDetail = WoContactDetail::where('work_order_id', $id)
                        ->where('id', $key)
                        ->first();

                    if (!empty($woContactDetail)) {
                        // dd('stage 1');
                        $woContactDetail->wo_client_contact_person = $value;
                        $woContactDetail->wo_client_designation = $request->c_designation[$key];
                        $woContactDetail->wo_client_contact = $request->c_contact[$key];
                        $woContactDetail->wo_client_email = $request->c_email[$key];
                        $woContactDetail->wo_client_remarks = $request->c_remarks[$key];

                        $woContactDetail->update();
                    } else {

                        $woContactDetail = new WoContactDetail();
                        if (!empty($value)) {
                            $woContactDetail->wo_client_contact_person = $value;
                            $woContactDetail->wo_client_designation = $request->c_designation[$key];
                            $woContactDetail->wo_client_contact = $request->c_contact[$key];
                            $woContactDetail->wo_client_email = $request->c_email[$key];
                            $woContactDetail->wo_client_remarks = $request->c_remarks[$key];
                            $woContactDetail->work_order_id = $id;
                            $woContactDetail->save();
                        }
                    }
                }
            }

            //     return redirect()->route('work-order-list')->with('success','WorkOrder updated !');
            // }catch(Throwable $th){
            //         return response()->json(['error' => true, 'message' => 'Server Error.']); 
            // }
            DB::commit();
            return redirect()->route('work-order-list')->with(['success' => true, 'message' => 'WorkOrder updated successfully.']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Server Error.']);
        }
    }
    public function show(String $id)
    {

        $workOrder = WorkOrder::with(['contacts', 'project.organizations'])->findOrFail($id);
        return view("hr.workOrder.view-work-order", compact('workOrder'));
    }

    public function delete() {}


    public function organisation_workOrder(Request $request)
    {

        $org_id = $request->or_id;
        $workOrders = WorkOrder::select('wo_number')->with('project.organizations')
            ->whereHas('project.organizations', function ($query) use ($org_id) {
                $query->where('organisation_id', $org_id);
            })
            ->get();

        if ($workOrders) {
            return response()->json([
                'message' => 'workOrders retrieved successfully',
                'data' => $workOrders
            ], 200);
        }
    }
    public function workOrder_details(Request $request)
    {

        $workOrder_id = $request->workOrder_id;
        $workOrder_details =  workOrder::with('project')->where('wo_number', $workOrder_id)->orderBy('id', 'desc')->first();
        if ($workOrder_details) {
            return response()->json([
                'message' => 'workOrder Details retrieved successfully',
                'data' => $workOrder_details
            ], 200);
        }
    }
    
    public function work_order_report(Request $request)
    {
        try{
            if(empty($request->checkbox)){
                return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Please check at least one checkbox!']);
            }
        
            $validatedData = $this->processWorkOrders($request);
            $unq_no = now()->format('Ymdhisa');
            $file_name = "WorkOrderReport_{$unq_no}.pdf";
            
            return view("hr.workOrder.work-order-report", $validatedData,compact('file_name'));
        }
        catch (Throwable $e){
            return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    private function processWorkOrders(Request $request)
    {
        if ($request->check_workOrders) {
            $check_workOrders = explode(',', $request->check_workOrders);
        } else {

            $check_workOrders = $request->checkbox ?? null;
        }
        if (empty($check_workOrders)) {
            return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Please check at least one checkbox!']);
        }
        // dd($check_workOrders);
        $wo_details = workOrder::with('project.organizations')
            ->whereIn('id', $check_workOrders)
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('project_id');

        $overallSum = 0;
        $projectSums = [];
        $wo_doc = [];

        foreach ($wo_details as $projectId => $workOrders) {
            $projectSum = $workOrders->sum('wo_amount');
            $projectSums[$projectId] = $projectSum;
            $wo_details[$projectId]->wo_pro_sum = $projectSum;

            $overallSum += $projectSum;

            foreach ($workOrders as $value) {
                if (!empty($value->wo_attached_file)) {
                    $wo_doc[] = $value->wo_attached_file;
                }
            }
        }

        // $zipFilePath = count($wo_doc) > 0 ? downloadWorkOrderDocumentsAsZip($wo_doc) : null;
        $zipFilePath = null;
            if (count($wo_doc) > 0) {
                // Call the helper function to create a zip of the work order documents
                $zipFilePath = downloadWorkOrderDocumentsAsZip($wo_doc);
            }
        $show_report = "showReport";
        return compact('wo_details', 'overallSum', 'zipFilePath', 'check_workOrders','show_report');
    }


    public function save_wo_report(Request $request){
        
        try {
            $workOrder = $this->processWorkOrders($request);
            $wo_details =$workOrder['wo_details'];
            $overallSum =$workOrder['overallSum'];
            $message_new = view('hr/workOrder/work-order-report', [
                'wo_details' => $wo_details,
                'overallSum' => $overallSum,
            ])->render(); 
            // dd($message_new);
            $unq_no = now()->format('Ymdhisa');
            if($request->report_name){
               
                $file_name = $request->report_name . "_" . $unq_no . ".pdf";

            }else{
                $file_name = "WorkOrderReport_{$unq_no}.pdf";
            }
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($message_new);
        
            $pdf->save(public_path("work-order/wo-report/{$file_name}"));
            ReportLog::create([
                'doc' => $file_name
            ]);
            return redirect()->route('report-log')->with(['success' => true, 'message' => 'Report save Successfully.']);
        } catch (Throwable $th) {
            return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Server Error.']);
        }
        
    }
    
//     public function save_wo_report(Request $request)
// {
//     try {
//         // Process the work orders
//         $workOrder = $this->processWorkOrders($request);
//         $wo_details = $workOrder['wo_details'];
//         $overallSum = $workOrder['overallSum'];

//         // Render the report view
//         $message_new = view('hr.workOrder.work-order-report', [
//             'wo_details' => $wo_details,
//             'overallSum' => $overallSum,
//         ])->render();

//         // Generate unique report filename
//         $unq_no = now()->format('Ymdhisa');
//         $file_name = $request->report_name 
//             ? $request->report_name . "_" . $unq_no . ".pdf"
//             : "WorkOrderReport_{$unq_no}.pdf";

//         // Generate PDF from the HTML content
//         $pdf = App::make('dompdf.wrapper');
//         $pdf->loadHTML($message_new);

//         // Save PDF to a specific location
//         $pdf->save(public_path("work-order/wo-report/{$file_name}"));

//         // Log the report in the database
//         ReportLog::create([
//             'doc' => $file_name
//         ]);

//         // Return success message
//         return redirect()->route('report-log')->with([
//             'success' => true, 
//             'message' => 'Report saved successfully.',
//             'pdf_file' => asset("work-order/wo-report/{$file_name}")
//         ]);
        
//     } catch (Throwable $th) {
//         // Handle any errors
//         return redirect()->route('work-order-list')->with([
//             'error' => true, 
//             'message' => 'Server Error.'
//         ]);
//     }
// }


    /**
     * Export work orders.
     */
    public function export_csv(Request $request)
    {

        // dd($request->check_workOrders);
        $filename = 'work-order.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];


        if (!empty($request->check_workOrders)) {
            $wo = explode(',', $request->check_workOrders);
            $totalWorkOrders = WorkOrder::select('wo_number', 'wo_start_date', 'wo_end_date', 'wo_date_of_issue', 'wo_location', 'wo_city', 'wo_amount', 'wo_project_coordinator', 'wo_no_of_resources', 'project_id')
                ->with([
                    'project' => function ($query) {
                        $query->select('id', 'project_name', 'organisation_id', 'project_number', 'empanelment_reference');
                    },
                    'project.organizations' => function ($query) {
                        $query->select('id', 'name');
                    }
                ])
                ->whereIn('id', $wo);
            $totalWorkOrders = $totalWorkOrders->get();
        } else {

            $totalWorkOrders = WorkOrder::select('wo_number', 'wo_start_date', 'wo_end_date', 'wo_date_of_issue', 'wo_location', 'wo_city', 'wo_amount', 'wo_project_coordinator', 'wo_no_of_resources', 'project_id')
                ->with([
                    'project' => function ($query) {
                        $query->select('id', 'project_name', 'organisation_id', 'project_number', 'empanelment_reference');
                    },
                    'project.organizations' => function ($query) {
                        $query->select('id', 'name');
                    }
                ]);

            // Get search term from request
            $searchValue = $request->search;
            $woStart = $request->start_date;
            $woEnd = $request->end_date;
            $organisation = $request->organisation;
            $project_name = $request->project_name;
            // filter for workorder start and end date
            if (!empty($woStart) && !empty($woStart) && empty($project_name) && empty($organisation)) {
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($woStart, $woEnd) {
                    $query->whereDate('wo_start_date', '>=', $woStart)
                        ->whereDate('wo_end_date', '<=', $woEnd);
                });
            } elseif (empty($project_name) && (!empty($organisation) && empty($woStart) && empty($woStart))) {
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation) {
                    $query->WhereHas('project.organizations', function ($query) use ($organisation) {
                        $query->where('id', 'like', "%$organisation%");
                    });
                });
            } elseif (!empty($project_name) && (!empty($organisation)) && empty($woStart) && empty($woStart)) {
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation, $project_name) {
                    $query->WhereHas('project.organizations', function ($query) use ($organisation, $project_name) {
                        $query->where('id', 'like', "%$organisation%");
                    })
                        ->WhereHas('project', function ($query) use ($project_name) {
                            $query->where('id', 'like', "%$project_name%");
                        });
                });
            } elseif (!empty($project_name) && (!empty($organisation)) && !empty($woStart) && !empty($woStart)) {
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation, $project_name, $woStart, $woEnd) {
                    $query->whereDate('wo_start_date', '>=', $woStart)
                        ->whereDate('wo_end_date', '<=', $woEnd);
                    $query->WhereHas('project.organizations', function ($query) use ($organisation) {
                        $query->where('id', 'like', "%$organisation%");
                    })
                        ->WhereHas('project', function ($query) use ($project_name) {
                            $query->where('id', 'like', "%$project_name%");
                        });
                });
            }
            // Apply filters if search value is provided
            if (!empty($searchValue)) {
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($searchValue) {
                    $query->where('wo_internal_ref_no', 'like', '%' . $searchValue . '%')
                        ->orWhere('wo_number', 'like', '%' . $searchValue . '%')
                        ->orWhere('wo_date_of_issue', 'like', '%' . $searchValue . '%')
                        ->orWhere('wo_project_coordinator', 'like', '%' . $searchValue . '%')
                        ->orWhere('prev_wo_no', 'like', '%' . $searchValue . '%')
                        ->orWhere('wo_amount', 'like', '%' . $searchValue . '%')
                        ->orWhereHas('project', function ($query) use ($searchValue) {
                            $query->where('project_name', 'like', "%$searchValue%")
                                ->orWhere('empanelment_reference', 'like', '%' . $searchValue . '%')
                                ->orWhere('project_number', 'like', '%' . $searchValue . '%');
                        })
                        ->orWhereHas('contacts', function ($query) use ($searchValue) {
                            $query->where('wo_client_contact_person', 'like', '%' . $searchValue . '%')
                                ->orWhere('wo_client_email', 'like', '%' . $searchValue . '%');
                        })
                        ->orWhereHas('project.organizations', function ($query) use ($searchValue) {
                            $query->where('name', 'like', "%$searchValue%");
                        });
                });
            }
            $totalWorkOrders = $totalWorkOrders->get();
        }

        return response()->stream(function () use ($totalWorkOrders) {
            $handle = fopen('php://output', 'w');
            $headers = array('Organisation Name', 'Work Order No.', ' Empanelment No.', 'Location', 'City', 'Issue Date', 'Start Date', 'End Date', 'Project Number', 'Project Name', 'Project Coordinator Name', 'Amount', 'No.of Resource');
            fputcsv($handle, $headers);

            foreach ($totalWorkOrders as $totalWorkOrder) {
                $data = [
                    $totalWorkOrder->project->organizations->name,
                    $totalWorkOrder->wo_number,
                    $totalWorkOrder->project->empanelment_reference,
                    $totalWorkOrder->wo_location,
                    $totalWorkOrder->wo_city,
                    $totalWorkOrder->wo_date_of_issue,
                    $totalWorkOrder->wo_start_date,
                    $totalWorkOrder->wo_end_date,
                    $totalWorkOrder->project->project_number,
                    $totalWorkOrder->project->project_name,
                    $totalWorkOrder->wo_project_coordinator,
                    $totalWorkOrder->wo_amount,
                    $totalWorkOrder->wo_no_of_resources

                ];
                fputcsv($handle, $data);
            }

            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }

    public function report_log(Request $request){
        // $report= ReportLog::with('user')->orderBy('id', 'desc')->paginate(25);
        $report = DB::table('report_log')
        ->leftJoin('users', 'report_log.created_by', '=', 'users.id')
        ->select('report_log.*', 'users.first_name as first_name', 'users.email as user_email') // select required fields
        ->orderByDesc('report_log.id')
        ->paginate(25);
        // dd($report);
        return view("hr.workOrder.report-log", compact('report'));
    }

    public function send_report_mail(Request $request)
    {
        $this->validate($request, [
            'to' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'body' => ['string'],

        ]);

        // save doc
        $filename = $request->attachment ?? NULL;
        $workOrder = $this->processWorkOrders($request);
        $wo_details = $workOrder['wo_details'];
        $overallSum = $workOrder['overallSum'];
        $message_new = view('hr/workOrder/work-order-report', [
            'wo_details' => $wo_details,
            'overallSum' => $overallSum,
        ])->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($message_new);

        $pdf->save(public_path("work-order/wo-report/{$filename}"));
        // save doc save here

        try {
            DB::beginTransaction();

            $maildata = new stdclass();
            $maildata->subject = $request->subject;
            $maildata->body = $request->body;
            // $maildata->attachment = public_path("work-order/wo-report/{$filename}");
            $maildata->attachment = str_replace('\\', '/', public_path("work-order/wo-report/{$filename}"));
            $cc = [];
            if ($request->cc) {
                $cc = explode(",", $request->cc);
            }
            if ($request->to) {
                $to = explode(",", $request->to);
            }
            // dd($maildata);   
            EmailHistory::create([

                'from_mail' => 'noreply@prakharsoftwares.com',
                'to_mail' => $request->to,
                'cc' => $request->cc,
                'subject' => $request->subject,
                'content' => $request->body,
                'attatchment' => $filename ? $filename : ''
            ]);
            Mail::to($to)->cc($cc)->send(new ReportMail($maildata));
            DB::commit();
       
        // return response()->json(['success' => true, 'message' => 'Mail Sent Successfully']);
        return redirect()->route('work-order-list')->with(['success' => true, 'message' => 'Report Mail Sent Successfully.']);
        // return redirect()->route('work-order-list')->with('success', 'Report Mail Sent Successfully');
        }
        catch(Throwable $th){
            DB::rollBack();
            // return response()->json(['error' => true, 'message' => 'Server Error']);
            return redirect()->route('work-order-list')->with(['success' => true, 'message' => 'Server Error.']);

        }
    }

    /**
     * Export salary sheet page.
     */
    public function salary_sheet(Request $request)
    {
        return view('hr.workOrder.export-salary-sheet');
    }

    // check wo_order exist or not
    public function  get_exist_wo(Request $request)
    {
        $exist_wo = $request->wo_number;
        $get_wo = workOrder::select('id', 'wo_number')->where('wo_number', '=', $exist_wo)->first();
        return response()->json([
            'message' => 'Project Details retrieved successfully',
            'data' => $get_wo
        ], 200);
    }

    
    /**
     * Check whether salary is generated or not.
     * @param $month string
     */
    public function check_salary(Request $request)
    {
        try {
            $salary =  EmpSalarySlip::select('emp_salary_id')->where('sal_month', $request->month)->firstOrFail();
            return response()->json(['success' => true, 'message' => 'salary generated']);
        } catch (Throwable $th) {
            return response()->json(['error' => true, 'message' => 'salary not generated yet']);
        }
    }

    /**
     * Download salary sheet
     */
    public function download_salary_sheet(Request $request)
    {
        try {
        $month =  $request->{'month-salary'};
        $month_date = date('M-Y', strtotime($month));
        $salary = EmpDetail::selectRaw('wo_attendances.emp_vendor_rate, work_orders.project_id, work_orders.wo_start_date, work_orders.wo_end_date, emp_salary_slip.emp_sal_ctc as sal_ctc, emp_details.emp_doj, emp_salary_slip.work_order, emp_details.emp_name, emp_details.emp_place_of_posting, emp_details.emp_code, salary.sal_emp_designation as designation, salary.sal_net, emp_salary_slip.tds_deduction, emp_salary_slip.sal_recovery, emp_salary_slip.sal_working_days, emp_salary_slip.sal_account_no, emp_salary_slip.sal_bank_name, emp_details.emp_phone_first, emp_salary_slip.sal_emp_email, emp_salary_slip.sal_uan_no, emp_salary_slip.sal_esi_number, emp_salary_slip.sal_aadhar_no, emp_salary_slip.sal_pan_no, emp_salary_slip.sal_remarks, salary.sal_basic, salary.sal_hra, salary.sal_conveyance, salary.medical_allowance, salary.sal_special_allowance, salary.sal_gross, salary.sal_pf_employer, salary.sal_pf_employee, salary.sal_esi_employer, salary.sal_esi_employee, salary.sal_net, emp_salary_slip.sal_esi_wages, emp_salary_slip.sal_pf_wages, emp_salary_slip.sal_basic as basic, emp_salary_slip.sal_hra as hra, emp_salary_slip.sal_conveyance as cony, emp_salary_slip.sal_medical_allowance as med_all, emp_salary_slip.sal_special_allowance as spl_all, emp_salary_slip.sal_net as net, emp_salary_slip.sal_esi_employee as emp_esi, emp_salary_slip.sal_pf_employee as emp_pf, emp_salary_slip.sal_advance, emp_salary_slip.sal_medical_insurance')
            ->join('work_orders', 'emp_details.emp_work_order', '=', 'work_orders.wo_number')
            ->join('emp_salary_slip', 'emp_details.emp_code', '=', 'emp_salary_slip.sal_emp_code')
            ->join('salary', 'emp_details.id', '=', 'salary.sl_emp_id')
            ->join('wo_attendances', function ($join) {
                $join->on('emp_salary_slip.work_order', '=', 'wo_attendances.wo_number');
                $join->on('emp_salary_slip.sal_emp_code', '=', 'wo_attendances.emp_code');
                $join->on('emp_salary_slip.sal_month', '=', 'wo_attendances.attendance_month');
            })
            ->where('emp_salary_slip.sal_month', $month)
            ->where('emp_details.emp_current_working_status', 'active')
            ->whereHas('getBankDetail', function ($query) {
                $query->where('emp_sal_structure_status', 'completed');
            });
        
        // Process for export all data in csv.
        $filename = 'salary-sheet-' . $month . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () use ($salary, $month, $month_date) {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [

                'S.No.',
                'Location',
                'Work Order Value',
                'CTC',
                'Wo Start',
                'Wo end',
                'Work Order',
                'Employee Name',
                'Employee Code',
                'DOJ',
                'Designation',
                'Net Pay',
                $month_date,
                'TAX as per Account',
                'Recovery',
                $month . ' Net Payable',
                'Working Days, ' . $month_date,
                'Account No.',
                'Account Name',
                'IFSC Code',
                'Mobile no.',
                'Email Id',
                'UAN No',
                'ESIC No.',
                'Aadhar No',
                'Pan No.',
                'Remarks',
                'Basic Pay',
                'HRA',
                'Conveyance',
                'Medical Allow.',
                'Spl Allow.',
                'Gross Salary',
                'PF (Employer)',
                'PF (Employee)',
                'ESI (Employer)',
                'ESI (Employee)',
                'Net Pay',
                'CTC',
                'ESI WAGES',
                'PF WAGES',
                'Basic Payable',
                'HRA Payable',
                'Con. Payable',
                'Med. Allow. Payable',
                'Spl Allow. Payable',
                'TOTAL',
                'ESI (Employee)',
                'PF (Employee)',
                'TAX as per Account',
                'Recovery',
                'Advance',
                'Medical Insurance',
                'Total Deduction',
                'Net Payable'
            ]);
            // Fetch and process data in chunks
            $salary->chunk(100, function ($employees) use ($handle) {
                foreach ($employees as $employee) {
                    
                    // Extract data from each employee.
                    if (get_organization_name($employee->project_id) == 'Becil' || get_organization_name($employee->project_id) == 'BECIL') {
                        $wo_start = date('d-m-Y', strtotime($employee->emp_doj));
                        $wo_end = date('d-m-Y', strtotime('+1 year', strtotime('-1 day', strtotime($employee->emp_doj))));
                    } else {
                        $wo_start = date('d-m-Y', strtotime($employee->wo_start_date));
                        $wo_end = date('d-m-Y', strtotime($employee->wo_end_date));
                    }

                    $data = [
                        1,
                        $employee->emp_place_of_posting,
                        (!empty($employee->emp_vendor_rate) ? $employee->emp_vendor_rate : "NA"),
                        $employee->sal_ctc,
                        $wo_start,
                        $wo_end,
                        $employee->work_order,
                        $employee->emp_name,
                        $employee->emp_code,
                        date('d-m-Y', strtotime($employee->emp_doj)),
                        $employee->designation,
                        ($employee->sal_ctc - $employee->sal_pf_employer - $employee->sal_pf_employee - $employee->sal_esi_employer - $employee->sal_esi_employee),
                        ((int) $employee->net + (int) $employee->tds_deduction + (!empty($employee->sal_recovery) ? (int) $employee->sal_recovery : 0) + (int) $employee->sal_medical_insurance),
                        $employee->tds_deduction,
                        (!empty($employee->sal_recovery) ? (int) $employee->sal_recovery : 0) + (int) $employee->sal_medical_insurance,
                        $employee->net,
                        $employee->sal_working_days,
                        $employee->sal_account_no,
                        $employee->sal_bank_name,
                        $employee->emp_ifsc,
                        $employee->emp_phone_first,
                        $employee->sal_emp_email,
                        (!empty($employee->sal_uan_no) ? $employee->sal_uan_no : "NA"),
                        (!empty($employee->sal_esi_number) ? $employee->sal_esi_number : "NA"),
                        $employee->sal_aadhar_no,
                        $employee->sal_pan_no,
                        $employee->sal_remarks,
                        $employee->sal_basic,
                        $employee->sal_hra,
                        $employee->sal_conveyance,
                        $employee->medical_allowance,
                        $employee->sal_special_allowance,
                        $employee->sal_gross,
                        $employee->sal_pf_employer,
                        $employee->sal_pf_employee,
                        $employee->sal_esi_employer,
                        $employee->sal_esi_employee,
                        ((int) $employee->sal_ctc - (int) $employee->sal_pf_employer - (int) $employee->sal_pf_employee - (int) $employee->sal_esi_employer - (int) $employee->sal_esi_employee),
                        $employee->sal_ctc,
                        (!empty($employee->sal_esi_wages) ? $employee->sal_esi_wages : 0),
                        (!empty($employee->sal_pf_wages) ? $employee->sal_pf_wages : 0),
                        $employee->basic,
                        $employee->hra,
                        $employee->cony,
                        $employee->med_all,
                        $employee->spl_all,
                        (int) $employee->basic + (int) $employee->hra + (int) $employee->cony + (int) $employee->med_all + (int) $employee->spl_all,
                        $employee->emp_esi,
                        $employee->emp_pf,
                        $employee->tds_deduction,
                        (!empty($employee->sal_recovery) ? $employee->sal_recovery : 0),
                        (!empty($employee->sal_advance) ? $employee->sal_advance : 0),
                        (!empty($employee->sal_medical_insurance) ? $employee->sal_medical_insurance : 0),
                        (int) $employee->emp_esi + (int) $employee->emp_pf + (int) $employee->tds_deduction + (int) $employee->sal_recovery + (int) $employee->sal_advance + (int) $employee->sal_medical_insurance,
                        $employee->net
                    ];
                    fputcsv($handle, $data);
                }
            });
            fclose($handle);
        }, 200, $headers);
    }
    catch(Throwable $th){
        echo $th->getMessage();
    }
    }
   
}
