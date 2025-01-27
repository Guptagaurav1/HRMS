@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center">Telecaller Cum Counselor Position Report Log</h3>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive mt-3 ">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column text-center">Candidate Name</th>
                                <th class="text-center">Candidate Email</th>
                                <th class="attributes-column">JD Details</th>
                                <th class="text-center">Recruiter Email</th>
                                <th class="text-center">Expected Joining Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">View Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column text-center">PSSPL/DEL/2021-22/0174</td>
                                <td class="text-center">Gaurav Gupta</td>
                                <td class="attributes-column">Checking</td>
                                <td class="text-center">Nothing</td>
                                <td class="text-center">
                                    NA
                                </td>
                                <td class="text-center">19-march-2024</td>
                                <td class="text-center">
    
                                    NA
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

