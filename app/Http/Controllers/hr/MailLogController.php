<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpWishMailLog;

class MailLogController extends Controller
{
    /**
     * Show the listing of marriage anniversary wish logs.
     */
    public function anniversary_logs(Request $request){
       $logs = EmpWishMailLog::select('emp_code', 'emp_name', 'emp_email',  'emp_dom', 'message', 'created_at')->where('wish_type', 'Marriage');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $logs = $logs->whereAny([
                'emp_code',
                'emp_name',
                'emp_email',
                'emp_dom',
                'created_at',
            ], 'LIKE', '%'.$request->search.'%');
        }
        $logs = $logs->orderByDesc('id')->paginate(10)->withQueryString();
       return view("hr.events.logs.anniversary-wish-log", compact('logs', 'search'));
    }   

    /**
     * Show the listing of birthday wish logs.
     */
    public function birthday_logs(Request $request){
       $logs = EmpWishMailLog::select('emp_code', 'emp_name', 'emp_email',  'emp_dob', 'message', 'created_at')->where('wish_type', 'Birthday');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $logs = $logs->whereAny([
                'emp_code',
                'emp_name',
                'emp_email',
                'emp_dom',
                'created_at',
            ], 'LIKE', '%'.$request->search.'%');
        }
        $logs = $logs->orderByDesc('id')->paginate(10)->withQueryString();
       return view("hr.events.logs.birthday-wish-log", compact('logs', 'search'));
    }   

    /**
     * Show the listing of work anniversary wish logs.
     */
    public function work_anniversary_logs(Request $request){
       $logs = EmpWishMailLog::select('emp_code', 'emp_name', 'emp_email',  'emp_doj', 'message', 'created_at')->where('wish_type', 'Joining');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $logs = $logs->whereAny([
                'emp_code',
                'emp_name',
                'emp_email',
                'emp_dom',
                'created_at',
            ], 'LIKE', '%'.$request->search.'%');
        }
        $logs = $logs->orderByDesc('id')->paginate(10)->withQueryString();
       return view("hr.events.logs.work-anniversary-wish-log", compact('logs', 'search'));
    } 
}
