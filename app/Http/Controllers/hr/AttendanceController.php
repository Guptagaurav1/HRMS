<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WoAttendance;
use App\Models\WorkOrder;
use App\Models\EmpDetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request ,string $wo_id)
    {
       
// dd($wo_id);
        $workOrder= WorkOrder::find($wo_id);
        $wo_number= $workOrder->wo_number??NULL;
      

        $month = $request->input('month'); 
        $emp_status = $request->input('emp_status'); 
        $search = $request->input('search'); 
       
        $curr_month_year = Carbon::parse($month);
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
                            CONCAT(emp.emp_id, '', ?) NOT IN (
                                SELECT at_emp 
                                FROM wo_attendances 
                                WHERE wo_number = ?
                            )
                        ", [$month, $wo_number])
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
                    CONCAT(emp.emp_id, '', ?) NOT IN (
                        SELECT at_emp 
                        FROM wo_attendances 
                        WHERE wo_number = ?
                    )
                ", [$month, $wo_number])
                ->paginate(10)->appends(request()->query());
            }
        }else{
            $wo_emps="";
        }
            // dd($wo_emps);
        return view("hr.attendance.go-to-attendance",compact('wo_emps','wo_id','month'));
    }

    public function add_attendance(Request $request, string $wo_id){
        // dd($request->all());

        $workOrder= WorkOrder::find($wo_id);
        $wo_number= $workOrder->wo_number??NULL;
        // dd($wo_number);
        $check_emps = $request->check;
        if(empty($check_emps)){
            return redirect()->route('go-to-attendance',$wo_id)->with('error','Please checked the checkbox before submit attendance.');
        }
        foreach($check_emps as $key => $check_emp){
        
            // dd($request->dor[$check_emp]);
            // dd($check_emp);
            $userId = auth()->id();
            
            $attendance = $request->attendance_month; 
            $attendance_month = Carbon::parse($attendance)->format('F Y');
            
            $at_emp = $check_emp." ". $attendance_month;
            $wo_attendance = new WoAttendance();
            $date_of_resign = $request->dor[$check_emp]; 
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
        //    dd($wo_attendance);
            $wo_attendance->save();
        }
        return redirect()->route('go-to-attendance',$wo_id)->with('success','Attendance created !');

    }
}
