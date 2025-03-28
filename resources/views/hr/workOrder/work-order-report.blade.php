@extends('layouts.guest.master', ['title' => 'WorkORder Report '])
@section('content')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" /> -->

<div class="center-card">
    <div class="card invoice-container">
       
        <div class="invoice-header text-start">
            <img src="https://prakharsoftwares.com/assets/images/prakhar_updated_logo.png" alt="Logo" class="logo" width="200">  
           
        </div>

        <div class="text-center mt-1">
        <h4>Work Order Report</h4>
        </div>

       
        <div class="row px-3 mt-2">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @else
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>

       
        <div class="text-end hide-text">
            @if(!empty($wo_details))
                @if($zipFilePath)
                    <a href="{{ asset('storage/' . basename($zipFilePath)) }}" class="btn btn-success mb-3" target="_blank">Download ZIP</a>
                @else
                    <p>No files to download.</p>
                @endif
            @endif
        </div>
        

        
        @foreach($wo_details as $project_id => $wo_detail)
        <div class="invoice-details">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Organisation:</strong> {{$wo_detail[0]->project->organizations->name}}</p>
                    <p><strong>Project Name:</strong> {{$wo_detail[0]->project->project_name}}</p>
                </div>
                <div class="col-md-6 text-end">
                    <p><strong>Date:</strong> 01-Jan-2025</p>
                    <p><strong>Project Number:</strong> {{$wo_detail[0]->project->project_number}}</p>
                </div>
            </div>
        </div>

       
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Work Order No.</th>
                        <th>Coordinator</th>
                        <th>No.of Resources</th>
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
                            <td>INR {{ number_format($value->wo_amount, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Total Amount</td>
                        <td colspan="5"></td>
                        <td> INR {{ number_format($wo_detail->wo_pro_sum, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach

      
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="7" class="center">Total Work Orders Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-dark fw-bold">Total Amount</td>
                    <td colspan="5"></td>
                    <td class="text-dark fw-bold"> INR {{ number_format($overallSum, 2) }}</td>
                </tr>
            </tbody>
        </table>

       
        <div class="invoice-footer">
            <div class="total-amount">Total Amount: INR {{ number_format($overallSum, 2) }}</div>
            <div class="buttons">
               
                <a href="{{route('work-order-list')}}"> <button class="btn-print hide-text">Cancle</button></a>
                <button class="btn-print hide-text">save</button>
                <!-- <button class="btn-print hide-text">Download CSV</button> -->
                
                

                <button class="btn-print hide-text" onclick="window.print()">Print Report</button>
                <button class="btn-print hide-text">Share</button>
                <form action="{{route('export-work-order')}}" method="post">
                    @csrf
                        <input type="hidden" name="check_workOrders" value="{{ implode(',', $check_workOrders ?? []) }}">
                   <button type="submit" class="btn-print hide-text">Download CSV</button>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
