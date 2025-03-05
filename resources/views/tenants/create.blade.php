@extends('layouts.master')
@section('contents')
<div class="dashboard-breadcrumb mb-25">
    <h2>Create Tenants</h2>
    <div class="btn-box">
        <a href="{{route('tenants.index')}}" class="btn btn-sm btn-primary">Tenants List</a>
    </div>
</div>
<form action="{{ route('tenants.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h4 class="mt-1">Tenants Details</h4>
                </div>
            
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-xxl-6 col-lg-6 col-sm-6">
                                <label for="first_name" class="form-label">First Name <span class="text-danger"> ** </span></label>
                                <input type="text" name="first_name" class="form-control form-control-sm" name="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-6">
                                <label for="last_name" class="form-label">Last Name <span class="text-danger"> ** </span> </label>
                                <input type="text" name="last_name" class="form-control form-control-sm" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xxl-6 col-lg-6 col-sm-6 mt-4">
                                <label for="mobile" class="form-label">Mobile <span class="text-danger"> ** </span> </label>
                                <input type="text" name="mobile" class="form-control form-control-sm" value="{{ old('mobile') }}">
                                @error('mobile')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          
                            <div class="col-xxl-6 col-lg-6 col-sm-6 mt-4">
                                <label for="gender" class="form-label">Gender </label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                          
                            <div class="col-xxl-6 col-lg-6 col-sm-6  mt-4">  
                                <label for="dob" class="form-label">Date of Birth <span class="text-danger"> ** </span></label>
                                <input type="date" id="dob" name="dob" class="form-control"  value="{{ old('dob') }}">
                                @error('dob')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-xxl-6 col-lg-6 col-sm-6 mt-4">
                                <label for="email" class="form-label">Email <span class="text-danger"> ** </span> </label>
                                <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xxl-6 col-lg-6 col-sm-6 mt-4">
                                <label for="company_name" class="form-label">Company Name <span class="text-danger"> ** </span> </label>
                                <input type="text" name="company_name" class="form-control form-control-sm" value="{{ old('company_name') }}">
                                @error('company_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          

                            <div class="col-xxl-6 col-lg-6 col-sm-6 mt-4">
                                <label for="company_name" class="form-label">Company Address<span class="text-danger"> ** </span> </label>
                                <input type="text" name="company_address" class="form-control form-control-sm" value="{{ old('company_address') }}">
                                @error('company_address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-xxl-6 col-lg-6 col-sm-6 mt-4">
                                <label for="domain_name" class="form-label">Domain Name<span class="text-danger"> ** </span> </label>
                                <input type="text" name="domain_name" class="form-control form-control-sm" value="{{ old('domain_name') }}">
                                @error('domain_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <p style="color: red">Password : Password is User date of Birth in DDMMYYYY format</p>
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
@endsection