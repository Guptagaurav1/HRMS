<?php

use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use App\Models\SendMailLog;
use App\Models\Qualification;
use App\Models\Skill;
use App\Models\FunctionalRole;

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