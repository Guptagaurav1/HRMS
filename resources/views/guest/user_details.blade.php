@extends('layouts.guest.master', ['title' => 'Personal Details Form'])
@section('content')
    <div class="h-auto" style="background-color:#034d48; width: 100%; padding-top: 1rem;">
        <div class="col-12" style="padding-left: 3%; padding-right: 3%; margin-top: 2rem;">
            <div class="d-flex border bg-white py-3 px-2 shadow-lg rounded-3 bg-white p-0">
                <div>
                    <img src="{{ asset('assets/images/PrakharLimited-logo.png') }}" alt="logo left" style="width: 15%;">
                </div>
                <div>
                    <img src="{{ asset('assets/images/11years.png') }}" alt="logo right" style="width: 60%;" />
                </div>
            </div>
        </div>

        @if (empty($details->rec_form_status))
            <div class="personal-details-form">
                <form class="personal_detail" enctype="multipart/form-data">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="rec_id" value="{{ $id }}">
                    </div>
                    {{-- First Card --}}
                    <div class="row px-5 py-3">
                        <div class="col-md-6 bg-white">
                            <h5 class="text-center px-3 pt-5 fw-bold">Recruitment Personal Details Form</h5>
                            <p class="text-danger ">Note : <u>Fields with "*" are mandatory to fill.</u></p>
                            <div class="row px-4">
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Name</label>
                                    <input type="text" class="form-control"
                                        value="{{ $details->firstname . ' ' . $details->lastname }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Email</label>
                                    <input type="text" class="form-control" value="{{ $details->email }}" disabled>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label mt-2 text-dark">Gender <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="emp_gender" class="form-control" id="skills_multiple" required>
                                        <option value="" selected="" disabled="">Select Gender
                                        </option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                    <span class="error-message text-danger"></span>

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Date of Birth <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="date" name="emp_dob" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-dark">Preferred Job Location <span class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="preferred_location" class="form-control for_char" placeholder="Enter preferred job location" required>
                                    <span class="preferred_location"></span>
                                </div>
    
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Blood Group</label>
                                    <select name="emp_blood_group" class="form-control">
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

                                <div class="col-md-6">

                                    <label class="form-label text-dark">Nearest Police Station <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="nearest_police_station" class="form-control"
                                        placeholder="Enter nearest police station no." required>

                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Marital Status <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="emp_marital_status" class="form-control" required>
                                        <option value="" selected disabled>Not
                                            Specified
                                        </option>
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                    </select>

                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Date of Marriage</label>
                                    <input type="date" name="emp_dom" class="form-control">

                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Spouse Name</label>
                                    <input type="text" name="emp_husband_wife_name" class="form-control"
                                        placeholder="Enter spouse name">

                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Add Signature photo <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="file" name="emp_signature" class="form-control photo"
                                        accept=".jpg, .jpeg, .png" required>
                                    <img class="img-fluid preview_photo w-50 rounded my-2">


                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Add Passport size photo <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="file" name="emp_photo" class="form-control photo"
                                        accept=".jpg, .jpeg, .png" required>
                                    <img class="img-fluid preview_photo w-50 rounded my-2">
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6" style="background-color:#F8FAFC; padding-bottom: 100px;">
                            <h5 class="text-center px-3 py-5 fw-bold">Recruitment General Details Form</h5>
                            <div class="row px-4">
                                <div class="col-md-6">
                                    <label class="form-label text-dark">Father's Name <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="emp_father_name" class="form-control for_char"
                                        placeholder="Enter father's full name" required>
                                        <span class="emp_father_name"></span>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Father's Contact No. <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="emp_father_mobile" class="form-control for_char "
                                        placeholder="Enter father's contact number"   maxlength="10" minlength="10"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                                        

                                </div>



                                <div class="col-md-6">

                                    <label class="form-label text-dark">Passport No.</label>
                                    <input type="number" name="emp_passport_no" class="form-control"
                                        placeholder="Enter Your Passport No.">
                                    <input type="file" name="passport_file" class="form-control my-2" accept=".pdf">

                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Police verification Id</label>
                                    <input type="number" name="police_verification_id" class="form-control"
                                        placeholder="Enter Your Police Verification No.">
                                    <input type="file" name="police_verification_file" class="form-control my-2"
                                        accept=".pdf">


                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Aadhar Card No. <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="emp_aadhaar_no" class="form-control"
                                        placeholder="Enter Your Aadhar No." maxlength="12"
                                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                        required>
                                    <input type="file" name="aadhar_card_doc" class="form-control my-2"
                                        accept=".pdf" required>


                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Language Known <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" name="language_known" class="form-control" required>
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label mt-2 text-dark">Category <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="emp_category" class="form-control category" required>
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
                        </div>

                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary login-btn user_submit">Submit
                                <i class="fa-solid fa-arrow-right"></i></button>

                        </div>
                    </div>
                </form>
            </div>
        @endif

        {{-- Address Detail form --}}
        @if ($details->rec_form_status == 'personal_stage')
            <div class="recruitment-details-form" style="height: 100vh;">
                <form class="d-flex align-items-center justify-content-center address_detail"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="rec_id" value="{{ $id }}">
                    </div>
                    <div class="row px-5 mt-2">
                        <div class="col-md-12 bg-white" style="padding-bottom: 100px;">
                            <h5 class="text-center px-3 pt-5 fw-bold">Recruitment Address Details Form</h5>
                            <p class="text-danger">Note : <u>Fields with "*" are mandatory to fill.</u></p>
                            <div class="row px-4 address_details">
                                <div class="col-md-6">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control form-control-sm" value="India" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="state" name="state" required>
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">City <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="cities" name="emp_city" required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="pincode" class="form-label">ZIP Code<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="pincode" placeholder="Enter ZIP code" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Permanent Address <span
                                            class="text-danger fw-bold">*</span></label>
                                    <textarea placeholder="Enter Complete Permanent Address" name="emp_permanent_address"
                                        class="w-full form-control" id="permanent" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleTextarea" class="form-label text-dark">Correspondence
                                        Address <span class="text-danger fw-bold">*</span>
                                        <span>
                                            <input class="form-check-input bg-dark" type="checkbox" id="sameas">
                                        </span>
                                        Check If Same as permanent</label>
                                    <textarea class="form-control" name="emp_local_address" placeholder="Enter Correspondence Address"
                                        id="correspondence" required></textarea>

                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Permanent Address Proof <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="permanent_doc_type" class="form-control" required>
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

                                {{-- <div class="col-md-6">
                                    <label class="form-label text-dark">Correspondence Address Proof <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="correspondence_doc_type" class="form-control" required>
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
                                </div> --}}
                            </div>
                        </div>


                        <div class="col-md-12 text-end mt-4 py-2 mb-2">
                            <button type="submit" class="btn btn-primary login-btn user_submit">Save
                                &
                                Next
                                <i class="fa-solid fa-arrow-right"></i></button>

                        </div>
                    </div>
                </form>
            </div>
        @endif

        {{-- Bank Details Form --}}
        @if ($details->rec_form_status == 'address_stage')
            <div class="bank-details-form" style="height: 105vh;">
                <form class="d-flex align-items-center justify-content-center bank_detail" enctype="multipart/form-data">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="rec_id" value="{{ $id }}">
                    </div>
                    <div class="row px-5 py-3 mt-1">

                        <div class="col-md-12 bg-white" style="padding-top: 20px; padding-bottom: 100px;">
                            <h5 class="text-center px-3 pt-5 fw-bold">Recruitment Bank Details Form</h5>
                            <p class="text-danger ">Note : <u>Fields with "*" are mandatory to fill.</u></p>
                            <div class="row px-4">
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Bank Name <span
                                            class="text-danger fw-bold">*</span></label>
                                    <select name="bank_id" class="form-control" required>
                                        <option value="">Not Specified</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->name_of_bank }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Bank Branch <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Branch Name"
                                        name="emp_branch" required />
                                </div>
                                <div class="col-md-6">

                                    <label class="form-label text-dark">Bank Account No. <span
                                            class="text-danger fw-bold">*</span></label>

                                    <input type="text" class="form-control for_char" name="emp_account_no" 
                                        placeholder="Enter Bank Account No" maxlength="18" required>
                                        <span class="emp_account_no"></span>

                                     
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleTextarea" class="form-label text-dark">Bank IFSC
                                        No. <span class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control for_char" name="emp_ifsc"
                                        placeholder="Enter Bank IFSC No" maxlength="11" required>
                                        <span class="emp_ifsc"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark">PF Number</label>
                                    <input type="text" name="emp_pf_no" maxlength="12" class="form-control"
                                        placeholder="Enter pf number">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-dark">Bank Cancelled Cheque/Bank
                                        Passbook <span class="text-danger fw-bold">*</span></label>


                                    <input type="file" name="bank_doc" accept=".pdf" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark">PAN Card No <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text"  class="form-control for_char" name="emp_pan" required
                                        placeholder="Enter PAN  No" maxlength="10" minlength="10">
                                        <span class="emp_pan"></span>

                                    <input type="file" name="pan_card_doc" accept=".pdf" class="form-control my-2"
                                        required>
                                </div>
                            </div>



                        </div>

                        <div class="col-md-12 text-end mt-5">
                            <button type="submit" class="btn btn-primary login-btn user_submit"
                                id="bank_details_save_btn">Save & Next <i class="fa-solid fa-arrow-right"></i></button>

                        </div>
                    </div>
                </form>
            </div>
        @endif

        {{-- Education details --}}
        @if ($details->rec_form_status == 'bank_stage')
            <div class="education-details-form">
                <form class="education_detail">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="rec_id" value="{{ $id }}">
                    </div>
                    <div class="row px-5 py-3">
                        <div class="col-md-6 bg-white">
                            <h5 class="text-center px-3 pt-5">Recruitment Education Details Form</h5>
                            <p class="text-danger">Note : <u>Fields with "*" are mandatory to fill.</u></p>
                            <div class="px-4 mb-2">
                                <h5 class="border-bottom">10th Class Section</h5>
                            </div>

                            <div class="row px-4 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">10th Class % / CGPA <span
                                            class="text-danger fw-bold">*</span></label>

                                    <input type="text" class="form-control" placeholder="Enter 10th % Or CGPA"
                                        name="emp_tenth_percentage" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">10th Class Passing
                                        Year <span class="text-danger fw-bold">*</span></label>
                                    <input type="number" class="form-control"
                                        placeholder="Enter 10th Class Passing Year" name="emp_tenth_year"
                                        max={{ date('Y') }} min="0" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">10th Class Board <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter 10th Board Name"
                                        name="emp_tenth_board_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">10th Class Board
                                        Document <span class="text-danger fw-bold">*</span></label>
                                    <input type="file" class="form-control" name="emp_tenth_doc" accept=".pdf"
                                        required>
                                </div>


                                {{-- Graduation section --}}

                                <div class="px-4 mb-2">
                                    <h5 class="border-bottom">Graduation Section</h5>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Graduation Degree
                                        Name</label>

                                    <input type="text" class="form-control" placeholder="Enter Graduation Degree Name"
                                        name="emp_gradqualification">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Graduation % /
                                        CGPA</label>
                                    <input type="number" class="form-control"
                                        placeholder="Enter Graduation Percentage or CGPA"
                                        name="emp_graduation_percentage">

                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Graduation Passing
                                        Year</label>
                                    <input type="number" class="form-control"
                                        placeholder="Enter Graduation Passing Year" name="emp_graduation_year"
                                        max={{ date('Y') }} min="0">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Graduation
                                        Mode</label>
                                    <select name="emp_graduation_mode" class="form-control">
                                        <option value="Not Specified">Not Specified</option>
                                        <option value="regular">Regular</option>
                                        <option value="distance">Distance</option>
                                        <option value="correspondence">Correspondence</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Graduation
                                        Document</label>
                                    <input type="file" name="grad_doc" class="form-control" accept=".pdf">

                                </div>
                            </div>
                        </div>

                        {{-- 12 th class secton --}}

                        <div class="col-md-6 " style="background-color: #F8FAFC;padding-bottom: 50px;">
                            <h5 class="text-center px-3 py-5">Recruitment Education Details Form</h5>
                            <div class="px-4 mb-2">
                                <h5 class="border-bottom">12th Class Section</h5>
                            </div>
                            <div class="row px-4 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">12th Class % /
                                        CGPA</label>

                                    <input type="text" class="form-control" placeholder="Enter 12th % Or CGPA"
                                        name="emp_twelve_percentage">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">12th Class Passing
                                        Year</label>
                                    <input type="number" class="form-control"
                                        placeholder="Enter 12th Class Passing Year" name="emp_twelve_year"
                                        max={{ date('Y') }} min="0">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">12th Class
                                        Board</label>
                                    <input type="text" class="form-control" placeholder="Enter 12th Board Name"
                                        name="emp_twelve_board_name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">12th Class Board
                                        Document</label>
                                    <input type="file" name="emp_twelve_doc" class="form-control" accept=".pdf">
                                </div>

                                {{-- Post Graduation --}}

                                <div class="px-4 mb-2">
                                    <h5 class="border-bottom">Post Graduation Section</h5>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Post Graduation Degree
                                        Name</label>

                                    <input type="text" class="form-control"
                                        placeholder="Enter Post Graduation Degree Name" name="emp_postgradqualification">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Post Graduation % /
                                        CGPA</label>
                                    <input type="number" class="form-control" name="emp_postgraduation_percentage"
                                        placeholder="Enter Post Graduation Percentage or CGPA">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Post Graduation
                                        Passing
                                        Year</label>
                                    <input type="number" class="form-control" name="emp_postgraduation_year"
                                        placeholder="Enter Graduation Passing Year" max={{ date('Y') }}
                                        min="0">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Post Graduation
                                        Mode</label>
                                    <select name="emp_postgraduation_mode" class="form-control">
                                        <option value="Not Specified">Not Specified</option>
                                        <option value="regular">Regular</option>
                                        <option value="distance">Distance</option>
                                        <option value="correspondence">Correspondence</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label mt-2 text-dark">Post Graduation
                                        Document</label>
                                    <input type="file" name="post_grad_doc" class="form-control" accept=".pdf">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-end py-2 mt-1">
                            <button type="submit" class="btn btn-primary login-btn user_submit"
                                id="save_next_education">Save &
                                Next <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        {{-- Company Details Forms --}}
        @if ($details->rec_form_status == 'education_stage')
            <div class="company-details-form " style="height: auto;">
                <form class="company_detail">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="rec_id" value="{{ $id }}">
                    </div>
                    <div class="row px-5 py-3" style="padding-top: 50px; padding-bottom: 50px;">
                        <div class="col-md-6 bg-white" style="padding-bottom: 100px;">
                            <h5 class="text-center px-3 pt-5">Current Company Details Form</h5>
                            <p class="text-danger">Note : <u>Fields with "*" are mandatory to fill.</u></p>
                            <div class="row px-4">
                                <div class="col-md-12">
                                    <label class="form-label mt-2 text-dark">Company Name <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Company Name"
                                        name="company_name" required>
                                </div>


                                <div class="col-md-6">
                                    <label class="form-label text-dark">Designation <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control" name="designation" required
                                        placeholder="Enter Designation">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark">Current CTC <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="salary_ctc" required
                                        placeholder="Enter Current CTC">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark">Current Home Salary <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="take_home_salary"
                                        placeholder="Enter Current Take Home Salary" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-dark">Last 3 months Salary Slip Document
                                    </label>
                                    <input type="file" class="form-control" name="last_3months_sal_slip_doc"
                                        accept=".pdf">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark">Last 3 months bank Statements
                                    </label>
                                    <input type="file" class="form-control" name="3months_bank_stat_doc"
                                        accept=".pdf">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="background-color: #F8FAFC" ;>
                            <h5 class="text-center px-3 py-5">Others Current Company Details Form</h5>
                            <div class="row px-4">
                                <div class="col-md-6">
                                    <label class="form-label text-dark text-wrap">DifferentTechnologies you involved
                                        in <span class="text-danger fw-bold">*</span></label>

                                    <input type="text" class="form-control"
                                        placeholder="DifferentTechnologies you involved"
                                        name="technologies_worked_in" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleTextarea" class="form-label text-dark">Different Project
                                        you
                                         worked in <span class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control" name="projects_worked_in" required
                                        placeholder="Different Project you worked in ">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark"> Start Date <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark"> End Date <span
                                            class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label text-dark">Exp/Appraisal
                                    </label>
                                    <select name="doc_type" class="form-control">
                                        <option value="" selected disabled>Select Document Type</option>
                                        <option value="releiving">Releiving</option>
                                        <option value="experience">Experience</option>
                                        <option value="appraisal letter">Appraisal Letter</option>
                                    </select>
                                    <input type="file" class="form-control my-2" name="doc_file" accept=".pdf">
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary login-btn user_submit"
                                id="company_details_save_btn">Save & Next <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

        {{-- ESI Form --}}
        @if ($details->rec_form_status == 'company_stage')
            <div class="ESI-details-form" style="height: auto;">
                <form class="esi_detail">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="rec_id" value="{{ $id }}">
                    </div>
                    <div class="row px-5 py-3" style="padding-top: 50px; padding-bottom: 50px;">
                        <div class="col-md-12" style="background-color: #F8FAFC">
                            <h5 class="text-center px-3 py-5 fw-bold">ESI Details Form</h5>
                            <p class="text-danger fw-bold">Note : <u>Fields with "*" are mandatory to fill.</u></p>
                            <div class="row px-4">

                                <div class="">
                                    <div class="w-full d-flex gap-5">
                                        <label class="form-label mt-2 text-dark"> <input class="form-check-input bg-dark"
                                                type="checkbox" name="has_esi" id="ESI_ceckbox">
                                            <span class="text-wrap">If you want to Opt for the ESI, Please Tick the
                                                checkbox <br> and then write the previous ESI No. If you have
                                                any?</span></label>
                                    </div>
                                </div>

                                <div class="ESI_Input-field">
                                    <label class="form-label mt-2 text-dark">ESI Number <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" class="form-control for_char" placeholder="Enter ESI format Like 00-00-123456-000-0001 "
                                        name="emp_esi_no">
                                        <span class="emp_esi_no"></span>
                                </div>


                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary login-btn user_submit"
                                        id="ESI_save_btn">Save &
                                        Next <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Seventh Card  Relation & Nominee --}}
                </form>
            </div>
        @endif


        {{-- Nominee Details & Relationship --}}
        @if ($details->rec_form_status == 'esi_stage')
            <div class="nominee-details-form" style="height: auto;">
                <form class="nominee_form">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="rec_id" value="{{ $id }}">
                    </div>
                    <div class="row px-5 py-3" style="padding-top: 50px; padding-bottom: 50px;">
                        <div class="col-sm-12 col-md-6 bg-white" style="padding-bottom: 100px; position: relative;">

                            <h3 class="text-center fw-bold px-3" style="position: absolute; top: 50px;">Recruitment
                                Relationship Form</h3>


                            <div class="col-md-12 d-flex align-items-center justify-content-end mt-5">
                                <button type="button" class="btn btn-primary" id="add-more-btn-recr">Add More <i
                                        class="fa-solid fa-user-plus"></i></button>
                            </div>
                            <p class="text-danger my-2">Note : <u>Fields with "*" are mandatory to fill.</u></p>
                            <div id="family-member-container">
                                <div class="row px-3 family-member-section  p-3 mt-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Family Member Name <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="family_member_name[]" placeholder="Enter Name"
                                            class="form-control bg-white for_char" required>
                                            <span class="family_member_name"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Relationship with Member <span
                                                class="text-danger fw-bold">*</span></label>
                                        <select name="relation_with_mem[]" class="form-control bg-white" required>
                                            <option value="" selected="" disabled="">Select
                                            </option>
                                            <option value="father">Father</option>
                                            <option value="mother">Mother</option>
                                            <option value="brother">Brother</option>
                                            <option value="sister">Sister</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Aadhar Card Number <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="text" name="aadhar_card_no[]" class="form-control bg-white"
                                            maxlength="12" placeholder="Enter Aadhar Number" oninput="this.value=this.value.replace(/[^0-9]/g,'');" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="date" name="dob[]" class="form-control bg-white" max="{{date('Y-m-d',strtotime('18 years ago'))}}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Upload Aadhar Document <span
                                                class="text-danger fw-bold">*</span></label>
                                        <input type="file" class="form-control" name="aadhar_card_doc[]"
                                            accept=".pdf" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Stay with Member? <span
                                                class="text-danger fw-bold">*</span></label>
                                        <select name="stay_with_mem[]" class="form-control bg-white" required>
                                            <option value="" selected="" disabled="">Select
                                            </option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6" style="background-color:#F8FAFC;">
                            <h3 class="text-center fw-bold px-3 py-5">Nominee & Dispensary Details</h3>
                            <div class="row px-2 mt-4">
                                <div class="col-md-6">
                                    <label class="form-label">Nominee Name <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" placeholder="Enter Nominee" name="nominee"
                                        class="form-control for_char" required>
                                        <span class="nominee"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Dispensary Near You <span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" placeholder="Enter Dispensary That is near by you"
                                        class="form-control" name="dispensary_near_you" required>
                                        
                                </div>
                            </div>
                        </div>

                        <div class="text-end px-5">
                            <button type="submit" class="btn btn-primary user_submit">Save & Next <i
                                    class="fa-solid fa-arrow-right"></i></button>
                        </div>
                </form>
            </div>
        @endif

        {{-- After Documents Submission --}}
        @if ($details->rec_form_status == 'relationship_stage')
        <div class="col-md-6 offset-md-3 shadow-lg  rounded-sm vh-100 d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-body text-center bg-white rounded-sm">
                   
                    <img src="https://img.icons8.com/ios/452/checked.png" alt="Success" class="mb-4" style="width: 50px; height: 50px;">
                    
                   <h1>Congratulations</h1>
                    <h3 class="text-success mt-5 py-3">Your Documents Submitted Successfully.</h3>
                </div>
            </div>
        </div>
        
        @endif

        <div class="text-center text-white border-top p-2 mt-2">
            <p>© 2025 All Rights Reserved. Prakhar Softwares Solution Ltd.</p>
        </div>
    </div>
@endsection
@section('script')
    <script src={{ asset('assets/js/personal-details.js') }}></script>
    <script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection
