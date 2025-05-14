<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PositionRequest;
use App\Models\EmpDetail;
use App\Models\WorkOrder;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailBirthDay;
use App\Mail\EmpMarriageAnniversaryMail;
use App\Mail\EmpWorkingAnniversaryMailWishSend;
use Carbon\Carbon;
use Throwable;
use App\Models\RecruitmentForm;
use App\Models\EmpWishMailLog;

class HrController extends Controller
{
    /**
     * Show HR Dashboard.
     */
    public function dashboard(Request $request)
    {

        // to display tatal employee

        $totalCountEmployees = EmpDetail::select('id')
            ->where('emp_current_working_status', 'active')
            ->count();

        // to display tatal internal employee

        $totalCountInternalEmployees = EmpDetail::select('id')
            ->where('emp_current_working_status', 'active')
            ->where('emp_work_order', 'PSSPL Internal Employees')
            ->count();

        // to display tatal external employee

        $totalCountExternalEmployees = EmpDetail::select('id')
            ->where('emp_current_working_status', 'active')
            ->where('emp_work_order', '!=', 'PSSPL Internal Employees')
            ->count();
        // to display tatal work orders

        $totalCountWorkOrders = WorkOrder::select('id')
            ->count();

        // to display today birthday of Employees
        $current_date = date('m-d');
        $addNineDays = date('m-d', strtotime('+9 days'));

        $employeesBirthday = EmpDetail::whereHas('getPersonalDetail', function ($query) use ($current_date, $addNineDays) {
            $query->whereRaw("DATE_FORMAT(emp_dob, '%m-%d') BETWEEN ? AND ?", [$current_date, $addNineDays]);
        })
            ->select('emp_code', 'emp_name', 'emp_work_order', 'department', 'emp_designation', 'emp_email_first')
            ->where('emp_current_working_status', 'active');
        $employeesBirthday = $employeesBirthday->paginate(25);


        // to display today marriage anniversary of Employees

        $employeeMarriageAnni =  EmpDetail::whereHas('getPersonalDetail', function ($query) use ($current_date, $addNineDays) {
            $query->whereRaw("DATE_FORMAT(emp_dom, '%m-%d') BETWEEN ? AND ?", [$current_date, $addNineDays]);
        })
            ->select('emp_code', 'emp_name', 'emp_work_order', 'department', 'emp_designation', 'emp_email_first')
            ->where('emp_current_working_status', 'active');

        $employeeMarriageAnni = $employeeMarriageAnni->paginate(25);

        // to display today work anniversary of Employees

        $employeeWorkAnniversary = EmpDetail::whereHas('getPersonalDetail')
            ->select('emp_code', 'emp_name', 'emp_work_order', 'department', 'emp_designation', 'emp_email_first', 'emp_doj')
            ->where('emp_current_working_status', 'active')
            ->whereRaw("DATE_FORMAT(emp_doj, '%m-%d') BETWEEN ? AND ?", [$current_date, $addNineDays])
            ->orderByRaw('DATE_FORMAT(emp_doj,"%m-%d")')
            ->paginate(25);
        // dd($employeeWorkAnniversary);

        $employeeLeaves = LeaveRequest::with('employee')->select('id', 'leave_code', 'emp_code', 'department_head_email', 'reason_for_absence', 'absence_dates', 'status', 'created_at')
            ->where('status', 'Wait')
            ->orWhere('status', 'Modified')
            ->orderByDesc('id');

        $employeeLeaves = $employeeLeaves->paginate(25);



        // today birthday

        $currentdate = date('Y-m-d');
        $employeesBirthdaytoday = EmpDetail::whereHas('getPersonalDetail', function ($query) use ($currentdate) {
            $query->whereRaw("DATE_FORMAT(emp_dob, '%m-%d') = DATE_FORMAT(? ,'%m-%d')", [$currentdate]);
        })
            ->select('emp_code', 'emp_name', 'emp_work_order', 'department', 'emp_designation', 'emp_email_first')
            ->where('emp_current_working_status', 'active');
        $todayBirthday =  $employeesBirthdaytoday->paginate(25);

        // today anniversary list

        $employeesAnniversary = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_work_order', 'emp_details.emp_name', 'emp_details.emp_email_first', 'emp_details.emp_designation')
            ->where('emp_current_working_status', 'Active')
            ->whereHas('getPersonalDetail', function ($query) use ($currentdate) {
                $query->whereRaw("DATE_FORMAT(emp_dom,'%m-%d') = DATE_FORMAT(? ,'%m-%d')", [$currentdate])
                    ->orderByRaw('DATE_FORMAT(emp_dom,"%m-%d")');
            });

        $todayAnniversary =  $employeesAnniversary->paginate(25);

        // today Work Anniversary


        $employeesWork = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_work_order', 'emp_details.emp_name', 'emp_details.emp_email_first', 'emp_details.emp_doj', 'emp_details.emp_designation')
            ->where('emp_current_working_status', 'Active')
            ->whereRaw("DATE_FORMAT(emp_doj,'%m-%d') = DATE_FORMAT(? ,'%m-%d')", [$currentdate])
            ->orderByRaw('DATE_FORMAT(emp_doj,"%m-%d")');

        $todayWorkAnniversary =  $employeesWork->paginate(25);

        return view(
            "hr.dashboard.hr-dashboard",
            [
                'totalCountEmployees' => $totalCountEmployees,
                'totalCountInternalEmployees' => $totalCountInternalEmployees,
                'totalCountExternalEmployees' => $totalCountExternalEmployees,
                'totalCountWorkOrders' => $totalCountWorkOrders,
                'employees' => $employeesBirthday,
                'employeeMarriageAnni' => $employeeMarriageAnni,
                'employeeWorkAnniversary' => $employeeWorkAnniversary,
                'employeeLeaves' =>  $employeeLeaves,
                'todayBirthdays' => $todayBirthday,
                'todayAnniversary' =>  $todayAnniversary,
                'todayWorkAnniversarys' =>  $todayWorkAnniversary,

            ]
        );
    }

    /**
     * Hr Operation Dashboard
     */
    public function hr_operation_dashboard()
    {
        // to get current user
        $user = auth()->user();
        // count of position request by current user
        $countPositions = PositionRequest::select('created_by')
            ->where('created_by', $user->id)
            ->count();
        return view("hr.dashboard.hr-operation-dashboard", compact('countPositions'));
    }

    /**
     * Hr Executive Dashboard
     */
    public function hr_executive_dashboard()
    {
        // to get current user
        $user = auth()->user();
        $id = $user->id;
        // Get position assigned to hr executive.
        $positions = PositionRequest::whereRaw('FIND_IN_SET(?, assigned_executive)', [$id])->orderByDesc('id')->paginate(10);
        $total_hired = RecruitmentForm::where(['reference' => $user->email, 'finally' => 'joined'])->count();
        return view("hr.dashboard.hr-executive-dashboard", compact('positions', 'total_hired'));
    }


    public function templateBirthday()
    {
        return view('SendMail.event.birthday-wish');
    }


    // send birthday Mail

    public function sendBirthdayMail(Request $request)
    {

        try {
            $validate = $request->validate([
                'message' => 'required|max:255',
            ]);

            $employee = EmpDetail::select('id', 'emp_code', 'emp_name', 'emp_email_first')->where('emp_email_first', $request->emp_mail)->first();
            $mailData = [
                'message' => $request->message,
                'name' =>    $employee->emp_name
            ];

            // Save the log of employee wish.
            EmpWishMailLog::create([
                'emp_code' => $employee->emp_code,
                'emp_name' => $employee->emp_name,
                'emp_email' => $employee->emp_email_first,
                'message' => $request->message,
                'emp_dob' => $employee->getPersonalDetail ? $employee->getPersonalDetail->emp_dob : null,
                'wish_type' => 'Birthday',
            ]);

            Mail::to($employee->emp_email_first)->send(new SendMailBirthDay($mailData));
            return response()->json(['success' => true, 'message' => 'Birthday wish sent !']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function sendMarriageAnniversaryMail(Request $request)
    {
        try {
            $employee = EmpDetail::select('id', 'emp_code', 'emp_name', 'emp_email_first')->where('emp_email_first', $request->emp_mail)->first();
            $mailData = [
                'name' =>    $employee->emp_name,
                'message' => $request->message
            ];

            // Save the log of employee wish.
            EmpWishMailLog::create([
                'emp_code' => $employee->emp_code,
                'emp_name' => $employee->emp_name,
                'emp_email' => $employee->emp_email_first,
                'message' => $request->message,
                'emp_dom' => $employee->getPersonalDetail ? $employee->getPersonalDetail->emp_dom : null,
                'wish_type' => 'Marriage',
            ]);

            Mail::to($employee->emp_email_first)->send(new EmpMarriageAnniversaryMail($mailData));
            return response()->json(['success' => true, 'message' => 'Marriage Anniversary wishes sent !']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function sendWorkAnniversaryMail(Request $request)
    {
        try {
            $employee = EmpDetail::select('id', 'emp_code', 'emp_name', 'emp_email_first', 'emp_designation', 'emp_doj')->where('emp_email_first', $request->emp_mail)->first();
            $date = Carbon::parse($employee->emp_doj);
            $diffYear = Carbon::now()->diffInYears($date);

            $mailData = [
                'name' =>    $employee->emp_name,
                'message' => $request->message,
                'designation' => $employee->emp_designation,
                'year' =>  $diffYear
            ];

            // Save the log of employee wish.
            EmpWishMailLog::create([
                'emp_code' => $employee->emp_code,
                'emp_name' => $employee->emp_name,
                'emp_email' => $employee->emp_email_first,
                'emp_doj' => $employee->emp_doj,
                'message' => $request->message,
                'wish_type' => 'Joining',
            ]);

            Mail::to($employee->emp_email_first)->send(new EmpWorkingAnniversaryMailWishSend($mailData));
            return response()->json(['success' => true, 'message' => 'Work Anniversary wishes sent !']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    // show leave details

    public function leaveDetails($id)
    {

        $employeeLeaves = LeaveRequest::with('employee')->select('leave_requests.id', 'department_head_email', 'leave_code', 'emp_code', 'cc', 'total_days', 'reason_for_absence', 'absence_dates', 'status', 'created_at', 'comment')
            ->where('status', 'Wait')
            ->where('id', $id)
            ->orWhere('status', 'Modified')
            ->orderByDesc('id')
            ->first();

        return response()->json([
            'success' => true,
            'data' =>  $employeeLeaves,
            'message' => 'data fetches'
        ]);
    }

    // update status
    // public function leaveDetailsStatus
}
