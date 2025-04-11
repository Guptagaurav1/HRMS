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

class HrController extends Controller
{
    /**
     * Show HR Dashboard.
    */
    public function dashboard(Request $request){

        // to display tatal employee

        $totalCountEmployees = EmpDetail::select('id')
                            ->where('emp_current_working_status','active')
                            ->count();

        // to display tatal internal employee

        $totalCountInternalEmployees = EmpDetail::select('id')
                                        ->where('emp_current_working_status','active')
                                        ->where('emp_work_order','PSSPL Internal Employees')
                                        ->count();

        // to display tatal external employee

        $totalCountExternalEmployees = EmpDetail::select('id')
                                        ->where('emp_current_working_status','active')
                                        ->where('emp_work_order', '!=','PSSPL Internal Employees')
                                        ->count();
        // to display tatal work orders

        $totalCountWorkOrders = WorkOrder::select('id')
                                        ->count();

        // to display today birthday of Employees
        $current_date = date('m-d');
        $addFiveDays = date('m-d', strtotime('+5 days'));
        
        $employeesBirthday = EmpDetail::whereHas('getPersonalDetail', function($query) use ($current_date, $addFiveDays) {
                                $query->whereRaw("DATE_FORMAT(emp_dob, '%m-%d') BETWEEN ? AND ?", [$current_date, $addFiveDays]);
                                })
                            ->select('emp_code', 'emp_name', 'emp_work_order', 'department', 'emp_designation', 'emp_email_first')
                            ->where('emp_current_working_status', 'active');
        $employeesBirthday = $employeesBirthday->paginate(10);

        // to display today marriage anniversary of Employees

        $employeeMarriageAnni =  EmpDetail::whereHas('getPersonalDetail', function($query) use ($current_date, $addFiveDays){
                                            $query->whereRaw("DATE_FORMAT(emp_dom, '%m-%d') BETWEEN ? AND ?", [$current_date, $addFiveDays]);
                                        })
                                        ->select('emp_code','emp_name','emp_work_order','department','emp_designation','emp_email_first')
                                        ->where('emp_current_working_status','active');

        $employeeMarriageAnni = $employeeMarriageAnni->paginate(10);
        
        // to display today work anniversary of Employees
                                                
        $employeeWorkAnniversary = EmpDetail::whereHas('getPersonalDetail')
                                    ->select('emp_code', 'emp_name', 'emp_work_order', 'department', 'emp_designation', 'emp_email_first', 'emp_doj')
                                    ->where('emp_current_working_status', 'active')
                                    ->whereRaw("DATE_FORMAT(emp_doj, '%m-%d') BETWEEN ? AND ?", [$current_date, $addFiveDays])
                                    ->paginate(10);

        $employeeLeaves = LeaveRequest::with('employee')->select('id','leave_code','emp_code','department_head_email','reason_for_absence','absence_dates','status','created_at')
                                    ->where('status', 'Wait')
                                    ->orWhere('status', 'Modified')
                                    ->orderByDesc('id');

        $employeeLeaves = $employeeLeaves->paginate();

        return view("hr.dashboard.hr-dashboard",
        [
            'totalCountEmployees' => $totalCountEmployees,
            'totalCountInternalEmployees' => $totalCountInternalEmployees,
            'totalCountExternalEmployees' => $totalCountExternalEmployees,
            'totalCountWorkOrders' => $totalCountWorkOrders,
            'employees' => $employeesBirthday,
            'employeeMarriageAnni' => $employeeMarriageAnni,
            'employeeWorkAnniversary' => $employeeWorkAnniversary,
            'employeeLeaves' =>  $employeeLeaves,
        ]);
    }

    public function hr_operation_dashboard(){
        // to get current user
        $user = auth()->user();
        // count of position request by current user
        $countPositions = PositionRequest::select('created_by')
                            ->where('created_by',$user->id)        
                            ->count();
        return view("hr.dashboard.hr-operation-dashboard",compact('countPositions'));
    }


    public function templateBirthday(){
        return view('SendMail.event.birthday-wish');
    }


    // send birthday Mail

    public function sendBirthdayMail(Request $request)
    {

        try{
        $validate = $request->validate([
            'message' => 'required|max:255',
        ]);

        $employee = EmpDetail::select('id','emp_name','emp_email_first')->where('emp_email_first',$request->emp_mail)->first();
        $mailData = [
            'message' => $request->message,
            'name' =>    $employee->emp_name
        ];
        Mail::to($employee->emp_email_first)->send(new SendMailBirthDay($mailData));
        return response()->json(['success' => true,'message' => 'Birthday wish sent !']);
    } catch(Throwable $e) {
        return response()->json(['error' => true, 'message' => $e->getMessage()]);
    }


    }

    public function sendMarriageAnniversaryMail(Request $request){
        try{
            $employee = EmpDetail::select('id','emp_name','emp_email_first')->where('emp_email_first',$request->emp_mail)->first();
            $mailData = [
                'name' =>    $employee->emp_name,
                'message' => $request->message
            ];
            Mail::to($employee->emp_email_first)->send(new EmpMarriageAnniversaryMail($mailData));
            return response()->json(['success' => true,'message' => 'Marriage Anniversary wishes sent !']);
        }catch(Throwable $e){
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function sendWorkAnniversaryMail(Request $request){
            try{
                $employee = EmpDetail::select('id','emp_name','emp_email_first','emp_designation','emp_doj')->where('emp_email_first',$request->emp_mail)->first();
                $date = Carbon::parse($employee->emp_doj);
                $diffYear = Carbon::now()->diffInYears($date);
                
                $mailData = [
                    'name' =>    $employee->emp_name,
                    'message' => $request->message,
                    'designation' => $employee->emp_designation,
                    'year' =>  $diffYear
                ];
                Mail::to($employee->emp_email_first)->send(new EmpWorkingAnniversaryMailWishSend($mailData));
                return response()->json(['success' => true,'message' => 'Work Anniversary wishes sent !']);
            }catch(Throwable $e){
                return response()->json(['error' => true, 'message' => $e->getMessage()]);
            }
    }

    // show leave details
    
    public function leaveDetails($id){

        $employeeLeaves = LeaveRequest::with('employee')->select('leave_requests.id','department_head_email','leave_code','emp_code','cc','total_days','reason_for_absence','absence_dates','status','created_at','comment')
        ->where('status', 'Wait')
        ->where('id',$id)
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
