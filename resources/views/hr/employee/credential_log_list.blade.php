@extends('layouts.master', ['title' => 'Sent Credentials Logs'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Employee Credenial Log</h3>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="search" name="search" class="form-control" value="{{$search}}" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('employee.sent-credentials-logs')}}" class="btn btn-primary mb-3"> Reset</a>
                        </div>
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">ID.</th>
                                <th class="rid-column">Emp Code</th>
                                <th>Name</th>
                                <th class="attributes-column">Work Order</th>
                                <th>Email</th>
                                <th>Sent Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logs as $log)
                            <tr>
                                <td class="srno-column">{{$loop->iteration}}</td>
                                <td class="rid-column">{{$log->emp_code}}</td>
                                <td>{{$log->emp_name}}</td>
                                <td class="attributes-column">{{$log->emp_work_order}}</td>
                                <td>{{$log->emp_email}}</td>
                                <td>
                                    {{date('jS F, Y', strtotime($log->created_at))}}
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-danger" colspan="6">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

