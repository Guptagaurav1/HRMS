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
use App\Models\UserRequestLog;
use App\Models\PositionRequest;
use App\Models\InvoiceRecord;
use App\Models\Project;
use App\Models\WorkOrder;
use App\Models\WoContactDetail;
use App\Models\BillingStructure;
use App\Models\Holiday;
use App\Models\Form16;
use App\Models\EmpWishMailLog;
use App\Models\Industry;
use App\Models\ClientList;
use App\Models\ClientReference;
use App\Models\ClientAttachment;
use App\Models\ClientAttachType;
use App\Models\CompanyType;
use App\Models\CompanyRoleMapping;
use App\Models\ContactedByCallLog;
use App\Models\District;
use App\Models\RecruitmentForm;
use Illuminate\Support\Carbon;
use App\Models\RecAddressDetail;
use App\Models\RecBankDetail;
use App\Models\RecEducationalDetail;
use App\Models\RecEsiDetail;
use App\Models\RecNomineeDetail;
use App\Models\RecPersonalDetail;
use App\Models\RecPreviousCompany;
use App\Models\LeavePolicy;
use App\Models\SendMailLog;
use App\Models\LeadSourceList;
use App\Models\LeadCategoryList;
use App\Models\CrmProjectList;
use App\Models\LeadList;
use App\Models\LeadAttachment;
use App\Models\LeadAssignUser;
use App\Models\LeadFollowUpList;
use App\Models\LeadSpocPerson;
use App\Models\CrmActionLog;
use App\Models\ImpEmailList;

use App\Models\TenderList;
use App\Models\PcgLeadList;
use App\Models\PcgLeadContact;
use App\Models\PcgClientList;
use App\Models\PcgClientContact;
use App\Models\CrmProjectAttachment;
use App\Models\Form16Failed;
// use App\Models\Client;
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
        $status =  $this->import_employee_data($handle);

        // Add salary details.

        // $status =  $this->import_salary_data($handle);

        // Add emp Salary

        // $status =  $this->emp_salary_slip($handle);

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


        // $status =  $this->notification($handle);

        // Add Recruiter Detail Change Response Log

        // $status =  $this->user_request_log($handle);

        // Add cities
        //  $status =  $this->cities($handle);

        // // Add Position Request 

        // $status =  $this->position_requests($handle);

        // Add Invoice Records 

        // $status =  $this->invoice_records($handle);

        // if(isset($status['error'])){
        // $status =  $this->import_leave_regularisation_data($handle);

        // Add Project details.
        // $status =  $this->import_project_data($handle);

        // Add Work Order details.
        // $status =  $this->import_work_order_data($handle);

        // Add Work Order contact details.
        // $status =  $this->import_work_order_contact_data($handle);

        // Add Work Order billing structure details.
        // $status =  $this->import_work_order_billing_data($handle);

        // Add Work Order attendance details.
        // $status =  $this->import_work_order_attendance_data($handle);

        // Add Work Order attendance details.
        // $status =  $this->import_holiday_data($handle);
        // Add Holiday details.
        // $status =  $this->import_holiday_data($handle);

        // Add Industry details.
        // $status =  $this->import_industry_data($handle);

        // Add Industry details.
        // $status =  $this->import_client_data($handle);

        // Add client reference details.
        // $status =  $this->import_client_reference_data($handle);

        // Add client attachment details.
        // $status =  $this->import_client_attachment_data($handle);

        // Add client attachment type details.
        // $status =  $this->import_client_attachment_type_data($handle);

        // Add company type details.
        // $status =  $this->import_company_type_data($handle);

        // Add company type details.
        // $status =  $this->import_company_role_mapping_data($handle);

        // $status =  $this->import_city_data($handle);

        // form 16

        // $status =  $this->form16($handle);

        // Employee Wish log

        // $status =  $this->emp_wish_mail_log($handle);


        // Add contacted by call logs

        // $status =  $this->contacted_by_call_logs($handle);

        // add district
        // 
        // $status =  $this->district($handle);

        // Add Recruitment form
        // $status =  $this->recruitment_forms($handle);

        // Add rec_address_details

        //  $status =  $this->rec_address_details($handle);

        // Add rec_bank_details
        // $status =  $this->rec_bank_details($handle);

        //    // Add rec_educational_details
        // $status =  $this->rec_educational_details($handle);
        //    // Add rec_educational_details
        //     $status =  $this->rec_educational_details($handle);

        // Add rec_esi_details
        // $status =  $this->rec_esi_details($handle);

        // Add rec_nominee_details
        // $status =  $this->rec_nominee_details($handle);

        // // Add rec_personal_details
        // $status =  $this->rec_personal_details($handle);

        // Add rec_previous_companies
        // $status =  $this->rec_previous_companies($handle);

        // Add leave_policies
        // $status =  $this->leave_policies($handle);

        // Add send_mail_log
        // $status =  $this->send_mail_log($handle);

        //Add  imp_email_lists
        // $status =  $this->imp_email_lists($handle);

        // Add rec_previous_companies
        // $status =  $this->rec_previous_companies($handle);

        // Add leave_policies
        // $status =  $this->leave_policies($handle);

        // Add send_mail_log
        // $status =  $this->send_mail_log($handle);

        // Add lead source list.
        // $status =  $this->import_lead_source_data($handle);

        // Add lead category list.
        // $status =  $this->import_lead_category_data($handle);

        // Add crm project list.
        // $status =  $this->import_crm_project_list_data($handle);

        // Add crm lead list.
        // $status =  $this->import_lead_list_data($handle);

        // Add crm lead attachments list.
        // $status =  $this->import_lead_attachment_data($handle);

        // Add crm lead assigned users list.
        // $status =  $this->import_lead_assign_user_data($handle);

        // Add crm lead follow up list.
        // $status =  $this->import_lead_follow_up_list_data($handle);

        // Add crm lead spoke person list.
        // $status =  $this->import_lead_spoc_person_data($handle);

        // Add crm lead spoke person list.
        // $status =  $this->import_crm_action_logs_data($handle);




        // Add tender list.
        // $status =  $this->import_tender_list_data($handle);

        // Add PCG lead list data.
        // $status =  $this->import_pcg_lead_list_data($handle);

        // Add PCG lead contacts.
        // $status =  $this->import_pcg_lead_contact_data($handle);

        // Add PCG lead contacts.
        // $status =  $this->import_pcg_client_list_data($handle);

        // Add PCG client contacts.
        // $status =  $this->import_pcg_client_contact_data($handle);

        // Add CRM project attachments.
        // $status =  $this->import_crm_project_attachment_data($handle);

        // Add form_16_fails
        // $status =  $this->form_16_fails($handle);

        // $status =  $this->emp_profile_request_log($handle);


        if (isset($status['error'])) {
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
     * Import qualification details.
     */
    public function import_qualification_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                Qualification::create([
                    'id' => $row['id'],
                    'qualification' => $row['qualification'],
                    'status' => $row['status'],
                    'created_at' => $row['add_time']
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

    /**
     * Import reporting manager details.
     */
    public function import_reporting_manager_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                ReportingManager::create([
                    'email' =>  $row['email'],
                    'name' =>  $row['name'],
                    'designation' =>  $row['designation'],
                    'access_emp_code' =>  $row['access_emp_code'],
                    'status' =>  $row['status']
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

    /**
     * Import functional role details.
     */
    public function import_functional_role_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                FunctionalRole::create([
                    'id' => $row['id'],
                    'role' => $row['role'],
                    'status' => $row['status'],
                    'created_at' => $row['add_time']
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

    /**
     * Import department skill details.
     */
    public function import_department_skill_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                DepartmentSkill::create([
                    'id' => $row['id'],
                    'department_id' => $row['dept_id'],
                    'skill_id' => $row['skill_id'],
                    'status' => '1'
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

    /**
     * Import skill details.
     */
    public function import_skill_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                $skill = new Skill();
                $skill->id = $row['id'];
                $skill->skill = $row['skill'];
                $skill->status = $row['status'];
                $skill->save();
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
     * Import department details.
     */
    public function import_department_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                Department::create([
                    'id' => $row['id'],
                    'department' => $row['department'],
                    'reporting_manager_id' =>  null,
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

    /**
     * Import role details.
     */
    public function import_role_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                Role::create([
                    'id' => $row['id'],
                    'rid' => $row['rid'],
                    'role_name' => $row['role_name'],
                    'menu_id' => $row['roles_assigned'],
                    'status' => $row['status'],
                    'created_at' => $row['time_stamp']
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

    /**
     * Import cities details.
     */
    public function import_company_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                CompanyMaster::create([
                    'id' => $row['id'],
                    'name' => $row['company_name'],
                    'mobile' => $row['company_contact'],
                    'email' => $row['company_email'],
                    'address' => $row['company_address'],
                    'registration_no' => $row['registration_no'],
                    'gstin_no' => $row['gstin_no'],
                    'sac_code' => $row['sac_code'],
                    'service_tax_registration_no' => $row['service_tax_registration_no'],
                    'pan_no' => $row['pan_no'],
                    'website' => $row['website'],
                    'bank_payee_name' => $row['bank_payee_name'],
                    'bank_name' => $row['bank_name'],
                    'account_no' => $row['account_no'],
                    'ifsc_code' => $row['ifsc_code'],
                    'branch_name' => $row['branch_name'],
                    'branch_address' => $row['branch_address'],
                    'company_city' => $row['company_city'],
                    'payment_type' => $row['payment_type'],
                    'bank_email' => $row['bank_email'],
                    'twitter_link' => $row['twitter_link'],
                    'facebook_link' => $row['facebook_link'],
                    'facebook_link' => $row['facebook_link'],
                    'linkedin_link' => $row['linkedin_link'],
                    'youtube_link' => $row['youtube_link'],
                    'instagram_link' => $row['instagram_link'],
                    'pinterest_link' => $row['pinterest_link'],
                    'status' => $row['status'],
                    'user_id' => $row['user_id'] ? $row['user_id'] : null
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

    /**
     * Import cities details.
     */
    public function import_cities_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                City::create([
                    'id' => $row['id'],
                    'city_name' => $row['city_name'],
                    'city_code' => $row['city_code'] ? $row['city_code'] : null,
                    'state_code' => $row['state_code']
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

    /**
     * Import Pcg client List details.
     */
    public function import_crm_project_attachment_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['added_on']));
                $row['updated_at'] = $row['updated_on'] ? date('Y-m-d h:i:s', strtotime($row['updated_on'])) : null;

                unset($row['added_on']);
                unset($row['updated_on']);
                if (CrmProjectList::where('id', $row['project_id'])->exists()) {
                    CrmProjectAttachment::create($row);
                }
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
     * Import Pcg client List details.
     */
    public function import_pcg_client_contact_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['updated_by'] = $row['updated_by'] ? $row['updated_by'] : null;
                PcgClientContact::create($row);
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
     * Import Pcg client List details.
     */
    public function import_pcg_client_list_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_datetime']));
                $row['updated_at'] = $row['updated_datetime'] ? date('Y-m-d h:i:s', strtotime($row['updated_datetime'])) : null;
                $row['updated_by'] = $row['updated_by'] ? $row['updated_by'] : null;
                unset($row['created_datetime']);
                unset($row['updated_datetime']);
                PcgClientList::create($row);
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
     * Import Pcg Lead List details.
     */
    public function import_pcg_lead_contact_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['updated_by'] = $row['updated_by'] ? $row['updated_by'] : null;
                PcgLeadContact::create($row);
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
     * Import Pcg Lead List details.
     */
    public function import_pcg_lead_list_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_datetime']));
                $row['updated_at'] = $row['updated_datetime'] ? date('Y-m-d h:i:s', strtotime($row['updated_datetime'])) : null;
                $row['updated_by'] = $row['updated_by'] ? $row['updated_by'] : null;
                unset($row['created_datetime']);
                unset($row['updated_datetime']);
                PcgLeadList::create($row);
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
     * Import tender list details.
     */
    public function import_tender_list_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_at']));
                $row['updated_at'] = $row['updated_at'] ? date('Y-m-d h:i:s', strtotime($row['updated_at'])) : null;
                $row['date'] = date('Y-m-d', strtotime($row['date']));
                $row['submission_date'] = date('Y-m-d', strtotime($row['submission_date']));

                TenderList::create($row);
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
     * Import crm action logs details.
     */
    public function import_crm_action_logs_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['lead_id'] = get_lead_id($row['lead_id']) ? get_lead_id($row['lead_id']) : null;
                $row['assigned_user_id'] = $row['assigned_user_id'] ? $row['assigned_user_id'] : null;
                $row['follow_up_id'] = $row['follow_up_id'] ? $row['follow_up_id'] : null;
                $row['updated_by'] = $row['changed_by'] ? $row['changed_by'] : null;
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_time']));

                unset($row['created_time']);
                unset($row['changed_by']);
                if (LeadList::where('id', $row['lead_id'])->exists()) {
                    CrmActionLog::create($row);
                }
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
     * Import crm lead spoc person details.
     */
    public function import_lead_spoc_person_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['added_on']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_on']));

                unset($row['added_on']);
                unset($row['updated_on']);
                if (LeadList::where('id', $row['lead_id'])->exists()) {
                    LeadSpocPerson::create($row);
                }
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
     * Import crm lead follow up list details.
     */
    public function import_lead_follow_up_list_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['lead_id'] = get_lead_id($row['lead_id']);
                $row['created_by'] = $row['added_by'] ? $row['added_by'] : null;
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['next_follow_up'] = date('Y-m-d', strtotime($row['date']));

                unset($row['added_by']);
                unset($row['created_on']);
                unset($row['date']);
                LeadFollowUpList::create($row);
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
     * Import crm lead assigned users details.
     */
    public function import_lead_assign_user_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_on']));

                unset($row['created_on']);
                unset($row['updated_on']);
                if (LeadList::where('id', $row['lead_id'])->exists()) {
                    LeadAssignUser::create($row);
                }
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
     * Import crm lead attachment details.
     */
    public function import_lead_attachment_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values

                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_on']));

                unset($row['created_on']);
                unset($row['updated_on']);
                if (LeadList::where('id', $row['lead_id'])->exists()) {
                    LeadAttachment::create($row);
                }
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
     * Import crm lead list details.
     */
    public function import_lead_list_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_by'] = $row['added_by'];
                $row['category_id'] = $row['category_id'] ? $row['category_id'] : null;
                $row['closing_amount'] = $row['closing_amount'] ? $row['closing_amount'] : 0;
                $row['deadline'] = !empty($row['deadline']) ? date('Y-m-d', strtotime($row['deadline'])) : null;
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_on']));

                unset($row['created_on']);
                unset($row['updated_on']);
                unset($row['added_by']);
                LeadList::create($row);
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
     * Import crm project details.
     */
    public function import_crm_project_list_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_by'] = $row['added_by'];
                $row['per_inv_date'] = !empty($row['per_inv_date']) ? date('Y-m-d', strtotime($row['per_inv_date'])) : null;
                $row['letter_ref_date'] = !empty($row['letter_ref_date']) ? date('Y-m-d', strtotime($row['letter_ref_date'])) : null;
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['added_time']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_time']));

                unset($row['added_time']);
                unset($row['updated_time']);
                unset($row['added_by']);
                CrmProjectList::create($row);
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
     * Import company role mapping details.
     */
    public function import_lead_category_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_by'] = $row['added_by'];
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['added_at']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_at']));

                unset($row['added_at']);
                unset($row['added_by']);
                LeadCategoryList::create($row);
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
     * Import company role mapping details.
     */
    public function import_lead_source_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_by'] = $row['added_by'];
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['added_at']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_at']));

                unset($row['added_at']);
                unset($row['added_by']);
                LeadSourceList::create($row);
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
     * Import company role mapping details.
     */
    public function import_company_role_mapping_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_at']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_at']));

                CompanyRoleMapping::create($row);
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
     * Import company type details.
     */
    public function import_company_type_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_at']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_at']));
                unset($row['added_by']);
                CompanyType::create($row);
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
     * Import client attachment type.
     */
    public function import_client_attachment_type_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_on']));

                unset($row['created_on']);
                unset($row['updated_on']);
                ClientAttachType::create($row);
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
     * Import client attachments.
     */
    public function import_client_attachment_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_on']));

                unset($row['created_on']);
                unset($row['updated_on']);
                if (ClientList::where('id', $row['client_id'])->exists()) {
                    ClientAttachment::create($row);
                }
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
     * Import client reference.
     */
    public function import_client_reference_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_on']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_on']));

                unset($row['created_on']);
                unset($row['updated_on']);
                ClientReference::create($row);
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
     * Import Industry data.
     */
    public function import_industry_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_by'] = $row['add_by'];

                unset($row['add_by']);
                Industry::create($row);
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
     * Import clients data.
     */
    public function import_client_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_by'] = $row['added_by'];
                $row['company_industry'] = $row['company_industry'] == 'not_specify' || empty($row['company_industry']) ? null : $row['company_industry'];
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['added_time']));
                $row['updated_at'] = date('Y-m-d h:i:s', strtotime($row['updated_time']));
                $row['company_city'] = get_city_id($row['company_city']) ? get_city_id($row['company_city']) : null;
                $row['company_state'] = get_state_id($row['company_state']) ? get_state_id($row['company_state']) : null;
                unset($row['added_time']);
                unset($row['updated_time']);
                unset($row['added_by']);
                ClientList::create($row);
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
     * Import Holiday data.
     */
    public function import_holiday_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                Holiday::create($row);
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
     * Import Work Order attendance data.
     */
    public function import_work_order_attendance_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_date']));
                unset($row['created_date']);
                $row['updated_by'] = $row['updated_by'] ? $row['updated_by'] : null;
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

    /**
     * Import Work Order billing structure data.
     */
    public function import_work_order_billing_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['organisation_id'] = get_organization_id($row['organisation_name']) ? get_organization_id($row['organisation_name']) : null;
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['added_time']));
                $row['created_by'] = $row['added_by'];

                unset($row['added_time']);
                unset($row['organisation_name']);
                unset($row['added_by']);
                BillingStructure::create($row);
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
     * Import Work Order contact data.
     */
    public function import_work_order_contact_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['work_order_id'] = $row['wo_id'];
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_date']));

                unset($row['created_date']);
                unset($row['wo_id']);
                WoContactDetail::create($row);
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
     * Import City data.
     */
    public function import_city_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                City::create([
                    'id' => $row['id'],
                    'city_name' => $row['city_name'],
                    'city_code' => $row['city_code'] ? $row['city_code'] : 0,
                    'state_code' => $row['state_code']
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

    /**
     * Import work order data.
     */
    public function import_work_order_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data); // Map headers to values
                $row['project_id'] = get_project_id($row['wo_project_number']) ? get_project_id($row['wo_project_number']) : null;
                $row['wo_city'] = get_city_id($row['wo_city']) ? get_city_id($row['wo_city']) : null;
                $row['id'] = $row['wo_id'];
                $row['wo_state'] = get_state_id($row['wo_state']) ? get_state_id($row['wo_state']) : null;
                $row['id'] = $row['wo_id'];
                $row['created_by'] = $row['wo_entry_by'] ? $row['wo_entry_by'] : null;
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['wo_created_date']));
                $row['wo_start_date'] = date('Y-m-d', strtotime($row['wo_start_date']));
                $row['wo_end_date'] = date('Y-m-d', strtotime($row['wo_end_date']));
                $row['wo_date_of_issue'] = date('Y-m-d', strtotime($row['wo_date_of_issue']));
                $row['wo_pin'] = $row['wo_pin'] ? (int)$row['wo_pin'] : 0;

                unset($row['wo_entry_by']);
                unset($row['wo_created_date']);
                unset($row['wo_project_number']);
                unset($row['wo_oraganisation_name']);
                unset($row['wo_client_contact_person']);
                unset($row['wo_client_designation']);
                unset($row['wo_client_contact']);
                unset($row['wo_client_email']);
                unset($row['wo_id']);
                unset($row['wo_project_name']);
                unset($row['wo_empanelment_reference']);
                WorkOrder::create($row);
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
     * Import Project data.
     */
    public function import_project_data($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $project = [];
                $row = array_combine($headers, $data); // Map headers to values
                $project['organisation_id'] = get_organization_id($row['wo_oraganisation_name']) ? get_organization_id($row['wo_oraganisation_name']) : null;
                $project['project_number'] = $row['wo_project_number'];
                $project['project_name'] = $row['wo_project_name'];
                $project['empanelment_reference'] = $row['wo_empanelment_reference'];
                if (!Project::where(['organisation_id' => $project['organisation_id'], 'project_number' => $row['wo_project_number']])->exists()) {
                    if (empty($project['project_number']))
                        $project['project_number'] = "P-" . $row['wo_id'];
                    Project::create($project);
                }
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
                if (EmpDetail::where('emp_code', $row['emp_code'])->exists())
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
                $accountdetails->emp_sal_structure_status = $row['emp_sal_structure_status'];
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
                $idproofdetails->emp_aadhaar_no = $row['emp_aadhaar_no'];
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
                    'dob' => date_format($dob, 'Y-m-d') ?? null,
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
                    'country_id' => $row['country_id'],
                    'state' => $row['state'],
                    'state_code' => $row['state_code'],
                    'slug' => $row['slug'],
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

    public function emp_salary_slip($handle)
    {

        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();

            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['status'] = $row['status'];
                $row['emp_salary_id'] = $row['emp_salary_id'];
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
                $row['status'] = $row['status'];
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
                $row['status'] = $row['status'];
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

    // notification


    public function notification($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();

            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['id'] = $row['id'];
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

    // Recruiter Detail Change Response Log
    //table user_request_log

    public function user_request_log($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();

            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['id'] = $row['id'];
                $row['created_at'] = $row['created_on'];
                $row['updated_at'] = $row['updated_on'];
                UserRequestLog::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // position_requests //

    public function position_requests($handle)
    {

        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['created_by'] = $row['requested_by'];
                $row['hiring_budget'] = empty($row['hiring_budget'])  || $row['hiring_budget'] == "NULL" ? null : $row['hiring_budget'];
                $row['city'] = $row['city'] ==  empty($row['city']) || $row['city'] == 'Select City' || $row['city'] == '' ? null : $row['city'];
                $row['state'] = empty($row['state'])  || $row['state'] == "NULL" ? null : $row['state'];
                $row['department'] = $row['department'] == 'Select Department' ? null : $row['department'];
                if ($row['department'] == '15' || $row['department'] == '22') {
                    $row['department'] = null;
                }
                PositionRequest::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }



    // invoice & Records //

    public function invoice_records($handle)
    {

        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['created_at'] = $row['ir_add_datetime'];
                $row['id'] = $row['ir_id'];
                InvoiceRecord::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // rec rec_address_details

    public function rec_address_details($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data);
                $reqForm = RecruitmentForm::where('id',  $row['rec_id'])->first();
                if ($reqForm->emp_code == 'NULL' ||  empty($reqForm->emp_code)) {
                    $empAddress = new EmpAddressDetail();
                    $empAddress->rec_id = empty($row['rec_id'])  || $row['rec_id'] == "NULL" ? null : $row['rec_id'];
                    $empAddress->emp_permanent_address = $row['permanent_add'];
                    $empAddress->emp_local_address = $row['correspondence_add'];
                    $empAddress->created_at = $row['created_on'];
                    $empAddress->updated_at = $row['updated_on'];
                    $empAddress->save();
                    // id proof
                    $empIdProof = new EmpIdProof();
                    $empIdProof->rec_id =  empty($row['rec_id'])  || $row['rec_id'] == "NULL" ? null : $row['rec_id'];
                    $empIdProof->permanent_doc_type = $row['per_doc_type'];
                    $empIdProof->permanent_add_doc = $row['permanent_add_doc'];
                    $empIdProof->correspondence_doc_type = $row['corres_doc_type'];
                    $empIdProof->correspondence_add_doc = $row['correspondence_add_doc'];
                    $empIdProof->created_at = $row['created_on'];
                    $empIdProof->updated_at = $row['updated_on'];
                    $empIdProof->save();
                } else {
                    $updateEmpAdd = EmpAddressDetail::where('emp_code', $reqForm->emp_code)->first();
                    // dd($row['permanent_add']);  

                    if ($updateEmpAdd) {
                        $updateEmpAdd->rec_id = empty($row['rec_id'])  || $row['rec_id'] == "NULL" ? null : $row['rec_id'];
                        $updateEmpAdd->emp_permanent_address = $row['permanent_add'];
                        $updateEmpAdd->emp_local_address = $row['correspondence_add'];
                        $updateEmpAdd->created_at = $row['created_on'];
                        $updateEmpAdd->updated_at = $row['updated_on'];
                        $updateEmpAdd->save();
                    }
                    $empIdProofUpdate = EmpIdProof::where('emp_code', $reqForm->emp_code)->first();
                    if ($empIdProofUpdate) {
                        $empIdProofUpdate->rec_id = empty($row['rec_id'])  || $row['rec_id'] == "NULL" ? null : $row['rec_id'];
                        $empIdProofUpdate->permanent_doc_type = $row['per_doc_type'];
                        $empIdProofUpdate->permanent_add_doc = $row['permanent_add_doc'];
                        $empIdProofUpdate->correspondence_doc_type = $row['corres_doc_type'];
                        $empIdProofUpdate->correspondence_add_doc = $row['correspondence_add_doc'];
                        $empIdProofUpdate->created_at = $row['created_on'];
                        $empIdProofUpdate->updated_at = $row['updated_on'];
                        $empIdProofUpdate->save();
                    }
                }

                // echo "<pre>";
                // print_r($row['rec_id']);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage() . $th->getLine()];
        }
    }

    // bank Details 

    public function rec_bank_details($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $reqForm = RecruitmentForm::where('id', $row['rec_id'])->first();

                if ($reqForm->emp_code == 'NULL' ||  empty($reqForm->emp_code)) {
                    $empAccount = new EmpAccountDetail();
                    $empAccount->rec_id = $row['rec_id'];
                    $empAccount->bank_id  = $row['bank_name_id'];
                    $empAccount->emp_account_no  = $row['account_no'];
                    $empAccount->emp_branch = $row['branch'];
                    $empAccount->emp_pan = $row['pan_card_no'];
                    $empAccount->created_at = $row['created_on'];
                    $empAccount->updated_at = $row['updated_on'];
                    $empAccount->save();

                    // id proof
                    $empIdProof = new EmpIdProof();
                    $empIdProof->rec_id = $row['rec_id'];
                    $empIdProof->bank_doc = $row['bank_doc'];
                    $empIdProof->pan_card_doc = $row['pan_card_no'];
                    $empIdProof->created_at = $row['created_on'];
                    $empIdProof->updated_at = $row['updated_on'];
                    $empIdProof->save();
                } else {
                    $updateEmpAccount = EmpAccountDetail::where('emp_code', $reqForm->emp_code)->first();
                    if ($updateEmpAccount) {
                        $updateEmpAccount->rec_id = $row['rec_id'];
                        $updateEmpAccount->bank_id  = $row['bank_name_id'];
                        $updateEmpAccount->emp_account_no  = $row['account_no'];
                        $updateEmpAccount->emp_branch = $row['branch'];
                        $updateEmpAccount->emp_pan = $row['pan_card_no'];
                        $updateEmpAccount->save();
                    }
                    $empIdProof = EmpIdProof::where('emp_code', $reqForm->emp_code)->first();
                    if ($empIdProof) {
                        $empIdProof->rec_id = $row['rec_id'];
                        $empIdProof->bank_doc = $row['bank_doc'];
                        $empIdProof->pan_card_doc = $row['pan_card_no'];
                        $empIdProof->created_at = $row['created_on'];
                        $empIdProof->updated_at = $row['updated_on'];
                        $empIdProof->save();
                    }
                }
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // rec_educational_details



    public function rec_educational_details($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = array_combine($headers, $data);
                $empEducationDetail = new EmpEducationDetail();
                $empEducationDetail->rec_id  = $row['rec_id'];
                $empEducationDetail->emp_tenth_percentage  = $row['10th_percentage'];
                $empEducationDetail->emp_tenth_year  = $row['10th_year'];
                $empEducationDetail->emp_tenth_board_name = $row['10th_board'];
                $empEducationDetail->emp_tenth_doc = $row['10th_doc'];
                $empEducationDetail->emp_twelve_percentage = $row['12th_percentage'];
                $empEducationDetail->emp_twelve_year = $row['12th_year'];
                $empEducationDetail->emp_twelve_board_name = $row['12th_board'];
                $empEducationDetail->emp_twelve_doc = $row['12th_doc'];
                $empEducationDetail->emp_graduation_in = $row['grad_name'];
                $empEducationDetail->emp_graduation_percentage = $row['grad_percentage'];
                $empEducationDetail->emp_graduation_year = $row['grad_year'];
                $empEducationDetail->emp_graduation_mode = $row['grad_mode'];
                $empEducationDetail->grad_doc = $row['grad_doc'];
                $empEducationDetail->emp_postgraduation_in = $row['post_grad_name'];
                $empEducationDetail->emp_postgraduation_percentage = $row['post_grad_percentage'];
                $empEducationDetail->emp_postgraduation_year = $row['post_grad_year'];
                $empEducationDetail->emp_postgraduation_mode = $row['post_grad_mode'];
                $empEducationDetail->post_grad_doc = $row['post_grad_doc'];
                $empEducationDetail->created_at = $row['created_on'];
                $empEducationDetail->updated_at = $row['updated_on'];
                $empEducationDetail->save();
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    //Add rec_esi_details
    public function rec_esi_details($handle)
    {

        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $reqForm = RecruitmentForm::where('id', $row['rec_id'])->first();

                if ($reqForm->emp_code == 'NULL' ||  empty($reqForm->emp_code)) {
                    $empAccountDetail = new EmpAccountDetail();
                    $empAccountDetail->rec_id = $row['rec_id'];
                    $empAccountDetail->emp_esi_no = $row['previous_esi_no'];
                    $empAccountDetail->created_at = $row['created_on'];
                    $empAccountDetail->updated_at = $row['updated_on'];
                    $empAccountDetail->save();
                } else {
                    $empAccountDetail = EmpAccountDetail::where('emp_code', $reqForm->emp_code)->first();
                    if ($empAccountDetail) {
                        $empAccountDetail->rec_id = $row['rec_id'];
                        $empAccountDetail->emp_esi_no = $row['previous_esi_no'];
                        $empAccountDetail->created_at = $row['created_on'];
                        $empAccountDetail->updated_at = $row['updated_on'];
                        $empAccountDetail->save();
                    }
                }
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // Add rec_nominee_details

    public function rec_nominee_details($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['created_at'] = $row['created_on'];
                $row['updated_at'] = $row['updated_on'];
                if (empty($row['dob']) || $row['dob'] == 'NULL') {
                    $row['dob'] =  null;
                } else {
                    $dob = Carbon::parse($row['dob']);
                    $row['dob'] = $dob->format('Y-m-d');
                }
                RecNomineeDetail::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    public function rec_personal_details($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);

                $reqForm = RecruitmentForm::where('emp_code', $row['emp_code'])->first();
                if ($reqForm) {
                    $empPersonalDetail = new EmpPersonalDetail();
                    $empPersonalDetail->rec_id = $row['rec_id'];
                    $empPersonalDetail->emp_code = empty($row['emp_code']) || $row['emp_code'] == 'NULL' ? null :  $row['emp_code'];
                    $empPersonalDetail->emp_gender = $row['gender'];
                    $empPersonalDetail->preferred_location = $row['preferred_location'];
                    $empPersonalDetail->emp_father_name = $row['father_name'];
                    $empPersonalDetail->emp_father_mobile = $row['father_mobile'];
                    $empPersonalDetail->emp_marital_status = $row['marital_status'];
                    $empPersonalDetail->emp_husband_wife_name = $row['spouse_name'];
                    $empPersonalDetail->emp_dom = $row['date_of_marriage'];
                    $empPersonalDetail->emp_blood_group = $row['blood_group'];
                    $empPersonalDetail->emp_photo = $row['photograph'];
                    $empPersonalDetail->emp_signature = $row['signature'];
                    $empPersonalDetail->language_known = $row['language_known'];
                    $empPersonalDetail->emp_category = $row['category'];
                    $empPersonalDetail->created_at = $row['created_on'];
                    $empPersonalDetail->updated_at = $row['updated_on'];
                    $empPersonalDetail->save();

                    // Add data to EmpIdProof

                    $empIdProof = new EmpIdProof();
                    $empIdProof->rec_id = $row['rec_id'];
                    $empIdProof->emp_code =  empty($row['emp_code']) || $row['emp_code'] == 'NULL' ? null :  $row['emp_code'];
                    $empIdProof->emp_aadhaar_no = $row['aadhar_card_no'];
                    $empIdProof->aadhar_card_doc = $row['aadhar_card_doc'];
                    $empIdProof->emp_passport_no = $row['passport_no'];
                    $empIdProof->passport_file = $row['passport_doc'];
                    $empIdProof->category_doc = $row['category_doc'];
                    $empIdProof->police_verification_id = $row['police_verification_id'];
                    $empIdProof->police_verification_file = $row['police_verification_doc'];
                    $empIdProof->nearest_police_station = $row['nearest_police_station'];
                    $empIdProof->created_at = $row['created_on'];
                    $empIdProof->updated_at = $row['updated_on'];
                    $empIdProof->save();

                    // Add data to EmpAccountDetail

                    $empAccountDetail = new EmpAccountDetail();
                    $empAccountDetail->rec_id = $row['rec_id'];
                    $empAccountDetail->emp_code = empty($row['emp_code']) || $row['emp_code'] == 'NULL' ? null :  $row['emp_code'];
                    $empAccountDetail->emp_pf_no = $row['pf_no'];
                    $empAccountDetail->created_at = $row['created_on'];
                    $empAccountDetail->updated_at = $row['updated_on'];
                    $empAccountDetail->save();
                } else {

                    $empPersonalDetails = EmpPersonalDetail::where('emp_code', $row['emp_code'])->first();

                    if ($empPersonalDetails) {
                        $empPersonalDetails->rec_id = empty($row['rec_id']) || $row['rec_id'] == 'NULL' ? null :  $row['rec_id'];
                        $empPersonalDetails->emp_gender = $row['gender'];
                        $empPersonalDetails->preferred_location = $row['preferred_location'];
                        $empPersonalDetails->emp_father_name = $row['father_name'];
                        $empPersonalDetails->emp_father_mobile = $row['father_mobile'];
                        $empPersonalDetails->emp_marital_status = $row['marital_status'];
                        $empPersonalDetails->emp_husband_wife_name = $row['spouse_name'];
                        $empPersonalDetails->emp_dom = $row['date_of_marriage'];
                        $empPersonalDetails->emp_blood_group = $row['blood_group'];
                        $empPersonalDetails->emp_photo = $row['photograph'];
                        $empPersonalDetails->emp_signature = $row['signature'];
                        $empPersonalDetails->language_known = $row['language_known'];
                        $empPersonalDetails->emp_category = $row['category'];
                        $empPersonalDetails->created_at = $row['created_on'];
                        $empPersonalDetails->updated_at = $row['updated_on'];
                        $empPersonalDetails->save();
                    }

                    // update id proof

                    $empIdProofs = EmpIdProof::where('emp_code', $row['emp_code'])->first();

                    if ($empIdProofs) {
                        $empIdProofs->rec_id = empty($row['rec_id']) || $row['rec_id'] == 'NULL' ? null :  $row['rec_id'];
                        $empIdProofs->emp_aadhaar_no =  $row['emp_aadhaar_no'];
                        $empIdProofs->aadhar_card_doc = $row['aadhar_card_doc'];
                        $empIdProofs->emp_passport_no = $row['passport_no'];
                        $empIdProofs->passport_file = $row['passport_doc'];
                        $empIdProofs->category_doc = $row['category_doc'];
                        $empIdProofs->police_verification_id = $row['police_verification_id'];
                        $empIdProofs->police_verification_file = $row['police_verification_doc'];
                        $empIdProofs->nearest_police_station = $row['nearest_police_station'];
                        $empIdProofs->created_at = $row['created_on'];
                        $empIdProofs->updated_at = $row['updated_on'];
                        $empIdProofs->save();
                    }


                    // update pf No

                    $empAccountDetails = EmpAccountDetail::where('emp_code', $row['emp_code'])->first();
                    if ($empAccountDetails) {
                        $empAccountDetails->emp_pf_no = $row['pf_no'];
                        $empAccountDetails->created_at = $row['created_on'];
                        $empAccountDetails->updated_at = $row['updated_on'];
                        $empAccountDetails->save();
                    }
                }
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage() . $th->getLine()];
        }
    }

    // Add rec_previous_companies

    public function rec_previous_companies($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['created_at'] = $row['created_on'];
                $row['updated_at'] = $row['updated_on'];
                RecPreviousCompany::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // Add Leave Policy

    public function leave_policies($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                LeavePolicy::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    // Add send_mail_log

    public function send_mail_log($handle)
    {

        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                SendMailLog::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    //Add imp_email_lists
    public function imp_email_lists($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $roleid = get_role_id($row['access_to_role']);
                $row['role_id'] = $roleid ? $roleid : null;

                unset($row['access_to_role']);
                ImpEmailList::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // form16 //

    public function form16($handle)
    {

        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['created_by'] = $row['added_by'];
                $row['created_at'] = date('Y-m-d h:i:s', strtotime($row['created_at']));

                unset($row['added_by']);

                Form16::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    public function emp_wish_mail_log($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['emp_dob'] = empty($row['emp_dob']) || $row['emp_dob'] == 'NULL' ? null : $row['emp_dob'];
                $row['emp_dom'] = empty($row['emp_dom']) || $row['emp_dom'] == 'NULL' ? null : $row['emp_dom'];
                $row['emp_doj'] = empty($row['emp_doj']) || $row['emp_doj'] == 'NULL' ? null : $row['emp_doj'];
                EmpWishMailLog::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    //add data contacted by call logs

    public function contacted_by_call_logs($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                ContactedByCallLog::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // add data district


    public function district($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['id'] = $row['id'];
                District::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }

    //recruitment_forms

    public function recruitment_forms($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['id'] = $row['id'];
                $row['created_at'] = empty($row['add_time']) || $row['add_time'] == 'NULL' ? null : Carbon::parse($row['add_time']);
                $row['gender'] = empty($row['gender']) || $row['gender'] == 'NULL' ? null :  $row['gender'];
                $row['district'] = empty($row['district']) || $row['district'] == 'NULL' ? null :  $row['district'];
                $row['state'] = empty($row['state']) || $row['state'] == 'NULL' ? null :  $row['state'];
                if (empty($row['dob']) || $row['dob'] == 'NULL') {
                    $row['dob'] =  null;
                } else {
                    $dob = Carbon::parse($row['dob']);
                    $row['dob'] = $dob->format('Y-m-d');
                }

                $row['salary'] =   empty($row['salary']) || $row['salary'] == 'NULL' ?  null :  $row['salary'];
                $row['fixed'] =   empty($row['fixed']) || $row['fixed'] == 'NULL' ?  null :  $row['fixed'];
                $row['variable'] =   empty($row['variable']) || $row['variable'] == 'NULL' ?  null :  $row['variable'];
                $row['doj'] =   empty($row['doj']) || $row['doj'] == 'NULL' ?  null :  Carbon::parse($row['doj']);
                $row['finally'] =   empty($row['finally']) || $row['finally'] == 'NULL' ?  null :  $row['finally'];
                $row['read_status'] =   empty($row['read_status']) || $row['read_status'] == 'NULL' ?  null :  $row['read_status'];

                RecruitmentForm::create($row);
            }
            fclose($handle);
            DB::commit();
            return ['success' => true];
        } catch (Throwable $th) {
            DB::rollback();
            return ['error' => true, 'message' => $th->getMessage()];
        }
    }


    // add form_16_fails

    public function form_16_fails($handle)
    {
        $headers = fgetcsv($handle);
        try {
            DB::beginTransaction();
            while (($data = fgetcsv($handle)) !== FALSE) {
                $row = [];
                $row = array_combine($headers, $data);
                $row['created_by'] =  $row['added_by'];
                Form16Failed::create($row);
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
