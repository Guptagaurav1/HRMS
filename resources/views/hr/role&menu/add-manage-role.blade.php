    @extends('layouts.master')
@section('contents')
<div class="fluid-container">
    <form method="post" action="{{ route('store-manage-role') }}">
        @csrf
        <div class="row" >
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h3 class="mt-2">Add Role</h3>
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                                <li><a href="{{route('manage-roles')}}">Manage Roles</a></li>
                                <li>Add Role</li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Role Short Name <span class="text-danger">*</span></label>
                                <input type="text" name="role_name" class="form-control form-control-sm"
                                    placeholder="Enter a unique short name" required>
                                @error('role_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                             <div class="col-md-6">
                                <label class="form-label">Role Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" class="form-control form-control-sm"
                                    placeholder="Enter a full name" required>
                                @error('fullname')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 panel_1 ">
                        <label class="form-label">Select Menus *</label>
                        <div class="col-12">
                            <div class="row h-auto">
                                @foreach ($menus as $section => $menu )
                                <div class="col-12">
                                    <div class="section-header">
                                        <label class="form-check-label">{{ $section }}</label>
                                        &nbsp;<input class="form-check-input checkall"  name="checkall" value="" type="checkbox" data-section="{{ Str::slug($section) }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row checkbox-group" data-section="{{ Str::slug($section) }}">
                                        @foreach ($menu as $sub_menu)
                                        <div class="col-md-4 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input checkallCheckbox" name="checkMenu[]"
                                                    value="{{ $sub_menu->id}}" type="checkbox" id="gridCheck"> <label
                                                    class="form-check-label" for="gridCheck{{ $sub_menu->id }}">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end gap-3">
            <div>
            <button class="btn btn-sm btn-secondary">Cancel </button>

            </div>
            <div>
            <button class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
            </div>
           
        </div>
    </form>
</div>
@endsection
@section('script')
<script src={{asset('assets/js/hr/manage-role.js')}}></script>
@endsection