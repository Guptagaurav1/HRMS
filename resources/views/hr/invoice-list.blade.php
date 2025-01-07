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
                <h3 class="mt-2">Saved Invoice</h3>


            </div>
            <p class="px-3 mt-2">Invoice History</p>
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
                                <th class="text-center">Invoice Number</th>
                                <th class="text-center">Work Order no.</th>
                                <th class="text-center">Month</th>
                               
                                <th class="text-center">Created</th>
                                <th class="text-center">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PSSPL/DL/202122/0001</td>
                                <td>PSSPL Internal Employees</td>
                                <td>HR</td>
                                <td>EMPLOYEE</td>
                                <td><a href=""><button class="btn btn-sm btn-primary">View</button></a></td>
                            </tr>
                            <tr>
                                <td>Kriti Singhvi</td>
                                <td>kriti.singhvi@prakharsoftwares.com / 9821298777</td>
                                <td>IT</td>
                                <td>EMPLOYEE</td>
                                <td><a href=""><button class="btn btn-sm btn-primary">View</button></a></td>
                            </tr>
                            <tr>
                                <td>Mayank Puri</td>
                                <td>mayank.puri@prakharsoftwares.com / 9717368860</td>
                                <td>IT</td>
                                <td>EMPLOYEE</td>
                                <td><a href=""><button class="btn btn-sm btn-primary">View</button></a></td>
                            </tr>
                            <tr>
                                <td>Nikhil Baswal</td>
                                <td>nikhil.baswal@prakharsoftwares.com / 9711546517</td>
                                <td>IT</td>
                                <td>EMPLOYEE</td>
                                <td><a href=""><button class="btn btn-sm btn-primary">View</button></a></td>
                            </tr>
                            <tr>
                                <td>Nidhi Sharma</td>
                                <td>nidhi.sharma@prakharsoftwares.com / 9654386141</td>
                                <td>HR</td>
                                <td>EMPLOYEE</td>
                                <td><a href=""><button class="btn btn-sm btn-primary">View</button></a></td>
                            </tr>
                           
                        </tbody>
                    </table>
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