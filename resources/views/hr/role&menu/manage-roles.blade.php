@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>

@endsection

@section('contents')
    <div class="row">
               
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2 ">Manage Roles</h3>
                </div>
                <div class="text-end px-2 mt-3">
                    <a href="{{route('add-manage-role')}}"><button type="button" class="btn btn-primary mb-3">Add Roles <i class="fa-solid fa-plus"></i></button></a>
                </div>
                <div class="col-md-12 d-flex justify-content-start px-2">
                    <form class="row g-3" method="get">
                        <div class="col-auto mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                            <a href="{{ route('manage-roles') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                        </div>
                    </form>
                </div>
                <div class="row px-3">
                    @if($message = Session::get('success'))
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                         <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                         {{ $message }}
                        </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
              
                    @endif
                    @if($message = Session::get('error'))
                    
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{$message}}
                        </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
               
                <div class="panel-body">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Sr No.</th>
                                <!-- <th class="rid-column">RID</th> -->
                                <th class="text-center">Role Name</th>
                                <th class="text-center">Attributes</th>
                                <th class="text-center">Time Added On</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rolesWithMenus as $key => $role)
                            <tr>
                                <td class="srno-column"> {{ $key +1 }} </td>
                                <td>{{ $role->role_name}}</td>
                                <td class="attributes-column">
                                    <span>{{ $role->menu_names }}</span><br>
                                </td>
                              
                                <td>{{ $role->created_at}}</td>
                                <td> 
                                    <a href="{{route('edit-manage-role',$role->id)}}" title="Edit"><button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a class="delete-role" data-id="{{ $role->id }}" ><button title="Delete" class="btn btn-sm btn-danger">Delete <i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @empty
                            <tr >
                                <td colspan="5" class="text-center"><span class="text-danger">No Record Found</span></td>
                            </tr> 
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script src="{{asset('assets/js/users/role.js')}}"></script>
@endsection
