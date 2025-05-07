@extends('layouts.master', ['title' => 'Project Details'])

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Project Details</h2>

            </div>
            <div class="panel-body p-3">
                <div class="col-md-12 col-xs-12 col-sm-12">
                    <!-- Details -->
                    <div class="col-md-12 text-end">
                        <a href="{{route('sales-projects.list')}}" class="btn btn-primary my-2">Back</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">

                            <tr>
                                <td class="text-center fw-bold text-dark" colspan="12">Details</td>
                            </tr>


                            <tr>

                            <td class="fw-bold text-dark">Project Name:</td>
                                <td class="attributes-column">{{$project->project_name}}</td>
                                <td class="fw-bold text-dark">Client Name:</td>
                                <td class="attributes-column">{{$project->client ? $project->client->client_name : ''}}</td>
                               
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Amount:</td>
                                <td class="attributes-column">{{$project->amount ? Illuminate\Support\Number::currency($project->amount, in: 'INR') : 0}}</td>
                                <td class="fw-bold text-dark">No Of Requirements:</td>
                                <td class="attributes-column">{{$project->no_of_requirement}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Project Duration (In Months):</td>
                                <td class="attributes-column">{{$project->project_duration}}</td>
                                <td class="fw-bold text-dark">Ref Project Id (For NICSI):</td>
                                <td class="attributes-column">{{$project->ref_project_id}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Tender No (For NICSI):</td>
                                <td class="attributes-column">{{$project->tender_no}}</td>
                                <td class="fw-bold text-dark">Tender Valid Till (For NICSI):</td>
                                <td class="attributes-column">{{date('jS F, Y', strtotime($project->tender_valid_upto))}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Proforma Invoice No:</td>
                                <td class="attributes-column">{{$project->per_inv_no}}</td>
                                <td class="fw-bold text-dark">Proforma Invoice Date:</td>
                                <td class="attributes-column">{{date('jS F, Y', strtotime($project->per_inv_date))}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Letter Reference No:</td>
                                <td class="attributes-column">{{$project->letter_ref_no}}</td>
                                <td class="fw-bold text-dark">Letter Reference Date:</td>
                                <td class="attributes-column">{{date('jS F, Y', strtotime($project->letter_ref_date))}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Category:</td>
                                <td class="attributes-column">{{$project->category ? $project->category->category_name : ''}}</td>
                                <td class="fw-bold text-dark">Scope Of Project:</td>
                                <td class="attributes-column">{{$project->scope_of_project}}</td>
                            </tr>

                            <tr>
                                <td class="fw-bold text-dark">Description:</td>
                                <td class="attributes-column">{{$project->description}}</td>
                                <td class="fw-bold text-dark">Remarks:</td>
                                <td class="attributes-column">{{$project->remarks}}</td>
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
                                <td class="attributes-column">{{$project->p_contact_name}}</td>
                                <td class="fw-bold text-dark">Email:</td>
                                <td class="attributes-column">{{$project->p_contact_email}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Designation:</td>
                                <td class="attributes-column">{{$project->p_contact_designation}}</td>
                                <td class="fw-bold text-dark">Contact No:</td>
                                <td class="attributes-column">{{$project->p_contact_phone}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark" colspan="3">Landline:</td>
                                <td class="attributes-column" colspan="3">{{$project->p_contact_landline}}
                               
                            </tr>

                        </table>
                    </div>

                    <!-- Attachment Details -->

                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tr>
                                <td class="text-center fw-bold text-dark" colspan="12">Attachment Details</td>
                            </tr>

                            <tr>
                                <th class='text-center fw-bold'>S No</th>
                                <th class='text-center fw-bold'>Document Type</th>
                                <th class='text-center fw-bold'>Attachment</th>
                                <th class='text-center fw-bold'>Added Time</th>
                            </tr>
                            <tbody>

                              @forelse ($project->attachments as $attachment)
                                        <tr>
                                            <td class='text-center'>{{ $loop->iteration }}</td>
                                            <td class='text-center attributes-column'>{{ $attachment->file_type }}</td>
                                            <td class='text-center attributes-column'>
                                                <a href="{{ asset('upload/crm/client') . '/' . $attachment->file_name }}"
                                                    class="btn btn-sm btn-primary text-decoration-none text-light" target="_blank">
                                                    View Attachment
                                                </a>
                                            </td>
                                            <td class='text-center attributes-column'>{{ date('jS F, Y', strtotime($attachment->created_at)) }}</td>

                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-danger text-center" colspan="4">No Record Found</td>
                                        </tr>
                                    @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection