<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

    Route::get("/", function () {
        return view("hr.dashboard");
    })->name('hr_dashboard');

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

    Route::get("department", function () {
        return view(" hr.department");
    })->name("department");

    Route::get("skill", function () {
        return view(" hr.skill");
    })->name("skill");

    Route::get("add-user", function () {
        return view(" hr.add-user");
    })->name("add-user");

    Route::get("manage-roles", function () {
        return view(" hr.manage-roles");
    })->name("manage-roles");

    Route::get("users-list", function () {
        return view(" hr.users-list");
    })->name("users-list");

    Route::get("functional-role", function () {
        return view(" hr.functional-role");
    })->name("functional-role");

    Route::get("qualification", function () {
        return view(" hr.qualification");
    })->name("qualification");

    Route::get("bank-details", function () {
        return view(" hr.bank-details");
    })->name("bank-details");

    Route::get("organisation", function () {
        return view(" hr.organisation");
    })->name("organisation");

    Route::get("designation", function () {
        return view(" hr.designation");
    })->name("designation");

    Route::get("company-master", function () {
        return view(" hr.company-master");
    })->name("company-master");

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

});

Route::middleware('employee')->prefix('employee')->group(function () {
    Route::get('/', function(){
        return view('employee.dashboard');
    })->name('employee_dashboard');
});



