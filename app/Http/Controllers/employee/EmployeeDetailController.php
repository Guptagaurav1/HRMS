<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpSalarySlip;

class EmployeeDetailController extends Controller
{
    /**
     * Show Salary SLip.
     */
    public function salary_slip(Request $request)
    {
        $user = auth('employee')->user();
        $slip_get = false;
        $month = '';
        $filter_record = '';
        if ($request->month) {
            $month = $request->month;
            $filter_record = EmpSalarySlip::where('sal_emp_code', $user->emp_code)->where('sal_month', $request->month)->first();
            if ($filter_record) {
                $slip_get = true;
            }
        }

        return view("employee.details.salary-slip", compact('filter_record', 'slip_get', 'month'));
    }
}
