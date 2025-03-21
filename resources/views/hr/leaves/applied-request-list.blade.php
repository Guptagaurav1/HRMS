@extends('layouts.master', ['title' => 'Leave Requests'])

@section('style')

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
                        <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('applied-request-list')}}" class="btn btn-primary mb-3">Reset</a>
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
                        @forelse($leave_requests as $leave_request)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$leave_request->leave_code}}</td>
                            <td class="text-center">{{$leave_request->emp_code}}</td>
                            <td class="text-center">{{$leave_request->emp_name}}</td>
                            <td class="text-center">{{$leave_request->reason_for_absence}}</td>
                            <td class="text-center">{{$leave_request->reporting_mail}}</td>
                            <td class="text-center">{{$leave_request->total_days}}</td>
                            <td class="text-center"><span class="badge alert-success">{{$leave_request->status}}</span></td>
                            <td class="text-center">{{date('d-M-Y', strtotime($leave_request->created_on))}}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#leaveDetailsModal" data-bs-whatever="{{$leave_request->id}}">View <i class="fa-solid fa-eye"></i></button>
                                <a href="{{route('leave-request-reciept', ['id' => $leave_request->id])}}">
                                    <button class="btn btn-sm btn-primary">Print <i
                                            class="fa-solid fa-print"></i></button>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center text-danger" colspan="10">No Record Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 d-flex justify-content-center my-3">
                {{$leave_requests->links()}}
            </div>
        </div>
    </div>
</div>

@section('modal')

@endsection


<div class="modal fade" id="leaveDetailsModal" tabindex="1" aria-labelledby="leaveDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="leaveDetailsModalLabel">Leave Details</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Leave Code:</label>
                                <span class="leave_code"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Employee Code:</label>
                                <span class="emp_code"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Employee Name:</label>
                                <span class="emp_name"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">CC Mail:</label>
                                <span class="cc text-wrap"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Reason Of Absence:</label>
                                <span class="reason"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Absence Dates:</label>
                                <span class="absence_dates"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">No Of Days:</label>
                                <span class="total_days"></span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Department Head Email</label>
                                <span class="head_mail"></span>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Revert By:</label>
                                <span class="revert_by"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Revert Comment:</label>
                                <span class="revert_comment"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Reapproved By:</label>
                                <span class="approved_by"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Reapproved Comment:</label>
                                <span class="approved_comment"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Status:</label>
                                <span class="status"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container shadow-sm">
                                <label class="fw-bold">Apply Date:</label>
                                <span class="apply_date"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="field-container shadow-lg d-flex flex-column">
                            <label class="fw-bold">Leave Comment:</label>
                            <div class="employee-comment mt-2">
                                <span class="mt leave_comment"></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>


@endsection


@section('script')
<script src="{{asset('assets/js/hr/leave_request.js')}}"></script>
@endsection


