@extends('layouts.master', ['title' => 'My Dashboard'])

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/employee-dashboard.css')}}" />
@endsection

@section('contents')
<div class="fluid-container dashboard-container">
    <!-- Helpdesk content -->
    <div class="dashboard-breadcrumb mb-3 d-flex justify-content-between align-items-center">
        <h4 class="text-dark fw-bold">Helpdesk for query <i class="fa-solid fa-arrow-right fs-6"></i></h4>
        <p class="mt-2 text-dark fw-bold email-no">Email: helpdesk@prakharsoftwares.com | Contact No : 7982363536</p>

    </div>
    <!-- Employee Profile Card -->
    <div class="d-flex justify-content-center align-items-center bg-white gap-3">

        <div class="col-md-12 id-card ">

            <div class="container mt-3">
                <div class="row px-3">
                    <div class="col-4 col-sm-3 col-md-2 text-center border  mh-100">
                        @if (!empty($details->getPersonalDetail) && $details->getPersonalDetail->emp_photo)
                        <img src="{{ asset('recruitment/candidate_documents/passport_size_photo/' . $details->getPersonalDetail->emp_photo) }}"
                            alt="{{ $details->emp_name }}" class="rounded-circle img-fluid">
                        @else
                        <img src="https://th.bing.com/th/id/OIP.3P9nzziOugJKbq2zOy4WYgAAAA?rs=1&pid=ImgDetMain" alt="Avatar">
                        @endif
                    </div>
                    <div class="col-8 col-sm-9 col-md-10">
                        <h5 class="mb-1">{{ auth('employee')->user()->emp_name }}</h5>
                        <p class="text-muted mb-0 fw-bold">{{ auth('employee')->user()->emp_designation }}</p>
                    </div>
                </div>
            </div>



            <div class="info">
                <div class="row">
                    <div class="col-md">
                        <strong>Employee Code</strong><br> PSSPL/DEL/2025
                    </div>
                    <div class="col-md-6 col-xs-12">

                        <strong>Email</strong> {{auth('employee')->user()->emp_email_first}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <strong>D.O.B</strong><br> DD/MM/YEAR
                    </div>
                    <div class="col-md">
                        <strong>Phone</strong><br> {{auth('employee')->user()->emp_phone_first}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <strong>Joined Date</strong><br> DD/MM/YEAR
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- <div class="card profile-card p-3">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
            alt="Profile" />
        <div class="profile-info">
            <h4>John Doe</h4>
            <p>Software Engineer</p>
            <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
            <p><i class="fas fa-phone"></i> +123 456 7890</p>
        </div>
    </div> --}}
</div>

<!-- Tabs Design -->

<ul class="custom-tabs" id="dashboardTabs">
    <li class="tab-item active" data-id="dashboard"><i class="fas fa-home"></i> Dashboard</li>
    <li class="tab-item" data-id="payslip"><i class="fas fa-file-invoice"></i> Payslip</li>
    <li class="tab-item" data-id="leaves"><i class="fas fa-calendar-alt"></i> Leaves</li>
    <li class="tab-item" data-id="letters"> <i class="fas fa-envelope"></i> Letters</li>
</ul>

<div class="mt-4">

    {{-- Dashboard Section --}}
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

    {{-- Payslip Section --}}
    <div class="tab-content-section" id="payslip">
        <div class="card p-4">
            <h4 class="mb-3"><i class="fas fa-file-invoice-dollar"></i> Payslips (Last 5 Months)</h4>
            <ul class="list-group">
                @forelse ($salary_slips as $slip)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$slip->sal_month}}
                    <a href="{{route('preview-salary-slip', ['id' => $slip->emp_salary_id])}}"
                        class="btn btn-primary btn-sm download-btn" target="_blank">
                        View</a>
                </li>
                @empty
                <li class="list-group-item text-center">No Salary Slips Found</li>

                @endforelse

            </ul>
        </div>
    </div>

    {{-- Leaves Section --}}
    <div class="tab-content-section" id="leaves">
        <div class="card p-4">
            <h2 class="mb-3 text-center">Leave Records <span class="fw-lighter">(Year : 2025)</span></h2>
            <p><strong>Total Leaves Taken : </strong> {{$total_leaves ? $total_leaves.' days' : '' }} </p>
            <p><strong>Un-Approved Leaves : </strong> <span class="text-danger"> {{$pending_leaves ? $pending_leaves.'
                    days' : '' }} </span></p>

            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold text-dark">
                    Apply Leave
                    <a href="{{route('leave.leave_request')}}"> <button class="download-btn-custom"> Apply Leave <i
                                class="fa-solid fa-arrow-up-right-from-square"></i></button></a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center text-dark fw-bold">
                    View Applied Leave
                    <a href="{{route('applied-request-list')}}"><button class="download-btn-custom">View Applied Leave
                            <i class="fa-solid fa-arrow-up-right-from-square"></i></button></a>
                </li>
            </ul>

            {{-- <table class="custom-table mt-3">
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
            </table> --}}


        </div>
    </div>

    {{-- Letters Section --}}
    <div class="tab-content-section" id="letters">
        <div class="card p-4">
            <h4 class="mb-3"><i class="fas fa-envelope"></i> Letters</h4>
            <ul class="list-group">
                @forelse($documents as $document)
                @php
                $url = '';
                if ($document->doc_type == 'Extension') {
                $url = asset('recruitment/candidate_documents/extension_letter').'/'.$document->document;
                }
                elseif ($document->doc_type == 'Releiving') {
                $url = asset('recruitment/candidate_documents/relieving_letter').'/'.$document->document;
                }
                elseif ($document->doc_type == 'Appointment') {
                $url = asset('recruitment/candidate_documents/appointment_letter').'/'.$document->document;
                }
                @endphp

                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold text-dark">
                    {{$document->doc_type}}
                    <a href="{{$url}}" class="download-btn-custom" download><i class="fas fa-download"></i> Download</a>
                </li>
                @empty
                <tr>
                    <td class="text-center text-danger">No document found</td>
                </tr>
                @endforelse


            </ul>
        </div>
    </div>

</div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/employee-tab-dashboard.js')}}"></script>

@endsection