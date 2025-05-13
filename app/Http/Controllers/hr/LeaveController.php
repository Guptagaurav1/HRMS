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

    public function index(Request $request){
       
        $currentMonth = now()->month; 
        $currentYear = now()->year; 

        $search = '';
        $data = EmpLeave::where('year','=', $currentYear);
        if(auth('employee')->check()){
            $data = $data->where('emp_code', auth('employee')->user()->emp_code);
        }

        if ($request->search) {
            $search = $request->search;
            $data = $data->where('emp_code', 'LIKE', "%$search%");
        }
        $data = $data->paginate(25)->withQueryString();
        return view("hr.leaves.emp-leaves",compact('data', 'search'));
    }

    
}
