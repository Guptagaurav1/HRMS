@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center" >Salary Slip Edit</h3>
                </div>
                <div class="col-md-12 d-flex justify-content-end px-2 py-3">
                <a href="{{route('salary-slip')}}"><button type="submit" class="btn btn-primary mb-3"> Salary Slip List </button></a>
                </div>
            </div>
        </div>
        
            <div class="card mb-20">
                
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Name </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Designation</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">UAN Number</label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Aadhar Number</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">PAN Number</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">ESI Number</label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Bank Name </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Account No.</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Number of Working Days </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Basic Salary</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">HRA</label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Conveyance </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Medical Allowance</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Special Allowance</label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">PF Amount </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">ESI</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Medical Insurance</label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Overtime Rate </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Total overtime Hours</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Accident Insurance</label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">TDS </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Gross Salary</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Tax</label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Salary Total Deduction</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Net Salary</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary">  Update <i class="fa-solid fa-rotate-right"></i></button>
    </div>
</div>

@endsection

