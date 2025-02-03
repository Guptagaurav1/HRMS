<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Department;
use App\Models\City;
use App\Models\FunctionalRole;
use App\Models\Qualification;
use App\Models\Skill;
use App\Models\User;
use App\Models\PositionRequest;
use Throwable;
use Illuminate\Validation\Rules\File;

class RecruitmentController extends Controller
{
    /**
     * Show the form of position request.
     */
    public function position_request(){
        $departments = Department::select('id', 'department')->whereNull('deleted_at')->get();
        $states = State::select('id', 'state')->whereNull('deleted_at')->get();
        $functional_role = FunctionalRole::select('id', 'role')->whereNull('deleted_at')->get();
        $qualification = Qualification::select('id', 'qualification')->whereNull('deleted_at')->get();
        $skills = Skill::select('id', 'skill')->whereNull('deleted_at')->get();
        $roleid = get_role_id('hr_executive');
        $hr_executives = User::select('id', 'first_name', 'last_name')->where('role_id', $roleid)->get();
        return view(" hr.position-request", compact('departments', 'states', 'functional_role', 'qualification', 'skills', 'hr_executives'));
    } 

    /**
     * Get cities from states.
     */
    public function get_cities(Request $request){
        $cities = City::select('id', 'city_name')->where(['state_code' => $request->stateid])->get();
        return response()->json(['success' => true, 'cities' => $cities]);
    } 

    /**
     * Store position request.
     */
    public function store_position(Request $request){

        $this->validate($request, [
            'position_title' => ['required'],
            'client_name' => ['required'],
            'department' => ['required'],
            'employment_type' => ['required'],
            'no_of_requirements' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'salary_from' => ['required'],
            'salary_to' => ['required'],
            'functional_role' => ['required'],
            'job_description' => ['required'],
            'remarks' => ['required'],
            'education' => ['required'],
            'exp_from' => ['required'],
            'exp_to' => ['required'],
            'skill_sets' => ['required'],
            'assigned_executive' => ['required'],
            'attachment' => [File::types(['pdf'])->max('2mb')]
        ]);

        $previous_requests = PositionRequest::select(['id', 'req_id'])->orderByDesc('id')->first();
        if ($previous_requests) {
            $req_id = $previous_requests->req_id + 1;
            $new_id = $previous_requests->id + 1;
        }
        else {
            $req_id = 1;
            $new_id = 1;
        }

        if ($request->file('attachment')) {
           $file = $request->file('attachment');
           $path = public_path('position-request/attachments');
           $full_filename = $file->getClientOriginalName();
           $filename = explode(".", $full_filename);
           $filename = $filename[0]."_".time().".".$filename[1];
           $request->attachment->move($path, $filename);
        }
        $record = new PositionRequest();
        $record->fill($request->all());
        $record->req_id = $req_id;
        $record->unique_id = $new_id . "/" . $request->position_title . "/" . $request->client_name;
        $record->salary_range = $request->salary_from.",".$request->salary_to;
        $record->functional_role = implode(",", $record->functional_role);
        $record->experience = $request->exp_from.",".$request->exp_to;
        $record->education = implode(",", $record->education);
        $record->skill_sets = implode(",", $record->skill_sets);
        $record->attachment = !empty($filename) ? $filename : '';
        $record->save();

        return redirect()->route('position-request');

    } 

}
