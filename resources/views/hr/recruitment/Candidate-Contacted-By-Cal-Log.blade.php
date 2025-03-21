@extends('layouts.master', ['title' => 'Candidate Calling Logs'])

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="text-white mt-2">Contact Candidate By Call Form</h2>
                </div>
                <div class="row px-3 ">

                    <div class="col-md-12 d-flex justify-content-end">
                        <form action="{{route('recruitment.export_call_log')}}" method="POST" class="form">
                            @csrf
                            <div class="d-none">
                                <input type="hidden" name="searchvalue" value="{{$searchvalue}}" />
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary mt-2"
                               >Export All  <i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                        </form>
                        <a href="{{route('addcontact-form')}}" class="btn btn-sm btn-primary mt-2 mx-2">Add Contact Detail</a>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="search" class="form-control" placeholder="Search" name="search" value="{{$searchvalue}}" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        @if(auth()->user()->hasPermission('recruitment.call_logs'))
                            <div class="col-auto">
                                <a href="{{route('recruitment.call_logs')}}" class="btn btn-primary mb-3">Reset</a>
                            </div>
                        @endif
                    </form>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                    <symbol id="check-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                @if(session()->has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show justify-content-between" role="alert">
                        <div class="d-flex">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                          {{session()->get('message')}}
                      </div>
                    </div>
                    <div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      </div>
                </div>
            @endif
            @if(session()->has('error'))
            <div class="col-md-12">
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show justify-content-between" role="alert">
                    <div class="d-flex">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                          {{session()->get('message')}}
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
            </div>
            @endif
                <div class="table-responsive">
                    <div class="">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr style="background-color: #2A3F54">
                                    <th class="text-white"><strong>S.NO.</strong></th>
                                    <th class="text-white"><strong>Client Name</strong></th>
                                    <th class="text-white"><strong>Position Title</strong></th>
                                    <th class="text-white"><strong>Name</strong></th>
                                    <th class="text-white"><strong>Email</strong></th>
                                    <th class="text-white"><strong>Contact Number</strong></th>
                                    <th class="text-white"><strong>Recruiter Name/Email</strong></th>
                                    <th class="text-white"><strong>Remarks</strong></th>
                                    <th class="text-white"><strong>Contacted On</strong></th>
                                    <th class="text-white"><strong>Resume</strong></th>
                                    <th class="text-white"><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logs as $log)
                                    <tr>
                                        <td class="srno-column">{{$loop->iteration}}</td>
                                        <td class="rid-column">{{$log->client_name}}</td>
                                        <td class="rid-column">{{$log->job_position}}</td>
                                        <td class="rid-column">{{$log->name}}</td>
                                        <td class="rid-column">{{$log->candidate_email}}</td>
                                        <td class="rid-column">{{$log->phone_no}}</td>
                                        <td class="rid-column">{{$log->first_name." ".$log->last_name." / ".$log->email}}</td>
                                        <td class="rid-column">{{$log->remarks}}</td>
                                        <td class="rid-column">{{date('jS M, Y', strtotime($log->created_at))}}</td>
                                        <td class="rid-column">
                                            <a href="{{asset('resume').'/'.$log->resume}}" download><span class="badge text-bg-success">Download <i class="fa-solid fa-download"></i></span></a></td>
                                        <td class="rid-column">
                                            @if(auth()->user()->hasPermission('recruitment.edit-call_log'))
                                                <a href="{{route('recruitment.edit-call_log', ['id' => $log->id])}}"> <button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="11">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-12 d-flex justify-content-center my-2">
                    {{$logs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
