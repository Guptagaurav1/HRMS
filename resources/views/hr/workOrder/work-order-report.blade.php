@extends('layouts.guest.master', ['title' => 'WorkOrder Report '])

@section('content')
<div class="center-card">
    <div class="card invoice-container">
        <!-- Work-Order Report Header -->
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="d-flex bg-white py-3 px-2 rounded-3 bg-white p-0">
                    <div>
                        <img src="{{ asset('assets/images/PrakharLimited-logo.png') }}" alt="logo left"
                            style="width: 15%;" class="prakhrar-logo">
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/11years.png') }}" alt="logo right" style="width: 60%;" class="11years"/>
                    </div>
                </div>
            </div>
        </div>
        <hr class="border">

        <div class="text-center mt-1">
            <h4 class="text-dark fw-bold">Work Order Report</h4>
        </div>


    
        <!-- Download ZIP Section -->
        <div class="text-end hide-text">
            @if(!empty($wo_details))
            @if(!empty($zipFilePath))
                <a href="{{ asset('storage/uploadWorkOrder/' . basename($zipFilePath)) }}" class="btn btn-success mb-3"
                target="_blank">Download ZIP</a>
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
            <table class="table table-bordered table-hover text-dark fw-bold">
                <thead>
                    <tr>
                        <th class="text-dark fw-bold">Work Order No.</th>
                        <th class="text-dark fw-bold">Coordinator</th>
                        <th class="text-dark fw-bold">No. of Resources</th>
                        <th class="text-dark fw-bold">Location</th>
                        <th class="text-dark fw-bold">Start Date</th>
                        <th class="text-dark fw-bold">End Date</th>
                        <th class="text-dark fw-bold">Amount (INR)</th>
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
            @if(!empty($show_report))
                <div class="">
                    <div class="d-flex align-items-center justify-content-center gap-3">
                        <div>
                            <form action="{{route('save-report')}}" method="post">
                                @csrf
                                <label class="form-label text-wrap text-dark fw-bold"> Check Work Order <span class="text-danger">*</span>
                                        </label> </label>
                                <input type="text" class="forn-control hide-text" id="report_name" name="report_name" placeholder="Check Your Workorder" required>
                                <input type="hidden" name="check_workOrders"
                                    value="{{ implode(',', $check_workOrders ?? []) }}">
                                    
                                <button type="submit" id ="save_report" class="btn btn-sm btn-primary report hide-text mx-1">Save</button>
                            </form>
                            
                        </div>
                        <div class="row mt-4">
                            
                            <a href="{{route('work-order-list')}}">
                                <button class="btn btn-sm btn-primary hide-text" id="cancelForm">Cancel</button>
                            </a>
                        </div>
                        
                    </div>
                    <!-- Print Button -->
                    <div class="d-flex align-items-center justify-content-center mt-2 gap-3">
                        <div class="mt-2">
                            <button class="btn btn-sm btn-primary hide-text" id="printButton" onclick="window.print()">Print Report</button>
                        </div>

                    <!-- Export CSV Form -->
                    <form action="{{route('export-work-order')}}" method="post">
                        @csrf
                        <input type="hidden" name="check_workOrders" value="{{ implode(',', $check_workOrders ?? []) }}">
                        <div class="mt-2">
                            <button type="submit"id="csvButton"  class="btn btn-sm btn-primary hide-text cursor-pointer">Download CSV</button>
                        </div>
                    </form>
                
                </div>
            @endif
        </div>


    </div>
</div>

@endsection
@section('script')
<script src="{{asset('assets/js/compose.js')}}"></script>

@endsection