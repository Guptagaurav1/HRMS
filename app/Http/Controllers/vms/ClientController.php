<?php

namespace App\Http\Controllers\vms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Validation\Rule;
use Throwable;
use DB;

class ClientController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Eager load the related department data
        $clients = Client::whereNull('deleted_at');
        $search = $request->search;
        if ($search) {
            $clients->whereHas('user', function ($query) use ($search) {
                $query->where('last_name', 'like', "%$search%")
                    ->orwhere('first_name', 'like', "%$search%")
                    ->orwhere('email', 'like', "%$search%")
                    ->orwhere('phone', 'like', "%$search%")
                    ->orwhere('status', 'like', "%$search%")
                    ->orWhereHas('role', function ($query) use ($search) {
                        $query->where('role_name', 'like', "%$search%");
                    });
            });
        }

        $clients = $clients->paginate(20)->withQueryString();

        return view("vms.clients.lists-client", compact('clients', 'search'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        //fetch roles to show in add client page
        $role = Role::select('id')->where('role_name', 'VMS-Client')->orderBy('id', 'desc')->first();
        $companies = Company::select('id', 'name')->orderByDesc('id')->get();
        return view("vms.clients.add-client", compact('role', 'companies'));
    }

    
    /**
     * Store Client Details.
     */
    public function save(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users')->whereNull('deleted_at')],
            'phone' => 'required|digits:10',
            'role_id' => 'required',
            'dob' => 'required',
            'company_id' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $data = $request->all();
            $dob = $request->dob;
            $password_s = date('d-m-Y', strtotime($dob));
            $password = str_replace("-", "", $password_s);
            $enc_password = md5($password);
            $data['password'] = $enc_password;

            // Save User Data.
            $user_id = User::create($data)->id;

            // Save Client Data.
            $client_data = ['user_id' => $user_id];
            Client::create($client_data);

            DB::commit();
            return redirect()->route('clients.index')->with(['success' => true, 'message' => 'Client Added Successfully !']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('clients.index')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Edit Client.
     */
    public function edit($id)
    {
        //fetch roles to show in add vendor page
        $role = Role::where('role_name', 'VMS-Client')->orderBy('id', 'desc')->first();
        $companies = Company::select('id', 'name')->orderByDesc('id')->get();
        $client = Client::findOrFail($id);
        return view("vms.clients.edit-client", compact('role', 'companies', 'client'));
    }

    /**
     * Update Client Details.
     */
    public function update(Request $request)
    {
        $client = Client::findOrFail($request->id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($client->user_id)
                    ->whereNull('deleted_at')
            ],
            'phone' => 'required|digits:10',
            'dob' => 'required',
            'company_id' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['_token']);
            unset($data['id']);

            // Update User Data.
            User::where('id', $client->user_id)->update($data);

            DB::commit();
            return redirect()->route('clients.index')->with(['success' => true, 'message' => 'Client Updated Successfully !']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('clients.index')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

     /**
     * Delete Client.
     */
    public function destroy(Request $request)
    {
        $id = request()->id;

        try {
            $client = Client::findOrFail($id);
            DB::beginTransaction();
            $client->delete();
            User::where('id', $client->user_id)->update(['status' => '0']);
            User::where('id', $client->user_id)->delete();
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Client deleted successfully!']);
        } catch (Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }
}
