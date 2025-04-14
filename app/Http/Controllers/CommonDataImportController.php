<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Department;
use App\Models\DepartmentSkill;
use App\Models\User;
use App\Models\CompanyMaster;
use App\Models\Role;
use App\Models\ReportingManager;
use App\Models\Qualification;
use App\Models\State;
use App\Models\City;
use App\Models\FunctionalRole;
use App\Models\AppointmentFormat;
use App\Models\EmpDetail;
use App\Models\EmpPersonalDetail;
use App\Models\EmpAccountDetail;
use App\Models\EmpAddressDetail;
use App\Models\EmpIdProof;
use App\Models\EmpEducationDetail;
use App\Models\EmpExperienceDetail;
use App\Models\Salary;
use App\Models\EmpSendDoc;
use App\Models\LeaveRequest;
use App\Models\EmpCertificateDetail;
use App\Models\EmpChangeLog;
use App\Models\EmpCredentialLog;
use App\Models\LeaveRegularization;
use App\Models\Bank;
use App\Models\Organization;
use App\Models\Designation;
use App\Models\EmailHistory;
use App\Models\EmpSalarySlip;
use App\Models\EmpProfileRequestLog;
use App\Models\EmpChangedColumnsReq;
use App\Models\WoAttendance;
use App\Models\Notification;
use DB;
use Throwable;


class CommonDataImportController extends Controller
{

    public function import()
    {
        return view('import-table');
    }

    public function importDataSave(Request $request)
    {

        $file = $request->file('import_csv');
        $handle = fopen($file, 'r');

        // Add employee details.
        // $status =  $this->import_employee_data($handle);

        // Add salary details.
        // $status =  $this->import_salary_data($handle);

        // Add Leave Request details.
        // $status =  $this->import_leave_request_data($handle);

        // Add Employee send documents details.
        // $status =  $this->import_emp_send_doc_data($handle);

        // Add Employee certificate data details.
        // $status =  $this->import_emp_certificates_data($handle);

        // Add Employee change log details.
        // $status =  $this->import_emp_change_log_data($handle);
        
        // Add Employee credential log details.
        // $status =  $this->import_emp_credential_log_data($handle);

        // Add leave regularisation details.
        $status =  $this->import_leave_regularisation_data($handle);

        // $status =  $this->notification($handle);
        
        if(isset($status['error'])){
            return $status['message'];
        } else {
            return back()->with('success', 'CSV Imported Successfully!');
        }
        die;



        $headers = fgetcsv($handle); // Read and store header row

        // import employee data.
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $row = array_combine($headers, $data); // Map headers to values

            // Store user record.
            // $dob = date_create($row['dob']);
            // User::create([
            //     'id' => $row['id'] ?? null,
            //     'first_name' => $row['first_name'] ?? null,
            //     'last_name' => $row['last_name'] ?? null,
            //     'email' => $row['email'] ?? null,
            //     'remember_token' => $row['remember_token'] ?? null,
            //     'email_verified_at' => $row['email_verified_at'] ?? null,
            //     'password' => $row['password'] ?? null,
            //     'gender' => $row['gender'] ?? null,
            //     'phone' => $row['phone'] ?? null,
            //     'dob' => date_format($dob,'Y-m-d') ?? null,
            //     'role_id' => get_role_id($row['user_type']),
            //     'department_id' => $row['department_id'] == NULL ? null : $row['department_id'],
            //     'status' => $row['status'] ?? null,
            //     'created_at' => $row['created'] ?? null,
            //     'updated_at' => $row['created'] ?? null,
            //     'company_id' => $row['company_id'] ? $row['company_id'] : '1',
            // ]);


            // department
            // Department::create([
            //     'id' => $row['id'],
            //     'department' => $row['department'],
            //     'reporting_manager_id' =>  null,
            //     'status' => $row['status'],
            // ]);

            // skill

            // $skill = new Skill();
            // $skill->id = $row['id'];
            // $skill->skill = $row['skill'];
            // $skill->status = $row['status'];
            // $skill->save();



            // department skill

            // DepartmentSkill::create([
            //     'id' => $row['id'],
            //     'department_id' => $row['dept_id'],
            //     'skill_id' => $row['skill_id'],
            //     'status' => '1'
            // ]);

            //reporting Manager

            // ReportingManager::create([
            //     'email' =>  $row['email'],
            //     'name' =>  $row['name'],
            //     'designation' =>  $row['designation'],
            //     'access_emp_code' =>  $row['access_emp_code'],
            //     'status' =>  $row['status']
            // ]);



            // company Master

            // CompanyMaster::create([
            //     'id' => $row['id'],
            //     'name' => $row['company_name'],
            //     'mobile' => $row['company_contact'],
            //     'email' => $row['company_email'],
            //     'address' => $row['company_address'],
            //     'registration_no' => $row['registration_no'],
            //     'gstin_no' => $row['gstin_no'],
            //     'sac_code' => $row['sac_code'],
            //     'service_tax_registration_no' => $row['service_tax_registration_no'],
            //     'pan_no' => $row['pan_no'],
            //     'website' => $row['website'],
            //     'bank_payee_name' => $row['bank_payee_name'],
            //     'bank_name' => $row['bank_name'],
            //     'account_no' => $row['account_no'],
            //     'ifsc_code' => $row['ifsc_code'],
            //     'branch_name' => $row['branch_name'],
            //     'branch_address' => $row['branch_address'],
            //     'company_city' => $row['company_city'],
            //     'payment_type' => $row['payment_type'],
            //     'bank_email' => $row['bank_email'],
            //     'twitter_link' => $row['twitter_link'],
            //     'facebook_link' => $row['facebook_link'],
            //     'facebook_link' => $row['facebook_link'],
            //     'linkedin_link' => $row['linkedin_link'],
            //     'youtube_link' => $row['youtube_link'],
            //     'instagram_link' => $row['instagram_link'],
            //     'pinterest_link' => $row['pinterest_link'],
            //     'status' => $row['status'],
            //     'user_id' => $row['user_id']
            // ]);

            // add record in roles table 

            // Role::create([
            //     'id' => $row['id'],
            //     'rid' => $row['rid'],
            //     'role_name' => $row['role_name'],
            //     'menu_id' => $row['roles_assigned'],
            //     'status' => $row['status'],
            //     'created_at' => $row['time_stamp']
            // ]);

            // qualification

            // Qualification::create([
            //         'id' => $row['id'],
            //         'qualification' => $row['qualification'],
            //         'status' => $row['status'],
            //         'created_at' => $row['add_time']
            //     ]);

            // Import State data

            // State::create([
            //     'id' => $row['id'],
            //     'country_id ' => $row['country_id'],
            //     'state' => $row['state'],
            //     'state_code' => $row['state_code'],
            //     'slug' => $row['slug'],
            //     // 'created_at' =>  Carbon::parse($row['created_at']),
            //     // 'updated_at' =>  Carbon::parse($row['updated_at']),
            //     // 'deleted_at' =>  Carbon::parse($row['deleted_at']) ?? NULL
            // ]);


            // Import City

            // City::create([
            //     'id' => $row['id'],
            //     'city_name' => $row['city_name'],
            //     'city_code' => $row['city_code'],
            //     'state_code' => $row['state_code']
            // ]);

            //   import functional role

            // FunctionalRole::create([
            //     'id' => $row['id'],
            //     'role' => $row['role'],
            //     'status' => $row['status'],
            //     'created_at' => $row['add_time'] 
            // ]);


            // import appointment_format
            // AppointmentFormat::create([
            // 'id' => $row['id'],
            // 'name' => $row['name'],
            // 'format' => $row['format'],
            // 'format_2' => $row['format_2'],
            // 'type' => $row['type'],
            // 'employment_type' => $row['employment_type'] ?? NULL,
            // 'status' => $row['status']
            // ]);
        }
        fclose($handle);
        return back()->with('success', 'CSV Imported Successfully!');
    }

    
    /**
    * Import Employee credential log data.
    */
    public function import_leave_regularisation_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_at']));
                $row['created_by'] = $row['added_by'];

                unset($row['added_by']);
                LeaveRegularization::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    /**
    * Import Employee credential log data.
    */
    public function import_emp_credential_log_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_at']));

                EmpCredentialLog::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    /**
    * Import Employee change log data.
    */
    public function import_emp_change_log_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['start_date'] = date('Y-m-d', strtotime($row['start_date']));

                unset($row['created_on']);
                EmpChangeLog::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    /**
    * Import Employee certificates documents data.
    */
    public function import_emp_certificates_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                EmpCertificateDetail::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    /**
    * Import Employee send documents data.
    */
    public function import_emp_send_doc_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));

                unset($row['created_on']);
                EmpSendDoc::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    /**
    * Import Leave Request data.
    */
    public function import_leave_request_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['updated_at'] = date('Y-m-d', strtotime($row['updated_on']));
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['deleted_at'] = date('Y-m-d h:i:s', strtotime($row['deleted_on']));
                $row['approved_disapproved_by'] = $row['approved_disapproved_by'] ? $row['approved_disapproved_by'] : null;
                $row['reapproved_redisapproved_by'] = $row['reapproved_redisapproved_by'] ? $row['reapproved_redisapproved_by'] : null;

                unset($row['updated_on']);
                unset($row['created_on']);
                unset($row['deleted_on']);
                LeaveRequest::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }
    

    /**
     * Import salary data.
     */
    public function import_salary_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['id'] = $row['salary_id'];
                $row['sa_emp_doj'] = date('Y-m-d', strtotime($row['sa_emp_doj']));
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['sal_add_date']));
                $row['sal_add_date'] = date('Y-m-d h:i:s', strtotime($row['sal_add_date']));
                $row['taxable_salary'] = $row['taxable_salary'] ? $row['taxable_salary'] : 0;
                $row['tds_tax_amount'] = $row['tds_tax_amount'] ? $row['tds_tax_amount'] : 0;
                $row['tax_credit'] = $row['tax_credit'] ? $row['tax_credit'] : 0;
                $row['e_cess'] = $row['e_cess'] ? $row['e_cess'] : 0;
                $row['pf_wages'] = $row['pf_wages'] ? $row['pf_wages'] : 0;
                $row['medical_insurance'] = $row['medical_insurance'] ? $row['medical_insurance'] : 0;
                $row['accident_insurance'] = $row['accident_insurance'] ? $row['accident_insurance'] : 0;

                unset($row['salary_id']);
                unset($row['source']);
                Salary::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    /**
     * Import employee data.
     */
    public function import_employee_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values

                // Save Employee Details
                $empdetails = new EmpDetail();
                $empdetails->id = $row['emp_id'];
                $empdetails->emp_work_order = $row['emp_work_order'];
                $empdetails->emp_password = $row['emp_password'];
                $empdetails->emp_code = $row['emp_code'];
                $empdetails->role_id = get_role_id('employee');
                $empdetails->emp_name = $row['emp_name'];
                $empdetails->emp_place_of_posting = $row['emp_place_of_posting'];
                $empdetails->emp_designation = $row['emp_designation'];
                $empdetails->department = $row['department'];
                $empdetails->emp_doj = date('Y-m-d', strtotime($row['emp_doj']));
                $empdetails->emp_dor = date('Y-m-d', strtotime($row['emp_dor']));
                $empdetails->emp_phone_first = $row['emp_phone_first'];
                $empdetails->emp_phone_second = $row['emp_phone_second'];
                $empdetails->emp_email_first = $row['emp_email_first'];
                $empdetails->emp_email_second = $row['emp_email_second'];
                $empdetails->emp_functional_role = $row['emp_functional_role'];
                $empdetails->emp_remark = $row['emp_remark'];
                $empdetails->created_by = $row['added_by'] ? $row['added_by'] : null;
                $empdetails->created_at = $row['adding_date'];
                $empdetails->reporting_email = $row['reporting_email'];
                $empdetails->emp_current_working_status = $row['emp_current_working_status'];
                $empdetails->save();

                // // Save Personal Details
                $personaldetails = new EmpPersonalDetail();
                $personaldetails->emp_code = $row['emp_code'];
                $personaldetails->emp_gender = $row['emp_gender'];
                $personaldetails->emp_category = $row['emp_category'] ? $row['emp_category'] : 'general';
                $personaldetails->emp_dob = date('Y-m-d', strtotime($row['emp_dob']));
                $personaldetails->emp_blood_group = $row['emp_blood_group'];
                $personaldetails->emp_father_mobile = $row['emp_emergency_contact'];
                $personaldetails->emp_father_name = $row['emp_father_name'];
                $personaldetails->emp_marital_status = $row['emp_martial_status'];
                $personaldetails->emp_dom = $row['emp_dom'];
                $personaldetails->emp_husband_wife_name = $row['emp_husband_wife_name'];
                $personaldetails->created_by = $row['added_by'] ? $row['added_by'] : null;
                $personaldetails->created_at = $row['adding_date'];
                $personaldetails->save();

                // // Save Account Details
                $accountdetails = new EmpAccountDetail();
                $accountdetails->emp_code = $row['emp_code'];
                $accountdetails->emp_unit = $row['emp_unit'];
                $accountdetails->emp_salary = $row['emp_salary'];
                $accountdetails->emp_branch = $row['emp_branch'];  // leave 13 for bank name
                $accountdetails->emp_account_no = $row['emp_account_no'];
                $accountdetails->emp_ifsc = $row['emp_ifsc'];
                $accountdetails->emp_pan = $row['emp_pan'];
                $accountdetails->emp_pf_no = $row['emp_pf_no'];  // Leave 48 for pf no.
                $accountdetails->emp_esi_no = $row['emp_esi_no'];
                $accountdetails->created_by = $row['added_by'] ? $row['added_by'] : null;
                $accountdetails->created_at = $row['adding_date'];
                $accountdetails->save();

                // // Save Address Details
                $addressdetails = new EmpAddressDetail();
                $addressdetails->emp_code = $row['emp_code'];
                $addressdetails->emp_permanent_address = $row['emp_permanent_address'];
                $addressdetails->emp_local_address = $row['emp_local_address'];
                $addressdetails->created_by = $row['added_by'] ? $row['added_by'] : null;
                $addressdetails->created_at = $row['adding_date'];
                $addressdetails->save();

                // // Save Id Proof Details
                $idproofdetails = new EmpIdProof();
                $idproofdetails->emp_code = $row['emp_code'];
                $idproofdetails->emp_aadhaar_no = $row['emp_aadhaar_no'] == 'string' ? '' :  str_replace("string", "", $row['emp_aadhaar_no']);
                $idproofdetails->emp_passport_no = $row['emp_passport_no'];
                $idproofdetails->passport_file = $row['passport_file'];
                $idproofdetails->nearest_police_station = $row['nearest_police_station'];
                $idproofdetails->police_verification_id = $row['police_verification_id'];
                $idproofdetails->police_verification_file = $row['police_verification_file'];
                $idproofdetails->created_by = $row['added_by'] ? $row['added_by'] : null;
                $idproofdetails->created_at = $row['adding_date'];
                $idproofdetails->save();

                // // Save Education Details
                $educationdetails = new EmpEducationDetail();
                $educationdetails->emp_code = $row['emp_code'];
                $educationdetails->emp_postgradqualification = $row['emp_postgradqualification'];
                $educationdetails->emp_gradqualification = $row['emp_gradqualification'];
                $educationdetails->emp_highest_qualification = $row['emp_highest_qualification'];
                $educationdetails->emp_tenth_year = $row['emp_tenth_year'];
                $educationdetails->emp_tenth_percentage = $row['emp_tenth_percentage'];
                $educationdetails->emp_tenth_board_name = $row['emp_tenth_board_name'];
                $educationdetails->emp_twelve_year = $row['emp_twelve_year'];
                $educationdetails->emp_twelve_percentage = $row['emp_twelve_percentage'];
                $educationdetails->emp_twelve_board_name = $row['emp_twelve_board_name'];
                $educationdetails->emp_graduation_year = $row['emp_graduation_year'];
                $educationdetails->emp_graduation_percentage = $row['emp_graduation_percentage'];
                $educationdetails->emp_graduation_mode = $row['emp_graduation_mode'];
                $educationdetails->emp_graduation_in = $row['emp_graduation_in'];
                $educationdetails->emp_postgraduation_year = $row['emp_postgraduation_year'];
                $educationdetails->emp_postgraduation_percentage = $row['emp_postgraduation_percentage'];
                $educationdetails->emp_postgraduation_mode = $row['emp_postgraduation_mode'];
                $educationdetails->emp_postgraduation_in = $row['emp_postgraduation_in'];
                $educationdetails->created_by = $row['added_by'] ? $row['added_by'] : null;
                $educationdetails->created_at = $row['adding_date'];
                $educationdetails->save();

                // // Save Experience Details
                $expdetails = new EmpExperienceDetail();
                $expdetails->emp_code = $row['emp_code'];
                $expdetails->emp_experience = $row['emp_experience'];
                $expdetails->emp_skills = $row['emp_skills'];
                $expdetails->resume_file = $row['resume_file'];
                $expdetails->emp_experience = $row['emp_experience'];
                $expdetails->created_at = $row['adding_date'];
                $expdetails->created_by = $row['added_by'] ? $row['added_by'] : null;
                $expdetails->save();
                print_r($row['emp_code']);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


      public function bank_details($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values
                Bank::create([
                    'id' =>  $row['id'],
                    'name_of_bank' => $row['Name_of_Banks'],
                    'type_of_bank' => $row['Type_of_Bank'],
                    'status' => $row['status'],
                    ]);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // users table
    
    
     public function users($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values
                $dob = date_create($row['dob']);

                // var_dump($row['department_id']);

                User::create([
                    'id' => $row['id'] ?? null,
                    'first_name' => $row['first_name'] ?? null,
                    'last_name' => $row['last_name'] ?? null,
                    'email' => $row['email'] ?? null,
                    'remember_token' => $row['remember_token'] ?? null,
                    'email_verified_at' => $row['email_verified_at'] ?? null,
                    'password' => $row['password'] ?? null,
                    'gender' => $row['gender'] ?? null,
                    'phone' => $row['phone'] ?? null,
                    'dob' => date_format($dob,'Y-m-d') ?? null,
                    'role_id' => get_role_id($row['user_type']),
                    'department_id' => empty($row['department_id'])  || $row['department_id'] == "NULL" ? null : $row['department_id'],
                    'status' => $row['status'] ?? null,
                    'created_at' => $row['created'] ?? null,
                    'updated_at' => $row['created'] ?? null,
                    'company_id' =>  empty($row['company_id'])  || $row['company_id'] == "NULL" ? '1' : $row['company_id']
                ]);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // organizations table

    public function oranizations($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values
                Organization::create([
                    'id' => $row['id'],
                    'name' => $row['organisation_name'] ? $row['organisation_name'] : null, 
                    'address' => $row['address'] ? $row['address'] : null, 
                    'email' => $row['email'] ? $row['email'] : null, 
                    'contact' => $row['contact'] ? $row['contact'] : null, 
                    'state_id' => null,
                    'city_id' => null,
                    'postal_code' => null,
                    'psu' => null,
                    'psu_name' => null,
                    'status' => '1',
                    // 'company_id' =>  empty($row['company_id'])  || $row['company_id'] == "NULL" ? '1' : $row['company_id']
                ]);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    //designation

    public function designation($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values
                Designation::create([
                    'id' => $row['id'],
                    'name' => $row['position'] ? $row['position'] : null,
                    'status' => '1',
                ]);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // state


      public function state($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values
                State::create([
                    'id' => $row['id'],
                    'name' => $row['position'] ? $row['position'] : null,
                    'status' => '1',
                ]);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // email history

    
      public function emailHistory($handle)
        {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values
                EmailHistory::create([
                    'id' => $row['id'],
                    'from_mail' => $row['from_mail'],
                    'to_mail' => $row['to_mail'],
                    'sender_id' => $row['sender_id'] ? $row['sender_id'] : '',
                    'cc' => $row['cc'] ? $row['cc'] : null,
                    'subject' => $row['subject'],
                    'content' => $row['content'],
                    'attatchment' => $row['attatchment'],
                    'status' => $row['status']
                ]);
            
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // work order


    public function workOrder($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data); // Map headers to values
                EmailHistory::create([
                    'id' => $row['id'],
                    'from_mail' => $row['from_mail'],
                    'to_mail' => $row['to_mail'],
                    'sender_id' => $row['sender_id'] ? $row['sender_id'] : '',
                    'cc' => $row['cc'] ? $row['cc'] : null,
                    'subject' => $row['subject'],
                    'content' => $row['content'],
                    'attatchment' => $row['attatchment'],
                    'status' => $row['status']
                ]);
            
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // salary slip

    public function salary($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['status']=     $row['status'];
                EmpSalarySlip::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // emp_changed_columns_reqs

    public function emp_changed_columns_req($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['status']= $row['status'];
                EmpChangedColumnsReq::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // emp_profile_request_log

    public function emp_profile_request_log($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['status']= $row['status'];
                EmpProfileRequestLog::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    //attendat

    public function wo_attendance($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['id']= $row['id'];
                $row['status']= $row['status'];
                $row['updated_by'] = null;
                $row['created_at'] = $row['created_date'];
                WoAttendance::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // notification


    public function notification($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
           
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['id']= $row['id'];
                $row['created_at'] = $row['time'];
                Notification::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }
















    
}
