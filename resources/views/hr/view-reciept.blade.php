@extends('layouts.master', ['title' => 'Leave Request Receipt'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
<style>

</style>

@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel printarea">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="{{asset('assets/images/PrakharNEWLogo.png')}}" alt="Logo" width="120"
                        class="text-center my-2">
                </div>

                <div class="invoice-header d-flex justify-content-center align-items-centerSS">
                    <div class="row justify-content-center w-100">
                        <div class="col-xl-7 col-lg-12 col-sm-12 text-center" id="invoice-center">
                            <h3 class="prakhrar-heading">PRAKHAR SOFTWARE SOLUTIONS PVT. LTD</h3>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th  class="dark">S.No</th>
                                <th  class="dark">Date</th>
                                <th class="dark">Description</th>
                                <th  class="dark">Amount</th>
                               
                            </tr>
                            
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Operation Manager</td>
                                <td class="attributes-column">I and Deepak were conducted the interview for Department of Training and Technical Education at Pithampura</td>
                                <td>350</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" class="text-end">Total</td>
                                <td>₹ 723.00</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" class="text-end">Advance(If Any)</td>
                                <td>₹ 00.00</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" class="text-end">Final Total</td>
                                <td>₹ 00.00</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">Amount In Words</td>
                                <td class="attributes-column">Seven Hundred <br>Twenty Three Rupees</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>

                </div>
                
                <div class="panel-header mt-3">
                    <h5 class="text-white">Remarks</h5>
                </div>

                <div class="dashboard-breadcrumb">
                    <p>Prepared By(Employee) : <span>NA</span></p>
                    <p>Approved By(Admin) : <span>NA</span></p>
                    <p>Received By(HR/Accounts) : <span>NA</span></p>
                
                </div>
                <div class="dashboard-breadcrumb">
                   <a href="{{route('view-more-attachment')}}" <button class="btn btn-sm btn-primary"> View More Attachment <i class="fa-solid fa-paperclip"></i></button></a>
                    
                   <a href="{{route('invoice-encloser')}}"> <button class="btn btn-sm btn-primary"> Print <i class="fa-solid fa-print"></i></button></a>
                
                </div>
               



               
            </div>
             
                
        </div>
        
    </div>
</div>

@endsection
@section('script')
<script src="{{asset('assets/js/hr/request-recept.js')}}"></script>
@endsection





