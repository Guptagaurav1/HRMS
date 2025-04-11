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
                            @if (auth()->user()->role->role_name="hr")
                                <a href="{{route('hr_dashboard')}}">Dashboard</a>
                            @endif
                        </li>
                        <li>Organization List</li>
                    </ul>
                </div>
            </div>
           
           
            <div class="col-md-12 d-flex align-items-cenetr justify-content-between px-2 mt-4">
                <div class="mt-3">
                <form class="row g-3" method="get">
                    <div class="col-auto mb-3">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="{{ route('organizations.index') }}"><button type="button" class="btn btn-primary btn-sm mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                    </div>

                </form>
                </div>

                @if(auth()->user()->hasPermission('organizations.create'))
                <div class="">
                    <a href="{{ route('organizations.create') }}" class="mt-3"><button type="button" class="btn btn-primary btn-sm">Add Organization <i class="fa-solid fa-plus"></i></button></a>
                </div>
                @endif
            </div>

            @if($message = Session::get('success'))
            <div class="col-md-12">
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                     <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
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
                    <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                        {{$message}}
                    </div>
                 
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            <div class="table-responsive">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
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
                                <td class="text-center attributes-column">{{ ucwords($value->name)  }}</td>
                                <td class="text-center attributes-column">{{ $value->email }}</td>
                                <td class="text-center">{{ $value->contact }}</td>
                                <td class="text-center attributes-column">{{ $value->address }}</td>
                                <td class="text-center">
                                    @if(auth()->user()->hasPermission('organizations.edit'))
                                    <a href="{{ route('organizations.edit',['organization' => $value->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                    @endif
                                    @if(auth()->user()->hasPermission('organizations.destroy'))
                                    <a class="delete-organization" data-id="{{ $value->id }}"><button type="button" class="btn btn-sm btn-primary">Delete <i class="fa-solid fa-trash"></i></button></a>
                                    @endif
                                    @if(auth()->user()->hasPermission('organizations.show'))
                                    <a href="javascript:void(0)" id="show-user" data-url="{{ route('organizations.show', $value->id) }}"><button type="button" class="btn btn-sm btn-primary">Show Details <i class="fa-solid fa-eye"></i></button></a>
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
