@extends('layouts.master', ['title' => 'Employees'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Employee List</h2>
                </div>
                <div class="row" class="mt-5">
                    <p class="text-danger " id="search-applicable">** Search applicable on Emp Id/Name/Work Order
                        Number/Designation/Contact/Email (Official/ Personal )/Job Place/Qualification</p>
                </div>
                <div class="panel-body">
                    <div class="table-filter-option">
                        <div class="row g-3">
                            <div class="col-xl-10 col-9 col-xs-12">
                                <div class="col-md-12 d-flex justify-content-start">
                                    <form class="row g-3">
                                        <div class="col-auto">
                                            <input type="search" class="form-control" placeholder="Search" name="search"
                                                value="{{ $search }}" required>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary mb-3"> Search <i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ route('employee.employee-list') }}"
                                                class="btn btn-primary mb-3">Reset <i class="fa-solid fa-rotate-left"></i></a>
                                        </div>
                                    </form>
                                </div>
                                <div class="row g-3">
                                    <div class="col-auto flex-1">
                                       
                                        <form class="export-csv" action="{{route('employee.export')}}" method="post">
                                            @csrf
                                            <div class="d-none">
                                                <input type="hidden" name="search" value="{{ $search }}">
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary">CSV <i
                                                    class="fa-solid fa-download"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-sm btn-primary" id="send-credential" disabled>
                                            <i class="fa-solid fa-key"></i> Send Credential
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SVG images and Notifications --}}
                    <div class="row ">
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

                        @if (session()->has('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                                    role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

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

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="all"
                                                id="markAllEmployee">
                                        </div>
                                    </th>
                                    <th>Emp Id</th>
                                    <th>Name</th>
                                    <th>Work Order No</th>
                                    <th>Designation</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date Of Joining</th>
                                    <th>Job Place</th>
                                    <th>Experience</th>
                                    <th>Highest Qualification</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th> Send Appointment Letter</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employees as $employee)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                @if ($employee->getBankDetail && $employee->getBankDetail->emp_sal_structure_status == 'completed')
                                                    <input class="form-check-input emp_check" name="emp_ids[]"
                                                        value="{{ $employee->id }}" type="checkbox">
                                                @endif
                                            </div>
                                        </td>

                                        <td>
                                            @if (
                                                ($employee->getBankDetail &&
                                                    (empty($employee->getBankDetail->emp_sal_structure_status) ||
                                                        $employee->getBankDetail->emp_sal_structure_status == 'pending')) ||
                                                    empty($employee->getBankDetail))
                                                <span class="text-danger">Pending structure</span> <br>
                                            @endif
                                            <a href="{{ route('employee-details', ['empid' => $employee->id]) }}"
                                                class="text-primary"> {{ $employee->emp_code }}</a>
                                        </td>


                                        <td>{{ $employee->emp_name }} </td>
                                        <td>
                                            {{ $employee->emp_work_order }}
                                        </td>
                                        <td>{{ $employee->emp_designation }}</td>
                                        <td>{{ $employee->emp_phone_first }}</td>
                                        <td>{{ $employee->emp_email_first }}</td>
                                        <td>
                                            <span
                                                class="address-txt">{{ date('jS F,Y', strtotime($employee->emp_doj)) }}</span>
                                        </td>
                                        <td>{{ $employee->emp_place_of_posting }}</td>
                                        <td>{{ $employee->experience ? $employee->experience->emp_experience . ' yr' : '-' }}
                                        </td>
                                        <td>{{ $employee->education ? $employee->education->emp_highest_qualification : '-' }}
                                        </td>
                                        <td class="text-capitalize">{{ $employee->emp_current_working_status }}</td>
                                        <td> <a href="{{ route('employee.edit-employee', ['id' => $employee->id]) }}"><button
                                                    class="btn btn-sm btn-primary"> <i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</button></td></a>
                                        <td class="my-3">
                                            {{-- <a href="{{ route('employee.send-letter', ['id' => $employee->id]) }}"> --}}
                                            @if (Illuminate\Support\Str::lower($employee->emp_current_working_status) == 'active' &&
                                                    $employee->getBankDetail &&
                                                    $employee->getBankDetail->emp_sal_structure_status == 'completed')
                                                <button class="btn btn-sm btn-primary send-letter"
                                                    data-id={{ $employee->id }}>Send Letter <i
                                                        class="fa-solid fa-paper-plane"></i></button>
                                            @endif
                                            {{-- </a> --}}
                                            <a href="{{ route('employee.view-letter', ['id' => $employee->id]) }}"><button
                                                    class="btn btn-sm btn-primary">View Letter <i
                                                        class="fa-solid fa-eye"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">No Record Found.</td>
                                    </tr>
                                @endempty
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="col-md-12 d-flex justify-content-center my-2">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
{{-- <script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script> --}}
{{-- <script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script> --}}
<script src={{ asset('assets/js/hr/employee-list.js') }}></script>
@endsection
