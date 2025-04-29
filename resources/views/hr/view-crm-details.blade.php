@extends('layouts.master')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">CRM Details</h2>

            </div>

            
                <div class="text-end px-3 mt-3">
                    <strong>Status :  </strong>
                    <span class="badge bg-primary">Primary</span>
                </div>
            
            <div class="panel-body p-3">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <!-- Details -->

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">

                            <tr>
                                <td class="text-center fw-bold text-dark" colspan="12">Lead Details</td>
                            </tr>


                            <tr>

                            <td class="fw-bold text-dark">Lead Title:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Lead Id:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                               
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Project Name:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Client Name:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Deadline:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Category:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Source:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Lead Created On:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Lead Description:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Lead Remarks:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Work Order No:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Closing Amount:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                            </tr>
                            

                            <tr>
                                <td class="fw-bold text-dark" colspan="3">Lead Status Description:</td>
                                <td class="attributes-column" colspan="3">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                               
                            </tr>
                        </table>
                    </div>

                    <!-- Contact Details -->
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">

                            <tr>
                                <td class="text-center fw-bold text-dark" colspan="12">Contact Details</td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-dark">Name:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Email:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Designation:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                                <td class="fw-bold text-dark">Contact No:</td>
                                <td class="attributes-column">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark" colspan="3">Landline:</td>
                                <td class="attributes-column" colspan="3">Department of Land and Land Reforms and Refugee Relief and
                                    Rehabilitation</td>
                               
                            </tr>

                        </table>
                    </div>

                    <!-- Attachment Users -->

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tr>
                                <td class="text-center fw-bold text-dark" colspan="12">Attachment Files</td>
                            </tr>

                            <tr>
                                <th class='text-center fw-bold'>S.No</th>
                                <th class='text-center fw-bold'>Attachment Type</th>
                                <th class='text-center fw-bold'>Attachment</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td class='text-center'>1</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    
                                   

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Assigned Users -->

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tr>
                                <td class="text-center fw-bold text-dark" colspan="12">Assigned User</td>
                            </tr>

                            <tr>
                                <th class='text-center fw-bold'>Name</th>
                                <th class='text-center fw-bold'>Email</th>
                                <th class='text-center fw-bold'>Contact</th>
                                <th class='text-center fw-bold'>Assigned Date</th>
                                <th class='text-center fw-bold'>Follow Up</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td class='text-center'>1</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>
                                        <a href=""> <button class="btn btn-sm btn-primary">
                                                View Attachment
                                            </button>
                                        </a>
                                    </td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>

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