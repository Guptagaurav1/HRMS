<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpDetail;
use App\Models\EmpLeave;
use App\Models\LeaveRequest;
use App\Models\Month;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');  // Set timezone
    }

    public function index(){
       
        $currentMonth = now()->month; 
        $currentYear = now()->year;   

        // Get Active Employees with the specified work order
        $employees = empDetail::where([
            ['emp_current_working_status', '=', 'Active'],
            ['emp_work_order', '=', 'PSSPL Internal Employees']
        ])->get();

        foreach ($employees as $employee) {
            $empCode = $employee->emp_code;
            // Store leave for each employee
           $this->store_leave($empCode, $currentMonth, $currentYear);
        }
        $data =EmpLeave::where('year','=',$currentYear)->get();
        // dd($data);
        return view("hr.leaves.emp-leaves",compact('data'));
    }

}
