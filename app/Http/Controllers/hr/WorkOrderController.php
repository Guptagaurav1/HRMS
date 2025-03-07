<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Models\WoContactDetail;
use App\Models\Organization;
use App\Models\State;
use Throwable;
use ZipArchive;
use Illuminate\Support\Facades\Storage;



class WorkOrderController extends Controller
{
   
    
    public function index(Request $request)
    {
        // Initialize WorkOrder query with eager loading for project and contacts
        $totalWorkOrders = WorkOrder::with(['project.organizations', 'contacts' => function ($query) {
            $query->orderBy('id', 'desc');
        }]);
    
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
    
        // Paginate 
        $totalWorkOrders = $totalWorkOrders->paginate(10);
    
        // Add contact details for each work order
        foreach ($totalWorkOrders as $key => $value) {
            // Check if contacts exist 
            if (!empty($value['contacts'][0])) {
                $wo_details = $value['contacts'][0]['wo_client_contact_person'] . '/' . $value['contacts'][0]['wo_client_email'];
            } else {
                $wo_details = "Not Available";
            }
    
            // Add the contact details to the work order
            $totalWorkOrders[$key]->contacts_details = $wo_details;
        }
        $organization = Organization::orderBy('id','desc')->get();
        return view("hr.workOrder.work-order-list", compact('totalWorkOrders','searchValue','woStart','woEnd','organization','project_name'));
    }
    

    
    public function create(){
        $organization = Organization::select('id','name')->orderBy('id','desc')->get();
        $state = State::select('id','state')->orderBy('id','asc')->get();
        return view("hr.workOrder.add-work-order",compact('organization','state'));
    }
    public function store(Request $request){
            $request->validate([
                'organisation' => 'required',
                'project_name' => 'required',
                // 'contacts.*.c_contact' => 'digits:10',
                'attachment' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
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

            return redirect()->route('work-order-list')->with('success','WorkOrder created !');
        }catch(Throwable $th){
                return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }

       

    }
    public function edit(string $id){
       
        $workOrder = WorkOrder::with('project.organizations','contacts')->findOrFail($id);
        $organization = Organization::orderBy('id','desc')->get();
        $state = State::select('id','state')->orderBy('id','asc')->get();
        return view("hr.workOrder.edit-work-order",compact('workOrder','organization','state'));
    
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
        // dd($workOrder_details);
        if($workOrder_details){
            return response()->json([
                'message' => 'workOrder Details retrieved successfully',
                'data' => $workOrder_details
            ], 200);
        }
    }
     
    public function work_order_report(Request $request){
        if(empty($request->checkbox)){
            return redirect()->route('work-order-list')->with('success','Please check atleast one checkbox !');
        }
        $wo_details =  workOrder::with('project.organizations')->whereIn('id',$request->checkbox)->orderBy('id', 'desc')->get();
        $wo_details =$wo_details->groupby('project_id');
        
        $overallSum = 0;
        // Array to store the project workorder sums
        $projectSums = [];
        foreach ($wo_details as $projectId => $workOrders) {
            // Calculate the sum for each project workorder
            $projectSum = $workOrders->sum('wo_amount');
            $projectSums[$projectId] = $projectSum;
            $wo_details[$projectId]->wo_pro_sum =$projectSums[$projectId];
            // Add to the overall sum
            $overallSum += $projectSum;
            // $wo_doc =[];
            foreach($workOrders as $value){
                if(!empty( $value->wo_attached_file)){

                    $wo_doc[] = $value->wo_attached_file;  
                }else{
                    $wo_doc =[];
                }
            }
        }
        $zipFilePath = null;
        // if (count($wo_doc) > 0) {
        //     // Call the helper function to create a zip of the work order documents
        //     $zipFilePath = downloadWorkOrderDocumentsAsZip($wo_doc);
        // }
        // dd($wo_doc);
       
        return view("hr.workOrder.work-order-report",compact('wo_details','overallSum','zipFilePath'));
    }

    


}
