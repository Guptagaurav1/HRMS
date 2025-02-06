@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <p class="mt-3">EMP CODE : Retainer/2023-24/0052</p>
                <p class="mt-3">Name : Sanjay Rawat</p>
            </div>
            <div class="row px-4 mt-3">
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Select Month</label>
                    <input type="" class="form-control date-picker" id="inputDate" placeholder="mm-year">
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 d-flex  gap-2">
                        <a href=""> 
                            <button class="btn btn-sm btn-primary">Submit <i class="fa-solid fa-print"></i></button></a>
                    </div>
                </div>
            </div>
            <div class="row px-4 ">
                <div class="col-md-12">
                    <label><strong>Working days : </strong> <span class="text-danger">Attendance need to
                            insert.</span></label><br>
                    <label><strong>Month: </strong> </label><br>
                    <label class="mb-3"><strong>Status : </strong> <span class="text-danger">Attendance Not
                            Uploaded.</span></label><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/employeeSalarycalender.js')}}></script>
@endsection