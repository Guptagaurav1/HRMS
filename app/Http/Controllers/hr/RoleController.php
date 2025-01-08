<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::paginate(10);
        // dd($roles);
        return view('hr.manage-roles', compact('roles'));
    }
}
