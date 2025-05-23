<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\EmpSalarySlip;
use App\Models\WoAttendance;
use App\Models\WorkOrder;
use App\Models\InvoiceRecord;
use App\Models\CompanyMaster;
use App\Models\BillingStructure;
use App\Models\EmpDetail;
use App\Models\Form16;
use App\Models\Form16Failed;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\File;
use App\Models\EmpAccountDetail;
class InvoiceBillingController extends Controller
{
    public function index(Request $request){
      
        $organizations = Organization::orderBy('id','desc')->get();
        return view("hr.invoiceBilling.generate-invoice",compact('organizations'));
    }
    public function invoice_details(Request $request){
        // dd($request);   
        $month = $request->month;
        $wo_number = $request->workOrder;
        $org_id = $request->organisation;
        // dd($wo_number);
       
            $attend_rows = WoAttendance::where('attendance_month', $month)
            ->where('wo_number', $wo_number)
            ->count();
           
            // Check salary calculation
            $sal_rows = EmpSalarySlip::join('emp_details', 'emp_details.emp_code', '=', 'emp_salary_slip.sal_emp_code')
                ->where('emp_salary_slip.sal_month', $month)
                ->where('emp_details.emp_work_order', $wo_number)
                ->count();
               
            // $sal_rows='122';

            // Check if attendance and salary rows match
            if ($attend_rows > 0 && $sal_rows > 0 && $attend_rows == $sal_rows) {
                // Fetch wo_details based on org and wo_number
                $data_qry = WorkOrder::with('project.organizations')  
                ->whereHas('project.organizations', function ($query) use($org_id) {
                    $query->where('organisation_id', $org_id);
                })
                    ->where('wo_number', $wo_number)
                    ->get();
            }else{

                $data_qry='';
            }

            $invoice_records = InvoiceRecord::where('ir_month',$month)
                                 ->where('ir_wo',$wo_number)->get();
  
        $organizations = Organization::orderBy('id','desc')->get();
        return view("hr.invoiceBilling.generate-invoice",compact('organizations','data_qry','sal_rows','attend_rows' ,'month','invoice_records'));
    }
    public function tax_slip(Request $request){
        // dd($request->month);
        $wo=$request->wo;
        $month=$request->month;
        if (isset($wo) && isset($month)) {
            $wo_number = trim($wo);
            $month_date = trim($month);
        
            //calculate finacial year
            $month = date('m');
            if ($month > 4) {
                $y = date('Y');
                $pt = date('Y', strtotime('+1 year'));
                $pt = substr($pt, -2);
                $fy = $y . "" . $pt;
            } else {
                $y = date('Y', strtotime('-1 year'));
                //$y =substr($y, -2);
                $pt = date('Y');
                $pt = substr($pt, -2);
                $fy = $y . "" . $pt;
            }
        
            $invoice_records = InvoiceRecord::orderby('id','desc')->first();
            // dd($invoice_records);
            $id =$invoice_records->id??NULL;
            $invoice_number = "PSSPL/DL/";
            $invoice_number .= $fy . "/";
            $invoice_number .= sprintf("%'04d", $id + 1);
            $userId = auth()->id();
            $data = "
                ir_wo ='$wo_number', 
                ir_month ='$month_date' , 
                ir_invoice_number ='$invoice_number',
                user_id ='$userId'";
             
            $check_invoice= InvoiceRecord::where('ir_wo',$wo_number)->where('ir_month',$month_date)->first();
            $check_rows = $check_invoice ? 1 : 0;
        
            if ($check_rows == '') {
                InvoiceRecord::create($data);
            }
          
        }
        $workOrder =  WorkOrder::with('project.organizations')->where('wo_number',$wo)->first();
       
        // attendance of invoice emp
            // $woAttendance = WoAttendance::with('empDetail')
            //     ->select(
            //         'wo_attendances.designation',
            //         DB::raw('COUNT(*) as qty'),
            //         'wo_attendances.lwp_leave',
            //         'wo_attendances.approve_leave',
            //         'wo_attendances.emp_vendor_rate',
            //         'emp_details.emp_dor'
            //     )
            //     ->join('emp_details', 'wo_attendances.emp_id', '=', 'emp_details.emp_id')
            //     ->where('wo_attendances.attendance_month', $month_date)
            //     ->where('emp_details.emp_work_order', $wo)
            //     ->groupBy('wo_attendances.lwp_leave', 'wo_attendances.approve_leave', 'wo_attendances.emp_vendor_rate', 'wo_attendances.designation', 'emp_details.emp_dor')
            //     ->get();
            // // dd($woAttendance);

            // Assuming $month_date and $wo_number are provided
                $year = date('Y', strtotime($month_date));
                $month = date('m', strtotime($month_date));
                $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                $start_date = date("Y-m-d", strtotime("$month/01/$year"));
                $last_date = date("Y-m-d", strtotime("$month/" . $day . "/$year"));

                // Fetch records from WoAttendance, with related EmpDetail data
                $woAttendances = WoAttendance::with('empDetail') // Eager load the EmpDetail
                    ->whereHas('empDetail', function ($query) use ($wo_number) {
                        $query->where('emp_work_order', $wo_number);
                    })
                    ->where('attendance_month', $month_date)
                    ->get();

                // Initialize counters and date count
                $counter = 1;
                $totalmanpower = 0;
                $sub_total = 0;
                $date_count = 0;

                // Iterate over the results to process them
                foreach ($woAttendances as $attendance) {
                    $empDetail = $attendance->empDetail; // Access related EmpDetail

                    $doj = date("Y-m-d", strtotime($empDetail->emp_doj));
                    $dor = date("Y-m-d", strtotime($empDetail->emp_dor));

                    // Check if the employee joined between the start and last date
                    if (($doj >= $start_date) && ($doj <= $last_date)) {
                        $date_count++;
                    }
                }

                if ($date_count > 0) {
                    // Fetch data where emp_dor is also considered
                    $woAttendances = WoAttendance::with('empDetail')
                        ->whereHas('empDetail', function ($query) use ($wo_number) {
                            $query->where('emp_work_order', $wo_number);
                        })
                        ->where('attendance_month', $month_date)
                        ->get();
                } else {
                    // Fetch data without considering emp_dor
                    $woAttendances = WoAttendance::with('empDetail')
                        ->whereHas('empDetail', function ($query) use ($wo_number) {
                            $query->where('emp_work_order', $wo_number);
                        })
                        ->where('attendance_month', $month_date)
                        ->get();
                }
            $attendances=[];
            $modifiedWoAttendances=[];
            foreach($woAttendances as $key => $woAttendance){
                // vendor rate
                $emp_vendor_rate= $woAttendance->emp_vendor_rate;
                if(!empty($emp_vendor_rate)){
                    $vendor_rate = numberToCurrency($emp_vendor_rate);
                }else{
                    $vendor_rate = 'N/A';
                }

                // form
                if (($doj >= $start_date) && ($doj <= $last_date)) {
                    $from = changeSqlToUser_DateFromat($doj);
                } else {
                    $from = changeSqlToUser_DateFromat($start_date);
                }

                // to
                if (($dor >= $start_date) && ($dor <= $last_date)) {
                    $to = changeSqlToUser_DateFromat($dor);
                } else {
                    $to = changeSqlToUser_DateFromat($last_date);
                }

                // working days
                $working_days =  ((strtotime($to) - strtotime($from)) / (60 * 60 * 24)) + 1;

                $at_leave = $empDetail['lwp_leave'];
                $at_appr_leave = $empDetail['approve_leave'];

                if ($at_appr_leave > $at_leave) {
                    $gap_in_service =  "0";
                   
                } else {
                    $gap_in_service = $at_leave - $at_appr_leave;
                   
                }

                // billing
                $billing_days = $day - $gap_in_service;

                // amount
                $amount = round(((int)$billing_days) / $day * ((int)$empDetail['emp_vendor_rate']) * ((int)$empDetail['qty']));
				$wo_amount= numberToCurrency($amount);

                $woAttendance->emp_vendor_rate = $vendor_rate;
                $woAttendance->from = $from;
                $woAttendance->to = $to;
                $woAttendance->working_days = $working_days;
                $woAttendance->gap_in_service = $gap_in_service;
                $woAttendance->billing_days = $billing_days;
                $woAttendance->wo_amount = $wo_amount;
                $sub_total += $amount;
                $totalmanpower += $empDetail->qty;
               
            }

            // get master company data
            $company_master = CompanyMaster::first(); 

            // get billing structure of workorder
            $bill_structure = BillingStructure::with('organizations')->first();

            if ($bill_structure->billing_gst_no != "") {
                $bill = $bill_structure->billing_gst_no;
            } else {
                $bill='';
            }
            $bill_structure->bill_structure = $bill;

            // billing sac
            if ($bill_structure->billing_sac_code != "") {
                $sac= $bill_structure->billing_sac_code;
            } else {
               $sac='';
            }
            $bill_structure->billing_sac_code = $sac;

            // services charge
            
            $service_charge_rate =  $bill_structure->service_charge_rate??NULL;
            $sub_total = (float)$sub_total; 
            $service_charge_rate = (float)$service_charge_rate;

            $gst_tax=(float)$bill_structure->billing_tax_rate / 2;
            $i_gst = round(($sub_total * $gst_tax) / 100);
            $bill_structure->i_gst=$i_gst;
            $tax_value = $i_gst;

            $service_charge_value = round(($sub_total * $service_charge_rate) / 100);
            // dd($service_charge_value);
            if($bill_structure->show_service_charge =='yes'){
                $grand_total = round($sub_total + $tax_value + $service_charge_value);
                $grand= numberToCurrency($grand_total);
            }
            else
            {
                $grand_total = round($sub_total + $tax_value);
                $grand= numberToCurrency($grand_total);
            }
            $bill_structure->grand_total = $grand;


            // invoice number
            if(!empty($check_invoice->ir_invoice_number)){
                $invoice_number =$check_invoice->ir_invoice_number;
            }else{

                $invoice_number = $invoice_number;
            }
            // $check_invoice->ir_invoice_number= $ir_invoice_number;
          
            $s_month =$request->month;

        return view("hr.invoiceBilling.tax-invoice",compact('s_month','invoice_number','check_invoice','workOrder','woAttendances','sub_total','totalmanpower','company_master','bill_structure'));
    }
    public function save_slip(Request $request){
       
        $wo =$request->wo_number;
        $month = $request->month;
        $invoice_records = new InvoiceRecord();
        $invoice_records->ir_invoice_number= $request->invoice_no;
        $invoice_records->ir_wo= $request->wo_number;
        $invoice_records->ir_month= $request->month;
        $invoice_records->ir_sub_total= $request->sub_total;
        $invoice_records->ir_gst_mode= $request->tax_mode;
        $invoice_records->gst_rate= $request->tax_rate;
        $invoice_records->gst_value= $request->tax_value;
        $invoice_records->show_service_charge= $request->show_service_charge;
        $invoice_records->service_charge_rate= $request->service_rate;
        $invoice_records->service_charge_value= $request->service_value;
        $invoice_records->ir_grand_total= $request->grand_total;
        $invoice_records->save();
        return redirect()->route('tax-invoice',[$wo,$month])
        ->with('success', 'Tax slip Added Successfully !');

    }
    public function invoice_list(Request $request){
        $search = $request->search;
        $invoices = InvoiceRecord::orderby('id','desc');
        if($search){
            $invoices->where(function($q) use($search){
                $q->where('ir_invoice_number', 'like','%'.$search.'%')
                ->orwhere('ir_wo', 'like','%'.$search.'%')
                ->orwhere('ir_month', 'like','%'.$search.'%')
                ->orwhere('created_at', 'like','%'.$search.'%');
                
            });
        }        
        $invoices=$invoices->paginate(10);
        
        return view("hr.invoiceBilling.invoice-list", compact('invoices','search'));
    }
    public function biling_structure(Request $request){
        $search = $request->search;
        $billing_strut = BillingStructure::with('organizations')->orderby('id','desc');
        if($search){
            $billing_strut->where(function($q) use($search){
                $q->where('wo_number', 'like','%'.$search.'%')
                ->orwhere('billing_to', 'like','%'.$search.'%')
                ->orwhere('billing_address', 'like','%'.$search.'%')
                ->orwhere('email_id', 'like','%'.$search.'%')
                ->orwhere('billing_sac_code', 'like','%'.$search.'%')
                ->orwhere('billing_tax_mode', 'like','%'.$search.'%')
                ->orwhere('billing_gst_no', 'like','%'.$search.'%')
                ->orWhereHas('organizations', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                });
            });
        }        
        $billing_strut=$billing_strut->paginate(10);
      
        return view("hr.invoiceBilling.biling-structure-list",compact('billing_strut','search'));
    }
   
    public function add_biling_structure(Request $request){
        $organizations = Organization::select('id','name')->orderBy('id','desc')->get();
        
        return view("hr.invoiceBilling.create-billing-structure",compact('organizations'));
    }
    public function create_biling_structure(Request $request){
        
        $request->validate([
            'organisation' => 'required',
            'workOrder' => 'required',
            'billing_to' => 'required',
            'billing_address' => 'required',
            'billing_gst' => 'required',
            'billing_state' => 'required',
            'billing_contact_person' => 'required',
            'billing_email_id' => 'required',
            'billing_code' => 'required',
            'billing_tax_mode' => 'required',
            'billing_tax_rate' => 'required',
            'show_service_charge' => 'required',
            'billing_service_rate' => 'required'
        ]);
       
        $bill_structure = new BillingStructure();
        $bill_structure->organisation_id = $request->organisation;
        $bill_structure->wo_number = $request->workOrder;
        $bill_structure->billing_to = $request->billing_to;
        $bill_structure->billing_address = $request->billing_address;
        $bill_structure->billing_gst_no = $request->billing_gst;
        $bill_structure->billing_state = $request->billing_state;
        $bill_structure->contact_person = $request->billing_contact_person;
        $bill_structure->email_id = $request->billing_email_id;
        $bill_structure->billing_sac_code = $request->billing_code;
        $bill_structure->billing_tax_mode = $request->billing_tax_mode;
        $bill_structure->billing_tax_rate = $request->billing_tax_rate;
        $bill_structure->show_service_charge = $request->show_service_charge;
        $bill_structure->service_charge_rate = $request->billing_service_rate;
        $bill_structure->save();
        return redirect()->route('biling-structure-list')->with('success','Billing Structure created !');
    }
    public function edit_biling_structure(Request $request, String $id){
        $id=$request->id;
        $billingStructure= BillingStructure::with('organizations')->find($id);
       
        return view("hr.invoiceBilling.update-billing-structure",compact('billingStructure'));
    }
    public function update_biling_structure(Request $request, String $id){
       
        $request->validate([
            'billing_to' => 'required',
            'billing_address' => 'required',
            'billing_gst' => 'required',
            'billing_state' => 'required',
            'billing_contact_person' => 'required',
            'billing_email_id' => 'required',
            'billing_code' => 'required',
            'billing_tax_mode' => 'required',
            'billing_tax_rate' => 'required',
            'show_service_charge' => 'required',
            'billing_service_rate' => 'required'
        ]);
       
        $billingStructure= BillingStructure::find($id);
        $billingStructure->update([
        'billing_to' => $request->billing_to,
        'billing_address' => $request->billing_address,
        'billing_gst_no' => $request->billing_gst,
        'billing_state' => $request->billing_state,
        'contact_person' => $request->billing_contact_person,
        'email_id' => $request->billing_email_id,
        'billing_sac_code' => $request->billing_code,
        'billing_tax_mode' => $request->billing_tax_mode,
        'billing_tax_rate' => $request->billing_tax_rate,
        'show_service_charge' => $request->show_service_charge,
        'service_charge_rate' => $request->billing_service_rate
        ]);
        return redirect()->route('biling-structure-list')->with('success','Billing Structure updated !');
    }
    
    // form16 function strat here
    public function form16(Request $request){
        $search =$request->search;
        $form16 = Form16::with(['empDetail' => function ($query) {
                $query->select('id', 'emp_code', 'emp_name', 'emp_work_order');
        }
        ])
           // $form16 = Form16::with(['empDetail'])
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('empDetail', function ($que) use ($search) {
                        $que->where('emp_code', 'like', '%' . $search . '%')
                            ->orWhere('emp_name', 'like', '%' . $search . '%')
                            ->orWhere('emp_work_order', 'like', '%' . $search . '%');
                        
                })
                ->orwhere('pan_no', 'like', '%' . $search . '%')
                ->orWhere('financial_year', 'like', '%' . $search . '%');
                    
                    
            });
        })
        ->orderby('id','desc')->paginate(25);
        // dd($form16);
     
        return view("hr.invoiceBilling.form16",compact('form16','search'));
    }
    public function addForm16(){

        $empDetail = EmpDetail::whereHas('getBankDetail', function ($query) {
            $query->where('emp_sal_structure_status', 'completed');
        })
        ->where('emp_current_working_status','active')
        ->get();
        return view("hr.invoiceBilling.add-new-form16",compact('empDetail'));
    }
    public function create(Request $request){
        
        $request->validate([
              'emp_pan'=>'required',
              'financial_year'=>'required'
        ]);
       
       if ($request->hasFile('file') && $request->file('file')->isValid()) {
       
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path("recruitment/candidate_documents/form_16/"), $fileName);
        }else{
          
            $fileName="";
            
        }
    //   dd($path);
        $form = new Form16();
        $form->pan_no =$request->pan_no;
        $form->emp_id =$request->emp_pan;
        $form->attachment =$fileName;
        $form->financial_year =$request->financial_year;
        $form->save();

        return redirect()->route('form16')->with('success','Form16 created !');
        
    }
    


    public function emp_data(Request $request,string $id){
        $id =$request->id;
        $empDetail = EmpDetail::select('id','emp_code','emp_work_order','emp_name','emp_doj','emp_designation',)->where('id',$id)->first();
        if($empDetail){
            return response()->json([
                'message' => 'Employee Details retrieved successfully',
                // 'data' => $empDetail
                'data' => [
                'emp_name' => $empDetail->emp_name,
                'emp_code' => $empDetail->emp_code,
                'emp_work_order' => $empDetail->emp_work_order,
                'emp_doj' => $empDetail->emp_doj,
                'emp_designation' => $empDetail->emp_designation,
                'emp_salary' => $empDetail->getBankDetail->emp_salary, // Accessing salary from the related model
                'emp_account_no' => $empDetail->getBankDetail->emp_account_no,
                'emp_branch' => $empDetail->getBankDetail->emp_branch,
                'emp_ifsc' => $empDetail->getBankDetail->emp_ifsc,
                'emp_pan' => $empDetail->getBankDetail->emp_pan,
                'emp_esi_no' => $empDetail->getBankDetail->emp_esi_no,
                'emp_pf_no' => $empDetail->getBankDetail->emp_pf_no,
            ]
            ], 200);
        }

    }

    public function uploadForm16(Request $request)
    {
       
            $total = 0;
            $failedCount = 0;
    
            // Validate the uploaded zip file
            $request->validate([
                'zip_data' => 'required|file|mimes:zip|max:10240',
            ]);
    
            // Handle the uploaded zip file
            $zipFile = $request->file('zip_data');
            $zipFileName = $zipFile->getClientOriginalName();
            $zipFilePath = $zipFile->storeAs('app/public/recruitment/candidate_documents/form_16/Zip', $zipFileName, 'public');
           
            $zipFilePath = public_path('recruitment/candidate_documents/form_16/Zip') . '/' . $zipFileName;
            $zipFile->move(public_path('recruitment/candidate_documents/form_16/Zip'), $zipFileName);
    
            // Initialize the ZipArchive object
            $zip = new ZipArchive;
            $resZip = $zip->open($zipFilePath);
    
            if ($resZip === TRUE) {
                // Extract files from the ZIP to the target directory
                $zip->extractTo(public_path('recruitment/candidate_documents/form_16'));
                $zip->close();
            } else {
                return redirect()->route('form16')->with('error', 'Failed to open ZIP file.');
            }
    
            // Define directories for processed and failed files
            $folderName = pathinfo($zipFileName, PATHINFO_FILENAME);
            // dd($folderName);
            
            // dd($folderName);
            // $currentDir = public_path('recruitment/candidate_documents/form_16/'. $folderName);
            $currentDir = public_path('recruitment/candidate_documents/form_16') . '/' . $folderName;
            $failedDir = public_path('recruitment/candidate_documents/form_16/failed');
            // $path = $file->move(public_path("recruitment/candidate_documents/form_16/"), $fileName);
           
            if (!File::exists($failedDir)) {
                File::makeDirectory($failedDir, 0777, true);
            }
            
            // Get all files from the extracted folder
            //  dd($files);
            if(File::isDirectory($currentDir)){
                $files = File::allFiles($currentDir);
              
                foreach ($files as $file) {
                    $fileName = $file->getFilename();
                    $filePath = $file->getRealPath();
                    $destinationPath = public_path('recruitment/candidate_documents/form_16') . '/' . $fileName;
                    
                    $failedPath = $failedDir . '/' . $fileName;
        
                    // Process the file only if it is a PDF, DOC, or DOCX
                    $extension = strtolower($file->getExtension());
                    if (!in_array($extension, ['pdf', 'doc', 'docx'])) {
                        File::move($filePath, $failedPath);
                        $failedCount++;
                        continue;
                    }
        
                    // Extract PAN and financial year from the filename
                    $fileData = explode('_', pathinfo($fileName, PATHINFO_FILENAME));
        
                    if (count($fileData) >= 2) {
                        $panNo = $fileData[0];
                        $financialYear = $fileData[1];
        
                        $form16 = Form16::where('pan_no', $panNo)->where('financial_year', $financialYear)->first();
        
                        if (!$form16) {
                            // check for employee ID
                            $employee = EmpAccountDetail::where('emp_pan', $panNo)->first();
                        
                            if ($employee) {
                                // Move file to the correct directory and insert data into the database
                                File::move($filePath, $destinationPath);
        
                                Form16::create([
                                    'emp_id' => $employee->id,
                                    'pan_no' => $panNo,
                                    'financial_year' => $financialYear,
                                    'attachment' => $fileName,
                                    'source' => 'bulk_upload',
                                
                                ]);
                                $total++;
                            } 
                            else {
                                // Move to failed directory if no employee found
                                File::move($filePath, $failedPath);
        
                                Form16Failed::create([
                                    'pan_no' => $panNo,
                                    'financial_year' => $financialYear,
                                    'attachment' => $fileName,
                                    'source' => 'bulk_upload',
                                    'added_by' => auth()->id(),
                                ]);
                                $failedCount++;
                            }
                        } else {
                            // If duplicate entry found, move to the failed directory
                            File::move($filePath, $failedPath);
                            $failedCount++;
                        }
                    } else {
                        // If filename format is incorrect, move to failed directory
                        File::move($filePath, $failedPath);
                        $failedCount++;
                    }
                }
        
                // Return response with result
                return redirect()->route('form16')->with('success', "Total: $total & Failed Count: $failedCount Form16 Added");
            }else{
                
                return redirect()->route('form16')->with('error', "Please upload a valid ZIP File.");
            }
    }
    

    // form16 function end here
    
}
