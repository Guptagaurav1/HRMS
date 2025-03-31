<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Show company listing.
     */ 
    public function index()
    {
        $companies = Company::orderByDesc('id')->paginate(25);
        $search = '';
        return view('hr.company.index', compact('companies', 'search'));
    }

     /**
     * Add company Form.
     */ 
    public function create()
    {
        return view('hr.company.add-company');
    }

    /**
     * Store Company Data.
     */ 
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' =>'required|string|max:255',
        //     'email' =>'required|email|unique:companies',
        //     'phone' =>'required|numeric',
        //     'address' =>'required|string|max:255',
        // ]);
        Company::create($request->all());
        return redirect()->route('company.list')->with(['success' => true, 'message' => 'Company created successfully']);
    }
}
