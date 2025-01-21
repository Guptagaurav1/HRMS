<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpDetail;
use App\Models\User;

class TeamController extends Controller
{
    /**
     * Display a listing of the teams.
     */
    public function index(Request $request){
        $user_email = auth()->user()->email;
        $user_id = auth()->user()->id;
        $employees = EmpDetail::select('emp_name', 'emp_email_first', 'emp_phone_first', 'department', 'user_type', 'adding_date')->where('reporting_email', $user_email);
            $search = '';
        if ($request->search) {
            $search = $request->search;
            $employees = $employees->whereAny([
                'emp_name',
                'emp_email_first',
                'emp_phone_first',
                'department',
                'user_type',
                'adding_date'
            ], 'LIKE', '%'.$request->search.'%');
        }
    
        $employees = $employees->orderByDesc('emp_id')->paginate(10);
        return view('hr.my-team-list', compact('employees', 'search'));
    }
}
