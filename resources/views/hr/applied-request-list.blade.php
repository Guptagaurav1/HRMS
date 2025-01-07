@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Leave Request List</h2>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 mt-2">
                    <div class="col-auto mb-3">
                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Leave Id</th>
                            <th class="text-center">Employee Code</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Reason for Absence</th>
                            <th class="text-center">Reporting Email</th>
                            <th class="text-center">Total No. of Days</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Applied On</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">LID-001</td>
                            <td class="text-center">EMP-123</td>
                            <td class="text-center">John Doe</td>
                            <td class="text-center">Medical</td>
                            <td class="text-center">john.doe@example.com</td>
                            <td class="text-center">3</td>
                            <td class="text-center"><span class="badge alert-success">Approved</span></td>
                            <td class="text-center">2024-12-23</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#leaveDetailsModal">View <i class="fa-solid fa-eye"></i></button>
                                <a href="{{'view-letter'}}">
                                    <button class="btn btn-sm btn-primary">Print <i class="fa-solid fa-print"></i></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection




<div class="modal fade" id="leaveDetailsModal" tabindex="-1" aria-labelledby="leaveDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="leaveDetailsModalLabel">Leave Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Leave Code</label>
                        </div>
                        <div class="col-md-8">
                            <span>Leave/0293/CL/0867</span>
                        </div>
                    </div>
                
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Employee Code</label>
                        </div>
                        <div class="col-md-8">
                            <span >PSSPL/DEL/2023-24/0293</span>
                        </div>
                    </div>
                  
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >Employee Name</label>
                        </div>
                        <div class="col-md-8">
                            <span >Vikas Verma</span>
                        </div>
                    </div>
                 
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >CC Email</label>
                        </div>
                        <div class="col-md-8">
                            <span >data-reason="Half</span>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >Reason of Absence</label>
                        </div>
                        <div class="col-md-8">
                            <span > </span>
                        </div>
                    </div>
                  
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >Absence Dates</label>
                        </div>
                        <div class="col-md-8">
                            <span >21st June, 2025</span>
                        </div>
                    </div>
                   
                    <div class="row mb-3 st-end-date">
                        <div class="col-md-4">
                            <label >Leave Start Date</label>
                        </div>
                        <div class="col-md-8">
                            <span >N/A </span>
                        </div>
                    </div>
                   
                    <div class="row mb-3 st-end-date">
                        <div class="col-md-4">
                            <label >Leave End Date</label>
                        </div>
                        <div class="col-md-8">
                            <span>N/A</span>
                        </div>
                    </div>
                  
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >No. of Days</label>
                        </div>
                        <div class="col-md-8">
                            <span >Half Day leave</span>
                        </div>
                    </div>
                  
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >Employee Comment</label>
                        </div>
                        <div class="col-md-8">
                            <span ></span>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Revert By</label>
                        </div>
                        <div class="col-md-8">
                            <span ></span>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Revert Comment</label>
                        </div>
                        <div class="col-md-8">
                            <span></span>
                        </div>
                    </div>
                  
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >Reapproved By</label>
                        </div>
                        <div class="col-md-8">
                            <span ></span>
                        </div>
                    </div>
                 
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >Reapproved Comment</label>
                        </div>
                        <div class="col-md-8">
                            <span ></span>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="fw-bold">Status</label>
                        </div>
                        <div class="col-md-8">
                            <span id="mstatus">Approved</span>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label >Apply Date</label>
                        </div>
                        <div class="col-md-8">
                            <span >1st July, 2025</span>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>


@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>


@endsection