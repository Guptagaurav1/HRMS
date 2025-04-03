@extends('layouts.master',['title' => 'Department Listing'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Department List</h3>
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
            <div class="row px-3 mt-2">
                @if($message = Session::get('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
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
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    {{ $message }}
                                </div>
                             
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                
            </div>


            <div class="col-md-12 d-flex align-items-cenetr justify-content-between px-2">
                <div class="">
                <form class="row g-3" method="get">
                    <div class="col-auto mb-3">
                        <input type="text" name="search" value="" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="{{ route('organizations.index') }}"><button type="button" class="btn btn-primary btn-sm mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                    </div>
                   
                </form>
                </div>

                @if(auth()->user()->hasPermission('departments.create'))
                <div class="">
                    <a href="{{ route('departments.create') }}"><button type="button" class="btn btn-sm btn-primary">Add Department <i class="fa-solid fa-plus"></i></button></a>
                </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
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
                            <td class="text-center">{{ $value->department }}</td>
                            <td class="text-center">
                                    <?php
                                    $skill = $value->skills->pluck('skill')->toArray();
                                    $unique = array_unique($skill);
                                    $skills1 = implode(', ',$unique);
                                ?>
                                    {{ $skills1 }}
                            </td>
                            <td class="text-center m-2 gap-2">
                                @if(auth()->user()->hasPermission('departments.edit'))
                                    <a href="{{ route('departments.edit', ['department' => $value->id ]) }}"><button class="btn btn-sm btn-primary">Edit  <i class="fa-solid fa-pen-to-square"></i></button></a>
                                @endif
                                @if(auth()->user()->hasPermission('departments.destroy'))
                                    <a class="delete-department" data-id="{{ $value->id }}"><button type="button" class="btn btn-sm btn-primary">Delete <i class="fa-solid fa-trash"></i></button></a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">
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
        </div>
    </div>
</div>
@endsection
@section('script')

<script src={{asset('assets/js/masters/department.js')}}></script>

@endsection
