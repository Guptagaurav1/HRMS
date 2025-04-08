@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/employee-dashboard.css')}}"/>
@endsection

@section('contents')
<div class="container dashboard-container">
    <div class="dashboard-breadcrumb mb-3 d-flex justify-content-between align-items-center">
        <h4 class="text-dark">Helpdesk for query <i class="fa-solid fa-arrow-right fs-6"></i></h4>
        <p class="mt-2"><strong>Email: helpdesk@prakharsoftwares.com | Contact No : 7982363536</strong></p>

    </div>
    <div class="d-flex justify-content-between align-items-center gap-3">
        <div class="card profile-card p-3">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                alt="Profile" />
            <div class="profile-info">
                <h4>{{ auth()->user()->first_name." ".auth()->user()->last_name}}</h4>
                <p><i class="fas fa-user"></i> {{ ucwords(str_replace("_", ' ',auth()->user()->role->role_name)) }}</p>
                <p><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                <p><i class="fas fa-phone"></i> {{ auth()->user()->phone }}</p>
            </div>
        </div>
        {{-- <div class="card profile-card p-3">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                alt="Profile" />
            <div class="profile-info">
                <h4>John Doe</h4>
                <p>Software Engineer</p>
                <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
                <p><i class="fas fa-phone"></i> +123 456 7890</p>
            </div>
        </div> --}}
    </div>
   

    <ul class="custom-tabs" id="dashboardTabs">
        <li class="tab-item active" data-id="dashboard"><i class="fas fa-home"></i> Dashboard</li>
    </ul>

    <div class="mt-4">

        <div class="tab-content-section active" id="dashboard">
            <div class="row">
                <div class="col-md-4">
                    <div class="card stats-card">
                        <h4>{{$countPositions}}</h4>
                        <p>Total Positions Raised By You</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/employee-tab-dashboard.js')}}"></script>

@endsection