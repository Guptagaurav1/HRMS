@extends('layouts.master',['title' => 'Department Listing'])
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Department</h3>
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

                <div class="text-end">
                    <a href="{{ route('departments.create') }}"><button type="button" class="btn btn-sm btn-primary">Add Department</button></a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Department</th>
                            <th>Skills</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($departments as $key => $value)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>{{ $value->department }}</td>
                            <td>
                                    <?php
                                    $skill = $value->skills->pluck('skill')->toArray();
                                    $unique = array_unique($skill);
                                    $skills1 = implode(', ',$unique);
                                ?>
                                    {{ $skills1 }}
                            </td>
                            <td>
                                <a href="{{ route('departments.edit', ['department' => $value->id ]) }}"><button class="btn btn-sm btn-primary">Edit </button></a>
                                <a  class="delete-department" data-id="{{ $value->id }}"><button type="button" class="btn btn-sm btn-primary">Delete</button></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                <span class="text-danger ">Record not found</span>
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
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>

<script src={{asset('assets/js/masters/department.js')}}></script>


@endsection
