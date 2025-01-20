@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Reimbursement List</h3>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 my-3">
                    <div class="col-auto">
                        <input type="search" class="form-control" placeholder="Search" required>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Reimbursement ID</th>
                            <th class="text-center">Employee ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Advance Amount</th>
                            <th class="text-center">Requested On</th>
                            <th class="text-center">Verified By</th>
                            <th class="text-center">Verified Status</th>
                            <th class="text-center">Actions</th>
                            <th class="text-center">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-nowrap text-center">REM/0219/0012</td>
                            <td class="text-nowrap text-center">PSSPL/DEL/2021-22/0174</td>
                            <td class="text-nowrap text-center">Adya Pandey</td>
                            <td class="text-nowrap text-center">₹0.00</td>
                            <td class="text-nowrap text-center">₹5000.00</td>
                            <td class="text-nowrap text-center">19th April, 2023</td>
                            <td class="text-nowrap text-center">
                                <span class="badge alert-success">EMPLOYEE</span>
                            </td>
                            <td class="text-nowrap text-center">
                                <span class="badge alert-success">Pending</span>
                            </td>
                            <td class="text-nowrap text-center">
                                <a href="{{'view-letter'}}">
                                    <button class="btn btn-sm btn-primary">View Receipt <i
                                            class="fa-solid fa-file"></i></button>
                                </a>
                                <a href="{{'view-letter'}}">
                                    <button class="btn btn-sm btn-primary">View More <i
                                            class="fa-solid fa-eye"></i></button>
                                </a>
                            </td>
                            <td class="text-danger">Waiting For Further Process</td>
                        </tr>
                    </tbody>
                </table>
                <div class="table-bottom-control"></div>
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