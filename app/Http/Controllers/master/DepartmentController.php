<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Skill;
use App\Models\DepartmentSkill;

class DepartmentController extends Controller
{
    public function index(Request $request){
        $departments = Department::orderBy('id','desc');
        $departments = $departments->paginate(10);
        $skills = Skill::select('id','skill')->get();
        return view('hr.master.department.department', compact('departments','skills'));
    }

    public function save(Request $request){

        $request->validate([
            'department' => 'required|unique:departments',
            'skill' => 'required'
        ]);

        $departments = new Department();
        $departments->department = $request->department;
        $departments->save();

        $skill = $request->skill;
       
        foreach($skill as $key => $value){
            $data = New DepartmentSkill();
            $data->department_id = $departments->id;
            $data->skill_id = $value;
            $data->status = 1;
            $data->save();
           
        }

        return redirect()->back()->with('success','Department Added Successfully !');

    }

    public function edit(Department $department){
        $data = $department->load('skills');
    dd($data);

        return view('hr.master.department.department-edit',compact('data'));
    }
}
