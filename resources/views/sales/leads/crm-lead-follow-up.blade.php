@extends('layouts.master')

@section('contents')

<div class="row">
    <div class="col-md-12">
        <div class="panel shadow-sm">
            <div class="panel-header d-flex">
                <h3 class="mt-2">Lead Tracker Data</h3>
                <div>
                    <ul class="breadcrumb">

                        <li>
                            <a href="{{get_dashboard()}}">Dashboard</a>
                        </li>
                        <li><a href="{{route('leads.list')}}">Lead List</a></li>
                         <li><a href="#">Lead Tracker Data</a></li>
                    </ul>
                </div>
            </div>
            @if (session()->has('success'))
            <div class="col-md-12 mt-3">
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session()->get('message') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="col-md-12">
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" fill="#b02a37" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        {{ session()->get('message') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="row mt-3 px-3">
                <!-- Lead Summary Section -->
                <div class="col-md-9">
                    <div class="card shadow-sm mb-3">
                        <div class="card-header bg-light">
                            <strong>Lead Summary</strong>
                        </div>
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-4"><strong>Project Name:</strong> {{ $leads->projectDetails ? $leads->projectDetails->project_name : '' }}</div>
                                <div class="col-sm-6 col-md-4"><strong>Client Name:</strong> {{ $leads->projectDetails ? $leads->projectDetails->client->client_name : '' }}</div>
                                <div class="col-sm-6 col-md-4"><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($leads->deadline)->format('d-m-Y'); }}</div>
                            </div>
                            <div class="row mb-2">
                                @if(auth()->user()->company_id == '2')
                                <div class="col-sm-6 col-md-4"><strong>Category:</strong> {{ $leads->getCategory ? $leads->getCategory->category_name : '' }}</div>
                                @endif
                                <div class="col-sm-6 col-md-4"><strong>Source:</strong> {{ $leads->getSource ? $leads->getSource->source_name : '' }}</div>
                                <div class="col-sm-6 col-md-4"><strong>Lead Created On:</strong> {{ $leads->created_at->format('d-m-Y') }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-4"><strong>Lead Status:</strong> {{ ucwords($leads->lead_status) }} </div>
                                <div class="col-sm-6 col-md-4">
                                    <strong>Follow Up Status:</strong>
                                    <span class="badge bg-danger" style="font-size: 10px;"> {{ $leads->leadAssignUser ? ucwords($leads->leadAssignUser->follow_up_status) : '' }}</span>
                                </div>
                                @if($leads->lead_status == 'win')
                                <div class="col-sm-6 col-md-4">
                                    <strong>Work Order No.:</strong>
                                    <span class="badge bg-danger" style="font-size: 10px;"> {{ $leads->wo_no ? $leads->wo_no : 'Not Available' }}</span>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <strong>Closing Amount :</strong>
                                    <span class="badge bg-danger" style="font-size: 10px;"> {{ number_format($leads->closing_amount, 2) }}</span>
                                </div>
                                @endif
                                <div class="col-sm-6 col-md-4">
                                    <a href="{{route('leads.show', ['id' => $leads->id])}}"> <button type="button" class="btn btn-sm btn-outline-primary">
                                            View More Details
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Information Panel -->
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <strong>Information</strong>
                        </div>
                        <div class="card-body">
                            <div><strong>Currently Assigned:</strong> {{ $leads->leadAssignUser ? ucwords($leads->leadAssignUser->user->first_name ." ".$leads->leadAssignUser->user->last_name) : '' }}</div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Lead Tracker Data -->

            <div class="col-md-12   text-center fs-6 fw-bold text-dark">
                Lead Tracker
                <hr>
            </div>
            <div class="col-md-12">

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



            <div class="col-md-12   text-center fs-6 fw-bold text-dark mt-2 mb-2">
                <div class="card shadow-sm mb-3 mt-3">
                    <div class="card-header bg-light">
                        <div class="row mb-2">
                            <div class="col-sm-6 col-md-6">Lead Status updated as {{ $changed_lead_status->action_type }} on {{ $changed_lead_status->created_at->format('d-m-Y h:i a') }}</div>
                            <div class="col-sm-6 col-md-3">Assigned to: {{ ucwords($changed_lead_status->assignedUser->first_name) ." ".ucwords($changed_lead_status->assignedUser->last_name)  }}</span> </div>
                            <div class="col-sm-6 col-md-3"><span>Changed By: {{ ucwords($changed_lead_status->createdBy->first_name) ." ".ucwords($changed_lead_status->createdBy->last_name)  }}</div>
                        </div>
                    </div>
                </div>


                <!-- Comment Section -->
                @if(auth()->user()->role->role_name != "sales_admin" && $leads->lead_status != 'win' && $leads->lead_status != 'lose')

                <form action="{{ route('leads.storeLeadFollowUp') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row px-3">
                        <div class="col-md-12">

                            <label for="body" class="form-label">Comment <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="comment" rows="6" id="body" placeholder="Write your message here"></textarea>
                            @error('comment')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <input type="hidden" name="lead_id" value="{{ $leads->id }}">
                            <input type="hidden" name="lead_assign_user_id" value="{{ $leads->leadAssignUser->user->id }}">
                        </div>
                    </div>

                    <!-- Follow Up Date -->
                    <div class="row px-3">
                        <div class="col-md-6 mb-3">

                            <label for="followUpDate" class="form-label">Next Follow Up Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="next_follow_up" required>
                            @error('next_follow_up')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">Attachment</label>
                            <input type="file" multiple class="form-control" name="comment_file[]" accept="application/pdf">
                            @error('comment_file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="row px-3 py-4">
                        <div class="col-md-12 d-flex justify-content-end gap-2 mt-3">

                            <div>
                                <button type="button" class="btn btn-sm btn-primary">Cancel</button>

                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary">Add Follow Up</button>

                            </div>

                        </div>
                    </div>
                </form>

                @endif

                <!-- Win or / Lose -->
                @if(auth()->user()->role->role_name != 'sales_admin')
                <div class="row" style="position: relative;">
                    <div class="col-md-12 d-flex justify-content-end gap-2 mt-3 mx-3 border border-white bg-dark " style="max-width: 10%; position:fixed; z-index: 100; right: 0; bottom: 40px;  padding: 10px; border-radius: 10px;">
                        <div>
                            <button type="button" class="btn btn-sm btn-info myModel" data-status="Win" data-lead_id="{{ $leads->lead_uni_id }}" name="win" id="win" {{  $leads->lead_status != 'open' ? "disabled" : ''  }} >Win</button>
                            <button type="button" class="btn btn-sm btn-danger myModel" data-status="Lose" data-lead_id="{{ $leads->lead_uni_id }}" name="lose" id="lose" {{  $leads->lead_status != 'open' ? "disabled" : ''  }}>Lose</button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endsection


        <div class="modal fade" id="myModalOpen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="{{ route('leads.updateLeadStatus', $leads->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h6 class="modal-title fs-5 text-white" id="staticBackdropLabel">Update Status: <span id="lead_name"></span></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <!-- Equal-height Project Cards -->
                            <div class="row mb-4">
                                <div class="col-md-4 d-flex">
                                    <div class="card  shadow-sm border bg-light">
                                        <div class="card-body d-flex">
                                            <i class="bi bi-briefcase-fill text-primary fs-4 me-3"></i>
                                            <div>
                                                <div class="fw-semibold text-secondary small">Project Name</div>
                                                <div class="text-dark">{{ $leads->projectDetails ? $leads->projectDetails->project_name : '' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="card  shadow-sm border bg-light">
                                        <div class="card-body d-flex">
                                            <i class="bi bi-briefcase-fill text-primary fs-4 me-3"></i>
                                            <div>
                                                <div class="fw-semibold text-secondary small">Client Name</div>
                                                <div class="text-dark">{{ $leads->projectDetails ? $leads->projectDetails->client->client_name : '' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="card  shadow-sm border bg-light">
                                        <div class="card-body d-flex">
                                            <i class="bi bi-briefcase-fill text-primary fs-4 me-3"></i>
                                            <div>
                                                <div class="fw-semibold text-secondary small">Deadline</div>
                                                <div class="text-dark">{{ \Carbon\Carbon::parse($leads->deadline)->format('d-m-Y'); }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="card  shadow-sm border bg-light">
                                        <div class="card-body d-flex">
                                            <i class="bi bi-briefcase-fill text-primary fs-4 me-3"></i>
                                            <div>
                                                <div class="fw-semibold text-secondary small">Work Order No.</div>
                                                <div class="text-dark">{{ $leads->wo_no ? $leads->wo_no : 'Not Available' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Success Message -->

                            <!-- Input Fields -->
                            <div class="row g-3">
                                 <div class="col-md-12" style="text-align:center;margin:auto;">
                                    <span style="font-weight:bold;margin-bottom:10px;" id="status_label" title="status"></span>
                                </div>
                                <div class="col-md-12">
                                    
                                     <input type="hidden" class="form-control" placeholder="Enter data Here" name="lead_status" id="status">
                                        <input type="hidden" class="form-control" placeholder="Enter data Here" name="assigned_user_id" value="{{ $leads->leadAssignUser->user->id }}">
                                    <label class="form-label" id="wo_no_lab">Work Order No</label>
                                    <input type="text" class="form-control" placeholder="Enter Work Order No" name="wo_no" id="wo_no_id" value="{{ $leads->wo_no }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" id="clos_amt_lab">Closing Amount <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Closing Amount" name="clos_amt" id="clos_amt" value="{{ $leads->closing_amount }}" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Remarks <span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Enter Remarks" rows="3" id="status_remarks" name="status_remarks" placeholder="Enter Remarks Here" required>{{ $leads->status_remarks}}</textarea>
                                     <textarea class="form-control" placeholder="Enter Remarks" rows="3" id="lose_remarks" name="lose_remarks" placeholder="Enter Remarks Here" required>{{ $leads->lose_remarks}}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Dismiss</button>
                            <button type="submit" name="update_status" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @section('script')
        <script src="{{asset('assets/js/compose.js')}}"></script>
        <script src="{{asset('assets/js/crm-lead-followup.js')}}"></script>
        @endsection
