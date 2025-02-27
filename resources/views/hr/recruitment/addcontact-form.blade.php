@extends('layouts.master', ['title' => 'Candidate Calling Data'])
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
<div class="dashboard-breadcrumb mb-25">
    <h2>Contact Candidate By Call Form</h2>

</div>

<form method="post" action="{{route('recruitment.store_call_detail')}}" enctype="multipart/form-data" class="form">
@csrf
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-white">Add Details</h5>
            </div>
            <div class="text-end mt-2 px-2">
                <a href="{{ route('recruitment.call_logs')}}"><button type="button" class="btn btn-sm btn-primary">Contacted Candidate List <i class="fa-solid fa-list"></i></button></a>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Position Title (Client Name)
                        </label>
                        <select class="form-select js-example-basic-multiple" name="job_position" required>
                            <option value="">Select Title</option>
                            @foreach($positions as $position)
                                <option value="{{$position->position_title.','.$position->client_name}}">{{$position->position_title.' ( '.$position->client_name.' ) '}}</option>
                            @endforeach
                        </select>
                        @error('job_position')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" value="{{old('name')}}" required>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" name="email" value="{{old('email')}}" required>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact No</label>
                        <input type="number" class="form-control form-control-sm" min="0" name="phone_no" value="{{old('phone_no')}}" required>
                        @error('phone_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Experience</label>
                        <input type="number" class="form-control form-control-sm" name="experience" value="{{old('experience')}}" min="0" required>
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
                        <input type="text" class="form-control form-control-sm" name="notice_period" value="{{old('notice_period')}}">
                        @error('notice_period')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Education</label>
                        <select class="form-select js-example-basic-multiple" name="qualification[]" multiple required>
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
                        <label for="formFileSm" class="form-label">Resume</label>
                        <input class="form-control form-control-sm" name="resume" type="file" accept=".pdf" required>
                        @error('resume')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
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
    <div class="col-12 d-flex justify-content-end ">
        <button type="submit" class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
    </div>
</form>

</div>

@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection