@extends('layouts.master', ['title' => 'Preview Salary Slip'])
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="main-content">
        <div class="row g-4 justify-content-center">
            <div class="col-xxl-7 col-xl-11">
                <div class="panel rounded-0">
                    <div class="row">
                         <!-- <div class="col-md-12 d-flex justify-content-end my-3">
                        <a href="{{route('salary-slip')}}" class="btn btn-primary">Back</a>
                        
                    </div> -->

                    <div class="text-end px-4">
                        @if(auth()->check())
                    <a href="{{ route('salary-slip') }}">
                        <div class="back-button-box">
                            <button type="button" class="btn btn-back">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('details.employee-salary-slip') }}">
                        <div class="back-button-box">
                            <button type="button" class="btn btn-back">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </div>
                    </a>
                    @endif
                </div>
                    </div>
                    
                    <div class="panel-body invoice printarea" id="invoiceBody">
                        <div class="d-none">
                            <input type="hidden" id="slip-id" value="{{$id}}">
                        </div>
                        <div class="invoice-header">
                            <div class="row justify-content-between align-items-end">
                            
                                <div class="col-lg-12 col-sm-6">
                                    <div class="shop-address" >
                                        <div class="d-flex align-items-center justify-content-between">
                                           
                                            <img src="{{asset('assets\images\PrakharLimited-logo.png')}}" alt="Logo" style="width:120px">
                                      
                                            <img src="{{asset('assets\images\11years.png')}}" alt="Logo" style="width:90px">
                                        </div>
                                        <div class="part-txt">
                                            <p class="mb-1">Prakhar Software Solutions Pvt. Ltd.</p>
                                            <p class="mb-1">C - 11, LGF, Opp. State Bank of India, Malviya Nagar New Delhi - 110017</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-body">
                            <div class="info-card-wrap mb-25">
                                <div class="row border-bottom border-dark">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <ul class="styled-list">
                                                <li><span class="">Employee Id</span>{{$salary_slip_record->sal_emp_code}}</li>
                                                <li><span>Employee Name</span>{{$salary_slip_record->sal_emp_name}}</li>
                                                <li><span>UAN No</span>{{$salary_slip_record->sal_uan_no}}</li>
                                                <li><span>ESI Number</span>{{$salary_slip_record->sal_esi_number}}</li>
                                                <li><span>PAN No.</span>{{$salary_slip_record->sal_pan_no}}</li>
                                                <li><span>Designation</span>{{$salary_slip_record->sal_designation}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <ul class="styled-list">
                                                <li><span>Date Of Joining</span>{{$salary_slip_record->sal_doj}}</li>
                                                <li><span>Salary Month</span>{{$salary_slip_record->sal_month}}</li>
                                                <li><span>Days Worked</span>{{$salary_slip_record->sal_working_days}}</li>
                                                <li><span>Aadhaar No.</span>{{$salary_slip_record->sal_aadhar_no}}</li>
                                                <li><span>Bank Name</span>{{$salary_slip_record->sal_bank_name}}</li>
                                                <li><span>Account No.</span>{{$salary_slip_record->sal_account_no}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <ul class="styled-list">
                                                <li class="text-dark fs-6 bold"><span class="text-dark">Earning</span><span>Amount</span></li>
                                                <li><span>Basic Pay</span>{{$salary_slip_record->sal_basic}}</li>
                                                <li><span>HRA</span>{{$salary_slip_record->sal_hra}}</li>
                                                <li><span>Conveyance</span>{{$salary_slip_record->sal_conveyance}}</li>
                                                <li><span>Medical Allowance</span>{{$salary_slip_record->sal_medical_allowance}}</li>
                                                <li><span>Special Allowance</span>{{$salary_slip_record->sal_special_allowance}}</li>
                                                @if($salary_slip_record->tds_deduction)
                                                 <li><span>TDS</span>{{$salary_slip_record->tds_deduction}}</li>
                                                 @endif
                                                @if($salary_slip_record->total_overtime_allowance)
                                                 <li><span>Extra Working Allowance</span>{{$salary_slip_record->total_overtime_allowance}}</li>
                                                 @endif
                                                <li><span>Gross Salary (Rounded)</span>{{$salary_slip_record->sal_gross}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <ul class="styled-list">
                                                <li class="text-dark fs-6 bold"><span>Deduction</span><span>Amount</span></li>
                                                <li><span>Provident Fund</span>{{$salary_slip_record->sal_pf_employee}}</li>
                                                <li><span>Employee State Insurance</span>{{$salary_slip_record->sal_esi_employee}}</li>
                                                <li><span>Medical Insurance</span>{{$salary_slip_record->sal_medical_insurance}}</li>
                                                <li><span>Accident Insurance</span>{{$salary_slip_record->sal_accident_insurance}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="total-payment-area row justify-content-end mb-25">
                                <div class="col-md-4 col-sm-6">
                                    <ul class="payment">
                                        <li class="d-flex justify-content-between">Gross Salary (Rounded)<span>{{$salary_slip_record->sal_gross}}</span></li>
                                        <li class="d-flex justify-content-between">Tax<span>{{$salary_slip_record->sal_tax}}</span></li>
                                        <li class="d-flex justify-content-between">Total Deduction (Rounded)<span>{{$salary_slip_record->sal_total_deduction}}</span></li>
                                        <li class="d-flex justify-content-between">Net Salary (Rounded)<span>{{round($salary_slip_record->sal_net)}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body border-top">
                        <p class="invoice-note text-end mb-0 text-danger">Computer generated payslip, No signature required</p>
                        <div class="btn-box d-flex justify-content-end gap-2 mt-3">
                            <button class="btn btn-sm btn-primary" id="printInvoice" onclick="printmydoc()">
                                <i class="fa-light fa-print"></i> Print
                            </button>
                            <button class="btn btn-sm btn-primary" id="sendMail">
                                <i class="fa-solid fa-paper-plane"></i> Send Mail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/js/previewSalary.js')}}"></script>

@endsection
