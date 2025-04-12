<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmpDetail;
use App\Models\Role;
use App\Models\ResetPassword;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use App\Rules\ReCaptcha;
use App\Mail\ShortlistMail;
use App\Models\EmpUpdateHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\IpUtils;
use Throwable;
use Mail;
use stdClass;


class AuthController extends Controller
{
    /**
     * Show Login Page.
     */
    public function login()
    {
        return view('login');
    }

    /**
     * Department Login. 
     */
    public function d_login(Request $request)
    {
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

        if ($response->successful() && $result->success == true) {   // Validate captcha
            $remember = $request->remember ? $request->remember : false;
            $user = User::where(['email' => $request->email, 'status' => '1'])->first();
            if ($user && $user->password === md5($request->password)) {
                Auth::login($user);
                $user = auth()->user();
                $roleName = get_role_name($user->role_id);

                if ($roleName == 'hr_operations') {
                    return redirect()->route('hr_operations_dashboard');
                } else {
                    return redirect()->route('hr_dashboard');
                }
            } else {
                return redirect()->route('login')->with(['error' => true, 'message' => 'Invalid Credentials.']);
            }
        }
    }

    /**
     * Department Logout. 
     */
    public function d_logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        } else if (Auth::guard('employee')->check()) {
            Auth::guard('employee')->logout();
        }
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Employee Login. 
     */
    public function emp_login(Request $request)
    {

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
        if ($response->successful() && $result->success == true) {    // Validate captcha

            // Employee must be active or resign for login.
            $user = EmpDetail::where(['emp_code' => $request->emp_code])
                ->where(function ($query) {
                    $query->where('emp_current_working_status', 'active')
                        ->orWhere('emp_current_working_status', 'resign');
                })->first();
            if ($user && $user->emp_password === md5($request->emp_password)) {
                Auth::guard('employee')->login($user);
                if (Auth::guard('employee')->check()) {
                    return redirect()->route('employee.dashboard');
                }
            } else {
                return redirect()->route('login')->with(['emperror' => true, 'message' => 'Invalid Credentials.']);
            }
        }
    }

    /**
     * Show the forgot password page. 
     */
    public function forget_password()
    {
        $roles = Role::select('role_name', 'id')->where('status', '1')->get();
        return view('guest.forgot-password', compact('roles'));
    }

    /**
     * Send reset password form link to employee or user. 
     */
    public function send_reset_link(Request $request)
    {
        $this->validate($request, [
            'role' => ['required', 'string'],
            'email' => ['required'],
            'g-recaptcha-response' => ['required']
        ], [
            'email.required' => 'This field is required',
            'role.required' => 'This field is required',
            'g-recaptcha-response.required' => 'captcha is required'
        ]);

        $url = "https://www.google.com/recaptcha/api/siteverify";
        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->{'g-recaptcha-response'},
            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
        ];
        $response = Http::asForm()->post($url, $body);
        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
            try {
                DB::beginTransaction();
                $reciever_email = '';
                // Generate token.
                $token = sha1(mt_rand(1, 90000) . 'SALT');

                // If user is employee.
                if ($request->role == 'employee') {
                    $employee = EmpDetail::select('emp_email_first', 'emp_name')->where('emp_code', $request->email)->firstOrFail();
                    $reciever_email = $employee->emp_email_first;
                    $usertype = 'employee';
                    $name = $employee->emp_name;
                } else {
                    $roleid = get_role_id($request->role); // Get role id from role name.
                    $user = User::where(['email' => $request->email, 'role_id' => $roleid])->firstOrFail();
                    $usertype = $user->role->role_name;
                    $reciever_email = $request->email;
                    $name = $user->first_name . " " . $user->last_name;
                }

                // Save Token.
                // First update expire previous token it is in pending state.
                ResetPassword::where(['status' => 'pending', 'email' => $reciever_email, 'user_type' => $usertype])->update([
                    'status' => 'expired',
                ]);
                ResetPassword::create([
                    'token' => $token,
                    'email' => $reciever_email,
                    'user_type' => $usertype,
                ]);

                // Send Mail.
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail(1);
                $reset_link = route('guest.reset-password-form', ['token' => $token]);
                $html = "<h4>You are getting this email because you requested for change password.</h4></br>
                        <h4>Click Below Button to change your Password</h4></br>
                        <h4><a href='$reset_link'>Click Here</a></h4>";

                $maildata = new stdClass();
                $maildata->subject = "Forget Password";
                $maildata->name = $name;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($reciever_email)->send(new ShortlistMail($maildata));

                DB::commit();
                return redirect()->route('guest.forgot-password')->with(['success' => true, 'message' => "Password reset link send to $reciever_email successfully."]);
            } catch (Throwable $e) {
                DB::rollBack();
                return redirect()->route('guest.forgot-password')->with(['error' => true, 'message' => 'Invalid Credentials']);
            }
        }
    }

    /**
     * Show reset password form. 
     */
    public function reset_password($token)
    {
        try {
            $reset_password = ResetPassword::where('token', $token)->where('status', 'pending')->firstOrFail();
            return view('guest.reset-password-form', compact('token'));
        } catch (Throwable $th) {
            return redirect()->route('guest.forgot-password')->with(['error' => true, 'message' => 'Invalid Token.']);
        }
    }

    /**
     * Update password. 
     */
    public function reset_password_action(Request $request)
    {
        $this->validate($request, [
            'token' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()],
            'g-recaptcha-response' => ['required']
        ], [
            'password.required' => 'This field is required',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Password and Confirm Password do not match',
            'g-recaptcha-response.required' => 'captcha is required'
        ]);
        try {
            DB::beginTransaction();
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

                $token_details = ResetPassword::select('email', 'user_type')->where('token', $request->token)->where('status', 'pending')->firstOrFail();
                if ($token_details->user_type == 'employee') {
                    $user = EmpDetail::where('emp_email_first', $token_details->email)->firstOrFail();
                    $user->emp_password = md5($request->password);
                    $name = $user->emp_name;
                } else {
                    $user = User::where('email', $token_details->email)->where('role_id', get_role_id($token_details->user_type))->firstOrFail();
                    $user->password = md5($request->password);
                    $name = $user->first_name . " " . $user->last_name;
                }
                // Update user password.
                $user->save();

                // Update status to complete.
                ResetPassword::where('token', $request->token)->where('status', 'pending')->update([
                    'status' => 'completed',
                ]);

                // Send Password Reset Email.
                $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail(1);
                $url_link = route('login');
                $html = "<h4>Your password changed successfully.</h4></br>
                    <h4>Your New Password is $request->password </h4></br>
                    <h4>Click Below Button to login your account</h4></br>
                    <h4><a href='" . $url_link . "'>Click Here</a></h4>";

                $maildata = new stdClass();
                $maildata->subject = "Password Changed";
                $maildata->name = $name;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($token_details->email)->send(new ShortlistMail($maildata));

                // Fire Password Reset Event.
                event(new PasswordReset($user));

                DB::commit();
                return redirect()->route('guest.forgot-password')->with(['success' => true, 'message' => 'Password changed successfully. Check your email for new password..']);
            }
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('guest.forgot-password')->with(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Change password form.
     */
    public function change_password()
    {
        return view("all.change-password");
    }

    /**
     * Update password from profile page. 
     */
    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'confirmed', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()],
            'password_confirmation' => ['required']
        ], [
            'password.required' => 'This field is required',
            'password.min' => 'Password must be at least 8 characters long',
            'password.confirmed' => 'Password and Confirm Password do not match',
        ]);
        try {
            DB::beginTransaction();

            if (auth('employee')->check()) {
                $empdetails = auth('employee')->user();
                $user = EmpDetail::where('emp_email_first', $empdetails->emp_email_first)->firstOrFail();
                $user->emp_password = md5($request->password);
                $name = $user->emp_name;
                $email = $empdetails->emp_email_first;
                // Save change log of employee.
                EmpUpdateHistory::create([
                    'emp_code' => $empdetails->emp_code,
                    'column_name' => 'password',
                    'old_value' => '',
                    'new_value' => md5($request->password),
                ]);

            } else {
                $user = User::where('email', auth()->user()->email)->firstOrFail();
                $user->password = md5($request->password);
                $name = $user->first_name . " " . $user->last_name;
                $email = $user->email;

            }
            // Update user password.
            $user->save();

            // Send mail to user.
            $url_link = route('login');
            $company = Company::select('name', 'mobile', 'address', 'website', 'email')->findOrFail(1);
            $html = "<h4>Your password changed successfully.</h4></br>
                    <h4>Your New Password is $request->password </h4></br>
                    <h4>Click Below Button to login your account</h4></br>
                    <h4><a href='" . $url_link . "'>Click Here</a></h4>";

                $maildata = new stdClass();
                $maildata->subject = "Password Changed";
                $maildata->name = $name;
                $maildata->comp_email = $company->email;
                $maildata->comp_phone = $company->mobile;
                $maildata->comp_website = $company->website;
                $maildata->comp_address = $company->address;
                $maildata->content = $html;
                $maildata->url = url('/');
                Mail::to($email)->send(new ShortlistMail($maildata));

            DB::commit();
            return redirect()->route('user.change-password')->with(['success' => true, 'message' => 'Password changed successfully.']);
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('user.change-password')->with(['error' => true, 'message' => $e->getMessage()]);
        }
    }
}
