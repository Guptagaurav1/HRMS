<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Department;
use App\Models\City;
use App\Models\FunctionalRole;
use App\Models\Qualification;
use App\Models\Skill;
use App\Models\User;
use App\Models\PositionRequest;
use App\Models\SendMailLog;
use App\Models\Company;
use App\Models\RecruitmentForm;
use App\Models\Bank;
use App\Models\AppointmentFormat;
use Throwable;
use Illuminate\Validation\Rules\File;
use App\Mail\JobDescriptionMail;
use App\Mail\ShortlistMail;
use stdClass;
use Mail;
use PDF;
use Illuminate\Support\Facades\DB;
use App;
class RecruitmentController extends Controller
{
    public $cc;

    public function __construct(){
        $this->cc = 'vikas.verma@prakharsoftwares.com';
    }
    /**
     * Show the form of position request.
     */
    public function position_request(){
        $departments = Department::select('id', 'department')->whereNull('deleted_at')->get();
        $states = State::select('id', 'state')->whereNull('deleted_at')->get();
        $functional_role = FunctionalRole::select('id', 'role')->whereNull('deleted_at')->get();
        $qualification = Qualification::select('id', 'qualification')->whereNull('deleted_at')->get();
        $skills = Skill::select('id', 'skill')->whereNull('deleted_at')->get();
        $roleid = get_role_id('hr_executive');
        $hr_executives = User::select('id', 'first_name', 'last_name')->where('role_id', $roleid)->get();
        return view(" hr.position-request", compact('departments', 'states', 'functional_role', 'qualification', 'skills', 'hr_executives'));
    } 

    /**
     * Get cities from states.
     */
    public function get_cities(Request $request){
        $cities = City::select('id', 'city_name')->where(['state_code' => $request->stateid])->get();
        return response()->json(['success' => true, 'cities' => $cities]);
    } 

    /**
     * Store position request.
     */
    public function store_position(Request $request){

        $this->validate($request, [
            'position_title' => ['required'],
            'client_name' => ['required'],
            'department' => ['required'],
            'employment_type' => ['required'],
            'no_of_requirements' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'salary_from' => ['required'],
            'salary_to' => ['required'],
            'functional_role' => ['required'],
            'job_description' => ['required'],
            'remarks' => ['required'],
            'education' => ['required'],
            'exp_from' => ['required'],
            'exp_to' => ['required'],
            'skill_sets' => ['required'],
            'assigned_executive' => ['required'],
            'attachment' => [File::types(['pdf'])->max('2mb')]
        ]);

        $previous_requests = PositionRequest::select(['id', 'req_id'])->orderByDesc('id')->first();
        if ($previous_requests) {
            $req_id = $previous_requests->req_id + 1;
            $new_id = $previous_requests->id + 1;
        }
        else {
            $req_id = 1;
            $new_id = 1;
        }

        if ($request->file('attachment')) {
           $file = $request->file('attachment');
           $path = public_path('position-request/attachments');
           $full_filename = $file->getClientOriginalName();
           $filename = explode(".", $full_filename);
           $filename = $filename[0]."_".time().".".$filename[1];
           $request->attachment->move($path, $filename);
        }
        $record = new PositionRequest();
        $record->fill($request->all());
        $record->req_id = $req_id;
        $record->unique_id = $new_id . "/" . $request->position_title . "/" . $request->client_name;
        $record->salary_range = $request->salary_from.",".$request->salary_to;
        $record->functional_role = implode(",", $record->functional_role);
        $record->experience = $request->exp_from.",".$request->exp_to;
        $record->education = implode(",", $record->education);
        $record->assigned_executive = implode(",", $record->assigned_executive);
        $record->skill_sets = implode(",", $record->skill_sets);
        $record->attachment = !empty($filename) ? $filename : '';
        $record->save();

        return redirect()->route('position-request');

    } 

    /**
     * Show the listing of position requested.
     */
    public function recruitment_report()
    {
        $positions = PositionRequest::whereNotNull('assigned_executive')->where('recruitment_type', 'fresh')->orderByDesc('id')->paginate(10);  
        return view("hr.recruitment-report", compact('positions'));
    } 

    /**
     * Show the job description.
     * @param $jobid 
     */
    public function prev_descr($id){
        try {
            $request = PositionRequest::findOrFail($id);
            return view("hr.preview-executive-description", compact('request'));
        }
        catch(Throwable $th){
            return redirect()->route('recruitment-report')->with(['error' => true, 'message' => 'Server Error']);
        }
        
    } 

    /**
     * Send single mail of JD.
     */ 
    public function send_jd_mail(Request $request)
    {
        try{
            DB::beginTransaction();
            $this->validate($request, [
                'jobseeker_name' => ['required', 'string'],
                'jobseeker_email' => ['required', 'email'],
                'department' => ['required', 'string'],
                'sender_email' => ['required', 'email'],
                'message' => ['required', 'string'],
                'state_name' => ['required', 'string'],
                'cityname' => ['required', 'string'],
                'qualification' => ['required', 'string'],
                'skill_set' => ['required', 'string'],
                'experience' => ['required', 'string'],
                'description' => ['required', 'string']
            ]);
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $previous = SendMailLog::orderByDesc('id')->value('id');
            if (empty($previous)) {
               $previous = 0;
            }
            $uni_id = ($previous + 1).'/'.str_replace(' ','',$request->job_position).'/'.$request->jobseeker_email;

            SendMailLog::create([
                'uni_id' => $uni_id,
                'receiver_name' => $request->jobseeker_name,
                'receiver_email' => $request->jobseeker_email,
                'job_position' => $request->position_id,
                'department' => $request->department,
                'sender_email' => $request->sender_email,
                'message' => $request->message,
            ]);

            // Send Mail.
            $maildata = new stdClass();
            $maildata->name = $request->jobseeker_name;
            $maildata->job_position = $request->job_position;
            $maildata->job_description = $request->description;
            $maildata->link = '<a>Click Here</a>';
            $maildata->url = '';
            $maildata->sender_name = $user->first_name." ".$user->last_name;
            $maildata->sender_from = $user->email;
            $maildata->sender_phone = $user->phone;
            $maildata->email = $company->email;
            $maildata->phone = $company->mobile;
            $maildata->website = $company->website;
            $maildata->address = $company->address;
            $maildata->department = $request->department;
            $maildata->city = $request->cityname;
            $maildata->state = $request->state_name;
            $maildata->education = $request->qualification;
            $maildata->skill_sets = $request->skill_set;
            $maildata->exp = $request->experience;
            $maildata->remarks = $request->remark;
            $maildata->subject = $request->job_position." Job Description";

            Mail::to($request->jobseeker_email)->send(new JobDescriptionMail($maildata));
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Mail Sent Successfully.']);
        }
        catch(Throwable $th){
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Send single mail of JD.
     */ 
    public function send_bulk_mail(Request $request)
    {
        try{
            DB::beginTransaction();
            $fileobj = new File();
            $this->validate($request, [
                'department' => ['required', 'string'],
                'sender_email' => ['required', 'email'],
                'message' => ['required', 'string'],
                'state_name' => ['required', 'string'],
                'cityname' => ['required', 'string'],
                'qualification' => ['required', 'string'],
                'skill_set' => ['required', 'string'],
                'experience' => ['required', 'string'],
                'description' => ['required', 'string'],
                'file' => ['required', 'extensions:csv', $fileobj->max('1mb')]
            ]);
            $file = $request->file('file');
            $fileContents = file($file->getPathname());
            $data = [];
            foreach ($fileContents as $line) {
                $data[] = str_getcsv($line);
            }
            $headers = $data[0];
            // Validate whether headers contain all fields or not.
            if (count($headers) == 2 && in_array("Name", $headers) && in_array("Email", $headers)) {
                unset($data[0]);
                // Get Name index and email index.
                $nameindex = strtolower($headers[0]) == 'name' ? 0 : 1;
                $emailindex = strtolower($headers[1]) == 'email' ? 1 : 0;

                $user = auth()->user();
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);

                // Send Mail.
                $maildata = new stdClass();
                $maildata->job_position = $request->job_position;
                $maildata->job_description = $request->description;
                $maildata->link = '<a>Click Here</a>';
                $maildata->url = '';
                $maildata->sender_name = $user->first_name." ".$user->last_name;
                $maildata->sender_from = $user->email;
                $maildata->sender_phone = $user->phone;
                $maildata->email = $company->email;
                $maildata->phone = $company->mobile;
                $maildata->website = $company->website;
                $maildata->address = $company->address;
                $maildata->department = $request->department;
                $maildata->city = $request->cityname;
                $maildata->state = $request->state_name;
                $maildata->education = $request->qualification;
                $maildata->skill_sets = $request->skill_set;
                $maildata->exp = $request->experience;
                $maildata->remarks = $request->remark;
                $maildata->subject = $request->job_position." Job Description";

                for ($i=1; $i < count($data); $i++) { 
                   $name = $data[$i][$nameindex];
                   $email = $data[$i][$emailindex];
                   $previous = SendMailLog::orderByDesc('id')->value('id');
                    if (empty($previous)) {
                       $previous = 0;
                    }
                    $uni_id = ($previous + 1).'/'.str_replace(' ','',$request->job_position).'/'.$request->jobseeker_email;

                
                    SendMailLog::create([
                    'uni_id' => $uni_id,
                    'receiver_name' => $name,
                    'receiver_email' => $email,
                    'job_position' => $request->position_id,
                    'department' => $request->department,
                    'sender_email' => $request->sender_email,
                    'message' => $request->message,
                    ]);

                    $maildata->name = $name;
                    Mail::to($email)->send(new JobDescriptionMail($maildata));
                }
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Mail Sent Successfully.']);
            }
            else {
              DB::rollBack();
              return response()->json(['error' => true, 'message' => 'Invalid CSV file']);
            }
        }
        catch(Throwable $th){
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server File']);
        }
    }

    /**
     * Show position contacts.
     */
    public function position_contacts(Request $request, $id)
    {
        try {
            $position = PositionRequest::select('position_title', 'id')->findOrFail($id);
            $contacts = SendMailLog::leftJoin('recruitment_forms', 'send_mail_log.uni_id', '=', 'recruitment_forms.send_mail_id')->select('send_mail_log.receiver_name', 'send_mail_log.receiver_email', 'send_mail_log.sender_email', 'send_mail_log.job_position', 'recruitment_forms.doj', 'recruitment_forms.finally', 'recruitment_forms.status', 'recruitment_forms.id AS rec_id')->where('send_mail_log.job_position', $id);
            $search = '';
            if ($request->search) {
                $search = $request->search;
                $contacts = $contacts->whereAny([
                    'send_mail_log.receiver_name',
                    'send_mail_log.receiver_email',
                    'send_mail_log.sender_email'
                ], 'LIKE', '%'.$request->search.'%');
            }
            
            $contacts = $contacts->orderByDesc('send_mail_log.id')->paginate(10)->withQueryString();

            return view("hr.show-assign-work-log", compact('position', 'contacts', 'search', 'id'));
        }
        catch(Throwable $th){
            return redirect()->route('recruitment-report')->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Show the details of JD.
     */
    public function preview_jd($id)
    {
        try {
            $position = PositionRequest::findOrFail($id);
            return view("hr.preview-job-description", compact('position', 'id'));
        }
        catch(Throwable $th){
            return redirect()->route('show-assign-work-log', ['id' => $id])->with(['error' => true, 'message' => 'Server Error']);
        }
    }  

    /**
     * Show the details of JD.
     * @param recruitment form id, $rec_id
     */
    public function applicant_detail($rec_id, $position){
        try {
            $data = RecruitmentForm::findOrFail($rec_id);
            return view("hr.applicant-recruitment-details-summary", compact('data'));
        }
        catch(Throwable $th)
        {
            return redirect()->route('show-assign-work-log', ['id' => $position])->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Update email of position contact user.
     */
    public function update_email(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'update_email' => ['required', 'email:filter']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->email = $request->update_email;
            $details->save();    
            return response()->json(['success' => true, 'message' => 'Email Update Successfully.']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error.']);
        }
    }

    /**
     * Update salary of position contact user.
     */
    public function update_salary(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'update_salary' => ['required', 'integer']
            ]);

            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->salary = $request->update_salary;
            $details->save();  
            return response()->json(['success' => true, 'message' => 'Salary Update Successfully.']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Update doj of position contact user.
     */
    public function update_doj(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'update_doj' => ['required']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->doj = $request->update_doj;
            $details->save();      
            return response()->json(['success' => true, 'message' => 'Date of Joining Update Successfully.']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }   

    /**
     * Update Location of position contact user.
     */
    public function update_location(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'update_location' => ['required', 'string']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->location = $request->update_location;
            $details->save();      
            return response()->json(['success' => true, 'message' => 'Location Update Successfully.']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }


    /**
     * Update Scope of work of position contact user.
     */
    public function update_work_scope(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'update_scope_work' => ['required', 'string']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->scope_of_work = $request->update_scope_work;
            $details->save();      
            return response()->json(['success' => true, 'message' => 'Scope of Work Update Successfully.']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }  

    /**
     * Shortlist first stage of position contact user.
     */
    public function shortlist_first_stage(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'first_shortlist' => ['required', 'string'],
            ]);
            DB::beginTransaction();
            $details = RecruitmentForm::findOrFail($request->recruitment);
            // Get Company Details.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $sender_name = $user->first_name." ".$user->last_name;

            if ($request->first_shortlist == 'shortlist') {
                $details->stage1 = 'yes';
                $details->finally = 'first-selected';
                $details->save();  

                // Content.
                $html = "<h4>We are pleased to inform you that you are eligible for the interview session. We will notify the interview schedule to you.</h4></br>
                  <h4>".$details->remarks."</h4></br>
                  <h4>We appreciate your patience</h4></br>
                  </br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";

                // Send shortlist mail.
                $maildata = new stdClass();
                $maildata->subject = $details->job_position." Cv Shortlisted";
                $maildata->name = $details->firstname." ".$details->lastname;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Candidate CV Shortlisted!']);
            }
            else if($request->first_shortlist == 'reject'){
                $details->stage1 = 'no';
                $details->finally = 'first-rejected';
                $details->save();

                // Content.
                $html = "<h4>Greeting from Prakhar Software Solutions Pvt Ltd.!!</h4></br>
                  <h4>We feel regret to share that your profile is not selected for the position of ".$details->job_position." role.</h4></br>
                  <h4>We have your CV for future reference. We will get back to you with a better opportunity as per your profile.</h4></br>
                  <h4>Best of luck.</h4></br>
                  </br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";

                // Send shortlist mail.
                $maildata = new stdClass();
                $maildata->subject = $details->job_position." Candidate Rejected";
                $maildata->name = $details->firstname." ".$details->lastname;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Candidate Rejected!']);  
            }
        }
        catch(Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }   

    /**
     * Reject First stage of position contact user.
     */
    // public function reject_first_stage(Request $request){
    //     try {
    //         $this->validate($request, [
    //             'recruitment' => ['required', 'integer'],
    //         ]);
    //         $details = RecruitmentForm::findOrFail($request->recruitment);
    //         $details->stage1 = 'no';
    //         $details->finally = 'first-rejected';
    //         $details->save();      

    //         // Send Mail.
    //         return response()->json(['success' => true, 'message' => 'Candidate Rejected!']);
    //     }
    //     catch(Throwable $th) {
    //         return response()->json(['error' => true, 'message' => 'Server Error']);
    //     }
    // }  


    /**
     * Send Interview Details of position contact user.
     */
    public function send_interview_details(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'interview_details' => ['required', 'string']
            ]);
            DB::beginTransaction();
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->finally = 'send_interview_details';
            $details->save();      

            // Get Company Details.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $sender_name = $user->first_name." ".$user->last_name;

            // Content.
            $html = "<h4>Kindly find the interview schedule. Feel free to connect for any query.</h4></br>
                  <h4>" . $request->interview_details . "</h4></br>
                  <h4>All the best.</h4></br>
                  </br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";
            // Send Mail.
            $maildata = new stdClass();
            $maildata->subject = $details->job_position." Interview Details";
            $maildata->name = $details->firstname." ".$details->lastname;
            $maildata->comp_email = $company->email;
            $maildata->comp_phone = $company->mobile;
            $maildata->comp_website = $company->website;
            $maildata->comp_address = $company->address;
            $maildata->content = $html;
            $maildata->url = url('/');
            Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Interview details send to candidate successfully!']);
        }
        catch(Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Store remark of first round of position contact user.
     */
    public function remark_first(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'first_submit' => ['required', 'string'],
                'remarks_first_round' => ['required', 'string']
            ]);
            DB::beginTransaction();
            $details = RecruitmentForm::findOrFail($request->recruitment);
            if ($request->first_submit == 'Select') {
                $details->stage2 = 'yes';
                $details->finally = 'second-selected';
                $details->remarks_first_round = $request->remarks_first_round;
                $details->save();

                // Get Company Details.
                $user = auth()->user();
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
                $sender_name = $user->first_name." ".$user->last_name;

                // Content.
                $html = "<h4>Kudos,</h4></br>
                  <h4>You have successfully cleared the interview round. For further information we will get back to you soon.</h4></br>
                  <h4>Here is the feedback by interviewer :- " . $request->remarks_first_round . "</h4></br>
                  </br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";
                // Send Mail.
                $maildata = new stdClass();
                $maildata->subject = $details->job_position." Interview Stage 1";
                $maildata->name = $details->firstname." ".$details->lastname;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));  
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Candidate 1st round cleared successfully!']);
            }
            else if ($request->first_submit == 'Reject') {
                $details->stage2 = 'no';
                $details->finally = 'second-rejected';
                $details->remarks_first_round = $request->remarks_first_round;
                $details->save();

                // Get Company Details.
                $user = auth()->user();
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
                $sender_name = $user->first_name." ".$user->last_name;

                // Content.
                $html = "<h4>Greeting from Prakhar Software Solutions Pvt Ltd.!!</h4></br>
                    <h4>We feel regret to share that your profile is not selected for the position of ".$details->job_position." role.</h4></br>
                    <h4>We have your CV for future reference. We will get back to you with a better opportunity as per your profile.</h4></br>
                  <h4>Best of luck.</h4></br>
                  </br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";
                // Send Mail.
                $maildata = new stdClass();
                $maildata->subject = $details->job_position." Candidate Rejected";
                $maildata->name = $details->firstname." ".$details->lastname;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));  
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Candidate Rejected!']);
            }
            else if ($request->first_submit == 'Skip') {
                $details->stage2 = 'skip';
                $details->finally = 'second-skipped';
                $details->remarks_first_round = $request->remarks_first_round;
                $details->save();

                DB::commit();
                return response()->json(['success' => true, 'message' => 'Candidate 1st round skipped successfully!']);
            }
        }
        catch(Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Store remark of first round of position contact user.
     */
    public function remark_second(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'second_submit' => ['required', 'string'],
                'remarks_second_round' => ['required', 'string']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            // Get Company Details.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $sender_name = $user->first_name." ".$user->last_name;

            if ($request->second_submit == 'Select') {
                $details->stage3 = 'yes';
                $details->finally = 'third-selected';
                $details->remarks_second_round = $request->remarks_second_round;
                $details->save();  

                // Content.
                $html = "<h4>Kudos,</h4></br>
                  <h4>You have successfully cleared the interview round. For further information we will get back to you soon.</h4></br>
                  <h4>Here is the feedback by interviewer :- " . $request->remarks_second_round . "</h4></br>
                  </br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";
                // Send Mail.
                $maildata = new stdClass();
                $maildata->subject = $details->job_position." Interview Stage 2";
                $maildata->name = $details->firstname." ".$details->lastname;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));  
                return response()->json(['success' => true, 'message' => 'Candidate 2nd round cleared successfully!']);  
            }
            else if ($request->second_submit == 'Reject') {
                $details->stage3 = 'no';
                $details->finally = 'third-rejected';
                $details->remarks_second_round = $request->remarks_second_round;
                $details->save();  

                // Content.
                $html = "<h4><h4>Greeting from Prakhar Software Solutions Pvt Ltd.!!</h4></br>
                  <h4>We feel regret to share that your profile is not selected for the position of ".$details->job_position." role.</h4></br>
                  <h4>We have your CV for future reference. We will get back to you with a better opportunity as per your profile.</h4></br>
                  <h4>Best of luck.</h4></br>
                  </br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";
                // Send Mail.
                $maildata = new stdClass();
                $maildata->subject = $details->job_position." Candidate Rejected";
                $maildata->name = $details->firstname." ".$details->lastname;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));  
                return response()->json(['success' => true, 'message' => 'Candidate Rejected!']);  
            }
           else if ($request->second_submit == 'Skip') {
                $details->stage3 = 'skip';
                $details->finally = 'third-skipped';
                $details->remarks_second_round = $request->remarks_second_round;
                $details->save();

                DB::commit();
                return response()->json(['success' => true, 'message' => 'Candidate 2nd round skipped successfully!']);
            }
           
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Save third stage record of position contact user.
     */
    public function save_third_stage(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'doj' => ['required']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->stage4 = 'yes';
            $details->finally = 'fourth-selected';
            $details->doj = $request->doj;
            $details->save();  

            // Get Company Details.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $sender_name = $user->first_name." ".$user->last_name;
            $url = route('guest.personal_details', ['id' => $details->id]);
            $joining_kit = asset('recruitment/joining_kit.zip');

            // Content.
            $html = "<h4>Congratulations to $details->firstname</h4></br></br>
  
            <h4>We are pleased to inform you that you have been selected for the profile of " . $details->job_position . " at Prakhar Software Solutions Pvt. Ltd. </h4></br></br>
           
            <h4>You are therefore requested to report to our office for joining formalities. Also, you will be briefed about the services and profile of the client organization.</h4></br></br>
             
            <h4>Click on the link <a href='" . $url . "'>Click here</a> to complete the Joining formalities. (*The Link is valid for 48 hr Only) </h4></br></br>
            <h4>Please find attachment <a href='" . $joining_kit . "'>Click here</a></h4></br></br>

            <h4>Feel free to connect for any query.
            </h4></br></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";

            // Send Mail.
            $maildata = new stdClass();
            $maildata->subject = $details->job_position." Selected";
            $maildata->name = $details->firstname." ".$details->lastname;
            $maildata->comp_email = $company->email;
            $maildata->comp_phone = $company->mobile;
            $maildata->comp_website = $company->website;
            $maildata->comp_address = $company->address;
            $maildata->content = $html;
            $maildata->url = url('/');
            Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));   
            return response()->json(['success' => true, 'message' => 'Candidate has been selected and confirmation mail sent successfully!']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Send Offer Letter and save fifth stage of position contact user.
     */
    public function send_offer_letter(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
            ]);
            DB::beginTransaction();
            $details = RecruitmentForm::findOrFail($request->recruitment);

            // Send Mail.
            $formats = AppointmentFormat::where(['type' => 'offer letter', 'name' => 'Text', 'employment_type' => $details->employment_type])->first();

            $message = $formats->format;
            $message_2 = $formats->format_2;

            $today_date = date("d/M/Y");
            $signimg = asset('recruitment/images/sign.png');
            $img_sign = '<img src="'.$signimg.'" style="height:50px; width:100px" /><br />';
            $details->gender == 'Female' ? $title = 'Ms./Mrs.' :  $title = 'Mr.';

            $message_new = str_replace('{{today_date}}', $today_date, $message);
            $message_new = str_replace('{{candidate_name}}', $details->firstname." ".$details->lastname, $message_new);
            $message_new = str_replace('{{designation}}', $details->job_position, $message_new);
            $message_new = str_replace('{{location}}', $details->location, $message_new);
            $message_new = str_replace('{{emp_code}}', $details->emp_code, $message_new);
            $message_new = str_replace('{{ctc}}', $details->salary, $message_new);
            $message_new = str_replace('{{posting_location}}', $details->location, $message_new);
            $message_new = str_replace('{{doj}}', $details->doj, $message_new);
            $message_new = str_replace('{{img_sign}}', $details->img_sign, $message_new);

            $message_new = str_replace('{{id}}', $details->app_id, $message_new);
            $message_new = str_replace('{{district}}', $details->getDistrict->district_name, $message_new);
            $message_new = str_replace('{{state}}', $details->getState->state, $message_new);
            $message_new = str_replace('{{pincode}}', $details->pincode, $message_new);
            $message_new = str_replace('{{address}}', $details->candidate_address, $message_new);
            $message_new = str_replace('{{title}}', $title, $message_new);
            $message_new = str_replace('{{relation}}', $details->relation, $message_new);
            $message_new = str_replace('{{relative_name}}', $details->relative_name, $message_new);
            
            $message_new .= $message_2;
            
            $message_new = str_replace('{{sow}}', $details->scope_of_work, $message_new);
            $header_image = asset('recruitment/images/prakhar_header.png');
            $footer_image = asset('recruitment/images/prakhar_footer.png');
            $html = '<div backimg="background.jpg" margin-top="10px" backtop="25mm" backleft="20mm" backright="20mm" backbottom="25mm">
                        <div>
                            <div class="header">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                        <img src="'.$header_image.'" width="750" height="100" alt="header-image"/>                                    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                         <div>
                        <div class="footer">
                            <table>
                                <tbody>
                                    <td>                                        
                                        <img src="'.$footer_image.'" width="750" height="100" alt="footer-image"/>                                    
                                    </td>
                                </tbody>
                            </table>
                            </div>
                            <br>
                            <br>
                        </div>
                        ' . $message_new . '
                    </div>';
            // print_r($message_new);
            // die;
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            $path = public_path('recruitment/offer-letter');
            $fileName = 'offer-letter-' . time() . '.pdf';
            $fullPath = $path . '/' . $fileName;

            $pdf->save($fullPath)->stream('invoice.pdf');

             // Permission problem.
            // if (file_exists($fullPath)) {
            //     unlink($fullPath);
            // }
            // Save data.
            $details->stage5 = 'yes';
            $details->finally = 'offer-letter-sent';
            $details->offer_letter = $html;
            $details->save(); 

            // Mail Content.
            // Get Company Details.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $sender_name = $user->first_name." ".$user->last_name;
            $acceptance_form = route('guest.acceptance_form', ['id' => $request->recruitment]);
            // Content.
            $mail_html = "<div style='text-align: left;margin-left: 10px;'><h4>Congratulation from Prakhar Software Solutions Pvt Ltd.!!</h4></br>
  
            <h4>You have been selected for the position of " . $details->job_position . " role at " . $details->location . ". </h4></br>
           
            <h4>Your date of joining would be on or before " . $details->doj . ", and your Appointment Letter will be released after your Joining.</h4></br>
             
            <h4><a href='".$acceptance_form."'>Click here</a> to acknowledge the receipt of mail. </h4></br> 
            <h4>Please find attached Offer Letter.</h4></br>
             
            <h4>Best of luck.
            </h4></br></div>
            </br></br>
                <h4 style='text-align: left;
                  margin-left: 30px;'>Regards,</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>" . $sender_name . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Email:- " . $user->email . "</h4></br>
                  <h4 style='text-align: left;
                  margin-left: 30px;'>Mobile:- " . $user->phone . "</h4></br>
                  <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";

            // Send Mail.
            $maildata = new stdClass();
            $maildata->subject = $details->job_position." Interview Stage 2";
            $maildata->name = $details->firstname." ".$details->lastname;
            $maildata->comp_email = $company->email;
            $maildata->comp_phone = $company->mobile;
            $maildata->comp_website = $company->website;
            $maildata->comp_address = $company->address;
            $maildata->content = $mail_html;
            $maildata->url = url('/');
            $maildata->file = $fullPath;

            Mail::to($details->email)->cc($this->cc)->send(new ShortlistMail($maildata));   
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Mail Send Successfully!']);
        }
        catch(Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Store join status of position contact user.
     */
    public function store_join_status(Request $request){
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'emp_code' => ['required']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->finally = 'joined';
            $details->stage6 = 'yes';
            $details->emp_code = $request->emp_code;
            $details->save();      
            // Send Mail.
            return response()->json(['success' => true, 'message' => 'Submitted Candidate has been joined!']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Show personal details form for new candidate.
     */ 
    public function personal_details($id)
    {
        return view('guest.user_details');
    } 

    /**
     * Backout the candidate.
     */ 
    public function backout_candidate(Request $request)
    {
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
                'backout_reason' => ['required', 'string']
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->finally = 'backout';
            $details->remarks_for_backout = $request->backout_reason;
            $details->save();      
            // Send Mail.
            return response()->json(['success' => true, 'message' => 'Submitted Candidate Backout with Reasons!']);
        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Show the Verify Document Form.
     */ 
    public function verify_document(Request $request, $id, $position)
    {
        try {
            $details = RecruitmentForm::findOrFail($id);
            $skills = Skill::select('id', 'skill')->whereNull('deleted_at')->get();
            $banks = Bank::select('id', 'name_of_bank')->whereNull('deleted_at')->get();
            return view("hr.recruitment.verify-documents", compact('details', 'skills', 'banks'));
        }
        catch(Throwable $th) {
            return redirect()->route('applicant-recruitment-details-summary', ['rec_id' => $id, 'position' => $position])->with(['error' => true, 'message' => 'Server Error']);
        }   
    }

    /**
     * Store the Verify Document data.
     */ 
    public function check_verify(Request $request)
    {
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->finally = 'docs_checked';
            $details->save();  
            return response()->json(['success' => true, 'message' => 'Documents Checked Successfully!']);

        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);

        }   
    }


    /**
     * Complete joining formalities.
     */ 
    public function complete_joining_formalities(Request $request)
    {
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
            ]);
            $details = RecruitmentForm::findOrFail($request->recruitment);
            $details->finally = 'joining-formalities-completed';
            $details->save();  
            return response()->json(['success' => true, 'message' => 'Document Verified Successfully!']);

        }
        catch(Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error']);

        }   
    }

    /**
     * show the Offer Letter.
     */ 
    public function preview_offer_letter(Request $request)
    {
        try {
            $this->validate($request, [
                'recruitment' => ['required', 'integer'],
            ]);
            DB::beginTransaction();
            $details = RecruitmentForm::findOrFail($request->recruitment);

            // Send Mail.
            $formats = AppointmentFormat::where(['type' => 'offer letter', 'name' => 'Text', 'employment_type' => $details->employment_type])->first();

            $message = $formats->format;
            $message_2 = $formats->format_2;

            $today_date = date("d/M/Y");
            $signimg = asset('recruitment/images/sign.png');
            $img_sign = '<img src="'.$signimg.'" style="height:50px; width:100px" /><br />';
            $details->gender == 'Female' ? $title = 'Ms./Mrs.' :  $title = 'Mr.';

            $message_new = str_replace('{{today_date}}', $today_date, $message);
            $message_new = str_replace('{{candidate_name}}', $details->firstname." ".$details->lastname, $message_new);
            $message_new = str_replace('{{designation}}', $details->job_position, $message_new);
            $message_new = str_replace('{{location}}', $details->location, $message_new);
            $message_new = str_replace('{{emp_code}}', $details->emp_code, $message_new);
            $message_new = str_replace('{{ctc}}', $details->salary, $message_new);
            $message_new = str_replace('{{posting_location}}', $details->location, $message_new);
            $message_new = str_replace('{{doj}}', $details->doj, $message_new);
            $message_new = str_replace('{{img_sign}}', $details->img_sign, $message_new);

            $message_new = str_replace('{{id}}', $details->app_id, $message_new);
            $message_new = str_replace('{{district}}', $details->getDistrict->district_name, $message_new);
            $message_new = str_replace('{{state}}', $details->getState->state, $message_new);
            $message_new = str_replace('{{pincode}}', $details->pincode, $message_new);
            $message_new = str_replace('{{address}}', $details->candidate_address, $message_new);
            $message_new = str_replace('{{title}}', $title, $message_new);
            $message_new = str_replace('{{relation}}', $details->relation, $message_new);
            $message_new = str_replace('{{relative_name}}', $details->relative_name, $message_new);
            
            $message_new .= $message_2;
            
            $message_new = str_replace('{{sow}}', $details->scope_of_work, $message_new);
            $header_image = asset('recruitment/images/prakhar_header.png');
            $footer_image = asset('recruitment/images/prakhar_footer.png');
            $html = '<div backimg="background.jpg" margin-top="10px" backtop="25mm" backleft="20mm" backright="20mm" backbottom="25mm">
                        <div>
                            <div class="header">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                        <img src="'.$header_image.'" width="750" height="100" alt="header-image"/>                                    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                         <div>
                        <div class="footer">
                            <table>
                                <tbody>
                                    <td>                                        
                                        <img src="'.$footer_image.'" width="750" height="100" alt="footer-image"/>                                    
                                    </td>
                                </tbody>
                            </table>
                            </div>
                            <br>
                            <br>
                        </div>
                        ' . $message_new . '
                    </div>';
            // print_r($message_new);
            // die;
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($html);
            $path = public_path('recruitment/offer-letter');
            $fileName = 'offer-letter-' . time() . '.pdf';
            $fullPath = $path . '/' . $fileName;

            $pdf->save($fullPath)->stream('invoice.pdf');
            $fileurl = asset('recruitment/offer-letter/'.$fileName);
  
            DB::commit();
            return response()->json(['success' => true, 'path' => $fileurl]);
        }
        catch(Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Show Acceptance Form.
     */ 
    public function show_acceptance_form(Request $request)
    {
        return view('guest.acceptance-form');
    }

}
