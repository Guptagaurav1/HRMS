@extends('layouts.master', ['title' => 'Leave Policies'])
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Leave Policies</h3>
                </div>
                <div class="col-md-12  mt-2">
                    <div class="row mx-2">
                        <div class="col-md-12">
                            <form class="row form">
                                <div class="col-auto mb-3">
                                    <input type="search" class="form-control" name="search"
                                        placeholder="Search" value="{{ $search }}" required>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                    <a href="{{ route('leave-policy.list') }}" class="btn btn-primary mb-3">Clear <i
                                            class="fa-solid fa-eraser"></i></a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="table-responsive vh-100">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Period Type</th>
                                    <th>Duration Period</th>
                                    <th>Leave Carry Forward</th>
                                    <th>Leave Per Month</th>
                                    <th>Paid Leave</th>
                                    <th>Casual Leave</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($leavePolicies as $policy)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-capitalize">{{ $policy->period }}</td>
                                        <td>{{ $policy->duration }}</td>
                                        <td class="text-capitalize">{{ $policy->leave_carry_forward }}</td>
                                        <td>{{ $policy->per_month_leave }}</td>
                                        <td>{{ $policy->paid_leave }}</td>
                                        <td>{{ $policy->casual_leave }}</td>
                                        <td><button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editLeave"
                                                data-bs-whatever="{{ $policy->id }}">Edit</button>
                                            @if ($policy->status == '1')
                                                <button class="btn btn-danger mx-2 deactive my-2"
                                                    data-id="{{ $policy->id }}">Deactive</button>
                                            @endif
                                            @if ($policy->status == '0')
                                                <button class="btn btn-success mx-2 active my-2"
                                                    data-id="{{ $policy->id }}">Active</button>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="8">No Record Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 my-2">
                        {{ $leavePolicies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    
    {{-- Edit Leave Modal --}}
    <div class="modal fade" id="editLeave" tabindex="-1" aria-labelledby="editLeaveLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light">Update Policy</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="update-leave">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="leave_id" value="" required>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Period Type<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="period"
                                placeholder="Enter Holiday Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">During Period<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="duration" placeholder="Enter Duration" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Leave Carry Forward<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="leave_carry_forward" placeholder="Enter Leave Carry Forward" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Leave Per Month<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="per_month_leave" placeholder="Enter Allowed Leave Per Month" min="0" max="3" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Paid Leave<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="paid_leave" placeholder="Enter Total Paid Leaves Per Year" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Casual Leave<span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="casual_leave" placeholder="Enter Total Casual Leave Year" min="0" max="12" required>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/masters/leave-policy.js') }}"></script>
@endsection
