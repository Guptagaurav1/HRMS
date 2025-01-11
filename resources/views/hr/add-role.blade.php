@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Add Role</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Add Role</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Enter a Role">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end ">
            
        <button class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
    </div>
</div>

@endsection

