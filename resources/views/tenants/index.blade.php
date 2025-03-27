@extends('layouts.master')
@section('contents')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Tenants Lists</h3>
            </div>
            @if(auth()->user()->hasPermission('designations.create'))
            <div class="text-end px-2 mt-3">
                <a href="{{ route('tenants.create') }}"><button type="button" class="btn btn-primary mb-3">Add Tenant<i
                            class="fa-solid fa-plus"></i></button></a>
            </div>
            @endif
            {{-- <div class="col-md-12 d-flex justify-content-start px-2">
                <form class="row g-3" method="get">
                    <div class="col-auto mb-3">
                        <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search"
                            required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search <i
                                class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="{{ route('designations.index') }}"><button type="button"
                                class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                    </div>
                </form>
            </div> --}}

            <div class="table-responsive">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover  all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">Sr No.</th>
                                <th class="text-center">Tenant Name</th>
                                <th class="text-center">Domain</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">DOB</th>
                                <th class="text-center">Company Name</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($tenants as $key => $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($value->first_name." ".$value->last_name) }}</td>

                                <?php
    $domainData = json_decode($value->domain);
?>
                                <td>{{ $domainData->domain ?? '' }}</td>
                                <td>{{ $value->mobile }}</td>
                                <td class="text-wrap">{{ $value->email }}</td>
                                <td>{{ ucfirst($value->gender) }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->dob)->format('d-m-Y') }}</td>
                                <td>{{ $value->company_name }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center"><span class="text-danger">No Record Found</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $tenants->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endsection