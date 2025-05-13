<?php

namespace App\Http\Controllers\it;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpDetail;
use App\Models\LeaveRequest;

class ItController extends Controller
{
    /**
     * Show IT Head Dashboard
     */
    public function dashboard()
    {
        $user = auth()->user();
        $current_month = date('m');
        $team_count = EmpDetail::where(['reporting_email' => $user->email, 'emp_current_working_status' => 'active'])->count();
        $leave_raised = LeaveRequest::whereMonth('created_at', $current_month)->where('department_head_email', $user->email)->count();
        $approved_leaves = LeaveRequest::whereMonth('created_at', $current_month)->where('status', 'Approved')->count();
        return view('it.dashboard', compact('user', 'team_count', 'leave_raised', 'approved_leaves'));
    }
}
