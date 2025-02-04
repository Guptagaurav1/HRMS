@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')

<div class="dashboard-breadcrumb mb-25">

    <div class="d-flex gap-2 justify-items-center align-items-center">
        <input type="radio" class="tab-links active" id="html" name="fav_language" value="HTML" data-tab="1">
        <label for="html">Single Mail</label><br>
        <input type="radio" class="tab-links" id="html" name="fav_language" value="HTML" data-tab="2">
        <label for="html">Bulk Mail</label><br>
    </div>
</div>
<div class="row">
    <div class="col-md-12"></div>
    <div class="row" id="tab-1">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Job Description</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label" class="text-dark">Department </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Department Name">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label" class="text-dark">Job Position </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Job Position">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label" class="text-dark">Sender Email Id </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Sender Email ID">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label" class="text-dark">Job Seeker Email</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Job Seeker Email">
    
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Job Seeker Name </label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Job Seeker Name">
                        </div>
    
                        <div class="col-xxl-3 col-lg-12 col-sm-6">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" id="exampleTextarea" placeholder="Enter A Message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Send <i class="fa-solid fa-paper-plane"></i></button>
        </div>
    </div>
    <div class="row" id="tab-2" style="display: none">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5 class="text-dark text-white">Job Description</h5>
                    <div class="btn-box">
                        <a href="{{route('employee-list')}}" class="btn btn-sm btn-primary"><i
                                class="fa-solid fa-download"></i> Download CSV Format</a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Department </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Department Name">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Job Position </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Job Position">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Sender Email Id </label>
                                <input type="text" class="form-control form-control-sm" placeholder="Enter Sender Email ID">
                            </div>
                            <div class="col-xxl-3 col-lg-12 col-sm-6">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" id="exampleTextarea"
                                    placeholder="Enter A Message"></textarea>
                            </div>
                            <div class="col-xxl-3 col-lg-12 col-sm-6">
                                <label for="formFile" class="form-label">Upload CSV </label>
                                <input class="form-control" type="file" id="formFile">
                               <a href="" class="text-primary"><span>Download CSV File Format</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end mt-3">
                <button class="btn btn-sm btn-primary"> <i class="fa-solid fa-upload"></i> Send All Email</button>
            </div>
        </div>
    </div>
</div>

    <div class="panel border border-dark shadow-lg  text-center" id="card">
      <div class="panel-header" > 
        <h4 class="mt-2 px-2">Preview Summary</h4>
      </div>
  
      <div class="card-body table-responsive">
        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
          <tbody>

            <tr>
              <td class="bold">Position</td>
              <td>Telecaller Cum Counselor</td>
            </tr>
            <tr>
              <td class="bold">Department</td>
              <td>Other</td>
            </tr>
            <tr>
              <td class="bold">Functional Role</td>
              <td>NA</td>
            </tr>
            <tr>
              <td class="bold">State</td>
              <td>Madhya Pradesh</td>
            </tr>
            <tr>
              <td class="bold">City</td>
              <td>Bhopal</td>
            </tr>
            <tr>
              <td class="bold">Last Date Of Fulfillment</td>
              <td>2024-11-21</td>
            </tr>
            <tr>
              <td class="bold">Education</td>
              <td>Graduation/Post Graduation</td>
            </tr>
            <tr>
              <td class="bold">Skills</td>
              <td>NA</td>
            </tr>
            <tr>
              <td class="bold">Experience</td>
              <td>0-2 Years</td>
            </tr>
            <tr>
              <td class="bold">Description:</td>
              <td class="text-wrap">
                1. Contact individuals or organizations to inform them about various programs, and IT training.<br>
                2. Answer questions about MeitY initiatives and explain their benefits. Assist callers in .<br>
                3. Advise individuals or businesses on digital literacy programs, skill development, and IT .<br>
              </td>
            </tr>
            <tr>
              <td class="bold">Assigned To</td>
              <td>Ashish, Ashish, Vandana, Pallavi, Arzoo, Pinki, Bhavika, Ritu</td>
            </tr>
            <tr>
              <td class="bold">Remarks:</td>
              <td>NA</td>
            </tr>
  
          </tbody>
        </table>
      </div> 
    </div>
  
  

@endsection

@section('script')

<script src={{asset('assets/js/tab-changes.js')}}></script>

@endsection