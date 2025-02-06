
@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
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
                    
                    
                    <h5 class="text-white">Create Billing Structure</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <p class="text-danger">Please Fill Only Those Details which are mandatory in Invoice Slip</p>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Client Name (Organisation) <span class="text-danger">**</span> </label>
                            <select  class="form-select form-control">
                                <option value="">Select (Organisation) </option>
                                <option value="0">Active</option>
                                <option value="1">Deactive</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Work Order (Only Billing Structure Pending ) <span class="text-danger">**</span> </label>
                            <select  class="form-select form-control">
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
                    <h5 class="text-white">Add Billing Structure Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing To <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Biling To">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Address <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Biling Address">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing GSTIN/UIN  <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Biling GSTIN/UIN">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing State Name( For Becil WO Only) <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Biling State">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Contact Person <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Billing Contact Person Name">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Email ID <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Billing Email ">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing SAC Code / Code <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Billing Code">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing TAX Mode <span class="text-danger">**</span></label>
                            <select  class="form-select form-control">
                                <option value="">Select Any One </option>
                                <option value="0">NA</option>
                                <option value="1">NA</option>
                            </select>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Tax % <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Biling Tax Rate">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Want to Show Service Charge  <span class="text-danger">**</span></label>
                            <select  class="form-select form-control">
                                <option value="">Select Any One </option>
                                <option value="0">NA</option>
                                <option value="1">NA</option>
                            </select>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Service Charge Rate <span class="text-danger">**</span></label>
                            <input type="text" class="form-control" placeholder="Enter Billing Service Charge">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Create Billing Structure <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
   

@endsection



    









  
    
    


