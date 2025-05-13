@extends('layouts.guest.master', ['title' => 'WorkOrder Report '])
@section('style')
<!-- <link rel="stylesheet" href="{{ asset('assets/css/work-order-report.css')}}" /> -->
<style>

@media print {
    .invoice-container {
        box-shadow: none !important;
        padding: 0;
        margin: 0;
        width: 100% !important;
    }

    .hide-text,
    .btn,
    form,
    .navbar,
    .header,
    .footer {
        display: none !important;
    }

    .table,
    .table th,
    .table td {
        border: 1px solid #000 !important;
        color: #000 !important;
        background-color: #fff !important;
        word-wrap: break-all !important; 
        white-space: normal !important;   
    }

    .print-full-width {
        width: 100% !important;
        display: table !important;
    }

    .table th,
    .table td {
        display: table-cell !important;
        vertical-align: middle !important;
        font-size: 12px !important;
        padding: 9px !important;
                                                                                                                

    }

   
    .attributes-column {
        word-break: break-all !important;
        white-space: normal !important;
        font-size: 11px !important; 
        
    }

    #text-wrapping{
        
        word-break: break-all !important;
        white-space: normal !important;
        word-wrap: break-word !important;
       
      
        width: 70px !important;
    
    }
    .amount-wrapping{
        word-break: break-all !important;
        white-space: normal !important;
       
      
        width: 20px !important;

    }
}
</style>
@endsection

@section('content')
<div class="container-fluid px-3">
    <div class="card shadow-lg invoice-container border-0 rounded-4 p-4 bg-light">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <img src="{{ asset('assets/images/PrakharLimited-logo.png') }}" alt="logo left" style="height: 60px;">
            <img src="{{ asset('assets/images/11years.png') }}" alt="logo right" style="height: 60px;">
        </div>
        <div class="text-center my-3">
            <h3 class="text-dark fw-bold">Work Order Report</h3>
        </div>

        <!-- Download ZIP Section -->
        <div class="text-end hide-text mb-2">
            @if(!empty($wo_details) && !empty($zipFilePath))
            <a href="{{ asset('uploadWorkOrder/' . basename($zipFilePath)) }}" class="btn btn-success"
                target="_blank">Download ZIP</a>
            @endif
        </div>

        @foreach($wo_details as $project_id => $wo_detail)
        <!-- Work Order Info -->
        <div class="row d-flex mb-3">
            <div class="col-md-6">
                <p><strong>Organisation:</strong> {{$wo_detail[0]->project->organizations->name}}</p>
                <p><strong>Project Name:</strong> {{$wo_detail[0]->project->project_name}}</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p><strong>Date:</strong> 01-Jan-2025</p>
                <p><strong>Project Number:</strong> {{$wo_detail[0]->project->project_number}}</p>
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive mb-4">
            <table
                class="table table-striped table-bordered table-hover align-middle text-center w-100 print-full-width">
                <thead class="table-primary text-dark fw-bold">
                    <tr>
                        <th class="text-center">Work Order No.</th>
                        <th class="text-center">Coordinator</th>
                        <th class="text-center">No. of Resources</th>
                        <th class="text-center">Location</th>
                        <th class="text-center">Start Date</th>
                        <th class="text-center">End Date</th>
                        <th class="text-center">Amount (INR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($wo_detail as $value)
                    <tr>
                        <td class="text-center attributes-column" id="text-wrapping">{{$value->wo_number}}</td>
                        <td class="text-center amount-wrapping">{{$value->wo_project_coordinator}}</td>
                        <td class="text-center attributes-column amount-wrapping">{{$value->wo_no_of_resources}}</td>
                        <td class="text-center attributes-column">{{$value->wo_location}}</td>
                        <td class="text-center attributes-column">{{$value->wo_start_date}}</td>
                        <td class="text-center attributes-column">{{$value->wo_end_date}}</td>
                        <td class="text-center attributes-column" >INR {{ number_format($value->wo_amount, 2) }}</td>
                    </tr>
                    @endforeach
                    <tr class="table-light fw-bold">
                        <td>Total Amount</td>
                        <td colspan="5"></td>
                        <td>INR {{ number_format($wo_detail->wo_pro_sum, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach

        <!-- Overall Total -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover w-100 print-full-width">
                <thead class="text-white">
                    <tr>
                        <th colspan="7" class="text-center">Total Work Orders Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="fw-bold">
                        <td>Total Amount</td>
                        <td colspan="5"></td>
                        <td>INR {{ number_format($overallSum, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer Actions -->
        <div class="text-center mt-4">

            @if(!empty($show_report))
            <div class="row d-flex align-items-center justify-content-end">
                <div class="col-auto">
                    <form action="{{ route('save-report') }}" method="POST">
                        @csrf
                        <label class="form-label fw-bold text-dark">Check Work Order <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2" name="report_name" required
                            placeholder="Check Your Workorder">
                        <input type="hidden" name="check_workOrders"
                            value="{{ implode(',', $check_workOrders ?? []) }}">
                            <div class="d-flex justify-content-end gap-2 mt-2">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                <a href="{{ route('work-order-list') }}" class="btn btn-sm btn-secondary">Cancel</a>
                            </div>
                    </form>
                    
                </div>

            </div>


            <div class="d-flex justify-content-end mt-3 gap-2">
                <button class="btn btn-sm btn-primary" onclick="window.print()">Print Report</button>

                <form action="{{ route('export-work-order') }}" method="POST">
                    @csrf
                    <input type="hidden" name="check_workOrders" value="{{ implode(',', $check_workOrders ?? []) }}">
                    <button type="submit" class="btn btn-sm btn-warning">Download CSV</button>
                    
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/compose.js') }}"></script>
@endsection