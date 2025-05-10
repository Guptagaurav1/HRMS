@extends('layouts.master')

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


    <div class="row d-flex flex-wrap-md mt-3">
        <!-- Profile Card -->
        <div class="col-md-6 mb-3">
            <div class="profile-card p-3">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                    alt="Profile" />
                <div class="profile-info">
                <h4>{{ auth()->user()->first_name." ".auth()->user()->last_name}}</h4>
                    <p>{{ ucwords(str_replace("_", ' ',auth()->user()->role->role_name)) }}</p>
                    <p><i class="fas fa-envelope"></i> {{ auth()->user()->email }}</p>
                    <p><i class="fas fa-phone"></i> {{ auth()->user()->phone }}</p>
                </div>
            </div>
        </div>

        <!-- Work Card -->
       
         <div class="col-md-6 mb-3 ">
            
            <div class="work-card">
                <div class="work-card-header">My Work</div>
                <div class="assigned-lead">
                    <a href="">
                    <strong>Total Positions Raised By You : </strong>
                    <span class="py-2 px-3 bg-primary text-white rounded">{{$countPositions}}</span>
                    </a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection