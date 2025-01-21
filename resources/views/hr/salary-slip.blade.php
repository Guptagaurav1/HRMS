@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center" >Salary Slip
                        
                    </h3>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> CSV </button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive mt-3 ">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column">Employee Code</th>
                                <th>Employee Name</th>
                                <th class="attributes-column">Month Year</th>
                                <th>Working Days</th>
                                <th>Designation</th>
                                <th>Wo Number</th>
                                <th>CTC(Per Month)</th>
                                <th>Gross Pay</th>
                                <th>Net Pay</th>
                                <th>Basic Pay</th>
                                <th>Working Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column"><a href="{{route('employee-details-salary-retainer')}}" class="text-primary">PSSPL/DEL/2021-22/0174</a></td>
                                <td>Gaurav Gupta</td>
                                <td class="attributes-column">October 2024</td>
                                <td>31</td>
                                <td>
    
                                    Executive Assistant
                                </td>
                                <td>PSSPL Internal Employees</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td><span class="badge text-bg-success">Active</span></td>
                                <td>
    
                                    <a href="{{route("salary-slip-edit")}}"><button class="btn btn-sm btn-primary" >Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="{{route('preview-salary-slip')}}"><button class="btn btn-sm btn-primary">View <i class="fa-solid fa-eye"></i></button></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

