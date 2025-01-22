@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Employee Details</h3>
            </div>

            <div class="col-md-12 d-flex justify-content-start mx-3 mt-4">
                <form class="row g-3">
                    <div class="col-auto mb-3">
                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <div class="row px-2">
                    <div class="col-sm-6 col-xs-12">
                        <h4 class="panel-header">Employee Details</h4>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">Employee Code:</td>
                                    <td>PSSPL/DEL/2021-22/0172</td>
                                </tr>
                                <tr>
                                    <td class="bold">Employee Name:</td>
                                    <td>Sumit Kumar</td>
                                </tr>
                                <tr>
                                    <td class="bold">Gender:</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td class="bold">Category:</td>
                                    <td>GENERAL</td>
                                </tr>
                                <tr>
                                    <td class="bold">Work Order No:</td>
                                    <td>PSSPL Internal Employees</td>
                                </tr>
                                <tr>
                                    <td class="bold">Job Place:</td>
                                    <td>Delhi</td>
                                </tr>
                                <tr>
                                    <td class="bold">Designation:</td>
                                    <td>MIS HEAD</td>
                                </tr>
                                <tr>
                                    <td class="bold">Department:</td>
                                    <td>IT</td>
                                </tr>
                                <tr>
                                    <td class="bold">Functional Role:</td>
                                    <td>DATA ENTRY OPERATOR</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date of Joining:</td>
                                    <td>2nd November, 2021</td>
                                </tr>
                                <tr>
                                    <td class="bold">Skills:</td>
                                    <td>EXCEL</td>
                                </tr>
                                <tr>
                                    <td class="bold">CTC:</td>
                                    <td>₹ 21,100.00</td>
                                </tr>
                                <tr>
                                    <td class="bold">Reporting To:</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-xs-12 px-2">
                        <h4 class="panel-header">Personal Details</h4>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">Permanent Address:</td>
                                    <td>PSSPL/DEL/2021-22/0172</td>
                                </tr>
                                <tr>
                                    <td class="bold">Correspondence Address:</td>
                                    <td>Sumit Kumar</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date of birth:</td>
                                    <td>Male</td>
                                </tr>
                                <tr>
                                    <td class="bold">Personal Contact no:</td>
                                    <td>GENERAL</td>
                                </tr>
                                <tr>
                                    <td class="bold">Alternate Contact no:</td>
                                    <td>PSSPL Internal Employees</td>
                                </tr>
                                <tr>
                                    <td class="bold">Personal Email Id:</td>
                                    <td>Delhi</td>
                                </tr>
                                <tr>
                                    <td class="bold">Official Email Id:</td>
                                    <td>MIS HEAD</td>
                                </tr>
                                <tr>
                                    <td class="bold">Father Name:</td>
                                    <td>IT</td>
                                </tr>
                                <tr>
                                    <td class="bold">Father Contact No:</td>
                                    <td>DATA ENTRY OPERATOR</td>
                                </tr>
                                <tr>
                                    <td class="bold">Blood Group :</td>
                                    <td>2nd November, 2021</td>
                                </tr>
                                <tr>
                                    <td class="bold">Marital Status :</td>
                                    <td>EXCEL</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date of Marriage :</td>
                                    <td>₹ 21,100.00</td>
                                </tr>
                                <tr>
                                    <td class="bold">Husband / Wife Name :</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                                <tr>
                                    <td class="bold">No of Childrens :</td>
                                    <td>hr@prakharsoftwares.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="row px-2">
                    <h4 class="panel-header">Education Qualification</h4>
                    <div class="col-sm-6 col-xs-12">

                        <div class="card-header px-2 py-1">
                            10th Qualification
                        </div>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>

                                <tr>
                                    <td class="bold">10th Passing Year:</td>
                                    <td>2015</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>80%</td>
                                </tr>
                                <tr>
                                    <td class="bold">Board Name</td>
                                    <td>NA</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <div class="card-header px-2 py-1">
                            12th Qualification
                        </div>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>

                                <tr>
                                    <td class="bold">12th Passing Year:</td>
                                    <td>2015</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>80%</td>
                                </tr>
                                <tr>
                                    <td class="bold">Board Name</td>
                                    <td>NA</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <div class="card-header px-2 py-1">
                            Graduation
                        </div>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>

                                <tr>
                                    <td class="bold">Graduation Passing Year/pursuing</td>
                                    <td>2015</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>80%</td>
                                </tr>
                                <tr>
                                    <td class="bold">Mode Of Graduation</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Degree Name</td>
                                    <td>NA</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <div class="card-header px-2 py-1">
                            Post Graduation
                        </div>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>

                                <tr>
                                    <td class="bold">Post Graduation Passing Year/pursuing</td>
                                    <td>2015</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>80%</td>
                                </tr>
                                <tr>
                                    <td class="bold">Mode Of Post Graduation</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Degree Name</td>
                                    <td>NA</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-xs-12">

                        <div class="card-header px-2 py-1">
                            Additional qualification
                        </div>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">Diploam/Course/Certificate Name</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Duration</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Marks/Percentage/Grade</td>
                                    <td>NA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <h4 class="panel-header">Bank Details</h4>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">Bank Name :</td>
                                    <td>HDFC Bank</td>
                                </tr>
                                <tr>
                                    <td class="bold">Branch Name :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Ifsc code :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Account No :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Aadhar No :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Pan No :</td>
                                    <td>NA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                    <div class="col-sm-6 col-xs-12">
                        <h4 class="panel-header">Other Details</h4>
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">PF UIN No :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">ESI No :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Passport No. :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Departments Recommendation :</td>
                                    <td>NA</td>
                                </tr>
                                <tr>
                                    <td class="bold">Working Status:</td>
                                    <td><span class="badge text-bg-success">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

