@extends('layouts.master',['title' => 'Update Department'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel mb-4">
            <div class="panel-header">
                <h2 class="text-white mt-2">Update Department</h2>
                <div>
                    <ul class="breadcrumb">
                        <li>
                            @if (auth()->user()->role->role_name == "hr")
                                <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "hr_operations")
                                <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "sales_manager")
                                <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                            @else
                            @endif
                        </li>
                        <li><a href="{{route('departments.index')}}">Department List</a></li>
                        <li>Update Department</li>
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

                <form method="post" action="{{route('departments.update', $department->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <label class="form-label">Department<span class="text-danger">*</span></label>
                            <input type="text" name="department" value="{{ $department->department }}"
                                placeholder="Enter department name" class="form-control" pattern="[A-Za-z\s]+"
                                title="Enter Character Only" required>
                            @error('department')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Skills</label>
                            <select id="inputState" name="skill[]" class="js-example-basic-multiple" name="states[]"
                                multiple="multiple">
                                <option value="">Select Skill</option>
                                @foreach ($total_skill as $key => $skill)
                                <option value="{{ $skill->id }}" @if (in_array($skill->id, $skills)) selected @else
                                    @endif>
                                    {{$skill->skill}}
                                </option>
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
                                <option value="{{$manager->id}}" {{$department->reporting_manager_id == $manager->id ?
                                    'selected' : ''}}>{{$manager->name}}</option>
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
                            <button type="submit" class="btn btn-sm btn-primary">Submit <i
                                    class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection