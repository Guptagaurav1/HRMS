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
    public function index(Request $request){
     
        $search = $request->search;
        $workOrders = WorkOrder::with(['organizations', 'contacts' => function ($query) {
            $query->orderBy('id', 'desc')->limit(1);  // Get the most recent contact detail
        }])
        
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('wo_internal_ref_no', 'like', '%' . $search . '%') 
                      ->orWhere('wo_number', 'like', '%' . $search . '%') 
                      ->orWhere('wo_empanelment_reference', 'like', '%' . $search . '%') 
                      ->orWhere('wo_date_of_issue', 'like', '%' . $search . '%') 
                      ->orWhere('wo_project_number', 'like', '%' . $search . '%') 
                      ->orWhere('wo_project_name', 'like', '%' . $search . '%') 
                      ->orWhere('wo_project_coordinator', 'like', '%' . $search . '%') 
                      ->orWhere('prev_wo_no', 'like', '%' . $search . '%') 
                      ->orWhere('wo_amount', 'like', '%' . $search . '%'); 
            });
        })
        ->orWhereHas('organizations', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%'); // serach for organization
        })
        ->orWhereHas('contacts', function ($query) use ($search) {
            $query->where('wo_client_contact_person', 'like', '%' . $search . '%'); // serach for organization
            $query->orwhere('wo_client_email', 'like', '%' . $search . '%'); // serach for organization
        })
        
        ->orderBy('id', 'desc')->paginate(10); 

        // dd($workOrders);
        
        $workOrdercontacts = [];
        foreach ($workOrders as $workOrder) {
            if ($workOrder->woContactDetails) {
                $workOrder->wo_details = $workOrderDetails->wo_client_contact_person . '/' . $workOrderDetails->wo_client_email;
            } else {
                $workOrder->wo_details = "Not Available";
            }
            $workOrdercontacts[] = $workOrder;
        }
        // dd($workOrdercontacts);
        return view("hr.workOrder.work-order-list",compact('workOrdercontacts'));
       
    }
    public function create(){
        $organization = Organization::orderBy('id','desc')->get();
        return view("hr.workOrder.add-work-order",compact('organization'));
    }
    public function store(Request $request){
            $request->validate([
                // 'attachment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
                'organisation' => 'required',
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
            // dd($request);
            $workOrder = new WorkOrder();
            $workOrder->wo_internal_ref_no = $request->internal_reference;
            $workOrder->wo_oraganisation_name = $request->organisation;
            $workOrder->wo_number = $request->work_order;
            $workOrder->prev_wo_no = $request->prev_wo_no;
            $workOrder->wo_date_of_issue = $request->issue_date;
            $workOrder->wo_project_number = $request->project_no;
            $workOrder->wo_project_name = $request->project_name;
            $workOrder->wo_concern_ministry = $request->concern_ministry;
            $workOrder->wo_empanelment_reference = $request->empanelment_reference;
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
            // dd($workOrder);
            $workOrder->save();
            $contactsData = $request->input('contacts');
            foreach($contactsData['c_person_name'] as $key => $value){
                // dd($value);
                $woContactDetail = new WoContactDetail();
                $woContactDetail->wo_client_contact_person = $value;
                $woContactDetail->wo_client_designation = $contactsData['c_designation'][$key];
                $woContactDetail->wo_client_contact = $contactsData['c_contact'][$key];
                $woContactDetail->wo_client_email = $contactsData['c_email'][$key];
                $woContactDetail->wo_client_remarks = $contactsData['c_remarks'][$key];
                $woContactDetail->work_order_id = $workOrder->id;
                $woContactDetail->save();
            }

            return redirect()->route('work-order-list')->with('success','WorkOrder created !');
        }catch(Throwable $th){
                return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }

       

    }
    public function edit(string $id){
       
        $workOrder = WorkOrder::with('contacts')->findOrFail($id);
        $organization = Organization::orderBy('id','desc')->get();
        return view("hr.workOrder.edit-work-order",compact('workOrder','organization'));
    
    }
    public function update(Request $request,string $id){
       
        $request->validate([
            // 'attachment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
            'organisation' => 'required',
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
            $workOrder->wo_oraganisation_name = $request->organisation;
            $workOrder->wo_number = $request->work_order;
            $workOrder->prev_wo_no = $request->prev_wo_no;
            $workOrder->wo_date_of_issue = $request->issue_date;
            $workOrder->wo_project_number = $request->project_no;
            $workOrder->wo_project_name = $request->project_name;
            $workOrder->wo_concern_ministry = $request->concern_ministry;
            $workOrder->wo_empanelment_reference = $request->empanelment_reference;
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
        
            if($request->input('contacts')){
                $contactsData = $request->input('contacts');
                foreach($contactsData['c_person_name'] as $key => $value){
                    $woContactDetail = new WoContactDetail();
                    $woContactDetail->wo_client_contact_person = $value;
                    $woContactDetail->wo_client_designation = $contactsData['c_designation'][$key];
                    $woContactDetail->wo_client_contact = $contactsData['c_contact'][$key];
                    $woContactDetail->wo_client_email = $contactsData['c_email'][$key];
                    $woContactDetail->wo_client_remarks = $contactsData['c_remarks'][$key];
                    $woContactDetail->workOrder_id = $workOrder->id;
                     $woContactDetail->save();
                }
            }else{
                $contactsData = $request->c_person_name;
                
                foreach($contactsData as $key => $value){
                    // dd($woContactDetail);
                    $woContactDetail = WoContactDetail::where('work_order_id', $id)
                    ->where('id', $key)
                    ->first();
                 
                    // if(!empty($woContactDetail)){
    
                        $woContactDetail->wo_client_contact_person = $value;
                        $woContactDetail->wo_client_designation = $request->c_designation[$key];
                        $woContactDetail->wo_client_contact = $request->c_contact[$key];
                        $woContactDetail->wo_client_email = $request->c_email[$key];
                        $woContactDetail->wo_client_remarks = $request->c_remarks[$key];
                     
                        // dd($woContactDetail);
                        $woContactDetail->update();
                    // }else{
                    //     $woContactDetail = new WoContactDetail();
                    //     $woContactDetail->wo_client_contact_person = $value;
                    //     $woContactDetail->wo_client_designation = $request->c_designation[$key];
                    //     $woContactDetail->wo_client_contact = $request->c_contact[$key];
                    //     $woContactDetail->wo_client_email = $request->c_email[$key];
                    //     $woContactDetail->wo_client_remarks = $request->c_remarks[$key];
                     
                    //     // dd($woContactDetail);
                    //     $woContactDetail->save();
                    // }
                    
                }
            }

            return redirect()->route('work-order-list')->with('success','WorkOrder updated !');
        }catch(Throwable $th){
                return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }
    }
    public function show(String $id){
        
        $workOrder = WorkOrder::with(['contacts','organizations'])->findOrFail($id);
        return view("hr.workOrder.view-work-order",compact('workOrder'));

    }
    
    public function delete(){

    }

    public function woProject(){
        $workOrder='';
        $woProjects = WorkOrder::selectRaw('wo_oraganisation_name, wo_project_number, COUNT(wo_number) as total_wo,SUM(wo_amount) as amount')
        ->groupBy('wo_oraganisation_name', 'wo_project_number')
        ->with(['organizations']) 
        ->orderBy('wo_project_number', 'desc')
        ->paginate(10);
            // dd($woProjects);
        return view("hr.workOrder.wo-project-list",compact('woProjects'));
    }

    public function woReport(Request $request){
        // dd($request->project_no);
        $project_no =$request->project_no;
        $workOrder='';
        $woReport = WorkOrder::selectRaw('wo_oraganisation_name, wo_number, wo_project_name,wo_project_coordinator, wo_project_number, wo_start_date,wo_end_date,wo_amount')
        ->with(['organizations'])
        ->where('wo_project_number','=',$request->project_no) 
        ->orderBy('id', 'desc')
        ->get();
        $totalAmount = $woReport->sum('wo_amount');
       
        return view("hr.workOrder.work-order-report",compact('woReport','project_no','totalAmount'));
    }




}
