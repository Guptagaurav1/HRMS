@extends('layouts.master', ['title' => 'Salary Slip'])

@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center" >Salary Slip</h3>
                    <div>
                        <ul class="breadcrumb">
                            <li> @if (auth()->user()->role->role_name="hr")
                                <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                @endif
                            </li>
                            <li>Salary Slip</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start flex-wrap mx-3 mt-4">
                    <form class="row g-3 mt-2">
                        <div class="col-auto col-xs-12">
                            <input type="search" class="form-control" name="search" value="{{$search}}" placeholder="Search" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-auto col-xs-12">
                            <a href="{{route('salary-slip')}}" class="btn btn-primary mb-3">Clear</a>
                        </div>
                    </form>
                    <form action="{{route('export_csv')}}" class="row g-3 mt-2 mx-1" method="post">
                        @csrf
                        <div class="col-auto col-xs-12">
                           <input type="hidden" name="search" value="{{$search}}">
                           <button type="submit" class="btn btn-primary mb-3 col-xs-12"> CSV</button>
                        </div>
                    </form>

                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                    </svg>
                </div>
                 @if(session()->has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                  {{session()->get('message')}}
                                </div>
                             
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                  {{session()->get('message')}}
                                </div>
                             
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column text-center">S.No.</th>
                                <th class="rid-column text-center">Employee Code</th>
                                <th class="text-center">Employee Name</th>
                                <th class="attributes-column text-center">Month Year</th>
                                <th class="text-center">Working Days</th>
                                <th class="text-center">Designation</th>
                                <th class="text-center">Wo Number</th>
                                <th class="text-center">CTC(Per Month)</th>
                                <th class="text-center">Gross Pay</th>
                                <th class="text-center">Net Pay</th>
                                <th class="text-center">Basic Pay</th>
                                <th class="text-center">Working Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse($slips as $slip)
                            <tr>
                                <td class="srno-column text-center">{{$loop->iteration}}</td>
                                <td class="rid-column text-center"><a href="{{route('employee-details-salary-retainer', ['salaryid' => $slip->emp_salary_id])}}" class="text-primary">{{$slip->sal_emp_code}}</a></td>
                                <td class="text-center">{{$slip->sal_emp_name}}</td>
                                <td class="attributes-column text-center">{{$slip->sal_month}}</td>
                                <td class="text-center">{{$slip->sal_working_days}}</td>
                                <td class="text-center">{{$slip->sal_designation}}</td>
                                <td class="text-center">{{$slip->work_order}}</td>
                                <td class="text-center">{{$slip->emp_sal_ctc}}</td>
                                <td class="text-center">{{$slip->sal_gross}}</td>
                                <td class="text-center">{{$slip->sal_net}}</td>
                                <td class="text-center">{{$slip->sal_basic}}</td>
                                <td class="text-center">
                                    @if($slip->status)
                                    <span class="badge text-bg-success">Active</span>
                                    @else
                                    <span class="badge text-bg-danger">In-Active</span>
                                    @endif
                                </td>
                                <td class="text-center">
    
                                    <a href="{{route('salary-slip-edit', ['id' => $slip->emp_salary_id])}}"><button class="btn btn-sm btn-primary" >Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="{{route('preview-salary-slip', ['id' => $slip->emp_salary_id])}}"><button class="btn btn-sm btn-primary">View <i class="fa-solid fa-eye"></i></button></a>
                                </td>
                            </tr>
                             @empty
                            <tr>
                                <td class="text-danger text-center" colspan="14">No Record Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                 <div class="col-md-12 d-flex justify-content-start my-2">
                    {{$slips->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

