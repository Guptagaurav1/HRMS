@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="row" id="tab-1">
        <div class="">
            <h2>Generate Invoice</h2>
            <h5>Work Order Hierarchy</h5>
        </div>
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>Create Invoice</h5>
                </div>
                <div class="panel-body">
                    <div class="row g-3">
                        <div class="col-sm-12 col-md-12">
                            <label class="form-label">Client Name (Organisation)</label>
                            <select id="inputState" class="form-select">
                                <option selected>Select Organisation</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 mt-4">
                            <label class="form-label">Work Order <span class="text-danger">(Show Only Billing Structure
                                    completed Work Order)</span></label>
                            <select id="inputState" class="form-select">
                                <option selected>Not Specify</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 mt-4">
                            <label class="form-label">Select Month</label>
                            <select id="inputState" class="form-select">
                                <option selected>Select Month</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                                <option>Select 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label">Work Order No: <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Project Number: <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Date Of Issue: <span style="color: red">*</span></label>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="form-label">No. Of Resources: <span style="color: red">*</span></label>
                            <input type="number" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Start Date: <span style="color: red">*</span></label>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">End Date: <span style="color: red">*</span></label>
                            <input type="date" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-sm btn-primary"> Check Invoice <i class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/js/tab-changes.js')}} @endsection