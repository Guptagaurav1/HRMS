@extends('layouts.master', ['title' => 'View More'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@php
$new_id = str_replace("/", "_", $reimbursement->rem_id);
$reimberstatus = $reimbursement->get_status()->orderByDesc('id')->first();
@endphp
@section('contents')
<div class="fluid-container">
    <div class="dashboard-breadcrumb">
       
            <h4>Details Of {{$reimbursement->rem_id}}</h4>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 text-end">
            <a class="btn btn-primary" href="{{route('reimbursement.view-reciept', ['id' => $reimbursement->id])}}">Back</a>
        </div>
        <div class="col-md-12">
            <div class="panel printarea">
                <div class="info-card-wrap mt-1">
                    <div class="panel-header">
                        <h5 class="text-white">Reimbursement</h5>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6 col-sm-6 px-5">
                          
                            <div class="info-card">

                                <ul class="p-0">
                                    <li><span>Reimbursement ID : </span> {{$reimbursement->rem_id}}</li>
                                    <li><span>Name: </span> {{$reimbursement->name}}</li>
                                    <li><span>Designation: </span> {{$reimbursement->designation}}</li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 px-5">
                            
                            <div class="info-card">

                                <ul class="p-0">
                                    <li><span>Date: </span> {{$reimbursement->date}}</li>
                                    <li><span>Emp Code : </span> {{$reimbursement->emp_id}}</li>
                                    <li><span>Department: </span> {{$reimbursement->department}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 px-5">
                            
                            <div class="info-card">

                                <ul class="p-0">
                                    <li><span>Total Amount: </span> {{Illuminate\Support\Number::currency($reimbursement->total_amount, 'inr')}}</li>
                                    <li><span>Remark: </span> {{$reimbursement->remarks}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 px-5">
                            <div class="info-card">

                                <ul class="p-0">
                                    <li><span>Advance Amount : </span> {{Illuminate\Support\Number::currency($reimbursement->advance_amount, 'inr')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="panel-header">
                        <h5 class="text-white">Reimbursement Details</h5>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                           
                            <tr>
                                <th class="dark">S.No</th>
                                <th class="dark">Issue Date</th>
                                <th class="dark">Description</th>
                                <th class="dark">Amount</th>
                                <th class="dark">Attachment</th>
                            </tr>


                        </thead>
                        <tbody>
                            @foreach ($reimbursement->get_details as $detail) 
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{date('jS F, Y', strtotime($detail->issue_date))}}</td>
                                <td class="attributes-column">{{$detail->description}}</td>
                                <td>{{Illuminate\Support\Number::currency($detail->amount, 'inr')}}</td>
                                <td>
                                        @if($detail->invoice_attachment)
                                        <a href="{{asset('recruitment/candidate_documents/reimbursement').'/'.$detail->invoice_attachment}}"><button class="btn btn-sm btn-primary"> View Attachment <i class="fa-solid fa-paperclip"></i></button></a>
                                        @else
                                        <span>Not Available</span>
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                    <table>

                </div>

                <div class="table-responsive mt-5">
                    <div class="panel-header">
                        <h5 class="text-white">Reimbursement Progress(Employee then Admin then HR/Accounts)</h5>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="dark">S.No</th>
                                <th class="dark">Verified By</th>
                                <th class="dark">Verified Status</th>
                                <th class="dark">Verified Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    @if($reimbursement->get_status)
                                        @if($reimberstatus->verified_by == '1')
                                            EMPLOYEE
                                        @elseif($reimberstatus->verified_by == '2')
                                        ADMIN
                                        @elseif($reimberstatus->verified_by == '3')
                                        HR/ACCOUNTS
                                        @endif
                                    @endif
                                </td>
                                <td class="attributes-column text-capitalize">{{$reimbursement->get_status ? $reimberstatus->verified_status : ''}}</td>
                                <td>{{$reimbursement->get_status ? date('jS F, Y', strtotime($reimberstatus->verified_time)) : ''}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>

                </div>

                <div class="panel-header">
                    <h5 class="text-white">Reimbursement Invoice Preview
                    </h5>
                </div>
            <div class="row">
                @if ($reimbursement->get_details)
                @foreach ($reimbursement->get_details as $detail) 
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>
                                {{$detail->description }}
                            </label>
                            <iframe name="myiframe" style="min-width:70%;max-width:80%; min-height:350px;max-height:400px;float:right;" src="https://docs.google.com/gview?url={{asset('recruitment/candidate_documents/reimbursement').'/'.$new_id.'/'.$detail->invoice_attachment}}&embedded=true"></iframe>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
               
            </div>
        </div>

    </div>

@endsection
@section('script')
<script src="{{asset('assets/js/hr/request-recept.js')}}"></script>
@endsection