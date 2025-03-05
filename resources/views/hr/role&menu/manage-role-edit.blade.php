@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Update Role</h3>
                </div>
               
                <div class="col-sm-12 col-md-4 mx-3 mt-3">
                    <label class="form-label">Role Name </label>
                    <input type="text" class="form-control" value="{{$role->role_name}}" disabled>
                </div>
                
                <form action=" {{route('update-manage-role',$role->id)}}" method="post">
                @csrf
                    <div class="col-12 panel_1">
                        <label class="form-label">Select Roles *</label>
                        <div class="table-responsive mt-3 ">
                                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                    id="allEmployeeTable">
                                    @foreach ($menus as $section => $menu )
                                        <tr>
                                            <td>
                                            <label class="form-check-label" for="gridCheck">
                                            {{ $section }} </label>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            @foreach ($menu as $sub_menu)
                                                <td class="srno-column">
                                                  
                                                    <input class="form-check-input" name="checkMenu[]" value="{{ $sub_menu->id}}" {{ in_array($sub_menu->id, $roles_assigned_arr) ? 'checked' : '' }} type="checkbox" id="gridCheck" >
                                                    
                                                    <label class="form-check-label" for="gridCheck">
                                                    {{$sub_menu->name}}
                                                    </label>
                                                </td>
                                            @endforeach
                                        
                                        </tr>
                                    @endforeach
                                </table>
                        
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
</div>
@endsection