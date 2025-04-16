@extends('layouts.master', ['title' => 'Employee Details'])


@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <p class="mt-3">EMP CODE : {{$empdetails->emp_code}}</p>
                <p class="mt-3">Name : {{$empdetails->emp_name}}</p>
            </div>
            <div class="col-md-12 d-flex justify-content-end my-2 mr-2">
                <a href="{{route('salary-slip')}}" class="btn btn-primary">Back</a>
            </div>
            <div class="table-responsive mt-3">
                <div class="row px-4">
                    <div class="col-sm-12 col-xs-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr>
                                    <td class="bold">Gender</td>
                                    <td>{{$empdetails->getPersonalDetail->emp_gender}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date Of Birth</td>
                                    <td>{{$empdetails->getPersonalDetail->emp_dob}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Work Order</td>
                                    <td>{{$empdetails->emp_work_order}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Posting Place</td>
                                    <td>{{$empdetails->emp_place_of_posting}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Highest Qualification</td>
                                    <td>{{!empty($empdetails->education) &&  $empdetails->education->emp_highest_qualification ? $empdetails->education->emp_highest_qualification : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Father Name</td>
                                    <td>{{!empty($empdetails->getPersonalDetail) ? $empdetails->getPersonalDetail->emp_father_name : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Designation</td>
                                    <td>{{$empdetails->emp_designation}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Date Of Joining</td>
                                    <td>{{$empdetails->emp_doj}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Salary</td>
                                    <td>{{!empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_salary : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">PAN No</td>
                                    <td>{{!empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_pan : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Account No</td>
                                    <td>{{!empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_account_no : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Bank Name</td>
                                    <td>{{!empty($empdetails->getBankDetail) && !empty($empdetails->getBankDetail->getBankData) ? $empdetails->getBankDetail->getBankData->name_of_bank : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">IFSC Code</td>
                                    <td>{{!empty($empdetails->getBankDetail) ? $empdetails->getBankDetail->emp_ifsc : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Blood Group</td>
                                    <td>{{!empty($empdetails->getPersonalDetail) ? $empdetails->getPersonalDetail->emp_blood_group : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Permanent Address</td>
                                    <td>{{!empty($empdetails->getAddressDetail) ?$empdetails->getAddressDetail->emp_permanent_address : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Local Address</td>
                                    <td>{{!empty($empdetails->getAddressDetail) ?$empdetails->getAddressDetail->emp_local_address : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">City</td>
                                    <td>{{!empty($empdetails->getAddressDetail) ?$empdetails->getAddressDetail->getCity->city_name : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">State</td>
                                    <td>{{!empty($empdetails->getAddressDetail) && !empty($empdetails->getAddressDetail->getState) ?$empdetails->getAddressDetail->getState->state : ''}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Phone No.</td>
                                    <td>{{$empdetails->emp_phone_first}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Alternate Phone no</td>
                                    <td>{{$empdetails->emp_phone_second}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Email</td>
                                    <td>{{$empdetails->emp_email_first}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Alternate Email</td>
                                    <td>{{$empdetails->emp_email_second}}</td>
                                </tr>
                                <tr>
                                    <td class="bold">Emergency Contact No.</td>
                                    <td>{{$empdetails->emp_emergency_contact}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   

                </div>

               

                
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 d-flex justify-content-end gap-2 mb-2">
            @if(auth()->user()->hasPermission('employee-code-retainer'))
                <a href="{{route('employee-code-retainer', ['id' => $salaryid])}}"> <button class="btn btn-sm btn-primary">Print Salary Slip <i class="fa-solid fa-print"></i></button></a>  
            @endif
    
        </div>
    </div>
</div>
@endsection

