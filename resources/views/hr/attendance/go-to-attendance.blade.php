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
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Profile Details</a></li>
                            <li>Department List</li>
                        </ul>
                    </div>
                </div>
                <div class="row d-flex  justify-content-between mt-1" id="">
                    <div class="col-md-6 px-3 workcenter">
                        <!-- <label>Work Order Number : {{$wo_number}}</label> -->
                        <p class="work-order-No fw-bold">
                            Add/Update Attendance For Work Order
                            <span class="text-dark">: {{$wo_number}}</span>
                        </p>
                    </div>
                    <div class="col-md-2 workcenter">
                        <label>Total Entry</label>
                        <span class="text-dark fw-bold">: {{ $totalRecords??NULL }}</span>
                    </div>
                    <div class="col-md-3 workcenter px-5">

                        <a href="{{route('upload-attendance')}}">
                            <button class="btn btn-sm btn-primary">Bulk Upload <i
                                    class="fa-solid fa-upload"></i></button>
                        </a>


                    </div>
                    <!-- <span class="text-danger mt-5 ">Note: Overtime Rate/Hr and</span> -->
                </div>
                <div class="col-md-12 px-3">
                    <p class="note"><span class="text-danger">Note :</span> (Show Only Employees whose Salary Structure
                        is Created.)
                    </p>
                </div>

                <form method="get" action="{{ route('go-to-attendance',$wo_id)}}">
                    <!-- <div class="col-md-12 text-center py-3 ">
                        <label>Select Month :</label><br>
                        
                            <input name="month" class="date-picker date-picker" placeholder="mm-year" value="{{$month}}" />
                            <label>Status</label>
                            <select name="emp_status" id="emp_status">
                                <option value="">-- All --</option>
                                <option value="active" {{ request('emp_status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="resign" {{ request('emp_status') == 'resign' ? 'selected' : '' }}>Resign</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Check <i class="fa-solid fa-square-check"></i></button>
                        
                    </div> -->
                    <div class="row  mx-3 pt-2">
                        <div class="col-md-3 col-12">
                        </div>
                        <!-- Select Month Input -->
                        <div class="col-md-2 col-12 ">
                            <label for="month" class="form-label">Select Month:</label>
                            <input name="month" class="form-control date-picker month_year" placeholder="mm-yyyy"
                                value="{{ $month }}" />
                        </div>

                        <!-- Status Select Input -->
                        <div class="col-md-2 col-12">
                            <label for="emp_status" class="form-label">Status:</label>
                            <select name="emp_status" id="emp_status" class="form-select">
                                <option value="">-- All --</option>
                                <option value="active" {{ request('emp_status')=='active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive" {{ request('emp_status')=='inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                                <option value="resign" {{ request('emp_status')=='resign' ? 'selected' : '' }}>Resign
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-2 col-12  pt-4 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary ">Check <i
                                    class="fa-solid fa-square-check"></i></button>
                        </div>
                        <div class="col-md-2 col-6 ">
                        </div>
                    </div>

                </form>
                <form method="get" action="{{ route('go-to-attendance',$wo_id)}}">
                    <div class="col-md-12 d-flex justify-content-start mx-3 mt-3 gap-2">
                        <div class="col-auto">
                            <input name="search" type="text" class="form-control" placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                            <a href="{{route('go-to-attendance',$wo_id)}}" class="btn btn-primary mb-3">Reset <i
                                    class="fa-solid fa-rotate-right"></i></a>
                        </div>
                    </div>
                </form>
                <div class="row px-3 mt-2">
                    @if($message = Session::get('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                {{ $message }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    @if($message = Session::get('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                {{$message}}
                            </div>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                            <input class="form-check-input" type="checkbox" id="all" name="all">
                                        </div>
                                    </th>
                                    <th class="rid-column">Emp. Code</th>
                                    <th>Name</th>
                                    <th>Approved Leave</th>
                                    <th>LWP</th>
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

                                @if(!empty($wo_emps) && ($totalRecords > 0) )
                                <input type="hidden" name="attendance_month" id="attendance_month" value="{{ $month }}">
                                @foreach($wo_emps as $wo_emp)
                                <tr>
                                    <input type="hidden" name="emp_code" id="emp_code" value="{{ $wo_emp->emp_code }}">
                                    <td><input type="checkbox" name="check[]" value="{{ $wo_emp->id??NULL}}"></td>
                                    <td>{{$wo_emp->emp_code??NULL}}</td>
                                    <td>{{$wo_emp->emp_name??NULL}}</td>
                                    <td><input type="number" step="0.01" name="at_appr_leave" id="at_appr_leave" min="0"
                                            max="31" value="0"></td>
                                    <td><input type="number" step="0.01" name="leave" id="leave" min="0" max="31"
                                            value="0"></td>
                                    <td><input type="number" step="0.01" name="no_of_work_days" id="no_of_work_days"
                                            value="0" min="0"></td>
                                    <td title="Gender">{{$wo_emp->getPersonalDetail->emp_gender??NULL}}</td>
                                    <td>{{$wo_emp->getBankDetail->getBankData->name_of_bank}}
                                        \{{$wo_emp->getBankDetail->emp_account_no}}</td>
                                    <td>{{$wo_emp->emp_doj??NULL}}</td>
                                    <td>{{$wo_emp->emp_current_working_status}}</td>
                                    <td><input type="date" name="dor" id="dor" class="form-control"
                                            value="{{ $wo_emp->emp_dor }}"></td>
                                    <input type="hidden" name="emp_designation" id="emp_designation"
                                        value="{{ $wo_emp->emp_designation }}">
                                    <input type="hidden" name="emp_vendor_rate" id="emp_vendor_rate"
                                        value="{{ $wo_emp->getBankDetail->emp_unit}}">
                                    <input type="hidden" name="emp_ctc" id="emp_ctc"
                                        value="{{ $wo_emp->getBankDetail->emp_salary }}">

                                    <td>{{$wo_emp->emp_place_of_posting}}</td>
                                    <td>{{$wo_emp->emp_designation}}</td>
                                    <td><input type="text" name="remarks" id="remarks" placeholder="Enter Remarks"
                                            value=""></td>
                                    <td><input type="number" name="advance" id="advance" value="0"></td>
                                    <td><input type="number" name="recovery" id="recovery" value="0"></td>
                                    <td><input type="number" name="overtime_rate" id="overtime_rate" value="0"></td>
                                    <td><input type="number" name="total_working_hrs" id="total_working_hrs" value="0">
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
                        @if(!empty($wo_emps) && ($totalRecords > 0))
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
<script src="{{asset('assets/js/attendance/attendance.js')}}"></script>
@endsection