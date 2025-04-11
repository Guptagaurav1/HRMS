@extends('layouts.master', ['title' => 'Edit Organization'])

@section('contents')
<div class="row">
    <form action="{{ route('organizations.update', $organization->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h4 class="mt-2">Update Organization</h4>
                        <div>
                            <ul class="breadcrumb">
                                <li>
                                    @if (auth()->user()->role->role_name="hr")
                                        <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                    @endif
                                </li>
                                <li><a href="{{route('organizations.index')}}">Organization List</a></li>
                                <li>Update Organization</li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-lg-4 col-sm-6">
                                <label for="company_id" class="form-label">Organization Name <span
                                        class="text-danger">**</span></label>
                                <input type="text" name="name" value="{{ $organization->name }}"
                                    class="form-control form-control-sm" placeholder="Enter Organization Name">
                                <span class="error text-danger" id="error-organization"></span>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <label for="contact" class="form-label">Contact Number<span class="text-danger">
                                        **</span></label>
                                <input type="text" name="contact" value="{{ $organization->contact }}"
                                    class="form-control form-control-sm for_char" placeholder="Enter Contact No"
                                    maxlength="10">
                                <span class="contact"></span>
                                @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <label for="email" class="form-label">Email <span class="text-danger"> **</span></label>
                                <input type="text" name="email" value="{{ $organization->email }}"
                                    class="form-control form-control-sm for_char" value="{{ old('email') }}"
                                    placeholder="Enter Email">
                                <span class="email"></span>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="state" class="form-label">State <span class="text-danger"> **</span></label>
                                <select name="state_id" id="state" class="form-select" required>
                                    <option value="">Select State</option>
                                    @foreach($states as $key => $value)
                                    <option value="{{$value->id}}" {{ $organization->state_id == $value->id ? 'selected'
                                        : '' }}>{{$value->state}}</option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="error text-danger" id="error-state"></span>
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="city" class="form-label">City <span class="text-danger"> **</span></label>
                                <select name="city_id" id="city" class="form-select" required>
                                    @foreach($cities as $key => $value)
                                    @if($organization->city_id)
                                    <option value="{{$value->id}}" {{ $organization->city_id == $value->id ? 'selected'
                                        : '' }}>{{ $value->city_name }}</option>
                                    @else
                                    <option value="{{$value->id}}">{{ $value->city_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('city_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="error text-danger" id="error-city"></span>
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="postal_code" class="form-label">Postal Code <span class="text-danger">
                                    **</span></label>
                                <input type="text" value="{{ $organization->postal_code }}" name="postal_code"
                                    class="form-control form-control-sm" placeholder="Enter a Postal Code" maxlength="6"
                                    title="Follow the format"
                                    onkeyup="if (!/^[1-9]{1}[0-9]{2}\s?[0-9]{3}$/.test(this.value)) this.value = this.value.replace(/[^\d\s]/g, '')"
                                    required>

                                @error('postal_code')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="state" class="form-label">PSU<span class="text-danger"> **</span></label>
                                <select name="psu" id="psu" class="form-select" required>
                                    <option value="">-- Select --</option>
                                    <option value="yes" {{$organization->psu == 'yes' ? 'selected' : ''}}>Yes</option>
                                    <option value="no" {{$organization->psu == 'no' ? 'selected' : ''}}>No</option>

                                </select>
                                @error('state_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="error text-danger" id="error-state"></span>
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3" style="display:{{ $organization->psu == 'yes'? 'block' : 'none'}};" id="psu_name">
                                <label for="postal_code" class="form-label"> Name Of PSU<span class="text-danger">
                                        **</span></label>
                                <input type="text" name="psu_name" value="{{ $organization->psu_name }}"
                                    class="form-control form-control-sm" placeholder="Enter a PSU Name" required>
                                <span class="error text-danger" id="error-postalCode"></span>
                                @error('psu_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <label for="emp_remark" class="form-label">Address <span
                                        class="text-danger">**</span></label>
                                <textarea class="form-control" name="address"
                                    placeholder="Enter Complete Address With State, City, and Postal Code">{{ $organization->address }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end gap-3">
                <div>
                    <a href="{{ route('organizations.index') }}">
                        <button type="button" class="btn btn-sm btn-secondary">Cancel </button>
                    </a>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-primary">Submit </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/js/masters/organization.js') }}"></script>
<script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection