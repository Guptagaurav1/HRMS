@extends('layouts.master')


@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header d-flex">
                <h3 class="mt-2">Add Lead</h3>
            </div>

            <div class="text-end mt-3 px-3">
                <a href="{{route('leads.list')}}">  <button type="submit" class="btn btn-sm btn-primary">Lead List</button></a>
              </div>

            <!-- Client Name section -->
            <form method="post" action="{{ route('leads.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="mt-3 px-3">
                        <div class="row g-3">
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Lead Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm " name="lead_title"
                                    placeholder="Add Lead Name">
                                @error('lead_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Project Name(Client Name) <span
                                        class="text-danger">*</span></label>
                                <select class="form-select js-example-basic-multiple form-control" name="project_id">
                                    <option value="">Select Project Name</option>
                                  @foreach($projects as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->project_name }} ({{ $value->client ? $value->client->client_name : ''   }})</option>
                                  @endforeach
                                </select>
                                @error('project_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-4 ">
                                <label class="form-label">Deadline <span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-sm" name="deadline" required>
                                @error('deadline')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label for="exampleTextarea" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="exampleTextarea"
                                    placeholder="Enter Description "></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label for="exampleTextarea" class="form-label">Remarks</label>
                                <textarea class="form-control" name="remarks" id="exampleTextarea"
                                    placeholder="Enter Remarks"></textarea>
                                @error('remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 mt-4" style="display: {{ auth()->user()->company_id == 2 ? 'none' : 'block' }}">
                                <label class="form-label">Category</label>
                                <select class="form-select js-example-basic-multiple" name="category_id">
                                    <option value="">Select Source</option>
                                    @foreach($categories as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="col-lg-4 col-md-4 mt-4">
                                <label class="form-label" class="text-dark">Source </label>
                                <select class="form-select js-example-basic-multiple" name="source_id">
                                    <option value="">Select Source</option>
                                   @foreach($leadSources as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->source_name }}</option>
                                   @endforeach
                                </select>
                                @error('source_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-4 mt-4">
                                <label class="form-label" class="text-dark">Assign To <span class="text-danger">*</span>
                                </label>
                                <select class="form-select js-example-basic-multiple" name="assign_user_id">
                                    <option value="">Select Assign To</option>
                                    @foreach($leadAssigns as $key => $value)
                                    <option value="{{ $value->id }}">{{ ucwords($value->first_name) ." ". ucwords($value->last_name) }} ({{ $value->role ? $value->role->fullname : '' }})</option>
                               @endforeach
                                </select>
                                @error('assign_user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
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
                                <input type="text" id="attach_typ" name="attach_typ[]" class="form-control" placeholder="Enter Attachment Type" >
                                @error('attach_typ')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label for="formFile" class="form-label">Attachment File</label>
                                <input class="form-control" type="file" name="attach_file[]">
                                @error('attach_file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Action</label>

                                <button type="button" class="btn btn-sm btn-primary add-more-client">Add More</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- SPOC Person -->

                <div class="">
                    <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                        SPOC Person
                    </div>
                    <div class="mt-3 px-3 append_add-more-spoc">
                        <div class="row g-3">
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Name</label>
                                <input type="text" class="form-control form-control-sm " name="name[]"
                                    placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Email</label>
                                <input type="text" class="form-control form-control-sm " name="email[]"
                                    placeholder="Enter Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Contact</label>
                                <input type="text" class="form-control form-control-sm " name="contact[]"
                                    placeholder="Enter Contact" maxlength="10">
                                @error('contact')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 mt-3">
                                <label class="form-label" class="text-dark">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks" name="sp_remarks[]"></textarea>
                                @error('remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-2 col-md-2 mt-3">
                                <label class="form-label" class="text-dark">Set As Default</label>
                                <input class="form-check-input" type="checkbox" value="yes" id="inlineFormCheck" name="set_as_def[]" />
                                @error('set_as_def')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-md-4 mt-3">
                                <label class="form-label" class="text-dark">Action</label>

                                <button type="button" class="btn btn-sm btn-primary" id="add-more-spoc">Add More SPOC</button>
                            </div>
                        </div>

                    </div>
                </div>

                 <!-- Buttons -->

                <div class="d-flex align-items-cenetr justify-content-end gap-3 px-3 py-2">
                    <div>
                        <a href="#"><button type="button"
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

<script src="{{ asset('assets/js/create-new-lead.js') }}"></script>
<script src="{{ asset('assets/js/commonValidation.js') }}"></script>

@endsection