<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpDetail;
use App\Models\Salary;
use App\Models\EmpSendDoc;
use App\Models\WorkOrder;
use App\Models\AppointmentFormat;
use PDF;
use Illuminate\Support\Facades\DB;
use App;
use stdClass;

class SalaryStructureController extends Controller
{
    //
    public function index(Request $request){
        $search = $request->search;

        $salary = Salary::with('empDetail')  
        ->leftJoin('emp_details', 'emp_details.emp_id', '=', 'salary.sl_emp_id')  
        ->when($search, function ($query, $search) {
            // Add the search conditions here
            $query->where(function ($query) use ($search) {
                $query->where('emp_details.emp_code', 'like', '%' . $search . '%')
                      ->orWhere('emp_details.emp_name', 'like', '%' . $search . '%')
                      ->orWhere('emp_details.emp_account_no', 'like', '%' . $search . '%')
                      ->orWhere('emp_details.emp_bank', 'like', '%' . $search . '%')
                      ->orWhere('emp_details.emp_place_of_posting', 'like', '%' . $search . '%')
                      ->orWhere('emp_details.emp_designation', 'like', '%' . $search . '%')
                      ->orWhere('emp_details.emp_work_order', 'like', '%' . $search . '%');
                      
            });
        })
        ->orderBy('emp_details.emp_status', 'desc')  
        ->orderBy('salary.id', 'desc')  
        ->select('salary.*', 'emp_details.*')  
        ->paginate(10);
    
        // dd($salary);
        return view("hr.salary.salary-list",compact('salary','search'));
    }
    public function create(){
        $employee = EmpDetail::select('emp_id','emp_code','emp_name','emp_doj','emp_designation','emp_salary')->where('emp_sal_structure_status','pending')->get();
        // dd($employee);
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
        'sal_pf_employee' => 'required',
        'sal_esi_employer' => 'required',
        'sal_lwf_employer' => 'required',
        'sal_prof_tax' => 'required',
       ]);
       // dd($request);
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
        $ex_salary= Salary::where('sl_Emp_id',$sal_emp_id)->first();
        // dd($ex_salary);
        if(!empty($ex_salary)){
            return redirect()->route('create-salary')->with('success','Salary structure already exist in system !');
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
        
        $employee= EmpDetail::find($sal_emp_id);
        // $employee->update([
        //     'emp_sal_structure_status'=>'completed']);
        //  dd($employee);


        // send appointment letter code start here
        // check send appointment or not 
        $emp_send_doc= EmpSendDoc::where('emp_code',$sal_emp_id)->where('doc_type','Appointment')->orderby('id','desc')->first();
        if(!empty($emp_send_doc)){
            $docs = $empData->document;
          
        }else{

            // check employee salray
            $emp_salary = Salary::where('sl_emp_id', $sal_emp_id)->first();
            $sl_emp_code =$emp_salary->sl_emp_code;
            // employee wo 
            $work_or_no =$employee->emp_work_order;
           
            // get wo end date
            $wo_order= WorkOrder::where('wo_number',$work_or_no)->orderby('id','desc')->first();
             $wo_end_date = $wo_order->wo_end_date;
          
           
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
                        $pdf->save(public_path("Documents/Appointment Letter/{$file_name}"));

                        // Insert record in the database
                        EmpSendDoc::create([
                            'emp_code' => $sl_emp_code,
                            'doc_type' => 'Appointment',
                            'document' => $file_name,
                        ]);
                    }
                }
            }elseif ("GNGPL (Goa Natural Gas Pvt.Ltd )" == ($wo_order->wo_oraganisation_name)) {
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
                    $pdf->save(public_path("app/public/Documents/Appointment Letter/{$file_name}"));

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
                   $pdf->save(public_path("app/public/Documents/Appointment Letter/{$file_name}"));

                   // Insert record in the database
                   EmpSendDoc::create([
                       'emp_code' => $sl_emp_code,
                       'doc_type' => 'Appointment',
                       'document' => $file_name,
                   ]);
                }
            }
        
        return redirect()->route('salary-list')->with('success','Salary structure created Successfully !');

       }
}
}
