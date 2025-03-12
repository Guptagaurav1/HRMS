@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />

@endsection

@section('contents')

<div class="fluid-container">
    <div class="">
        <h2>Project Form</h2>
    </div>
    <div class="row" id="tab-1">
        <div class="col-12 d-flex justify-content-end">
            @if(auth()->user()->hasPermission('project-list'))
                <a href="{{route('project-list')}}"><button class="btn btn-sm btn-primary mx-3 mt-3"> Project List</button></a>  
            @endif
        </div>
        <form action="{{ route('store-project') }}" method="post" >
            @csrf
            <div class="col-12">
                <div class="panel">
                    
                    <div class="panel-header">
                        <h5>Work Order Details</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <label class="form-label">Organisation <span class="text-danger">*</span></label>
                                    <select name="organisation_id" id="organisation_id"  class="form-select">
                                        <option value="">--Select Organisation--</option>
                                        @foreach($organization as $key => $organization_data)
                                            <option value="{{$organization_data->id}}" @if ($organization_data->id == old('organisation_id')) selected @endif>
                                            {{ $organization_data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('organisation_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 text-wrap">
                                        <label class="form-label text-wrap"> Project Number <span class="text-danger">*</span></label> </label>
                                        <input name="project_number" id="project_number" type="text" class="form-control form-control-sm" placeholder="Enter Project Number" value="{{ old('project_number') }}">
                                        @error('project_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                           
                           
                            <div class="row">
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Project Name <span class="text-danger">*</span></label></label>
                                    <input name="project_name" id="project_name" type="text" class="form-control form-control-sm" placeholder="Project Name" value="{{ old('project_name') }}">
                                    @error('project_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                               
                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap">
                                        Empanelment Reference <span class="text-danger">*</span></label>
                                    </label>
                                    <input name="empanelment_reference" id="empanelment_reference" type="text" class="form-control form-control-sm"
                                        placeholder="Empanelment Reference" value="{{ old('empanelment_reference') }}">
                                        @error('empanelment_reference')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary"> Register Project <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        <form>
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/vendor/js/addmore.js')}}></script>

@endsection