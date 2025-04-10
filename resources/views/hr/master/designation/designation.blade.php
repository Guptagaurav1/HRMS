@extends('layouts.master',['title' => 'Designation List'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Designation Lists</h3>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Profile Details</a></li>
                        <li>Italy</li>
                    </ul>
                </div>

            </div>

            <div class="col-md-12 d-flex align-items-cenetr justify-content-between mt-4 px-3">
                <div class="">
                    <form class="row g-3" method="get">
                        <div class="col-auto mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search"
                                required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                            <a href="{{ route('designations.index') }}"><button type="button"
                                    class="btn btn-primary btn-sm mb-3">Clear <i
                                        class="fa-solid fa-eraser"></i></button></a>
                        </div>

                    </form>
                </div>

                @if(auth()->user()->hasPermission('designations.create'))
                <div class="">
                    <a href="{{ route('designations.create') }}"><button type="button" class="btn btn-primary mb-3">Add
                            Designation <i class="fa-solid fa-plus"></i></button></a>
                </div>
                @endif
            </div>

            @if($message = Session::get('success'))
            <div class="col-md-12 ">
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
                                <th class="text-center">Sr No.</th>
                                <th class="text-center">Designation Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($designations as $key => $value)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ ucwords($value->name) }}</td>
                                <td class="text-center">
                                    @if(auth()->user()->hasPermission('designations.edit'))
                                    <a href="{{ route('designations.edit',['designation' => $value->id ]) }}"><button
                                            type="button" class="btn btn-sm btn-primary">Edit <i
                                                class="fa-solid fa-pen-to-square"></i></button></a>
                                    @endif
                                    @if(auth()->user()->hasPermission('designations.destroy'))
                                    <a class="delete-designation" data-id="{{ $value->id }}"><button type="button"
                                            class="btn btn-sm btn-primary">Delete <i
                                                class="fa-solid fa-trash"></i></button></a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center"><span class="text-danger">No Record Found</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $designations->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src={{asset('assets/js/masters/designation.js')}}></script>
@endsection