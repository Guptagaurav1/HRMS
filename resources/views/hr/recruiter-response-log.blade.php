




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
                <h2 class="mt-2">Recruiter Detail Change Response Log</h2>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 py-2 mt-2">
                    <div class="col-auto ">
                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Request ID</th>
                            <th class="text-center">Recruiter Name</th>
                            <th class="text-center">Change Request for</th>
                            <th class="text-center">Job Position</th>
                            <th class="text-center">Changes Detail</th>
                            <th class="text-center">Send By</th>
                            <th class="text-center">Responded On</th>
                            <th class="text-center">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>REQ-134</td>
                            <td>PSSPL/2022-23/2951</td>
                            <td>marital status</td>
                            <td>Married, Spouse Name: T.Venkata Lakshmi, Children: 2 Name: Rishi Keshav and Thanvitha Nayana</td>
                            <td>hr@prakharsoftwares.com</td>
                            <td>10th April, 2024</td>
                            <td>Completed</td>
                            <td><span class="badge alert-success">completed</span></td>
                        
                           
                        </tr>
                    </tbody>
                </table>
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