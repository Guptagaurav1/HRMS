<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
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


Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'login')->name('login');
        Route::post('d-login', 'd_login')->name('department_login');
        Route::post('emp-login', 'emp_login')->name('employee_login');
    });
    Route::get("forgot-password", function () {
        return view("forgot-password");
    })->name("forgot-password");

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
    });
});



Route::middleware('auth')->prefix('hr')->group(function () {
    Route::controller(HrController::class)->group(function () {
        Route::get("/", 'dashboard')->name("hr_dashboard");
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

    Route::controller(DepartmentController::class)->prefix('departments')->group(function (){
        Route::get("/", 'index')->name("departments.index");
        Route::get("/create", 'create')->name("departments.create");
        Route::post("/save", 'save')->name("departments.save");
        Route::get("/edit/{department}", 'edit')->name("departments.edit");
        Route::post("/update/{department}", 'update')->name("departments.update");
        Route::get("/delete/{department}", 'destroy')->name("departments.destroy");
    });

    Route::controller(OrganizationController::class)->prefix('organizations')->group(function (){
        Route::get("/", 'index')->name("organizations.index");
        Route::get("/create", 'create')->name("organizations.create");
        Route::post("/store", 'store')->name("organizations.store");
        Route::get("/edit/{organization}", 'edit')->name("organizations.edit");
        Route::post("/update/{organization}", 'update')->name("organizations.update");
        Route::get("/delete/{organization}", 'destroy')->name("organizations.destroy");
    });

    Route::controller(DesignationController::class)->prefix('designations')->group(function (){
        Route::get("/", 'index')->name("designations.index");
        Route::get("/create", 'create')->name("designations.create");
        Route::post("/store", 'store')->name("designations.store");
        Route::get("/edit/{designation}", 'edit')->name("designations.edit");
        Route::post("/update/{designation}", 'update')->name("designations.update");
        Route::get("/delete/{designation}", 'destroy')->name("designations.destroy");
    });
  
    Route::controller(MasterController::class)->prefix('master')->group(function () {
        Route::get("skill", 'skills')->name("skill");
        Route::get("company-master", 'company_details')->name("company-master");
    });

    Route::controller(TeamController::class)->prefix('teams')->group(function () {
        Route::get("/", 'index')->name("my-team-list");
    });

    Route::controller(HolidayController::class)->prefix('leave')->group(function () {
        Route::get("/", 'index')->name("holiday-list");
        Route::get("request-list", 'leave_requests')->name("applied-request-list");
        Route::get("leave-regularization", 'leave_regularization')->name("leave-regularization");
        Route::post('request-details', 'leave_details');
        Route::get("leave-request-reciept/{id}", 'leave_receipt')->name("leave-request-reciept");
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

    Route::controller(FunctionalRoleController::class)->prefix('functional-role')->group(function (){
        Route::get("/", 'index')->name("functional-role");
        Route::get("/add", 'create')->name("add-functional-role");
        Route::post("/store", 'store')->name("store-functional-role");
        Route::get("/edit/{id}", 'edit')->name("edit-functional-role");
        Route::post("/update/{id}", 'update')->name("update-functional-role");
        Route::get("/delete/{id}", 'destroy')->name("destroy-functional-role");;
    });  
    Route::controller(QualificationController::class)->prefix('qualification')->group(function (){
        Route::get("/", 'index')->name("qualification");
        Route::get("/add", 'create')->name("add-qualification");
        Route::post("/store", 'store')->name("store-qualification");
        Route::get("/edit/{id}", 'edit')->name("edit-qualification");
        Route::post("/update/{id}", 'update')->name("update-qualification");
        Route::post("/delete/{id}", 'destroy')->name("destroy-qualification");
    });    
    Route::controller(BankController::class)->prefix('bank')->group(function (){
        Route::get("/", 'index')->name("bank-details");
        Route::get("/add", 'create')->name("add-bank");
        Route::post("/store", 'store')->name("store-bank");
        Route::post("/deactivate/{id}", 'deactivate')->name('deactivate');
        Route::post("/activate/{id}", 'activate')->name('activate');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::get('d-logout', 'd_logout')->name('department_logout');
    });

    /////////// workorder routes start ///////
    Route::controller(WorkOrderController::class)->group(function (){
        Route::get("work-order-list","index")->name("work-order-list");
        Route::get("get-work-order","getWorkOrder")->name("get-work-order");
        Route::get("add-work-order","create")->name("add-work-order");
        Route::post("store-work-order","store")->name("store-work-order");
        Route::get("edit-work-order/{id}","edit")->name("edit-work-order");
        Route::post("update-work-order/{id}","update")->name("update-work-order");
        Route::get("view-work-order/{id}","show")->name("view-work-order");

        Route::get("organisation-workOrder/{or_id}","organisation_workOrder")->name("organisation-workOrder");
        Route::get("workOrder-details/{workOrder_id}","workOrder_details")->name("workOrder-details");
        Route::post("work-order-report","work_order_report")->name("work-order-report");

    });

    /////////// workorder routes end ///////
  
    Route::controller(HelpdeskController::class)->prefix('helpdesk')->group(function () {
        Route::get('compose-email', 'compose')->name('compose-email');
        Route::post('send-email', 'send_mail')->name('compose');
        Route::get("mail-logs", 'mail_log')->name("email-list");
    });

    Route::controller(SalarySlipController::class)->prefix('salary-slip')->group(function () {
        Route::get('/', 'index')->name("salary-slip");
        Route::get("preview/{id}", 'show_preview')->name("preview-salary-slip");
        Route::post('send-mail/{id}', 'send_mail')->name('salary-slip.sendmail');
        Route::get('employee-details/{salaryid}', 'employee_details')->name("employee-details-salary-retainer");
        Route::post('export', 'export_csv')->name("export-salary");
        Route::get("edit/{id}", 'edit_slip')->name("salary-slip-edit");
        Route::post("update-slip", 'update_slip')->name("salary-slip-update");
        Route::get("print/{id}", 'print_salary_slip')->name("employee-code-retainer");
    });

    Route::controller(AttendanceController::class)->prefix('attendance')->group(function () {
        Route::get('go-to-attendance/{wo_id}', 'index')->name("go-to-attendance");
        Route::post('add-attendance/{wo_id}', 'add_attendance')->name("add-attendance");
        Route::get("wo-sal-attendance", 'wo_sal_attendance')->name("wo-sal-attendance");
        Route::post("wo-sal-calculate", 'wo_sal_calculate')->name("wo-sal-calculate");
        Route::get("wo-generate-salary", 'wo_generate_salary')->name("wo-generate-salary");

        Route::get("upload-attendance", 'upload_bulk_attendance')->name("upload-attendance");
        Route::post("create-attendance", 'create_bulk_attendance')->name("create-attendance");
        Route::get("edit-attendance/{id}", 'edit_attendance')->name("edit-attendance");
        Route::post("update-attendance/{id}", 'update_attendance')->name("update-attendance");
        Route::get("attendance-list", 'attendance_list')->name("attendance-list");
       
    });
    
     
    Route::controller(ProjectController::class)->prefix('project')->group(function () {
        Route::get("/","index")->name("project-list");
        Route::get("projectlist/","projectlist")->name("projectlist");
        Route::get("add-project","create")->name("add-project");
        Route::post("store-project","store")->name("store-project");
        Route::get("edit-project/{id}","edit")->name("edit-project");
        Route::post("update-project/{id}","update")->name("update-project");

        Route::get("project-report","project_report")->name("project-report");
        Route::get("wo-project-report/{project_no}","woReport")->name("wo-project-report");
        Route::get("organisation-project/{or_id}","organisation_project")->name("organisation-project");
        Route::get("project-details/{project_id}","project_details")->name("project-details");

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
        Route::get("/",'index')->name('generate-invoice');
        Route::post("invoice-details",'invoice_details')->name('invoice-details');
        Route::get("invoice-list",'invoice_list')->name('invoice-list');
        Route::get("tax-invoice/{wo}/{month}", 'tax_slip')->name("tax-invoice");
        Route::post("save-tax-slip", 'save_slip')->name("save-tax-slip");
    
        Route::get("biling-structure-list",'biling_structure')->name('biling-structure-list');
        Route::get("add-billing-structure",'add_biling_structure')->name('add-biling-tructure');
        Route::post("create-billing-structure",'create_biling_structure')->name('create-billing-structure');
        Route::get("edit-billing-structure/{id}",'edit_biling_structure')->name('edit-billing-structure');
        Route::post("update-billing-structure/{id}",'update_biling_structure')->name('update-billing-structure');
        
        Route::get("form16-list",'form16')->name('form16');
        Route::get("add-new-form16",'addForm16')->name('add-new-form16');
        Route::post("create-form16",'create')->name('create-form16');
        Route::get("emp-data/{id}",'emp_data')->name('emp-data');
        Route::post("upload-form16",'uploadForm16')->name('upload-form16');

    });

     
    Route::controller(SalaryStructureController::class)->prefix('salary')->group(function(){
        Route::get("salary-list",'index')->name('salary-list');
        Route::get("create-salary",'create')->name('create-salary');
        Route::post("save-salary",'save_salary')->name('save-salary');
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
        
        Route::get("view-letter", 'view_letter')->name("employee.view-letter");
        Route::get("send-letter/{id}", 'send_letter')->name("employee.send-letter");
       
        
    });
    
        
    //tenants
    Route::resource('tenants',TenantController::class);

});



  ////////////////////////// user routes //////////////////////////////////////////////////////////

  Route::middleware('auth')->prefix('admin')->group(function () {
    // Route::post('users/{user}/update-status', [UserController::class, 'updateStatus'])->name('users.update-status');
    Route::controller(UserController::class)->prefix('users')->group(function(){
        Route::post('/{user}/update-status', 'updateStatus')->name('users.update-status');
        Route::get("/", 'index')->name("users");
        Route::get("/create", 'create')->name("add-user");
        Route::post("/store", 'store')->name("store-user");
        Route::get("/edit/{id}", 'edit')->name("edit-user");
        Route::post("/update/{id}", 'update')->name("update-user");
        Route::get("/delete/{id}", 'destroy')->name("delete-user");
    });
    // Route::resource('users',UserController::class);

    Route::controller(RoleController::class)->prefix('manage-roles')->group(function (){
        Route::get("/", 'index')->name("manage-roles");
        Route::get("/create", 'create')->name("add-manage-role");
        Route::post("/store", 'store')->name("store-manage-role");
        Route::get("/edit/{id}", 'edit')->name("edit-manage-role");
        Route::post("/update/{id}", 'update')->name("update-manage-role");
        Route::get("/delete/{id}", 'destroy')->name("delete-manage-role");
    });
    /////////////////////////////end user////////////////////////////////////////////////////////////

});

    Route::get("position-review-dept", function () {
        return view(" hr.position-review-dept");
    })->name("position-review-dept");

    Route::get("credential_log_list", function () {
        return view(" hr.credential_log_list");
    })->name("credential_log_list");

    Route::get("posh-complaint-list", function () {
        return view(" hr.posh-complaint-list");
    })->name("posh-complaint-list");


    Route::get("reimbursement-list", function () {
        return view(" hr.reimbursement-list");
    })->name("reimbursement-list");

   


    Route::get("work-order-salary-sheet", function () {
        return view("hr.work-order-salary-sheet");
    })->name("work-order-salary-sheet");

    

    Route::get("profile-detail-request-list", function () {
        return view("hr.profile-detail-request-list");
    })->name("profile-detail-request-list");

   
    Route::get("modify-profile-request", function () {
        return view("hr.modify-profile-request");
    })->name("modify-profile-request");

    Route::get("add-role", function () {
        return view("hr.add-role");
    })->name("add-role");


    Route::get("employee-month-salary-slip", function () {
        return view("hr.employee-month-salary-slip");
    })->name("employee-month-salary-slip");

    Route::get("recruitment-plan-page-summary", function () {
        return view("hr.recruitment-plan-page-summary");
    })->name("recruitment-plan-page-summary");

    Route::get("edit-salary", function () {
        return view("hr.edit-salary");
    })->name("edit-salary");

 
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

    Route::get("add-company-master", function () {
        return view("hr.add-company-master");
    })->name("add-company-master");

    
 

Route::middleware('employee')->prefix('employee')->group(function () {
    Route::get('/', function(){
        return view('employee.dashboard');
    })->name('employee_dashboard');

    Route::get("employee-compose-email", function () {
        return view("employee.employee-compose-email");
    })->name("employee-compose-email");

    Route::get("employee-holiday-list", function () {
        return view("employee.employee-holiday-list");
    })->name("employee-holiday-list");

    Route::get("employee-apply-leave-request", function () {
        return view("employee.employee-apply-leave-request");
    })->name("employee-apply-leave-request");

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

    Route::get("employee-applied-request-list", function () {
        return view("employee.employee-applied-request-list");
    })->name("employee-applied-request-list");

    Route::get("leave-taken", function () {
        return view("employee.leave-taken");
    })->name("leave-taken");

    Route::get("employee-users-details", function () {
        return view("employee.employee-users-details");
    })->name("employee-users-details");

    Route::get("reiembursement-list-employee", function () {
        return view("employee.reiembursement-list-employee");
    })->name("reiembursement-list-employee");

    Route::get("employee-salary-slip", function () {
        return view("employee.employee-salary-slip");
    })->name("employee-salary-slip");
});

// $namedRoutes = collect(Route::getRoutes())->filter(function ($route) {
//     return $route->getName() !== null;
// })->map(function ($route) {
//     return $route->getName();
// });

// dd($namedRoutes);

