
@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
    <div class="">
        <h2>Update Billing Structure</h2>
        <h5>Update Billing Hierarchy</h5>
    </div>
    
    <div class="row" id="tab-1">
        <div class="col-12">
            <div class="panel">
               
                <div class="panel-header">
                    
                    
                    <h5 class="text-white">Update Billing Structure</h5>
                </div>
                
                       
                        <div class="dashboard-breadcrumb mb-25">
                            <p>Client Name (Organisation) <span> : Becil </span></p>
                            <p>Work Order : <span>BECIL/CG/CMCSL/MAN/2021/511</span></p>
                        </div>
                        
                        
                    
            </div>
        </div>
       
        <div class="col-12">
            
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Update Billing Structure Details</h5>
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
                            <select id="" class="form-control form-control-sm">
                                <option value=""> Select Any One</option>
                                <option value="0">NA</option>
                                <option value="1">NA</option>
                                <option value="2">NA</option>
                            </select>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Tax % <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Want to Show Service Charge  <span class="text-danger">**</span></label>
                            <select id="" class="form-control form-control-sm">
                                <option value=""> Select Any One</option>
                                <option value="0">NA</option>
                                <option value="1">NA</option>
                                <option value="2">NA</option>
                            </select>
                            
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Billing Service Charge Rate  ( If Show Service Charge Rate is Selected 'YES) <span class="text-danger">**</span></label>
                            <input type="text" class="form-control">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Update Billing Structure <i class="fa-solid fa-rotate"></i></button>
        </div>
    </div>
    

@endsection



    









  
    
    


