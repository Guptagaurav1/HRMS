@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
<style>
   
</style>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header border bg-success">
                    <h4 class="text-white mt-2">Position Review Department</h4>
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
                                <th class="srno-column">Req Id</th>
                                <th class="rid-column">Total Requirements</th>
                                <th>Position Title</th>
                                <th>Client Name</th>
                                <th>Position Request Date</th>
                                <th>Date of Fulfillment</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>Completed Requirements</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column">5</td>
                                <td>Front End Developer</td>
                                <td>Zepto</td>
                                <td>10-02-2023</td>
                                <td>10-02-2024</td>
                                <td>IT</td>
                                <td>Faridabad</td>
                                <td>Done</td>
                                <td><span class="badge alert-success">Not Active</span></td> <!-- Fixed closing tag -->
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
