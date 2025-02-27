@extends('layouts.master', ['title' => 'Position Request Form'])
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>New Position Request</h2>
        
    </div>
    <div class="dashboard-breadcrumb mb-25">
        
        <div class="d-flex gap-2 justify-items-center align-items-center">
            <input type="radio" id="html" name="fav_language" value="HTML">
            <label for="html">Single Entry</label><br>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 text-end">
            <a class="btn btn-primary" href="{{route('recruitment-report')}}">Back</a>
        </div>
        <form class="form" method="post" action="{{route('recruitment.update_position')}}" enctype="multipart/form-data">
        @csrf
        <div class="d-none">
            <input type="hidden" name="recruitment_type" value="fresh">
            <input type="hidden" name="old_city" value="{{$record->city}}">
            <input type="hidden" name="id" value="{{$record->id}}" >
        </div>
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Position Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Position Title <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="position_title" value="{{$record->position_title}}" required>
                            @error('position_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Client Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="client_name" value="{{$record->client_name}}" required>
                            @error('client_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Department<span style="color: red">*</span></label>
                            <select  class="form-select" name="department" required>
                                <option value=""> Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" {{$record->department == $department->id ? 'selected' : ''}}>{{$department->department}}</option>
                                @endforeach
                            </select>
                            @error('department')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employement Type<span style="color: red">*</span></label>
                            <select  class="form-select" name="employment_type" value="{{$record->employment_type}}" required>
                                <option value="">Select Employement Type</option>
                                <option value="Permenant" {{$record->employment_type == 'Permenant' ? 'selected' : ''}}>Permanent</option>
                                <option value="Contractual" {{$record->employment_type == 'Contractual' ? 'selected' : ''}}>Contractual</option>
                            </select>
                            @error('employment_type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">No Of Requirments <span style="color: red">*</span></label>
                            <input type="number" class="form-control form-control-sm" name="no_of_requirements" value="{{$record->no_of_requirements}}" min="0" required>
                            @error('no_of_requirements')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">State<span style="color: red">*</span></label>
                            <select  class="form-select" name="state"  id="states" required>
                                <option value=""> Select State</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}" {{$record->state == $state->id ? 'selected' : ''}}>{{$state->state}}</option>
                                @endforeach
                            </select>
                            @error('state')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">City<span style="color: red">*</span></label>
                            <select  class="form-select" name="city" value="{{$record->city}}" id="city" required>
                                <option value="">Select City</option>
                            </select>
                            @error('city')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Last Date Of Fulfilment</label>
                            <input type="date" name="date_notified" value="{{$record->date_notified}}" class="form-control form-control-sm">
                            @error('date_notified')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                            <label class="form-label w-100">Salary range <span style="color: red">*</span></label>
                            <div class="d-flex w-100">
                                <input type="number" class="form-control form-control-sm me-2" name="salary_from" value="{{$record->salary_range ? explode("," ,$record->salary_range)[0] : ''}}" placeholder="From" min="0" required>
                                @error('salary_from')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="number" class="form-control form-control-sm" name="salary_to" value="{{$record->salary_range ? explode("," ,$record->salary_range)[1] : ''}}" placeholder="To" min="0" required>
                                @error('salary_to')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Functional Role <span style="color: red">*</span><a href="{{route('functional-role')}}" class="ms-2">
                                <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1" style="font-size: 10px;"></i>
                            </a></label>
                            <div class="">
                                <select  class="form-select js-example-basic-multiple" name="functional_role[]" multiple="multiple" required>
                                    <option value="">Nothing Selected</option>
                                    @foreach($functional_role as $role)
                                    <option value="{{$role->id}}" {{$record->functional_role && in_array($role->id, explode(",", $record->functional_role)) ? 'selected' : ''}}>{{$role->role}}</option>
                                    @endforeach
                                </select>
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
                            <label for="job_description" class="form-label" aria-placeholder="Enter Description">Job Description <span style="color: red">*</span></label>
                            <textarea class="form-control" name="job_description" required>{{$record->job_description}}</textarea>
                            @error('job_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="exampleTextarea" class="form-label">Remarks  <span style="color: red">*</span><span></label>
                            <textarea class="form-control" name="remarks" required>{{$record->remarks}}</textarea>
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
                    <h5 class="text-white">ELIGIBILTY  CRITERIA</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Education<span style="color: red">*</span> <a href="{{route('qualification')}}" class="ms-2">
                                <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1" style="font-size: 10px;"></i>
                            </a></label>
                            <select  class="form-select js-example-basic-multiple" name="education[]" multiple="multiple" required>
                                <option value="">Nothing Selected</option>
                                @foreach($qualification as $qualify)
                                    <option value="{{$qualify->id}}" {{$record->education && in_array($qualify->id, explode(",", $record->education)) ? 'selected' : ''}}>{{$qualify->qualification}}</option>
                                 @endforeach
                            </select>
                            @error('education')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                           
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                            <label class="form-label w-100">Experience <span style="color: red">*</span></label>
                            <div class="d-flex w-100">
                                <input type="number" class="form-control form-control-sm me-2" name="exp_from" value="{{$record->experience ? explode(',', $record->experience)[0] : ''}}" placeholder="From" min="0" required>
                                @error('exp_from')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <input type="number" class="form-control form-control-sm" name="exp_to" value="{{$record->experience ? explode(',', $record->experience)[1] : ''}}" placeholder="To" min="0" required>
                                 @error('exp_to')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Skillsets <span style="color: red">*</span> <a href="{{route('skills.index')}}" class="ms-2">
                                <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1" style="font-size: 10px;"></i>
                            </a></label>
                            <select  class="form-select js-example-basic-multiple" multiple="multiple" name="skill_sets[]" required>
                                <option value="">Nothing Selected</option>
                                @foreach($skills as $skill)
                                <option value="{{$skill->id}}" {{$record->skill_sets && in_array($skill->id, explode(",", $record->skill_sets)) ? 'selected' : ''}}>{{$skill->skill}}</option>
                                 @endforeach
                            </select>
                            @error('skill_sets')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Requested By <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm" value="{{auth()->user()->first_name}}" name="requested_by" readonly required>
                            @error('requested_by')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="attachment" class="form-label">Attachments</label>
                            <input class="form-control form-control-sm" name="attachment" type="file" accept=".pdf">
                            @if($record->attachment)  <!-- Check if attachment exists -->
                            <a class="btn btn-primary" href="{{asset('position-request/attachments').'/'.$record->attachment}}" download>View</a>
                            @endif  <!-- End of attachment check -->
                            @error('attachment')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Assign To <span style="color: red">*</span></label>
                            <select  class="form-select js-example-basic-multiple" multiple="multiple" name="assigned_executive[]" required>
                                <option value="">Nothing Selected</option>
                                @foreach($hr_executives as $hr_executive)
                                    <option value="{{$hr_executive->id}}" {{$record->assigned_executive && in_array($hr_executive->id, explode(",", $record->assigned_executive)) ? 'selected' : ''}} >{{$hr_executive->first_name." ".$hr_executive->last_name}}</option>
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
       
        <div class="col-12 d-flex justify-content-end align-items-center">
            <p  class=" me-3 mb-0 text-danger">* For Final PR click Final Submit Button.</p>
            <button type="submit" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-arrow-right"></i></button>
        </div>
        </form>        
    </div>

@endsection

@section('script')
<script src="{{asset('assets/js/hr/position_request.js')}}"></script>
@endsection

    









  
    
    


