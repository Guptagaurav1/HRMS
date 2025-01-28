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
                    <h2 class="mt-2">Recruitment Report</h2>
                </div>
                <div class="row px-3 mb-3">
                    
                    
                    <div class="col-md-12 d-flex justify-content-end mt-4">
                        <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary">Add New Candidate <i class="fa-solid fa-plus"></i></button></a>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">S.No.</th>
                                <th class="text-center">Position Title</th>
                                <th class="text-center">Client Name</th>
                                <th class="text-center">Total Contacted Person</th>
                                <th class="text-center">Date of Request</th>
                                <th class="text-center">Date of Fulfillment</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Work Assigned</th>
                                <th class="text-center">Completed/Required</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Current Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Sales and Marketing Specialist</td>
                                <td class="text-center">Prakhar Software Solutions Pvt. Ltd.</td>
                                <td class="attributes-column">
                                    <a href="{{route('show-assign-work-log')}}" class="text-primary">01 <span>Contacts</span></a>
                                </td>
                                <td class="text-center">23rd December, 2024</td>
                                <td class="text-center">26th December, 2024</td>
                                <td class="text-center">New Delhi</td>
                                <td class="text-center">Pallavi, Arzoo</td>
                                <td class="text-center">0/1</td>
                                <td class="text-center">
                                    <a href="{{'preview-executive-description'}}">
                                        <button class="btn btn-sm btn-primary" >Share Job Description <i class="fa-solid fa-paper-plane"></i></button>
                                    </a>
                                </td>
                                <td class="text-center"><span class="badge text-bg-success">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


