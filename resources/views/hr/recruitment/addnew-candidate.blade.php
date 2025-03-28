@extends('layouts.master', ['title' => 'Add New Candidate'])
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')

<div class="row mt-3">
    <form class="form add_candidate" enctype="multipart/form-data" action="{{route('recruitment.store')}}" method="POST">
        @csrf
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="text-white">Add Jobseeker</h2>
                </div>
                <div class="row px-3">
                    @if(auth()->user()->hasPermission('recruitment-list'))
                    <div class="col-md-12 d-flex justify-content-end ml-5">
                        <a href="{{route('recruitment-list')}}"><button type="button" class="btn btn-sm btn-primary mt-3">Jobseeker List <i class="fa-solid fa-list"></i></button></a>
                    </div>
                    @endif
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">First Name <span class="text-danger">**</span></label>
                            <input type="text" maxlength="50" class="form-control form-control-sm" id="f-name" name="firstname"value="{{old('firstname')}}" placeholder="Enter your First Name">
                            <span class="error text-danger mt-2" id="error-fname"></span>
                        </div>

                      
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Last Name <span class="text-danger">**</span></label>
                            <input type="text" maxlength="50" class="form-control form-control-sm" id="l-name" name="lastname" value="{{old('lastname')}}" placeholder="Enter Your Last Name">
                            <span class="error text-danger mt-2" id="error-lname"></span>
                        </div>

                    
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Date Of Birth <span class="text-danger">**</span></label>
                            <input type="date" class="form-control form-control-sm" name="dob" value="{{old('dob')}}">
                            <span class="error text-danger mt-2" id="error-dob"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Position Title <span class="text-danger">**</span></label>
                            <input type="text" maxlength="50" class="form-control form-control-sm" name="job_position" value="{{old('job_position')}}" placeholder="Enter Job Position Title">
                            <span class="error text-danger mt-2" id="error-job_position"></span>
                        </div>

                      
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Department <span class="text-danger">**</span></label>
                            <select class="form-select" name="department">
                                <option value="">Select Department type</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->department}}" {{ old('department') == $department->department ? 'selected' : '' }}>{{$department->department}}</option>
                                @endforeach
                            </select>
                            <span class="error text-danger mt-2" id="error-department"></span>
                        </div>

                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Education <span class="text-danger">**</span></label>
                            <select class="form-select" name="education">
                                <option value="">Select Qualification</option>
                                @foreach ($qualification as $item)
                                <option value="{{$item->qualification}}" {{old('education') == $item->qualification ? 'selected' : ''}}>{{$item->qualification}}</option>
                                @endforeach
                            </select>
                            <span class="error text-danger mt-2" id="error-education"></span>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Location <span class="text-danger">**</span></label>
                            <input type="text" maxlength="100" class="form-control form-control-sm" name="location" value="{{old('location')}}" placeholder="Enter Your Current Location">
                            <span class="error text-danger mt-2" id="error-location"></span>
                        </div>

                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Experience <span class="text-danger">**</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" name="experience" value="{{old('experience')}}" placeholder="Enter Experience in Years">
                            <span class="error text-danger mt-2" id="error-experience"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Recruitment Type <span class="text-danger">**</span></label>
                            <select class="form-select" name="recruitment_type">
                                <option value="">Select Type</option>
                                <option value="fresh" {{old('recruitment_type') == 'fresh' ? 'selected' : ''}}>Fresh</option>
                                <option value="external" {{old('recruitment_type') == 'external' ? 'selected' : ''}}>External</option>
                                <option value="deployment" {{old('recruitment_type') == 'deployment' ? 'selected' : ''}}>Deployment</option>
                            </select>
                            <span class="error text-danger mt-2" id="error-recruitment_type"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Email <span class="text-danger">**</span></label>
                            <input type="email" class="form-control form-control-sm" name="email" value="{{old('email')}}" placeholder="Enter Your Email">
                            <span class="error text-danger mt-2" id="error-email"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Contact <span class="text-danger">**</span></label>
                            <input type="text" class="form-control form-control-sm" name="phone" value="{{old('phone')}}" placeholder="Enter Your Contact No" maxlength="10">
                            <span class="error text-danger mt-2" id="error-phone"></span>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="resume" class="form-label">Resume <span class="text-danger">**</span></label>
                            <input class="form-control form-control-sm" name="resume" type="file" accept=".pdf">
                            <span class="error text-danger mt-2" id="error-resume"></span>
                        </div>

                
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="skills" class="form-label">Skills <span class="text-danger">**</span></label>
                            <select class="form-select js-example-basic-multiple" name="skill[]" multiple="multiple">
                                <option value="">Select Skills</option>
                                @foreach ($skills as $skill)
                                <option value="{{$skill->skill}}" {{ old('skill') && in_array($skill->skill, old('skill')) ? 'selected' : ''}}>{{$skill->skill}}</option>
                                @endforeach
                            </select>
                            <span class="error text-danger mt-2" id="error-skills"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end gap-3">
            <div>
                <a href="{{('recruitment-report')}}"> <button type="button" class="btn btn-sm btn-primary mt-3">Cancel </button></a>
            </div>
            <div>
                <button type="submit" class="btn btn-sm btn-primary mt-3" id="submit-btn">Submit </button>

            </div>
           
            
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/hr/add_candidate.js') }}"></script>

<script>
    $(document).ready(function(){
      $("#submit-btn").click(function(event){
        event.preventDefault();  
    
        var isValid = true;
    
        
        $(".error").text('');
    
       
        var regexName = /^[a-zA-Z\s]+$/;
        var regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;  
        var regexContact = /^[0-9]{10}$/;
    
        let firstname = $("#f-name").val().trim();
    
        
        if (firstname === "" || !regexName.test(firstname)) {
          $("#error-fname").text("First Name is  must only contain letters.");
          isValid = false;
        }
    
      
        if ($("#l-name").val().trim() === "" || !regexName.test($("#l-name").val().trim())) {
          $("#error-lname").text("Last Name  is required  only contain letters.");
          isValid = false;
        }
    
     
        if ($("input[name='dob']").val().trim() === "") {
          $("#error-dob").text("Date of Birth is required.");
          isValid = false;
        }
    
        
        if ($("input[name='job_position']").val().trim() === "") {
          $("#error-job_position").text("Position Title is required.");
          isValid = false;
        }
    
       
        if ($("select[name='department']").val() === "") {
          $("#error-department").text("Department is required.");
          isValid = false;
        }
    
     
        if ($("select[name='education']").val() === "") {
          $("#error-education").text("Education is required.");
          isValid = false;
        }
    
      
        if ($("input[name='location']").val().trim() === "") {
          $("#error-location").text("Location is required.");
          isValid = false;
        }
    
        
        if ($("input[name='experience']").val().trim() === "") {
          $("#error-experience").text("Experience is required.");
          isValid = false;
        }
    
        
        if ($("select[name='recruitment_type']").val() === "") {
          $("#error-recruitment_type").text("Recruitment Type is required.");
          isValid = false;
        }
    
       
        var email = $("input[name='email']").val().trim();
        if (email === "" || !regexEmail.test(email)) {
          $("#error-email").text("Please enter a valid email.");
          isValid = false;
        }
    
       
        var contact = $("input[name='phone']").val().trim();
        if (contact.length !== 10 || isNaN(contact)) {
          $("#error-phone").text("Please enter a valid 10-digit contact number.");
          isValid = false;
        }
    
        
        if ($("input[name='resume']").get(0).files.length === 0) {
          $("#error-resume").text("Resume is required.");
          isValid = false;
        }
    
       
        if ($("select[name='skill[]']").val().length === 0) {
          $("#error-skills").text("At least one skill is required.");
          isValid = false;
        }
    
       
        if (isValid) {
          $("form").submit();
        }
      });
    });
    </script>
    
@endsection
