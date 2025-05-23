@extends('layouts.master', ['title' => 'Send Job Description'])

@section('contents')
<div class="panel">
    <div class="panel-header  heading-stripe">
        <h3 class="mt-2 text-center">Preview Description</h3>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                <li> <a href="{{route('recruitment-report')}}">Recruitment Report</a></li>
                <li>Preview Description</li>
            </ul>
        </div>
    </div>
</div>
    <div class="dashboard-breadcrumb mb-25">
        <div class="d-flex gap-2 justify-items-center align-items-center">
            <input type="radio" class="tab-links active" name="fav_language" value="HTML" data-tab="1" checked>
            <label for="html">Single Mail</label><br>
            <input type="radio" class="tab-links" name="fav_language" value="HTML" data-tab="2">
            <label for="html">Bulk Mail</label><br>
        </div>
    </div>
    <div class="row">
      
        <!-- Single Mail Form -->
        <div class="row" id="tab-1">
            <form class="single_form" method="post">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="position_id" value="{{ $request->id }}" />
                    <input type="hidden" name="description" value="{{ $request->job_description }}" />
                    <input type="hidden" name="state_name" value="{{ $request->getState ? $request->getState->state : '' }}" />
                    <input type="hidden" name="cityname" value="{{ $request->getCity->city_name }}" />
                    <input type="hidden" name="qualification" value="{{ get_education($request->education) }}" />
                    <input type="hidden" name="skill_set" value="{{ get_skills($request->skill_sets) }}" />
                    <input type="hidden" name="experience" value="{{ format_experience($request->experience) }}" />
                    <input type="hidden" name="remark" value="{{ $request->remarks }}" />
                </div>
                <div class="col-12">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-dark text-white">Job Description</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label" class="text-dark">Department </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Department Name" name="department"
                                        value="{{ !empty($request->getDepartment) ?  $request->getDepartment->department : '' }}" readonly>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label" class="text-dark">Job Position </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Job Position" name="job_position"
                                        value="{{ $request->position_title }}" readonly>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label" class="text-dark">Sender Email Id </label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Sender Email ID" name="sender_email"
                                        value="{{ auth()->user()->email }}" readonly>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label" class="text-dark ">Job Seeker Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm for_char" name="jobseeker_email"
                                        placeholder="Enter Job Seeker Email" required>
                                        <span class="jobseeker_email"></span>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Job Seeker Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm for_char"
                                        placeholder="Enter Job Seeker Name" name="jobseeker_name" required>
                                        <span class="jobseeker_name"></span>
                                </div>
                                <div class="col-xxl-3 col-lg-12 col-sm-6">
                                    <label class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="exampleTextarea" name="message" placeholder="Enter A Message" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($request->no_of_requirements == $request->no_of_completed_requirements)
                    <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-primary" disabled> Send <i
                                class="fa-solid fa-paper-plane"></i></button>
                    </div>
                @elseif($request->no_of_requirements > $request->no_of_completed_requirements)
                    <div class="col-12 d-flex justify-content-end m-2">
                        <button type="submit" class="btn btn-sm btn-primary"> Send <i
                                class="fa-solid fa-paper-plane"></i></button>
                    </div>
                @endif
            </form>

            <!-- Only for Hr Executive -->
            @if ($request->no_of_requirements < $request->no_of_completed_requirements) 
            @if(auth()->user()->hasPermission('jd-request'))
                <a href="{{ route('jd-request', ['id' => $request->req_id]) }}"><button class="btn btn-sm btn-primary"> Request Job Description <i class="fa-solid fa-paper-plane"></i></button></a>   
            @endif
            @endif

        </div>
        
    <!-- Bulk Mail Form -->
    <div class="row" id="tab-2" style="display: none">
        <div class="col-12">
            <form class="bulk_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-none">
                    <input type="hidden" name="position_id" value="{{ $request->id }}" />
                    <input type="hidden" name="description" value="{{ $request->job_description }}" />
                    <input type="hidden" name="state_name" value="{{ $request->getState ? $request->getState->state : '' }}" />
                    <input type="hidden" name="cityname" value="{{ $request->getCity->city_name }}" />
                    <input type="hidden" name="qualification" value="{{ get_education($request->education) }}" />
                    <input type="hidden" name="skill_set" value="{{ get_skills($request->skill_sets) }}" />
                    <input type="hidden" name="experience" value="{{ format_experience($request->experience) }}" />
                    <input type="hidden" name="remark" value="{{ $request->remarks }}" />
                </div>
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-dark text-white">Job Description</h5>
                        <div class="btn-box">
                            <a href="{{ asset('sample/bulk_uploading.csv') }}" class="btn btn-sm btn-primary" download><i
                                    class="fa-solid fa-download"></i> Download CSV Format</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Department </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Enter Department Name" name="department"
                                    value="{{!empty($request->getDepartment) ?  $request->getDepartment->department : ''}}" readonly>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Job Position </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Enter Job Position" name="job_position"
                                    value="{{ $request->position_title }}" readonly>
                            </div>
                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                <label class="form-label" class="text-dark">Sender Email Id </label>
                                <input type="text" class="form-control form-control-sm"
                                    placeholder="Enter Sender Email ID" name="sender_email"
                                    value="{{ auth()->user()->email }}" readonly>
                            </div>
                            <div class="col-xxl-3 col-lg-12 col-sm-6">
                                <label class="form-label">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="message" placeholder="Enter A Message" required></textarea>
                            </div>
                            <div class="col-xxl-3 col-lg-12 col-sm-6">
                                <label for="file" class="form-label">Upload Csv <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="file" accept=".csv" required>
                                <a href="{{ asset('sample/bulk_uploading.csv') }}" class="text-primary"
                                    download><span>Download CSV File Format</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($request->no_of_requirements == $request->no_of_completed_requirements)
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-sm btn-primary" disabled> <i
                                class="fa-solid fa-upload"></i> Send All Email</button>
                    </div>
                @else
                    <div class="col-12 d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-sm btn-primary"> <i class="fa-solid fa-upload"></i> Send
                            All Email</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
    </div>

    <!-- Preview Summary -->
    <div class="panel border border-dark shadow-lg  text-center" id="card">
        <div class="panel-header">
            <h4 class="mt-2 px-2">Preview Summary</h4>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                id="allEmployeeTable">
                <tbody>

                    <tr>
                        <td class="bold">Position</td>
                        <td>{{ $request->no_of_requirements . ' - ' . $request->position_title }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Department</td>
                        <td>{{ !empty($request->getDepartment) ?  $request->getDepartment->department : '' }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Functional Role</td>
                        <td>{{ get_functional_roles($request->functional_role) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">State</td>
                        <td>{{ $request->getState ? $request->getState->state : '' }}</td>
                    </tr>
                    <tr>
                        <td class="bold">City</td>
                        <td>{{ $request->getCity->city_name }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Last Date Of Fulfillment</td>
                        <td>{{ date('jS F, Y', strtotime($request->date_notified)) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Education</td>
                        <td>{{ get_education($request->education) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Skills</td>
                        <td>{{ get_skills($request->skill_sets) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Experience</td>
                        <td>{{ format_experience($request->experience) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Description:</td>
                        <td class="text-wrap">
                            {{ $request->job_description }}
                        </td>
                    </tr>
                    <tr>
                        <td class="bold">Assigned To</td>
                        <td>{{ get_username($request->assigned_executive) }}</td>
                    </tr>
                    <tr>
                        <td class="bold">Remarks:</td>
                        <td>{{ $request->remarks }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('assets/js/tab-changes.js')}}"></script>    
<script src="{{asset('assets/js/commonValidation.js')}}"></script>

@endsection
