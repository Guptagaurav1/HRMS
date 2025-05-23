@extends('layouts.master')



@section('contents')
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="mt-2">Go TO Attendance</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                                <li><a href="{{ route('work-order-list') }}">Work Order List</a></li>
                                <li>Go To Attendance</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row d-flex  justify-content-between mt-1" id="">
                        <div class="col-md-6 px-3 workcenter">
                            <!-- <label>Work Order Number : {{ $wo_number }}</label> -->
                            <p class="work-order-No fw-bold">
                                Add/Update Attendance For Work Order
                                <span class="text-dark">: {{ $wo_number }}</span>
                            </p>
                        </div>
                        <div class="col-md-2 workcenter">
                            <label>Total Entry</label>
                            <span class="text-dark fw-bold">: {{ $totalRecords ?? null }}</span>
                        </div>
                        <div class="col-md-3 workcenter px-5">

                            <a href="{{ route('upload-attendance') }}">
                                <button class="btn btn-sm btn-primary">Bulk Upload <i
                                        class="fa-solid fa-upload"></i></button>
                            </a>


                        </div>
                        <!-- <span class="text-danger mt-5 ">Note: Overtime Rate/Hr and</span> -->
                    </div>
                    <div class="col-md-12 px-3">
                        <p class="note"><span class="text-danger">Note :</span> (Show Only Employees whose Salary
                            Structure
                            is Created.)
                        </p>
                    </div>

                    <form method="get">
                        @if ($search)
                            <input type="hidden" name="search" value="{{ $search }}">
                        @endif
                        <div class="row  mx-3 pt-2">
                            <div class="col-md-3 col-12">
                            </div>
                            <!-- Select Month Input -->
                            <div class="col-md-2 col-12 ">
                                <label for="month" class="form-label">Select Month:</label>
                                <input name="month" class="form-control date-picker month_year" placeholder="mm-yyyy" value="{{ str_replace(' ', '-', $month) }}" />
                            </div>

                            <!-- Status Select Input -->
                            <div class="col-md-2 col-12">
                                <label for="emp_status" class="form-label">Status:</label>
                                <select name="emp_status" id="emp_status" class="form-select">
                                    <option value="">-- All --</option>
                                    <option value="active" {{ request('emp_status') == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ request('emp_status') == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                    <option value="resign" {{ request('emp_status') == 'resign' ? 'selected' : '' }}>Resign
                                    </option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-2 col-12  pt-4 d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary ">Check </button>
                            </div>
                            <div class="col-md-2 col-6 ">
                            </div>
                        </div>

                    </form>
                  

                    <form method="get">
                        @if ($month)
                            <input type="hidden" name="month" value="{{ $month }}" />
                        @endif
                        @if ($emp_status)
                            <input type="hidden" name="emp_status" value="{{ $emp_status }}" />
                        @endif
                        <div class="col-md-12 d-flex justify-content-start mx-3 mt-3 gap-2 flex-wrap">
                            <div class="col-auto col-xs-12">
                                <input name="search" type="search" class="form-control" value="{{ $search }}"
                                    placeholder="Search">
                            </div>
                            <div class="col-auto col-xs-12">
                                <button type="submit" class="btn btn-primary mb-3">Search <i
                                        class="fa-solid fa-magnifying-glass"></i></button>

                            </div>

                            <div class="col-auto col-xs-12">
                                <a href="{{ route('go-to-attendance', $wo_id) }}"
                                    class="btn btn-primary mb-3 col-xs-12">Clear <i class="fa-solid fa-eraser"></i> </a>

                            </div>
                        </div>
                    </form>
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
                    <div class="table-responsive">
                        <form action="{{ route('add-attendance', $wo_id) }}" method="POST">
                            @csrf
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                id="allEmployeeTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="all"
                                                    name="all">
                                            </div>
                                        </th>
                                        <th class="rid-column">Emp. Code</th>
                                        <th>Name</th>
                                        <th>Approved Leaves</th>
                                        <th>Leaves Taken</th>
                                        <th>No. of Working Days</th>
                                        <th>Gender</th>
                                        <th>Bank Name / Account No</th>
                                        <th>Joining Date</th>
                                        <th>Status</th>
                                        <th>DOR</th>
                                        <th>Posting Place</th>
                                        <th>Designation</th>
                                        <th>Remarks</th>
                                        <th>Advance</th>
                                        <th>Recovery</th>
                                        <th>Overtime Rate / Hrs.</th>
                                        <th>Total Working Hrs.</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (!empty($wo_emps) )
                                        <input type="hidden" name="attendance_month" id="attendance_month"
                                            value="{{ $month }}">
                                        @foreach ($wo_emps as $wo_emp)
                                            <tr>
                                                <input type="hidden" name="emp_code" id="emp_code"
                                                    value="{{ $wo_emp->emp_code }}">
                                                <td><input type="checkbox" name="check[]"
                                                        value="{{ $wo_emp->id ?? null }}"></td>
                                                <td>{{ $wo_emp->emp_code ?? null }}</td>
                                                <td>{{ $wo_emp->emp_name ?? null }}</td>
                                                <td><input type="number" step="0.01" name="at_appr_leave"
                                                        id="at_appr_leave" min="0" max="31" value="0">
                                                </td>
                                                <td><input type="number" step="0.01" name="leave" id="leave"
                                                        min="0" max="31" value="0"></td>
                                                <td><input type="number" step="0.01" name="no_of_work_days"
                                                        id="no_of_work_days" value="0" min="0"></td>
                                                <td title="Gender">{{ $wo_emp->getPersonalDetail->emp_gender ?? null }}
                                                </td>
                                                <td>{{ $wo_emp->getBankDetail && $wo_emp->getBankDetail->getBankData ? $wo_emp->getBankDetail->getBankData->name_of_bank : '' }}
                                                    \{{ $wo_emp->getBankDetail->emp_account_no }}</td>
                                                <td>{{ $wo_emp->emp_doj ?? null }}</td>
                                                <td>{{ $wo_emp->emp_current_working_status }}</td>
                                                <td><input type="date" name="dor" id="dor"
                                                        class="form-control" value="{{ $wo_emp->emp_dor }}"></td>
                                                <input type="hidden" name="emp_designation" id="emp_designation"
                                                    value="{{ $wo_emp->emp_designation }}">
                                                <input type="hidden" name="emp_vendor_rate" id="emp_vendor_rate"
                                                    value="{{ $wo_emp->getBankDetail->emp_unit }}">
                                                <input type="hidden" name="emp_ctc" id="emp_ctc"
                                                    value="{{ $wo_emp->getBankDetail->emp_salary }}">

                                                <td>{{ $wo_emp->emp_place_of_posting }}</td>
                                                <td>{{ $wo_emp->emp_designation }}</td>
                                                <td><input type="text" name="remarks" id="remarks"
                                                        placeholder="Enter Remarks" value=""></td>
                                                <td><input type="number" name="advance" id="advance" value="0">
                                                </td>
                                                <td><input type="number" name="recovery" id="recovery" value="0">
                                                </td>
                                                <td><input type="number" name="overtime_rate" id="overtime_rate"
                                                        value="0"></td>
                                                <td><input type="number" name="total_working_hrs" id="total_working_hrs"
                                                        value="0">
                                                </td>




                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-danger text-center" colspan="12">No Record Found</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            @if (!empty($wo_emps))
                                <div>
                                    {{ $wo_emps->links() }}
                                </div>

                                <div class="col-auto m-2 px-3 ">
                                    <button id="btn-attendance" disabled class="btn btn-primary">Add Attendance</button>
                                </div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('assets/js/attendance/attendance.js') }}"></script>
@endsection
