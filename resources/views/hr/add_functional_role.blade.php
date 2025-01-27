@extends('layouts.master', ['title' => 'Add Functional Role'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')


	<div class="fluid-container">
		<div class="row">
			<div class="col-12">
				<div class="panel">
					<div class="panel-header  heading-stripe">
						<h3 class="mt-2 text-center" >Add Functionl Role</h3>
					</div>
					<div class="col-md-12 d-flex justify-content-end px-3 my-3">
                        <a href="{{route('functional-role')}}"><button class="btn btn-sm btn-primary">Back</button></a>  
                        </div> 
					<div class="col-md-12 d-flex justify-content-center mx-3 ">
						 <form class="row g-3" method="post" action="{{route('store-functional-role')}}">
                        	@csrf
  							<div class="col-auto">
  							  <input type="text" class="form-control" name="role" value="{{old('role')}}" placeholder="Enter Functional Role" required>
  							  @error('role')
  							  	<span class="text-danger">{{$message}}</span>
  							  @enderror
  							</div>
  							<div class="col-auto">
  							  <button type="submit" class="btn btn-primary mb-3">Submit</button>
  							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
