@extends('layouts.master', ['title' => 'Leave Taken'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection
@section('contents')
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header  heading-stripe">
                        <h3 class="mt-2 text-center">My Attendance List</h3>
                    </div>
                    <div class="row mb-4 mt-2">
                        <div class="col-md-6">
                            <div class="leave-box">
                                <p class="leave-title">Approved Leave</p>
                                <p class="text-danger" style="font-size: 13px;">Your Available Leave and LWOP means
                                    deduction from Salary.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="leave-box">
                                <p class="leave-title">Last Updated Attendance</p>
                                <p>{{ date('jS F, Y', strtotime($attandance->created_at)) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="leave-box">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <p>Total Approved Leave Taken</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <span>{{ $attandance->approve_leave }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="leave-box">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <p>Total LWOP Leave Taken</p>
                                    </div>
                                    <div class="col-4 text-center">
                                        <span>{{ $attandance->lwp_leave }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 d-flex justify-content-start mx-3">
                        <form class="row g-3 mt-2">
                            <div class="col-auto">
                                <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3"> Search <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('leave.leave-taken') }}" class="btn btn-primary mb-3"> Reset</a>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive mt-3 ">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="srno-column">Month Year(Days In Month)</th>
                                    <th class="rid-column">Marked As Absent</th>
                                    <th>Working Days</th>
                                    <th class="attributes-column">Approved Leave</th>
                                    <th>Leave Taken</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($monthly_leaves as $month)
                                    @php
                                        $year_day = date('Y', strtotime($month->attendance_month));
                                        $month_day = date('m', strtotime($month->attendance_month));
                                        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month_day, $year_day);

                                        $gap_in_service = 0;
                                        $working_days = $days_in_month;
                                        if ($month->approve_leave < $month->lwp_leave) {
                                            $gap_in_service = $month->lwp_leave - $month->approve_leave; //get actual leave without wallet leave
                                            $working_days = $days_in_month - $gap_in_service; //calculate working days 
                                        }
                                    @endphp
                                    <tr>
                                        <td class="rid-column text-center">{{ $month->attendance_month }}</td>
                                        <td class="srno-column text-center">{{ $gap_in_service }}</td>
                                        <td class="text-center">{{ $working_days }}</td>
                                        <td class="attributes-column text-center">{{ $month->approve_leave }}</td>
                                        <td class="text-center">{{ $month->lwp_leave }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
