<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="{{asset('assets/vendor/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" id="primaryColor" href="{{asset('assets/css/blue-color.css')}}">
    <link rel="stylesheet" id="rtlStyle" href="#">
    <title>Reset Password</title>
    <script async src="{{asset('assets/js/captcha/api.js')}}"></script>

</head>
<body class="light-theme">
    <div class="main-content login-panel position-relative">
        <div class="login-body mt-2">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{asset('assets/images/PrakharNEWLogo.png')}}" alt="Logo" width="30%">
                </div>
                <a href="{{'/'}}"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h3 class="panel-title">Set New Password</h3>
                
                {{-- Show error or notifications --}}
                @if(session()->has('error'))
                <span class="text-danger">{{session()->get('message')}}</span>
                @endif
                @if(session()->has('success'))
                <span class="text-success">{{session()->get('message')}}<span class="text-danger border rounded-circle p-1 border-danger"><span id="countdown" class="p-2">5</span></span></span>
                @endif
                <!-- Tab Contents -->
                {{-- Show password requirements --}}
                <div class="jumbotron border my-2 p-2 bg-grey text-danger">
                    <p>Password must meet the following requirements:</p>
                    <ul>
                        <li>At least 8 characters long</li>
                        <li>Contain at least one uppercase letter</li>
                        <li>Contain at least one lowercase letter</li>
                        <li>Contain at least one number</li>
                        <li>Contain at least one special character (!@#$%^&amp;*)</li>
                    </ul>
                </div>
                <div>
                    <form class="form reset-form" action="{{route('guest.reset-password')}}" method="post">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="token" value="{{$token}}">
                        </div>
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-key"></i></span>
                            <input type="password" name="password" class="form-control rounded-end password"  placeholder="Enter New Password" minlength="8" required>
                            <span class="input-group-text"><i class="fa-regular fa-eye-slash eye"></i></span>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-key"></i></span>
                            <input type="password" name="password_confirmation" class="form-control rounded-end password" placeholder="Confirm Password" minlength="8" required>
                            <span class="input-group-text"><i class="fa-regular fa-eye-slash eye"></i></span><br>
                            
                            @error('password_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-20">
                            <span class="text-danger confirm"></span>
                        </div>
                       <!-- Google Recaptcha -->
                       <div class="input-group mb-20">
                        <div class="g-recaptcha" data-sitekey={{config('services.recaptcha.key')}}></div>
                        @error('g-recaptcha-response')
                           <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary w-100 login-btn">Submit</button>
                    </form>
                    <div class="mb-25 my-2">
                        <a href="{{route('login')}}" class="btn btn-primary w-100 text-light">Cancel</a>
                    </div>
                </div>
              
            </div>
            
        </div>
        <div class="footer">
            <p>Copyright© <script>document.write(new Date().getFullYear())</script> All Rights Reserved By <span class="text-primary"><a href="{{ websiteUrl() }}"> PSSL</a></span></p>
        </div>
    </div>
    <script src="{{asset('assets/vendor/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{asset('assets/js/reset-password.js')}}"></script>
    @if (session()->has('success'))
    <script src="{{ asset('assets/js/add_timer.js') }}"></script>
    @endif
</body>
</html>
