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

    <div class="row d-flex flex-wrap-md">
        <!-- Profile Card -->
        <div class="col-md-6 mb-3">
            <div class="profile-card p-3">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg"
                    alt="Profile" />
                <div class="profile-info">
                    <h4>John Doe</h4>
                    <p>HR Executive</p>
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
                    <strong>Total Candidates Hired By You : </strong>
                    <span class="py-2 px-3 bg-primary text-white rounded">0</span>
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
        <div class="col-md-4 col-sm-6 mb-4 d-flex">
            <div class="executive-job-card">


                <div class="executive-job-title"> Telecaller Cum Counselor</div>
                <div class="executive-job-info py-2">Company: Prakhar Software Solutions Pvt. Ltd.</div>
                <div class="executive-job-info py-2">No of Requirements : 1</div>
                <div class="executive-job-info">Hired: 0</div>

            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4 d-flex">
            <div class="executive-job-card">


                <div class="executive-job-title">Talent Acquisition Specialist</div>
                <div class="executive-job-info py-2">Company: Internal</div>
                <div class="executive-job-info py-2">No of Requirements : 4</div>
                <div class="executive-job-info">Hired: 0 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                    facilis voluptatibus placeat quo praesentium iusto aliquid cumque expedita recusandae magni quaerat
                    nesciunt voluptate sequi repellat, eaque, vel dolor tempora molestias.</div>

            </div>
        </div>

        <div class="col-md-4 col-sm-6 mb-4 d-flex">
            <div class="executive-job-card">

                <div class="executive-job-title">Software Developer (Stage-1)</div>
                <div class="executive-job-info py-2">Company: CG Election Commission, Nava Raipur Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere sint cum id praesentium magnam non ea, architecto perspiciatis nulla, possimus illum dolorum exercitationem, nobis totam porro iusto! Tempore, animi eveniet! lo</div>
                <div class="executive-job-info py-2">No of Requirements : 2</div>
                <div class="executive-job-info ">Hired: 0</div>

            </div>
        </div>


    </div>

</div>
@endsection