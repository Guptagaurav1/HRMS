<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpDetail;
use App\Models\Salary;
use App\Models\EmpSendDoc;
use App\Models\WorkOrder;
use App\Models\AppointmentFormat;
use App\Models\SalaryLog;
use App\Models\EmpAccountDetail;

use PDF;
use Illuminate\Support\Facades\DB;
use App;
use stdClass;
use Throwable;

class SalaryStructureController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        $salary = Salary::with(['empDetail'])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                // Condition for empDetail fields
                $query->whereHas('empDetail', function ($q) use ($search) {
                    $q->where('emp_code', 'like', '%' . $search . '%')
                    ->orWhere('emp_name', 'like', '%' . $search . '%')
                    ->orWhere('emp_place_of_posting', 'like', '%' . $search . '%')
                    ->orWhere('emp_designation', 'like', '%' . $search . '%')
                    ->orWhere('emp_work_order', 'like', '%' . $search . '%');
                });
                
                // OR condition for bank details
                $query->orWhereHas('empDetail.getBankDetail', function ($q) use ($search) {
                    $q->where('emp_account_no', 'like', '%' . $search . '%')
                    ->orWhereHas('getBankData', function ($q) use ($search) {
                        $q->where('name_of_bank', 'like', '%' . $search . '%');
                    });
                });
            });
        })
        ->orderBy('salary.id', 'desc')
        ->paginate(25)
        ->appends(request()->query());

    return view("hr.salary.salary-list", compact('salary', 'search'));

    }

    public function create(){
        $employee = EmpDetail::select('id','emp_code','emp_name','emp_doj','emp_designation')
        ->whereHas('getBankDetail', function ($query) {
            $query->where('emp_sal_structure_status', 'pending');
        })->get();
       
        return view("hr.salary.create-salary",compact('employee'));
    }

    public function save_salary(Request $request){
        // dd($request);
       $request->validate([
        'sal_emp_code' => 'required',
        'sal_basic' => 'required',
        'sal_da' => 'required',
        'sal_conveyance' => 'required',
        'sal_hra' => 'required',
        'medical_allowance' => 'required',
        'sal_school_fee' => 'required',
        'sal_car_allow' => 'required',
        'sal_grade_pay' => 'required',
        'sal_special_allowance' => 'required',
        // 'sal_pf_employee' => 'required',
        // 'sal_esi_employer' => 'required',
        // 'sal_lwf_employer' => 'required',
        'sal_prof_tax' => 'required',
       ]);
        if($request->exception_pf == " "){
            $excp_pf = 'yes';
        }else{
            $excp_pf = 'no';

        }
        
        if($request->exception_esi == " "){
            $excp_esi = 'yes';
        }else{
            $excp_esi = 'no';

        }
        if(!$request->medical_insurance_ctc){
            $medical_insurance_ctc = 0;
        }else{
            $medical_insurance_ctc = $request->medical_insurance_ctc;
        }
        if(!$request->accident_insurance_ctc){
            $accident_insurance_ctc = 0;
        }else{
            $accident_insurance_ctc =  $request->medical_insurance_ctc;
        }
        $sal_emp_id = $request->sal_emp_id;
        // check employee salary structure created or not
        $ex_salary= Salary::where('sl_emp_id',$sal_emp_id)->first();
        if(!empty($ex_salary)){
            return redirect()->route('create-salary')->with('success','Salary structure already exist in system !');
        }
        
        $sal_emp_code =$request->sal_emp_code;
        $emp_sal_strut= EmpAccountDetail::where('emp_code',$sal_emp_code)->first();
        if ($emp_sal_strut) {
            // If PF number is provided, update it
            if (!empty($request->pf_no)) {
                $emp_sal_strut->emp_pf_no = $request->pf_no;
            }

            // If ESI number is provided, update it
            if (!empty($request->esi_no)) {
                $emp_sal_strut->emp_esi_no =  $request->esi_no;
            }
            $emp_sal_strut->save();
        }
        
        $salary = new Salary();
        $salary->sl_emp_id = $request->sal_emp_id;
        $salary->sl_emp_code = $request->sal_emp_code;
        $salary->sa_emp_doj = $request->sal_emp_doj;
        $salary->sal_emp_name = $request->sal_emp_name;
        $salary->sal_emp_designation = $request->sal_emp_designation;
        $salary->sal_ctc = $request->sal_emp_ctc;
        $salary->sal_gross = $request->sal_gross;
        $salary->sal_net = $request->sal_net;
        $salary->sal_basic = $request->sal_basic;
        $salary->sal_hra = $request->sal_hra;
        $salary->sal_da = $request->sal_da;
        $salary->sal_conveyance = $request->sal_conveyance;
        $salary->sal_telephone = $request->sal_telephone;
        $salary->medical_allowance = $request->medical_allowance;
        $salary->sal_uniform = $request->sal_uniform;
        $salary->sal_school_fee = $request->sal_school_fee;
        $salary->sal_car_allow = $request->sal_car_allow;
        $salary->sal_grade_pay = $request->sal_grade_pay;
        $salary->sal_special_allowance = $request->sal_special_allowance;
        $salary->sal_pf_employer = $request->sal_pf_employer;
        $salary->sal_pf_employee = $request->sal_pf_employee;
        $salary->sal_esi_employer = $request->sal_esi_employer;
        $salary->sal_esi_employee = $request->sal_esi_employee;
        $salary->pf_exception = $excp_pf;
        $salary->esi_exception = $excp_esi;
        $salary->sal_lwf_employer = $request->sal_lwf_employer;
        $salary->sal_lwf_employee = $request->sal_lwf;
        $salary->medical_insurance = $request->medical_ins;
        $salary->accident_insurance = $request->accident_ins;
        $salary->tds_deduction = $request->tds_deduction;
        $salary->pf_wages = $request->pf_wages;
        $salary->sal_tax = $request->sal_prof_tax;
        $salary->medical_insurance_ctc = $medical_insurance_ctc;
        $salary->accident_insurance_ctc = $accident_insurance_ctc;
        $salary->sal_remark = $request->sal_remark;
       
        $salary->save();
        
      
        // dd($emp_sal_strut);
        if ($salary) {
            $emp_sal_strut->update([
                'emp_sal_structure_status'=>'completed']);
        }

        // send appointment letter code start here
        // check send appointment or not 
        $emp_send_doc= EmpSendDoc::where('emp_code',$sal_emp_code)->where('doc_type','Appointment')->orderby('id','desc')->first();
        if(!empty($emp_send_doc)){
            $docs = $empData->document;
          
        }else{

            // check employee salray
            $emp_salary = Salary::where('sl_emp_id', $sal_emp_id)->first();
            $sl_emp_code =$emp_salary->sl_emp_code;
            // employee wo 
            $employee= EmpDetail::find($sal_emp_id);
            $work_or_no =$employee->emp_work_order;
           
            // get wo end date
            $wo_order= WorkOrder::where('wo_number',$work_or_no)->orderby('id','desc')->first();
             $wo_end_date = $wo_order->wo_end_date??NULL;
          
           
            if(!empty($emp_salary->sl_emp_code)){
               
                if($employee->emp_work_order == "PSSPL Internal Employees"){
                    // Fetch appointment format
                    $appointmentFormat = AppointmentFormat::where('type', 'appointment')
                                                          ->where('name', 'internal')
                                                          ->first();
                    // dd($appointmentFormat);
                    if ($appointmentFormat) {
                        $message = $appointmentFormat->format;
                        $message_2 = $appointmentFormat->format_2;
                
                        // Prepare other variables (e.g., employee name, CTC, etc.)
                        $emp_name = $emp_salary->sal_emp_name;
                        $designation = $emp_salary->sal_emp_designation;
                        $sal_ctc = $emp_salary->sal_ctc;
                        $ctc_pa = $sal_ctc * 12;
                        $doj = date("d-m-Y", strtotime($employee->emp_doj));
                
                        // Handle number to words
                        $locale = 'en_US';
                        $fmt = new \NumberFormatter($locale, \NumberFormatter::SPELLOUT);
                        $in_words = $fmt->format($emp_salary->sal_net);
                
                        // Replace placeholders in the message
                        $message_new = str_replace('{{today_date}}', now()->format('d/M/Y'), $message);
                        $message_new = str_replace('{{candidate_name}}', $emp_name, $message_new);
                        $message_new = str_replace('{{designation}}', $designation, $message_new);
                        $message_new = str_replace('{{emp_code}}', $sl_emp_code, $message_new);
                        $message_new = str_replace('{{sal_ctc}}', $sal_ctc, $message_new);
                        $message_new = str_replace('{{ctc_pa}}', $ctc_pa, $message_new);
                        $message_new = str_replace('{{basic}}', $emp_salary->sal_basic, $message_new);
                        $message_new = str_replace('{{hra}}', $emp_salary->sal_hra, $message_new);
                        $message_new = str_replace('{{conveyance}}', $emp_salary->sal_conveyance, $message_new);
                        $message_new = str_replace('{{sal_telephone}}', $emp_salary->sal_telephone, $message_new);
                        $message_new = str_replace('{{sal_pa}}', $emp_salary->medical_allowance, $message_new);
                        $message_new = str_replace('{{sal_special_allowance}}', $emp_salary->sal_special_allowance, $message_new);
                        $message_new = str_replace('{{sal_gross}}', $emp_salary->sal_gross, $message_new);
                        $message_new = str_replace('{{sal_net}}', $emp_salary->sal_net, $message_new);
                        $message_new = str_replace('{{sal_pf_emmployee}}', $emp_salary->sal_pf_emmployee, $message_new);
                        $message_new = str_replace('{{sal_esi_employee}}', $emp_salary->sal_esi_employee, $message_new);
                        $message_new = str_replace('{{sal_pf_employer}}', $emp_salary->sal_pf_employer, $message_new);
                        $message_new = str_replace('{{sal_esi_employer}}', $emp_salary->sal_esi_employer, $message_new);
                        $message_new = str_replace('{{sal_medical_ins}}', $emp_salary->sal_medical_ins, $message_new);
                        $message_new = str_replace('{{deduction}}', $emp_salary->sal_pf_employee + $emp_salary->sal_esi_employee + $emp_salary->medical_insurance, $message_new);
                        $message_new = str_replace('{{word}}', ucwords($in_words), $message_new);
                        $message_new = str_replace('{{doj}}', humanReadableFormat($doj), $message_new);
                        $message_new = str_replace('{{place_of_posting}}', $employee->emp_place_of_posting, $message_new);
                        // Continue replacing other placeholders...
                        $message_new .= $message_2;
                
                        // Generate PDF
                        $unq_no = now()->format('Ymdhisa');
                        $file_name = "appointment_{$unq_no}.pdf";
                      
                        // Use DomPDF to generate PDF
                        $pdf = App::make('dompdf.wrapper');
                        $pdf->loadHTML($message_new);
                        // $pdf->move(public_path("recruitment/candidate_documents/Appointment Letter/{$file_name}"));
                        $file_path = public_path("recruitment/candidate_documents/appointment_letter/{$file_name}");
                         $pdf->save($file_path);

                        // Insert record in the database
                        EmpSendDoc::create([
                            'emp_code' => $sl_emp_code,
                            'doc_type' => 'Appointment',
                            'document' => $file_name,
                        ]);
                    }
                }
                elseif ("GNGPL (Goa Natural Gas Pvt.Ltd )" == ($wo_order->wo_oraganisation_name??NULL)) {
                    // Fetch appointment format
                    $appointmentFormat = AppointmentFormat::where('type', 'appointment')
                    ->where('name', 'GNGPL')
                    ->first();
                    if ($appointmentFormat) {
                        $message = $appointmentFormat->format;
                        $message_2 = $appointmentFormat->format_2;
                
                        // Prepare other variables (e.g., employee name, CTC, etc.)
                        $emp_name = $emp_salary->sal_emp_name;
                        $designation = $emp_salary->sal_emp_designation;
                        $sal_ctc = $emp_salary->sal_ctc;
                        $ctc_pa = $sal_ctc * 12;
                        $doj = date("d-m-Y", strtotime($employee->emp_doj));
                        $wo_valid_upto = date("d/m/Y", strtotime($wo_end_date));
                
                        // Handle number to words
                        $locale = 'en_US';
                        $fmt = new \NumberFormatter($locale, \NumberFormatter::SPELLOUT);
                        $in_words = $fmt->format($emp_salary->sal_net);

                        $bonus = round((8.33 / 100) * $emp_salary->sal_basic);
                        $ctc = $emp_salary->sal_gross + $emp_salary->sal_pf_employer + $emp_salary->sal_esi_employer + $bonus;
                        $ctc_pa = $ctc * 12;
                
                        // Replace placeholders in the message
                        $message_new = str_replace('{{today_date}}', now()->format('d/M/Y'), $message);
                        $message_new = str_replace('{{candidate_name}}', $emp_name, $message_new);
                        $message_new = str_replace('{{designation}}', $designation, $message_new);
                        $message_new = str_replace('{{emp_code}}', $sl_emp_code, $message_new);
                        $message_new = str_replace('{{sal_ctc}}', $sal_ctc, $message_new);
                        $message_new = str_replace('{{ctc_pa}}', $ctc_pa, $message_new);
                        $message_new = str_replace('{{basic}}', $emp_salary->sal_basic, $message_new);
                        $message_new = str_replace('{{hra}}', $emp_salary->sal_hra, $message_new);
                        $message_new = str_replace('{{conveyance}}', $emp_salary->sal_conveyance, $message_new);
                        $message_new = str_replace('{{sal_telephone}}', $emp_salary->sal_telephone, $message_new);
                        $message_new = str_replace('{{sal_pa}}', $emp_salary->medical_allowance, $message_new);
                        $message_new = str_replace('{{sal_special_allowance}}', $emp_salary->sal_special_allowance, $message_new);
                        $message_new = str_replace('{{sal_gross}}', $emp_salary->sal_gross, $message_new);
                        $message_new = str_replace('{{sal_net}}', $emp_salary->sal_net, $message_new);
                        $message_new = str_replace('{{sal_pf_emmployee}}', $emp_salary->sal_pf_emmployee, $message_new);
                        $message_new = str_replace('{{sal_esi_employee}}', $emp_salary->sal_esi_employee, $message_new);
                        $message_new = str_replace('{{sal_pf_employer}}', $emp_salary->sal_pf_employer, $message_new);
                        $message_new = str_replace('{{sal_esi_employer}}', $emp_salary->sal_esi_employer, $message_new);
                        $message_new = str_replace('{{sal_medical_ins}}', $emp_salary->sal_medical_ins, $message_new);
                        $message_new = str_replace('{{deduction}}', $emp_salary->sal_pf_employee + $emp_salary->sal_esi_employee + $emp_salary->medical_insurance, $message_new);
                        $message_new = str_replace('{{word}}', ucwords($in_words), $message_new);
                        $message_new = str_replace('{{doj}}', humanReadableFormat($doj), $message_new);
                        $message_new = str_replace('{{doe}}', humanReadableFormat($wo_end_date), $message_new);
                        $message_new = str_replace('{{wo_valid}}', $wo_valid_upto, $message_new);
                        // Continue replacing other placeholders...
                        $message_new .= $message_2;
                
                        // Generate PDF
                        $unq_no = now()->format('Ymdhisa');
                        $file_name = "appointment_{$unq_no}.pdf";
                    
                        // Use DomPDF to generate PDF
                        $pdf = App::make('dompdf.wrapper');
                        $pdf->loadHTML($message_new);
                        $pdf->save(public_path("app/public/recruitment/candidate_documents/Appointment Letter/{$file_name}"));

                        // Insert record in the database
                        EmpSendDoc::create([
                            'emp_code' => $sl_emp_code,
                            'doc_type' => 'Appointment',
                            'document' => $file_name,
                        ]);
                    }
                }else{
                    $appointmentFormat = AppointmentFormat::where('type', 'appointment')
                    ->where('name', 'BECIL')
                    ->first();
                    if ($appointmentFormat) {
                    $message = $appointmentFormat->format;
                    $message_2 = $appointmentFormat->format_2;
            
                    // Prepare other variables (e.g., employee name, CTC, etc.)
                    $emp_name = $emp_salary->sal_emp_name;
                    $designation = $emp_salary->sal_emp_designation;
                    $sal_ctc = $emp_salary->sal_ctc;
                    $ctc_pa = $sal_ctc * 12;
                    $doj = date("d-m-Y", strtotime($employee->emp_doj));
                    $wo_valid_upto = date("d/m/Y", strtotime($wo_end_date));
            
                    // Handle number to words
                    $locale = 'en_US';
                    $fmt = new \NumberFormatter($locale, \NumberFormatter::SPELLOUT);
                    $in_words = $fmt->format($emp_salary->sal_net);

                    $bonus = round((8.33 / 100) * $emp_salary->sal_basic);
                    $ctc = $emp_salary->sal_gross + $emp_salary->sal_pf_employer + $emp_salary->sal_esi_employer + $bonus;
                    $ctc_pa = $ctc * 12;
            
                    // Replace placeholders in the message
                    $message_new = str_replace('{{today_date}}', now()->format('d/M/Y'), $message);
                    $message_new = str_replace('{{candidate_name}}', $emp_name, $message_new);
                    $message_new = str_replace('{{designation}}', $designation, $message_new);
                    $message_new = str_replace('{{emp_code}}', $sl_emp_code, $message_new);
                    $message_new = str_replace('{{sal_ctc}}', $sal_ctc, $message_new);
                    $message_new = str_replace('{{ctc_pa}}', $ctc_pa, $message_new);
                    $message_new = str_replace('{{basic}}', $emp_salary->sal_basic, $message_new);
                    $message_new = str_replace('{{hra}}', $emp_salary->sal_hra, $message_new);
                    $message_new = str_replace('{{conveyance}}', $emp_salary->sal_conveyance, $message_new);
                    $message_new = str_replace('{{sal_telephone}}', $emp_salary->sal_telephone, $message_new);
                    $message_new = str_replace('{{sal_pa}}', $emp_salary->medical_allowance, $message_new);
                    $message_new = str_replace('{{sal_special_allowance}}', $emp_salary->sal_special_allowance, $message_new);
                    $message_new = str_replace('{{sal_gross}}', $emp_salary->sal_gross, $message_new);
                    $message_new = str_replace('{{sal_net}}', $emp_salary->sal_net, $message_new);
                    $message_new = str_replace('{{sal_pf_emmployee}}', $emp_salary->sal_pf_emmployee, $message_new);
                    $message_new = str_replace('{{sal_esi_employee}}', $emp_salary->sal_esi_employee, $message_new);
                    $message_new = str_replace('{{sal_pf_employer}}', $emp_salary->sal_pf_employer, $message_new);
                    $message_new = str_replace('{{sal_esi_employer}}', $emp_salary->sal_esi_employer, $message_new);
                    $message_new = str_replace('{{sal_medical_ins}}', $emp_salary->sal_medical_ins, $message_new);
                    $message_new = str_replace('{{deduction}}', $emp_salary->sal_pf_employee + $emp_salary->sal_esi_employee + $emp_salary->medical_insurance, $message_new);
                    $message_new = str_replace('{{word}}', ucwords($in_words), $message_new);
                    $message_new = str_replace('{{doj}}', humanReadableFormat($doj), $message_new);
                    $message_new = str_replace('{{doe}}', humanReadableFormat($wo_end_date), $message_new);
                    $message_new = str_replace('{{wo_valid}}', $wo_valid_upto, $message_new);
                    // Continue replacing other placeholders...
                    $message_new .= $message_2;
            
                    // Generate PDF
                    $unq_no = now()->format('Ymdhisa');
                    $file_name = "appointment_{$unq_no}.pdf";
                    
                    // Use DomPDF to generate PDF
                    $pdf = App::make('dompdf.wrapper');
                    $pdf->loadHTML($message_new);
                    $pdf->save(public_path("app/public/recruitment/candidate_documents/Appointment Letter/{$file_name}"));

                    // Insert record in the database
                    EmpSendDoc::create([
                        'emp_code' => $sl_emp_code,
                        'doc_type' => 'Appointment',
                        'document' => $file_name,
                    ]);
                    }
                }
            }
        
        return redirect()->route('salary-list')->with('success','Salary structure created Successfully !');

       }
    }
    

    public function edit_salary(Request $request){
        $id = $request->id;
        $salary = Salary::with('empDetail')->where('id',$id)->first();
        return view("hr.salary.edit-salary", compact('salary'));

    } 

    public function update_salary(Request $request)
    {
        try{
            DB::beginTransaction();
            $id = $request->salary_id;
            $request->validate([
                'sal_basic' => 'required',
                'sal_da' => 'required',
                'sal_conveyance' => 'required',
                'sal_hra' => 'required',
                'medical_allowance' => 'required',
                'sal_school_fee' => 'required',
                'sal_car_allow' => 'required',
                'sal_grade_pay' => 'required',
                'sal_special_allowance' => 'required',
                // 'sal_pf_employee' => 'required',
                // 'sal_esi_employer' => 'required',
                // 'sal_lwf_employer' => 'required',
                'sal_prof_tax' => 'required',
            ]);

            $excp_pf = ($request->exception_pf == " ") ? 'yes' : 'no';
            $excp_esi = ($request->exception_esi == " ") ? 'yes' : 'no';

            $medical_insurance_ctc = $request->medical_insurance_ctc ?: 0;
            $accident_insurance_ctc = $request->accident_insurance_ctc ?: 0;

            $salary = Salary::find($id);

            $previous_salary_data = [
                'salary_id' =>$id,
                'sal_emp_id' => $salary->sl_emp_id,
                'sal_emp_code' => $salary->sl_emp_code,
                'sal_emp_doj' => $salary->sa_emp_doj,
                'sal_emp_name' => $salary->sal_emp_name,
                'sal_emp_designation' => $salary->sal_emp_designation,
                'sal_ctc' => $salary->sal_ctc,
                'sal_gross' => $salary->sal_gross,
                'sal_net' => $salary->sal_net,
                'sal_basic' => $salary->sal_basic,
                'sal_da' => $salary->sal_da,
                'sal_conveyance' => $salary->sal_conveyance,
                'sal_hra' => $salary->sal_hra,
                'medical_allowance' => $salary->medical_allowance,
                'sal_telephone' => $salary->sal_telephone,
                'sal_school_fee' => $salary->sal_school_fee,
                'sal_car_allow' => $salary->sal_car_allow,
                'sal_grade_pay' => $salary->sal_grade_pay,
                'sal_special_allowance' => $salary->sal_special_allowance,
                'sal_pf_employee' => $salary->sal_pf_employee,
                'sal_pf_employer' => $salary->sal_pf_employer,
                'pf_exception' => $salary->pf_exception,
                'esi_exception' => $salary->esi_exception,
                'sal_lwf_employee' => $salary->sal_lwf_employee,
                'sal_esi_employer' => $salary->sal_esi_employer,
                'sal_esi_employee' => $salary->sal_esi_employee,
                'sal_lwf_employee' => $salary->sal_lwf_employee,
                'sal_prof_tax' => $salary->sal_prof_tax,
                'accident_insurance' => $salary->accident_insurance,
                'medical_insurance' => $salary->medical_insurance,
                
                'medical_insurance_ctc' => $salary->medical_insurance_ctc,
                'accident_insurance_ctc' => $salary->accident_insurance_ctc,
                'tds_deduction' => $salary->tds_deduction,
                'pf_wages' => $salary->pf_wages,
                'sal_tax' => $salary->sal_prof_tax,
                'sal_remark' => $salary->sal_remark,
                'sal_entry_by' => $salary->created_by,
                'sal_add_date' => $salary->created_at,
                // 'sal_add_date' => $salary->created_at,
                // Add any other fields you want to track
            ];
            $salary_log= new SalaryLog();
            $salary_log->create($previous_salary_data);

            // dd($request);
            $sl_emp_code = $request->sal_emp_code;
            $emp_sal_strut= EmpAccountDetail::where('emp_code',$sl_emp_code)->first();
            //  dd($emp_sal_strut);
            if ($emp_sal_strut) {
                // If PF number is provided, update it
                if (!empty($request->pf_no)) {
                    $emp_sal_strut->emp_pf_no = $request->pf_no;
                }
            
                // If ESI number is provided, update it
                if (!empty($request->esi_no)) {
                    $emp_sal_strut->emp_esi_no = $request->esi_no;
                }
                $emp_sal_strut->save();
            }
            
          
            $salary->sal_ctc = $request->sal_emp_ctc;
            $salary->sal_gross = $request->sal_gross;
            $salary->sal_net = $request->sal_net;
            $salary->sal_basic = $request->sal_basic;
            $salary->sal_hra = $request->sal_hra;
            $salary->sal_da = $request->sal_da;
            $salary->sal_conveyance = $request->sal_conveyance;
            $salary->sal_telephone = $request->sal_telephone;
            $salary->medical_allowance = $request->medical_allowance;
            $salary->sal_uniform = $request->sal_uniform;
            $salary->sal_school_fee = $request->sal_school_fee;
            $salary->sal_car_allow = $request->sal_car_allow;
            $salary->sal_grade_pay = $request->sal_grade_pay;
            $salary->sal_special_allowance = $request->sal_special_allowance;
            $salary->sal_pf_employer = $request->sal_pf_employer;
            $salary->sal_pf_employee = $request->sal_pf_employee;
            $salary->sal_esi_employer = $request->sal_esi_employer;
            $salary->sal_esi_employee = $request->sal_esi_employee;
            $salary->pf_exception = $excp_pf;
            $salary->esi_exception = $excp_esi;
            $salary->sal_lwf_employer = $request->sal_lwf_employer;
            $salary->sal_lwf_employee = $request->sal_lwf;
            $salary->medical_insurance = $request->medical_ins;
            $salary->accident_insurance = $request->accident_ins;
            $salary->tds_deduction = $request->tds_deduction;
            $salary->pf_wages = $request->pf_wages;
            $salary->sal_tax = $request->sal_prof_tax;
            $salary->medical_insurance_ctc = $medical_insurance_ctc;
            $salary->accident_insurance_ctc = $accident_insurance_ctc;
            $salary->sal_remark = $request->sal_remark;

            $salary->save();
            DB::commit(); 
            return redirect()->route('salary-list')->with('success', 'Salary structure updated successfully!');
        }catch (Throwable $e){
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    
        
    }


    /**
     * trash of user details.
     */
    public function destroy(Request $request, String $id)
    { 
        Salary::destroy($id);
        return redirect()->route('salary-list')->with(['success' =>'Salary Deleted Successfully !']);
    }

     /**
     * Export Salary structure list.
     */
    public function export_csv(Request $request)
    {
        $filename = 'salary_structure.csv';
    
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $search = $request->search;
        $salarys = Salary::with(['empDetail'])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                // Condition for empDetail fields
                $query->whereHas('empDetail', function ($q) use ($search) {
                    $q->where('emp_code', 'like', '%' . $search . '%')
                    ->orWhere('emp_name', 'like', '%' . $search . '%')
                    ->orWhere('emp_place_of_posting', 'like', '%' . $search . '%')
                    ->orWhere('emp_designation', 'like', '%' . $search . '%')
                    ->orWhere('emp_work_order', 'like', '%' . $search . '%');
                });
                
                // OR condition for bank details
                $query->orWhereHas('empDetail.getBankDetail', function ($q) use ($search) {
                    $q->where('emp_account_no', 'like', '%' . $search . '%')
                    ->orWhereHas('getBankData', function ($q) use ($search) {
                        $q->where('name_of_bank', 'like', '%' . $search . '%');
                    });
                });
            });
        })
        ->orderBy('salary.id', 'desc')
        ->get();

        return response()->stream(function () use ($salarys){
            $handle = fopen('php://output', 'w');
            $headers = array( 'Employee Code', 'Employee Name', 'Work Order' , 'Designation','Date of Joining','CTC','Gross Pay','Net pay','Basic Pay','HRA','DA','Conveyance','Special Allowance','Medical Allowance','PF Employer','PF Employee','ESI Employer','ESI Employee','TAX','TDS Deduction','Medical Insurance','PF No.','ESI No.','Bank Name','Account No.','Ifsc code','Contact no.','Email','Remarks');
            fputcsv($handle, $headers);

            foreach($salarys as $salary){
                 $data = [
                        $salary->sl_emp_code,
                        $salary->sal_emp_name,
                        $salary->empDetail->emp_work_order,
                        $salary->sal_emp_designation,
                        $salary->sa_emp_doj,
                        $salary->sal_ctc,
                        $salary->sal_gross,
                        $salary->sal_net,
                        $salary->sal_basic,
                        $salary->sal_hra,
                        $salary->sal_da,
                        $salary->sal_conveyance,
                        $salary->sal_special_allowance,
                        $salary->medical_allowance,
                        $salary->sal_pf_employer,
                        $salary->sal_pf_employee,
                        $salary->sal_esi_employer,
                        $salary->sal_esi_employee,
                        $salary->sal_tax,
                        $salary->tds_deduction,
                        $salary->empDetail->getBankDetail->emp_pf_no,
                        $salary->empDetail->getBankDetail->emp_esi_no,
                        $salary->empDetail->getBankDetail->getBankData->name_of_bank,
                        $salary->empDetail->getBankDetail->emp_account_no,
                        $salary->empDetail->getBankDetail->emp_ifsc,
                        $salary->empDetail->emp_phone_first,
                        $salary->empDetail->emp_email_first,
                        $salary->empDetail->sal_remark,
                    ];
                fputcsv($handle, $data);
            }
    
            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }

}
