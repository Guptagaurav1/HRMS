@extends('layouts.master', ['title' => 'My Dashboard'])

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/sales-manager-dashboard.css')}}" />
@endsection

@section('contents')
<div class="container dashboard-container">
    <div class="dashboard-breadcrumb mb-4 d-flex justify-content-between align-items-center flex-wrap">
        <h4>Helpdesk for Query <i class="fa-solid fa-arrow-right fs-6"></i></h4>
        <p class="mt-2">
            <strong>Email:</strong> helpdesk@prakharsoftwares.com |
            <strong>Contact No:</strong> 7982363536
        </p>
    </div>

    <div class="row d-flex flex-wrap-md">
        <!-- Profile Card -->
        <div class="col-md-6 mb-3">
            <div class="profile-card p-3">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                    alt="Profile" />
                <div class="profile-info">
                    <h4>{{auth()->user()->first_name." ".auth()->user()->last_name}}</h4>
                    <p>{{get_role_fullname(auth()->user()->role_id)}}</p>
                    <p><i class="fas fa-envelope"></i>{{auth()->user()->email}}</p>
                    <p><i class="fas fa-phone"></i> {{auth()->user()->phone}}</p>
                </div>
            </div>
        </div>

        <!-- Work Card -->
        <div class="col-md-6 mb-3">
            <div class="work-card">
                <div class="work-card-header">My Work</div>
                <div class="assigned-lead">
                    <strong>Total Candidates Hired By You : </strong>
                    <span class="py-2 px-3 bg-primary text-white rounded">{{$total_hired}}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-dark fw-bold px-3 fs-5">
                Position Request Assigned List
            </div>
            <hr>
        </div>

    </div>

    <div class="row d-flex">
        @foreach ($positions as $position) 
        <div class="col-md-4 col-sm-6 mb-4 d-flex">
            <div class="executive-job-card">
                <div class="executive-job-title text-capitalize">{{$position->position_title}}</div>
                <div class="executive-job-info py-2 text-capitalize">Company: {{$position->client_name}}</div>
                <div class="executive-job-info py-2">No of Requirements : {{$position->no_of_requirements}}</div>
                <div class="executive-job-info">Hired: {{$position->no_of_completed_requirements}}</div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Show pagination --}}
    <div class="row">
        <div class="col-md-12">
            {{$positions->links()}}
        </div>
    </div>
</div>
@endsection