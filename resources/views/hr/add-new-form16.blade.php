@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />

@endsection

@section('contents')
<div class="">
    <h2>Form 16</h2>
</div>
<div class="dashboard-breadcrumb mb-25">

    <div class="d-flex gap-2 justify-content-between align-items-center">
        <div class="d-flex gap-2">
            <input type="radio" class="tab-links active" id="html" name="fav_language" value="HTML" data-tab="1">
            <label for="html">Single Entry</label><br>
            <input type="radio" class="tab-links" id="html" name="fav_language" value="HTML" data-tab="2">
            <label for="html">Bulk Entry</label><br>
        </div>
        <div>
            <a href="{{route('form16')}}"><button class="btn btn-sm btn-primary ml-5"> Form 16 List</button></a>
        </div>
    </div>
    
</div>

<div class="row" id="tab-1">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark">Form 16 Details</h5>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Employee PAN No</label>
                        <select id="inputState" class="form-select">
                            <option value="">Select Employee</option>
                            <option value="0">Shift 1</option>
                            <option value="1">Shift 2</option>
                            <option value="2">Shift 3</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Employee Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Employee Name <span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Work Order<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Financial Year <span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control-sm">
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="formFileSm" class="form-label">Attachment</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                    </div>
                    
                   




                </div>
            </div>
        </div>
    </div>
    

    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary"> Submit <i class="fa-solid fa-arrow-right"></i></button>
    </div>
</div>
<div class="row" id="tab-2" style="display: none">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-dark">Bulk Upload Form 16</h5>
                <div class="btn-box">
                    <a href="{{route('employee-list')}}" class="btn btn-sm btn-primary"><i
                            class="fa-solid fa-download"></i> Download CSV Format</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-8 col-sm-6">
                        <label for="formFileSm" class="form-label">Select Zip File<span style="color: red">
                                *</span></label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-sm btn-primary"> <i class="fa-solid fa-upload"></i> Upload CSV</button>
    </div>
</div>

@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/js/tab-changes.js')}} @endsection