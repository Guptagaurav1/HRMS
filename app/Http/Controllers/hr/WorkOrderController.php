<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Models\WoContactDetail;
use App\Models\Organization;
use Throwable;

class WorkOrderController extends Controller
{
   
    public function index(Request $request)
    {
        return view("hr.workOrder.work-order-list");
    }
    public function getWorkOrder(Request $request){
        $arrData = [];
        $draw              =     $request->get('draw')??1; // Internal use
        $start             =     $request->get("start")??0; // where to start next records for pagination
        $rowPerPage        =     $request->get("length")??10; // How many recods needed per page for pagination
        $orderArray        =     $request->get('order');
        $columnNameArray   =     $request->get('columns'); // It will give us columns array
        $searchArray       =     $request->get('search');
        $columnIndex       =     $orderArray[0]['column']??NULL;  
        $columnName        =     'id'; 
        $columnSortOrder   =     $orderArray[0]['dir']??'desc'; // This will get us order direction(ASC/DESC)
        $searchValue       =     $searchArray['value']??NULL; // This is search value
        
        
        $totalWorkOrders = WorkOrder::with(['project.organizations', 'contacts' => function ($query) {
            $query->orderBy('id', 'desc');
        }]);
       
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
       
        $for_arrData = $totalWorkOrders;
        $total_filtered_data = $totalWorkOrders->count();
        
        $arrData = $for_arrData->skip($start)->take($rowPerPage);
        $arrData= $for_arrData->orderBy($columnName,$columnSortOrder)->get()->toArray();
        $total = count($arrData);
        // dd($arrData);
        $org_name =[];
        foreach($arrData as $key => $value){
           
            $action='<a href="'.route('edit-work-order',$value['id']).'"><button type="submit" class="btn btn-primary mb-3">Edit</button></a> <a href="'.route('view-work-order',$value['id']).'"><button type="submit" class="btn btn-primary mb-3">View</button></a> <a href="'.route('go-to-attendance',$value['id']).'" title="Go To Attandence"><button type="submit" class="btn btn-primary mb-3">Attandence</button></a> <a href="'.route('work-order-salary-sheet').'" title="Go To Salary Sheet"><button type="submit" class="btn btn-primary mb-3">Salary Sheet</button></a>';
            
            if(!empty($value['wo_attached_file'])){
                $wo_attached_file='<a href="'.asset('storage/uploadWorkOrder/' . $value['wo_attached_file']).'" ><button type="submit" class="btn btn-primary mb-3" target="_blank"> Download</button></a>';
            }else{
                $wo_attached_file='Not Uploaded'; 
            }
            // dd($value['contacts']);
                if (!empty($value['contacts'][0])) {
                    $wo_details = $value['contacts'][0]['wo_client_contact_person'] . '/' . $value['contacts'][0]['wo_client_email'];
                } else {
                    $wo_details = "Not Available";
                }
              
                $date = $value['created_at'];
                $added_at = date('Y-m-d', strtotime($date));;
                $arrData[$key] +=[ 
                    'wo_details' =>$wo_details,
                    'attached_file' =>$wo_attached_file,
                    'added_at' =>$added_at,
                    'action' => $action
                ];
                            
        }
        
        return Response()->json(['draw'=>$draw,'recordsTotal'=>$total,'recordsFiltered'=>$total_filtered_data,'data'=>$arrData]);
    
    }

    public function create(){
        $organization = Organization::orderBy('id','desc')->get();
        return view("hr.workOrder.add-work-order",compact('organization'));
    }
    public function store(Request $request){
            $request->validate([
                'attachment' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
                'organisation' => 'required',
                'project_name' => 'required',
                // 'contacts.*.c_contact' => 'digits:10',
                'work_order' => 'required'

            ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

            $file = $request->file('attachment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploadWorkOrder', $fileName, 'public');

        }else{
            $fileName="";
        }
        
        try {   
          
            $workOrder = new WorkOrder();
            $workOrder->wo_internal_ref_no = $request->internal_reference;
            $workOrder->project_id = $request->project_name;
            $workOrder->wo_number = $request->work_order;
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

            $workOrder->wo_state = $request->invoice_state;
            $workOrder->wo_pin = $request->invoice_pin;
            $workOrder->amendment_number = $request->amendment_number;
            $workOrder->amendment_date = $request->amendment_date;
            $workOrder->previous_order_no = $request->prev_order_no;
            $workOrder->wo_remarks = $request->remarks;
            $workOrder->wo_attached_file = $fileName;
            $c_person_name=$request->c_person_name;
            $workOrder->save();
            foreach($c_person_name as $key => $value){
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

            return redirect()->route('work-order-list')->with('success','WorkOrder created !');
        }catch(Throwable $th){
                return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }

       

    }
    public function edit(string $id){
       
        $workOrder = WorkOrder::with('project.organizations','contacts')->findOrFail($id);
        $organization = Organization::orderBy('id','desc')->get();
        // dd($workOrder);
        return view("hr.workOrder.edit-work-order",compact('workOrder','organization'));
    
    }
    public function update(Request $request,string $id){
       
        $request->validate([
            'attachment' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
            'organisation' => 'required',
            'project_name' => 'required',
            'work_order' => 'required'
        ]);
        try {   
            $workOrder= WorkOrder::find($id);
            
            // update attechment of workorder
            if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

                $file = $request->file('attachment');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('uploadWorkOrder', $fileName, 'public');
    
            }else{
                $fileName=  $workOrder->wo_attached_file;
            } 
          
            $workOrder->wo_internal_ref_no = $request->internal_reference;
            $workOrder->project_id = $request->project_name;
            $workOrder->wo_number = $request->work_order;
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

            $workOrder->wo_state = $request->invoice_state;
            $workOrder->wo_pin = $request->invoice_pin;
            $workOrder->amendment_number = $request->amendment_number;
            $workOrder->amendment_date = $request->amendment_date;
            $workOrder->previous_order_no = $request->prev_order_no;
            $workOrder->wo_remarks = $request->remarks;
            $workOrder->wo_attached_file = $fileName;
            $workOrder->update();
           
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

            return redirect()->route('work-order-list')->with('success','WorkOrder updated !');
        }catch(Throwable $th){
                return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }
    }
    public function show(String $id){
        
        $workOrder = WorkOrder::with(['contacts','project.organizations'])->findOrFail($id);
        return view("hr.workOrder.view-work-order",compact('workOrder'));

    }
    
    public function delete(){

    }

   




}
