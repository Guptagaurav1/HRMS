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
    public function index(){
        $workOrders = WorkOrder::orderBy('id','desc')->get();
        // dd($workOrders);
        $workOrdercontacts =[];
        foreach ($workOrders as $workOrder) {
            // dd($workOrder->id);
            $work_order_id = $workOrder->id;
            $workOrderDetails = WoContactDetail::where('workOrder_id', $work_order_id)->orderBy('id', 'desc')->first(); 
            if(!empty($workOrderDetails)){
                $workOrder->wo_details = $workOrderDetails->wo_client_contact_person .'/'. $workOrderDetails->wo_client_email;
            }else{
                $workOrder->wo_details = "Not Available";
            }
            $workOrdercontacts[] = $workOrder;
        }
        // dd($workOrderDetails);
        return view("hr.workOrder.work-order-list",compact('workOrdercontacts'));
       
    }
    public function create(){
        $organization = Organization::orderBy('id','desc')->get();
        return view("hr.workOrder.add-work-order",compact('organization'));
    }
    public function store(Request $request){
            // dd($request->input('workorder'));
            $request->validate([
                // 'attachment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the file type and size
                'organisation' => 'required',
                'work_order' => 'required'

            ]);

        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {

            $file = $request->file('attachment');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploadWorkOrder', $fileName, 'public');

        }
        
        try {   
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
            $workOrder->save();
            $contactsData = $request->input('contacts');
            // dd($contactsData);
            foreach($contactsData['c_person_name'] as $key => $value){
                // dd($value);
                $woContactDetail = new WoContactDetail();
                $woContactDetail->wo_client_contact_person = $value;
                $woContactDetail->wo_client_designation = $contactsData['c_designation'][$key];
                $woContactDetail->wo_client_contact = $contactsData['c_contact'][$key];
                $woContactDetail->wo_client_email = $contactsData['c_email'][$key];
                $woContactDetail->wo_client_remarks = $contactsData['c_remarks'][$key];
                $woContactDetail->workOrder_id = $workOrder->id;
                // dd($woContactDetail);
                $woContactDetail->save();
            }

            return redirect()->route('work-order-list')->with('success','WorkOrder created !');
        }catch(Throwable $th){
                return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }

       

    }
    public function edit(string $id){
        $workOrder = WorkOrder::find($id);
        // dd($WorkOrder);
        $organization = Organization::orderBy('id','desc')->get();
        return view("hr.workOrder.edit-work-order",compact('workOrder','organization'));
    }
    public function update(Request $request){
       dd($request);
    }
    public function show(){
        return view("hr.workOrder.view-work-order");

    }
    public function delete(){

    }
}
