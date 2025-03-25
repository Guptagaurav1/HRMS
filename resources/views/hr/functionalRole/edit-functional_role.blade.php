@extends('layouts.master', ['title' => 'Update Functional Roles'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
	<div class="row">
		<div class="col-12">
			<div class="panel">
                <div class="panel-header">
                    <h2 class="text-white mt-2">Update Functional Role</h2>
					<div class="text-end">
						<a href="{{ route('functional-role') }}">
							<div class="back-button-box">
								<button type="button" class="btn btn-back">
									<i class="fa-solid fa-arrow-left"></i>
								</button>
							</div>
						</a>
					</div>

                </div>

                <div class="panel-body">
                    <div class="row my-2">
                       
                        <div class="col-md-12 d-flex justify-content-center">
                        <form class="row g-3" method="post" action="{{route('update-functional-role', ['id' => $data->id])}}">
                        	@csrf
  							<div class="col-auto">
  							  <input type="text" class="form-control" name="role" value="{{$data->role}}" placeholder="Enter Functional Role" required>
  							  @error('role')
  							  	<span class="text-danger">{{$message}}</span>
  							  @enderror
  							</div>
  							<div class="col-auto">
  							  <button type="submit" class="btn btn-primary mb-3">Submit <i class="fa-solid fa-arrow-right"></i></button>
  							</div>
						</form>
                        </div>
                    </div>
                </div>
            </div>
   
		</div>
	</div>

@endsection
