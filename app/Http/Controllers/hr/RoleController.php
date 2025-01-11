<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
     
        $roles = Role::with('menu')->paginate(10);
            $rolesWithMenus = [];
            foreach ($roles as $role) {
                $menu_ids = explode(',', $role->menu_id);  // Get the menu IDs as an array
                $menus = Menu::whereIn('id', $menu_ids) 
                ->pluck('name')              // Get the names of the menus
                ->toArray(); 
    
                $role->menu_names = implode(', ', $menus);
                $rolesWithMenus[] = $role;
            }
        
        return view('hr.role&menu.manage-roles', compact('rolesWithMenus'));
    }

    public function create(){
        return view('hr.role&menu.add-manage-role');
    }

    public function store(Request $request){
        $request->validate([
            'role_name' => 'required|unique:roles,role_name',
        ]);

        $roles = new Role();
        $roles->role_name = $request->role_name;
        $roles->save();
        return redirect()->route('manage-roles')->with('success','Role created successfully !');
    }
}
