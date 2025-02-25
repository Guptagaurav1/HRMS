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
        $banks = Bank::orderByDesc('id')->paginate(10);
        return view('hr.bank.bank-details', compact('banks'));
    }

    /**
     * Show the form for creating a new bank.
     */
    public function create()
    {
        return view('hr.bank.add_bank');
    }

    /**
     * Store a newly created bank in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_of_bank' => ['required', 'max:255', 'string'],
            'type_of_bank' => ['required', 'max:255', 'string']
        ]);

        try {
            DB::beginTransaction();

            Bank::create([
            'name_of_bank' => $request->name_of_bank,
            'type_of_bank' => $request->type_of_bank,
            ]);

            DB::commit();
            return redirect()->route('bank-details')->with(['success' => true, 'message' => 'Bank created successfully.']); 
        }
        catch(Throwable $th){
            DB::rollBack();
            return redirect()->route('bank-details')->with(['error' => true, 'message' => 'Server Error.']); 
        }
    }


    /**
     * Deactivate the specified bank from storage.
     */
    public function deactivate(Bank $bank, Request $request, $id)
    {

        try {

            DB::beginTransaction();

            $bank = Bank::findOrFail($id);
 
            $bank->status = 0;
             
            $bank->save();

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Bank deactivated successfully.']); 
        }
        catch(Throwable $th){
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }
    }

    /**
     * Activate the specified bank from storage.
     */
    public function activate(Bank $bank, Request $request, $id)
    {

        try {
            DB::beginTransaction();

            $bank = Bank::findOrFail($id);
            $bank->status = 1;
            $bank->save();

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Bank activated successfully.']); 
        }
        catch(Throwable $th){
            DB::rollBack();
            return response()->json(['error' => true, 'message' => 'Server Error.']); 
        }
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
