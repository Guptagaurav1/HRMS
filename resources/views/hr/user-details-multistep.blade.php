<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    
    <title>Recruitment Form</title>
</head>

<body class="light-theme">
    
    <div class="h-auto" style="background-color:#83C0C1;">
         <div class="logo px-5 py-2">
            <img src="{{ asset('assets/images/PrakharNEWLogo.png') }}" alt="Logo" width="100px">
        </div>

           <!-- Form 1 personal -->
        <div class="personal-details-form">
            <form class="d-flex align-items-center justify-content-center">
                <div class="row px-5 py-3">
                    <div class="col-md-6 bg-white">
                        <h5 class="text-center px-3 py-5 fw-bold">Recruitment Personal Details Form</h5>
                        <div class="row px-4">
                            <div class="col-md-6">
                                <label class="form-label text-dark">Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="" selected="" disabled="">Select Gender
                                    </option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label  text-dark">Category</label>
                                <select name="category" class="form-control" required>
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
                                <input type="text" name="preferred_location" class="form-control"
                                    placeholder="Enter preffered job location" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Choose File</label>
                                <input type="file" name="category_doc" class="form-control" accept=".pdf">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Nearest Police Station</label>
                                <input type="text" name="nearest_police_station" class="form-control"
                                    placeholder="Enter nearest police station no." required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Marital Status</label>
                                <select name="marital_status" class="form-control" required>
                                    <option value="Not Specified" selected disabled>Not
                                        Specified
                                    </option>
                                    <option value="unmarried">Single</option>
                                    <option value="married">Married</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Spouse Name</label>
                                <input type="text" name="spouse_name" class="form-control"
                                    placeholder="Enter spouse name">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Date of Marriage</label>
                                <input type="date" name="date_of_marriage" class="form-control">
                            </div>

                            <div class="col-md-6">

                                <label class="form-label text-dark">Add Signature photo</label>
                                <input type="file" name="signature" class="form-control" accept=".jpg, .jpeg, .png"
                                    required>

                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Add Passport size photo</label>
                                <input type="file" name="photograph" class="form-control" accept=".jpg, .jpeg, .png"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Language Known</label>
                                <input type="text" name="language_known" class="form-control"
                                    placeholder="Enter Language Known" required>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6" style="background-color: #F8FAFC;">
                        <h5 class="text-center px-3 py-5 fw-bold">Recruitment General Details Form</h5>
                        <div class="row px-4">
                            <div class="col-md-6">
                                <label class="form-label text-dark">Father's Name</label>
                                <input type="text" name="father_name" class="form-control"
                                    placeholder="Enter father's full name" required>
                            </div>
                            <div class="col-md-6">

                                <label class="form-label text-dark">Father's Contact No.</label>
                                <input type="number" name="father_mobile" class="form-control"
                                    placeholder="Enter father's contact number" required>
                            </div>

                            <div class="col-md-6">
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

                            <div class="col-md-6">
                                <label class="form-label text-dark">PF Number</label>
                                <input type="number" name="pf_no" class="form-control" placeholder="Enter pf number">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Police verification Id</label>
                                <input type="number" name="police_verification_id" class="form-control"
                                    placeholder="Enter Your Police Verification No.">

                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Upload Verification Doc</label>
                                <input type="file" name="police_verification_doc" class="form-control" accept=".pdf">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Passport No.</label>
                                <input type="number" name="passport_no" class="form-control"
                                    placeholder="Enter Your Passport No.">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Passport No Doc</label>
                                <input type="file" name="passport_doc" class="form-control" accept=".pdf">
                            </div>

                            <div class="col-md-6">

                                <label class="form-label text-dark">Aadhar Card No.</label>
                                <input type="text" name="aadhar_card_no" class="form-control"
                                    placeholder="Enter Your Aadhar No." maxlength="12"
                                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                    required>


                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Aadhar No Doc</label>
                                <input type="file" name="aadhar_card_doc" class="form-control" accept=".pdf" required>

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

        <!-- Second form  Recruitment-->

        <div class="recruitment-details-form" style="display: none; height: 100vh;">
            <form class="d-flex align-items-center justify-content-center">
                <div class="row px-5 py-3 mt-5">
                    <div class="col-md-6 bg-white">
                        <h5 class="text-center px-3 py-5 fw-bold">Recruitment Address Details Form</h5>
                        <div class="row px-4">
                            <div class="col-md-6">

                                <label class="form-label  text-dark">Permanent Address</label>

                                <textarea placeholder="Enter Complete Permanent Address" name="permanent_add"
                                    class="w-full form-control" id="permanent" required
                                    style="height: 10px;"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Type Of Document</label>
                                <select name="per_doc_type" class="form-control" required>
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
                                <label class="form-label text-dark">Upload Doc</label>
                                <input type="file" name="permanent_add_doc" class="form-control" accept=".pdf" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleTextarea" class="form-label text-dark">Correspondence
                                    Address
                                    <span>
                                        <input class="form-check-input" type="checkbox" id="sameas">
                                    </span>
                                    Check If Same as permanent</label>
                                <textarea class="form-control" name="correspondence_add"
                                    placeholder="Enter Correspondence Address" id="correspondence" required
                                    style="height: 10px;"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Type Of Document</label>
                                <select name="corres_doc_type" class="form-control">
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
                                <label class="form-label text-dark">Upload Doc</label>
                                <input type="file" name="correspondence_add_doc" class="form-control" accept=".pdf"
                                    required>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6" style="background-color: #F8FAFC" ;>
                        <h5 class="text-center px-3 py-5 fw-bold">Recruitment Bank Details Form</h5>
                        <div class="row px-4">
                            <div class="col-md-6">

                                <label class="form-label text-dark">Bank Name</label>

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
                            <div class="col-md-6">
                                <label class="form-label text-dark">Bank Account No.</label>

                                <input type="text" class="form-control" required placeholder="Enter Bank Account No">
                            </div>

                            <div class="col-md-6">
                                <label for="exampleTextarea" class="form-label text-dark">Bank IFSC
                                    No.</label>
                                <input type="text" class="form-control" required placeholder="Enter Bank IFSC No">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">PAN Card No</label>
                                <input type="text" class="form-control" required placeholder="Enter PAN  No">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Upload PAN Doc</label>
                                <input type="file" name="verification_file" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-dark">Bank Cancelled Cheque/Bank
                                    Passbook</label>

                                <input type="file" name="verification_file" class="form-control" required>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary" id="Address_bank">Save
                            &
                            Next
                            <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>


        <!-- Third Form -->

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
    
                                <input type="text" class="form-control" placeholder="Enter 10th % Or CGPA">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">10th Class Passing
                                    Year</label>
                                <input type="number" class="form-control" placeholder="Enter 10th Passing Year">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">10th Class Board</label>
                                <input type="text" class="form-control" placeholder="Enter 10th Board Name">
    
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">10th Class Board Document</label>
                                <input type="file" name="verification_file" class="form-control">
                            </div>
    
                            <div class="px-4 mb-2">
                                <h5 class="border-bottom">Graduation Section</h5>
                            </div>
    
                            <div class="col-md-6">
    
                                <label class="form-label  text-dark">Graduation Degree Name</label>
    
                                <input type="text" class="form-control" placeholder="Enter Graduation Degree Name">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">Graduation % /
                                    CGPA</label>
                                <input type="number" class="form-control" placeholder="ENter % or CGPA">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Graduation Passing Year
                                </label>
                                <input type="number" class="form-control" placeholder="Enter Graduation Passing Year">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label  text-dark">Graduation Mode</label>
                                <select name="blood_group" class="form-control">
                                    <option value="Not Specified">Not Specified</option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="b+">B+</option>
    
                                </select>
    
                            </div>
    
    
                            <div class="col-md-6">
                                <label class="form-label  text-dark">Graduation Document</label>
                                <input type="file" name="verification_file" class="form-control">
    
                            </div>
    
                        </div>
    
                    </div>

                    <div class="col-md-6 " style="background-color: #F8FAFC">
                        <h5 class="text-center px-3 py-5">Recruitment Education Details Form</h5>
                        <div class="px-4 mb-2">
                            <h5 class="border-bottom">12th Class Section</h5>
                        </div>
                        <div class="row px-4 mt-2">
                            <div class="col-md-6">
    
                                <label class="form-label text-dark">12th Class % / CGPA</label>
    
                                <input type="text" class="form-control" placeholder="Enter 12th % Or CGPA">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">12th Class Passing
                                    Year</label>
                                <input type="number" class="form-control" placeholder="Enter 12th Passing Year">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">12th Class Board</label>
                                <input type="text" class="form-control" placeholder="Enter 12th Board Name">
    
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">12th Class Board Document</label>
                                <input type="file" name="verification_file" class="form-control">
                            </div>
    
                            <div class="px-4 mb-2">
                                <h5 class="border-bottom">Post Graduation Section</h5>
                            </div>
    
                            <div class="col-md-6">
    
                                <label class="form-label  text-dark">Post Graduation Degree Name</label>
    
                                <input type="text" class="form-control" placeholder="Enter Post Graduation Degree Name">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">Post Graduation % /
                                    CGPA</label>
                                <input type="number" class="form-control" placeholder="Enter % or CGPA">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Post Graduation Passing Year
                                </label>
                                <input type="number" class="form-control" placeholder="Enter Post Graduation Passing Year">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label  text-dark">Post Graduation Mode</label>
                                <select name="blood_group" class="form-control">
                                    <option value="Not Specified">Not Specified</option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="b+">B+</option>
    
                                </select>
    
                            </div>
    
    
                            <div class="col-md-6">
                                <label class="form-label  text-dark">Post Graduation Document</label>
                                <input type="file" name="verification_file" class="form-control">
    
                            </div>
    
                        </div>
    
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-primary" id="education-btn-save">Save
                            &
                            Next
                            <i class="fa-solid fa-arrow-right"></i></button>
                    </div>

                </div>
            </form>
        </div>


        <!-- Fourth Form  Company details-->

        <div class="company-details-form " style="height: 100vh; display: none;">
            <form>
                <div class="row px-5 py-3">
                    <div class="col-md-6 bg-white">
                        <h5 class="text-center px-3 py-5">Current Compant Details Form</h5>
                        <div class="row px-4">
                            <div class="col-md-6">
    
                                <label class="form-label text-dark">Company Name <span class="text-danger">*</span></label>
    
                                <input type="text" class="form-control" placeholder="Enter Company Name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Designation <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required placeholder="Enter Designation">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">Current CTC <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" required placeholder="Enter Current CTC">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Current Home Salary <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="Enter Current Take Home Salary">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">Last 3 months Salary Slip Document
                                </label>
                                <input type="file" class="form-control">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">Last 3 months bank Statements
                                </label>
                                <input type="file" class="form-control">
                            </div>
    
                        </div>
    
                    </div>

                    <div class="col-md-6" style="background-color: #F8FAFC" ;>
                        <h5 class="text-center px-3 py-5">Others Company Details Form</h5>
                        <div class="row px-4">
                            <div class="col-md-6">
    
                                <label class="form-label text-dark">Differnt Technologies you have
                                    worked
                                    in <span class="text-danger">*</span></label>
    
                                <input type="text" class="form-control"
                                    placeholder="Enter Differnt Technologies you have worked in">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleTextarea" class="form-label text-dark">Differnt Project
                                    you
                                    have worked in <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required
                                    placeholder="Enter Differnt Project you have worked in">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark"> Start Date
                                </label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark"> End Date
                                </label>
                                <input type="date" class="form-control">
                            </div>
    
                            <div class="col-md-6">
                                <label class="form-label text-dark">Exp/Appraisal Document
                                </label>
                                <input type="file" class="form-control">
                            </div>
    
                            <span class="text-wrap text-danger">If you want to Opt for the ESI, then write the previous ESI
                                No.
                                If you have
                                any?</span>
    
                            <div class="col-md-6">
                                <label class="form-label mt-2 text-dark">ESI Number</label>
                                <input type="text" class="form-control" placeholder="Enter ESI Number">
                            </div>


    
    
    
    
    
                        </div>
    
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-primary" id="Current_esi-btn">Save
                            &
                            Next
                            <i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Nominee Form -->

        <div class="nominee-details-form" style="height: 100vh; display: none;">
            <form>
                <div class="col-md-12 nominee">
                    <h3 class="panel-title text-dark text-center">Recruitment Relationship & Nominee Details Form</h3>
                    <div class="col-md-12 text-end px-3">
                        <button class="btn btn-sm btn-primary" id="add_more-items">Add More <i
                                class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="table-responsive mt-5 ">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead class="" style="background-color: gainsboro;">
                                <tr>
                                    <th class="srno-column fw-bold">S.No.</th>
                                    <th class="rid-column fw-bold">Family Members</th>
                                    <th class="fw-bold">Relationship with Member</th>
                                    <th class="attributes-column fw-bold">Aadhar Card No</th>
                                    <th class="fw-bold">D.O.B</th>
                                    <th class="fw-bold">Aadhar Document</th>
                                    <th class="fw-bold">Stay with member</th>
                                    <th class="fw-bold">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="table_body-row">
                                    <td class="srno-column fw-bold">1</td>
                                    <td class="rid-column"> <input type="text" name="location" class="form-control bg-white">
                                    </td>
                                    <td> <select name="sel_gen" id="sel_gen" class="form-control bg-white" required>
                                            <option value="" selected="" disabled="">Select Gender
                                            </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select></td>
                                    <td class="attributes-column"><input type="text" name="location" class="form-control bg-white">
                                    </td>
                                    <td><input type="date" name="location" class="form-control bg-white"></td>
                                    <td>
            
                                        <input type="file" class="form-control bg-white">
                                    </td>
            
                                    <td> <select name="sel_gen" id="sel_gen" class="form-control bg-white" required>
                                            <option value="" selected="" disabled="">Select Gender
                                            </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                        </select></td>
            
                                    <td>
        
                                        <button type="button" class="btn btn-primary">Reset <i
                                                class="fa-solid fa-rotate"></i></button>
                                    </td>
                                </tr>
            
            
                                <tr>
                                    <th class="text-dark text-center fw-bold" colspan="2">Nominee</th>
                                    <td colspan="2">
                                        <input type="text" placeholder="Enter Nominee" class="form-control bg-white">
                                    </td>
                                    <th class="text-dark text-center fw-bold" colspan="2">Dispensary Near you</th>
                                    <td colspan="2">
                                        <input type="text" placeholder="Enter Dispensary That is near you"
                                            class="form-control bg-white">
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
            </form>

        </div>
       
    </div>


    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/master.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('assets/js/personal-details.js')}}"></script>

    <script>

$(document).ready(function(){
    $("#user_submit").click(function(){
  $(".personal-details-form").hide();
  $(".recruitment-details-form").show();
});

$("#Address_bank").click(function(){
  $(".recruitment-details-form").hide();
  $(".education-details-form").show();

});

$("#education-btn-save").click(function(){
  $(".education-details-form").hide();
  $(".company-details-form").show();

});

$("#Current_esi-btn").click(function(){
  $(".company-details-form").hide();
  $(".nominee-details-form").show();

});





    
    let itemCount = 1;
        $('#add_more-items').click(function(){
            itemCount++;
            $('#table_body-row:last').after
            
            (`
            

            <tr>
                        <td class="srno-column">${itemCount}</td>
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

                            <button type="button" class="btn btn-primary remove-btn" >Remove <i class="fa-solid fa-trash"></i></i></button>

                            <button type="button" class="btn btn-primary">Reset <i class="fa-solid fa-rotate"></i></button>
                            
                        </td>
                    </tr>
            
            `
            
            );
            
        });

    
    $(document).on('click', '.remove-btn', function() {
    $(this).closest('tr').remove(); 
    });
  
});

       

       
    </script>


</body>

</html>