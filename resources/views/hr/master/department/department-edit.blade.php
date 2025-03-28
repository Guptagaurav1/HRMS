@extends('layouts.master',['title' => 'Update Department'])
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel mb-4">
            <div class="panel-header">
                <h2 class="text-white mt-2">Update Department</h2>
            </div>
            <div class="row px-3 mt-2">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @else
                    <div class="alert alert-error alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                

                <div class="col-md-6">
                    <form method="post" action="{{route('departments.update', $department->id)}}">
                        @csrf
                    <label class="form-label">Department<span class="text-danger">*</span></label>
                    <input type="text" name="department"  value="{{ $department->department }}" placeholder="Enter department name" class="form-control" pattern="[A-Za-z\s]+" title="Enter Character Only" required>
                    @error('department')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Skills</label>
                    <select id="inputState" name="skill[]" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                        <option value="">Select Skill</option>
                        @foreach ($total_skill as $key => $skill)
                            <option value="{{ $skill->id }}" @if (in_array($skill->id, $skills)) selected @else @endif>
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
                        <option value="{{$manager->id}}" {{$department->reporting_manager_id == $manager->id ? 'selected' : ''}}>{{$manager->name}}</option>
                        @endforeach
                    </select>
                    @error('reporting_manager_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-4 text-end">
                    <button type="submit" class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
                </form>
                </div>
            </div>
           
        </div>
    </div>
</div>


@endsection
@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection
