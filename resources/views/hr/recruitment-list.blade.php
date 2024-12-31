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
                    <div class="">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                            <thead>
                                <tr style="background-color: #2A3F54">
                                    <th class="text-white"><strong>Recruitment Id</strong></th>
                                    <th class="text-white"><strong>Name</strong></th>
                                    <th class="text-white"><strong>Contact Details</strong></th>
                                    <th class="text-white"><strong>Job Position</strong></th>
                                    <th class="text-white"><strong>Client Name</strong></th>
                                    <th class="text-white"><strong>DOB</strong></th>
                                    <th class="text-white"><strong>Location</strong></th>
                                    <th class="text-white"><strong>Experience</strong></th>
                                    <th class="text-white"><strong>Skills</strong></th>
                                    <th class="text-white"><strong>Education</strong></th>
                                    <th class="text-white"><strong>Status</strong></th>
                                    <th class="text-white"><strong>Employee Status</strong></th>
                                    <th class="text-white"><strong>Action</strong></th>
                                </tr>
                                <tr>
                                    <th><input type="text" placeholder="Recruitment Id"  class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Name"  class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Contact Details" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Job Position"  class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Client Name"  class="rec-list_head"></th>
                                    <th><input type="text" placeholder="DOB"  class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Location"  class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Experience"  class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Skills"  class="rec-list_head"></th>
                                    <th>Education</th>
                                    <th>Status</th>
                                    <th>Employee Status</th>
                                    <th>Action</th>
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
                                    <td><span class="badge alert-success">Offer Accepted</span></td>
                                    <td>Not Deployed</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">View</button>
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
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
@endsection
