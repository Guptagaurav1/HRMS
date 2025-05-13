
@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
@endsection

@section('contents')
    
    <form action="{{ route('update-user',$user->id) }}" method="post">
        @csrf
        <!-- @method('PUT') -->
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h4 class="mt-1">Edit User</h4>
                        <div>
                            <ul class="breadcrumb">
                                <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                                <li><a href="{{route('users')}}">Users List</a></li>
                                <li>Edit Users</li>
                            </ul>
                        </div>
                    </div>
                
                        <div class="panel-body mt-5">
                            <div class="row g-3">
                                <div class="col-lg-4 col-sm-6">
                                    <label for="company_id" class="form-label">Select Comapny Name <span class="text-danger"> ** </span></label>
                                    <select id="company_id" name="company_id" class="form-select">
                                        <option value=""> Select Any One</option>
                                        @foreach($companys as $company)
                                        <option value="{{ $company->id }}" 
                                            @if ($company->id == old('company', $user->company_id)) selected @endif>
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
                                    <select id="role_id" name="role_id" class="form-select">
                                        <option value=""> Select Use Type</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" 
                                            @if ($role->id == old('role', $user->role_id)) selected @endif>
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
                                    <input type="text" name="first_name" class="form-control form-control-sm for_char" value="{{ old('first_name', $user->first_name) }}" required>
                                    <span class="first_name"></span>
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger"> ** </span> </label>
                                    <input type="text" name="last_name" class="form-control form-control-sm for_char" value="{{ old('last_name',$user->last_name) }}">
                                    <span class="last_name"></span>
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="department" class="form-label">Department <span class="text-danger"> ** </span></label>
                                    <select id="department" name="department" class="form-select">
                                        <option value="">-- Select Department --</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}" 
                                            @if ($department->id == old('department', $user->department_id)) selected @endif>
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
                                    <select id="gender" name="gender" class="form-select">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender',$user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender',$user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender',$user->gender) == 'other' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <label for="contact" class="form-label">Contact<span class="text-danger"> ** </span> </label>
                                    <input type="text" id="contact" name="contact" class="form-control for_char" value="{{ old('contact',$user->phone) }}" maxlength="10" required>
                                    <span class="contact"></span>
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" col-lg-4 col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth </label>
                                    <input type="date" id="dob" name="dob" class="form-control"  value="{{ old('dob',$user->dob) }}" max="{{ date('Y-m-d', strtotime('18 years ago')) }}">
                                </div>
                                <div class=" col-lg-4 col-sm-6">
                                    <label for="email" class="form-label">Email <span class="text-danger"> ** </span> </label>
                                    <input type="email" name="email" class="form-control form-control-sm for_char" value="{{ old('email',$user->email) }}">
                                    <span class="email"></span>
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
            
            <div class="col-12 d-flex justify-content-end gap-3">
                <div>
                <a href="{{ route('users') }}" button type="button" class="btn btn-sm btn-secondary">Cancel</a>
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

    









  
    
    


