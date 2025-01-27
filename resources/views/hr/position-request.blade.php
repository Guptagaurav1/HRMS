
@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>New Position Request</h2>
        
    </div>
    <div class="dashboard-breadcrumb mb-25">
        
        <div class="d-flex gap-2 justify-items-center align-items-center">
            <input type="radio" id="html" name="fav_language" value="HTML">
            <label for="html">Single Entry</label><br>
            
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">Position Details</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Position Title</label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Client Name </label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Department<span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select Department</option>
                                <option value="0">HR</option>
                                <option value="1">Sales</option>
                                <option value="2">IT</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employement Type<span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select Employer</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">No Of Requirments <span style="color: red">*</span></label>
                            <input type="number" class="form-control form-control-sm">
                            
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">State<span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select State</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">City<span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value=""> Select City</option>
                                <option value="0">Select 1</option>
                                <option value="1">Select 2</option>
                                <option value="2">Select 3</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Last Date Of Fulfilment</label>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                            <label class="form-label w-100">Salary range <span style="color: red">*</span></label>
                            <div class="d-flex w-100">
                                <input type="number" class="form-control form-control-sm me-2" placeholder="From">
                                <input type="number" class="form-control form-control-sm" placeholder="To">
                            </div>
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Functional Role <span style="color: red">*</span><a href="{{route('functional-role')}}" class="ms-2">
                                <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1" style="font-size: 10px;"></i>
                            </a></label>
                            <div class="">
                                <select id="inputState" class="form-select">
                                    <option value="">Nothing Selected</option>
                                    <option value="0">Shift 1</option>
                                    <option value="1">Shift 2</option>
                                    <option value="2">Shift 3</option>
                                </select>
                                
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="exampleTextarea" class="form-label" aria-placeholder="Enter Description">Job Description <span style="color: red">*</span></label>
                            <textarea class="form-control" id="exampleTextarea"></textarea>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="exampleTextarea" class="form-label">Remarks  <span style="color: red">*</span><span></label>
                            <textarea class="form-control" id="exampleTextarea"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-white">ELIGIBILTY  CRITERIA</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Education<span style="color: red">*</span> <a href="" class="ms-2">
                                <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1" style="font-size: 10px;"></i>
                            </a></label>
                            <select id="inputState" class="form-select">
                                <option value="">Nothing Selected</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                           
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                            <label class="form-label w-100">Experience <span style="color: red">*</span></label>
                            <div class="d-flex w-100">
                                <input type="text" class="form-control form-control-sm me-2" placeholder="From">
                                <input type="text" class="form-control form-control-sm" placeholder="To">
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Skillsets <span style="color: red">*</span> <a href="{{route('skill')}}" class="ms-2">
                                <i class="fa-solid fa-plus d-inline-block bg-success text-white rounded-circle p-1" style="font-size: 10px;"></i>
                            </a></label>
                            <select id="inputState" class="form-select">
                                <option value="">Nothing Selected</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                        </div>
                        
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Requested By <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="formFileSm" class="form-label">Attachments</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Assign To <span style="color: red">*</span></label>
                            <select id="inputState" class="form-select">
                                <option value="">Nothing Selected</option>
                                <option value="0">Shift 1</option>
                                <option value="1">Shift 2</option>
                                <option value="2">Shift 3</option>
                            </select>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
       
        
        <div class="col-12 d-flex justify-content-end align-items-center">
            <p  class=" me-3 mb-0 text-danger">* For Final PR click Final Submit Button.</p>
            <button class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
        </div>        
    </div>

@endsection



    









  
    
    


