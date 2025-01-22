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
                            <tr>
                                <td class="srno-column">Becil</td>
                                <td class="rid-column">BECIL/ND/DRDO/MAN/2425/1323_Extension</td>
                                <td>BECIL/MANPOWER-Agency/Empanelment</td>
                                <td class="attributes-column">14th October, 2024</td>
                                <td>BEGOV21M1203</td>
                                <td>Defence Research & Development Organisation (DRDO)</td>
                                <td>Binay Tiwari</td>
                                <td>19956707</td>
                                <td>19956707</td>
                                <td>14th November, 2024</td>
                                <td>
                                    <a href=""><button type="submit" class="btn btn-primary mb-3"> Download <i class="fa-solid fa-download"></i></button></a>
                                    
                                </td>
                                <td>
                                    <a href="{{route('edit-work-order')}}"><button type="submit" class="btn btn-primary mb-3"> Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a href="{{route('view-work-order')}}"><button type="submit" class="btn btn-primary mb-3"> View <i class="fa-solid fa-eye"></i></button></a><br>
                                    <a href="{{route('go-to-attendance')}}"><button type="submit" class="btn btn-primary mb-3">Go To Attandence</button></a><br>
                                    <a href="{{route('work-order-salary-sheet')}}"><button type="submit" class="btn btn-primary mb-3">Go To Salary Sheet</button></a>
                                    
                                </td>

                               
                                
                            </tr>
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


