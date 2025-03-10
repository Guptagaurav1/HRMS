<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Validation\Rule;

class DesignationController extends Controller
{
    // display listing of designation

    public function index(Request $request){
        $designations = Designation::orderBy('id','desc');
        $search = $request->search;

        if($search){
            $designations->where(function($q) use($search){
                $q->where('name', 'like','%'.$search.'%');
            });
        }
        
        $designations = $designations->paginate(10);
        return view("hr.master.designation.designation", compact('designations','search'));
    }

    // create form for add designation

    public function create(){
        return view("hr.master.designation.designation-add");
    }


    // create new designation 


    public function store(Request $request){
            $request->validate([
                'name' => [
                    'required',
                    'max:255',
                    Rule::unique('designations')->whereNull('deleted_at'),
                ]

            ]);

            $designation = new Designation();
            $designation->fill($request->all());
            $designation->status = '1';
            $designation->save();
            if($designation){
                return redirect()->route('designations.index')->with('success','Added Successfully !');
            }
    }

// edit designation 

    public function edit(Designation $designation){

        return view("hr.master.designation.designation-edit", compact('designation'));
    }

// update designation 

    public function update(Designation $designation, Request $request){
       
        $request->validate([
                'name' => [
                    'required',
                    'max:255',
                    Rule::unique('designations')->whereNull('deleted_at')->ignore($designation->id),
                ]
                
        ]);
        $designation->fill($request->all());
        $designation->status = '1';
        $designation->save();

        if($designation){
            return redirect()->route('designations.index')->with('success','Updated Successfully !');
        }
    }

    // delete designation 

    public function destroy(Designation $designation){
        $data = $designation->delete();
        return redirect()->back()->with('success','Deleted Successfully !');
    }
}
