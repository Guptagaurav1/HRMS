<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Skill;
use App\Models\DepartmentSkill;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Validation\Rule;


class DepartmentController extends Controller
{
    public function index(Request $request){
        $departments = Department::whereHas('skills')->orderBy('id','desc');
        $departments = $departments->paginate(10);
        return view('hr.master.department.department', compact('departments'));
    }


    public function create(){
        $skills = Skill::select('id','skill')->get();
        return view('hr.master.department.department-add', compact('skills'));
    }

    public function save(Request $request){
        $request->validate([
            'department' => [
                'required',
                Rule::unique('departments')->whereNull('deleted_at'),
                'max:255'
            ],
            'skill' => 'required|max:255'
        ]);
        try {
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
            }catch(Throwable $th){
                return response()->json(['error' => true, 'message' => 'Server Error.']); 
            }


    }

    public function edit(Department $department){
        $department = $department->load('skills'); 
        $skills=   DepartmentSkill::where('department_id',$department->id)->pluck('skill_id');
        $skills = $skills->toArray();
        $total_skill= Skill::get();
        return view('hr.master.department.department-edit',compact('department','skills','total_skill'));
    }

    public function update(Department $department, Request $request){
       
            $request->validate([
                'department' => 'required|max:255|unique:departments,department,'.$department->id,
                'skill' => 'required|max:255'
            ]);

            try{
                DB::beginTransaction();
                
                $department->department = $request->department;
                    if (!$department->save()) {
                        return redirect()->back()->with(['error' => 'Failed to update department.']);
                    }

                    $skills = $request->skill;
                    if (!is_array($skills) || empty($skills)) {
                        return redirect()->back()->with(['error' => 'Please select at least one skill.']);
                    }
                    $currentSkills = DepartmentSkill::where('department_id', $department->id)
                        ->pluck('skill_id')
                        ->toArray();

                    $skillsToAdd = array_diff($skills, $currentSkills);
                    $skillsToRemove = array_diff($currentSkills, $skills);

                    if (!empty($skillsToRemove)) {
                        DepartmentSkill::where('department_id', $department->id)
                            ->whereIn('skill_id', $skillsToRemove)
                            ->delete();
                    }

                    foreach ($skillsToAdd as $skillId) {
                        $data = new DepartmentSkill();
                        $data->department_id = $department->id; // Corrected from `$departments->id`
                        $data->skill_id = $skillId;
                        $data->status = '1';
                        $data->save();
                    }                        
                DB::commit();
                return redirect()->route('departments.index')->with(['success' =>'Department Updated !']);
            }catch(Throwable $th){
                DB::rollBack();
                return redirect()->route('departments.index')->with(['error' =>'Something went wrong !']);
            }
        }

        public function destroy(Department $department){
            DepartmentSkill::where('department_id', $department->id)->delete();
            Department::where('id', $department->id)->delete();
            return redirect()->route('departments.index')->with(['success' =>'Department Deleted !']);
        }
}
