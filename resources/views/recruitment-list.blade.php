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
                    <h5>Recruitment List</h5>
                </div>
                <div class="row px-3 ">
                    <div class="col-md-3">
                        <!-- Empty space for potential filters or labels -->
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">CSV</button></a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                            <thead>
                                <tr role="row">
                                    <th><strong>Recruitment Id</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Contact Details</strong></th>
                                    <th><strong>Job Position</strong></th>
                                    <th><strong>Client Name</strong></th>
                                    <th><strong>DOB</strong></th>
                                    <th><strong>Location</strong></th>
                                    <th><strong>Experience</strong></th>
                                    <th><strong>Skills</strong></th>
                                    <th><strong>Education</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Employee Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                                <tr class="filters" role="row">
                                    <th><input type="text" placeholder="Recruitment Id"></th>
                                    <th><input type="text" placeholder="Name"></th>
                                    <th><input type="text" placeholder="Contact Details"></th>
                                    <th><input type="text" placeholder="Job Position"></th>
                                    <th><input type="text" placeholder="Client Name"></th>
                                    <th><input type="text" placeholder="DOB"></th>
                                    <th><input type="text" placeholder="Location"></th>
                                    <th><input type="text" placeholder="Experience"></th>
                                    <th><input type="text" placeholder="Skills"></th>
                                    <th><input type="text" placeholder="Education"></th>
                                    <th><input type="text" placeholder="Status"></th>
                                    <th><input type="text" placeholder="Employee Status"></th>
                                    <th><input type="text" placeholder="Action"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="srno-column">851</td>
                                    <td class="rid-column">Gaurav Kashyap</td>
                                    <td>g.kashyap@iitg.ac.in / 9636252935</td>
                                    <td>Sales and Marketing Specialist</td>
                                    <td>Prakhar Software Solutions Pvt. Ltd.</td>
                                    <td>1995-01-04</td>
                                    <td>Prakhar Software Solutions Pvt. Ltd, Malviya Nagar, New Delhi</td>
                                    <td>0</td>
                                    <td>MARKETING</td>
                                    <td>MBA</td>
                                    <td>Offer Letter Sent</td>
                                    <td>Not Deployed</td>
                                    <td>
                                        <button class="btn btn-sm btn-info">View</button>
                                    </td>
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
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
