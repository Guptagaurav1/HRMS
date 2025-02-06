<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index(Request $request){
        $organizations = Organization::orderBy('id','desc');
        $search = $request->search;

        if($search){
            $organizations->where(function($q) use($search){
                $q->where('name', 'like','%'.$search.'%');
            });
        }
        
        $organizations = $organizations->paginate(10);
        return view("hr.master.organization.organization", compact('organizations','search'));
    }

    public function create(){
        return view("hr.master.organization.organization-add");
    }

    public function store(Request $request){
            $request->validate([
                'name' => [
                    'required',
                    'max:255',
                    Rule::unique('organizations')->whereNull('deleted_at'),
                ],
                'address' => 'required|max:255',
                'email' => 'required|max:255',
                'contact' => 'required|digits:10',
            ]);

            $organization = new Organization();
            $organization->fill($request->all());
            $organization->status = '1';
            $organization->save();
            if($organization){
                return redirect()->route('organizations.index')->with('success','Added Successfully !');
            }
    }

    public function edit(Organization $organization){

        return view("hr.master.organization.organization-edit", compact('organization'));
    }

    public function update(Organization $organization, Request $request){
       
        $request->validate([
                'name' => 'required|max:255|unique:organizations,name,'.$organization->id,
                'address' => 'required|max:255',
                'email' => 'required|max:255',
                'contact' => 'required|digits:10',
        ]);
        $organization->fill($request->all());
        $organization->status = '1';
        $organization->save();

        if($organization){
            return redirect()->route('organizations.index')->with('success','Updated Successfully !');
        }
    }

    public function destroy(Organization $organization){
        $data = $organization->delete();
        return redirect()->back()->with('success','Deleted Successfully !');
    }
}
