@extends('layouts.master')
@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Attendance Salary</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                            <li><a href="{{route('work-order-list')}}">Work Order List</a></li>
                            <li>Attendance Salary</li>
                        </ul>
                    </div>
                </div>
                <div class="row d-flex  justify-content-between mt-1" id="">
                    <div class="col-md-6 px-3 workcenter ">
                        <p class="fw-bold fs-6 work-order-No">
                            View Attendance for Work order(Only Attendance Generate But Salary Calculation Pending)
                            <span class="text-dark fw-bold">: {{$wo_number}}</span>
                        </p>

                    </div>
                    <div class="col-md-2 workcenter">
                        <label>Total Entry</label>
                        <span class="text-dark fw-bold">: {{ $totalRecords??NULL}}</span>
                    </div>

                </div>

                {{-- icons --}}
                
                        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>

                <form method="get" action="{{ route('wo-sal-attendance') }}">
                    <div class="row  mx-3 pt-2">
                        <div class="col-md-3 col-12">
                        </div>
                        <!-- Select Month Input -->
                        <div class="col-md-2 col-12 ">
                            <label for="month" class="form-label">Select Month:</label>
                            <input name="month" class=" form-control date-picker month_year" placeholder="mm-year"
                                value="{{ str_replace(' ', '-', $month) }}" />
                        </div>
                        <div class="col-md-2 col-12 ">
                            <label for="work_order" class="form-label">Select Work Order</label>
                            <select name="work_order" class="form-select" id="">
                                <option value="">--Select WorkOrder --</option>
                                @foreach($workOrders as $workOrder)
                                <option value="{{$workOrder->id}}" {{ request('work_order')==$workOrder->id ? 'selected'
                                    : '' }}>{{$workOrder->wo_number}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 col-12  pt-4 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary"> Check <i
                                    class="fa-solid fa-square-check"></i></button>
                        </div>
                        <div class="col-md-3 col-12">
                        </div>

                    </div>

                    <!-- <div class="col-md-12 px-3">
                        <p class="text-danger fs-6">Total Hrs Applicable Only For Some Cases</p>
                    </div> -->
                    <div class="col-md-12 d-flex justify-content-start mx-3 mt-3 gap-2 flex-wrap">
                        <div class="col-auto col-xs-12">
                            <input name="search" type="text" class="form-control" placeholder="Search">
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="button" class="btn btn-primary mb-3 col-xs-12">Clear <i class="fa-solid fa-eraser"></i></button>
                        </div>
                    </div>
                </form>
                <div class="row px-3 mt-2">
                    @if($message = Session::get('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24" role="img" aria-label="Success:">
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
                    <form action="{{ route('wo-sal-calculate',$wo_id)}}" method="POST">
                        @csrf
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input type="checkbox" name="all" id="all">
                                        </div>
                                    </th>
                                    <th class="rid-column">Emp. Code</th>
                                    <th>Name</th>
                                    <th>Approved Leave</th>
                                    <th>LWP</th>
                                    <th>Gender</th>
                                    <th>Bank Name / Account No</th>
                                    <th>Joining Date</th>
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
                                @foreach($wo_emps as $wo_emp)
                                <tr>
                                    <input type="hidden" name="month_date" id="month_date" value="{{ $month }}">
                                    <input type="hidden" name="work_order" id="work_order" value="{{ $wo_id }}">
                                    <input type="hidden" name="sal_emp_email" id="sal_emp_email"
                                        value="{{ $wo_emp->empDetail->emp_email_first }}">
                                    <input type="hidden" name="sal_emp_doj" id="sa_emp_doj"
                                        value="{{ $wo_emp->empDetail->emp_doj }}">
                                    <input type="hidden" name="sa_emp_dor" id="sa_emp_dor"
                                        value="{{ $wo_emp->empDetail->emp_dor }}">
                                    <input type="hidden" name="sal_emp_name" id="sal_emp_name"
                                        value="{{ $wo_emp->empDetail->emp_name }}">
                                    <input type="hidden" name="sal_emp_designation" id="sal_emp_designation"
                                        value="{{ $wo_emp->empDetail->emp_designation }}">
                                    <input type="hidden" name="sal_ctc" id="sal_ctc"
                                        value="{{ $wo_emp->salary->sal_ctc??NULL }}">
                                    <input type="hidden" name="sal_gross" id="sal_gross"
                                        value="{{ $wo_emp->salary->sal_gross??NULL }}">
                                    <input type="hidden" name="sal_net" id="sal_net"
                                        value="{{ $wo_emp->salary->sal_net??NULL }}">
                                    <input type="hidden" name="sal_basic" id="sal_basic"
                                        value="{{ $wo_emp->salary->sal_basic??NULL }}">
                                    <input type="hidden" name="sal_hra" id="sal_hra"
                                        value="{{ $wo_emp->salary->sal_hra??NULL }}">
                                    <input type="hidden" name="sal_da" id="sal_da"
                                        value="{{ $wo_emp->salary->sal_da??NULL }}">
                                    <input type="hidden" name="sal_conveyance" id="sal_conveyance"
                                        value="{{ $wo_emp->salary->sal_conveyance??NULL }}">
                                    <input type="hidden" name="medical_allowance" id="medical_allowance"
                                        value="{{ $wo_emp->salary->medical_allowance??NULL }}">
                                    <input type="hidden" name="sal_grade_pay" id="sal_grade_pay"
                                        value="{{ $wo_emp->salary->sal_grade_pay??NULL }}">
                                    <input type="hidden" name="sal_special_allowance" id="sal_special_allowance"
                                        value="{{ $wo_emp->salary->sal_special_allowance??NULL }}">
                                    <input type="hidden" name="sal_pf_employee" id="sal_pf_employee"
                                        value="{{ $wo_emp->salary->sal_pf_employee??NULL }}">
                                    <input type="hidden" name="sal_esi_employee" id="sal_esi_employee"
                                        value="{{ $wo_emp->salary->sal_esi_employee??NULL }}">
                                    <input type="hidden" name="sal_tax" id="sal_tax"
                                        value="{{ $wo_emp->salary->sal_tax??NULL }}">
                                    <input type="hidden" name="emp_designation" id="emp_designation"
                                        value="{{ $wo_emp->empDetail->emp_designation??NULL }}">
                                    <input type="hidden" name="emp_pan" id="emp_pan"
                                        value="{{ $wo_emp->empDetail->getBankDetail->emp_pan??NULL}}">
                                    <input type="hidden" name="emp_aadhaar_no" id="emp_aadhaar_no"
                                        value="{{ $wo_emp->empDetail->getIdProofDetail->emp_aadhaar_no??NULL }}">
                                    <input type="hidden" name="emp_account_no" id="emp_account_no"
                                        value="{{ $wo_emp->empDetail->getBankDetail->emp_account_no??NULL }}">
                                    <input type="hidden" name="emp_bank" id="emp_bank"
                                        value="{{ $wo_emp->empDetail->getBankDetail->getBankData->name_of_bank??NULL }}">
                                    <input type="hidden" name="emp_pf_no" id="emp_pf_no"
                                        value="{{ $wo_emp->empDetail->getBankDetail->emp_pf_no??NULL }}">
                                    <input type="hidden" name="emp_esi_no" id="emp_esi_no"
                                        value="{{ $wo_emp->empDetail->getBankDetail->emp_esi_no??NULL }}">
                                    <input type="hidden" name="emp_code" id="emp_code"
                                        value="{{ $wo_emp->empDetail->emp_code??NULL }}">
                                    <input type="hidden" name="tds_deduction" id="tds_deduction"
                                        value="{{ $wo_emp->salary->tds_deduction??NULL }}">
                                    <td>
                                        <!-- <div class="form-check"> -->
                                        <input class="form-check-input" type="checkbox" name="check[]"
                                            value="{{ $wo_emp->empDetail->id??NULL}}">
                                        <!-- </div> -->
                                    </td>
                                    <td>{{$wo_emp->empDetail->emp_code??NULL}}</td>
                                    <td>{{$wo_emp->empDetail->emp_name??NULL}}</td>
                                    <td><input type="number" name="at_appr_leave" readonly
                                            value="{{$wo_emp->approve_leave??NULL}}"></td>
                                    <td><input type="number" name="lwp_leave" readonly
                                            value="{{$wo_emp->lwp_leave??NULL}}"></td>
                                    <td>{{$wo_emp->empDetail->getPersonalDetail->emp_gender??NULL}}</td>
                                    <td>{{$wo_emp->empDetail->getBankDetail->getBankData->name_of_bank??NULL}}
                                        \{{$wo_emp->empDetail->getBankDetail->emp_account_no??NULL}}</td>
                                    <td>{{$wo_emp->empDetail->emp_doj}}</td>
                                    <!-- <td><input type="date" name="dor" id="dor" class="form-control" value="{{ $wo_emp->emp_dor }}" ></td> -->
                                    <td>@if($wo_emp->empDetail->emp_dor) {{$wo_emp->empDetail->emp_dor}} @else N/A
                                        @endif</td>
                                    <td>{{$wo_emp->empDetail->emp_place_of_posting}}</td>
                                    <td>{{$wo_emp->empDetail->emp_designation}}</td>
                                    <td><input type="text" name="remarks" placeholder="Enter Remarks"
                                            value="{{$wo_emp->remark}}"></td>
                                    <td><input type="number" step="0.01" min="0" name="advance" readonly
                                            value="{{ $wo_emp->advance }}"></td>
                                    <td><input type="number" step="0.01" min="0" name="recovery" readonly
                                            value="{{ $wo_emp->recovery }}"></td>
                                    <td><input type="number" step="0.01" min="0" name="overtime_rate" readonly
                                            value="{{ $wo_emp->overtime_rate }}"></td>
                                    <td><input type="number" step="0.01" min="0" name="total_working_hrs" readonly
                                            value="{{ $wo_emp->total_working_hrs }}"></td>

                                    <input type="hidden" name="emp_medical_insurance" id="emp_medical_insurance"
                                        value="{{ $wo_emp->salary->medical_insurance??NULL }}">
                                    <input type="hidden" name="emp_accidental_insurance" id="emp_accidental_insurance"
                                        value="{{ $wo_emp->salary->accident_insurance??NULL }}">
                                    <input type="hidden" name="emp_pf_wages" id="emp_pf_wages"
                                        value="{{ $wo_emp->salary->pf_wages??NULL }}">
                                    <input type="hidden" name="emp_esi_wages" id="emp_esi_wages"
                                        value="{{ $wo_emp->salary->sal_esi_employee??NULL }}">
                                    <input type="hidden" name="medical_insurance_ctc" id="medical_insurance_ctc"
                                        value="{{ $wo_emp->salary->medical_insurance_ctc??NULL }}">
                                    <input type="hidden" name="accident_insurance_ctc" id="accident_insurance_ctc"
                                        value="{{ $wo_emp->salary->accident_insurance_ctc??NULL }}">
                                    <input type="hidden" name="accident_insurance_ctc" id="accident_insurance_ctc"
                                        value="{{ $wo_emp->salary->accident_insurance_ctc??NULL }}">


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
                            <button class="btn btn-primary" id="btn-attendance" disabled>Calculate salary</button>
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
<script src="{{asset('assets/js/attendance/sal-attendance.js')}}"></script>

@endsection