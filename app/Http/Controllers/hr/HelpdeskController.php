<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ComposeMail;
use stdclass;
use App\Models\EmailHistory;
use Illuminate\Validation\Rules\File;

class HelpdeskController extends Controller
{
    /**
     * Show the form for compose mail.
    */
    public function compose(Request $request){
        return view("hr.compose-email"); 
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
            $maildata = new stdclass();
            $maildata->from = $request->from;
            $maildata->subject = $request->subject;
            $maildata->body = $request->body;
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

            EmailHistory::create([
                'from_mail' => $request->from,
                'to_mail' => $request->to,
                'cc' => $request->cc,
                'subject' => $request->subject,
                'content' => $request->body,
                'send_time' => date('Y-m-d G:i:s'),
                'attatchment' => $filename ? $filename : ''
            ]);
            Mail::to($to)->cc($cc)->send(new ComposeMail($maildata));

        return redirect()->route('email-list')->with(['success' => true, 'message' => 'Mail Sent Successfully']);
        }
        catch(Throwable $th){
         return redirect()->route('email-list')->with(['error' => true, 'message' => 'Server Error']);
        }
  
    } 

    /**
     * 
    */
    public function mail_log(Request $request){
        $usermail = auth()->user()->email;
       $emails = EmailHistory::where('from_mail', $usermail)->orderByDesc('id')->paginate(10);
        return view("hr.email-list", compact('emails'));
    } 
}
