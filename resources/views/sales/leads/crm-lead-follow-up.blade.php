@extends('layouts.master')

@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="panel shadow-sm">
            <div class="panel-header">
                <h3 class="mt-2">Lead Tracker Data</h3>
            </div>
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
                                <div class="col-sm-6 col-md-4"><strong>Category:</strong> {{ $leads->getCategory ? $leads->getCategory->category_name : '' }}</div>
                                <div class="col-sm-6 col-md-4"><strong>Source:</strong> {{ $leads->getSource ? $leads->getSource->source_name : '' }}</div>
                                <div class="col-sm-6 col-md-4"><strong>Lead Created On:</strong> {{ $leads->created_at->format('d-m-Y') }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-6 col-md-4"><strong>Lead Status:</strong> {{ ucwords($leads->lead_status) }} </div>
                                <div class="col-sm-6 col-md-4">
                                    <strong>Follow Up Status:</strong>
                                    <span class="badge bg-danger" style="font-size: 10px;"> {{ $leads->leadAssignUser ? ucwords($leads->leadAssignUser->follow_up_status) : '' }}</span>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <a href="{{route('leads.show', ['id' => $leads->id])}}"> <button type="button"
                                            class="btn btn-sm btn-outline-primary">
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


            <form action="{{ route('leads.storeLeadFollowUp') }}" method="post" enctype="multipart/form-data">
                @csrf 

                @if (session()->has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24" role="img"
                                aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('message') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" fill="#b02a37" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('message') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif

            <div class="row px-3">
                <div class="col-md-12">
                   
                    <label for="body" class="form-label">Comment <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="comment" rows="6" id="body"
                        placeholder="Write your message here"></textarea>
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

                    <label for="followUpDate" class="form-label">Next Follow Up Date <span
                            class="text-danger">*</span></label>
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

            <!-- Win or / Lose -->

            <div class="row" style="position: relative;">
                <div class="col-md-12 d-flex justify-content-end gap-2 mt-3 mx-3 border border-white bg-dark "
                    style="max-width: 10%; position:fixed; z-index: 100; right: 0; bottom: 40px;  padding: 10px; border-radius: 10px;">
                    <div>
                        <button type="button" class="btn btn-sm btn-info">Win</button>

                    </div>
                    <div>
                        <button type="button" class="btn btn-sm btn-danger">Lose</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script src="{{asset('assets/js/compose.js')}}"></script>
<script src="{{asset('assets/js/crm-lead-followup.js')}}"></script>
@endsection