@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="container-fluid">
    <div class="row align-items-center justify-content-center ">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="panel-header py-3 px-2 ">
                    <h5 class="mb-0">Apply Leave</h5>
                </div>

                <div class="card-body">
                  
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label for="recipient" class="form-label">To</label>
                                <input type="text" class="form-control" id="from" name="from"
                                    placeholder="Enter sender email">
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="to" class="form-label">Concern Department Head:</label>
                                <input type="text" class="form-control" id="to" name="to"
                                    placeholder="Enter recipient email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cc" class="form-label">CC</label>
                                <input type="text" class="form-control" id="cc" name="cc" placeholder="Enter CC email">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" class="form-control">Reason for Absence: <span
                                        class="text-danger">*</span></label>
                                <select id="inputState" class="form-control">
                                    <option value=""> Select Any One</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                    <option value="2">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="body" class="form-label">Message / Query</label>
                                <textarea class="form-control" id="body" name="body" rows="6"
                                    placeholder="Write your message here"></textarea>
                            </div>
                        </div>
                </div>

                <div class="d-flex justify-content-end pb-3 px-3">
                    <button type="submit" class="btn btn-primary ">Confirm <i class="fa-solid fa-paper-plane"></i></button>
                </div>
                 
            </div>
        </div>
    </div>
</div>

@endsection