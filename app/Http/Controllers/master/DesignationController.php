<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
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

    public function create(){
        return view("hr.master.designation.designation-add");
    }

    public function store(Request $request){
            $request->validate([
                'name' => 'required|max:255|unique:designations',
            ]);

            $designation = new Designation();
            $designation->fill($request->all());
            $designation->status = '1';
            $designation->save();
            if($designation){
                return redirect()->route('designations.index')->with('success','Added Successfully !');
            }
    }

    public function edit(Designation $designation){

        return view("hr.master.designation.designation-edit", compact('designation'));
    }

    public function update(Designation $designation, Request $request){
       
        $request->validate([
                'name' => 'required|max:255|unique:designations,name,'.$designation->id,
        ]);
        $designation->fill($request->all());
        $designation->status = '1';
        $designation->save();

        if($designation){
            return redirect()->route('designations.index')->with('success','Updated Successfully !');
        }
    }

    public function destroy(Designation $designation){
        $data = $designation->delete();
        return redirect()->back()->with('success','Deleted Successfully !');
    }
}
