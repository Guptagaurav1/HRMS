@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="fluid-container">
    <form method="post" action="{{ route('store-manage-role') }}">
    @csrf
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h3 class="mt-2">Add Role</h3>
                        <div class="btn-box">
                        <a href="{{route('manage-roles')}}" class="btn btn-sm btn-primary">Manage(role) List</a>
                    </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Add Role</label>
                                <input type="text" name="role_name" class="form-control form-control-sm" placeholder="Enter a Role">
                                @error('role_name')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end ">
                
            <button class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </form>
</div>

@endsection

