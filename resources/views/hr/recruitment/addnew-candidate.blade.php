@extends('layouts.master', ['title' => 'Add New Candidate'])
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class=" panel-header">
    <h2 class="mt-2">Create Jobseeker</h2>
</div>
<div class="row mt-3">
    <form class="form add_candidate" enctype="multipart/form-data" action="{{route('recruitment.store')}}" method="POST">
        @csrf
        <div class="col-12">
            <div class="panel">
            <div class="panel-header">
                <h5 class="text-white">Add Jobseeker</h5>
            </div>
            <div class="row px-3">
                <div class="col-md-12 d-flex justify-content-end ml-5">
                    <a href="{{route('recruitment-list')}}"><button type="button" class="btn btn-sm btn-primary mt-3">Jobseeker List <i class="fa-solid fa-list"></i></button></a>
                            
                </div>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">First Name </label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" name="firstname" value="{{old('firstname')}}" placeholder="Enter your First Name" required>
                        @error('firstname')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" placeholder="Enter Your last name" name="lastname" value="{{old('lastname')}}" required>
                        @error('lastname')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control form-control-sm" name="dob" value="{{old('dob')}}" placeholder="Select Date of Birth" required>
                        @error('dob')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Position Title</label>
                        <input type="text" maxlength="50" class="form-control form-control-sm" placeholder="Enter Job Position Title" name="job_position" value="{{old('job_position')}}" required>
                        @error('job_position')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Department</label>
                        <select class="form-select" name="department" value="{{old('department')}}" required>
                            <option value=""> Select Department type</option>
                            @foreach ($departments as $department)
                            <option value="{{$department->department}}">{{$department->department}}</option>
                            @endforeach
                        </select>
                        @error('department')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Education</label>
                        <select class="form-select" name="education" required>
                            <option value=""> Select Qualification</option>
                            @foreach ($qualification as $item)
                            <option value="{{$item->qualification}}" {{old('education') == $item->qualification ? 'selected' : ''}}>{{$item->qualification}}</option>
                            @endforeach
                        </select>
                        @error('education')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Location</label>
                        <input type="text" maxlength="100" class="form-control form-control-sm" placeholder="Enter Your Current location" name="location" value="{{old('location')}}" required>
                        @error('location')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Experience</label>
                        <input type="number" min="0" class="form-control form-control-sm" placeholder="Enter Experience in years" name="experience" value="{{old('experience')}}" required>
                        @error('experience')
                        <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Recruitment Type</label>
                        <select class="form-select" name="recruitment_type" required>
                            <option value=""> Select Type</option>
                            <option value="fresh" {{old('recruitment_type') == 'fresh' ? 'selected' : ''}}>Fresh</option>
                            <option value="external" {{old('recruitment_type') == 'external' ? 'selected' : ''}}>External</option>
                            <option value="deployement" {{old('recruitment_type') == 'deployement' ? 'selected' : ''}}>Deployment</option>
                        </select>
                        @error('recruitment_type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" placeholder="Enter Your Email" name="email" value="{{old('email')}}" required>
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact</label>
                        <input type="number" class="form-control form-control-sm" placeholder="Enter Your contact no" name="phone" value="{{old('phone')}}" required>
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="resume" class="form-label">Resume</label>
                        <input class="form-control form-control-sm" name="resume" type="file" accept=".pdf">
                        @error('resume')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="skills" class="form-label">Skills</label>
                        <select class="form-select js-example-basic-multiple" name="skill[]"  multiple="multiple" required>
                            <option value=""> Select Skills</option>
                            @foreach ($skills as $skill)
                            <option value="{{$skill->skill}}" {{ old('skill') && in_array($skill->skill, old('skill')) ? 'selected' : ''}}>{{$skill->skill}}</option>
                            @endforeach
                        </select>
                        @error('skills')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end ">
        <button type="submit" class="btn btn-sm btn-primary submit-btn">Submit <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/hr/add_candidate.js') }}"></script>
@endsection