@extends('layouts.master', ['title' => 'My Profile'])

@section('contents')

<div class="panel">
    <div class="container-fluid profile-container py-4">

        <div class="panel-header d-flex align-items-center justify-content-between mb-4">
            <h3 class="mt-2">Profile Details</h3>
            <ul class="breadcrumb ">
                <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                <li>Profile Details</li>
            </ul>
        </div>

        <div class="row g-4">

            <!-- Profile Info Card -->
            <div class="col-lg-4 col-md-6">
                <div class=" border rounded-4 p-4 text-center h-100 hover-lift">
                    <div class="user-picture mb-3">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                            alt="User Image" class="img-fluid rounded-circle profile-img">
                    </div>
                    <h5 class="mb-1">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
                    <p class="text-dark">{{ auth()->user()->email }}</p>
                </div>
            </div>

            <!-- Account Information Card of the right side -->
            <div class="col-lg-8 col-md-6">
                <div class="border rounded-4 p-4 h-100 hover-lift">
                    <h5 class="mb-3">Account Information</h5>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <p class="mb-1 fw-semibold">Logged In As</p>
                            <p class="text-capitalize">{{ get_role_name(auth()->user()->role_id) }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1 fw-semibold">Contact No</p>
                            <p>{{ auth()->user()->phone }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1 fw-semibold">Gender</p>
                            <p class="text-capitalize">{{ auth()->user()->gender }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-1 fw-semibold">DOB</p>
                            <p>{{ date('jS F, Y', strtotime(auth()->user()->dob)) }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection