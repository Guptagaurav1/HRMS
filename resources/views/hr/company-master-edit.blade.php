@extends('layouts.master')



@section('contents')
<div class="container-fluid">
    <div class="panel-header">
        <h2 class="px-2 mt-2">Edit Company Master</h2>

    </div>
   
    <div class="row mt-3">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Company Details</h5>
                    <div class="btn-box">
                        <a href="{{route("company-master")}}" class="btn btn-sm btn-primary">Company Master List  <i class="fa-solid fa-list"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Company Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Comapny Name">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Company Email </label>
                            <input type="email" class="form-control form-control-sm" placeholder="Enter Company Email">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Company Contact </label>
                            <input type="email" class="form-control form-control-sm" placeholder="Enter Company Contact">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Company City</label>
                            <input type="email" class="form-control form-control-sm" placeholder="Enter Company City">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Website </label>
                            <input type="email" class="form-control form-control-sm" placeholder="Enter Company Website">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="inputDate" class="form-label">Registration No. <span
                                class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="inputDate" placeholder="Enter Registration No">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">GSTIN No.</label>
                            <input type="text" class="form-control" id="inputDate" placeholder="Enter GSTIN No">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">SAC Code </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter a SAC Code">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Service Tax Reg.No. </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter a Service Tax No">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">PAN No. </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter a PAN No">
                           
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Company Address </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Company Address">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Banking Account Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Payee Name</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Payee Name">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Bank Name </label>
                            <input type="tel" class="form-control form-control-sm" placeholder="Enter Bank Name">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Branch Name </label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter Branch Name">
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">IFSC Code </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter IFSC Code">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Account No </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Account No">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Branch Address</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Branch Address">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Bank Email</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Branch Address">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Payment Mode</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Payment Mode">
                        </div>

                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary">Update <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
</div>

@endsection