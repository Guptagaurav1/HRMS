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
        $distinctSections = Menu::where('status', '1')
        ->select('section')
        ->distinct()
        ->get();
    
        $menus = [];
        foreach ($distinctSections as $section) {
            $menus[$section->section] = Menu::where('section', $section->section)
                ->where('status', '1')
                ->get();
        }
        return view('hr.role&menu.add-manage-role',compact('menus'));
    }

    public function store(Request $request){
        $request->validate([
            'role_name' => 'required|unique:roles,role_name',
        ]);
        
        $checkMenuArray = $request->input('checkMenu'); 
        $checkString ='';
        if(is_array($checkMenuArray)){
            $checkString = implode(',', $checkMenuArray);
        }
       

        $roles = new Role();
        $roles->role_name = $request->role_name;
        $roles->menu_id =$checkString;

        $roles->save();
        return redirect()->route('manage-roles')->with('success','Role created successfully !');
    }

    public function edit(Request $request, $id){

        // $role = Role::where('id',$id)->get();
        $role = Role::find($id);
        // dd($role);
        $distinctSections = Menu::where('status', '1')
            ->select('section')
            ->distinct()
            ->get();
      
        $menus = [];
        foreach ($distinctSections as $section) {
            $menus[$section->section] = Menu::where('section', $section->section)
                ->where('status', '1')
                ->get();
        }
        return view('hr.role&menu.manage-role-edit',compact('menus','role'));
    }
    public function update(Request $request,$id){
   
    $role= Role::find($id);
    $checkMenuArray = $request->input('checkMenu'); 
     $checkString ='';
    if(is_array($checkMenuArray)){
        $checkString = implode(',', $checkMenuArray);
    }
    $role->menu_id =$checkString;
    $role->save();
    return redirect()->route('manage-roles')->with('success','Role updated successfully !');
    }
}
