<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmpDetail;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show Login Page.
    */ 
    public function login(){
        return view('login');
    }

    /**
     * Department Login. 
    */ 
    public function d_login(Request $request){
        $this->validate($request, [
            'email' => ['required', 'email:filter'],
            'password' => ['required']
        ]);
        $remember = $request->remember ? $request->remember : false;
        $user = User::where('email', $request->email)->first();
        if($user && $user->password === md5($request->password)){
            Auth::login($user);
            return redirect()->route('hr_dashboard');
        }
        else {
            return redirect()->route('login')->with(['error' => true, 'message' => 'Invalid Credentials.']);
        }
    }

    /**
     * Department Logout. 
    */
    public function d_logout(Request $request){
        if (Auth::check()) {
            Auth::logout();
        }
        else if(Auth::guard('employee')->check()){
            Auth::guard('employee')->logout();
        }
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect()->route('login');
    }

    /**
     * Employee Login. 
    */ 
    public function emp_login(Request $request){

         $this->validate($request, [
            'emp_code' => ['required'],
            'emp_password' => ['required']
        ]);
        $user = EmpDetail::where('emp_code', $request->emp_code)->first();
        if($user && $user->emp_password === md5($request->emp_password)){
                Auth::guard('employee')->login($user);
            if (Auth::guard('employee')->check()) {
                return redirect()->route('employee_dashboard');
            }
        }
        else {
            return redirect()->route('login')->with(['emperror' => true, 'message' => 'Invalid Credentials.']);
        }
    }
}
