@extends('layouts.master', ['title' => 'POSH Complaints'])


@section('contents')
    <div class="fluid-container">
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header  heading-stripe">
                        <h3 class="mt-2 text-center">POSH Complaint List</h3>
                        <div>
                        <ul class="breadcrumb">
                            <li> @if (auth()->user()->role->role_name="hr")
                                <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                @endif
                            </li>
                            <li>POSH Complaint List</li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-start mx-3">
                        <form class="row g-3 mt-2">
                            <div class="col-auto col-xs-12">
                                <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}" required>
                            </div>
                            <div class="col-auto col-xs-12">
                                <button type="submit" class="btn btn-primary  mb-3"> Search <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col-auto col-xs-12">
                                <a href="{{route('posh.complaint-list')}}" class="btn btn-primary  mb-3"> Clear </a>
                                        
                            </div>
                        </form>
                    </div>


                    
                    <div class="table-responsive mt-3 ">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="srno-column">S.No.</th>
                                    <th class="rid-column">Employee Code</th>
                                    <th>Name</th>
                                    <th class="attributes-column">Subject</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Complaint Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($complaints as $complaint)
                                    @php
                                        if ($complaint->status == 'wait') {
                                            $color = 'danger';
                                        } elseif ($complaint->status == 'seen') {
                                            $color = 'warning';
                                        } else {
                                            $color = 'info';
                                        }

                                    @endphp
                                    <tr>
                                        <td class="srno-column">{{ $loop->iteration }}</td>
                                        <td class="rid-column">{{ $complaint->employee->emp_code }}</td>
                                        <td>{{ $complaint->employee->emp_name }}</td>
                                        <td class="attributes-column">{{ $complaint->subject }}</td>
                                        <td>{{ $complaint->description }}</td>
                                        <td>
                                            <a href="#"><button
                                                    class="btn btn-sm btn-{{ $color }} text-capitalize text-light">{{ $complaint->status }}</button></a>
                                        </td>
                                        <td>{{ date('jS F, Y', strtotime($complaint->created_at)) }}</td>
                                        <td>

                                            <a href="#"><button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#poshDetailsModal"
                                                    data-bs-whatever="{{ $complaint->id }}">View <i
                                                        class="fa-solid fa-eye"></i></i></button></a>
                                            @if (!$complaint->revert)
                                                <a href="#">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#responseModal"
                                                        data-bs-whatever="{{ $complaint->id }}">Response <i
                                                            class="fa-solid fa-reply"></i></button></a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="8">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Modals --}}
@section('modal')
    {{-- Posh Details Modal --}}
    <div class="modal fade" id="poshDetailsModal" tabindex="1" aria-labelledby="poshDetailsModalLabel"
        aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="poshDetailsModalLabel">Posh Complain Details</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Employee Code:</label>
                                    <span class="emp_code">NA</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Employee Name:</label>
                                    <span class="emp_name">Na</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Subject</label>
                                    <span class="subject">NA</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Message</label>
                                    <span class="cc text-wrap message">NA</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Revert</label>
                                    <span class="reason revert">NA</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-container shadow-sm">
                                    <label class="fw-bold">Complain Date</label>
                                    <span class="absence_dates complaint-date">NA</span>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Response Modal --}}
    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="responseModalLabel">Reply</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form response-form">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" id="complaint_id" name="complaint_id">
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <textarea class="form-control" id="content" name="response"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary send">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/posh-complaint.js') }}"></script>
@endsection
