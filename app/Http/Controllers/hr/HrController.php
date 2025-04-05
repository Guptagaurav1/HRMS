<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PositionRequest;
use App\Models\EmpDetail;
use App\Models\WorkOrder;
use App\Models\LeaveRequest;

class HrController extends Controller
{
    /**
     * Show HR Dashboard.
    */
    public function dashboard(Request $request){

        // to display tatal employee

        $totalCountEmployees = EmpDetail::select('id')
                            ->where('emp_current_working_status','active')
                            ->count();

        // to display tatal internal employee

        $totalCountInternalEmployees = EmpDetail::select('id')
                                        ->where('emp_current_working_status','active')
                                        ->where('emp_work_order','PSSPL Internal Employees')
                                        ->count();

        // to display tatal external employee

        $totalCountExternalEmployees = EmpDetail::select('id')
                                        ->where('emp_current_working_status','active')
                                        ->where('emp_work_order', '!=','PSSPL Internal Employees')
                                        ->count();
        // to display tatal work orders

        $totalCountWorkOrders = WorkOrder::select('id')
                                        ->count();

        // to display today birthday of Employees

        $employeesBirthday = EmpDetail::whereHas('getPersonalDetail', function($query){
                            $query->whereRaw("DATE_FORMAT(emp_dob, '%m-%d') = ?", [date('m-d')]);
                            })
                            ->select('emp_code','emp_name','emp_work_order','department','emp_designation','emp_email_first')
                            ->where('emp_current_working_status','active');
        $employeesBirthday = $employeesBirthday->paginate(10);

        // to display today marriage anniversary of Employees

        $employeeMarriageAnni =  EmpDetail::whereHas('getPersonalDetail', function($query){
                                        $query->whereRaw("DATE_FORMAT(emp_dom, '%m-%d') = ?", [date('m-d')]);
                                        })
                                        ->select('emp_code','emp_name','emp_work_order','department','emp_designation','emp_email_first')
                                        ->where('emp_current_working_status','active');

        $employeeMarriageAnni = $employeeMarriageAnni->paginate(10);
        
        // to display today work anniversary of Employees
                                                
        $employeeWorkAnniversary = EmpDetail::whereHas('getPersonalDetail')
                                    ->select('emp_code', 'emp_name', 'emp_work_order', 'department', 'emp_designation', 'emp_email_first', 'emp_doj')
                                    ->where('emp_current_working_status', 'active')
                                    ->whereRaw("DATE_FORMAT(emp_doj, '%m-%d') = ?", [date('m-d')])
                                    ->paginate(10);

        $employeeLeaves = LeaveRequest::with('employee')->select('leave_code','emp_code','department_head_email','reason_for_absence','absence_start_date','absence_end_date','status','created_at')
                                    ->where('status', 'Wait')
                                    ->orWhere('status', 'Modified')
                                    ->orderByDesc('id');
                                    


        $employeeLeaves = $employeeLeaves->paginate();

        return view("hr.dashboard.hr-dashboard",
        [
            'totalCountEmployees' => $totalCountEmployees,
            'totalCountInternalEmployees' => $totalCountInternalEmployees,
            'totalCountExternalEmployees' => $totalCountExternalEmployees,
            'totalCountWorkOrders' => $totalCountWorkOrders,
            'employees' => $employeesBirthday,
            'employeeMarriageAnni' => $employeeMarriageAnni,
            'employeeWorkAnniversary' => $employeeWorkAnniversary,
            'employeeLeaves' =>  $employeeLeaves,
        ]);
    }

    public function hr_operation_dashboard(){
        // to get current user
        $user = auth()->user();
        // count of position request by current user
        $countPositions = PositionRequest::select('created_by')
                            ->where('created_by',$user->id)        
                            ->count();
        return view("hr.dashboard.hr-operation-dashboard",compact('countPositions'));
    }

}
