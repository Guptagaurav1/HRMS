@extends('layouts.master', ['title' => 'Create Salary'])

@section('contents')
<div class="fluid-container">

    <div class="row">
     
        <form action="{{ route('save-salary')}}" method="post">
            @csrf
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="mt-2">Create Salary</h2>
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                                <li>Create Salary</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 py-2 px-2">
                        <span class="text-danger">All Fields are Mandatory. Those Fields are not in Used Set as 0 (Zero)
                            value</span>
                        
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
                            <div class="col-xxl-3 col-lg-6 col-sm-6" id="pf_no_field">
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
                        <h5 class="text-white">Gross Salary</h5>
                    </div>

                    <div class="card mb-20">
                        <div class="card-header">
                            Structure
                        </div>
                        <div class="col-6 col-xs-12 px-2 m-3">
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
                                    <input type="number" name="sal_basic" id="sal_basic" onchange="cal_gross();" required class="form-control form-control-sm" value="0">
                                    @error('sal_basic')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">DA <span class="text-danger">*</span></label>
                                    <input type="number" name="sal_da" id="sal_da" required onchange="cal_gross();" class="form-control form-control-sm" value="0">
                                    @error('sal_da')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Conveyence <span class="text-danger">*</span></label>
                                    <input type="number" name="sal_conveyance" id="sal_conveyance" onchange="cal_gross();" required class="form-control form-control-sm" min="0" value="0">
                                    @error('sal_conveyance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">HRA <span class="text-danger">*</span></label>
                                    <input type="number" name="sal_hra" id="sal_hra" required onchange="cal_gross();" min="0" class="form-control form-control-sm" value="0">
                                    @error('sal_hra')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Medical Allowance <span class="text-danger">*</span></label>
                                    <input type="number" name="medical_allowance" id="medical_allowance" onchange="cal_gross();" required  value="0" min="0" class="form-control form-control-sm">
                                    @error('medical_allowance')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Special Allowance<span style="color: red">*</span></label>
                                    <input type="number" name="sal_special_allowance" id="sal_special_allowance" required onkeyup="cal_gross();" class="form-control form-control-sm" value="0">
                                    @error('sal_special_allowance')
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
                                    <input type="number" name="sal_pf_employer" id="sal_pf_employer" onchange="cal_gross();" min="0" value="0" readonly  class="form-control form-control-sm">
                                    @error('sal_pf_employer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">ESIC Employer </label>
                                    <input type="number" name="sal_esi_employer" onchange="cal_gross();" min="0" id="sal_esi_employer" readonly value="0" class="form-control form-control-sm" placeholder="ESI">
                                    @error('sal_esi_employer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">LWF Employer(Labour Welfare Fund)</label>
                                    <input type="number" name="sal_lwf_employer" onchange="cal_gross();" min="0" id="sal_lwf_employer" value="0" class="form-control form-control-sm">
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
                                    <input type="number" name="sal_telephone" id="sal_telephone" class="form-control form-control-sm" value="0" min="0" onchange="cal_gross();">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Uniform</label>
                                    <input type="number" name="sal_uniform" id="sal_uniform" onchange="cal_gross();" min="0" class="form-control form-control-sm" value="0">
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">School Fee</label>
                                    <input type="number" name="sal_school_fee" id="sal_school_fee" class="form-control form-control-sm" onchange="cal_gross();" required min="0" value="0">
                                    @error('sal_school_fee')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Car Allowance</label>
                                    <input type="number" name="sal_car_allow" id="sal_car_allow" class="form-control form-control-sm" value="0" onchange="cal_gross();"  min="0">
                                    @error('sal_car_allow')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Grade Pay</label>
                                    <input type="number" name="sal_grade_pay" value="0" onkeyup="cal_gross();" id="sal_grade_pay" class="form-control form-control-sm">
                                    @error('sal_grade_pay')
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
                                    <label class="form-label">PF Employee max(1800)</label>
                                    <input type="number" name="sal_pf_employee" id="sal_pf" onkeyup="cal_gross();" readonly class="form-control form-control-sm">
                                   
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">ESIC </label>
                                    <input type="number" name="sal_esi_employee" id="sal_esi" onkeyup="cal_gross();"  readonly class="form-control form-control-sm">
                                   
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">LWF Employee(labour Welfare Fund)</label>
                                    <input type="number" name="sal_lwf"  id="sal_lwf" value="0" onkeyup="cal_gross();" class="form-control form-control-sm">
                                    @error('sal_lwf')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Professional Tax</label>
                                    <input type="number" name="sal_prof_tax" id="sal_prof_tax"  onkeyup="cal_gross();" value="0" class="form-control form-control-sm">
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
                        <div class="d-flex align-items-center justify-content-end mt-3 gap-3">
                            <div class="">
                            <a href="{{route('salary-list')}}"><button type="button" class="btn btn-sm btn-secondary">Cancel</button></a>
                            </div>
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
<script src="{{asset('assets/js/hr/salary/add-salary-structure.js')}}"></script>
@endsection