<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use App\Models\ReportingManager;
use App\Models\Designation;
use App\Models\Department;
use App\Models\FunctionalRole;
use App\Models\Bank;
use App\Models\City;
use App\Models\Skill;
use App\Models\Company;
use App\Models\State;
use App\Models\EmpDetail;
use App\Models\EmpPersonalDetail;
use App\Models\EmpAccountDetail;
use App\Models\EmpAddressDetail;
use App\Models\EmpIdProof;
use App\Models\EmpEducationDetail;
use App\Models\EmpExperienceDetail;
use App\Models\RecruitmentForm;
use App\Models\PositionRequest;
use App\Models\WorkOrder;
use App\Models\AppointmentFormat;
use App\Models\EmpSendDoc;
use App\Models\EmpChangeLog;
use App\Models\EmpCredentialLog;
use App\Models\Salary;
use App\Models\EmpUpdateHistory;
use Throwable;
use Mail;
use App\Mail\ShortlistMail;
use stdClass;
use App;

class EmployeeController extends Controller
{
    /**
     * Show the add employee form.
     */
    public function create($recruitment_id = null)
    {
        try {
            $reporting_manager_id =  Department::select('reporting_manager_id')->get();
            $repo_id = $reporting_manager_id->pluck('reporting_manager_id');
            $reporting_managers = ReportingManager::select('id', 'name', 'email')->whereNotIn('id', $repo_id)->get();
        
            $designations = Designation::select('name')->orderByDesc('id')->get();
            $departments = Department::select('department')->get();
            $functional_roles = FunctionalRole::select('role')->get();
            $banks = Bank::select('id', 'name_of_bank')->get();
            $skills = Skill::select('id', 'skill')->get();
            $workorders = WorkOrder::select('wo_number')->get();
            $states = State::select('id', 'state')->orderBy('state')->where('country_id', 1)->get();

            $recruitment_details = new StdClass();
            $employee_id = '';
            $cities = '';
            if ($recruitment_id) {
                $recruitment_details = RecruitmentForm::findOrFail($recruitment_id);
                if ($recruitment_details->finally == 'joined') {
                    $employee_id = EmpDetail::where('emp_code', $recruitment_details->emp_code)->value('id');
                }
                if (!empty($recruitment_details->getAddressDetail)) {
                    $cities = City::select('id', 'city_name')->where('state_code', $recruitment_details->getAddressDetail->state)->get();
                }
            }
            return view("hr.employee.add-employee", compact('reporting_managers', 'designations', 'departments', 'functional_roles', 'banks', 'skills', 'recruitment_details', 'recruitment_id', 'employee_id', 'workorders', 'states', 'cities'));
        } catch (Throwable $e) {
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
                'emp_work_order' => ['required', 'string', 'max:255'],
                'emp_code' => ['required', 'unique:emp_details'],
                'emp_name' => ['required'],
                'reporting_email' => ['required', 'email'],
                'emp_doj' => ['required'],
                'emp_designation' => ['required'],
                'department' => ['required'],
                'emp_phone_first' => ['required', 'digits:10'],
                'emp_email_first' => ['required', 'email', 'unique:emp_details,emp_email_first'],
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
            $empdetails->role_id = get_role_id('employee');
            $empdetails->save();

            // Update recruitment if needed.
            if ($request->rec_id) {
                PositionRequest::where('id', $request->position_id)->increment('no_of_completed_requirements');
                RecruitmentForm::where('id', $request->rec_id)->update(['finally' => 'joined', 'emp_code' => $request->emp_code]);
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        } catch (Throwable $e) {
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
                'emp_marital_status' => ['required'],
                'emp_signature' => [File::types(['jpg', 'jpeg', 'png'])->max('1mb')],
                'emp_photo' => [File::types(['jpg', 'jpeg', 'png'])->max('1mb')],
            ]);

                $data = $request->all();
              // Store Signature.
              if ($request->hasFile('emp_signature')) {
                $file = $request->file('emp_signature');
                $signature = 'sign_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/sign'), $signature);
                $data['emp_signature'] = $signature;
            }

            // Store Photograph.
            if ($request->hasFile('emp_photo')) {
                $file = $request->file('emp_photo');
                $photograph = 'photo_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/passport_size_photo'), $photograph);
                $data['emp_photo'] = $photograph;

            }

            // Save employee details
            if ($request->rec_id) {
                EmpPersonalDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id],
                    $data
                );
            } else {
                $empdetails = EmpPersonalDetail::where('emp_code', $request->emp_code)->first();
                if ($empdetails) {
                    $oldDetails = $empdetails->getOriginal();
                    $empdetails->fill($data);
                    $empdetails->save();

                    // Get Only changed values.
                    $changed_values = $empdetails->getChanges();

                    // Create Employee update History.
                    if (count($changed_values) > 0) {
                        unset($changed_values['updated_at']);
                        foreach ($changed_values as $key => $value) {
                            EmpUpdateHistory::create([
                                'emp_code' => $empdetails->emp_code,
                                'column_name' => $key,
                                'old_value' => $oldDetails[$key],
                                'new_value' => $value,
                            ]);
                        }
                    }
                } else {
                    $empdetails = new EmpPersonalDetail();
                    $empdetails->fill($data);
                    $empdetails->save();
                }
                // EmpPersonalDetail::updateOrCreate(
                //     ['emp_code' => $request->emp_code],
                //     $request->all()
                // );

            }
            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        } catch (Throwable $e) {
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

            if ($request->rec_id) {
                EmpAddressDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id],
                    $request->all()
                );
            } else {
                $empdetails = EmpAddressDetail::where('emp_code', $request->emp_code)->first();
                if ($empdetails) {
                    $oldDetails = $empdetails->getOriginal();
                    $empdetails->fill($request->all());
                    $empdetails->save();

                    // Get Only changed values.
                    $changed_values = $empdetails->getChanges();

                    // Create Employee update History.
                    if (count($changed_values) > 0) {
                        unset($changed_values['updated_at']);
                        foreach ($changed_values as $key => $value) {
                            EmpUpdateHistory::create([
                                'emp_code' => $empdetails->emp_code,
                                'column_name' => $key,
                                'old_value' => $oldDetails[$key],
                                'new_value' => $value,
                            ]);
                        }
                    }
                } else {
                    $empdetails = new EmpAddressDetail();
                    $empdetails->fill($request->all());
                    $empdetails->save();
                }

                // EmpAddressDetail::updateOrCreate(
                //     ['emp_code' => $request->emp_code],
                //     $request->all()
                // );
            }

            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        } catch (Throwable $e) {
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
            if ($request->rec_id) {
                EmpAccountDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id],
                    $request->all()
                );
            } else {
                $empdetails = EmpAccountDetail::where('emp_code', $request->emp_code)->first();
                if ($empdetails) {
                    $oldDetails = $empdetails->getOriginal();
                    $empdetails->fill($request->all());
                    $empdetails->save();

                    // Get Only changed values.
                    $changed_values = $empdetails->getChanges();

                    // Create Employee update History.
                    if (count($changed_values) > 0) {
                        unset($changed_values['updated_at']);
                        foreach ($changed_values as $key => $value) {
                            EmpUpdateHistory::create([
                                'emp_code' => $empdetails->emp_code,
                                'column_name' => $key,
                                'old_value' => $oldDetails[$key],
                                'new_value' => $value,
                            ]);
                        }
                    }
                } else {
                    $empdetails = new EmpAccountDetail();
                    $empdetails->fill($request->all());
                    $empdetails->save();
                }

                // EmpAccountDetail::updateOrCreate(
                //     ['emp_code' => $request->emp_code],
                //     $request->all()
                // );
            }

            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        } catch (Throwable $e) {
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

            $data = $request->all();

            // Store Docrate document.
            if ($request->hasFile('doctorate_doc')) {
                $file = $request->file('doctorate_doc');
                $doctorate_verification_doc = 'doctorate_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/doctorate'), $doctorate_verification_doc);
                $data['doctorate_doc'] = $doctorate_verification_doc;
            }
            // Store Post Graduation document.
            if ($request->hasFile('post_grad_doc')) {
                $file = $request->file('post_grad_doc');
                $post_verification_doc = 'post_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/post_graduation'), $post_verification_doc);
                $data['post_grad_doc'] = $post_verification_doc;
            }
            // Store Graduation document.
            if ($request->hasFile('grad_doc')) {
                $file = $request->file('grad_doc');
                $graduation_verification_doc = 'graduation_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/graduation'), $graduation_verification_doc);
                $data['grad_doc'] = $graduation_verification_doc;
            }

            // Store Diploma document.
            if ($request->hasFile('diploma_doc')) {
                $file = $request->file('diploma_doc');
                $diploma_verification_doc = 'diploma_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/diploma'), $diploma_verification_doc);
                $data['diploma_doc'] = $diploma_verification_doc;
            }
            // Store Twelth document.
            if ($request->hasFile('emp_twelve_doc')) {
                $file = $request->file('emp_twelve_doc');
                $twelth_verification_doc = 'twelth_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/12th'), $twelth_verification_doc);
                $data['emp_twelve_doc'] = $twelth_verification_doc;
            }
            // Store Tenth document.
            if ($request->hasFile('emp_tenth_doc')) {
                $file = $request->file('emp_tenth_doc');
                $tenth_verification_doc = 'tenth_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/10th'), $tenth_verification_doc);
                $data['emp_tenth_doc'] = $tenth_verification_doc;
            }

            // Save Educations details
            if ($request->rec_id) {
                EmpEducationDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id],
                    $data
                );
            } else {
                $empdetails = EmpEducationDetail::where('emp_code', $request->emp_code)->first();
                if ($empdetails) {
                    $oldDetails = $empdetails->getOriginal();
                    $empdetails->fill($data);
                    $empdetails->save();

                    // Get Only changed values.
                    $changed_values = $empdetails->getChanges();

                    // Create Employee update History.
                    if (count($changed_values) > 0) {
                        unset($changed_values['updated_at']);
                        foreach ($changed_values as $key => $value) {
                            EmpUpdateHistory::create([
                                'emp_code' => $empdetails->emp_code,
                                'column_name' => $key,
                                'old_value' => $oldDetails[$key],
                                'new_value' => $value,
                            ]);
                        }
                    }
                } else {
                    $empdetails = new EmpEducationDetail();
                    $empdetails->fill($data);
                    $empdetails->save();
                }
                // EmpEducationDetail::updateOrCreate(
                //     ['emp_code' => $request->emp_code],
                //     $request->all()
                // );
            }
            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        } catch (Throwable $e) {
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
                'permanent_add_doc' => [File::types(['pdf'])->max('1mb')],
                'correspondence_add_doc' => [File::types(['pdf'])->max('1mb')],
                'bank_doc' => [File::types(['pdf'])->max('1mb')],
                'aadhar_card_doc' => [File::types(['pdf'])->max('1mb')],
                'category_doc' => [File::types(['pdf'])->max('1mb')],
            ]);

            // Save Account details
            $data = $request->all();
            $empdetails = new EmpIdProof();
            $empdetails->fill($data);

            // Store Aadhar Card document.
            if ($request->hasFile('aadhar_card_doc')) {
                $file = $request->file('aadhar_card_doc');
                $aadhar_card_doc = 'aadhar_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/aadhar_card'), $aadhar_card_doc);
                $empdetails->aadhar_card_doc = $aadhar_card_doc;
                $data['aadhar_card_doc'] = $aadhar_card_doc;
            }

            // Store Police verification document.
            if ($request->hasFile('police_verification_file')) {
                $file = $request->file('police_verification_file');
                $police_verification_doc = 'police_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/police_verification'), $police_verification_doc);
                $empdetails->police_verification_file = $police_verification_doc;
                $data['police_verification_file'] = $police_verification_doc;
            }

            // Store Passport document.
            if ($request->hasFile('passport_file')) {
                $file = $request->file('passport_file');
                $passport_doc = 'passport_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/category'), $passport_doc);
                $empdetails->passport_file = $passport_doc;
                $data['passport_file'] = $passport_doc;
            }

            // Store correspondence address proof.
            if ($request->hasFile('correspondence_add_doc')) {
                $file = $request->file('correspondence_add_doc');
                $correspondence_add_doc = 'local_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/correspondence_add_proof'), $correspondence_add_doc);
                $empdetails->correspondence_add_doc = $correspondence_add_doc;
                $data['correspondence_add_doc'] = $correspondence_add_doc;
            }

            // Store permanent address proof.
            if ($request->hasFile('permanent_add_doc')) {
                $file = $request->file('permanent_add_doc');
                $permanent_add_doc = 'permanent_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/permanent_address_proof'), $permanent_add_doc);
                $empdetails->permanent_add_doc = $permanent_add_doc;
                $data['permanent_add_doc'] = $permanent_add_doc;
            }

            // Store Bank Document proof.
            if ($request->hasFile('bank_doc')) {
                $file = $request->file('bank_doc');
                $bank_doc = 'bank_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/bank_account'), $bank_doc);
                $empdetails->bank_doc = $bank_doc;
                $data['bank_doc'] = $bank_doc;
            }

            // Store Category Document proof.
            if ($request->hasFile('category_doc')) {
                $file = $request->file('category_doc');
                $category_doc = 'category_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/category'), $category_doc);
                $empdetails->category_doc = $category_doc;
                $data['category_doc'] = $category_doc;
            }

            if ($request->rec_id) {
                EmpIdProof::updateOrCreate(
                    ['rec_id' => $request->rec_id],
                    $data
                );
            } else {

                $empdetails = EmpIdProof::where('emp_code', $request->emp_code)->first();
                if ($empdetails) {
                    $oldDetails = $empdetails->getOriginal();
                    $empdetails->fill($data);
                    $empdetails->save();

                    // Get Only changed values.
                    $changed_values = $empdetails->getChanges();

                    // Create Employee update History.
                    if (count($changed_values) > 0) {
                        unset($changed_values['updated_at']);
                        foreach ($changed_values as $key => $value) {
                            EmpUpdateHistory::create([
                                'emp_code' => $empdetails->emp_code,
                                'column_name' => $key,
                                'old_value' => $oldDetails[$key],
                                'new_value' => $value,
                            ]);
                        }
                    }
                } else {
                    $empdetails = new EmpIdProof();
                    $empdetails->fill($data);
                    $empdetails->save();
                }

                // EmpIdProof::updateOrCreate(
                //     ['emp_code' => $request->emp_code],
                //     $data
                // );
            }
            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        } catch (Throwable $e) {
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

            // $empdetails = new EmpExperienceDetail();
            // $empdetails->fill($data);
            $data['emp_skills'] = $request->emp_skills ? implode(',', $request->emp_skills) : '';

            if ($request->hasFile('resume_file')) {
                $resume = $request->file('resume_file');
                $ext = $resume->getClientOriginalExtension();
                $resume_name = time() . '_' . rand(1000, 9999) . '.' . $ext;
                $resume->move(public_path('recruitment/candidate_documents/employee_resume'), $resume_name);
                $data['resume_file'] = $resume_name;
            }
            if ($request->rec_id) {
                EmpExperienceDetail::updateOrCreate(
                    ['rec_id' => $request->rec_id],
                    $data
                );
            } else {
                $empdetails = EmpExperienceDetail::where('emp_code', $request->emp_code)->first();
                if ($empdetails) {
                    $oldDetails = $empdetails->getOriginal();
                    $empdetails->fill($data);
                    $empdetails->save();

                    // Get Only changed values.
                    $changed_values = $empdetails->getChanges();

                    // Create Employee update History.
                    if (count($changed_values) > 0) {
                        unset($changed_values['updated_at']);
                        foreach ($changed_values as $key => $value) {
                            EmpUpdateHistory::create([
                                'emp_code' => $empdetails->emp_code,
                                'column_name' => $key,
                                'old_value' => $oldDetails[$key],
                                'new_value' => $value,
                            ]);
                        }
                    }
                } else {
                    $empdetails = new EmpExperienceDetail();
                    $empdetails->fill($data);
                    $empdetails->save();
                }

                // EmpExperienceDetail::updateOrCreate(
                //     ['emp_code' => $request->emp_code],
                //     $data
                // );
            }

            return response()->json(['success' => true, 'message' => 'Details saved successfully']);
        } catch (Throwable $e) {
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

        try {
            DB::beginTransaction();

            $file = $request->file('csv');
            $fileContents = file($file->getPathname());
            $header = array_shift($fileContents);

            foreach ($fileContents as $line_number => $content) {

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
                $empdetails->emp_current_working_status = 'active';
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
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('employee.employee-list')->with(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the list of employees.
     */
    public function show_employees(Request $request)
    {
        $employees = EmpDetail::orderByDesc('id');

        $search = '';
        if ($request->search) {
            $search = $request->search;
            $employees = $employees->whereAny([
                'emp_code',
                'emp_name',
                'emp_work_order',
                'emp_designation',
                'emp_phone_first',
                'emp_email_first',
                'emp_place_of_posting',
            ], 'LIKE', '%' . $request->search . '%');
        }

        $employees = $employees->paginate(10)->withQueryString();
        return view("hr.employee.employee-list", compact('employees', 'search'));
    }

    /**
     * Edit employee Page.
     */
    public function edit($id)
    {
        try {
            $reporting_managers = ReportingManager::select('id', 'email', 'name')->get();
            $designations = Designation::select('name')->get();
            $departments = Department::select('department')->get();
            $functional_roles = FunctionalRole::select('role')->get();
            $banks = Bank::select('id', 'name_of_bank')->get();
            $skills = Skill::select('skill')->get();
            $workorders = WorkOrder::select('wo_number')->get();
            $states = State::select('id', 'state')->orderBy('state')->where('country_id', 1)->get();

            $employee_id = '';
            $recruitment_id = '';
            $cities = '';
            $employee_details = EmpDetail::findOrFail($id);
            if (!empty($employee_details->getAddressDetail)) {
                $cities = City::select('id', 'city_name')->where('state_code', $employee_details->getAddressDetail->state)->get();
            }
            return view("hr.employee.edit-employee", compact('banks', 'skills', 'reporting_managers', 'designations', 'departments', 'functional_roles', 'employee_id', 'employee_details', 'recruitment_id', 'workorders', 'id', 'states', 'cities'));
        } catch (Throwable $th) {
            return redirect()->route('employee.employee-list')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Update employee details.
     * Format is static, using db
     */
    public function update_old_emp_details(Request $request)
    {
        $this->validate($request, [
            'emp_work_order' => ['required'],
            'emp_name' => ['required'],
            'reporting_email' => ['required', 'email'],
            'emp_doj' => ['required'],
            'emp_dor' => ['required_if:emp_current_working_status,resign'],
            'emp_designation' => ['required'],
            'department' => ['required'],
            'emp_phone_first' => ['required', 'digits:10'],
            'emp_email_first' => ['required', 'email'],
            'emp_current_working_status' => ['required'],
            'emp_id' => ['required'],
        ], [
            'emp_dor.required_if' => 'Date of resigning field is required when employee current working status is resign'
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['emp_id']);
            $empdetails = EmpDetail::findOrFail($request->emp_id);
            $oldDetails = $empdetails->getOriginal();

            $workorder = WorkOrder::select('id', 'wo_start_date', 'wo_end_date', 'project_id')->where('wo_number', $data['emp_work_order'])->firstOrFail();
            // If work order is changed.
            if ($data['emp_work_order'] != $empdetails->emp_work_order) {
                $extension_format = AppointmentFormat::select('format')->where(['type' => 'extention', 'name' => 'Text'])->firstOrFail();
                $start_date = date("d/M/Y", strtotime($workorder->wo_start_date));
                $end_date = date("d/M/Y", strtotime($workorder->wo_end_date));
                $message  = $extension_format->format;
                $today_date = date("d/M/Y");

                $message_new = str_replace('{{today_date}}', $today_date, $message);
                $message_new = str_replace('{{candidate_name}}', $empdetails->emp_name, $message_new);
                $message_new = str_replace('{{designation}}', $empdetails->designation, $message_new);
                $message_new = str_replace('{{emp_code}}', $empdetails->emp_code, $message_new);
                $message_new = str_replace('{{work_order}}', $data['emp_work_order'], $message_new);
                $message_new = str_replace('{{ctc}}', !empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_salary : '', $message_new);
                $message_new = str_replace('{{start_date}}', $start_date, $message_new);
                $message_new = str_replace('{{end_date}}', $end_date, $message_new);

                $unq_no = date("Ymdhisa");
                $fileName = "extension_" . $unq_no . ".pdf";

                $pdf = App::make('dompdf.wrapper');
                $pdf->loadHTML($message_new);
                $path = public_path('recruitment/candidate_documents/extension_letter');
                $fullPath = $path . '/' . $fileName;
                $pdf->save($fullPath)->stream('invoice.pdf');

                // Save document to send_doc table
                $doc =  EmpSendDoc::create([
                    'emp_code' => $empdetails->emp_code,
                    'doc_type' => 'Extension',
                    'document' => $fileName,
                ]);

                // Save Log of change work order.
                EmpChangeLog::create([
                    'emp_code' => $empdetails->emp_code,
                    'emp_designation' => $request->emp_designation,
                    'emp_salary' => !empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_salary : '',
                    'emp_doc' => $doc->id,
                ]);

                // Update designation in salary table.
                $salary = Salary::where('sl_emp_code', $empdetails->emp_code)->first();
                if ($salary) {
                    $salary->sal_emp_designation = $request->emp_designation;
                    $salary->save();
                }
            }


            // If date of resigning is came
            if ($data['emp_current_working_status'] == 'resign') {
                if ($workorder->project->organizations->name == 'GNGPL (Goa Natural Gas Pvt.Ltd )') {
                    $extension_format = AppointmentFormat::select('format')->where(['type' => 'releiving letter', 'name' => 'GNGPL'])->firstOrFail();
                    $message  = $extension_format->format;
                    $doj = date("d-M-Y", strtotime($empdetails->emp_doj));
                    $dol = date("d-M-Y", strtotime($request->emp_dor));

                    $today_date = date("d-M-Y");
                    if ($empdetails->getPersonalDetail->emp_gender == 'Female') {
                        $gen1 = 'her';
                        $gen2 = 'her';
                    } else {
                        $gen1 = 'him';
                        $gen2 = 'his';
                    }

                    $message_new = str_replace('{{today_date}}', $today_date, $message);
                    $message_new = str_replace('{{candidate_name}}', $empdetails->emp_name, $message_new);
                    $message_new = str_replace('{{designation}}', $empdetails->designation, $message_new);
                    $message_new = str_replace('{{emp_code}}', $empdetails->emp_code, $message_new);
                    $message_new = str_replace('{{gen1}}', $gen1, $message_new);
                    $message_new = str_replace('{{gen2}}', $gen2, $message_new);
                    $message_new = str_replace('{{doj}}', $doj, $message_new);
                    $message_new = str_replace('{{dol}}', $dol, $message_new);
                } else {
                    $extension_format = AppointmentFormat::select('format')->where(['type' => 'releiving letter', 'name' => 'BECIL'])->firstOrFail();
                    $message  = $extension_format->format;
                    $doj = date("d-M-Y", strtotime($empdetails->emp_doj));
                    $dol = date("d-M-Y", strtotime($request->emp_dor));

                    $today_date = date("d-M-Y");
                    if ($empdetails->getPersonalDetail->emp_gender == 'Female') {
                        $gen = 'her';
                    } else {
                        $gen = 'him';
                    }

                    $message_new = str_replace('{{today_date}}', $today_date, $message);
                    $message_new = str_replace('{{candidate_name}}', $empdetails->emp_name, $message_new);
                    $message_new = str_replace('{{designation}}', $empdetails->designation, $message_new);
                    $message_new = str_replace('{{emp_code}}', $empdetails->emp_code, $message_new);
                    $message_new = str_replace('{{gen}}', $gen, $message_new);
                    $message_new = str_replace('{{doj}}', $doj, $message_new);
                    $message_new = str_replace('{{dol}}', $dol, $message_new);
                }

                $unq_no = date("Ymdhisa");
                $fileName = "relieving_" . $unq_no . ".pdf";

                $pdf = App::make('dompdf.wrapper');
                $pdf->loadHTML($message_new);
                $path = public_path('recruitment/candidate_documents/relieving_letter');
                $fullPath = $path . '/' . $fileName;
                $pdf->save($fullPath)->stream('invoice.pdf');

                // Save document to send_doc table
                $doc =  EmpSendDoc::create([
                    'emp_code' => $empdetails->emp_code,
                    'doc_type' => 'Releiving',
                    'document' => $fileName,
                ]);

                // Save Log of change work order.
                EmpChangeLog::create([
                    'emp_code' => $empdetails->emp_code,
                    'emp_designation' => $request->emp_designation,
                    'emp_salary' => !empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_salary : '',
                    'emp_doc' => $doc->id,
                ]);

                // Send Mail.
                $user = auth()->user();
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
                $mail_html = "<h4>Greetings from Prakhar Software Solutions Ltd.!!</h4></br>
               
                <h4>Please find the attached Releiving Letter</h4></br>
                 
                <h4>Kindly Acknowledge the receipt of this mail </h4></br> 
                 
                <h4>Best of luck.
                </h4></br>
                </br></br>
                <h4 style='text-align: left;
                margin-left: 30px;'>Regards,</h4></br>
                <h4 style='text-align: left;
                margin-left: 30px;'>HR Team</h4></br>
                <h4 style='text-align: left;
                margin-left: 30px;'>Email:- hr@prakharsoftwares.com</h4></br>
                <h4>Note: If you have any query just reply to this email. </h4>";

                $maildata = new stdClass();
                $maildata->subject = "Relieving Letter";
                $maildata->name = $empdetails->emp_name;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $mail_html;
                $maildata->url = url('/');
                $maildata->file = $fullPath;

                Mail::to($empdetails->emp_email_first)->send(new ShortlistMail($maildata));
            }
            $empdetails->fill($data);
            $empdetails->emp_functional_role = $request->emp_functional_role ? implode(',', $request->emp_functional_role) : '';
            $empdetails->save();

            // Get Only changed values.
            $changed_values = $empdetails->getChanges();

            if (count($changed_values) > 0) {
                unset($changed_values['updated_at']);
                foreach ($changed_values as $key => $value) {
                    EmpUpdateHistory::create([
                        'emp_code' => $empdetails->emp_code,
                        'column_name' => $key,
                        'old_value' => $oldDetails[$key],
                        'new_value' => $value,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Details Updated successfully']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    
    /**
     * Update employee details.
     * Format is dynamic, using blade
     */
    public function update_emp_details(Request $request)
    {
        $this->validate($request, [
            'emp_work_order' => ['required'],
            'emp_name' => ['required'],
            'reporting_email' => ['required', 'email'],
            'emp_doj' => ['required'],
            'emp_dor' => ['required_if:emp_current_working_status,resign'],
            'emp_designation' => ['required'],
            'department' => ['required'],
            'emp_phone_first' => ['required', 'digits:10'],
            'emp_email_first' => ['required', 'email'],
            'emp_current_working_status' => ['required'],
            'emp_id' => ['required'],
        ], [
            'emp_dor.required_if' => 'Date of resigning field is required when employee current working status is resign'
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['emp_id']);
            $empdetails = EmpDetail::findOrFail($request->emp_id);
            $oldDetails = $empdetails->getOriginal();

            $workorder = WorkOrder::select('id', 'wo_start_date', 'wo_end_date', 'project_id')->where('wo_number', $data['emp_work_order'])->firstOrFail();
            // If work order is changed.
            if ($data['emp_work_order'] != $empdetails->emp_work_order) {
                // $extension_format = AppointmentFormat::select('format')->where(['type' => 'extention', 'name' => 'Text'])->firstOrFail();
                $blade = 'hr.templates.extension-letter.internal';
                $start_date = date("d/M/Y", strtotime($workorder->wo_start_date));
                $end_date = date("d/M/Y", strtotime($workorder->wo_end_date));
                // $message  = $extension_format->format;
                $today_date = date("d/M/Y");

                $extension_obj = new stdClass();
                $extension_obj->today_date = $today_date;
                $extension_obj->candidate_name = $empdetails->emp_name;
                $extension_obj->designation = $empdetails->designation;
                $extension_obj->emp_code = $empdetails->emp_code;
                $extension_obj->work_order = $data['emp_work_order'];
                $extension_obj->ctc = !empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_salary : '';
                $extension_obj->start_date = $start_date;
                $extension_obj->end_date = $end_date;

                $unq_no = date("Ymdhisa");
                $fileName = "extension_" . $unq_no . ".pdf";

                // Store extension letter.
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadView($blade, ['empdetails' => $extension_obj]);
                $path = public_path('recruitment/candidate_documents/extension_letter');
                $fullPath = $path . '/' . $fileName;
                file_put_contents($fullPath, $pdf->output());

                // Save document to send_doc table
                $doc =  EmpSendDoc::create([
                    'emp_code' => $empdetails->emp_code,
                    'doc_type' => 'Extension',
                    'document' => $fileName,
                ]);

                // Save Log of change work order.
                EmpChangeLog::create([
                    'emp_code' => $empdetails->emp_code,
                    'emp_designation' => $request->emp_designation,
                    'emp_salary' => !empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_salary : '',
                    'emp_doc' => $doc->id,
                ]);

                // Update designation in salary table.
                $salary = Salary::where('sl_emp_code', $empdetails->emp_code)->first();
                if ($salary) {
                    $salary->sal_emp_designation = $request->emp_designation;
                    $salary->save();
                }
            }


            // If date of resigning is came
            if ($data['emp_current_working_status'] == 'resign') {
                $obj = new stdClass();
                if ($workorder->project->organizations->name == 'GNGPL (Goa Natural Gas Pvt.Ltd )') {
                    $blade = 'hr.templates.relieving-letter.gng';
                    $doj = date("d-M-Y", strtotime($empdetails->emp_doj));
                    $dol = date("d-M-Y", strtotime($request->emp_dor));

                    $today_date = date("d-M-Y");
                    if ($empdetails->getPersonalDetail->emp_gender == 'Female') {
                        $gen1 = 'her';
                        $gen2 = 'her';
                    } else {
                        $gen1 = 'him';
                        $gen2 = 'his';
                    }

                    $obj->today_date = $today_date;
                    $obj->candidate_name = $empdetails->emp_name;
                    $obj->designation = $empdetails->designation;
                    $obj->emp_code = $empdetails->emp_code;
                    $obj->gen1 = $gen1;
                    $obj->gen2 = $gen2;
                    $obj->doj = $doj;
                    $obj->dol = $dol;
                } else {
                    $blade = 'hr.templates.relieving-letter.becil';
                    $doj = date("d-M-Y", strtotime($empdetails->emp_doj));
                    $dol = date("d-M-Y", strtotime($request->emp_dor));

                    $today_date = date("d-M-Y");
                    if ($empdetails->getPersonalDetail->emp_gender == 'Female') {
                        $gen = 'her';
                    } else {
                        $gen = 'him';
                    }
                    $obj->today_date = $today_date;
                    $obj->candidate_name = $empdetails->emp_name;
                    $obj->designation = $empdetails->designation;
                    $obj->emp_code = $empdetails->emp_code;
                    $obj->gen = $gen;
                    $obj->doj = $doj;
                    $obj->dol = $dol;
                }

                $unq_no = date("Ymdhisa");
                $fileName = "relieving_" . $unq_no . ".pdf";

                // Store releiving letter.
                $pdf = App::make('dompdf.wrapper');
                $pdf->loadView($blade, ['empdetails' => $obj]);
                $path = public_path('recruitment/candidate_documents/relieving_letter');
                $fullPath = $path . '/' . $fileName;
                file_put_contents($fullPath, $pdf->output());

                // Save document to send_doc table
                $doc =  EmpSendDoc::create([
                    'emp_code' => $empdetails->emp_code,
                    'doc_type' => 'Releiving',
                    'document' => $fileName,
                ]);

                // Save Log of change work order.
                EmpChangeLog::create([
                    'emp_code' => $empdetails->emp_code,
                    'emp_designation' => $request->emp_designation,
                    'emp_salary' => !empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_salary : '',
                    'emp_doc' => $doc->id,
                ]);

                // Send Mail.
                $user = auth()->user();
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
                $mail_html = "<h4>Greetings from Prakhar Software Solutions Ltd.!!</h4></br>
               
                <h4>Please find the attached Releiving Letter</h4></br>
                 
                <h4>Kindly Acknowledge the receipt of this mail </h4></br> 
                 
                <h4>Best of luck.
                </h4></br>
                </br></br>
                <h4 style='text-align: left;
                margin-left: 30px;'>Regards,</h4></br>
                <h4 style='text-align: left;
                margin-left: 30px;'>HR Team</h4></br>
                <h4 style='text-align: left;
                margin-left: 30px;'>Email:- hr@prakharsoftwares.com</h4></br>
                <h4>Note: If you have any query just reply to this email. </h4>";

                $maildata = new stdClass();
                $maildata->subject = "Relieving Letter";
                $maildata->name = $empdetails->emp_name;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $mail_html;
                $maildata->url = url('/');
                $maildata->file = $fullPath;

                Mail::to($empdetails->emp_email_first)->send(new ShortlistMail($maildata));
            }
            $empdetails->fill($data);
            $empdetails->emp_functional_role = $request->emp_functional_role ? implode(',', $request->emp_functional_role) : '';
            $empdetails->save();

            // Get Only changed values.
            $changed_values = $empdetails->getChanges();

            if (count($changed_values) > 0) {
                unset($changed_values['updated_at']);
                foreach ($changed_values as $key => $value) {
                    EmpUpdateHistory::create([
                        'emp_code' => $empdetails->emp_code,
                        'column_name' => $key,
                        'old_value' => $oldDetails[$key],
                        'new_value' => $value,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Details Updated successfully']);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Send Letter form.
     */
    public function send_letter($id)
    {
        try {
            $empdetails = EmpDetail::select('emp_name', 'emp_code', 'emp_designation')->findOrFail($id);
            $designations = Designation::select('name')->get();
            return view("hr.employee.send-letter", compact('empdetails', 'designations'));
        } catch (Throwable $th) {
            return redirect()->route('employee.employee-list')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * View all letters sent to employee.
     */
    public function view_letter(Request $request, $id)
    {
        try {
            $documents = EmpSendDoc::join('emp_details', 'emp_send_doc.emp_code', '=', 'emp_details.emp_code')->where('emp_details.id', $id)->select('emp_send_doc.doc_type', 'emp_send_doc.document', 'emp_details.emp_code', 'emp_details.emp_designation', 'emp_details.emp_name', 'emp_send_doc.created_at');

            $search = '';
            if ($request->search) {
                $search = $request->search;
                $documents = $documents->whereAny([
                    'emp_send_doc.doc_type',
                    'emp_send_doc.document',
                    'emp_send_doc.created_at',
                    'emp_details.emp_name',
                    'emp_details.emp_designation',
                ], 'LIKE', '%' . $request->search . '%');
            }

            $documents = $documents->orderByDesc('emp_send_doc.id')->paginate(10)->withQueryString();
            return view("hr.employee.view-letter", compact('documents', 'id', 'search'));
        } catch (Throwable $th) {
            return redirect()->route('employee.employee-list')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Send credentials to employee.
     */
    public function send_credentials(Request $request)
    {
        try {
            DB::beginTransaction();
            $employees = $request->employees;
            for ($i = 0; $i < count($employees); $i++) {
                $employee = EmpDetail::where('id', $employees[$i])->first();
                if ($employee) {
                    $emp_password = substr(str_shuffle("01234567891234567890"), 0, 6);
                    $emp_password_hash = md5($emp_password);
                    $employee->emp_password = $emp_password_hash;
                    $employee->save();   // Update password.

                    // Save Log of change work order.
                    EmpCredentialLog::create([
                        'emp_code' => $employee->emp_code,
                        'emp_name' => $employee->emp_name,
                        'emp_work_order' => $employee->emp_work_order,
                        'emp_email' => $employee->emp_email_first,
                        'emp_password' => $emp_password_hash
                    ]);

                    // Send Mail.
                    $user = auth()->user();
                    $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
                    $helpurl = asset('sample/hrms_emp_intro.mp4');
                    $url = route('login');
                    $mail_html = "<h4>Your Password Changed Successfully.</h4></br>
                      <h4>Use below credential to login your account.</h4></br>
                      <h4>Employee code: &nbsp;" . $employee->emp_code . "</h4></br>
                      <h4>Password: &nbsp;" . $emp_password . "</h4></br>
                      <h4>Click Here to Login: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='$url'>Login</a></h4>
                       <a href='$helpurl'>Click here for help</a>
                      <h5 style='color:red'>Note: Please use employee tab for login with your given employee code & password.</h5>";

                    $maildata = new stdClass();
                    $maildata->subject = "Password Change";
                    $maildata->name = $employee->emp_name;
                    $maildata->comp_email = $company->email;
                    $maildata->comp_phone = $company->mobile;
                    $maildata->comp_website = $company->website;
                    $maildata->comp_address = $company->address;
                    $maildata->content = $mail_html;
                    $maildata->url = url('/');
                    Mail::to($employee->emp_email_first)->send(new ShortlistMail($maildata));
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Credentials sent successfully']);
        } catch (Throwable $e) {
            DB::rollback();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Send Appointment Letter using db.
     */
    public function send_old_appointment_letter(Request $request)
    {
        try {
            DB::beginTransaction();
            $empdetails = EmpDetail::select('emp_code', 'emp_name', 'emp_designation', 'emp_place_of_posting', 'emp_email_first', 'emp_work_order')->findOrFail($request->employee_id);
            $salary = Salary::where('sl_emp_code', $empdetails->emp_code)->firstOrFail();
            $workorders = WorkOrder::select('id', 'project_id', 'wo_end_date')->where('wo_number', $empdetails->emp_work_order)->firstOrFail();
            $organisation = $workorders->project->organizations->name;
            $today_date = date("d/M/Y");
            $ctc_pa =  (int) $salary->sal_ctc * 12;
            $doe = $workorders->wo_end_date;
            $wo_valid_upto = date("d/m/Y", strtotime($workorders->wo_end_date));
            $data = new stdClass();

            if ($empdetails->emp_work_order == 'PSSPL Internal Employees') {
                $template = AppointmentFormat::select('format', 'format_2')->where(['type' => 'appointment', 'name' => 'internal'])->firstOrFail();
                $message = $template->format;
                $message_2 = $template->format_2;

                $message_new = str_replace('{{today_date}}', $today_date, $message);
                $message_new = str_replace('{{candidate_name}}', $empdetails->emp_name, $message_new);
                $message_new = str_replace('{{designation}}', $salary->sal_emp_designation, $message_new);
                $message_new = str_replace('{{emp_code}}', $empdetails->emp_code, $message_new);
                $message_new = str_replace('{{sal_ctc}}', $salary->sal_ctc, $message_new);
                $message_new = str_replace('{{ctc_pa}}', $ctc_pa, $message_new);
                $message_new = str_replace('{{basic}}', $salary->sal_basic, $message_new);
                $message_new = str_replace('{{hra}}', $salary->sal_hra, $message_new);
                $message_new = str_replace('{{conveyance}}', $salary->sal_conveyance, $message_new);
                $message_new = str_replace('{{sal_telephone}}', $salary->sal_telephone, $message_new);
                $message_new = str_replace('{{sal_pa}}', $salary->medical_allowance, $message_new);
                $message_new = str_replace('{{sal_special_allowance}}', $salary->sal_special_allowance, $message_new);
                $message_new = str_replace('{{sal_gross}}', $salary->sal_gross, $message_new);
                $message_new = str_replace('{{sal_net}}', $salary->sal_net, $message_new);
                $message_new = str_replace('{{sal_pf_emmployee}}', $salary->sal_pf_employee, $message_new);
                $message_new = str_replace('{{sal_esi_employee}}', $salary->sal_esi_employee, $message_new);
                $message_new = str_replace('{{sal_pf_employer}}', $salary->sal_pf_employer, $message_new);
                $message_new = str_replace('{{sal_esi_employer}}', $salary->sal_esi_employer, $message_new);
                $message_new = str_replace('{{sal_medical_ins}}', $salary->medical_insurance, $message_new);
                $message_new = str_replace('{{deduction}}', ($salary->sal_pf_employee + $salary->sal_esi_employee + $salary->medical_insurance), $message_new);
                $message_new = str_replace('{{word}}', Number::spell($salary->sal_net), $message_new);
                $message_new = str_replace('{{doj}}', date('jS F, Y', strtotime($salary->sa_emp_doj)), $message_new);
                $message_new = str_replace('{{place_of_posting}}', $empdetails->emp_place_of_posting, $message_new);
                $message_new .= $message_2;
            } elseif ($organisation == 'GNGPL (Goa Natural Gas Pvt.Ltd )') {
                $template = AppointmentFormat::select('format', 'format_2')->where(['type' => 'appointment', 'name' => 'GNGPL'])->firstOrFail();
                $message = $template->format;
                $message_2 = $template->format_2;

                $bonus = round((8.33 / 100) * $salary->sal_basic);
                $ctc = $salary->sal_gross + $salary->sal_pf_employer + $salary->sal_esi_employer + $bonus;

                $message_new = str_replace('{{today_date}}', $today_date, $message);
                $message_new = str_replace('{{candidate_name}}', $empdetails->emp_name, $message_new);
                $message_new = str_replace('{{designation}}', $salary->sal_emp_designation, $message_new);
                $message_new = str_replace('{{emp_code}}', $empdetails->emp_code, $message_new);
                $message_new = str_replace('{{sal_ctc}}', $ctc, $message_new);
                $message_new = str_replace('{{ctc_pa}}', $ctc_pa, $message_new);
                $message_new = str_replace('{{basic}}', $salary->sal_basic, $message_new);
                $message_new = str_replace('{{hra}}', $salary->sal_hra, $message_new);
                $message_new = str_replace('{{conveyance}}', $salary->sal_conveyance, $message_new);
                $message_new = str_replace('{{sal_telephone}}', $salary->sal_telephone, $message_new);
                $message_new = str_replace('{{sal_pa}}', $salary->medical_allowance, $message_new);
                $message_new = str_replace('{{sal_special_allowance}}', $salary->sal_special_allowance, $message_new);
                $message_new = str_replace('{{sal_gross}}', $salary->sal_gross, $message_new);
                $message_new = str_replace('{{sal_net}}', $salary->sal_net, $message_new);
                $message_new = str_replace('{{sal_pf_emmployee}}', $salary->sal_pf_employee, $message_new);
                $message_new = str_replace('{{sal_esi_employee}}', $salary->sal_esi_employee, $message_new);
                $message_new = str_replace('{{sal_pf_employer}}', $salary->sal_pf_employer, $message_new);
                $message_new = str_replace('{{sal_esi_employer}}', $salary->sal_esi_employer, $message_new);
                $message_new = str_replace('{{bonus}}', $bonus, $message_new);
                $message_new = str_replace('{{sal_medical_ins}}', $salary->medical_insurance, $message_new);
                $message_new = str_replace('{{deduction}}', ($salary->sal_pf_employee + $salary->sal_esi_employee + $salary->medical_insurance), $message_new);
                $message_new = str_replace('{{word}}', Number::spell($salary->sal_net), $message_new);
                $message_new = str_replace('{{doj}}', date('jS F, Y', strtotime($salary->sa_emp_doj)), $message_new);
                $message_new = str_replace('{{doe}}', date("d/m/Y", strtotime($doe)), $message_new);
                $message_new = str_replace('{{wo_valid}}', $wo_valid_upto, $message_new);

                $message_new .= $message_2;
            } else {
                $template = AppointmentFormat::select('format', 'format_2')->where(['type' => 'appointment', 'name' => 'BECIL'])->firstOrFail();
                $message = $template->format;
                $message_2 = $template->format_2;

                $message_new = str_replace('{{today_date}}', $today_date, $message);
                $message_new = str_replace('{{candidate_name}}', $empdetails->emp_name, $message_new);
                $message_new = str_replace('{{designation}}', $salary->sal_emp_designation, $message_new);
                $message_new = str_replace('{{emp_code}}', $empdetails->emp_code, $message_new);
                $message_new = str_replace('{{sal_ctc}}', $salary->sal_ctc, $message_new);
                $message_new = str_replace('{{ctc_pa}}', $ctc_pa, $message_new);
                $message_new = str_replace('{{basic}}', $salary->sal_basic, $message_new);
                $message_new = str_replace('{{hra}}', $salary->sal_hra, $message_new);
                $message_new = str_replace('{{conveyance}}', $salary->sal_conveyance, $message_new);
                $message_new = str_replace('{{sal_telephone}}', $salary->sal_telephone, $message_new);
                $message_new = str_replace('{{sal_pa}}', $salary->medical_allowance, $message_new);
                $message_new = str_replace('{{sal_special_allowance}}', $salary->sal_special_allowance, $message_new);
                $message_new = str_replace('{{sal_gross}}', $salary->sal_gross, $message_new);
                $message_new = str_replace('{{sal_net}}', $salary->sal_net, $message_new);
                $message_new = str_replace('{{sal_pf_emmployee}}', $salary->sal_pf_employee, $message_new);
                $message_new = str_replace('{{sal_esi_employee}}', $salary->sal_esi_employee, $message_new);
                $message_new = str_replace('{{sal_pf_employer}}', $salary->sal_pf_employer, $message_new);
                $message_new = str_replace('{{sal_esi_employer}}', $salary->sal_esi_employer, $message_new);
                $message_new = str_replace('{{sal_medical_ins}}', $salary->medical_insurance, $message_new);
                $message_new = str_replace('{{deduction}}', ($salary->sal_pf_employee + $salary->sal_esi_employee + $salary->medical_insurance), $message_new);
                $message_new = str_replace('{{word}}', Number::spell($salary->sal_net), $message_new);
                $message_new = str_replace('{{doj}}', date('jS F, Y', strtotime($salary->sa_emp_doj)), $message_new);
                $message_new = str_replace('{{doe}}', date("d/m/Y", strtotime($doe)), $message_new);
                $message_new = str_replace('{{wo_valid}}', $wo_valid_upto, $message_new);
                $message_new .= $message_2;
            }

            $unq_no = date("Ymdhisa");
            $fileName = "appointment_" . $unq_no . ".pdf";
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($message_new);
            // $pdf->setDefaultFont('arial');
            $path = public_path('recruitment/candidate_documents/appointment_letter');
            $fullPath = $path . '/' . $fileName;
            $pdf->save($fullPath)->stream('invoice.pdf');

            // Save document to send_doc table
            $doc =  EmpSendDoc::create([
                'emp_code' => $empdetails->emp_code,
                'doc_type' => 'Appointment',
                'document' => $fileName,
            ]);

            // Save Log of change work order.
            EmpChangeLog::create([
                'emp_code' => $empdetails->emp_code,
                'emp_designation' => $salary->sal_emp_designation,
                'emp_salary' => !empty($salary->sal_ctc) ? $salary->sal_ctc : '',
                'emp_doc' => $doc->id,
                'start_date' => date('Y-m-d')
            ]);

            // Send Mail.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $mail_html = "<h4>Greetings from Prakhar Software Solutions Ltd.!!</h4></br>
           
            <h4>Please find the attached Appointment Letter</h4></br>
             
            <h4>Kindly Acknowledge the receipt of this mail </h4></br> 
             
            <h4>Best of luck.
            </h4></br>
            </br></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>Regards,</h4></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>HR Team</h4></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>Email:- hr@prakharsoftwares.com</h4></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>Mobile:- 7983363526</h4></br>
            <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";

            $maildata = new stdClass();
            $maildata->subject = "Appointment Letter";
            $maildata->name = $empdetails->emp_name;
            $maildata->comp_email = $company->email;
            $maildata->comp_phone = $company->mobile;
            $maildata->comp_website = $company->website;
            $maildata->comp_address = $company->address;
            $maildata->content = $mail_html;
            $maildata->url = url('/');
            $maildata->file = $fullPath;
            Mail::to($empdetails->emp_email_first)->send(new ShortlistMail($maildata));

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Appointment Letter Sent Successfully.']);
        } catch (Throwable $th) {
            DB::rollback();
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

      /**
     * Send Appointment Letter using blade.
     */
    public function send_appointment_letter(Request $request)
    {
        try {
            DB::beginTransaction();
            $empdetails = EmpDetail::select('emp_code', 'emp_name', 'emp_designation', 'emp_place_of_posting', 'emp_email_first', 'emp_work_order')->findOrFail($request->employee_id);
            $salary = Salary::where('sl_emp_code', $empdetails->emp_code)->firstOrFail();
            $workorders = WorkOrder::select('id', 'project_id', 'wo_end_date')->where('wo_number', $empdetails->emp_work_order)->firstOrFail();
            $organisation = $workorders->project->organizations->name;
            $today_date = date("d/M/Y");
            $ctc_pa =  (int) $salary->sal_ctc * 12;
            $doe = $workorders->wo_end_date;
            $wo_valid_upto = date("d/m/Y", strtotime($workorders->wo_end_date));
            $data = new stdClass();
            if ($empdetails->emp_work_order == 'PSSPL Internal Employees') {             
                $blade = 'hr.templates.appointment-letter.internal';
                $data->today_date =  $today_date;
                $data->candidate_name =  $empdetails->emp_name;
                $data->designation =  $salary->sal_emp_designation;
                $data->emp_code =  $empdetails->emp_code;
                $data->sal_ctc =  $salary->sal_ctc;
                $data->ctc_pa =  $ctc_pa;
                $data->basic =  $salary->sal_basic;
                $data->hra =  $salary->sal_hra;
                $data->conveyance =  $salary->sal_conveyance;
                $data->sal_telephone =  $salary->sal_telephone;
                $data->sal_pa =  $salary->medical_allowance;
                $data->sal_special_allowance =  $salary->sal_special_allowance;
                $data->sal_gross =  $salary->sal_gross;
                $data->sal_net =  $salary->sal_net;
                $data->sal_pf_emmployee =  $salary->sal_pf_employee;
                $data->sal_esi_employee =  $salary->sal_esi_employee;
                $data->sal_pf_employer =  $salary->sal_pf_employer;
                $data->sal_esi_employer =  $salary->sal_esi_employer;
                $data->sal_medical_ins =  $salary->medical_insurance;
                $data->deduction =  $salary->sal_pf_employee + $salary->sal_esi_employee + $salary->medical_insurance;
                $data->word =  Number::spell($salary->sal_net);
                $data->doj =  date('jS F, Y', strtotime($salary->sa_emp_doj));
                $data->place_of_posting =  $empdetails->emp_place_of_posting;


            } elseif ($organisation == 'GNGPL (Goa Natural Gas Pvt.Ltd)') {
                $blade = 'hr.templates.appointment-letter.gngpl';

                $bonus = round((8.33 / 100) * $salary->sal_basic);
                $ctc = $salary->sal_gross + $salary->sal_pf_employer + $salary->sal_esi_employer + $bonus;

                $data->today_date =  $today_date;
                $data->candidate_name =  $empdetails->emp_name;
                $data->designation =  $salary->sal_emp_designation;
                $data->emp_code =  $empdetails->emp_code;
                $data->sal_ctc =  $ctc;
                $data->ctc_pa =  $ctc_pa;
                $data->basic =  $salary->sal_basic;
                $data->hra =  $salary->sal_hra;
                $data->conveyance =  $salary->sal_conveyance;
                $data->sal_telephone =  $salary->sal_telephone;
                $data->sal_pa =  $salary->medical_allowance;
                $data->sal_special_allowance =  $salary->sal_special_allowance;
                $data->sal_gross =  $salary->sal_gross;
                $data->sal_net =  $salary->sal_net;
                $data->sal_pf_emmployee =  $salary->sal_pf_employee;
                $data->sal_esi_employee =  $salary->sal_esi_employee;
                $data->sal_pf_employer =  $salary->sal_pf_employer;
                $data->sal_esi_employer =  $salary->sal_esi_employer;
                $data->bonus =  $bonus;
                $data->sal_medical_ins =  $salary->medical_insurance;
                $data->deduction =  ($salary->sal_pf_employee + $salary->sal_esi_employee + $salary->medical_insurance);
                $data->word =  Number::spell($salary->sal_net);
                $data->doj =  date('jS F, Y', strtotime($salary->sa_emp_doj));
                $data->doe =  date("d/m/Y", strtotime($doe));
                $data->wo_valid =  $wo_valid_upto;

            } else {
                $blade = 'hr.templates.appointment-letter.becil';

                $data->today_date =  $today_date;
                $data->candidate_name =  $empdetails->emp_name;
                $data->designation =  $salary->sal_emp_designation;
                $data->emp_code =  $empdetails->emp_code;
                $data->sal_ctc =  $salary->sal_ctc;
                $data->ctc_pa =  $ctc_pa;
                $data->basic =  $salary->sal_basic;
                $data->hra =  $salary->sal_hra;
                $data->conveyance =  $salary->sal_conveyance;
                $data->sal_telephone =  $salary->sal_telephone;
                $data->sal_pa =  $salary->medical_allowance;
                $data->sal_special_allowance =  $salary->sal_special_allowance;
                $data->sal_gross =  $salary->sal_gross;
                $data->sal_net =  $salary->sal_net;
                $data->sal_pf_emmployee =  $salary->sal_pf_employee;
                $data->sal_esi_employee =  $salary->sal_esi_employee;
                $data->sal_pf_employer =  $salary->sal_pf_employer;
                $data->sal_esi_employer =  $salary->sal_esi_employer;
                $data->sal_medical_ins =  $salary->medical_insurance;
                $data->deduction =  ($salary->sal_pf_employee + $salary->sal_esi_employee + $salary->medical_insurance);
                $data->word =  Number::spell($salary->sal_net);
                $data->doj =  date('jS F, Y', strtotime($salary->sa_emp_doj));
                $data->doe =  date("d/m/Y", strtotime($doe));
                $data->wo_valid =  $wo_valid_upto;
            }

            $unq_no = date("Ymdhisa");
            $fileName = "appointment_" . $unq_no . ".pdf";
            $pdf = App::make('dompdf.wrapper');
            $path = public_path('recruitment/candidate_documents/appointment_letter');
            $fullPath = $path . '/' . $fileName;
            $pdf->loadView($blade, ['empdetails' => $data]);
            file_put_contents($fullPath, $pdf->output());

            // Save document to send_doc table
            $doc =  EmpSendDoc::create([
                'emp_code' => $empdetails->emp_code,
                'doc_type' => 'Appointment',
                'document' => $fileName,
            ]);

            // Save Log of change work order.
            EmpChangeLog::create([
                'emp_code' => $empdetails->emp_code,
                'emp_designation' => $salary->sal_emp_designation,
                'emp_salary' => !empty($salary->sal_ctc) ? $salary->sal_ctc : '',
                'emp_doc' => $doc->id,
                'start_date' => date('Y-m-d')
            ]);

            // Send Mail.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
            $mail_html = "<h4>Greetings from Prakhar Software Solutions Ltd.!!</h4></br>
           
            <h4>Please find the attached Appointment Letter</h4></br>
             
            <h4>Kindly Acknowledge the receipt of this mail </h4></br> 
             
            <h4>Best of luck.
            </h4></br>
            </br></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>Regards,</h4></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>HR Team</h4></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>Email:- hr@prakharsoftwares.com</h4></br>
            <h4 style='text-align: left;
            margin-left: 30px;'>Mobile:- 7983363526</h4></br>
            <h4>Note: If you have any query just reply to this email or contact no. which is listed above. </h4>";

            $maildata = new stdClass();
            $maildata->subject = "Appointment Letter";
            $maildata->name = $empdetails->emp_name;
            $maildata->comp_email = $company->email;
            $maildata->comp_phone = $company->mobile;
            $maildata->comp_website = $company->website;
            $maildata->comp_address = $company->address;
            $maildata->content = $mail_html;
            $maildata->url = url('/');
            $maildata->file = $fullPath;
            Mail::to($empdetails->emp_email_first)->send(new ShortlistMail($maildata));

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Appointment Letter Sent Successfully.']);
        } catch (Throwable $th) {
            DB::rollback();
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Export employee data.
     */
    public function export_employees(Request $request)
    {
        $filename = 'employees.csv';
        $employees_detail = EmpDetail::select('emp_code', 'emp_name', 'emp_work_order', 'emp_designation', 'emp_phone_first', 'emp_email_first', 'emp_place_of_posting', 'emp_current_working_status', 'emp_doj')->where('emp_current_working_status', 'active');

        $search = '';
        if ($request->search) {
            $employees_detail = $employees_detail->whereAny([
                'emp_code',
                'emp_name',
                'emp_work_order',
                'emp_designation',
                'emp_phone_first',
                'emp_email_first',
                'emp_place_of_posting',
            ], 'LIKE', '%' . $request->search . '%');
        }

        $employees_detail = $employees_detail->orderByDesc('id');
        // Begin process for export.
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];


        return response()->stream(function () use ($employees_detail) {
            $handle = fopen('php://output', 'w');

            // Add CSV headers
            fputcsv($handle, [
                'Employee Id',
                'Employee Name',
                'Email',
                'Work Order Number',
                'Designation',
                'Contact',
                'Date Of Joining',
                'Job Place',
                'Status'
            ]);

            // Fetch and process data in chunks
            $employees_detail->chunk(25, function ($employees) use ($handle) {
                foreach ($employees as $employee) {
                    // Extract data from each employee.
                    $data = [
                        isset($employee->emp_code) ? $employee->emp_code : '',
                        isset($employee->emp_name) ? $employee->emp_name : '',
                        isset($employee->emp_email_first) ? $employee->emp_email_first : '',
                        isset($employee->emp_work_order) ? $employee->emp_work_order : '',
                        isset($employee->emp_designation) ? $employee->emp_designation : '',
                        isset($employee->emp_phone_first) ? $employee->emp_phone_first : '',
                        isset($employee->emp_doj) ? date('jS F,Y', strtotime($employee->emp_doj)) : '',
                        isset($employee->emp_place_of_posting) ? $employee->emp_place_of_posting : '',
                        isset($employee->emp_current_working_status) ? $employee->emp_current_working_status : '',
                    ];

                    // Write data to a CSV file.
                    fputcsv($handle, $data);
                }
            });

            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }

    /**
     * Sent Credentials Logs
     */
    public function sent_credential_logs(Request $request)
    {
        $logs = EmpCredentialLog::select('emp_code', 'emp_name', 'emp_work_order', 'emp_email', 'created_at');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $logs = $logs->whereAny([
                'emp_code',
                'emp_name',
                'emp_work_order',
                'emp_email'
            ], 'LIKE', '%' . $request->search . '%');
        }

        $logs = $logs->orderByDesc('id')->paginate(10);
        return view('hr.employee.credential_log_list', compact('logs', 'search'));
    }

    /**
     * Get Reporting Managers
     */
    public function get_reporting_managers(Request $request)
    {
        try {
            $department = Department::where('department', $request->department)->firstOrFail();
            $reporting_manager = $department->get_reporting_manager->email;
            return response()->json(['success' => true, 'reporting_manager' => $reporting_manager]);
        } catch (Throwable $th) {
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Send data for preview.
     * @param file $csv file
     */
    public function preview_csv(Request $request)
    {
        try {
            $this->validate($request, [
                'csv' => ['required', File::types(['csv', 'txt'])->max('1mb')]
            ], [
                'csv.required' => 'The CSV file is required.',
                'csv.file' => 'The selected file is not a valid CSV.',
                'csv.max' => 'The CSV file size may not be greater than 1MB.'
            ]);
            $file = $request->file('csv');
            $fileContents = file($file->getPathname());
            $header = array_shift($fileContents);

            $required_data = [];
            $storecode = [];
            $storeemail = [];
            foreach ($fileContents as $line_number => $content) {

                $line = str_getcsv($content);
                $required_data[$line_number]['color'] = '';
                $required_data[$line_number]['status_color'] = '';
                $required_data[$line_number]['status'] = '';

                if ($line[1] && $line[0] && $line[2] && $line[3] && $line[4] && $line[5] && $line[10] && $line[21] && $line[23] && $line[52]) {
                    //    Validate Employee Code
                    if (in_array($line[1], $storecode) || EmpDetail::where('emp_code', $line[1])->exists()) {
                        $required_data[$line_number]['color'] = 'red';
                        $required_data[$line_number]['status_color'] = 'danger';
                        $required_data[$line_number]['status'] = 'Duplicate Employee Code';
                    }

                    //    Validate Email Id.
                    if (!filter_var($line[23], FILTER_VALIDATE_EMAIL) || in_array($line[23], $storeemail) || EmpDetail::where('emp_email_first', $line[23])->exists()) {
                        $required_data[$line_number]['color'] = 'red';
                        $required_data[$line_number]['status_color'] = 'danger';
                        $required_data[$line_number]['status'] = 'Invalid or Duplicate Email';
                    }
                } else {
                    $required_data[$line_number]['color'] = 'red';
                    $required_data[$line_number]['status_color'] = 'danger';
                    $required_data[$line_number]['status'] = 'Please fill out the required fields';
                }


                $storecode[] = $line[1];
                $required_data[$line_number]['emp_work_order'] = $line[0];
                $required_data[$line_number]['emp_code'] = $line[1];
                $required_data[$line_number]['emp_name'] = $line[2];
                $required_data[$line_number]['emp_doj'] = date('Y-m-d', strtotime($line[10]));
                $required_data[$line_number]['emp_phone_first'] = $line[21];
                $required_data[$line_number]['emp_email_first'] = $line[23];
                $required_data[$line_number]['emp_gender'] = $line[3];
                $required_data[$line_number]['emp_category'] = $line[4];
                $required_data[$line_number]['emp_dob'] = date('Y-m-d', strtotime($line[5]));
                $required_data[$line_number]['reporting_email'] = $line[52];
            }
            return response()->json(['success' => true, 'data' => $required_data]);
        } catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Check employee code is validate or not
     * @param $code, string
     * @return boolean true if available, false otherwise
     */
    public function validate_emp_code(Request $request)
    {
        try{
            $this->validate($request, [
                'code' => ['required', 'string']
            ]);
            $status = false;
            if (EmpDetail::where('emp_code', $request->code)->exists()){
                $status = true;
            }
            return response()->json(['success' => true, 'available' => $status]);
        }
        catch (Throwable $th){
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    
    /**
     * Check employee email is validate or not
     * @param $email, string
     * @return boolean true if available, false otherwise
     */
    public function validate_emp_email(Request $request)
    {
        try{
            $this->validate($request, [
                'email' => ['required', 'email:filter']
            ]);
            $status = false;
            if (EmpDetail::where('emp_email_first', $request->email)->exists()){
                $status = true;
            }
            return response()->json(['success' => true, 'available' => $status]);
        }
        catch (Throwable $th){
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }


}
