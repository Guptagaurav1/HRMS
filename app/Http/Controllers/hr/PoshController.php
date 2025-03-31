<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PoshComplaint;
use App\Models\Company;
use Throwable;
use App\Mail\ShortlistMail;
use Mail;
use StdClass;

class PoshController extends Controller
{
    /**
     * Show Posh Complaints.
     */
    public function complaint_list(Request $request)
    {
        $complaints = PoshComplaint::select('id', 'emp_id', 'subject', 'description', 'status', 'created_at', 'revert');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $complaints = $complaints->where(function($query) use ($search) {
                $query->where('subject', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('status', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('employee', function ($query) use ($search){
                        $query->Where('emp_code', 'LIKE', '%' . $search . '%')
                            ->orWhere('emp_name', 'LIKE', '%' . $search . '%');
                    });
            });
        }
        
        $complaints = $complaints->orderByDesc('id')->paginate(25)->withQueryString();
        return view("hr.posh.posh-complaint-list", compact('complaints', 'search'));
    }

    /**
     * Show details of reported complaint.
     */
    public function complaint_details(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => ['required', 'integer']
            ]);
            $id = $request->id;
            $complaint = PoshComplaint::select('emp_id', 'subject', 'description', 'status', 'created_at', 'revert')->findOrFail($id);
            $employee_code = $complaint->employee->emp_code;
            $employee_name = $complaint->employee->emp_name;
            return response()->json(['success' => true, 'complaint' => $complaint, 'employee_name' => $employee_name, 'employee_code' => $employee_code]);
        } catch (Throwable $e) {
            return response()->json(['error' => true,  'message' => 'Server Error']);
        }
    }

    /**
     * Response to complaint.
     */
    public function response(Request $request){
        try {
            $this->validate($request, [
                'response' => ['required'],
                'complaint_id' => ['required', 'integer']
            ]);

            $complaint = PoshComplaint::findOrFail($request->complaint_id); // Get complaint info

            //  Send response information.
            $user = auth()->user();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
             $maildata = new stdClass();
             $maildata->subject = "POSH Complaint Revert || Employee Code: ".$complaint->employee->emp_code." ";
             $maildata->name = $complaint->employee->emp_name;
             $maildata->comp_email = $company->email;
             $maildata->comp_phone = $company->mobile;
             $maildata->comp_website = $company->website;
             $maildata->comp_address = $company->address;
             $maildata->content = $request->response;
             $maildata->url = url('/');
             Mail::to($complaint->employee->emp_email_first)->send(new ShortlistMail($maildata));

            //  Save status information.
            $complaint->revert = $request->response;
            $complaint->status = 'reverted';
            $complaint->save();

            return response()->json(['success' => true, 'message' => 'Complaint Reverted Successfully!']);

        }
        catch (Throwable $e) {
            return response()->json(['error' => true, 'message' => 'Server Error']);
        }


    }
}
