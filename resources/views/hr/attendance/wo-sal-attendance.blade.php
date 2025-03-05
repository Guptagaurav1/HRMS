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
                    <h2 class="mt-2">Attendance Salary</h2>
                </div>
                <div class="row d-flex  justify-content-between mt-1" id="">
                    <div class="col-md-6 px-3 workcenter ">
                        <label>Work Order Number : {{$wo_number}}</label>
                        
                    </div>
                    <div class="col-md-2 workcenter">
                        <label>Total Entry</label>
                        <span>Entry: 0</span>
                    </div>
                  
                </div>
              
                <div class="col-sm-6 col-md-12 py-2 mt-3 text-center">
                    <p class="fw-bold fs-6 work-order-No">
                    View Attendance for Work order(Only Attendance Generate But Salary Calculation Pending) :<br>
                        <span>Work order: {{$wo_number}}</span>
                    </p>
                </div>
                <form method="get" action="{{ route('wo-sal-attendance') }}" >
                    <div class="col-md-12 text-center py-3 ">
                        <label>Select Month :</label><br>
                        
                            <!-- <input type="month" name="month" value="{{old('month',date('Y-m'))}}" /> -->
                            <input name="month" class="date-picker" placeholder="mm-year" value="{{$month}}" />
                            <select name="work_order" id="" >
                                <option value="">--Select WorkOrder --</option>
                                @foreach($workOrders as  $workOrder)
                                <option value="{{$workOrder->id}}" {{ request('work_order') == $workOrder->id ? 'selected' : '' }}>{{$workOrder->wo_number}}</option>
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
                    <form action="{{ route('wo-sal-calculate',$wo_id)}}" method="POST">
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
                                
                                
                                @if(!empty($wo_emps) && ($wo_emps != ' ') )
                                @foreach($wo_emps as $wo_emp)
                                <tr>
                                            <input type="hidden" name="month_date" id="month_date" value="{{ $month }}">
                                            <input type="hidden" name="work_order" id="work_order" value="{{ $wo_id }}">
                                            <input type="hidden" name="sal_emp_email" id="sal_emp_email" value="{{ $wo_emp->emp_email_second }}">
                                            <input type="hidden" name="sa_emp_doj" id="sa_emp_doj" value="{{ $wo_emp->emp_doj }}">
                                            <input type="hidden" name="sa_emp_dor" id="sa_emp_dor" value="{{ $wo_emp->emp_dor }}">
                                            <input type="hidden" name="sal_emp_name" id="sal_emp_name" value="{{ $wo_emp->sal_emp_name }}">
                                            <input type="hidden" name="sal_emp_designation" id="sal_emp_designation" value="{{ $wo_emp->sal_emp_designation }}">
                                            <input type="hidden" name="sal_ctc" id="sal_ctc" value="{{ $wo_emp->sal_ctc }}">
                                            <input type="hidden" name="sal_gross" id="sal_gross" value="{{ $wo_emp->sal_gross }}">
                                            <input type="hidden" name="sal_net" id="sal_net" value="{{ $wo_emp->sal_net }}">
                                            <input type="hidden" name="sal_basic" id="sal_basic" value="{{ $wo_emp->sal_basic }}">
                                            <input type="hidden" name="sal_hra" id="sal_hra" value="{{ $wo_emp->sal_hra }}">
                                            <input type="hidden" name="sal_da" id="sal_da" value="{{ $wo_emp->sal_da }}">
                                            <input type="hidden" name="sal_conveyance" id="sal_conveyance" value="{{ $wo_emp->sal_conveyance }}">
                                            <input type="hidden" name="medical_allowance" id="medical_allowance" value="{{ $wo_emp->medical_allowance }}">
                                            <input type="hidden" name="sal_grade_pay" id="sal_grade_pay" value="{{ $wo_emp->sal_grade_pay }}">
                                            <input type="hidden" name="sal_special_allowance" id="sal_special_allowance" value="{{ $wo_emp->sal_special_allowance }}">
                                            <input type="hidden" name="sal_pf_employee" id="sal_pf_employee" value="{{ $wo_emp->sal_pf_employee }}">
                                            <input type="hidden" name="sal_esi_employee" id="sal_esi_employee" value="{{ $wo_emp->sal_esi_employee }}">
                                            <input type="hidden" name="sal_tax" id="sal_tax" value="{{ $wo_emp->sal_tax }}">
                                            <input type="hidden" name="emp_designation" id="emp_designation" value="{{ $wo_emp->emp_designation }}">
                                            <input type="hidden" name="emp_pan" id="emp_pan" value="{{ $wo_emp->emp_pan }}">
                                            <input type="hidden" name="emp_aadhaar_no" id="emp_aadhaar_no" value="{{ $wo_emp->emp_aadhaar_no }}">
                                            <input type="hidden" name="emp_account_no" id="emp_account_no" value="{{ $wo_emp->emp_account_no }}">
                                            <input type="hidden" name="emp_bank" id="emp_bank" value="{{ $wo_emp->emp_bank }}">
                                            <input type="hidden" name="emp_pf_no" id="emp_pf_no" value="{{ $wo_emp->emp_pf_no }}">
                                            <input type="hidden" name="emp_esi_no" id="emp_esi_no" value="{{ $wo_emp->emp_esi_no }}">
                                            <input type="hidden" name="emp_code" id="emp_code" value="{{ $wo_emp->emp_code }}">
                                            <input type="hidden" name="tds_deduction" id="tds_deduction" value="{{ $wo_emp->tds_deduction }}">
                                            <td>
                                                <!-- <div class="form-check"> -->
                                                    <input class="form-check-input" type="checkbox" name="check[]" value="{{ $wo_emp->emp_id}}">
                                                <!-- </div> -->
                                            </td>
                                            <td>{{$wo_emp->emp_code}}</td>
                                            <td>{{$wo_emp->emp_name}}</td>
                                            <td><input type="number" name="at_appr_leave" readonly value="{{$wo_emp->approve_leave}}"></td>
                                            <td><input type="number" name="lwp_leave" readonly value="{{$wo_emp->lwp_leave}}"></td>
                                            <td>{{$wo_emp->emp_gender}}</td>
                                            <td>{{$wo_emp->emp_bank}} \{{$wo_emp->emp_account_no}}</td>
                                            <td>{{$wo_emp->emp_doj}}</td>
                                            <!-- <td><input type="date" name="dor" id="dor" class="form-control" value="{{ $wo_emp->emp_dor }}" ></td> -->
                                             <td>@if($wo_emp->emp_dor) {{$wo_emp->emp_dor}} @else N/A @endif</td>
                                            <td>{{$wo_emp->emp_place_of_posting}}</td>
                                            <td>{{$wo_emp->emp_designation}}</td>
                                            <td><input type="text" step="0.01" min="0" name="remarks" placeholder="Enter Remarks" value="{{$wo_emp->remark}}"></td>
                                            <td><input type="number" step="0.01" min="0" name="advance"  value="{{ $wo_emp->advance }}" ></td>
                                            <td><input type="number" step="0.01" min="0" name="recovery"  value="{{ $wo_emp->recovery }}"></td>
                                            <td><input type="number" step="0.01" min="0" name="overtime_rate"  value="{{ $wo_emp->overtime_rate }}"></td>
                                            <td><input type="number" step="0.01" min="0" name="total_working_hrs"  value="{{ $wo_emp->total_working_hrs }}"></td>
                                            
                                            <input type="hidden" name="emp_medical_insurance" id="emp_medical_insurance" value="{{ $wo_emp->medical_insurance }}">
                                            <input type="hidden" name="emp_accidental_insurance" id="emp_accidental_insurance" value="{{ $wo_emp->accident_insurance }}">
                                            <input type="hidden" name="emp_pf_wages" id="emp_pf_wages" value="{{ $wo_emp->pf_wages }}">
                                            <input type="hidden" name="emp_esi_wages" id="emp_esi_wages" value="{{ $wo_emp->sal_esi_employee }}">
                                            <input type="hidden" name="medical_insurance_ctc" id="medical_insurance_ctc" value="{{ $wo_emp->medical_insurance_ctc }}">
                                            <input type="hidden" name="accident_insurance_ctc" id="accident_insurance_ctc" value="{{ $wo_emp->accident_insurance_ctc }}">
                                           
                                        
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                        <td class="text-danger text-center" colspan="12">No Record Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- @if(!empty($wo_emps) && ($wo_emps != ' ')) -->
                        <div>
                            {{ $wo_emps->links() }}
                        </div>
                        <div class="col-auto m-2 px-3 ">
                            <button class="btn btn-primary">Calculate salary</button>
                        </div>
                        <!-- @endif -->
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
<script>
      $('[name="check[]"]').change(function() {
        if ($(this).is(':checked')) {
          var checked = $(this).parent().parent();
          //  console.log(checked.children().eq(0).attr('name'));
          checked.children().eq(2).attr('name', 'sal_emp_email_check[]');
          checked.children().eq(3).attr('name', 'sa_emp_doj_check[]');
          checked.children().eq(4).attr('name', 'sa_emp_dor_check[]');
          checked.children().eq(5).attr('name', 'sal_emp_name_check[]');
          checked.children().eq(6).attr('name', 'sal_emp_designation_check[]');
          checked.children().eq(7).attr('name', 'sal_ctc_check[]');
          checked.children().eq(8).attr('name', 'sal_gross_check[]');
          checked.children().eq(9).attr('name', 'sal_net_check[]');
          checked.children().eq(10).attr('name', 'sal_basic_check[]');
          checked.children().eq(11).attr('name', 'sal_hra_check[]');
          checked.children().eq(12).attr('name', 'sal_da_check[]');
          checked.children().eq(13).attr('name', 'sal_conveyance_check[]');
          checked.children().eq(14).attr('name', 'medical_allowance_check[]');
          checked.children().eq(15).attr('name', 'sal_grade_pay_check[]');
          checked.children().eq(16).attr('name', 'sal_special_allowance_check[]');
          checked.children().eq(17).attr('name', 'sal_pf_employee_check[]');
          checked.children().eq(18).attr('name', 'sal_esi_employee_check[]');
          checked.children().eq(19).attr('name', 'sal_tax_check[]');
          checked.children().eq(20).attr('name', 'emp_designation_check[]');
          checked.children().eq(21).attr('name', 'emp_pan_check[]');
          checked.children().eq(22).attr('name', 'emp_aadhaar_no_check[]');
          checked.children().eq(23).attr('name', 'emp_account_no_check[]');
          checked.children().eq(24).attr('name', 'emp_bank_check[]');
          checked.children().eq(25).attr('name', 'emp_pf_no_check[]');
          checked.children().eq(26).attr('name', 'emp_esi_no_check[]');
          checked.children().eq(27).attr('name', 'emp_code_check[]');
          checked.children().eq(28).attr('name', 'tds_deduction_check[]');
          checked.children().eq(32).children().attr('name', 'at_appr_leave_check[]');
          checked.children().eq(33).children().attr('name', 'lwp_leave_check[]');
          checked.children().eq(40).children().attr('name', 'remarks_check[]');
          checked.children().eq(41).children().attr('name', 'advance_check[]');
          checked.children().eq(42).children().attr('name', 'recovery_check[]');
          checked.children().eq(43).children().attr('name', 'overtime_rate_check[]');
          checked.children().eq(44).children().attr('name', 'total_working_hrs_check[]');
          checked.children().eq(45).attr('name', 'emp_medical_insurance_check[]');
          checked.children().eq(46).attr('name', 'emp_accidental_insurance_check[]');
          checked.children().eq(47).attr('name', 'emp_pf_wages_check[]');
          checked.children().eq(48).attr('name', 'emp_esi_wages_check[]');
          checked.children().eq(49).attr('name', 'medical_insurance_ctc_check[]');
          checked.children().eq(50).attr('name', 'accident_insurance_ctc_check[]');
          $('#total_checked').html(parseInt($('#total_checked').html()) + 1);
        } else {
          var checked = $(this).parent().parent();
          checked.children().eq(2).attr('name', 'sal_emp_email');
          checked.children().eq(3).attr('name', 'sa_emp_doj');
          checked.children().eq(4).attr('name', 'sa_emp_dor');
          checked.children().eq(5).attr('name', 'sal_emp_name');
          checked.children().eq(6).attr('name', 'sal_emp_designation');
          checked.children().eq(7).attr('name', 'sal_ctc');
          checked.children().eq(8).attr('name', 'sal_gross');
          checked.children().eq(9).attr('name', 'sal_net');
          checked.children().eq(10).attr('name', 'sal_basic');
          checked.children().eq(11).attr('name', 'sal_hra');
          checked.children().eq(12).attr('name', 'sal_da');
          checked.children().eq(13).attr('name', 'sal_conveyance');
          checked.children().eq(14).attr('name', 'medical_allowance');
          checked.children().eq(15).attr('name', 'sal_grade_pay');
          checked.children().eq(16).attr('name', 'sal_special_allowance');
          checked.children().eq(17).attr('name', 'sal_pf_employee');
          checked.children().eq(18).attr('name', 'sal_esi_employee');
          checked.children().eq(19).attr('name', 'sal_tax');
          checked.children().eq(20).attr('name', 'emp_designation');
          checked.children().eq(21).attr('name', 'emp_pan');
          checked.children().eq(22).attr('name', 'emp_aadhaar_no');
          checked.children().eq(23).attr('name', 'emp_account_no');
          checked.children().eq(24).attr('name', 'emp_bank');
          checked.children().eq(25).attr('name', 'emp_pf_no');
          checked.children().eq(26).attr('name', 'emp_esi_no');
          checked.children().eq(27).attr('name', 'emp_code');
          checked.children().eq(28).attr('name', 'tds_deduction');
          checked.children().eq(32).children().attr('name', 'at_appr_leave');
          checked.children().eq(33).children().attr('name', 'lwp_leave');
          checked.children().eq(40).children().attr('name', 'remarks');
          checked.children().eq(41).children().attr('name', 'advance');
          checked.children().eq(42).children().attr('name', 'recovery');
          checked.children().eq(43).children().attr('name', 'overtime_rate');
          checked.children().eq(44).children().attr('name', 'total_working_hrs');
          checked.children().eq(45).attr('name', 'emp_medical_insurance');
          checked.children().eq(46).attr('name', 'emp_accidental_insurance');
          checked.children().eq(47).attr('name', 'emp_pf_wages');
          checked.children().eq(48).attr('name', 'emp_esi_wages');
          checked.children().eq(49).attr('name', 'medical_insurance_ctc');
          checked.children().eq(50).attr('name', 'accident_insurance_ctc');
          $('#total_checked').html(parseInt($('#total_checked').html()) - 1);
        }
      });

      $("#all").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
        if ($(this).is(':checked')) {
          $('input[name="sal_emp_email"]').attr('name', 'sal_emp_email_check[]');
          $('input[name="sa_emp_doj"]').attr('name', 'sa_emp_doj_check[]');
          $('input[name="sa_emp_dor"]').attr('name', 'sa_emp_dor_check[]');
          $('input[name="sal_emp_name"]').attr('name', 'sal_emp_name_check[]');
          $('input[name="sal_emp_designation"]').attr('name', 'sal_emp_designation_check[]');
          $('input[name="sal_ctc"]').attr('name', 'sal_ctc_check[]');
          $('input[name="sal_gross"]').attr('name', 'sal_gross_check[]');
          $('input[name="sal_net"]').attr('name', 'sal_net_check[]');
          $('input[name="sal_basic"]').attr('name', 'sal_basic_check[]');
          $('input[name="sal_hra"]').attr('name', 'sal_hra_check[]');
          $('input[name="sal_da"]').attr('name', 'sal_da_check[]');
          $('input[name="sal_conveyance"]').attr('name', 'sal_conveyance_check[]');
          $('input[name="medical_allowance"]').attr('name', 'medical_allowance_check[]');
          $('input[name="sal_grade_pay"]').attr('name', 'sal_grade_pay_check[]');
          $('input[name="sal_special_allowance"]').attr('name', 'sal_special_allowance_check[]');
          $('input[name="sal_pf_employee"]').attr('name', 'sal_pf_employee_check[]');
          $('input[name="sal_esi_employee"]').attr('name', 'sal_esi_employee_check[]');
          $('input[name="sal_tax"]').attr('name', 'sal_tax_check[]');
          $('input[name="emp_designation"]').attr('name', 'emp_designation_check[]');
          $('input[name="emp_pan"]').attr('name', 'emp_pan_check[]');
          $('input[name="emp_aadhaar_no"]').attr('name', 'emp_aadhaar_no_check[]');
          $('input[name="emp_account_no"]').attr('name', 'emp_account_no_check[]');
          $('input[name="emp_bank"]').attr('name', 'emp_bank_check[]');
          $('input[name="emp_pf_no"]').attr('name', 'emp_pf_no_check[]');
          $('input[name="emp_esi_no"]').attr('name', 'emp_esi_no_check[]');
          $('input[name="emp_code"]').attr('name', 'emp_code_check[]');
          $('input[name="tds_deduction"]').attr('name', 'tds_deduction_check[]');
          $('input[name="at_appr_leave"]').attr('name', 'at_appr_leave_check[]');
          $('input[name="lwp_leave"]').attr('name', 'lwp_leave_check[]');

          
          $('input[name="remarks"]').attr('name', 'remarks_check[]');
          $('input[name="advance"]').attr('name', 'advance_check[]');
          $('input[name="recovery"]').attr('name', 'recovery_check[]');
          $('input[name="overtime_rate"]').attr('name', 'overtime_rate_check[]');
          $('input[name="total_working_hrs"]').attr('name', 'total_working_hrs_check[]');

          $('input[name="emp_medical_insurance"]').attr('name', 'emp_medical_insurance_check[]');
          $('input[name="emp_accidental_insurance"]').attr('name', 'emp_accidental_insurance_check[]');
          $('input[name="emp_pf_wages"]').attr('name', 'emp_pf_wages_check[]');
          $('input[name="emp_esi_wages"]').attr('name', 'emp_esi_wages_check[]');
          $('input[name="medical_insurance_ctc"]').attr('name', 'medical_insurance_ctc_check[]');
          $('input[name="accident_insurance_ctc"]').attr('name', 'accident_insurance_ctc_check[]');

          var checkboxes = $('input:checkbox').not(this).prop('checked', this.checked).length;
          if (checkboxes != 0) {
            $('#total_checked').html(checkboxes);
          }
        } else {
          $('input[name="sal_emp_email"]').attr('name', 'sal_emp_email');
          $('input[name="sa_emp_doj_check[]"]').attr('name', 'sa_emp_doj');
          $('input[name="sa_emp_dor_check[]"]').attr('name', 'sa_emp_dor');
          $('input[name="sal_emp_name_check[]"]').attr('name', 'sal_emp_name');
          $('input[name="sal_emp_designation_check[]"]').attr('name', 'sal_emp_designation');
          $('input[name="sal_ctc_check[]"]').attr('name', 'sal_ctc');
          $('input[name="sal_gross_check[]"]').attr('name', 'sal_gross');
          $('input[name="sal_net_check[]"]').attr('name', 'sal_net');
          $('input[name="sal_basic_check[]"]').attr('name', 'sal_basic');
          $('input[name="sal_hra_check[]"]').attr('name', 'sal_hra');
          $('input[name="sal_da_check[]"]').attr('name', 'sal_da');
          $('input[name="sal_conveyance_check[]"]').attr('name', 'sal_conveyance');
          $('input[name="medical_allowance_check[]"]').attr('name', 'medical_allowance');
          $('input[name="sal_grade_pay_check[]"]').attr('name', 'sal_grade_pay');
          $('input[name="sal_special_allowance_check[]"]').attr('name', 'sal_special_allowance');
          $('input[name="sal_pf_employee_check[]"]').attr('name', 'sal_pf_employee');
          $('input[name="sal_esi_employee_check[]"]').attr('name', 'sal_esi_employee');
          $('input[name="sal_tax_check[]"]').attr('name', 'sal_tax');
          $('input[name="emp_designation_check[]"]').attr('name', 'emp_designation');
          $('input[name="emp_pan_check[]"]').attr('name', 'emp_pan');
          $('input[name="emp_aadhaar_no_check[]"]').attr('name', 'emp_aadhaar_no');
          $('input[name="emp_account_no_check[]"]').attr('name', 'emp_account_no');
          $('input[name="emp_bank_check[]"]').attr('name', 'emp_bank');
          $('input[name="emp_pf_no_check[]"]').attr('name', 'emp_pf_no');
          $('input[name="emp_esi_no_check[]"]').attr('name', 'emp_esi_no');
          $('input[name="emp_code_check[]"]').attr('name', 'emp_code');
          $('input[name="tds_deduction_check[]"]').attr('name', 'tds_deduction');
          $('input[name="at_appr_leave_check[]"]').attr('name', 'at_appr_leave');
          $('input[name="lwp_leave_check[]"]').attr('name', 'lwp_leave');

          
          $('input[name="remarks_check[]"]').attr('name', 'remarks');
          $('input[name="advance_check[]"]').attr('name', 'advance');
          $('input[name="recovery_check[]"]').attr('name', 'recovery');
          $('input[name="overtime_rate_check[]"]').attr('name', 'overtime_rate');
          $('input[name="total_working_hrs_check[]"]').attr('name', 'total_working_hrs');
          
          $('input[name="emp_medical_insurance_check[]"]').attr('name', 'emp_medical_insurance');
          $('input[name="emp_accidental_insurance_check[]"]').attr('name', 'emp_accidental_insurance');
          $('input[name="emp_pf_wages_check[]"]').attr('name', 'emp_pf_wages');
          $('input[name="emp_esi_wages_check[]"]').attr('name', 'emp_esi_wages');
          $('input[name="medical_insurance_ctc_check[]"]').attr('name', 'medical_insurance_ctc');
          $('input[name="accident_insurance_ctc_check[]"]').attr('name', 'accident_insurance_ctc');
          $('#total_checked').html("0");
        }

      });
</script>
@endsection