<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmpDetail;
use Illuminate\Support\Facades\Auth;
use App\Rules\ReCaptcha;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;
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
            'password' => ['required'],
            'g-recaptcha-response' => ['required']
        ], [
            'g-recaptcha-response' => 'captcha is required'
        ]);


        // Validate Captcha response.
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->{'g-recaptcha-response'},
            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
        ];
        $response = Http::asForm()->post($url, $body);
        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
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
        $recaptcha_response = $request->input('g-recaptcha-response');
        if (is_null($recaptcha_response)) {
            return redirect()->route('login')->with(['captchError' => 'captcha is required']);
        }
        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
        ];
    
        $response = Http::asForm()->post($url, $body);
        $result = json_decode($response);
        if ($response->successful() && $result->success == true) {
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
}
