@extends('layouts.master')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Attendance List</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                            <li>Attendance List</li>
                        </ul>
                    </div>
                </div>
                <div class="row px-3 mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>

                    @if ($message = Session::get('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img"
                                    aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    {{ $message }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img"
                                    aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    {{ $message }}
                                </div>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form method="get" class="row g-3 py-2 mt-2">
                        <div class="col-auto col-xs-12">
                            <input type="text" class="form-control" name="search" placeholder="Search"
                                value="{{ $search }}" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>

                        </div>
                        <div class="col-auto col-xs-12">
                            <a href="{{ route('attendance-list') }}" class="col-xs-12"><button type="button"
                                    class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>

                        </div>
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">Employee Code</th>
                                <th class="text-center">Emp Name</th>
                                <th class="text-center">Month Year (Days in Month)</th>
                                <th class="text-center">Work Order</th>
                                <th class="text-center">Marked as Absent</th>
                                <th class="text-center">Working Days</th>
                                <th class="text-center">Approved Leave</th>
                                <th class="text-center">LWOP Leave</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wo_attendances as $key => $wo_attendance)
                                <tr>
                                    <td class="text-center attributes-column">
                                        {{ $wo_attendance->empDetail->emp_code ?? null }}</td>
                                    <td class="text-center attributes-column">
                                        {{ $wo_attendance->empDetail->emp_name ?? null }}</td>
                                    <td class="text-center attributes-column">{{ $wo_attendance->attendance_m_y ?? null }}
                                    </td>
                                    <td class="text-center attributes-column">{{ $wo_attendance->wo_number ?? null }}</td>
                                    <td class="text-center attributes-column">{{ $wo_attendance->gap_in_service ?? null }}
                                    </td>
                                    <td class="text-center attributes-column">{{ $wo_attendance->working_days ?? null }}</td>
                                    <td class="text-center attributes-column">{{ $wo_attendance->approve_leave ?? null }}
                                    </td>
                                    <td class="text-center attributes-column">{{ $wo_attendance->lwp_leave ?? null }}</td>
                                    <td class="text-center attributes-column">
                                        {{ $wo_attendance->empDetail->emp_designation ?? null }}</td>
                                    <td class="text-center attributes-column">
                                        @if (auth()->user()->hasPermission('edit-attendance'))
                                            <a href="{{ route('edit-attendance', $wo_attendance->id) }}"><button
                                                    class="btn btn-sm btn-primary">Edit <i
                                                        class="fa-solid fa-pen-to-square"></i></button></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center"><span class="text-danger">No Record Found</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                  
                </div>

                <div class="col-md-12 my-2 mb-2">
                      {{ $wo_attendances->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
