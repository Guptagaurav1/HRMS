@extends('layouts.master')

@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center" >Salary Slip Edit</h3>
                    <div>
                        <ul class="breadcrumb">
                            <li> @if (auth()->user()->role->role_name="hr")
                                <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                @endif
                            </li>
                            <li><a href="{{route('salary-slip')}}">Salary Slip</a></li>
                            <li>Salary Slip Edit</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-end px-2 py-3">
                <a href="{{route('salary-slip')}}"><button type="submit" class="btn btn-primary mb-3"> Salary Slip List </button></a>
                </div>

            </div>
        </div>
        
            <div class="card mb-20">
                
                <div class="card-body">
                    <form action="{{route('salary-slip-update')}}" method="post" class="form">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="id" value="{{$id}}">
                            <input type="hidden" name="wo_attendance_at_emp" value="{{$slip->wo_attendance_at_emp}}">
                        </div>
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Name </label>
                            <input type="text" class="form-control form-control-sm" name="sal_emp_name" value="{{$slip->sal_emp_name}}" required>
                            @error('sal_emp_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_designation}}" name="sal_designation" required>
                             @error('sal_designation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">UAN Number</label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_uan_no}}" name="sal_uan_no">
                             @error('sal_uan_no')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Aadhar Number</label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_aadhar_no}}" maxlength="12" name="sal_aadhar_no" required>
                             @error('sal_aadhar_no')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">PAN Number</label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_pan_no}}" name="sal_pan_no">
                             @error('sal_pan_no')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">ESI Number</label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_esi_number}}" name="sal_esi_number">
                             @error('sal_esi_number')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Bank Name </label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_bank_name}}" name="sal_bank_name" required>
                             @error('sal_bank_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Account No.</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_account_no}}" name="sal_account_no" required>
                             @error('sal_account_no')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Number of Working Days </label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_working_days}}" min="0" step="any" name="sal_working_days" required>
                             @error('sal_working_days')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Basic Salary</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_basic}}" name="sal_basic" required>
                             @error('sal_basic')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">HRA</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_hra}}" name="sal_hra">
                             @error('sal_hra')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Conveyance </label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_conveyance}}" name="sal_conveyance">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Medical Allowance</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_medical_allowance}}" name="sal_medical_allowance">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Special Allowance</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_special_allowance}}" name="sal_special_allowance">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">PF Amount </label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_pf_wages}}" name="sal_pf_wages">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">ESI</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_esi_wages}}" name="sal_esi_wages">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Medical Insurance</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_medical_insurance}}" name="sal_medical_insurance">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Overtime Rate </label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->overtime_rate}}" name="overtime_rate">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Total overtime Hours</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->total_working_hrs}}" name="total_working_hrs">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Accident Insurance</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_accident_insurance}}" name="sal_accident_insurance">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">TDS </label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->tds_deduction}}" name="tds_deduction">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Gross Salary</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_gross}}" name="sal_gross" required>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Tax</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_tax}}" name="sal_tax">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Salary Total Deduction</label>
                            <input type="text" class="form-control form-control-sm" value="{{$slip->sal_total_deduction}}" name="sal_total_deduction">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Net Salary</label>
                            <input type="number" class="form-control form-control-sm" value="{{$slip->sal_net}}" name="sal_net" required>
                        </div>
                    </div>
                     <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Update <i class="fa-solid fa-rotate-right"></i></button>
                    </div>
                </form>
                </div>
            </div>
        
    </div>
   
</div>

@endsection

