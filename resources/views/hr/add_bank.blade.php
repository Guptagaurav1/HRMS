@extends('layouts.master', ['title' => 'Add Bank'])

@section('contents')
	<div class="row">
		<div class="col-12">
			<div class="panel vh-100">
                <div class="panel-header">
                    <h5>Add Bank</h5>
                </div>

                <div class="panel-body">
                    <div class="row my-2">
                        <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{route('bank-details')}}"><button class="btn btn-sm btn-primary">Back</button></a>  
                        </div> 

                        <div class="col-md-12">
                        <form class="row g-3" method="post" action="{{route('store-bank')}}">
                        	@csrf
  							<div class="col-md-6">
                              <label class="form-label">Bank Name<span class="text-danger">*</span></label>
  							  <input type="text" class="form-control" name="name_of_bank" value="{{old('name_of_bank')}}" placeholder="Enter Bank Name" required>
  							  @error('name_of_bank')
  							  	<span class="text-danger">{{$message}}</span>
  							  @enderror
  							</div>
                            <div class="col-md-6">
                                <label class="form-label">Bank Type<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="type_of_bank" value="{{old('type_of_bank')}}" placeholder="Enter type of bank" required>
                                @error('type_of_bank')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
  							<div class="col-md-12 d-flex justify-content-center">
  							  <button type="submit" class="btn btn-primary mb-3 text-end">Submit</button>
  							</div>
						</form>
                        </div>
                    </div>
                </div>
            </div>
   
		</div>
	</div>

@endsection
