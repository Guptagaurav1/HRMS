@extends('layouts.master', ['title' => 'Job Description'])


@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel  text-center" id="card">
                            <div class="panel-header">
                                <h4 class="mt-2 px-2">Preview Summary</h4>
                                <div>
                                    <ul class="breadcrumb">
                                        <li> @if (auth()->user()->role->role_name="hr")
                                            <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                            @endif
                                        </li>
                                        <li> <a href="{{route('recruitment-report')}}">Recruitment Report</a></li>
                                        <li><a href="{{route('show-assign-work-log',$position->id)}}">Position Report Log</a></li>
                                        <li>Preview Summary</li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                                    <tbody>
                                        <tr>
                                            <td class="bold">Position title</td>
                                            <td>{{$position->position_title}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Client Name</td>
                                            <td>{{$position->client_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Requirement</td>
                                            <td>{{$position->no_of_requirements}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Department</td>
                                            <td>{{!empty($position->getDepartment) ? $position->getDepartment->department : ''}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Functional Role</td>
                                            <td>{{get_functional_roles($position->functional_role)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">State</td>
                                            <td>{{$position->getState->state}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">City</td>
                                            <td>{{$position->getCity->city_name}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td class="bold">Last Date Of Fullfillment</td>
                                            <td>{{$position->date_notified}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Education</td>
                                            <td>{{get_education($position->education)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Skills</td>
                                            <td class="text-wrap">{{get_skills($position->skill_sets)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Experience</td>
                                            <td>{{format_experience($position->experience)}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Description</td>
                                            <td class="attributes-column">{{$position->job_description}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Attachment</td>
                                            <td>
                                                @if($position->attachment)
                                                <a href="{{asset('position-request/attachments/'.$position->attachment.'')}}" class="btn btn-primary text-light text-decoration-none" download>Download</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Remarks</td>
                                            <td>{{$position->remarks}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Assigned To</td>
                                            <td>{{get_username($position->assigned_executive)}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
