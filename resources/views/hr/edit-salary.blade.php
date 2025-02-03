@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />



@endsection



@section('contents')
<div class="fluid-container">

    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="col-md-12 py-3 px-3">
                    <span class="text-danger">All Fields are Mandatory. Those Fields are not in Used Set as 0 (Zero)
                        value</span>
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
                            <input type="text" class="form-control form-control-sm" placeholder="Employee Code">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Employee Name <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-sm" placeholder="Employee Name">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label for="inputDate" class="form-label">Date Of Joining</label>
                            <input type="date" class="form-control" id="inputDate">
                        </div>

                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Designation <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Designation">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">CTC <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="CTC">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Gross <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Gross Salary">
                        </div>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <label class="form-label">Net Salary <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter Net Salary">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="tick">
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
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Accidental Insurance CTC <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">New CTC <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm">
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
                    <div class="col-md-7 mt-2 px-1">
                        <div class="form-check gap-2">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label text-danger" for="gridCheck">
                                (Please <span><i class="fa-solid fa-check"></i></span> For Special ESI Case)
                            </label>
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label text-danger" for="gridCheck">
                                (Please <span><i class="fa-solid fa-check"></i></span> For Special PF Case)
                            </label>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Basic <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">DA</label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Conveyence</label>
                                <input type="number" class="form-control form-control-sm">

                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">HRA</label>
                                <input type="number" class="form-control form-control-sm">

                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Medical Allowance</label>
                                <input type="number" class="form-control form-control-sm">

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
                                <label class="form-label">PF Employer max(1950)<span style="color: red">*</span></label>
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">ESIC Employer</label>
                                <input type="text" class="form-control form-control-sm" placeholder="ESI">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">LWF Employer(Labour Welfare Fund)</label>
                                <input type="number" class="form-control form-control-sm">

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
                                <label class="form-label">Telephone <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Uniform</label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">School Fee</label>
                                <input type="number" class="form-control form-control-sm">

                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Car Allowance</label>
                                <input type="number" class="form-control form-control-sm">

                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Grade Pay</label>
                                <input type="number" class="form-control form-control-sm">

                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Special Allowance</label>
                                <input type="number" class="form-control form-control-sm">

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
                                <input type="text" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">ESI</label>
                                <input type="number" class="form-control form-control-sm">
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">LWF Employee(labour Welfare Fund)</label>
                                <input type="number" class="form-control form-control-sm">

                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label">Professional Tax</label>
                                <input type="number" class="form-control form-control-sm">

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
                            <select id="inputState" class="form-select">
                                <option value="">Select</option>
                                <option value="0">Yes</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">Opt For ESI(Employee And Employer)</label>
                            <select id="inputState" class="form-select">
                                <option value="">Select</option>
                                <option value="0">Yes</option>
                                <option value="1">No</option>
                            </select>
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label class="form-label">PF UAN No</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter PF UAN No">
                        </div>
                        <div class="col-xxl-3 col-lg-6 col-sm-6">
                            <label for="formFile" class="form-label">ESI No</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Enter ESI No">
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
                            <input type="number" class="form-control form-control-sm" placeholder="Medical Insurance">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Accidental Insurance</label>
                            <input type="number" class="form-control form-control-sm"
                                placeholder="Accidental Insurance">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">TDS Deducation</label>
                            <input type="number" class="form-control form-control-sm" placeholder="TDS Deducation">
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">PF Wages</label>
                            <input type="number" class="form-control form-control-sm" placeholder="PF Wages">
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
                        <textarea class="form-control" id="exampleTextarea" placeholder="Enter Remarks"></textarea>
                    </div>
                    <div class="d-flex align-items-center justify-content-end mt-3">
                        <div>
                            <button class="btn btn-sm btn-primary">Modify Salary Breakup</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src={{asset('assets/js/checkbox.js')}}></script>

@endsection

