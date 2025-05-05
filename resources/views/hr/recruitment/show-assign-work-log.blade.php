@extends('layouts.master', ['title' => 'Position Report Log'])

@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h4 class="mt-2 text-center">{{$position->position_title}} Position Report Log</h4>
                    <div>
                        <ul class="breadcrumb">
                            <li> 
                                @if (auth()->user()->role->role_name == "hr")
                                    <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                                @elseif(auth()->user()->role->role_name == "hr_operations")
                                    <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                                @elseif(auth()->user()->role->role_name == "sales_manager")
                                    <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                                @else
                                @endif
                            </li>
                            <li> <a href="{{route('recruitment-report')}}">Recruitment Report</a></li>
                            <li>Position Report Log</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="row my-2 mx-2">
                        <div class="col-md-6">
                        <form class="row g-3" method="get">
                            <div class="col-auto">
                                <input type="search" class="form-control" name="search" value="{{$search}}" placeholder="Search by name or email" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('show-assign-work-log', ['id' => $position->id])}}" class="btn btn-primary mb-3"> Clear</a>
                            </div>
                        </form>
                        </div>
                           
                    </div>                  
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
                    <svg class="bi flex-shrink-0 me-2" fill="#b02a37" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        {{session()->get('message')}}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
                   @endif

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column text-center">Candidate Name</th>
                                <th class="text-center">Candidate Email</th>
                                <th class="attributes-column">JD Details</th>
                                <th class="text-center">Recruiter Email</th>
                                <th class="text-center">Expected Joining Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">View Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            @php
                                $color = 'primary';
                                $status = '';
                                if($contact->finally){
                                    if($contact->finally == 'rejected'){
                                        $status = 'Rejected';
                                        $color = 'danger';
                                    }
                                    else {
                                        $status = format_contact_status($contact->finally);
                                    }
                                }
                                elseif($contact->status){
                                    $status = 'Applied';
                                }
                                else {
                                    $status = 'Not Applied';
                                }
                            @endphp
                            <tr>
                                <td class="srno-column">{{$loop->iteration}}</td>
                                <td class="rid-column text-center">{{$contact->receiver_name}}</td>
                                <td class="text-center">{{$contact->receiver_email}}</td>
                                <td class="attributes-column"><a href="{{route('preview-job-description', ['id' => $contact->job_position])}}" class="text-primary">Preview JD</a></td>
                                <td class="text-center">{{$contact->sender_email}}</td>
                                <td class="text-center">{{$contact->doj ? $contact->doj : 'Not Yet Decided'}}</td>
                                <td class="text-center"><span class="badge rounded-pill text-bg-{{$color}}">{{$status}}</span></td>
                                <td class="text-center">
                                    @if($contact->sender_email == auth()->user()->email && !empty($contact->rec_id))
                                    <a href="{{route('applicant-recruitment-details-summary', ['rec_id' => $contact->rec_id, 'position' => $id])}}"><button class="btn btn-sm btn-primary"> View <i class="fa-solid fa-eye"></i></button></a>
                                    @elseif(empty($contact->rec_id))
                                    <span class="btn btn-info">Not Generated</span>
                                    @else
                                    <span class="btn btn-info">Not Authorized</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="8">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 d-flex justify-content-center my-3">
                    {{$contacts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

