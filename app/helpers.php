<?php

use App\Models\City;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use App\Models\SendMailLog;
use App\Models\Qualification;
use App\Models\Skill;
use App\Models\FunctionalRole;
use App\Models\PositionRequest;
use App\Models\EmpPersonalDetail;
use App\Models\EmpAccountDetail;
use App\Models\EmpAddressDetail;
use App\Models\EmpIdProof;
use App\Models\EmpEducationDetail;
use App\Models\EmpExperienceDetail;
use App\Models\LeadList;
use App\Models\Organization;
use App\Models\Project;
use App\Models\State;

/**
 * Get role id from role name.
 * @param $role_name
 * @return $roleid
 */ 
if(!function_exists('get_role_id')){
    function get_role_id($role_name)
    {
    	$roleid = Role::where('role_name', $role_name)->value('id');
    	if ($roleid) {
    		return $roleid;
    	}
        return false;
    }
}

/**
 * Get role name from role id.
 * @param $roleid
 * @return $role_name
 */ 
if(!function_exists('get_role_name')){
    function get_role_name($roleid)
    {
        $rolename = Role::where('id', $roleid)->value('role_name');
        if ($rolename) {
            return $rolename;
        }
        return false;
    }
}

/**
 * Get department user names from user ids.
 * @param comma seperated userids, $userids
 * @return usernames
 */ 
if(!function_exists('get_username')){
    function get_username($userids)
    {
        $users = explode(",", $userids);
        $users = User::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"))->whereIn('id', $users)->pluck('full_name')->implode(', ');
        return $users;
    }
}

/**
 * Get contacted person of position requested.
 * @param position request id, $requestid
 * @return contacts
 */ 
if(!function_exists('get_position_contacts')){
    function get_position_contacts($requestid)
    {
        $count = SendMailLog::where('job_position', $requestid)->count();
        return $count;
    }
}

/**
 * Get educations from multiple ids.
 * @param comma seperated educationid, $educationid
 * @return qualification name
 */ 
if(!function_exists('get_education')){
    function get_education($educationid)
    {
        $education = explode(",", $educationid);
        $education = Qualification::select('qualification')->whereIn('id', $education)->pluck('qualification')->implode(', ');
        return $education;
    }
}

/**
 * Get skills from multiple ids.
 * @param comma seperated skillid, $skillid
 * @return skills
 */ 
if(!function_exists('get_skills')){
    function get_skills($skillid)
    {
        $skills = explode(",", $skillid);
        $skills = Skill::select('skill')->whereIn('id', $skills)->pluck('skill')->implode(', ');
        return $skills;
    }
}

/**
 * Get functional roles from multiple ids.
 * @param comma seperated functional_roleid, $functional_roleid
 * @return roles
 */ 
if(!function_exists('get_functional_roles')){
    function get_functional_roles($functional_roleid)
    {
        $roles = explode(",", $functional_roleid);
        $roles = FunctionalRole::select('role')->whereIn('id', $roles)->pluck('role')->implode(', ');
        return $roles;
    }
}

/**
 * Format experience years from comma seperated number.
 * @param comma seperated number, $years
 * @return formatted years
 */ 
if(!function_exists('format_experience')){
    function format_experience($years)
    {
        $year = explode(",", $years);
        return $year[0]."-".$year[1]." years";
    }
}

/**
 * Format status of position's contacts.
 * @param raw status, $status
 * @return formatted status
 */ 
if(!function_exists('format_contact_status')){
    function format_contact_status($status)
    {
        
        if ($status == "first-selected") {
            return "CV Shortlisted";
        } elseif ($status == "send_interview_details") {
            return "Interview Details Sent";
        } elseif ($status == "second-selected") {
            return "1st Round Cleared";
        } elseif ($status == "third-selected") {
            return "2nd Round Cleared";
        } elseif ($status == "fourth-selected") {
            return "Confirmation Sent";
        } elseif ($status == "offer-letter-sent") {
            return "Offer Letter Sent";
        } elseif ($status == "backout") {
            return "Candidate Backout";
        } elseif ($status == "offer_accepted") {
            return "Offer Accepted";
        } elseif ($status == "docs_checked") {
            return "Document Checked";
        } elseif ($status == "joining-formalities-completed") {
            return "Joining Formalities Completed";
        } elseif ($status == "joined") {
            return "Joined";
        } elseif ($status == "first-skipped") {
            return "Skipped CV";
        } elseif ($status == "second-skipped") {
            return "Skipped First Interview Round";
        } elseif ($status == "third-skipped") {
            return "Skipped Second Interview Round";
        } elseif ($status == "finally-skipped") {
            return "Skipped";
        } elseif ($status == "first-rejected") {
            return "CV Rejected";
        } elseif ($status == "second-rejected") {
            return "Rejected First Interview Round";
        } elseif ($status == "third-rejected") {
            return "Rejected Second Interview Round";
        } elseif ($status == "finally-rejected") {
            return "Rejected";
        }
    }
}

/**
 * Get position title from position request id.
 */
if (!function_exists('get_position_title')) {
     function get_position_title($req_id)
     {
        $title = PositionRequest::where('req_id', $req_id)->value('position_title');
        if ($title) {
            return $title;
        }
        return 'Na';
     }
 } 
 

 if (! function_exists('downloadWorkOrderDocumentsAsZip')) {
     function downloadWorkOrderDocumentsAsZip($workOrderFiles)
     {
         // Path where the files are stored
         $storagePath = storage_path('app/public/uploadWorkOrder/');  
         // Create a new Zip file
         $zip = new ZipArchive;
         $zipFileName = 'work_order_documents_' . time() . '.zip';
         $zipFilePath = storage_path('app/public/uploadWorkOrder/' . $zipFileName);
 
         if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
             foreach ($workOrderFiles as $file) {
                 // Get the full file path
                 $filePath = $storagePath . $file;
 
                 // Check if the file exists before adding to zip
                 if (file_exists($filePath)) {
                     // Add the file to the zip archive
                     $zip->addFile($filePath, basename($filePath));
                 }
             }
             $zip->close(); // Close the zip file
 
             // Return the path of the generated ZIP file
             return $zipFilePath;
         }
 
         // Return null if the zip couldn't be created
         return null;
     }
 }

/**
 * Add employee code in all employee tables
 *  on direct join in recruitment form.
 * @param string $employeeCode
 * @param integer $req_id
 */
if (!function_exists('update_employee_code')) {
    function update_employee_code($req_id, $employeeCode)
    {
        try {
            DB::beginTransaction();
            EmpPersonalDetail::where('rec_id', $req_id)->update(['emp_code' => $employeeCode]);
            EmpAccountDetail::where('rec_id', $req_id)->update(['emp_code' => $employeeCode]);
            EmpAddressDetail::where('rec_id', $req_id)->update(['emp_code' => $employeeCode]);
            EmpIdProof::where('rec_id', $req_id)->update(['emp_code' => $employeeCode]);
            EmpEducationDetail::where('rec_id', $req_id)->update(['emp_code' => $employeeCode]);
            EmpExperienceDetail::where('rec_id', $req_id)->update(['emp_code' => $employeeCode]);
            DB::commit();
            return true;
        }
        catch (Throwable $e) {
            DB::rollBack();
            return false;
        }
       
    }
} 

/**
 * Check department role assignment
 * @param string $role_short_name
 * @param integer $userid
 * @return boolean true if role assignment is granted, false otherwise
 */
if (!function_exists('check_department_role_assignment')) {
    function check_department_role_assignment($role_short_name, $userid)
    {
        try {
            $user = User::select('role_id')->findOrFail($userid);
            $role_id = Role::where('role_name', $role_short_name)->value('id');
            if ($role_id == $user->role_id) {
                return true;
            }
            return false;
        }
        catch (Throwable $e) {
            return false;
        }
    }
}
 
/**
 * Get organization_id from organization name.
 * @param string $organization
 * @return integer organization_id
 */ 
if(!function_exists('get_organization_id')){
    function get_organization_id($name)
    {
        try {
            return Organization::where('name', $name)->value('id');
        }
        catch(Throwable $th){
            return '';
        }
    }
}
 
/**
 * Get project_id from project number.
 * @param string $project_number
 * @return integer project_id
 */ 
if(!function_exists('get_project_id')){
    function get_project_id($project_number)
    {
        try {
            return Project::where('project_number', $project_number)->value('id');
        }
        catch(Throwable $th){
            return '';
        }
    }
}

/**
 * Get city_id from city name.
 * @param string $city_name
 * @return integer city_id
 */ 
if(!function_exists('get_city_id')){
    function get_city_id($city_name)
    {
        try {
            return City::where('city_name', $city_name)->value('id');
        }
        catch(Throwable $th){
            return '';
        }
    }
}

/**
 * Get state_id from state name.
 * @param string $state
 * @return integer state_id
 */ 
if(!function_exists('get_state_id')){
    function get_state_id($state)
    {
        try {
            return State::where('state', $state)->value('id');
        }
        catch(Throwable $th){
            return '';
        }
    }
}

/**
 * Get lead_id from lead_uni_id.
 * @param string $lead
 * @return integer lead_id
 */ 
if(!function_exists('get_lead_id')){
    function get_lead_id($lead)
    {
        try {
            return LeadList::where('lead_uni_id', $lead)->value('id');
        }
        catch(Throwable $th){
            return '';
        }
    }
}

/**
 * Get organization_name from project id.
 * @param integer $project_id
 * @return string organization_name
 */ 
if(!function_exists('get_organization_name')){
    function get_organization_name($project_id)
    {
        try {
            $organisation = Organization::select('name')->join('projects', 'organizations.id', '=', 'projects.organisation_id')->where('projects.id', $project_id)->first();

            return $organisation ? $organisation->name : '';
        }
        catch(Throwable $th){
            return '';
        }
    }
}
