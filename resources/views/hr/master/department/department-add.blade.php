@extends('layouts.master',['title' => 'Add Department'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel mb-4">
            <div class="panel-header">
                <h2 class="text-white">Create Department</h2>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Profile Details</a></li>
                        <li>Department List</li>
                    </ul>
                </div>
            </div>
            <div class="row px-3 mt-2">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    --}}
                </div>
                @else
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    --}}
                </div>
                @endif

                <form method="post" action="{{ route('departments.save') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Department<span class="text-danger">*</span></label>
                            <input type="text" name="department" placeholder="Enter department name"
                                class="form-control" value="{{old('department')}}" pattern="[A-Za-z\s]+"
                                title="Enter Character Only" required>
                            @error('department')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Skills</label>
                            <select id="inputState" name="skill[]" class="form-control js-example-basic-multiple"
                                name="states[]" multiple="multiple" required>
                                <option value="">Select Skill</option>
                                @foreach ($skills as $skill)
                                <option value="{{$skill->id}}" {{old('skill') && in_array($skill->id, old('skill')) ?
                                    'selected'
                                    : ''}}>{{ ucwords($skill->skill) }}</option>
                                @endforeach
                            </select>

                            @error('skill')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Reporting Manager<span class="text-danger">*</span></label>
                            <select name="reporting_manager_id" class="form-select" required>
                                <option value="">Select Reporting Manager</option>
                                @foreach ($reporting_managers as $manager)
                                <option value="{{$manager->id}}" {{old('reporting_manager_id')==$manager->id ?
                                    'selected' :
                                    ''}}>{{$manager->name}}</option>
                                @endforeach
                            </select>
                            @error('reporting_manager_id')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mb-4 d-flex justify-content-end gap-3">
                        <div>
                            <a href="{{ route('departments.index') }}"><button type="button"
                                    class="btn btn-sm btn-secondary">Cancel </button></a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-primary">Submit </button>
                        </div>
                    </div>



                </form>
            </div>
        </div>

    </div>
</div>
</div>

@endsection