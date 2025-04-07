@extends('layouts.master', ['title' => 'Recruitment List'])

@section('contents')
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="text-white mt-2">Recruitment List</h2>
                    </div>
                    <div class="row px-3 ">

                        <div class="col-md-12 d-flex justify-content-end">
                            <form class="form" method="POST" action="{{route('recruitment.export_csv')}}">
                                @csrf
                                <div class="d-none">
                                    <input type="hidden" name="filter" value="{{$search}}">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary mt-2">CSV</button>
                            </form>

                            {{-- Not Necessary to add - commented by vikas --}}
                            {{-- @if(auth()->user()->hasPermission('addnew-candidate')) --}}
                                {{-- <a href="{{route('addnew-candidate')}}" class="btn btn-sm btn-primary mt-2 mx-2">Back</a> --}}
                            {{-- @endif --}}
                        </div>

                        {{-- Show Messages --}}

                        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>

                    
                    </div>
                    <div class="col-md-12 d-flex justify-content-start mx-3">
                        <form class="row g-3">
                            <div class="col-auto">
                                <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3"> Search <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('recruitment-list')}}" class="btn btn-primary mb-3">Reset</a>
                            </div>
                        </form>
                    </div>
                        @if (session()->has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    {{ session()->get('message') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                    <div class="table-responsive">
                        <div class="">
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Recruitment Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Contact Details</th>
                                        <th class=" text-center">Job Position</th>
                                        <th class=" text-center">Client Name</th>
                                        <th class=" text-center">DOB</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Experience</th>
                                        <th class="text-center">Skills</th>
                                        <th class="text-center">Education</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Employee Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    {{-- <tr>
                                        <th><input type="text" placeholder="Recruitment Id" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="Name" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="Contact Details" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="Job Position" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="Client Name" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="DOB" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="Location" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="Experience" class="rec-list_head"></th>
                                        <th><input type="text" placeholder="Skills" class="rec-list_head"></th>
                                        <th>Education</th>
                                        <th>Status</th>
                                        <th>Employee Status</th>
                                        <th>Action</th>
                                    </tr> --}}
                                </thead>
                                <tbody>
                                    @forelse ($candidates as $candidate)
                                    @php
                                    $color = '';
                                    $status = '';
                                        if (!empty($candidate->finally)) {
                                            if ($candidate->finally == 'rejected') {
                                                $color = 'danger';
                                                $status = 'Rejected';
                                            }
                                            else {
                                                $color ='success';
                                                $status = 'Applied';
                                            }
                                        }
                                        elseif (!empty($candidate->status)) {
                                            $color = 'primary';
                                            $status = 'Applied';
                                        }

                                      
                                    @endphp
                                    <tr>
                                        <td class="srno-column text-center">{{$candidate->id}}</td>
                                        <td class="rid-column text-center">{{$candidate->firstname." ".$candidate->lastname}}</td>
                                        <td class="text-center">{{$candidate->email." / ".$candidate->phone}}</td>
                                        <td class="attributes-column text-center">{{$candidate->job_position}}</td>
                                        <td class="text-center">{{$candidate->id}}</td>
                                        <td class="text-center">{{$candidate->dob}}</td>
                                        <td class="attributes-column text-center">{{$candidate->location}}</td>
                                        <td class="text-center">{{$candidate->experience}}</td>
                                        <td class="text-center attributes-column">{{$candidate->skill}}</td>
                                        <td class="text-center">{{$candidate->education}}</td>
                                        <td class="text-center"><span class="badge text-bg-{{$color}}">{{$status}}</span></td>
                                        <td class="text-center"> 
                                            @if (!empty($candidate->emp_current_working_status))
                                                @if ($candidate->emp_current_working_status == 'active')
                                                    @if(auth()->user()->hasPermission('employee-details'))
                                                        <a href="{{ route('employee-details', ['empid' => $candidate->empid]) }}" class="text-capitalize text-decoration-none text-success">{{$candidate->emp_code." (".$candidate->emp_current_working_status.") "}}  
                                                        </a>
                                                    @endif
                                                @else
                                                    @if(auth()->user()->hasPermission('employee-details'))
                                                        <a href="{{ route('employee-details', ['empid' => $candidate->empid]) }}" class="text-capitalize text-decoration-none text-danger">{{$candidate->emp_code."  (".$candidate->emp_current_working_status." ".$candidate->emp_dor." )"}}</a>
                                                    @endif
                                                @endif
                                            @else
                                                <span class="text-danger">Not Deployed</span>
                                            @endif
                                        
                                        
                                        </td>
                                        <td class="text-center">
                                            @if(auth()->user()->hasPermission('applicant-recruitment-details-summary'))
                                                <a href="{{ route('applicant-recruitment-details-summary', ['rec_id' => $candidate->id]) }}">
                                                <button class="btn btn-sm btn-primary">View <i
                                                                    class="fa-solid fa-eye"></i></button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td class="text-danger text-center" colspan="13">No Record Found</td>
                                        </tr>
                                    @endforelse
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-md-12 d-flex justify-content-start my-2">
                        {{$candidates->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
