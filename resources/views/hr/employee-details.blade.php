@extends('layouts.master', ['title' => 'Employee Details'])
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
            <div class="col-md-12 d-flex justify-content-end my-2">
                <a href="{{route('leave-regularization')}}" class="btn btn-primary">Back</a>
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
                                    <td>{{$empdetails->emp_code}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Employee Name:</td>
                                    <td>{{$empdetails->emp_name}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Gender:</td>
                                    <td>{{$empdetails->emp_gender}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Category:</td>
                                    <td>{{$empdetails->emp_category}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Work Order No:</td>
                                    <td>{{$empdetails->emp_work_order}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Job Place:</td>
                                    <td>{{$empdetails->emp_place_of_posting}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Designation:</td>
                                    <td>{{$empdetails->emp_designation}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Department:</td>
                                    <td>{{$empdetails->department}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Functional Role:</td>
                                    <td>{{$empdetails->emp_functional_role}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date of Joining:</td>
                                    <td>{{$empdetails->emp_doj}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Skills:</td>
                                    <td>{{$empdetails->emp_skills}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">CTC:</td>
                                    <td>{{$empdetails->emp_salary}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Reporting To:</td>
                                    <td>{{$empdetails->reporting_email}}</td>
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
                                    <td class="attributes-column">PSSPL/DEL/2021-22/0172,PSSPL/DEL/2021-22/0172,PSSPL/DEL/2021-22/0172</td>
                                    <td>{{$empdetails->emp_permanent_address}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Correspondence Address:</td>
                                    <td>{{$empdetails->emp_local_address}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date of birth:</td>
                                    <td>{{$empdetails->emp_dob}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Personal Contact no:</td>
                                    <td>{{$empdetails->emp_phone_first}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Alternate Contact no:</td>
                                    <td>{{$empdetails->emp_phone_second}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Personal Email Id:</td>
                                    <td>{{$empdetails->emp_email_first}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Official Email Id:</td>
                                    <td>{{$empdetails->emp_email_second}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Father Name:</td>
                                    <td>{{$empdetails->emp_father_name}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Father Contact No:</td>
                                    <td>{{$empdetails->emp_phone_second}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Blood Group :</td>
                                    <td>{{$empdetails->emp_blood_group}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Marital Status :</td>
                                    <td>{{$empdetails->emp_martial_status}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date of Marriage :</td>
                                    <td>{{$empdetails->emp_dom}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Husband / Wife Name :</td>
                                    <td>{{$empdetails->emp_husband_wife_name}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">No of Childrens :</td>
                                    <td>{{$empdetails->emp_children}}</td>
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
                                    <td>{{$empdetails->emp_tenth_year}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>{{$empdetails->emp_tenth_percentage}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Board Name</td>
                                    <td>{{$empdetails->emp_tenth_board_name}}</td>
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
                                    <td>{{$empdetails->emp_twelve_year}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>{{$empdetails->emp_twelve_percentage}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Board Name</td>
                                    <td>{{$empdetails->emp_twelve_board_name}}</td>
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
                                    <td>{{$empdetails->emp_graduation_year}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>{{$empdetails->emp_graduation_percentage}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Mode Of Graduation</td>
                                    <td>{{$empdetails->emp_graduation_mode}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Degree Name</td>
                                    <td>{{$empdetails->emp_graduation_in}}</td>
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
                                    <td>{{$empdetails->emp_postgraduation_year}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Percentage/Grade:</td>
                                    <td>{{$empdetails->emp_postgraduation_percentage}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Mode Of Post Graduation</td>
                                    <td>{{$empdetails->emp_postgraduation_mode}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Degree Name</td>
                                    <td>{{$empdetails->emp_postgraduation_in}}</td>
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
                                    <td>{{$empdetails->emp_certification}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Duration</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="bold">Marks/Percentage/Grade</td>
                                    <td></td>
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
                                    <td>{{$empdetails->emp_bank}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Branch Name :</td>
                                    <td>{{$empdetails->emp_branch}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Ifsc code :</td>
                                    <td>{{$empdetails->emp_ifsc}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Account No :</td>
                                    <td>{{$empdetails->emp_account_no}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Aadhar No :</td>
                                    <td>{{$empdetails->emp_aadhaar_no}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Pan No :</td>
                                    <td>{{$empdetails->emp_pan}}</td>
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
                                    <td>{{$empdetails->emp_pf_no}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">ESI No :</td>
                                    <td>{{$empdetails->emp_esi_no}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Passport No. :</td>
                                    <td>{{$empdetails->emp_passport_no}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Departments Recommendation :</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="bold">Working Status:</td>
                                    <td><span class="badge text-bg-success">{{$empdetails->emp_status}}</span></td>
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

