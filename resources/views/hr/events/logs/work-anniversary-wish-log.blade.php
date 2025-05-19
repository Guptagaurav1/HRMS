@extends('layouts.master', ['title' => 'Work Anniversary Wish Log'])



@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Work Anniversary Wish Log</h2>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Work Anniversary Wish Log</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 py-2 mt-2">
                    <div class="col-auto ">
                        <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('work-anniversary-wish-log')}}" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">SNO.</th>
                            <th class="text-center">Emp Code</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">DOJ</th>
                            <th class="text-center">Completed Years</th>
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
                            <td>{{date('jS F, Y', strtotime($log->emp_doj))}}</td>
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


