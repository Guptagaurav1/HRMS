@extends('layouts.master', ['title' => 'My Team'])

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
                <h3 class="mt-2">My Team User List ( You Are {{auth()->user()->role->role_name}} Head )</h3>
            </div>
            <p class="px-3 mt-2">Your Team User Listed Below
            </p>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3" method="get">
                    <div class="col-auto mb-3">
                        <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto mb-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{route('my-team-list')}}" class="btn btn-primary">Reset</a>
                    </div>
                </form>
            </div>
            
            <div class="table-responsive">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email / Contact</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                            <tr>
                                <td>{{$employee->emp_name}}</td>
                                <td>{{$employee->emp_email_first."/".$employee->emp_phone_first}}</td>
                                <td>{{$employee->department}}</td>
                                <td>{{$employee->user_type}}</td>
                                <td>{{date('d-M-Y', strtotime($employee->adding_date))}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="5">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 my-2 d-flex justify-content-center">
                {{$employees->links()}}
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
