@extends('layouts.master', ['title' => 'Update Project'])

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Update Project</h3>
                    <div>
                        <ul class="breadcrumb">
                        
                            <li>
                                <a href="{{get_dashboard()}}">Dashboard</a>
                            </li>
                            <li><a href="{{route('sales-projects.list')}}">Project List</a></li>
                            <li>Update Project</li>
                        </ul>
                    </div>
                </div>

                <div class="text-end mt-3 px-3">
                    <button class="btn btn-sm btn-primary"><a href="{{ route('sales-projects.list') }}"
                            class="text-white">Project List</a></button>
                </div>

                <!-- Client Name section -->
                <form class="edit-project" method="POST" enctype="multipart/form-data" action="{{route('sales-projects.update')}}">
                    @csrf
                    <div class="d-none"><input type="hidden" name="id" value="{{$project->id}}"></div>
                    <div>
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                            Project Details
                        </div>

                        <div class="mt-3 px-3">

                            <!-- Row 1 -->
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Project Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="project_name"
                                        placeholder="Enter Project Name" value="{{ $project->project_name }}" required>
                                    @error('project_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                    <div class="d-flex gap-2">
                                        <select class="form-select form-lavel js-example-basic-multiple" name="client_id"
                                            required>
                                            <option value=""> Select Client</option>
                                            @foreach ($clients as $client)
                                                <option value="{{ $client->id }}"
                                                    {{ $project->client_id == $client->id ? 'selected' : '' }}>
                                                    {{ $client->client_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-auto">
                                            <a href="{{ route('sales-clients.add') }}">
                                                <button type="button" class="btn btn-sm btn-primary">Add Client</button>
                                            </a>
                                        </div>
                                        @error('client_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Project Category <span class="text-danger">*</span></label>
                                    <select class="form-select form-lavel js-example-basic-multiple" name="category_id"
                                        required>
                                        <option value=""> Select Category</option>
                                        @foreach ($category_lists as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $project->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                        <label class="form-label">Estimated Project Cost</label>
                                        <input type="number" class="form-control form-control-sm" min="0"
                                            name="amount" placeholder="Enter Project Cost" value="{{ $project->amount }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">No.of Requirement</label>
                                        <input type="number" class="form-control form-control-sm" name="no_of_requirement"
                                            min="0" placeholder="Enter No of Requirements"
                                            value="{{ $project->no_of_requirement }}" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">Project Of Duration (In Months)</label>
                                        <input type="number" class="form-control form-control-sm" name="project_duration"
                                            min="0" step="0.001" value="{{ $project->project_duration }}"
                                            placeholder="Project Duration (e.g. 1200)">
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">Ref. Project ID (For NICSI) </label>
                                        <input type="text" class="form-control form-control-sm" name="ref_project_id"
                                            placeholder="Enter Ref. Project Id" value="{{ $project->ref_project_id }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">Tender No.(For NICSI)</label>
                                        <input type="text" class="form-control form-control-sm" name="tender_no"
                                            placeholder="Enter Tender No" value="{{ $project->tender_no }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">Tender Valid Upto (For NICSI)</label>
                                        <input type="date" class="form-control form-control-sm" name="tender_valid_upto"
                                            value="{{ $project->tender_valid_upto }}">
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Decision Maker details -->

                        <div class="">

                            <div class="mt-3 px-3">
                                <div class="row g-3">
                                    <div class="col-lg-4 col-md-4">
                                        <label class="form-label">Proforma Invoice / Invoice No.</label>
                                        <input type="text" class="form-control form-control-sm" name="per_inv_no"
                                            placeholder="Enter Performa Invoice No" value="{{ $project->per_inv_no }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">PI / Invoice Dated </label>
                                        <input type="date" class="form-control form-control-sm" name="per_inv_date"
                                            value="{{ $project->per_inv_date }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">Letter Ref. No. / PAC Project ID </label>
                                        <input type="text" class="form-control form-control-sm" name="letter_ref_no"
                                            placeholder="Enter Letter Ref No" value="{{ $project->letter_ref_no }}">
                                    </div>

                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">Letter Ref / Ref Dated </label>
                                        <input type="date" class="form-control form-control-sm" name="letter_ref_date"
                                            value="{{ $project->letter_ref_date }}">
                                    </div>

                                </div>


                            </div>
                        </div>

                        <!-- Company Information -->
                        <div class="">
                            <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                                Project Coordinator Details (You Can Update this) :
                            </div>
                            <div class="mt-3 px-3">
                                <div class="row g-3">
                                    <div class="col-lg-4 col-md-4">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control form-control-sm" name="p_contact_name"
                                            placeholder="Enter Name" value="{{ $project->p_contact_name }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4 ">
                                        <label class="form-label">Designation </label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="p_contact_designation" placeholder="Enter Designation"
                                            value="{{ $project->p_contact_designation }}">
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label class="form-label">Email </label>
                                        <input type="email" class="form-control form-control-sm" name="p_contact_email"
                                            placeholder="Enter Email" value="{{ $project->p_contact_email }}">
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <label class="form-label" class="text-dark">Mobile</label>
                                        <input type="text" class="form-control form-control-sm" name="p_contact_phone"
                                            placeholder="Enter Mobile No" value="{{ $project->p_contact_phone }}" maxlength="10" minlength="10"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">

                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <label class="form-label" class="text-dark">Landline / Phone</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="p_contact_landline" placeholder="Enter Landline / Phone"
                                            value="{{ $project->p_contact_landline }}" maxlength="10" minlength="6"
                                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">

                                    </div>

                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleTextarea" class="form-label">Scope Of Project</label>
                                        <textarea class="form-control" name="scope_of_project" placeholder="Enter Scope Of Work">{{ $project->scope_of_project }}</textarea>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <label for="exampleTextarea" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Description">{{ $project->description }}</textarea>
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <label for="exampleTextarea" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="remarks" placeholder="Enter Remarks">{{ $project->remarks }}</textarea>
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
                                @foreach ($project->attachments as $attachment)
                                    <div class="row g-3 attachments">
                                        <input type="hidden" name="remove_attachment[]" value="">
                                        <div class="col-lg-4 col-md-4">
                                            <select class="form-select">
                                                <option>{{ $attachment->file_type }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <a href="{{ asset('upload/crm/project') . '/' . $attachment->file_name }}"
                                                target="_blank" class="btn btn-sm btn-primary">View</a>
                                            <button type="button" class="btn btn-sm btn-danger remove-button"
                                                data-id="{{ $attachment->id }}">Remove</button>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                        <!-- Attachment -->

                        <div class="">
                            <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                                Attachment
                            </div>
                            <div class="mt-3 px-3 append_add-more-items">
                                <div class="row g-3">
                                    <div class="col-lg-4 col-md-4">
                                        <label class="form-label" class="text-dark">Attachment Type</label>
                                        <select class="form-select" name="file_type[]">
                                            <option value="">Not Specify</option>
                                            @foreach ($attachment_type as $type)
                                                <option value="{{ $type->attach_type }}">{{ $type->attach_type }}
                                                </option>
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

                                        <button type="button" class="btn btn-sm btn-primary add-more-attachment">Add
                                            More</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Submit Form --}}
                        <div class="d-flex align-items-cenetr justify-content-end gap-3 px-3 py-2">
                            <div>
                                <a href="{{ route('sales-projects.list') }}"><button type="button"
                                        class="btn btn-sm btn-primary">Cancel</button></a>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>

                        </div>
                </form>

                <!-- Add Client Button -->


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/edit-sales-project.js') }}"></script>
    <script src="{{ asset('assets/js/commonValidation.js') }}"></script>
@endsection
