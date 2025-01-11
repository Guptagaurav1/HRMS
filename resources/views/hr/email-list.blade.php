




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
                <h2 class="mt-2">Helpdesk Mail Log</h2>
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
                            <th>S No.</th>
                            <th>Receiver Mail Id</th>
                            <th>Subject</th>
                            <th>Content</th>
                            <th>CC</th>
                            <th>Attachment</th>
                            <th>Sent Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Retainer/2023-24/0052</td>
                            <td>Sanjay Rawat</td>
                            <td>October 2024 (31)</td>
                            <td>PSSPL Internal Employees</td>
                            <td>0</td>
                            <td>31</td>
                            <td>0</td>
                            
                            
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