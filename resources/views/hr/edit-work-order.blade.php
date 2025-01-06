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
   
    <div class="row" id="tab-1">
        <div class="col-12">
            <div class="panel p-2">
                <h6>Work Order : BECIL/ND/DRDO/MAN/2425/1323_Extension Added On : 2024-11-14 11:37:39</h6>

                <div class="col-12 d-flex justify-content-end">
                  <a href="{{route('work-order-list')}}"><button class="btn btn-sm btn-primary mx-3 mt-3"> Work Order List</button></a>  
                </div>
                <div class="panel-header">
                    <h5>Work Order Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-4">
                            <label class="form-label">Organisation <span class="text-danger">*</span></label>
                            <select id="inputState" class="form-select">
                                <option selected>Not Specify</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <label class="form-label">Work Order Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Work Order No">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">
                                Previous Work Order Number
                            </label>
                            <input type="text" class="form-control form-control-sm"
                                placeholder="Previous Work Order No In case of amendment">
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Internal Reference
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Internal Reference">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Date of Issue
                                </label>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Number
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Enter Project Number">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Name
                                </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Project Name">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Concern Ministry
                                </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Concern Ministry">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Empanelment Reference
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Empanelment Reference">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    No.of Resource
                                </label>
                                <input type="text" class="form-control form-control-sm" placeholder="No.of Resource">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Amount
                                </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Amount">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Duration (In months)
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Project Duration (In months)">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Duration (In Days)
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Project Duration (In Days)">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Start Date
                                </label>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    End Date
                                </label>
                                <input type="date" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Location
                                </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Loaction">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    City
                                </label>
                                <input type="text" class="form-control form-control-sm" placeholder="City">
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap">
                                    Project Cordinator Name
                                </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Project Cordinator Name">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel-header">
                    <h5>Contacts Details</h5>
                </div>
                <div class="panel-body">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-sm btn-primary mx-3" id="addmorebtn">Add More</button>
                    </div>
                    <div class="addMore">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 text-wrap">
                                <label class="form-label text-wrap">Person Name</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Person Name">
                            </div>
                            <div class="col-sm-12 col-md-6 text-wrap">
                                <label class="form-label text-wrap">Designation</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Designation">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-6 text-wrap">
                                <label class="form-label text-wrap">Contact</label>
                                <input type="number" class="form-control form-control-sm" placeholder="Contact">
                            </div>
                            <div class="col-sm-12 col-md-6 text-wrap">
                                <label class="form-label text-wrap">Email</label>
                                <input type="email" class="form-control form-control-sm" placeholder="Email">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12 text-wrap">
                                <label for="exampleTextarea" class="form-label">Remarks</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter Remarks"></textarea>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-sm btn-primary mx-3 mt-3 delete-btn">Delete <i
                                    class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="panel-header">
                    <h5>Invoice Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">Invoice Client Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Invoice Client Name">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">State</label>
                            <input type="text" class="form-control form-control-sm" placeholder="State">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">PIN Number</label>
                            <input type="number" class="form-control form-control-sm" placeholder="PIN Number">
                        </div>
                        <div class="col-sm-12 col-md-12 text-wrap">
                            <label for="exampleTextarea" class="form-label">Address</label>
                            <textarea class="form-control" id="exampleTextarea" placeholder="Enter Address"></textarea>
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
                            <input type="text" class="form-control form-control-sm" placeholder="Invoice Client Name">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">Amendment date</label>
                            <input type="date" class="form-control form-control-sm" placeholder="State">
                        </div>
                        <div class="col-sm-12 col-md-4 text-wrap">
                            <label class="form-label text-wrap">Previous Order No</label>
                            <input type="text" class="form-control form-control-sm" placeholder="PIN Number">
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
                            <textarea class="form-control" id="exampleTextarea" placeholder="Enter Address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-header">
                    <h5>Attachment</h5>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-9 text-wrap">
                            <label for="formFileSm" class="form-label">Attachment<span style="color: red"> *</span></label>
                           
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>
                        <div class="col-sm-12 col-md-3 text-wrap ml-5">
                            <label for="formFileSm" class="form-label">Attachment Work Order</label>
                            <a href=""> <button class="btn btn-sm btn-primary"> Download Extension  <i class="fa-solid fa-download"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-md-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Update Work Order <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/vendor/js/addmore.js')}}></script>

@endsection