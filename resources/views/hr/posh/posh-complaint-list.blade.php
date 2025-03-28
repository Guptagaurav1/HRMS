@extends('layouts.master', ['title' => 'POSH Complaints'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center" >POSH Complaint List</h3>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="search" class="form-control" placeholder="Search" name="search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-auto">
                            <button type="reset" class="btn btn-primary mb-3"> Reset <i class="fa-solid fa-rotate-left"></i></button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive mt-3 ">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
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
                            @foreach($complaints as $complaint)
                            <tr>
                                <td class="srno-column">{{$loop->iteration}}</td>
                                <td class="rid-column">{{$complaint->employee->emp_code}}</td>
                                <td>{{$complaint->employee->emp_name}}</td>
                                <td class="attributes-column">{{$complaint->subject}}</td>
                                <td>{{$complaint->description}}</td>
                                <td>
                                    <a href="#"><button class="btn btn-sm btn-primary">Wait <i class="fa-solid fa-circle-pause"></i></button></a>
                                </td>
                                <td>{{date('jS F, Y', strtotime($complaint->created_at))}}</td>
                                <td>
    
                                    <a href="#"><button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#leaveDetailsModal">View <i
                                                class="fa-solid fa-eye"></i></i></button></a>
                                    <a href="#"><button class="btn btn-sm btn-primary">Response  <i class="fa-solid fa-reply"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('modal')

<div class="modal fade" id="leaveDetailsModal" tabindex="1" aria-labelledby="leaveDetailsModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="leaveDetailsModalLabel">Posh Complain Details</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Employee Code:</label>
                                <span class="leave_code">NA</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Employee Name:</label>
                                <span class="emp_code">NA</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Subject</label>
                                <span class="emp_name">NA</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Message</label>
                                <span class="cc text-wrap">NA</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Revert</label>
                                <span class="reason">NA</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Complain Date</label>
                                <span class="absence_dates">NA</span>
                            </div>
                        </div>
                    </div>
                   

                </div>

            </div>
        </div>
    </div>
</div>

@endsection


@endsection




