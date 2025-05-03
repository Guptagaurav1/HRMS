@extends('layouts.master', ['title' => 'Upcoming Marriage Anniversary'])



@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            {{-- Heading --}}
            <div class="panel-header">
                <h4>UPCOMING 15 DAYS MARRIAGE ANNIVERSARY LIST</h4>
                <div>
                    <ul class="breadcrumb">
                        <li> 
                            @if (auth()->user()->role->role_name == "hr")
                            <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "hr_operations")
                                <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "sales_manager")
                                <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                            @else
                            @endif
                        </li>
                        <li>MARRIAGE ANNIVERSARY LIST</li>
                    </ul>
                </div>
            </div>

            {{-- Filters --}}
            <div class="col-md-12 d-flex justify-content-start mx-3 mt-3">
                <form class="row g-3 mt-3">
                    <div class="col-auto mb-3 col-xs-12">
                        <input type="search" name="search" class="form-control" placeholder="Search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto col-xs-12">
                        <button type="submit" class="btn  btn-primary mb-3 px-2">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="col-auto col-xs-12">
                        <a href="{{route('events.marriage-anniversary-list')}}" class="btn  btn-primary mb-3 col-xs-12">Clear</a>
                    </div>
                </form>
            </div>


            


            

            {{-- Show errors --}}
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>

            @if (session()->has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
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

            {{-- Table --}}
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="srno-column">S.No.</th>
                            <th class="rid-column">EMP Code</th>
                            <th>Work Order</th>
                            <th class="attributes-column">Name</th>
                            <th>Email</th>
                            <th>Date of Marriage</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($employees as $employee)
                        <tr>
                            <td class="srno-column">{{ $loop->iteration }}</td>
                            <td class="rid-column">{{ $employee->emp_code }}</td>
                            <td>{{ $employee->emp_work_order }}</td>
                            <td class="attributes-column">{{ $employee->emp_name }}</td>
                            <td>{{ $employee->emp_email_first }}</td>
                            <td>{{ date('jS F, Y', strtotime($employee->getPersonalDetail->emp_dom)) }}</td>
                            <td><img class="img-fluid border rounded"
                                    src="{{ asset('recruitment/candidate_documents/passport_size_photo') . '/' . $employee->getPersonalDetail->emp_photo }}"
                                    alt="no-photo" width="100" height="100"></td>
                            <td>
                                <a
                                    href="{{ route('events.marriage-anniversary-template', ['emp_code' => $employee->emp_code]) }}"><button
                                        class="btn btn-sm btn-primary">View Template Image</button></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-danger">No data found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="col-md-12 my-2 d-flex justify-content-center">
                {{$employees->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

