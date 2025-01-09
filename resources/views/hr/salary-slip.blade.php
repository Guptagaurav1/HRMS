@extends('layouts.master')



@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Salary Slip</h2>
                </div>
                <div class="col-md-12 mt-2">
                    <p class="text-danger"> ** Seacrh applicable on </p>
                </div>
                <div class="panel-body">
                    <div class="table-filter-option">
                        <div class="row g-3">
                            <div class="col-xl-10 col-9 col-xs-12">
                                <div class="row g-3">
                                    <div class="col ms-auto">
                                        <form class="row  d-flex justify-content-between">
                                            <div class="col-auto">
                                                <input type="text" class="form-control" placeholder="Search" required>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-auto ">
                                        <button class="btn btn-sm btn-primary">CSV</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Employee Code</th>
                                    <th class="text-center">Emp Name</th>
                                    <th class="text-center">Month Year</th>
                                    <th class="text-center">Working Days</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">Wo Number</th>
                                    <th class="text-center">CTC(Per Month)</th>
                                    <th class="text-center">Gross Pay</th>
                                    <th class="text-center">Net Pay</th>
                                    <th class="text-center">Basic Pay</th>
                                    <th class="text-center">Working Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Retainer/2023-24/0052
                                    </td>
                                    <td>Sanjay Rawat</td>
                                    <td>
                                        October 2024
                                    </td>
                                    <td>31</td>
                                    <td>Executive Assistant</td>
                                    <td>PSSPL Internal Employees</td>
                                    <td>
                                        <span class="address-txt">₹ 40,000.00</span>
                                    </td>
                                    <td>₹ 40,000.00</td>
                                    <td>₹ 40,000.00</td>
                                    <td>₹ 40,000.00</td>
                                    <td><span class="active-mark"><i class="fa-regular fa-check"></i></span> Active</td>
                                    <td class="my-3">
                                        <a href="{{''}}"><button class="btn btn-sm btn-primary">Edit</button></a>
                                        <a href="{{''}}"><button class="btn btn-sm btn-primary mt-2">View</button></a>
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
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
@endsection