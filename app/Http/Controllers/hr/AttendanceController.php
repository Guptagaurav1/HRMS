<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WoAttendance;
use App\Models\WorkOrder;
use App\Models\EmpDetail;
use App\Models\Salary;
use App\Models\EmpSalarySlip;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request ,string $wo_id)
    {
    //    dd($request->month);
        $workOrder= WorkOrder::find($wo_id);
        $wo_number= $workOrder->wo_number??NULL;
      

        $month = $request->input('month'); 
        $emp_status = $request->input('emp_status'); 
        $search = $request->input('search'); 
       
        $curr_month_year = Carbon::parse($month);
        $m_y = $curr_month_year->format('F Y');
        $cur_m_y = $curr_month_year->endOfMonth()->format('Y-m-31');
        
        if(!empty($month)){
            if(!empty($emp_status)){

                    $wo_emps = DB::table('emp_details as emp')
                        ->distinct()
                        ->selectRaw("work.wo_end_date, work.wo_start_date, wo.emp_id, emp.*, emp.emp_code AS employ_code,emp.emp_id AS employ_id ")
                        ->leftJoin('wo_attendances as wo', 'emp.emp_id', '=', 'wo.emp_id')
                        ->leftJoin('work_orders as work', 'work.wo_number', '=', 'emp.emp_work_order')
                        ->when($search, function ($query, $search) {
                            // Add the search conditions here
                            $query->where(function ($query) use ($search) {
                                $query->where('emp.emp_code', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_name', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_account_no', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_bank', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_place_of_posting', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_designation', 'like', '%' . $search . '%');
                            });
                        })
                        ->where('emp.emp_work_order', $wo_number)
                        ->where('emp.emp_sal_structure_status', 'completed')
                        ->where('emp.emp_doj','<', $cur_m_y)
                        ->where('emp.emp_status','=', $emp_status)
                        ->whereRaw("
                            CONCAT(emp.emp_id,'',?) NOT IN (
                                SELECT at_emp 
                                FROM wo_attendances 
                                WHERE wo_number = ?
                            )
                        ", [$m_y, $wo_number])
                        ->paginate(10)->appends(request()->query());
            }else{
                $wo_emps = DB::table('emp_details as emp')
                ->distinct()
                ->selectRaw("work.wo_end_date, work.wo_start_date, wo.emp_id, emp.*, emp.emp_code AS employ_code,emp.emp_id AS employ_id ")
                ->leftJoin('wo_attendances as wo', 'emp.emp_id', '=', 'wo.emp_id')
                ->leftJoin('work_orders as work', 'work.wo_number', '=', 'emp.emp_work_order')
                ->when($search, function ($query, $search) {
                    // Add the search conditions here
                    $query->where(function ($query) use ($search) {
                        $query->where('emp.emp_code', 'like', '%' . $search . '%')
                              ->orWhere('emp.emp_name', 'like', '%' . $search . '%')
                              ->orWhere('emp.emp_account_no', 'like', '%' . $search . '%')
                              ->orWhere('emp.emp_bank', 'like', '%' . $search . '%')
                              ->orWhere('emp.emp_place_of_posting', 'like', '%' . $search . '%')
                              ->orWhere('emp.emp_designation', 'like', '%' . $search . '%');
                    });
                })
                ->where('emp.emp_work_order', $wo_number)
                ->where('emp.emp_sal_structure_status', 'completed')
                ->where('emp.emp_doj','<', $cur_m_y)
                ->whereRaw("
                    CONCAT(emp.emp_id,'',?) NOT IN (
                        SELECT at_emp 
                        FROM wo_attendances 
                        WHERE wo_number = ?
                    )
                ", [$m_y, $wo_number])
                ->paginate(10)->appends(request()->query());
            }
        }else{
            $wo_emps="";
        }
            // dd($wo_emps);
        return view("hr.attendance.go-to-attendance",compact('wo_emps','wo_id','month'));
    }

    public function add_attendance(Request $request, string $wo_id){
        dd($request->all());

        $workOrder= WorkOrder::find($wo_id);
        $wo_number= $workOrder->wo_number??NULL;
        // dd($wo_number);
        $check_emps = $request->check;
        if(empty($check_emps)){
            return redirect()->route('go-to-attendance',$wo_id)->with('error','Please checked the checkbox before submit attendance.');
        }
        foreach($check_emps as $key => $check_emp){
        
           
            $userId = auth()->id();
            
            $attendance = $request->attendance_month; 
            $attendance_month = Carbon::parse($attendance)->format('F Y');
            
            $date_of_resign =$request->dor[$check_emp];
            $at_emp = $check_emp."". $attendance_month;
            $exit_wo_attendance_id = WoAttendance::where('at_emp', $check_emp)->first();
           
            if(empty($exit_wo_attendance_id)){
                $wo_attendance = new WoAttendance();
                $wo_attendance->wo_number = $wo_number; 
                $wo_attendance->at_emp = $at_emp; 
                $wo_attendance->emp_id = $check_emp; 
                $wo_attendance->emp_code = $request->emp_code[$check_emp]; 
                $wo_attendance->attendance_month = $attendance_month; 
                $wo_attendance->approve_leave = $request->at_appr_leave[$check_emp]; 
                $wo_attendance->lwp_leave = $request->leave[$check_emp]; 
            
                $wo_attendance->recovery = $request->recovery[$check_emp]; 
                $wo_attendance->advance = $request->advance[$check_emp]; 
                $wo_attendance->overtime_rate = $request->overtime_rate[$check_emp]; 
                $wo_attendance->total_working_hrs = $request->total_working_hrs[$check_emp]; 
                $wo_attendance->designation = $request->emp_designation[$check_emp]; 
                $wo_attendance->emp_vendor_rate = $request->emp_vendor_rate[$check_emp]; 
                $wo_attendance->ctc = $request->emp_ctc[$check_emp]; 
                $wo_attendance->remarks = $request->remarks[$check_emp]; 
                $wo_attendance->attendance_status = "completed"; 
                $wo_attendance->user_id = $userId; 
                $wo_attendance->save();
            }else{

                $data=[
                    'wo_number' => $wo_number,
                    'at_emp' => $at_emp, 
                    'emp_id' => $check_emp, 
                    'emp_code' => $request->emp_code[$check_emp], 
                    'attendance_month' => $attendance_month, 
                    'approve_leave' => $request->at_appr_leave[$check_emp], 
                    'lwp_leave' => $request->leave[$check_emp], 
                   
                    'recovery' => $request->recovery[$check_emp], 
                    'advance' => $request->advance[$check_emp], 
                    'overtime_rate' => $request->overtime_rate[$check_emp], 
                    'total_working_hrs' => $request->total_working_hrs[$check_emp], 
                    'designation' => $request->emp_designation[$check_emp], 
                    'emp_vendor_rate' => $request->emp_vendor_rate[$check_emp], 
                    'ctc' => $request->emp_ctc[$check_emp], 
                    'remarks' => $request->remarks[$check_emp], 
                    'attendance_status' => "completed", 
                    'user_id' => $userId, 
                ];      
                // dd('update');
                $exit_wo_attendance_id->update($data);
                
            }
            // update employee working status
            if(!empty($date_of_resign) || $date_of_resign != ' '){
                $employee = EmpDetail::where('emp_id', $check_emp)->first();
                if ($employee) {
                  
                    $employee->emp_current_working_status = 'resign';
                    $employee->emp_dor = $date_of_resign;
                    $employee->save();
                }
            }
            
        }
        return redirect()->route('go-to-attendance',$wo_id)->with('success','Attendance created !');

    }

    public function wo_sal_attendance(Request $request){
       
        $wo_id = $request->work_order;
        $month = $request->month;
        $workOrder= WorkOrder::find($wo_id);
        
        $workOrders = WorkOrder::orderBy('id','desc')->get();
        $wo_number= $workOrder->wo_number??NULL;
      
        $month = $request->input('month'); 
        $emp_status = $request->input('emp_status'); 
        $search = $request->input('search'); 
       
        $curr_month_year = Carbon::parse($month);
        $m_y = $curr_month_year->format('F Y');
        $cur_m_y = $curr_month_year->endOfMonth()->format('Y-m-31');
        
        if(!empty($month)){
            if(!empty($emp_status)){

                    $wo_emps = DB::table('emp_details as emp')
                        ->distinct()
                        ->selectRaw("work.wo_end_date, work.wo_start_date, wo.emp_id, emp.*, emp.emp_code AS employ_code,emp.emp_id AS employ_id ")
                        ->leftJoin('wo_attendances as wo', 'emp.emp_id', '=', 'wo.emp_id')
                        ->leftJoin('work_orders as work', 'work.wo_number', '=', 'emp.emp_work_order')
                        ->when($search, function ($query, $search) {
                            // Add the search conditions here
                            $query->where(function ($query) use ($search) {
                                $query->where('emp.emp_code', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_name', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_account_no', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_bank', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_place_of_posting', 'like', '%' . $search . '%')
                                    ->orWhere('emp.emp_designation', 'like', '%' . $search . '%');
                            });
                        })
                        ->where('wo.attendance_month', $m_y)
                        ->where('wo.wo_number', $wo_number)
                        ->where('emp.emp_work_order', $wo_number)
                        ->where('emp.emp_sal_structure_status', 'completed')
                        ->where('emp.emp_doj','<', $cur_m_y)
                        ->where('emp.emp_status','=', $emp_status)
                        ->whereRaw("
                            CONCAT(emp.emp_id,'',?) NOT IN (
                                SELECT at_emp 
                                FROM wo_attendances 
                                WHERE wo_number = ?
                            )
                        ", [$m_y, $wo_number])
                        ->paginate(10)->appends(request()->query());
            }else{
                $wo_emps = WoAttendance::select('*', 'work.wo_start_date')
                ->join('emp_details', 'wo_attendances.emp_id', '=', 'emp_details.emp_id')
                ->join('salary', 'salary.sl_emp_code', '=', 'wo_attendances.emp_code')
                ->leftJoin('work_orders as work', 'work.wo_number', '=', 'emp_details.emp_work_order')
                ->where('wo_attendances.attendance_month', $m_y)
                ->where('emp_details.emp_work_order', $wo_number)
                ->where('emp_details.emp_status', 'Active')
                ->where('emp_details.emp_sal_structure_status', 'completed')
                
                ->whereRaw("
                CONCAT(emp_details.emp_id,'',?) NOT IN (
                    SELECT wo_attendance_at_emp 
                    FROM emp_salary_slip 
                    WHERE work_order = ?
                )
            ", [$m_y, $wo_number])
                ->where('wo_attendances.wo_number', $wo_number)
                ->paginate(10)->appends(request()->query());
            }
        }else{
            $wo_emps="";
        }
        //  dd($wo_emps);
        return view("hr.attendance.wo-sal-attendance" ,compact('wo_id','month','wo_emps','workOrders'));

    }

    public function wo_sal_calculate(Request $request){
        // dd($request);
       
       
        // $workOrder= WorkOrder::find($wo_id);
        // $wo_number= $workOrder->wo_number??NULL;
        $check_emps = $request->check;
        if(empty($check_emps)){
            return redirect()->route('wo-sal-attendance')->with('error','Please checked the checkbox before submit attendance.');
        }
        foreach($check_emps as $key => $check_emp){
        
            $userId = auth()->id();
            $attendance = $request->attendance_month; 
            $attendance_month = Carbon::parse($attendance)->format('F Y');

            $at_appr_leave = $request->at_appr_leave[$check_emp]??NULL;
            $lwp_leave = $request->lwp_leave[$check_emp]??NULL;
            $sal_emp_doj = $request->sal_emp_doj[$check_emp]??NULL;
            $sal_basic = $request->sal_basic[$check_emp]??NULL;
            $sal_pf_employee = $request->sal_pf_employee[$check_emp]??NULL;
            $sal_hra = $request->sal_hra[$check_emp]??NULL;
            $sal_esi_employee = $request->sal_esi_employee[$check_emp]??NULL;
            $sal_pf_wages = $request->emp_pf_wages[$check_emp]??NULL;
            $sal_conveyance = $request->sal_conveyance[$check_emp]??NULL;
            $medical_allowance = $request->medical_allowance[$check_emp]??NULL;
            $sal_special_allowance = $request->sal_special_allowance[$check_emp]??NULL;
            $overtime_rate = $request->overtime_rate[$check_emp]??NULL;
            $total_working_hrs = $request->total_working_hrs[$check_emp]??NULL;
            $sa_emp_dor = $request->sa_emp_dor[$check_emp]??NULL;
            $medical_insurance_ctc = $request->medical_insurance_ctc[$check_emp]??NULL;
            $accident_insurance_ctc = $request->accident_insurance_ctc[$check_emp]??NULL;
            $sal_esi_wages = $request->sal_esi_wages[$check_emp]??NULL;
            $sal_medical_insurance = $request->sal_medical_insurance[$check_emp]??NULL;
            $sal_accidental_insurance = $request->sal_accidental_insurance[$check_emp]??NULL;
            $sal_tax = $request->sal_tax[$check_emp]??NULL;
            $tds_deduction = $request->tds_deduction[$check_emp]??NULL;
            $sal_recovery = $request->sal_recovery[$check_emp]??NULL;
            $sal_advance = $request->sal_advance[$check_emp]??NULL;
            $sal_recovery = $request->sal_recovery[$check_emp]??NULL;
           
            $year_day = date('Y', strtotime($attendance_month));
            $month_day = date('m', strtotime($attendance_month));
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month_day, $year_day);
            // dd($lwp_leave);
            if ($at_appr_leave > $lwp_leave) {
              $gap_in_service =  0;
              $working_days = $days_in_month - $gap_in_service; //calculate working days
      
            } 
            else {
              $gap_in_service = $lwp_leave - $at_appr_leave; //get actual leave without wallet leave
              $working_days = $days_in_month - $gap_in_service; //calculate working days 
      
            }
            //calculate working days end
            //calculate actual salary in month
            $date = date_parse($attendance_month);
            $month = $date['month'];
            $year = $date['year'];
      
            $start_date = date("Y-m-d", strtotime($month . "/01/" . $year));
            // $last_date = date("Y-m-d", strtotime($month . "/" . $days . "/" . $year));
            $last_date = date("Y-m-d", strtotime($month . "/" . "31" . "/" . $year));
           
            if (($sal_emp_doj >= $start_date) && ($sal_emp_doj <= $last_date)) {
              $from = changeSqlToUser_DateFromat($sa_emp_doj);
            } else {
              $from = changeSqlToUser_DateFromat($start_date);
            }
           
            if (($sa_emp_dor >= $start_date) && ($sa_emp_dor <= $last_date)) {
              $to = changeSqlToUser_DateFromat($sa_emp_dor);
            } else {
              $to = changeSqlToUser_DateFromat($last_date);
            }
            
            $sal_basic = round($sal_basic * $working_days / $days_in_month);
            $sal_pf_employee = round(($sal_pf_employee * $working_days) / $days_in_month);
           
            $sal_hra = round($sal_hra * $working_days / $days_in_month);
            $sal_esi_employee = round(($sal_esi_employee * $working_days) / $days_in_month);
            // $sal_esi_employee = round($sal_esi_employee);
            
            
            $sal_pf_wages = round($sal_pf_wages * $working_days / $days_in_month);
            
            $sal_conveyance = round($sal_conveyance * $working_days / $days_in_month);
            $medical_allowance = round($medical_allowance * $working_days / $days_in_month);
            $sal_special_allowance = round($sal_special_allowance * $working_days / $days_in_month);
            //deduction
      
            //overtime
            $total_overtime_allowance =round($overtime_rate * $total_working_hrs);
            if(isset($total_overtime_allowance) && !empty ($total_overtime_allowance))
            {
               $new_overtime_allowance = $total_overtime_allowance;
            }
            else {
              $new_overtime_allowance= 0;
            }
      
            $sal_gross = $sal_basic + $sal_hra + $sal_conveyance + $medical_allowance + $sal_special_allowance + $new_overtime_allowance - $medical_insurance_ctc - $accident_insurance_ctc;
            
            if($sal_esi_wages > 0){
              $sal_esi_wages = $sal_gross;
            }
          
            $sal_total_deduction =  $sal_pf_employee + $sal_esi_employee +$sal_medical_insurance + $sal_accidental_insurance+ $sal_tax + $tds_deduction;
            $sal_net = $sal_gross - $sal_total_deduction - $sal_recovery - $sal_advance;
           ///////////////////
            // $at_emp = $check_emp."". $attendance_month;
            $EmpSalarySlip = new EmpSalarySlip();
            // $date_of_resign = $request->dor[$check_emp]; 
            $EmpSalarySlip->work_order = $request->work_order; 
            $EmpSalarySlip->sal_emp_code = $request->emp_code[$check_emp]??NULL; 
            
            $EmpSalarySlip->wo_attendance_at_emp = $request->at_appr_leave[$check_emp]??NULL; 
            $EmpSalarySlip->sal_emp_name = $request->sal_emp_name[$check_emp]??NULL; 
            $EmpSalarySlip->sal_emp_email = $request->sal_emp_email[$check_emp]??NULL; 
            $EmpSalarySlip->sal_month = $attendance_month; 
            $EmpSalarySlip->sal_pf_number = $sal_pf_employee; 
            $EmpSalarySlip->sal_esi_number = $sal_esi_employee; 
            $EmpSalarySlip->sal_aadhar_no = ''; 
            $EmpSalarySlip->sal_pan_no = ''; 
            $EmpSalarySlip->sal_designation = ''; 
            $EmpSalarySlip->sal_account_no = ''; 
            $EmpSalarySlip->sal_uan_no = ''; 
            $EmpSalarySlip->emp_sal_ctc = $request->sal_ctc[$check_emp]; 
            $EmpSalarySlip->sal_basic = $sal_basic; 
            $EmpSalarySlip->sal_hra = $sal_hra; 
            $EmpSalarySlip->sal_conveyance = $sal_conveyance; 
            $EmpSalarySlip->sal_medical_allowance = $sal_special_allowance; 
            $EmpSalarySlip->sal_gross = $sal_gross; 
            $EmpSalarySlip->sal_net = $sal_net; 
            $EmpSalarySlip->sal_pf_employee = $sal_pf_employee; 
            $EmpSalarySlip->sal_esi_employee = $sal_esi_employee; 
            $EmpSalarySlip->sal_recovery = $sal_recovery; 
            $EmpSalarySlip->sal_pf_wages = $sal_pf_wages; 
            $EmpSalarySlip->sal_esi_wages = $sal_esi_wages; 
            $EmpSalarySlip->sal_advance = $sal_advance; 
            $EmpSalarySlip->sal_medical_insurance = $sal_medical_insurance; 
            $EmpSalarySlip->sal_accident_insurance = $attendance_month; 
            $EmpSalarySlip->tds_deduction = $tds_deduction; 
            $EmpSalarySlip->sal_tax = $sal_tax; 
            $EmpSalarySlip->sal_medical_insurance_ctc = $medical_insurance_ctc; 
            $EmpSalarySlip->sal_accident_insurance_ctc = $accident_insurance_ctc; 
            $EmpSalarySlip->sal_group_medical = '0'; 
            $EmpSalarySlip->sal_total_deduction = $sal_total_deduction; 
            $EmpSalarySlip->sal_doj = $sal_emp_doj; 
            $EmpSalarySlip->total_overtime_allowance = $total_overtime_allowance; 
             
            $EmpSalarySlip->sal_remarks = $request->remarks[$check_emp]??NULL; 
           
            $EmpSalarySlip->user_id = $userId;
            $EmpSalarySlip->save();
        }
        return redirect()->route('wo-sal-attendance')->with('success','salary created !');
    }
}
