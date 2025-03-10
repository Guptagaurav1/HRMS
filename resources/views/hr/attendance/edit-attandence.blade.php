@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />



@endsection



@section('contents')
<div class="fluid-container">

    <div class="row">
        <div class="col-12">
            <div class="panel">
                
                <div class="panel-header">
                    <h5 class="text-white">Attendance Edit</h5>
                </div>
                <div class="text-end px-4 ">
                    <a href="{{route('attendance-list')}}"> <button class="btn btn-sm btn-primary my-2">Attendance List <i class="fa-solid fa-list"></i></button></a>
                 </div>
                <form action="{{route('update-attendance',$id)}}" method="post">
                    @csrf
                    <div class="panel-body">
                        <div class="row g-3">
                            
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">Designation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" class="form-control form-control-sm" value="{{$wo_attendance->designation}}">
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">CTC <span class="text-danger">*</span></label>
                                <input type="tel" name="ctc" class="form-control form-control-sm" value="{{$wo_attendance->ctc}}" >
                            </div>
                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label for="inputDate" class="form-label">Approve Leave</label>
                                <input type="text" name="lwp_leave" class="form-control" id="inputDate" value="{{$wo_attendance->lwp_leave}}">
                            </div>

                            <div class="col-xxl-3 col-lg-6 col-sm-6">
                                <label class="form-label">LWP <span class="text-danger">*</span></label>
                                <input type="text" name="approve_leave" class="form-control form-control-sm" value="{{$wo_attendance->approve_leave}} ">
                            </div>
                            
                
                        </div>
                    </div>
                    <div class="text-end px-4 ">
                        <a href="{{route('invoice-encloser')}}"> <button class="btn btn-sm btn-primary my-2"> Update <i class="fa-solid fa-rotate"></i></button></a>
                    </div>
                </form>
        </div>
       
        
    </div>
</div>

@endsection
@section('script')

<script src={{asset('assets/js/checkbox.js')}}></script>

@endsection

