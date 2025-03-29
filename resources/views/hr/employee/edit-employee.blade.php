@extends('layouts.master', ['title' => 'Update Employee'])
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2 class="">Updating Employee Details</h2>
        <div>
            <a href="{{ route('employee.employee-list') }}"><button class="btn btn-sm btn-primary"> Employee List <i
                        class="fa-solid fa-list"></i></button></a>

        </div>

    </div>

    <div class="dashboard-breadcrumb mb-25">
        <p>Emp Code<strong>: {{ $employee_details->emp_code }} </strong></p>
        <p>Employee Name <strong>: {{ $employee_details->emp_name }} </strong></p>
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

        @if (session()->has('success'))
            <div class="col-md-12">
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session()->get('message') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        {{ session()->get('message') }}
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
        <div class="tab-content active mt-4" id="content1">
            <form class="emp_details">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="emp_id" value="{{ $id }}">
                </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                        <select class="form-select js-example-basic-multiple" name="emp_work_order" required>
                            <option value="">Select Work Order</option>
                            @foreach ($workorders as $workorder)
                                <option value="{{ $workorder->wo_number }}"
                                    {{ $employee_details->emp_work_order == $workorder->wo_number ? 'selected' : '' }}>
                                    {{ $workorder->wo_number }}</option>
                            @endforeach
                        </select>
                        @error('emp_work_order')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Employee Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Employee Code"
                            value="{{ $employee_details->emp_code }}" disabled>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Employee Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_name"
                            placeholder="Enter Employee Name"
                            value="{{ !empty($employee_details->emp_name) ? $employee_details->emp_name : '' }}" required>
                        @error('emp_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Department <span class="text-danger">*</span> <i
                                class="fa fa-plus border rounded p-1 small border-primary text-light bg-primary"
                                role="button" data-bs-toggle="modal" data-bs-target="#departmentModal"
                                aria-hidden="true"></i></label>
                        <select name="department" class="form-select" required>
                            <option value="">Select Department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->department }}"
                                    {{ $employee_details->department == $department->department ? 'selected' : '' }}>
                                    {{ $department->department }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Reporting Email <span class="text-danger">*</span></label>
                        <select class="form-select" name="reporting_email" required>
                            {{-- @foreach ($reporting_managers as $manager) --}}
                            <option value="{{ $employee_details->reporting_email }}">
                                {{ $employee_details->reporting_email }}</option>
                            {{-- @endforeach --}}
                        </select>
                        @error('reporting_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Date Of Joining <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="emp_doj"
                            value="{{ !empty($employee_details->emp_doj) ? $employee_details->emp_doj : '' }}" required>
                        @error('emp_doj')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Posting Place </label>
                        <input type="text" class="form-control form-control-sm" name="emp_place_of_posting"
                            placeholder="Enter your Place" value="{{ $employee_details->emp_place_of_posting }}">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Designation <span class="text-danger">*</span> <i
                                class="fa fa-plus border rounded p-1 small border-primary text-light bg-primary"
                                role="button" data-bs-toggle="modal" data-bs-target="#designationModal"
                                aria-hidden="true"></i></label>
                        <select name="emp_designation" class="form-select" required>
                            <option value="">Select Designation</option>
                            @foreach ($designations as $designation)
                                <option value="{{ $designation->name }}"
                                    {{ $employee_details->emp_designation == $designation->name ? 'selected' : '' }}>
                                    {{ $designation->name }}</option>
                            @endforeach
                        </select>
                        @error('emp_designation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact(Personal) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_phone_first"
                            placeholder="Enter Contact Number"
                            value="{{ !empty($employee_details->emp_phone_first) ? $employee_details->emp_phone_first : '' }}"
                            minlength="10" maxlength="10"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required>
                        @error('emp_phone_first')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email(Personal)<span class="text-danger">*</span></label>
                        <input type="email" class="form-control form-control-sm" name="emp_email_first"
                            placeholder="Enter Email"
                            value="{{ !empty($employee_details->emp_email_first) ? $employee_details->emp_email_first : '' }}"
                            required>
                        @error('emp_email_first')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact (Office)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_phone_second"
                            placeholder="Enter Office Contact Number" minlength="10" maxlength="10"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                            value="{{ $employee_details->emp_phone_second }}">
                        @error('emp_phone_second')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email (Office)</label>
                        <input type="email" class="form-control form-control-sm" name="emp_email_second"
                            placeholder="Enter Office Email" value="{{ $employee_details->emp_email_second }}">
                        @error('emp_email_second')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Functional Role</label>
                        <select name="emp_functional_role[]" class="form-select js-example-basic-multiple"
                            multiple="multiple">
                            <option value="">Select Functional Role</option>
                            @foreach ($functional_roles as $role)
                                <option value="{{ $role->role }}"
                                    {{ in_array($role->role, explode(',', $employee_details->emp_functional_role)) ? 'selected' : '' }}>
                                    {{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Current Working Status <span class="text-danger">*</span></label>
                        <div class="btn-group d-flex justify-content-center" role="group"
                            aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="emp_current_working_status" value="active"
                                autocomplete="off" id="activestatus"
                                {{ ($employee_details->emp_current_working_status == 'active' && empty(old('emp_current_working_status'))) || (!empty(old('emp_current_working_status')) && old('emp_current_working_status') == 'active') ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary activelabel" for="activestatus">Active</label>

                            <input type="radio" class="btn-check" name="emp_current_working_status" value="resign"
                                autocomplete="off" id="resignstatus"
                                {{ ($employee_details->emp_current_working_status == 'resign' && empty(old('emp_current_working_status'))) || (!empty(old('emp_current_working_status')) && old('emp_current_working_status') == 'resign') ? 'checked' : '' }}>
                            <label class="btn btn-outline-danger" for="resignstatus">Resign</label>

                            <input type="radio" class="btn-check inactiveradio" name="emp_current_working_status"
                                value="inactive" autocomplete="off" id="inactivestatus"
                                {{ ($employee_details->emp_current_working_status == 'inactive' && empty(old('emp_current_working_status'))) || (!empty(old('emp_current_working_status')) && old('emp_current_working_status') == 'inactive') ? 'checked' : '' }}>
                            <label class="btn btn-outline-warning inactivelabel" for="inactivestatus">In Active</label>
                        </div>

                        {{-- <select class="form-select" name="emp_current_working_status" required>
                        <option value="">Select Status</option>
                        <option value="active" {{($employee_details->emp_current_working_status == 'active' && empty(old('emp_current_working_status'))) || (!empty(old('emp_current_working_status')) && old('emp_current_working_status') == 'active') ? 'selected' : ''}}>Active</option>
                        <option value="resign" {{$employee_details->emp_current_working_status == 'resign' || old('emp_current_working_status') == 'resign' ? 'selected' : ''}}>Resign</option>
                        <option value="inactive" {{$employee_details->emp_current_working_status == 'inactive' || old('emp_current_working_status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
                    </select> --}}
                        @error('emp_current_working_status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @php
                        $display_resign_fields = '';
                        if (
                            ($employee_details->emp_current_working_status == 'active' ||
                                $employee_details->emp_current_working_status == 'inactive') &&
                            empty(old('emp_current_working_status'))
                        ) {
                            $display_resign_fields = 'd-none';
                        }
                    @endphp
                    <div class="col-xxl-3 col-lg-4 col-sm-6 {{ $display_resign_fields }} resign">
                        <label class="form-label">Date of Resigning <span class="text-danger">*</span> </label>
                        <input type="date" class="form-control form-control-sm" name="emp_dor"
                            placeholder="Enter Office Email" value="{{ $employee_details->emp_dor }}">
                        @error('emp_dor')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="emp_remark" class="form-label">Remarks</label>
                        <textarea class="form-control" name="emp_remark" placeholder="Enter Remarks">{{ $employee_details->emp_remark }}</textarea>
                    </div>

                    @if (
                        $employee_details->emp_current_working_status == 'active' ||
                            $employee_details->emp_current_working_status == 'inactive')
                        <div class="col-12 d-flex justify-content-end px-2 py-3">
                            <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                            <button type="submit" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-check"></i></button>
                        </div>
                    @endif
                </div>
            </form>
        </div>

        {{-- Personal Details Form --}}
        <div class="tab-content mt-4" id="content2">
            <form class="personal_details">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="emp_code" value="{{ $employee_details->emp_code }}">
                </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" class="text-dark">Gender <span class="text-danger">*</span></label>
                        <select name="emp_gender" class="form-select" required>
                            <option value=""> Select Gender</option>
                            <option value="male"
                                {{ !empty($employee_details->getPersonalDetail) && strtolower($employee_details->getPersonalDetail->emp_gender) == 'male' ? 'selected' : '' }}>
                                Male</option>
                            <option value="female"
                                {{ !empty($employee_details->getPersonalDetail) && strtolower($employee_details->getPersonalDetail->emp_gender) == 'female' ? 'selected' : '' }}>
                                Female</option>
                            <option value="others"
                                {{ !empty($employee_details->getPersonalDetail) && strtolower($employee_details->getPersonalDetail->emp_gender) == 'others' ? 'selected' : '' }}>
                                Others</option>
                        </select>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select" name="emp_category" required>
                            <option value="" selected="" disabled="">Not Specified</option>
                            <option value="general"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_category == 'general' ? 'selected' : '' }}>
                                Un-Reserved</option>
                            <option value="obc"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_category == 'obc' ? 'selected' : '' }}>
                                OBC</option>
                            <option value="sc"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_category == 'sc' ? 'selected' : '' }}>
                                SC/ST</option>
                            <option value="st"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_category == 'st' ? 'selected' : '' }}>
                                PH</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="inputDate" class="form-label">Date of Birth <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="emp_dob"
                            value="{{ !empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_dob : '' }}"
                            max="{{ date('y-m-d', time()) }}" required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Guardian Name(Parents/Others)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_father_name"
                            placeholder="Enter Guardian Name"
                            value="{{ !empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_father_name : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Guardian(Parents/Others) Contact No.</label>
                        <input type="text" class="form-control form-control-sm" name="emp_father_mobile"
                            placeholder="Enter Guardian Contact Number" minlength="10" maxlength="10"
                            value="{{ !empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_father_mobile : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Blood Group</label>
                        <select name="emp_blood_group" class="form-select">
                            <option value="" selected="" disabled="">Not Specified</option>
                            <option value="a+"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'a+' ? 'selected' : '' }}>
                                A+</option>
                            <option value="a-"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'a-' ? 'selected' : '' }}>
                                A-</option>
                            <option value="b+"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'b+' ? 'selected' : '' }}>
                                B+</option>
                            <option value="b-"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'b-' ? 'selected' : '' }}>
                                B-</option>
                            <option value="o+"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'o+' ? 'selected' : '' }}>
                                O+</option>
                            <option value="o-"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'o-' ? 'selected' : '' }}>
                                O-</option>
                            <option value="ab+"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'ab+' ? 'selected' : '' }}>
                                AB+</option>
                            <option value="ab-"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_blood_group == 'ab-' ? 'selected' : '' }}>
                                AB-</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Martial Status<span class="text-danger">*</span></label>
                        <select class="form-select" name="emp_marital_status" required>
                            <option value="">Select Martial Status</option>
                            <option value="single"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_marital_status == 'single' ? 'selected' : '' }}>
                                Single</option>
                            <option value="married"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_marital_status == 'married' ? 'selected' : '' }}>
                                Married</option>
                            <option value="widowed"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_marital_status == 'widowed' ? 'selected' : '' }}>
                                Widowed</option>
                            <option value="divorced"
                                {{ !empty($employee_details->getPersonalDetail) && $employee_details->getPersonalDetail->emp_marital_status == 'divorced' ? 'selected' : '' }}>
                                Divorced / Seperated</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Date Of Marriage</label>
                        <input type="date" class="form-control" name="emp_dom"
                            value="{{ !empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_dom : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">No Of Children</label>
                        <input type="number" class="form-control form-control-sm" name="emp_children"
                            placeholder="Enter No. Of Children"
                            value="{{ !empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_children : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Spouse Name</label>
                        <input type="text" class="form-control form-control-sm" name="emp_husband_wife_name"
                            placeholder="Enter Spouse Name"
                            value="{{ !empty($employee_details->getPersonalDetail) ? $employee_details->getPersonalDetail->emp_husband_wife_name : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6 photodiv">

                        <label class="form-label text-dark">Add Signature photo <span class="fw-lighter small">(Max
                            size :1mb)</span></label>
                        <input type="file" name="emp_signature" class="form-control photo"
                            accept=".jpg, .jpeg, .png">
                        <img src="{{ !empty($employee_details->getPersonalDetail) ? asset('recruitment/candidate_documents/sign').'/'.$employee_details->getPersonalDetail->emp_signature : '' }}" class="img-fluid preview_photo w-50 rounded my-2">

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6 photodiv">

                        <label class="form-label text-dark">Add Passport size photo <span class="fw-lighter small">(Max
                            size :1mb)</span></label>
                        <input type="file" name="emp_photo" class="form-control photo"
                            accept=".jpg, .jpeg, .png">
                        <img src="{{ !empty($employee_details->getPersonalDetail) ? asset('recruitment/candidate_documents/passport_size_photo'.'/'.$employee_details->getPersonalDetail->emp_photo) : '' }}" class="img-fluid preview_photo w-50 rounded my-2">

                    </div>

                    @if (
                        $employee_details->emp_current_working_status == 'active' ||
                            $employee_details->emp_current_working_status == 'inactive')
                        <div class="col-12 d-flex justify-content-end py-3 px-2">

                            <!-- <button class="btn btn-sm btn-secondary" id="previous-btn" style="display: none;">Previous <i class="fa-solid fa-arrow-left"></i></button> -->
                            <button type="submit" class="btn btn-sm btn-primary"
                                id="employee-details-btn">Update <i class="fa-solid fa-check"></i></button>
                        </div>
                    @endif
                </div>
            </form>
        </div>

        {{-- Address Details Form --}}
        <div class="tab-content mt-4" id="content3">
            <form class="address_details">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="emp_code" value="{{ $employee_details->emp_code }}">
                </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">State <span class="text-danger">*</span></label>
                        <select class="form-select" id="state" name="state" required>
                            <option value="">Select State</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}"
                                    {{ !empty($employee_details->getAddressDetail) && $employee_details->getAddressDetail->state == $state->id ? 'selected' : '' }}>
                                    {{ $state->state }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">City<span class="text-danger">*</span></label>
                        <select class="form-select" id="cities" name="emp_city" required>
                            <option value="">Select City</option>
                            @if ($cities)
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ !empty($employee_details->getAddressDetail) && $employee_details->getAddressDetail->emp_city == $city->id ? 'selected' : '' }}>
                                        {{ $city->city_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Permanent Address <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="permanent_address" name="emp_permanent_address"
                            placeholder="Enter Permanent Address" required>{{ !empty($employee_details->getAddressDetail) ? $employee_details->getAddressDetail->emp_permanent_address : '' }}</textarea>

                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Correspondence Address <span
                                class="text-danger">*</span> <span><input class="form-check-input" type="checkbox"
                                    id="same-as"></span>Same as
                            permanent</label>
                        <textarea class="form-control" id="local_address" name="emp_local_address"
                            placeholder="Enter Correspondence Address">{{ !empty($employee_details->getAddressDetail) ? $employee_details->getAddressDetail->emp_local_address : '' }}</textarea>

                    </div>

                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="exampleTextarea" class="form-label">ZIP Code<span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-sm" name="pincode"
                            placeholder="Enter ZIP Code"
                            value="{{ !empty($employee_details->getAddressDetail) ? $employee_details->getAddressDetail->pincode : '' }}"
                            required>

                    </div>

                    @if (
                        $employee_details->emp_current_working_status == 'active' ||
                            $employee_details->emp_current_working_status == 'inactive')
                        <div class="col-12 d-flex justify-content-end py-3 px-2">

                            <button type="submit" class="btn btn-sm btn-primary"
                                id="employee-details-btn2">Update <i class="fa-solid fa-check"></i></button>
                        </div>
                    @endif
                </div>
               
            </form>
        </div>

        {{-- Bank Details Form --}}
        <div class="tab-content mt-4" id="content4">
            <form class="bank_details">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="emp_code" value="{{ $employee_details->emp_code }}">
                </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                        <select name="bank_id" class="form-select" required>
                            <option value="">Select Bank</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}"
                                    {{ !empty($employee_details->getBankDetail) && $employee_details->getBankDetail->bank_id == $bank->id ? 'selected' : '' }}>
                                    {{ $bank->name_of_bank }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Branch Name <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control form-control-sm" name="emp_branch"
                            placeholder="Enter Branch Name"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_branch : '' }}"
                            required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Bank Account Number <span class="text-danger">*</span></label>
                        <input type="number" class="form-control form-control-sm" name="emp_account_no"
                            placeholder="Enter Bank Account Number"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_account_no : '' }}"
                            required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Vendor Rate (Rs)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_unit"
                            placeholder="Enter Vendor Rate"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_unit : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Salary / CTC(Per Month)</label>
                        <input type="text" class="form-control form-control-sm" name="emp_salary"
                            placeholder="Enter CTC"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_salary : '' }}">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_ifsc"
                            placeholder="Enter IFSC Code" maxlength="11"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_ifsc : '' }}"
                            required>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">PAN Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="emp_pan" maxlength="10"
                            minlength="10" placeholder="Enter PAN Number"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_pan : '' }}"
                            required>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">PF UAN No</label>
                        <input type="text" class="form-control form-control-sm" name="emp_pf_no" minlength="12"
                            maxlength="12" placeholder="Enter PF UAN Number"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_pf_no : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">ESI No</label>
                        <input type="text" class="form-control form-control-sm" name="emp_esi_no"
                            placeholder="Enter ESI Number" maxlength="17"
                            value="{{ !empty($employee_details->getBankDetail) ? $employee_details->getBankDetail->emp_esi_no : '' }}">
                    </div>

                    @if (
                        $employee_details->emp_current_working_status == 'active' ||
                            $employee_details->emp_current_working_status == 'inactive')
                        <div class="col-12 d-flex justify-content-end px-2 py-3">

                            <button type="submit" class="btn btn-sm btn-primary"
                                id="employee-details-btn3">Update <i class="fa-solid fa-check"></i></button>
                        </div>
                    @endif
                </div>
            </form>
        </div>

        {{-- Education Details Form --}}
        <div class="tab-content mt-4" id="content5">
            <form class="education_details">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="emp_code" value="{{ $employee_details->emp_code }}">
                </div>
                <div class="row g-3">
                    <div class="card mb-20">
                        <div class="row">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Highest Qualification <span class="text-danger">*</span></label>
                                {{-- <input type="text" class="form-control form-control-sm"
                                    name="emp_highest_qualification" placeholder="Enter Highest Qualification"
                                    value="{{ !empty($employee_details->education) ? $employee_details->education->emp_highest_qualification : '' }}"
                                    required> --}}
                                <select name="emp_highest_qualification" class="form-control form-control-sm" required>
                                    <option value="">Select</option>
                                    <option value="10th"
                                        {{ !empty($employee_details->education) && $employee_details->education->emp_highest_qualification == '10th' ? 'selected' : '' }}>
                                        10th</option>
                                    <option value="12th"
                                        {{ !empty($employee_details->education) && $employee_details->education->emp_highest_qualification == '12th' ? 'selected' : '' }}>
                                        12th</option>
                                    <option value="Diploma"
                                        {{ !empty($employee_details->education) && $employee_details->education->emp_highest_qualification == 'Diploma' ? 'selected' : '' }}>
                                        Diploma</option>
                                    <option value="Bachelor"
                                        {{ !empty($employee_details->education) && $employee_details->education->emp_highest_qualification == 'Bachelor' ? 'selected' : '' }}>
                                        Bachelor</option>
                                    <option value="Master"
                                        {{ !empty($employee_details->education) && $employee_details->education->emp_highest_qualification == 'Master' ? 'selected' : '' }}>
                                        Master</option>
                                    <option value="PhD"
                                        {{ !empty($employee_details->education) && $employee_details->education->emp_highest_qualification == 'PhD' ? 'selected' : '' }}>
                                        PhD</option>
                                </select>
                            </div>
                        </div>

                        {{-- 10th Section --}}
                        <div class="card-header">
                            10th Qualification
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">10th Passing Year</label>
                                    <input type="number" class="form-control form-control-sm" name="emp_tenth_year"
                                        min="0" max="{{ date('Y') }}" placeholder="Enter 10th Passing Year"
                                        value="{{ !empty($employee_details->education) ? $employee_details->education->emp_tenth_year : '' }}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Percentage/Grade</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="emp_tenth_percentage" placeholder="Enter Percentage"
                                        value="{{ !empty($employee_details->education) ? $employee_details->education->emp_tenth_percentage : '' }}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Board Name</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="emp_tenth_board_name" placeholder="Enter Board Name"
                                        value="{{ !empty($employee_details->education) ? $employee_details->education->emp_tenth_board_name : '' }}">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Upload Doc <span class="small">(Only Pdf)</span>
                                        <span class="fw-lighter small">(Max size :1mb)</span>
                                        @if (!empty($employee_details->education) && $employee_details->education->emp_tenth_doc)
                                            <a href="{{ asset('recruitment/candidate_documents/10th') . '/' . $employee_details->education->emp_tenth_doc }}"
                                                target="_blank">View</a>
                                        @endif
                                    </label>
                                    <input type="file" accept=".pdf" class="form-control form-control-sm"
                                        name="emp_tenth_doc">
                                </div>

                            </div>
                        </div>

                        {{-- 12th section --}}
                        <div class="card mb-20">
                            <div class="card-header">
                                12th Qualification
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">12th Passing Year</label>
                                        <input type="number" class="form-control form-control-sm" name="emp_twelve_year"
                                            min="0" max="{{ date('Y') }}"
                                            placeholder="Enter 12th Passing Year"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_twelve_year : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="emp_twelve_percentage" placeholder="Enter Percentage"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_twelve_percentage : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Board Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="emp_twelve_board_name" placeholder="Enter Board Name"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_twelve_board_name : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Upload Doc <span class="small">(Only
                                                Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>
                                            @if (!empty($employee_details->education) && $employee_details->education->emp_twelve_doc)
                                                <a href="{{ asset('recruitment/candidate_documents/12th') . '/' . $employee_details->education->emp_twelve_doc }}"
                                                    target="_blank">View</a>
                                            @endif
                                        </label>
                                        <input type="file" accept=".pdf" class="form-control form-control-sm"
                                            name="emp_twelve_doc">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Diploma Section --}}
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
                                            placeholder="Enter Diploma Passing Year"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_diploma_year : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="emp_diploma_percentage" placeholder="Enter Percentage"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_diploma_percentage : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Mode Of Diploma</label>
                                        <select name="emp_diploma_mode" class="form-select">
                                            <option value="">Not Specified</option>
                                            <option value="regular"
                                                {{ !empty($employee_details->education) && $employee_details->education->emp_diploma_mode == 'regular' ? 'selected' : '' }}>
                                                Regular</option>
                                            <option value="distance"
                                                {{ !empty($employee_details->education) && $employee_details->education->emp_diploma_mode == 'distance' ? 'selected' : '' }}>
                                                Distance</option>
                                            <option value="correspondence"
                                                {{ !empty($employee_details->education) && $employee_details->education->emp_diploma_mode == 'correspondence' ? 'selected' : '' }}>
                                                Correspondence</option>
                                        </select>

                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Diploma Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Diploma Name" name="emp_diploma"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_diploma : '' }}">

                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Diploma In (Stream Name)</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Diploma Stream" name="emp_diploma_in"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_diploma_in : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Upload Doc <span class="small">(Only
                                                Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>
                                            @if (!empty($employee_details->education) && $employee_details->education->diploma_doc)
                                                <a href="{{ asset('recruitment/candidate_documents/diploma') . '/' . $employee_details->education->diploma_doc }}"
                                                    target="_blank">View</a>
                                            @endif
                                        </label>
                                        <input type="file" accept=".pdf" class="form-control form-control-sm"
                                            name="diploma_doc">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Graduation Section --}}
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
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_graduation_year : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="emp_graduation_percentage" placeholder="Enter Percentage"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_graduation_percentage : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Mode Of Graduation</label>
                                        <select name="emp_graduation_mode" class="form-select">
                                            <option value="">Not Specified</option>
                                            <option value="regular"
                                                value="{{ !empty($employee_details->education) && $employee_details->education->emp_graduation_mode == 'regular' ? 'selected' : '' }}">
                                                Regular</option>
                                            <option value="distance"
                                                value="{{ !empty($employee_details->education) && $employee_details->education->emp_graduation_mode == 'distance' ? 'selected' : '' }}">
                                                Distance</option>
                                            <option value="correspondence"
                                                value="{{ !empty($employee_details->education) && $employee_details->education->emp_graduation_mode == 'correspondence' ? 'selected' : '' }}">
                                                Correspondence</option>
                                        </select>

                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Name" name="emp_gradqualification"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_gradqualification : '' }}">

                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree In (Stream Name)</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Stream" name="emp_graduation_in" value="{{ !empty($employee_details->education) ? $employee_details->education->emp_graduation_in : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Upload Doc <span class="small">(Only
                                                Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>
                                            @if (!empty($employee_details->education) && $employee_details->education->grad_doc)
                                                <a href="{{ asset('recruitment/candidate_documents/graduation') . '/' . $employee_details->education->grad_doc }}"
                                                    target="_blank">View</a>
                                            @endif
                                        </label>
                                        <input type="file" accept=".pdf" class="form-control form-control-sm"
                                            name="grad_doc">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Post Graduation Section --}}
                        <div class="card mb-20">
                            <div class="card-header">
                                Post Graduation
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Passing Year/Persuing </label>
                                        <input type="number" class="form-control form-control-sm"
                                            placeholder="Enter Passing Year" max="{{ date('Y') }}" min="0"
                                            name="emp_postgraduation_year"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_postgraduation_year : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Percentage" name="emp_postgraduation_percentage"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_postgraduation_percentage : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Mode Of Post Graduation</label>
                                        <select name="emp_postgraduation_mode" class="form-select">
                                            <option value="">Not Specified</option>
                                            <option value="regular"
                                                value="{{ !empty($employee_details->education) && $employee_details->education->emp_postgraduation_mode == 'regular' ? 'selected' : '' }}">
                                                Regular</option>
                                            <option value="distance"
                                                value="{{ !empty($employee_details->education) && $employee_details->education->emp_postgraduation_mode == 'distance' ? 'selected' : '' }}">
                                                Distance</option>
                                            <option value="correspondence"
                                                value="{{ !empty($employee_details->education) && $employee_details->education->emp_postgraduation_mode == 'correspondence' ? 'selected' : '' }}">
                                                Correspondence</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Name" name="emp_postgradqualification"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_postgradqualification : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree In (Stream Name)</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Stream" name="emp_postgraduation_in" value="{{ !empty($employee_details->education) ? $employee_details->education->emp_postgraduation_in : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Upload Doc <span class="small">(Only
                                                Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>
                                            @if (!empty($employee_details->education) && $employee_details->education->post_grad_doc)
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
                                            placeholder="Enter Passing Year" max="{{ date('Y') }}" min="0"
                                            name="emp_doctorate_year"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_doctorate_year : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Percentage/Grade</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Percentage" name="emp_doctorate_percentage"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_doctorate_percentage : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Mode Of Doctorate</label>
                                        <select name="emp_doctorate_mode" class="form-select">
                                            <option value="">Not Specified</option>
                                            <option value="regular"
                                                {{ !empty($employee_details->education) && $employee_details->education->emp_doctorate_mode == 'regular' ? 'selected' : '' }}>
                                                Regular</option>
                                            <option value="distance"
                                                {{ !empty($employee_details->education) && $employee_details->education->emp_doctorate_mode == 'distance' ? 'selected' : '' }}>
                                                Distance</option>
                                            <option value="correspondence"
                                                {{ !empty($employee_details->education) && $employee_details->education->emp_doctorate_mode == 'correspondence' ? 'selected' : '' }}>
                                                Correspondence</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree Name</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Name" name="emp_doctorate"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_doctorate : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Degree In (Stream Name)</label>
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="Enter Degree Stream" name="emp_doctorate_in"
                                            value="{{ !empty($employee_details->education) ? $employee_details->education->emp_doctorate_in : '' }}">
                                    </div>
                                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                                        <label class="form-label">Upload Doc <span class="small">(Only
                                                Pdf)</span> <span class="fw-lighter small">(Max size :1mb)</span>
                                            @if (!empty($employee_details->education) && $employee_details->education->doctorate_doc)
                                                <a href="{{ asset('recruitment/candidate_documents/doctorate') . '/' . $employee_details->education->doctorate_doc }}"
                                                    target="_blank">View</a>
                                            @endif
                                        </label>
                                        <input type="file" accept=".pdf" class="form-control form-control-sm"
                                            name="doctorate_doc">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (
                        $employee_details->emp_current_working_status == 'active' ||
                            $employee_details->emp_current_working_status == 'inactive')
                        <div class="col-12 d-flex justify-content-end px-2 py-3">

                            <button type="submit" class="btn btn-sm btn-primary"
                                id="employee-details-btn4">Update <i class="fa-solid fa-check"></i></button>
                        </div>
                    @endif
                </div>
            </form>
        </div>

        {{-- Experience Detail Form --}}
        <div class="tab-content mt-4" id="content6">
            <form class="experience_details">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="emp_code" value="{{ $employee_details->emp_code }}">
                </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Select Some Skills<span class="text-danger">*</span></label>
                        <select name="emp_skills[]" class="form-select js-example-basic-multiple" multiple required>
                            <option value="">Select Some Skills</option>
                            @foreach ($skills as $skill)
                                <option value="{{ $skill->skill }}"
                                    {{ !empty($employee_details->experience) && in_array($skill->skill, explode(',', $employee_details->experience->emp_skills)) ? 'selected' : '' }}>
                                    {{ $skill->skill }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Total Experience</label>
                        <input type="text" class="form-control form-control-sm" name="emp_experience"
                            placeholder="Enter Experience"
                            value="{{ !empty($employee_details->experience) ? $employee_details->experience->emp_experience : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="resume_file" class="form-label">Upload Resume <span class="fw-lighter small">(Max
                                Size : 1mb)</span>
                            @if (!empty($employee_details->experience) && $employee_details->experience->resume_file)
                                <a href="{{ asset('recruitment/candidate_documents/employee_resume') . '/' . $employee_details->experience->resume_file }}"
                                    target="_blank">View</a>
                            @endif
                        </label>
                        <input class="form-control form-control-sm" name="resume_file" type="file" accept=".pdf">
                    </div>

                    @if (
                        $employee_details->emp_current_working_status == 'active' ||
                            $employee_details->emp_current_working_status == 'inactive')
                        <div class="col-12 d-flex justify-content-end px-2 py-3">

                            <button type="submit" class="btn btn-sm btn-primary"
                                id="employee-details-btn3">Update <i class="fa-solid fa-check"></i></button>
                        </div>
                      
                    @endif
                </div>
            </form>
        </div>

        {{-- Id Proof Detail Form --}}
        <div class="tab-content mt-4" id="content7">
            <form class="id_proofs">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="emp_code" value="{{ $employee_details->emp_code }}">
                </div>
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Police Verification Id</label>
                        <input type="text" class="form-control form-control-sm" name="police_verification_id"
                            placeholder="Enter Police Verification ID"
                            value="{{ !empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->police_verification_id : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Police Verification Attachment <span class="fw-lighter small">(Max
                            size :1mb)</span>
                        @if (!empty($employee_details->getIdProofDetail) && $employee_details->getIdProofDetail->police_verification_file)
                            <a href="{{ asset('recruitment/candidate_documents/police_verification') . '/' . $employee_details->getIdProofDetail->police_verification_file }}"
                                target="_blank">View</a>
                        @endif
                    </label>
                        <input class="form-control" type="file" name="police_verification_file" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Aadhar Number <span class="text-danger">*</span></label>
                        <input type="text" maxlength="12" class="form-control form-control-sm" name="emp_aadhaar_no"
                            placeholder="Enter Aadhar Number"
                            onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"
                            value="{{ !empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->emp_aadhaar_no : '' }}"
                            required>
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Aadhar Card <span class="fw-lighter small">(Max
                                size :1mb)</span>
                            @if (!empty($employee_details->getIdProofDetail) && $employee_details->getIdProofDetail->aadhar_card_doc)
                                <a href="{{ asset('recruitment/candidate_documents/aadhar_card') . '/' . $employee_details->getIdProofDetail->aadhar_card_doc }}"
                                    target="_blank">View</a>
                            @endif
                        </label>
                        <input class="form-control" type="file" name="aadhar_card_doc" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Passport No</label>
                        <input type="text" class="form-control form-control-sm" name="emp_passport_no"
                            placeholder="Enter Passport Number"
                            value="{{ !empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->emp_passport_no : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Passport Document <span class="fw-lighter small">(Max
                                size :1mb)</span>
                            @if (!empty($employee_details->getIdProofDetail) && $employee_details->getIdProofDetail->passport_file)
                                <a href="{{ asset('recruitment/candidate_documents/passport') . '/' . $employee_details->getIdProofDetail->passport_file }}"
                                    target="_blank">View</a>
                            @endif
                        </label>
                        <input class="form-control" type="file" name="passport_file" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label for="formFile" class="form-label">Permanent Address Proof Attachment <span class="fw-lighter small">(Max
                            size :1mb)</span>
                        @if (!empty($employee_details->getIdProofDetail) && $employee_details->getIdProofDetail->permanent_add_doc)
                            <a href="{{ asset('recruitment/candidate_documents/permanent_address_proof') . '/' . $employee_details->getIdProofDetail->permanent_add_doc }}"
                                target="_blank">View</a>
                        @endif</label>
                        <input class="form-control" type="file" name="permanent_add_doc" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Nearest Police Station</label>
                        <input type="text" class="form-control form-control-sm" name="nearest_police_station"
                            placeholder="Enter Neareset Police Station"
                            value="{{ !empty($employee_details->getIdProofDetail) ? $employee_details->getIdProofDetail->nearest_police_station : '' }}">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Bank Document <span class="fw-lighter small">(Max size :1mb)</span>
                            @if (!empty($employee_details->getIdProofDetail) && $employee_details->getIdProofDetail->bank_doc)
                                <a href="{{ asset('recruitment/candidate_documents/bank_account') . '/' . $employee_details->getIdProofDetail->bank_doc }}"
                                    target="_blank">View</a>
                            @endif
                        </label>
                        <input type="file" class="form-control form-control-sm" name="bank_doc" accept=".pdf">
                    </div>
                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                        <label class="form-label">Category Document <span class="fw-lighter small">(Max size :1mb)</span>
                            @if (!empty($employee_details->getIdProofDetail) && $employee_details->getIdProofDetail->category_doc)
                                <a href="{{ asset('recruitment/candidate_documents/category') . '/' . $employee_details->getIdProofDetail->category_doc }}"
                                    target="_blank">View</a>
                            @endif
                        </label>
                        <input type="file" class="form-control form-control-sm" name="category_doc" accept=".pdf">
                    </div>

                    @if (
                        $employee_details->emp_current_working_status == 'active' ||
                            $employee_details->emp_current_working_status == 'inactive')
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end px-2 py-3">
                                <button type="submit" class="btn btn-sm btn-primary"
                                    id="employee-details-btn4">Update <i class="fa-solid fa-check"></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>


    </div>
@endsection

{{-- Show modals --}}
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
                                        <option value="{{ $manager->id }}"
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
    <script src="{{ asset('assets/js/employeeTab.js') }}"></script>
@endsection
