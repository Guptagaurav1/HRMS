<?php

namespace App\Http\Controllers\master;

use App\Models\FunctionalRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FunctionalRoleController extends Controller
{
    /**
     * Display a listing of the functional role.
     */
    public function index()
    {
        $roles = FunctionalRole::paginate(10);
        return view('hr.functional-role', compact('roles'));
    }

    /**
     * Show the form for creating a new functional role.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created functional role in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(FunctionalRole $functionalRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FunctionalRole $functionalRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FunctionalRole $functionalRole)
    {
        //
    }
}
