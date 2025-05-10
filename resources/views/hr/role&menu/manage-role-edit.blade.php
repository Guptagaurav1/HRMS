@extends('layouts.master')
@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Update Role</h3>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                            <li><a href="{{route('manage-roles')}}">Manage Roles</a></li>
                            <li>Add Role</li>
                        </ul>
                    </div>
                </div>
               
                <div class="col-sm-12 col-md-4 mx-3 mt-3">
                    <label class="form-label">Role Name</label>
                    <input type="text" class="form-control" readonly value="{{$role->role_name}}">
                </div>
                
                <form action="{{ route('update-manage-role', $role->id) }}" method="post">
                    @csrf
                    <div class="col-12 panel_1 mt-5">
                        <label class="form-label">Select Roles *</label>
                        <div class="row mt-3">
                            @foreach ($menus as $section => $menu)
                                <div class="col-12">
                                    <div class="section-header">
                                        <label class="form-check-label">{{ $section }}  
                                            &nbsp;<input class="form-check-input checkall"  name="checkall" value="" type="checkbox" data-section="{{ Str::slug($section) }}">
                                            
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row checkbox-group" data-section="{{ Str::slug($section) }}">
                                        @foreach ($menu as $sub_menu)
                                            <div class="col-md-4 mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input checkallCheckbox" name="checkMenu[]" value="{{ $sub_menu->id }}" {{ in_array($sub_menu->id, $roles_assigned_arr) ? 'checked' : '' }} type="checkbox" id="gridCheck{{ $sub_menu->id }}" >
                                                    <label class="form-check-label" for="gridCheck{{ $sub_menu->id }}">
                                                        {{$sub_menu->name}}   
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end py-4 px-3">
                        <button class="btn btn-sm btn-primary">
                            Update Role <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form> 
              

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src={{asset('assets/js/hr/manage-role.js')}}></script>
@endsection
