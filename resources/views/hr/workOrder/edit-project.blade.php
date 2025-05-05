@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')

<div class="panel">

    <div class="panel-header">
        <h2 class="">Update Project</h2>
        <div>
            <ul class="breadcrumb">
                <li> @if (auth()->user()->role->role_name == "hr")
                    <a href="{{route('hr_dashboard')}}">Dashboard</a>
                    @endif
                </li>
                <li><a href="{{route('project-list')}}">Project List</a></li>
                <li>Update Project</li>
            </ul>
        </div>
    </div>
    <div class="row">
        @if(auth()->user()->hasPermission('project-list'))
        <div class="col-12 d-flex justify-content-end">
            <a href="{{route('project-list')}}"><button class="btn btn-sm btn-primary mx-3 mt-3"> Project
                    List <i class="fa-solid fa-list"></i></button></a>
        </div>
        @endif
        <form action="{{ route('update-project',$project->id) }}" method="post">
            @csrf
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <label class="form-label">Organisation <span class="text-danger">*</span></label>
                                <select name="organisation_id" id="organisation_id" class="form-select">
                                    <option selected>--Select Organisation--</option>
                                    @foreach($organization as $key => $organization_data)
                                    <option value="{{$organization_data->id}}" @if ($organization_data->id ==
                                        old('organisation_id',$project->organisation_id)) selected @endif >
                                        {{ $organization_data->name }}</option>
                                    @endforeach
                                </select>
                                @error('organisation_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap"> Project Number <span
                                        class="text-danger">*</span></label> </label>
                                <input name="project_number" id="project_number" type="text"
                                    class="form-control form-control-sm" placeholder="Enter Project Number"
                                    value="{{ old('project_number',$project->project_number) }}">
                                @error('project_number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4 text-wrap">
                                <label class="form-label text-wrap"> Project Name <span
                                        class="text-danger">*</span></label></label>
                                <input name="project_name" id="project_name" type="text"
                                    class="form-control form-control-sm" placeholder="Project Name"
                                    value="{{ old('project_name',$project->project_name) }}">
                                @error('project_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-md-4 text-wrap mt-4">
                                <label class="form-label text-wrap">
                                    Empanelment Reference <span class="text-danger">*</span></label>
                                </label>
                                <input name="empanelment_reference" id="empanelment_reference" type="text"
                                    class="form-control form-control-sm" placeholder="Empanelment Reference"
                                    value="{{ old('empanelment_reference',$project->empanelment_reference) }}">
                                @error('empanelment_reference')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-12 d-flex justify-content-end  px-3 py-3 gap-3">
        <div class="button">
            <a href="{{route('project-list')}}">
               <button type="button" class="btn btn-sm btn-secondary">Cancel </button>
            </a>

        </div>
        <div class="">
            <button type="submit" class="btn btn-sm btn-primary"> Submit </button>
        </div>
       
    </div>

    <form>

</div>


@endsection

@section('script')


@endsection