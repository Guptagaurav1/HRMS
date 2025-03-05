
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
                    <p>Client Name (Organisation) <span> : {{$billingStructure->organizations->name}} </span></p>
                    <p>Work Order : <span>{{$billingStructure->wo_number}}</span></p>
                </div>
                    
            </div>
        </div>
        <form action="{{ route('update-billing-structure',$billingStructure->id) }}" method="post">
        @csrf
            <div class="col-12">
                
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">Update Billing Structure Details</h5>
                    </div>
                
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_to">Billing To <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_to" id="billing_to" value="{{$billingStructure->billing_to}}" class="form-control" placeholder="Enter Biling To" required>
                                    @error('billing_to')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_address">Billing Address <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_address" id="billing_address" value="{{$billingStructure->billing_address}}" class="form-control" placeholder="Enter Biling Address" required>
                                    @error('billing_address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_gst">Billing GSTIN/UIN  <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_gst" id="billing_gst" value="{{$billingStructure->billing_gst_no}}" class="form-control" placeholder="Enter Biling GSTIN/UIN">
                                    @error('billing_gst')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_state">Billing State Name( For Becil WO Only) <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_state" id="billing_state" class="form-control" value="{{$billingStructure->billing_state}}" placeholder="Enter Biling State">
                                    @error('billing_state')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_contact_person">Billing Contact Person <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_contact_person" id="billing_contact_person" class="form-control" value="{{$billingStructure->contact_person}}" placeholder="Enter Billing Contact Person Name" required>
                                    @error('billing_contact_person')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_email_id">Billing Email ID <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_email_id" id="billing_email_id" class="form-control" placeholder="Enter Billing Email" value="{{$billingStructure->email_id}}" required>
                                    @error('billing_email_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_code">Billing SAC Code / Code <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_code" id="billing_code" class="form-control" placeholder="Enter Billing Code" value="{{$billingStructure->billing_sac_code}}" required>
                                    @error('billing_code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_tax_mode">Billing TAX Mode <span class="text-danger">**</span></label>
                                    <select name="billing_tax_mode" id="billing_tax_mode" class="form-select form-control" required>
                                        <option value="">Select Any One </option>
                                        <option value="cgst_sgst" {{ old('billing_tax_mode', $billingStructure->billing_tax_mode) == 'cgst_sgst' ? 'selected' : '' }}>CGST & SGST</option>
                                    <option value="igst" {{ old('billing_tax_mode', $billingStructure->billing_tax_mode) == 'igst' ? 'selected' : '' }}>IGST</option>
                                    </select>
                                    @error('billing_tax_mode')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_tax_rate">Billing Tax % <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_tax_rate" id="billing_tax_rate" value="{{$billingStructure->billing_tax_rate}}" class="form-control" placeholder="Enter Biling Tax Rate" required>
                                    @error('billing_tax_rate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="show_service_charge">Want to Show Service Charge  <span class="text-danger">**</span></label>
                                    <select name="show_service_charge" id="show_service_charge"  class="form-select form-control" required>
                                        <option value="">Select Any One </option>
                                        
                                        <option value="yes" {{ old('show_service_charge', $billingStructure->show_service_charge) == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ old('show_service_charge', $billingStructure->show_service_charge) == 'no' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('show_service_charge')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="form-label" for="billing_service_rate">Billing Service Charge Rate <span class="text-danger">**</span></label>
                                    <input type="text" name="billing_service_rate" id="billing_service_rate" class="form-control" value="{{$billingStructure->service_charge_rate}}" placeholder="Enter Billing Service Charge" required>
                                    @error('billing_service_rate')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-sm btn-primary"> Update Billing Structure <i class="fa-solid fa-rotate"></i></button>
            </div>
        </form>
    </div>
    

@endsection



    









  
    
    


