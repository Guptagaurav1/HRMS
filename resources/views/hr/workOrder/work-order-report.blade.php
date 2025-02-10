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
                        <h2 class="mt-2">Generate Report</h2>
                        <div class=" px-2 mt-4">
                            @if($project_details)
                            <div class="row col-sm-4 col-md-4"> <h5>Organisation  :- {{$project_details->organizations->name}}</h5>
                            </div>
                            <div class=" row col-sm-4 col-md-4"> <h5>Project Name :- {{$project_details->project_name}}</h5>
                            </div>
                            <div class=" row col-sm-4 col-md-4"> <h5>Project Number  :- {{$project_details->project_number}}</h5>
                            </div>
                            @endif
                        </div>
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
                                @if(!empty($woReport))
                                    @foreach($woReport as $key => $value)
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
                                    @else
                                    <tr>
                                        <td class="text-danger text-center" colspan="12">No Record Found</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>Total Amount</td>
                                        <td colspan="5"></td>
                                        <td> INR {{ number_format($totalAmount, 2) }}</td>
                                    </tr>
                            </tbody>
                        </table>
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
