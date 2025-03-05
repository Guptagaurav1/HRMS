@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Employee List</h2>
            </div>
            <div class="row" class="mt-5">
                <p class="text-danger mx-2 fs-6 text-sm">** Seacrh applicable on Emp Id/Name/Work Order
                    Number/Designation/Contact/Email (Official/ Personal )/Job Place/Qualification</p>
            </div>
            <div class="panel-body">
                <div class="table-filter-option">
                    <div class="row g-3">
                        <div class="col-xl-10 col-9 col-xs-12">
                        <div class="col-md-12 d-flex justify-content-start">
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                            <div class="row g-3">
                                <div class="col-auto flex-1">
                                    <button class="btn btn-sm btn-primary">CSV</button>
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-key"></i> Send Credential
                                    </button>
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
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="markAllEmployee">
                                    </div>
                                </th>
                                <th>Emp Id</th>
                                <th>Name</th>
                                <th>Work Order No</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date Of Joining</th>
                                <th>Job Place</th>
                                <th>Experience</th>
                                <th>Highest Qualification</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th> Send Appointment Letter</th>
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
                                        <a href="#" class="text-primary"> ID-1002</a>
                                    </td>
                                
                               
                                <td>Gaurav </td>
                                <td>
                                    NGP/23134
                                </td>
                                <td>Developer</td>
                                <td>+1 234 567 890</td>
                                <td>@gmail.com</td>
                                <td>
                                    <span class="address-txt">23 Sept</span>
                                </td>
                                <td>Nagpur</td>
                                <td>3-years</td>
                                <td>Btech</td>
                                <td><span class="active-mark"><i class="fa-regular fa-check"></i></span> Active</td>
                                <td> <a href="{{'edit-employee'}}"><button class="btn btn-sm btn-primary"> <i
                                                class="fa-solid fa-pen-to-square"></i> Edit</button></td></a>
                                                <td class="my-3">
                                                    <a href="{{'send-letter'}}"><button class="btn btn-sm btn-primary">Send Letter <i class="fa-solid fa-paper-plane"></i></button></a>
                                                    <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">View Letter  <i class="fa-solid fa-eye"></i></button></a>
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
@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
@endsection