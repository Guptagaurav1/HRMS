
@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>Create User</h2>
        <div class="btn-box">
            <a href="{{route('users')}}" class="btn btn-sm btn-primary">User List</a>
        </div>
    </div>
    
    <form action="{{ route('store-user') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h4 class="mt-1">User Details</h4>
                    </div>
                
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="company_id" class="form-label">Select Comapny Name <span class="text-danger"> ** </span></label>
                                    <select id="company_id" name="company_id" class="form-select">
                                        <option value=""> Select Any One</option>
                                        @foreach($companys as $company)
                                        <option value="{{ $company->id }}" 
                                            @if ($company->id == old('company')) selected @endif>
                                            {{ $company->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="role_id" class="form-label">Select User Type <span class="text-danger"> ** </span></label>
                                    <select id="role_id" name="role_id" class="form-select">
                                        <option value=""> Select user type</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" 
                                                @if ($role->id == old('role')) selected @endif>
                                                {{ $role->role_name }}
                                            </option>
                                            @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger"> ** </span></label>
                                    <input type="text" name="first_name" class="form-control form-control-sm" name="{{ old('first_name') }}">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger"> ** </span> </label>
                                    <input type="text" name="last_name" class="form-control form-control-sm" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="department" class="form-label">Department <span class="text-danger"> ** </span></label>
                                    <select id="department" name="department" class="form-select">
                                        <option value="">-- Select Department --</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}" 
                                            @if ($department->id == old('department')) selected @endif>
                                            {{ $department->department }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="gender" class="form-label">Gender </label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="contact" class="form-label">Contact<span class="text-danger"> ** </span> </label>
                                    <input type="number" id="contact" name="contact" class="form-control" value="{{ old('contact') }}" >
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth <span class="text-danger"> ** </span></label>
                                    <input type="date" id="dob" name="dob" class="form-control"  value="{{ old('dob') }}">
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="email" class="form-label">Email <span class="text-danger"> ** </span> </label>
                                    <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email') }}">
                                    @error('email')
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

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection

    









  
    
    


