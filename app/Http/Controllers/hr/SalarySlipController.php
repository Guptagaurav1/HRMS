<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpSalarySlip;
use Throwable;
class SalarySlipController extends Controller
{
    /**
     * 
     * Show the listing of generated salary slips. 
    */ 
    public function index(Request $request){
        $slips = EmpSalarySlip::select('emp_salary_id', 'sal_emp_code', 'sal_emp_name', 'sal_month', 'sal_working_days', 'sal_designation', 'work_order', 'emp_sal_ctc', 'sal_gross', 'sal_net', 'sal_basic', 'status')->orderByDesc('emp_salary_id')->paginate(10)->withQueryString();
        return view('hr.salary-slip', compact('slips'));
    }

    /**
     * Preview Salary Slip
    */
    public function show_preview(Request $request, $id){
        try {
               $salary_slip_record = EmpSalarySlip::findOrFail($id);
                return view("hr.preview-salary-slip", compact('salary_slip_record'));
        }
        catch(Throwable $th){
            return redirect()->route('salary-slip')->with(['error' => true, 'message' => 'Server Error']);
        }
    }
}
