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
                    <h3 class="mt-2">POSH Complaint List</h3>
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
                    <div class="col-md-6">
                        {{-- <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Skills</button></a> --}}
                    </div>
                </div>
                
                <div class="panel-body">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column">Employee Code</th>
                                <th>Name</th>
                                <th class="attributes-column">Subject</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Complaint Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column">PSSPL/DEL/2021-22/0174</td>
                                <td>Gaurav Gupta</td>
                                <td class="attributes-column">Checking</td>
                                <td>Nothing</td>
                                <td> 
                                    
                                    <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">Wait</button></a>
                                </td>
                                <td>19-march-2024</td>
                                <td> 
                                    
                                    <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">View <i class="fa-solid fa-eye"></i></i></button></a>
                                    <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">Response</button></a>
                                </td>
                                
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