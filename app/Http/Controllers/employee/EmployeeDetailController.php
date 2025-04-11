<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpSalarySlip;
use App\Models\Month;

class EmployeeDetailController extends Controller
{
    /**
     * Show Salary SLip.
     */
    public function salary_slip(Request $request)
    {
        $user = auth('employee')->user();
        $slip_get = false;
        $selected_month = '';
        $filter_record = '';
        $months = Month::pluck('fullname');  // Get all month name
        $joining_year = date('Y', strtotime($user->emp_doj));
        
        $current_year = date('Y');
        $filter_month = '';
        $filter_year = '';

        if ($request->month && $request->year) {
            $filter_month = $request->month;
            $filter_year = $request->year;
            $selected_month = $request->month." ".$request->year;
            $filter_record = EmpSalarySlip::where('sal_emp_code', $user->emp_code)->where('sal_month', $selected_month)->first();
            if ($filter_record) {
                $slip_get = true;
            }
        }

        return view("employee.details.salary-slip", compact('filter_record', 'slip_get', 'selected_month', 'months', 'joining_year', 'current_year', 'filter_month', 'filter_year'));
    }
}
