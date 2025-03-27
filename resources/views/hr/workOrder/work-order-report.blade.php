<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    <style>
        
        body {
            background-color: #f8f9fa;
        }

        .invoice-container {
            padding: 30px;
        }

        .card {
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        
        .invoice-header {
            /* display: flex;
            justify-content: space-between; */
            /* align-items: center;
            background-color: #add8e6; */
            /* padding: 15px;
            border-radius: 5px 5px 0 0; */
        }

        .invoice-header h1 {
            
            font-weight: 700;
            color: white;
        }

        .invoice-header .logo {
            width: 80px;
            height: auto;
        }

        /* Footer styles */
        .invoice-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e0e0e0;
            padding: 20px;
            border-top: 1px solid #ddd;
            margin-top: 20px;
            border-radius: 0 0 5px 5px;
        }

        .invoice-footer .total-amount {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
        }

        .invoice-footer .download-btn, .invoice-footer .btn-print {
            background-color: #007bff;
            color: #fff;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .invoice-footer .download-btn:hover, .invoice-footer .btn-print:hover {
            background-color: #0056b3;
        }

        /* Centering the card */
        .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Table styles */
        .invoice-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-items th,
        .invoice-items td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .invoice-items th {
            background-color: #f8f9fa;
        }

        .invoice-items tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .invoice-header h1 {
                font-size: 28px;
            }

            .invoice-header .logo {
                width: 60px;
            }

            .invoice-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .invoice-footer .total-amount {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>


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

       
        <div class="text-end">
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
                            <td>INR {{ number_format($value->wo_amount, 2)}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Total Amount</td>
                        <td colspan="5"></td>
                        <td> INR {{ number_format($wo_detail->wo_pro_sum, 2)}}</td>
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
                    <td class="text-dark fw-bold"> INR {{number_format($overallSum, 2)}}</td>
                </tr>
            </tbody>
        </table>

       
        <div class="invoice-footer">
            <div class="total-amount">Total Amount: INR {{number_format($overallSum, 2) }}</div>
            <div class="buttons">
           <a href="{{ route('work-order-list') }}"> <button class="btn-print">Cancel</button></a>
                <button class="btn-print" onclick="window.print()">Print Invoice</button>
            </div>
        </div>

    </div>
</div>

</body>
</html>
