@extends('layouts.guest.master', ['title' => 'Personal Details Form'])
@section('content')
<div class="h-auto" style="background-color:#034d48; width: 100%; padding-top: 1rem;">
    <div class="col-12" style="padding-left: 3%; padding-right: 3%; margin-top: 2rem;">
        <div class="d-flex border bg-white py-3 px-2 shadow-lg rounded-3 bg-white p-0">
            <div>
                <img src="{{ asset('assets/images/PrakharLimited-logo.png')}}" alt="logo left" style="width: 15%;">
            </div>
            <div>
                <img src="{{asset('assets/images/11years.png')}}" alt="logo right" style="width: 60%;" />
            </div>
        </div>
    </div>

    <!-- Form 1 personal -->
    <div class="personal-details-form">
        <form class="">
            <div class="row px-5 py-3">
                <div class="col-md-6 bg-white">
                    <h5 class="text-center px-3 py-5 fw-bold">Recruitment Personal Details Form</h5>
                    <div class="row px-4">
                        <div class="col-md-6">
                            <label class="form-label text-dark">Gender</label>
                            <select name="gender" class="form-control bg-white" required>
                                <option value="" selected="" disabled="">Select Gender
                                </option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  text-dark">Category</label>
                            <select name="category" class="form-control bg-white" required>
                                <option value="" selected="" disabled="">Select Category
                                </option>
                                <option value="general">General</option>
                                <option value="obc">OBC</option>
                                <option value="sc">SC</option>
                                <option value="st">ST</option>
                            </select>
                            </label>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Preferred Job Location</label>
                            <input type="text" name="preferred_location" class="form-control bg-white"
                                placeholder="Enter preffered job location" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Choose File</label>
                            <input type="file" name="category_doc" class="form-control bg-white" accept=".pdf">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Nearest Police Station</label>
                            <input type="text" name="nearest_police_station" class="form-control bg-white"
                                placeholder="Enter nearest police station no." required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Marital Status</label>
                            <select name="marital_status" class="form-control bg-white" required>
                                <option value="Not Specified" selected disabled>Not
                                    Specified
                                </option>
                                <option value="unmarried">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Spouse Name</label>
                            <input type="text" name="spouse_name" class="form-control bg-white" placeholder="Enter spouse name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Date of Marriage</label>
                            <input type="date" name="date_of_marriage" class="form-control bg-white">
                        </div>

                        <div class="col-md-6">

                            <label class="form-label text-dark">Add Signature photo</label>
                            <input type="file" name="signature" class="form-control bg-white" accept=".jpg, .jpeg, .png"
                                required>

                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Add Passport size photo</label>
                            <input type="file" name="photograph" class="form-control bg-white" accept=".jpg, .jpeg, .png"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Language Known</label>
                            <input type="text" name="language_known" class="form-control bg-white"
                                placeholder="Enter Language Known" required>
                        </div>

                    </div>

                </div>
                <div class="col-md-6" style="background-color:#F8FAFC; padding-bottom: 100px;">
                    <h5 class="text-center px-3 py-5 fw-bold">Recruitment General Details Form</h5>
                    <div class="row px-4">
                        <div class="col-md-6">
                            <label class="form-label text-dark">Father's Name</label>
                            <input type="text" name="father_name" class="form-control bg-white"
                                placeholder="Enter father's full name" required>
                        </div>
                        <div class="col-md-6">

                            <label class="form-label text-dark">Father's Contact No.</label>
                            <input type="number" name="father_mobile" class="form-control bg-white"
                                placeholder="Enter father's contact number" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Blood Group</label>
                            <select name="blood_group" class="form-control bg-white">
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
                            <label class="form-label text-dark">PF Number</label>
                            <input type="number" name="pf_no" class="form-control bg-white" placeholder="Enter pf number">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Police verification Id</label>
                            <input type="number" name="police_verification_id" class="form-control bg-white"
                                placeholder="Enter Your Police Verification No.">

                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Upload Verification Doc</label>
                            <input type="file" name="police_verification_doc" class="form-control bg-white" accept=".pdf">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Passport No.</label>
                            <input type="number" name="passport_no" class="form-control bg-white"
                                placeholder="Enter Your Passport No.">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Passport No Doc</label>
                            <input type="file" name="passport_doc" class="form-control bg-white" accept=".pdf">
                        </div>

                        <div class="col-md-6">

                            <label class="form-label text-dark">Aadhar Card No.</label>
                            <input type="text" name="aadhar_card_no" class="form-control bg-white"
                                placeholder="Enter Your Aadhar No." maxlength="12"
                                onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                required>


                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Aadhar No Doc</label>
                            <input type="file" name="aadhar_card_doc" class="form-control bg-white" accept=".pdf" required>

                        </div>

                    </div>

                </div>
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary" id="user_submit">Submit
                        <i class="fa-solid fa-arrow-right"></i></button>

                </div>
            </div>

        </form>

    </div>

    <!-- Second form  Recruitment Address Details-->

    <div class="recruitment-details-form" style="display: none; height: 100vh;">
        <form class="d-flex align-items-center justify-content-center">
            <div class="row px-5  mt-5">
                <div class="col-md-12 bg-white" style="padding-top: 20px; padding-bottom: 100px;">
                    <h5 class="text-center px-3 py-5 fw-bold">Recruitment Address Details Form</h5>
                    <div class="row px-4">
                        <div class="col-md-6">

                            <label class="form-label  text-dark">Permanent Address</label>

                            <textarea placeholder="Enter Complete Permanent Address" name="permanent_add"
                                class="w-full form-control bg-white" id="permanent" required
                                style="height: 10px;"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Type Of Document</label>
                            <select name="per_doc_type" class="form-control bg-white" required>
                                <option value="" selected disabled>Select Document Type
                                </option>
                                <option value="electricity bill">Electricity Bill</option>
                                <option value="aadhar card">Aadhar Card</option>
                                <option value="voter id card">Voter Id Card</option>
                                <option value="ration card">Ration Card</option>
                                <option value="rent agreement">Rent Agreement</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark ">Upload Doc</label>
                            <input type="file" name="permanent_add_doc" class="form-control bg-white" accept=".pdf"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleTextarea" class="form-label text-dark">Correspondence
                                Address
                                <span>
                                    <input class="form-check-input bg-primary text-dark" type="checkbox" id="sameas">
                                </span>
                                Check If Same as permanent</label>
                            <textarea class="form-control bg-white" name="correspondence_add"
                                placeholder="Enter Correspondence Address" id="correspondence" required
                                style="height: 10px;"></textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Type Of Document</label>
                            <select name="corres_doc_type" class="form-control bg-white">
                                <option value="" selected disabled>Select Document Type
                                </option>
                                <option value="electricity bill">Electricity Bill</option>
                                <option value="aadhar card">Aadhar Card</option>
                                <option value="voter id card">Voter Id Card</option>
                                <option value="ration card">Ration Card</option>
                                <option value="rent agreement">Rent Agreement</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark bg-white">Upload Doc</label>
                            <input type="file" name="correspondence_add_doc" class="form-control" accept=".pdf"
                                required>
                        </div>

                    </div>

                </div>

                <div class="col-md-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary" id="Address_details">Save
                        &
                        Next
                        <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>


    <!-- Third form Bank details -->

    <div class="bank-details-form" style="display: none; height: 100vh;">
        <form class="d-flex align-items-center justify-content-center">
            <div class="row px-5 py-3 mt-5">

                <div class="col-md-12 bg-white" style="padding-top: 20px; padding-bottom: 100px;">
                    <h5 class="text-center px-3 py-5 fw-bold">Recruitment Bank Details Form</h5>
                    <div class="row px-4">
                        <div class="col-md-6">

                            <label class="form-label text-dark">Bank Name</label>

                            <select name="blood_group" class="form-control bg-white">
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
                            <label class="form-label text-dark">Bank Account No.</label>

                            <input type="text" class="form-control bg-white" required placeholder="Enter Bank Account No">
                        </div>

                        <div class="col-md-6">
                            <label for="exampleTextarea" class="form-label text-dark">Bank IFSC
                                No.</label>
                            <input type="text" class="form-control bg-white" required placeholder="Enter Bank IFSC No">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">PAN Card No</label>
                            <input type="text" class="form-control bg-white" required placeholder="Enter PAN  No">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Upload PAN Doc</label>
                            <input type="file" name="verification_file" class="form-control bg-white" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Bank Cancelled Cheque/Bank
                                Passbook</label>

                            <input type="file" name="verification_file" class="form-control bg-white" required>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary" id="bank-details">Save
                        &
                        Next
                        <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>


    <!-- Forth Form -->

    <div class="education-details-form" style="display: none;">
        <form>
            <div class="row px-5 py-3">
                <div class="col-md-6 bg-white">
                    <h5 class="text-center px-3 py-5">Recruitment Education Details Form</h5>
                    <div class="px-4 mb-2">
                        <h5 class="border-bottom">10th Class Section</h5>
                    </div>
                    <div class="row px-4 mt-2">
                        <div class="col-md-6">

                            <label class="form-label text-dark">10th Class % / CGPA</label>

                            <input type="text" class="form-control bg-white" placeholder="Enter 10th % Or CGPA">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">10th Class Passing
                                Year</label>
                            <input type="number" class="form-control bg-white" placeholder="Enter 10th Passing Year">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">10th Class Board</label>
                            <input type="text" class="form-control bg-white" placeholder="Enter 10th Board Name">

                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">10th Class Board Document</label>
                            <input type="file" name="verification_file" class="form-control bg-white">
                        </div>

                        <div class="px-4 mb-2">
                            <h5 class="border-bottom">Graduation Section</h5>
                        </div>

                        <div class="col-md-6">

                            <label class="form-label  text-dark">Graduation Degree Name</label>

                            <input type="text" class="form-control bg-white" placeholder="Enter Graduation Degree Name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Graduation % /
                                CGPA</label>
                            <input type="number" class="form-control bg-white" placeholder="ENter % or CGPA">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Graduation Passing Year
                            </label>
                            <input type="number" class="form-control bg-white" placeholder="Enter Graduation Passing Year">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  text-dark">Graduation Mode</label>
                            <select name="blood_group" class="form-control bg-white">
                                <option value="Not Specified">Not Specified</option>
                                <option value="a+">A+</option>
                                <option value="a-">A-</option>
                                <option value="b+">B+</option>

                            </select>

                        </div>


                        <div class="col-md-6">
                            <label class="form-label  text-dark">Graduation Document</label>
                            <input type="file" name="verification_file" class="form-control bg-white">

                        </div>

                    </div>

                </div>

                <div class="col-md-6 " style="background-color: #F8FAFC;padding-bottom: 50px;">
                    <h5 class="text-center px-3 py-5">Recruitment Education Details Form</h5>
                    <div class="px-4 mb-2">
                        <h5 class="border-bottom">12th Class Section</h5>
                    </div>
                    <div class="row px-4 mt-2">
                        <div class="col-md-6">

                            <label class="form-label text-dark">12th Class % / CGPA</label>

                            <input type="text" class="form-control bg-white" placeholder="Enter 12th % Or CGPA">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">12th Class Passing
                                Year</label>
                            <input type="number" class="form-control bg-white" placeholder="Enter 12th Passing Year">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">12th Class Board</label>
                            <input type="text" class="form-control bg-white" placeholder="Enter 12th Board Name">

                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">12th Class Board Document</label>
                            <input type="file" name="verification_file" class="form-control bg-white">
                        </div>

                        <div class="px-4 mb-2">
                            <h5 class="border-bottom">Post Graduation Section</h5>
                        </div>

                        <div class="col-md-6">

                            <label class="form-label  text-dark">Post Graduation Degree Name</label>

                            <input type="text" class="form-control bg-white" placeholder="Enter Post Graduation Degree Name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Post Graduation % /
                                CGPA</label>
                            <input type="number" class="form-control bg-white" placeholder="Enter % or CGPA">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Post Graduation Passing Year
                            </label>
                            <input type="number" class="form-control bg-white" placeholder="Enter Post Graduation Passing Year">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  text-dark">Post Graduation Mode</label>
                            <select name="blood_group" class="form-control bg-white">
                                <option value="Not Specified">Not Specified</option>
                                <option value="a+">A+</option>
                                <option value="a-">A-</option>
                                <option value="b+">B+</option>

                            </select>

                        </div>


                        <div class="col-md-6">
                            <label class="form-label  text-dark">Post Graduation Document</label>
                            <input type="file" name="verification_file" class="form-control bg-white">

                        </div>

                    </div>

                </div>

                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-primary" id="education-details-form">Save
                        &
                        Next
                        <i class="fa-solid fa-arrow-right"></i></button>
                </div>

            </div>
        </form>
    </div>


    <!-- Fourth Form  Company details-->

    <div class="company-details-form " style="height: auto; display: none;">
        <form>
            <div class="row px-5 py-3" style="padding-top: 50px; padding-bottom: 50px;">
                <div class="col-md-6 bg-white" style="padding-bottom: 100px;">
                    <h5 class="text-center px-3 py-5">Curreny Company Details Form</h5>
                    <div class="row px-4">
                        <div class="col-md-6">

                            <label class="form-label text-dark">Company Name <span class="text-danger">*</span></label>

                            <input type="text" class="form-control bg-white" placeholder="Enter Company Name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Designation <span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-white" required placeholder="Enter Designation">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Current CTC <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control bg-white" required placeholder="Enter Current CTC">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark">Current Home Salary <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control bg-white" placeholder="Enter Current Take Home Salary">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Last 3 months Salary Slip Document
                            </label>
                            <input type="file" class="form-control bg-white">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Last 3 months bank Statements
                            </label>
                            <input type="file" class="form-control bg-white">
                        </div>

                    </div>

                </div>

                <div class="col-md-6" style="background-color: #F8FAFC" ;>
                    <h5 class="text-center px-3 py-5">Others Current Company Details Form</h5>
                    <div class="row px-4">
                        <div class="col-md-6">

                            <label class="form-label text-dark">Differnt Technologies you have
                                worked
                                in <span class="text-danger">*</span></label>

                            <input type="text" class="form-control bg-white"
                                placeholder="Enter Differnt Technologies you have worked in">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleTextarea" class="form-label text-dark">Differnt Project
                                you
                                have worked in <span class="text-danger">*</span></label>
                            <input type="text" class="form-control bg-white" required
                                placeholder="Enter Differnt Project you have worked in">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark"> Start Date
                            </label>
                            <input type="date" class="form-control bg-white">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-dark"> End Date
                            </label>
                            <input type="date" class="form-control bg-white">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-dark">Exp/Appraisal Document
                            </label>
                            <input type="file" class="form-control bg-white">
                        </div>



                    </div>

                </div>

                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-primary" id="company-details-form-btn">Save
                        &
                        Next
                        <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>

    <!-- ESI From -->


    <div class="ESI-details-form" style="height: auto; display: none;">
        <form>
            <div class="row px-5 py-3" style="padding-top: 50px; padding-bottom: 50px;">


                <div class="col-md-12" style="background-color: #F8FAFC">
                    <h5 class="text-center px-3 py-5 fw-bold">ESI Details Form</h5>
                    <div class="row px-4">

                        <span class="text-wrap text-danger">If you want to Opt for the ESI, then write the previous
                            ESI
                            No.
                            If you have
                            any?</span>

                        <div class="col-md-6">
                            <label class="form-label mt-2 text-dark">ESI Number</label>
                            <input type="text" class="form-control bg-white" placeholder="Enter ESI Number">
                        </div>

                    </div>

                </div>

                <div class="col-md-12 text-end">
                    <button type="button" class="btn btn-primary" id="esi-btn">Save
                        &
                        Next
                        <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>


    <!-- Nominee Form -->

   
    <div class="nominee-details-form" style="height: auto; display: none;">
        <form>
            <div class="row px-5 py-3" style="padding-top: 50px; padding-bottom: 50px;">
                <div class="col-sm-12 col-md-6 bg-white" style="padding-bottom: 100px; position: relative;">

                    <h3 class="text-center fw-bold px-3" style="position: absolute; top: 50px;">Recruitment Relationship Form</h3>

                    <div class="col-md-12 d-flex align-items-center justify-content-end mt-5">
                        <button type="button" class="btn btn-primary" id="add-more-btn-recr">Add More  <i class="fa-solid fa-user-plus"></i></button>
                    </div>

                    <div id="family-member-container">
                        <!-- Family Member Section -->
                        <div class="row px-3 family-member-section  p-3 mt-4">
                            <div class="col-md-6">
                                <label class="form-label">Family Member Name</label>
                                <input type="text" class="form-control bg-white" placeholder="Enter Name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Relationship with Member</label>
                                <select class="form-control bg-white" required>
                                    <option value="" disabled selected>Select Relationship</option>
                                    <option value="father">Father</option>
                                    <option value="mother">Mother</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="child">Child</option>
                                    <option value="sibling">Sibling</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Aadhar Card Number</label>
                                <input type="text" class="form-control bg-white" placeholder="Enter Aadhar Number">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control bg-white">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Upload Aadhar Document</label>
                                <input type="file" class="form-control bg-white">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Stay with Member?</label>
                                <select class="form-control bg-white" required>
                                    <option value="" disabled selected>Select Option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="col-md-6" style="background-color:#F8FAFC;">
                    <h3 class="text-center fw-bold px-3 py-5">Nominee & Dispensary Details</h3>
                    <div class="row px-2">
                        <div class="col-md-6">
                            <label class="form-label">Nominee Name</label>
                            <input type="text" class="form-control bg-white" placeholder="Enter Nominee Name">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Dispensary Near You</label>
                            <input type="text" class="form-control bg-white" placeholder="Enter Nearby Dispensary Name">
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end px-5">
                <button type="submit" class="btn btn-primary">Save <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </form>
    </div>
    
       
    
    

    <div class="text-center text-white border-top p-2 mt-2">
        <p>© 2025 All Rights Reserved. Prakhar Softwares Solution Ltd.</p>
    </div>

</div>

@endsection
@section('script')
<script src="{{asset('assets/js/personal-details.js')}}"></script>
<script>

    $(document).ready(function () {
        $("#user_submit").click(function () {
            $(".personal-details-form").hide();
            $(".recruitment-details-form").show();
        });

        $("#Address_details").click(function () {
            $(".recruitment-details-form").hide();
            $(".bank-details-form").show();

        });

        $("#bank-details").click(function () {
            $(".bank-details-form").hide();
            $(".education-details-form").show();

        });

        $("#education-details-form").click(function () {
            $(".education-details-form").hide();
            $(".company-details-form").show();

        });

        $("#company-details-form-btn").click(function () {
            $(".company-details-form").hide();
            $(".ESI-details-form").show();

        });

        $("#esi-btn").click(function () {
            $(".ESI-details-form").hide();
            $(".nominee-details-form").show();

        });

        
           
            $("#add-more-btn-recr").click(function () {
                let newFamilyMember = `
                    <div class="row px-3 family-member-section border-top p-3 mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Family Member Name</label>
                            <input type="text" class="form-control bg-white" placeholder="Enter Name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Relationship with Member</label>
                            <select class="form-control bg-white" required>
                                <option value="" disabled selected>Select Relationship</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="spouse">Spouse</option>
                                <option value="child">Child</option>
                                <option value="sibling">Sibling</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Aadhar Card Number</label>
                            <input type="text" class="form-control bg-white" placeholder="Enter Aadhar Number">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" class="form-control bg-white">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Upload Aadhar Document</label>
                            <input type="file" class="form-control bg-white">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Stay with Member?</label>
                            <select class="form-control bg-white" required>
                                <option value="" disabled selected>Select Option</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-danger mt-3 remove-family-member">Remove <i class="fa-solid fa-user-minus"></i></button>
                        </div>
                    </div>
                `;
                $("#family-member-container").append(newFamilyMember);
            });

           
            $(document).on("click", ".remove-family-member", function () {
                $(this).closest(".family-member-section").remove();
            });
        


        





    });




</script>
@endsection