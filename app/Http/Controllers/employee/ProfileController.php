<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmpDetail;
use App\Models\EmpCertificateDetail;
use App\Models\User;
use App\Models\EmpPersonalDetail;
use App\Models\EmpUpdateHistory;
use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;

use App\Models\EmpChangedColumnsReq;
use App\Models\EmpProfileRequestLog;
use App\Models\Notification;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Mail\ShortlistMail;
use stdClass;
use Mail;

class ProfileController extends Controller
{
    /**
     * Show Employee Profile Details
     */
    public function show_profile()
    {
        $emp_code = auth('employee')->user()->emp_code;
        $details = EmpDetail::where('emp_code', $emp_code)->firstOrFail();
        $manager = User::Select('first_name', 'last_name', 'role_id')->where('email', $details->reporting_email)->firstOrFail();
        return view("employee.profile.employee-users-details", compact('details', 'manager'));
    }

    /**
     * Save Employee Certifcates
     */
    public function save_certificates(Request $request)
    {
        try {
            $this->validate($request, [
                'certificate_name.*' => 'required|string',
                'duration.*' => 'required|integer',
                'grade.*' => 'required|string',
            ]);

            DB::beginTransaction();
            $emp_code = auth('employee')->user()->emp_code;
            for ($i = 0; $i < count($request->certificate_name); $i++) {
                EmpCertificateDetail::updateOrCreate(
                    ['certificate_name' => $request->certificate_name[$i], 'emp_code' => $emp_code],
                    ['duration' => $request->duration[$i], 'grade' => $request->grade[$i]]
                );
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Certificates saved successfully']);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update Employee image.
     */
    public function update_image(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->validate($request, [
                'emp_photo' => [File::types(['jpg', 'jpeg', 'png'])->max('1mb')],
            ]);

            // Get Employee Detail.
            $empdetails = EmpDetail::where('emp_code', auth('employee')->user()->emp_code)->firstOrFail();
            $data = [];
            if ($request->hasFile('emp_photo')) {
                $file = $request->file('emp_photo');
                $photograph = 'photo_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('recruitment/candidate_documents/passport_size_photo'), $photograph);
                $data['emp_photo'] = $photograph;
            }
            EmpPersonalDetail::where('emp_code', $empdetails->emp_code)->update($data);  // update record
            
            // Save update history.
            EmpUpdateHistory::create([
                'emp_code' => $empdetails->emp_code,
                'column_name' => 'emp_photo',
                'old_value' => !empty($empdetails->getPersonalDetail) ? $empdetails->getPersonalDetail->emp_photo : '',
                'new_value' => $data['emp_photo'],
            ]);

            DB::commit();
            return response()->json(['success' => true,'message' => 'Image updated successfully']);
        } catch (Throwable $e) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

       /**
     * Show the form for requesting to profile update
     */
    public function profile_update_request()
    {
        $columns = EmpChangedColumnsReq::select('id', 'name')->where('status', 'active')->get();
        return view("hr.profile.modify-profile-request", compact('columns'));
    }

    /**
     * Submit update request form.
     */
    public function submit_update_request(Request $request)
    {
        // Validate the form data before saving it.
        $request->validate(
            [
                'changed_column.*' => 'required',
                'description.*' => 'required',
                'assigned_to.*' => 'required',
                'file.*' => ['required', 'mimes:pdf', 'max:1024'],
            ],
            [
                'changed_column.*.required' => 'Please select a column to modify.',
                'description.*.required' => 'Please provide a description for the change.',
                'assigned_to.*.required' => 'Please select an employee to assign the request.',
                'file.*.required' => 'Please upload a file for the request.',
                'file.*.mimes' => 'Only PDF files are allowed.',
                'file.*.max' => 'File size should not exceed 1MB.'
            ]
        );

        try {
            DB::beginTransaction();
            $loginuser = auth('employee')->user();
            $req_id = EmpProfileRequestLog::latest('id')->value('req_id');
            if ($req_id) {
                $newid = explode('-', $req_id)[1] + 1;
            }
            $newid = "REQ-" . ($newid ?? 1);

            for ($i = 0; $i < count($request->assigned_to); $i++) {
                $filename = '';
                $field_name =  EmpChangedColumnsReq::findOrFail($request->changed_column[$i])->value('name');
                $queryuser = User::select('id', 'role_id')->where('email', $request->assigned_to[$i])->firstOrFail();
              
                $fieldname = Str::replace(' ', '_', $field_name);;
                $fullpath = '';
                if ($request->hasFile('file.' . $i)) {
                    $file = $request->file('file')[$i];
                    $extension = $file->getClientOriginalExtension();
                    $filename = $newid . "_" . $fieldname . "_" . time() . '.' . $extension;
                    $path = public_path('recruitment/candidate_documents/employee_request_docs');
                    $fullpath = $path . '/' . $filename;
                    $file->move($path, $filename);
                }

                // Save the request to the database.
                $insertid = EmpProfileRequestLog::create([
                    'req_id' => $newid,
                    'emp_code' => $loginuser->emp_code,
                    'description' => $request->description[$i],
                    'file' => $filename,
                    'changed_column' => $request->changed_column[$i],
                    'assigned_to' => $request->assigned_to[$i],
                    'status' => 'open',
                ])->id;

                // Send notification to the assigned employee.
                $notification = new Notification;
                $notification->title = $fieldname;
                $notification->description = $request->description[$i];
                $notification->send_by = $loginuser->emp_email_first;
                $notification->received_to = '1,' . $queryuser->id;
                $notification->user_type = get_role_name($queryuser->role_id);
                $notification->notification_type = 'employee_req';
                $notification->reference_table_name = 'emp_profile_request_log';
                $notification->reference_table_id = $insertid;
                $notification->save();

                // Send mail.
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail(1);
                // Content.
                $requested_for = ($request->assigned_to[$i] == "hr@prakharsoftwares.com") ? "Profile" : "Bank";
                $html = "<h4>" . $loginuser->emp_name . ", You have requested for " . $requested_for . " Details Updation.</h4></br>
                     <h4 style='color:blue;'>Employee code: &nbsp;" . $loginuser->emp_code . "</h4></br>
                     <h4 style='color:blue;'>Your Request id is : " . $newid . "</h4></br>
                     <h4 style='color:blue;'>Request Description : " . $request->description[$i] . "</h4></br>
                     <h4>Your Details will be updated soon.</h4>";


                $maildata = new stdClass();
                $maildata->subject = "Employee Profile Updation Request";
                $maildata->name = $loginuser->emp_name;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                $maildata->file = $fullpath;
                Mail::to($loginuser->emp_email_first)->send(new ShortlistMail($maildata));
            }
            DB::commit();
            return redirect()->route('profile.modify-profile-request')->with(['success' => true, 'message' => 'Your request has been submitted successfully.']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('profile.modify-profile-request')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Show the list of requests.
     */
    public function request_list(Request $request)
    {   
        $requests = EmpProfileRequestLog::select('req_id', 'changed_column', 'assigned_to', 'description', 'status', 'created_at')->where('emp_code', auth('employee')->user()->emp_code);
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $filter = '%' . $request->search . '%';

            $requests = $requests->where(function ($query) use ($filter) {
                $query->where('req_id', 'LIKE', $filter)
                    ->orWhere('assigned_to', 'LIKE', $filter)
                    ->orWhere('description', 'LIKE', $filter)
                    ->orWhere('status', 'LIKE', $filter)
                    ->orWhereHas('changedColumn', function ($query) use ($filter) {
                        $query->where('name', 'LIKE', $filter);
                    });
            });
        }
        $requests = $requests->orderByDesc('id')->paginate(10)->withQueryString();

        return view("hr.profile.update-detail-request-list", compact('requests', 'search'));
    }
}
