
@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>

@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>Create Jobseeker</h2>
        
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Add Jobseeker</h5>
                </div>
                <div class="row px-3">
                    
                    
                    <div class="col-md-12 d-flex justify-content-end ml-5">
                        <a href="{{route('recruitment-list')}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Jobseeker List</button></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">First Name </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Position Title</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Department</label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select Department Type</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Education</label>
                            <input type="text" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Loaction</label>
                            <input type="text" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Experience</label>
                            <input type="text" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Recruitment Type</label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select Type</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Contact</label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="formFileSm" class="form-label">Resume</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Skills</label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select Skills</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="col-12 d-flex justify-content-end ">
            
            <button class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
        </div>
        
    </div>

@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection

    









  
    
    


