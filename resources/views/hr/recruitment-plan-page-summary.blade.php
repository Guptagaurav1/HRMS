@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header heading-stripe">
                    <h3 class="mt-2 text-center">Preview Summary Page</h3>
                </div>
                
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="panel border border-dark shadow-lg text-center" id="card">
                            <div class="panel-header">
                                <h4 class="mt-2 px-2">Preview Summary</h4>
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                                    <tbody>
                                        <tr>
                                            <td class="bold">Position title</td>
                                            <td>Developer</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Client Name</td>
                                            <td>IFCI</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Requirement</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Department</td>
                                            <td>IT</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Functional Role</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">State</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">City</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Last Date Of Fullfillment</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Education</td>
                                            <td>0-2 Years</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Skills</td>
                                            <td class="text-wrap">
                                              NA
                                               
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Experience</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Description</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Attachment</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Remarks</td>
                                            <td>NA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                       
                        <div class="ratio ratio-1x1 h-auto border h-1000">
                            <iframe src="{{ asset('assets/resume/resume.pdf') }}" title="Resume" frameborder="0" allowfullscreen >
                        </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
