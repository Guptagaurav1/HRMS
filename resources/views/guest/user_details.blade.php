@extends('layouts.master')

@section('style')

    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />


@endsection

@section('contents')
    <div class="row" id="background_image_1">
        <div class="d-flex justify-content-center">
            <div class="login-body">
                <div class="top d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <img src="{{asset('assets/images/PrakharNEWLogo.png')}}" alt="Logo" width="30%">
                    </div>
                    <a href="{{'/'}}"><i class="fa-duotone fa-house-chimney"></i></a>
                </div>
                <div class="bottom">
                    <h3 class="panel-title text-dark" id="details_form">Recruitment Personal Details Form</h3>

                    <form>

                        {{-- First Card --}}
                        <div class="form_handleing">
                            <div class="row mb-2 ">
                                <div class="col-md-12">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Gender</label>
                                        <select name="sel_gen" id="sel_gen" class="form-control" required>
                                            <option value="" selected="" disabled="">Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">Category</label>
                                        <select name="sel_cat" id="sel_cat" class="form-control" required>
                                            <option value="" selected="" disabled="">Select Category</option>
                                            <option value="general">General</option>
                                            <option value="obc">OBC</option>
                                            <option value="sc">SC</option>
                                            <option value="st">ST</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Preferred Job Location</label>
                                        <input type="text" name="location" class="form-control"
                                            placeholder="Enter preffered job location" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Father's Name</label>
                                        <input type="text" name="father_name" class="form-control"
                                            placeholder="Enter father's full name" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Father's Contact No.</label>
                                        <input type="number" name="father_contact" class="form-control"
                                            placeholder="Enter father's contact number" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
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
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">PF Number</label>
                                        <input type="number" name="pf_number" class="form-control"
                                            placeholder="Enter pf number" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Police verification Id</label>
                                        <input type="number" name="police_verification_number" class="form-control"
                                            placeholder="Enter Your Police Verification No." required>
                                        <input type="file" name="verification_file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Nearest Police Station</label>
                                        <input type="number" name="police_station" class="form-control"
                                            placeholder="Enter nearest police station no." required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Marital Status</label>
                                        <select name="martial_status" class="form-control" required>
                                            <option value="Not Specified" selected="" disabled="">Not Specified</option>
                                            <option value="unmarried">Single</option>
                                            <option value="married">Married</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Spouse Name</label>
                                        <input type="text" name="spouse_name" class="form-control"
                                            placeholder="Enter spouse name" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Date of Marriage</label>
                                        <input type="date" name="dom" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Passport No.</label>
                                        <input type="number" name="passport_no" class="form-control"
                                            placeholder="Enter Your Passport No." required>
                                        <input type="file" name="passport_file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Aadhar Card No.</label>
                                        <input type="number" name="aadhar_no" class="form-control"
                                            placeholder="Enter Your Aadhar No." required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Add Signature photo</label>
                                        <input type="file" name="signature_photo" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Add Passport size photo</label>
                                        <input type="file" name="photo" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Language Known</label>
                                        <input type="text" name="father_contact" class="form-control" required>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary login-btn" id="user_submit">Submit <i
                                        class="fa-solid fa-arrow-right"></i></button>

                            </div>
                        </div>

                        {{-- Second Card --}}

                        <div class="address_details">
                            <h3 class="panel-title text-dark">Recruitment Address Details Form</h3>

                            <div class="row mb-2 ">
                                <div class="col-md-12">
                                    <div class="w-full">
                                        <label class="form-label mt-2 text-dark">Permanent Address</label>

                                        <textarea placeholder="Enter Complete Permanent Address With State and City"
                                            class="w-full form-control"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <div class="">
                                            <label class="form-label text-dark">Type Of Document</label>
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
                                            <input type="file" name="verification_file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label for="exampleTextarea" class="form-label text-dark">Correspondence Address
                                            <span><input class="form-check-input" type="checkbox"
                                                    id="inlineFormCheck"></span>Check If Same as permanent</label>
                                        <textarea class="form-control" id="exampleTextarea"
                                            placeholder="Enter Correspondence Address"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Type Of Document</label>
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
                                        <input type="file" name="verification_file" class="form-control">
                                    </div>
                                </div>



                            </div>

                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary login-btn" id="save_next">Save & Next <i
                                        class="fa-solid fa-arrow-right"></i></button>

                            </div>
                        </div>

                        {{-- Third card--}}


                        <div class="bank_details">
                            <h3 class="panel-title text-dark">Recruitment Bank Details Form</h3>
                            <div class="row mb-2 ">
                                <div class="col-md-12">
                                    <div class="w-full">
                                        <label class="form-label mt-2 text-dark">Bank Name</label>

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
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <div class="">
                                            <label class="form-label text-dark">Bank Account No.</label>

                                            <input type="text" class="form-control" required
                                                placeholder="Enter Bank Account No">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label for="exampleTextarea" class="form-label text-dark">Bank IFSC No.</label>
                                        <input type="text" class="form-control" required placeholder="Enter Bank IFSC No">

                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">PAN Card No</label>
                                        <input type="text" class="form-control" required placeholder="Enter PAN  No">

                                        <input type="file" name="verification_file" class="form-control" required>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Bank Cancelled Cheque/Bank
                                                Passbook</label>


                                            <input type="file" name="verification_file" class="form-control" required>
                                        </div>
                                    </div>



                                </div>

                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary login-btn" id="bank_details_save_btn">Save & Next <i
                                            class="fa-solid fa-arrow-right"></i></button>

                                </div>
                            </div>
                        </div>


                        {{-- Fourth card Education --}}

                        <div class="education_details">
                            <h3 class="panel-title text-dark">Recruitment Education Details Form</h3>
                            <div>
                                <h5>10th Class Section</h5>
                            </div>

                            <div class="row mb-2 ">
                                <div class="col-md-12">
                                    <div class="w-full">
                                        <label class="form-label mt-2 text-dark">10th Class % / CGPA</label>

                                        <input type="text" class="form-control" placeholder="Enter 10th % Or CGPA">

                                    </div>
                                </div>

                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <div class="">
                                            <label class="form-label mt-2 text-dark">10th Class Passing Year</label>
                                            <input type="number" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <div class="">
                                            <label class="form-label mt-2 text-dark">10th Class Board</label>
                                            <input type="text" class="form-control" placeholder="Enter 10th Board Name">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label mt-2 text-dark">10th Class Board Document</label>
                                        <input type="file" name="verification_file" class="form-control">

                                    </div>
                                </div>

                                <div class="col-md-12 my-2">
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
                                                <input class="form-check-input" type="checkbox"
                                                    id="postgraduation_checkbox">
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
                                            <label class="form-label mt-2 text-dark">10th Class % / CGPA</label>

                                            <input type="text" class="form-control" placeholder="Enter 10th % Or CGPA">

                                        </div>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">12th Class Passing Year</label>
                                                <input type="number" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">12th Class Board</label>
                                                <input type="text" class="form-control" placeholder="Enter 10th Board Name">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label mt-2 text-dark">12th Class Board Document</label>
                                            <input type="file" name="verification_file" class="form-control">

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
                                            <label class="form-label mt-2 text-dark">Graduation Degree Name</label>

                                            <input type="text" class="form-control"
                                                placeholder="Enter Graduation Degree Name">

                                        </div>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">Graduation % / CGPA</label>
                                                <input type="number" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">Graduation Passing Year</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Enter Graduation Passing Year">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">Graduation Mode</label>
                                                <select name="blood_group" class="form-control">
                                                    <option value="Not Specified">Not Specified</option>
                                                    <option value="a+">A+</option>
                                                    <option value="a-">A-</option>
                                                    <option value="b+">B+</option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label mt-2 text-dark">Graduation Document</label>
                                            <input type="file" name="verification_file" class="form-control">

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
                                            <label class="form-label mt-2 text-dark">Post Graduation Degree Name</label>

                                            <input type="text" class="form-control"
                                                placeholder="Enter Graduation Degree Name">

                                        </div>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">Post Graduation % / CGPA</label>
                                                <input type="number" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">Post Graduation Passing
                                                    Year</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Enter Graduation Passing Year">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <div class="">
                                                <label class="form-label mt-2 text-dark">Post Graduation Mode</label>
                                                <select name="blood_group" class="form-control">
                                                    <option value="Not Specified">Not Specified</option>
                                                    <option value="a+">A+</option>
                                                    <option value="a-">A-</option>
                                                    <option value="b+">B+</option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label mt-2 text-dark">Post Graduation Document</label>
                                            <input type="file" name="verification_file" class="form-control">

                                        </div>
                                    </div>



                                </div>


                            </div>

                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary login-btn" id="save_next_education">Save &
                                    Next <i class="fa-solid fa-arrow-right"></i></button>

                            </div>
                        </div>

                        {{-- Fifth Card Company Details --}}

                        <div class="company_details">
                            <h3 class="panel-title text-dark">Current Compant Details Form</h3>
                            <div class="row mb-2 ">
                                <div class="col-md-12">
                                    <div class="w-full">
                                        <label class="form-label mt-2 text-dark">Company Name <span class="text-danger">*</span></label>

                                        <input type="text" class="form-control" placeholder="Enter Company Name">

                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <div class="">
                                            <label class="form-label text-dark">Differnt Technologies you have worked in <span class="text-danger">*</span></label>

                                            <input type="text" class="form-control"
                                                placeholder="Enter Differnt Technologies you have worked in">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label for="exampleTextarea" class="form-label text-dark">Differnt Project you have worked in <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" required placeholder="Enter Differnt Project you have worked in">

                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <div class="">
                                        <label class="form-label text-dark">Designation <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" required placeholder="Enter Designation">
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Current CTC <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" required placeholder="Enter Current CTC">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Current Home Salary <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" placeholder="Enter Current Take Home Salary">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark"> Start Date
                                            </label>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark"> End Date
                                            </label>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Exp/Appraisal
                                            </label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Last 3 months Salary Slip Document
                                            </label>
                                            <input type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <div class="">
                                            <label class="form-label text-dark">Last 3 months bank Statements
                                            </label>
                                            <input type="file" class="form-control">
                                        </div>
                                        
                                    </div>

                                </div>

                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary login-btn" id="company_details_save_btn">Save & Next <i
                                            class="fa-solid fa-arrow-right"></i></button>

                                </div>
                            </div>
                        </div>

                        {{-- Six card ESI --}}

                        <div class="ESI_details" style="height:100vh">
                            <h3 class="panel-title text-dark">Recruitments ESI Details Form</h3>
                            <div class="row mb-2 ">
                                <div class="col-md-12">
                                    <div class="w-full d-flex gap-5">
                                        <label class="form-label mt-2 text-dark"> <input class="form-check-input" type="checkbox" id="ESI_ceckbox">
                                            <span class="text-wrap">If you want to Opt for the ESI, Please Tick the checkbox <br> and then write the previous ESI No. If you have any?</span></label>

                                       

                                    </div>
                                </div>

                                <div class="ESI_Input-field">
                                    <label class="form-label mt-2 text-dark">ESI Number</label>
                                    <input type="text" class="form-control" placeholder="Enter ESI Number" >
                                </div>                                
                                

                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary login-btn" id="ESI_save_btn">Save & Next <i
                                            class="fa-solid fa-arrow-right"></i></button>

                                </div>
                            </div>
                        </div>

                        {{-- Seventh Card  Relation & Nominee --}}

                        

                    </form>

                </div>

            </div>

        </div>

        {{-- Nominee Details & Relationship --}}

        <div class="relation_nominee">
            <h3 class="panel-title text-dark text-center">Recruitment Relationship & Nominee Details Form</h3>
            <div class="col-md-12 text-end">
                <button class="btn btn-sm btn-primary" id="add_more-items">Add More <i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="table-responsive mt-3 ">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="srno-column">S.No.</th>
                            <th class="rid-column">Family Members</th>
                            <th>Relationship with Member</th>
                            <th class="attributes-column">Aadhar Card No</th>
                            <th>D.O.B</th>
                            <th>Aadhar Document</th>
                            <th>Stay with member</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr id="table_body-row">
                            <td class="srno-column">1</td>
                            <td class="rid-column"> <input type="text" name="location" class="form-control">
                            </td>
                            <td> <select name="sel_gen" id="sel_gen" class="form-control" required>
                                <option value="" selected="" disabled="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select></td>
                            <td class="attributes-column"><input type="text" name="location" class="form-control"></td>
                            <td><input type="date" name="location" class="form-control"></td>
                            <td>

                                <input type="file"  class="form-control">
                            </td>

                            <td> <select name="sel_gen" id="sel_gen" class="form-control" required>
                                <option value="" selected="" disabled="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select></td>
                           
                            <td>

                                <button type="button" class="btn btn-primary">Reset <i class="fa-solid fa-rotate"></i></button>
                            </td>
                        </tr>
                      

                        <tr>
                            <th class="text-dark text-center" colspan="2">Nominee</th>
                            <td colspan="2">
                                <input type="text" placeholder="Enter Nominee" class="form-control">
                            </td>
                            <th class="text-dark text-center" colspan="2">Dispensary Near you</th>
                            <td colspan="2">
                                <input type="text" placeholder="Enter Dispensary That is near by you" class="form-control">
                            </td>
                        </tr>
                        
                    </tbody>
                </table>

                
            </div>
            <div class="col-md-12 text-end mt-4">
                <button type="submit" class="btn btn-primary">Save & Next <i
                        class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>

    </div>

@endsection


@section('script')

<script src={{asset('assets/js/personal-details.js')}}></script>
@endsection