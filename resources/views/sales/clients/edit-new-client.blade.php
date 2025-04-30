@extends('layouts.master')


@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Update Client List</h3>
                </div>

                <div class="text-end mt-3 px-3">
                    <button class="btn btn-sm btn-primary"><a href="{{ route('sales-clients.list') }}"
                            class="text-white">Client List</a></button>
                </div>

                <!-- Client Name section -->
                <form>
                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3  text-dark fw-bold py-2">
                            Client Name
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm for_char" name="clientName"
                                        placeholder="Enter Client Name" required>
                                    <span class="clientName"></span>
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Department Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="department-name"
                                        placeholder="Enter Department Name" required>
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Concern Ministry <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="concern-minister"
                                        placeholder="Enter Concern Minister" required>
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
                                    <input type="text" class="form-control form-control-sm" name="name"
                                        placeholder="Enter Name">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Designation </label>
                                    <input type="text" class="form-control form-control-sm" name="Designation"
                                        placeholder="Enter Designation">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Email </label>
                                    <input type="text" class="form-control form-control-sm" name="email"
                                        placeholder="Enter email">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Email </label>
                                    <input type="text" class="form-control form-control-sm" name="phone"
                                        placeholder="Enter Mobile No">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Landline/Phone</label>
                                    <input type="text" class="form-control form-control-sm" name="Landline"
                                        placeholder="Enter Landline/Phone">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Fax</label>
                                    <input type="text" class="form-control form-control-sm" name="fax"
                                        placeholder="Enter Fax">
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
                                    <input type="text" class="form-control form-control-sm" name="DecisionName"
                                        placeholder="Enter Decision Maker Name">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Email </label>
                                    <input type="text" class="form-control form-control-sm" name="DecisionEmail"
                                        placeholder="Enter Decision Maker Name">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Mobile </label>
                                    <input type="text" class="form-control form-control-sm" name="DecisionMobile"
                                        placeholder="Enter Decision Maker Mobile">
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
                                    <input type="text" class="form-control form-control-sm" name="CompanyName"
                                        placeholder="Enter Primary Name">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Company Email </label>
                                    <input type="text" class="form-control form-control-sm" name="CompanyEmail"
                                        placeholder="Enter Primary Email">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Company Contact No </label>
                                    <input type="text" class="form-control form-control-sm" name="Companycontact"
                                        placeholder="Enter Primary Mobile">
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">State</label>
                                    <select class="form-select">
                                        <option value=""> Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">City</label>
                                    <select class="form-select">
                                        <option value=""> Select City</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                        <option value="2">Others</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Postal Code </label>
                                    <input type="text" class="form-control form-control-sm" name="postalCode"
                                        placeholder="Enter Pin Code">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Company Type</label>
                                    <select class="form-select">
                                        <option value="">Not Specify</option>
                                        @foreach ($company_type as $type)
                                            <option value="{{ $type->type_name }}">{{ $type->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Company Industry</label>
                                    <select class="form-select">
                                        <option value="">Not Specify</option>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}">{{ $industry->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Reference</label>
                                    <select class="form-select">
                                        <option value="">Not Specify</option>
                                        @foreach ($references as $references)
                                            <option value="{{ $references->id }}">{{ $references->ref_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <label for="exampleTextarea" class="form-label">Address</label>
                                    <textarea class="form-control" id="exampleTextarea" placeholder="Enter Address"></textarea>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label for="exampleTextarea" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="exampleTextarea" placeholder="Enter Remarks"></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <label class="form-label">GSTIN No</label>
                                    <input type="text" class="form-control form-control-sm" name="pinCode"
                                        placeholder="Enter GST No">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- VIew Attachment -->

                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                            Attachment
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Attachment Type</label>
                                    <select class="form-select">
                                        <option value="">Not Specify</option>
                                        @foreach ($attachment_type as $type)
                                            <option value="{{ $type->attach_type }}">{{ $type->attach_type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Action</label>
                                    <button type="button" class="btn btn-sm btn-primary">View</button>
                                    <button type="button" class="btn btn-sm btn-danger">Remove</button>
                                </div>


                            </div>

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
                                    <select class="form-select">
                                        <option value="">Not Specify</option>
                                        @foreach ($attachment_type as $type)
                                            <option value="{{ $type->attach_type }}">{{ $type->attach_type }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label for="formFile" class="form-label">Attachment File</label>
                                    <input class="form-control" type="file">
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
