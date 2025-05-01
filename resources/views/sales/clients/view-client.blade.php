@extends('layouts.master', ['title' => 'View Details'])

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Company Details</h2>

                </div>
                <div class="panel-body p-3">
                    <div class="col-md-12 text-end">
                        <a class="btn btn-primary" href="{{ route('sales-clients.list') }}">Back</a>
                    </div>
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <!-- Details -->

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                id="allEmployeeTable">

                                <tr>
                                    <td class="text-center fw-bold text-dark" colspan="12">Details</td>
                                </tr>


                                <tr>
                                    <td class="fw-bold text-dark">Client Name:</td>
                                    <td class="attributes-column">{{ $client->client_name }}</td>
                                    <td class="fw-bold text-dark">Department Name:</td>
                                    <td class="attributes-column">{{ $client->department_name }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">Consern Ministry:</td>
                                    <td class="attributes-column">{{ $client->consern_ministry }}</td>
                                    <td class="fw-bold text-dark">GST No:</td>
                                    <td class="attributes-column">{{ $client->gst_no }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">Company Industry:</td>
                                    <td class="attributes-column">{{ $client->company_industry }}</td>
                                    <td class="fw-bold text-dark">Company Type:</td>
                                    <td class="attributes-column">{{ $client->company_type }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">Reference:</td>
                                    <td class="attributes-column">{{ $client->reference }}</td>
                                    <td class="fw-bold text-dark">State:</td>
                                    <td class="attributes-column">{{ $client->company_state }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">City:</td>
                                    <td class="attributes-column">{{ $client->company_city }}</td>
                                    <td class="fw-bold text-dark">Postal Code:</td>
                                    <td class="attributes-column">{{ $client->company_pincode }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">Address:</td>
                                    <td class="attributes-column">{{ $client->company_address }}</td>
                                    <td class="fw-bold text-dark">Remarks:</td>
                                    <td class="attributes-column">{{ $client->remarks }}</td>
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
                                    <td class="attributes-column">{{ $client->contact_name }}</td>
                                    <td class="fw-bold text-dark">Email:</td>
                                    <td class="attributes-column">{{ $client->contact_email }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">Designation:</td>
                                    <td class="attributes-column">{{ $client->contact_designation }}</td>
                                    <td class="fw-bold text-dark">Contact No:</td>
                                    <td class="attributes-column">{{ $client->contact_phone }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold text-dark">Landline:</td>
                                    <td class="attributes-column">{{ $client->contact_landline }}</td>
                                    <td class="fw-bold text-dark">Fax:</td>
                                    <td class="attributes-column">{{ $client->contact_fax }}</td>
                                </tr>

                            </table>
                        </div>

                        <!-- Decision Maker details -->

                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                id="allEmployeeTable">

                                <tr>
                                    <td class="text-center fw-bold text-dark" colspan="12">Decision Maker Details</td>
                                </tr>


                                <tr>
                                    <td class="fw-bold text-dark">Decision Maker Name:</td>
                                    <td class="attributes-column">{{ $client->d_maker_name }}</td>
                                    <td class="fw-bold text-dark">Decision Maker Email:</td>
                                    <td class="attributes-column">{{ $client->d_maker_email }}</td>
                                </tr>
                                <tr>

                                    <td class="fw-bold text-dark" colspan="3">Decision Maker Phone:</td>
                                    <td class="attributes-column">{{ $client->d_maker_phone }}</td>


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
                                    @forelse ($client->attachments as $attachment)
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
