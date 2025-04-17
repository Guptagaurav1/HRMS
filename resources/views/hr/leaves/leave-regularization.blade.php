@extends('layouts.master', ['title' => 'Leave Regularization'])

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Leave Regularization List</h2>
                <div>
                    <ul class="breadcrumb">
                        <li>
                        @if (auth('employee')->check())
                            <a href="{{route('employee.dashboard')}}">Dashboard</a>
                        @elseif (auth()->check())
                            @if (auth()->user()->role->role_name="hr")
                            <a href="{{route('hr_dashboard')}}">Dashboard</a>
                            @endif
                        @endif
                    
                        </li>
                        <li>Leave Regularization List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 text-center py-3">
            <form class="month">
                <label>Select Month :</label><br>
                <input name="month" class="date-picker" placeholder="mm-year" value="{{$previous_month}}" required />
                <button type="submit" class="btn btn-primary">Check</button>
            </form>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 mt-2">
                    <div class="col-auto mb-3">
                        <input type="search" class="form-control" name="search" value="{{$search}}" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                     <div class="col-auto">
                        <a href="{{route('leave-regularization')}}" class="btn btn-primary mb-3">Clear</a>
                    </div>
                </form>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <symbol id="check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </symbol>
            </svg>
            @if(session()->has('error'))
            <div class="col-md-12">
            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                    {{session()->get('message')}}
                </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Emp Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Contact Details</th>
                            <th class="text-center">Leave Dates</th>
                            <th class="text-center">Send Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $record)
                        <tr class="group">
                            <td class="text-center">
                                <a href="{{ route('employee-details', ['empid' => $record->id]) }}"
                                    class="text-primary">{{$record->emp_code}}</a>
                            </td>
                            <td class="text-center">{{$record->emp_name}}</td>
                            <td class="text-center">{{$record->emp_designation}}</td>
                            <td class="attributes-column">
                               {{$record->emp_phone_first."/".$record->emp_email_first}}
                            </td>
                            <td class="text-center">
                                <div class="mbsc-form-group">
                                    <input type="text" name="leave_dates"
                                        class="btn btn-sm btn-primary multiDatePicker text-light" style="color: white;" placeholder="Select Date" autocomplete="off" value="">
                                    <div class="d-none">
                                    <input type="hidden" class="emp_id" value="{{$record->emp_code}}" />
                                    <input type="hidden" class="current_month" value="{{$previous_month}}" />
                                    </div>
                                </div>

                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-primary send_mail">Send Mail</button>
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

            <div class="col-md-12 d-flex justify-content-center my-3 py-3">
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
@endsection