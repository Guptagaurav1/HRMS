@extends('layouts.master', ['title' => 'Create Vendor'])
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
@endsection

@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>Create Vendor</h2>
        <div class="btn-box">
            <a href="{{route('vendors.index')}}" class="btn btn-sm btn-primary">Vendor List</a>
        </div>
    </div>
    <form action="{{ route('vendors.save') }}" method="post">
        @csrf
        <d class="d-none">
            <input type="hidden" name="role_id" value="{{ $role->id }}">
        </d>
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h4 class="mt-1">Vendor Details</h4>
                        <div>
                            <ul class="breadcrumb">
                                <li> @if (auth()->user()->role->role_name == "hr")
                                    <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                    @endif
                                </li>
                                <li><a href="{{ route('vendors.index') }}" >Vendor List</a></li>
                                <li>Add Vendor </li>
                            </ul>
                        </div>
                    </div>
                
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="first_name" class="form-label">First Name <span class="text-danger"> ** </span></label>
                                    <input type="text" name="first_name" class="form-control form-control-sm" value="{{ old('first_name') }}" maxlength="20" required>
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="last_name" class="form-label">Last Name <span class="text-danger"> ** </span> </label>
                                    <input type="text" name="last_name" class="form-control form-control-sm" value="{{ old('last_name') }}" maxlength="20" required>
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                              
                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="contact" class="form-label">Contact<span class="text-danger"> ** </span> </label>
                                    <input type="number" id="contact" name="phone" class="form-control" value="{{ old('phone') }}" >
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="dob" class="form-label">Date of Birth <span class="text-danger"> ** </span></label>
                                    <input type="date" id="dob" name="dob" class="form-control"  value="{{ old('dob') }}">
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="email" class="form-label">Email <span class="text-danger"> ** </span> </label>
                                    <input type="email" name="email" class="form-control form-control-sm" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-6 col-lg-6 col-sm-6">
                                    <label for="company_name" class="form-label">Company Name <span class="text-danger"> ** </span> </label>
                                    <select name="company_id" class="form-select" required>
                                        <option value="">Select Company</option>
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-xxl-12 col-lg-12 col-sm-12">
                                    <label for="address" class="form-label">Address <span class="text-danger"> ** </span> </label>
                                    <textarea  name="address" class="form-control form-control-sm" >{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                          
                        </div>
                </div>
            </div>
            
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('vendors.index')}}" class="btn btn-sm btn-primary mx-2">Cancel</a>
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

    









  
    
    


