@extends('layouts.master')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Skills List</h2>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Profile Details</a></li>
                        <li>Department List</li>
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
            <div class="row">

                <div class="col-md-12 d-flex align-items-cenetr justify-content-between px-3 mt-5">
                    <div class="">
                        <form class="row g-3" method="get">
                            <div class="col-auto mb-3">
                                <input type="text" name="search" value="" class="form-control" placeholder="Search"
                                    required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="{{ route('organizations.index') }}"><button type="button"
                                        class="btn btn-primary btn-sm mb-3">Clear <i
                                            class="fa-solid fa-eraser"></i></button></a>
                            </div>

                        </form>
                    </div>

                    <div class="">
                        <a href="{{ route('skills.create') }}"><button type="button" class="btn btn-sm btn-primary">Add
                                Skills <i class="fa-solid fa-plus"></i></button></a>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                    @if($message = Session::get('success'))
                    <div class="col-md-12 mt-2">
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
                {{-- </div> --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">Sr No.</th>
                                <th class="text-center">Skills</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($skills as $skill1)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class='text-center'>
                                    {{ ucwords($skill1->skill) }}
                                </td>
                                <td class="text-center">
                                    @if(auth()->user()->hasPermission('skills.edit'))
                                    <a href="{{ route('skills.edit',['skill' => $skill1->id ]) }}"><button type="button"
                                            class="btn btn-sm btn-primary">Edit <i
                                                class="fa-solid fa-pen-to-square"></i></button></a>
                                    @endif
                                    @if(auth()->user()->hasPermission('skills.destroy'))
                                    <a class="delete-skill" data-id="{{ $skill1->id }}"><button type="button"
                                            class="btn btn-sm btn-primary">Delete <i
                                                class="fa-solid fa-trash"></i></button></a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-danger text-center" colspan="4">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="col-md-12 d-flex justify-content-start my-4">
                        {{$skills->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script src={{asset('assets/js/masters/skill.js')}}></script>
@endsection