@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/it-manager-dashboard.css')}}" />


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
                    <h4>John Doe</h4>
                    <p>IT Manager</p>
                    <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
                    <p><i class="fas fa-phone"></i> +123 456 7890</p>
                </div>
            </div>
        </div>

        <!-- Work Card -->
        <div class="col-md-6 mb-3">
            <div class="work-card">
                <div class="work-card-header">IT Team</div>
                <div class="assigned-lead">
                    <strong>IT Team Size : </strong>
                    <span class="py-2 px-3 bg-primary text-white rounded">5</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-dark fw-bold px-3 fs-5">
                Leave Request Raised
            </div>
            <hr>
        </div>

    </div>

    <div class="row d-flex">
    <!-- Total No of Leaves Card -->
    <div class="col-md-6 col-sm-6 mb-4 d-flex">
        <div class="custom-card">
            <div class="card-title">
                <i class="fas fa-calendar-alt"></i> Total No of Leaves
            </div>
            <div class="card-info"><i class="fas fa-building"></i>IT Department</div>
            <div class="card-info"><i class="fas fa-leaf"></i>Total IT Leaves Raised : <strong>12</strong></div>
            <div class="card-info"><i class="fas fa-check-circle"></i>Approved: <strong>8</strong></div>
        </div>
    </div>

    <!-- IT Manager Card -->
    <div class="col-md-6 col-sm-6 mb-4 d-flex">
        <div class="custom-card">
            <div class="card-title">
                <i class="fas fa-user-tie"></i> IT Manager
            </div>
            <div class="card-info"><i class="fas fa-building"></i>Internal IT</div>
            <div class="card-info"><i class="fas fa-users-cog"></i>No of Requirements: <strong>1</strong></div>
            <div class="card-info"><i class="fas fa-user-check"></i>Hired: <strong>0</strong></div>
        </div>
    </div>
</div>

</div>
@endsection