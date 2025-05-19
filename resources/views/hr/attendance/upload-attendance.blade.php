@extends('layouts.master')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="row mt-3" id="tab-2" >
                <form action="{{route('create-attendance')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="panel">
                            <div class="panel-header">
                                <h5 class="text-white">Bulk Upload Attendance</h5>
                                <div>
                                    <ul class="breadcrumb">
                                       
                                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                                        <li><a href="{{route('attendance-list')}}">Attendance List</a></li>
                                        <li>Bulk Upload Attendance</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row px-3 mt-2">
                                @if($message = Session::get('success'))
                                <div class="col-md-12">
                                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                        <div>
                                        {{ $message }}
                                        </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                                @if($message = Session::get('error'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                            {{$message}}
                                        </div>
                                    
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row text-end px-2">
                            <div class="btn-box">
                                    <a href="{{asset('sample/attendance_bulk_upload.csv')}}" class="btn btn-sm btn-primary" download><i class="fa-solid fa-download"></i> Download CSV Format</a>
                                </div>
                            </div>
                           
                            <div class="panel-body">
                                <div class="row g-4">
                                    <div class="col-xxl-4 col-lg-8 col-sm-6">
                                        <label for="formFileSm" class="form-label">Select CSV File<span style="color: red"> *</span></label>
                                    <input class="form-control form-control-sm" name="csv_data" accept=".csv" id="formFileSm" type="file" required>
                                    @error('csv_data')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                   
                                    <p class="mx-1 mt-2 fs-6">Note : Please Input Month only Given Format in CSV File (January, February, March, April, May, June, July, August, September, October, November, December)</p>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-end py-3 px-3">
                        <button type="submit" class="btn btn-sm btn-primary "> <i class="fa-solid fa-upload"></i> Upload CSV</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

