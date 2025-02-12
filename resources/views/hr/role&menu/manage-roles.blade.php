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
                    <div class="btn-box">
                        <a href="{{route('add-manage-role')}}" class="btn btn-sm btn-primary">Add Roles</a>
                    </div>
                </div>
                <div class="row px-3 mt-2">
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
               
                <div class="row >
                    <div class="col-md-3">
                        {{-- <label class="form-label">Skills <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm"> --}}
                    </div>
                    <div class="col-md-3">
                        {{-- <label class="form-label">Reporting Email</label>
                        <select id="inputState" class="form-select">
                            <option selected>Not Specify</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                        </select>
                        </label> --}}
                    </div>
                    <div class="col-md-6">
                        {{-- <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Skills</button></a> --}}
                    </div>
                </div>
                
                <div class="panel-body">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Sr No.</th>
                                <!-- <th class="rid-column">RID</th> -->
                                <th>Role Name</th>
                                <th class="attributes-column">Attributes</th>
                                <th>Time Added On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rolesWithMenus as $key => $role)
                            <tr>
                                <td class="srno-column"> {{ $key +1 }} </td>
                                <!-- <td class="rid-column"> {{ $role->rid}}</td> -->
                                <td>{{ $role->role_name}}</td>
                                <!-- <td class="attributes-column">{{ $role->menu_id}}</td> -->
                                <td class="attributes-column">
                                  
                                  
                                        <span>{{ $role->menu_names }}</span><br>
                                   
                                </td>
                              
                                <td>{{ $role->created_at}}</td>
                                <td> 
                                    <a href="{{route('edit-manage-role',$role->id)}}" title="Edit"><button class="btn btn-sm btn-primary"> <i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a class="delete-role" data-id="{{ $role->id }}" ><button title="Delete" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                            @endforeach
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
