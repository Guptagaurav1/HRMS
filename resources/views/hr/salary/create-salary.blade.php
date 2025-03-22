@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection



@section('contents')
<div class="fluid-container">

    <div class="row">
     
        <form action="{{ route('save-salary')}}" method="post">
            @csrf
            <div class="col-12">
                <div class="panel">
                    <div class="col-md-12 py-3 px-3">
                        <span class="text-danger">All Fields are Mandatory. Those Fields are not in Used Set as 0 (Zero)
                            value</span>
                        <input class="" type="radio" id="gridCheck">
                        <label class="" for="gridCheck">
                            Single Entry
                        </label>

                    </div>
                    <div class="row">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @else
                        <div class="alert alert-error alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                    <div class="panel-header">
                        <h5 class="text-white">Salary Breakup Form</h5>
                    </div>

                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-12 col-sm-6">
                                <a href="">
                                    <p>Employee Details (Only shows Salary Structure Status Pending )</p>
                                </a>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Employee Code <span class="text-danger">*</span></label>
                                <!-- <input type="text" id="emp_id" name="sl_emp_id" class="form-control form-control-sm" placeholder="Employee Code"> -->
                                <input type="hidden" name="salary_id" id="salary_id" value="">
                                <input type="hidden" name="sal_emp_code" id="sal_emp_code" value="">
                                <select id="emp_id" class=" selectpicker form-select" name="sal_emp_id" id="" value>
                                    <option value="">Select Employee</option>
                                    @foreach($employee as $key => $value)
                                    <option value="{{$value->id}}">{{$value->emp_code}}</option>
                                    @endforeach
                                    @error('emp_code')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Employee Name <span class="text-danger">*</span></label>
                                <input type="tel" name="sal_emp_name" id="sal_emp_name" class="form-control form-control-sm" readonly placeholder="Employee Name">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label for="inputDate" class="form-label">Date Of Joining</label>
                                <input type="date" name="sal_emp_doj" id="sal_emp_doj" readonly class="form-control" id="inputDate">
                            </div>

                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Designation <span class="text-danger">*</span></label>
                                <input type="text" name="sal_emp_designation" id="sal_emp_designation" readonly class="form-control form-control-sm" placeholder="Designation">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">CTC <span class="text-danger">*</span></label>
                                <input type="text" name="sal_emp_ctc" id="sal_emp_ctc" readonly class="form-control form-control-sm" placeholder="CTC">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Gross <span class="text-danger">*</span></label>
                                <input type="number" name="sal_gross" id="sal_gross" readonly class="form-control form-control-sm" placeholder="Enter Gross Salary">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Net Salary <span class="text-danger">*</span></label>
                                <input type="number" name="sal_net" id="sal_net" readonly class="form-control form-control-sm" placeholder="Enter Net Salary">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="tick" name="nicsi_case">
                                        <label class="form-check-label text-danger" for="gridCheck">
                                            (Please <span><i class="fa-solid fa-check"></i></span> For Special NICSI Case)
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <div class="row" id="NICSI-case">
                                <div class=" col-md-4">
                                    <label class="form-label">Medical Insurance CTC <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="medical_insurance_ctc" onkeyup="cal_gross();" id="medical_insurance_ctc" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Accidental Insurance CTC <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="accident_insurance_ctc" onkeyup="cal_gross();" id="accident_insurance_ctc" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">New CTC <span class="text-danger">*</span></label>
                                    <input type="number" id="new_ctc"  class="form-control form-control-sm">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">Gross Salary</h5>
                    </div>

                    <div class="card mb-20">
                        <div class="card-header">
                            Structure
                        </div>
                        <div class="col-6 px-2 m-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="exception_esi" name="exception_esi" onchange="cal_gross();">
                                <label class="form-check-label text-danger" for="gridCheck">
                                    (Please Tick For Special ESI Case)
                                </label>
                                <input class="form-check-input" type="checkbox" name="exception_pf" id="exception_pf" onchange="cal_gross();">
                                <label class="form-check-label text-danger" for="exception_pf" >
                                    (Please Tick For Special PF Case)
                                </label>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Basic <span class="text-danger">*</span></label>
                                    <input type="number" name="sal_basic" id="sal_basic" onchange="cal_gross();" required class="form-control form-control-sm">
                                    @error('sal_basic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">DA <span class="text-danger">*</span></label>
                                    <input type="number" name="sal_da" id="sal_da" required onchange="cal_gross();" class="form-control form-control-sm">
                                    @error('sal_da')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Conveyence <span class="text-danger">*</span></label>
                                    <input type="number" name="sal_conveyance" id="sal_conveyance" onchange="cal_gross();" required class="form-control form-control-sm" min="0">
                                    @error('sal_conveyance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">HRA <span class="text-danger">*</span></label>
                                    <input type="number" name="sal_hra" id="sal_hra" required onchange="cal_gross();" min="0" class="form-control form-control-sm">
                                    @error('sal_hra')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Medical Allowance <span class="text-danger">*</span></label>
                                    <input type="number" name="medical_allowance" id="medical_allowance" onchange="cal_gross();" required min="0" class="form-control form-control-sm">
                                    @error('medical_allowance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-20">
                        <div class="card-header">
                            Employer Contribution
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">PF Employer max(1950)</label>
                                    <input type="number" name="sal_pf_employer" id="sal_pf_employer" onchange="cal_gross();" min="0" readonly  class="form-control form-control-sm">
                                    @error('sal_pf_employer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">ESIC Employer </label>
                                    <input type="number" name="sal_esi_employer" onchange="cal_gross();" min="0" id="sal_esi_employer" readonly class="form-control form-control-sm" placeholder="ESI">
                                    @error('sal_esi_employer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">LWF Employer(Labour Welfare Fund)<span style="color: red">*</span></label>
                                    <input type="number" name="sal_lwf_employer" onchange="cal_gross();" min="0" id="sal_lwf_employer" required class="form-control form-control-sm">
                                    @error('sal_lwf_employer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-20">
                        <div class="card-header">
                            Allowance
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Telephone </label>
                                    <input type="number" name="sal_telephone" id="sal_telephone" class="form-control form-control-sm" min="0" onchange="cal_gross();">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Uniform</label>
                                    <input type="number" name="sal_uniform" id="sal_uniform" onchange="cal_gross();" min="0" class="form-control form-control-sm">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">School Fee<span style="color: red">*</span></label>
                                    <input type="number" name="sal_school_fee" id="sal_school_fee" class="form-control form-control-sm" onchange="cal_gross();" required min="0">
                                    @error('sal_school_fee')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Car Allowance<span style="color: red">*</span></label>
                                    <input type="number" name="sal_car_allow" id="sal_car_allow" class="form-control form-control-sm" onchange="cal_gross();" required min="0">
                                    @error('sal_car_allow')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Grade Pay<span style="color: red">*</span></label>
                                    <input type="number" name="sal_grade_pay" required onkeyup="cal_gross();" id="sal_grade_pay" class="form-control form-control-sm">
                                    @error('sal_grade_pay')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Special Allowance<span style="color: red">*</span></label>
                                    <input type="number" name="sal_special_allowance" id="sal_special_allowance" required onkeyup="cal_gross();" class="form-control form-control-sm">
                                    @error('sal_special_allowance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-20">
                        <div class="panel-header">
                            <h5 class="text-white">Employee Contribution</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">PF Employee max(1800)<span class="text-danger">
                                            *</span></label>
                                    <input type="number" name="sal_pf_employee" id="sal_pf" onkeyup="cal_gross();" required class="form-control form-control-sm">
                                    @error('sal_pf')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">ESIC<span class="text-danger">
                                    *</span></label>
                                    <input type="number" name="sal_esi_employee" id="sal_esi" required onkeyup="cal_gross();" class="form-control form-control-sm">
                                    @error('sal_esi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">LWF Employee(labour Welfare Fund)<span class="text-danger">
                                    *</span></label>
                                    <input type="number" name="sal_lwf"  id="sal_lwf" required onkeyup="cal_gross();" class="form-control form-control-sm">
                                    @error('sal_lwf')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Professional Tax<span class="text-danger">
                                    *</span></label>
                                    <input type="number" name="sal_prof_tax" id="sal_prof_tax" required onkeyup="cal_gross();" class="form-control form-control-sm">
                                    @error('sal_prof_tax')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">ESIC and PF</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Opt For PF(Employee And Employer)</label>
                                <select id="opt_pf" name="opt_pf" class="form-select">
                                    <option value="">Select</option>
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Opt For ESI(Employee And Employer)</label>
                                <select id="opt_esi" name="opt_esi" class="form-select">
                                    <option value="">Select</option>
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6" calss="pf_no_field">
                                <label class="form-label">PF UAN No</label>
                                <input type="number" name="pf_no" id="pf_no" class="form-control form-control-sm" placeholder="Enter PF UAN No">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6" id="esi_no_field">
                                <label for="formFile" class="form-label">ESI No</label>
                                <input type="number" name="esi_no"  id="esi_no" class="form-control form-control-sm" pattern="^(\d{2})[\–\-](\d{2})[\–\-](\d{6})[\–\-](\d{3})[\–\-](\d{4})$" placeholder="Enter ESI No">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">Other Fields</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label">Medical Insurance</label>
                                <input type="number" name="medical_ins" id="medical_ins" onkeyup="cal_gross();" class="form-control form-control-sm" placeholder="Medical Insurance" value="0" min="0">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label">Accidental Insurance</label>
                                <input type="number"name="accident_ins" id="accident_ins" onkeyup="cal_gross();" class="form-control form-control-sm" placeholder="Accidental Insurance" value="0" min="0">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label">TDS Deducation</label>
                                <input type="number" name="tds_deduction" id="tds_deduction" class="form-control form-control-sm" onkeyup="cal_gross();" value="0" min="0" placeholder="TDS Deducation">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-label">PF Wages</label>
                                <input type="number" name="pf_wages" id="pf_wages" class="form-control form-control-sm" placeholder="PF Wages" value="0" min="0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">Calculation Criteria</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>All Fields are Mandatory. Those Fields are not in Used Set as 0 (Zero ) value</label>
                                <p class="text-danger calculation-criteria mt-2"><span>Gross =</span> <span>Basic + HRA + DA
                                        + PA + Conveyence +
                                        Telephone + Uniform + School Fee + Car + Grade Pay + Special Allowance</span></p>
                                <p class="text-danger calculation-criteria"><span>Net Salary =</span> <span>Gross - Employee
                                        Contribution</span></p>
                                <p class="text-danger calculation-criteria"><span>Employee Contribution =</span> <span>PF +
                                        ESI + LWF +
                                        Professional Tax</span></p>
                                <p class="text-danger calculation-criteria"><span>PF(EMPLOYEE) =</span> <span>12 % of
                                        Basic</span></p>
                                <p class="text-danger calculation-criteria"><span>PF(EMPLOYER) =</span> <span>13 % of
                                        Basic</span></p>
                                <p class="text-danger calculation-criteria"><span>ESIC(EMPLOYEE) =</span> <span>0.75 % of
                                        Gross</span></p>
                                <p class="text-danger calculation-criteria"><span>ESIC(EMPLOYER) =</span> <span>3.25 % of
                                        Gross</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">Remarks Details</h5>
                    </div>
                    <div class="panel-body">

                        <div class="col-sm-12 col-md-12">
                            <label for="exampleTextarea" class="form-label">Remarks</label>
                            <textarea class="form-control" name="sal_remark" id="sal_remark" placeholder="Enter Remarks"></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-end mt-3">
                            <div>
                                <button class="btn btn-sm btn-primary">Add Salary Breakup</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')

<script src="{{asset('assets/js/checkbox.js')}}"></script>
<script>
    $(document).ready(function() {
   
        $('#emp_id').change(function(e) {
        var emp_id = document.getElementById("emp_id").value;
        
        $.ajax({
            url: '{{ route("emp-data", ":id") }}'.replace(':id', emp_id),
            type: 'GET',
            success: function(response) {
                    let emp_code =response.data.emp_code;
                    let emp_name =response.data.emp_name;
                    let emp_doj =response.data.emp_doj;
                    let emp_designation =response.data.emp_designation;
                    let emp_salary =response.data.emp_salary;

                
                    $('#sal_emp_name').val(emp_name);
                    $('#sal_emp_code').val(emp_code);
                    $('#sal_emp_doj').val(emp_doj);
                    $('#sal_emp_designation').val(emp_designation);
                    $('#sal_emp_ctc').val(emp_salary);
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
        });
        });
    });



function cal_gross() {   
     
        //calculate gross
    var basic = parseInt(document.getElementById('sal_basic').value); 
   
    var hra = parseInt(document.getElementById('sal_hra').value);
    var da = parseInt(document.getElementById('sal_da').value);
    var medical = parseInt(document.getElementById('medical_allowance').value);
    var conveyence = parseInt(document.getElementById('sal_conveyance').value);
    var telephone = parseInt(document.getElementById('sal_telephone').value);
    var uniform = parseInt(document.getElementById('sal_uniform').value);
    var school_fee = parseInt(document.getElementById('sal_school_fee').value);
    var car = parseInt(document.getElementById('sal_car_allow').value);
    var grade_pay = parseInt(document.getElementById('sal_grade_pay').value);
    var special_allowance = parseInt(document.getElementById('sal_special_allowance').value);
    //end
    if(!hra){
      hra = 0;
    }
    if(!da){
      da = 0;
    }
    if(!medical){
      medical = 0;
    }
    if(!conveyence){
      conveyence = 0;
    }
    if(!telephone){
      telephone = 0;
    }
    if(!uniform){
      uniform = 0;
    }
    if(!school_fee){
      school_fee = 0;
    }
    if(!car){
      car = 0;
    }
    if(!grade_pay){
      grade_pay = 0;
    }
    if(!special_allowance){
      special_allowance = 0;
    }

    //calculate Employer Contribution
    var pf_employer = parseInt(document.getElementById('sal_pf_employer').value);
    var esic_employer = parseInt(document.getElementById('sal_esi_employer').value);
    var lwf_employer = parseInt(document.getElementById('sal_lwf_employer').value);
  
    if(document.getElementById("opt_pf").value=="yes"){
     
      var employee_pf = basic / 100 * 12;
      employee_pf = Math.ceil(employee_pf);
      var employer_pf = basic / 100 * 13;
      employer_pf = employer_pf = Math.round(employer_pf);
      var special_case_pf = document.getElementById('exception_pf');

      if (employee_pf > 1800) {
        document.getElementById("sal_pf").value = 1800;
      } else {
        document.getElementById("sal_pf").value = employee_pf;
      }

      if (employer_pf > 1950) {
        document.getElementById("sal_pf_employer").value = 1950;
      } else {
        document.getElementById("sal_pf_employer").value = employer_pf;
      }
      if(special_case_pf.checked == true){
        document.getElementById("sal_pf_employer").value = employer_pf;
        document.getElementById("sal_pf").value = employee_pf;
      }
    }
    
    if(!pf_employer){
      pf_employer = 0;
    }
    // if(!esic_employer){
      esic_employer = 0;
    // }
    if(!lwf_employer){
      lwf_employer = 0;
    }

    var employer_contribution = pf_employer + esic_employer + lwf_employer;
    
      //calculate gross
    var gross = basic + hra + da + medical + conveyence + telephone + uniform + school_fee + car + grade_pay + special_allowance;
    document.getElementById("sal_gross").value = gross;
    
    //end

    //Employee Contribution
    var pf_employee = parseInt(document.getElementById('sal_pf').value);
    var esic_employee = parseInt(document.getElementById('sal_esi').value);
    var lwf_employee = parseInt(document.getElementById('sal_lwf').value);
    var sal_tax = parseInt(document.getElementById('sal_prof_tax').value)
    if(!pf_employee){
      pf_employee = 0;
    }
    if(!esic_employee){
      esic_employee = 0;
    }
    if(!lwf_employee){
      lwf_employee = 0;
    }
    if(!sal_tax){
      sal_tax = 0;
    }
    var emp_contri = pf_employee+esic_employee+lwf_employee+sal_tax;
    
    // console.log(emp_contri);
    
    if(document.getElementById("opt_esi").value=="yes"){
      var esic_employer_amount = gross / 100 * 3.25;
      // console.log("Employer esi="+esic_employer_amount);
      esic_employer_amount = Math.round(esic_employer_amount);
      var esic_employee_amount = gross / 100 * 0.75;
      // console.log("Employee esi="+esic_employee_amount);
      // console.log("gross="+gross+" esi="+esic_employee_amount);
      esic_employee_amount = Math.round(esic_employee_amount);
      var special_case_esi = document.getElementById('exception_esi');

      if(gross>21000){
        document.getElementById("sal_esi_employer").value = 0;
        document.getElementById("sal_esi").value = 0;
      }
      else{
        document.getElementById("sal_esi_employer").value = esic_employer_amount;
        document.getElementById("sal_esi").value = esic_employee_amount;
      }
      
      if(special_case_esi.checked == true){
        document.getElementById("sal_esi_employer").value = esic_employer_amount;
        document.getElementById("sal_esi").value = esic_employee_amount;
      }

      var emp_pf = parseInt(document.getElementById("sal_pf_employer").value);
      document.getElementById("sal_gross").value = gross-esic_employer_amount-emp_pf;
      net_salary = gross-esic_employer_amount-emp_pf-emp_contri;
      document.getElementById("sal_net").value = net_salary;
    }
    else{
    //Calculate Net Salary
        
    net_salary = gross;
    document.getElementById("sal_net").value = net_salary;
    }

    var medical_ins = parseInt(document.getElementById('medical_ins').value);
    var accident_ins = parseInt(document.getElementById('accident_ins').value);
    var tds_deduction = parseInt(document.getElementById('tds_deduction').value);
    if(!tds_deduction){
      tds_deduction = 0;
    }
    var sal_emp_ctc = parseInt(document.getElementById('sal_emp_ctc').value);
    if(document.getElementById("opt_pf").value=="no"){
      document.getElementById("sal_gross").value = sal_emp_ctc - parseInt(document.getElementById("sal_esi_employer").value);
      var new_gross = parseInt(document.getElementById('sal_gross').value);
    var emp_pf = parseInt(document.getElementById('sal_pf').value);
    var emp_esi = parseInt(document.getElementById("sal_esi").value);
  
    document.getElementById("sal_net").value =  new_gross - emp_contri - tds_deduction - medical_ins - accident_ins;
    }
    else{
      document.getElementById("sal_gross").value = sal_emp_ctc - parseInt(document.getElementById('sal_pf_employer').value) - parseInt(document.getElementById("sal_esi_employer").value);
      var new_gross = parseInt(document.getElementById('sal_gross').value);
      var emp_pf = parseInt(document.getElementById('sal_pf').value);
      var emp_esi = parseInt(document.getElementById("sal_esi").value);
    
      document.getElementById("sal_net").value =  new_gross - emp_contri - tds_deduction - medical_ins - accident_ins;
    }
    //calculate Employer Contribution
    var pf_employer = parseInt(document.getElementById('sal_pf_employer').value);
    var esic_employer = parseInt(document.getElementById('sal_esi_employer').value);
    var lwf_employer = parseInt(document.getElementById('sal_lwf_employer').value);
    var medical_insurance_ctc = parseInt(document.getElementById('medical_insurance_ctc').value);
    var accident_insurance_ctc = parseInt(document.getElementById('accident_insurance_ctc').value);
    if(!medical_insurance_ctc){
      medical_insurance_ctc = 0;
    }
    if(!accident_insurance_ctc){
      accident_insurance_ctc = 0;
    } 
    var employer_contribution = pf_employer + esic_employer + lwf_employer;
    document.getElementById("sal_gross").value = gross;
    var emp_pf = parseInt(document.getElementById('sal_pf').value);
    var emp_esi = parseInt(document.getElementById("sal_esi").value);
    emp_contri = emp_pf + emp_esi + lwf_employee + sal_tax;
    document.getElementById("sal_net").value = gross - emp_contri - tds_deduction - medical_ins - accident_ins;
    
    document.getElementById("new_ctc").value =  parseInt(document.getElementById('sal_emp_ctc').value) - accident_insurance_ctc - medical_insurance_ctc; 
}

// function open_special_case(){
//     var special_case_pf = document.getElementById('nicsi_case');
//     if (special_case_pf.checked == true) {
//         $('#nicsi_div').css('display','block');
//       }
//       else{
//         $('#nicsi_div').css('display','none');
//       }
// }

//   Employee for pf
document.getElementById("opt_pf").onchange = function() {
   
    if (this.value == 'no' || this.value == '') {
      document.getElementById("sal_pf_employer").value = 0;
      document.getElementById("sal_pf").value = 0;
      document.getElementById("pf_no_field").style.display="none";
      cal_gross();
    }
    if (this.value == 'yes') {
      document.getElementById("pf_no_field").style.display="block";
      cal_gross();
   
    }
};

// employee esi 
document.getElementById("opt_esi").onchange = function() {
 
    if (this.value == 'no' || this.value == '') {
      document.getElementById("sal_esi_employer").value = 0;
      document.getElementById("sal_esi").value = 0;
      document.getElementById("esi_no_field").style.display="none";
      cal_gross();
    }
    if (this.value == 'yes') {
      document.getElementById("esi_no_field").style.display="block";
      cal_gross();
    }
};

</script>
@endsection