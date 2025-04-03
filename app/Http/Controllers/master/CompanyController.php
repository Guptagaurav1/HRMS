<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Throwable;

class CompanyController extends Controller
{
    /**
     * Show company listing.
     */
    public function index(Request $request)
    {
        $companies = Company::select('id', 'name', 'email', 'mobile', 'address', 'registration_no')->where('status', '1');
        $search = '';
        if ($request->search) {
            $search = $request->search;
            $companies = $companies->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'. $search. '%')
                ->orWhere('mobile', 'LIKE', '%'. $search. '%')
                ->orWhere('email', 'LIKE', '%'. $search. '%')
                ->orWhere('address', 'LIKE', '%'. $search. '%')
                ->orWhere('registration_no', 'LIKE', '%'. $search. '%');
            });
        }

        $companies =  $companies->orderByDesc('id')->paginate(25);
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

    /**
     * View Company Form.
     */
    public function view($id)
    {
        try {
            $company = Company::findOrFail($id);
            return view('hr.company.view-company', compact('company'));
        } catch (Throwable $e) {
            return redirect()->route('company.list')->with(['error' => true, 'message' => 'Company not found']);
        }
    }
}
