@extends('layouts.master')


@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Update Tender</h3>

            </div>

            <div class="text-end mt-3 px-3">
                <button class="btn btn-sm btn-primary"><a href="{{route('tender-list')}}" class="text-white">Tender
                        List</a></button>
            </div>

            <form>

                <div class="mt-3 px-3">

                    <!-- Row 1 -->
                    <div class="row g-3">
                          <div class="col-lg-4 col-md-4">
                                <label class="form-label">Scope of Work <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm" name="Scope of Work"    
                                    placeholder="Enter Scope of Work" required>
                            </div>

                       

                        <div class="col-lg-4 col-md-4">
                            <label class="form-label">Department Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="Department_name"
                                placeholder="Enter Department Name" required>
                           
                        </div>


                        <div class="col-lg-4 col-md-4">
                            <label class="form-label">Tender Number  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="Tender Number"
                                placeholder="Enter Tender Name" required>
                        </div>
                    </div>

                </div>


                <!-- Sections details -->

                <div class="">

                    <div class="mt-3 px-3">
                        <div class="row g-3">
                        <div class="col-lg-4 col-md-4">
                            <label class="form-label">Type Of Organization <span class="text-danger">*</span></label>
                                <select class="form-select form-lavel js-example-basic-multiple">
                                    <option value=""> Select Goverment</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                        </div>
                            <div class="col-lg-4 col-md-4 ">
                                <label class="form-label">Bid Value/Estimate </label>
                                <input type="text" class="form-control form-control-sm" name="bid_value" placeholder="Enter Bid Value/Estimate" required>
                            </div>
                            <div class="col-lg-4 col-md-4 ">
                                <label class="form-label">Performance Security </label>
                                <select class="form-select form-lavel js-example-basic-multiple">
                                    <option value=""> Select Performance Security</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 ">
                                <label class="form-label">EMD</label>
                                <select class="form-select form-lavel js-example-basic-multiple">
                                    <option value=""> Select EMD</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4 ">
                                <label class="form-label">Payment Terms</label>
                                <select class="form-select form-lavel js-example-basic-multiple">
                                    <option value=""> Select Performance Security</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Tender Issue Date</label>
                                <input type="date" class="form-control form-control-sm" name="Tender Issue Date">
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Last Submission Date</label>
                                <input type="date" class="form-control form-control-sm" name="Tender Issue Date">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Technical Qualified ?</label>
                                <input type="text" class="form-control form-control-sm" name="Technical_qualified" placeholder="Enter Technical Qualified">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Tender Status</label>
                                <input type="date" class="form-control form-control-sm" name="Tender_status" placeholder="Enter Tender Status">
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Reference</label>
                                <input type="text" class="form-control form-control-sm" name="Reference"
                                    placeholder="Enter Reference">
                            </div>
                            <div class="col-lg-4 col-md-4 ">
                                <label class="form-label">Managed By</label>
                                <input type="text" class="form-control form-control-sm" name="Add_Managed"
                                    placeholder="Add Managed">
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <label class="form-label">Tender Doc Attachment</label>
                                <input type="file" class="form-control form-control-sm">
                            </div>

                        </div>


                    </div>
                </div>

            
                <div class="">
                    
                    <div class="mt-3 px-3">
                        <div class="row g-3">
                           

                            <div class="col-md-6 col-lg-6">
                                <label for="exampleTextarea" class="form-label">Department Address</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Department Address"></textarea>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <label for="exampleTextarea" class="form-label">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks"></textarea>
                            </div>

                        
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->

             
                <div class="d-flex align-items-cenetr justify-content-end gap-3 px-3 py-2">
                    <div>
                        <a href="{{route('client-list')}}"><button type="button"
                                class="btn btn-sm btn-primary">Cancel</button></a>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary">Update Tender</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    @endsection