@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-white mt-2">View Letter</h3>
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
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="markAllEmployee">
                                </div>
                            </th>
                            <th>Emp Id</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Document Type</th>
                            <th>Salary</th>
                            <th>Sended On</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </td>
                            <td>
                                ID-1002
                            </td>
                            <td>Gaurav </td>
                            <td>Developer</td>
                            <td>Appointment</td>
                            <td>29991</td>
                            <td>Salary Structure</td>
                            <td class="text-center"> <button class="btn btn-sm btn-primary">View Document  <i class="fa-solid fa-eye"></i></button></td>
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
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection