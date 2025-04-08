@extends('layouts.guest.master', ['title' => 'WorkOrder Report '])

@section('content')
<div class="center-card">
    <div class="card invoice-container">
        <!-- Invoice Header -->
        <!-- <div class="invoice-header text-start">
            <img src="https://prakharsoftwares.com/assets/images/prakhar_updated_logo.png" alt="Logo" class="logo" width="200">  
           
        </div> -->
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="d-flex bg-white py-3 px-2 rounded-3 bg-white p-0">
                    <div>
                        <img src="{{ asset('assets/images/PrakharLimited-logo.png') }}" alt="logo left"
                            style="width: 15%;">
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/11years.png') }}" alt="logo right" style="width: 60%;" />
                    </div>
                </div>
            </div>
        </div>
        <hr class="border">

        <div class="text-center mt-1">
            <h4>Work Order Report</h4>
        </div>


        <!-- <div class="row px-3 mt-2">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @else
            <div class="alert alert-error alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @endif
        </div> -->

        <!-- Download ZIP Section -->
        <div class="text-end hide-text">
            @if(!empty($wo_details))
            @if(!empty($zipFilePath))
            <a href="{{ asset('storage/' . basename($zipFilePath)) }}" class="btn btn-success mb-3"
                target="_blank">Download ZIP</a>
            @else
            <p>No files to download.</p>
            @endif
            @endif
        </div>

        <!-- Work Order Details -->
        @foreach($wo_details as $project_id => $wo_detail)
        <div class="invoice-details">
            <div class="row">
                <div class="col-md-6 col-12 mb-1">
                    <p><strong>Organisation:</strong> {{$wo_detail[0]->project->organizations->name}}</p>
                    <p><strong>Project Name:</strong> {{$wo_detail[0]->project->project_name}}</p>
                </div>
                <div class="col-md-6 col-12 mb-1 text-md-end">
                    <p><strong>Date:</strong> 01-Jan-2025</p>
                    <p><strong>Project Number:</strong> {{$wo_detail[0]->project->project_number}}</p>
                </div>
            </div>
        </div>

        <!-- Table for Work Orders -->
        <div class="table-responsive mb-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Work Order No.</th>
                        <th>Coordinator</th>
                        <th>No. of Resources</th>
                        <th>Location</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Amount (INR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wo_detail as $key => $value)
                    <tr>
                        <td>{{$value->wo_number}}</td>
                        <td>{{$value->wo_project_coordinator}}</td>
                        <td>{{$value->wo_no_of_resources}}</td>
                        <td>{{$value->wo_location}}</td>
                        <td>{{$value->wo_start_date}}</td>
                        <td>{{$value->wo_end_date}}</td>
                        <td>INR {{ number_format($value->wo_amount, 2)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total Amount</td>
                        <td colspan="5"></td>
                        <td>INR {{ number_format($wo_detail->wo_pro_sum, 2)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach

        <!-- Total Work Orders Amount -->
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="12" class="text-center text-dark fw-bold">Total Work Orders Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-dark fw-bold">Total Amount</td>
                    <td colspan="5"></td>
                    <td class="text-dark fw-bold">INR {{number_format($overallSum, 2)}}</td>
                </tr>
            </tbody>
        </table>

        <!-- Invoice Footer with Buttons -->
        <div class="invoice-footer">
            <div class="total-amount">Total Amount: INR {{number_format($overallSum, 2) }}</div>
            <div class="">
                <div class="d-flex align-items-center justify-content-center  gap-3">
                    <div>
                        <a href="{{route('work-order-list')}}">
                            <button class="btn btn-sm btn-primary hide-text">Cancel</button>
                        </a>
                    </div>
                    <div style="margin-left: 25px;">
                        <form action="{{route('save-report')}}" method="post">
                            @csrf
                            <input type="hidden" name="check_workOrders"
                                value="{{ implode(',', $check_workOrders ?? []) }}">
                            <button class="btn btn-sm btn-primary hide-text">Save</button>
                        </form>
                    </div>
                </div>




                <!-- Print Button -->
                 <div class="d-flex align-items-center justify-content-center mt-2 gap-3">
                    <div>
                        <button class="btn btn-sm btn-primary hide-text" onclick="window.print()">Print Report</button>
                     </div>
    
                     <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            share</button>
                     </div>
                 </div>
                 
                
                <!-- <button class="btn btn-sm btn-primary hide-text">Share</button> -->
               
                <!-- send mail model start here -->
                <!-- Export CSV Form -->
                <form action="{{route('export-work-order')}}" method="post">
                    @csrf
                    <input type="hidden" name="check_workOrders" value="{{ implode(',', $check_workOrders ?? []) }}">
                    <div class="mt-2">
                        <button type="submit" class="btn btn-sm btn-primary hide-text">Download CSV</button>
                    </div>
                </form>


            </div>
        </div>


    </div>
</div>


@section('modal')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Report Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form compose-email" method="post" action="{{route('send-report-mail')}}">
                @csrf
                <div class="modal-body">
                    <div class="container">
                        <div class="row">

                            <div class="row">

                                <div class="col-md-6 mb-1">
                                    <label for="to" class="form-label">To</label>
                                    <input type="text" class="form-control" name="to"
                                        placeholder="Enter comma seperated recipient email" value="{{old('to')}}"
                                        required>
                                    @error('to')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="cc" class="form-label">CC</label>
                                    <input type="text" class="form-control" name="cc"
                                        placeholder="Enter comma seperated emails" value="{{old('cc')}}">
                                </div>
                            </div>
                            <div class="row">

                                <input type="hidden" name="check_workOrders"
                                    value="{{ implode(',', $check_workOrders ?? []) }}">
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject"
                                        placeholder="Enter email subject" value="{{old('subject')}}" required>
                                    @error('subject')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="attachments" class="form-label">Attachments </label>
                                    <input type="text" class="form-control" readonly name="attachment"
                                        value="{{ $file_name??NULL }}">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="body" class="form-label">Message / Query</label>
                                    <textarea class="form-control" name="body" rows="6" id="body"
                                        placeholder="Write your message here">{{old('body')}}</textarea>
                                    @error('body')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@endsection
@section('script')
<script src="{{asset('assets/js/compose.js')}}"></script>
@endsection