@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
<style>
  td {
        white-space: pre-wrap; /* Preserves whitespace and wraps text */
        word-wrap: break-word; /* Breaks long words if needed */
    }
</style>

@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="d-flex align-items-center justify-content-center">
                    <img src="assets/images/PrakharNEWLogo.png" alt="Logo" width="120" class="text-center my-2">
                </div>

                <div class="invoice-header d-flex justify-content-center align-items-centerSS">
                    <div class="row justify-content-center w-100">
                        <div class="col-xl-7 col-lg-12 col-sm-12 text-center" id="invoice-center">
                            <h3 class="prakhrar-heading">PRAKHAR SOFTWARE SOLUTIONS PVT. LTD</h3>
                            <p>LGF, C-11, Malviya Nagar (Opp. SBI Bank), New Delhi - 110017</p>
                            <p>Ph.No. 01140631622 &nbsp;&nbsp; Mail: hr@prakharsoftwares.com</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 table-responsive">
                    <table class="table table-borderless table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <tbody>
                            <tr >
                                <th class="dark">
                                    Leave Code :
                                </th>
                                <td>VIKAS VERMA</td>
                                <th class="dark">
                                    Applied Date:
                                </th>
                                <td>9th January, 2025</td>
                            </tr>
                            <tr>
                                <th class="dark">
                                    Name :
                                </th>
                                <td>VIKAS VERMA</td>
                                <th class="dark">
                                    EMP Code :
                                </th>
                                <td>PSSPL/DEL/2023-24/0293</td>
                            </tr>
                            <tr>
                                <th class="dark">
                                    Designation :
                                </th>
                                <td>PHP DEVELOPER</td>
                                <th class="dark">
                                    Department :
                                </th>
                                <td>IT</td>
                            </tr>
                            <tr>
                                <th class="dark">
                                    Type Of Leave Requested :
                                </th>
                                <td colspan="3">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Sick Leave
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Casual Leave
                                    </label>

                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Birthday Leave
                                    </label>

                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Anniversary Leave
                                    </label>

                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Half Day Leave
                                    </label>

                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Short Day Leave
                                    </label>
                                    <br>
                                   
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Official Tour/Travel
                                    </label>
                                    
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Comp Off
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Other
                                    </label>
                                </td>

                            </tr>

                            <tr>
                                <th class="dark">
                                    Date of Leave :
                                </th>
                                <td colspan="3">18th September, 2025, 17th September, 2025, 13th September, 2025, 13th
                                    October, 2025 </td>

                            </tr>
                            <tr>
                                <th class="dark">
                                    Total No. Of days :
                                </th>
                                <td colspan="3">
                                    8 </td>
                            </tr>
                            <tr>
                                <th class="dark">
                                    Reason For Absence :
                                </th>
                                <td colspan="3" class="res_com">NA </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 ">
                        <p class="px-1"><span class="text-danger">Note : </span>You must submit request for absence, other than sick leave, two days prior to
                            the first day of your absent and please attach supportive document for sick leave</p>
                    </div>
                </div>
                <div class="panel-header">
                    <h6>Approval/Disapproval Section</h6>
                </div>
                <div class="row mt-2 px-2">
                    <div class="col-md-6">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Approved
                    </div>
                    <div class="col-md-6">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Rejected
                    </div>
                </div>
                <div class="panel-header">
                    <h6>Comment/Remarks</h6>
                </div>
                <div class="row mt-2 px-2">
                    <div class="col-md-8 payment">
                        <p>Date : <span class="text-black">9th January 2025</span></p>
                    </div>
                    <div class="col-md-4 payment">
                        <p class="text-dark">Approved By : <span>Harsh Singh</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Print <i class="fa-solid fa-print"></i></button>
        </div>
    </div>
</div>

@endsection