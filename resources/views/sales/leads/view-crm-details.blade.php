@extends('layouts.master')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header d-flex">
                <h2 class="mt-2">Lead Details</h2>
                <div>
                    <ul class="breadcrumb">

                        <li>
                            <a href="{{get_dashboard()}}">Dashboard</a>
                        </li>
                        <li><a href="{{route('leads.list')}}">Lead List</a></li>
                        <li>Lead Details</li>
                    </ul>
                </div>

            </div>

            
                <div class="text-end px-3 mt-3">
                    <strong>Status :  </strong>
                    <span class="badge bg-primary">{{ ucwords($lead->lead_status) }}</span>
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
                                <td class="attributes-column">{{ $lead->lead_title }}</td>
                                <td class="fw-bold text-dark">Lead Id: </td>
                                <td class="attributes-column">{{ $lead->lead_uni_id }}</td>
                               
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Project Name:</td>
                                <td class="attributes-column">{{$lead->projectDetails ?  $lead->projectDetails->project_name : ''}}</td>
                                <td class="fw-bold text-dark">Client Name:</td>
                                <td class="attributes-column">{{ $lead->projectDetails ? $lead->projectDetails->client->client_name : '' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Deadline:</td>
                                <td class="attributes-column">{{ \Carbon\Carbon::parse($lead->deadline)->format('d-m-Y'); }}</td>
                                <td class="fw-bold text-dark">Category:</td>
                                <td class="attributes-column">{{ $lead->getCategory ? $lead->getCategory->category_name : '' }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Source:</td>
                                <td class="attributes-column">{{ $lead->getSource ? $lead->getSource->source_name : '' }}</td>
                                <td class="fw-bold text-dark">Lead Created On:</td>
                                <td class="attributes-column">{{ $lead->created_at->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Lead Description:</td>
                                <td class="attributes-column">{{$lead->description }}</td>
                                <td class="fw-bold text-dark">Lead Remarks:</td>
                                <td class="attributes-column">{{$lead->remarks }}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-dark">Work Order No:</td>
                                <td class="attributes-column">{{ $lead->wo_no ? $lead->wo_no : 'Not Available' }}</td>
                                <td class="fw-bold text-dark">Closing Amount:</td>
                                <td class="attributes-column">{{ number_format($lead->closing_amount, 2) }}</td>
                            </tr>
                            

                            <tr>
                                <td class="fw-bold text-dark">Lead Status Description:</td>
                                <td class="attributes-column" colspan="3">{{ $lead->status_remarks ? $lead->status_remarks : 'Not Available'}}</td>
                               
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

                                @forelse ($leadAttachments as $value)
                                <tr>
                                    <td class='text-center'>{{ $loop->iteration }}</td>
                                    <td class='text-center attributes-column'>{{ $value->file_type }}</td>
                                    <td class='text-center attributes-column '><a href="{{ asset('upload/crm/lead/'.$value->file_name) }}" class="btn btn-sm btn-primary"><button class="btn btn-sm btn-primary">
                                        View Attachment
                                    </button></a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td class='text-center' colspan="3"><span class="text-danger">Data not found</span></td>
                                   
                                </tr>
                                @endforelse
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
                                    <td class='text-center attributes-column'>{{ $lead->leadAssignUser ? ucwords($lead->leadAssignUser->user->first_name." ".$lead->leadAssignUser->user->last_name) : '' }}</td>
                                    <td class='text-center attributes-column'>{{ $lead->leadAssignUser ? $lead->leadAssignUser->user->phone : '' }}</td>
                                    <td class='text-center attributes-column'>
                                        {{ $lead->leadAssignUser->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class='text-center attributes-column'>
                                        <span class="badge bg-primary">{{ ucwords($lead->leadAssignUser->follow_up_status) }}</span></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        <p class="text-center fw-bold text-dark mb-3 mt-3" colspan="12">Follow Up Status</p>
                        @forelse ($leadFollowups as $value)
                        <div class="card shadow-sm mb-3 mt-3">
                            <div class="card-header bg-light">
                                <div class="row mb-2">
                                    <div class="col-sm-6 col-md-4"><strong>Date:</strong> {{ $value->created_at->format('d-m-Y') }}</div>
                                    <div class="col-sm-6 col-md-4"><strong>Next Follow Up:</strong> {{ \Carbon\Carbon::parse($value->next_follow_up)->format('d-m-Y'); }} </div>
                                    <div class="col-sm-6 col-md-4"><strong>By:</strong> {{ $value->first_name ." ".$value->last_name }}</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-6 col-md-4">#{{ $loop->iteration }} <br>
                                        {!! $value->comment !!}
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <?php
                                        $attachments = explode(",", $value->comment_file);
                                        ?>
                                        @foreach($attachments as $key => $value)
                                        <a href="{{ asset('upload/crm/follow_up/'.$value) }}" class="btn btn-sm btn-primary"><button class="btn btn-sm btn-primary">
                                            View Attachment
                                        </button></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-12 col-md-12">Lead Follow Up Not found </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection