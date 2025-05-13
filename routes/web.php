<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\CommonDataImportController;
use App\Http\Controllers\hr\HrController;

use App\Http\Controllers\hr\UserController;
use App\Http\Controllers\master\DepartmentController;
use App\Http\Controllers\master\SkillController;
use App\Http\Controllers\master\FunctionalRoleController;

use App\Http\Controllers\hr\RoleController;
use App\Http\Controllers\master\QualificationController;
use App\Http\Controllers\master\BankController;
use App\Http\Controllers\master\OrganizationController;
use App\Http\Controllers\master\DesignationController;

use App\Http\Controllers\hr\TeamController;
use App\Http\Controllers\hr\HolidayController;
use App\Http\Controllers\hr\HelpdeskController;

use App\Http\Controllers\hr\WorkOrderController;
use App\Http\Controllers\hr\SalarySlipController;
use App\Http\Controllers\hr\AttendanceController;

use App\Http\Controllers\hr\ProjectController;

use App\Http\Controllers\hr\MailLogController;
use App\Http\Controllers\hr\ResponseLogController;
use App\Http\Controllers\hr\RecruitmentController;

use App\Http\Controllers\hr\InvoiceBillingController;
use App\Http\Controllers\hr\SalaryStructureController;

use App\Http\Controllers\hr\EventController;
use App\Http\Controllers\hr\ReimbursementController;
use App\Http\Controllers\hr\PoshController;
use App\Http\Controllers\hr\EmployeeController;
// Tenant Controller

use App\Http\Controllers\TenantController;
use App\Http\Controllers\hr\ProfileController;
use App\Http\Controllers\hr\LeaveController;

use App\Http\Controllers\vms\VendorController;
use App\Http\Controllers\vms\ClientController;
use App\Http\Controllers\master\CompanyController;
use App\Http\Controllers\master\HolidayController as MasterHolidayController;
use App\Http\Controllers\master\LeavePolicyController;

// Define Employee Controllers
use App\Http\Controllers\employee\ProfileController as EmployeeProfileController;
use App\Http\Controllers\employee\EmployeeLeaveController;
use App\Http\Controllers\employee\EmployeeDetailController;

use App\Http\Controllers\sales\SalesController;
use App\Http\Controllers\sales\ClientController as SalesClientController;
use App\Http\Controllers\sales\ProjectController as SalesProjectController;
use App\Http\Controllers\sales\LeadController as SalesLeadController;

use App\Http\Controllers\it\ItController as ItHeadController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where yTou can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/testuser', function () {
    return view('user-details-multistep');
});

// External users routes.
Route::middleware('guest')->group(function () {

    Route::get('import-data', [CommonDataImportController::class, 'import'])->name('import-data');
    Route::post('import-data-save', [CommonDataImportController::class, 'importDataSave'])->name('importDataSave');

    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('d-login', 'd_login')->name('department_login');
        Route::post('emp-login', 'emp_login')->name('employee_login');
        Route::get("forgot-password", 'forget_password')->name("guest.forgot-password");
        Route::post("send-reset-link", 'send_reset_link')->name("guest.send-reset-link");
        Route::get("password-reset-form/{token}", 'reset_password')->name("guest.reset-password-form");
        Route::post('reset-password', 'reset_password_action')->name("guest.reset-password");
    });

    Route::controller(RecruitmentController::class)->prefix('guest')->group(function () {
        Route::get('personal-details/{id}', 'personal_details')->name('guest.personal_details');
        Route::get('acceptance-form/{id}', 'show_acceptance_form')->name('guest.acceptance_form');
        Route::post('store-personal-details', 'save_personal_details');
        Route::post('store-address-details', 'save_address_details');
        Route::post('store-bank-details', 'save_bank_details');
        Route::post('store-education-details', 'save_education_details');
        Route::post('store-company-details', 'save_company_details');
        Route::post('store-esi-details', 'save_esi_details');
        Route::post('store-nominee-details', 'save_nominee_details');
        Route::post('offer-accepted', 'offer_accepted')->name('guest.offer_accepted');
        Route::get('print-hr-form/{id}', 'print_hr_form')->name('guest.print_hr_form');
        Route::get('recruitment-form/{id}/{ref}/{send_mail_id}', 'recruitment_form')->name('guest.recruitment_form');
        Route::post('submit-details', 'submit_details');
        Route::post("cities", "get_cities");
    });
});


Route::middleware('page.permission')->group(function () {

    // Both employee and department users routes.

    Route::middleware('all')->prefix('user')->group(function () {
        Route::controller(HelpdeskController::class)->prefix('helpdesk')->group(function () {
            Route::get('compose-email', 'compose')->name('compose-email');
            Route::post('send-email', 'send_mail')->name('compose');
            Route::get("mail-logs", 'mail_log')->name("email-list");
        });
        Route::controller(HolidayController::class)->prefix('leave')->group(function () {
            Route::get("holidays", 'index')->name("holiday-list");
            Route::get("request-list", 'leave_requests')->name("applied-request-list");
            Route::post('request-details', 'leave_details');
            Route::get("leave-request-reciept/{id}", 'leave_receipt')->name("leave-request-reciept");
            Route::post('leave-response', 'leave_response');
        });
        Route::controller(SalarySlipController::class)->prefix('salary-slip')->group(function () {
            Route::get("preview/{id}", 'show_preview')->name("preview-salary-slip");
        });

        Route::controller(LeaveController::class)->prefix('leaves')->group(function () {
            Route::get('emp-leaves', 'index')->name("emp-leaves");
        });

        Route::controller(AuthController::class)->group(function () {
            Route::get("change-password", 'change_password')->name("user.change-password");
            Route::post("update-password", 'update_password')->name("user.update-password");
            Route::get('d-logout', 'd_logout')->name('department_logout');
        });
    });

    // Department users routes.

    Route::middleware('auth')->prefix('hr')->group(function () {
        Route::controller(HrController::class)->group(function () {
            Route::get("/", 'dashboard')->name("hr_dashboard");

            // send mail wishes 
            Route::get("/birthday-wishes-mail-template", 'templateBirthday')->name("sendBirthdayMail");
            Route::post("/birthday-wishes-mail", 'sendBirthdayMail')->name("sendBirthdayMail");
            Route::post("/anniversary-wishes-mail", 'sendMarriageAnniversaryMail')->name("sendMarriageAnniversaryMail");
            Route::post("/work-anniversary-wishes-mail", 'sendWorkAnniversaryMail')->name("sendWorkAnniversaryMail");

            Route::post("/leave-details/{id}", 'leaveDetails')->name("leaveDetails");
            Route::get("/leave-details-status/{id}", 'leaveDetailsStatus')->name("leaveDetailsStatus");
        });

        // Masters
        // ----------------------------------------

        Route::controller(SkillController::class)->prefix('skills')->group(function () {
            Route::get("/", 'index')->name("skills.index");
            Route::get("/create", 'create')->name("skills.create");
            Route::post("/save", 'save')->name("skills.save");
            Route::get("/edit/{skill}", 'edit')->name("skills.edit");
            Route::post("/update/{skill}", 'update')->name("skills.update");
            Route::get("/destroy/{id}", 'destroy')->name("skills.destroy");
        });

        Route::controller(DepartmentController::class)->prefix('departments')->group(function () {
            Route::get("/", 'index')->name("departments.index");
            Route::get("/create", 'create')->name("departments.create");
            Route::post("/save", 'save')->name("departments.save");
            Route::get("/edit/{department}", 'edit')->name("departments.edit");
            Route::post("/update/{department}", 'update')->name("departments.update");
            Route::get("/delete/{department}", 'destroy')->name("departments.destroy");
            Route::post("create-new", 'create_new');
            Route::post("get-departments", 'get_departments');
        });

        Route::controller(OrganizationController::class)->prefix('organizations')->group(function () {
            Route::get("/", 'index')->name("organizations.index");
            Route::get("/create", 'create')->name("organizations.create");
            Route::post("/store", 'store')->name("organizations.store");
            Route::get("/show/{organization}", 'show')->name("organizations.show");
            Route::get("/edit/{organization}", 'edit')->name("organizations.edit");
            Route::post("/update/{organization}", 'update')->name("organizations.update");
            Route::get("/delete/{organization}", 'destroy')->name("organizations.destroy");

            Route::post("/get-city/{id}", 'GetCity')->name("organizations.GetCity");
        });

        Route::controller(DesignationController::class)->prefix('designations')->group(function () {
            Route::get("/", 'index')->name("designations.index");
            Route::get("/create", 'create')->name("designations.create");
            Route::post("/store", 'store')->name("designations.store");
            Route::get("/edit/{designation}", 'edit')->name("designations.edit");
            Route::post("/update/{designation}", 'update')->name("designations.update");
            Route::get("/delete/{designation}", 'destroy')->name("designations.destroy");
            Route::post("create-new", 'create_new');
            Route::post("get-designations", 'get_designations');
        });

        Route::controller(MasterController::class)->prefix('master')->group(function () {
            Route::get("skill", 'skills')->name("skill");
            Route::get("company-master", 'company_details')->name("company-master");

            Route::controller(CompanyController::class)->prefix('company')->group(function () {
                Route::get("/", 'index')->name("company.list");
                Route::get("create", 'create')->name("company.create");
                Route::post("store", 'store')->name("company.store");
                Route::get("view/{id}", 'view')->name("company.view");
            });
        });

        Route::controller(MasterHolidayController::class)->prefix('holiday')->group(function () {
            Route::get("/", 'index')->name("holiday.list");
            Route::post("store", 'store');
            Route::post("edit", 'edit');
            Route::post("update", 'update');
            Route::post("deactive", 'deactive');
            Route::post("active", 'active');
        });

        Route::controller(LeavePolicyController::class)->prefix('leave-policy')->group(function () {
            Route::get("/", 'index')->name("leave-policy.list");
            Route::post("edit", 'edit');
            Route::post("update", 'update');
            Route::post("deactive", 'deactive');
            Route::post("active", 'active');
        });

        Route::controller(ProfileController::class)->prefix('profile')->group(function () {
            Route::get("/", 'profile')->name("profile.admin-profile");
        });

        Route::controller(TeamController::class)->prefix('teams')->group(function () {
            Route::get("/", 'index')->name("my-team-list");
        });

        Route::controller(HolidayController::class)->prefix('leave')->group(function () {
            // Route::get("/", 'index')->name("holiday-list");
            Route::get("leave-regularization", 'leave_regularization')->name("leave-regularization");
            Route::get("employee-details/{empid}", 'emp_details')->name("employee-details");
            Route::post("send_regularization", 'send_mail');
        });

        Route::controller(RecruitmentController::class)->prefix('recruitment')->group(function () {
            Route::get("position-request", "position_request")->name("position-request");
            Route::post("cities", "get_cities");
            Route::post('position-request', 'store_position')->name('save-position-request');
            Route::get("recruitment-report", 'recruitment_report')->name("recruitment-report");
            Route::get("preview_description/{id}", 'prev_descr')->name("preview-executive-description");
            Route::post("send-jd", 'send_jd_mail');
            Route::post("send-bulk-jd", 'send_bulk_mail');
            Route::get("position-report/{id}", 'position_contacts')->name("show-assign-work-log");
            Route::get("preview-job-description/{id}", 'preview_jd')->name("preview-job-description");
            Route::get("applicant-detail-summary/{rec_id}/{position?}", 'applicant_detail')->name("applicant-recruitment-details-summary");
            Route::post('update-email', 'update_email');
            Route::post('update-salary', 'update_salary');
            Route::post('update-doj', 'update_doj');
            Route::post('update-location', 'update_location');
            Route::post('update-work-scope', 'update_work_scope');
            Route::post('shortlist-first', 'shortlist_first_stage');
            // Route::post('reject-first', 'reject_first_stage');
            Route::post('send-interview-details', 'send_interview_details');
            Route::post('remark-first', 'remark_first');
            Route::post('remark-second', 'remark_second');
            Route::post('store-third', 'save_third_stage');
            Route::post('send-offer-letter', 'send_offer_letter');
            Route::post('joined', 'store_join_status');
            Route::post('backout', 'backout_candidate');
            Route::get("verify-documents/{id}/{position?}", 'verify_document')->name("verify-documents");
            Route::post("check-documents", 'check_verify');
            Route::post("complete-joining-formalities", 'complete_joining_formalities');
            Route::post("preview-offer-letter", 'preview_offer_letter');
            Route::get("jd-request/{id?}", 'jd_request')->name("jd-request");
            Route::post("send-jd-request", 'send_jd_request')->name("send-jd-request");
            Route::post("get-position-candidates", 'position_candidates');
            Route::get("request-list", 'request_lists')->name("user-request-list");
            Route::get("addnew-candidate", 'add_new_candidate')->name("addnew-candidate");
            Route::get("list", 'recruitment_list')->name("recruitment-list");
            Route::post("save-candidate", 'store')->name("recruitment.store");
            Route::post("export-recruitment", 'export_csv')->name("recruitment.export_csv");
            Route::get("recruitment-plan", 'show_recruitment_list')->name("recruitment-plan");
            Route::get("position-update/{id}", 'update_position_request')->name("update_position_request");
            Route::post("update-position", 'update_position')->name("recruitment.update_position");
            Route::get("addcontact-form", 'contact_form')->name("addcontact-form");
            Route::post("submit-call-detail", 'store_call_detail')->name("recruitment.store_call_detail");
            Route::get("call-logs", 'call_logs')->name("recruitment.call_logs");
            Route::get("edit-call-log/{id}", 'edit_call_log')->name("recruitment.edit-call_log");
            Route::post("update-call-log", 'update_call_log')->name("recruitment.update-call_log");
            Route::post("export-call-log", 'export_call_log')->name("recruitment.export_call_log");
            Route::get("offerlettershared-list", 'offer_letter_shared_list')->name("recruitment.offerlettershared-list");
        });

        Route::controller(FunctionalRoleController::class)->prefix('functional-role')->group(function () {
            Route::get("/", 'index')->name("functional-role");
            Route::get("/add", 'create')->name("add-functional-role");
            Route::post("/store", 'store')->name("store-functional-role");
            Route::get("/edit/{id}", 'edit')->name("edit-functional-role");
            Route::post("/update/{id}", 'update')->name("update-functional-role");
            Route::post("/delete/{id}", 'destroy')->name("destroy-functional-role");
        });
        Route::controller(QualificationController::class)->prefix('qualification')->group(function () {
            Route::get("/", 'index')->name("qualification");
            Route::get("/add", 'create')->name("add-qualification");
            Route::post("/store", 'store')->name("store-qualification");
            Route::get("/edit/{id}", 'edit')->name("edit-qualification");
            Route::post("/update/{id}", 'update')->name("update-qualification");
            Route::post("/delete/{id}", 'destroy')->name("destroy-qualification");
        });
        Route::controller(BankController::class)->prefix('bank')->group(function () {
            Route::get("/", 'index')->name("bank-details");
            Route::get("/add", 'create')->name("add-bank");
            Route::post("/store", 'store')->name("store-bank");
            Route::post("/deactivate/{id}", 'deactivate')->name('deactivate');
            Route::post("/activate/{id}", 'activate')->name('activate');
        });

        /////////// workorder routes start ///////
        Route::controller(WorkOrderController::class)->group(function () {
            Route::get("work-order-list", "index")->name("work-order-list");
            Route::get("get-work-order", "getWorkOrder")->name("get-work-order");
            Route::get("add-work-order/{project_id?}", "create")->name("add-work-order");
            Route::post("store-work-order", "store")->name("store-work-order");
            Route::get("edit-work-order/{id}", "edit")->name("edit-work-order");
            Route::post("update-work-order/{id}", "update")->name("update-work-order");
            Route::get("view-work-order/{id}", "show")->name("view-work-order");

            Route::get("organisation-workOrder/{or_id}", "organisation_workOrder")->name("organisation-workOrder");
            Route::get("workOrder-details/{workOrder_id}", "workOrder_details")->name("workOrder-details");
            Route::get("work-order-report/{wo_id?}", "work_order_report")->name("work-order-report");
            Route::post('export', 'export_csv')->name("export-work-order");
            Route::post('save-report', 'save_wo_report')->name("save-report");
            Route::get('report-log', 'report_log')->name("report-log");
            Route::get('complete-salary-sheet', 'salary_sheet')->name("salary-sheet");
            Route::post('send-report-mail', 'send_report_mail')->name("send-report-mail");
            Route::post('get-exist-wo', 'get_exist_wo')->name("get-exist-wo");
            Route::post('work-order/check-salary', 'check_salary');
            Route::post('download-salary-sheet', 'download_salary_sheet')->name('download-salary-sheet');
        });

        /////////// workorder routes end ///////

        Route::controller(SalarySlipController::class)->prefix('salary-slip')->group(function () {
            Route::get('/', 'index')->name("salary-slip");
            Route::post('send-mail/{id}', 'send_mail')->name('salary-slip.sendmail');
            Route::get('employee-details/{salaryid}', 'employee_details')->name("employee-details-salary-retainer");
            Route::post('export', 'export_csv')->name("export_csv");
            Route::get("edit/{id}", 'edit_slip')->name("salary-slip-edit");
            Route::post("update-slip", 'update_slip')->name("salary-slip-update");
            Route::get("print/{id}", 'print_salary_slip')->name("employee-code-retainer");
        });

        Route::controller(AttendanceController::class)->prefix('attendance')->group(function () {
            Route::get('go-to-attendance/{wo_id}', 'index')->name("go-to-attendance");
            Route::post('add-attendance/{wo_id}', 'add_attendance')->name("add-attendance");
            Route::get("wo-sal-attendance/{work_order?}/{month?}", 'wo_sal_attendance')->name("wo-sal-attendance");
            Route::post("wo-sal-calculate", 'wo_sal_calculate')->name("wo-sal-calculate");
            Route::get("wo-generate-salary", 'wo_generate_salary')->name("wo-generate-salary");

            Route::get("upload-attendance", 'upload_bulk_attendance')->name("upload-attendance");
            Route::post("create-attendance", 'create_bulk_attendance')->name("create-attendance");
            Route::get("edit-attendance/{id}", 'edit_attendance')->name("edit-attendance");
            Route::post("update-attendance/{id}", 'update_attendance')->name("update-attendance");
            Route::get("attendance-list", 'attendance_list')->name("attendance-list");
        });


        Route::controller(ProjectController::class)->prefix('project')->group(function () {
            Route::get("/", "index")->name("project-list");
            Route::get("projectlist/", "projectlist")->name("projectlist");
            Route::get("add-project", "create")->name("add-project");
            Route::post("store-project", "store")->name("store-project");
            Route::get("edit-project/{id}", "edit")->name("edit-project");
            Route::post("update-project/{id}", "update")->name("update-project");

            Route::get("project-report", "project_report")->name("project-report");
            Route::get("wo-project-report/{project_no}", "woReport")->name("wo-project-report");
            Route::get("organisation-project/{or_id}", "organisation_project")->name("organisation-project");
            Route::get("project-details/{project_id}", "project_details")->name("project-details");
        });

        Route::controller(MailLogController::class)->prefix('logs')->group(function () {
            Route::get('anniversary-wish-log', 'anniversary_logs')->name("anniversary-wish-log");
            Route::get("birthday-wish-log", 'birthday_logs')->name("birthday-wish-log");
            Route::get("work-anniversary-wish-log", 'work_anniversary_logs')->name("work-anniversary-wish-log");
        });
        Route::controller(ResponseLogController::class)->prefix('response-logs')->group(function () {
            Route::get("employee-profile-response-log", 'profile_change_log')->name("employee-profile-response-log");
            Route::get("recruiter-response-log", 'detail_change_log')->name("recruiter-response-log");
        });



        Route::controller(InvoiceBillingController::class)->prefix('invoice-billling')->group(function () {
            Route::get("/", 'index')->name('generate-invoice');
            Route::post("invoice-details", 'invoice_details')->name('invoice-details');
            Route::get("invoice-list", 'invoice_list')->name('invoice-list');
            Route::get("tax-invoice/{wo}/{month}", 'tax_slip')->name("tax-invoice");
            Route::post("save-tax-slip", 'save_slip')->name("save-tax-slip");

            Route::get("biling-structure-list", 'biling_structure')->name('biling-structure-list');
            Route::get("add-billing-structure", 'add_biling_structure')->name('add-biling-tructure');
            Route::post("create-billing-structure", 'create_biling_structure')->name('create-billing-structure');
            Route::get("edit-billing-structure/{id}", 'edit_biling_structure')->name('edit-billing-structure');
            Route::post("update-billing-structure/{id}", 'update_biling_structure')->name('update-billing-structure');

            Route::get("form16-list", 'form16')->name('form16');
            Route::get("add-new-form16", 'addForm16')->name('add-new-form16');
            Route::post("create-form16", 'create')->name('create-form16');
            Route::post("emp-data/{id}", 'emp_data')->name('emp-data');
            Route::post("upload-form16", 'uploadForm16')->name('upload-form16');
        });

        Route::controller(SalaryStructureController::class)->prefix('salary')->group(function () {
            Route::get("salary-list", 'index')->name('salary-list');
            Route::get("create-salary", 'create')->name('create-salary');
            Route::post("save-salary", 'save_salary')->name('save-salary');
            Route::get("edit-salary/{id}", 'edit_salary')->name('edit-salary');
            Route::post("update-salary/{id}", 'update_salary')->name('update-salary');
            Route::get("/delete/{id}", 'destroy')->name("delete-salary");
            Route::get("/export-salary", 'export_csv')->name("export-salary");
        });

        Route::controller(EventController::class)->prefix('events')->group(function () {
            Route::get("birthday-list", 'birthday_list')->name("events.birthday-list");
            Route::get("marriage-anniversary-list", "anniversary_list")->name("events.marriage-anniversary-list");
            Route::get("work-anniversary-list", "work_anniversary_list")->name("events.work-anniversary-list");
            Route::get("birthday-template", 'birthday_template')->name("events.birthday-template");
            Route::post("send-birthday-mail", 'send_birthday_mail');
            Route::get("marriage-anniversary-template", 'marriage_template')->name("events.marriage-anniversary-template");
            Route::get("work-anniversary-template", 'work_anniversary_template')->name("events.work-anniversary-template");
            Route::post("send-anniversary-mail", 'send_anniversary_mail');
        });

        Route::controller(ReimbursementController::class)->prefix('reimbursement')->group(function () {
            Route::get("/", 'index')->name("reimbursement.list");
            Route::get('view-reciept/{id}', 'view_receipt')->name("reimbursement.view-reciept");
            Route::get("view-more-attachment/{id}", 'view_attachment')->name("reimbursement.view-more-attachment");
            Route::post("save-response", 'store_response');
        });

        Route::controller(EmployeeController::class)->prefix('employee')->group(function () {
            Route::get('/create/{recruitment_id?}', 'create')->name('employee.add-employee');
            Route::post('add_emp_details', 'save_emp_details');
            Route::post('add_personal_details', 'save_personal_details');
            Route::post('add_address_details', 'save_address_details');
            Route::post('add_bank_details', 'save_bank_details');
            Route::post('add_education_details', 'save_education_details');
            Route::post('add_id_details', 'save_id_details');
            Route::post('add_experience_details', 'save_experience_details');
            Route::post('bulk-upload', 'bulk_upload')->name('employee.bulk_upload');
            Route::get("list", 'show_employees')->name("employee.employee-list");
            Route::get("edit/{id}", 'edit')->name('employee.edit-employee');
            Route::post('update-emp-details', 'update_emp_details')->name('employee.update-emp-details');

            Route::get("view-letter/{id}", 'view_letter')->name("employee.view-letter");
            Route::get("send-letter/{id}", 'send_letter')->name("employee.send-letter");
            Route::post("send-credentials", 'send_credentials');
            Route::post("send-appointment-letter", 'send_appointment_letter');
            Route::post("export", 'export_employees')->name('employee.export');
            Route::post('get-reporting-managers', 'get_reporting_managers');
            Route::get("credential_log_list", 'sent_credential_logs')->name("employee.sent-credentials-logs");
            Route::post('preview-csv', 'preview_csv');
            Route::post('validate-emp-code', 'validate_emp_code');
            Route::post('validate-emp-email', 'validate_emp_email');
        });


        Route::controller(PoshController::class)->prefix('posh')->group(function () {
            Route::get('posh-complaint-list', 'complaint_list')->name("posh.complaint-list");
            Route::post('view-complaint', 'complaint_details');
            Route::post('complaint-response', 'response');
        });







        //tenants
        Route::resource('tenants', TenantController::class);
    });

    // HR operations pages.
    Route::middleware('auth')->prefix('hr-operations')->group(function () {
        Route::controller(HrController::class)->group(function () {
            Route::get("/", 'hr_operation_dashboard')->name("hr_operations_dashboard");
        });
    });

    // HR executive pages.
    Route::middleware('auth')->prefix('hr-executive')->group(function () {
        Route::controller(HrController::class)->group(function () {
            Route::get("/", 'hr_executive_dashboard')->name("hr-executive.dashboard");
        });
    });

    // IT Head pages.
    Route::middleware('auth')->prefix('it-head')->group(function () {
        Route::controller(ItHeadController::class)->group(function () {
            Route::get("/", 'dashboard')->name("it-head.dashboard");
        });
    });

    // Sales routes
    Route::middleware('auth')->prefix('sales')->group(function () {
        Route::controller(SalesController::class)->group(function () {
            Route::get('dashboard', 'manager_dashboard')->name('sales.manager_dashboard');
        });
        Route::controller(SalesClientController::class)->prefix('clients')->group(function () {
            Route::get("add", 'add')->name("sales-clients.add");
            Route::post("store", 'store')->name("sales-clients.store");
        Route::get("/", 'index')->name("sales-clients.list");
            Route::get("edit/{id}", 'edit')->name("sales-clients.edit");
            Route::post("get-clients", "get_clients");
            Route::post("update-client", "update")->name("sales-clients.update");
            Route::get("view/{id}", 'view_details')->name("sales-clients.view");
        });
        Route::controller(SalesProjectController::class)->prefix('projects')->group(function () {
            Route::get("add/{id?}", 'add')->name("sales-projects.add");
            Route::get("/", 'index')->name("sales-projects.list");
            Route::get("edit/{id}", 'edit')->name("sales-projects.edit");
            Route::get("view/{id}", 'read')->name("sales-projects.view");
            Route::post("store", 'store')->name("sales-projects.store");
            Route::post("update-project", "update")->name("sales-projects.update");
        });
    });

    // VMS routes
    Route::middleware('auth')->prefix('vms')->group(function () {
        Route::controller(VendorController::class)->prefix('vendors')->group(function () {
            Route::get("/", "index")->name("vendors.index");
            Route::get("create", 'create')->name("vendors.create");
            Route::post("save", 'save')->name("vendors.save");
            Route::get("edit/{id}", 'edit')->name("vendors.edit");
            Route::post("update", 'update')->name("vendors.update");
            Route::post("delete", 'destroy');
        });

        Route::controller(ClientController::class)->prefix('clients')->group(function () {
            Route::get("/", "index")->name("clients.index");
            Route::get("create", 'create')->name("clients.create");
            Route::post("save", 'save')->name("clients.save");
            Route::get("edit/{id}", 'edit')->name("clients.edit");
            Route::post("update", 'update')->name("clients.update");
            Route::post("delete", 'destroy');
        });
    });

    ////////////////////////// user routes //////////////////////////////////////////////////////////

    Route::middleware('auth')->prefix('admin')->group(function () {
        // Route::post('users/{user}/update-status', [UserController::class, 'updateStatus'])->name('users.update-status');
        Route::controller(UserController::class)->prefix('users')->group(function () {
            Route::post('/{user}/update-status', 'updateStatus')->name('users.update-status');
            Route::get("/", 'index')->name("users");
            Route::get("/create", 'create')->name("add-user");
            Route::post("/store", 'store')->name("store-user");
            Route::get("/edit/{id}", 'edit')->name("edit-user");
            Route::post("/update/{id}", 'update')->name("update-user");
            Route::get("/delete/{id}", 'destroy')->name("delete-user");
        });
        // Route::resource('users',UserController::class);

        Route::controller(RoleController::class)->prefix('manage-roles')->group(function () {
            Route::get("/", 'index')->name("manage-roles");
            Route::get("/create", 'create')->name("add-manage-role");
            Route::post("/store", 'store')->name("store-manage-role");
            Route::get("/edit/{id}", 'edit')->name("edit-manage-role");
            Route::post("/update/{id}", 'update')->name("update-manage-role");
            Route::get("/delete/{id}", 'destroy')->name("delete-manage-role");
        });
        /////////////////////////////end user////////////////////////////////////////////////////////////

    });


    // Employee Routes
    Route::middleware('employee')->prefix('employee')->group(function () {
        Route::get('/', [EmployeeProfileController::class, 'dashboard'])->name('employee.dashboard');

        Route::controller(EmployeeProfileController::class)->prefix('profile')->group(function () {
            Route::get("myprofile", 'show_profile')->name("employee.myprofile");
            Route::post("add-certificate", 'save_certificates');
            Route::post("update-image", 'update_image');
            Route::get('modify-profile', 'profile_update_request')->name("profile.modify-profile-request");
            Route::post('submit-profile-request', 'submit_update_request')->name("profile.submit-profile-request");
            Route::get("profile-update-request-list", 'request_list')->name("profile.profile-detail-request-list");
        });

        Route::controller(EmployeeLeaveController::class)->prefix('leave')->group(function () {
            Route::get("leave-request", 'leave_request')->name("leave.leave_request");
            Route::post("store-request", 'store_leave_request')->name("leave.store_request");
            Route::get("leave-taken", 'leave_taken')->name("leave.leave-taken");
            Route::get("modify-leave/{id}", 'edit_leave')->name("leave.modify_leave");
            Route::post("update-request", 'update_leave_request')->name("leave.update_request");
        });

        Route::controller(EmployeeDetailController::class)->prefix('details')->group(function () {
            Route::get("salary-slip", 'salary_slip')->name("details.employee-salary-slip");
        });

        // Route::get("employee-compose-email", function () {
        //     return view("employee.employee-compose-email");
        // })->name("employee-compose-email");

        // Route::get("employee-holiday-list", function () {
        //     return view("employee.employee-holiday-list");
        // })->name("employee-holiday-list");

        Route::get("employee-reimbursement-list", function () {
            return view("employee.employee-reimbursement-list");
        })->name("employee-reimbursement-list");

        Route::get("employee-modify-profile-request", function () {
            return view("employee.employee-modify-profile-request");
        })->name("employee-modify-profile-request");


        Route::get("employee-profile-detail-request-list", function () {
            return view("employee.employee-profile-detail-request-list");
        })->name("employee-profile-detail-request-list");

        Route::get("create-reimbursement", function () {
            return view("employee.create-reimbursement");
        })->name("create-reimbursement");


        Route::get("reiembursement-list-employee", function () {
            return view("employee.reiembursement-list-employee");
        })->name("reiembursement-list-employee");
    });

    Route::controller(SalesLeadController::class)->prefix('leads')->group(function () {
        Route::get("/", 'index')->name("leads.list");
        Route::post("create", 'create')->name("projectLeads.create");
        Route::get("create", 'create')->name("leads.create");
        Route::post("store", 'store')->name("leads.store");
        Route::post("store-lead-followup", 'storeLeadFollowUp')->name("leads.storeLeadFollowUp");
        Route::get("show/{id}", 'show')->name("leads.show");
        Route::get("edit/{id}", 'edit')->name("leads.edit");
        Route::put("update/{id}", 'update')->name("leads.update");
        Route::put("update-lead-status/{id}", 'updateLeadStatus')->name("leads.updateLeadStatus");
        Route::get("crm-lead-follow-up/{id}", 'crmLeadFollowUp')->name("leads.crmLeadFollowUp");
        Route::get("delete-lead-attachment/{id}", 'removeLeadAttachment')->name("leads.removeLeadAttachment");
        Route::get("delete-lead-spoc/{id}", 'deleteLeadSpoc')->name("leads.deleteLeadSpoc");

    });
});


Route::get("position-review-dept", function () {
    return view(" hr.position-review-dept");
})->name("position-review-dept");

Route::get("reimbursement-list", function () {
    return view("hr.reimbursement-list");
})->name("reimbursement-list");


Route::get("work-order-salary-sheet", function () {
    return view("hr.work-order-salary-sheet");
})->name("work-order-salary-sheet");

Route::get("add-role", function () {
    return view("hr.add-role");
})->name("add-role");


Route::get("employee-month-salary-slip", function () {
    return view("hr.employee-month-salary-slip");
})->name("employee-month-salary-slip");

Route::get("recruitment-plan-page-summary", function () {
    return view("hr.recruitment-plan-page-summary");
})->name("recruitment-plan-page-summary");


Route::get("invoice-encloser", function () {
    return view("hr.invoice-encloser");
})->name("invoice-encloser");

// Route::get("view-more-attachment", function () {
//     return view("hr.view-more-attachment");
// })->name("view-more-attachment");


Route::get("birthday-template", function () {
    return view("hr.birthday-template");
})->name("birthday-template");

Route::get("marriage-anniversary-list-template", function () {
    return view("hr.marriage-anniversary-list-template");
})->name("marriage-anniversary-list-template");

Route::get("work-anniversary-list-template", function () {
    return view("hr.work-anniversary-list-template");
})->name("work-anniversary-list-template");

Route::get("company-master-edit", function () {
    return view("hr.company-master-edit");
})->name("company-master-edit");


Route::get("acceptance-form", function () {
    return view("hr.acceptance-form");
})->name("acceptance-form");


Route::get("temp-profile", function () {
    return view("hr.temp-profile");
})->name("temp-profile");


// Sales manager Routes

// Route::get("add-lead", function () {
//     return view("hr.add-lead");
// })->name("add-lead");

// Route::get("lead-list", function () {
//     return view("hr.lead-list");
// })->name("lead-list");


Route::get("add-tender", function () {
    return view("hr.add-tender");
})->name("add-tender");

Route::get("tender-list", function () {
    return view("hr.tender-list");
})->name("tender-list");

Route::get("view-tender", function () {
    return view("hr.view-tender");
})->name("view-tender");

Route::get("update-tender", function () {
    return view("hr.update-tender");
})->name("update-tender");

// Route::get("crm-lead-follow-up", function () {
//     return view("hr.crm-lead-follow-up");
// })->name("crm-lead-follow-up");

Route::get("view-crm-details", function () {
    return view("hr.view-crm-details");
})->name("view-crm-details");



// $namedRoutes = collect(Route::getRoutes())->filter(function ($route) {
//     return $route->getName() !== null;
// })->map(function ($route) {
//     return $route->getName();
// });

// dd($namedRoutes);
