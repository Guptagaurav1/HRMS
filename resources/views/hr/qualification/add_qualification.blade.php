@extends('layouts.master', ['title' => 'Add Qualification'])


@section('contents')

<div class="fluid-container">
	<div class="row">
		<div class="col-12">
			<div class="panel">
				<div class="panel-header">
					<h3 class="text-center">Add Qualification</h3>
					<div>
						<ul class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li><a href="#">Profile</a></li>
							<li><a href="#">Profile Details</a></li>
							<li>Department List</li>
						</ul>
					</div>
				</div>
				
				<!-- <div class="col-md-12 d-flex justify-content-center mx-3 ">
					
						<div class="col-auto">
							<input type="text" class="form-control" name="qualification"
								value="{{old('qualification')}}" placeholder="Enter Qualification" required>
							@error('qualification')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-primary mb-3">Submit</button>
							<a href="{{route('qualification')}}" class="btn btn-primary mb-3 text-end mx-2">Cancel</a>
						</div>
					</form>
				</div> -->



				<div class="row px-2 mt-2">
					<form class="row g-3" method="post" action="{{route('store-qualification')}}">
						@csrf
						<div class="col-md-6">
							<label class="form-label">Qualification<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="qualification"
								value="{{old('qualification')}}" placeholder="Enter Qualification" required>
							@error('qualification')
							<span class="text-danger">{{$message}}</span>
							@enderror
						</div>
						<div class="col-md-12 d-flex align-items-center justify-content-end gap-3">
							<div class="">
								<a href="{{route('qualification')}}"><button type="button"
										class="btn btn-sm btn-secondary">Cancel
									</button></a>
							</div>
							<div class="">
								<button type="submit" class="btn btn-sm btn-primary">Submit</button>

							</div>



						</div>
					</form>
				</div>









			</div>
		</div>
	</div>
</div>


@endsection