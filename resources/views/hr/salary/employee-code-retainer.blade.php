@extends('layouts.master', ['title' => 'Print Salary Slip'])



@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <p class="mt-3">EMP CODE : {{$salary_slip_record->sal_emp_code}}</p>
                <p class="mt-3">Name : {{$salary_slip_record->sal_emp_name}}</p>
            </div>
            <div class="row px-4 mt-3">
                <div class="col-md-12 d-flex justify-content-end">
                    <a href="{{route('employee-details-salary-retainer', ['salaryid' => $salaryid])}}" class="btn btn-primary">Back</a>
                </div>
                <form class="form" method="get">
                <div class="col-sm-4 col-xs-6">
                    <label class="form-label">Select Month</label>
                    <input type="text" class="form-control date-picker" name="month" id="inputDate" placeholder="MM-Year" value="{{$month}}" required>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 d-flex  gap-2">
                        <button type="submit" class="btn btn-sm btn-primary">Submit <i
                                    class="fa-solid fa-print"></i></button>
                    </div>
                </div>
            </form>
            </div>
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
                    @if(auth()->user()->hasPermission('preview-salary-slip'))
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

