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
                <div class="col-md-12 text-center py-3 ">
                    <label>Select Month :</label><br>
                    <input type="text" name="birthday" value="10/24/1984" />
                    <button type="submit" class="btn btn-primary">Check</button>
                </div>
                <div class="col-md-12 px-3">
                    <p class="text-danger" style="font-size: 12px;">Total Hrs Applicable Only For Some Cases</p>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3 mt-3">
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
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
                                <th>No. of Working Days</th>
                                <th>Gender</th>
                                <th>Bank Name / Account No</th>
                                <th>Joining Date</th>
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
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>BECIL/ND/DRDO/MAN/2425/1323_Extension</td>
                                <td>Binay Tiwari</td>
                                <td>14th October, 2024</td>
                                <td>BEGOV21M1203</td>
                                <td>22</td>
                                <td>Male</td>
                                <td>Axis Bank / 1234567890</td>
                                <td>14th November, 2024</td>
                                <td>---</td>
                                <td>Delhi</td>
                                <td>Manager</td>
                                <td>No Remarks</td>
                                <td>0</td>
                                <td>0</td>
                                <td>500</td>
                                <td>160</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-auto m-2 px-3 ">
                        <button class="btn btn-primary">Add Attendance</button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-12 py-2 mt-3 text-center">
                    <p class="fw-bold fs-5 work-order-No">
                        View Attendance and Calculate Salary for<br>
                        <span>Work order: BECIL/ND/DRDO/MAN/2425/1323_Extension</span>
                    </p>
                </div>
                <div class="col-md-12 text-center py-3 ">
                    <label>Select Month :</label><br>
                    <input type="text" name="birthday" value="10/24/1984" />
                    <button type="submit" class="btn btn-primary">View <i class="fa-solid fa-eye"></i></button>
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

@endsection