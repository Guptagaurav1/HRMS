@extends('layouts.master')


@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Update Project</h3>

            </div>

            <div class="text-end mt-3 px-3">
                <button class="btn btn-sm btn-primary"><a href="{{route('project-list')}}" class="text-white">Project List</a></button>
            </div>


            <!-- Client Name section -->
            <form>
                <div>
                    <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                        Project Details
                    </div>

                    
                    <div class="mt-3 px-3">
                        
                            <!-- Row 1 -->
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Project Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="Project-name"
                                        placeholder="Enter Project Name" required>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                        <select class="form-select form-lavel js-example-basic-multiple">
                                            <option value=""> Select State</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                            <option value="2">Others</option>
                                        </select>            
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Project Category </label>
                                    <select class="form-select  js-example-basic-multiple">
                                        <option value=""> Select  Category</option>
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                        <option value="2">Others</option>
                                    </select>
                                </div>
                            </div>

                    </div>

                    <!-- Contact Person Details -->

                    <div class="">
                        <div class="border-bottom border-bottom-primary px-3 py-1 mt-1 text-dark fw-bold">
                          
                        </div>
                        <div class="mt-3 px-3">
                            <div class="row g-3">
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Estimated Project Cost</label>
                                    <input type="text" class="form-control form-control-sm" name="projectCost"
                                        placeholder="Enter Project Cost">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">No.of Requirement</label>
                                    <input type="text" class="form-control form-control-sm" name="No.of Requirement"
                                        placeholder="Enter No of Requirements">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Project Of Duration (In Months)</label>
                                    <input type="text" class="form-control form-control-sm" name="Project Duration"
                                        placeholder="Project Duration (e.g. 1200)">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Ref. Project ID (For NICSI) </label>
                                    <input type="text" class="form-control form-control-sm" name="Ref. Project ID"
                                        placeholder="Enter Ref. Project Id">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Tender No.(For NICSI)</label>
                                    <input type="text" class="form-control form-control-sm" name="Tender No."
                                        placeholder="Enter Tender No">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Tender Valid Upto (For NICSI)</label>
                                    <input type="date" class="form-control form-control-sm" name="Tender Valid Upto"
                                       >
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
                                    <input type="text" class="form-control form-control-sm" name="Proforma Invoice No."
                                        placeholder="Enter Performa Invoice No">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">PI / Invoice Dated </label>
                                    <input type="date" class="form-control form-control-sm" name="Proforma Invoice Dated"
                                        >
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Letter Ref. No. / PAC Project ID </label>
                                    <input type="text" class="form-control form-control-sm" name="Letter Ref No."
                                        placeholder="Enter Letter Ref No">
                                </div>

                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Letter Ref / Ref Dated </label>
                                    <input type="date" class="form-control form-control-sm" name="Letter Ref No."
                                        >
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
                                    <input type="text" class="form-control form-control-sm" name="Name"
                                        placeholder="Enter  Name">
                                </div>
                                <div class="col-lg-4 col-md-4 ">
                                    <label class="form-label">Designation </label>
                                    <input type="text" class="form-control form-control-sm" name="Designation"
                                        placeholder="Enter Designation">
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label">Email </label>
                                    <input type="text" class="form-control form-control-sm" name="email"
                                        placeholder="Enter Email">
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Mobile</label>
                                    <input type="text" class="form-control form-control-sm" name="contact"
                                        placeholder="Enter Mobile No">
                                   
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <label class="form-label" class="text-dark">Landline / Phone</label>
                                    <input type="text" class="form-control form-control-sm" name="Landline"
                                    placeholder="Enter Landline / Phone">
                                    
                                </div>
                                
                                <div class="col-md-6 col-lg-6">
                                    <label for="exampleTextarea" class="form-label">Scope Of Project</label>
                                    <textarea class="form-control" id="exampleTextarea"
                                        placeholder="Enter Scope Of Work"></textarea>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <label for="exampleTextarea" class="form-label">Description</label>
                                    <textarea class="form-control" id="exampleTextarea"
                                        placeholder="Enter Description"></textarea>
                                </div>

                                <div class="col-md-12 col-lg-12">
                                    <label for="exampleTextarea" class="form-label">Remarks</label>
                                    <textarea class="form-control" id="exampleTextarea"
                                        placeholder="Enter Remarks"></textarea>
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
                                <label class="form-label" class="text-dark">Attachment Type <span class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option value="">Not Specify</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
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

                                    <button type="button" class="btn btn-sm btn-primary add-more-client">Add
                                        More</button>
                                </div>
                            </div>

                        </div>
                    </div>
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

            <!-- Add Client Button -->


        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{ asset('assets/js/create-new-client.js') }}"></script>
<script src="{{ asset('assets/js/commonValidation.js') }}"></script>

@endsection