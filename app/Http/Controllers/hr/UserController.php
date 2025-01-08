<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\AddUser;
use Illuminate\Support\Facades\Mail;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = user::all();
        $users = user::orderBy('id','desc');
        $users = $users->paginate(10);
        // dd($users);
        return view(" hr.users-list",compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(" hr.add-user");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->first_name);
        $request->validate([
            
            'first_name' => 'required',
            'last_name' => 'required',
            'department' => 'required',
            'email' => 'required',
            'contact' => 'required|digits:10',
            'company_id' => 'required',
            'user_type' => 'required'
          ]);
        $dob = $request->dob;
        $password_s =date('d-m-Y',strtotime($dob));
        $password = str_replace("-", "", $password_s);
        $enc_password = md5($password);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->enc_password;
        $user->password = $enc_password;
        $user->phone = $request->contact;
        $user->department_id = $request->department;
        $user->company_id = $request->company_id;
        $user->user_type = $request->user_type;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        
        $user_type = $request->user_type;
        $name = $request->first_name .''.$request->last_name;
            $email = $request->email;
        $url ='https/hrms';
        // $url = env(APP_URL);
        // mail  to user 
        // dd($name, $to, $password_s, $url, $user_type);
        
        if ($email != " ") {
            Mail::to($email)->send(new AddUser($name, $email, $password, $url, $user_type));    //
        }
        $user->save();
        // User::create($request->all());
        return redirect()->route('users.index')
        ->with('success', 'User created successfully.');
      

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = user::find($id);
        // return View::make('hr.edit-user')
        //     ->with('user', $user);
        return view('hr.edit-user', compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
