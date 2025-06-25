@extends('layouts.master', ['title' => 'Holidays'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Holiday List</h3>
                <div>
                    <ul class="breadcrumb">
                     
                        <li><a href="{{get_dashboard()}}">Dashboard</a></li>

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
                                <th class="text-center">Holiday Name</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Month</th>
                                <th class="text-center">Day</th>
                                <th class="text-center">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($holidays as $holiday)
                            <tr>
                                <td class="text-center attributes-column">{{$holiday->holiday_name}}</td>
                                <td class="text-center attributes-column">{{date('jS F, Y', strtotime($holiday->holiday_date))}}</td>
                                <td class="text-center attributes-column">{{date('F', strtotime($holiday->holiday_date))}}</td>
                                <td class="text-center attributes-column">{{date('l', strtotime($holiday->holiday_date))}}</td>
                                <td class="text-center attributes-column">{{$holiday->holiday_type}}</td>
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
                 <div class="col-md-12 justify-content-start my-2">
                    {{$holidays->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


