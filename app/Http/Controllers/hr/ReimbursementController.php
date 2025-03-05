<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reimbursement;
use App\Models\Company;
use App\Models\EmpDetail;
use App\Models\ReimbursementStatus;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;
use App\Mail\ReimbursementMail;
use Throwable;
use stdClass;
use Mail;

class ReimbursementController extends Controller
{
    /**
     * Show the list of reimbursements.
     */
    public function index(Request $request)
    {
        $reimbursments = Reimbursement::where('final_submit', 'yes');
        $search = '';
        if ($request->search){
            $search = $request->search;
            $reimbursments = $reimbursments->where(function ($query) use ($search) {
                $query->where('rem_id', 'LIKE', '%'.$search.'%')
                    ->orWhere('emp_id', 'LIKE', '%'.$search.'%')
                    ->orWhere('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('total_amount', 'LIKE', '%'.$search.'%')
                    ->orWhere('advance_amount', 'LIKE', '%'.$search.'%');
            });
        }
        $reimbursments = $reimbursments->orderByDesc('id')->paginate(10)->withQueryString();
        return view("hr.reimbursement.reimbursement-list", compact('reimbursments', 'search'));
    }

    /**
     * Show the Receipt.
     */
    public function view_receipt($id)
    {
        try{
            $total = 0;
            $reimbursement = Reimbursement::findOrFail($id);
            return view("hr.reimbursement.view-reciept", compact('reimbursement', 'total'));
        }
        catch (Throwable $e){
            return redirect()->route('reimbursement.list')->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Show all the attachments.
     */
    public function view_attachment($id)
    {
        try{
            $reimbursement = Reimbursement::findOrFail($id);
            return view("hr.reimbursement.view-more-attachment", compact('reimbursement'));
        }
        catch (Throwable $e){
            return redirect()->route('reimbursement.list')->with(['error' => true, 'message' => 'Server Error']);
        }
    }

    /**
     * Save the response on reimbursement request.
     */
    public function store_response(Request $request)
    {
        try{
            DB::beginTransaction();
            $this->validate($request, [
                'rem_id' => ['required'],
                'remark' => ['required'],
                'response' => ['required'],
            ]);

            $details = Reimbursement::select('emp_id')->where('rem_id', $request->rem_id)->first();
            $empdetail = EmpDetail::select('emp_id', 'emp_name', 'emp_email_first')->where('emp_code', $details->emp_id)->first();
            if ($details && $empdetail){
                $user = auth()->user();
                $subject = "Reimbursement Request " .  $request->response . " || Employee Code:" . $details->emp_id;
                // Update the reimbursement status.
                ReimbursementStatus::create([
                    'rem_id' => $request->rem_id,
                    'verified_status' => $request->response,
                    'verified_by' => 3,  // If hr is verify then 3 otherwise 2
                    'emp_id' => $details->emp_id,
                    'verified_time' => date("Y-m-d H:i:s"),
                ]);
    
                // Send Notifications.
                Notification::create([
                    'title' => 'Reimbursement Revert',
                    'description' => "$subject Remarks - $request->remark and $request->response by $user->email",
                    'send_by' => $user->email,
                    'received_to' => $empdetail->emp_id,
                    'user_type' => 'employee',
                    'notification_type' => 'apply_reimbursement',
                    'reference_table_name' => 'reimbursement_status',
                    'reference_table_id' => $request->rem_id
                ]);
    
                // Send Mail.
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail($user->company_id);
                $html = '<span>Dear ' . $empdetail->emp_name . ',</span><br><br>';
                $html.= '<span>Your reimbursement ID ('.$request->rem_id.') has been '. $request->response . ' by '.$user->first_name.' '.$user->last_name.'('.get_role_name($user->role_id).') , on date '.date('jS F, Y', time()).' </span><br><br>';
                $html .= "<span style='font-weight:bold'>REM-ID : " . $request->rem_id . "</span><br>";
                $html .= $request->remark;
                $html .= "<br> $user->first_name $user->last_name (".get_role_name($user->role_id).") <br><br>";
    
                $maildata = new stdClass();
                $maildata->subject = $subject;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($empdetail->emp_email_first)->cc($user->email)->send(new ReimbursementMail($maildata));

                DB::commit();
                return response()->json(['success' => true,'message' => 'Response Saved Successfully']);
            }
            else{
                DB::rollBack();
                return response()->json(['error' => true,'message' => 'Invalid Reimbursement ID']);
            }
        }
        catch (Throwable $e){
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }
}
