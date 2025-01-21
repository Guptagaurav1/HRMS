@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
           
           
            <div class="row" id="tab-2" >
                <div class="col-12">
                    <div class="panel">
                        <div class="panel-header">
                            <h5 class="text-dark">Bulk Upload Employee</h5>
                            <div class="btn-box">
                                <a href="{{route('employee-list')}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-download"></i> Download CSV Format</a>
                               
                            </div>
                            
                          
                        </div>
                        <div class="">
                            <p class="text-danger mx-1 mt-2" style="font-size: 12px">Note : Please Input Month only Given Format in CSV File (January, February, March, April, May, June, July, August, September, October, November, December)</p>
                        </div>
                        <div class="panel-body">
                            <div class="row g-3">
                                <div class="col-xxl-3 col-lg-8 col-sm-6">
                                    <label for="formFileSm" class="form-label">Select CSV File<span style="color: red"> *</span></label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                                </div>
                        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button class="btn btn-sm btn-primary mb-3 mx-2"> <i class="fa-solid fa-upload"></i> Upload CSV</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

