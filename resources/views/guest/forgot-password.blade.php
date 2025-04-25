<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" id="primaryColor" href="{{ asset('assets/css/blue-color.css') }}">
    <link rel="stylesheet" id="rtlStyle" href="#">
    <title>Forgot Password</title>
    <script async src="{{ asset('assets/js/captcha/api.js') }}"></script>

</head>

<body class="light-theme">
    <div class="main-content login-panel">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{ 'assets/images/PrakharNEWLogo.png' }}" alt="Logo" width="30%">
                </div>
                <a href="{{ '/' }}"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h3 class="panel-title">Forgot Password</h3>

                {{-- Show error or notifications --}}
                @if (session()->has('error'))
                    <span class="text-danger">{{ session()->get('message') }}</span>
                @endif
                @if (session()->has('success'))
                    <span class="text-success">{{session()->get('message')}}<span class="text-danger border rounded-circle p-1 border-danger"><span id="countdown" class="p-1">5</span></span></span>
                    @endif 
                <!-- Reset Form -->
                <div class="my-2">
                    <form class="form send-reset-link" action="{{ route('guest.send-reset-link') }}" method="post">
                        @csrf
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <select name="role" id="roles" class="form-select" required>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->role_name }}">
                                        {{ $role->fullname}}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-group mb-20">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="text" name="email" class="form-control rounded-end"
                                value="{{ old('email') }}" placeholder="Enter Email Id" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Google Recaptcha -->
                        <div class="input-group mb-20">
                            <div class="g-recaptcha" data-sitekey={{ config('services.recaptcha.key') }}></div>
                            @error('g-recaptcha-response')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 login-btn">Submit <i class="fa-solid fa-check"></i></button>
                    </form>
                    <div class="mb-25 my-2">
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 text-light">Cancel <i class="fa-solid fa-xmark"></i></a>
                    </div>
                </div>

            </div>

        </div>
        <div class="footer">
            <p>Copyright©
                <script>
                    document.write(new Date().getFullYear())
                </script> All Rights Reserved By <span class="text-primary">HRMS</span>
            </p>
        </div>
    </div>
    <script src="{{ asset('assets/vendor/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/forgot-password.js') }}"></script>
    @if (session()->has('success'))
    <script src="{{ asset('assets/js/add_timer.js') }}"></script>
    @endif

</body>

</html>
