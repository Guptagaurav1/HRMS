@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />


@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="text-white mt-2">Contact Candidate By Call Form</h2>
                </div>
                <div class="row px-3 ">

                    <div class="col-md-12 d-flex justify-content-end">
                        <button class="btn btn-sm btn-primary mt-2"
                               >Export All  <i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <div class="">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr style="background-color: #2A3F54">
                                    <th class="text-white"><strong>S.NO.</strong></th>
                                    <th class="text-white"><strong>Client Name</strong></th>
                                    <th class="text-white"><strong>Position Title</strong></th>
                                    <th class="text-white"><strong>Name</strong></th>
                                    <th class="text-white"><strong>Email</strong></th>
                                    <th class="text-white"><strong>Contact Number</strong></th>
                                    <th class="text-white"><strong>Recruiter Name/Email</strong></th>
                                    <th class="text-white"><strong>Remarks</strong></th>
                                    <th class="text-white"><strong>Contacted On</strong></th>
                                    <th class="text-white"><strong>Resume</strong></th>
                                    <th class="text-white"><strong>Action</strong></th>
                                </tr>
                                <tr>
                                    <th><input type="text" placeholder="S.NO." class=" form-control"></th>
                                    <th><input type="text" placeholder="Client Name" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Position Title" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Name" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Email" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Contact Number" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Recruiter Name/Email" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Recruiter Name/Email" class="rec-list_head"></th>
                                    <th><input type="text" placeholder="Contacted On" class="rec-list_head"></th>
                                    <th>Resume</th>
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
                                    
                                   
                                    <td>MBA</td>
                                    <td><span class="badge alert-success">Offer Accepted</span></td>
                                    <td><a href=""><span class="badge text-bg-success">Download <i class="fa-solid fa-download"></i></span></a></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
