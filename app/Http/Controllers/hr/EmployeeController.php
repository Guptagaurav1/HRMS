<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;
use App\Models\ReportingManager;
use App\Models\Designation;
use App\Models\Department;
use App\Models\FunctionalRole;
use App\Models\Bank;
use App\Models\Skill;
use App\Models\Company;
use App\Models\EmpDetail;
use App\Models\EmpPersonalDetail;
use App\Models\EmpAccountDetail;
use App\Models\EmpAddressDetail;
use App\Models\EmpIdProof;
use App\Models\EmpEducationDetail;
use App\Models\EmpExperienceDetail;
use App\Models\RecruitmentForm;
use App\Models\PositionRequest;
use Throwable;
use Mail;
use App\Mail\ShortlistMail;
use stdClass;

class EmployeeController extends Controller
{
    /**
     * Show the add employee form.
     */ 
    public function create($recruitment_id = null)
    {
        try {
            $reporting_managers = ReportingManager::select('email')->get();
            $designations = Designation::select('name')->get();
            $departments = Department::select('department')->get();
            $functional_roles = FunctionalRole::select('role')->get();
            $banks = Bank::select('id', 'name_of_bank')->get();
            $skills = Skill::select('skill')->get();
            
            $recruitment_details = new StdClass();
            $employee_id = '';
            if ($recruitment_id){
                $recruitment_details = RecruitmentForm::findOrFail($recruitment_id);
                if ($recruitment_details->finally == 'joined'){
                    $employee_id = EmpDetail::where('emp_code', $recruitment_details->emp_code)->value('id');
                }
            }
            return view("hr.employee.add-employee", compact('reporting_managers', 'designations', 'departments', 'functional_roles', 'banks', 'skills', 'recruitment_details', 'recruitment_id', 'employee_id'));
        }
        catch (Throwable $e) {
            abort(404);
        }
    }

    /**
     * Store a new employee details record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_emp_details(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->validate($request, [
                'emp_work_order' => ['required','string','max:255'],
                'emp_code' => ['required', 'unique:emp_details'],
                'emp_name' => ['required'],
                'reporting_email' => ['required', 'email'],
                'emp_doj' => ['required'],
                'emp_designation' => ['required'],
                'department' => ['required'],
                'emp_phone_first' => ['required', 'digits:10'],
                'emp_email_first' => ['required','email'],
                'emp_current_working_status' => ['required'],
            ]);

            // Gerneate Password.
            $emp_password = substr(str_shuffle("01234567891234567890"), 0, 6);

            // Save employee details
            $data = $request->all();
            unset($data["rec_id"]);
            unset($data["position_id"]);
            $empdetails = new EmpDetail();
            $empdetails->fill($data);
            $empdetails->emp_functional_role = $request->emp_functional_role ? implode(",", $request->emp_functional_role) : '';
            $empdetails->emp_password = md5($emp_password);
            $empdetails->role_id = get_role_id('Employee');
            $empdetails->save();

            // Update recruitment if needed.
            if ($request->rec_id)
            {
                PositionRequest::where('req_id', $request->position_id)->increment('no_of_completed_requirements');
                RecruitmentForm::where('id', $request->rec_id)->update(['finally' => 'joined', 'emp_code' => $request->emp_code]);

            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        }
        catch (Throwable $e) {
            DB::rollback();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

     /**
     * Store a new personal details record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_personal_details(Request $request)
    {
        try {
            $this->validate($request, [
                'emp_code' => ['required'],
                'emp_gender' => ['required'],
                'emp_category' => ['required'],
                'emp_dob' => ['required'],
                'emp_marital_status' => ['required']
            ]);

            // Save employee details
            if($request->rec_id)
            {
                EmpPersonalDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id], $request->all()
                );
            }
            else {
                $empdetails = new EmpPersonalDetail();
                $empdetails->fill($request->all());
                $empdetails->save();
            }

            

            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        }
        catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

     /**
     * Store a new address details record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_address_details(Request $request)
    {
        try {
            $this->validate($request, [
                'emp_code' => ['required'],
                'emp_permanent_address' => ['required'],
                'emp_local_address' => ['required']
                ]);

            if($request->rec_id)
            {
                EmpAddressDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id], $request->all()
                );
            }
            else {
                $empdetails = new EmpAddressDetail();
                $empdetails->fill($request->all());
                $empdetails->save();
            }

            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        }
        catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

     /**
     * Store a new bank details record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_bank_details(Request $request)
    {
        try {
            $this->validate($request, [
                'emp_code' => ['required'],
                'bank_id' => ['required'],
                'emp_branch' => ['required'],
                'emp_account_no' => ['required'],
                'emp_ifsc' => ['required'],
                'emp_pan' => ['required']
            ]);

            // Save Account details
            if ($request->rec_id){
                EmpAccountDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id], $request->all()
                );
            }
            else{
                $empdetails = new EmpAccountDetail();
                $empdetails->fill($request->all());
                $empdetails->save();
            }

            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        }
        catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

     /**
     * Store a new education details record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_education_details(Request $request)
    {
        try {
            $this->validate($request, [
                'emp_code' => ['required'],
                'emp_highest_qualification' => ['required']
            ]);

            // Save Account details
            if($request->rec_id)
            {
                EmpEducationDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id], $request->all()
                );
            }
            else {
                $empdetails = new EmpEducationDetail();
                $empdetails->fill($request->all());
                $empdetails->save();
            }
            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        }
        catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

     /**
     * Store a new id details record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_id_details(Request $request)
    {
        try {
            $this->validate($request, [
                'emp_code' => ['required'],
                'emp_aadhaar_no' => ['required'],
                'police_verification_file' => [File::types(['pdf'])->max('1mb')],
                'passport_file' => [File::types(['pdf'])->max('1mb')],
                'correspondence_add_doc' => [File::types(['pdf'])->max('1mb')],
            ]);

            // Save Account details
            $data = $request->all();
            $empdetails = new EmpIdProof();
            $empdetails->fill($data);

           // Store Police verification document.
           if ($request->hasFile('police_verification_file')) {
            $file = $request->file('police_verification_file');
            $police_verification_doc = 'police_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('recruitment/candidate_documents/police_verification'), $police_verification_doc);
            $empdetails->police_verification_file = $police_verification_doc;
            $data['police_verification_file'] = $police_verification_doc;
            }

             // Store Passport document.
            if ($request->hasFile('passport_file')) {
                $file = $request->file('passport_file');
                $passport_doc = 'passport_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/category'), $passport_doc);
                $empdetails->passport_file = $passport_doc;
                $data['passport_file'] = $passport_doc;
            }

            // Store correspondence address proof.
            if ($request->hasFile('correspondence_add_doc')) {
                $file = $request->file('correspondence_add_doc');
                $correspondence_add_doc = 'local_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/correspondence_add_proof'), $correspondence_add_doc);
                $empdetails->correspondence_add_doc = $correspondence_add_doc;
                $data['correspondence_add_doc'] = $correspondence_add_doc;
            }

            if($request->rec_id)
            {
                EmpIdProof::updateOrCreate(
                    ['rec_id' => $request->rec_id], $data
                );
            }
            else {
                $empdetails->save();   
            }
            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        }
        catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

     /**
     * Store a new experience details record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save_experience_details(Request $request)
    {
       try {
            $this->validate($request, [
                'emp_code' => ['required'],
                'emp_skills' => ['required'],
                'resume_file' => [File::types(['pdf'])->max('1mb')]
            ]);

            // Save Experience details
            $data = $request->all();

            $empdetails = new EmpExperienceDetail();
            $empdetails->fill($data);
            $empdetails->emp_skills = $request->emp_skills ? implode(',', $request->emp_skills) : '';
            
            if($request->hasFile('resume_file')){
                $resume = $request->file('resume_file');
                $ext = $resume->getClientOriginalExtension();
                $resume_name = time().'_'.rand(1000,9999).'.'.$ext;
                $resume->move(public_path('recruitment/candidate_documents/employee_resume'), $resume_name);
                $empdetails->resume_file = $resume_name;
                $data['resume_file'] = $resume_name;
            }
            if($request->rec_id){
                EmpExperienceDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id], $data
                );
            }
            else {
                $empdetails->save();
            }

            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        }
        catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }    

    /**
     * Bulk registration of candidate.
     */
    public function bulk_upload(Request $request)
    {
        $this->validate($request, [
            'csv' => ['required', File::types(['csv', 'txt'])->max('1mb')]
        ], [
            'csv.required' => 'The CSV file is required.',
            'csv.file' => 'The selected file is not a valid CSV.',
            'csv.max' => 'The CSV file size may not be greater than 1MB.'
        ]);

        try{
            DB::beginTransaction();
            
            $file = $request->file('csv');
            $fileContents = file($file->getPathname());
            $header = array_shift($fileContents);

            foreach($fileContents as $line_number => $content){
                
                $line = str_getcsv($content);

                $emp_password = substr(str_shuffle("01234567891234567890"), 0, 6);

                // Save Employee Details
                $empdetails = new EmpDetail();
                $empdetails->emp_work_order = $line[0];
                $empdetails->emp_password = md5($emp_password);
                $empdetails->emp_code = $line[1];
                $empdetails->emp_name = $line[2];
                $empdetails->emp_place_of_posting = $line[6];
                $empdetails->emp_designation = $line[8];
                $empdetails->department = $line[9];
                $empdetails->emp_doj = date('Y-m-d', strtotime($line[10]));
                $empdetails->emp_phone_first = $line[21];
                $empdetails->emp_phone_second = $line[22];
                $empdetails->emp_email_first = $line[23];
                $empdetails->emp_email_second = $line[24];
                $empdetails->emp_functional_role = $line[32];
                $empdetails->emp_remark = $line[51];
                $empdetails->role_id = get_role_id('Employee');
                $empdetails->reporting_email = $line[52];
                $empdetails->save();

                // Save Personal Details
                $personaldetails = new EmpPersonalDetail();
                $personaldetails->emp_code = $line[1];
                $personaldetails->emp_gender = $line[3];
                $personaldetails->emp_category = $line[4];
                $personaldetails->emp_dob = date('Y-m-d', strtotime($line[5]));
                $personaldetails->emp_blood_group = $line[25];
                $personaldetails->emp_father_mobile = $line[26];
                $personaldetails->emp_father_name = $line[27];
                $personaldetails->emp_marital_status = $line[28];
                $personaldetails->emp_dom = $line[29];
                $personaldetails->emp_husband_wife_name = $line[30];
                $personaldetails->save();

                // Save Account Details
                $accountdetails = new EmpAccountDetail();
                $accountdetails->emp_code = $line[1];
                $accountdetails->emp_unit = $line[11];
                $accountdetails->emp_salary = $line[12];
                $accountdetails->emp_branch = $line[14];  // leave 13 for bank name
                $accountdetails->emp_account_no = $line[15];
                $accountdetails->emp_ifsc = $line[16];
                $accountdetails->emp_pan = $line[18];
                $accountdetails->emp_pf_no = $line[49];  // Leave 48 for pf no.
                $accountdetails->emp_esi_no = $line[50];
                $accountdetails->save();

                // Save Address Details
                $addressdetails = new EmpAddressDetail();
                $addressdetails->emp_code = $line[1];
                $addressdetails->emp_permanent_address = $line[19];
                $addressdetails->emp_local_address = $line[20];
                $addressdetails->save();

                // Save Id Proof Details
                $idproofdetails = new EmpIdProof();
                $idproofdetails->emp_code = $line[1];
                $idproofdetails->emp_aadhaar_no = $line[17];
                $idproofdetails->save();

                // Save Education Details
                $educationdetails = new EmpEducationDetail();
                $educationdetails->emp_code = $line[1];
                $educationdetails->emp_highest_qualification = $line[7];
                $educationdetails->emp_tenth_year = $line[34];
                $educationdetails->emp_tenth_percentage = $line[35];
                $educationdetails->emp_tenth_board_name = $line[36];
                $educationdetails->emp_twelve_year = $line[37];
                $educationdetails->emp_twelve_percentage = $line[38];
                $educationdetails->emp_twelve_board_name = $line[39];
                $educationdetails->emp_graduation_year = $line[40];
                $educationdetails->emp_graduation_percentage = $line[41];
                $educationdetails->emp_graduation_mode = $line[42];
                $educationdetails->emp_graduation_in = $line[43];
                $educationdetails->emp_postgraduation_year = $line[44];
                $educationdetails->emp_postgraduation_percentage = $line[45];
                $educationdetails->emp_postgraduation_mode = $line[46];
                $educationdetails->emp_postgraduation_in = $line[47];
                $educationdetails->save();

                // Save Experience Details
                $expdetails = new EmpExperienceDetail();
                $expdetails->emp_code = $line[1];
                $expdetails->emp_experience = $line[31];
                $expdetails->emp_skills = $line[33];
                $expdetails->save();

            }
            DB::commit();
            return redirect()->route('employee.employee-list')->with(['success' => true, 'message' => 'Uploaded successfully']);
        }
        catch(Throwable $e){
            DB::rollBack();
            return redirect()->route('employee.employee-list')->with(['error' => true,'message' => 'Server Error']);
        }
    }

    /**
     * Show the list of employees.
     */
    public function show_employees()
    {
        $employees = EmpDetail::where('emp_current_working_status', 'active')->orderByDesc('id')->paginate(10);
        return view("hr.employee.employee-list", compact('employees'));
    }

    /**
     * Edit employee Page.
     */
    public function edit($id)
    {
        try {
            $reporting_managers = ReportingManager::select('email')->get();
            $designations = Designation::select('name')->get();
            $departments = Department::select('department')->get();
            $functional_roles = FunctionalRole::select('role')->get();
            $banks = Bank::select('id', 'name_of_bank')->get();
            $skills = Skill::select('skill')->get();
    
            $employee_id = '';
            $recruitment_id = '';
            $employee_details = EmpDetail::findOrFail($id);
            return view("hr.employee.edit-employee", compact('banks', 'skills', 'reporting_managers', 'designations', 'departments', 'functional_roles', 'employee_id', 'employee_details', 'recruitment_id'));
        }
        catch (Throwable $th) {
            return redirect()->route('employee.employee-list')->with(['error' => true,'message' => 'Server Error']);
        }
    }
}

