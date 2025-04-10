@extends('layouts.master')

@section('contents')

<div class="main-content login-panel" id="overflow">
    <div class="login-body">

        <div class="bottom ">
            <h3 class="panel-title">Change Password</h3>
            <form>
                <div class="col-md-12 col-xs-12">
                    <label class="form-label">Old Password <span class="text-danger">*</span></label>
                    <input type="text" name="old-password" class="form-control form-control-sm"
                    data-id="text-val" placeholder="Enter a Old Password" required>
                    
                </div>
                <div class="col-md-12 col-xs-12 mt-3">
                    <label class="form-label">New Password <span class="text-danger">*</span></label>
                    <input type="text" name="new-password" class="form-control form-control-sm"
                  placeholder="Enter a New Password" required>
                    
                </div>

                <div class="col-md-12 col-xs-12 mt-3">
                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                    <input type="text" name="confirm-password" class="form-control form-control-sm"
                       placeholder="Enter a Confirm Password" required>
                       
                </div>
                <div class="text-end mt-3">
                    <button type="button" class="btn btn-primary w-100 submit-btn">Submit</button>

                </div>

            </form>

        </div>
    </div>
</div>
@endsection


@section('script')

<script src="{{asset('assets/js/dummy-validation.js')}}"></script>
@endsection