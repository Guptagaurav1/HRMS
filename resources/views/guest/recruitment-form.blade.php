@extends('layouts.guest.master', ['title' => 'Recruitment Form'])
@section('content')
    <div class="row" id="background_image_1">
        <div class="d-flex justify-content-center">
            <div class="login-body">
                <div class="top d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <img src="{{ asset('assets/images/PrakharNEWLogo.png') }}" alt="Logo" width="30%">
                    </div>
                    <a href="{{ '/' }}"><i class="fa-duotone fa-house-chimney"></i></a>
                </div>
                <div class="bottom">
                        <h3 class="panel-title text-dark" id="details_form">Recruitment Form</h3>
                        @if($already_submit)
                        <div class="my-3 text-center">
                        <span class="alert alert-success">This form is already submitted.</span>
                        </div>
                        @endif
                        <form class="recruitment_form" enctype="multipart/form-data">
                            @csrf
                            <div class="d-none">
                                <input type="hidden" name="req_id" value="{{ $id }}" required>
                                <input type="hidden" name="reference" value="{{ $ref }}" required>
                                <input type="hidden" name="send_mail_id" value="{{ $send_mail_id }}" required>
                            </div>
                            {{-- First Card --}}
                            <div class="form_handleing">
                                <div class="row mb-2 ">
                                    <div class="col-md-12">
                                        <div class="">
                                            <label class="form-label mt-2 text-dark">First Name</label>
                                            <input class="form-control" name="firstname" placeholder="Enter Your First Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="">
                                            <label class="form-label mt-2 text-dark">Last Name</label>
                                            <input class="form-control" name="lastname" placeholder="Enter Your Last Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Date Of Birth</label>
                                            <input type="date" name="dob" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Current Location</label>
                                            <input type="text" name="location" class="form-control"
                                                placeholder="Enter Your Current Location" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Highest Education</label>
                                            <input type="text" name="education" class="form-control"
                                                placeholder="Enter Your Education Details" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label class="form-label text-dark">Total Experience</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" aria-label="total experience" name="experience" aria-describedby="basic-addon2" required>
                                            <span class="input-group-text bg-dark-subtle fw-bold" style="    font-size: 65%;" id="basic-addon2">In Years</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Skills</label>
                                            <select name="skill[]" class="form-control js-example-basic-multiple" multiple="multiple" required>
                                                <option value="Not Specified">Not Specified</option>
                                                @foreach ($skills as $skill)
                                                    <option value="{{$skill->skill}}">{{$skill->skill}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Other skills</label>
                                            <input type="text" name="other_skills" class="form-control"
                                                placeholder="Enter Other Skills Seperated By Comma">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Contact No.</label>
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Enter Your Contact No." required>
                                        </div>
                                    </div>
                              
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Resume</label>
                                            <input type="file" name="resume" class="form-control"
                                                accept=".pdf" required>
                                        </div>
                                    </div>

                                </div>

                                @if(!$already_submit)
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary login-btn user_submit"
                                        >Submit
                                        <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                                @endif
                            </div>
                        </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{asset('assets/js/hr/recruitment.js')}}"></script>
@endsection
