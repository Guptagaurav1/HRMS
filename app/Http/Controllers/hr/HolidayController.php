<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\LeaveRequest;
use App\Models\LeaveRegularization;
use App\Models\EmpDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use DateTime;
use Mail;
use App\Mail\LeaveRegularization as LeaveMail;

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
            ], 'LIKE', '%' . $request->search . '%');
        }
        $dob = '';
        $month = '';
        $day = '';

        $holidays = $holidays->paginate(10);

        if (auth('employee')->check()) {
            $user = EmpDetail::where('emp_code', auth('employee')->user()->emp_code)->first();
            $dob = date('d-M-Y', strtotime($user->getPersonalDetail->emp_dob));
            $month = date('F', strtotime($user->getPersonalDetail->emp_dob));
            $day = date('l', strtotime($user->getPersonalDetail->emp_dob));
        }

        return view("hr.leaves.holiday-list", compact('holidays', 'search', 'dob', 'month', 'day'));
    }

    /**
     * Display the listing of leave requests.
     */
    public function leave_requests(Request $request)
    {
        //    $leave_requests = LeaveRequest::select('leave_request.*', 'emp_details.emp_name', 'emp_details.department', 'users.email as reporting_mail')->join('emp_details', 'leave_request.emp_code', '=', 'emp_details.emp_code')->leftJoin('users', 'leave_request.approved_disapproved_by', '=', 'users.id');
        if (auth()->check()) {
            $leave_requests = LeaveRequest::where('department_head_email', auth()->user()->email);
        } else {
            $leave_requests = LeaveRequest::where('emp_code', auth('employee')->user()->emp_code);
        }

        $search = '';
        if ($request->search) {
            $search = $request->search;
            $leave_requests = $leave_requests->where(function ($query) use ($search) {
                $query->where('leave_code', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_code', 'LIKE', '%'. $search. '%')
                    ->orWhere('reason_for_absence', 'LIKE', '%'. $search. '%')
                    ->orWhere('department_head_email', 'LIKE', '%'. $search. '%')
                    ->orWhere('status', 'LIKE', '%'. $search. '%')
                    ->orWhereHas('employee', function ($q) use ($search) {
                        $q->where('emp_name', 'LIKE', '%'. $search. '%');
                    });
            });
        }
        
        $leave_requests = $leave_requests->OrderByDesc('id')->paginate(25)->withQueryString();

        return view("hr.leaves.applied-request-list", compact('leave_requests', 'search'));
    }

    /**
     * Leave regularization.
     */
    public function leave_regularization(Request $request)
    {
        $previous_month = date('F Y', strtotime('last month'));
        if ($request->month) {
            $previous_month = $request->month;
        }
        $pre_month_year = new DateTime($previous_month);
        $last_month = date("m", strtotime('last month')); // Previous month.
        $last_year = date("Y", strtotime('last month'));  // Previous year.
        $last_date = cal_days_in_month(CAL_GREGORIAN, $last_month, $last_year); // Previous month last date.
        $prev_month_startdate = $pre_month_year->format("Y-m-01");
        $prev_month_enddate = $pre_month_year->format("Y-m-$last_date"); // format last date.
        $search = '';
        $data = EmpDetail::select('id', 'emp_name', 'emp_email_first', 'emp_phone_first', 'emp_code', 'emp_designation')->where('emp_work_order', 'PSSPL Internal Employees')
            ->where('emp_current_working_status', 'Active')
            ->where('emp_doj', '<', $prev_month_enddate)
            ->whereRaw("CONCAT(id, '', ?) NOT IN (SELECT at_emp FROM leave_regularizations)", [$previous_month])
            ->where(function ($query) use ($prev_month_startdate) {
                $query->where('emp_dor', '>', $prev_month_startdate)
                    ->orWhere('emp_dor', '')
                    ->orWhereNull('emp_dor');
            });
        if ($request->search) {
            $search = $request->search;
            $data = $data->whereAny([
                'emp_name',
                'emp_email_first',
                'emp_phone_first',
                'emp_code',
                'emp_designation',
            ], 'LIKE', '%' . $request->search . '%');
        }
        $data = $data->paginate(10)->withQueryString();

        // print_r($data->toSql());
        // print_r($data->getBindings());die;


        return view("hr.leaves.leave-regularization", compact('previous_month', 'data', 'search'));
    }

    /**
     * Get the details of requested leave.
     */
    public function leave_details(Request $request)
    {
        try {
            $data = LeaveRequest::select('leave_requests.*', 'emp_details.emp_name', 'users.email as revert_by', 'u.email as reapproved_by')->join('emp_details', 'leave_requests.emp_code', '=', 'emp_details.emp_code')->leftJoin('users', 'leave_requests.approved_disapproved_by', '=', 'users.id')->leftJoin('users AS u', 'leave_requests.reapproved_redisapproved_by', '=', 'u.id')->where('leave_requests.id', $request->requestId)->first();
            $emp_name = $data->employee->emp_name;
            return response()->json(['success' => true, 'data' => $data, 'emp_name' => $emp_name]);
        } catch (Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Show the leave receipt.
     */
    public function leave_receipt(Request $request, $leave_id)
    {
        $data = LeaveRequest::select('leave_requests.*', 'emp_details.emp_name', 'emp_details.department', 'emp_details.emp_designation', 'users.first_name', 'users.last_name', 'roles.role_name')->join('emp_details', 'leave_requests.emp_code', '=', 'emp_details.emp_code')->leftJoin('users', 'leave_requests.approved_disapproved_by', '=', 'users.id')->leftJoin('roles', 'users.role_id', '=', 'roles.id')->where('leave_requests.id', $leave_id)->first();
        return view("hr.leaves.leave-request-reciept", compact('data'));
    }

    /**
     * Show the employee all details.
     */
    public function emp_details(Request $request, $empid)
    {
        try {
            $empdetails = EmpDetail::findOrFail($empid);
            return view("hr.leaves.employee-details", compact('empdetails'));
        } catch (Throwable $th) {
            return redirect()->route('leave-regularization')->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Send regularization mail to employees for absent dates.
     */
    public function send_mail(Request $request)
    {
        // print_r($request->all());
        try {
            $this->validate($request, [
                'emp_id' => ['required'],
                'month' => ['required'],
                'absent_dates' => ['required']
            ]);
            $emp_details = EmpDetail::select('emp_work_order', 'emp_id', 'emp_code', 'emp_email_first', 'emp_name')->where('emp_code', $request->emp_id)->first();

            LeaveRegularization::create([
                'wo_number' => $emp_details->emp_work_order,
                'at_emp' => $emp_details->emp_id . $request->month,
                'emp_id' => $emp_details->emp_id,
                'emp_code' => $emp_details->emp_code,
                'leave_month' => $request->month,
                'leave_dates' => $request->absent_dates
            ]);
            $absents = explode(",", $request->absent_dates);
            $absentHtml = '';
            for ($i = 0; $i < count($absents); $i++) {
                $absentHtml .= $absents[$i] . " - Absents " . "<br>";
            }

            $mailData = [
                'absent_dates' => $absentHtml,
                'emp_name' => $emp_details->emp_name
            ];
            $cc = ['sagar.tiwari@prakharsoftwares.com'];
            Mail::to($emp_details->emp_email_first)->cc($cc)->send(new LeaveMail($mailData));

            return response()->json(['success' => true, 'message' => 'Mail Sent Successfully.']);
        } catch (Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }
}
