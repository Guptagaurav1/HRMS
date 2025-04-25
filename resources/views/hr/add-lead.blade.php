@extends('layouts.master')


@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header d-flex">
                <h3 class="mt-2">Add Lead</h3>
                <div>
                  <a href="{{route('lead-list')}}">  <button type="submit" class="btn btn-sm btn-primary">Lead List</button></a>
                </div>
 
            </div>

            <!-- Client Name section -->
            <form>
                <div class="col-md-12">
                    <div class="mt-3 px-3">
                        <div class="row g-3">
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Lead Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm " name="LeadTitle"
                                    placeholder="Add Lead Name">

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Project Name(Client Name) <span
                                        class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option value="">Add Project Name</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 ">
                                <label class="form-label">Deadline <span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-sm" required>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label for="exampleTextarea" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Description "></textarea>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label for="exampleTextarea" class="form-label">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks"></textarea>
                            </div>


                            <div class="col-lg-4 col-md-4 mt-4">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control form-control-sm " name="category"
                                    placeholder="Add Category">

                            </div>
                            <div class="col-lg-4 col-md-4 mt-4">
                                <label class="form-label" class="text-dark">Source </label>
                                <select class="form-select">
                                    <option value="">Select Source</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 mt-4">
                                <label class="form-label" class="text-dark">Assign To <span class="text-danger">*</span>
                                </label>
                                <select class="form-select">
                                    <option value="">Select Assign To</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
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
                                <select class="form-select">
                                    <option value="">Not Specify</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label for="formFile" class="form-label">Attachment File</label>
                                <input class="form-control" type="file">
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
                                <input type="text" class="form-control form-control-sm " name="Name"
                                    placeholder="Enter Name">

                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Email</label>
                                <input type="text" class="form-control form-control-sm " name="email"
                                    placeholder="Enter Email">
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label" class="text-dark">Contact</label>
                                <input type="text" class="form-control form-control-sm " name="Contact"
                                    placeholder="Enter Contact">
                            </div>

                            <div class="col-lg-6 col-md-6 mt-3">
                                <label class="form-label" class="text-dark">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks"></textarea>
                            </div>
                            <div class="col-lg-2 col-md-2 mt-3">
                                <label class="form-label" class="text-dark">Set As Default</label>
                                <input class="form-check-input" type="checkbox" id="inlineFormCheck" />
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
                        <a href="{{route('client-list')}}"><button type="button"
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