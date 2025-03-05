<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/vendor/css/bootstrap.min.css')}}"/>
    <style>
        @media print {
            #printButton {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div>
        <div class="row">
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h2 class="mt-2">Generate Work-order Report</h2>
                        
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
                    <div class="table-responsive">
                    @if(!empty($wo_details))
                        <div class="col-sm-10 col-md-10 text-end">
                        @if($zipFilePath)
                            <a href="{{ asset('storage/' . basename($zipFilePath)) }}" class="btn btn-success mb-3" target="_blank">Download ZIP</a>
                        @else
                            <p>No files to download.</p>
                        @endif
                    </div>
                 
                    @foreach($wo_details as $project_id => $wo_detail)
                    <div class=" col-sm-12 col-md-12">
                           
                            <div class="row col-sm-12 col-md-4"> <h5>Organisation  :- {{$wo_detail[0]->project->organizations->name}}</h5>
                            </div>
                            <div class=" row col-sm-12 col-md-4"> <h5>Project Name :- {{$wo_detail[0]->project->project_name}}</h5>
                            </div>
                            <div class=" row col-sm-4 col-md-4"> <h5>Project Number  :- {{$wo_detail[0]->project->project_number}}</h5>
                            </div>
                           
                    </div>
                    
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th>Work Order no.</th>
                                    <th>Project Coordinator Name</th>
                                    <th>No. of Resource</th>
                                    <th>Location</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Amount</th>
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
                    @endforeach

                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped">
                        <thead>
                            <tr>
                                <th colspan="7" class="center"> Total Work Orders Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Amount</td>
                                <td colspan="5"></td>
                                <td> INR {{ number_format($overallSum, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                        <div class="col-12 d-flex justify-content-center mt-2">
                            <button id="printButton" class="btn btn-sm btn-primary button" onclick="window.print()">Print List</button>
                        </div>
                        <div class="table-bottom-control"></div>
                    </div>
                </div>
            </div>
        </div>
        <div>


     
</body>
</html>
