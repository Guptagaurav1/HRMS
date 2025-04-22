@extends('layouts.master', ['title' => 'Recruitment Report'])
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Recruitment Report</h2>
                    <div>
                            <ul class="breadcrumb">
                                <li> @if (auth()->user()->role->role_name="hr")
                                    <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                    @endif
                                </li>
                                <li>Recruitment Report</li>
                            </ul>
                        </div>

                </div>
                <div class="row px-3 mb-3">
                    {{-- Need to remove candidate section --commented by vikas --}}
                    {{-- @if(auth()->user()->hasPermission('addnew-candidate'))
                        <div class="col-md-12 d-flex justify-content-end mt-4">
                            <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary">Add New Candidate <i class="fa-solid fa-plus"></i></button></a>
                        </div>
                    @endif --}}

                       <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                        </svg>

                        @if(session()->has('success'))
                        <div class="col-md-12 mt-4">
                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                  {{session()->get('message')}}
                                </div>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        @if(session()->has('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                  {{session()->get('message')}}
                                </div>
                    
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-12 d-flex align-items-cenetr justify-content-between px-3 mt-5">
                    <div class="mt-3">
                        <form class="row g-3" method="get">
                            <div class="col-auto  col-xs-12 mb-3">
                                <input type="text" name="search" value="" class="form-control" placeholder="Search"
                                    required>
                            </div>
                            <div class="col-auto col-xs-12">
                                <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i
                                        class="fa-solid fa-magnifying-glass" class="col-xs-12"></i></button>
                                <a href="{{ route('organizations.index') }}"  class="col-xs-12"><button type="button"
                                        class="btn btn-primary btn-sm mb-3">Clear <i
                                            class="fa-solid fa-eraser"></i></button></a>
                            </div>

                        </form>
                    </div>

                    {{-- @if(auth()->user()->hasPermission('addnew-candidate'))
                        <div>
                            <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary">Add New Candidate <i class="fa-solid fa-plus"></i></button></a>
                        </div>
                    @endif --}}
                </div>

                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">S.No.</th>
                                <th class="text-center">Position Title</th>
                                <th class="text-center">Client Name</th>
                                @if(auth()->user()->hasPermission('show-assign-work-log'))
                                    <th class="text-center">Total Contacted Person</th>
                                @endif
                                <th class="text-center">Date of Request</th>
                                <th class="text-center">Date of Fulfillment</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Work Assigned</th>
                                <th class="text-center">Completed/Required</th>
                                @if(auth()->user()->hasPermission('preview-executive-description'))
                                <th class="text-center">Action</th>
                                @endif
                                <th class="text-center">Current Status</th>
                                @if(auth()->user()->hasPermission('update_position_request'))
                                    <th class="text-center">Edit Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($positions as $position)
                            @php
                                    $color = 'primary';
                                    $status = 'Pending';
                                if($position->no_of_completed_requirements >= $position->no_of_requirements){
                                    $color = 'success';
                                    $status = 'Completed';
                                }
                            @endphp
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$position->position_title}}</td>
                                <td class="text-center">{{$position->client_name}}</td>
                                @if(auth()->user()->hasPermission('show-assign-work-log'))
                                <td class="attributes-column">
                                    <a href="{{route('show-assign-work-log', ['id' => $position->id])}}" class="text-primary">{{get_position_contacts($position->id)}} <span>Contacts</span></a>
                                </td>
                                @endif
                                <td class="text-center">{{date('jS F, Y', strtotime($position->created_at))}}</td>
                                <td class="text-center">{{$position->date_notified ? date('jS F, Y', strtotime($position->date_notified)) : ''}}</td>
                                <td class="text-center">{{$position->getCity &&  $position->getState ? $position->getCity->city_name." - ".$position->getState->state : '-'}}</td>
                                <td class="text-center">{{get_username($position->assigned_executive)}}</td>
                                <td class="text-center">{{$position->no_of_completed_requirements." / ".$position->no_of_requirements}}</td>
                                @if(auth()->user()->hasPermission('preview-executive-description'))
                                <td class="text-center">
                                    <a href="{{route('preview-executive-description', ['id' => $position->id])}}">
                                        <button class="btn btn-sm btn-primary" >Share Job Description <i class="fa-solid fa-paper-plane"></i></button>
                                    </a>
                                </td>
                                @endif
                                <td class="text-center"><span class="badge text-bg-{{$color}}">{{$status}}</span></td>
                                @if(auth()->user()->hasPermission('update_position_request'))
                                    <td><a class="btn  btn-sm btn-primary text-light text-decoration-none" href="{{route('update_position_request', ['id' => $position->id])}}">Edit <i class="fa-solid fa-pen-to-square"></i></a></td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center text-danger" colspan="11">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="col-md-12 d-flex justify-content-start my-3">
                    {{$positions->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection


