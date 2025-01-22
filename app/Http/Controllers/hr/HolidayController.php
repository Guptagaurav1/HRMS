<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the holiday.
     */
    public function index(Request $request)
    {
        $holidays = Holiday::select('holiday_name', 'holiday_date', 'holiday_type')->where('status', '1');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $holidays = $holidays->whereAny([
                'holiday_name',
                'holiday_date',
                'holiday_type'
            ], 'LIKE', '%'.$request->search.'%');
        }
        $holidays = $holidays->paginate(10);

        return view("hr.holiday-list", compact('holidays', 'search'));
    }

    /**
     * Display the listing of leave requests.
     */
    public function leave_requests(Request $request)
    {   
       $leave_requests = LeaveRequest::select('leave_request.*', 'emp_details.emp_name', 'emp_details.department', 'users.email as reporting_mail')->join('emp_details', 'leave_request.emp_code', '=', 'emp_details.emp_code')->leftJoin('users', 'leave_request.approved_disapproved_by', '=', 'users.id');
       $search = '';
        if ($request->search) {
            $search = $request->search;
            $leave_requests = $leave_requests->whereAny([
                'leave_request.leave_code',
                'leave_request.emp_code',
                'leave_request.status',
                'users.email',
                'leave_request.created_on',
                'emp_details.emp_name'
            ], 'LIKE', '%'.$request->search.'%');
        }
        $leave_requests = $leave_requests->OrderByDesc('leave_request.id')->paginate(10)->withQueryString();

        return view("hr.applied-request-list", compact('leave_requests', 'search'));
    }

    /**
     * Leave regularization.
     */
    public function leave_regularization(Request $request)
    {
        return view("hr.leave-regularization");
    }

    /**
     * Display the specified holiday.
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified holiday.
     */
    public function edit(Holiday $holiday)
    {
        //
    }

    /**
     * Update the specified holiday in storage.
     */
    public function update(Request $request, Holiday $holiday)
    {
        //
    }

    /**
     * Remove the specified holiday from storage.
     */
    public function destroy(Holiday $holiday)
    {
        //
    }
}
