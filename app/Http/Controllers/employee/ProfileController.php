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
}
