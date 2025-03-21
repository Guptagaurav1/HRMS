
@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <form action="{{ route('organizations.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h4 class="mt-2">Create Organization</h4>
                        
                        <div class="text-start">
                    <a href="{{ route('organizations.index') }}">
                        <div class="back-button-box">
                            <button type="button" class="btn btn-back">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </div>
                    </a>
                </div>
                    </div>
                
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="company_id" class="form-label">Organization Name <span class="text-danger"> ** </span></label>
                                    <input type="text" name="name" class="form-control form-control-sm" name="{{ old('name') }}" placeholder="Enter Organization Name">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="address" class="form-label">Address<span class="text-danger"> ** </span></label>
                                    <input type="text" name="address" class="form-control form-control-sm" name="{{ old('address') }}" placeholder="Enter Address">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-xxl-6 col-lg-6 col-sm-6 mt-3">
                                    <label for="contact" class="form-label">Contact Number<span class="text-danger"> ** </span></label>
                                    <input type="text" name="contact" class="form-control form-control-sm" name="{{ old('contact') }}" placeholder="Enter Contact No">
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-xxl-6 col-lg-6 col-sm-6 mt-3">
                                    <label for="email" class="form-label">Email <span class="text-danger"> ** </span></label>
                                    <input type="text" name="email" class="form-control form-control-sm" name="{{ old('email') }}" placeholder="Enter Email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                    
                </div>
            </div>
            
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
   

@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection

    









  
    
    


