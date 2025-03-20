




@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Attendance List</h2>
            </div>
            <div class="row px-3 mt-2">
                    @if($message = Session::get('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                            {{ $message }}
                            </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    @if($message = Session::get('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                {{$message}}
                            </div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form method="get" class="row g-3 py-2 mt-2">
                    <div class="col-auto ">
                        <input type="text" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                        <a href="{{ route('attendance-list') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th>Employee Code</th>
                            <th>Emp Name</th>
                            <th>Month Year (Days in Month)</th>
                            <th>Work Order</th>
                            <th>Marked as Absent</th>
                            <th>Working Days</th>
                            <th>Approved Leave</th>
                            <th>LWOP Leave</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         @forelse($wo_attendances as $key => $wo_attendance)
                        <tr>
                            <td>{{$wo_attendance->empDetail->emp_code??NULL}}</td>
                            <td>{{$wo_attendance->empDetail->emp_name??NULL}}</td>
                            <td>{{$wo_attendance->attendance_m_y??NULL}}</td>
                            <td>{{$wo_attendance->wo_number??NULL}}</td>
                            <td>{{$wo_attendance->gap_in_service??NULL}}</td>
                            <td>{{$wo_attendance->working_days??NULL}}</td>
                            <td>{{$wo_attendance->approve_leave??NULL}}</td>
                            <td>{{$wo_attendance->lwp_leave??NULL}}</td>
                            <td>{{$wo_attendance->empDetail->emp_designation??NULL}}</td>
                            <td>
                                <a href="{{route('edit-attendance',$wo_attendance->id)}}"><button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center"><span class="text-danger">No Record Found</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$wo_attendances->links()}}
            </div>
            
        </div>
    </div>
</div>
@endsection

