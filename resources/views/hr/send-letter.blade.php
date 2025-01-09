@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')


<div class="row">
    
        <h2 class="panel-header py-2 px-2">Send Appointment Letter</h2>
    
    <div class="col-12">
        <div class="panel">
            <div class="row px-3">
                <div class="col-md-6">
                    <label class="form-label">Employee Salary : <span>Aniket</span></label>

                </div>
                <div class="col-md-6">
                    <label class="form-label">Employee Code : <span>PSSPL/2024-25/3965</span></label>
                </div>
            </div>
            <div class="panel-header">

                <h5 class="text-white">Current Status</h5>
            </div>
            <div class="panel-body">

                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Employee Salary<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Salary">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Employee Designation<span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" placeholder="Enter Designation">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="inputDate" class="form-label">End date</label>
                        <input type="date" class="form-control" id="inputDate">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-12">
    <div class="panel">
        <div class="panel-header">
            <h5 class="text-white">New Changes</h5>
        </div>
        <div class="panel-body">
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Employee Salary <span style="color: red">*</span></label>
                    <input type="number" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Employee Designation <span style="color: red">*</span></label>
                    <select id="inputState" class="form-select">
                        <option selected>Office Assistant(Stage-2)</option>
                        <option>Select 1</option>
                        <option>Select 1</option>
                        <option>Select 1</option>
                    </select>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label for="inputDate" class="form-label">Start date</label>
                    <input type="date" class="form-control" id="inputDate">
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <p class="text-danger">All Fields are Mandatory. Those Fields are not in Used Set as 0 (Zero) value
                    </p>
                </div>
            </div>
            
        </div>
    </div>

</div>


<div class="col-12">
    <div class="panel">
        <div class="panel-header">
            <h5>Employee Details (Only shows Salary Structure Status Pending )</h5>
        </div>
        <div class="panel-body">
            <div class="row g-3">
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Employee Code <span style="color: red">*</span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Employee Name <span style="color: red">*</span></label>
                    <input type="tel" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label for="inputDate" class="form-label">Date Of Joining</label>
                    <input type="date" class="form-control" id="inputDate">
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">CTC <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Gross <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Net Salary <span class="text-danger"span></label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="panel">
        <div class="panel-header">
            <h5 class="text-white">Educational Qualification</h5>
        </div>

        <div class="card mb-20">
            <div class="card-header">
                Structure
            </div>
            <div class="col-12 px-2 m-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck" style="color: red">
                        (Please Tick For Special PF Case)
                    </label>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Basic <span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control-sm">
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
                        <label class="form-label">PF Employer <span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">ESIC Employer</label>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">LWF Employer(Labour Welfare Fund)</label>
                        <input type="text" class="form-control form-control-sm">

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
                        <label class="form-label">Telephone <span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control-sm">
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
                        <label class="form-label">PF Employee<span style="color: red">*</span></label>
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
                    <input type="number" class="form-control form-control-sm">
                </div>
                <div class="col-xxl-3 col-lg-6 col-sm-6">
                    <label for="formFile" class="form-label">ESI No</label>
                    <input type="number" class="form-control form-control-sm">
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
                    <input type="number" class="form-control form-control-sm">
                </div>
                <div class="col-sm-12 col-md-6">
                    <label class="form-label">Accidental Insurance</label>
                    <input type="number" class="form-control form-control-sm">
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
                    <p class="text-danger calculation-criteria mt-2" ><span>Gross =</span> <span>Basic + HRA + DA + PA + Conveyence +
                            Telephone + Uniform + School Fee + Car + Grade Pay + Special Allowance</span></p>
                    <p class="text-danger calculation-criteria"><span>Net Salary =</span> <span>Gross - Employee
                            Contribution</span></p>
                    <p class="text-danger calculation-criteria"><span>Employee Contribution =</span> <span>PF + ESI + LWF +
                            Professional Tax</span></p>
                    <p class="text-danger calculation-criteria"><span>PF(EMPLOYEE) =</span> <span>12 % of Basic</span></p>
                    <p class="text-danger calculation-criteria"><span>PF(EMPLOYER) =</span> <span>13 % of Basic</span></p>
                    <p class="text-danger calculation-criteria"><span>ESIC(EMPLOYEE) =</span> <span>0.75 % of Gross</span></p>
                    <p class="text-danger calculation-criteria"><span>ESIC(EMPLOYER) =</span> <span>3.25 % of Gross</span></p>
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
                <textarea class="form-control" id="exampleTextarea" placeholder="Enter Reamarks"></textarea>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary">Add Salary BreakUp</button>


                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <div>
                    <button class="btn btn-sm btn-primary">Preview Letter</button>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-12 d-flex justify-content-end gap-2 mb-2">
        <button class="btn btn-sm btn-primary">Dismiss</button>
        <button class="btn btn-sm btn-primary">Send Letter</button>

    </div>
</div>





@endsection