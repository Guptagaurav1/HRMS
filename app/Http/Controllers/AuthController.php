<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        if($user->password === md5($request->password)){
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
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect()->route('login');
    }
}
