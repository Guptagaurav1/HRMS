<?php

namespace App\Http\Controllers\vms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Validation\Rule;
use Throwable;
use DB;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Eager load the related department data
        $vendors = Vendor::whereNull('deleted_at');
        $search = $request->search;
        if ($search) {
            $vendors->whereHas('user', function ($query) use ($search) {
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

        $vendors = $vendors->paginate(20)->withQueryString();

        return view("vms.vendors.lists-vendor", compact('vendors', 'search'));
    }

    /**
     * Show the form for creating a new Vendor.
     */
    public function create()
    {
        //fetch roles to show in add vendor page
        $roles = Role::where('role_name', 'VMS-Vendor')->orderBy('id', 'desc')->get();
        $companies = Company::select('id', 'name')->orderByDesc('id')->get();
        return view("vms.vendors.add-vendor", compact('roles', 'companies'));
    }

    /**
     * Store Vendor Details.
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
            'address' => 'required',
            'company_id' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['address']);
            $dob = $request->dob;
            $password_s = date('d-m-Y', strtotime($dob));
            $password = str_replace("-", "", $password_s);
            $enc_password = md5($password);
            $data['password'] = $enc_password;

            // Save User Data.
            $user_id = User::create($data)->id;

            // Save Vendor Data.
            $vendor_data = ['user_id' => $user_id, 'address' => $request->address];
            Vendor::create($vendor_data);

            DB::commit();
            return redirect()->route('vendors.index')->with(['success' => true, 'message' => 'Vendor Added Successfully !']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('vendors.index')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Edit Vendor.
     */
    public function edit($id)
    {
        //fetch roles to show in add vendor page
        $role = Role::where('role_name', 'VMS-Vendor')->orderBy('id', 'desc')->first();
        $companies = Company::select('id', 'name')->orderByDesc('id')->get();
        $vendor = Vendor::findOrFail($id);
        return view("vms.vendors.edit-vendor", compact('role', 'companies', 'vendor'));
    }

    /**
     * Update Vendor Details.
     */
    public function update(Request $request)
    {
        $vendor = Vendor::findOrFail($request->id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->where('id', '!=', $vendor->user_id)
                    ->whereNull('deleted_at')
            ],
            'phone' => 'required|digits:10',
            'dob' => 'required',
            'address' => 'required',
            'company_id' => 'required'
        ]);

        try {
            DB::beginTransaction();
            $data = $request->all();
            unset($data['address']);
            unset($data['_token']);
            unset($data['id']);

            // Update User Data.
            User::where('id', $vendor->user_id)->update($data);

            // Update Vendor Data.
            Vendor::where('id', $vendor->id)->update(['address' => $request->address]);

            DB::commit();
            return redirect()->route('vendors.index')->with(['success' => true, 'message' => 'Vendor Updated Successfully !']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('vendors.index')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Delete Vendor.
     */
    public function destroy(Request $request)
    {
        $id = request()->id;

        try {
            $vendor = Vendor::findOrFail($id);
            DB::beginTransaction();
            $vendor->delete();
            User::where('id', $vendor->user_id)->update(['status' => '0']);
            User::where('id', $vendor->user_id)->delete();
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Vendor deleted successfully!']);
        } catch (Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => true, 'message' => $th->getMessage()]);
        }
    }
}
