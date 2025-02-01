@extends('layouts.master')
@section('style')


<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />



@endsection

@section('contents')

<div class="dashboard-breadcrumb mb-25">
    <h2>Verifying Documents</h2>
    <h5>Current Status : <span class="text-danger">Offer Letter Sent</span>

    </h5>


</div>
<div class="row" id="tab-1">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Candidate Details</h5>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Employee Code </label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Employee Code">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Candidate Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Candidate Name">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark ">Gender <span class="text-danger">*</span></label>
                        <select id="" class="form-control form-control-sm">
                            <option value=""> Select Gender</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                            <option value="2">Others</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select id="" class="form-control form-control-sm">
                            <option value="">Select Category</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="inputDate" class="form-label">Date of Birth <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="inputDate">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Date Of Joining <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="inputDate">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Preferred Job Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Preferred Loaction">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Highest Qualification <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm"
                            placeholder="Enter Highest Qualification">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Salary / CTC(Per Month)</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter CTC">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Total Experience <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Experience">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact(Personal) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Contact Number">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email(Personal)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Email">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact (Office) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm"
                            placeholder="Enter Office Contact Number">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email (Office) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Office Email">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Guardian Name(Parents/Others) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Guardian Name">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Guardian(Parents/Others) Contact No.<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm"
                            placeholder="Enter Guardian Contact Number">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Blood Group">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Martial Status<span class="text-danger">*</span></label>
                        <select id="" class="form-select form-control">
                            <option value="">Select Martial Status</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>


                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Spouse Name </label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Spouse Name">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Language Known <span class="text-danger">*</span></label>
                        <select id="" class="form-select form-control">
                            <option value="">Select Language</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Skills<span class="text-danger">*</span></label>
                        <select id="" class="form-select form-control">
                            <option value="">Select Some Skills</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Passport Size Photo<span class="text-danger">*</span></label>
                            <img src="{{"assets/images/admin.png"}}" alt="passport" />
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">E-Signature<span class="text-danger">*</span></label>
                            <img src="{{"assets/images/SIGN.png"}}" alt="sign" width="170px" />
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="formFileSm" class="form-label">Candidate Resume <span
                                    class="text-danger">*</span></label>
                            <button class="btn btn-sm btn-primary mt-5"> View <i
                                    class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Communication Details</h5>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Permanent Address <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="exampleTextarea"
                            placeholder="Enter Complete Address With State and City"></textarea>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Correspondence Address <span
                                class="text-danger">*</span><input class="form-check-input" type="checkbox"
                                id="inlineFormCheck"></span>Same as
                            permanent</label>
                        <textarea class="form-control" id="exampleTextarea"
                            placeholder="Enter Complete Address With State and City"></textarea>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Nearest Police Station<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Police Station">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Police Verification Id</label>
                        <input type="text" class="form-control form-control-sm"
                            placeholder="Enter Police Verification ID" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Banking Account Details</h5>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                        <select class="form-select form-control">
                            <option value="">Select Bank Name</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Branch Name <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control form-control-sm" placeholder="Enter Branch Name">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-sm"
                            placeholder="Enter Bank Account Number">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter IFSC Code">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Aadhar Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Aadhar Number">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">PAN Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter PAN Number">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark text-white">Educational Qualification</h5>
            </div>

            <div class="card mb-20">
                <div class="card-header">
                    10th Qualification
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">10th Passing Year <span class="text-danger">*</span></label>
                            <input type="" class="form-control form-control-sm" placeholder="Enter 10th Passing Year">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Percentage">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Board Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Board Name">

                        </div>

                    </div>
                </div>
            </div>
            <div class="card mb-20">
                <div class="card-header">
                    12th Qualification
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">12th Passing Year <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Enter 12th Passing Year">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Percentage">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Board Name</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Board Name">

                        </div>

                    </div>
                </div>
            </div>
            <div class="card mb-20">
                <div class="card-header">
                    Graduation
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Passing Year/Persuing <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Passing Year / Pursuing">
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Percentage/Grade">
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Mode Of Graduation</label>
                            <select class="form-select form-control">
                                <option value="">Select Graduation</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>

                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Degree Name</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Degree Name">

                        </div>


                    </div>
                </div>
            </div>
            <div class="card mb-20">
                <div class="card-header">
                    Post Graduation
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Passing Year/Persuing <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Passing Year">
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Percentage/Grade</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Percentage">
                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Mode Of Post Graduation</label>
                            <select class="form-select form-control">
                                <option value="">Select Post Graduation</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>


                        </div>
                        <div class="col-xxl-3 col-lg-3 col-sm-6">
                            <label class="form-label">Degree In (Stream Name)</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Degree Stream">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Current Company Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Company Name">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Designation <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-sm" placeholder="Enter Designation">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Technologies You Have Worked In <span
                                    class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-sm"
                                placeholder="Enter Technologies You Have Worked In">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="formFile" class="form-label">Projects You Have Worked In <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Enter Differnt Project You Have Worked In">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Salary in CTC <span class="text-danger">*</span></label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Salary CTC">
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Take Home Salary <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Take Home Salary">



                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Start Date </label>
                            <input type="date" class="form-control form-control-sm"><br>
                            <p class="text-danger">Note : Last 3months Salary Slip Document</p>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">End Date </label>
                            <input type="date" class="form-control form-control-sm" placeholder="Enter Salary CTC"><br>
                            <p class="text-danger">Note : Last 3months Bank Statement Document</p>
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Releiving/Exp/Appraisal Letter </label>
                            <input type="text" class="form-control" placeholder="Enter Take Home Salary">



                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Relationship and Nominee Details </h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-12">
                            <div class="table-responsive mt-3 ">
                                <table
                                    class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    <thead>
                                        <tr>
                                            <th class="srno-column">S.No.</th>
                                            <th class="rid-column">Family Members</th>
                                            <th>Relationship with member</th>
                                            <th class="attributes-column">Aadhar Card No.</th>
                                            <th>DOB</th>
                                            <th>Aadhar Document</th>
                                            <th>Stay With Member</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border">
                                            <td colspan="2">Nominee</th>
                                            <td colspan="2"><input type="text" class="form-control"></td>
                                            <td colspan="1">Dispensary Near you</th>
                                            <td colspan="2"><input type="text" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Other Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Enter PF UAN No </label>
                            <input type="text" class="form-control" placeholder="Enter PF">

                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">ESI No</label>
                            <input type="text" class="form-control" placeholder="Enter ESI No">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">

                            <label class="form-label">Passport No </label>
                            <input type="text" class="form-control" placeholder="Enter Passport">

                        </div>
                    </div>
                    <p class="text-danger">Note : Click Verified button only if all required documents are valid.</p>
                    <p class="text-danger">Note : All Fields marks with ** are mandatory to submit the details.</p>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end mt-3">
            <button class="btn btn-sm btn-primary"> Click Verified <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>


    @endsection