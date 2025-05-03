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
                    <div>
                        <ul class="breadcrumb">
                            <li> 
                                @if (auth()->user()->role->role_name == "hr")
                                <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                                @elseif(auth()->user()->role->role_name == "hr_operations")
                                    <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                                @elseif(auth()->user()->role->role_name == "sales_manager")
                                    <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                                @else
                                @endif
                            </li>
                            <li>Form 16 List</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-12 d-flex justify-content-end mt-2 px-2">
                  
                </div>
                
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                        </svg>

                        @if(session()->has('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>
                                    {{session()->get('message')}}
                                    </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        @if(session()->has('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                  {{session()->get('message')}}
                                </div>
                             
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                <div class="col-md-12 d-flex justify-content-between flex-wrap px-2 mt-5">
                    <form class="row g-3" method="get">
                        <div class="col-auto mb-3 col-xs-12">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                           
                        </div>

                        <div class="col-auto col-xs-12">
                        <a href="{{ route('form16') }}" class="col-xs-12"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                        </div>
                    </form>

                    <div class="col-auto col-xs-12">
                    <a href="{{route('add-new-form16')}}" class="col-xs-12"><button type="button" class="btn btn-sm btn-primary">Add New Form 16 <i class="fa-solid fa-plus"></i></button></a> 

                    </div>
                </div>
    
                <div class="table-responsive mt-3">
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
                                    <td class="text-center">{{ $key+1}}</td>
                                    <td class="text-center">{{ $value->empDetail->emp_code??NULL}}</td>
                                    <td class="text-center">{{ $value->empDetail->emp_name??NULL}}</td>
                                    <td class="text-center">{{ $value->empDetail->emp_work_order??NULL}}</td>
                                    <td class="text-center">{{$value->pan_no??NULL}}</td>
                                    <td class="text-center">{{$value->financial_year??NULL}}</td>
                                    <td class="text-center">{{$value->created_at??NULL}}</td>
                                    <td class="text-center">@if(!empty($value->attachment))
                                              
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