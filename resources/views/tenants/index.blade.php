@extends('layouts.master')
@section('contents')
    <div class="dashboard-breadcrumb mb-25">
        <h2>Welcome To Tenant</h2>
        <div class="dashboard-filter">
            <a href="{{ route('tenants.create') }}" class="btn btn-success">Add Tenant</a>
        </div>
    </div>
@endsection