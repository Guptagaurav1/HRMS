@extends('layouts.master')

@section('contents')
<div class="fluid-container">
    <div class="row" id="tab-1">
        <div class="">
            <h2>Generate Invoice</h2>
            <h5>Work Order Hierarchy</h5>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="text-white">Create Invoice</h3>
                    <div>
                    <ul class="breadcrumb">
                                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Create Invoice</li>
                    </ul>
                </div>
                </div>

                <div class="panel-body">
                    <form action="{{route('invoice-details')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-12 col-md-12">
                                <label class="form-label">Client Name (Organisation) <span class="text-danger">*</span></label>
                                <select class="form-select" id="organisation" name="organisation" required>
                                    <option selected>Select Organisation</option>
                                    @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-4">
                                <label class="form-label">Work Order <span class="text-danger">*</span> <span class="text-danger text-wrap">(Show Only Billing
                                        Structure
                                        completed Work Order)</span></label>
                                <select id="workOrder" name="workOrder" class="form-select" required>
                                    <option selected>Select Work-Order</option>

                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 mt-4">
                                <label class="form-label">Select Month <span class="text-danger">*</span></label>
                                <input name="month" id="month" class="date-picker month_year" placeholder="mm-year"
                                    value="" required />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="form-label">Work Order No: </label>
                                <input type="text" readonly class="form-control form-control-sm" id="work_order">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Project Number: </label>
                                <input type="text" readonly class="form-control form-control-sm" id="project_no">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date Of Issue: </label>
                                <input type="date" readonly class="form-control form-control-sm" id="date_of_issue">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label class="form-label">No. Of Resources: </label>
                                <input type="number" readonly id="wo_resources" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Start Date: </label>
                                <input type="date" readonly class="form-control form-control-sm" id="start_date">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">End Date: </label>
                                <input type="date" readonly class="form-control form-control-sm" id="end_date">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-3 gap-3">
                            <div>

                               <a href=""> <button type="button" class="btn btn-sm btn-secondary"> Cancel
                                    </button></a>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary"> Check Invoice </button>
                            </div>
                            
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-12">
            <div class="panel">
                <div class="row">
                    @if(!empty($attend_rows))
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <strong class="red"> <span class="text-danger">No. of Attendance Generated Employee Of is -
                                {{$attend_rows}} </span></strong>
                    </div>
                    @endif

                    @if(!empty($sal_rows))
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <strong class="red"><span class="text-danger">Total No. of Salary calculated Employee Of is - {{
                                $sal_rows}} </span></strong>
                    </div>
                    @endif
                </div>
                @if(!empty($data_qry))
                <div>Selected Month:{{$month??NULL}}</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="col-sm-12">
                            <table
                                class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
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
                                    @forelse($data_qry as $key => $value)
                                    <tr>
                                        <td>{{$value->project->organizations->name}}</td>
                                        <td>{{$value->wo_number}}</td>
                                        <td>{{$month}}</td>
                                        <td>{{$value->project->project_name}}</td>
                                        <td>09</td>
                                        <td><a href="{{route('tax-invoice',[$value->wo_number,$month])}}"><button
                                                    class="btn btn-sm btn-primary"> <i class="fa fa-download"></i> View
                                                    Invoice</button></a></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center"><span class="text-danger">No Record
                                                Found</span></td>
                                    </tr>
                                    @endforelse
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

  <script src="{{asset('assets/js/hr/project.js')}}"></script>
 @endsection