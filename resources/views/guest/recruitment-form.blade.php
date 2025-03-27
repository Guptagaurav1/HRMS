@extends('layouts.guest.master', ['title' => 'Recruitment Form'])
@section('content')
    <div class="h-auto" style="background-color:#034d48; width: 100%; padding-top: 1rem;">
        <!-- HEADER SECTION with margin-top -->
        <div class="col-12" style="padding-left: 7%; padding-right: 7%; margin-top: 2rem;">
            <div class="d-flex border bg-white py-3 px-2 shadow-lg rounded-3 bg-white p-0">
                <div>
                    <img src="{{ asset('assets/images/PrakharLimited-logo.png') }}" alt="logo left" style="width: 15%;">
                </div>
                <div>
                    <img src="{{ asset('assets/images/11years.png') }}" alt="logo right" style="width: 60%;" />
                </div>
            </div>
        </div>

        <div class="personal-details-form mt-3">

            <form class="d-flex align-items-center justify-content-center shadow-lg rounded-3 p-0 recruitment_form"
                enctype="multipart/form-data">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="req_id" value="{{ $id }}" required>
                    <input type="hidden" name="reference" value="{{ $ref }}" required>
                    <input type="hidden" name="send_mail_id" value="{{ $send_mail_id }}" required>
                </div>
                <div class="container">
                    <div class="row">
                        <!-- Left Column (Form content) -->
                        <div class="col-12 col-md-7 bg-white">
                            <h5 class="text-center px-3 py-4 fw-bold">Recruitment Details Form</h5>
                            <div class="row px-4">

                                @if ($already_submit)
                                    <div class="alert text-light text-center" style="background-color:#83C0C1;"
                                        role="alert">
                                        This form is already submitted.
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    <label class="form-label mt-2 text-dark">First Name <span class="text-danger">*</span> </label>
                                    <input class="form-control" name="firstname" placeholder="Enter Your First Name"
                                        required />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label mt-2 text-dark">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="lastname" placeholder="Enter Your Last Name"
                                        required />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-dark">Date Of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control" max="{{date('Y-m-d',strtotime('18 years ago'))}}" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-dark">Current Location <span class="text-danger">*</span></label>
                                    <input type="text" name="location" class="form-control"
                                        placeholder="Enter Your Current Location" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-dark">Highest Education <span class="text-danger">*</span></label>
                                    <input type="text" name="education" class="form-control"
                                        placeholder="Enter Your Education Details" required>

                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label text-dark">Total Experience <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" aria-label="total experience"
                                            name="experience" aria-describedby="basic-addon2" required>
                                        <span class="input-group-text bg-dark-subtle fw-bold" style="    font-size: 65%;"
                                            id="basic-addon2">In Years</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">

                                    <label class="form-label text-dark">Skills <span class="text-danger">*</span></label>
                                    <select name="skill[]" class="form-control js-example-basic-multiple"
                                        multiple="multiple" required>
                                        <option value="Not Specified">Not Specified</option>
                                        @foreach ($skills as $skill)
                                            <option value="{{ $skill->skill }}">{{ $skill->skill }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-12 col-md-6">

                                    <label class="form-label text-dark">Other skills</label>
                                    <input type="text" name="other_skills" class="form-control"
                                        placeholder="Enter Other Skills Seperated By Comma">

                                </div>
                                <div class="col-12 col-md-6">

                                    <label class="form-label text-dark">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email"
                                        required>

                                </div>
                                <div class="col-12 col-md-6">

                                    <label class="form-label text-dark">Contact No. <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter Your Contact No." maxlength="10" minlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>

                                </div>

                                <div class="col-12 col-md-6">

                                    <label class="form-label text-dark">Resume <span class="text-danger">*</span></label>
                                    <input type="file" name="resume" class="form-control" accept=".pdf" required>

                                </div>


                                @if (!$already_submit)
                                    <div class="col-12 text-end mb-2">
                                        <button type="submit" class="btn btn-primary login-btn user_submit">Submit
                                            <i class="fa-solid fa-circle-check"></i></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-5 bg-white d-flex align-items-center justify-content-center py-5">
                            <img src="{{ asset('assets/images/4565.jpg') }}" alt="background_image" class="img-fluid" />
                        </div>

                        {{-- </div> --}}
                    </div>

                    <div class="text-center text-white border-top p-2">
                        <p>© 2025 All Rights Reserved. Prakhar Softwares Solution Ltd.</p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/hr/recruitment.js') }}"></script>
@endsection
