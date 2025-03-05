@extends('layouts.master', ['title' => 'Request List'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center">User Change Request Log</h3>
                </div>
                <div class="col-md-12 mx-3">
                    <div class="row my-2 mx-3">
                        <div class="col-md-6">
                            <form class="row g-3">
                                <div class="col-auto">
                                    <input type="search" class="form-control" name="search" placeholder="Search" value="{{$search}}" required>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                                <div class="col-auto">
                                    <a href="{{route('user-request-list')}}" class="btn btn-primary mb-3"> Reset</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 text-end"> 
                            <a href="{{route('jd-request')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column text-center" >Request ID</th>
                                <th class="rid-column text-center">Change Request For</th>
                                <th class="text-center">Job Position</th>
                                <th class="attributes-column text-center">Changes Detail</th>
                                <th class="text-center">Requested On</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                            @php
                                if($log->status == 'open'){
                                    $color = 'info';
                                }
                                elseif($log->status == 'completed'){
                                    $color = 'success';
                                }
                                else {
                                    $color = 'danger';
                                }
                            @endphp
                            <tr>
                                <td class="srno-column text-center">{{$log->req_id}}</td>
                                <td class="rid-column text-center">{{$log->query_type}}</td>
                                <td class="text-center">{{get_position_title($log->job_position)}}</td>
                                <td class="attributes-column text-center">{{$log->description}}</td>
                                <td class="text-center">{{date('jS F, Y', strtotime($log->created_at))}}</td>
                                <td class="text-center text-{{$color}} text-capitalize">{{$log->status}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="6">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 my-2 d-flex justify-content-center">
                    {{$logs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection



