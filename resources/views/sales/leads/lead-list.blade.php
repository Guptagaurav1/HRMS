@extends('layouts.master')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-white mt-2">Lead List</h3>
                
            </div>
            <div class="panel-body">
                <div class="row ">
                    <div class="row  px-3">
                        <div class="row px-2">
                            <div class="col-md-10">
                                <form method="get">
                                    <div class="row">
                                        <div class="col-auto col-xs-12">
                                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search"
                                                required>
                                        </div>
                                        <div class="col-auto col-xs-12">
                                            <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i
                                                    class="fa-solid fa-magnifying-glass"></i></button>

                                        </div>
                                        <div class="col-auto col-xs-12">
                                            <a href="{{ route('leads.list') }}" class="col-xs-12"><button
                                                    type="button" class="btn btn-primary btn-sm mb-3">Clear <i
                                                        class="fa-solid fa-eraser"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto col-xs-12">
                            
                                <a href="{{ route('leads.create') }}" class="col-xs-12 mx-md-2"><button
                                        type="button" class="btn btn-sm btn-primary">Add Lead <i
                                            class="fa-solid fa-plus"></i></button></a>
                            </div>
                        </div>
                    </div>

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
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class='text-center'>Lead Id</th>
                                    <th class='text-center'>Title</th>
                                    <th class='text-center'>Project Name</th>
                                    <th class='text-center'>Deadline</th>
                                    <th class='text-center'>Category</th>
                                    <th class='text-center'>Source</th>
                                    <th class='text-center'>Assigned</th>
                                    <th class='text-center'>Status</th>
                                    <th class='text-center'>Created At</th>
                                    
                                    <th class='text-center'>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($leads as $key => $value)
                                    <tr>
                                        <td class='text-center'>{{ $value->id }}</td>
                                        <td class='text-center attributes-column'>{{ $value->lead_title }}</td>
                                        <td class='text-center attributes-column'>{{ $value->projectDetails ? $value->projectDetails->project_name : ''  }}</td>
                                        <td class='text-center attributes-column'>{{ $value->deadline }}</td>
                                        <td class='text-center attributes-column'>{{ $value->getCategory ? $value->getCategory->category_name : '' }}</td>
                                        <td class='text-center attributes-column'>{{ $value->getCategory ? $value->getSource->source_name : '' }}</td>
                                        <td class='text-center attributes-column'>{{ $value->leadAssignUser ? $value->leadAssignUser->user->first_name ." ".$value->leadAssignUser->user->last_name : '' }}</td>
                                        <td class='text-center attributes-column'>{{ $value->status }}</td>
                                        <td class='text-center attributes-column'>{{ $value->created_at->format('d-m-Y') }}</td>
                                        <td class='text-center attributes-column'>
                                        <a href="{{ route('leads.crmLeadFollowUp', ['id' => $value->id ]) }}">
                                            <span class="badge text-bg-primary">Follow Up</span>
                                        </a>

                                        {{-- @if(auth()->user()->role->role_name == 'sales_manager' && auth()->user()->role->role_name == 'IIDT-Coordinator') --}}
                                            <a href="{{ route('leads.edit', ['id' => $value->id ]) }}">
                                                <span class="badge text-bg-primary">Edit</span>
                                            </a>
                                        {{-- @endif --}}
                                        
                                        </td> 
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                        {{ $leads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('script')

    @endsection