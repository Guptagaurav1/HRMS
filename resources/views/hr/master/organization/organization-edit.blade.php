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
                    </div>
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-lg-4 col-sm-6">
                                <label for="company_id" class="form-label">Organization Name <span class="text-danger">
                                        ** </span></label>
                                <input type="text" name="name" value="{{ $organization->name }}"
                                    class="form-control form-control-sm" name="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <label for="contact" class="form-label">Contact Number<span class="text-danger">
                                        **</span></label>
                                <input type="text" name="contact" class="form-control form-control-sm"
                                    name="{{ old('contact') }}" placeholder="Enter Contact No" maxlength="10">
                                @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <label for="email" class="form-label">Email <span class="text-danger"> **</span></label>
                                <input type="text" name="email" class="form-control form-control-sm"
                                    name="{{ old('email') }}" placeholder="Enter Email">
                                <span class="error text-danger" id="error-email"></span>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="state" class="form-label">State <span class="text-danger"> **</span></label>
                                <select name="state" class="form-select" required>
                                    <option value="">Select State</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Karnataka">Karnataka</option>
                                </select>
                                <span class="error text-danger" id="error-state"></span>
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="city" class="form-label">City <span class="text-danger"> **</span></label>
                                <input type="text" name="city" class="form-control form-control-sm"
                                    placeholder="Enter City">
                                <span class="error text-danger" id="error-city"></span>
                            </div>

                            <div class="col-lg-4 col-sm-6 mt-3">
                                <label for="postal_code" class="form-label">Postal Code <span class="text-danger">
                                        **</span></label>
                                <input type="text" name="postal_code" class="form-control form-control-sm"
                                    placeholder="Enter a Postal Code" pattern="^[1-9]{1}[0-9]{2}\s?[0-9]{3}$"
                                    maxlength="6" title="Please enter a 6-digit Postal Code like 000 000" required>
                                <span class="error text-danger" id="error-postalCode"></span>
                            </div>

                            <div class="col-xxl-6 col-lg-6 col-sm-6">
                                <label for="emp_remark" class="form-label">Address <span
                                        class="text-danger">**</span></label>
                                <textarea class="form-control" name="emp_remark"
                                    placeholder="Enter Complete Address With State, City, and Postal Code"></textarea>
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