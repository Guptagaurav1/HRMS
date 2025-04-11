@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/HR-dashboard.css')}}" />

@endsection

@section('contents')
<div class="dashboard-breadcrumb mb-25">
    <h2 class="hr-dashboard-heading"> Welcome Prakhar Softwares HRMS Dashboard</h2>
    <div class="input-group dashboard-filter">
        <input type="text" class="form-control" name="basic" id="dashboardFilter" readonly>
        <label for="dashboardFilter" class="input-group-text"><i class="fa-light fa-calendar-days"></i></label>
    </div>
</div>
<div class="dashboard-breadcrumb mb-3 d-flex justify-content-between align-items-center">
    <h2 class="text-dark">Helpdesk for query <i class="fa-solid fa-arrow-right fs-6"></i></h2>
    <p class="mt-2"><strong>Email: helpdesk@prakharsoftwares.com | Contact No : 7982363536</strong></p>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="panel chart-panel-1">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="card profile-card ">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                            alt="Profile" />
                        <div class="profile-info">
                            <h4 class="text-center">{{ auth()->user()->first_name." ".auth()->user()->last_name}}</h4>
                            <p><i class="fas fa-user"></i> {{ ucwords(str_replace("_", ' ',auth()->user()->role->role_name))
                                }}</p>
                            <p><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                            <p><i class="fas fa-phone"></i> {{ auth()->user()->phone }}</p>
                        </div>
                    </div>
                   
                </div>
            </div>
    
    
            <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-white fw-bold">Today Birthday</h5>
                            
                        </div>
                        <div class="panel-body">
                            <ul class="upcoming-interview">
                                <li>
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/avatar-2.png" class="rounded" alt="user">
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
                                        <img src="assets/images/avatar-3.png" class="rounded" alt="user">
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
                                        <img src="assets/images/avatar-4.png" class="rounded" alt="user">
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
                                        <img src="assets/images/avatar-5.png" class="rounded" alt="user">
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
                                        <img src="assets/images/avatar-6.png" class="rounded" alt="user">
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
          
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white fw-bold">Today Marriage Work Anniversary</h5>
                    </div>
                    <div class="panel-body">
                        <ul class="upcoming-interview">
                            <li>
                                <div class="avatar avatar-lg">
                                    <img src="assets/images/avatar-2.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-3.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-4.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-5.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-6.png" class="rounded" alt="user">
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
    
            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white fw-bold">Today Marriage  Anniversary</h5>
                       
                    </div>
                    <div class="panel-body">
                        <ul class="upcoming-interview">
                            <li>
                                <div class="avatar avatar-lg">
                                    <img src="assets/images/avatar-2.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-3.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-4.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-5.png" class="rounded" alt="user">
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
                                    <img src="assets/images/avatar-6.png" class="rounded" alt="user">
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
        
    
    
    </div>
    
    
    <ul class="custom-tabs" id="dashboardTabs">
        <li class="tab-item active" data-id="dashboard"><i class="fas fa-home"></i> Dashboard</li>
        <li class="tab-item" data-id="employee-Birthday"><i class="fas fa-file-invoice"></i> Employee Birthday
        </li>
        <li class="tab-item" data-id="employee-marriage-anniversary"><i class="fas fa-calendar-alt"></i>
            Employee Marriage Anniversary</li>
        <li class="tab-item" data-id="employee-work-anniversary"> <i class="fas fa-envelope"></i> Employee Work
            Anniversary</li>
        <li class="tab-item" data-id="leave-request"> <i class="fas fa-envelope"></i> Leave Request</li>
    </ul>
    
    <div class="mt-5 mb-5">
        <div class="tab-content-section active" id="dashboard">
            <div class="row border px-3 bg-white">
                <div class="col-lg-3 col-6 col-xs-12">
                    <div class="dashboard-top-box dashboard-top-box-2 rounded border-0 panel-bg">
                        <div class="left">
                            <p class="d-flex justify-content-between mb-2 fw-bold text-dark">Total Employees</p>
                            <h3 class="fw-normal fw-bold text-dark">{{ $totalCountEmployees }}</h3>
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
                            <p class="d-flex justify-content-between mb-2 fw-bold text-dark">Internal Employee</p>
                            <h3 class="fw-normal fw-bold text-dark">{{ $totalCountInternalEmployees }}</h3>
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
                            <p class="d-flex justify-content-between mb-2 fw-bold text-dark">External Employee</p>
                            <h3 class="fw-normal fw-bold text-dark">{{ $totalCountExternalEmployees }}</h3>
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
                            <p class="d-flex justify-content-between mb-2 fw-bold text-dark">Total Work Orders</p>
                            <h3 class="fw-normal fw-bold text-dark">{{ $totalCountWorkOrders }}</h3>
                        </div>
                        <div class="right">
                            <div class="part-icon text-light rounded">
                                <span><i class="fa-light fa-magnifying-glass-chart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="tab-content-section" id="employee-Birthday">
            <div class="card p-4">
                <h4 class="text-center">Employee Birthday List</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">S No.</th>
                                <th class="text-center">Employee Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Work Order</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">DOB</th>
                                <th class="text-center">Action</th>
    
                            </tr>
                        </thead>
                        <tbody>
    
                            @forelse ($employees as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center attributes-column">{{ $value->emp_code }}</td>
                                <td class="text-center">{{ $value->emp_name }}</td>
                                <td class="text-center">{{ $value->emp_work_order }}</td>
                                <td class="text-center">{{ $value->department }}</td>
                                <td class="text-center">{{ $value->emp_designation }}</td>
                                <td class="text-center">{{ $value->emp_email_first }}</td>
                                <td class="text-center">{{
                                    \Carbon\Carbon::parse($value->getPersonalDetail->emp_dob)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0);"><button type="button" data-bs-toggle="modal"
                                            data-bs-target="#birthdayMailModal"
                                            data-bs-whatever="{{ $value->emp_email_first }}"
                                            class="btn btn-sm btn-primary">Send Email</button></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="9"><span class="text-danger"> Record not found</span></td>
                            </tr>
                            @endforelse
    
    
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="tab-content-section" id="employee-marriage-anniversary">
            <div class="card p-4">
                <h4 class="text-center">Employee Marriage Anniversary List</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">S No.</th>
                                <th class="text-center">Employee Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Work Order</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">DOM</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employeeMarriageAnni as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center attributes-column">{{ $value->emp_code }}</td>
                                <td class="text-center">{{ $value->emp_name }}</td>
                                <td class="text-center">{{ $value->emp_work_order }}</td>
                                <td class="text-center">{{ $value->department }}</td>
                                <td class="text-center">{{ $value->emp_designation }}</td>
                                <td class="text-center">{{ $value->emp_email_first }}</td>
                                <td class="text-center">{{
                                    \Carbon\Carbon::parse($value->getPersonalDetail->emp_dom)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm">Send Email</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="9"><span class="text-danger"> Record not found</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="tab-content-section" id="employee-work-anniversary">
            <div class="card p-4">
                <h4 class="text-center">Employee Work Anniversary List</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">S No.</th>
                                <th class="text-center">Employee Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Work Order</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">DOJ</th>
                                <th class="text-center">Action</th>
    
                            </tr>
                        </thead>
                        <tbody>
    
                            @forelse ($employeeWorkAnniversary as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center attributes-column">{{ $value->emp_code }}</td>
                                <td class="text-center">{{ $value->emp_name }}</td>
                                <td class="text-center">{{ $value->emp_work_order }}</td>
                                <td class="text-center">{{ $value->department }}</td>
                                <td class="text-center">{{ $value->emp_designation }}</td>
                                <td class="text-center">{{ $value->emp_email_first }}</td>
                                <td class="text-center">{{
                                    \Carbon\Carbon::parse($value->getPersonalDetail->emp_doj)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm">Send Email</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="9"><span class="text-danger"> Record not found</span></td>
                            </tr>
                            @endforelse
    
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <div class="tab-content-section" id="leave-request">
            <div class="card p-4">
                <h4 class="text-center">Leave Request List</h4>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">S No.</th>
                                <th class="text-center">Leave Id</th>
                                <th class="text-center">Employee Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Reporting Email</th>
                                <th class="text-center">Reason For Absence</th>
                                <th class="text-center">Absence Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Applied On</th>
                                <th class="text-center">Action</th>
    
                            </tr>
                        </thead>
                        <tbody>
    
                            @forelse($employeeLeaves as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center attributes-column">{{ $value->leave_code }}</td>
                                <td class="text-center">{{ $value->employee->emp_code ? $value->employee->emp_code : '' }}
                                </td>
                                <td class="text-center">{{ $value->employee->emp_name ? $value->employee->emp_name : '' }}
                                </td>
                                <td class="text-center">{{ $value->employee->reporting_email ?
                                    $value->employee->reporting_email : '' }}</td>
                                <td class="text-center attributes-column">{{ $value->reason_for_absence ?
                                    $value->reason_for_absence : '' }}</td>
                                <td class="text-center">{{ $value->absence_dates ? $value->absence_dates : '' }}</td>
                                <td class="text-center"><span class="badge text-bg-primary">{{ $value->status ?
                                        $value->status : '' }}</span></td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}
                                </td>
                                <td class="text-center">
                                    <div>
                                        <button type="button" class="btn btn-primary btn-sm">View</button>
                                        <button type="button" class="btn btn-primary btn-sm">Response</button>
    
                                    </div>
    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="9"><span class="text-danger"> Record not found</span></td>
                            </tr>
                            @endforelse
    
    
    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div id="audienceOverview" class="chart-dark"></div>
                </div>
        
        
            </div>
        </div>
        </div>
    </div>

</div>




@endsection

{{-- Modal employee birthday --}}

@section('modal')
<div class="modal fade" id="birthdayMailModal" tabindex="-1" aria-labelledby="birthdayMailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light">Employee Wish Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="send-greeting form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">To</label>
                        <input type="email" class="form-control" name="emp_mail" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Attach Greeting <span
                                class="text-danger fw-bold">*</span></label>
                        <input type="file" class="form-control" name="greeting" accept=".jpg, .png, .jpeg" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary sendbutton">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/employee-tab-dashboard.js')}}"></script>
<script src="assets/js/chart-page.js"></script>
@endsection