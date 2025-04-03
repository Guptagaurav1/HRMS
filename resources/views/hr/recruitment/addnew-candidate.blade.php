@extends('layouts.master', ['title' => 'Add New Candidate'])

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
                            <input type="text" maxlength="50" class="form-control form-control-sm for_char" name="firstname" value="{{old('firstname')}}" placeholder="Enter your First Name" required>
                            <span class="firstname"></span>
                        </div>

                      
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Last Name <span class="text-danger">**</span></label>
                            <input type="text" maxlength="50" class="form-control form-control-sm for_char"  name="lastname" value="{{old('lastname')}}" placeholder="Enter Your Last Name" required>
                            <span class="lastname"></span>
                        </div>

                    
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Date Of Birth <span class="text-danger">**</span></label>
                            <input type="date" class="form-control form-control-sm" name="dob" value="{{old('dob')}}" required>
                            <span class="error text-danger mt-2" id="error-dob"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Position Title <span class="text-danger">**</span></label>
                            <input type="text" maxlength="50" class="form-control form-control-sm" name="job_position" value="{{old('job_position')}}" placeholder="Enter Job Position Title" required>
                            <span class="error text-danger mt-2" id="error-job_position"></span>
                        </div>

                      
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Department <span class="text-danger">**</span></label>
                            <select class="form-select" name="department" required>
                                <option value="">Select Department type</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->department}}" {{ old('department') == $department->department ? 'selected' : '' }}>{{$department->department}}</option>
                                @endforeach
                            </select>
                            <span class="error text-danger mt-2" id="error-department"></span>
                        </div>

                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Education <span class="text-danger">**</span></label>
                            <select class="form-select" name="education" required>
                                <option value="">Select Qualification</option>
                                @foreach ($qualification as $item)
                                <option value="{{$item->qualification}}" {{old('education') == $item->qualification ? 'selected' : ''}}>{{$item->qualification}}</option>
                                @endforeach
                            </select>
                            <span class="error text-danger mt-2" id="error-education"></span>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Location <span class="text-danger">**</span></label>
                            <input type="text" maxlength="100" class="form-control form-control-sm" name="location" value="{{old('location')}}" placeholder="Enter Your Current Location" required>
                            <span class="error text-danger mt-2" id="error-location"></span>
                        </div>

                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Experience <span class="text-danger">**</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" name="experience" value="{{old('experience')}}" placeholder="Enter Experience in Years" required>
                            <span class="error text-danger mt-2" id="error-experience"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Recruitment Type <span class="text-danger">**</span></label>
                            <select class="form-select" name="recruitment_type" required>
                                <option value="">Select Type</option>
                                <option value="fresh" {{old('recruitment_type') == 'fresh' ? 'selected' : ''}}>Fresh</option>
                                <option value="external" {{old('recruitment_type') == 'external' ? 'selected' : ''}}>External</option>
                                <option value="deployment" {{old('recruitment_type') == 'deployment' ? 'selected' : ''}}>Deployment</option>
                            </select>
                            <span class="error text-danger mt-2" id="error-recruitment_type"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Email <span class="text-danger">**</span></label>
                            <input type="email" class="form-control form-control-sm for_char" name="email" value="{{old('email')}}" placeholder="Enter Your Email" required>
                            <span class="email"></span>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Contact <span class="text-danger">**</span></label>
                            <input type="text" class="form-control form-control-sm for_char" name="phone" value="{{old('phone')}}" placeholder="Enter Your Contact No" maxlength="10" required>
                            <span class="phone"></span>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="resume" class="form-label">Resume <span class="text-danger">**</span></label>
                            <input class="form-control form-control-sm" name="resume" type="file" accept=".pdf" required>
                            <span class="error text-danger mt-2" id="error-resume"></span>
                        </div>

                
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="skills" class="form-label">Skills <span class="text-danger">**</span></label>
                            <select class="form-select js-example-basic-multiple" name="skill[]" multiple="multiple" required>
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
                <a href="{{('recruitment-report')}}"> <button type="button" class="btn btn-sm btn-secondary mt-3">Cancel </button></a>
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
<script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection
