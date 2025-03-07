@extends('layouts.guest.master', ['title' => 'Personal Details Form'])
@section('content')
    <div class="" style="background-color:#83C0C1; width: 100%;">
        <div class="logo px-5 py-2">
            <img src="{{ asset('assets/images/PrakharNEWLogo.png') }}" alt="Logo" width="100px">
        </div>

        {{-- <div class="bottom"> --}}
        @if (empty($details->rec_form_status))

            <form class="personal_detail" enctype="multipart/form-data">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                {{-- First Card --}}
                <div class="row px-5 py-3">
                    <div class="col-md-6 bg-white">
                        <h5 class="text-center px-3 py-3 mt-2 fw-bold">Recruitment Personal Details Form</h5>
                        <p class="text-danger fw-bold">Note : <u>Fields with "*" are mandatory to fill.</u></p>

                        <div class="row px-4">
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label mt-2 text-dark">Gender <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="gender" class="form-control" required>
                                        <option value="" selected="" disabled="">Select Gender
                                        </option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label mt-2 text-dark">Category <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="category" class="form-control category" required>
                                        <option value="" selected="" disabled="">Select Category
                                        </option>
                                        <option value="general">Un-Reserved</option>
                                        <option value="obc">OBC</option>
                                        <option value="sc">SC</option>
                                        <option value="st">ST</option>
                                    </select>
                                    <input type="file" name="category_doc" class="form-control d-none my-2"
                                        accept=".pdf">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Preferred Job Location <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="preferred_location" class="form-control"
                                        placeholder="Enter preffered job location" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Father's Name <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="father_name" class="form-control"
                                        placeholder="Enter father's full name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Father's Contact No. <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="number" name="father_mobile" class="form-control"
                                        placeholder="Enter father's contact number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Blood Group</label>
                                    <select name="blood_group" class="form-control">
                                        <option value="Not Specified">Not Specified</option>
                                        <option value="a+">A+</option>
                                        <option value="a-">A-</option>
                                        <option value="b+">B+</option>
                                        <option value="b-">B-</option>
                                        <option value="o+">O+</option>
                                        <option value="o-">O-</option>
                                        <option value="ab+">AB+</option>
                                        <option value="ab-">AB-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">PF Number</label>
                                    <input type="number" name="pf_no" class="form-control" placeholder="Enter pf number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Police verification Id</label>
                                    <input type="number" name="police_verification_id" class="form-control"
                                        placeholder="Enter Your Police Verification No.">
                                    <input type="file" name="police_verification_doc" class="form-control my-2"
                                        accept=".pdf">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Nearest Police Station <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="nearest_police_station" class="form-control"
                                        placeholder="Enter nearest police station no." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Marital Status <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="marital_status" class="form-control" required>
                                        <option value="" selected disabled>Not
                                            Specified
                                        </option>
                                        <option value="unmarried">Single</option>
                                        <option value="married">Married</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="background-color: #F8FAFC;">
                        <h5 class="text-center px-3 py-3 mt-2 fw-bold">Recruitment General Details Form</h5>
                        <div class="row px-4">
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Spouse Name</label>
                                    <input type="text" name="spouse_name" class="form-control"
                                        placeholder="Enter spouse name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Date of Marriage</label>
                                    <input type="date" name="date_of_marriage" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Passport No.</label>
                                    <input type="number" name="passport_no" class="form-control"
                                        placeholder="Enter Your Passport No.">
                                    <input type="file" name="passport_doc" class="form-control my-2" accept=".pdf">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Aadhar Card No. <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="aadhar_card_no" class="form-control"
                                        placeholder="Enter Your Aadhar No." maxlength="12"
                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                        required>
                                    <input type="file" name="aadhar_card_doc" class="form-control my-2"
                                        accept=".pdf" required>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Add Signature photo <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="file" name="signature" class="form-control"
                                        accept=".jpg, .jpeg, .png" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Add Passport size photo <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="file" name="photograph" class="form-control"
                                        accept=".jpg, .jpeg, .png" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Language Known <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="language_known" class="form-control" required>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary login-btn user_submit" id="user_submit">Submit
                            <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        @endif

        {{-- Second Card --}}
        @if ($details->rec_form_status == 'personal_stage')
            <form class="address_detail" enctype="multipart/form-data">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                <div class="address_details">
                    <h3 class="panel-title text-dark">Recruitment Address Details Form</h3>
                    <p class="text-danger fw-bold">Note : <u>Fields with "*" are mandatory to fill.</u></p>

                    <div class="row mb-2 ">
                        <div class="col-md-12">
                            <div class="w-full">
                                <label class="form-label mt-2 text-dark">Permanent Address <span
                                        class="text-danger fw-bold">*</span></label>
                                <textarea placeholder="Enter Complete Permanent Address With State and City" name="permanent_add"
                                    class="w-full form-control" id="permanent" required></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="">
                                    <label class="form-label text-dark">Type Of Document <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="per_doc_type" class="form-control" required>
                                        <option value="" selected disabled>Select Document Type
                                        </option>
                                        <option value="electricity bill">Electricity Bill</option>
                                        <option value="aadhar card">Aadhar Card</option>
                                        <option value="voter id card">Voter Id Card</option>
                                        <option value="ration card">Ration Card</option>
                                        <option value="rent agreement">Rent Agreement</option>
                                    </select>
                                    <input type="file" name="permanent_add_doc" class="form-control my-2"
                                        accept=".pdf" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="exampleTextarea" class="form-label text-dark">Correspondence
                                    Address <span class="text-danger fw-bold">*</span>
                                    <span>
                                        <input class="form-check-input" type="checkbox" id="sameas">
                                    </span>
                                    Check If Same as permanent</label>
                                <textarea class="form-control" name="correspondence_add" placeholder="Enter Correspondence Address"
                                    id="correspondence" required></textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label class="form-label text-dark">Type Of Document <span
                                        class="text-danger fw-bold">*</span></label>
                                <select name="corres_doc_type" class="form-control" required>
                                    <option value="" selected disabled>Select Document Type
                                    </option>
                                    <option value="electricity bill">Electricity Bill</option>
                                    <option value="aadhar card">Aadhar Card</option>
                                    <option value="voter id card">Voter Id Card</option>
                                    <option value="ration card">Ration Card</option>
                                    <option value="rent agreement">Rent Agreement</option>
                                </select>
                                <input type="file" name="correspondence_add_doc" class="form-control my-2"
                                    accept=".pdf" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary login-btn user_submit">Save
                            &
                            Next
                            <i class="fa-solid fa-arrow-right"></i></button>

                    </div>
                </div>
            </form>
        @endif
        {{-- Third card --}}

        @if ($details->rec_form_status == 'address_stage')
            <form class="bank_detail" enctype="multipart/form-data">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                <div class="bank_details">
                    <h3 class="panel-title text-dark">Recruitment Bank Details Form</h3>
                    <p class="text-danger fw-bold">Note : <u>Fields with "*" are mandatory to fill.</u></p>

                    <div class="row mb-2 ">
                        <div class="col-md-12">
                            <div class="w-full">
                                <label class="form-label mt-2 text-dark">Bank Name <span
                                        class="text-danger fw-bold">*</span></label>
                                <select name="bank_name_id" class="form-control" required>
                                    <option value="">Not Specified</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name_of_bank }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="">
                                    <label class="form-label text-dark">Bank Account No. <span
                                            class="text-danger fw-bold">*</span></label>

                                    <input type="number" class="form-control" name="account_no"
                                        placeholder="Enter Bank Account No" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="exampleTextarea" class="form-label text-dark">Bank IFSC
                                    No. <span class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control" name="ifsc_code"
                                    placeholder="Enter Bank IFSC No" required>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label class="form-label text-dark">PAN Card No <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control" name="pan_card_no" required
                                    placeholder="Enter PAN  No" maxlength="10" minlength="10">

                                <input type="file" name="pan_card_doc" accept=".pdf" class="form-control my-2"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Bank Cancelled Cheque/Bank
                                        Passbook <span class="text-danger fw-bold">*</span></label>


                                    <input type="file" name="bank_doc" accept=".pdf" class="form-control" required>
                                </div>
                            </div>



                        </div>

                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary login-btn user_submit"
                                id="bank_details_save_btn">Save & Next <i class="fa-solid fa-arrow-right"></i></button>

                        </div>
                    </div>
                </div>
            </form>
        @endif

        @if ($details->rec_form_status == 'bank_stage')
            {{-- Fourth card Education --}}
            <form class="education_detail">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                <div class="education_details">
                    <h3 class="panel-title text-dark">Recruitment Education Details Form</h3>
                    <p class="text-danger fw-bold">Note : <u>Fields with "*" are mandatory to fill.</u></p>

                    <div>
                        <h5>10th Class Section</h5>
                    </div>

                    <div class="row mb-2 ">
                        <div class="col-md-12">
                            <div class="w-full">
                                <label class="form-label mt-2 text-dark">10th Class % / CGPA <span
                                        class="text-danger fw-bold">*</span></label>

                                <input type="text" class="form-control" placeholder="Enter 10th % Or CGPA"
                                    name="10th_percentage" required>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="">
                                <div class="">
                                    <label class="form-label mt-2 text-dark">10th Class Passing
                                        Year <span class="text-danger fw-bold">*</span></label>
                                    <input type="number" class="form-control"
                                        placeholder="Enter 10th Class Passing Year" name="10th_year"
                                        max={{ date('Y') }} min="0" required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="">
                                    <label class="form-label mt-2 text-dark">10th Class Board <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter 10th Board Name"
                                        name="10th_board" required>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label class="form-label mt-2 text-dark">10th Class Board
                                    Document <span class="text-danger fw-bold">*</span></label>
                                <input type="file" class="form-control" name="10th_doc" accept=".pdf" required>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <p class="text-dark">For More Education Degree Please Check the boxes</p>
                            <div class="d-flex gap-2 align-items-center">
                                <label for="exampleTextarea" class="form-label text-dark">
                                    <span>
                                        <input class="form-check-input" type="checkbox" id="tweleth_checkbox">
                                    </span>12th</label>
                                <label for="exampleTextarea" class="form-label text-dark">
                                    <span>
                                        <input class="form-check-input" type="checkbox" id="graduation_ceckbox">
                                    </span>Graduation</label>
                                <label for="exampleTextarea" class="form-label text-dark">
                                    <span>
                                        <input class="form-check-input" type="checkbox" id="postgraduation_checkbox">
                                    </span>Post Graduation</label>
                            </div>
                        </div>

                    </div>

                    {{-- 12 th class secton --}}

                    <div class="12Section_container" id="twelthe_showing">
                        <div>
                            <h5>12th Class Section</h5>
                        </div>

                        <div class="row mb-2 ">
                            <div class="col-md-12">
                                <div class="w-full">
                                    <label class="form-label mt-2 text-dark">12th Class % /
                                        CGPA</label>

                                    <input type="text" class="form-control" placeholder="Enter 12th % Or CGPA"
                                        name="12th_percentage">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">12th Class Passing
                                            Year</label>
                                        <input type="number" class="form-control"
                                            placeholder="Enter 12th Class Passing Year" name="12th_year"
                                            max={{ date('Y') }} min="0">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">12th Class
                                            Board</label>
                                        <input type="text" class="form-control" placeholder="Enter 12th Board Name"
                                            name="12th_board">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label mt-2 text-dark">12th Class Board
                                        Document</label>
                                    <input type="file" name="12th_doc" class="form-control" accept=".pdf">

                                </div>
                            </div>



                        </div>


                    </div>

                    {{-- Graduation section --}}

                    <div id="graduation_showing">
                        <div>
                            <h5> Graduation Section</h5>
                        </div>

                        <div class="row mb-2 ">
                            <div class="col-md-12">
                                <div class="w-full">
                                    <label class="form-label mt-2 text-dark">Graduation Degree
                                        Name</label>

                                    <input type="text" class="form-control" placeholder="Enter Graduation Degree Name"
                                        name="grad_name">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Graduation % /
                                            CGPA</label>
                                        <input type="number" class="form-control"
                                            placeholder="Enter Graduation Percentage or CGPA" name="grad_percentage">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Graduation Passing
                                            Year</label>
                                        <input type="number" class="form-control"
                                            placeholder="Enter Graduation Passing Year" name="grad_year"
                                            max={{ date('Y') }} min="0">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Graduation
                                            Mode</label>
                                        <select name="grad_mode" class="form-control">
                                            <option value="Not Specified">Not Specified</option>
                                            <option value="regular">Regular</option>
                                            <option value="distance">Distance</option>
                                            <option value="correspondence">Correspondence</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label mt-2 text-dark">Graduation
                                        Document</label>
                                    <input type="file" name="grad_doc" class="form-control" accept=".pdf">

                                </div>
                            </div>



                        </div>


                    </div>

                    {{-- Post Graduation --}}

                    <div id="postgraduation_showing">
                        <div>
                            <h5> Post Graduation Section</h5>
                        </div>

                        <div class="row mb-2 ">
                            <div class="col-md-12">
                                <div class="w-full">
                                    <label class="form-label mt-2 text-dark">Post Graduation Degree
                                        Name</label>

                                    <input type="text" class="form-control"
                                        placeholder="Enter Post Graduation Degree Name" name="post_grad_name">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Post Graduation % /
                                            CGPA</label>
                                        <input type="number" class="form-control" name="post_grad_percentage"
                                            placeholder="Enter Post Graduation Percentage or CGPA">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Post Graduation
                                            Passing
                                            Year</label>
                                        <input type="number" class="form-control" name="post_grad_year"
                                            placeholder="Enter Graduation Passing Year" max={{ date('Y') }}
                                            min="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Post Graduation
                                            Mode</label>
                                        <select name="post_grad_mode" class="form-control">
                                            <option value="Not Specified">Not Specified</option>
                                            <option value="regular">Regular</option>
                                            <option value="distance">Distance</option>
                                            <option value="correspondence">Correspondence</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label mt-2 text-dark">Post Graduation
                                        Document</label>
                                    <input type="file" name="post_grad_doc" class="form-control" accept=".pdf">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary login-btn user_submit"
                            id="save_next_education">Save &
                            Next <i class="fa-solid fa-arrow-right"></i></button>

                    </div>
                </div>
            </form>
        @endif

        @if ($details->rec_form_status == 'education_stage')
            {{-- Fifth Card Company Details --}}
            <form class="company_detail">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                <div class="company_details">
                    <h3 class="panel-title text-dark">Current Compant Details Form</h3>
                    <p class="text-danger fw-bold">Note : <u>Fields with "*" are mandatory to fill.</u></p>

                    <div class="row mb-2 ">
                        <div class="col-md-12">
                            <div class="w-full">
                                <label class="form-label mt-2 text-dark">Company Name <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Company Name"
                                    name="company_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="">
                                    <label class="form-label text-dark">Differnt Technologies you have
                                        worked
                                        in <span class="text-danger fw-bold">*</span></label>

                                    <input type="text" class="form-control"
                                        placeholder="Enter Differnt Technologies you have worked in"
                                        name="technologies_worked_in" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="exampleTextarea" class="form-label text-dark">Differnt Project
                                    you
                                    have worked in <span class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control" name="projects_worked_in" required
                                    placeholder="Enter Differnt Project you have worked in">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label class="form-label text-dark">Designation <span
                                        class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control" name="designation" required
                                    placeholder="Enter Designation">
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Current CTC <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="salary_ctc" required
                                        placeholder="Enter Current CTC">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Current Home Salary <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="take_home_salary"
                                        placeholder="Enter Current Take Home Salary" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark"> Start Date <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark"> End Date <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Exp/Appraisal
                                    </label>
                                    <select name="doc_type" class="form-control">
                                        <option value="" selected disabled>Select Document Type</option>
                                        <option value="releiving">Releiving</option>
                                        <option value="experience">Experience</option>
                                        <option value="appraisal letter">Appraisal Letter</option>
                                    </select>
                                    <input type="file" class="form-control" name="doc_file" accept=".pdf">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Last 3 months Salary Slip Document
                                    </label>
                                    <input type="file" class="form-control" name="last_3months_sal_slip_doc"
                                        accept=".pdf">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <label class="form-label text-dark">Last 3 months bank Statements
                                    </label>
                                    <input type="file" class="form-control" name="3months_bank_stat_doc"
                                        accept=".pdf">
                                </div>

                            </div>

                        </div>

                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary login-btn user_submit"
                                id="company_details_save_btn">Save & Next <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        @endif

        @if ($details->rec_form_status == 'company_stage')
            {{-- Six card ESI --}}
            <form class="esi_detail">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                <div class="ESI_details" style="height:100vh">
                    <h3 class="panel-title text-dark">Recruitments ESI Details Form</h3>
                    <p class="text-danger fw-bold">Note : <u>Fields with "*" are mandatory to fill.</u></p>

                    <div class="row mb-2 ">
                        <div class="col-md-12">
                            <div class="w-full d-flex gap-5">
                                <label class="form-label mt-2 text-dark"> <input class="form-check-input" type="checkbox"
                                        name="has_esi" id="ESI_ceckbox">
                                    <span class="text-wrap">If you want to Opt for the ESI, Please Tick the
                                        checkbox <br> and then write the previous ESI No. If you have
                                        any?</span></label>
                            </div>
                        </div>

                        <div class="ESI_Input-field">
                            <label class="form-label mt-2 text-dark">ESI Number <span
                                    class="text-danger fw-bold">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter ESI Number"
                                name="previous_esi_no">
                        </div>


                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary login-btn user_submit" id="ESI_save_btn">Save &
                                Next <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                {{-- Seventh Card  Relation & Nominee --}}
            </form>
        @endif
        {{-- </div> --}}


        {{-- Nominee Details & Relationship --}}
        @if ($details->rec_form_status == 'esi_stage')
            <form class="nominee_form">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{ $id }}">
                </div>
                <div class="relation_nominee">
                    <h3 class="panel-title text-dark text-center">Recruitment Relationship & Nominee Details Form</h3>
                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-sm btn-primary" id="add_more-items">Add More <i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="table-responsive mt-3 ">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="srno-column">S.No. <span class="text-danger fw-bold">*</span></th>
                                    <th class="rid-column">Family Members <span class="text-danger fw-bold">*</span></th>
                                    <th>Relationship with Member <span class="text-danger fw-bold">*</span></th>
                                    <th class="attributes-column">Aadhar Card No <span
                                            class="text-danger fw-bold">*</span></th>
                                    <th>D.O.B <span class="text-danger fw-bold">*</span></th>
                                    <th>Aadhar Document <span class="text-danger fw-bold">*</span></th>
                                    <th>Stay with member <span class="text-danger fw-bold">*</span></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="table_body-row">
                                    <td class="srno-column">1</td>
                                    <td class="rid-column"> <input type="text" name="family_member_name[]"
                                            class="form-control" required>
                                    </td>
                                    <td> <select name="relation_with_mem[]" class="form-control" required>
                                            <option value="" selected="" disabled="">Select
                                            </option>
                                            <option value="father">Father</option>
                                            <option value="mother">Mother</option>
                                            <option value="brother">Brother</option>
                                            <option value="sister">Sister</option>
                                        </select></td>
                                    <td class="attributes-column"><input type="text" name="aadhar_card_no[]"
                                            class="form-control" maxlength="12" required></td>
                                    <td><input type="date" name="dob[]" class="form-control" required></td>
                                    <td>
                                        <input type="file" class="form-control" name="aadhar_card_doc[]"
                                            accept=".pdf" required>
                                    </td>

                                    <td> <select name="stay_with_mem[]" class="form-control" required>
                                            <option value="" selected="" disabled="">Select
                                            </option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select></td>

                                    <td>
                                        <button type="button" class="btn btn-primary">Reset <i
                                                class="fa-solid fa-rotate"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-dark text-center" colspan="2">Nominee <span
                                            class="text-danger fw-bold">*</span></th>
                                    <td colspan="2">
                                        <input type="text" placeholder="Enter Nominee" name="nominee"
                                            class="form-control" required>
                                    </td>
                                    <th class="text-dark text-center" colspan="2">Dispensary Near you <span
                                            class="text-danger fw-bold">*</span></th>
                                    <td colspan="2">
                                        <input type="text" placeholder="Enter Dispensary That is near by you"
                                            class="form-control" name="dispensary_near_you" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                    <div class="col-md-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary user_submit">Save & Next <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        @endif

        {{-- After Documents Submission --}}
        @if ($details->rec_form_status == 'relationship_stage')
            <div class="col-md-12 border shadow-lg p-3 mb-5 rounded vh-100">
                <h3 class="text-success text-center">Your Documents Submit Successfully.</h3>
            </div>
        @endif
    </div>
@endsection
@section('script')
    <script src={{ asset('assets/js/personal-details.js') }}></script>
@endsection
