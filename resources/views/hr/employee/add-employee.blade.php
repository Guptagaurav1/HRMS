@extends('layouts.master', ['title' => 'Add Employee'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="">
        <h2>Generate Employee</h2>
        <h5>Create Employee details</h5>
    </div>

    @if(!empty($recruitment_details->finally) && $recruitment_details->finally == 'joined')
        <div class="alert alert-success text-center">
            Employee has been successfully added.
            <a href="{{route('employee-details', ['empid' => $employee_id]) }}">View Employee</a>
        </div>
    @else
    <div class="dashboard-breadcrumb mb-25">

        <div class="d-flex gap-2 justify-items-center align-items-center">
            <input type="radio" class="tab-links active" id="single-entry" name="fav_language" value="HTML" checked data-tab="1">
            <label for="html">Single Entry</label><br>
            <input type="radio" class="tab-links" id="html1" name="fav_language" value="HTML" data-tab="2">
            <label for="html">Bulk Entry</label><br>
        </div>
    </div>

    <div class="panel">
        <div id="tab-1">

            <div class="employee-tab">
                <ul class="d-flex align-items-center justify-content-between  flex-wrap">
                    <li>
                        <button type="button" class="tab-btn active" id="tab1">Employee Details</button>
                    </li>
                    <li>
                        <button type="button" class="tab-btn" id="tab6">Personal Details</button>
                    </li>
                    <li>
                        <button type="button" class="tab-btn" id="tab2">Communication Details</button>
                    </li>
                    <li>
                        <button type="button" class="tab-btn" id="tab3">Acount Details</button>
                    </li>
                    <li>
                        <button type="button" class="tab-btn" id="tab4">Educational Details</button>
                    </li>
                    <li>
                        <button type="button" class="tab-btn" id="tab7">Experience</button>
                    </li>

                    <li>
                        <button type="button" class="tab-btn" id="tab5">Id Proofs</button>
                    </li>
                </ul>
            </div>

            {{-- Employee Details Form --}}
            <div class="tab-content active" id="content1">
                <form class="emp_details">
                    @csrf
                  <div class="d-none">
                    <input type="hidden" name="rec_id" value="{{$recruitment_id}}">
                    <input type="hidden" name="position_id" value="{{!empty($recruitment_details->pos_req_id) ? $recruitment_details->pos_req_id : ''}}">
                  </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_work_order"
                            placeholder="Enter Work Order Number" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Employee Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_code"
                            placeholder="Enter Employee Code" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Employee Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_name"
                            placeholder="Enter Employee Name" value="{{!empty($recruitment_details->firstname) ? $recruitment_details->firstname." ".$recruitment_details->lastname : ''}}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Reporting Email <span class="text-danger">*</span></label>
                        <select class="form-select" name="reporting_email" required>
                            <option value="" selected>Not Specify</option>
                            @foreach ($reporting_managers as $manager)
                                <option value="{{ $manager->email }}">{{ $manager->email }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Date Of Joining <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="emp_doj" value="{{!empty($recruitment_details->doj) ? $recruitment_details->doj : ''}}" required>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Posting Place </label>
                        <input type="text" class="form-control form-control-sm" name="emp_place_of_posting"
                            placeholder="Enter your Place">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Designation <span class="text-danger">*</span></label>
                        <select name="emp_designation" class="form-select" required>
                            <option value="">Select Designation</option>
                            @foreach ($designations as $designation)
                                <option value="{{ $designation->name }}">{{ $designation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Department <span class="text-danger">*</span></label>
                        <select name="department" class="form-select" required>
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact(Personal) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_phone_first"
                            placeholder="Enter Contact Number" value="{{!empty($recruitment_details->phone) ? $recruitment_details->phone : ''}}" minlength="10" maxlength="10"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email(Personal)<span class="text-danger">*</span></label>
                        <input type="email" class="form-control form-control-sm" name="emp_email_first"
                            placeholder="Enter Email" value="{{!empty($recruitment_details->email) ? $recruitment_details->email : ''}}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact (Office)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_phone_second"
                            placeholder="Enter Office Contact Number" minlength="10" maxlength="10"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email (Office)</label>
                        <input type="email" class="form-control form-control-sm" name="emp_email_second"
                            placeholder="Enter Office Email">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Functional Role</label>
                        <select name="emp_functional_role[]" class="form-select js-example-basic-multiple" multiple="multiple">
                            <option value="">Select Functional Role</option>
                            @foreach ($functional_roles as $role)
                            <option value="{{ $role->role }}">{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Current Working Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="emp_current_working_status" required>
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="resign">Resign</option>
                        </select>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="emp_remark" class="form-label">Remarks</label>
                        <textarea class="form-control" name="emp_remark" placeholder="Enter Remarks"></textarea>
                    </div>


                    <div class="col-12 d-flex justify-content-end">
                        <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                        <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn">Save & Next <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                </form>
            </div>

            {{-- Personal Details Form --}}
            <div class="tab-content" id="content6">
                <form class="personal_details">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="emp_code" value="">
                        <input type="hidden" name="rec_id" value="{{$recruitment_id}}">
                    </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Gender <span class="text-danger">*</span></label>
                        <select name="emp_gender" class="form-select" required>
                            <option value=""> Select Gender</option>
                            <option value="male" {{!empty($recruitment_details->gender) && $recruitment_details->gender == 'male' ? 'selected' : ''}}>Male</option>
                            <option value="female" {{!empty($recruitment_details->gender) && $recruitment_details->gender == 'female' ? 'selected' : ''}}>Female</option>
                            <option value="others" {{!empty($recruitment_details->gender) && $recruitment_details->gender == 'others' ? 'selected' : ''}}>Others</option>  
                        </select>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select" name="emp_category" required>
                            <option value="" selected="" disabled="">Not Specified</option>
                            <option value="general" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'general' ? 'selected' : ''}}>Un-Reserved</option>
                            <option value="obc" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'obc' ? 'selected' : ''}}>OBC</option>
                            <option value="sc" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'sc' ? 'selected' : ''}}>SC/ST</option>
                            <option value="st" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'st' ? 'selected' : ''}}>PH</option>
                          </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="inputDate" class="form-label">Date of Birth <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="emp_dob" value="{{!empty($recruitment_details->dob) ? $recruitment_details->dob : ''}}" max="{{date('y-m-d', time())}}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Guardian Name(Parents/Others)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_father_name"
                            placeholder="Enter Guardian Name" value="{{!empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_father_name : ''}}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Guardian(Parents/Others) Contact No.</label>
                        <input type="text" class="form-control form-control-sm" name="emp_father_mobile"
                            placeholder="Enter Guardian Contact Number" minlength="10" maxlength="10" value="{{!empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_father_mobile : ''}}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Blood Group</label>
                        <select name="emp_blood_group" class="form-select">
                            <option value="" selected="" disabled="">Not Specified</option>
                            <option value="a+" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'a+' ? 'selected' : '' }}>A+</option>
                            <option value="a-" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'a-' ? 'selected' : '' }}>A-</option>
                            <option value="b+" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'b+' ? 'selected' : '' }}>B+</option>
                            <option value="b-" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'b-' ? 'selected' : '' }}>B-</option>
                            <option value="o+" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'o+' ? 'selected' : '' }}>O+</option>
                            <option value="o-" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'o-' ? 'selected' : '' }}>O-</option>
                            <option value="ab+" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'ab+' ? 'selected' : '' }}>AB+</option>
                            <option value="ab-" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'ab-' ? 'selected' : '' }}>AB-</option>
                          </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Martial Status<span class="text-danger">*</span></label>
                        <select class="form-select" name="emp_marital_status" required>
                            <option value="">Select Martial Status</option>
                            <option value="single" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'single' ? 'selected' : ''}}>Single</option>
                            <option value="married" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'married' ? 'selected' : ''}}>Married</option>
                            <option value="widowed" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'widowed' ? 'selected' : ''}}>Widowed</option>
                            <option value="divorced" {{!empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'divorced' ? 'selected' : ''}}>Divorced / Seperated</option>
                        </select>
                    </div>  
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Date Of Marriage</label>
                        <input type="date" class="form-control" name="emp_dom" value="{{!empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_dom : ''}}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">No Of Children</label>
                        <input type="number" class="form-control form-control-sm" name="emp_children" placeholder="Enter No. Of Children">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Spouse Name</label>
                        <input type="text" class="form-control form-control-sm" name="emp_husband_wife_name" placeholder="Enter Spouse Name" value="{{!empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_husband_wife_name : ''}}">
                    </div>

                    <div class="col-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-secondary" id="previous-btn2">Previous <i
                                class="fa-solid fa-arrow-left"></i></button>
                        <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                        <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn">Save & Next <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                </form>
            </div>

            {{-- Address Details Form --}}
            <div class="tab-content" id="content2">
                <form class="address_details">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="emp_code" value="">
                        <input type="hidden" name="rec_id" value="{{$recruitment_id}}">
                    </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Permanent Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="permanent_address" name="emp_permanent_address" placeholder="Enter Permanent Address With State And City" required>{{!empty($recruitment_details->getAddressDetail) ? $recruitment_details->getAddressDetail->emp_permanent_address : ''}}
                        </textarea>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Correspondence Address <span class="text-danger">*</span> <span><input
                                    class="form-check-input" type="checkbox" id="same-as"></span>Same as
                            permanent</label>
                        <textarea class="form-control" id="local_address" name="emp_local_address" placeholder="Enter Correspondence Address With State And City" >{{!empty($recruitment_details->getAddressDetail) ? $recruitment_details->getAddressDetail->emp_local_address : ''}}
                        </textarea>
                    </div>
                 
                    <div class="col-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-secondary" id="previous-btn2">Previous <i
                                class="fa-solid fa-arrow-left"></i></button>
                        <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn2">Save & Next <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                </form>
            </div>

            {{-- Bank Details Form --}}
            <div class="tab-content" id="content3">
                <form class="bank_details">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="emp_code" value="">
                        <input type="hidden" name="rec_id" value="{{$recruitment_id}}">
                    </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                        <select name="bank_id" class="form-select" required>
                            <option value="">Select Bank</option>
                            @foreach($banks as $bank)
                            <option value="{{$bank->id}}" {{!empty($recruitment_details->getBankDetail) && $recruitment_details->getBankDetail->bank_id == $bank->id ? 'selected' : ''}}>{{$bank->name_of_bank}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Branch Name <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control form-control-sm" name="emp_branch"
                            placeholder="Enter Branch Name" value="{{!empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_branch : ''}}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-sm" name="emp_account_no"
                            placeholder="Enter Bank Account Number" value="{{!empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_account_no : ''}}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Vendor Rate (Rs)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_unit"
                            placeholder="Enter Vendor Rate">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Salary / CTC(Per Month)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_salary"
                            placeholder="Enter CTC">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_ifsc"
                            placeholder="Enter IFSC Code" value="{{!empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_ifsc : ''}}" required>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">PAN Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_pan"
                            placeholder="Enter PAN Number" value="{{!empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_pan : ''}}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">PF UAN No</label>
                        <input type="text" class="form-control form-control-sm" name="emp_pf_no" maxlength="12"
                            placeholder="Enter PF UAN Number" value="{{!empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_pf_no : ''}}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">ESI No</label>
                        <input type="text" class="form-control form-control-sm" name="emp_esi_no"
                            placeholder="Enter ESI Number" value="{{!empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_esi_no : ''}}">
                    </div>


                    <div class="col-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-secondary" id="previous-btn3">Previous <i
                                class="fa-solid fa-arrow-left"></i></button>
                        <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn3">Save & Next <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                </form>
            </div>

            {{-- Education Details Form --}}
            <div class="tab-content" id="content4">
                <form class="education_details">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="emp_code" value="">
                        <input type="hidden" name="rec_id" value="{{$recruitment_id}}">
                    </div>
                <div class="row g-3">
                    <div class="card mb-20">
                        <div class="row">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Highest Qualification <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm"
                                    name="emp_highest_qualification" placeholder="Enter Highest Qualification" required>
                            </div>
                        </div>
                        <div class="card-header">
                            10th Qualification
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">10th Passing Year</label>
                                    <input type="number" class="form-control form-control-sm" name="emp_tenth_year" min="0" max="{{date('Y')}}" placeholder="Enter 10th Passing Year" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_tenth_year : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Percentage/Grade</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="emp_tenth_percentage" placeholder="Enter Percentage" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_tenth_percentage : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Board Name</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="emp_tenth_board_name" placeholder="Enter Board Name" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_tenth_board_name : ''}}">
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
                                        <label class="form-label">12th Passing Year</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="emp_twelve_year" min="0" max="{{date('Y')}}" placeholder="Enter 12th Passing Year" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_twelve_year : ''}}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="emp_twelve_percentage" placeholder="Enter Percentage" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_twelve_percentage : ''}}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Board Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="emp_twelve_board_name" placeholder="Enter Board Name" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_twelve_board_name : ''}}">
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
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Passing Year/Persuing </label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="emp_graduation_year" max="{{date('Y')}}" min="0" placeholder="Enter Passing Year" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_graduation_year : ''}}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="emp_graduation_percentage" placeholder="Enter Percentage" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_graduation_percentage : ''}}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Mode Of Graduation</label>
                                        <select name="emp_graduation_mode" class="form-select">
                                            <option value="">Not Specified</option>
                                            <option value="regular" value="{{!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_graduation_mode == 'regular' ? 'selected' : ''}}">Regular</option>
                                            <option value="distance" value="{{!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_graduation_mode == 'distance' ? 'selected' : ''}}">Distance</option>
                                            <option value="correspondence" value="{{!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_graduation_mode == 'correspondence' ? 'selected' : ''}}">Correspondence</option>
                                        </select>

                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Name" name="emp_gradqualification" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_gradqualification : ''}}">

                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree In (Stream Name)</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Stream" name="emp_graduation_in">
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
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Passing Year/Persuing </label>
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="Enter Passing Year" max="{{date('Y')}}" min="0" name="emp_postgraduation_year" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_postgraduation_year : ''}}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Percentage" name="emp_postgraduation_percentage" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_postgraduation_percentage : ''}}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Mode Of Post Graduation</label>
                                        <select name="emp_postgraduation_mode" class="form-select">
                                            <option value="">Not Specified</option>
                                            <option value="regular" value="{{!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_postgraduation_mode == 'regular' ? 'selected' : ''}}">Regular</option>
                                            <option value="distance" value="{{!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_postgraduation_mode == 'distance' ? 'selected' : ''}}">Distance</option>
                                            <option value="correspondence" value="{{!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_postgraduation_mode == 'correspondence' ? 'selected' : ''}}">Correspondence</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Name" name="emp_postgradqualification" value="{{!empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_postgradqualification : ''}}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree In (Stream Name)</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Stream" name="emp_postgraduation_in">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-secondary" id="previous-btn4">Previous <i
                                class="fa-solid fa-arrow-left"></i></button>
                        <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn4">Save & Next <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                </form>
            </div>

            {{-- Experience Detail Form --}}
            <div class="tab-content" id="content7">
                <form class="experience_details">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="emp_code" value="">
                        <input type="hidden" name="rec_id" value="{{$recruitment_id}}">
                    </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Select Some Skills<span class="text-danger">*</span></label>
                        <select name="emp_skills[]" class="form-select js-example-basic-multiple" multiple required>
                            <option value="">Select Some Skills</option>
                            @foreach($skills as $skill)
                            <option value="{{$skill->skill}}">{{$skill->skill}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Total Experience</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Experience">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="resume_file" class="form-label">Upload Resume <span>(Max Size : 1mb)</span></label>
                        <input class="form-control form-control-sm"  name="resume_file" type="file" accept=".pdf">
                    </div>

                    <div class="col-12 d-flex justify-content-between">
                        <button type="button" class="btn btn-sm btn-secondary" id="previous-btn3">Previous <i
                                class="fa-solid fa-arrow-left"></i></button>
                        <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn3">Save & Next <i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
                </form>
            </div>

            {{-- Id Proof Detail Form --}}
            <div class="tab-content" id="content5">
                <form class="id_proofs">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="emp_code" value="">
                        <input type="hidden" name="rec_id" value="{{$recruitment_id}}">
                    </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Police Verification Id</label>
                        <input type="text" class="form-control form-control-sm" name="police_verification_id"
                            placeholder="Enter Police Verification ID" value="{{!empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->police_verification_id : ''}}">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Police Verification Attachment</label>
                        <input class="form-control" type="file" name="police_verification_file" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Aadhar Number <span class="text-danger">*</span></label>
                        <input type="text" maxlength="12" class="form-control form-control-sm" name="emp_aadhaar_no" placeholder="Enter Aadhar Number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="{{!empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->emp_aadhaar_no : ''}}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Passport No</label>
                        <input type="text" class="form-control form-control-sm" name="emp_passport_no"
                            placeholder="Enter Passport Number" value="{{!empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->emp_passport_no : ''}}">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Upload Passport Document</label>
                        <input class="form-control" type="file" name="passport_file" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Correspondence Address Proof Attachment</label>
                        <input class="form-control" type="file" name="correspondence_add_doc" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Nearest Police Station</label>
                        <input type="text" class="form-control form-control-sm" name="nearest_police_station"
                            placeholder="Enter Neareset Police Station" value="{{!empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->nearest_police_station : ''}}">
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <button type="button" class="btn btn-sm btn-secondary" id="previous-btn4">Previous <i
                                    class="fa-solid fa-arrow-left"></i></button>
                            <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn4">Save <i
                                    class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>

        <div class="row" id="tab-2" style="display: none">
            <form class="form bulk-upload" method="POST" action="{{route('employee.bulk_upload')}}" enctype="multipart/form-data">
                @csrf
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-dark text-white">Bulk Upload Employee</h5>
                        <div class="btn-box">
                            <a href="{{ asset('sample/employee_bulk_upload.csv') }}" class="btn btn-sm btn-primary"><i
                                    class="fa-solid fa-download" download></i> Download CSV Format</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-8 col-sm-6">
                                <label for="formFileSm" class="form-label">Select CSV File <span class="fw-lighter text-sm">(Only CSV file are allowed and max size : 1mb)</span> <span class="text-danger">
                                        *</span></label>
                                <input name="csv" class="form-control form-control-sm" type="file" accept=".csv" required>
                                @error('csv')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary"> <i class="fa-solid fa-upload"></i> Upload CSV</button>
            </div>
        </form>
        </div>

    </div>
    @endif
@endsection

@section('script')
    <script src="{{ asset('assets/js/add-employee-tab-btn.js') }}"></script>
@endsection
