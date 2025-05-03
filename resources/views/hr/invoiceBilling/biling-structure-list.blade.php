@extends('layouts.master')

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Invoice Billing Structure</h3>
                    <div>
                        <ul class="breadcrumb">
                            <li> 
                                @if (auth()->user()->role->role_name == "hr")
                                <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                                @elseif(auth()->user()->role->role_name == "hr_operations")
                                    <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                                @elseif(auth()->user()->role->role_name == "sales_manager")
                                    <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                                @else
                                @endif
                            </li>
                            <li>Invoice Billing Structure</li>
                        </ul>
                    </div>
                </div>
              
                <div class="col-md-12 d-flex justify-content-start px-3 mt-5">
                    <form class="row g-3" method="get">
                        <div class="col-auto  col-xs-12 mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                           
                        </div>
                        <div class="col-auto col-xs-12">
                        <a href="{{ route('biling-structure-list') }}" class="col-xs-12"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                        </div>
                    </form>
                </div>
                <div class="row">
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
    
                <div class="table-responsive mt-2">
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
                                @forelse($billing_strut as $key => $value)
                                <tr>
                                    <td class="text-center">{{$value->organizations->name}}</td>
                                    <td class="text-center">{{$value->wo_number}}</td>
                                    <td class="attributes-column text-center">{{$value->billing_to}}</td>
                                    <td class="text-center">{{$value->billing_sac_code}}</td>
                                    <td class="text-center">{{$value->billing_gst_no}}	</td>
                                    <td class="text-center">{{strtoupper($value->billing_tax_mode)}}</td>
                                    <td class="text-center">{{$value->billing_tax_rate}}</td>
                                    <td class="text-center">{{strtoupper($value->show_service_charge)}}</td>
                                    <td class="text-center">{{$value->service_charge_rate}}</td>
                                    <td class="attributes-column text-center">{{$value->contact_person}}</td>
                                    <td class="text-center">{{$value->email_id}}</td>
                                    
                                    <td><a href="{{route('edit-billing-structure',$value->id)}}"><button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a></td>
                                </tr>
                                @empty
                                <tr >
                                    <td colspan="5" class="text-center"><span class="text-danger">No Record Found</span></td>
                                </tr>
                                @endforelse
                                <div>
                                {{ $billing_strut->links() }}
                                </div>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>


@endsection

