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
use Throwable;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\ReportLog;
use PDF;
use App;
use stdClass;



class WorkOrderController extends Controller
{
   
    
    public function index(Request $request)
    {
        // Initialize WorkOrder query with eager loading for project and contacts
        // $totalWorkOrders = WorkOrder::with(['project.organizations', 'contacts' => function ($query) {
        //     $query->orderBy('id', 'desc');
        // }]);
        $totalWorkOrders = WorkOrder::select('id','wo_number', 'wo_start_date', 'wo_end_date','wo_date_of_issue','wo_location','wo_city','wo_amount','wo_project_coordinator','wo_no_of_resources','project_id','created_at','wo_attached_file') 
        ->with([
            'project' => function ($query) {
                $query->select('id', 'project_name','organisation_id','project_number','empanelment_reference'); 
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
        if(!empty($woStart) && !empty($woStart) && empty($project_name) && empty($organisation)){
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($woStart,$woEnd) {
                $query->whereDate('wo_start_date', '>=',$woStart)
                ->whereDate('wo_end_date', '<=', $woEnd);
            });
        } 
        elseif(empty($project_name) && (!empty($organisation) && empty($woStart) && empty($woStart))){
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation) {
                $query->WhereHas('project.organizations', function ($query) use ($organisation) {
                    $query->where('id', 'like', "%$organisation%");
                });
            });
        }elseif(!empty($project_name) && (!empty($organisation)) && empty($woStart) && empty($woStart)){
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation,$project_name) {
                $query->WhereHas('project.organizations', function ($query) use ($organisation,$project_name) {
                    $query->where('id', 'like', "%$organisation%");
                })
                ->WhereHas('project', function ($query) use ($project_name) {
                    $query->where('id', 'like', "%$project_name%");
                    
                });
            });
            
        }elseif(!empty($project_name) && (!empty($organisation)) && !empty($woStart) && !empty($woStart)){
            $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation,$project_name,$woStart,$woEnd) {
                $query->whereDate('wo_start_date', '>=',$woStart)
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
        $organization_data = Organization::orderBy('id','desc')->get();
        $projects = Project::where('organisation_id', $organisation)->get();
        return view("hr.workOrder.work-order-list", compact('totalWorkOrders','searchValue','woStart','woEnd','organization_data','organisation','project_name','projects'));
    }
    

    
    public function create(Request $request){
        $project_id = $request->project_id??NULL;
        $project = Project::where('id', $project_id)->first();
        // dd($project);

        $organization = Organization::select('id','name')->orderBy('id','desc')->get();
        $states = State::select('id', 'state')->orderBy('state')->where('country_id', 1)->get();
       
        $projects = project::select('id','project_name')->orderBy('id','desc')->get();
        return view("hr.workOrder.add-work-order",compact('organization','states','project','projects'));
    }
    public function store(Request $request){
            $request->validate([
                'organisation' => 'required',
                'project_name' => 'required',
                'attachment' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', 
                'wo_number' => ['required',Rule::unique('work_orders')->whereNull('deleted_at')],

            ]);
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

            $file = $request->file('attachment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploadWorkOrder', $fileName, 'public');

        }else{
            $fileName="";
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
          
            $c_person_name=$request->input('c_person_name');
            if(is_array($request->c_person_name)){
                foreach($request->c_person_name as $key => $value){
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
        }catch(Throwable $th){
            DB::rollBack();
            return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Server Error.']);
        }

       

    }
    public function edit(string $id){
       
        $workOrder = WorkOrder::with('project.organizations','contacts')->findOrFail($id);
        $organization = Organization::orderBy('id','desc')->get();
        $states = State::select('id', 'state')->orderBy('state')->where('country_id', 1)->get();
        $wo_state =$workOrder->wo_state??NULL;
        $cities=" ";
        if(!empty($wo_state)){
           $cities = City::select('id', 'city_name')->orderBy('city_name')->where('state_code',$wo_state)->get();
        }
        // dd($workOrder->wo_city);
        $projects = project::select('id','project_name')->orderBy('id','desc')->get();
        return view("hr.workOrder.edit-work-order",compact('workOrder','organization','states','projects','cities'));
    
    }
    public function update(Request $request,string $id){
       
        $request->validate([
            'attachment' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
            // 'organisation' => 'required',
            'project_name' => 'required',
            'wo_number' => ['required',Rule::unique('work_orders')->whereNull('deleted_at')->ignore($id)],
        ]);
        try {   
            DB::beginTransaction();
            $workOrder= WorkOrder::find($id);
            
            // update attechment of workorder
            if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

                $file = $request->file('attachment');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploadWorkOrder', $fileName, 'public');
    
            }else{
                $fileName =  $workOrder->wo_attached_file??NULL;
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
            $workOrder->wo_attached_file = $fileName??NULL;
          
            $workOrder->save();
           
                $contactsData = $request->c_person_name;
                
                foreach($contactsData as $key => $value){
                    $woContactDetail = WoContactDetail::where('work_order_id', $id)
                    ->where('id', $key)
                    ->first();
                 
                    if(!empty($woContactDetail)){
                        $woContactDetail->wo_client_contact_person = $value;
                        $woContactDetail->wo_client_designation = $request->c_designation[$key];
                        $woContactDetail->wo_client_contact = $request->c_contact[$key];
                        $woContactDetail->wo_client_email = $request->c_email[$key];
                        $woContactDetail->wo_client_remarks = $request->c_remarks[$key];
                     
                        $woContactDetail->update();
                    }else{
                        $woContactDetail = new WoContactDetail();
                        $woContactDetail->wo_client_contact_person = $value;
                        $woContactDetail->wo_client_designation = $request->c_designation[$key];
                        $woContactDetail->wo_client_contact = $request->c_contact[$key];
                        $woContactDetail->wo_client_email = $request->c_email[$key];
                        $woContactDetail->wo_client_remarks = $request->c_remarks[$key];
                        $woContactDetail->work_order_id = $id;
                        $woContactDetail->save();
                    }
                 
               }

        //     return redirect()->route('work-order-list')->with('success','WorkOrder updated !');
        // }catch(Throwable $th){
        //         return response()->json(['error' => true, 'message' => 'Server Error.']); 
        // }
            DB::commit();
            return redirect()->route('work-order-list')->with(['success' => true, 'message' => 'WorkOrder updated successfully.']); 
        }catch(Throwable $th){
            DB::rollBack();
            return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Server Error.']);
        }
    }
    public function show(String $id){
        
        $workOrder = WorkOrder::with(['contacts','project.organizations'])->findOrFail($id);
        return view("hr.workOrder.view-work-order",compact('workOrder'));

    }
    
    public function delete(){

    }

   
    public function organisation_workOrder(Request $request){
       
        $org_id = $request->or_id;
        $workOrders = WorkOrder::select('wo_number')->with('project.organizations')
        ->whereHas('project.organizations', function ($query) use($org_id) {
            $query->where('organisation_id', $org_id);
        })
        ->get();
        
        if($workOrders){
            return response()->json([
                'message' => 'workOrders retrieved successfully',
                'data' => $workOrders
            ], 200);
        }
    }
    public function workOrder_details(Request $request){
       
        $workOrder_id = $request->workOrder_id;
        $workOrder_details =  workOrder::with('project')->where('wo_number',$workOrder_id)->orderBy('id', 'desc')->first();
        if($workOrder_details){
            return response()->json([
                'message' => 'workOrder Details retrieved successfully',
                'data' => $workOrder_details
            ], 200);
        }
    }
     
    // public function work_order_report(Request $request){
    //     // dd($request);
    //     $check_workOrders = $request->checkbox??NULL;
    //     if(empty($request->checkbox)){
    //         return redirect()->route('work-order-list')->with('success','Please check atleast one checkbox !');
    //     }
    //     $wo_details =  workOrder::with('project.organizations')->whereIn('id',$request->checkbox)->orderBy('id', 'desc')->get();
    //     $wo_details =$wo_details->groupby('project_id');
        
    //     $overallSum = 0;
    //     // Array to store the project workorder sums
    //     $projectSums = [];
    //     foreach ($wo_details as $projectId => $workOrders) {
    //         // Calculate the sum for each project workorder
    //         $projectSum = $workOrders->sum('wo_amount');
    //         $projectSums[$projectId] = $projectSum;
    //         $wo_details[$projectId]->wo_pro_sum =$projectSums[$projectId];
    //         // Add to the overall sum
    //         $overallSum += $projectSum;
    //         // $wo_doc =[];
    //         foreach($workOrders as $value){
    //             if(!empty( $value->wo_attached_file)){

    //                 $wo_doc[] = $value->wo_attached_file;  
    //             }else{
    //                 $wo_doc =[];
    //             }
    //         }
    //     }
    //     $zipFilePath = null;
    //     if (count($wo_doc) > 0) {
    //         // Call the helper function to create a zip of the work order documents
    //         $zipFilePath = downloadWorkOrderDocumentsAsZip($wo_doc);
    //     }
    //     // dd($wo_details);
       
    //     return view("hr.workOrder.work-order-report",compact('wo_details','overallSum','zipFilePath','check_workOrders'));
    // }
    public function work_order_report(Request $request)
{
    $validatedData = $this->processWorkOrders($request);
    return view("hr.workOrder.work-order-report", $validatedData);
}

    private function processWorkOrders(Request $request)
    {
        if($request->check_workOrders){
            $check_workOrders = explode(',',$request->check_workOrders);
        }else{

            $check_workOrders = $request->checkbox ?? null;
        }
        if (empty($check_workOrders)) {
            return redirect()->route('work-order-list')->with('success', 'Please check at least one checkbox!');
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

        $zipFilePath = count($wo_doc) > 0 ? downloadWorkOrderDocumentsAsZip($wo_doc) : null;

        return compact('wo_details', 'overallSum', 'zipFilePath', 'check_workOrders');
    }


    public function save_wo_report(Request $request){
        // try {
            $workOrder = $this->processWorkOrders($request);
            $wo_details =$workOrder['wo_details'];
            $overallSum =$workOrder['overallSum'];
            $message_new = view('hr/workOrder/work-order-report', [
                'wo_details' => $wo_details,
                'overallSum' => $overallSum,
            ])->render(); 
            // dd($message_new);
            $unq_no = now()->format('Ymdhisa');
            $file_name = "WorkOrderReport_{$unq_no}.pdf";

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($message_new);
        
            $pdf->save(public_path("work-order/wo-report/{$file_name}"));
            ReportLog::create([
                'doc' => $file_name
            ]);
            return redirect()->route('report-log')->with(['success' => true, 'message' => 'Report save Successfully.']);
        // } catch (Throwable $th) {
        //     return redirect()->route('work-order-list')->with(['error' => true, 'message' => 'Server Error.']);
        // }
        
    }

    
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

        
        if(!empty($request->check_workOrders)){
            $wo = explode(',',$request->check_workOrders);
            $totalWorkOrders = WorkOrder::select('wo_number', 'wo_start_date', 'wo_end_date','wo_date_of_issue','wo_location','wo_city','wo_amount','wo_project_coordinator','wo_no_of_resources','project_id') 
           ->with([
               'project' => function ($query) {
                   $query->select('id', 'project_name','organisation_id','project_number','empanelment_reference'); 
               },
               'project.organizations' => function ($query) {
                   $query->select('id', 'name'); 
               }
           ])
           ->whereIn('id',$wo);
           $totalWorkOrders = $totalWorkOrders->get();
          
        }else{
        
            $totalWorkOrders = WorkOrder::select('wo_number', 'wo_start_date', 'wo_end_date','wo_date_of_issue','wo_location','wo_city','wo_amount','wo_project_coordinator','wo_no_of_resources','project_id') 
            ->with([
                'project' => function ($query) {
                    $query->select('id', 'project_name','organisation_id','project_number','empanelment_reference'); 
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
            if(!empty($woStart) && !empty($woStart) && empty($project_name) && empty($organisation)){
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($woStart,$woEnd) {
                    $query->whereDate('wo_start_date', '>=',$woStart)
                    ->whereDate('wo_end_date', '<=', $woEnd);
                });
            } 
            elseif(empty($project_name) && (!empty($organisation) && empty($woStart) && empty($woStart))){
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation) {
                    $query->WhereHas('project.organizations', function ($query) use ($organisation) {
                        $query->where('id', 'like', "%$organisation%");
                    });
                });
            }elseif(!empty($project_name) && (!empty($organisation)) && empty($woStart) && empty($woStart)){
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation,$project_name) {
                    $query->WhereHas('project.organizations', function ($query) use ($organisation,$project_name) {
                        $query->where('id', 'like', "%$organisation%");
                    })
                    ->WhereHas('project', function ($query) use ($project_name) {
                        $query->where('id', 'like', "%$project_name%");
                        
                    });
                });
                
            }elseif(!empty($project_name) && (!empty($organisation)) && !empty($woStart) && !empty($woStart)){
                $totalWorkOrders = $totalWorkOrders->where(function ($query) use ($organisation,$project_name,$woStart,$woEnd) {
                    $query->whereDate('wo_start_date', '>=',$woStart)
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
        
        return response()->stream(function () use ($totalWorkOrders){
            $handle = fopen('php://output', 'w');
            $headers = array( 'Organisation Name', 'Work Order No.', ' Empanelment No.' , 'Location','City','Issue Date','Start Date','End Date','Project Number','Project Name','Project Coordinator Name','Amount','No.of Resource');
            fputcsv($handle, $headers);

            foreach($totalWorkOrders as $totalWorkOrder){
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
        $report= ReportLog::with('user')->orderBy('id', 'desc')->paginate(25);
        // dd($report);
        return view("hr.workOrder.report-log", compact('report'));

    }

    /**
     * Export salary sheet page.
     */
    public function salary_sheet(Request $request)
    {
        return view('hr.workOrder.export-salary-sheet');
    }

}
