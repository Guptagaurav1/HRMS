<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenants.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validation

        $validateData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|numeric',
            'gender' => 'required|max:255',
            'email' => ['required',Rule::unique('users')->whereNull('deleted_at')],
            'dob' => 'required|max:255',
            'company_name' => 'required|max:255',
            'company_address' => 'required|max:255',       
            'domain_name' => 'required|string|max:255|unique:domains,domain'    
          ]);
        $dob = $request->dob;
        $password_s =date('d-m-Y',strtotime($dob));
        $password = str_replace("-", "", $password_s);
        $enc_password = md5($password);
       
        $tenant = Tenant::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $enc_password,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'domain_name' => $request->domain_name
        ]);
            
        tenancy()->initialize($tenant);
        
        $tenant->domains()->create([
            'domain' => $tenant->domain_name . '.' . config('app.domain'),
        ]);
        return redirect()->route('tenants.index')->with('success', 'Tenant Added Successfully !');
       

       
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
