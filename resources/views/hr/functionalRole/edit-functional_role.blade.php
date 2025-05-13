@extends('layouts.master', ['title' => 'Update Functional Roles'])
@section('contents')
	<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header heading-stripe">
                   <h2 class="text-white mt-2">Update Functional Role</h2>
                   <div>
                    <ul class="breadcrumb">
                                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li><a href="{{route('functional-role')}}">Functional Role List</a></li>
                        <li>Update Functional Role</li>
                    </ul>
                </div>
                </div>
                <div class="panel-body mt-4">
                    <form class="row g-3" method="post" action="{{route('update-functional-role', ['id' => $data->id])}}">
                        @csrf
                        <div class="col-md-6">
						<input type="text" class="form-control" name="role" value="{{$data->role}}" placeholder="Enter Functional Role" required>
  							  @error('role')
  							  	<span class="text-danger">{{$message}}</span>
  							  @enderror
                        </div>

                        <div class="col-12 d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('functional-role') }}">
                                <button type="button" class="btn btn-sm btn-secondary">Cancel</button>
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
