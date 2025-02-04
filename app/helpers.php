<?php

use App\Models\Role;

/**
 * Get role id from role name.
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