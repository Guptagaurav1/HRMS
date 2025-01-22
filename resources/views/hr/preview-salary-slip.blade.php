@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="main-content">
        <div class="row g-4 justify-content-center">
            <div class="col-xxl-7 col-xl-11">
                <div class="panel rounded-0">
                    <div class="panel-body invoice" id="invoiceBody">
                        <div class="invoice-header mb-25">
                            <div class="row justify-content-between align-items-end">
                                <div class="col-xl-5 col-lg-6 col-sm-6">
                                    <div class="shop-address">
                                        <div class="logo mb-20">
                                            <img src="assets/images/PrakharNEWLogo.png" alt="Logo" class="w-50">
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
                                                <li><span class="">Employee Id</span>NA</li>
                                                <li><span>Employee Name</span>NA</li>
                                                <li><span>UAN No</span>NA</li>
                                                <li><span>ESI Number</span>NA</li>
                                                <li><span>PAN No.</span>NA</li>
                                                <li><span>Designation</span>NA</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <ul class="styled-list">
                                                <li><span>Date Of Joining</span>NA</li>
                                                <li><span>Salary Month</span>NA</li>
                                                <li><span>Days Worked</span>NA</li>
                                                <li><span>Aadhaar No.</span>NA</li>
                                                <li><span>Bank Name</span>NA</li>
                                                <li><span>Account No.</span>NA</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <ul class="styled-list">
                                                <li class="text-dark fs-6 bold"><span class="text-dark">Earning</span><span>Amount</span></li>
                                                <li><span>Basic Pay</span>NA</li>
                                                <li><span>HRA</span>NA</li>
                                                <li><span>Conveyance</span>NA</li>
                                                <li><span>Medical Allowance</span>NA</li>
                                                <li><span>Special Allowance</span>NA</li>
                                                <li><span>Gross Salary (Rounded)</span>NA</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <ul class="styled-list">
                                                <li class="text-dark fs-6 bold"><span>Deduction</span><span>Amount</span></li>
                                                <li><span>Provident Fund</span>NA</li>
                                                <li><span>Employee State Insurance</span>NA</li>
                                                <li><span>Medical Insurance</span>NA</li>
                                                <li><span>Accident Insurance</span>NA</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="total-payment-area row justify-content-end mb-25">
                                <div class="col-md-4 col-sm-6">
                                    <ul class="payment">
                                        <li class="d-flex justify-content-between">Gross Salary (Rounded)<span>NA</span></li>
                                        <li class="d-flex justify-content-between">Tax<span>0</span></li>
                                        <li class="d-flex justify-content-between">Total Deduction (Rounded)<span>0</span></li>
                                        <li class="d-flex justify-content-between">Net Salary (Rounded)<span>0</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body border-top">
                        <p class="invoice-note text-end mb-0 text-danger">Computer generated payslip, No signature required</p>
                        <div class="btn-box d-flex justify-content-end gap-2 mt-3">
                            <button class="btn btn-sm btn-primary" id="printInvoice">
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
