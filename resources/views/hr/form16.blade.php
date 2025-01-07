@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Form 16 List</h3>
    
    
                </div>
                <p class="px-3 mt-2">Billing Structure</p>
                <div class="col-md-12 d-flex justify-content-end ">
                   <a href="{{route('add-new-form16')}}"><button type="button" class="btn btn-primary m-1">Add New Form 16</button></a> 
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto mb-3">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search</button>
                        </div>
    
                    </form>
                </div>
    
                <div class="table-responsive">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SNO.</th>
                                    <th class="text-center">Employee Code</th>
                                    <th class="text-center">Employee Name</th>
                                   
                                    <th class="text-center">Work Order</th>
                                    <th class="text-center">PAN No.</th>
                                    <th class="text-center">Financial Year</th>
                                    <th class="text-center">Added On</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Shefali Tiwari</td>
                                    <td>PSSPL/2023-24/s</td>
                                    <td>BECIL/ND/ECI/MAN/2425/1339_Extension</td>
                                    <td>AUBPT4061F</td>
                                    <td>2023-2024</td>
                                    <td>8th November, 2024</td>
                                    
                                    <td><a href=""><button class="btn btn-sm btn-primary">View Document</button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
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