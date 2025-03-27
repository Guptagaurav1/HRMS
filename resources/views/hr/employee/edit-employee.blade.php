@extends('layouts.master', ['title' => 'Update Employee'])
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
<div class="dashboard-breadcrumb mb-25">
    <h2 class="">Updating Employee Details</h2>
    <div>
        <a href="{{route('employee.employee-list')}}"><button class="btn btn-sm btn-primary"> Employee List <i
                    class="fa-solid fa-list"></i></button></a>

    </div>

</div>

<div class="dashboard-breadcrumb mb-25">
    <p>Emp Code<strong>: {{$employee_details->emp_code}} </strong></p>
    <p>Employee Name <strong>: {{$employee_details->emp_name}} </strong></p>
</div>

{{-- SVG images and notifications --}}
<div class="row ">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    @if(session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{session()->get('message')}}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    @if(session()->has('error'))
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                {{session()->get('message')}}
            </div>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
</div>

<div class="panel px-2" id="tab-1">

    <div class="employee-tab">
        <ul class="d-flex align-items-center justify-content-between  flex-wrap">
            <li>
                <button type="button" class="tab-btn active" id="tab1">Employee Details</button>
            </li>
            <li>
                <button type="button" class="tab-btn" id="tab2">Personal Details</button>
            </li>
            <li>
                <button type="button" class="tab-btn" id="tab3">Inquiry Details</button>
            </li>
            <li>
                <button type="button" class="tab-btn" id="tab4">Account Details</button>
            </li>
            <li>
                <button type="button" class="tab-btn" id="tab5">Educational Details</button>
            </li>
            <li>
                <button type="button" class="tab-btn" id="tab6">Experience</button>
            </li>

            <li>
                <button type="button" class="tab-btn" id="tab7">Id Proofs</button>
            </li>
        </ul>
    </div>

    {{-- Employee Details Form --}}
    <div class="tab-content active" id="content1">
        <form class="emp_details">
            @csrf
            <div class="d-none">
                <input type="hidden" name="emp_id" value="{{$id}}">
            </div>
            <div class="row g-3 mt-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                    <select class="form-select js-example-basic-multiple" name="emp_work_order" required>
                        <option value="">Select Work Order</option>
                        @foreach ($workorders as $workorder)
                        <option value="{{ $workorder->wo_number }}" {{$employee_details->emp_work_order ==
                            $workorder->wo_number ? 'selected' : ''}}>{{ $workorder->wo_number }}</option>
                        @endforeach
                    </select>
                    @error('emp_work_order')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Employee Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter Employee Code"
                        value="{{$employee_details->emp_code}}" disabled>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label" class="text-dark">Employee Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="emp_name"
                        placeholder="Enter Employee Name"
                        value="{{!empty($employee_details->emp_name) ? $employee_details->emp_name : ''}}" required>
                    @error('emp_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Reporting Email <span class="text-danger">*</span></label>
                    <select class="form-select" name="reporting_email" required>
                        <option value="" selected>Not Specify</option>
                        @foreach ($reporting_managers as $manager)
                        <option value="{{ $manager->email }}" {{$employee_details->reporting_email == $manager->email ?
                            'selected' : ''}}>{{ $manager->email }}</option>
                        @endforeach
                    </select>
                    @error('reporting_email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Date Of Joining <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="emp_doj"
                        value="{{!empty($employee_details->emp_doj) ? $employee_details->emp_doj : ''}}" required>
                    @error('emp_doj')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Posting Place </label>
                    <input type="text" class="form-control form-control-sm" name="emp_place_of_posting"
                        placeholder="Enter your Place" value="{{$employee_details->emp_place_of_posting}}">
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <select name="emp_designation" class="form-select" required>
                        <option value="">Select Designation</option>
                        @foreach ($designations as $designation)
                        <option value="{{ $designation->name }}" {{$employee_details->emp_designation ==
                            $designation->name ? 'selected' : ''}}>{{ $designation->name }}</option>
                        @endforeach
                    </select>
                    @error('emp_designation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Department <span class="text-danger">*</span></label>
                    <select name="department" class="form-select" required>
                        <option value="">Select Department</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->department }}" {{$employee_details->department ==
                            $department->department ? 'selected' : ''}}>{{ $department->department }}</option>
                        @endforeach
                    </select>
                    @error('department')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Contact(Personal) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="emp_phone_first"
                        placeholder="Enter Contact Number"
                        value="{{!empty($employee_details->emp_phone_first) ? $employee_details->emp_phone_first : ''}}"
                        minlength="10" maxlength="10"
                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required>
                    @error('emp_phone_first')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Email(Personal)<span class="text-danger">*</span></label>
                    <input type="email" class="form-control form-control-sm" name="emp_email_first"
                        placeholder="Enter Email"
                        value="{{!empty($employee_details->emp_email_first) ? $employee_details->emp_email_first : ''}}"
                        required>
                    @error('emp_email_first')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Contact (Office)</label>
                    <input type="text" class="form-control form-control-sm" name="emp_phone_second"
                        placeholder="Enter Office Contact Number" minlength="10" maxlength="10"
                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                        value="{{$employee_details->emp_phone_second}}">
                    @error('emp_phone_second')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Email (Office)</label>
                    <input type="email" class="form-control form-control-sm" name="emp_email_second"
                        placeholder="Enter Office Email" value="{{$employee_details->emp_email_second}}">
                    @error('emp_email_second')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Functional Role</label>
                    <select name="emp_functional_role[]" class="form-select js-example-basic-multiple"
                        multiple="multiple">
                        <option value="">Select Functional Role</option>
                        @foreach ($functional_roles as $role)
                        <option value="{{ $role->role }}" {{in_array($role->role, explode(",",
                            $employee_details->emp_functional_role)) ? 'selected' : ''}}>{{ $role->role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Current Working Status <span class="text-danger">*</span></label>
                    <select class="form-select" name="emp_current_working_status" required>
                        <option value="">Select Status</option>
                        <option value="active" {{($employee_details->emp_current_working_status == 'active' &&
                            empty(old('emp_current_working_status'))) || (!empty(old('emp_current_working_status')) &&
                            old('emp_current_working_status') == 'active') ? 'selected' : ''}}>Active</option>
                        <option value="resign" {{$employee_details->emp_current_working_status == 'resign' ||
                            old('emp_current_working_status') == 'resign' ? 'selected' : ''}}>Resign</option>
                    </select>
                    @error('emp_current_working_status')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                @php
                $display_resign_fields = '';
                if($employee_details->emp_current_working_status == 'active' &&
                empty(old('emp_current_working_status'))){
                $display_resign_fields = 'd-none';
                }

                @endphp
                <div class="col-xxl-3 col-lg-4 col-sm-6 {{$display_resign_fields}} resign">
                    <label class="form-label">Date of Resigning <span class="text-danger">*</span> </label>
                    <input type="date" class="form-control form-control-sm" name="emp_dor"
                        placeholder="Enter Office Email" value="{{$employee_details->emp_dor}}">
                    @error('emp_dor')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>


                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label for="emp_remark" class="form-label">Remarks</label>
                    <textarea class="form-control" name="emp_remark"
                        placeholder="Enter Remarks">{{$employee_details->emp_remark}}</textarea>
                </div>

                @if ($employee_details->emp_current_working_status == 'active')
                <div class="col-12 d-flex justify-content-end py-3 px-2">
                    <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                    <button type="submit" class="btn btn-sm btn-primary">Update <i
                            class="fa-solid fa-check"></i></button>
                </div>
                @endif
            </div>
        </form>
    </div>

    {{-- Personal Details Form --}}
    <div class="tab-content mt-3" id="content2">
        <form class="personal_details">
            @csrf
            <div class="d-none">
                <input type="hidden" name="emp_code" value="{{$employee_details->emp_code}}">
            </div>
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label" class="text-dark">Gender <span class="text-danger">*</span></label>
                    <select name="emp_gender" class="form-select" required>
                        <option value=""> Select Gender</option>
                        <option value="male" {{!empty($employee_details->getPersonalDetail) &&
                            strtolower($employee_details->getPersonalDetail->emp_gender) == 'male' ? 'selected' :
                            ''}}>Male</option>
                        <option value="female" {{!empty($employee_details->getPersonalDetail) &&
                            strtolower($employee_details->getPersonalDetail->emp_gender) == 'female' ? 'selected' :
                            ''}}>Female</option>
                        <option value="others" {{!empty($employee_details->getPersonalDetail) &&
                            strtolower($employee_details->getPersonalDetail->emp_gender) == 'others' ? 'selected' :
                            ''}}>Others</option>
                    </select>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select class="form-select" name="emp_category" required>
                        <option value="" selected="" disabled="">Not Specified</option>
                        <option value="general" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_category == 'general' ? 'selected' :
                            ''}}>Un-Reserved</option>
                        <option value="obc" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_category == 'obc' ? 'selected' : ''}}>OBC</option>
                        <option value="sc" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_category == 'sc' ? 'selected' : ''}}>SC/ST
                        </option>
                        <option value="st" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_category == 'st' ? 'selected' : ''}}>PH</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label for="inputDate" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="emp_dob"
                        value="{{!empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_dob : ''}}"
                        max="{{date('y-m-d', time())}}" required>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Guardian Name(Parents/Others)</label>
                    <input type="text" class="form-control form-control-sm" name="emp_father_name"
                        placeholder="Enter Guardian Name"
                        value="{{!empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_father_name : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Guardian(Parents/Others) Contact No.</label>
                    <input type="text" class="form-control form-control-sm" name="emp_father_mobile"
                        placeholder="Enter Guardian Contact Number" minlength="10" maxlength="10"
                        value="{{!empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_father_mobile : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Blood Group</label>
                    <select name="emp_blood_group" class="form-select">
                        <option value="" selected="" disabled="">Not Specified</option>
                        <option value="a+" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'a+' ? 'selected' : '' }}>A+
                        </option>
                        <option value="a-" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'a-' ? 'selected' : '' }}>A-
                        </option>
                        <option value="b+" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'b+' ? 'selected' : '' }}>B+
                        </option>
                        <option value="b-" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'b-' ? 'selected' : '' }}>B-
                        </option>
                        <option value="o+" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'o+' ? 'selected' : '' }}>O+
                        </option>
                        <option value="o-" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'o-' ? 'selected' : '' }}>O-
                        </option>
                        <option value="ab+" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'ab+' ? 'selected' : '' }}>AB+
                        </option>
                        <option value="ab-" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_blood_group == 'ab-' ? 'selected' : '' }}>AB-
                        </option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Martial Status<span class="text-danger">*</span></label>
                    <select class="form-select" name="emp_marital_status" required>
                        <option value="">Select Martial Status</option>
                        <option value="single" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_marital_status == 'single' ? 'selected' :
                            ''}}>Single</option>
                        <option value="married" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_marital_status == 'married' ? 'selected' :
                            ''}}>Married</option>
                        <option value="widowed" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_marital_status == 'widowed' ? 'selected' :
                            ''}}>Widowed</option>
                        <option value="divorced" {{!empty($employee_details->getPersonalDetail) &&
                            $employee_details->getPersonalDetail->emp_marital_status == 'divorced' ? 'selected' :
                            ''}}>Divorced / Seperated</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Date Of Marriage</label>
                    <input type="date" class="form-control" name="emp_dom"
                        value="{{!empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_dom : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">No Of Children</label>
                    <input type="number" class="form-control form-control-sm" name="emp_children"
                        placeholder="Enter No. Of Children"
                        value="{{!empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_children : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Spouse Name</label>
                    <input type="text" class="form-control form-control-sm" name="emp_husband_wife_name"
                        placeholder="Enter Spouse Name"
                        value="{{!empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_husband_wife_name : ''}}">
                </div>

                @if ($employee_details->emp_current_working_status == 'active')
                <div class="col-12 d-flex justify-content-end py-3 px-2">

                    <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                    <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn">Update <i
                            class="fa-solid fa-check"></i></button>
                </div>
                @endif
            </div>
        </form>
    </div>

    {{-- Address Details Form --}}
    <div class="tab-content mt-3" id="content3">
        <form class="address_details">
            @csrf
            <div class="d-none">
                <input type="hidden" name="emp_code" value="{{$employee_details->emp_code}}">
            </div>
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="exampleTextarea" class="form-label">Permanent Address <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="permanent_address" name="emp_permanent_address"
                        placeholder="Enter Permanent Address With State And City"
                        required>{{!empty($employee_details->getAddressDetail) ?  $employee_details->getAddressDetail->emp_permanent_address : ''}}</textarea>

                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="exampleTextarea" class="form-label">Correspondence Address <span
                            class="text-danger">*</span> <span><input class="form-check-input" type="checkbox"
                                id="same-as"></span>Same as
                        permanent</label>
                    <textarea class="form-control" id="local_address" name="emp_local_address"
                        placeholder="Enter Correspondence Address With State And City">{{!empty($employee_details->getAddressDetail) ? $employee_details->getAddressDetail->emp_local_address : ''}}</textarea>

                </div>

                @if ($employee_details->emp_current_working_status == 'active')
                <div class="col-12 d-flex justify-content-end py-3 px-2">

                    <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn2">Update <i
                            class="fa-solid fa-check"></i></button>
                </div>
                @endif
            </div>
        </form>
    </div>

    {{-- Bank Details Form --}}
    <div class="tab-content mt-3" id="content4">
        <form class="bank_details">
            @csrf
            <div class="d-none">
                <input type="hidden" name="emp_code" value="{{$employee_details->emp_code}}">
            </div>
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                    <select name="bank_id" class="form-select" required>
                        <option value="">Select Bank</option>
                        @foreach($banks as $bank)
                        <option value="{{$bank->id}}" {{!empty($employee_details->getBankDetail) &&
                            $employee_details->getBankDetail->bank_id == $bank->id ? 'selected' :
                            ''}}>{{$bank->name_of_bank}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Bank Branch Name <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control form-control-sm" name="emp_branch"
                        placeholder="Enter Branch Name"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_branch : ''}}"
                        required>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" name="emp_account_no"
                        placeholder="Enter Bank Account Number"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_account_no : ''}}"
                        required>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Vendor Rate (Rs)</label>
                    <input type="text" class="form-control form-control-sm" name="emp_unit"
                        placeholder="Enter Vendor Rate"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_unit : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Salary / CTC(Per Month)</label>
                    <input type="text" class="form-control form-control-sm" name="emp_salary" placeholder="Enter CTC"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_salary : ''}}">
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="emp_ifsc"
                        placeholder="Enter IFSC Code"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_ifsc : ''}}"
                        required>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">PAN Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="emp_pan" maxlength="10" minlength="10"
                        placeholder="Enter PAN Number"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_pan : ''}}"
                        required>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">PF UAN No</label>
                    <input type="text" class="form-control form-control-sm" name="emp_pf_no" minlength="12"
                        maxlength="12" placeholder="Enter PF UAN Number"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_pf_no : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">ESI No</label>
                    <input type="text" class="form-control form-control-sm" name="emp_esi_no"
                        placeholder="Enter ESI Number"
                        value="{{!empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_esi_no : ''}}">
                </div>

                @if ($employee_details->emp_current_working_status == 'active')
                <div class="col-12 d-flex justify-content-end px-2 py-3">

                    <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn3">Update <i
                            class="fa-solid fa-check"></i></button>
                </div>
                @endif
            </div>
        </form>
    </div>

    {{-- Education Details Form --}}
    <div class="tab-content mt-3" id="content5">
        <form class="education_details">
            @csrf
            <div class="d-none">
                <input type="hidden" name="emp_code" value="{{$employee_details->emp_code}}">
            </div>
            <div class="row g-3">
                <div class="card mb-20">
                    <div class="row">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Highest Qualification <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="emp_highest_qualification"
                                placeholder="Enter Highest Qualification"
                                value="{{!empty($employee_details->education) ? $employee_details->education->emp_highest_qualification : ''}}"
                                required>
                        </div>
                    </div>
                    <div class="card-header">
                        10th Qualification
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">10th Passing Year</label>
                                <input type="number" class="form-control form-control-sm" name="emp_tenth_year" min="0"
                                    max="{{date('Y')}}" placeholder="Enter 10th Passing Year"
                                    value="{{!empty($employee_details->education) ? $employee_details->education->emp_tenth_year : ''}}">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Percentage/Grade</label>
                                <input type="text" class="form-control form-control-sm" name="emp_tenth_percentage"
                                    placeholder="Enter Percentage"
                                    value="{{!empty($employee_details->education) ? $employee_details->education->emp_tenth_percentage : ''}}">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Board Name</label>
                                <input type="text" class="form-control form-control-sm" name="emp_tenth_board_name"
                                    placeholder="Enter Board Name"
                                    value="{{!empty($employee_details->education) ? $employee_details->education->emp_tenth_board_name : ''}}">
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
                                    <input type="number" class="form-control form-control-sm" name="emp_twelve_year"
                                        min="0" max="{{date('Y')}}" placeholder="Enter 12th Passing Year"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_twelve_year : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Percentage/Grade</label>
                                    <input type="text" class="form-control form-control-sm" name="emp_twelve_percentage"
                                        placeholder="Enter Percentage"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_twelve_percentage : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Board Name</label>
                                    <input type="text" class="form-control form-control-sm" name="emp_twelve_board_name"
                                        placeholder="Enter Board Name"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_twelve_board_name : ''}}">
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
                                    <input type="number" class="form-control form-control-sm" name="emp_graduation_year"
                                        max="{{date('Y')}}" min="0" placeholder="Enter Passing Year"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_graduation_year : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Percentage/Grade</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="emp_graduation_percentage" placeholder="Enter Percentage"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_graduation_percentage : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Mode Of Graduation</label>
                                    <select name="emp_graduation_mode" class="form-select">
                                        <option value="">Not Specified</option>
                                        <option value="regular"
                                            value="{{!empty($employee_details->education) && $employee_details->education->emp_graduation_mode == 'regular' ? 'selected' : ''}}">
                                            Regular</option>
                                        <option value="distance"
                                            value="{{!empty($employee_details->education) && $employee_details->education->emp_graduation_mode == 'distance' ? 'selected' : ''}}">
                                            Distance</option>
                                        <option value="correspondence"
                                            value="{{!empty($employee_details->education) && $employee_details->education->emp_graduation_mode == 'correspondence' ? 'selected' : ''}}">
                                            Correspondence</option>
                                    </select>

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Degree Name</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Degree Name" name="emp_gradqualification"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_gradqualification : ''}}">

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
                                        placeholder="Enter Passing Year" max="{{date('Y')}}" min="0"
                                        name="emp_postgraduation_year"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_postgraduation_year : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Percentage/Grade</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Percentage" name="emp_postgraduation_percentage"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_postgraduation_percentage : ''}}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Mode Of Post Graduation</label>
                                    <select name="emp_postgraduation_mode" class="form-select">
                                        <option value="">Not Specified</option>
                                        <option value="regular"
                                            value="{{!empty($employee_details->education) && $employee_details->education->emp_postgraduation_mode == 'regular' ? 'selected' : ''}}">
                                            Regular</option>
                                        <option value="distance"
                                            value="{{!empty($employee_details->education) && $employee_details->education->emp_postgraduation_mode == 'distance' ? 'selected' : ''}}">
                                            Distance</option>
                                        <option value="correspondence"
                                            value="{{!empty($employee_details->education) && $employee_details->education->emp_postgraduation_mode == 'correspondence' ? 'selected' : ''}}">
                                            Correspondence</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Degree Name</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Degree Name" name="emp_postgradqualification"
                                        value="{{!empty($employee_details->education) ? $employee_details->education->emp_postgradqualification : ''}}">
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
                @if ($employee_details->emp_current_working_status == 'active')
                <div class="col-12 d-flex justify-content-end px-2 py-3">

                    <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn4">Update <i
                            class="fa-solid fa-check"></i></button>
                </div>
                @endif
            </div>
        </form>
    </div>

    {{-- Experience Detail Form --}}
    <div class="tab-content mt-3" id="content6">
        <form class="experience_details">
            @csrf
            <div class="d-none">
                <input type="hidden" name="emp_code" value="{{$employee_details->emp_code}}">
            </div>
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Select Some Skills<span class="text-danger">*</span></label>
                    <select name="emp_skills[]" class="form-select js-example-basic-multiple" multiple required>
                        <option value="">Select Some Skills</option>
                        @foreach($skills as $skill)
                        <option value="{{$skill->skill}}" {{!empty($employee_details->experience) &&
                            in_array($skill->skill, explode(",", $employee_details->experience->emp_skills)) ?
                            'selected' : ''}}>{{$skill->skill}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Total Experience</label>
                    <input type="text" class="form-control form-control-sm" name="emp_experience"
                        placeholder="Enter Experience"
                        value="{{!empty($employee_details->experience) ? $employee_details->experience->emp_experience : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label for="resume_file" class="form-label">Upload Resume <span>(Max Size : 1mb)</span></label>
                    <input class="form-control form-control-sm" name="resume_file" type="file" accept=".pdf">
                </div>

                @if ($employee_details->emp_current_working_status == 'active')
                <div class="col-12 d-flex justify-content-end px-2 py-3">

                    <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn3">Update <i
                            class="fa-solid fa-check"></i></button>
                </div>
                @endif
            </div>
        </form>
    </div>

    {{-- Id Proof Detail Form --}}
    <div class="tab-content mt-3" id="content7">
        <form class="id_proofs">
            @csrf
            <div class="d-none">
                <input type="hidden" name="emp_code" value="{{$employee_details->emp_code}}">
            </div>
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">Police Verification Id</label>
                    <input type="text" class="form-control form-control-sm" name="police_verification_id"
                        placeholder="Enter Police Verification ID"
                        value="{{!empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->police_verification_id : ''}}">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="formFile" class="form-label">Police Verification Attachment</label>
                    <input class="form-control" type="file" name="police_verification_file" accept=".pdf">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">Aadhar Number <span class="text-danger">*</span></label>
                    <input type="text" maxlength="12" class="form-control form-control-sm" name="emp_aadhaar_no"
                        placeholder="Enter Aadhar Number"
                        onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                        value="{{!empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->emp_aadhaar_no : ''}}"
                        required>
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label class="form-label">Passport No</label>
                    <input type="text" class="form-control form-control-sm" name="emp_passport_no"
                        placeholder="Enter Passport Number"
                        value="{{!empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->emp_passport_no : ''}}">
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
                        placeholder="Enter Neareset Police Station"
                        value="{{!empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->nearest_police_station : ''}}">
                </div>
                @if ($employee_details->emp_current_working_status == 'active')
                <div class="row">
                    <div class="col-12 d-flex justify-content-end px-2 py-3">
                        <button type="submit" class="btn btn-sm btn-primary" id="employee-details-btn4">Update <i
                                class="fa-solid fa-check"></i></button>
                    </div>
                </div>
                @endif
            </div>
        </form>
    </div>


</div>


@endsection

@section('script')
<script src="{{asset('assets/js/employeeTab.js')}}"></script>

@endsection