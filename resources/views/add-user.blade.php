
@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>

@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>Create User</h2>
        <div class="btn-box">
            <a href="{{route('users-list')}}" class="btn btn-sm btn-primary">User List</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>User Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Select Comapny Name <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select Any One</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Select User Type <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value=""> Department</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">First Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Last Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Department<span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value="">Select Department</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="inputDate" class="form-label">Gender <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Others</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Contact <span style="color: red">*</span></label>
                            <input type="number" class="form-control" id="inputDate">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Date of Birth </label>
                            <input type="date" class="form-control" id="inputDate">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Email <span style="color: red">*</span></label>
                            <input type="email" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <p style="color: red">Password : Password is User date of Birth in DDMMYYYY format</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary">Submit</button>
        </div>
    </div>

@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection

    









  
    
    


