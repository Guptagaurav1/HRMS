<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Department;
use App\Models\DepartmentSkill;
use DB;


class SkillController extends Controller
{
    public function index(Request $request){
        $departments = Department::whereHas('skills', function($q){
            $q->whereNull('skills.deleted_at'); 
        })
        ->paginate(10);

        return view("hr.master.skills.skill", compact('departments'));
    }

    public function save(Request $request){
            $request->validate([
                'skill' => 'required|unique:skills'
            ]);

            $skill = new Skill();
            $skill->skill = $request->skill;
            $skill->status = 1;
            $skill->save();
            if($skill){
                return redirect()->back()->with('success','Skill Added Successfully !');
            }
    }

    public function destroy($id){
        $departments = DepartmentSkill::where('department_id', $id)->get();
        foreach($departments as $department){
            $data = DepartmentSkill::find($department->id);
            $data->delete();
        }

        return redirect()->back()->with('success','Skill Deleted Successfully !');
    }

}
