<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    /**
     * Apply leave request Form.
     */
    public function leave_request()
    {
        return view("employee.leave.leave-request-form");
    }
}
