@extends('layouts.master', ['title' => 'Update Call Details'])
@section('contents')
<div class="panel-header">
    <h2 class="mt-2 px-2">Edit Candidate Details Contacted By Call</h2>

</div>

<div class="row mt-4">
    <form action="{{route('recruitment.update-call_log')}}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        <div class="d-none">
            <input type="hidden" name="id" value="{{$id}}" required>
        </div>
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-white">Edit Details</h5>
            </div>
            @if(auth()->user()->hasPermission('recruitment.call_logs'))
                <div class="text-end mt-2 px-2">
                    <a href="{{ route('recruitment.call_logs')}}"><button type="button" class="btn btn-sm btn-primary">Contacted Candidate List <i class="fa-solid fa-list"></i></button></a>
                </div>
            @endif
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" style="color: black;font-weight:bold">Position Title (Client Name)<span class="text-danger">*</span>
                        </label>
                        <select class="form-select js-example-basic-multiple" name="job_position" required>
                            <option value="">Select Title</option>
                            @foreach($positions as $position)
                                <option value="{{$position->position_title.','.$position->client_name}}" {{$position->position_title == $log->job_position && $position->client_name == $log->client_name ? 'selected' : ''}}>{{$position->position_title.' ( '.$position->client_name.' ) '}}</option>
                            @endforeach
                        </select>
                        @error('job_position')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm for_char" name="name" value="{{$log->name}}" required>
                        <span class="name"></span>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control form-control-sm for_char" name="email" value="{{$log->email}}" required>
                        <span class="email"></span>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact No <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm for_char" maxlength="10" name="phone_no" value="{{$log->phone_no}}" required>
                        <span class="phone_no"></span>
                        @error('phone_no')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Experience</label>
                        <input type="number" class="form-control form-control-sm" name="experience" value="{{$log->experience}}" min="0" required>
                        @error('experience')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                        <label class="form-label w-100">CTC </label>
                        <div class="d-flex w-100">
                            <input type="number" class="form-control form-control-sm me-2" name="curr_ctc" placeholder="Current CTC" min="0" value="{{$log->curr_ctc}}" required>
                            <input type="number" class="form-control form-control-sm" name="exp_ctc" value="{{$log->exp_ctc}}" min="0" placeholder="Expected CTC" required>
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
                        <input type="text" class="form-control form-control-sm" name="notice_period" value="{{$log->notice_period}}">
                        @error('notice_period')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Education</label>
                        <select class="form-select js-example-basic-multiple" name="qualification[]" multiple required>
                            <option value=""> Nothing Selected</option>
                            @foreach($qualification as $education)
                                <option value="{{$education->qualification}}" {{$log->qualification && in_array($education->qualification, explode(",", $log->qualification)) ? 'selected' : ''}}>{{$education->qualification}}</option>
                            @endforeach
                        </select>
                        @error('qualification')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control form-control-sm" name="location" value="{{$log->location}}" placeholder="Enter the Location" required>
                        @error('location')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="formFileSm" class="form-label">Resume <span class="text-danger">*</span>
                            <span class="px-5"> <a href="{{asset('resume')."/".$log->resume}}" class="btn btn-sm btn-primary" target="_blank">View <i class="fa-solid fa-eye"></i></a></span>
                        </label>
                        <input class="form-control form-control-sm" name="resume" type="file" accept=".pdf" required>
                        @error('resume')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-12 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Remarks </label>
                        <textarea class="form-control" name="remarks" placeholder="Enter Remarks Here">{{$log->remarks}}</textarea>
                        @error('remarks')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end ">
        <button class="btn btn-sm btn-primary">Update <i class="fa-solid fa-arrow-right"></i></button>
    </div>
    </form>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/commonValidation.js')}}"></script>

@endsection