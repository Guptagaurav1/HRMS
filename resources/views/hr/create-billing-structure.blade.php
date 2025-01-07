
@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>

@endsection

@section('contents')
    <div class="">
        <h2>Billing Structure</h2>
        <h5>Billing Hierarchy</h5>
    </div>
    
    <div class="row" id="tab-1">
        <div class="col-12">
            <div class="panel">
               
                <div class="panel-header">
                    
                    
                    <h5>Create Billing Structure</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <p class="text-danger">Please Fill Only Those Details which are mandatory in Invoice Slip</p>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Client Name (Organisation) <span class="text-danger">**</span> </label>
                            <select id="inputState" class="form-select">
                                <option value="">Select (Organisation) </option>
                                <option value="0">Active</option>
                                <option value="1">Deactive</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Work Order (Only Billing Structure Pending ) <span class="text-danger">**</span> </label>
                            <select id="inputState" class="form-select">
                                <option value="">Select Some Option </option>
                                <option value="0">Active</option>
                                <option value="1">Deactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="col-12">
            
            <div class="panel">
                <div class="panel-header">
                    <h5>Add Billing Structure Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing To <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Address <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing GSTIN/UIN  <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing State Name( For Becil WO Only) <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Contact Person <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Email ID <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing SAC Code / Code <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing TAX Mode <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Tax % <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Want to Show Service Charge  <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Service Charge Rate <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Create Billing Structure <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
    <div class="row" id="tab-2" style="display: none">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark">Bulk Upload Employee</h5>
                    <div class="btn-box">
                        <a href="{{route('employee-list')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-download"></i> Download CSV Format</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-8 col-sm-6">
                            <label for="formFileSm" class="form-label">Select CSV File<span style="color: red"> *</span></label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> <i class="fa-solid fa-upload"></i> Upload CSV</button>
        </div>
    </div>

@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/js/tab-changes.js')}}


@endsection

    









  
    
    


