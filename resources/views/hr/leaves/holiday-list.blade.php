@extends('layouts.master', ['title' => 'Holidays'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Holiday List</h3>
                <div>
                    <ul class="breadcrumb">
                        <li>
                        @if (auth('employee')->check())
                            <a href="{{route('employee.dashboard')}}">Dashboard</a>
                        @elseif (auth()->check())
                            @if (auth()->user()->role->role_name == "hr")
                                <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "hr_operations")
                                <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "sales_manager")
                                <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                            @else
                            @endif
                        @endif
                       
                        </li>
                        <li>Holiday List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-4 mt-5">
                <form class="row g-3">
                    <div class="col-auto  col-xs-12 mb-3 ">
                        <input type="search" class="form-control" name="search" placeholder="Search by name or type" value="{{$search}}" required>
                    </div>
                    <div class="col-auto col-xs-12">
                        <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        
                    </div>
                    <div class="col-auto col-xs-12">
                    <a href="{{route('holiday-list')}}" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></a>
                    </div>
                </form>
            </div>
            
            <div class="table-responsive mt-4">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th>Holiday Name</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Day</th>
                                <th class="text-start">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($holidays as $holiday)
                            <tr>
                                <td>{{$holiday->holiday_name}}</td>
                                <td>{{date('d-M-Y', strtotime($holiday->holiday_date))}}</td>
                                <td>{{date('F', strtotime($holiday->holiday_date))}}</td>
                                <td>{{date('l', strtotime($holiday->holiday_date))}}</td>
                                <td>{{$holiday->holiday_type}}</td>
                            </tr>
                            @empty
                            @if (auth()->check())
                            <tr>
                                <td class="text-danger text-center" colspan="5">No Record Found</td>
                            </tr>
                            @endif
                            @endforelse
                            @if($day)
                                <tr>
                                    <td>Birthaday Leave</td>
                                    <td>{{$dob}}</td>
                                    <td>{{$month}}</td>
                                    <td>{{$day}}</td>
                                    <td>Not Specify</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 my-2 d-flex justify-content-center">
                    {{$holidays->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


