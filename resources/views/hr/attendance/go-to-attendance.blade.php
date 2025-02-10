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
                        <p class="work-order-No">
                            Add/Update Attendance For Work Order<br>
                            <span>Work order: BECIL/ND/DRDO/MAN/2425/1323_Extension</span>
                        </p>
                    </div>
                    <div class="col-md-2 workcenter">
                        <label>Total Entry</label><br>
                        <span>Entry: 0</span>
                    </div>
                    <div class="col-md-3 workcenter">

                        <a href="{{route('addnew-candidate')}}">
                            <button class="btn btn-sm btn-primary">Bulk Upload <i class="fa-solid fa-upload"></i></button>
                        </a><br>
                        <span class="text-danger mt-5 ">Note: Overtime Rate/Hr and</span>

                    </div>
                </div>
                <div class="col-md-12 px-3">
                    <p class="note"><span class="text-danger ">Note :</span> Show Only Employees whose Salary Structure is Created.
                    </p>
                </div>
                <div class="col-sm-6 col-md-12 py-2 mt-3 text-center">
                    <p class="fw-bold fs-6 work-order-No">
                        View Attendance and Calculate Salary for<br>
                        <span>Work order: BECIL/ND/DRDO/MAN/2425/1323_Extension</span>
                    </p>
                </div>
                <form method="get" action="{{ route('go-to-attendance',$wo_id)}}" >
                    <div class="col-md-12 text-center py-3 ">
                        <label>Select Month :</label><br>
                        
                            <input name="month" class="date-picker month_year" placeholder="mm-year" value="{{$month}}" />
                            <!-- <input type="date" name="month" value="{{ request('month', $month) }}" /> -->
                            <select name="emp_status" id="emp_status">
                                <option value="">-- All --</option>
                                <option value="active" {{ request('emp_status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('emp_status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
                                    <th>DOL</th>
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
                                <!-- <input type="hidden" name="attendance_month" id="attendance_month" value="{{ $month }}"> -->
                                    @foreach($wo_emps as $wo_emp)
                                        <tr>
                                            <input type="hidden" name="emp_code" id="emp_code" value="{{ $wo_emp->employ_code }}">
                                            <td><input  type="checkbox" name="check[]" value="{{ $wo_emp->emp_id}}"></td>
                                            <td>{{$wo_emp->emp_code}}</td>
                                            <td>{{$wo_emp->emp_name}}</td>
                                            <td><input type="number" step="0.01" name="at_appr_leave" id="at_appr_leave" min="0" max="31" value=""></td>
                                            <td><input type="number" step="0.01" name="leave" id="leave" min="0" max="31"></td>
                                            <td><input type="number" step="0.01" name="no_of_work_days" id="no_of_work_days" value="0" min="0"></td>
                                            <td>{{$wo_emp->emp_gender}}</td>
                                            <td>{{$wo_emp->emp_bank}} \{{$wo_emp->emp_account_no}}</td>
                                            <td>{{$wo_emp->emp_doj}}</td>
                                            <td>{{$wo_emp->emp_status}}</td>
                                            <td><input type="date" name="dor" id="dor" class="form-control" value="{{ $wo_emp->emp_dor }}" 
                                            ></td>
                                            <input type="hidden" name="emp_designation" id="emp_designation" value="{{ $wo_emp->emp_designation }}">
                                            <input type="hidden" name="emp_vendor_rate" id="emp_vendor_rate" value="{{ $wo_emp->emp_salary }}">
                                            <input type="hidden" name="emp_ctc" id="emp_ctc" value="{{ $wo_emp->emp_salary }}">
                                            
                                            <td>{{$wo_emp->emp_place_of_posting}}</td>
                                            <td>{{$wo_emp->emp_designation}}</td>
                                            <td><input type="text" name="remarks" id="remarks" placeholder="Enter Remarks" value=""></td>
                                            <td><input type="number" name="advance" id="advance"></td>
                                            <td><input type="number" name="recovery" id="recovery" ></td>
                                            <td><input type="number" name="overtime_rate" id="overtime_rate"></td>
                                            <td><input type="number" name="total_working_hrs" id="total_working_hrs"></td>
                                            
                                           
                                           
                                        
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
                            <button class="btn btn-primary">Add Attendance</button>
                        </div>
                        @endif
                    </form>
                </div>
                <div class="col-sm-6 col-md-12 py-2 mt-3 text-center">
                    <p class="fw-bold fs-5 work-order-No">
                        <a href="{{ route('wo-sal-attendance') }}"><button type="button" class="btn btn-sm btn-primary">Calculate Salary</button></a>
                    </p>
                </div>
                <!-- <div class="col-md-12 text-center py-3 ">

                <form method="post" action="{{ route('wo-sal-attendance')}}" >
                    <label>Select Month :</label><br>
                    <input type="month" name="month" value="{{old('month',date('Y-m'))}}" />
                    <input type="hidden" name="wo_id" value="{{old('month',$wo_id)}}" />
                    <button type="submit" class="btn btn-primary">View <i class="fa-solid fa-eye"></i></button> 
                </form>
                </div> -->
               
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

<script type="text/javascript">
  $(document).ready(function() {
    $('[name="at_appr_leave"],[name="leave"]').bind('keyup', function(){
      // updateWorkingDays();
      var outer_ele = $(this).parent().parent();
      var appr_leave = parseInt(outer_ele.children().eq(4).children().val());
      var lwd = parseInt(outer_ele.children().eq(5).children().val());
      var no_of_work_days = outer_ele.children().eq(6).children().val();
      month_date = $('.month_year').val().split(' ');
      month = new Date(Date.parse(month_date[0].replace(/ .*/,'') +" 1, 2022")).getMonth()+1;
      year = month_date[1];
      total_days = new Date(year, month, 0).getDate();

      if(isNaN(appr_leave)){
        appr_leave = 0;
      }
      outer_ele.children().eq(6).children().val(total_days-(lwd)+(appr_leave));

    });

  });



  $('[name="check[]"]').change(function() {
      if ($(this).is(':checked')) {
        var checked = $(this).parent().parent();
      checked.children().eq(0).attr('name', checked.children().eq(0).attr('name') + '_check[]');
      checked.children().eq(4).children().attr('name', checked.children().eq(4).children().attr('name') + '_check[]');
      checked.children().eq(5).children().attr('name', checked.children().eq(5).children().attr('name') + '_check[]');
      
      checked.children().eq(11).children().attr('name', checked.children().eq(11).children().attr('name') + '_check[]');
      checked.children().eq(12).attr('name', checked.children().eq(12).attr('name') + '_check[]');
      checked.children().eq(13).attr('name', checked.children().eq(13).attr('name') + '_check[]');
      checked.children().eq(14).attr('name', checked.children().eq(14).attr('name') + '_check[]');
    //   checked.children().eq(16).children().attr('name', checked.children().eq(16).children().attr('name') + '_check[]');
      checked.children().eq(17).children().attr('name', checked.children().eq(17).children().attr('name') + '_check[]');
      checked.children().eq(18).children().attr('name', checked.children().eq(18).children().attr('name') + '_check[]');
      checked.children().eq(19).children().attr('name', checked.children().eq(19).children().attr('name') + '_check[]');
      checked.children().eq(20).children().attr('name', checked.children().eq(20).children().attr('name') + '_check[]');
      checked.children().eq(21).children().attr('name', checked.children().eq(21).children().attr('name') + '_check[]');

    } else {
      var checked = $(this).parent().parent();
      checked.children().eq(0).attr('name', 'emp_code');
      checked.children().eq(4).children().attr('name', 'at_appr_leave');
      checked.children().eq(5).children().attr('name', 'leave');
      checked.children().eq(11).children().attr('name', 'dor');
      checked.children().eq(12).attr('name', 'emp_designation');
      checked.children().eq(13).attr('name', 'emp_vendor_rate');
      checked.children().eq(14).attr('name', 'emp_ctc');

      checked.children().eq(17).children().attr('name', 'remarks');
      checked.children().eq(18).children().attr('name', 'advance');
      checked.children().eq(19).children().attr('name', 'recovery');
      checked.children().eq(20).children().attr('name', 'overtime_rate');
      checked.children().eq(21).children().attr('name', 'total_working_hrs');
      // console.log(checked.children().eq(0).attr('name'));
    }
  });

  $("#all").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
    if ($(this).is(':checked')) {
      $('[id="emp_code"]').attr('name', 'emp_code_check[]');
      $('[id="at_appr_leave"]').attr('name', 'at_appr_leave_check[]');
      $('[id="leave"]').attr('name', 'leave_check[]');
      $('[id="dor"]').attr('name', 'dor_check[]');
      $('[id="emp_designation"]').attr('name', 'emp_designation_check[]');
      $('[id="emp_vendor_rate"]').attr('name', 'emp_vendor_rate_check[]');
      $('[id="emp_ctc"]').attr('name', 'emp_ctc_check[]');
      $('[id="remarks"]').attr('name', 'remarks_check[]');
      $('[id="advance"]').attr('name', 'advance_check[]');
      $('[id="recovery"]').attr('name', 'recovery_check[]');
      $('[id="overtime_rate"]').attr('name', 'overtime_rate_check[]');
      $('[id="total_working_hrs"]').attr('name', 'total_working_hrs_check[]');
    } else {
      $('[id="emp_code"]').attr('name', 'emp_code');
      $('[id="at_appr_leave"]').attr('name', 'at_appr_leave');
      $('[id="leave"]').attr('name', 'leave');
      $('[id="dor"]').attr('name', 'dor');
      $('[id="emp_designation"]').attr('name', 'emp_designation');
      $('[id="emp_vendor_rate"]').attr('name', 'emp_vendor_rate');
      $('[id="emp_ctc"]').attr('name', 'emp_ctc');
      $('[id="remarks"]').attr('name', 'remarks');
      $('[id="advance"]').attr('name', 'advance');
      $('[id="recovery"]').attr('name', 'recovery');
      $('[id="overtime_rate"]').attr('name', 'overtime_rate');
      $('[id="total_working_hrs"]').attr('name', 'total_working_hrs');
    }
    // $('input:checkbox').not(this).attr('checked','checked');
  });
</script>

@endsection