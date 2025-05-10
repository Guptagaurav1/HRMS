@extends('layouts.master',['title' => 'Department Listing'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Department List</h3>

                <!-- Breadcrumb Start -->

                <div>
                    <ul class="breadcrumb">
                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
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

            <!-- Form Search and button -->
            <div class="row mt-4 px-3">
                <div class="col-md-12">
                    <form method="get">
                        <div class="row align-items-end g-2">
                            <!-- Search Field -->
                            <div class="col-md-auto">
                                <input type="text" name="search" value="{{ $search }}" class="form-control"
                                    placeholder="Search" required>
                            </div>

                            <!-- Search Button -->
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-primary">
                                    Search <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>

                            <!-- Clear Button -->
                            <div class="col-md-auto">
                                <a href="{{ route('departments.index') }}" class="btn btn-primary">
                                    Clear <i class="fa-solid fa-eraser"></i>
                                </a>
                            </div>

                            <!-- Add Department Button -->
                            @if(auth()->user()->hasPermission('departments.create'))
                            <div class="col-md-auto ms-auto">
                                <a href="{{ route('departments.create') }}" class="btn btn-primary">
                                    Add Department <i class="fa-solid fa-plus"></i>
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>

                <!-- Success Message -->
                @if($message = Session::get('success'))
                <div class="col-md-12 mt-3">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>{{ $message }}</div>
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
                        <div>{{ $message }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
            </div>
            <!-- Table Start -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Sr No.</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Skills</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($departments as $key => $value)
                        <tr>
                            <td class="text-center">
                                {{$loop->iteration}}
                            </td>
                            <td class="text-center attributes-column">{{ $value->department }}</td>
                            <td class="text-center attributes-column">
                                <?php
                                    $skill = $value->skills->pluck('skill')->toArray();
                                    $unique = array_unique($skill);
                                    $skills1 = implode(', ',$unique);
                                ?>
                                {{ $skills1 }}
                            </td>
                            <td class="text-center ">
                                @if(auth()->user()->hasPermission('departments.edit'))
                                <a href="{{ route('departments.edit', ['department' => $value->id ]) }}"><button
                                        class="btn btn-sm btn-primary">Edit <i
                                            class="fa-solid fa-pen-to-square"></i></button></a>
                                @endif
                                @if(auth()->user()->hasPermission('departments.destroy'))
                                <a class="delete-department" data-id="{{ $value->id }}"><button type="button"
                                        class="btn btn-sm btn-danger">Delete <i
                                            class="fa-solid fa-trash"></i></button></a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <span class="text-danger">Record not found</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="table-bottom-control">
                    {{ $departments->links() }}
                </div>
            </div>

            <!-- Table End -->
        </div>
    </div>
</div>
@endsection
@section('script')
<script src={{asset('assets/js/masters/department.js')}}></script>
@endsection