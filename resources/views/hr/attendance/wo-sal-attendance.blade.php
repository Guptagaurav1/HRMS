@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Go TO Attendance</h2>
                </div>
                <div class="row d-flex  justify-content-between mt-1" id="">
                    <div class="col-md-6 px-3 workcenter ">
                        <label>Work Order Number :</label>
                        
                    </div>
                    <div class="col-md-2 workcenter">
                        <label>Total Entry</label>
                        <span>Entry: 0</span>
                    </div>
                  
                </div>
              
                <div class="col-sm-6 col-md-12 py-2 mt-3 text-center">
                    <p class="fw-bold fs-6 work-order-No">
                    View Attendance for Work order(Only Attendance Generate But Salary Calculation Pending) :<br>
                        <span>Work order: BECIL/ND/DRDO/MAN/2425/1323_Extension</span>
                    </p>
                </div>
                <form method="get" action="{{ route('wo-sal-attendance')}}" >
                    <div class="col-md-12 text-center py-3 ">
                        <label>Select Month :</label><br>
                        
                            <!-- <input type="month" name="month" value="{{old('month',date('Y-m'))}}" /> -->
                            <input name="month" class="date-picker" placeholder="mm-year" value="{{$month}}" />
                            <select name="work_order" id="" >
                                <option value="">--Select WorkOrder --</option>
                                @foreach($workOrders as  $workOrder)
                                <option value="{{$workOrder->id}}">{{$workOrder->wo_number}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Check</button>
                        </div>
                   
                    <div class="col-md-12 px-3">
                        <p class="text-danger" style="font-size: 12px;">Total Hrs Applicable Only For Some Cases</p>
                    </div>
                    <div class="col-md-12 d-flex justify-content-start mx-3 mt-3">
                        <div class="col-auto">
                            <input name="search" type="text" class="form-control" placeholder="Search" >
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search</button>
                        </div>
                    </div>
                </form>
                <div class="row px-3 mt-2">
                @if($message = Session::get('success'))
                <div class="col-md-12">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                         <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                         {{ $message }}
                        </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @if($message = Session::get('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{$message}}
                        </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                </div>
                <div class="table-responsive">
                    <form action="{{ route('wo-sal-calculate')}}" method="POST">
                        @csrf
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="markAllEmployee">
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
                                
                                <input type="hidden" name="month_date" id="month_date" value="{{ $month }}">
                                <input type="hidden" name="work_order" id="work_order" value="{{ $wo_id }}">
                                @if(!empty($wo_emps) && ($wo_emps != ' ') )
                                @foreach($wo_emps as $wo_emp)
                                <tr>
                                            <input type="hidden" name="sal_emp_email[{{$wo_emp->emp_id}}]" id="sal_emp_email" value="{{ $wo_emp->emp_email_second }}">
                                            <input type="hidden" name="sa_emp_doj[{{$wo_emp->emp_id}}]" id="sa_emp_doj" value="{{ $wo_emp->emp_doj }}">
                                            <input type="hidden" name="sa_emp_dor[{{$wo_emp->emp_id}}]" id="sa_emp_dor" value="{{ $wo_emp->emp_dor }}">
                                            <input type="hidden" name="sal_emp_name[{{$wo_emp->emp_id}}]" id="sal_emp_name" value="{{ $wo_emp->sal_emp_name }}">
                                            <input type="hidden" name="sal_emp_designation[{{$wo_emp->emp_id}}]" id="sal_emp_designation" value="{{ $wo_emp->sal_emp_designation }}">
                                            <input type="hidden" name="sal_ctc[{{$wo_emp->emp_id}}]" id="sal_ctc" value="{{ $wo_emp->sal_ctc }}">
                                            <input type="hidden" name="sal_gross[{{$wo_emp->emp_id}}]" id="sal_gross" value="{{ $wo_emp->sal_gross }}">
                                            <input type="hidden" name="sal_net[{{$wo_emp->emp_id}}]" id="sal_net" value="{{ $wo_emp->sal_net }}">
                                            <input type="hidden" name="sal_basic[{{$wo_emp->emp_id}}]" id="sal_basic" value="{{ $wo_emp->sal_basic }}">
                                            <input type="hidden" name="sal_hra[{{$wo_emp->emp_id}}]" id="sal_hra" value="{{ $wo_emp->sal_hra }}">
                                            <input type="hidden" name="sal_da[{{$wo_emp->emp_id}}]" id="sal_da" value="{{ $wo_emp->sal_da }}">
                                            <input type="hidden" name="sal_conveyance[{{$wo_emp->emp_id}}]" id="sal_conveyance" value="{{ $wo_emp->sal_conveyance }}">
                                            <input type="hidden" name="medical_allowance[{{$wo_emp->emp_id}}]" id="medical_allowance" value="{{ $wo_emp->medical_allowance }}">
                                            <input type="hidden" name="sal_grade_pay[{{$wo_emp->emp_id}}]" id="sal_grade_pay" value="{{ $wo_emp->sal_grade_pay }}">
                                            <input type="hidden" name="sal_special_allowance[{{$wo_emp->emp_id}}]" id="sal_special_allowance" value="{{ $wo_emp->sal_special_allowance }}">
                                            <input type="hidden" name="sal_pf_employee[{{$wo_emp->emp_id}}]" id="sal_pf_employee" value="{{ $wo_emp->sal_pf_employee }}">
                                            <input type="hidden" name="sal_esi_employee[{{$wo_emp->emp_id}}]" id="sal_esi_employee" value="{{ $wo_emp->sal_esi_employee }}">
                                            <input type="hidden" name="sal_tax[{{$wo_emp->emp_id}}]" id="sal_tax" value="{{ $wo_emp->sal_tax }}">
                                            <input type="hidden" name="emp_designation[{{$wo_emp->emp_id}}]" id="emp_designation" value="{{ $wo_emp->emp_designation }}">
                                            <input type="hidden" name="emp_pan[{{$wo_emp->emp_id}}]" id="emp_pan" value="{{ $wo_emp->emp_pan }}">
                                            <input type="hidden" name="emp_aadhaar_no[{{$wo_emp->emp_id}}]" id="emp_aadhaar_no" value="{{ $wo_emp->emp_aadhaar_no }}">
                                            <input type="hidden" name="emp_account_no[{{$wo_emp->emp_id}}]" id="emp_account_no" value="{{ $wo_emp->emp_account_no }}">
                                            <input type="hidden" name="emp_bank[{{$wo_emp->emp_id}}]" id="emp_bank" value="{{ $wo_emp->emp_bank }}">
                                            <input type="hidden" name="emp_pf_no[{{$wo_emp->emp_id}}]" id="emp_pf_no" value="{{ $wo_emp->emp_pf_no }}">
                                            <input type="hidden" name="emp_esi_no[{{$wo_emp->emp_id}}]" id="emp_esi_no" value="{{ $wo_emp->emp_esi_no }}">
                                            <input type="hidden" name="emp_code[{{$wo_emp->emp_id}}]" id="emp_code" value="{{ $wo_emp->emp_code }}">
                                            <input type="hidden" name="tds_deduction[{{$wo_emp->emp_id}}]" id="tds_deduction" value="{{ $wo_emp->tds_deduction }}">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check[]" value="{{ $wo_emp->emp_id}}">
                                                </div>
                                            </td>
                                            <td>{{$wo_emp->emp_code}}</td>
                                            <td>{{$wo_emp->emp_name}}</td>
                                            <td><input type="number" name="at_appr_leave[{{$wo_emp->emp_id}}]" value="{{$wo_emp->approve_leave}}"></td>
                                            <td><input type="number" name="lwp_leave[{{$wo_emp->emp_id}}]" value="{{$wo_emp->lwp_leave}}"></td>
                                            <td>{{$wo_emp->emp_gender}}</td>
                                            <td>{{$wo_emp->emp_bank}} \{{$wo_emp->emp_account_no}}</td>
                                            <td>{{$wo_emp->emp_doj}}</td>
                                            <td><input type="date" name="dor[{{$wo_emp->emp_id}}]" id="dor" class="form-control" value="{{ $wo_emp->emp_dor }}" 
                                            ></td>
                                            <td>{{$wo_emp->emp_place_of_posting}}</td>
                                            <td>{{$wo_emp->emp_designation}}</td>
                                            <td><input type="text" name="remarks[{{$wo_emp->emp_id}}]" placeholder="Enter Remarks" value="{{$wo_emp->remark}}"></td>
                                            <td><input type="number" name="advance[{{$wo_emp->emp_id}}]"  value="{{ $wo_emp->advance }}" ></td>
                                            <td><input type="number" name="recovery[{{$wo_emp->emp_id}}]"  value="{{ $wo_emp->recovery }}"></td>
                                            <td><input type="number" name="overtime_rate[{{$wo_emp->emp_id}}]"  value="{{ $wo_emp->overtime_rate }}"></td>
                                            <td><input type="number" name="total_working_hrs[{{$wo_emp->emp_id}}]"  value="{{ $wo_emp->total_working_hrs }}"></td>
                                            
                                            <input type="hidden" name="emp_medical_insurance[{{$wo_emp->emp_id}}]" id="emp_medical_insurance" value="{{ $wo_emp->medical_insurance }}">
                                            <input type="hidden" name="emp_pf_wages[{{$wo_emp->emp_id}}]" id="emp_pf_wages" value="{{ $wo_emp->pf_wages }}">
                                            <input type="hidden" name="medical_insurance_ctc[{{$wo_emp->emp_id}}]" id="medical_insurance_ctc" value="{{ $wo_emp->medical_insurance_ctc }}">
                                            <input type="hidden" name="accident_insurance_ctc[{{$wo_emp->emp_id}}]" id="accident_insurance_ctc" value="{{ $wo_emp->accident_insurance_ctc }}">
                                           
                                        
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                        <td class="text-danger text-center" colspan="12">No Record Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if(!empty($wo_emps) && ($wo_emps != ' '))
                        <div>
                            {{ $wo_emps->links() }}
                        </div>
                        <div class="col-auto m-2 px-3 ">
                            <button class="btn btn-primary">Calculate salary</button>
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
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
<script src={{asset('assets/vendor/js/calenderOpen.js')}}></script>
@endsection