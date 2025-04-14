@extends('layouts.master')


@section('contents')

<div class="fluid-container">
    <div class="panel">
        <div class="panel-header">
            <h3>View Work Order</h3>
            <div>
                <ul class="breadcrumb">
                    <li> @if (auth()->user()->role->role_name="hr")
                        <a href="{{route('hr_dashboard')}}">Dashboard</a>
                        @endif
                    </li>
                    <li><a href="{{route('work-order-list')}}">Work Order List</a></li>
                    <li>View Work Order</li>
                </ul>
            </div>

        </div>
    </div>
   
    <div class="row" id="tab-1">
        <div class="col-12">
            <div class="panel p-2">
                <div class="dashboard-breadcrumb">
                <h6><strong>Work Order :</strong> {{ $workOrder->wo_number }} <strong></h6>

                <p> Added On : <strong> {{ $workOrder->created_at }}</strong></p>
                </div>
              

                <div class="panel-header py-3 px-2 d-flex align-items-center justify-content-between mt-2">
                    <h5 class="mb-0 text-white" >Work Order Details</h5>
                    
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-4">
                            <label class="form-label">Organisation <span class="text-danger">*</span></label>
                            
                            <input type="text" class="form-control form-control-sm" readonly placeholder="Enter Work Order No" value="{{ $workOrder->project->organizations->name }}">
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" readonly placeholder="Enter Work Order No" value="{{ $workOrder->wo_number }}">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap"> Previous Work Order Number </label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Previous Work Order No In case of amendment" readonly value="{{$workOrder->prev_wo_no }}">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Internal Reference
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Internal Reference" readonly value="{{$workOrder->wo_internal_ref_no}}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Date of Issue
                                </label>
                                <input type="date" class="form-control form-control-sm" readonly value="{{$workOrder->wo_date_of_issue}}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Number
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->project->project_number}}"
                                    placeholder="Enter Project Number">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Name
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->project->project_name}}" placeholder="Project Name">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Concern Ministry
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->wo_concern_ministry}}" placeholder="Concern Ministry">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Empanelment Reference
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->empanelment_reference}}" placeholder="Empanelment Reference">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    No.of Resource
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->wo_no_of_resources}}" placeholder="No.of Resource">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Amount
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->wo_amount}}" placeholder="Amount">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Duration (In months)
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Project Duration (In months)" readonly value="{{$workOrder->wo_project_duration}}">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Duration (In Days)
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Project Duration (In Days)" readonly value="{{$workOrder->wo_project_duration_day}}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Start Date
                                </label>
                                <input type="date" class="form-control form-control-sm" readonly value="{{$workOrder->wo_start_date}}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    End Date
                                </label>
                                <input type="date" class="form-control form-control-sm" readonly value="{{$workOrder->wo_end_date}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Location
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->wo_location}}" placeholder="Loaction">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    City
                                </label>
                                <input type="text" class="form-control form-control-sm" readonly value="{{$workOrder->wo_city}}" placeholder="City">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Cordinator Name
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Project Cordinator Name" readonly value="{{$workOrder->wo_project_coordinator}}">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel-header">
                    <h5 class="text-white">Contacts Details</h5>
                </div>
                <div class="panel-body">
                    
                    @foreach ($workOrder->contacts as $contact)
                        <div class="addMore">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Person Name</label>
                                    <input name="c_person_name[{{ $contact->id }}]" id="c_person_name" type="text" class="form-control form-control-sm" readonly placeholder="Person Name" value="{{ old('c_person_name',$contact->wo_client_contact_person) }}">
                                </div>
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Designation</label>
                                    <input name="c_designation[{{ $contact->id }}]" id="c_designation" type="text" class="form-control form-control-sm" placeholder="Designation" readonly value="{{ old('c_designation',$contact->wo_client_designation) }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Contact</label>
                                    <input name="c_contact[{{$contact->id}}]" id="c_contact" type="number" class="form-control form-control-sm" placeholder="Contact" readonly value="{{ old('c_contact',$contact->wo_client_contact) }}">
                                </div>
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Email</label>
                                    <input name="c_email[{{$contact->id}}]" id="c_email" type="email" class="form-control form-control-sm" placeholder="Email" readonly value="{{ old('c_email',$contact->wo_client_email) }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 text-wrap">
                                    <label for="exampleTextarea" class="form-label">Remarks</label>
                                    <textarea name="c_remarks[{{$contact->id}}]" id="c_remarks" class="form-control" id="exampleTextarea"
                                        placeholder="Enter Remarks" readonly value="{{ old('c_remarks',$contact->wo_client_remarks) }}"></textarea>
                                </div>
                            </div>
                           
                        </div>
                        @endforeach
                </div>
                <div class="panel-header">
                    <h5 class="text-white">Invoice Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">Invoice Client Name</label>
                            <input type="text" class="form-control form-control-sm" readonly placeholder="Invoice Client Name" value="{{ $workOrder->wo_invoice_name }}" >
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">State</label>
                            <input type="text" class="form-control form-control-sm" readonly placeholder="State" value="{{ $workOrder->wo_state }}">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">PIN Number</label>
                            <input type="number" class="form-control form-control-sm" readonly placeholder="PIN Number" value="{{ $workOrder->wo_pin }}">
                        </div>
                        <div class="col-sm-12 col-md-12 text-wrap">
                            <label for="exampleTextarea" class="form-label">Address</label>
                            <textarea class="form-control" id="exampleTextarea" readonly placeholder="Enter Address">{{ $workOrder->wo_invoice_address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-header">
                    <h5 class="text-white">Amendment Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">Amendment Number</label>
                            <input type="text" class="form-control form-control-sm" readonly placeholder="Invoice Client Name" value="{{ $workOrder->amendment_number }}">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">Amendment date</label>
                            <input type="date" class="form-control form-control-sm" readonly placeholder="State" value="{{ $workOrder->amendment_date }}">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">Previous Order No</label>
                            <input type="text" class="form-control form-control-sm" readonly placeholder="PIN Number" value="{{ $workOrder->previous_order_no }}">
                        </div>

                    </div>
                </div>
                <div class="panel-header">
                    <h5 class="text-white">Remarks</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-wrap">
                            <label for="exampleTextarea" class="form-label">Address</label>
                            <textarea class="form-control" readonly id="exampleTextarea" placeholder="Enter Address">{{ $workOrder->wo_remarks }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-header">
                    <h5 class="text-white">Attachment</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                       
                        <div class="col-sm-12 col-md-3 text-wrap ml-5">
                            <label for="formFileSm" class="form-label">Attachment Work Order</label>
                            <a href="{{ asset('storage/uploadWorkOrder/' . $workOrder->wo_attached_file) }}"> <button class="btn btn-sm btn-primary"> Download Extension  <i class="fa-solid fa-download"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
       
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/addmore.js')}}></script>

@endsection