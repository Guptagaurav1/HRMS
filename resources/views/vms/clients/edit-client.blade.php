@extends('layouts.master', ['title' => 'Edit Client'])


@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>Edit Client</h2>
        <div class="btn-box">
            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">Client List</a>
        </div>
    </div>
    <form action="{{ route('clients.update') }}" method="post">
        @csrf
        <div class="d-none">
            <input type="hidden" name="id" value="{{ $client->id }}">
            <input type="hidden" name="role_id" value="{{ $role->id }}">
        </div>
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h4 class="mt-1">Client Details</h4>
                        <ul class="breadcrumb">
                            <li> @if (auth()->user()->role->role_name="hr")
                                <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                @endif
                            </li>
                            <li><a href="{{ route('clients.index') }}" >Client List</a></li>
                            <li>Add Client </li>
                        </ul>
                    </div>

                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-12 col-xxl-4 col-lg-4 col-sm-6">
                                <label for="first_name" class="form-label">First Name <span class="text-danger"> **
                                    </span></label>
                                <input type="text" name="first_name" class="form-control form-control-sm for_char"
                                    value="{{ $client->user->first_name }}" maxlength="20" required>
                                    <span class="first_name"></span>
                                @error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-xxl-4 col-lg-4 col-sm-6">
                                <label for="last_name" class="form-label">Last Name <span class="text-danger"> ** </span>
                                </label>
                                <input type="text" name="last_name" class="form-control form-control-sm for_char"
                                    value="{{ $client->user->last_name }}" maxlength="20" required>
                                    <span class="last_name"></span>
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-xxl-4 col-lg-4 col-sm-6">
                                <label for="contact" class="form-label">Contact<span class="text-danger"> ** </span>
                                </label>
                                <input type="text" id="contact" name="phone" class="form-control for_char"
                                    value="{{ $client->user->phone }}">
                                    <span class="phone"></span>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-xxl-4 col-lg-4 col-sm-6">
                                <label for="dob" class="form-label">Date of Birth <span class="text-danger"> **
                                    </span></label>
                                <input type="date" id="dob" name="dob" class="form-control"
                                    value="{{ $client->user->dob }}">
                                @error('dob')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-xxl-4 col-lg-4 col-sm-6">
                                <label for="email" class="form-label">Email <span class="text-danger"> ** </span>
                                </label>
                                <input type="email" name="email" class="form-control form-control-sm for_char"
                                    value="{{ $client->user->email }}">
                                    <span class="email"></span>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-xxl-4 col-lg-4 col-sm-6">
                                <label for="company_name" class="form-label">Company Name <span class="text-danger"> **
                                    </span> </label>
                                <select name="company_id" class="form-select" required>
                                    <option value="">Select Company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $client->user->company_id == $company->id ? 'selected' : '' }}>
                                            {{ $company->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 d-flex justify-content-end gap-xs-5 gap-3">
                <div>
                <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary mx-2">Cancel</a>
                </div>
                <div>
                <button type="submit" class="btn btn-sm btn-primary">Submit <i
                class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script src="{{asset('assets/js/commonValidation.js')}}"></script>
@endsection
