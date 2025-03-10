@extends('layouts.master', ['title' => 'Receipt'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection
@section('contents')
@php
    $reimberstatus = $reimbursement->get_status()->orderByDesc('id')->first();
@endphp
    <div class="fluid-container">
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="{{route('reimbursement.list')}}" class="btn btn-primary text-end">Back</a>
            </div>
            <div class="col-md-12">
                <div class="panel printarea">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/PrakharNEWLogo.png') }}" alt="Logo" width="120"
                            class="text-center my-2">
                    </div>

                    <div class="invoice-header d-flex justify-content-center align-items-centerSS">
                        <div class="row justify-content-center w-100">
                            <div class="col-xl-7 col-lg-12 col-sm-12 text-center" id="invoice-center">
                                <h3 class="prakhrar-heading">PRAKHAR SOFTWARE SOLUTIONS LTD</h3>
                                <p>LGF, C-11, Malviya Nagar (Opp. SBI Bank), New Delhi - 110017</p>
                                <p>Ph.No. 01140631622 &nbsp;&nbsp; Mail: hr@prakharsoftwares.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="info-card-wrap">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 px-5">
                                <div class="info-card">

                                    <ul class="p-0">
                                        <li><span>Reimbursement ID : </span> {{ $reimbursement->rem_id }}</li>
                                        <li><span>Name: </span> {{ $reimbursement->name }}</li>
                                        <li><span>Designation: </span> {{ $reimbursement->designation }}</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 px-5">
                                <div class="info-card">

                                    <ul class="p-0">
                                        <li><span>Date: </span> {{ date('jS F, Y', strtotime($reimbursement->date)) }}</li>
                                        <li><span>Emp Code : </span> {{ $reimbursement->emp_id }}</li>
                                        <li><span>Department: </span> {{ $reimbursement->department }}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="dark">S.No</th>
                                    <th class="dark">Date</th>
                                    <th class="dark">Description</th>
                                    <th class="dark">Amount</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($reimbursement->get_details as $detail)
                                    @php
                                        $amount = $detail->amount;
                                        $total += $amount;
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('jS F, Y', strtotime($detail->issue_date)) }}</td>
                                        <td class="attributes-column">{{ $detail->description }}</td>
                                        <td>{{ Illuminate\Support\Number::currency($detail->amount, 'inr') }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td></td>
                                    <td colspan="2" class="text-end">Total</td>
                                    <td>{{ Illuminate\Support\Number::currency($total, 'inr') }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2" class="text-end">Advance(If Any)</td>
                                    <td>{{ Illuminate\Support\Number::currency($reimbursement->advance_amount, 'inr') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="2" class="text-end">Final Total</td>
                                    <td>{{ Illuminate\Support\Number::currency($total - $reimbursement->advance_amount, 'inr') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">Amount In Words</td>
                                    <td class="attributes-column text-capitalize">
                                        {{ Illuminate\Support\Number::spell($total - $reimbursement->advance_amount) }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <table>

                    </div>
                    {{--                 
                <div class="panel-header mt-3">
                    <h5 class="text-white">Remarks</h5>
                </div> --}}

                    <!-- Remarks/Note Start-->
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <th>Remarks :</th>
                            <td class="text-start">{{ $reimbursement->remarks }}</td>
                        </tr>
                    </table>

                    <div class="dashboard-breadcrumb">
                        <p>Prepared By(Employee) :
                            <span>
                                @if ($reimberstatus->verified_by == '1')
                                    @if ($reimberstatus->verified_status == 'approved')
                                        <i class='fa fa-check' aria-hidden='true' style='font-size:24px;color:green'></i>
                                    @elseif($reimberstatus->verified_status == 'disapproved')
                                        <i class='fa fa-close' aria-hidden='true' style='font-size:24px;color:red'></i>
                                    @endif
                                @else
                                    NA
                                @endif
                            </span>
                        </p>
                        <p>Approved By(Admin) :
                            <span>
                                @if ($reimberstatus->verified_by == '2')
                                    @if ($reimberstatus->verified_status == 'approved')
                                        <i class='fa fa-check' aria-hidden='true' style='font-size:24px;color:green'></i>
                                    @elseif($reimberstatus->verified_status == 'disapproved')
                                        <i class='fa fa-close' aria-hidden='true' style='font-size:24px;color:red'></i>
                                    @endif
                                @else
                                    NA
                                @endif
                            </span>
                        </p>
                        <p>Received By(HR/Accounts) :
                            <span>
                                @if ($reimberstatus->verified_by == '3')
                                    @if ($reimberstatus->verified_status == 'approved')
                                        <i class='fa fa-check' aria-hidden='true' style='font-size:24px;color:green'></i>
                                    @elseif($reimberstatus->verified_status == 'disapproved')
                                        <i class='fa fa-close' aria-hidden='true' style='font-size:24px;color:red'></i>
                                    @endif
                                @else
                                    NA
                                @endif
                            </span>
                        </p>

                    </div>


                </div>
                
            </div>
            <div class="dashboard-breadcrumb">
                @if(auth()->user()->hasPermission('reimbursement.view-more-attachment'))
                    <a href="{{ route('reimbursement.view-more-attachment', ['id' => $reimbursement->id]) }}"> <button class="btn btn-sm btn-primary"> View More
                        Attachment <i class="fa-solid fa-paperclip"></i></button>
                    </a>
                @endif
                {{-- <a href="{{ route('invoice-encloser') }}"> <button class="btn btn-sm btn-primary"> Print <i
                            class="fa-solid fa-print"></i></button></a> --}}
                <button class="btn btn-sm btn-primary" onclick="printmydoc()"> Print <i
                        class="fa-solid fa-print"></i></button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/hr/request-recept.js') }}"></script>
@endsection
