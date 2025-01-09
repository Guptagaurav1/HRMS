@extends('layouts.master',['title' => 'Designation List'])

@section('style')
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" /> --}}
@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Designation Lists</h3>
                <a href="{{ route('designations.create') }}" class="mt-3"><button type="button" class="btn btn-primary mb-3">Add Designation</button></a>

            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3 mt-4">
                <form class="row g-3" method="get">
                    <div class="col-auto mb-3">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                        <a href="{{ route('designations.index') }}"><button type="button" class="btn btn-primary mb-3">Clear</button></a>
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
                                        <a href="{{ route('designations.edit',['designation' => $value->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                                        <a class="delete-designation" data-id="{{ $value->id }}"><button type="button" class="btn btn-sm btn-primary">Delete</button></a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="3"><span class="text-danger">No Record Found</span></td>
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
