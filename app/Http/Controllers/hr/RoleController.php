<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Throwable;

class RoleController extends Controller
{
    public function index(Request $request){
     
        $roles = Role::with('menu')->where('role_name', '!=', '')
        ->orderBy('id', 'desc');
    
    $search = $request->search;
    
    if ($search) {
        $roles->where(function ($q) use ($search) {
            $q->where('role_name', 'like', '%' . $search . '%')
                ->orWhereHas('menu', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                });
        });
    }
    
        $roles = $roles->paginate(25);
        $roles->getCollection()->transform(function ($role) {
        $menu_ids = explode(',', $role->menu_id); // Convert string to array
        $menus = Menu::whereIn('id', $menu_ids)->pluck('name')->toArray(); // Get menu names
        $role->menu_names = implode(', ', $menus); // Add a new property
        return $role;
    });

        $rolesWithMenus = $roles;
    
        return view('hr.role&menu.manage-roles', compact('rolesWithMenus','search'));
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

        $countRID = Role::select('rid')->count();
        $currentCount = $countRID + 1;
        $roles = new Role();
        $roles->rid = "R"."-".$currentCount;
        $roles->role_name = $request->role_name;
        $roles->fullname = $request->fullname;
        $roles->menu_id =$checkString;

        $roles->save();
        return redirect()->route('manage-roles')->with('success','Role created successfully !');
    }

    public function edit(Request $request, $id){

        // $role = Role::where('id',$id)->get();
        
        $role = Role::find($id);
        $roles_assigned_arr = explode(",", $role['menu_id']);
        // dd($roles_assigned_arr);
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
        // dd($roles_assigned_arr);
        // dd($menus);
        return view('hr.role&menu.manage-role-edit',compact('menus','roles_assigned_arr','role'));
    }
    public function update(Request $request,$id){
   
    $role= Role::find($id);
    $checkMenuArray = $request->input('checkMenu'); 
     $checkString ='';
    if(is_array($checkMenuArray)){
        $checkString = implode(',', $checkMenuArray);
    }
    $role->menu_id =$checkString;
    $role->fullname = $request->fullname;
    $role->save();
    return redirect()->route('manage-roles')->with('success','Role updated successfully !');
    }


    public function destroy(Request $request,$id){
       
        Role::where('id', $id)->delete();
        return redirect()->route('manage-roles')->with(['success' =>'Role Deleted !']);
    }
}
