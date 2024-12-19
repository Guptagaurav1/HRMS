<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", function () {
    return view("admin.dashboard");
});

Route::get("add-employee", function () {
    return view("add-employee");
})->name('add-employee');

Route::get("edit-employee", function () {
    return view("edit-employee");
})->name('edit-employee');

Route::get("employee-list", function () {
    return view("employee-list");
})->name("employee-list");

Route::get("login", function () {
    return view("login");
})->name("login");

Route::get("view-letter", function () {
    return view("view-letter");
})->name("view-letter");

Route::get("send-letter", function () {
    return view("send-letter");
})->name("send-letter");