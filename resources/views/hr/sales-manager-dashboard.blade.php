@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/sales-manager-dashboard.css')}}" />
@endsection

@section('contents')
<div class="container dashboard-container">
    <div class="dashboard-breadcrumb mb-4 d-flex justify-content-between align-items-center flex-wrap">
        <h4>Helpdesk for Query <i class="fa-solid fa-arrow-right fs-6"></i></h4>
        <p class="contact-info mt-2">
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
                    <p>Sales Manager</p>
                    <p><i class="fas fa-envelope"></i> john.doe@example.com</p>
                    <p><i class="fas fa-phone"></i> +123 456 7890</p>
                </div>
            </div>
        </div>

        <!-- Work Card -->
        <div class="col-md-6 mb-3">
            <div class="work-card">
                <div class="work-card-header">My Work</div>
                <div class="assigned-lead">
                    <strong>Assigned Lead:</strong>
                    <span class="py-2 px-3 bg-primary text-white">0</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-dark fw-bold px-3">
                Follow Up Reminder
            </div>
            <hr>

            <div class="col-md-12">
              <span class="border px-5 py-2 text-white bg-danger rounded-1 shadow-sm">No Follow Up Pending</span> 
            </div>

        </div>
    </div>
</div>
@endsection
