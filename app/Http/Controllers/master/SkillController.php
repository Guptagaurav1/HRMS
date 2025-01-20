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
        $skills = Skill::orderBy('id','desc')->paginate(10);

        return view("hr.master.skills.skill", compact('skills'));
    }

    public function create(){
        return view("hr.master.skills.skill-add");
    }

    public function save(Request $request){
            $request->validate([
                'skill' => 'required|max:255|unique:skills'
            ]);

            $skill = new Skill();
            $skill->skill = $request->skill;
            $skill->status = '1';
            $skill->save();
            if($skill){
                return redirect()->route('skills.index')->with('success','Skill Added Successfully !');
            }
    }

    public function edit(Skill $skill){

        return view("hr.master.skills.skill-edit", compact('skill'));
    }

    public function update(Skill $skill, Request $request){
       
        $request->validate([
            'skill' => 'required|max:255|unique:skills,skill,'.$skill->id,
        ]);
        $skill->skill = $request->skill;
        $skill->status = '1';
        $skill->save();
        
        if($skill){
            return redirect()->route('skills.index')->with('success','Skill updated Successfully !');
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
