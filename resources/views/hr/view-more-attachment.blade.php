@extends('layouts.master', ['title' => 'Leave Request Receipt'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
<style>

</style>

@endsection
@section('contents')

<div class="fluid-container">
    <div class="dashboard-breadcrumb">
       
            <h4>Details Of REM/0219/0012</h4>
    </div>
    <div class="row mt-3">
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
                                    <li><span>Reimbursement ID : </span> 22123101</li>
                                    <li><span>Name: </span> 2022-12-26</li>
                                    <li><span>Designation: </span> 282.00</li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 px-5">
                            
                            <div class="info-card">

                                <ul class="p-0">
                                    <li><span>Date: </span> 22123101</li>
                                    <li><span>Emp Code : </span> 2022-12-26</li>
                                    <li><span>Department: </span> 282.00</li>

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
                            <tr>
                                <td>1</td>
                                <td>Operation Manager</td>
                                <td class="attributes-column">I and Deepak were conducted the interview for Department
                                    of Training and Technical Education at Pithampura</td>
                                <td>₹ 348.00</td>
                                <td><a href=""><button class="btn btn-sm btn-primary"> View Attachment <i class="fa-solid fa-paperclip"></i></button></a></td>

                            </tr>
                           
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
                                <td>Employee</td>
                                <td class="attributes-column">Pending</td>
                                <td>6-May-2023</td>
                            </tr>
                            
                            
                            
                        </tbody>
                    </table>
                    <table>

                </div>

               
            </div>
        </div>

    </div>

@endsection
@section('script')
<script src="{{asset('assets/js/hr/request-recept.js')}}"></script>
@endsection