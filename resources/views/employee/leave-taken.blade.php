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
                    <h3 class="mt-2 text-center">My Attendance List</h3>
                </div>
                <div class="row mb-4 mt-2">
                    <div class="col-md-6">
                        <div class="leave-box">
                            <p class="leave-title">Approved Leave</p>
                            <p class="text-danger" style="font-size: 13px;">Your Available Leave and LWOP means deduction from Salary.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="leave-box">
                            <p class="leave-title">Last Updated Attendance</p>
                            <p>27th December, 2024</p>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="leave-box">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p>Total Approved Leave Taken</p>
                                </div>
                                <div class="col-4 text-center">
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <div class="leave-box">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <p>Total LWOP Leave Taken</p>
                                </div>
                                <div class="col-4 text-center">
                                    <span>1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>

                <div class="table-responsive mt-3 ">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Month Year(Days In Month)</th>
                                <th class="rid-column">Marked As Absent</th>
                                <th>Working Days</th>
                                <th class="attributes-column">Approved Leave</th>
                                <th>LWOP Leave</th>


                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column"><input type="text" class="form-control" placeholder="Month Year(Days In Month)" required/></td>
                                <td class="rid-column"><input type="text" class="form-control" placeholder="Marked As Absent" required/></td>
                                <td><input type="text" class="form-control" placeholder="Working Days"/></td>
                                <td class="attributes-column"><input type="text" class="form-control" placeholder="Approved Leave"/></td>
                                <td><input type="text" class="form-control" placeholder="LWOP Leave"/></td>
                            </tr>
                            <tr>
                                <td class="srno-column text-center">1</td>
                                <td class="rid-column text-center">Testing</td>
                                <td class="text-center">Testing</td>
                                <td class="attributes-column text-center">Testing</td>
                                <td class="text-center">testing</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection