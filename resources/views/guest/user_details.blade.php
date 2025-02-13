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
    <title>Personal Details Form</title>
</head>
<body class="light-theme">
    <div class="main-content d-flex justify-content-center">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo">
                    <img src="{{asset('assets/images/PrakharNEWLogo.png')}}" alt="Logo" width="30%">
                </div>
                <a href="{{'/'}}"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h3 class="panel-title">Recruitment Personal Details Form</h3>
                
                <!-- Tab Contents -->
                <div>
                    @if(session()->has('error'))
                    <span class="text-danger">{{session()->get('message')}}</span>
                    @endif
                   
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label mt-2">Gender</label>
                                    <select name="sel_gen" id="sel_gen" class="form-control" required>
                                      <option value="" selected="" disabled="">Select Gender</option>
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                      <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label mt-2">Category</label>
                                    <select name="sel_cat" id="sel_cat" class="form-control" required>
                                      <option value="" selected="" disabled="">Select Category</option>
                                      <option value="general">General</option>
                                      <option value="obc">OBC</option>
                                      <option value="sc">SC</option>
                                      <option value="st">ST</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Preferred Job Location</label>
                                    <input type="text" name="location" class="form-control" placeholder="Enter preffered job location" required>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                 <div class="form-group">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control" placeholder="Enter father's full name" required>
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Father's Contact No.</label>
                                    <input type="number" name="father_contact" class="form-control" placeholder="Enter father's contact number" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Blood Group</label>
                                    <select name="blood_group" class="form-control">
                                      <option value="Not Specified">Not Specified</option>
                                      <option value="a+">A+</option>
                                      <option value="a-">A-</option>
                                      <option value="b+">B+</option>
                                      <option value="b-">B-</option>
                                      <option value="o+">O+</option>
                                      <option value="o-">O-</option>
                                      <option value="ab+">AB+</option>
                                      <option value="ab-">AB-</option>
                                    </select>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">PF Number</label>
                                    <input type="number" name="pf_number" class="form-control" placeholder="Enter pf number" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Police verification Id</label>
                                    <input type="number" name="police_verification_number" class="form-control" placeholder="Enter Your Police Verification No." required>
                                    <input type="file" name="verification_file" class="form-control" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Nearest Police Station</label>
                                    <input type="number" name="police_station" class="form-control" placeholder="Enter nearest police station no." required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Marital Status</label>
                                    <select name="martial_status" class="form-control" required>
                                      <option value="Not Specified" selected="" disabled="">Not Specified</option>
                                      <option value="unmarried">Single</option>
                                      <option value="married">Married</option>
                                    </select>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Spouse Name</label>
                                    <input type="text" name="spouse_name" class="form-control" placeholder="Enter spouse name" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Date of Marriage</label>
                                    <input type="date" name="dom" class="form-control" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Passport No.</label>
                                    <input type="number" name="passport_no" class="form-control" placeholder="Enter Your Passport No." required>
                                    <input type="file" name="passport_file" class="form-control" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Aadhar Card No.</label>
                                    <input type="number" name="aadhar_no" class="form-control" placeholder="Enter Your Aadhar No." required>
                                </div>
                            </div>
                             <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Add Signature photo</label>
                                    <input type="file" name="signature_photo" class="form-control" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Add Passport size photo</label>
                                    <input type="file" name="photo" class="form-control" required>
                                </div>
                            </div>
                              <div class="col-md-12 my-2">
                                <div class="form-group">
                                    <label class="form-label">Language Known</label>
                                    <input type="text" name="father_contact" class="form-control" required>
                                </div>
                            </div>
                            
                            
                        </div>
                       
                       
                        <button type="submit" class="btn btn-primary w-100 login-btn">Submit</button>
                    </form>
                </div>
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
