<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\DepartmentSkill;
use App\Models\Skill;
use App\Models\CompanyMaster;
use DB;

class MasterController extends Controller
{
    /**
     * Get Skills.
    */
    public function skills(Request $request){
        // $skills = DepartmentSkill::select('department.department', DB::raw('group_concat(skills.skill SEPARATOR ", ") AS skill') )
        // ->join('skills', 'department_skills.skill_id', '=', 'skills.id')
        // ->join('department', 'department_skills.dept_id', '=', 'department.id')
        // ->groupBy('department_skills.dept_id', 'department.department')
        // ->paginate(10);

        // return view("hr.skill");
    }

    /**
     * Get all company details.
    */
    public function company_details(Request $request)
    {
        $details = CompanyMaster::get();
        return view("hr.company.company-master", compact('details'));
    }


}
