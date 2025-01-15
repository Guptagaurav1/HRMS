@extends('layouts.master', ['title' => 'Holidays'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Holiday List</h3>
            </div>
            <p class="px-3 mt-2">Your Holiday List
            </p>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3">
                    <div class="col-auto mb-3">
                        <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                        <a href="{{route('holiday-list')}}" class="btn btn-primary mb-3">Reset</a>
                    </div>
                </form>
            </div>
            
            <div class="table-responsive vh-100">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th>Holiday Name</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th>Day</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse($holidays as $holiday)
                            <tr>
                                <td>{{$holiday->holiday_name}}</td>
                                <td>{{date('d-M-Y', strtotime($holiday->holiday_date))}}</td>
                                <td>{{date('F', strtotime($holiday->holiday_date))}}</td>
                                <td>{{date('l', strtotime($holiday->holiday_date))}}</td>
                                <td class="text-center">{{$holiday->holiday_type}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="5">No Record Found</td>
                            </tr>
                            @endforelse
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

@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
@endsection
