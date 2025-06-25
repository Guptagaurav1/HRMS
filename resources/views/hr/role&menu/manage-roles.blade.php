@extends('layouts.master')
@section('contents')
<div class="row">

    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2 ">Manage Roles</h3>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Manage Role</li>
                    </ul>
                </div>
            </div>
          
            <div class="row">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
            </div>
            
            <div class="col-md-12 d-flex justify-content-between flex-wrap px-4 mt-5">
                <form class="row g-3" method="get">
                    <div class="col-auto col-xs-12 mb-3">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search"
                            required>
                    </div>
                    <div class="col-auto col-xs-12">
                        <button type="submit" class="btn btn-primary mb-3">Search <i
                                class="fa-solid fa-magnifying-glass"></i></button>

                    </div>
                    <div class="col-auto col-xs-12">
                        <a href="{{ route('manage-roles') }}" class="col-xs-12"><button type="button"
                                class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                    </div>
                </form>
                <div class="col-auto col-xs-12">
                    <a href="{{route('add-manage-role')}}" class="col-xs-12"><button type="button"
                            class="btn btn-primary mb-3">Add Roles <i class="fa-solid fa-plus"></i></button></a>

                </div>
            </div>
            
                     <!-- Success Message -->
                @if($message = Session::get('success'))
                <div class="col-md-12 mt-3">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>{{ $message }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                <!-- Error Message -->
                @if($message = Session::get('error'))
                <div class="col-md-12 mt-3">
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>{{ $message }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

            <div class="panel-body">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="srno-column text-center">Sr No.</th>
                            <!-- <th class="rid-column">RID</th> -->
                            <th class="text-center">Role Name</th>
                            <th class="text-center">Time Added On</th>
                            <th class="text-center">Time Updated On</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rolesWithMenus as $key => $role)
                        <tr>
                            <td class="srno-column text-center"> {{ $key +1 }} </td>
                            <td class="text-center">{{ $role->fullname}}</td>
                            <td class="text-center">{{ date('jS F, Y', strtotime($role->created_at))}}</td>
                            <td class="text-center">{{ date('jS F, Y', strtotime($role->updated_at))}}</td>
                            <td class="text-center">
                                {{-- @if(auth()->user()->hasPermission('edit-manage-role')) --}}
                                <a href="{{route('edit-manage-role',$role->id)}}" title="Edit"><button
                                        class="btn btn-sm btn-primary">Edit <i
                                            class="fa-solid fa-pen-to-square"></i></button></a>
                                {{-- @endif --}}
                                {{-- @if(auth()->user()->hasPermission('delete-manage-role')) --}}
                                <a class="delete-role" data-id="{{ $role->id }}"><button title="Delete"
                                        class="btn btn-sm btn-danger">Delete <i
                                            class="fa-solid fa-trash"></i></button></a>
                                {{-- @endif --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center"><span class="text-danger">No Record Found</span></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 my-2">
                {{ $rolesWithMenus->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/users/role.js')}}"></script>
@endsection