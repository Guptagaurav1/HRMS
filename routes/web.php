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
        return view("add-employee");
    })->name('add-employee');

    Route::get("edit-employee", function () {
        return view("edit-employee");
    })->name('edit-employee');
    
    Route::get("employee-list", function () {
        return view("employee-list");
    })->name("employee-list");

    Route::get("view-letter", function () {
        return view("view-letter");
    })->name("view-letter");

    Route::get("send-letter", function () {
        return view("send-letter");
    })->name("send-letter");

    Route::get("department", function () {
        return view("department");
    })->name("department");

    Route::get("skill", function () {
        return view("skill");
    })->name("skill");

    Route::get("add-user", function () {
        return view("add-user");
    })->name("add-user");

    Route::get("manage-roles", function () {
        return view("manage-roles");
    })->name("manage-roles");

    Route::get("users-list", function () {
        return view("users-list");
    })->name("users-list");

    Route::get("functional-role", function () {
        return view("functional-role");
    })->name("functional-role");

    Route::get("qualification", function () {
        return view("qualification");
    })->name("qualification");

    Route::get("bank-details", function () {
        return view("bank-details");
    })->name("bank-details");

    Route::get("organisation", function () {
        return view("organisation");
    })->name("organisation");

    Route::get("designation", function () {
        return view("designation");
    })->name("designation");

    Route::get("company-master", function () {
        return view("company-master");
    })->name("company-master");

});

Route::middleware('employee')->prefix('employee')->group(function () {
    Route::get('/', function(){
        return view('employee.dashboard');
    })->name('employee_dashboard');
});



