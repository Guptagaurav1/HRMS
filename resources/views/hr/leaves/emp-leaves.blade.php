@extends('layouts.master', ['title' => 'Employee Leaves'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Employee Leave List</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                            <li>Employee Leave List</li>
                        </ul>
                    </div>
                </div>


                <div class="row  mt-4 px-4">
                        <div class="col-md-10">
                            <form method="get">
                                <div class="row">
                                    <div class="col-auto col-xs-12">
                                    <input type="search" name="search" value="{{$search}}" class="form-control"
                                            placeholder="Search" required>

                                    </div>
                                    <div class="col-auto col-xs-12">
                                        <button type="submit" class="btn  btn-primary  mb-3">Search <i
                                                class="fa-solid fa-magnifying-glass"></i></button>

                                    </div>
                                    <div class="col-auto col-xs-12">
                                        <a href="{{ route('emp-leaves')}}" class="col-xs-12"><button
                                                type="button" class="btn btn-primary  mb-3">Clear <i
                                                    class="fa-solid fa-eraser"></i></button></a>

                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
               
             

                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                @if (session()->has('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                            role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('message') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="table-responsive py-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">S No.</th>
                                <th class="text-center">Employee Code</th>
                                <th class="text-center">Month</th>
                                <th class="text-center">Alloted CLs</th>
                                <th class="text-center">Alloted PLs</th>
                                <th class="text-center">Carry Forwared CL</th>
                                <th class="text-center">Carry Forwared PL</th>
                                <th class="text-center">Leave Taken</th>
                                <th class="text-center">Balance Leaves</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data)
                                @php
                                    $sno = 1;
                                    $total_leave_taken = [];
                                    $balance_leave = '';
                                @endphp
                                @forelse($data as $key => $record)
                                    @php
                                       $total_leave_taken[] = $record->leave_taken;
                                       $balance_leave =  ($record->casual_leave + $record->privilege_leave + $record->carry_forward_cl + $record->carry_forward_pl) - $record->leave_taken;
                                    @endphp
                                    <tr class="group">
                                        <td class="text-center attributes-column"> {{ $key + 1 }}</td>
                                        <td class="text-center attributes-column"> {{ $record->emp_code }}</td>
                                        <td class="text-center attributes-column">{{$record->month->month}}</td>
                                        <td class="text-center attributes-column">{{ $record->casual_leave }}</td>
                                        <td class=" text-center attributes-column"> {{ $record->privilege_leave }}</td>
                                        <td class="text-center attributes-column">{{ $record->carry_forward_cl }}</td>
                                        <td class="text-center attributes-column">{{ $record->carry_forward_pl }}</td>
                                        <td class="text-center attributes-column">{{ $record->leave_taken }}</td>
                                        <td class="text-center attributes-column">
                                            {{ $record->casual_leave + $record->privilege_leave + $record->carry_forward_cl + $record->carry_forward_pl - $record->leave_taken }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-danger" colspan="9">No Record Found</td>
                                    </tr>
                                @endforelse
                           
                                @if (auth('employee')->check())
                                <tbody class="my-2">
                                    <tr>
                                        <td colspan="5" class="text-center"><strong>Total Leave Taken</strong></td>
                                        <td colspan="4" class="text-center"><strong>{{array_sum($total_leave_taken)}}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-center"><strong>Balance Leave</strong></td>
                                        <td colspan="4" class="text-center"><strong>{{$balance_leave}}</strong></td>
                                    </tr>
                                </tbody>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12 my-3 py-3">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
