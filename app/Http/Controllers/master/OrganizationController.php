<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\State;
use App\Models\City;
use Illuminate\Validation\Rule;
class OrganizationController extends Controller
{
     // display listing of organization 

    public function index(Request $request){
        $organizations = Organization::orderBy('id','desc');
        $search = $request->search;

        if($search){
            $organizations->where(function($q) use($search){
                $q->where('name', 'like','%'.$search.'%');
                $q->orWhere('email', 'like','%'.$search.'%');
                $q->orWhere('contact', 'like','%'.$search.'%');
            });
        }
        
        $organizations = $organizations->paginate(20)->withQueryString();
        return view("hr.master.organization.organization", compact('organizations','search'));
    }

    // create organization form

    public function create(){
        //select all states
        $states = State::select('id','state')->get();
        return view("hr.master.organization.organization-add", compact('states'));
    }

    // create new  organization

    public function store(Request $request){

        // validate data
            $request->validate([
                'name' => [
                    'required',
                    'max:255',
                    Rule::unique('organizations')->whereNull('deleted_at'),
                ],
                'address' => 'required|max:255',
                'email' => 'required|max:255',
                'contact' => 'required|digits:10',
                'state_id' => 'required',
                'city_id' => 'required',
                'postal_code' => 'required|max:6',
                'psu' => 'required',
                'psu_name' => 'required_if:psu,yes',
            ]);

            // save data

            $organization = new Organization();
            $organization->fill($request->all());
            $organization->status = '1';
            $organization->save();
            if($organization){
                return redirect()->route('organizations.index')->with('success','Added Successfully !');
            }
    }


    /**
     * Show the details for a given organization.
     */

     public function show(Organization $organization)
     {

        $data = $organization->load('getState','getCity');
        return response()->json([
            'data' =>  $data ,
            'status' => 'success',
            'msg'=> 'Record Fetch'
        ]);
     }


    // edit organization


    public function edit(Organization $organization){
        $states = State::select('id','state')->get();
        $cities = City::select('id','city_name')->get();
        return view("hr.master.organization.organization-edit", compact('organization','states','cities'));
    }

    // update organization

    public function update(Organization $organization, Request $request){
       
        $request->validate([
                'name' => 'required|max:255|unique:organizations,name,'.$organization->id,
                'address' => 'required|max:255',
                'email' => 'required|max:255',
                'contact' => 'required|digits:10',
                'state_id' => 'required',
                'city_id' => 'required',
                'postal_code' => 'required|max:6',
        ]);
        $organization->fill($request->all());
        $organization->status = '1';
        $organization->save();

        if($organization){
            return redirect()->route('organizations.index')->with('success','Updated Successfully !');
        }
    }

    // delete organization

    public function destroy(Organization $organization){
        $data = $organization->delete();
        return redirect()->back()->with('success','Deleted Successfully !');
    }

    public function GetCity($id){
        $city = City::select('id','city_name')
                ->where('state_code',$id)
                ->get();

        return response()->json([
            'data' =>  $city,
            'status' => 'success',
            'msg'=> 'Record Fetch'
        ]);
    }
}
