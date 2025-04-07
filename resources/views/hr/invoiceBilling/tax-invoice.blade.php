@extends('layouts.master')


@section('contents')


<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="text-end px-4">
                <a href="{{ route('invoice-list') }}">
                    <div class="back-button-box mt-2">
                        <button type="button" class="btn btn-back">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                    </div>
                </a>
            </div>



            <form action="{{route('save-tax-slip')}}" method="post">
                @csrf
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body invoice">
                            <!-- <div class="row px-3">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @else
                                <div class="alert alert-error alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                            </div> -->
                            <div class="invoice-headers">
                                <div class="row justify-content-between align-items-end">
                                    <div class="col-md-12 col-sm-6">
                                        <div class="shop-address">
                                            <div class="row justify-content-between align-items-end">


                                                <div class="shop-address">
                                                    <div class="d-flex align-items-center justify-content-between  px-2   p-3 mb-5 bg-body rounded">

                                                        <img src="{{asset('assets\images\PrakharLimited-logo.png')}}"
                                                            alt="Logo" style="width:120px">

                                                        <img src="{{asset('assets\images\11years.png')}}" alt="Logo"
                                                            style="width:90px">
                                                    </div>

                                                    
                                                    <div class="part-txt">

                                                        <p class="mb-1 text-dark fw-bold">Prakhar Software Solutions Pvt. Ltd.</p>
                                                        <p class="mb-1 text-dark fw-bold">C - 11, LGF, Opp. State Bank of India, Malviya
                                                            Nagar<br> New Delhi - 110017</p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="part-txt">
                                                <p class="mb-1"> To : <br>{{$bill_structure->billing_to}}</p>
                                                <p class="mb-1">Email: {{$bill_structure->email_id}}</p>
                                                <p class="mb-1">Phone: {{$bill_structure->contact_person}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="info-card-wrap">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <h3>Invoice Details:</h3>
                                            <ul class="p-0">
                                                <li><span>Invoice No : </span> <input type="text" name="invoice_no"
                                                        value="{{$invoice_number ??NULL}}" style="all: unset;">
                                                </li>
                                                <li><span>Work Oder No: </span>{{ $workOrder->wo_number }}</li>
                                                <li><span>Reference No: </span>{{ $workOrder->wo_internal_ref_no}}</li>
                                                <li><span>Project Name: </span>{{ $workOrder->project->project_name }}
                                                </li>
                                                <li><span>Project No: </span>{{ $workOrder->project->project_number }}
                                                </li>
                                            </ul>
                                            <input type="hidden" value="{{$workOrder->wo_number}}" name="wo_number">

                                            <input type="hidden" value="{{$s_month}}" name="month">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="info-card">
                                            <h3>Invoice Details:</h3>
                                            <ul class="p-0">
                                                <li><span>Service Month: </span> 22123101</li>
                                                <li><span>Empanelment Reference: </span> {{
                                                    $workOrder->project->empanelment_reference }}</li>
                                                <li><span>SAC Code / Code : </span>
                                                    {{$bill_structure->billing_sac_code}}</li>
                                                <li><span>GSTIN No: </span> {{$bill_structure->billing_gst_no}}</li>

                                                <li><span>Invoice Date: </span> <input type="text"
                                                        value="{{date('d-m-Y')}}" style="all: unset;">
                                                </li>

                                                <li><span>Issue Date : </span>{{$workOrder->wo_date_of_issue}}</li>
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
                                    @forelse($woAttendances as $key => $value)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$value->designation}}</td>

                                        <td>{{$value->qty}}</td>
                                        <td>{{$value->emp_vendor_rate}}</td>
                                        <td>{{$value->emp_doj}}</td>
                                        <td>{{$value->emp_dor}}</td>
                                        <td>{{$value->gap_in_service}}</td>
                                        <td>{{$value->gap_in_service}}</td>
                                        <td>{{$value->billing_days}}</td>
                                        <td>{{$value->wo_amount}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><span class="text-danger">No Record
                                                Found</span></td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                        <td colspan="9" class="text-end  text-dark fw-bold">Sub Total</td>
                                        <td class="text-dark fw-bold">₹ {{$sub_total}}</td>
                                        <input type="hidden" name="sub_total" value="{{$sub_total}}">
                                    </tr>
                                    <tr>
                                        <td colspan="9" class="text-end text-dark fw-bold">Grand Total (In India
                                            Rupees)</td>
                                        <td class="text-dark fw-bold">{{$bill_structure->grand_total}}</td>

                                        <input type="hidden" name="tax_mode"
                                            value="{{$bill_structure->billing_tax_mode}}">
                                        <input type="hidden" name="tax_rate"
                                            value="{{$bill_structure->billing_tax_rate}}">
                                        <input type="hidden" name="tax_value" value="{{$bill_structure->i_gst}}">

                                        <input type="hidden" name="grand_total"
                                            value="{{$bill_structure->grand_total}}">
                                        <input type="hidden" name="show_service_charge"
                                            value="{{$bill_structure->show_service_charge}}">
                                        <input type="hidden" name="service_rate"
                                            value="{{$bill_structure->service_charge_rate}}">
                                        <input type="hidden" name="service_value"
                                            value="{{$bill_structure->service_charge_value }}">
                                    </tr>
                                </tbody>
                            </table>
                            <table>

                        </div>

                        <div class="table-responsive bg-white mt-4">
                            <table
                                class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                id="allEmployeeTable">
                                <tbody>
                                    <tr>
                                        <td class="bold">Registration No. of Company</td>
                                        <td>{{$company_master->registration_no}}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">GSTIN No.</td>
                                        <td>{{$company_master->gstin_no}}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">PAN</td>
                                        <td>{{$company_master->pan_no}}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Email</td>
                                        <td>{{$company_master->bank_email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Website Address</td>
                                        <td><span class="badge text-bg-success">{{$company_master->website}}</span></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-12 mt-4 px-3">
                            <div class="">
                                <p class="pera-design"><strong class="
                                    text-danger">NOTE : </strong> Please make all payment by Netbanking in favour of
                                    <strong>{{$company_master->company_name}}</strong>, Payable at
                                    {{$company_master->company_city}}<br>
                                    <strong><u>BANK DETAILS:</u> <br>
                                        Bank Name: {{$company_master->branch_name}} | ACCOUNT
                                        NO:{{$company_master->account_no}} | IFSC CODE:
                                        {{$company_master->ifsc_code}}</strong><br>
                                    <strong>Branch: {{$company_master->branch_address}}</strong>
                                </p>
                            </div>

                            <div class="text-end px-5">
                                <p class="text-dark fw-bold">For Prakhar Software Solutions Pvt. Ltd.</p>
                                <p class="text-dark fw-bold">Authorised Signatory</p>
                            </div>
                        </div>
                        <div class="dashboard-breadcrumb">
                            <button class="btn btn-sm btn-primary"> Print <i class="fa-solid fa-print"></i></button>
                            <button class="btn  btn-sm btn-primary hidden-print" type="submit" name="add_invoice"
                            id="add_invoice">Save Invoice</button>

                            <a href="{{route('invoice-encloser')}}"> <button class="btn btn-sm btn-primary"> Encloser <i
                                        class="fa-solid fa-file"></i></button></a>

                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>


@endsection