
@extends('layouts.master')
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>Edit User</h2>
        @if(auth()->user()->hasPermission('users'))
            <div class="btn-box">
                <a href="{{route('users')}}" class="btn btn-sm btn-primary">User List</a>
            </div>
        @endif
    </div>
    
    <form action="{{ route('update-user',$user->id) }}" method="post">
        @csrf
        <!-- @method('PUT') -->
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
                                            @if ($company->id == old('company', $user->company_id)) selected @endif>
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
                                        <option value=""> Select Use Type</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" 
                                            @if ($role->id == old('role', $user->role_id)) selected @endif>
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
                                    <input type="text" name="first_name" class="form-control form-control-sm" value="{{ old('first_name', $user->first_name) }}">
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger"> ** </span> </label>
                                    <input type="text" name="last_name" class="form-control form-control-sm" value="{{ old('last_name',$user->last_name) }}">
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
                                            @if ($department->id == old('department', $user->department_id)) selected @endif>
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
                                        <option value="male" {{ old('gender',$user->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender',$user->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender',$user->gender) == 'other' ? 'selected' : '' }}>Others</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="contact" class="form-label">Contact<span class="text-danger"> ** </span> </label>
                                    <input type="number" id="contact" name="contact" class="form-control" value="{{ old('contact',$user->phone) }}" >
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth </label>
                                    <input type="date" id="dob" name="dob" class="form-control"  value="{{ old('dob',$user->dob) }}">
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6">
                                    <label for="email" class="form-label">Email <span class="text-danger"> ** </span> </label>
                                    <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email',$user->email) }}">
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

    









  
    
    


