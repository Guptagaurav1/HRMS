@extends('layouts.master', ['title' => 'Update Client'])


@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Update Client List</h3>
                    <div>
                        <ul class="breadcrumb">
                        
                            <li>
                                <a href="{{get_dashboard()}}">Dashboard</a>
                            </li>
                            <li><a href="{{route('sales-clients.list')}}">Client List</a></li>
                            <li>Update Client</li>
                        </ul>
                    </div>
                </div>

                <div class="text-end mt-3 px-3">
                    <button class="btn btn-sm btn-primary"><a href="{{ route('sales-clients.list') }}"
                            class="text-white">Client List</a></button>
                </div>

                <!-- Client Name section -->
                <form class="form add-client" method="POST" action="{{route('sales-clients.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="id" value="{{$client->id}}">
                    </div>
                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3  text-dark fw-bold py-2">
                            Client Name
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm search" name="client_name"
                                        placeholder="Enter Client Name" value="{{ $client->client_name }}" required>
                                    <span class="suggestions" id="suggestion-design" class="mt-1"></span>
                                    @error('client_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Department Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm department-search"
                                        name="department_name" placeholder="Enter Department Name"
                                        value="{{ $client->department_name }}" required>
                                    <span class="department-suggestions" id="suggestion-design" class="mt-1"></span>

                                    @error('department_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Concern Ministry <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="consern_ministry"
                                        value="{{ $client->consern_ministry }}" placeholder="Enter Concern Minister"
                                        required>
                                    @error('consern_ministry')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- Contact Person Details -->

                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                            Contact Person Details
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Name </label>
                                    <input type="text" class="form-control form-control-sm" name="contact_name"
                                        placeholder="Enter Name" value="{{ $client->contact_name }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Designation </label>
                                    <input type="text" class="form-control form-control-sm" name="contact_designation"
                                        placeholder="Enter Designation" value="{{ $client->contact_designation }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Email </label>
                                    <input type="email" class="form-control form-control-sm" name="contact_email"
                                        placeholder="Enter email" value="{{ $client->contact_email }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control form-control-sm" name="contact_phone"
                                        placeholder="Enter Mobile No" maxlength="10"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                        value="{{ $client->contact_phone }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Landline/Phone</label>
                                    <input type="text" class="form-control form-control-sm" name="contact_landline"
                                        placeholder="Enter Landline/Phone"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10"
                                        value="{{ $client->contact_landline }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Fax</label>
                                    <input type="text" class="form-control form-control-sm" name="contact_fax"
                                        placeholder="Enter Fax" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                        maxlength="10" value="{{ $client->contact_fax }}">
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Decision Maker details -->

                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                            Decision Maker Details
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control form-control-sm" name="d_maker_name"
                                        placeholder="Enter Decision Maker Name" value="{{ $client->d_maker_name }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Email </label>
                                    <input type="email" class="form-control form-control-sm" name="d_maker_email"
                                        placeholder="Enter Decision Maker Name" value="{{ $client->d_maker_email }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Mobile </label>
                                    <input type="text" class="form-control form-control-sm" name="d_maker_phone"
                                        placeholder="Enter Decision Maker Mobile" maxlength="10"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                        value="{{ $client->d_maker_phone }}">
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- Company Information -->
                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                            Company Information Details
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control form-control-sm" name="company_name"
                                        placeholder="Enter Primary Name" value="{{ $client->company_name }}">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Company Email </label>
                                    <input type="email" class="form-control form-control-sm" name="p_email"
                                        placeholder="Enter Primary Email" value="{{ $client->p_email }}">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Company Contact No </label>
                                    <input type="text" class="form-control form-control-sm" name="p_contact"
                                        placeholder="Enter Primary Mobile"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10"
                                        value="{{ $client->p_contact }}">
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">State</label>
                                    <select class="form-select js-example-basic-multiple" name="company_state">
                                        <option value=""> Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ $client->company_state == $state->id ? 'selected' : '' }}>
                                                {{ $state->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">City</label>
                                    <select class="form-select js-example-basic-multiple" name="company_city">
                                        <option value=""> Select City</option>
                                        @if ($client->company_state)
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ $client->company_city == $city->id ? 'selected' : '' }}>
                                                    {{ $city->city_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Postal Code </label>
                                    <input type="text" class="form-control form-control-sm" name="company_pincode"
                                        placeholder="Enter Pin Code"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="6"
                                        value="{{ $client->company_pincode }}">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Company Type</label>
                                    <select class="form-select js-example-basic-multiple" name="company_type">
                                        <option value="">Not Specify</option>
                                        @foreach ($company_type as $type)
                                            <option value="{{ $type->type_name }}"
                                                {{ $client->company_type == $type->type_name ? 'selected' : '' }}>
                                                {{ $type->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Company Industry</label>
                                    <select class="form-select js-example-basic-multiple" name="company_industry">
                                        <option value="">Not Specify</option>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"
                                                {{ $client->company_industry == $industry->id ? 'selected' : '' }}>
                                                {{ $industry->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Reference</label>
                                    <select class="form-select js-example-basic-multiple" name="reference">
                                        <option value="">Not Specify</option>
                                        @foreach ($references as $references)
                                            <option value="{{ $references->id }}"
                                                {{ $client->reference == $references->id ? 'selected' : '' }}>
                                                {{ $references->ref_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label for="exampleTextarea" class="form-label">Address</label>
                                    <textarea class="form-control" name="company_address" placeholder="Enter Address">{{ $client->company_address }}</textarea>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label for="exampleTextarea" class="form-label">Remarks</label>
                                    <textarea class="form-control" name="remarks" placeholder="Enter Remarks">{{ $client->remarks }}</textarea>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label">GSTIN No</label>
                                    <input type="text" class="form-control form-control-sm" name="gst_no"
                                        placeholder="Enter GST No" maxlength="15" value="{{ $client->gst_no }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View Attachment -->

                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                            Attachment
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Attachment Type</label>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Action</label>
                                </div>
                            </div>
                            @foreach ($client->attachments as $attachment)
                                <div class="row g-3 attachments">
                                    <input type="hidden" name="remove_attachment[]" value="">
                                    <div class="col-lg-4 col-md-4">
                                        <select class="form-select">
                                            <option>{{ $attachment->file_type }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <a href="{{ asset('upload/crm/client') . '/' . $attachment->file_name }}"
                                            target="_blank" class="btn btn-sm btn-primary">View</a>
                                        <button type="button" class="btn btn-sm btn-danger remove-button"
                                            data-id="{{ $attachment->id }}">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Add New Attachment -->

                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                            Add New Attachment
                        </div>
                        <div class="mt-3 px-3 append_add-more-items">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Attachment Type</label>
                                    <select class="form-select" name="file_type[]">
                                        <option value="">Not Specify</option>
                                        @foreach ($attachment_type as $type)
                                            <option value="{{ $type->attach_type }}">{{ $type->attach_type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label for="formFile" class="form-label">Attachment File <span
                                            class="fw-light small">(max size : 1mb)</span></label>
                                    <input class="form-control" type="file" name="file_name[]" accept=".pdf">
                                    <span class="fileerror text-danger"></span>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Action</label>

                                    <button type="button" class="btn btn-sm btn-primary add-more-client">Add
                                        More</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Submit button -->


                    <div class="d-flex align-items-cenetr justify-content-end gap-3 px-3 py-2">
                        <div>
                            <a href="{{ route('sales-clients.list') }}"> <button type="button"
                                    class="btn btn-sm btn-primary">Cancel</button></a>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/create-new-client.js') }}"></script>
    <script src="{{ asset('assets/js/commonValidation.js') }}"></script>
@endsection
