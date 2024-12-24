@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>

@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Recruitment Report</h5>
                </div>
                <div class="row px-3 mt-2">
                    <div class="col-md-3">
                        {{-- <label class="form-label">Skills <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm"> --}}
                    </div>
                    <div class="col-md-3">
                        {{-- <label class="form-label">Reporting Email</label>
                        <select id="inputState" class="form-select">
                            <option selected>Not Specify</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                        </select>
                        </label> --}}
                    </div>
                    <div class="col-md-12 d-flex justify-content-end ml-5">
                        <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add New Candidate</button></a>
                    </div>
                </div>
                
                <div class="panel-body">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column">Position Title</th>
                                <th>Client Name</th>
                                <th class="attributes-column">Total Contacted Person</th>
                                <th>Date of Request</th>
                                <th>Date of Fullfillment</th>
                                <th>Loaction</th>
                                <th>Work Assigned</th>
                                <th>Completed/Required</th>
                                <th>Action</th>
                                <th>Current Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column">Sales and Marketing Specialist</td>
                                <td>Prakhar Software Solutions Pvt. Ltd.</td>
                                <td class="attributes-column">2 Contacts</td>
                                <td>23rd December, 2024</td>
                                <td>26rd December, 2024</td>
                                <td>New Delhi</td>
                                <td>Pallavi , Arzoo</td>
                                <td>0/1</td>
                                <td> 
                                    <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">Share Job Description</button></a>
                                    
                                </td>
                                <td>Pending</td>
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
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
@endsection


