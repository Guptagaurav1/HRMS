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

        $data = EmpLeave::where('year','=',$currentYear);
        if(auth('employee')->check()){
            $data = $data->where('emp_code', auth('employee')->user()->emp_code);
        }
        $data = $data->get();
        return view("hr.leaves.emp-leaves",compact('data'));
    }

}
