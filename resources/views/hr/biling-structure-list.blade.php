@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Invoice Billing Structure</h3>
    
    
                </div>
                <p class="px-3 mt-2">Billing Structure</p>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto mb-3">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
    
                    </form>
                </div>
    
                <div class="table-responsive">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Client Name</th>
                                    <th class="text-center">Work Order no.</th>
                                    <th class="text-center">Billing To</th>
                                   
                                    <th class="text-center">SAC CODE</th>
                                    <th class="text-center">Billing GST No</th>
                                    <th class="text-center">Billing Tax Code</th>
                                    <th class="text-center">Billing Tax Rate(%)</th>
                                    <th class="text-center">Show Service Charge</th>
                                    <th class="text-center">Service Charge Rate (%)</th>
                                    <th class="text-center">Contact Person</th>
                                    <th class="text-center">Contact Email</th>
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
                                    <td>IGST</td>
                                    <td>18</td>
                                    <td>No</td>
                                    <td>0%</td>
                                    <td>Mr. Awadhesh Pandit (Deputy General Manager -Finance & Accounts)</td>
                                    <td>panditmd@becil.com</td>
                                    <td><a href="{{route('update-billing-structure')}}"><button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a></td>
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

