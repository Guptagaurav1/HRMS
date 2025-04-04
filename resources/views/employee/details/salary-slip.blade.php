@extends('layouts.master', ['title' => 'Salary Slip'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <p class="mt-3">EMP CODE : {{auth('employee')->user()->emp_code}}</p>
                <p class="mt-3">Name : {{auth('employee')->user()->emp_name}}</p>
            </div>
            <form class="form">
            <div class="row px-4 mt-3">
                <div class="col-sm-6 col-md-3">
                    <label class="form-label">Select Month</label>
                    <input type="text" class="form-control date-picker" name="month" value="{{$month}}" placeholder="mm-year" required>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 d-flex  gap-2">
                       
                            <button type="submit" class="btn btn-sm btn-primary">Submit <i
                                class="fa-solid fa-print"></i></button>
                    </div>
                </div>
            </div>
            </form>
            <div class="row px-4 ">
                <div class="col-md-12">
                    <label><strong>Working days : </strong>
                        @if($slip_get)
                        <span>{{$filter_record->sal_working_days}}</span>
                        @else
                        <span class="text-danger">Attendance / Salary need to Generate.</span>
                        @endif
                    </label><br>
                    <label><strong>Month: </strong><span>{{$month}}</span> </label><br>
                    @if($slip_get)
                    <label class="mb-3"><strong>Status : </strong><span class="text-success">Salary Generated</span></label><br>
                    <div class="col-md-12 d-flex justify-content-end my-2">
                    @if(auth('employee')->user()->hasPermission('preview-salary-slip'))
                        <a href="{{route('preview-salary-slip', ['id' => $filter_record->emp_salary_id])}}" class="btn btn-primary float-right">Print Salary Slip <i class="fa-solid fa-print"></i></a>
                    @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/employeeSalarycalender.js')}}></script>
@endsection