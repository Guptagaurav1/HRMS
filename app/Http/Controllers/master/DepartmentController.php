<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Skill;
use App\Models\DepartmentSkill;
use Illuminate\Support\Facades\DB;
use Throwable;


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
            'department' => 'required|unique:departments|max:255',

            'skill' => 'required|max:255'
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
        $department = DepartmentSkill::with('skills')->whereNotNull('deleted_at')->where('permanent_id',$department->id)->get(); 
        $skills = Skill::select('id','skill')->get();
        $departments = Department::select('id','department')->get();
        return view('hr.master.department.department-edit',compact('department','departments','skills'));
    }

    public function update(Department $department, Request $request){
       
            $request->validate([
                'department' => 'required|max:255|unique:departments,department,'.$department->id,
                'skill' => 'required|max:255'
            ]);

            try{

           // Update the department details
            $department->department = $request->department;
            $department->save();

            // Validate the skills input
            $skills = $request->skill;

            if ($skills === null || empty($skills)) {
                return redirect()->back()->with(['error' => 'Please select at least one skill.']);
            }

            // Get current skill associations for the department
            $currentSkills = DepartmentSkill::where('department_id', $department->id)->pluck('skill_id')->toArray();

            // Determine skills to add and remove
            $skillsToAdd = array_diff($skills, $currentSkills);
            $skillsToRemove = array_diff($currentSkills, $skills);

            // Remove unselected skills
            DepartmentSkill::where('department_id', $department->id)
                ->whereIn('skill_id', $skillsToRemove)
                ->delete();

                // Add new skills
            foreach ($skillsToAdd as $skillId) {
                DepartmentSkill::create([
                    'department_id' => $department->id,
                    'skill_id' => $skillId,
                    'status' => '1', // Assuming status is required
                ]);
            }

                \DB::commit();
            }catch(Throwable $th){
                DB::rollBack();
            return redirect()->route('departments.index')->with(['success' =>'Department Updated !']);

            }
                
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
