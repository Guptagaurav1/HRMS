@extends('layouts.master')
@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2> Welcome To HRMS Dashboard</h2>
        <div class="input-group dashboard-filter">
            <input type="text" class="form-control" name="basic" id="dashboardFilter" readonly>
            <label for="dashboardFilter" class="input-group-text"><i class="fa-light fa-calendar-days"></i></label>
        </div>
    </div>
    <div class="row mb-25">
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                <div class="left">
                    <p class="d-flex justify-content-between mb-2">Total Employees</p>
                    <h3 class="fw-normal">134,152</h3>
                    <p class="text-muted"><small>124 for last month</small></p>
                </div>
                <div class="right">
                    <div class="part-icon text-light rounded">
                        <span><i class="fa-light fa-user-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                <div class="left">
                    <p class="d-flex justify-content-between mb-2">Campaign Sent</p>
                    <h3 class="fw-normal">12,412</h3>
                    <p class="text-muted"><small>4 for last month</small></p>
                </div>
                <div class="right">
                    <div class="part-icon text-light rounded">
                        <span><i class="fa-light fa-bullhorn"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                <div class="left">
                    <p class="d-flex justify-content-between mb-2">Annual Profit</p>
                    <h3 class="fw-normal">$134,152</h3>
                    <p class="text-muted"><small>124 for last month</small></p>
                </div>
                <div class="right">
                    <div class="part-icon text-light rounded">
                        <span><i class="fa-light fa-dollar-sign"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                <div class="left">
                    <p class="d-flex justify-content-between mb-2">Lead Conversation</p>
                    <h3 class="fw-normal">52%</h3>
                    <p class="text-muted"><small>124 for last month</small></p>
                </div>
                <div class="right">
                    <div class="part-icon text-light rounded">
                        <span><i class="fa-light fa-magnifying-glass-chart"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-8">
            <div class="panel chart-panel-1">
                <div class="panel-header">
                    <h5>Audience Overview</h5>
                    <div class="btn-box">
                        <button class="btn btn-sm btn-outline-primary">Week</button>
                        <button class="btn btn-sm btn-outline-primary">Month</button>
                        <button class="btn btn-sm btn-outline-primary">Year</button>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="audienceOverview" class="chart-dark"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="panel">
                <div class="panel-header">
                    <h5>Recent Activity</h5>
                    <div class="btn-box">
                        <a href="#" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="hr-recent-activity">
                        <li>
                            <div class="left">
                                <span class="activity-name">Leave Approval Request</span>
                                <span class="activity-short">From "RuthDyer" UiDesign Leave On Monday 12 Jan 2020.</span>
                            </div>
                            <div class="right">
                                <span class="activity-time">6 min ago</span>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <span class="activity-name">Work Update</span>
                                <span class="activity-short">From "RuthDyer" UiDesign Leave On Monday 12 Jan 2020.</span>
                            </div>
                            <div class="right">
                                <span class="activity-time">16 min ago</span>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <span class="activity-name">Leave Approval Request</span>
                                <span class="activity-short">From "RuthDyer" UiDesign Leave On Monday 12 Jan 2020.</span>
                            </div>
                            <div class="right">
                                <span class="activity-time">6 min ago</span>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <span class="activity-name">Work Update</span>
                                <span class="activity-short">From "RuthDyer" UiDesign Leave On Monday 12 Jan 2020.</span>
                            </div>
                            <div class="right">
                                <span class="activity-time">16 min ago</span>
                            </div>
                        </li>
                        <li>
                            <div class="left">
                                <span class="activity-name">Leave Approval Request</span>
                                <span class="activity-short">From "RuthDyer" UiDesign Leave On Monday 12 Jan 2020.</span>
                            </div>
                            <div class="right">
                                <span class="activity-time">6 min ago</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="panel">
                <div class="panel-header">
                    <h5>Notice Board</h5>
                </div>
                <div class="panel-body">
                    <ul class="hr-notice-board">
                        <li>
                            <div class="activity-box">
                                <div class="date-box date-box-lg">
                                    <span>14</span>
                                    <span>Feb</span>
                                </div>
                                <div class="part-txt">
                                    <span>Meeting for campaign with sales team</span>
                                    <span class="text-muted">12:00am - 03:30pm</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-box">
                                <div class="date-box date-box-lg">
                                    <span>14</span>
                                    <span>Feb</span>
                                </div>
                                <div class="part-txt">
                                    <span>Meeting for campaign with sales team</span>
                                    <span class="text-muted">12:00am - 03:30pm</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-box">
                                <div class="date-box date-box-lg">
                                    <span>14</span>
                                    <span>Feb</span>
                                </div>
                                <div class="part-txt">
                                    <span>Meeting for campaign with sales team</span>
                                    <span class="text-muted">12:00am - 03:30pm</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-box">
                                <div class="date-box date-box-lg">
                                    <span>14</span>
                                    <span>Feb</span>
                                </div>
                                <div class="part-txt">
                                    <span>Meeting for campaign with sales team</span>
                                    <span class="text-muted">12:00am - 03:30pm</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="activity-box">
                                <div class="date-box date-box-lg">
                                    <span>14</span>
                                    <span>Feb</span>
                                </div>
                                <div class="part-txt">
                                    <span>Meeting for campaign with sales team</span>
                                    <span class="text-muted">12:00am - 03:30pm</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-8">
            <div class="panel">
                <div class="panel-header">
                    <h5>Attendance</h5>
                    <div id="tableSearch"></div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover attendance-table digi-dataTable" id="myTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Employee</th>
                                <th>Status</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Diane Nolan</td>
                                <td>
                                    <span class="badge bg-primary rounded px-2">Present</span>
                                </td>
                                <td>09:30 am</td>
                                <td>06:30 pm</td>
                                <td>
                                    <div class="btn-box">
                                        <button><i class="fa-light fa-eye"></i></button>
                                        <button><i class="fa-light fa-pen"></i></button>
                                        <button><i class="fa-light fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Paul Reynolds</td>
                                <td>
                                    <span class="badge bg-danger rounded px-2">Absent</span>
                                </td>
                                <td>09:30 am</td>
                                <td>06:30 pm</td>
                                <td>
                                    <div class="btn-box">
                                        <button><i class="fa-light fa-eye"></i></button>
                                        <button><i class="fa-light fa-pen"></i></button>
                                        <button><i class="fa-light fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Adela Perez</td>
                                <td>
                                    <span class="badge bg-primary rounded px-2">Present</span>
                                </td>
                                <td>09:30 am</td>
                                <td>06:30 pm</td>
                                <td>
                                    <div class="btn-box">
                                        <button><i class="fa-light fa-eye"></i></button>
                                        <button><i class="fa-light fa-pen"></i></button>
                                        <button><i class="fa-light fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>04</td>
                                <td>Logan van</td>
                                <td>
                                    <span class="badge bg-primary rounded px-2">Present</span>
                                </td>
                                <td>09:30 am</td>
                                <td>06:30 pm</td>
                                <td>
                                    <div class="btn-box">
                                        <button><i class="fa-light fa-eye"></i></button>
                                        <button><i class="fa-light fa-pen"></i></button>
                                        <button><i class="fa-light fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>Diane Nolan</td>
                                <td>
                                    <span class="badge bg-primary rounded px-2">Present</span>
                                </td>
                                <td>09:30 am</td>
                                <td>06:30 pm</td>
                                <td>
                                    <div class="btn-box">
                                        <button><i class="fa-light fa-eye"></i></button>
                                        <button><i class="fa-light fa-pen"></i></button>
                                        <button><i class="fa-light fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td>Diane Nolan</td>
                                <td>
                                    <span class="badge bg-primary rounded px-2">Present</span>
                                </td>
                                <td>09:30 am</td>
                                <td>06:30 pm</td>
                                <td>
                                    <div class="btn-box">
                                        <button><i class="fa-light fa-eye"></i></button>
                                        <button><i class="fa-light fa-pen"></i></button>
                                        <button><i class="fa-light fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="table-bottom-control"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-4">
            <div class="panel">
                <div class="panel-header">
                    <h5>Upcoming Interviews</h5>
                    <div class="btn-box">
                        <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="upcoming-interview">
                        <li>
                            <div class="avatar avatar-lg">
                                <img src="{{asset('assets/images/avatar-2.png')}}" class="rounded" alt="user">
                            </div>
                            <div class="part-txt">
                                <span class="applicant-name">Natalie Gibson</span>
                                <span class="applicant-role">
                                    <small><span class="text-muted">Ui/UX Designer</span></small>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="avatar avatar-lg">
                                <img src="{{asset('assets/images/avatar-3.png')}}" class="rounded" alt="user">
                            </div>
                            <div class="part-txt">
                                <span class="applicant-name">Natalie Gibson</span>
                                <span class="applicant-role">
                                    <small><span class="text-muted">Ui/UX Designer</span></small>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="avatar avatar-lg">
                                <img src="{{asset('assets/images/avatar-4.png')}}" class="rounded" alt="user">
                            </div>
                            <div class="part-txt">
                                <span class="applicant-name">Natalie Gibson</span>
                                <span class="applicant-role">
                                    <small><span class="text-muted">Ui/UX Designer</span></small>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="avatar avatar-lg">
                                <img src="{{asset('assets/images/avatar-5.png')}}" class="rounded" alt="user">
                            </div>
                            <div class="part-txt">
                                <span class="applicant-name">Natalie Gibson</span>
                                <span class="applicant-role">
                                    <small><span class="text-muted">Ui/UX Designer</span></small>
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="avatar avatar-lg">
                                <img src="{{asset('assets/images/avatar-6.png')}}" class="rounded" alt="user">
                            </div>
                            <div class="part-txt">
                                <span class="applicant-name">Natalie Gibson</span>
                                <span class="applicant-role">
                                    <small><span class="text-muted">Ui/UX Designer</span></small>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src={{asset('assets/js/dashboard.js')}}></script>
@endsection