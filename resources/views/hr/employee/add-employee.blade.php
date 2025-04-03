@extends('layouts.master', ['title' => 'Add Employee'])
@section('contents')
    <div class="dashboard-breadcrumb mb-25 gap-4">
        <h2 class="sw-bold text-dark">Create Employee details</h2>
        <div class="text-start">
            <a href="{{ route('hr_dashboard') }}">
                <div class="back-button-box">
                    <button type="button" class="btn btn-back">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                </div>
            </a>
        </div>

    </div>

    @if (!empty($recruitment_details->finally) && $recruitment_details->finally == 'joined')
        <div class="alert alert-success text-center">
            Employee has been successfully added.
            <a href="{{ route('employee-details', ['empid' => $employee_id]) }}">View Employee</a>
        </div>
    @else
        <div class="dashboard-breadcrumb mb-25">

            <div class="d-flex gap-2 justify-items-center align-items-center">
                <input type="radio" class="tab-links active" id="single-entry" name="fav_language" value="HTML" checked
                    data-tab="1">
                <label for="html">Single Entry</label><br>
                <input type="radio" class="tab-links" id="html1" name="fav_language" value="HTML" data-tab="2">
                <label for="html">Bulk Entry</label><br>
            </div>
        </div>

        <div class="panel px-2">
            <div id="tab-1">

                <div class="employee-tab mt-3">
                    <ul class="d-flex align-items-center justify-content-between  flex-wrap">
                        <li>
                            <button type="button" class="tab-btn active" id="tab1">Employee Details</button>
                        </li>
                        <li>
                            <button type="button" class="tab-btn" id="tab6">Personal Details</button>
                        </li>
                        <li>
                            <button type="button" class="tab-btn" id="tab2">Inquiry Details</button>
                        </li>
                        <li>
                            <button type="button" class="tab-btn" id="tab3">Account Details</button>
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
                <div class="tab-content active mt-4" id="content1">
                    <form class="emp_details">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="rec_id" value="{{ $recruitment_id }}">
                            <input type="hidden" name="position_id"
                                value="{{ !empty($recruitment_details->pos_req_id) ? $recruitment_details->pos_req_id : '' }}">
                        </div>
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                                <select class="form-select  js-example-basic-multiple" name="emp_work_order" required>
                                    <option value="">Select Work Order</option>
                                    @foreach ($workorders as $workorder)
                                        <option value="{{ $workorder->wo_number }}">{{ $workorder->wo_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Employee Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="emp_code"
                                    placeholder="Enter Employee Code" required>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Employee Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm for_char" name="emp_name"
                                    placeholder="Enter Employee Name"
                                    value="{{ !empty($recruitment_details->firstname) ? $recruitment_details->firstname . ' ' . $recruitment_details->lastname : '' }}"
                                    required>
                                    <span class="emp_name"></span>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Department <span class="text-danger">*</span> <i
                                        class="fa fa-plus border rounded p-1 small border-primary text-light bg-primary"
                                        role="button" data-bs-toggle="modal" data-bs-target="#departmentModal"
                                        aria-hidden="true"></i></label>
                                <select name="department" class="form-select" required>
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->department }}">{{ $department->department }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Reporting Email <span class="text-danger">*</span></label>
                                <select class="form-select mt-3" name="reporting_email" required>
                                    <option value="" selected>Not Specify</option>
                                    {{-- @foreach ($reporting_managers as $manager)
                                        <option value="{{ $manager->email }}">{{ $manager->email }}</option>
                                    @endforeach --}}
                                </select>

                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Date Of Joining <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="emp_doj"
                                    value="{{ !empty($recruitment_details->doj) ? $recruitment_details->doj : '' }}"
                                    required>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Posting Place </label>
                                <input type="text" class="form-control form-control-sm" name="emp_place_of_posting"
                                    placeholder="Enter your Place">
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Designation <span class="text-danger">*</span> <i
                                        class="fa fa-plus border rounded  small border-primary text-light bg-primary"
                                        role="button" data-bs-toggle="modal" data-bs-target="#designationModal"
                                        aria-hidden="true"></i></label>
                                <select name="emp_designation" class="form-select" required>
                                    <option value="">Select Designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->name }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Contact(Personal) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="emp_phone_first"
                                    placeholder="Enter Contact Number"
                                    value="{{ !empty($recruitment_details->phone) ? $recruitment_details->phone : '' }}"
                                    minlength="10" maxlength="10"
                                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                    required>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Email(Personal)<span class="text-danger">*</span></label>
                                <input type="email" class="form-control form-control-sm for_char" name="emp_email_first"
                                    placeholder="Enter Email"
                                    value="{{ !empty($recruitment_details->email) ? $recruitment_details->email : '' }}"
                                    required>
                                    <span class="emp_email_first"></span>
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
                                <select name="emp_functional_role[]" class="form-select js-example-basic-multiple"
                                    multiple="multiple">
                                    <option value="">Select Functional Role</option>
                                    @foreach ($functional_roles as $role)
                                        <option value="{{ $role->role }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Current Working Status <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" name="emp_current_working_status" required>
                                    <option value="active" selected>Active</option>
                                </select>
                            </div>

                            <div class="col-lg-12 col-sm-6">
                                <label for="emp_remark" class="form-label">Remarks</label>
                                <textarea class="form-control" name="emp_remark" placeholder="Enter Remarks"></textarea>
                            </div>


                            <div class="col-12 d-flex justify-content-end py-3">
                                <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                                <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn">Save &
                                    Next <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Personal Details Form --}}
                <div class="tab-content mt-4" id="content6">
                    <form class="personal_details">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="emp_code" value="">
                            <input type="hidden" name="rec_id" value="{{ $recruitment_id }}">
                        </div>
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Gender <span
                                        class="text-danger">*</span></label>
                                <select name="emp_gender" class="form-select" required>
                                    <option value=""> Select Gender</option>
                                    <option value="male"
                                        {{ !empty($recruitment_details->gender) && $recruitment_details->gender == 'male' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="female"
                                        {{ !empty($recruitment_details->gender) && $recruitment_details->gender == 'female' ? 'selected' : '' }}>
                                        Female</option>
                                    <option value="others"
                                        {{ !empty($recruitment_details->gender) && $recruitment_details->gender == 'others' ? 'selected' : '' }}>
                                        Others</option>
                                </select>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Category <span class="text-danger">*</span></label>
                                <select class="form-select" name="emp_category" required>
                                    <option value="" selected="" disabled="">Not Specified</option>
                                    <option value="general"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'general' ? 'selected' : '' }}>
                                        Un-Reserved</option>
                                    <option value="obc"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'obc' ? 'selected' : '' }}>
                                        OBC</option>
                                    <option value="sc"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'sc' ? 'selected' : '' }}>
                                        SC/ST</option>
                                    <option value="st"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_category == 'st' ? 'selected' : '' }}>
                                        PH</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label for="inputDate" class="form-label">Date of Birth <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="emp_dob"
                                    value="{{ !empty($recruitment_details->dob) ? $recruitment_details->dob : '' }}"
                                    max="{{ date('y-m-d', time()) }}" required>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Guardian Name(Parents/Others)</label>
                                <input type="text" class="form-control form-control-sm" name="emp_father_name"
                                    placeholder="Enter Guardian Name"
                                    value="{{ !empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_father_name : '' }}">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Guardian(Parents/Others) Contact No.</label>
                                <input type="text" class="form-control form-control-sm" name="emp_father_mobile"
                                    placeholder="Enter Guardian Contact Number" minlength="10" maxlength="10"
                                    value="{{ !empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_father_mobile : '' }}">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Blood Group</label>
                                <select name="emp_blood_group" class="form-select">
                                    <option value="" selected="" disabled="">Not Specified</option>
                                    <option value="a+"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'a+' ? 'selected' : '' }}>
                                        A+</option>
                                    <option value="a-"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'a-' ? 'selected' : '' }}>
                                        A-</option>
                                    <option value="b+"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'b+' ? 'selected' : '' }}>
                                        B+</option>
                                    <option value="b-"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'b-' ? 'selected' : '' }}>
                                        B-</option>
                                    <option value="o+"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'o+' ? 'selected' : '' }}>
                                        O+</option>
                                    <option value="o-"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'o-' ? 'selected' : '' }}>
                                        O-</option>
                                    <option value="ab+"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'ab+' ? 'selected' : '' }}>
                                        AB+</option>
                                    <option value="ab-"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_blood_group == 'ab-' ? 'selected' : '' }}>
                                        AB-</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Martial Status<span class="text-danger">*</span></label>
                                <select class="form-select" name="emp_marital_status" required>
                                    <option value="">Select Martial Status</option>
                                    <option value="single"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'single' ? 'selected' : '' }}>
                                        Single</option>
                                    <option value="married"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'married' ? 'selected' : '' }}>
                                        Married</option>
                                    <option value="widowed"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'widowed' ? 'selected' : '' }}>
                                        Widowed</option>
                                    <option value="divorced"
                                        {{ !empty($recruitment_details->getPersonalDetail) && $recruitment_details->getPersonalDetail->emp_marital_status == 'divorced' ? 'selected' : '' }}>
                                        Divorced / Seperated</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Date Of Marriage</label>
                                <input type="date" class="form-control" name="emp_dom"
                                    value="{{ !empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_dom : '' }}">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">No Of Children</label>
                                <input type="number" class="form-control form-control-sm" name="emp_children"
                                    placeholder="Enter No. Of Children">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Spouse Name</label>
                                <input type="text" class="form-control form-control-sm" name="emp_husband_wife_name"
                                    placeholder="Enter Spouse Name"
                                    value="{{ !empty($recruitment_details->getPersonalDetail) ? $recruitment_details->getPersonalDetail->emp_husband_wife_name : '' }}">
                            </div>

                            <div class="col-12 d-flex justify-content-between py-3">
                                <button type="button" class="btn btn-sm btn-secondary" id="previous-btn2">Previous <i
                                        class="fa-solid fa-arrow-left"></i></button>
                                <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                                <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn">Save &
                                    Next <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Address Details Form --}}
                <div class="tab-content mt-4" id="content2">
                    <form class="address_details">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="emp_code" value="">
                            <input type="hidden" name="rec_id" value="{{ $recruitment_id }}">
                        </div>
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="exampleTextarea" class="form-label">State <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="state" name="state" required>
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}"
                                            {{ !empty($recruitment_details->getAddressDetail) && $recruitment_details->getAddressDetail->state == $state->id ?'selected' : '' }}>
                                            {{$state->state}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="exampleTextarea" class="form-label">City<span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="cities" name="emp_city" required>
                                    <option value="">Select City</option>
                                    @if ($cities)
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ !empty($recruitment_details->getAddressDetail) && $recruitment_details->getAddressDetail->emp_city == $city->id ? 'selected' : '' }}>
                                        {{ $city->city_name }}</option>
                                @endforeach
                            @endif
                                </select>
                            </div>
                           
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="exampleTextarea" class="form-label">Permanent Address <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="permanent_address" name="emp_permanent_address"
                                    placeholder="Enter Permanent Address" required>{{ !empty($recruitment_details->getAddressDetail) ? $recruitment_details->getAddressDetail->emp_permanent_address : '' }}</textarea>
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="exampleTextarea" class="form-label">Correspondence Address <span
                                        class="text-danger">*</span> <span><input class="form-check-input"
                                            type="checkbox" id="same-as"></span>Same as
                                    permanent</label>
                                <textarea class="form-control" id="local_address" name="emp_local_address"
                                    placeholder="Enter Correspondence Address">{{ !empty($recruitment_details->getAddressDetail) ? $recruitment_details->getAddressDetail->emp_local_address : '' }}</textarea>
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="exampleTextarea" class="form-label">ZIP Code<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="pincode" placeholder="Enter ZIP code" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="{{ !empty($recruitment_details->getAddressDetail) ? $recruitment_details->getAddressDetail->pincode : '' }}" required>
                                
                            </div>

                            <div class="col-12 d-flex justify-content-between py-3">
                                <button type="button" class="btn btn-sm btn-secondary" id="previous-btn2">Previous <i
                                        class="fa-solid fa-arrow-left"></i></button>
                                <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn2">Save &
                                    Next <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Bank Details Form --}}
                <div class="tab-content mt-4" id="content3">
                    <form class="bank_details">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="emp_code" value="">
                            <input type="hidden" name="rec_id" value="{{ $recruitment_id }}">
                        </div>
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                                <select name="bank_id" class="form-select" required>
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}"
                                            {{ !empty($recruitment_details->getBankDetail) && $recruitment_details->getBankDetail->bank_id == $bank->id ? 'selected' : '' }}>
                                            {{ $bank->name_of_bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Bank Branch Name <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control form-control-sm" name="emp_branch"
                                    placeholder="Enter Branch Name"
                                    value="{{ !empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_branch : '' }}"
                                    required>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm for_char" name="emp_account_no"
                                    placeholder="Enter Bank Account Number"
                                    value="{{ !empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_account_no : '' }}"
                                    minlength="9" maxlength="18"  required>
                                    <span class="emp_account_no"></span>
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
                                <input type="text" class="form-control form-control-sm for_char" name="emp_ifsc"
                                    placeholder="Enter IFSC Code" maxlength="11"
                                    value="{{ !empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_ifsc : '' }}"
                                    required>
                                    <span class="emp_ifsc"></span>
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">PAN Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm for_char" name="emp_pan"
                                    placeholder="Enter PAN Number" maxlength="10" 
                                    value="{{ !empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_pan : '' }}"
                                    required>
                                    <span class="emp_pan"></span>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">PF UAN No</label>
                                <input type="text" class="form-control form-control-sm" name="emp_pf_no"
                                    maxlength="12" placeholder="Enter PF UAN Number"
                                    value="{{ !empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_pf_no : '' }}">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">ESI No</label>
                                <input type="text" class="form-control form-control-sm for_char" name="emp_esi_no"
                                    placeholder="Enter ESI Number" maxlength="17"
                                    value="{{ !empty($recruitment_details->getBankDetail) ? $recruitment_details->getBankDetail->emp_esi_no : '' }}">
                                    <span class="emp_esi_no"></span>
                            </div>


                            <div class="col-12 d-flex justify-content-between py-3">
                                <button type="button" class="btn btn-sm btn-secondary" id="previous-btn3">Previous <i
                                        class="fa-solid fa-arrow-left"></i></button>
                                <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn3">Save &
                                    Next <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Education Details Form --}}
                <div class="tab-content mt-4" id="content4">
                    <form class="education_details">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="emp_code" value="">
                            <input type="hidden" name="rec_id" value="{{ $recruitment_id }}">
                        </div>
                        <div class="row g-3">
                            <div class="card mb-20">
                                <div class="row">
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Highest Qualification <span
                                                class="text-danger">*</span></label>
                                        {{-- <input type="text" class="form-control form-control-sm"
                                    name="emp_highest_qualification" placeholder="Enter Highest Qualification" required> --}}
                                        <select name="emp_highest_qualification" class="form-control form-control-sm"
                                            required>
                                            <option value="">Select</option>
                                            <option value="10th">10th</option>
                                            <option value="12th">12th</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Bachelor">Bachelor</option>
                                            <option value="Master">Master</option>
                                            <option value="PhD">PhD</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- 10th details --}}
                                <div class="card-header">
                                    10th Qualification
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <label class="form-label">10th Passing Year</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="emp_tenth_year" min="0" max="{{ date('Y') }}"
                                                placeholder="Enter 10th Passing Year"
                                                value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_tenth_year : '' }}">
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <label class="form-label">Percentage/Grade</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="emp_tenth_percentage" placeholder="Enter Percentage"
                                                value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_tenth_percentage : '' }}">
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <label class="form-label">Board Name</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="emp_tenth_board_name" placeholder="Enter Board Name"
                                                value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_tenth_board_name : '' }}">
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <label class="form-label">Upload Doc <span class="small">(Only Pdf)</span>
                                                <span class="fw-lighter small">(Max size :1mb)</span>
                                            @if (!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_tenth_doc)
                                                <a href="{{ asset('recruitment/candidate_documents/10th') . '/' . $recruitment_details->getEducationDetail->emp_tenth_doc }}"
                                                    target="_blank">View</a>
                                            @endif
                                            </label>
                                            <input type="file" accept=".pdf" class="form-control form-control-sm"
                                                name="emp_tenth_doc">
                                        </div>

                                    </div>
                                </div>

                                {{-- 12th Details --}}
                                <div class="card mb-20">
                                    <div class="card-header">
                                        12th Qualification
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">12th Passing Year</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="emp_twelve_year" min="0" max="{{ date('Y') }}"
                                                    placeholder="Enter 12th Passing Year"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_twelve_year : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Percentage/Grade</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="emp_twelve_percentage" placeholder="Enter Percentage"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_twelve_percentage : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Board Name</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="emp_twelve_board_name" placeholder="Enter Board Name"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_twelve_board_name : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Upload Doc <span class="small">(Only
                                                        Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>  
                                                        @if (!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_twelve_doc)
                                                        <a href="{{ asset('recruitment/candidate_documents/12th') . '/' . $recruitment_details->getEducationDetail->emp_twelve_doc }}"
                                                            target="_blank">View</a>
                                                    @endif
                                                </label>
                                                <input type="file" accept=".pdf" class="form-control form-control-sm"
                                                    name="emp_twelve_doc">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Diploma Details --}}
                                <div class="card mb-20">
                                    <div class="card-header">
                                        Diploma
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Passing Year</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="emp_diploma_year" min="0" max="{{ date('Y') }}"
                                                    placeholder="Enter Diploma Passing Year">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Percentage/Grade</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="emp_diploma_percentage" placeholder="Enter Percentage">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Mode Of Diploma</label>
                                                <select name="emp_diploma_mode" class="form-select">
                                                    <option value="">Not Specified</option>
                                                    <option value="regular">Regular</option>
                                                    <option value="distance">Distance</option>
                                                    <option value="correspondence">Correspondence</option>
                                                </select>

                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Diploma Name</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Diploma Name" name="emp_diploma">

                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Diploma In (Stream Name)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Diploma Stream" name="emp_diploma_in">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Upload Doc <span class="small">(Only
                                                        Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span></label>
                                                    
                                                    
                                                <input type="file" accept=".pdf" class="form-control form-control-sm"
                                                    name="diploma_doc">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Graduation Details --}}
                                <div class="card mb-20">
                                    <div class="card-header">
                                        Graduation
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Passing Year/Persuing </label>
                                                <input type="number" class="form-control form-control-sm"
                                                    name="emp_graduation_year" max="{{ date('Y') }}" min="0"
                                                    placeholder="Enter Passing Year"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_graduation_year : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Percentage/Grade</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="emp_graduation_percentage" placeholder="Enter Percentage"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_graduation_percentage : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Mode Of Graduation</label>
                                                <select name="emp_graduation_mode" class="form-select">
                                                    <option value="">Not Specified</option>
                                                    <option value="regular"
                                                        value="{{ !empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_graduation_mode == 'regular' ? 'selected' : '' }}">
                                                        Regular</option>
                                                    <option value="distance"
                                                        value="{{ !empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_graduation_mode == 'distance' ? 'selected' : '' }}">
                                                        Distance</option>
                                                    <option value="correspondence"
                                                        value="{{ !empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_graduation_mode == 'correspondence' ? 'selected' : '' }}">
                                                        Correspondence</option>
                                                </select>

                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Degree Name</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Degree Name" name="emp_gradqualification"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_gradqualification : '' }}">

                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Degree In (Stream Name)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Degree Stream" name="emp_graduation_in">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Upload Doc <span class="small">(Only
                                                        Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>
                                                        @if (!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->grad_doc)
                                                <a href="{{ asset('recruitment/candidate_documents/graduation') . '/' . $recruitment_details->getEducationDetail->grad_doc }}"
                                                    target="_blank">View</a>
                                            @endif
                                                    </label>
                                                <input type="file" accept=".pdf" class="form-control form-control-sm"
                                                    name="grad_doc">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Post Graduation Details --}}
                                <div class="card mb-20">
                                    <div class="card-header">
                                        Post Graduation
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Passing Year/Persuing </label>
                                                <input type="number" class="form-control form-control-sm"
                                                    placeholder="Enter Passing Year" max="{{ date('Y') }}"
                                                    min="0" name="emp_postgraduation_year"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_postgraduation_year : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Percentage/Grade</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Percentage" name="emp_postgraduation_percentage"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_postgraduation_percentage : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Mode Of Post Graduation</label>
                                                <select name="emp_postgraduation_mode" class="form-select">
                                                    <option value="">Not Specified</option>
                                                    <option value="regular"
                                                        value="{{ !empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_postgraduation_mode == 'regular' ? 'selected' : '' }}">
                                                        Regular</option>
                                                    <option value="distance"
                                                        value="{{ !empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_postgraduation_mode == 'distance' ? 'selected' : '' }}">
                                                        Distance</option>
                                                    <option value="correspondence"
                                                        value="{{ !empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->emp_postgraduation_mode == 'correspondence' ? 'selected' : '' }}">
                                                        Correspondence</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Degree Name</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Degree Name" name="emp_postgradqualification"
                                                    value="{{ !empty($recruitment_details->getEducationDetail) ? $recruitment_details->getEducationDetail->emp_postgradqualification : '' }}">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Degree In (Stream Name)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Degree Stream" name="emp_postgraduation_in">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Upload Doc <span class="small">(Only
                                                        Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>
                                                    @if (!empty($recruitment_details->getEducationDetail) && $recruitment_details->getEducationDetail->post_grad_doc)
                                                        <a href="{{ asset('recruitment/candidate_documents/post_graduation') . '/' . $employee_details->education->post_grad_doc }}"
                                                            target="_blank">View</a>
                                                    @endif
                                                    </label>
                                                <input type="file" accept=".pdf" class="form-control form-control-sm"
                                                    name="post_grad_doc">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Doctorate Details --}}
                                <div class="card mb-20">
                                    <div class="card-header">
                                        Doctorate
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Passing Year/Persuing </label>
                                                <input type="number" class="form-control form-control-sm"
                                                    placeholder="Enter Passing Year" max="{{ date('Y') }}"
                                                    min="0" name="emp_doctorate_year">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Percentage/Grade</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Percentage" name="emp_doctorate_percentage">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Mode Of Doctorate</label>
                                                <select name="emp_doctorate_mode" class="form-select">
                                                    <option value="">Not Specified</option>
                                                    <option value="regular">Regular</option>
                                                    <option value="distance">Distance</option>
                                                    <option value="correspondence">Correspondence</option>
                                                </select>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Degree Name</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Degree Name" name="emp_doctorate">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Degree In (Stream Name)</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Enter Degree Stream" name="emp_doctorate_in">
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <label class="form-label">Upload Doc <span class="small">(Only
                                                        Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span> </label>
                                                <input type="file" accept=".pdf" class="form-control form-control-sm"
                                                    name="doctorate_doc">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="col-12 d-flex justify-content-between py-3">
                                <button type="button" class="btn btn-sm btn-secondary" id="previous-btn4">Previous <i
                                        class="fa-solid fa-arrow-left"></i></button>
                                <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn4">Save &
                                    Next <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Experience Detail Form --}}
                <div class="tab-content mt-4" id="content7">
                    <form class="experience_details">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="emp_code" value="">
                            <input type="hidden" name="rec_id" value="{{ $recruitment_id }}">
                        </div>
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Select Some Skills<span class="text-danger">*</span></label>
                                <select name="emp_skills[]" class="form-select js-example-basic-multiple" multiple
                                    required>
                                    <option value="">Select Some Skills</option>
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->skill }}">{{ $skill->skill }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Total Experience</label>
                                <input type="text" class="form-control form-control-sm" name="emp_experience"
                                    placeholder="Enter Experience">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label for="resume_file" class="form-label">Upload Resume <span class="fw-lighter small">(Max size :1mb)</span>
                                </label>
                                <input class="form-control form-control-sm" name="resume_file" type="file"
                                    accept=".pdf">
                            </div>

                            <div class="col-12 d-flex justify-content-between py-3">
                                <button type="button" class="btn btn-sm btn-secondary" id="previous-btn3">Previous <i
                                        class="fa-solid fa-arrow-left"></i></button>
                                <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn3">Save &
                                    Next <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Id Proof Detail Form --}}
                <div class="tab-content mt-4" id="content5">
                    <form class="id_proofs">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="emp_code" value="">
                            <input type="hidden" name="rec_id" value="{{ $recruitment_id }}">
                        </div>
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Police Verification Id</label>
                                <input type="text" class="form-control form-control-sm" name="police_verification_id"
                                    placeholder="Enter Police Verification ID"
                                    value="{{ !empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->police_verification_id : '' }}">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="formFile" class="form-label">Police Verification Attachment <span class="fw-lighter small">(Max size :1mb)</span>
                                    @if (!empty($recruitment_details->getIdProofDetail) && $recruitment_details->getIdProofDetail->police_verification_file)
                                    <a href="{{ asset('recruitment/candidate_documents/police_verification') . '/' . $recruitment_details->getIdProofDetail->police_verification_file }}"
                                        target="_blank">View</a>
                                @endif
                                </label>
                                <input class="form-control" type="file" name="police_verification_file"
                                    accept=".pdf">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Aadhar Number <span class="text-danger">*</span></label>
                                <input type="text" maxlength="12" class="form-control form-control-sm"
                                    name="emp_aadhaar_no" placeholder="Enter Aadhar Number"
                                    onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                                    value="{{ !empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->emp_aadhaar_no : '' }}"
                                    required>
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Passport No</label>
                                <input type="text" class="form-control form-control-sm" name="emp_passport_no"
                                    placeholder="Enter Passport Number"
                                    value="{{ !empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->emp_passport_no : '' }}">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="formFile" class="form-label">Passport Document <span class="fw-lighter small">(Max size :1mb)</span>
                                    @if (!empty($recruitment_details->getIdProofDetail) && $recruitment_details->getIdProofDetail->passport_file)
                                    <a href="{{ asset('recruitment/candidate_documents/passport') . '/' . $recruitment_details->getIdProofDetail->passport_file }}"
                                        target="_blank">View</a>
                                @endif
                                </label>
                                <input class="form-control" type="file" name="passport_file" accept=".pdf">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="formFile" class="form-label">Permanent Address Proof Attachment <span class="fw-lighter small">(Max size :1mb)</span>
                                    @if (!empty($recruitment_details->getIdProofDetail) && $recruitment_details->getIdProofDetail->permanent_add_doc)
                                    <a href="{{ asset('recruitment/candidate_documents/permanent_address_proof') . '/' . $recruitment_details->getIdProofDetail->permanent_add_doc }}"
                                        target="_blank">View</a>
                                @endif
                                </label>
                                <input class="form-control" type="file" name="permanent_add_doc" accept=".pdf">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Nearest Police Station</label>
                                <input type="text" class="form-control form-control-sm" name="nearest_police_station"
                                    placeholder="Enter Neareset Police Station"
                                    value="{{ !empty($recruitment_details->getIdProofDetail) ? $recruitment_details->getIdProofDetail->nearest_police_station : '' }}">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Bank Document <span class="fw-lighter small">(Max size :1mb)</span>
                                    @if (!empty($recruitment_details->getIdProofDetail) && $recruitment_details->getIdProofDetail->bank_doc)
                                    <a href="{{ asset('recruitment/candidate_documents/bank_account') . '/' . $recruitment_details->getIdProofDetail->bank_doc }}"
                                        target="_blank">View</a>
                                @endif
                                </label>
                                <input type="file" class="form-control form-control-sm" name="bank_doc" accept=".pdf">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Category Document <span class="fw-lighter small">(Max size :1mb)</span>
                                    @if (!empty($recruitment_details->getIdProofDetail) && $recruitment_details->getIdProofDetail->category_doc)
                                    <a href="{{ asset('recruitment/candidate_documents/category') . '/' . $recruitment_details->getIdProofDetail->category_doc }}"
                                        target="_blank">View</a>
                                @endif
                                </label>
                                <input type="file" class="form-control form-control-sm" name="category_doc" accept=".pdf">
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between py-3">
                                    <button type="button" class="btn btn-sm btn-secondary" id="previous-btn4">Previous
                                        <i class="fa-solid fa-arrow-left"></i></button>
                                    <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn4">Save
                                        <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="row" id="tab-2" style="display: none">
                <form class="form bulk-upload" method="POST" action="{{ route('employee.bulk_upload') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="panel">
                            <div class="panel-header">
                                <h5 class="text-dark text-white">Bulk Upload Employee</h5>
                                <div class="btn-box">
                                    <a href="{{ asset('sample/employee_bulk_upload.csv') }}"
                                        class="btn btn-sm btn-primary"><i class="fa-solid fa-download" download></i>
                                        Download CSV Format</a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row g-3">
                                    <div class="col-xxl-3 col-lg-8 col-sm-6">
                                        <label for="formFileSm" class="form-label">Select CSV File <span
                                                class="fw-lighter text-sm">(Only CSV file are allowed and max size :
                                                1mb)</span> <span class="text-danger">
                                                *</span></label>
                                        <input name="csv" class="form-control form-control-sm" type="file"
                                            accept=".csv" required>
                                        @error('csv')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end py-3">
                        <button type="button" class="btn btn-sm btn-primary show_preview">Preview</button>
                        <button type="submit" class="btn btn-sm btn-primary d-none csv-submit mx-2"> <i class="fa-solid fa-upload"></i> Final Submit</button>
                        <button type="reset" class="btn btn-sm btn-primary mx-2 reset">Reset</button>
                    </div>

                    {{-- Show Preview  --}}
                    <div class="table-responsive d-none preview-table my-3">
                        <table class="table table-bordered table-hover table-striped digi-dataTable">
                            <thead>
                                <tr>
                                    <th>Work Order</th>
                                    <th>Employee Code</th>
                                    <th>Employee Name</th>
                                    <th>Gender</th>
                                    <th>Category</th>
                                    <th>DOB</th>
                                    <th>DOJ</th>
                                    <th>Phone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Reporting Mail</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="preview-table">
                                <!-- Preview Data Will Be Here -->
                                
                            </tbody>
                        </table>
                    </div>

                </form>
            </div>

        </div>
    @endif
@endsection

@section('modal')
    {{-- Add Department Modal  --}}
    <div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="departmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="departmentModalLabel">Add Department</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" class="add-department">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Department<span class="text-danger">*</span></label>
                                <input type="text" name="department" placeholder="Enter department name"
                                    class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Skills<span class="text-danger">*</span></label>
                                <select name="skill[]" class="form-select modal-select" multiple required>
                                    <option value="">Select Skill</option>
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ ucwords($skill->skill) }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Reporting Manager<span class="text-danger">*</span></label>
                                <select name="reporting_manager_id" class="form-select" required>
                                    <option value="">Select Reporting Manager</option>
                                    @foreach ($reporting_managers as $manager)
                                        <option value="{{ $manager->id }}">
                                            {{ old('reporting_manager_id') == $manager->id ? 'selected' : '' }}>
                                            {{ $manager->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit<i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add Designation Modal --}}
    <div class="modal fade" id="designationModal" tabindex="-1" aria-labelledby="designationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="designationModalLabel">Add Designation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" class="add-designation">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Designation<span class="text-danger">*</span></label>
                                <input type="text" name="name" placeholder="Enter designation name"
                                    class="form-control" required>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit<i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="{{ asset('assets/js/add-employee-tab-btn.js') }}"></script>
<script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection
