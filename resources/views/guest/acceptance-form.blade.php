@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />


@endsection

@section('contents')
<div class="row" id="background_image">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <form class="h-auto px-3 px-md-5 shadow-lg rounded-3 bg-white p-4" style="" id="form_design">
            <div class="row d-flex gap-3 gap-md-5">
                <h4 class="border-bottom text-dark">Acceptance Form</h4>
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="form-group d-flex justify-content-between">
                        <label for="name">Name</label>
                        <span>Gaurav Gupta</span>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="contact">Contact No</label>
                        <span>Gaurav Gupta</span>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="joining-date">Expected Joining Date</label>
                        <span>NA</span>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="designation">Designation</label>
                        <span>NA</span>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="form-group d-flex justify-content-between">
                        <label for="email">Email</label>
                        <span>Gaurav.Gupta@prakhrar.com</span>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="applied-for">Applied For</label>
                        <span>Head</span>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label for="salary">Salary as per Offer letter</label>
                        <span>Head</span>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-lg-6 col-sm-6 d-flex gap-2">
            <input class="form-check-input" type="checkbox" ><label class="text-primary"> Terms & Condiitions</label>
            </div>
           

            
            <div class="text-center mt-4">
                <a href="#">
                    <button class="btn btn-sm btn-primary btn-interactive">
                        Accept The Offer <i class="fa-solid fa-check"></i>
                    </button>
                </a>
            </div>
        </form>
    </div>
</div>




@endsection


