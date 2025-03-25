@extends('layouts.master',['title' => 'Organization List'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Organization Lists</h3>
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
            @if(auth()->user()->hasPermission('organizations.create'))
                <div class="text-end px-2">
                    <a href="{{ route('organizations.create') }}" class="mt-3"><button type="button" class="btn btn-primary">Add Organization <i class="fa-solid fa-plus"></i></button></a>
                </div>
            @endif
           
            <div class="col-md-12 d-flex justify-content-start px-2">
                <form class="row g-3" method="get">
                    <div class="col-auto mb-3">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="{{ route('organizations.index') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
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
                                    <td class="text-center">{{ ucwords($value->name)  }}</td>
                                    <td class="text-wrap">{{ $value->email }}</td>
                                    <td class="text-center">{{ $value->contact }}</td>
                                    <td class="text-center">{{ $value->address }}</td>
                                    <td class="text-center">
                                        @if(auth()->user()->hasPermission('organizations.edit'))
                                        <a href="{{ route('organizations.edit',['organization' => $value->id ]) }}"><button type="button" class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                        @endif
                                        @if(auth()->user()->hasPermission('organizations.destroy'))
                                        <a class="delete-organization" data-id="{{ $value->id }}"><button type="button" class="btn btn-sm btn-primary">Delete  <i class="fa-solid fa-trash"></i></button></a>
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
                
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/js/masters/organization.js')}}></script>

@endsection
