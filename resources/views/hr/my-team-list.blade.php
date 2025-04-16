@extends('layouts.master', ['title' => 'My Team'])

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">My Team User List ( You Are <span class="text-uppercase">{{auth()->user()->role->role_name}}</span> Head )</h3>
                <div>
                    <ul class="breadcrumb">
                        <li> @if (auth()->user()->role->role_name="hr")
                            <a href="{{route('hr_dashboard')}}">Dashboard</a>
                            @endif
                        </li>
                        <li>My Team User List</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-12 ">
                <form class="row g-3 mt-5 px-3" method="get">
                    <div class="col-auto col-xs-12 mb-3">
                        <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto col-xs-12 mb-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                       
                    </div>
                    <div class="col-auto col-xs-12">
                    <a href="{{route('my-team-list')}}" class="btn btn-primary">Clear</a>

                    </div>
                </form>
            </div>
            
            <div class="table-responsive mt-2">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email / Contact</th>
                                <th class="text-center">Department</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                            <tr>
                                <td class="text-center">{{$employee->emp_name}}</td>
                                <td class="text-center attributes-column">{{$employee->emp_email_first."/".$employee->emp_phone_first}}</td>
                                <td class="text-center">{{$employee->department}}</td>
                                <td class="text-center">{{$employee->user_type}}</td>
                                <td class="text-center">{{date('d-M-Y', strtotime($employee->adding_date))}}</td>
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
            <div class="col-md-12 my-2 d-flex justify-content-start">
                {{$employees->links()}}
            </div>
        </div>
    </div>
</div>
@endsection


