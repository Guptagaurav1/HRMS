@extends('layouts.master')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Reimbursement List</h3>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 mt-2">
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
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
                            <th class="text-center">View More</th>
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
                               NA
                            </td>
                            <td class="text-danger">Waiting For Further Process</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
@endsection

