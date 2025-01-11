@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-3">Salary Details</h2>
    
    
                </div>
                <p class="text-danger px-3">** Seacrh applicable on Emp Id/Name/Work Order Number/Designation</p>
                <div class="col-md-12 text-end p-2">
                    <button type="submit" class="btn btn-primary ">CSV</button>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto mb-3">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search</button>
                        </div>
    
                    </form>
                </div>
    
                <div class="table-responsive">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Employee Code</th>
                                    <th class="text-center">Work Order</th>
                                    <th class="text-center">Date of Joining</th>
                                   
                                    <th class="text-center">Employee Name</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">CTC</th>
                                    <th class="text-center">Gross Pay</th>
                                    <th class="text-center">Net Pay</th>
                                    <th class="text-center">Basic Pay</th>
                                    <th class="text-center">HRA</th>
                                    <th class="text-center">DA</th>
                                    <th class="text-center">Conveyance</th>
                                    <th class="text-center">Special Allowance</th>
                                    <th class="text-center">Medical Allowance</th>
                                    <th class="text-center">PF Employer</th>
                                    <th class="text-center">ESI Employer</th>
                                    <th class="text-center">TAX</th>
                                    <th class="text-center">TDS Deduction</th>
                                    <th class="text-center">PF No.</th>
                                    <th class="text-center">ESI No.</th>
                                    <th class="text-center">Bank name</th>
                                    <th class="text-center">Account no</th>
                                    <th class="text-center">IFSC Code</th>
                                    <th class="text-center">Contact No</th>
                                    <th class="text-center">Email Id</th>
                                    <th class="text-center">Remarks</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Becil</td>
                                    <td>BECIL/CG/CMCSL/MAN/2021/511</td>
                                    <td>Broadcast Engineering Consultant India Limited (BECIL)</td>
                                    <td>09</td>
                                    <td>09AAACB2575L1ZG	</td>
                                    <td>IGST</td>
                                    <td>18</td>
                                    <td>No</td>
                                    <td>0%</td>
                                    <td>Mr. Awadhesh Pandit (Deputy General Manager -Finance & Accounts)</td>
                                    <td>panditmd@becil.com</td>
                                    <td><a href=""><button class="btn btn-sm btn-primary">Edit  <i class="fa-solid fa-pen-to-square"></i></button></a></td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>

                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td><a href=""><button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                        <a href=""><button class="btn btn-sm btn-primary">Delete <i class="fa-solid fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
@endsection