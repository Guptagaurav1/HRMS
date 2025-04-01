@extends('layouts.master', ['title' => 'Add Company'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="container-fluid">
        <div class="panel-header">
            <h2 class="px-2 mt-2">Add Company</h2>

        </div>

        <div class="row mt-3">
            <form method="post" action="{{route('company.store')}}">
                @csrf
                <div class="col-12">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-white">Company Details</h5>
                            <div class="btn-box">
                                <a href="{{ route('company.list') }}" class="btn btn-sm btn-primary">Company List
                                    <i class="fa-solid fa-list"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="name"
                                        placeholder="Enter Comapny Name" required>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span></label>
                                    @enderror
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Company Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm"
                                        placeholder="Enter Company Email" name="email" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Company Contact <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Company Contact" name="mobile" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Company City<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Company City" name="company_city" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Website <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Company Website" name="website" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label for="inputDate" class="form-label">Registration No. <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputDate"
                                        placeholder="Enter Registration No" name="registration_no" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">GSTIN No.<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputDate" name="gstin_no" placeholder="Enter GSTIN No"
                                        required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">SAC Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter a SAC Code" name="sac_code" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Service Tax Reg.No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Service Tax Reg. No" name="service_tax_registration_no" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">PAN No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="pan_no" placeholder="Enter PAN No"
                                        required>

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Company Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control form-control-sm" placeholder="Company Address" name="address" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-white">Banking Account Details</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Payee Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Payee Name" name="bank_payee_name" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control form-control-sm"
                                        placeholder="Enter Bank Name" name="bank_name" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Branch Name <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control form-control-sm"
                                        placeholder="Enter Branch Name" name="branch_name" required>
                                </div>

                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">IFSC Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter IFSC Code" name="ifsc_code" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Account No <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control form-control-sm"
                                        placeholder="Enter Account No" name="account_no" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Branch Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Branch Address" name="branch_address" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Bank Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control form-control-sm"
                                        placeholder="Enter Branch Email" name="bank_email" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Payment Mode<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Payment Mode" name="payment_type" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-white">Social Media Links</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Twitter Link<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Twitter Link" name="twitter_link" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Facebook Link <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Facebook Link" name="facebook_link" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Linkedin Link</label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Linkedin Link" name="linkedin_link">
                                </div>

                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Youtube Link <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Youtube Link" name="youtube_link" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Instragram Link <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Instagram Link" name="instagram_link" required>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                    <label class="form-label">Pinterest Link<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm"
                                        placeholder="Enter Pinterest Link" name="pinterest_link" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('company.list')}}" class="btn btn-sm btn-primary mx-2">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Submit <i
                            class="fa-solid fa-arrow-right"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
