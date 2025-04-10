@extends('layouts.guest.master')
@section('content')
<div class="acceptance-form-layouts">
    <div class="container mt-3" >
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11 col-12">
             
                <div class="d-flex align-items-center justify-content-between border bg-white py-2 px-3 shadow-lg rounded-3">
                    <div>
                        <img src="{{ asset('assets/images/PrakharLimited-logo.png') }}" alt="logo left" style="width: 15%;">
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/11years.png') }}" alt="logo right"  style="width: 60%;"/>
                    </div>
                </div>

                
                <form class="h-auto mt-4 shadow-lg rounded-3 bg-white p-4">
                    <h4 class="border-bottom text-dark pb-2">Acceptance Form</h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact No</label>
                            </div>
                            <div class="form-group">
                                <label for="joining-date">Expected Joining Date</label>
                            </div>
                            <div class="form-group">
                                <label for="designation">Designation</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                            </div>
                            <div class="form-group">
                                <label for="applied-for">Applied For</label>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary as per Offer letter</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group d-flex align-items-start gap-2 mt-3">
                        <input class="form-check-input bg-primary pe-none" type="checkbox" name="terms_and_condition" disabled required>
                        <button type="button" style="border: none; background: none; text-decoration: underline;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="fw-bold">
                            Terms & Conditions
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <a href="#">
                            <button type="submit" class="btn btn-sm btn-primary btn-interactive acceptform">
                                Accept The Offer <i class="fa-solid fa-check"></i>
                            </button>
                        </a>
                    </div>
                </form>

                <div class="text-center text-white border-top mt-5 p-2">
                    <p class="mt-5">© 2025 All Rights Reserved. Prakhar Softwares Solution Ltd.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






<!-- Dynamic Acceptance Form -->
 
















