@extends('layouts.master', ['title' => 'Anniversary Wish Log'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Marriage Anniversary Wish Log</h2>
                <div>
                    <ul class="breadcrumb">
                        <li> @if (auth()->user()->role->role_name == "hr")
                            <a href="{{route('hr_dashboard')}}">Dashboard</a>
                            @endif
                        </li>
                        <li>Marriage Anniversary Wish Log</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 py-2 mt-2">
                    <div class="col-auto ">
                        <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('anniversary-wish-log')}}" class="btn btn-primary mb-3">Reset</a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">SNO.</th>
                            <th class="text-center">Emp Code</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">DOM</th>
                            <th class="text-center">Message</th>
                            <th class="text-center">Wished On</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$log->emp_code}}</td>
                            <td>{{$log->emp_name}}</td>
                            <td>{{$log->emp_email}}</td>
                            <td>{{date('jS F, Y', strtotime($log->emp_dom))}}</td>
                            <td>{{$log->message}}</td>
                            <td><span class="badge alert-success">{{date('jS F, Y', strtotime($log->created_at))}}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="7">No Record Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center my-3">
                {{$logs->links()}}
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