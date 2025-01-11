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

</head>
<body class="light-theme">
    <div class="main-content login-panel">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{'assets/images/PrakharNEWLogo.png'}}" alt="Logo" width="30%">
                </div>
                <a href="{{'/'}}"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h3 class="panel-title">Login</h3>
                <div class="row mb-3">
                    <div class="col-md-12" style="width: 100%">
                        <ul class="nav nav-tabs" id="tabContent" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="department-tab" data-bs-toggle="tab" href="#department" role="tab" aria-controls="department" aria-selected="true">DEPARTMENT</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link inactive" id="employee-tab" data-bs-toggle="tab" href="#employee" role="tab" aria-controls="employee" aria-selected="false">EMPLOYEE</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Tab Contents -->
                <div id="department-content" class="tab-content">
                    @if(session()->has('error'))
                    <span class="text-danger">{{session()->get('message')}}</span>
                    @endif
                   
                    <form action="{{route('department_login')}}" method="post">
                        @csrf
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email Id" required>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group mb-20">
                            <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                            <input type="password" name="password" class="form-control rounded-end" placeholder="Password" required>
                            <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       
                        <button type="submit" class="btn btn-primary w-100 login-btn">Submit</button>
                    </form>
                </div>
                <div id="employee-content" class="tab-content">
                    @if(session()->has('emperror'))
                    <span class="text-danger">{{session()->get('message')}}</span>
                    @endif
                    <form action="{{route('employee_login')}}" method="post">
                        @csrf
                        <div class="input-group mb-25">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input type="text" class="form-control" name="emp_code" placeholder="Enter Employee Code" required>
                            @error('emp_code')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group mb-20">
                            <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                            <input type="password" class="form-control rounded-end" name="emp_password" placeholder="Password" required>
                            <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                            @error('emp_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100 login-btn">Submit</button>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-25 mx-3">
               
                <a href="reset-password.html" class="text-white fs-14">Forgot Password?</a>
            </div>
            
        </div>
        <div class="footer">
            <p>Copyright© <script>document.write(new Date().getFullYear())</script> All Rights Reserved By <span class="text-primary">HRMS</span></p>
        </div>
    </div>
    <script src="{{asset('assets/vendor/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/login.js')}}"></script>
    
</body>
</html>