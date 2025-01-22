@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>

@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Recruitment Report</h2>
                </div>
                <div class="row px-3 mb-3">
                    <div class="col-md-12 d-flex justify-content-end ml-5">
                        
                        <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">CSV</button></a>
                        <a href="{{'add-work-order'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Work Order</button></a>
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
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search</button>
                        </div>
                    </form>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Organisation Name</th>
                                <th class="rid-column">Work Order Number</th>
                                <th>Empanelment No.</th>
                                <th class="attributes-column">Issue Date</th>
                                <th>Project Number</th>
                                <th>Project Name</th>
                                <th>Project Coordinator Name</th>
                                <th>Amount</th>
                                <th>Contact Details</th>
                                <th>Added On</th>
                                <th>Attachment</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($workOrdercontacts as $key => $value)
                            <tr>
                                <td class="srno-column">{{$value->wo_oraganisation_name}}</td>
                                <td class="rid-column">{{$value->wo_number}}</td>
                                <td>{{$value->wo_empanelment_reference}}</td>
                                <td class="attributes-column">{{$value->wo_date_of_issue}}</td>
                                <td>{{$value->wo_project_number}}</td>
                                <td>{{$value->wo_project_name}}</td>
                                <td>{{$value->wo_project_coordinator}}</td>
                                <td>{{$value->wo_amount}}</td>
                                <td>{{$value->wo_details}}</td>
                                <td>{{$value->created_at}}</td>
                                <td>
                                    @if(!empty($value->wo_attached_file))
                                        <a href="{{ asset('storage/uploadWorkOrder/' . $value->wo_attached_file) }}"><button type="submit" class="btn btn-primary mb-3" target="_blank"> Download</button></a>
                                    @else
                                        {{ 'Not Uploaded' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('edit-work-order',$value->id)}}"><button type="submit" class="btn btn-primary mb-3"> Edit</button></a>
                                    <a href="{{route('view-work-order',$value->id)}}"><button type="submit" class="btn btn-primary mb-3"> View</button></a><br>
                                    <a href="{{route('go-to-attendance')}}"><button type="submit" class="btn btn-primary mb-3">Go To Attandence</button></a><br>
                                    <a href="{{route('work-order-salary-sheet')}}"><button type="submit" class="btn btn-primary mb-3">Go To Salary Sheet</button></a>
                                    
                                </td>

                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                    <div class="table-bottom-control"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
@endsection


