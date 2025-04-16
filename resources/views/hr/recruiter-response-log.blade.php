@extends('layouts.master', ['title' => 'Recruiter Response Log'])



@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Recruiter Detail Change Response Log</h2>
                <div>
                    <ul class="breadcrumb">
                        <li> @if (auth()->user()->role->role_name="hr")
                            <a href="{{route('hr_dashboard')}}">Dashboard</a>
                            @endif
                        </li>
                        <li>Recruiter Detail Log</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 py-2 mt-2">
                    <div class="col-auto ">
                        <input type="search" class="form-control" name="search" value="{{$search}}" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                     <div class="col-auto">
                        <a href="{{route('recruiter-response-log')}}" class="btn btn-primary mb-3">Reset</a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Request ID</th>
                            <th class="text-center">Recruiter Name</th>
                            <th class="text-center">Change Request for</th>
                            <th class="text-center">Job Position</th>
                            <th class="text-center">Changes Detail</th>
                            <th class="text-center">Send By</th>
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
                            <td class="text-center">{{$log->req_id}}</td>
                            <td class="text-center">{{$log->user->first_name." ".$log->user->last_name}}</td>
                            <td class="text-center">{{$log->query_type}}</td>
                            <td class="text-center">{{$log->job_position}}</td>
                            <td class="text-center">{{$log->description}}</td>
                            <td class="text-center">{{$log->user->email}}</td>
                            <td class="text-center">{{date('jS F, Y', strtotime($log->time))}}</td>
                            <td class="text-center"><span class="badge text-bg-{{$color}}">{{$log->status}}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="8">No Record Found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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