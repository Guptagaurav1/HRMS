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


    public function create(){
        $skills = Skill::select('id','skill')->get();
        return view('hr.master.department.department-add', compact('skills'));
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

        return redirect()->route('departments.index')->with('success','Department created !');

    }

    public function edit(Department $department){
        $department = $department->load('skills'); 
        $skills = Skill::select('id','skill')->get();
        $departments = Department::select('id','department')->get();
        return view('hr.master.department.department-edit',compact('department','departments','skills'));
    }

    public function update(Department $department, Request $request){
       
            $request->validate([
                'department' => 'required|unique:departments',
                'skill' => 'required'
            ]);
        
            $department->department = $request->department;
            $department->save();

            $skills = $request->skill;

            if ($skills === null || empty($skills)) {
                return redirect()->back()->with(['error' => 'Please select at least one skill.']);
            }

            DepartmentSkill::where('department_id', $department->id)->delete();

                foreach ($skills as $skillId) {
                    $newDepartmentSkill = new DepartmentSkill();
                    $newDepartmentSkill->department_id = $department->id;
                    $newDepartmentSkill->skill_id = $skillId; // Assuming $skillId is the ID of the skill
                    $newDepartmentSkill->status = 1;
                    $newDepartmentSkill->save();
                }

                    return redirect()->route('departments.index')->with(['success' =>'Department Updated !']);
                
        }

        public function destroy(Department $department){
            DepartmentSkill::where('department_id', $department->id)->delete();
            Department::where('id', $department->id)->delete();

            // return response()->json([
            //     'status' => 'success',
            //     'msg' => 'Department Deleted Successfully !',
            // ])
            return redirect()->route('departments.index')->with(['success' =>'Department Deleted !']);
        }
}
