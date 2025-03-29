@extends('layouts.master', ['title' => 'Companies'])

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Company List</h2>
                    <div class="text-start">
                    <a href="{{ route('hr_dashboard') }}">
                        <div class="back-button-box">
                            <button type="button" class="btn btn-back">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </div>
                    </a>
                </div>
                </div>
                
                <div class="panel-body">
                    <div class="table-filter-option">
                        <div class="row g-3">
                            <div class="col-xl-10 col-9 col-xs-12">
                                <div class="col-md-12 d-flex justify-content-start">
                                    <form class="row g-3">
                                        <div class="col-auto">
                                            <input type="search" class="form-control" placeholder="Search" name="search"
                                                value="{{ $search }}" required>
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary mb-3"> Search <i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ route('company.list') }}"
                                                class="btn btn-primary mb-3">Reset <i class="fa-solid fa-rotate-left"></i></a>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                            <div class="col-xl-2 col-3 text-end">
                                <a href="{{route('company.create')}}" class="btn btn-primary">Add Company</a>
                            </div>
                        </div>
                    </div>

                    {{-- SVG images and Notifications --}}
                    <div class="row ">
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

                        @if (session()->has('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                                    role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                        aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

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

                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Company Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Registration No.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($companies as $company)
                                   <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->mobile}}</td>
                                    <td>{{$company->email}}</td>
                                    <td>{{$company->address}}</td>
                                    <td>{{$company->registration_no}}</td>
                                    <td>View</td>
                                   </tr>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">No Record Found.</td>
                                    </tr>
                                @endempty
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="col-md-12 d-flex justify-content-center my-2">
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

