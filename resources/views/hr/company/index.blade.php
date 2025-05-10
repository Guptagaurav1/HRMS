@extends('layouts.master', ['title' => 'Companies'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Company List</h2>
                <div>
                    <ul class="breadcrumb">
                                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Company List</li>
                    </ul>
                </div>
            </div>

            <div>
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
            </div>
            <div class="table-filter-option">
                <div class="row g-3">
                    <div class="row px-3 mt-5">
                        <div class="col-md-10">
                            <form method="get">
                                <div class="row">
                                    <div class="col-auto col-xs-12">
                                        <input type="search" class="form-control" placeholder="Search" name="search"
                                            value="{{ $search }}" required>

                                    </div>
                                    <div class="col-auto col-xs-12">
                                        <button type="submit" class="btn  btn-primary  mb-3">Search </button>

                                    </div>
                                    <div class="col-auto col-xs-12">
                                        <a href="{{ route('company.list') }}" class="btn btn-primary  mb-3">Clear
                                            <i class="fa-solid fa-eraser"></i> </a>

                                    </div>
                                </div>


                               
                        </div>

                        <div class="col-auto col-xs-12">
                            <a href="{{ route('company.create') }}" class="col-xs-12 mx-md-2"><button
                                    type="button" class="btn  btn-primary">Add Company
                                    <i class="fa-solid fa-plus"></i></button></a>

                        </div>

                    </div>
                </div>

                  <!-- Success Message -->
                @if($message = Session::get('success'))
                <div class="col-md-12 mt-3">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                      <div> {{ session()->get('message') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                <!-- Error Message -->
                @if($message = Session::get('error'))
                <div class="col-md-12 mt-3">
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                       <div> {{ session()->get('message') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

            </div>

            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Company Name</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Registration No.</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($companies as $company)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center attributes-column">{{ $company->name }}</td>
                            <td class="text-center">{{ $company->mobile }}</td>
                            <td class="text-center">{{ $company->email }}</td>
                            <td class="text-center attributes-column">{{ $company->address }}</td>
                            <td class="text-center">{{ $company->registration_no }}</td>
                            <td class="text-center"><a href="{{ route('company.view', ['id' => $company->id]) }}"
                                    class="btn btn-primary text-light text-decoration-none">View</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="14" class="text-center text-danger">No Record Found.</td>
                        </tr>
                        @endempty
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="col-md-12 d-flex justify-content-start my-2">
                {{ $companies->links() }}
            </div>

        </div>
    </div>
</div>
@endsection