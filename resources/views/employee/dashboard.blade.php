@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/employee-dashboard.css')}}"/>
@endsection

@section('contents')
<div class="container dashboard-container">
    <div class="dashboard-breadcrumb mb-3 d-flex justify-content-between align-items-center">
        <h4 class="text-dark">Helpdesk for query <i class="fa-solid fa-arrow-right fs-6"></i></h4>
        <p class="mt-2"><strong>Email: helpdesk@prakharsoftwares.com | Contact No : 7982363536</strong></p>

    </div>
    <div class="d-flex justify-content-between align-items-center gap-3">
        <div class="card profile-card p-3">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                alt="Profile" />
            <div class="profile-info">
                <h4>John Doe</h4>
                <p>Software Engineer</p>
                <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
                <p><i class="fas fa-phone"></i> +123 456 7890</p>
            </div>
        </div>
        <div class="card profile-card p-3">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                alt="Profile" />
            <div class="profile-info">
                <h4>John Doe</h4>
                <p>Software Engineer</p>
                <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
                <p><i class="fas fa-phone"></i> +123 456 7890</p>
            </div>
        </div>
    </div>
   

    <ul class="custom-tabs" id="dashboardTabs">
        <li class="tab-item active" data-id="dashboard"><i class="fas fa-home"></i> Dashboard</li>
        <li class="tab-item" data-id="payslip"><i class="fas fa-file-invoice"></i> Payslip</li>
        <li class="tab-item" data-id="leaves"><i class="fas fa-calendar-alt"></i> Leaves</li>
        <li class="tab-item" data-id="letters"> <i class="fas fa-envelope"></i> Letters</li>
    </ul>

    <div class="mt-4">

        <div class="tab-content-section active" id="dashboard">
            <div class="row">
                <div class="col-md-4">
                    <div class="card stats-card">
                        <h4>322</h4>
                        <p>Attendance</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stats-card">
                        <h4>23</h4>
                        <p>Late</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card stats-card">
                        <h4>77</h4>
                        <p>Overtime</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content-section" id="payslip">
            <div class="card p-4">
                <h4 class="mb-3"><i class="fas fa-file-invoice-dollar"></i> Payslips (Last 5 Months)</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        January 2025
                        <a href="#" class="btn btn-primary btn-sm download-btn"><i class="fas fa-download"></i>
                            Download</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        February 2025
                        <a href="#" class="btn btn-primary btn-sm download-btn"><i class="fas fa-download"></i>
                            Download</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        March 2025
                        <a href="#" class="btn btn-primary btn-sm download-btn"><i class="fas fa-download"></i>
                            Download</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        April 2025
                        <a href="#" class="btn btn-primary btn-sm download-btn"><i class="fas fa-download"></i>
                            Download</a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        May 2025
                        <a href="#" class="btn btn-primary btn-sm download-btn"><i class="fas fa-download"></i>
                            Download</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content-section" id="leaves">
            <div class="card p-4">
                <h2 class="mb-3 text-center">Leave Records</h2>
                <p><strong>Total Leaves Taken : </strong> 12 Days</p>
                <p><strong>Remaining Leaves : </strong> 8 Days</p>

                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold text-dark">
                        Apply Leave
                        <a href="{{route('leave.leave_request')}}">  <button class="download-btn-custom"> Apply Leave <i class="fa-solid fa-arrow-up-right-from-square"></i></button></a>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center text-dark fw-bold">
                        View Applied Leave
                 <a href="{{route('profile.profile-detail-request-list')}}"><button class="download-btn-custom">View Applied Leave <i class="fa-solid fa-arrow-up-right-from-square"></i></button></a>   
                    </li>
                </ul>

                <table class="custom-table mt-3">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2025-03-01</td>
                            <td>Sick Leave</td>
                            <td><span class="status-badge status-approved">Approved</span></td>
                        </tr>
                        <tr>
                            <td>2025-03-15</td>
                            <td>Casual Leave</td>
                            <td><span class="status-badge status-pending">Pending</span></td>
                        </tr>
                    </tbody>
                </table>

                
            </div>
        </div>

        <div class="tab-content-section" id="letters">
            <div class="card p-4">
                <h4 class="mb-3"><i class="fas fa-envelope"></i> Letters</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold text-dark">
                        Relieving Letter
                        <button class="download-btn-custom"><i class="fas fa-download"></i> Download</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold text-dark">
                        Extension Letter
                        <button class="download-btn-custom"><i class="fas fa-download"></i> Download</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold text-dark">
                        Appointment Letter
                        <button class="download-btn-custom"><i class="fas fa-download"></i> Download</button>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/employee-tab-dashboard.js')}}"></script>

@endsection