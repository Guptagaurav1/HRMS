@extends('layouts.master', ['title' => 'Change Password'])

@section('contents')
    <div class="main-content login-panel" id="overflow">
        <div class="login-body">
            <div class="bottom ">
                <h3 class="panel-title">Change Password</h3>

                {{-- Show errors and notifications --}}
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                @if (session()->has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('message') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('message') }}
                            </div>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                {{-- Show password requirements --}}
                <div class="jumbotron border my-2 p-2 bg-grey text-danger">
                    <p>Password must meet the following requirements:</p>
                    <ul>
                        <li>At least 8 characters long</li>
                        <li>Contain at least one uppercase letter</li>
                        <li>Contain at least one lowercase letter</li>
                        <li>Contain at least one number</li>
                        <li>Contain at least one special character (!@#$%^&amp;*)</li>
                    </ul>
                </div>

                {{-- Change password form --}}
                <form class="form reset-form" method="POST" action="{{ route('user.update-password') }}">
                    @csrf
                    <div class="col-md-12 col-xs-12 mt-3">
                        <label class="form-label">New Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm password"
                                placeholder="Enter a New Password" name="password" aria-label="Password"
                                aria-describedby="basic-addon1" minlength="8" required>
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-eye-slash eye"></i></span>
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12 col-xs-12 mt-3">
                        <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="password" class="form-control form-control-sm password"
                                placeholder="Enter a Confirm Password" name="password_confirmation" aria-label="Password"
                                aria-describedby="basic-addon1" minlength="8" required>
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-eye-slash eye"></i></span>
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <span class="confirm text-danger"></span>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary w-100 submit-btn">Submit <i class="fa-solid fa-check"></i></button>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/reset-password.js') }}"></script>
@endsection
