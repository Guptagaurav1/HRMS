@extends('layouts.master', ['title' => 'Leave Request List'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Leave Request List</h2>
                </div>
                <div class="col-md-12 my-3">
                    <div class="row mx-2">
                        <div class="col-md-6">
                            <form class="row g-3">
                                <div class="col-auto mb-3">
                                    <input type="search" class="form-control" placeholder="Search" name="search" required>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Search</button>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('leave.request_list') }}" class="btn btn-primary mb-3">Reset</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('leave.leave_request') }}" class="btn btn-primary">Apply Leave</a>
                        </div>
                    </div>
                </div>

                {{-- Show errors and notifications --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>

                @if (session()->has('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('message') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24" role="img"
                                aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('message') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                {{-- Show Request in table --}}
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
                            @forelse($leaves as $leave)
                                @php
                                    if ($leave->status == 'Approved' || $leave->status == 'Reapproved') {
                                        $color = 'success';
                                    } elseif ($leave->status == 'Disapproved' || $leave->status == 'Redisapproved') {
                                        $color = 'danger';
                                    } else {
                                        $color = 'warning';
                                    }
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $leave->leave_code }}</td>
                                    <td class="text-center">{{ $leave->emp_code }}</td>
                                    <td class="text-center">{{ $leave->employee->emp_name }}</td>
                                    <td class="text-center">{{ $leave->reason_for_absence }}</td>
                                    <td class="text-center">{{ $leave->department_head_email }}</td>
                                    <td class="text-center">{{ $leave->total_days }}</td>
                                    <td class="text-center"><span
                                            class="badge alert-{{ $color }}">{{ $leave->status }}</span>
                                    </td>
                                    <td class="text-center">{{ date('jS F,Y', strtotime($leave->created_at)) }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#leaveDetailsModal" data-bs-whatever="{{$leave->id}}">View <i
                                                class="fa-solid fa-eye"></i></button>
                                        <a href="{{ 'view-letter' }}">
                                            <button class="btn btn-sm btn-primary">Print <i
                                                    class="fa-solid fa-print"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-danger text-center" colspan="10">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="col-md-12 m-2">
                    {{ $leaves->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection



@section('modal')
    <div class="modal fade" id="leaveDetailsModal" tabindex="-1" aria-labelledby="leaveDetailsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="leaveDetailsModalLabel">Leave Details</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
                                    <span class="employee_code"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Employee Name:</label>
                                    <span class="employee_name"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">CC Mail:</label>
                                    <span class="cc_mail"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Reason Of Absence:</label>
                                    <span class="reason_absence"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Absence Dates:</label>
                                    <span class="absence_date"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">No. Of Days:</label>
                                    <span></span>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Revert By:</label>
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Revert Comment:</label>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Approved By:</label>
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Approved Comment:</label>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Status:</label>
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Apply Date:</label>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="field-container shadow-lg d-flex flex-column">
                                <label class="fw-bold">Leave Comment:</label>
                                <div class="employee-comment mt-2">
                                    <span class=""></span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
