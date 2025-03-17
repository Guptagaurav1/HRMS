@extends('layouts.master',['title' => 'Designation List'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Designation Lists</h3>
            </div>
            @if(auth()->user()->hasPermission('designations.create'))
                <div class="text-end px-2 mt-3">
                    <a href="{{ route('designations.create') }}"><button type="button" class="btn btn-primary mb-3">Add Designation <i class="fa-solid fa-plus"></i></button></a>
                </div>
            @endif
            <div class="col-md-12 d-flex justify-content-start px-2">
                <form class="row g-3" method="get">
                    <div class="col-auto mb-3">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="{{ route('designations.index') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                    </div>
                </form>
            </div>

            <div class="table-responsive">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover  all-employee-table table-striped"
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($value->name)  }}</td>
                                    <td>
                                        @if(auth()->user()->hasPermission('designations.edit'))
                                            <a href="{{ route('designations.edit',['designation' => $value->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                                        @endif
                                        @if(auth()->user()->hasPermission('designations.destroy'))
                                        <a class="delete-designation" data-id="{{ $value->id }}"><button type="button" class="btn btn-sm btn-primary">Delete</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                            <tr >
                                <td colspan="3" class="text-center"><span class="text-danger">No Record Found</span></td>
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
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
{{-- <script src={{asset('assets/js/select2-init.js')}}></script> --}}

<script src={{asset('assets/js/masters/designation.js')}}></script>

@endsection
