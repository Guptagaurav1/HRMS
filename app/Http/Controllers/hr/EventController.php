<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpDetail;
use App\Models\EmpWishMailLog;
use App\Mail\SendMailBirthDay;
use App\Models\Company;
use App\Mail\EmpBirthdayWishMail;
use Illuminate\Validation\Rules\File;
use App\Mail\EmpMarriageAnniversaryMail;
use App\Mail\EmpWorkingAnniversaryMailWishSend;
use Illuminate\Support\Facades\DB;
use Throwable;
use stdClass;
use Mail;
use Illuminate\Support\Number;
use Carbon\Carbon;

class EventController extends Controller
{
    public $cc;

    public function __construct()
    {
        $this->cc = 'vikas.verma@prakharsoftwares.com';  // Replace this with info@prakharsoftwares.com
    } 
    /**
     * Show the list of upcoming birthday list in coming 40 days.
     */
    public function birthday_list(Request $request)
    {
        $comingdate = date('Y-m-d', strtotime('+40 days'));
        $currentdate = date('Y-m-d');
        $employees = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_work_order', 'emp_details.emp_name', 'emp_details.emp_email_first')
                    ->where('emp_current_working_status', 'Active')
                    ->whereHas('getPersonalDetail', function ($query) use ($comingdate, $currentdate) {
                        $query->whereRaw("DATE_FORMAT(emp_dob,'%m-%d') <= DATE_FORMAT(? ,'%m-%d')", [$comingdate])
                        ->whereRaw("DATE_FORMAT(emp_dob,'%m-%d') >= DATE_FORMAT(? ,'%m-%d')", [$currentdate])
                        ->orderByRaw('DATE_FORMAT(emp_dob,"%m-%d")');
                    });
        $search = '';
        if($request->search){
            $search = $request->search;
            $employees->where(function ($query) use ($search) {
                $query->where('emp_details.emp_code', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_name', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_work_order', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_email_first', 'LIKE', '%'. $search. '%');
            });
        }
        $imageurl = asset('events/birthday/bg_two.jpg');
        $employees = $employees->paginate(25)->withQueryString();
        return view("hr.events.birthday-list", compact('employees', 'search', 'imageurl'));
    }

    /**
     * Show the list of events.
     */
    public function anniversary_list(Request $request)
    {
        $comingdate = date('Y-m-d', strtotime('+15 days'));
        $currentdate = date('Y-m-d');
        $employees = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_work_order', 'emp_details.emp_name', 'emp_details.emp_email_first')
                    ->where('emp_current_working_status', 'Active')
                    ->whereHas('getPersonalDetail', function ($query) use ($comingdate, $currentdate) {
                        $query->whereRaw("DATE_FORMAT(emp_dom,'%m-%d') <= DATE_FORMAT(? ,'%m-%d')", [$comingdate])
                        ->whereRaw("DATE_FORMAT(emp_dom,'%m-%d') >= DATE_FORMAT(? ,'%m-%d')", [$currentdate])
                        ->orderByRaw('DATE_FORMAT(emp_dom,"%m-%d")');
                    });
        $search = '';
        if($request->search){
            $search = $request->search;
            $employees->where(function ($query) use ($search) {
                $query->where('emp_details.emp_code', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_name', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_work_order', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_email_first', 'LIKE', '%'. $search. '%');
            });
        }

        $employees = $employees->paginate(25)->withQueryString();
        return view("hr.events.marriage-anniversary-list", compact('employees', 'search'));
    }

    /**
     * Show the list of events.
     */
    public function work_anniversary_list(Request $request)
    {
        $comingdate = date('Y-m-d', strtotime('+40 days'));
        $currentdate = date('Y-m-d');
        $employees = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_work_order', 'emp_details.emp_name', 'emp_details.emp_email_first', 'emp_details.emp_doj')
                    ->where('emp_current_working_status', 'Active')
                    ->whereRaw("DATE_FORMAT(emp_doj,'%m-%d') <= DATE_FORMAT(? ,'%m-%d')", [$comingdate])
                    ->whereRaw("DATE_FORMAT(emp_doj,'%m-%d') >= DATE_FORMAT(? ,'%m-%d')", [$currentdate])
                    ->orderByRaw('DATE_FORMAT(emp_doj,"%m-%d")');
        $search = '';
        if($request->search){
            $search = $request->search;
            $employees->where(function ($query) use ($search) {
                $query->where('emp_details.emp_code', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_name', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_work_order', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_email_first', 'LIKE', '%'. $search. '%')
                    ->orWhere('emp_details.emp_doj', 'LIKE', '%'. $search. '%');
            });
        }

        $employees = $employees->paginate(25)->withQueryString();
        return view("hr.events.work-anniversary-list", compact('employees', 'search', 'comingdate'));   
    }

    /**
     * Show the birthday template.
     */
    public function birthday_template(Request $request)
    {
        try{
            $request->validate([
                'emp_code' =>'required'
            ]);

            $employee = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_name', 'rec_personal_details.photograph')->leftJoin('rec_personal_details', 'emp_details.emp_code', '=', 'rec_personal_details.emp_code')->where('emp_details.emp_code', $request->emp_code)->first();
            if(empty($employee)){
                return redirect()->route('events.birthday-list')->with(['error' => true,'message' => 'Employee not found.']);
            }
            return view("hr.events.birthday-template", compact('employee'));
        }
        catch(Throwable $e) {
            return redirect()->route('events.birthday-list')->with(['error' => true,'message' => 'Server Error']);
        }
    }

    /**
     * Send birthday mail.
     */
    public function send_birthday_mail(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $request->validate([
                'emp_mail' => ['required', 'email'],
                // 'greeting' => ['required', File::types(['jpg', 'jpeg', 'png'])->max('1mb')]
            ]);

            // if($request->hasFile('greeting')){
            //     $file = $request->file('greeting');
            //     $extension = $file->getClientOriginalExtension();
            //     $file_name = 'birthday_'. time(). '.'. $extension;
            //     $path = public_path('recruitment/candidate_documents/emp_birthday_wish');
            //     $file->move($path, $file_name);
            // }

            $empdetails = EmpDetail::select('emp_code', 'emp_name', 'emp_email_first')->where('emp_email_first', $request->emp_mail)->first();
            if(empty($empdetails)){
                return response()->json(['error' => true,'message' => 'Employee not found.']);
            }

            // Save the log of employee wish.
            EmpWishMailLog::create([
                'emp_code' => $empdetails->emp_code,
                'emp_name' => $empdetails->emp_name,
                'emp_email' => $empdetails->emp_email_first,
                'emp_dob' => $empdetails->getPersonalDetail ? $empdetails->getPersonalDetail->emp_dob : null,
                // 'attachment' => $file_name,
                'wish_type' => 'Birthday',
            ]);

            // Send Mail to user.
            // $user = auth()->user();
            // $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            // $imagelink = asset('recruitment/candidate_documents/emp_birthday_wish').'/'.$file_name;
            // $maildata = new stdClass();
            // $maildata->subject = 'PSSPL Wishes you a Happy Birthday';
            // $maildata->name = "";
            // $maildata->comp_email = $company->email;
            // $maildata->comp_phone = $company->mobile;
            // $maildata->comp_website = $company->website;
            // $maildata->comp_address = $company->address;
            // $maildata->content = $imagelink;
            // $maildata->url = url('/');

            // Mail::to($request->emp_mail)->cc($this->cc)->send(new EmpBirthdayWishMail($maildata));

            $mailData = [
                'message' => $request->message,
                'name' =>    $empdetails->emp_name
            ];
            Mail::to($empdetails->emp_email_first)->send(new SendMailBirthDay($mailData));
            DB::commit();
            return response()->json(['success' => true,'message' => 'Birthday wish sent !']);
        }
        catch(Throwable $e) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the marriage anniversary template.
     */
    public function marriage_template(Request $request)
    {
        try{
            $request->validate([
                'emp_code' =>'required'
            ]);

            $employee = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_name', 'rec_personal_details.photograph')->leftJoin('rec_personal_details', 'emp_details.emp_code', '=', 'rec_personal_details.emp_code')->where('emp_details.emp_code', $request->emp_code)->first();
            if(empty($employee)){
                return redirect()->route('events.marriage-anniversary-list')->with(['error' => true,'message' => 'Employee not found.']);
            }
            return view("hr.events.marriage-anniversary-template", compact('employee'));
        }
        catch(Throwable $e) {
            return redirect()->route('events.marriage-anniversary-list')->with(['error' => true,'message' => 'Server Error']);
        }
    }

    /**
     * Show Work Anniversary Template.
     */
    public function work_anniversary_template(Request $request)
    {
        try{
            $request->validate([
                'emp_code' =>'required'
            ]);

            $employee = EmpDetail::select('emp_details.emp_code', 'emp_details.emp_name', 'emp_details.emp_designation', 'emp_details.emp_doj', 'rec_personal_details.photograph')->leftJoin('rec_personal_details', 'emp_details.emp_code', '=', 'rec_personal_details.emp_code')->where('emp_details.emp_code', $request->emp_code)->first();
            if(empty($employee)){
                return redirect()->route('events.work-anniversary-list')->with(['error' => true,'message' => 'Employee not found.']);
            }
            $comingdate = date('Y-m-d', strtotime('+15 days'));
            $dateOfJoining = $employee->emp_doj;
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dateOfJoining), date_create($comingdate));
            $nth = Number::ordinal($diff->format('%y'));
            return view("hr.events.work-anniversary-template", compact('employee', 'nth'));
        }
        catch(Throwable $e) {
            return redirect()->route('events.work-anniversary-list')->with(['error' => true,'message' => 'Server Error']);
        }
    }

    
    /**
     * Send anniversary mail.
     */
    public function send_anniversary_mail(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $request->validate([
                'emp_mail' => ['required', 'email'],
                // 'greeting' => ['required', File::types(['jpg', 'jpeg', 'png'])->max('1mb')]
            ]);

            // if($request->hasFile('greeting')){
            //     $file = $request->file('greeting');
            //     $extension = $file->getClientOriginalExtension();
            //     $file_name = 'anniversary_'. time(). '.'. $extension;
            //     $path = public_path('recruitment/candidate_documents/emp_work_anniversary');
            //     $file->move($path, $file_name);
            // }

            $empdetails = EmpDetail::select('emp_code', 'emp_name', 'emp_email_first', 'emp_doj')->where('emp_email_first', $request->emp_mail)->first();
            if(empty($empdetails)){
                return response()->json(['error' => true,'message' => 'Employee not found.']);
            }

            // Save the log of employee wish.
            EmpWishMailLog::create([
                'emp_code' => $empdetails->emp_code,
                'emp_name' => $empdetails->emp_name,
                'emp_email' => $empdetails->emp_email_first,
                'emp_dob' => $empdetails->getPersonalDetail ? $empdetails->getPersonalDetail->emp_dob : null,
                'emp_doj' => $empdetails->emp_doj,
                // 'attachment' => $file_name,
                'wish_type' => 'Joining',
            ]);

            // Send Mail to user.
            // $user = auth()->user();
            // $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            // $imagelink = asset('recruitment/candidate_documents/emp_work_anniversary').'/'.$file_name;
            // $maildata = new stdClass();
            // $maildata->subject = 'PSSPL Wishes you a Happy Work Anniversary';
            // $maildata->name = "";
            // $maildata->comp_email = $company->email;
            // $maildata->comp_phone = $company->mobile;
            // $maildata->comp_website = $company->website;
            // $maildata->comp_address = $company->address;
            // $maildata->content = $imagelink;
            // $maildata->url = url('/');

            // Mail::to($request->emp_mail)->cc($this->cc)->send(new EmpBirthdayWishMail($maildata));
            $date = Carbon::parse($empdetails->emp_doj);
            $diffYear = Carbon::now()->diffInYears($date);

            $mailData = [
                'name' =>    $empdetails->emp_name,
                'message' => $request->message,
                'designation' => $empdetails->emp_designation,
                'year' =>  $diffYear
            ];
            Mail::to($empdetails->emp_email_first)->send(new EmpWorkingAnniversaryMailWishSend($mailData));

            DB::commit();
            return response()->json(['success' => true,'message' => 'Work Anniversary wish sent !']);
        }
        catch(Throwable $e) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }
}
