@extends('layouts.master', ['title' => 'Update Qualification'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
	<div class="fluid-container">
		<div class="row">
			<div class="col-12">
				<div class="panel">
					<div class="panel-header">
						<h3 class="text-center text-white">Update Qualification</h3>
					</div>
					<div class="col-md-12 d-flex justify-content-end">
                        <a href="{{route('qualification')}}"><button class="btn btn-sm btn-primary mt-2 mx-2">Back</button></a>  
                        </div> 
					<div class="col-md-12 d-flex justify-content-center mx-3 ">
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

@endsection
