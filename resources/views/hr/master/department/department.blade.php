@extends('layouts.master',['title' => 'Department Listing'])
@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

<style>
    
.back-button-box {
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 31px;
    width: 43px;
    background-color: #f8f9fa; 
    border-radius: 35px;
}



.btn-back {
    background-color: transparent;
    border: none;
    font-size: 20px; 
    color: #007bff; 
    transition: color 0.3s, transform 0.3s ease;
    padding: 0;
}

/* Hover effect for the icon */
.btn-back:hover {
    color: gray; 
    transform: scale(1.2); 
    transform: rotate(-360deg); 
    
}

</style>
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Department</h3>
                <!-- Back Button Wrapped in a Box -->
                <div class="text-start">
                    <a href="{{ route('departments.index') }}">
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
                @if(auth()->user()->hasPermission('departments.create'))
                <div class="text-end">
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
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>

<script src={{asset('assets/js/masters/department.js')}}></script>

@endsection
