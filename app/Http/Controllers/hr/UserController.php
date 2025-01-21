<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Company;
use App\Models\Role;
use App\Mail\AddUser;
use Illuminate\Support\Facades\Mail;
use Throwable;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        // $users = user::with('department') // Eager load the related department data
        $users = user::with('role') 
        ->orderBy('id', 'desc') 
        ->paginate(10);
        return view(" hr.user.users-list",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('id','desc')->get();
        $roles = Role::orderBy('id','desc')->get();
        $companys = Company::orderBy('id','desc')->get();
        return view(" hr.user.add-user",compact('departments','roles','companys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            
            'first_name' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'email' => 'required|unique:users,email',
            'contact' => 'required|digits:10',
            'company_id' => 'required',
            'role_id' => 'required'
          ]);
        $dob = $request->dob;
        $password_s =date('d-m-Y',strtotime($dob));
        $password = str_replace("-", "", $password_s);
        $enc_password = md5($password);
       
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $enc_password;
        $user->phone = $request->contact;
        $user->department_id = $request->department;
        $user->company_id = $request->company_id;
        $user->role_id = $request->role_id;

        $user->gender = $request->gender;
        $user->dob = $request->dob;
        
        $role_id = $request->role_id;
        $name = $request->first_name .''.$request->last_name;
            $email = $request->email;
        $url ='https/hrms';
       
        // dd($user);
        if ($email != " ") {
            Mail::to($email)->send(new AddUser($name, $email, $password, $url, $role_id));    //
        }
        $user->save();
        // User::create($request->all());
        return redirect()->route('users')
        ->with('success', 'User Added Successfully !');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $user = user::find($id);
        $departments = Department::orderBy('id','desc')->get();
        $roles = Role::orderBy('id','desc')->get();
        $companys = Company::orderBy('id','desc')->get();
        return view('hr.user.edit-user', compact('user','departments','roles','companys'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = user::find($id);
        $departments = Department::orderBy('id','desc')->get();
        $roles = Role::orderBy('id','desc')->get();
        $companys = Company::orderBy('id','desc')->get();
        return view('hr.user.edit-user', compact('user','departments','roles','companys'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            
            'first_name' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'email' => 'required',
            'contact' => 'required|digits:10',
            'company_id' => 'required',
            'role_id' => 'required'
        ]);
       
        
        $user= user::find($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->contact,
            'department_id' => $request->department,
            'company_id' => $request->company_id,
            'role_id' => $request->role_id,
            'gender' => $request->gender,
            'dob' => $request->dob,
        ]);

        return redirect()->route('users')->with('success','User Updated Successfully !');
    }
  
    // user active/deactive method
    public function updateStatus(Request $request, User $user)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|boolean', // Ensure status is either 0 or 1
        ]);

        // Update the user status
        $user->status = $request->status;
        $user->save();

        // Return a response with the updated status
        return response()->json([
            'status' => $user->status,
            'message' => 'User status updated successfully.'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    { 
        // dd($id);
        User::where('id', $id)->delete();
        // return redirect()->back()->with('success','User Deleted Successfully !');
        return redirect()->route('users')->with(['success' =>'Role Deleted !']);
    }
}
