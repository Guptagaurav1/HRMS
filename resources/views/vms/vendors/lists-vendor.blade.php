@extends('layouts.master', ['title' => 'Vendors'])



@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="text-white mt-2">Vendor List</h3>
                    <div>
                        <ul class="breadcrumb">
                            <li> @if (auth()->user()->role->role_name="hr")
                                <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                @endif
                            </li>
                            <li>Vendor List</li>
                        </ul>
                    </div>

                </div>
                <div class="text-end px-2 mt-3">
                   
                </div>
                <div class="col-md-12 d-flex justify-content-between flex-wrap px-3 mt-5">
                    <form class="row g-3 " method="get">
                        <div class="col-auto col-xs-12 mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control"
                                placeholder="Search" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3 ">Search </button>

                            
                        </div>
                        <div class="col-auto col-xs-12">
                        <a href="{{ route('vendors.index') }}" class="col-xs-12"><button type="button" class="btn btn-primary mb-3">Clear <i
                        class="fa-solid fa-eraser"></i></button></a>

                        </div>
                    </form>

                    <div class="col-auto  col-xs-12">
                    <a href="{{ route('vendors.create') }}" class="col-xs-12">
                        <button type="button" class="btn btn-primary mb-3 ">Add Vendor <i
                                class="fa-solid fa-plus"></i></button>
                    </a>

                    </div>
                </div>
                {{-- Show Messages --}}

                <svg xmlns="http://www.w3.org/2000/svg" class="d-none" fill="#fff">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>

                <div class="row">
                    @if (session()->has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24"
                                    role="img" aria-label="Success:">
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
                            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24"
                                    role="img" aria-label="Danger:">
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Sr No.</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Name/Email/Contact</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Recently Updated Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($vendors as $key => $vendor)
                                <tr>
                                    <td class="srno-column">{{ $loop->iteration }}</td>
                                    <td class="rid-column">{{ $vendor->user->role->role_name }}</td>
                                    <td>{{ $vendor->user->first_name }} {{ $vendor->user->last_name }} /
                                        {{ $vendor->user->email }} /
                                        {{ $vendor->user->phone }}</td>
                                    <td class="attributes-column">{{ date('jS F, Y', strtotime($vendor->created_at)) }}</td>
                                    <td>{{ date('jS F, Y', strtotime($vendor->updated_at)) }}</td>
                                    <td class="status-text">
                                        @if ($vendor->user->status == '1')
                                            {{ 'Active' }}
                                        @else
                                            {{ 'Inactive' }}
                                        @endif
                                    </td>
                                    <td>
                                        {{-- @if (auth()->user()->hasPermission('vendors.edit')) --}}
                                        <a href="{{ route('vendors.edit', $vendor->id) }}"><button
                                                class="btn btn-sm btn-primary" title="Edit">Edit <i
                                                    class="fa-solid fa-pen-to-square"></i></button></a>
                                        {{-- @endif --}}
                                        {{-- @if (auth()->user()->hasPermission('delete-user')) --}}
                                        <button class="btn btn-sm btn-danger delete" data-id="{{ $vendor->id }}"
                                            title="Delete">Delete <i class="fa-solid fa-trash"></i></button>
                                        {{-- @endif --}}

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center"><span class="text-danger">No Record Found</span>
                                    </td>
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
    <script src="{{asset('assets/js/vendor-list.js')}}"></script>
@endsection
