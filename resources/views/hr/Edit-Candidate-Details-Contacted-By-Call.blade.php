@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
<div class="panel-header">
    <h2 class="mt-2 px-2">Edit Candidate Details Contacted By Call</h2>

</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h5 class="text-white">Edit Details</h5>
            </div>
            <div class="text-end mt-2 px-2">
                <a href="{{ route(('Candidate-Contacted-By-Cal-Log'))}}"><button type="button" class="btn btn-sm btn-primary">Contacted Candidate List <i class="fa-solid fa-list"></i></button></a>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label" style="color: black;font-weight:bold">Position Title (Client Name)
                        </label>
                        <select id="inputState" class="form-select">
                            <option value=""> Select Title</option>
                            <option value="0">Select 1</option>
                            <option value="1">Select 2</option>
                            <option value="2">Select 3</option>
                        </select>
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Full Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Email<span style="color: red">*</span></label>
                        <input type="email" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Contact No<span style="color: red">*</span></label>
                        <input type="number" class="form-control form-control-sm">

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Experience</label>
                        <input type="number" class="form-control form-control-sm">

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6 d-flex flex-wrap">
                        <label class="form-label w-100">CTC </label>
                        <div class="d-flex w-100">
                            <input type="number" class="form-control form-control-sm me-2" placeholder="Current CTC">
                            <input type="number" class="form-control form-control-sm" placeholder="Expected CTC">
                        </div>
                    </div>

                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Notice Period</label>
                        <input type="number" class="form-control form-control-sm">
                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Education</label>
                        <select id="inputState" class="form-select">
                            <option value=""> Nothing Selected</option>
                            <option value="0">Select 1</option>
                            <option value="1">Select 2</option>
                            <option value="2">Select 3</option>
                        </select>
                    </div>


                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label class="form-label">Loaction</label>
                        <input type="text" class="form-control form-control-sm">

                    </div>
                    <div class="col-xxl-3 col-lg-4 col-sm-6">
                        <label for="formFileSm" class="form-label">Resume
                            <span class="px-5"> <button class="btn btn-sm btn-primary">View <i class="fa-solid fa-eye"></i></button></span>
                        </label>
                        
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                    </div>
                    <div class="col-xxl-3 col-lg-12 col-sm-6">
                        <label for="exampleTextarea" class="form-label">Remarks </label>
                        <textarea class="form-control" id="exampleTextarea"></textarea>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <div class="col-12 d-flex justify-content-end ">

        <button class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-arrow-right"></i></button>
    </div>

</div>

@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>

@endsection