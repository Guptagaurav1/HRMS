@extends('layouts.master', ['title' => 'Upcoming Work Anniversary'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h4 class="mt-2">UPCOMING 40 DAYS WORK ANNIVERSARY LIST</h4>
                <div>
                    <ul class="breadcrumb">
                        
                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Anniversary List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3 mt-3">
                <form class="row g-3 py-2 mt-2">
                    <div class="col-auto col-xs-12">
                        <input type="search" class="form-control" name="search" value="{{$search}}" placeholder="Search" name="search" >
                    </div>
                    <div class="col-auto col-xs-12">
                        <button type="submit" class="btn btn-primary mb-3">Search <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="col-auto col-xs-12">
                        <a href="{{route('events.work-anniversary-list')}}" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></a>
                    </div>
                    
                </form>
            </div>

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

            @if (session()->has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
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
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="srno-column text-center">S.No.</th>
                            <th class="rid-column text-center attributes-column">EMP Code</th>
                            <th class="text-center attributes-column">Work Order</th>
                            <th class="attributes-column">Name</th>
                            <th class="text-center attributes-column">Email</th>
                            <th class="text-center attributes-column">Date of Joining</th>
                            <th class="text-center attributes-column">Year Completed</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                                <tr>
                                    <td class="srno-column">{{ $loop->iteration }}</td>
                                    <td class="rid-column attributes-column">{{ $employee->emp_code }}</td>
                                    <td class="attributes-column text-center">{{ $employee->emp_work_order }}</td>
                                    <td class="attributes-column text-center">{{ $employee->emp_name }}</td>
                                    <td class="attributes-column text-center">{{ $employee->emp_email_first }}</td>
                                    <td class="attributes-column text-center">{{ date('jS F, Y', strtotime($employee->emp_doj)) }}</td>
                                    <td class="attributes-column text-center">
                                         @php
                                        $dateOfJoining = $employee->emp_doj;
                                        $today = date("Y-m-d");
                                        $diff = date_diff(date_create($dateOfJoining), date_create($comingdate));
                                        echo $diff->format('%y');
                                        @endphp
                                    </td>
                                    <td><img class="img-fluid border rounded"
                                            src="{{ asset('recruitment/candidate_documents/passport_size_photo') . '/' . $employee->getPersonalDetail->emp_photo }}"
                                            alt="no-photo" width="100" height="100"></td>
                                    <td>
                                        {{-- <a
                                            href="{{ route('events.work-anniversary-template', ['emp_code' => $employee->emp_code]) }}"><button
                                                class="btn btn-sm btn-primary">View Template Image</button></a> --}}
                                        <a href="#"><button type="button" data-bs-toggle="modal"
                                                data-bs-target="#anniversaryMailModal"
                                                data-bs-whatever="{{ $employee->emp_email_first }}"
                                                data-bs-name="{{ $employee->emp_name }}"
                                                class="btn btn-sm btn-primary">Send Email</button></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No data found.</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 my-2 p-4">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Modal --}}
@section('modal')
    <div class="modal fade" id="anniversaryMailModal" tabindex="-1" aria-labelledby="anniversaryMailModalLabel"
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
                            <input type="email" class="form-control" name="emp_mail" readonly value="" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="message-text" class="col-form-label">Attach Greeting <span
                                    class="text-danger fw-bold">*</span></label>
                            <input type="file" class="form-control" name="greeting" accept=".jpg, .png, .jpeg" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="body" class="form-label">Message / Query</label>
                            <textarea class="form-control" id="employeeworkanniversary" value="" name="message" rows="6"
                                placeholder="Write your message here"></textarea>
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
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
<script src="{{asset('assets/js/hr/work-anniversary.js')}}"></script>
@endsection