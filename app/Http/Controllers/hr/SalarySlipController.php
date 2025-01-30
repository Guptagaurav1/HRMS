<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpSalarySlip;
use App\Models\EmpDetail;
use App\Models\WoAttendance;
use Throwable;
use PDF;
use Mail;
use App\Mail\SalarySlipMail;

class SalarySlipController extends Controller
{
    /**
     * 
     * Show the listing of generated salary slips. 
    */ 
    public function index(Request $request){
        $slips = EmpSalarySlip::select('emp_salary_id', 'sal_emp_code', 'sal_emp_name', 'sal_month', 'sal_working_days', 'sal_designation', 'work_order', 'emp_sal_ctc', 'sal_gross', 'sal_net', 'sal_basic', 'status');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $slips = $slips->whereAny([
                'sal_emp_code',
                'sal_emp_name',
                'sal_month',
                'sal_designation',
                'work_order',
            ], 'LIKE', '%'.$request->search.'%');
        }
        $slips = $slips->orderByDesc('emp_salary_id')->paginate(10)->withQueryString();
        return view('hr.salary-slip', compact('slips', 'search'));
    }

    /**
     * Preview Salary Slip
    */
    public function show_preview(Request $request, $id){
        try {
               $salary_slip_record = EmpSalarySlip::findOrFail($id);
                return view("hr.preview-salary-slip", compact('salary_slip_record', 'id'));
        }
        catch(Throwable $th){
            return redirect()->route('salary-slip')->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Send mail to user.
     */
    public function send_mail($id){
        $data = EmpSalarySlip::where('emp_salary_id', $id)->first()->toArray();
        $pdf = PDF::loadView('hr.templates.salary-slip', $data);
        $fileName = 'salary-slip-' . time() . '.pdf';
        $path = public_path('salary-slips');
        $fullPath = $path . '/' . $fileName;
        $mailData = [
            'subject' => 'Salary slip '.$data['sal_month'],
            'file' => $fullPath,
        ];
        $pdf->save($fullPath)->stream('invoice.pdf');
        Mail::to($data[''])->send(new SalarySlipMail($mailData));
        return response()->json(['success' => true]);
        // return $pdf->download('document.pdf');
    }

    /**
     * Show employee details.
     */
    public function employee_details(Request $request, $salaryid){
        $emp_code = EmpSalarySlip::where('emp_salary_id', $salaryid)->value('sal_emp_code');
        $empdetails = EmpDetail::where('emp_code', $emp_code)->first();
        if ($empdetails) {
            return view("hr.employee-details-salary-retainer", compact('empdetails', 'salaryid'));
        }
        else {
             return redirect()->route('salary-slip')->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Export Salary Slip.
     */
    public function export_csv(Request $request)
    {
        $filename = 'employee-salary.csv';
    
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $slips = EmpSalarySlip::select('sal_emp_code', 'sal_emp_name', 'sal_month', 'sal_working_days', 'sal_designation', 'work_order', 'emp_sal_ctc', 'sal_gross', 'sal_net', 'sal_basic');
            $search = '';
            if ($request->search) {
                $search = $request->search;
                $slips = $slips->where(function ($query) use ($search) {
                        $query->where('sal_emp_code', 'LIKE', "%$search%")
                        ->orWhere('sal_emp_name', 'LIKE', "%$search%")
                        ->orWhere('sal_month', 'LIKE', "%$search%")
                        ->orWhere('sal_designation', 'LIKE', "%$search%")
                        ->orWhere('work_order', 'LIKE', "%$search%");
                });
            }
        $slips = $slips->orderByDesc('emp_salary_id')->get();

        return response()->stream(function () use ($slips){
            $handle = fopen('php://output', 'w');
            $headers = array( 'Employee Code', 'Employee Name', 'Month Year' , 'Working Days','Designation','Wo Number','CTC(Per Month)','Gross Pay','Net Pay','Basic Pay');
            fputcsv($handle, $headers);

            foreach($slips as $slip){
                 $data = [
                        $slip->sal_emp_code,
                        $slip->sal_emp_name,
                        $slip->sal_month,
                        $slip->sal_working_days,
                        $slip->sal_designation,
                        $slip->work_order,
                        $slip->emp_sal_ctc,
                        $slip->sal_gross,
                        $slip->sal_net,
                        $slip->sal_basic
                    ];
                fputcsv($handle, $data);
            }
    
            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }

     /**
     * Edit Salary Slip.
     */
    public function edit_slip(Request $request, $id){
        $slip = EmpSalarySlip::select('emp_salary_slip.*', 'wo_attendance.overtime_rate', 'wo_attendance.total_working_hrs')->join('wo_attendance', 'wo_attendance.at_emp', '=', 'emp_salary_slip.wo_attendance_at_emp')->where('emp_salary_id', $id)->first();
        return view("hr.salary-slip-edit", compact('slip', 'id'));
    }


     /**
     * Update Salary Slip.
     */
    public function update_slip(Request $request){
            $this->validate($request, [
                'sal_emp_name' => ['required', 'string'],
                'sal_designation' => ['required', 'string'],
                'sal_aadhar_no' => ['required', 'digits:12'],
                'sal_bank_name' => ['required', 'string'],
                'sal_account_no' => ['required', 'integer'],
                'sal_working_days' => ['required', 'string'],
                'sal_basic' => ['required', 'string'],
            ]);
            $data = $request->all();
            unset($data['_token']);
            unset($data['id']);
            unset($data['overtime_rate']);
            unset($data['total_working_hrs']);
            EmpSalarySlip::where('emp_salary_id', $request->id)->update($data);
            WoAttendance::where('at_emp', $request->wo_attendance_at_emp)->update([
                'overtime_rate' => $request->overtime_rate,
                'total_working_hrs' => $request->total_working_hrs,
            ]);
        return redirect()->route('salary-slip')->with(['success' => true, 'message' => 'Record updated successfully.']);
    }

     /**
     * Print Salary Slip.
     */
    public function print_salary_slip(Request $request, $salaryid){
        $salary_slip_record = EmpSalarySlip::findOrFail($salaryid);
        $slip_get = false;
        $month = '';
        $filter_record = '';
        if ($request->month) {
            $month = $request->month;
            $filter_record = EmpSalarySlip::where('sal_emp_code', $salary_slip_record->sal_emp_code)->where('sal_month', $request->month)->first();
            if ($filter_record) {
                $slip_get = true;
            }
        }
            return view("hr.employee-code-retainer", compact('salary_slip_record', 'salaryid', 'slip_get', 'month', 'filter_record'));
    }

}
