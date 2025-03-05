@extends('layouts.master')
@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="fluid-container">
    <div class="row" id="tab-1">
        <div class="">
            <h2>Generate Invoice</h2>
            <h5>Work Order Hierarchy</h5>
        </div>
        <form action="{{route('invoice-details')}}" method="post">
            @csrf
            <div class="col-12">
                <div class="panel">
                    <div class="panel-header">
                        <h5 class="text-white">Create Invoice</h5>
                    </div>
                
                    <div class="panel-body">
                        <div class="row g-3">
                            <div class="col-sm-12 col-md-12">
                                <label class="form-label">Client Name (Organisation)</label>
                                <select  class="form-select" id="organisation" name="organisation">
                                    <option selected>Select Organisation</option>
                                    @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-4">
                                <label class="form-label">Work Order <span class="text-danger">(Show Only Billing Structure
                                        completed Work Order)</span></label>
                                <select id="workOrder" name="workOrder" class="form-select">
                                    <option selected>Select Data</option>
                                    
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-4">
                                <label class="form-label">Select Month</label>
                                <input name="month" id="month" class="date-picker month_year " placeholder="mm-year" value="" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="form-label">Work Order No: <span style="color: red">*</span></label>
                                <input type="text" readonly class="form-control form-control-sm" id="work_order">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Project Number: <span style="color: red">*</span></label>
                                <input type="text" readonly class="form-control form-control-sm" id="project_no">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date Of Issue: <span style="color: red">*</span></label>
                                <input type="date" readonly class="form-control form-control-sm" id="date_of_issue">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="form-label">No. Of Resources: <span style="color: red">*</span></label>
                                <input type="number" readonly id="wo_resources"  class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Start Date: <span style="color: red">*</span></label>
                                <input type="date" readonly class="form-control form-control-sm" id="start_date">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">End Date: <span style="color: red">*</span></label>
                                <input type="date" readonly class="form-control form-control-sm" id="end_date">
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary"> Check Invoice <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </form>
        <div class="col-12">
            <div class="panel">
                <div class="row">
                    @if(!empty($attend_rows))
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <strong class="red"> <span class="text-danger">No. of Attendance Generated Employee Of is - {{$attend_rows}} </span></strong>
                    </div>
                    @endif
                     
                    @if(!empty($sal_rows))
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <strong class="red"><span class="text-danger">Total No. of Salary calculated Employee Of  is - {{ $sal_rows}} </span></strong>
                    </div>
                    @endif
                </div>
                    @if(!empty($data_qry))
                        <div>Selected Month:{{$month??NULL}}</div>
                
                        <div class="panel-body">
                        <div class="table-responsive">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                id="allEmployeeTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Organisation</th>
                                        <th class="text-center">Work Order</th>
                                        <th class="text-center">Month </th>
                                        <th class="text-center">End User</th>
                                        <th class="text-center">Invoice Number</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Becil</td>
                                        <td>BECIL/CG/CMCSL/MAN/2021/511</td>
                                        <td>Broadcast Engineering Consultant India Limited (BECIL)</td>
                                        <td>09</td>
                                        <td>09AAACB2575L1ZG	</td>
                                        <td><a href="{{route('update-billing-structure')}}"><button class="btn btn-sm btn-primary"> <i class="fa fa-download"></i> View Invoice</button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                    
            </div>
        </div>
               
    </div>
</div>
@endsection

@section('script')
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>
<script src={{asset('assets/js/tab-changes.js')}}></script>
<script src={{asset('assets/vendor/js/calenderOpen.js')}}></script>
<script>
     // project and organisation onchange get datails in add work-order 
     $('#organisation').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                url: 'organisation-workOrder/' + selectedValue, // Route URL with parameter
                type: 'GET',
                success: function(response) {
                    let dropdown = $("#workOrder");
                    dropdown.empty();
                    dropdown.append('<option value="">Select a Project</option>');
                    let workOrders = response.data;
                    // Loop through response and append to dropdown
                    $.each(workOrders, function(key, workOrder) {
                        dropdown.append('<option value="' + workOrder.wo_number + '">' + workOrder.wo_number + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        } 
    });
    $('#workOrder').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue) {
            $.ajax({
                url: 'workOrder-details/' + selectedValue, // Route URL with parameter
                type: 'GET',
                success: function(response) {
                  
                    let wo_number =response.data.wo_number;
                    let project_number =response.data.project.project_number;
                    let wo_resources =response.data.wo_no_of_resources;
                    let wo_date_of_issue =response.data.wo_date_of_issue;
                    let wo_start_date =response.data.wo_start_date;
                    let wo_end_date =response.data.wo_end_date;
                    $('#work_order').val(wo_number);
                    $('#project_no').val(project_number);
                    $('#wo_resources').val(wo_resources);
                    $('#start_date').val(wo_start_date);
                    $('#end_date').val(wo_end_date);
                    $('#date_of_issue').val(wo_date_of_issue);
                    
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        } 
    });
    // project and organisation onchange get datails in add work-order end here

</script>
 @endsection