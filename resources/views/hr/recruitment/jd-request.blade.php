@extends('layouts.master', ['title' => 'JD Request'])


@section('contents')
<div class="row">
    <form class="requestform" action="{{route('send-jd-request')}}" method="post">
        @csrf
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Recruiter Request to Admin</h2>
            </div>

            <div class="row px-3 mb-3">
                <div class="col-md-12 d-flex justify-content-end ml-5 change">
                    <a href="{{route('user-request-list')}}" class="btn btn-sm btn-primary mt-3">Request List  <i class="fa-solid fa-list"></i></a>
                </div>

            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <symbol id="check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
            @if(session()->has('error'))
            <div class="col-md-12">
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    {{session()->get('message')}}
                </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            @endif

            @if(session()->has('success'))
            <div class="col-md-12">
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    {{session()->get('message')}}
                </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            @endif

            </div>
           
            <div class="table-responsive after-add-more" id="add-field">
                <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                    <thead id="table-head">
                        <tr>
                            <th class="text-center">S.No.</th>
                            <th class="text-center">Query Type</th>
                            <th class="text-center">Job Position</th>
                            <th class="text-center">Short Description</th>
                           {{-- Recruitment position status --}}
                            <th class="text-center position-status-column">Candidate List</th>
                            <th class="text-center position-status-column" >Candidate Current Status</th>
                            <th class="text-center position-status-column">Candidate Status Changed To</th>
                            <!-- Predefined columns for Offer Letter -->
                            <th class="text-center offer-letter-column" >Candidate List</th>
                            <th class="text-center offer-letter-column" >Candidate Current Status</th>
                            <th class="text-center offer-letter-column">Change</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                       
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">
                                <select id="inputState" class="form-select form-control" name="query_type">
                                    <option value="Job Description">Job Description</option>
                                    <option value="Recruitment Position Status">Recruitment Position Status</option>
                                    <option value="Offer Letter">Offer Letter</option>
                                </select>
                                @error('query_type')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td>
                                <select class="form-select form-control positions" name="job_position" required>
                                    <option value="">Select Option</option>
                                    @foreach($requests as $request)
                                    <option value="{{$request->req_id}}">{{$request->position_title." (".$request->client_name.")"}}</option>
                                    @endforeach
                                </select>
                                @error('job_position')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                            <td class="attributes-column">
                                <textarea class="form-control" name="short_description" placeholder="Enter Title with short Description" required></textarea>
                                @error('short_description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </td>
                           
                            <td class="both-status-column">
                                <select class="form-select form-control candidate_list" name="candidate">
                                    <option value="">Select Candidate</option>
                                </select>
                            </td>
                            <td class="both-status-column">
                                <input type='text' value='No status' class='form-control' disabled>
                            </td>
                            <td class="offer-letter-column">
                                <select name="change" class="form-select form-control">
                                    <option value="">Select Option</option>
                                    <option value="Candidate Name">Candidate Name</option>
                                    <option value="Candidate Designation">Candidate Designation</option>
                                </select>
                            </td>
                            <td class="position-status-column">
                                <select name="changed_to" class="form-select form-control">
                                    <option value="">Select Option</option>
                                    <option value="first-selected">CV Shortlisted</option>
                                    <option value="send_interview_details">Interview Details Sent</option>
                                    <option value="second-selected">First Interview Round Cleared</option>
                                    <option value="third-selected">Second Interview Round Cleared</option>
                                    <option value="fourth-selected">Confirmation Sent</option>
                                    <option value="offer-letter-sent">Offer Letter Sent</option>
                                    <option value="docs_checked">Document Checked</option>
                                    <option value="joining-formalities-completed">Joining Formalities Completed</option>
                                    <option value="joined">Joined</option>
                                    <option value="first-skipped">Skipped CV</option>
                                    <option value="second-skipped">Skipped First Interview Round</option>
                                    <option value="third-skipped">Skipped Second Interview Round</option>
                                    <option value="finally-skipped">Skipped</option>
                                    <option value="first-rejected">CV Rejected</option>
                                    <option value="second-rejected">Rejected First Interview Round</option>
                                    <option value="third-rejected">Rejected Second Interview Round</option>
                                    <option value="finally-rejected">Rejected</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-sm btn-primary m-2 sendrequest"> Send Request <i class="fa-solid fa-paper-plane"></i></button>
    </div>
    </form>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/user-request.js')}}"></script>
@endsection

