<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\EmpSalarySlip;
use App\Models\WoAttendance;

class InvoiceBillingController extends Controller
{
    public function index(Request $request){
      
        $organizations = Organization::orderBy('id','desc')->get();
        return view("hr.invoiceBilling.generate-invoice",compact('organizations'));
    }
    public function invoice_details(Request $request){
        // dd($request);   
        $month = $request->month;
        $wo_number = $request->wo_number;
        $org = $request->organisation;
       
            $attend_rows = WoAttendance::where('attendance_month', $month)
            ->where('wo_number', $wo_number)
            ->count();
           
            // Check salary calculation
            $sal_rows = EmpSalarySlip::join('emp_details', 'emp_details.emp_code', '=', 'emp_salary_slip.sal_emp_code')
                ->where('emp_salary_slip.sal_month', $month)
                ->where('emp_details.emp_work_order', $wo_number)
                ->count();
                

            // Check if attendance and salary rows match
            if ($attend_rows > 0 && $sal_rows > 0 && $attend_rows == $sal_rows) {
                // Fetch wo_details based on org and wo_number
                $data_qry = WoDetail::where('wo_oraganisation_name', $org)
                    ->where('wo_number', $wo_number)
                    ->get();
            }else{

                $data_qry='';
            }

        $organizations = Organization::orderBy('id','desc')->get();
        return view("hr.invoiceBilling.generate-invoice",compact('organizations','data_qry','sal_rows','attend_rows' ,'month'));
    }
    public function invoice_list(){
        return view("hr.invoiceBilling.invoice-list");
    }
    public function biling_structure(){
        return view("hr.invoiceBilling.biling-structure-list");
    }
    public function form16(){
        return view("hr.invoiceBilling.form16");
    }
    public function addForm16(){
        return view("hr.invoiceBilling.add-new-form16");
    }
    public function create_biling_structure(){
        return view("hr.invoiceBilling.create-billing-structure");
    }
}
