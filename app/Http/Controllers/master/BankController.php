<?php

namespace App\Http\Controllers\master;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Throwable;

class BankController extends Controller
{
    /**
     * Display a listing of the bank.
     */
    public function index()
    {
        $banks = Bank::paginate(10);
        return view('hr.bank-details', compact('banks'));
    }

    /**
     * Show the form for creating a new bank.
     */
    public function create()
    {
        return view('hr.add_bank');
    }

    /**
     * Store a newly created bank in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified bank.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified bank.
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified bank in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified bank from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
