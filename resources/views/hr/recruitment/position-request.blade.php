@extends('layouts.master', ['title' => 'Position Request Form'])
@section('contents')
<div class="panel">
<div class="panel-header">
        <h2 class="text-white">New Position Request {{ auth()->user()->role->role_name }}</h2>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                <li>Position Request</li>
            </ul>
        </div>

    </div>
</div>

<div class="row mt-3">
    <form class="form" method="post" action="{{route('save-position-request')}}" enctype="multipart/form-data">
        @csrf
        <div class="d-none">
            <input type="hidden" name="recruitment_type" value="fresh">
            <input type="hidden" name="old_city" value="{{old('city')}}">
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Position Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                      
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Position Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="position_title"
                                value="{{old('position_title')}}" placeholder="Enter Position" required>
                                <span class="text-danger error-message" id="error-position_title"></span>
                            @error('position_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                     
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Client Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm for_char" name="client_name"
                                value="{{old('client_name')}}" placeholder="Enter Client Name" required>
                                <span class="client_name" ></span>
                            @error('client_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Department<span class="text-danger">*</span></label>
                            <select class="form-select" name="department" required>
                                <option value=""> Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" {{old('department')==$department->id ? 'selected' :
                                    ''}}>{{$department->department}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-message" id="error-department"></span>
                            @error('department')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employement Type<span class="text-danger">*</span></label>
                            <select class="form-select" name="employment_type" value="{{old('employment_type')}}"
                                required>
                                <option value="">Select Employment Type</option>
                                <option value="Permenant" {{old('employment_type')=='Permenant' ? 'selected' : '' }}>
                                    Permanent</option>
                                <option value="Contractual" {{old('employment_type')=='Contractual' ? 'selected' : ''
                                    }}>
                                    Contractual</option>
                            </select>
                            <span class="text-danger error-message" id="error-employment_type"></span>
                            @error('employment_type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                     
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">No Of Requirements <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" name="no_of_requirements"
                                value="{{old('no_of_requirements')}}" placeholder="Enter Requirements in Number "
                                required>
                                <span class="text-danger error-message" id="error-no_of_requirements"></span>
                            @error('no_of_requirements')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                     
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">State<span class="text-danger">*</span></label>
                            <select class="form-select" name="state" id="states" required>
                                <option value=""> Select State</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}" {{old('state')==$state->id ? 'selected' :
                                    ''}}>{{$state->state}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-message" id="error-state"></span>
                            @error('state')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">City<span class="text-danger">*</span></label>
                            <select class="form-select" name="city" value="{{old('city')}}" id="city" required>
                                <option value="">Select City</option>
                            </select>
                            <span class="text-danger error-message" id="error-city"></span>
                            
                            @error('city')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Last Date Of Fulfilment</label>
                            <input type="date" name="date_notified" value="{{old('date_notified')}}"
                                class="form-control form-control-sm" min="{{date('Y-m-d')}}">
                            @error('date_notified')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                            <label class="form-label w-100">Salary range <span class="text-danger">*</span></label>
                            <div class="d-flex w-100">
                                <input type="number" class="form-control form-control-sm me-2" name="salary_from"
                                    value="{{old('salary_from')}}" placeholder="From" min="0" required>
                                    <span class="text-danger error-message" id="error-salary_from"></span>
                                    
                                @error('salary_from')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="number" class="form-control form-control-sm" name="salary_to"
                                    value="{{old('salary_to')}}" placeholder="To" min="0" required>
                                    <span class="text-danger error-message" id="error-salary_to"></span>
                                @error('salary_to')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                     
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Functional Role <span class="text-danger">*</span><a
                                    href="{{route('functional-role')}}" class="ms-2">
                                    <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1"
                                        style="font-size: 10px;"></i>
                                </a></label>
                            <div class="">
                                <select class="form-select" name="functional_role[]"
                                    multiple="multiple" id="functional-role-fields" required>
                                    <option value="">Nothing Selected</option>
                                    @foreach($functional_role as $role)
                                    <option value="{{$role->id}}" {{old('functional_role') && in_array($role->id,
                                        old('functional_role')) ? 'selected' : ''}}>{{$role->role}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger error" id="error-functional_role"></span>
                                @error('functional_role')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="job_description" class="form-label">Job Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" name="job_description" placeholder="Enter Job Description"
                                required>{{old('job_description')}}</textarea>
                                <span class="text-danger error-message" id="error-job_description"></span>
                                
                            @error('job_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="remarks" class="form-label">Remarks <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="remarks" placeholder="Enter Remarks Here"
                                required>{{old('remarks')}}</textarea>
                                <span class="text-danger error-message" id="error-remarks"></span>
                            @error('remarks')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Eligibility Criteria</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                      
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Education<span class="text-danger">*</span> <a
                                    href="{{route('qualification')}}" class="ms-2">
                                    <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1"
                                        style="font-size: 10px;"></i>
                                </a></label>
                            <select class="form-select" name="education[]" multiple="multiple"
                              id="education"  required>
                                <option value="">Nothing Selected</option>
                                @foreach($qualification as $qualify)
                                <option value="{{$qualify->qualification}}" {{old('education') && in_array($qualify->qualification,
                                    old('education')) ? 'selected' : ''}}>{{$qualify->qualification}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-message" id="error-education[]"></span>
                            @error('education')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                            <label class="form-label w-100">Experience <span class="text-danger">*</span></label>
                            <div class="d-flex w-100">
                                <input type="number" class="form-control form-control-sm me-2" name="exp_from"
                                    value="{{old('exp_from')}}" placeholder="From" min="0" required>
                                    <span class="text-danger error-message" id="error-exp_form"></span>
                                @error('exp_from')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="number" class="form-control form-control-sm" name="exp_to"
                                    value="{{old('exp_to')}}" placeholder="To" min="0" required>
                                    
                                @error('exp_to')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Skillsets <span class="text-danger">*</span> <a
                                    href="{{route('skills.index')}}" class="ms-2">
                                    <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1"
                                        style="font-size: 10px;"></i>
                                </a></label>
                            <select class="form-select " multiple="multiple"
                                name="skill_sets[]" id="placeholder" required>
                                <option value="">Nothing Selected</option>
                                @foreach($skills as $skill)
                                <option value="{{$skill->skill}}" {{old('skill_sets') && in_array($skill->skill,
                                    old('skill_sets')) ? 'selected' : ''}}>{{$skill->skill}}</option>
                                @endforeach
                            </select>
                            @error('skill_sets')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                       
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Requested By <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm"
                                value="{{auth()->user()->first_name}}" name="requested_by" readonly required>
                            @error('requested_by')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                     
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="attachment" class="form-label">Attachments</label>
                            <input class="form-control form-control-sm" name="attachment" type="file" accept=".pdf">
                            @error('attachment')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Assign To <span class="text-danger">*</span></label>
                            <select class="form-select " multiple="multiple"
                                name="assigned_executive[]" id="assign-to" required>
                                <option value="">Nothing Selected</option>
                                @foreach($hr_executives as $hr_executive)
                                <option value="{{$hr_executive->id}}" {{old('assigned_executive') &&
                                    in_array($hr_executive->id, old('assigned_executive')) ? 'selected' : ''}}>
                                    {{$hr_executive->first_name." ".$hr_executive->last_name}}</option>
                                @endforeach
                            </select>
                            @error('assigned_executive')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-end align-items-center gap-3 mt-2 px-1">
           
            <div>
                <button type="button" class="btn btn-sm btn-secondary">Cancel</button>
            </div>
            <div>
                <button type="submit" class="btn btn-sm btn-primary" id="submit-btn">Submit</button>
            </div>

            
           
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/hr/position_request.js')}}"></script>
<script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection
