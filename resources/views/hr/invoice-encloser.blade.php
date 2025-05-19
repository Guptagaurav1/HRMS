@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection
@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header  heading-stripe">
                <h3 class="mt-2 text-center">Invoice Encloser</h3>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body invoice">
                        <div class="invoice-headers">
                            <div class="row justify-content-between align-items-end">
                                <div class="col-xl-4 col-lg-6 col-sm-6">
                                    <div class="shop-address">
                                        <div class="logo mb-20">
                                            <img src={{"assets/images/PrakharNEWLogo.png"}} alt="Logo" width="100px">
                                        </div>
                                        <div class="part-txt">
                                            <p class="mb-1"> To : <br>Malvai Nagar,
                                                Delhi-1230</p>
                                            <p class="mb-1">Email: info@zozba.com</p>
                                            <p class="mb-1">Phone: 01792288555</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="info-card-wrap">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="info-card">
                                        <ul class="p-0">
                                            <li><span>Invoice No : </span> 22123101</li>
                                            <li><span>Work Oder No: </span> 2022-12-26</li>
                                            <li><span>Reference No: </span> 282.00</li>
                                            <li><span>Project Name: </span> cash on delivery</li>
                                            <li><span>Project No: </span> <span class="text-danger">Unpaid</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="info-card">
                                        <ul class="p-0">
                                            <li><span>Service Month: </span> 22123101</li>
                                            <li><span>Empanelment Reference: </span> 2022-12-26</li>
                                            <li><span>GSTIN No: </span> 282.00</li>
                                            <li><span>SAC Code / Code : </span> cash on delivery</li>
                                            <li><span>Invoice Date: </span> <span class="text-danger">Unpaid </span>
                                            </li>
                                            <li><span>Issue Date : </span> <span class="text-danger">Unpaid</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-danger ">Note :Data Group On basis of DOR,Vendor Rate,
                            Leave,Designation
                        </p>


                    </div>

                    <div class="table-responsive bg-white">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="dark">S.No</th>
                                    <th rowspan="2" class="dark">Category of Service</th>
                                    <th rowspan="2" class="dark">Qty</th>
                                    <th rowspan="2" class="dark">Unit Rates</th>
                                    <th colspan="2" class="dark">Service Duration</th>
                                    <th rowspan="2" class="dark">Working Days</th>
                                    <th rowspan="2" class="dark">Gap in Service</th>
                                    <th rowspan="2" class="dark">Billing</th>
                                    <th rowspan="2" class="dark">Amount</th>
                                </tr>
                                <tr>
                                    <th class="dark">From</th>
                                    <th class="dark">To</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Operation Manager</td>

                                    <td>1</td>
                                    <td>NA</td>
                                    <td>01-02-2022</td>
                                    <td>28-02-2022</td>
                                    <td>28</td>
                                    <td>0</td>
                                    <td>28</td>
                                    <td>₹ 0.00</td>
                                </tr>
                                <tr>
                                    <td colspan="9" class="text-end text-dark">Sub Total</td>
                                    <td>₹ 00</td>
                                </tr>
                                <tr>
                                    <td colspan="9" class="text-end text-dark">Grand Total (In India
                                        Rupees)</td>
                                    <td>₹ 00</td>
                                </tr>
                            </tbody>
                        </table>
                        <table>

                    </div>

                    <div class="table-responsive bg-white mt-4">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">Registration No. of Company</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">GSTIN No.</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">PAN</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Email</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Website Address</td>
                                    <td><span class="badge text-bg-success">Active</span></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="col-md-12 mt-4 px-3">
                        <div class="">
                            <p class="pera-design"><strong class="
                                text-danger">NOTE : </strong> Please make all payment by Netbanking in favour of <strong>PRAKHAR SOFTWARE SOLUTIONS LTD.</strong>, Payable at New Delhi.<br>
                                <strong><u>BANK DETAILS:</u> <br>
                                    Bank Name: YES BANK LTD. | ACCOUNT NO. 010 7838 0000 3722 | IFSC CODE: YESB0000107</strong><br>
                                <strong>Branch: Mother Diary Road, Shakarpur, Delhi – 110092</strong>
                            </p>
                        </div>
        
                        <div class="text-end px-5">
                            <p>For Prakhar Software Solutions Ltd.</p>
                            <p class="">Authorised Signatory</p>
                        </div>
                    </div>
                    <div class="dashboard-breadcrumb">
                        <button class="btn btn-sm btn-primary"> Print <i class="fa-solid fa-print"></i></button>
                        
                                            </div>
                </div>

            </div>

        </div>
    </div>
</div>


@endsection