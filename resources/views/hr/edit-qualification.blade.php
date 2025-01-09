@extends('layouts.master', ['title' => 'Update Qualification'])

@section('contents')
	<div class="row">
		<div class="col-12">
			<div class="panel vh-100">
                <div class="panel-header">
                    <h5>Update Qualification</h5>
                </div>

                <div class="panel-body">
                    <div class="row my-2">
                        <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{route('qualification')}}"><button class="btn btn-sm btn-primary">Back</button></a>  
                        </div> 

                        <div class="col-md-12 d-flex justify-content-center">
                        <form class="row g-3" method="post" action="{{route('update-qualification', ['id' => $data->id])}}">
                        	@csrf
  							<div class="col-auto">
  							  <input type="text" class="form-control" name="qualification" value="{{$data->qualification}}" placeholder="Enter Qualification" required>
  							  @error('qualification')
  							  	<span class="text-danger">{{$message}}</span>
  							  @enderror
  							</div>
  							<div class="col-auto">
  							  <button type="submit" class="btn btn-primary mb-3">Update</button>
  							</div>
						</form>
                        </div>
                    </div>
                </div>
            </div>
   
		</div>
	</div>

@endsection
