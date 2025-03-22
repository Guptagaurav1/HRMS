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
use App\Models\EmpAccountDetail;
use App\Models\EmpPersonalDetail;
use App\Models\EmpAddressDetail;

class AttendanceController extends Controller
{
    public function index(Request $request ,string $wo_id)
    {
    
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
                    $wo_emps = EmpDetail::with('woAttendance')
                    ->where('emp_work_order', $wo_number)
                    ->where('emp_doj', '<', $cur_m_y)
                    ->where('emp_current_working_status','=', $emp_status)
                    ->whereHas('getBankDetail', function ($query) {
                            $query->where('emp_sal_structure_status', 'completed');
                        })
                   
                    ->whereNotIn('id', function ($query) use ($wo_number, $m_y) {
                        $query->select('at_emp')
                            ->from('wo_attendances')
                            ->where('wo_number', $wo_number)
                            ->whereRaw("CONCAT(at_emp, '', ?) = emp_details.id", [$m_y]);
                    })
                    ->when($search, function ($query, $search) {
                        $query->where(function ($query) use ($search) {
                            $query->where('emp_code', 'like', '%' . $search . '%')
                                ->orWhere('emp_name', 'like', '%' . $search . '%')
                                ->whereHas('getBankDetail', function ($query) use ($search) {
                                    $query->where('emp_account_no', 'like', '%' . $search . '%')
                                    ->whereHas('getBankData', function ($query) use ($search) {
                                        $query->where('name_of_bank', 'like', '%' . $search . '%');
                                    });
                                   })
                                ->orWhere('emp_place_of_posting', 'like', '%' . $search . '%')
                                ->orWhere('emp_designation', 'like', '%' . $search . '%');
                        });
                    })
                    ->paginate(10);
                 
            }else{
                
                 $wo_emps = EmpDetail::with('woAttendance')
                    ->where('emp_work_order', $wo_number)
                    ->where('emp_doj', '<', $cur_m_y)
                    ->whereHas('getBankDetail', function ($query) {
                            $query->where('emp_sal_structure_status', 'completed');
                        })
                   
                    ->whereNotIn('id', function ($query) use ($wo_number, $m_y) {
                        $query->select('at_emp')
                            ->from('wo_attendances')
                            ->where('wo_number', $wo_number)
                            ->whereRaw("CONCAT(at_emp, '', ?) = emp_details.id", [$m_y]);
                    })
                    ->when($search, function ($query, $search) {
                        // Add search conditions here
                        $query->where(function ($query) use ($search) {
                            $query->where('emp_code', 'like', '%' . $search . '%')
                                ->orWhere('emp_name', 'like', '%' . $search . '%')
                                ->whereHas('getBankDetail', function ($query) use ($search) {
                                    $query->where('emp_account_no', 'like', '%' . $search . '%')
                                    ->whereHas('getBankData', function ($query) use ($search) {
                                        $query->where('name_of_bank', 'like', '%' . $search . '%');
                                    });
                                   })
                                ->orWhere('emp_place_of_posting', 'like', '%' . $search . '%')
                                ->orWhere('emp_designation', 'like', '%' . $search . '%');
                        });
                    })
                    ->paginate(10);
                    // ->appends(request()->query());
            }
        }else{
            $wo_emps="";
        }
            // dd($wo_emps);
        return view("hr.attendance.go-to-attendance",compact('wo_emps','wo_id','wo_number','month'));
    }

    public function add_attendance(Request $request, string $wo_id){
        // dd($request->all());

        $workOrder= WorkOrder::find($wo_id);
        $wo_number= $workOrder->wo_number??NULL;
        $check_emps = $request->check;
        if(empty($check_emps)){
            return redirect()->route('go-to-attendance',$wo_id)->with('error','Please checked the checkbox before submit attendance.');
        }
        foreach($check_emps as $key => $check_emp){
        
            $userId = auth()->id();
            
            $attendance = $request->attendance_month; 
            $attendance_month = Carbon::parse($attendance)->format('F Y');
            
            $date_of_resign =$request->dor[$key]??NULL;
            $at_emp = $check_emp."". $attendance_month;
            $exit_wo_attendance_id = WoAttendance::where('at_emp', $at_emp)->first();
           
            if(empty($exit_wo_attendance_id)){
                $wo_attendance = new WoAttendance();
                $wo_attendance->wo_number = $wo_number; 
                $wo_attendance->at_emp = $at_emp; 
                $wo_attendance->emp_id = $check_emp; 
                $wo_attendance->emp_code = $request->emp_code_check[$key]??NULL; 
                $wo_attendance->attendance_month = $attendance_month; 
                $wo_attendance->approve_leave = $request->at_appr_leave_check[$key]??NULL; 
                $wo_attendance->lwp_leave = $request->leave_check[$key]??NULL; 
            
                $wo_attendance->recovery = $request->recovery_check[$key]??NULL; 
                $wo_attendance->advance = $request->advance_check[$key]??NULL; 
                $wo_attendance->overtime_rate = $request->overtime_rate_check[$key]??NULL; 
                $wo_attendance->total_working_hrs = $request->total_working_hrs_check[$key]??NULL; 
                $wo_attendance->designation = $request->emp_designation_check[$key]??NULL; 
                $wo_attendance->emp_vendor_rate = $request->emp_vendor_rate_check[$key]??NULL; 
                $wo_attendance->ctc = $request->emp_ctc_check[$key]??NULL; 
                $wo_attendance->remarks = $request->remarks_check[$key]??NULL; 
                $wo_attendance->attendance_status = "completed"; 
                $wo_attendance->user_id = $userId;
                
                $wo_attendance->save();
            }else{

                $data=[
                    'wo_number' => $wo_number,
                    'at_emp' => $at_emp, 
                    'emp_id' => $check_emp, 
                    'emp_code' => $request->emp_code[$key]??NULL, 
                    'attendance_month' => $attendance_month, 
                    'approve_leave' => $request->at_appr_leave[$key]??NULL, 
                    'lwp_leave' => $request->leave[$key]??NULL, 
                   
                    'recovery' => $request->recovery[$key]??NULL, 
                    'advance' => $request->advance[$key]??NULL, 
                    'overtime_rate' => $request->overtime_rate[$key]??NULL, 
                    'total_working_hrs' => $request->total_working_hrs_check[$key]??NULL, 
                    'designation' => $request->emp_designation[$key]??NULL, 
                    'emp_vendor_rate' => $request->emp_vendor_rate[$key]??NULL, 
                    'ctc' => $request->emp_ctc[$key]??NULL, 
                    'remarks' => $request->remarks[$key]??NULL, 
                    'attendance_status' => "completed", 
                    'user_id' => $userId, 
                ];      
                // dd('update');
                $exit_wo_attendance_id->update($data);
                
            }
            // update employee working status
            // if(!empty($date_of_resign) || $date_of_resign != ' '){
            //     $employee = EmpDetail::where('emp_id', $check_emp)->first();
            //     if ($employee) {
                  
            //         $employee->emp_current_working_status = 'resign';
            //         $employee->emp_dor = $date_of_resign;
            //         $employee->save();
            //     }
            // }
            
        }
        return redirect()->route('go-to-attendance',$wo_id)->with('success','Attendance created !');

    }

    public function wo_sal_attendance(Request $request){
        $search = $request->search;
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
        
            $wo_emps = WoAttendance::with(['empDetail'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->whereHas('empDetail', function ($query) use($search) {
                        // Search on empDetail fields
                        $query->where('emp_code', 'like', '%' . $search . '%')
                            ->orWhere('emp_name', 'like', '%' . $search . '%')
                            ->orWhere('emp_place_of_posting', 'like', '%' . $search . '%')
                            ->orWhere('emp_designation', 'like', '%' . $search . '%')
                            ->whereHas('getBankDetail', function ($query) use ($search) {
                                // Search in bank detail fields
                                $query->where('emp_account_no', 'like', '%' . $search . '%')
                                    ->whereHas('getBankData', function ($query) use ($search) {
                                        // Search in bank data fields
                                        $query->where('name_of_bank', 'like', '%' . $search . '%');
                                    });
                            });
                    });
                });
            })
            ->where('attendance_month', $m_y)
            ->where('wo_number', $wo_number)
            ->whereHas('empDetail', function ($query) use($wo_number) {
                // Ensure related empDetail has emp_work_order
                $query->where('emp_work_order', $wo_number)
                    ->whereHas('getBankDetail', function ($query) {
                        $query->where('emp_sal_structure_status', 'completed');
                    });
            })
            ->whereRaw("CONCAT(emp_id,'',?) NOT IN (
                    SELECT wo_attendance_at_emp 
                    FROM emp_salary_slip 
                    WHERE work_order = ?
                )", [$m_y, $wo_number])
            ->paginate(10)
            ->appends(request()->query());
        
        }else{
            $wo_emps="";
        }
    
        return view("hr.attendance.wo-sal-attendance" ,compact('wo_id','wo_number','month','wo_emps','workOrders'));

    }

    public function wo_sal_calculate(Request $request){
        
        $check_emps = $request->check;
        if(empty($check_emps)){
            return redirect()->route('wo-sal-attendance')->with('error','Please checked the checkbox before submit attendance.');
        }
        foreach($check_emps as $key => $check_emp){
        
            $userId = auth()->id();
            $attendance = $request->month_date; 
            $attendance_month = Carbon::parse($attendance)->format('F Y');
           
            $at_appr_leave = $request->at_appr_leave_check[$key]??NULL;
            $lwp_leave = $request->lwp_leave_check[$key]??NULL;
            $sal_emp_doj = $request->sal_emp_doj_check[$key]??NULL;
            $sal_basic = $request->sal_basic_check[$key]??NULL;
            $sal_pf_employee = $request->sal_pf_employee_check[$key]??NULL;
            $sal_hra = $request->sal_hra_check[$key]??NULL;
            $sal_esi_employee = $request->sal_esi_employee_check[$key]??NULL;
            $sal_pf_wages = $request->emp_pf_wages_check[$key]??NULL;
            $sal_conveyance = $request->sal_conveyance_check[$key]??NULL;
            $medical_allowance = $request->medical_allowance_check[$key]??NULL;
            $sal_special_allowance = $request->sal_special_allowance_check[$key]??NULL;
            $overtime_rate = $request->overtime_rate_check[$key]??NULL;
            $total_working_hrs = $request->total_working_hrs_check[$key]??NULL;
            $sa_emp_dor = $request->sa_emp_dor_check[$key]??NULL;
            $medical_insurance_ctc = $request->medical_insurance_ctc_check[$key]??NULL;
            $accident_insurance_ctc = $request->accident_insurance_ctc_check[$key]??NULL;
            $sal_esi_wages = $request->sal_esi_wages_check[$key]??NULL;
            $sal_medical_insurance = $request->sal_medical_insurance_check[$key]??NULL;
            $sal_accidental_insurance = $request->sal_accidental_insurance_check[$key]??NULL;
            $sal_tax = $request->sal_tax_check[$key]??NULL;
            $tds_deduction = $request->tds_deduction_check[$key]??NULL;
            $sal_recovery = $request->sal_recovery_check[$key]??NULL;
            $sal_advance = $request->sal_advance_check[$key]??NULL;
            $sal_recovery = $request->sal_recovery_check[$key]??NULL;

            
           
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
           
            $at_emp = $check_emp."". $attendance_month;
            $workOrder_id =$request->work_order;
            $workOrder= WorkOrder::find($workOrder_id);
            $wo_number= $workOrder->wo_number??NULL;
            $EmpSalarySlip = new EmpSalarySlip();
           
            $EmpSalarySlip->work_order = $wo_number; 
            $EmpSalarySlip->sal_emp_code = $request->emp_code_check[$key]??NULL; 
            
            $EmpSalarySlip->wo_attendance_at_emp = $at_emp??NULL; 
            $EmpSalarySlip->sal_emp_name = $request->sal_emp_email_check[$key]??NULL; 
            $EmpSalarySlip->sal_emp_email = $request->sal_emp_email_check[$key]??NULL; 
            $EmpSalarySlip->sal_month = $attendance_month; 
            $EmpSalarySlip->sal_pf_number = $sal_pf_employee; 
            $EmpSalarySlip->sal_working_days = $working_days; 
            $EmpSalarySlip->sal_esi_number = $sal_esi_employee; 

            $EmpSalarySlip->sal_aadhar_no = $request->emp_aadhaar_no_check[$key]??NULL;
            $EmpSalarySlip->sal_pan_no = $request->emp_pan_check[$key]??NULL;
            $EmpSalarySlip->sal_designation = $request->emp_designation_check[$key]??NULL;
            $EmpSalarySlip->sal_account_no = $request->emp_account_no_check[$key]??NULL; 
            $EmpSalarySlip->sal_uan_no = $request->emp_pf_no_check[$key]??NULL;
            $EmpSalarySlip->emp_sal_ctc = $request->sal_ctc_check[$key]??NULL; 

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
             
            $EmpSalarySlip->sal_remarks = $request->remarks_check[$key]??NULL; 
           
            $EmpSalarySlip->user_id = $userId;
            $EmpSalarySlip->save();
        }
     
        return redirect()->route('wo-generate-salary',compact('attendance_month','workOrder'))->with('success','Salary Slip Calculated Successfully');
    }

    // current active employee salary save list
    public function wo_generate_salary(Request $request){ 
        $wo_id = $request->workOrder;
        $workOrder= WorkOrder::find($wo_id);
        $wo_number= $workOrder->wo_number??NULL;
        $m_y = $request->attendance_month;
      
        $wo_emps = WoAttendance::with(['empDetail'])  
        // $wo_emps = WoAttendance::with([
        //     'empDetail:id,emp_code,emp_name,emp_work_order,emp_current_working_status,emp_doj,emp_place_of_posting,emp_designation',
        //     'empDetail.getBankDetail:id,emp_account_no', 
        //     'empDetail.getBankDetail.getBankData:name_of_bank',
        //     'empDetail.getPersonalDetail:id,emp_gender'
        // ])
        ->where('attendance_month', $m_y)
        ->whereHas('empDetail', function ($query) use ($wo_number) {
            $query->where('emp_work_order', $wo_number)
                  ->where('emp_current_working_status', 'Active')
                  ->whereHas('getBankDetail', function ($query) {
                      $query->where('emp_sal_structure_status', 'completed');
                  })
                  ->whereHas('getPersonalDetail'); // Ensuring personal detail exists
        })
        ->paginate(10)
        ->appends(request()->query());
        
        //  dd($wo_emps[0]->empDetail);
        return view("hr.attendance.wo-generate-salary-list",compact('wo_emps','wo_number','m_y'));
    }

    // upload bulk attendancen start here
    public function upload_bulk_attendance(){
        return view("hr.attendance.upload-attendance");
    }
    // upload bulk attendancen end here


    // create bulk attendance start here
    public function create_bulk_attendance(Request $request){
        // dd($request);
        $request->validate([
            'csv_data' => 'required|file|mimes:csv,txt|max:2048', // Ensure it's a CSV file
        ]);
        // dd($request);
        // Handle the file upload
        if ($request->hasFile('csv_data')) {
            $file = $request->file('csv_data');
            $handle = fopen($file->getRealPath(), "r");

            $counter = 0;
            DB::beginTransaction(); // Start a database transaction

            try {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    // dd($data);
                    if ($counter > 0) { // Skip the header row
                        $emp_code = $data[0]??NULL;
                        $emp_wo = $data[1]??NULL;
                        $emp_at_month = $data[2]??NULL;
                        $emp_at_year = $data[3]??NULL;
                        $emp_working_days = $data[4]??NULL;
                        $emp_dor = $data[5]??NULL;
                        $emp_recovery = $data[6]??NULL;
                        $emp_advance = $data[7]??NULL;
                        $emp_remarks = $data[8]??NULL;

                        // Find employee details
                        $emp = EmpDetail::where('emp_code', $emp_code)->first();

                        if ($emp) {
                            $empID = $emp->emp_id;
                            $emp_designation = $emp->emp_designation;
                            $emp_unit = $emp->emp_unit;
                            $emp_salary = $emp->emp_salary;

                            // Build the attendance month
                            $attendance_month = $emp_at_month . " " . $emp_at_year;
                            $at_emp = $empID . $attendance_month;

                            // Calculate number of days in the month
                            $days_in_month = Carbon::createFromFormat('F Y', $attendance_month)->daysInMonth;
                            $approve_leave = 0; // Always 0
                            $actual_leave = $days_in_month - $emp_working_days;

                            // Prepare data for insertion
                            $attendanceData = [
                                'wo_number' => $emp_wo,
                                'emp_id' => $empID,
                                'at_emp' => $at_emp,
                                'emp_code' => $emp_code,
                                'attendance_month' => $attendance_month,
                                'approve_leave' => $approve_leave,
                                'lwp_leave' => $actual_leave,
                                'recovery' => $emp_recovery,
                                'advance' => $emp_advance,
                                'remarks' => $emp_remarks,
                                'emp_vendor_rate' => $emp_unit,
                                'designation' => $emp_designation,
                                'ctc' => $emp_salary,
                                'attendance_status' => 'completed',
                                'user_id' => auth()->id(),
                                'source' => 'bulk upload',
                            ];
                          
                            // Check if the attendance record already exists
                            $existingAttendance = WoAttendance::where('at_emp', $at_emp)->first();

                            if (!$existingAttendance) {
                                // Insert new record if it doesn't exist
                                WoAttendance::create($attendanceData);
                            } else {
                                // Update the existing record
                                $existingAttendance->update($attendanceData);
                            }

                            // If date of resignation is present, update the employee record
                            // if (!empty($emp_dor)) {
                            //     $emp_dor = Carbon::parse($emp_dor)->format('Y-m-d');
                            //     $emp->update(['emp_dor' => $emp_dor]);
                            // }
                        }
                    }
                    $counter++;
                }

                DB::commit(); 
                return redirect()->route('upload-attendance')->with('success','Total ' . ($counter - 1) . ' Attendance Added');

            } catch (Exception $e) {
                DB::rollBack(); 
                return redirect()->route('upload-attendance')->with('error', 'somthing wrong !');
                
            } finally {
                fclose($handle);
            }
        } else {
          
            return redirect()->route('upload-attendance')->with('error', 'No file uploaded.');
        }

    }
    // create bulk attendance end here
     

    // attendance list start here
    public function attendance_list(Request $request){
        $search = $request->search;
        $wo_attendances = WoAttendance::with('empDetail')->orderby('status','desc');
        if(!empty($search)){
            $wo_attendances->where(function($q) use($search){
                $q->where('wo_number', 'like','%'.$search.'%')
                ->orwhere('attendance_month', 'like','%'.$search.'%')
                ->orwhere('designation', 'like','%'.$search.'%')
                ->orWhereHas('empDetail', function ($query) use ($search) {
                    $query->where('emp_code', 'like', "%$search%");
                    $query->orwhere('emp_name', 'like', "%$search%");
                });
            });
        }
        $wo_attendances = $wo_attendances->paginate(10);
       
        foreach ($wo_attendances as $key => $attendance) {
            $year_day = date('Y', strtotime($attendance->attendance_month));
            $month_day = date('m', strtotime($attendance->attendance_month));
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month_day, $year_day);

            // Calculate the gap in service and working days
            $approve_leave = $attendance->approve_leave??0;  // Ensure this field exists in the model
            $lwp_leave = $attendance->lwp_leave??0;  // Ensure this field exists in the model
            $attendance_m_y = $attendance->attendance_month ."(".$days_in_month.")";
           
            if ($approve_leave > $lwp_leave) {
                $gap_in_service = 0;
                $working_days = $days_in_month - $gap_in_service;  // Calculate working days
            } else {
                $gap_in_service = intval($lwp_leave) - intval($approve_leave);  // Get actual leave without wallet leave
                $working_days = $days_in_month - $gap_in_service;  // Calculate working days
            }

            $wo_attendances[$key]->gap_in_service = $gap_in_service;
            $wo_attendances[$key]->working_days = $working_days;
            $wo_attendances[$key]->attendance_m_y = $attendance_m_y;
            // dd($wo_attendances);
        }
        return view("hr.attendance.attendance-list",compact('wo_attendances','search'));
    }
    // attendance list end here

    // edit attendance code start here
    public function edit_attendance(Request $request){
        $id = $request->id;
        $wo_attendance = WoAttendance::select('designation','approve_leave','lwp_leave','ctc')->where('id',$id)->first();
        return view("hr.attendance.edit-attandence",compact('wo_attendance','id'));
    }
    // edit attendance code end here

    // update attendance start here
    public function update_attendance(Request $request){
        $id= $request->id;
        $attendance= WoAttendance::find($id);
        $attendance->update([
            'designation' => $request->designation,
            'approve_leave' => $request->approve_leave,
            'lwp_leave' => $request->lwp_leave,
            'ctc' => $request->ctc,
        ]);
       return redirect()->route('attendance-list')->with('success','Attendance Updated Successfully !');
    }
    // update attendance end here
}
