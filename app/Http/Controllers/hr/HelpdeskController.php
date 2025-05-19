<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ComposeMail;
use stdclass;
use App\Models\EmailHistory;
use App\Models\Company;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\DB;

class HelpdeskController extends Controller
{
    /**
     * Show the form for compose mail.
    */
    public function compose(Request $request){
        if (auth()->check()){
            $email = auth()->user()->email;
        }
        if (auth('employee')->check()){
            $email = auth('employee')->user()->emp_email_first;
        }
        return view("hr.compose-email", compact('email')); 
    } 

    /**
     * Send Mail. 
    */
    public function send_mail(Request $request){
        $this->validate($request, [
            'from' => ['required', 'email'],
            'to' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'body' => ['string'],
            'attachment' => [File::types(['pdf', 'docx', 'doc'])->max(3 * 1024),
        ],
        ]);

        try {
            DB::beginTransaction();
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail(1);

            $maildata = new stdclass();
            $maildata->from = $request->from;
            $maildata->subject = $request->subject;
            $maildata->body = $request->body;
            $maildata->email = $company->email;
            $maildata->phone = $company->mobile;
            $maildata->website = $company->website;
            $maildata->address = $company->address;
            $maildata->url = url('/');

            $cc = [];
            if ($request->cc) {
                $cc = explode(",", $request->cc);
            }
            if ($request->to) {
                $to = explode(",", $request->to);
            }
            $filename = '';
            if ($request->file('attachment')) {
                $file = $request->file('attachment');
                $name = $file->getClientOriginalName();
                $filename = time()."_".$name;
                $filepath = public_path('attachments').'/';
                $request->attachment->move($filepath, $filename);
            }

            // $maildata->file = $file;
            $maildata->attachment = $filename ? str_replace('\\', '/', public_path("attachments/{$filename}")) : '';

            EmailHistory::create([
                'from_mail' => $request->from,
                'to_mail' => $request->to,
                'cc' => $request->cc,
                'subject' => $request->subject,
                'content' => $request->body,
                'attatchment' => $filename ? $filename : ''
            ]);
            Mail::to($to)->cc($cc)->send(new ComposeMail($maildata));
            DB::commit();
        // return redirect()->route('email-list')->with(['success' => true, 'message' => 'Mail Sent Successfully']);
        return response()->json(['success' => true, 'message' => 'Mail Sent Successfully']);
        }
        catch(Throwable $th){
            DB::rollBack();
        //  return redirect()->route('email-list')->with(['error' => true, 'message' => 'Server Error']);
            return response()->json(['error' => true, 'message' => 'Server Error']);

        }
  
    } 

    /**
     * Show send mails.
    */
    public function mail_log(Request $request){
        if (auth()->check()){
            $usermail = auth()->user()->email;
        }
        if (auth('employee')->check()){
            $usermail = auth('employee')->user()->emp_email_first;
        }
       $emails = EmailHistory::where('from_mail', $usermail);
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $emails = $emails->whereAny([
                'to_mail',
                'subject',
                'content'
            ], 'LIKE', '%'.$request->search.'%');
        }
        $emails = $emails->orderByDesc('id')->paginate(10)->withQueryString();

        return view("hr.email-list", compact('emails', 'search'));
    } 
}
