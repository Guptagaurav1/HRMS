<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Throwable;

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
     * Get the details of requested leave.
     */
    public function leave_details(Request $request)
    {
        try{
            $data = LeaveRequest::select('leave_request.*', 'emp_details.emp_name', 'users.email as revert_by', 'u.email as reapproved_by')->join('emp_details', 'leave_request.emp_code', '=', 'emp_details.emp_code')->leftJoin('users', 'leave_request.approved_disapproved_by', '=', 'users.id')->leftJoin('users AS u', 'leave_request.reapproved_redisapproved_by', '=', 'u.id')->where('leave_request.id', $request->requestId)->first();
            return response()->json(['success' => true, 'data' => $data]);
        }
        catch(Throwable $th){
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
       
    }

    /**
     * Show the leave receipt.
     */
    public function leave_receipt(Request $request, $leave_id)
    {
          $data = LeaveRequest::select('leave_request.*', 'emp_details.emp_name', 'emp_details.department', 'emp_details.emp_designation', 'users.first_name', 'users.last_name', 'roles.role_name')->join('emp_details', 'leave_request.emp_code', '=', 'emp_details.emp_code')->leftJoin('users', 'leave_request.approved_disapproved_by', '=', 'users.id')->leftJoin('roles', 'users.role_id', '=', 'roles.id')->where('leave_request.id', $leave_id)->first();
         return view("hr.leave-request-reciept", compact('data'));
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
