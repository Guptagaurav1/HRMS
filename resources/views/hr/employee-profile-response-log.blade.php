@extends('layouts.master', ['title' => 'Employee Profile Response Log'])

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Employee Profile Response Log</h2>

                <div>
                    <ul class="breadcrumb">
                      
                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Employee Profile Response Log</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 py-2 mt-2">
                    <div class="col-auto ">
                        <input type="search" class="form-control" name="search" value="{{$search}}" placeholder="Search"
                            required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('employee-profile-response-log')}}" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Request ID</th>
                            <th class="text-center">Emp Code</th>
                            <th class="text-center">Change Request for</th>
                            <th class="text-center">Changes Detail</th>
                            <th class="text-center">Handled By</th>
                            <th class="text-center">Responded On</th>
                            <th class="text-center">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                        @php
                        if($log->status == 'open'){
                        $color = 'primary';
                        }
                        elseif($log->status == 'completed'){
                        $color = 'success';
                        }
                        else {
                        $color = 'danger';
                        }
                        @endphp

                        <tr>
                            <td>{{$log->req_id}}</td>
                            <td>{{$log->emp_code}}</td>
                            <td>{{$log->changedColumn->name}}</td>
                            <td>{{$log->description}}</td>
                            <td>{{$log->send_by}}</td>
                            <td>{{date('jS F, Y', strtotime($log->time))}}</td>
                            <td><span class="badge text-bg-{{$color}}">{{$log->status}}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="7">No Record Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection