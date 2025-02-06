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
use Throwable;
use Illuminate\Validation\Rules\File;
use App\Mail\JobDescriptionMail;
use stdClass;
use Mail;
use Illuminate\Support\Facades\DB;

class RecruitmentController extends Controller
{
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
            $request = PositionRequest::select('position_title', 'id')->findOrFail($id);
            $contacts = SendMailLog::select('receiver_name', 'receiver_email', 'sender_email')->where('job_position', $id)->orderByDesc('id')->paginate(10);
            return view("hr.show-assign-work-log", compact('request', 'contacts'));
        }
        catch(Throwable $th){
            return redirect()->route('recruitment-report')->with(['error' => true, 'message' => 'Server Error']);
        }
    } 
}
