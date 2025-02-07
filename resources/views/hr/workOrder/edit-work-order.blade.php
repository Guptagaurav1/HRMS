@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />

@endsection

@section('contents')

<div class="fluid-container">
    <div class="row">
        <h2>Update Work Order Form</h2>

    </div>
    <div class="col-12 d-flex justify-content-end">
        <a href="{{route('work-order-list')}}"><button class="btn btn-sm btn-primary mx-3 mt-3"> Work Order List</button></a>  
    </div>
    <div class="row" id="tab-1">
        <form action="{{ route('update-work-order', $workOrder->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        
            <div class="col-12">
                <div class="panel p-2">
                    <h6>Work Order : BECIL/ND/DRDO/MAN/2425/1323_Extension Added On : 2024-11-14 11:37:39</h6>

                    <div class="panel-header">
                        <h5>Project Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <label class="form-label">Organisation <span class="text-danger">*</span></label>
                                    <select name="organisation" id="organisation"  class="form-select">
                                        <option selected>--Select Organisation--</option>
                                        @foreach($organization as $key => $organization_data)
                                            <option value="{{$organization_data->id}}" @if ($organization_data->id == old('organization',$workOrder->project->organizations->id)) selected @endif>
                                            {{ $organization_data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('organisation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Project Name </label>
                                    <select name="project_name" id="project_name" class="form-select" value="">
                                    <option value="">Select a Project</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Project Number </label>
                                    <input name="project_no" id="project_no" readonly type="text" class="form-control form-control-sm" placeholder="Enter Project Number" value="{{$workOrder->project->project_number }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Empanelment Reference
                                    </label>
                                    <input name="empanelment_reference" readonly id="empanelment_reference" type="text" class="form-control form-control-sm"
                                        placeholder="Empanelment Reference" value="{{ $workOrder->project->empanelment_reference }}">
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="panel-header">
                        <h5>Work Order Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            
                           
                           
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                                    <input name="work_order" type="text" class="form-control form-control-sm" placeholder="Enter Work Order No" value="{{ old('work_order',$workOrder->wo_number) }}">
                                    @error('work_order')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Previous Work Order Number
                                    </label>
                                    <input name="prev_wo_no" type="text" class="form-control form-control-sm"
                                        placeholder="Previous Work Order No In case of amendment" value="{{ old('prev_wo_no',$workOrder->prev_wo_no) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Internal Reference
                                    </label>
                                    <input name="internal_reference"  id="internal_reference" type="text" class="form-control form-control-sm" placeholder="Internal Reference" value="{{ old('internal_reference',$workOrder->wo_empanelment_reference) }}">
                                </div>
                                
                               

                            </div>
                            <div class="row">
                                
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Concern Ministry
                                    </label>
                                    <input name="concern_ministry" id="concern_ministry" type="text" class="form-control form-control-sm" placeholder="Concern Ministry" value="{{ old('concern_ministry',$workOrder->wo_concern_ministry) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> No.of Resource </label>
                                    <input name="no_of_resource" id="no_of_resource" type="text" class="form-control form-control-sm" placeholder="No.of Resource" value="{{ old('no_of_resource',$workOrder->wo_no_of_resources) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Project Cordinator Name
                                    </label>
                                    <input name="coordinator_name" id="coordinator_name" type="text" class="form-control form-control-sm" placeholder="Project Cordinator Name" value="{{ old('coordinator_name',$workOrder->wo_project_coordinator) }}">
                                </div>

                            </div>
                            <div class="row">
                               
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Amount</label>
                                    <input name="amount" id="amount" type="number" class="form-control form-control-sm" placeholder="Amount" value="{{ old('amount',$workOrder->wo_amount) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Date of Issue </label>
                                    <input name="issue_date" id="issue_date" type="date"class="form-control form-control-sm" value="{{ old('issue_date',$workOrder->wo_date_of_issue) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Project Duration (In months)
                                    </label>
                                    <input name="project_duration_month" id="project_duration_month" type="text" class="form-control form-control-sm" placeholder="Project Duration (In months)" value="{{ old('project_duration_month',$workOrder->wo_project_duration) }}">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Project Duration (In Days)
                                    </label>
                                    <input name="project_duration_days" id="project_duration_days" type="text" class="form-control form-control-sm"
                                        placeholder="Project Duration (In Days)" value="{{ old('project_duration_days',$workOrder->wo_project_duration_day) }}">
                                </div>
                                
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Start Date
                                    </label>
                                    <input name="start_date" id="start_date" type="date" class="form-control form-control-sm" value="{{ old('start_date',$workOrder->wo_start_date) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        End Date
                                    </label>
                                    <input name="end_date" id="end_date" type="date" class="form-control form-control-sm" value="{{ old('end_date',$workOrder->wo_end_date) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Location
                                    </label>
                                    <input name="location" id="location" type="text" class="form-control form-control-sm" placeholder="Loaction" value="{{ old('location',$workOrder->wo_location) }}">
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        City
                                    </label>
                                    <input name="city" id="city" type="text" class="form-control form-control-sm" placeholder="City" value="{{ old('city',$workOrder->wo_city) }}">
                                </div>
                               
                            </div>

                        </div>
                    </div>

                    <div class="panel-header">
                        <h5>Contacts Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-primary mx-3" id="addmorebtn">Add More</button>
                        </div>
                        @if($workOrder->contacts->isEmpty())
                        <div class="addMore">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Person Name</label>
                                    <input name="c_person_name[]" id="c_person_name" type="text" class="form-control form-control-sm" placeholder="Person Name" value="{{ old('c_person_name') }}">
                                </div>
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Designation</label>
                                    <input name="c_designation[]" id="c_designation" type="text" class="form-control form-control-sm" placeholder="Designation" value="{{ old('c_designation') }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Contact</label>
                                    <input name="c_contact[]" id="c_contact" type="number" class="form-control form-control-sm" placeholder="Contact" value="{{ old('c_contact') }}">
                                </div>
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Email</label>
                                    <input name="c_email[]" id="c_email" type="email" class="form-control form-control-sm" placeholder="Email" value="{{ old('c_email') }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 text-wrap">
                                    <label for="exampleTextarea" class="form-label">Remarks</label>
                                    <textarea name="c_remarks[]" id="c_remarks" class="form-control" id="exampleTextarea"
                                        placeholder="Enter Remarks" value="{{ old('c_remarks') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 delete-btn">Delete <i
                                        class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                        @endif
                        @foreach ($workOrder->contacts as $contact)
                        <div class="addMore">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Person Name</label>
                                    <input name="c_person_name[{{ $contact->id }}]" id="c_person_name" type="text" class="form-control form-control-sm" placeholder="Person Name" value="{{ old('c_person_name',$contact->wo_client_contact_person) }}">
                                </div>
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Designation</label>
                                    <input name="c_designation[{{ $contact->id }}]" id="c_designation" type="text" class="form-control form-control-sm" placeholder="Designation" value="{{ old('c_designation',$contact->wo_client_designation) }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Contact</label>
                                    <input name="c_contact[{{$contact->id}}]" id="c_contact" type="number" class="form-control form-control-sm" placeholder="Contact" value="{{ old('c_contact',$contact->wo_client_contact) }}">
                                </div>
                                <div class="col-sm-12 col-md-6 text-wrap">
                                    <label class="form-label text-wrap">Email</label>
                                    <input name="c_email[{{$contact->id}}]" id="c_email" type="email" class="form-control form-control-sm" placeholder="Email" value="{{ old('c_email',$contact->wo_client_email) }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 text-wrap">
                                    <label for="exampleTextarea" class="form-label">Remarks</label>
                                    <textarea name="c_remarks[{{$contact->id}}]" id="c_remarks" class="form-control" id="exampleTextarea"
                                        placeholder="Enter Remarks" value="{{ old('c_remarks',$contact->wo_client_remarks) }}"></textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-primary mx-3 mt-3 delete-btn">Delete <i
                                        class="fa-solid fa-trash"></i></button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="panel-header">
                        <h5>Invoice Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">Invoice Client Name</label>
                                <input name="invoice_client_name" id="invoice_client_name" type="text" class="form-control form-control-sm" placeholder="Invoice Client Name" value="{{ old('invoice_client_name',$workOrder->wo_invoice_name) }}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">State</label>
                                <input name="invoice_state" id="invoice_state" type="text" class="form-control form-control-sm" placeholder="State" value="{{ old('invoice_state',$workOrder->wo_state) }}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">PIN Number</label>
                                <input name="invoice_pin" id="invoice_pin" type="number" class="form-control form-control-sm" placeholder="PIN Number" value="{{ old('invoice_pin',$workOrder->wo_pin) }}">
                            </div>
                            <div class="col-sm-12 col-md-12 text-wrap">
                                <label for="exampleTextarea" class="form-label">Address</label>
                                <textarea name="invoice_address" id="invoice_address" class="form-control" id="exampleTextarea" placeholder="Enter Address" value="{{ old('invoice_address',$workOrder->wo_invoice_address) }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-header">
                        <h5>Amendment Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">Amendment Number</label>
                                <input name="amendment_number" id="amendment_number" type="text" class="form-control form-control-sm" placeholder="Invoice Client Name" value="{{ old('amendment_number',$workOrder->amendment_number) }}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">Amendment date</label>
                                <input name= "amendment_date" id="amendment_date"type="date" class="form-control form-control-sm" placeholder="State" value="{{ old('amendment_date',$workOrder->amendment_date) }}">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">Previous Order No</label>
                                <input name="prev_order_no" id="prev_order_no" type="text" class="form-control form-control-sm" placeholder="PIN Number" value="{{ old('prev_order_no',$workOrder->previous_order_no) }}">
                            </div>

                        </div>
                    </div>
                    <div class="panel-header">
                        <h5>Remarks</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 text-wrap">
                                <label for="exampleTextarea" class="form-label">Address</label>
                                <textarea name="remarks" class="form-control" id="remarks" placeholder="Enter Address" value="">{{ old('remarks',$workOrder->wo_remarks) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel-header">
                        <h5>Attachment</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 text-wrap">
                            Attachment
    
                                    artechment('attachment');
                            <input name="attachment" id="attachment" class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            @if($workOrder->wo_attached_file)
                            <div class="col-sm-12 col-md-6 text-wrap">
                            
                                <label for="Download_attachment" calss="form-label text-wrap">Download Attachment</label>
                                <a href="{{ asset('storage/uploadWorkOrder/' . $workOrder->wo_attached_file) }}" target="_balnk" class="btn btn-primary btn-sm">{{ $workOrder->wo_attached_file}}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-md-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-primary"> Update Work Order <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        <form>
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/vendor/js/addmore.js')}}></script>

<script>
    $(document).ready(function() {
        $('#organisation').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                $.ajax({
                    url: '{{ route("organisation-project", ":id") }}'.replace(':id', selectedValue),
                    type: 'GET',
                    success: function(response) {
                        let dropdown = $("#project_name");
                        dropdown.empty();
                        dropdown.append('<option value="">Select a Project</option>');
                        let projects = response.data;
                        // Loop through response and append to dropdown
                        $.each(projects, function(key, project) {
                            dropdown.append('<option value="' + project.id + '">' + project.project_name + '</option>');
                        });

                        let project_name = "{{ old('project_name', $workOrder->project->id) }}";
                        if (project_name) {
                            dropdown.val(project_name);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error:", error);
                    }
                });
            } 
        });
        var initialOrgId = "{{ old('organisation', $workOrder->project->organizations->id) }}";
        if (initialOrgId) {
            $('#organisation').val(initialOrgId).trigger('change');
        }
        $('#project_name').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue) {
                $.ajax({
                    // url: 'project/project-details/' + selectedValue, // Route URL with parameter
                    url: '{{ route("project-details", ":id") }}'.replace(':id', selectedValue),
                    type: 'GET',
                    success: function(response) {
                    
                        let project_number =response.data.project_number;
                        // alert(project_name);
                        let empanelment_reference =response.data.empanelment_reference;
                        $('#project_no').val(project_number);
                        $('#empanelment_reference').val(empanelment_reference);

                        let project_no = "{{ old('project_no', $workOrder->project_number) }}";
                        if (project_no) {
                            $('#project_no').val(project_no);
                        }
                        let empanelment_ref = "{{ old('empanelment_reference', $workOrder->empanelment_reference) }}";
                        if (empanelment_ref) {
                            $('#empanelment_reference').val(empanelment_ref);
                        }
                        
                    },
                    error: function(xhr, status, error) {
                        console.log("Error:", error);
                    }
                });
            } 
        });
    });
   
</script>

@endsection