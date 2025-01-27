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
                <div class="col-sm-4 col-xs-6">
                    <label class="form-label">Date Of Resigning</label>
                    <input type="text" class="form-control date-picker" id="inputDate" placeholder="MM-Year">
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 d-flex  gap-2">
                        <a href="{{route('employee-code-retainer')}}"> <button class="btn btn-sm btn-primary">Submit <i
                                    class="fa-solid fa-print"></i></button></a>

                    </div>
                </div>
            </div>
            <div class="row px-4 ">
                <div class="col-md-12">
                    <label><strong>Working days : </strong> <span class="text-danger">Attendance / Salary need to
                            Generate.</span></label><br>
                    <label><strong>Month: </strong> </label><br>
                    <label class="mb-3"><strong>Status : </strong> <span class="text-danger">Attendance / Salary not
                            Generate.</span></label><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/employeeSalarycalender.js')}}></script>
@endsection

