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
                    <h3 class="mt-2">Form 16 List</h3>
    
    
                </div>
                <p class="px-3 mt-2">Billing Structure</p>
                <div class="col-md-12 d-flex justify-content-end ">
                   <a href="{{route('add-new-form16')}}"><button type="button" class="btn btn-primary m-1">Add New Form 16 <i class="fa-solid fa-plus"></i></button></a> 
                </div>
                <div class="row px-3 mt-2">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @else
                        <div class="alert alert-error alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                <div class="col-md-12 d-flex justify-content-start px-2">
                    <form class="row g-3" method="get">
                        <div class="col-auto mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                            <a href="{{ route('form16') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                        </div>
                    </form>
                </div>
    
                <div class="table-responsive">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SNO.</th>
                                    <th class="text-center">Employee Code</th>
                                    <th class="text-center">Employee Name</th>
                                   
                                    <th class="text-center">Work Order</th>
                                    <th class="text-center">PAN No.</th>
                                    <th class="text-center">Financial Year</th>
                                    <th class="text-center">Added On</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($form16 as $key => $value)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{{ $value->empDetail->emp_code}}</td>
                                    <td>{{ $value->empDetail->emp_name}}</td>
                                    <td>{{ $value->empDetail->emp_work_order}}</td>
                                    <td>{{$value->pan_no}}</td>
                                    <td>{{$value->financial_year}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>@if(!empty($value->attachment))
                                              
                                                <a href="{{ asset('storage/Form16/' . $value->attachment) }}" target="_blank" ><button class="btn btn-primary mb-3">view Doc </button></a>
                                            @else
                                                {{ 'Not Uploaded' }}
                                            @endif</td>
                                </tr>
                                @empty
                                <tr>
                                <td colspan="15" class="text-center"><span class="text-danger">No Record Found</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
@endsection