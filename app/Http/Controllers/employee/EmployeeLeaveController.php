<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Models\Company;
use App\Models\Notification;
use App\Models\User;
use App\Models\LeaveRequestMailLog;
use App\Models\WoAttendance;
use Throwable;
use Illuminate\Support\Str;
use App\Mail\ShortlistMail;
use stdClass;
use Mail;
use DB;
use Illuminate\Support\Arr;

class EmployeeLeaveController extends Controller
{
    /**
     * Apply leave request Form.
     */
    public function leave_request()
    {
        return view("employee.leave.leave-request-form");
    }

    /**
     * Store leave request.
     * @param  \Illuminate\Http\Request  $request
     */
    public function store_leave_request(Request $request)
    {
        $this->validate($request, [
            'department_head_email' => 'required',
            'reason_for_absence' => 'required',
            'absence_dates' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $user = auth('employee')->user();
            $emp_code = $user->emp_code;
            $emp_serial_number = Str::of($emp_code)->afterLast('/');
            $previous = LeaveRequest::select('id')->orderByDesc('id')->first();
            $reason_code = '';

            // Get first letter of reason code
            foreach (explode(' ', ($request->reason_for_absence)) as $word)
                $reason_code .= strtoupper($word[0]);

            // Make Leave Code.
            $leave_code = "Leave/$emp_serial_number/$reason_code/0001";
            if ($previous) {
                $leave_code = "Leave/$emp_serial_number/$reason_code/" . sprintf("%04d", $previous->id + 1);
            }

            // Get Total Days.
            if ($request->absence_dates == 'Half Day leave') {
                $total_days = 'Half Day leave';
            } elseif ($request->absence_dates == 'Short Day leave') {
                $total_days = 'Short Day leave';
            } else {
                $total_days = count(explode(',', $request->absence_dates));
            }

            // Get cc emails.
            $cc = [];
            if ($request->cc) {
                $cc = explode(',', $request->cc);
            }
            $cc[] = $request->department_head_email;
            $dates = explode(",", $request->absence_dates);
            $absence_dates = Arr::map($dates, function (string $value, string $key) {
                return date('d-M-Y', strtotime($value));
            });
            $html = $request->comment;
            $html .= "<span style='font-weight:bold'>Leave Apply Dates : ".implode(", ", $absence_dates)." </span><br>";
            $html .= "<span style='font-weight:bold'>Leave Id : " . $leave_code . "</span><br><br>";
            $html .= "<br> $user->emp_name <br> $user->emp_code ($user->emp_designation) <br><br>";
            $subject = $request->reason_for_absence . " Request";

            // Store request.
            $data = $request->all();
            $data['total_days'] = $total_days;
            $data['leave_code'] = $leave_code;
            $data['cc'] = implode(",", $cc);
            $data['emp_code'] = $user->emp_code;
            unset($data['to']);
            $requestid = LeaveRequest::create($data)->id;

            // Create Log.
            $subject = $request->reason_for_absence . " Request";
            LeaveRequestMailLog::create([
                'leave_request_id' => $requestid,
                'to_email' => $request->to,
                'cc' => implode(",", $cc),
                'from_email' => $user->emp_email_first,
                'subject' => $subject,
                'message' => $html,
                'status' => 'Wait',
            ]);

            // Send Notifications.
            $cc_string = implode(', ', $cc);
            $recievers = User::whereRaw('FIND_IN_SET(email, ? )', ["$cc_string"])->pluck('id')->join(',');

              Notification::create([
                'title' => 'Leave request',
                'description' => "$subject raised by $user->emp_name",
                'send_by' => $user->emp_email_first,
                'received_to' => $recievers,
                'user_type' => 'hr',
                'notification_type' => 'leave_req',
                'reference_table_name' => 'leave_request',
                'reference_table_id' => $requestid
            ]);

            // Send mail.
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail(1);

            $maildata = new stdClass();
            $maildata->subject = $subject;
            $maildata->comp_email = $company->email;
            $maildata->comp_phone = $company->mobile;
            $maildata->comp_website = $company->website;
            $maildata->comp_address = $company->address;
            $maildata->content = $html;
            $maildata->url = url('/');
            Mail::to($request->to)->cc($cc)->send(new ShortlistMail($maildata));

            DB::commit();
            return redirect()->route('leave.request_list')->with(['success' => true, 'message' => 'Leave application has been raised.']);
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('leave.request_list')->with(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Leave request list.
     */
    // public function leave_request_list()
    // {
    //     $leaves = LeaveRequest::where('emp_code', auth('employee')->user()->emp_code)->orderByDesc('id')->paginate(25);
    //     return view("employee.leave.applied-request-list", compact('leaves'));
    // }

    /**
     * Leave taken.
     */
    public function leave_taken(Request $request)
    {
        $user = auth('employee')->user(); // Get Current User
        $attandance = WoAttendance::selectRaw('emp_code, SUM(approve_leave) AS approve_leave, SUM(lwp_leave) AS lwp_leave, MAX(created_at) AS created_at')->where('emp_code', $user->emp_code)->groupBy('emp_code')->latest()->first();
        $monthly_leaves = WoAttendance::select('attendance_month', 'approve_leave', 'lwp_leave')->where('emp_code', $user->emp_code);

        // Apply Filter.
        $search = '';
        if($request->search){
            $search = $request->search;
            $monthly_leaves = $monthly_leaves->where(function($query) use ($search){
                $query->where('attendance_month', 'LIKE', "%$search%")
                    ->orWhere('approve_leave', 'LIKE', "%$search%")
                    ->orWhere('lwp_leave', 'LIKE', "%$search%");
            });
        }
        $monthly_leaves = $monthly_leaves->orderByDesc('id')->paginate(25)->withQueryString();
        return view('employee.leave.leave-taken', compact('attandance', 'monthly_leaves', 'search'));
    }
}
