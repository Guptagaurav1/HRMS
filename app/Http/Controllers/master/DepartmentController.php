<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Skill;
use App\Models\DepartmentSkill;
use App\Models\ReportingManager;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Validation\Rule;


class DepartmentController extends Controller
{
    // display listing of departments

    public function index(Request $request)
    {
        $departments = Department::whereHas('skills')->orderBy('id', 'desc');
        $departments = $departments->paginate(10);
        return view('hr.master.department.department', compact('departments'));
    }

    // display skill list on department-add form

    public function create()
    {
        $skills = Skill::select('id', 'skill')->get();
        $reporting_managers = ReportingManager::select('id', 'name')->get();
        return view('hr.master.department.department-add', compact('skills', 'reporting_managers'));
    }


    // Create new record of Departments

    public function save(Request $request)
    {
        $request->validate([
            'department' => [
                'required',
                Rule::unique('departments')->whereNull('deleted_at'),
                'max:255'
            ],
            'reporting_manager_id' => [
                'required',
                'integer',
                Rule::unique('departments')->whereNull('deleted_at')
            ],
            'skill' => 'required|max:255'
        ]);
        try {
            $departments = new Department();
            $departments->department = $request->department;
            $departments->reporting_manager_id = $request->reporting_manager_id;
            $departments->save();

            $skill = $request->skill;

            foreach ($skill as $key => $value) {
                $data = new DepartmentSkill();
                $data->department_id = $departments->id;
                $data->skill_id = $value;
                $data->status = 1;
                $data->save();
            }
            return redirect()->route('departments.index')->with('success', 'Department created !');
        } catch (Throwable $th) {
            return response()->json(['error' => true, 'message' => 'Server Error.']);
        }
    }

    // display department and skill  in edit-form

    public function edit(Department $department)
    {
        $department = $department->load('skills');
        $skills =   DepartmentSkill::where('department_id', $department->id)->pluck('skill_id');
        $skills = $skills->toArray();
        $total_skill = Skill::get();
        $reporting_managers = ReportingManager::select('id', 'name')->get();
        return view('hr.master.department.department-edit', compact('department', 'skills', 'total_skill', 'reporting_managers'));
    }


    // Update department

    public function update(Department $department, Request $request)
    {
        $id = $department->id;
        $request->validate([
            'department' => 'required|max:255|unique:departments,department,' . $department->id,
            'skill' => 'required|max:255',
            'reporting_manager_id' => [
                'required',
                'integer',
                Rule::unique('departments')->where(function ($query) use ($id) {
                    $query->whereNull('deleted_at')
                        ->where('id', '!=', $id);
                }),
            ]
        ]);

        try {
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
            return redirect()->route('departments.index')->with(['success' => 'Department Updated !']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('departments.index')->with(['error' => 'Something went wrong !']);
        }
    }


    // delete department

    public function destroy(Department $department)
    {
        DepartmentSkill::where('department_id', $department->id)->delete();
        Department::where('id', $department->id)->delete();
        return redirect()->route('departments.index')->with(['success' => 'Department Deleted !']);
    }

    /**
     * Store department through JS.
     */
    public function create_new(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'department' => [
                    'required',
                    Rule::unique('departments')->whereNull('deleted_at'),
                    'max:255'
                ],
                'reporting_manager_id' => [
                    'required',
                    'integer',
                    Rule::unique('departments')->whereNull('deleted_at')
                ],
                'skill' => 'required|max:255'
            ]);

            $departments = new Department();
            $departments->department = $request->department;
            $departments->reporting_manager_id = $request->reporting_manager_id;
            $departments->save();

            $skill = $request->skill;

            foreach ($skill as $key => $value) {
                $data = new DepartmentSkill();
                $data->department_id = $departments->id;
                $data->skill_id = $value;
                $data->status = 1;
                $data->save();
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Department created successfully!']);
        } catch (Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server Error.']);
        }
    }

    public function get_departments(Request $request){
        $departments = Department::select('id', 'department')->whereHas('skills')->get();
        return response()->json(['success' => true, 'departments' => $departments]);
    }
}
