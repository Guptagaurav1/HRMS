@extends('layouts.master', ['title' => 'Add Bank'])
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
	<div class="row">
		<div class="col-12">
			<div class="panel">
                <div class="panel-header">
                    <h3 class="text-white mt-2">Add Bank</h3>
                    <div class="text-start">
                    <a href="{{ route('bank-details') }}">
                        <div class="back-button-box">
                            <button type="button" class="btn btn-back">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </div>
                    </a>
                </div>
                </div>

                <div class="panel-body">
                    <div class="row">
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
  							
                            <div class="col-md-12 d-flex justify-content-end">
                                <a href="{{route('bank-details')}}" class="btn btn-primary mb-3 text-end mx-2">Cancel</a>
                                <button type="submit" class="btn btn-primary mb-3 text-end">Submit <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
						</form>
                        </div>
                    </div>
                </div>
            </div>
   
		</div>
	</div>

@endsection
