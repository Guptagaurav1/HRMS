
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
        <form action="{{route('create-billing-structure')}}" method="post">
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
                                <select  class="form-select form-control" name="organisation" id="organisation" value="" >
                                    <option value="">Select Organisation </option>
                                    @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach
                                </select>
                                @error('organisation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Work Order (Only Billing Structure Pending ) <span class="text-danger">**</span> </label>
                                <select  class="form-select form-control" name="workOrder" id="workOrder" value="" >
                                    <option valuwe="" >Select Work-Order</option>
                                
                                </select>
                                @error('workOrder')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @csrf
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">Add Billing Structure Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_to">Billing To <span class="text-danger">**</span></label>
                                <input type="text" name="billing_to" id="billing_to" value="" class="form-control" placeholder="Enter Biling To" required>
                                @error('billing_to')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_address">Billing Address <span class="text-danger">**</span></label>
                                <input type="text" name="billing_address" id="billing_address" value="" class="form-control" placeholder="Enter Biling Address" required>
                                @error('billing_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_gst">Billing GSTIN/UIN  <span class="text-danger">**</span></label>
                                <input type="text" name="billing_gst" id="billing_gst" value="" class="form-control" placeholder="Enter Biling GSTIN/UIN">
                                @error('billing_gst')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_state">Billing State Name( For Becil WO Only) <span class="text-danger">**</span></label>
                                <input type="text" name="billing_state" id="billing_state" class="form-control" placeholder="Enter Biling State">
                                @error('billing_state')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_contact_person">Billing Contact Person <span class="text-danger">**</span></label>
                                <input type="text" name="billing_contact_person" id="billing_contact_person" class="form-control" placeholder="Enter Billing Contact Person Name" required>
                                @error('billing_contact_person')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_email_id">Billing Email ID <span class="text-danger">**</span></label>
                                <input type="text" name="billing_email_id" id="billing_email_id" class="form-control" placeholder="Enter Billing Email " required>
                                @error('billing_email_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_code">Billing SAC Code / Code <span class="text-danger">**</span></label>
                                <input type="text" name="billing_code" id="billing_code" class="form-control" placeholder="Enter Billing Code" required>
                                @error('billing_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_tax_mode">Billing TAX Mode <span class="text-danger">**</span></label>
                                <select name="billing_tax_mode" id="billing_tax_mode" class="form-select form-control" required>
                                    <option value="">Select Any One </option>
                                    <option value="cgst_sgst">CGST & SGST</option>
                                    <option value="igst">IGST</option>
                                </select>
                                @error('billing_tax_mode')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_tax_rate">Billing Tax % <span class="text-danger">**</span></label>
                                <input type="text" name="billing_tax_rate" id="billing_tax_rate" class="form-control" placeholder="Enter Biling Tax Rate" required>
                                @error('billing_tax_rate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="show_service_charge">Want to Show Service Charge  <span class="text-danger">**</span></label>
                                <select name="show_service_charge" id="show_service_charge"  class="form-select form-control" required>
                                    <option value="">Select Any One </option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                                @error('show_service_charge')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label" for="billing_service_rate">Billing Service Charge Rate <span class="text-danger">**</span></label>
                                <input type="text" name="billing_service_rate" id="billing_service_rate" class="form-control" placeholder="Enter Billing Service Charge" required>
                                @error('billing_service_rate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="d-flex justify-content-end">
                    <button class="btn btn-sm btn-primary"> Create Billing Structure <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>
   

@endsection
@section('script')
<script src="{{asset('assets/js/hr/project.js')}}"></script>
@endsection





    









  
    
    


