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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('d-login', 'd_login')->name('department_login');
    Route::post('emp-login', 'emp_login')->name('employee_login');
    Route::get('d-logout', 'd_logout')->name('department_logout');
});

Route::middleware('auth')->prefix('hr')->group(function () {

    Route::controller(HrController::class)->group(function () {
        Route::get("/", 'dashboard')->name("hr_dashboard");
    });

    // Route::controller(MasterController::class)->prefix('master')->group(function () {
    //     Route::get("skill", 'skills')->name("skill");
    // });


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

    });
  
    Route::controller(MasterController::class)->prefix('master')->group(function () {
        Route::get("skill", 'skills')->name("skill");
        Route::get("company-master", 'company_details')->name("company-master");
    });
























    



    // end masters
// --------------------------------

    ////////////////////////// user routes //////////////////////////////////////////////////////////


    Route::post('users/{user}/update-status', [UserController::class, 'updateStatus'])->name('users.update-status');
    Route::resource('users',UserController::class);
    
    Route::controller(FunctionalRoleController::class)->prefix('functional-role')->group(function (){
        Route::get("/", 'index')->name("functional-role");
        Route::get("/add", 'create')->name("add-functional-role");
        Route::post("/store", 'store')->name("store-functional-role");
        Route::get("/edit/{id}", 'edit')->name("edit-functional-role");
        Route::post("/update/{id}", 'update')->name("update-functional-role");
        Route::post("/delete/{id}", 'destroy');
    });  
    Route::controller(QualificationController::class)->prefix('qualification')->group(function (){
        Route::get("/", 'index')->name("qualification");
        Route::get("/add", 'create')->name("add-qualification");
        Route::post("/store", 'store')->name("store-qualification");
        Route::get("/edit/{id}", 'edit')->name("edit-qualification");
        Route::post("/update/{id}", 'update')->name("update-qualification");
        Route::post("/delete/{id}", 'destroy');
    });    
    Route::controller(BankController::class)->prefix('bank')->group(function (){
        Route::get("/", 'index')->name("bank-details");
        Route::get("/add", 'create')->name("add-bank");
        Route::post("/store", 'store')->name("store-bank");
        Route::post("/deactivate/{id}", 'deactivate');
        Route::post("/activate/{id}", 'activate');
    });

























    /////////////////////////////user////////////////////////////////////////////////////////////
  
    Route::get("add-employee", function () {
        return view("hr.add-employee");
    })->name('add-employee');

    Route::get("edit-employee", function () {
        return view("hr.edit-employee");
    })->name('edit-employee');
    
    Route::get("employee-list", function () {
        return view(" hr.employee-list");
    })->name("employee-list");

    Route::get("view-letter", function () {
     return view(" hr.view-letter");
    })->name("view-letter");

    Route::get("send-letter", function () {
        return view(" hr.send-letter");
    })->name("send-letter");

    // Route::get("department", function () {
    //     return view(" hr.department");
    // })->name("department");

    // Route::get("add-user", function () {
    //     return view(" hr.add-user");
    // })->name("add-user");

    // Route::get("manage-roles", function () {
    //     return view(" hr.manage-roles");
    // })->name("manage-roles");
    Route::controller(RoleController::class)->prefix('manage-roles')->group(function (){
        Route::get("/", 'index')->name("manage-roles");
    });

    // Route::get("users-list", function () {
    //     return view(" hr.users-list");
    // })->name("users-list");

    Route::get("organisation", function () {
        return view(" hr.organisation");
    })->name("organisation");

    Route::get("designation", function () {
        return view(" hr.designation");
    })->name("designation");

    Route::get("position-request", function () {
        return view(" hr.position-request");
    })->name("position-request");

    Route::get("recruitment-report", function () {
        return view(" hr.recruitment-report");
    })->name("recruitment-report");

    Route::get("recruitment-list", function () {
        return view(" hr.recruitment-list");
    })->name("recruitment-list");

    Route::get("addnew-candidate", function () {
        return view(" hr.addnew-candidate");
    })->name("addnew-candidate");

    Route::get("recruitment-plan", function () {
        return view(" hr.recruitment-plan");
    })->name("recruitment-plan");

    Route::get("addcontact-form", function () {
        return view(" hr.addcontact-form");
    })->name("addcontact-form");

    Route::get("offerlettershared-list", function () {
        return view(" hr.offerlettershared-list");
    })->name("offerlettershared-list");

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

    Route::get("my-team-list", function () {
        return view("hr.my-team-list");
    })->name("my-team-list");

    Route::get("birthday-list", function () {
        return view("hr.birthday-list");
    })->name("birthday-list");

    Route::get("marriage-anniversary-list", function () {
        return view("hr.marriage-anniversary-list");
    })->name("marriage-anniversary-list");

    Route::get("work-anniversary-list", function () {
        return view("hr.work-anniversary-list");
    })->name("work-anniversary-list");

    Route::get("upload-attendance", function () {
        return view("hr.upload-attendance");
    })->name("upload-attendance");

    Route::get("attendance-list", function () {
        return view("hr.attendance-list");
    })->name("attendance-list");

    Route::get("employee-profile-response-log", function () {
        return view("hr.employee-profile-response-log");
    })->name("employee-profile-response-log");

    Route::get("recruiter-response-log", function () {
        return view("hr.recruiter-response-log");
    })->name("recruiter-response-log");

    Route::get("anniversary-wish-log", function () {
        return view("hr.anniversary-wish-log");
    })->name("anniversary-wish-log");

    Route::get("birthday-wish-log", function () {
        return view("hr.birthday-wish-log");
    })->name("birthday-wish-log");

    Route::get("work-anniversary-wish-log", function () {
        return view("hr.work-anniversary-wish-log");
    })->name("work-anniversary-wish-log");

    Route::get("salary-slip", function () {
        return view("hr.salary-slip");
    })->name("salary-slip");

    Route::get("generate-invoice", function () {
        return view("hr.generate-invoice");
    })->name("generate-invoice");

    Route::get("invoice-list", function () {
        return view("hr.invoice-list");
    })->name("invoice-list");

    Route::get("biling-structure-list", function () {
        return view("hr.biling-structure-list");
    })->name("biling-structure-list");

    Route::get("form16", function () {
        return view("hr.form16");
    })->name("form16");

    Route::get("add-new-form16", function () {
        return view("hr.add-new-form16");
    })->name("add-new-form16");

    Route::get("create-billing-structure", function () {
        return view("hr.create-billing-structure");
    })->name("create-billing-structure");

    Route::get("add-work-order", function () {
        return view("hr.add-work-order");
    })->name("add-work-order");

    Route::get("work-order-list", function () {
        return view("hr.work-order-list");
    })->name("work-order-list");

    Route::get("edit-work-order", function () {
        return view("hr.edit-work-order");
    })->name("edit-work-order");

    Route::get("view-work-order", function () {
        return view("hr.view-work-order");
    })->name("view-work-order");

    Route::get("go-to-attendance", function () {
        return view("hr.go-to-attendance");
    })->name("go-to-attendance");

    Route::get("work-order-salary-sheet", function () {
        return view("hr.work-order-salary-sheet");
    })->name("work-order-salary-sheet");

    Route::get("salary-list", function () {
        return view("hr.salary-list");
    })->name("salary-list");

    Route::get("holiday-list", function () {
        return view("hr.holiday-list");
    })->name("holiday-list");

    Route::get("applied-request-list", function () {
        return view("hr.applied-request-list");
    })->name("applied-request-list");

    Route::get("leave-regularization", function () {
        return view("hr.leave-regularization");
    })->name("leave-regularization");
   
    



    

Route::middleware('employee')->prefix('employee')->group(function () {
    Route::get('/', function(){
        return view('employee.dashboard');
    })->name('employee_dashboard');
});



