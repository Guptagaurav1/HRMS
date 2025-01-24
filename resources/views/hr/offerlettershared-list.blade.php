@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
<style>
    .alert-success {
    color: #fff;
    background-color: rgba(38, 185, 154, .88);
    border-color: rgba(38, 185, 154, .88);
}
</style>

@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header ">
                    <h4 class=" mt-2 text-center">Offer Letter Shared Candidate List</h4>
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
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Recruitment Id</th>
                                <th class="rid-column">Name</th>
                                <th>Contact Details</th>
                                <th class="attributes-column">Job Position</th>
                                <th>Client Name</th>
                                <th>Location</th>
                                <th>Experience</th>
                                <th>Recruitment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column">Gaurav</td>
                                <td>g.kashyap@iitg.ac.in / 9636252935</td>
                                <td> Sales and Marketing Specialist</td>
                                <td>Prakhar Software Solutions Pvt. Ltd.</td>
                                <td> 
                                    Prakhar Software Solutions Pvt. Ltd, Malviya Nagar, New Delhi
                                </td>
                                <td>1</td>
                                <td><span class="badge alert-success">Recruitment Process</span></td>
                                <td><a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">View</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


