@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
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
                    </div>

                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-lg-4 col-sm-6">
                                <label for="company_id" class="form-label">Organization Name <span
                                        class="text-danger">**</span></label>
                                <input type="text" name="name" class="form-control form-control-sm"
                                    placeholder="Enter Organization Name">
                                <span class="error text-danger" id="error-organization"></span>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <label for="contact" class="form-label">Contact Number<span class="text-danger">
                                        **</span></label>
                                <input type="text" name="contact" class="form-control form-control-sm"
                                    placeholder="Enter Contact No" maxlength="10">
                                <span class="error text-danger" id="error-phone"></span>
                                @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <label for="email" class="form-label">Email <span class="text-danger"> **</span></label>
                                <input type="text" name="email" class="form-control form-control-sm"
                                    value="{{ old('email') }}" placeholder="Enter Email">
                                <span class="error text-danger" id="error-email"></span>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="state"  class="form-label">State <span class="text-danger"> **</span></label>
                                <select name="state_id" id="state" class="form-select" required>
                                    <option value="">Select State</option>
                                    @foreach($states as $key => $value)
                                        <option value="{{$value->id}}" {{ old('state') == $value->id ? 'selected' : '' }}>{{$value->state}}</option>
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
                                   
                                </select>
                                @error('city_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="error text-danger" id="error-city"></span>
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="postal_code" class="form-label">Postal Code <span class="text-danger">
                                        **</span></label>
                                <input type="text" name="postal_code" class="form-control form-control-sm"
                                    placeholder="Enter a Postal Code" pattern="^[1-9]{1}[0-9]{2}\s?[0-9]{3}$"
                                    maxlength="6" title="Please enter a 6-digit Postal Code like 000 000" required>
                                <span class="error text-danger" id="error-postalCode"></span>
                                @error('postal_code')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3" >
                                <label for="state"  class="form-label">PSU<span class="text-danger"> **</span></label>
                                <select name="psu" id="psu" class="form-select" required>
                                    <option value="">-- Select --</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                        
                                </select>
                                @error('state_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span class="error text-danger" id="error-state"></span>
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3" style="display:none;" id="psu_name">
                                <label for="postal_code" class="form-label"> Name Of PSU<span class="text-danger">
                                        **</span></label>
                                <input type="text" name="psu_name" class="form-control form-control-sm"
                                    placeholder="Enter a PSU Name" required>
                                <span class="error text-danger" id="error-postalCode"></span>
                                @error('psu_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-xxl-6 col-lg-6 col-sm-6">
                                <label for="emp_remark" class="form-label">Address</label>
                                <textarea class="form-control" name="address"
                                    placeholder="Enter Complete Address With State, City, and Postal Code"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary" id="submit-btn">Submit <i
                        class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/vendor/js/jquery-ui.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/js/select2.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/select2-init.js') }}"></script> --}}
<script src="{{ asset('assets/js/masters/organization.js') }}"></script>

<script>
    // $(document).ready(function () {
    //     $("#submit-btn").click(function (event) {
    //         event.preventDefault();

    //         var isValid = true;

    //         $(".error").text('');

    //         let regexName = /^[a-zA-Z\s]+$/;
    //         let regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    //         let regexContact = /^[0-9]{10}$/;
    //         let regexpostal = /^([1-9]{1}[0-9]{5}|[1-9]{1}[0-9]{3}\\s[0-9]{3})$/


    //         if ($("input[name='Organization']").val().trim() === "" || !regexName.test($("input[name='Organization']").val())) {
    //             $("#error-organization").text("Organization must be letters and spaces.");
    //             isValid = false;
    //         }


    //         var email = $("input[name='email']").val().trim();
    //         if (email === "" || !regexEmail.test(email)) {
    //             $("#error-email").text("Please enter a valid email.");
    //             isValid = false;
    //         }


    //         var contact = $("input[name='contact']").val().trim();
    //         if (contact.length !== 10 || !regexContact.test(contact)) {
    //             $("#error-phone").text("Please enter a valid 10-digit contact number.");
    //             isValid = false;
    //         }

    //         if ($("select[name='state']").val() === "") {
    //             $("#error-state").text("State is required.");
    //             isValid = false;
    //         }

    //         if ($("input[name='city']").val().trim() === "" || !regexName.test($("input[name='city']").val().trim())) {
    //             $("#error-city").text("City is required.");
    //             isValid = false;
    //         }

    //         var postalCode = $("input[name='postal_code']").val().trim();
    //         if (postalCode === "") {
    //             $("#error-postalCode").text("Postal code is required.");
    //             isValid = false;
    //         }
    //         else if (!regexpostal.test(postalCode)) {
    //             $("#error-postalCode").text("Enter a Valid 6 digit Postal code");
    //             isValid = false;
    //         }
    //         if (isValid) {
    //             $("form").submit();
    //         }
    //     });
    // });
</script>
@endsection