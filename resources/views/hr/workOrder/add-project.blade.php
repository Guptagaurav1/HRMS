@extends('layouts.master')

@section('contents')
<div class="panel">
    <div class="panel-header heading-stripe">
        <h3 class="mt-2 text-center">Add Project</h3>
        <div class="text-start">
            <a href="{{route('hr_dashboard') }}">
                <div class="back-button-box">
                    <button type="button" class="btn btn-back">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                </div>
            </a>
        </div>
    </div>
    <div class="row" id="tab-1">
        <div class="col-12 d-flex justify-content-end">
            @if(auth()->user()->hasPermission('project-list'))
            <a href="{{route('project-list')}}"><button class="btn btn-sm btn-primary mx-3 mt-3"> Project List <i
                        class="fa-solid fa-list"></i></button></a>
            @endif
        </div>
    </div>

    <div class="row" id="tab-1">

        <form action="{{ route('store-project') }}" method="post">
            @csrf
            <div class="col-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <label class="form-label">Organisation <span class="text-danger">*</span></label>
                                    <select name="organisation_id" id="organisation_id" class="form-select" required>
                                        <option value="">--Select Organisation--</option>
                                        @foreach($organization as $key => $organization_data)
                                        <option value="{{$organization_data->id}}" @if ($organization_data->id ==
                                            old('organisation_id')) selected @endif>
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
                                        class="form-control bg-white" placeholder="Enter Project Number"
                                        value="{{ old('project_number') }}" required>
                                    @error('project_number')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>




                                <div class="col-sm-12 col-md-4 text-wrap">
                                    <label class="form-label text-wrap"> Project Name <span
                                            class="text-danger">*</span></label></label>
                                    <input name="project_name" id="project_name" type="text"
                                        class="form-control form-control-sm" placeholder="Project Name"
                                        value="{{ old('project_name') }}" required>
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
                                        value="{{ old('empanelment_reference') }}" required>
                                    @error('empanelment_reference')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</div>
<div class="col-12 d-flex justify-content-end  px-3 mb-3 gap-3">
    <div>
       <a href="{{route('projectlist')}}"> <button type="button" class="btn btn-sm btn-secondary"> Cancel </button></a>
    </div>
    <div>
        <button type="submit" class="btn btn-sm btn-primary"> Submit </button>
    </div>


</div>
<form>
@endsection

   