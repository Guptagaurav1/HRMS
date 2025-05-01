@extends('layouts.master', ['title' => 'Dashboard'])

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/HR-dashboard.css')}}" />

@endsection

@section('contents')

<div class="dashboard-breadcrumb mb-25">
    <h2> Welcome Prakhar Softwares HRMS Dashboard</h2>
    {{-- <div class="input-group dashboard-filter">
        <input type="text" class="form-control" name="basic" id="dashboardFilter" readonly>
        <label for="dashboardFilter" class="input-group-text"><i class="fa-light fa-calendar-days"></i></label>
    </div> --}}
</div>
<div class="dashboard-breadcrumb mb-3 d-flex justify-content-between align-items-center">
    <h2 class="text-dark">Helpdesk for query <i class="fa-solid fa-arrow-right fs-6"></i></h2>
    <p class="mt-2"><strong>Email: helpdesk@prakharsoftwares.com | Contact No : 7982363536</strong></p>
</div>
<div class="fluid-container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel chart-panel-1">
                <div class="d-flex justify-content-center flex-wrap gap-5 px-5">
                    <div class="card profile-card border">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="Profile" />
                        <div class="profile-info">
                            <h4 class="text-center">{{ auth()->user()->first_name." ".auth()->user()->last_name}}</h4>
                            <p><i class="fas fa-user"></i> {{ ucwords(str_replace("_", ' ',auth()->user()->role->role_name)) }}</p>
                            <p><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                            <p><i class="fas fa-phone"></i> {{ auth()->user()->phone }}</p>
                        </div>
                    </div>
                    <div class="card profile-card ">
                        <div class="panel-body">
                            <div id="pieChart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-white fw-bold text-center">Today Birthday </h5>
                        </div>
                        <div class="panel-body">
                            <ul class="upcoming-interview">
                                @forelse($todayBirthdays as $key => $value)
                                <li>
                                    <div class="avatar avatar-lg">
                                        @if(!empty($value->getPersonalDetail->emp_photo))
                                        <img src="{{ asset('recruitment/candidate_documents/passport_size_photo/'. $value->getPersonalDetail->emp_photo) }}" class="img-fluid rounded" alt="user" title="{{ $value->getPersonalDetail->emp_photo }}">
                                        @else
                                        <img src="{{ asset('assets/images/avatar-2.png') }}" class="rounded" alt="user" style="width: 50px;height:70px;">
                                        @endif

                                    </div>
                                    <div class="part-txt">
                                        <span class="applicant-name">{{ $value->emp_name }}</span>
                                        <span class="applicant-role">
                                            <small><span class="text-muted">{{ $value->emp_designation }}</span></small>
                                        </span>
                                    </div>
                                </li>
                                @empty
                                <li>
                                    <div class="avatar avatar-lg">

                                    </div>
                                    <div class="part-txt">
                                        <span class="applicant-role">
                                            <small><span class="text-muted">Today No Birthday Available in our system </span></small>
                                        </span>
                                    </div>
                                </li>
                                @endforelse
                                {{ $todayBirthdays->links() }}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-white fw-bold">Today Marriage Anniversary</h5>
                        </div>
                        <div class="panel-body">
                            <ul class="upcoming-interview">
                                @forelse($todayAnniversary as $key => $value)
                                <li>
                                    <div class="avatar avatar-lg">
                                        @if(!empty($value->getPersonalDetail->emp_photo))
                                        <img src="{{ asset('recruitment/candidate_documents/passport_size_photo/'. $value->getPersonalDetail->emp_photo) }}" class="rounded" alt="user" title="{{ $value->getPersonalDetail->emp_photo }}">
                                        @else
                                        <img src="{{ asset('assets/images/avatar-2.png') }}" class="rounded" alt="user">
                                        @endif
                                    </div>
                                    <div class="part-txt">
                                        <span class="applicant-name">{{ $value->emp_name }}</span>
                                        <span class="applicant-role">
                                            <small><span class="text-muted">{{ $value->emp_designation }}</span></small>
                                        </span>
                                    </div>
                                </li>
                                @empty
                                <li>
                                    <div class="avatar avatar-lg">

                                    </div>
                                    <div class="part-txt">
                                        <span class="applicant-role">
                                            <small><span class="text-muted">Today No Marriage Anniversary Available in our system </span></small>
                                        </span>
                                    </div>

                                </li>
                                @endforelse
                                {{ $todayAnniversary->links() }}
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-white fw-bold">Today Work Anniversary</h5>

                        </div>
                        <div class="panel-body">
                            <ul class="upcoming-interview">
                                @forelse($todayWorkAnniversarys as $key => $value)
                                <li>
                                    <div class="avatar avatar-lg">
                                        @if(!empty($value->getPersonalDetail->emp_photo))
                                        <img src="{{ asset('recruitment/candidate_documents/passport_size_photo/'. $value->getPersonalDetail->emp_photo) }}" class="rounded" alt="user" title="{{ $value->getPersonalDetail->emp_photo }}">
                                        @else
                                        <img src="{{ asset('assets/images/avatar-2.png') }}" class="rounded" alt="user">
                                        @endif
                                    </div>
                                    <div class="part-txt">
                                        <span class="applicant-name">{{ $value->emp_name }}</span>
                                        <span class="applicant-role">
                                            <small><span class="text-muted">{{ $value->emp_designation }}</span></small>
                                        </span>
                                    </div>
                                </li>
                                @empty
                                <li>
                                    <div class="avatar avatar-lg">

                                    </div>
                                    <div class="part-txt">
                                        <span class="applicant-role">
                                            <small><span class="text-muted">Today No work Anniversay Available in our system </span></small>
                                        </span>
                                    </div>

                                </li>
                                @endforelse

                                {{$todayWorkAnniversarys->links()}}
                            </ul>
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
                                    <p class="d-flex justify-content-between mb-2">Total Employees</p>
                                    <h3 class="fw-normal">{{ $totalCountEmployees }}</h3>
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
                                    <p class="d-flex justify-content-between mb-2">Internal Employee</p>
                                    <h3 class="fw-normal">{{ $totalCountInternalEmployees }}</h3>
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
                                    <p class="d-flex justify-content-between mb-2">External Employee</p>
                                    <h3 class="fw-normal">{{ $totalCountExternalEmployees }}</h3>
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
                                    <p class="d-flex justify-content-between mb-2">Total Work Orders</p>
                                    <h3 class="fw-normal">{{ $totalCountWorkOrders }}</h3>
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
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">S No.</th>
                                        {{-- <th class="text-center">Employee Code</th> --}}
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Work Order</th>
                                        <th class="text-center">Department</th>
                                        {{-- <th class="text-center">Designation</th> --}}
                                        <th class="text-center">Email</th>
                                        <th class="text-center">DOB</th>
                                        <th class="text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($employees as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        {{-- <td class="text-center attributes-column">{{ $value->emp_code }}</td> --}}
                                        <td class="text-center">{{ $value->emp_name }}</td>
                                        <td class="text-center">{{ $value->emp_work_order }}</td>
                                        <td class="text-center">{{ $value->department }}</td>
                                        {{-- <td class="text-center">{{ $value->emp_designation }}</td> --}}
                                        <td class="text-center">{{ $value->emp_email_first }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($value->getPersonalDetail->emp_dob)->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <button type="button" data-bs-target="#birthdayMailModal" data-bs-whatever="{{ $value->emp_email_first }}" data-bs-name="{{ $value->emp_name }}" class="btn btn-sm btn-primary modal-happy-birthday">Send Email</button>
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
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">S No.</th>
                                        {{-- <th class="text-center">Employee Code</th> --}}
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Work Order</th>
                                        <th class="text-center">Department</th>
                                        {{-- <th class="text-center">Designation</th> --}}
                                        <th class="text-center">Email</th>
                                        <th class="text-center">DOM</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employeeMarriageAnni as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        {{-- <td class="text-center attributes-column">{{ $value->emp_code }}</td> --}}
                                        <td class="text-center">{{ $value->emp_name }}</td>
                                        <td class="text-center">{{ $value->emp_work_order }}</td>
                                        <td class="text-center">{{ $value->department }}</td>
                                        {{-- <td class="text-center">{{ $value->emp_designation }}</td> --}}
                                        <td class="text-center">{{ $value->emp_email_first }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($value->getPersonalDetail->emp_dom)->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <button type="button" data-bs-target="#MarriageMailModal" data-bs-whatever="{{ $value->emp_email_first }}" data-bs-name="{{ $value->emp_name }}" class="btn btn-sm btn-primary modal-marriage-anniversary">Send Email</button> </td>
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
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
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
                                        <td class="text-center">{{ \Carbon\Carbon::parse($value->emp_doj)->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <button type="button" data-bs-target="#WorkAnniversaryMailModal" data-bs-whatever="{{ $value->emp_email_first }}" data-bs-name="{{ $value->emp_name }}" class="btn btn-sm btn-primary modal-work-anniversary">Send Email</button>
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
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
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
                                        <td class="text-center">{{ $value->employee->emp_code ? $value->employee->emp_code : ''  }}</td>
                                        <td class="text-center">{{ $value->employee->emp_name ? $value->employee->emp_name : ''  }}</td>
                                        <td class="text-center">{{ $value->employee->reporting_email ? $value->employee->reporting_email : ''  }}</td>
                                        <td class="text-center attributes-column">{{ $value->reason_for_absence ? $value->reason_for_absence : ''  }}</td>
                                        <td class="text-center">{{ $value->absence_dates ? $value->absence_dates : ''  }}</td>
                                        <td class="text-center"><span class="badge text-bg-primary">{{ $value->status ? $value->status : ''  }}</span></td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($value->created_at)->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <div>
                                                <a href="javascript:void(0)" class="modal-leave-details" data-url="{{ route('leaveDetails', $value->id) }}">
                                                    <button type="button" class="btn btn-sm btn-primary">Show</button>
                                                </a>

                                                @if (
                                                ($value->status == 'Wait' || $value->status == 'Modified') &&
                                                auth()->check() &&
                                                $value->department_head_email == auth()->user()->email)
                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#responseModal" data-bs-whatever="{{ $value->id }}">Response</button>
                                                @endif
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
    </div>

</div>
@endsection

{{-- Modal employee birthday --}}

@section('modal')
<div class="modal fade" id="birthdayMailModal" tabindex="-1" aria-labelledby="birthdayMailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light">Employee Birthday Wish Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="send-birthday form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">To</label>
                        <input type="email" class="form-control" name="emp_mail" id="emp_mail" value="" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Message / Query</label>
                        <textarea class="form-control" id="employeebirthday" value="" name="message" rows="6" placeholder="Write your message here"></textarea>
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

{{-- send Marriage Anniversary mail --}}


<div class="modal fade" id="MarriageMailModal" tabindex="-1" aria-labelledby="MarriageMailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light">Employee Marriage Anniversary Wish Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="send-marriage-anniversery form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">To</label>
                        <input type="email" class="form-control" name="emp_mail" id="emp_mail_marriage" value="" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Message / Query</label>
                        <textarea class="form-control" id="employeemarriage" value="" name="message" rows="6" placeholder="Write your message here"></textarea>
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




{{-- send work Anniversary mail --}}


<div class="modal fade" id="WorkAnniversaryMailModal" tabindex="-1" aria-labelledby="WorkAnniversaryMailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light">Employee Work Anniversary Wish Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="send-work-anniversery form" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">To</label>
                        <input type="email" class="form-control" name="emp_mail" id="emp_mail_work" value="" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Message / Query</label>
                        <textarea class="form-control" id="employeeworkanniversary" value="" name="message" rows="6" placeholder="Write your message here"></textarea>
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


{{-- Leave Details Show --}}


<div class="modal fade" id="leaveDetailsModal" tabindex="-1" aria-labelledby="leaveDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light">Leave Request Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Leave Code</label>
                    </div>
                    <div class="col-md-7">
                        <span id="leave_code"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Employee Code</label>
                    </div>
                    <div class="col-md-7">
                        <span id="employee_code"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Employee Name</label>
                    </div>
                    <div class="col-md-7">
                        <span id="employee_name"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">CC Email</label>
                    </div>
                    <div class="col-md-7">
                        <span id="cc_email"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Reason of Absence</label>
                    </div>
                    <div class="col-md-7">
                        <span id="reason_of_absence"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Absent Dates</label>
                    </div>
                    <div class="col-md-7">
                        <span id="leave_start_date"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">No. of Days</label>
                    </div>
                    <div class="col-md-7">
                        <span id="no_of_days"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Employee comment</label>
                    </div>
                    <div class="col-md-7">
                        <span id="employee_comment"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Status</label>
                    </div>
                    <div class="col-md-7">
                        <span id="status"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="leavCode" class="col-form-label">Apply Date</label>
                    </div>
                    <div class="col-md-7">
                        <span id="apply_date"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


{{-- Response Modal --}}

<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light" id="responseModalLabel">Leave Response</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form leave-response">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="request_id" value="">
                    <input type="hidden" name="response" value="">
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="response-message" class="col-form-label">Reply:</label>
                        <textarea class="form-control" name="response-text" id="response-message" placeholder="Enter Reply Message"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary response" data-id="approved">Approve</button>
                    <button type="submit" class="btn btn-danger response" data-id="disapproved">Disapproved</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{ asset('assets/js/hr/leave_request.js') }}"></script>
<script src="{{ asset('assets/js/hr/hr-dashboard.js') }}"></script>
<script src="{{asset('assets/js/employee-tab-dashboard.js')}}"></script>
<script src="assets/js/chart-page.js"></script>
@endsection
