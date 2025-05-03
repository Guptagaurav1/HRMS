
@extends('layouts.master')

@section('contents')
    
    <form action="{{ route('store-user') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h4 class="mt-1">Add User</h4>
                        <div>
                            <ul class="breadcrumb">
                                <li> 
                                    @if (auth()->user()->role->role_name == "hr")
                                        <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                                    @elseif(auth()->user()->role->role_name == "hr_operations")
                                        <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                                    @elseif(auth()->user()->role->role_name == "sales_manager")
                                        <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                                    @else
                                    @endif
                                </li>
                                <li><a href="{{route('users')}}">Users List</a></li>
                                <li>Add Users</li>
                            </ul>
                        </div>
                    </div>
                
                        <div class="panel-body mt-5">
                            <div class="row g-3">
                                <div class="col-lg-4 col-sm-6">
                                    <label for="company_id" class="form-label">Select Comapny Name <span class="text-danger"> ** </span></label>
                                    <select id="company_id" name="company_id" class="form-select" required>
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
                                <div class="col-lg-4 col-sm-6">
                                    <label for="role_id" class="form-label">Select User Type <span class="text-danger"> ** </span></label>
                                    <select id="role_id" name="role_id" class="form-select" required>
                                        <option value=""> Select user type</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" 
                                                @if ($role->id == old('role')) selected @endif>
                                                {{ $role->fullname }}
                                            </option>
                                            @endforeach
                                    </select>
                                    @error('role_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger"> ** </span></label>
                                    <input type="text" name="first_name" class="form-control form-control-sm for_char" placeholder="Enter first Name" name="{{ old('first_name') }}" required>
                                    <span class="first_name"></span>
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger"> ** </span> </label>
                                    <input type="text" name="last_name" class="form-control form-control-sm for_char" placeholder="Enter Last Name" value="{{ old('last_name') }}" required>
                                    <span class="last_name"></span>
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="department" class="form-label">Department <span class="text-danger"> ** </span></label>
                                    <select id="department" name="department" class="form-select" required>
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
                                <div class="col-lg-4 col-sm-6">
                                    <label for="gender" class="form-label">Gender </label>
                                    <select id="gender" name="gender" class="form-select" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="contact" class="form-label">Contact<span class="text-danger"> ** </span> </label>
                                    <input type="text" id="contact" name="contact" class="form-control for_char" value="{{ old('contact') }}" placeholder="Enter Contact Number" maxlength="10" required>
                                    <span class="contact"></span>
                                    
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth <span class="text-danger"> ** </span></label>
                                    <input type="date" id="dob" name="dob" class="form-control"  value="{{ old('dob') }}" required>
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="email" class="form-label">Email <span class="text-danger"> ** </span> </label>
                                    <input type="email" name="email" class="form-control form-control-sm for_char" placeholder="Enter Email" value="{{ old('email') }}" required>
                                    <span class="email"></span>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <p class="text-danger">Password : Password is User date of Birth in DDMMYYYY format</p>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            
            <div class="col-12 d-flex justify-content-end gap-3">
                <div>
                    <a href="{{ route('users') }}" class="btn btn-sm btn-secondary">Cancel</a>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit </button>
                </div>
                
            </div>
        </div>
    </form>

@endsection
@section('script')
<script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection





    









  
    
    


