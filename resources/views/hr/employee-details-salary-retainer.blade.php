@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <p class="mt-3">EMP CODE : Retainer/2023-24/0052</p>
                <p class="mt-3">Name : Sanjay Rawat</p>
            </div>
            <div class="table-responsive mt-3">
                <div class="row px-4">
                    <div class="col-sm-12 col-xs-12">
                       
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">Gender</td>
                                    <td>PSSPL/DEL/2021-22/0172</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date Of Birth</td>
                                    <td>Sumit Kumar</td>
                                </tr>
                                <tr>
                                    <td class="bold">Work Order</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td class="bold">Posting Place</td>
                                    <td>GENERAL</td>
                                </tr>
                                <tr>
                                    <td class="bold">Highest Qualification</td>
                                    <td>PSSPL Internal Employees</td>
                                </tr>
                                <tr>
                                    <td class="bold">Father Name</td>
                                    <td>Delhi</td>
                                </tr>
                                <tr>
                                    <td class="bold">Designation</td>
                                    <td>MIS HEAD</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date Of Joining</td>
                                    <td>IT</td>
                                </tr>
                                <tr>
                                    <td class="bold">Salary</td>
                                    <td>DATA ENTRY OPERATOR</td>
                                </tr>
                                <tr>
                                    <td class="bold">PAN No</td>
                                    <td>2nd November, 2021</td>
                                </tr>
                                <tr>
                                    <td class="bold">Account No</td>
                                    <td>EXCEL</td>
                                </tr>
                                <tr>
                                    <td class="bold">Bank Name</td>
                                    <td>₹ 21,100.00</td>
                                </tr>
                                <tr>
                                    <td class="bold">IFSC Code</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Blood Group</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Permanent Address</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Local Address</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">City</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">State</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Phone No.</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Alternate Phone no</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Email</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Alternate Email</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">Emergency Contact No.</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   

                </div>

               

                
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 d-flex justify-content-end gap-2 mb-2">
        
          <a href="{{route('employee-code-retainer')}}"> <button class="btn btn-sm btn-primary">Print Salary Slip <i class="fa-solid fa-print"></i></button></a>  
    
        </div>
    </div>
</div>
@endsection

