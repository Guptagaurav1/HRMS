<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Department;
use App\Models\DepartmentSkill;
use App\Models\User;
use App\Models\CompanyMaster;
use App\Models\Role;
use App\Models\ReportingManager;
use App\Models\Qualification;


class HrController extends Controller
{
    /**
     * Show HR Dashboard.
    */
    public function dashboard(Request $request){
        return view("hr.dashboard");
    }

    public function import(){
        return view('import-table');
    }

    public function importDataSave(Request $request){
        // dd('ljlj');

        // $request->validate([
        //     'file' => 'required|mimes:csv'
        // ]);

        $file = $request->file('import_csv');
        $handle = fopen($file, 'r');
        $headers = fgetcsv($handle); // Read and store header row

        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $row = array_combine($headers, $data); // Map headers to values

            // $dob = date_create($row['dob']);

            // User::create([
            //     'id' => $row['id'] ?? null,
            //     'first_name' => $row['first_name'] ?? null,
            //     'last_name' => $row['last_name'] ?? null,
            //     'email' => $row['email'] ?? null,
            //     'remember_token' => $row['remember_token'] ?? null,
            //     'email_verified_at' => $row['email_verified_at'] ?? null,
            //     'password' => $row['password'] ?? null,
            //     'gender' => $row['gender'] ?? null,
            //     'phone' => $row['phone'] ?? null,
            //     'dob' => date_format($dob,'Y-m-d') ?? null,
            //     'role_id' => $row['role_id'] ?? null,
            //     'department_id' => $row['department_id'] === "NULL" ?  : $row['department_id'],
            //     'status' => $row['status'] ?? null,
            //     'created_at' => $row['created'] ?? null,
            //     'updated_at' => $row['created'] ?? null,
            //     // 'company_id' => $row['company_id'] === "NULL" ?  : $row['company_id'],
            // ]);



            // department

            // Department::create([
            //     'id' => $row['id'],
            //     'department' => $row['department'],
            //     // 'reporting_manager_id' => $row['status'],
            //     'status' => $row['status'],
            // ]);

            //reporting Manager

            // ReportingManager::create([
            //     'email' =>  $row['email'],
            //     'name' =>  $row['name'],
            //     'designation' =>  $row['designation'],
            //     'access_emp_code' =>  $row['access_emp_code'],
            //     'status' =>  $row['status']
            // ]);



            // company Master

            // CompanyMaster::create([
            //     'id' => $row['id'],
            //     'name' => $row['company_name'],
            //     'mobile' => $row['company_contact'],
            //     'email' => $row['company_email'],
            //     'address' => $row['company_address'],
            //     'registration_no' => $row['registration_no'],
            //     'gstin_no' => $row['gstin_no'],
            //     'sac_code' => $row['sac_code'],
            //     'service_tax_registration_no' => $row['service_tax_registration_no'],
            //     'pan_no' => $row['pan_no'],
            //     'website' => $row['website'],
            //     'bank_payee_name' => $row['bank_payee_name'],
            //     'bank_name' => $row['bank_name'],
            //     'account_no' => $row['account_no'],
            //     'ifsc_code' => $row['ifsc_code'],
            //     'branch_name' => $row['branch_name'],
            //     'branch_address' => $row['branch_address'],
            //     'company_city' => $row['company_city'],
            //     'payment_type' => $row['payment_type'],
            //     'bank_email' => $row['bank_email'],
            //     'twitter_link' => $row['twitter_link'],
            //     'facebook_link' => $row['facebook_link'],
            //     'facebook_link' => $row['facebook_link'],
            //     'linkedin_link' => $row['linkedin_link'],
            //     'youtube_link' => $row['youtube_link'],
            //     'instagram_link' => $row['instagram_link'],
            //     'pinterest_link' => $row['pinterest_link'],
            //     'status' => $row['status'],
            //     'user_id' => $row['user_id']
            // ]);

            // add record in roles table 

            // Role::create([
            //     'id' => $row['id'],
            //     'rid' => $row['rid'],
            //     'role_name' => $row['role_name'],
            //     'menu_id' => $row['roles_assigned'],
            //     'status' => $row['status'],
            //     'created_at' => $row['time_stamp']
            // ]);

            // qualification

            Qualification::create([
                    'id' => $row['id'],
                    'qualification' => $row['qualification'],
                    'status' => $row['status'],
                    'created_at' => $row['add_time']
                ]);

        }
        fclose($handle);
        return back()->with('success', 'CSV Imported Successfully!');
    }
}
