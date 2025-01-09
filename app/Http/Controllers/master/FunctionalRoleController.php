<?php

namespace App\Http\Controllers\master;

use App\Models\FunctionalRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Throwable;


class FunctionalRoleController extends Controller
{
    /**
     * Display a listing of the functional role.
     */
    public function index()
    {
        $roles = FunctionalRole::orderByDesc('id')->paginate(10);
        return view('hr.functional-role', compact('roles'));
    }

    /**
     * Show the form for creating a new functional role.
     */
    public function create()
    {
        return view('hr.add_functional_role');
    }

    /**
     * Store a newly created functional role in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => [
                'required', 
                Rule::unique('functional_roles', 'role')->where(function ($query) {
                 $query->whereNull('deleted_at');
                }), 'max:255']
        ]);

        try {
            DB::beginTransaction();

            FunctionalRole::create([
            'role' => $request->role
            ]);

            DB::commit();
            return redirect()->route('functional-role')->with(['success' => true, 'message' => 'Role created successfully.']); 
        }
        catch(Throwable $th){
            DB::rollBack();
               return redirect()->route('functional-role')->with(['error' => true, 'message' => 'Server Error.']); 
        }
       

    }

    /**
     * Display the specified resource.
     */
    public function show(FunctionalRole $functionalRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $data = FunctionalRole::findOrFail($id);
            return view('hr.edit-functional_role', compact('data')); 
        }
        catch(Throwable $th){
            return redirect()->route('functional-role')->with(['error' => true, 'message' => 'Server Error.']); 
        }
         
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'role' => [
            'required',
            'max:255',
            Rule::unique('functional_roles', 'role')->where(function ($query) use ($id) {
            $query->whereNull('deleted_at')
                  ->where('id', '!=', $id);
            }),
        ],
    ]);

        try {
            DB::beginTransaction();

            $role = FunctionalRole::findOrFail($id);
 
            $role->role = $request->role;
             
            $role->save();

            DB::commit();
            return redirect()->route('functional-role')->with(['success' => true, 'message' => 'Role updated successfully.']); 
        }
        catch(Throwable $th){
            DB::rollBack();
               return redirect()->route('functional-role')->with(['error' => true, 'message' => 'Server Error.']); 
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        try {
            $record = FunctionalRole::findOrFail($id);
            $record->delete();
            return response()->json(['success' => true, 'message' => 'Role deleted successfully.']); 

        }
        catch(Throwable $th){
            return response()->json(['error' => true, 'message' => 'Server Error.']); 
        } 
    }
}
