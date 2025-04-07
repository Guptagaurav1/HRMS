@extends('layouts.master')

@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header heading-stripe">
                <h3 class="mt-2 text-center">Update Work Order Form</h3>

                <div>
                    <ul class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Profile Details</a></li>
                        <li>Department List</li>
                    </ul>
                </div>
            </div>
            @if(auth()->user()->hasPermission('work-order-list'))
            <div class="dashboard-breadcrumb mb-25 mt-3">
                <div>
                    <span><strong>Work Order :</strong> {{ $workOrder->wo_number }} <strong> Added On : </strong> {{
                        $workOrder->created_at }}</span>
                </div>
                <div>
                    <a href="{{route('work-order-list')}}"><button class="btn btn-sm btn-primary"> Work Order
                            List <i class="fa-solid fa-list"></i></button></a>
                </div>
            </div>
            @endif

            <form action="{{ route('update-work-order', $workOrder->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="panel mb-3 mt-2">
                    <div class="employee-tab">
                        <ul class="d-flex align-items-center justify-content-between  flex-wrap">
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
                                <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                        <label class="form-label">Organisation <span
                                                class="text-danger">*</span></label>
                                        <select name="organisation" id="organisation" class="form-select"
                                            value="{{$workOrder->project->organizations->id}}">
                                            <option selected>--Select Organisation--</option>
                                            @foreach($organization as $key => $organization_data)
                                            <option value="{{$organization_data->id}}" @if ($organization_data->
                                                id ==
                                                old('organization',$workOrder->project->organizations->id))
                                                selected @endif>
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
                                        <select name="project_name" id="project_name" class="form-select" value="">
                                            <option value="">Select a Project</option>
                                            @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" {{ (old("project_name", $project->id ??
                                                '') == $workOrder->project->id) ? 'selected' : '' }}>
                                                {{ $project->project_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span id="project_name_error" class="text-danger"></span>
                                        @error('project_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Project Number </label>
                                        <input name="project_no" id="project_no" readonly type="text"
                                            class="form-control form-control-sm" placeholder="Enter Project Number"
                                            value="{{old('project_no',$workOrder->project->project_number) }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Empanelment Reference
                                        </label>
                                        <input name="empanelment_reference" readonly id="empanelment_reference"
                                            type="text" class="form-control form-control-sm"
                                            placeholder="Empanelment Reference"
                                            value="{{ old('project_no',$workOrder->project->empanelment_reference) }}">
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
                                            class="form-control form-control-sm"
                                            placeholder="Enter Work Order No"
                                            value="{{ old('wo_number',$workOrder->wo_number) }}">
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
                                            value="{{ old('prev_wo_no',$workOrder->prev_wo_no) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Internal Reference
                                        </label>
                                        <input name="internal_reference" id="internal_reference" type="text"
                                            class="form-control form-control-sm" placeholder="Internal Reference"
                                            value="{{ old('internal_reference',$workOrder->wo_internal_ref_no) }}">
                                    </div>



                                </div>
                                <div class="row">

                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Concern Ministry
                                        </label>
                                        <input name="concern_ministry" id="concern_ministry" type="text"
                                            class="form-control form-control-sm" placeholder="Concern Ministry"
                                            value="{{ old('concern_ministry',$workOrder->wo_concern_ministry) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> No.of Resource </label>
                                        <input name="no_of_resource" id="no_of_resource" type="text"
                                            class="form-control form-control-sm" placeholder="No.of Resource"
                                            value="{{ old('no_of_resource',$workOrder->wo_no_of_resources) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Project Cordinator Name
                                        </label>
                                        <input name="coordinator_name" id="coordinator_name" type="text"
                                            class="form-control form-control-sm" placeholder="Project Cordinator Name"
                                            value="{{ old('coordinator_name',$workOrder->wo_project_coordinator) }}">
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Amount</label>
                                        <input name="amount" id="amount" type="number"
                                            class="form-control form-control-sm" placeholder="Amount"
                                            value="{{ old('amount',$workOrder->wo_amount) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Date of Issue </label>
                                        <input name="issue_date" id="issue_date" type="date"
                                            class="form-control form-control-sm"
                                            value="{{ old('issue_date',$workOrder->wo_date_of_issue) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Project Duration (In months)
                                        </label>
                                        <input name="project_duration_month" id="project_duration_month" type="text"
                                            class="form-control form-control-sm"
                                            placeholder="Project Duration (In months)"
                                            value="{{ old('project_duration_month',$workOrder->wo_project_duration) }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Project Duration (In Days)
                                        </label>
                                        <input name="project_duration_days" id="project_duration_days" type="text"
                                            class="form-control form-control-sm"
                                            placeholder="Project Duration (In Days)"
                                            value="{{ old('project_duration_days',$workOrder->wo_project_duration_day) }}">
                                    </div>

                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Start Date
                                        </label>
                                        <input name="start_date" id="start_date" type="date"
                                            class="form-control form-control-sm"
                                            value="{{ old('start_date',$workOrder->wo_start_date) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            End Date
                                        </label>
                                        <input name="end_date" id="end_date" type="date"
                                            class="form-control form-control-sm"
                                            value="{{ old('end_date',$workOrder->wo_end_date) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            Location
                                        </label>
                                        <input name="location" id="location" type="text"
                                            class="form-control form-control-sm" placeholder="Loaction"
                                            value="{{ old('location',$workOrder->wo_location) }}">
                                    </div>
                                    <!-- <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">
                                            City
                                        </label>
                                        <input name="city" id="city" type="text" class="form-control form-control-sm" placeholder="City" value="{{ old('city',$workOrder->wo_city) }}">
                                    </div> -->
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">State</label>
                                        <select class="form-select" name="state" id="state">
                                            <option value=""> Select State</option>

                                            @foreach($states as $key => $value)
                                            <option value="{{$value->id}}" {{ (old("state", $value->id ?? '') ==
                                                ($workOrder->wo_state??NULL)) ? 'selected' : '' }}>{{ $value->state }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> City</label>
                                        <select class="form-select" id="cities" name="city">
                                            <option value="">Select City</option>
                                            @if (!empty($cities) && is_array($cities) )
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city',$workOrder->wo_city)==
                                                $city->id ? 'selected' : '' }}>
                                                {{ $city->city_name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Postal Code</label>
                                        <input name="pincode" id="pincode" type="number"
                                            class="form-control form-control-sm" placeholder="PIN Number"
                                            value="{{ old('pincode',$workOrder->wo_pin) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label for="exampleTextarea" class="form-label">Attachment (Doc)</label>

                                        <input name="attachment" id="attachment" class="form-control form-control-sm"
                                            id="formFileSm" type="file">
                                    </div>
                                    @if($workOrder->wo_attached_file)
                                    <div class="col-sm-12 col-md-4 text-wrap">

                                        <label for="Download_attachment" calss="form-label text-wrap">Download
                                            Attachment <i class="fa-solid fa-download"></i></label>
                                        <a href="{{ asset('storage/uploadWorkOrder/' . $workOrder->wo_attached_file) }}"
                                            target="_balnk" class="btn btn-primary btn-sm">{{
                                            $workOrder->wo_attached_file}}</a>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Amendment Number</label>
                                        <input name="amendment_number" id="amendment_number" type="text"
                                            class="form-control form-control-sm" placeholder="Invoice Client Name"
                                            value="{{ old('amendment_number',$workOrder->amendment_number) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Amendment date</label>
                                        <input name="amendment_date" id="amendment_date" type="date"
                                            class="form-control form-control-sm" placeholder="State"
                                            value="{{ old('amendment_date',$workOrder->amendment_date) }}">
                                    </div>
                                    <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap">Previous Order No</label>
                                        <input name="prev_order_no" id="prev_order_no" type="text"
                                            class="form-control form-control-sm" placeholder="PIN Number"
                                            value="{{ old('prev_order_no',$workOrder->previous_order_no) }}">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 text-wrap">
                                        <label for="exampleTextarea" class="form-label">Address</label>
                                        <textarea name="remarks" class="form-control" id="remarks"
                                            placeholder="Enter Address"
                                            value="">{{ old('remarks',$workOrder->wo_remarks) }}</textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between py-3">
                            <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 prev-btn">Previous <i
                                    class="fa-solid fa-arrow-left"></i></button>
                            <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 next-btn">Save & Next <i class="fa-solid fa-share"></i></button>
                        </div>
                    </div>
                    <div class="tab-content" id="content3">
                        <div class="panel-body">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-primary mx-3" id="addmorebtn">Add
                                    More</button>
                            </div>
                            @if($workOrder->contacts->isNotEmpty())
                            @foreach ($workOrder->contacts as $contact)
                            <div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Person Name</label>
                                        <input name="c_person_name[{{ $contact->id }}]" id="c_person_name" type="text"
                                            class="form-control form-control-sm" placeholder="Person Name"
                                            value="{{$contact->wo_client_contact_person }}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Designation</label>
                                        <input name="c_designation[{{ $contact->id }}]" id="c_designation" type="text"
                                            class="form-control form-control-sm" placeholder="Designation"
                                            value="{{ $contact->wo_client_designation }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Contact</label>
                                        <input name="c_contact[{{$contact->id}}]" id="c_contact" type="number"
                                            class="form-control form-control-sm" placeholder="Contact"
                                            value="{{ $contact->wo_client_contact}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Email</label>
                                        <input name="c_email[{{$contact->id}}]" id="c_email" type="email"
                                            class="form-control form-control-sm" placeholder="Email"
                                            value="{{$contact->wo_client_email }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-12 text-wrap">
                                        <label for="exampleTextarea" class="form-label">Remarks</label>
                                        <textarea name="c_remarks[{{$contact->id}}]" id="c_remarks" class="form-control"
                                            id="exampleTextarea" placeholder="Enter Remarks"
                                            value="{{ $contact->wo_client_remarks }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 delete-btn">Delete <i
                                            class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                            @endforeach
                            @endif
                           
                            <div class="addMore">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Person Name</label>
                                        <input name="c_person_name[]" id="c_person_name" type="text" class="form-control form-control-sm" placeholder="Person Name" value="">
                                    </div>
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Designation</label>
                                        <input name="c_designation[]" id="c_designation" type="text" class="form-control form-control-sm" placeholder="Designation" value="">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Contact</label>
                                        <input name="c_contact[]" id="c_contact" type="number" class="form-control form-control-sm" placeholder="Contact" value="">
                                    </div>
                                    <div class="col-sm-12 col-md-6 text-wrap">
                                        <label class="form-label text-wrap">Email</label>
                                        <input name="c_email[]" id="c_email" type="email" class="form-control form-control-sm" placeholder="Email" value="">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-12 text-wrap">
                                        <label for="exampleTextarea" class="form-label">Remarks</label>
                                        <textarea name="c_remarks[]" id="c_remarks" class="form-control" id="exampleTextarea"
                                placeholder="Enter Remarks" value=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 delete-btn">Delete <i
                                            class="fa-solid fa-trash"></i></button>
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
                                        value="{{ old('invoice_client_name',$workOrder->wo_invoice_name) }}">
                                </div>
                                <!-- <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">State</label>
                                    <input name="invoice_state" id="invoice_state" type="text" class="form-control form-control-sm" placeholder="State" value="{{ old('invoice_state',$workOrder->wo_state) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">PIN Number</label>
                                    <input name="invoice_pin" id="invoice_pin" type="number" class="form-control form-control-sm" placeholder="PIN Number" value="{{ old('invoice_pin',$workOrder->wo_pin) }}">
                                </div> -->
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Invoice State</label>
                                    <select class="form-select form-control" name="invoice_state">
                                        <option value=""> Select State</option>
                                        @if(!empty($states))
                                        @foreach($states as $key => $value)
                                        <option value="{{$value->id}}">{{ $value->state }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">Invoice City</label>

                                    <select class="form-select" id="cities" name="invoice_city">
                                        <option value="">Select City</option>

                                    </select>
                                </div>
                            </div>
                            <div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">Invoice Postal Code</label>
                                    <input name="invoice_pin" id="invoice_pin" type="number"
                                        class="form-control form-control-sm" placeholder="PIN Number"
                                        value="{{ old('invoice_pin',$workOrder->wo_invoice_pincode) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label for="exampleTextarea" class="form-label">Address</label>
                                    <textarea name="invoice_address" id="invoice_address" class="form-control"
                                        id="exampleTextarea" placeholder="Enter Address"
                                        value="{{ old('invoice_address',$workOrder->wo_invoice_address) }}"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 d-flex justify-content-between py-3 px-3">
                            <button type="button" class="btn btn-sm btn-primary  prev-btn">Previous <i class="fa-solid fa-arrow-left"></i></button>
                            <button type="submit" class="btn btn-sm btn-primary"> Update Work Order <i
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
<!-- <script src="{{asset('assets/js/hr/workOrder/edit-workOrder-tabs.js')}}"></script> -->
<script src="{{ asset('assets/js/city.js') }}"></script>
<script src="{{asset('assets/js/hr/workOrder/add-workOrder-tabs.js')}}"></script>

@endsection