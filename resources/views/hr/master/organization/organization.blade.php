@extends('layouts.master',['title' => 'Organization List'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Organization List</h3>
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
                        <li>Organization List</li>
                    </ul>
                </div>
            </div>

            <div class="row">
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

            <div class="row  mt-5 px-3">
                <div class="col-md-10">
                    <form method="get">
                        <div class="row">
                            <div class="col-auto col-xs-12">
                                <input type="text" name="search" value="{{ $search }}" class="form-control"
                                    placeholder="Search" required>

                            </div>
                            <div class="col-auto col-xs-12">
                                <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>

                            </div>
                            <div class="col-auto col-xs-12">
                                <a href="{{ route('organizations.index') }}" class="col-xs-12"><button type="button"
                                        class="btn btn-primary btn-sm mb-3">Clear <i
                                            class="fa-solid fa-eraser"></i></button></a>

                            </div>
                        </div>
                    </form>


                </div>
                <div class="col-md-2 ">
                    @if(auth()->user()->hasPermission('organizations.create'))

                    <a href="{{ route('organizations.create') }}" class="col-xs-12"><button type="button"
                            class="btn btn-primary btn-sm">Add Organization <i
                                class="fa-solid fa-plus"></i></button></a>

                    @endif

                </div>
            </div>

            @if($message = Session::get('success'))
            <div class="col-md-12">
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ $message }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            @if($message = Session::get('error'))
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        {{$message}}
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="table-responsive">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class='text-center'>Sr No.</th>
                                <th class="text-center">Organization Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($organizations as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center attributes-column">{{ ucwords($value->name) }}</td>
                                <td class="text-center attributes-column">{{ $value->email }}</td>
                                <td class="text-center">{{ $value->contact }}</td>
                                <td class="text-center attributes-column">{{ $value->address }}</td>
                                <td class="text-center">
                                    @if(auth()->user()->hasPermission('organizations.edit'))
                                    <a href="{{ route('organizations.edit',['organization' => $value->id ]) }}"><button
                                            type="button" class="btn btn-sm btn-primary">Edit <i
                                                class="fa-solid fa-pen-to-square"></i></button></a>
                                    @endif
                                    @if(auth()->user()->hasPermission('organizations.destroy'))
                                    <a class="delete-organization" data-id="{{ $value->id }}"><button type="button"
                                            class="btn btn-sm btn-primary">Delete <i
                                                class="fa-solid fa-trash"></i></button></a>
                                    @endif
                                    @if(auth()->user()->hasPermission('organizations.show'))
                                    <a href="javascript:void(0)" id="show-user"
                                        data-url="{{ route('organizations.show', $value->id) }}"><button type="button"
                                            class="btn btn-sm btn-primary">Show Details <i
                                                class="fa-solid fa-eye"></i></button></a>
                                    @endif

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6"><span class="text-danger">No Record Found</span></td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 my-2">
                    {{ $organizations->withQueryString()->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
@section('modal')

<!-- Modal -->
<div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="exampleModalLabel">Organization Detail</h5>
                <button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Name</label> <span id="name"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label> <span id="email"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact</label> <span id="contact"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State</label> <span id="state"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City</label> <span id="city"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">PSU</label> <span id="psu"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">PSU Name</label> <span id="psu_name"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Postal Code</label> <span id="postal_code"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date</label> <span id="date"></span>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Address</label> <span id="address"></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src={{asset('assets/js/masters/organization.js')}}></script>
@endsection