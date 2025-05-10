@extends('layouts.master', ['title' => 'Candidate Calling Data'])
@section('contents')
<div class="panel">
    <div class="panel-header">
    <h2>Contact Candidate By Call Form</h2>
    <div>
                            <ul class="breadcrumb">
                                <li>
                                    @if (auth()->user()->role->role_name == "hr")
                                        <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                                    @elseif(auth()->user()->role->role_name == "hr_operations")
                                        <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                                    @elseif(auth()->user()->role->role_name == "sales_manager")
                                        <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                                    @else
                                    @endif
                                </li>
                                <li>Contact Candidate By Call Form</li>
                            </ul>
                        </div>


    </div>
    
</div>

<form method="post" action="{{route('recruitment.store_call_detail')}}" enctype="multipart/form-data" class="form">
@csrf
<div class="row mt-2">
    <div class="col-12">
        <div class="panel">
            <div class="dashboard-breadcrumb mb-25 border border-b-0">
                <h5 class="text-dark ">Add Details</h5>
                <div class="">
                <a href="{{ route('recruitment.call_logs')}}"><button type="button" class="btn btn-sm btn-primary">Contacted Candidate List <i class="fa-solid fa-list"></i></button></a>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Position Title (Client Name) <span class="text-danger">**</span>
                        </label>
                        <select class="form-select js-example-basic-multiple" name="job_position" required>
                            <option value="" class="form-select">Select Title</option>
                            @foreach($positions as $position)
                                <option value="{{$position->position_title.','.$position->client_name}}">{{$position->position_title.' ( '.$position->client_name.' ) '}}</option>
                            @endforeach
                        </select>
                        <span class="error text-danger mt-2" id="position-error"></span>
                        @error('job_position')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Full Name <span class="text-danger">**</span></label>
                        <input type="text" class="form-control form-control-sm for_char" name="name"  value="{{old('name')}}" placeholder="Enter Candidate Name">
                        <span class="name"></span>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email <span class="text-danger">**</span></label>
                        <input type="email" class="form-control form-control-sm for_char" name="email" value="{{old('email')}}" placeholder="Enter A Email" required>
                        <span class="email"></span>

                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact No <span class="text-danger">**</span></label>

                        <input type="text" class="form-control form-control-sm for_char" name="phone_no" value="{{old('phone_no')}}" placeholder="Enter Your Contact No" maxlength="10">
                        <span class="phone_no"></span>
                      
                        @error('phone_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Experience</label>
                        <input type="text" class="form-control form-control-sm" name="experience" value="{{old('experience')}}" min="0" placeholder="Enter Experience" required>
                        @error('experience')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        

                    
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                        <label class="form-label w-100">CTC </label>
                        <div class="d-flex w-100">
                            <input type="number" class="form-control form-control-sm me-2" name="curr_ctc" placeholder="Current CTC" min="0" value="{{old('curr_ctc')}}" required>
                            <input type="number" class="form-control form-control-sm" name="exp_ctc" value="{{old('exp_ctc')}}" min="0" placeholder="Expected CTC" required>
                        </div>
                        <div class="d-flex w-100">
                            @error('curr_ctc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            @error('exp_ctc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Notice Period</label>
                        <input type="text" class="form-control form-control-sm" name="notice_period" value="{{old('notice_period')}}" placeholder="Enter Notice Period">
                        @error('notice_period')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Education</label>
                        <select class="form-select js-example-basic-multiple" name="qualification[]" multiple>
                            <option value=""> Nothing Selected</option>
                            @foreach($qualification as $education)
                                <option value="{{$education->qualification}}" {{old('qualification') && in_array($education->qualification, old('qualification')) ? 'selected' : ''}}>{{$education->qualification}}</option>
                            @endforeach
                        </select>
                        @error('qualification')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control form-control-sm" name="location" value="{{old('location')}}" placeholder="Enter the Location" required>
                        @error('location')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="formFileSm" class="form-label">Resume <span class="text-danger">*</span></label>
                        <input class="form-control form-control-sm" name="resume" type="file" accept=".pdf" required>
                        @error('resume')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 col-md-12">
                        <label for="exampleTextarea" class="form-label">Remarks </label>
                        <textarea class="form-control" name="remarks" placeholder="Enter Remarks Here">{{old('remarks')}}</textarea>
                        @error('remarks')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end gap-3 ">
        <div>
            <a href="">
                <button type="button" class="btn btn-sm btn-secondary">Cancel</button>
            </a>
        </div>
        <div>
            <button type="submit" class="btn btn-sm btn-primary" id="submit-btn">Submit </button>
        </div>
        
    </div>
</form>

</div>

@endsection

@section('script')
<script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection