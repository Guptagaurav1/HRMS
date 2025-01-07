<?php

namespace App\Http\Controllers\master;

use App\Models\Qualification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Throwable;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualifications = Qualification::paginate(10);
        return view('hr.qualification', compact('qualifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hr.add_qualification');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'qualification' => [
                'required', 
                Rule::unique('qualifications', 'qualification')->where(function ($query) {
                 $query->whereNull('deleted_at');
                }), 'max:255']
        ]);

        try {
            DB::beginTransaction();

            Qualification::create([
            'qualification' => $request->qualification
            ]);

            DB::commit();
            return redirect()->route('qualification')->with(['success' => true, 'message' => 'Qualification created successfully.']); 
        }
        catch(Throwable $th){
            DB::rollBack();
            return redirect()->route('qualification')->with(['error' => true, 'message' => 'Server Error.']); 
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Qualification $qualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Qualification $qualification, $id)
    {
        try{
            $data = Qualification::findOrFail($id);
            return view('hr.edit-qualification', compact('data')); 
        }
        catch(Throwable $th){
            return redirect()->route('qualification')->with(['error' => true, 'message' => 'Server Error.']); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Qualification $qualification, $id)
    {
        $this->validate($request, [
        'qualification' => [
            'required',
            'max:255',
            Rule::unique('qualifications', 'qualification')->where(function ($query) use ($id) {
            $query->whereNull('deleted_at')
                  ->where('id', '!=', $id);
            }),
        ],
    ]);

        try {
            DB::beginTransaction();

            $qualification = Qualification::findOrFail($id);
 
            $qualification->qualification = $request->qualification;
             
            $qualification->save();

            DB::commit();
            return redirect()->route('qualification')->with(['success' => true, 'message' => 'Qualification updated successfully.']); 
        }
        catch(Throwable $th){
            DB::rollBack();
               return redirect()->route('qualification')->with(['error' => true, 'message' => 'Server Error.']); 
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qualification $qualification, $id)
    {
        try {
            $record = Qualification::findOrFail($id);
            $record->delete();
            return response()->json(['success' => true, 'message' => 'Qualification deleted successfully.']); 

        }
        catch(Throwable $th){
            return response()->json(['error' => true, 'message' => 'Server Error.']); 
        } 
    }
}
