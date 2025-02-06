<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpProfileRequestLog;
use App\Models\EmpChangedColumnsReq;
use App\Models\UserRequestLog;
use Throwable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class ResponseLogController extends Controller
{
    /**
     * Show the listing of profile change logs.
     */
    public function profile_change_log(Request $request){
        $email = auth()->user()->email;
        $logs = EmpProfileRequestLog::select('emp_profile_request_logs.changed_column', 'emp_profile_request_logs.req_id', 'emp_profile_request_logs.emp_code', 'emp_profile_request_logs.description', 'emp_profile_request_logs.status', 'notification.time', 'notification.send_by')
            ->leftJoin('notification', 'emp_profile_request_logs.id', '=', 'notification.reference_table_id')
            ->where('notification.notification_type', 'employee_resp')
            ->where('notification.send_by', $email);

        $search = '';
        if ($request->search) {
            $search = $request->search;
            $logs = $logs->whereAny([
                'emp_profile_request_logs.req_id',
                'emp_profile_request_logs.emp_code',
                'emp_profile_request_logs.description',
                'notification.send_by',
                'emp_profile_request_logs.status',
            ], 'LIKE', '%'.$request->search.'%');
        }
        $logs = $logs->orderByDesc('emp_profile_request_logs.id')->paginate(10)->withQueryString();
        return view("hr.employee-profile-response-log", compact('logs', 'search'));
    }

     /**
     * Show the listing of Recruiter Detail Change Response Log.
     */
    public function detail_change_log(Request $request){
        $logs = UserRequestLog::select('user_request_logs.user_id', 'user_request_logs.req_id', 'user_request_logs.query_type', 'user_request_logs.job_position', 'user_request_logs.description', 'user_request_logs.status', 'notification.time', 'notification.received_to')
            ->join('notification', 'user_request_logs.id', '=', 'notification.reference_table_id')
            ->where('notification.notification_type', 'user_resp'); // user_req
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $logs = $logs->where(function ($query) use ($search) {
                $query->where('user_request_logs.req_id', 'LIKE', '%'.$search.'%')
                    ->orWhere('user_request_logs.query_type', 'LIKE', '%'.$search.'%')
                    ->orWhere('user_request_logs.description', 'LIKE', '%'.$search.'%')
                    ->orWhere('user_request_logs.job_position', 'LIKE', '%'.$search.'%')
                    ->orWhere('user_request_logs.status', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('users.first_name', 'like', '%'.$search.'%')
                              ->orWhere('users.last_name', 'like', '%'.$search.'%')
                              ->orWhere('users.email', 'like', '%'.$search.'%')
                              ->orWhere(DB::raw("CONCAT(users.first_name, ' ', users.last_name)"), 'like', '%'.$search.'%');
                    });
            });
        }
        $logs = $logs->orderByDesc('user_request_logs.id')->paginate(10)->withQueryString();
        return view("hr.recruiter-response-log", compact('logs', 'search'));
    }


}
