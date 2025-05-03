@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />


@endsection

@section('contents')

<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header heading-stripe">
                <h3 class="mt-2 text-center">Add Work Order</h3>
                <div>
                    <ul class="breadcrumb">
                        <li> 
                            @if (auth()->user()->role->role_name == "hr")
                                <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "hr_operations")
                                <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "sales_manager")
                                <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                            @else
                            @endif
                        </li>
                        <li><a href="{{route('work-order-list')}}">Work Order List</a></li>
                        <li>Add Work Order</li>
                    </ul>
                </div>
            </div>
            @if(auth()->user()->hasPermission('work-order-list'))

            <div class="dashboard-breadcrumb mb-25">

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('work-order-list')}}"><button class="btn btn-sm btn-primary mx-3 mt-3"> Work Order
                            List <i class="fa-solid fa-list"></i></button></a>
                </div>
            </div>
            @endif

            <div class="row px-3 mt-2">

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

            <form action="{{ route('store-work-order')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="panel">
                    <div class="employee-tab">
                        <ul class="d-flex align-items-center justify-content-between flex-nowrap">
                            <li>
                                <button type="button" class="tab-btn active" id="tab1">Project Details</button>
                            </li>
                            <li>
                                <button type="button" class="tab-btn" id="tab2">Work Order Details</button>
                            </li>
                            <li>
                                <button type="button" class="tab-btn" id="tab3">Contacts Details</button>
                            </li>
                            <li>
                                <button type="button" class="tab-btn" id="tab4">Invoice Details</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content active" id="content1">
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-sm-12 col-md-4">
                                    <label class="form-label">Organisation <span class="text-danger">*</span></label>
                                    <select name="organisation" id="organisation" class="form-select form-control"
                                        required>
                                        <option value="">--Select Organisation--</option>
                                        @foreach($organization as $key => $organization_data)
                                        <option value="{{$organization_data->id}}" @if ($organization_data->id ==
                                            old('organization',$project->organisation_id??NULL)) selected @endif>
                                            {{ $organization_data->name }}</option>
                                        @endforeach
                                    </select>
                                    <span id="organisation_error" class="text-danger"></span>
                                    @error('organisation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Project Name <span
                                            class="text-danger">*</span></label>
                                    <select name="project_name" id="project_name" class="form-select form-control">
                                        <option value="">Select a Project</option>
                                        {{-- @if($projects)
                                        @foreach ($projects as $project_val)
                                        <option value="{{ $project_val->id }}" {{ (old("project_name", $project_val->id
                                            ?? '') == ($project->id??NULL)) ? 'selected' : '' }}>
                                            {{ $project_val->project_name }}
                                        </option>
                                        @endforeach
                                        @endif --}}
                                    </select>
                                    <span id="project_name_error" class="text-danger"></span>
                                    @error('project_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">

                                    <label class="form-label text-wrap"> Project Numbers </label>
                                    <input id="project_no" readonly type="text" class="form-control form-control-sm"
                                        placeholder="Enter Project Number" value="{{$project->project_number??NULL }}">

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Empanelment Reference
                                        </label>
                                        <input readonly id="empanelment_reference" type="text"
                                            class="form-control form-control-sm" placeholder="Empanelment Reference"
                                            value="{{$project->empanelment_reference??NULL }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end py-3">
                            <button type="button" class="btn btn-sm btn-primary mx-3 next-btn">Save & Next <i
                                    class="fa-solid fa-share"></i></button>
                        </div>
                    </div>

                    <div class="tab-content" id="content2">
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <label class="form-label">Work Order Number <span
                                                class="text-danger">*</span></label>
                                        <input name="wo_number" id="wo_number" type="text"
                                            class="form-control form-control-sm" placeholder="Enter Work Order No"
                                            value="{{ old('wo_number') }}" required />
                                        <span id="wo_number_error" class="text-danger"></span>
                                        @error('wo_number')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Previous Work Order Number
                                        </label>
                                        <input name="prev_wo_no" type="text" class="form-control form-control-sm"
                                             placeholder="Previous Work Order No In case of amendment"
                                            value="{{old('prev_wo_no')}}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Internal Reference
                                        </label>
                                        <input name="internal_reference" id="internal_reference" type="text"
                                            class="form-control form-control-sm" placeholder="Internal Reference"
                                            value="{{ old('internal_reference') }}">
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Concern Ministry
                                        </label>
                                        <input name="concern_ministry" id="concern_ministry" type="text"
                                            class="form-control form-control-sm" placeholder="Concern Ministry"
                                            value="{{ old('concern_ministry') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> No.of Resource </label>
                                        <input name="no_of_resource" id="no_of_resource" type="text"
                                            class="form-control form-control-sm" placeholder="No.of Resource"
                                            value="{{ old('no_of_resource') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Project Cordinator Name
                                        </label>
                                        <input name="coordinator_name" id="coordinator_name" type="text"
                                            class="form-control form-control-sm" placeholder="Project Cordinator Name"
                                            value="{{ old('coordinator_name') }}">
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Amount</label>
                                        <input name="amount" id="amount" type="number"
                                            class="form-control form-control-sm" placeholder="Amount"
                                            value="{{ old('amount') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Date of Issue </label>
                                        <input name="issue_date" id="issue_date" type="date"
                                            class="form-control form-control-sm" value="{{ old('issue_date') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Project Duration (In months)
                                        </label>
                                        <input name="project_duration_month" id="project_duration_month" type="text"
                                            class="form-control form-control-sm"
                                            placeholder="Project Duration (In months)"
                                            value="{{ old('project_duration_month') }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Project Duration (In Days) </label>
                                        <input name="project_duration_days" id="project_duration_days" type="text"
                                            class="form-control form-control-sm"
                                            placeholder="Project Duration (In Days)"
                                            value="{{ old('project_duration_days') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Start Date</label>
                                        <input name="start_date" id="start_date" type="date"
                                            class="form-control form-control-sm" value="{{ old('start_date') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> End Date </label>
                                        <input name="end_date" id="end_date" type="date"
                                            class="form-control form-control-sm" value="{{ old('end_date') }}">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Location </label>
                                        <input name="location" id="location" type="text"
                                            class="form-control form-control-sm" placeholder="Loaction"
                                            value="{{ old('location') }}">
                                    </div>

                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">State</label>
                                        <select class="form-select form-control" name="state" id="state">
                                            <option value=""> Select State</option>
                                            @foreach($states as $key => $value)
                                            <option value="{{$value->id}}">{{ $value->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> City</label>
                                        <select class="form-select" id="cities" name="city">
                                            <option value="">Select City</option>

                                        </select>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Postal Code</label>
                                        <input name="pincode" id="pincode" type="number"
                                            class="form-control form-control-sm" placeholder="PIN Number"
                                            value="{{ old('pincode') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label for="exampleTextarea" class="form-label">Address</label>
                                        <textarea name="remarks" class="form-control" id="remarks"
                                            placeholder="Enter Remarks if any?" value="{{ old('remarks') }}"></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        Attachment
                                        <input name="attachment" id="attachment" class="form-control form-control-sm"
                                            id="formFileSm" type="file">
                                        @error('attachment')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Amendment Number</label>
                                        <input name="amendment_number" id="amendment_number" type="text"
                                            class="form-control form-control-sm" placeholder="Invoice Client Name"
                                            value="{{ old('amendment_number') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Amendment date</label>
                                        <input name="amendment_date" id="amendment_date" type="date"
                                            class="form-control form-control-sm" placeholder="Amendment date"
                                            value="{{ old('amendment_date') }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Previous Order No</label>
                                        <input name="prev_order_no" id="prev_order_no" type="text"
                                            class="form-control form-control-sm" placeholder="PIN Number"
                                            value="{{ old('prev_order_no') }}">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-between py-3">
                            <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 prev-btn">Previous <i
                                    class="fa-solid fa-arrow-left"></i></button>
                            <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 next-btn">Save & Next <i
                                    class="fa-solid fa-share"></i></button>
                        </div>
                    </div>

                    <div class="tab-content" id="content3">
                        <div class="panel-body">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-primary mx-3" id="addmorebtn">Add
                                    More</button>
                            </div>
                            <div class="addMore">
                                <div class="addMoreElement">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Person Name</label>
                                        <input name="c_person_name[]" id="c_person_name" type="text"
                                            class="form-control form-control-sm" placeholder="Person Name" value="">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Designation</label>
                                        <input name="c_designation[]" id="c_designation" type="text"
                                            class="form-control form-control-sm" placeholder="Designation" value="">
                                    </div>

                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Contact</label>
                                        <input name="c_contact[]" id="c_contact" type="number"
                                            class="form-control form-control-sm" placeholder="Contact" value="">

                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Email</label>
                                        <input name="c_email[]" id="c_email" type="email"
                                            class="form-control form-control-sm" placeholder="Enter Email" value="">
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="exampleTextarea" class="form-label">Remarks</label>
                                        <textarea name="c_remarks[]" id="c_remarks" class="form-control"
                                            id="exampleTextarea" placeholder="Enter Remarks" value=""></textarea>

                                    </div>

                                </div>

                                {{-- <div class="col-12 d-flex justify-content-end ">
                                    <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 delete-btn">Delete <i
                                            class="fa-solid fa-trash"></i></button>
                                </div> --}}
                            </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-between py-3">
                            <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 prev-btn">Previous <i
                                    class="fa-solid fa-arrow-left"></i></button>
                            <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 next-btn">Save & Next <i
                                    class="fa-solid fa-share"></i></button>
                        </div>
                    </div>

                    <div class="tab-content" id="content4">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">Invoice Client Name</label>
                                    <input name="invoice_client_name" id="invoice_client_name" type="text"
                                        class="form-control form-control-sm" placeholder="Invoice Client Name"
                                        value="{{ old('invoice_client_name') }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Invoice State</label>
                                    <select class="form-select form-control" name="invoice_state" id="state">
                                        <option value=""> Select State</option>
                                        @foreach($states as $key => $value)
                                        <option value="{{$value->id}}">{{ $value->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">Invoice City</label>

                                    <select class="form-select" id="cities" name="invoice_city">
                                        <option value="">Select City</option>

                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">Invoice Postal Code</label>
                                    <input name="invoice_pin" id="invoice_pin" type="number"
                                        class="form-control form-control-sm" placeholder="PIN Number"
                                        value="{{ old('invoice_pin') }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label for="exampleTextarea" class="form-label">Address</label>
                                    <textarea name="invoice_address" id="invoice_address" class="form-control"
                                        id="exampleTextarea" placeholder="Enter Address"
                                        value="{{ old('invoice_address') }}"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 d-flex justify-content-between py-3 px-3">
                            <button type="button" class="btn btn-sm btn-primary  prev-btn">Previous <i
                                    class="fa-solid fa-arrow-left"></i></button>
                            <button type="submit" class="btn btn-sm btn-primary">Register Work Order <i
                                    class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/vendor/js/addmore.js')}}"></script>
<script src="{{asset('assets/js/hr/workOrder/work-order.js')}}"></script>
<script src="{{ asset('assets/js/city.js') }}"></script>
<script src="{{asset('assets/js/hr/workOrder/add-workOrder-tabs.js')}}"></script>
@endsection