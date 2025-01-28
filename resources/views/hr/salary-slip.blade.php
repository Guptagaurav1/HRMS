@extends('layouts.master', ['title' => 'Salary Slip'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection
@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header  heading-stripe">
                    <h3 class="mt-2 text-center" >Salary Slip
                        
                    </h3>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="search" class="form-control" name="search" value="{{$search}}" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('salary-slip')}}" class="btn btn-primary mb-3">Reset</a>
                        </div>
                    </form>
                    <form action="{{route('export-salary')}}" class="row g-3 mt-2 mx-1" method="post">
                        @csrf
                        <div class="col-auto">
                           <input type="hidden" name="search" value="{{$search}}">
                           <button type="submit" class="btn btn-primary mb-3"> CSV</button>
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
                <div class="table-responsive mt-3 ">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column">Employee Code</th>
                                <th>Employee Name</th>
                                <th class="attributes-column">Month Year</th>
                                <th>Working Days</th>
                                <th>Designation</th>
                                <th>Wo Number</th>
                                <th>CTC(Per Month)</th>
                                <th>Gross Pay</th>
                                <th>Net Pay</th>
                                <th>Basic Pay</th>
                                <th>Working Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse($slips as $slip)
                            <tr>
                                <td class="srno-column">{{$loop->iteration}}</td>
                                <td class="rid-column"><a href="{{route('employee-details-salary-retainer', ['salaryid' => $slip->emp_salary_id])}}" class="text-primary">{{$slip->sal_emp_code}}</a></td>
                                <td>{{$slip->sal_emp_name}}</td>
                                <td class="attributes-column">{{$slip->sal_month}}</td>
                                <td>{{$slip->sal_working_days}}</td>
                                <td>{{$slip->sal_designation}}</td>
                                <td>{{$slip->work_order}}</td>
                                <td>{{$slip->emp_sal_ctc}}</td>
                                <td>{{$slip->sal_gross}}</td>
                                <td>{{$slip->sal_net}}</td>
                                <td>{{$slip->sal_basic}}</td>
                                <td>
                                    @if($slip->status)
                                    <span class="badge text-bg-success">Active</span>
                                    @else
                                    <span class="badge text-bg-danger">In-Active</span>
                                    @endif
                                </td>
                                <td>
    
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
                 <div class="col-md-12 d-flex justify-content-center my-2">
                    {{$slips->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

