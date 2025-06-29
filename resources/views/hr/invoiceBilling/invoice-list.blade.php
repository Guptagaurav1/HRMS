@extends('layouts.master')



@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="mt-2">Saved Invoice</h3>
                <div>
                    <ul class="breadcrumb">
                                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Save Invoice</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-12 d-flex justify-content-start mx-3 mt-5">
               <form class="row g-3" method="get">
                        <div class="col-auto col-xs-12 mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-auto col-xs-12">
                        <a href="{{ route('invoice-list') }}" class="col-xs-12"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>

                        </div>
                </form>
            </div>

            <div class="table-responsive mt-3">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="text-center">Invoice Number</th>
                                <th class="text-center">Work Order no.</th>
                                <th class="text-center">Month</th>
                               
                                <th class="text-center">Created</th>
                                <th class="text-center">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($invoices as $value)
                            <tr>
                                <td class="text-center">{{$value->ir_invoice_number}}</td>
                                <td class="text-center">{{$value->ir_wo}}</td>
                                <td class="text-center">{{$value->ir_month}}</td>
                                <td class="text-center">{{$value->created_at}}</td>
                                <td class="text-ceter"><a href="{{route('tax-invoice',[$value->ir_wo,$value->ir_month])}}"><button class="btn btn-sm btn-primary">View  <i class="fa-solid fa-eye"></i></button></a><span class="text-danger px-2">Not Saved Invoice</span></span></td>
                            </tr>
                            @empty
                                <tr >
                                    <td colspan="5" class="text-center"><span class="text-danger">No Record Found</span></td>
                                </tr>
                            @endforelse
                            <div>
                          
                            </div>
                           
                        </tbody>
                    </table>
                </div>
                
                <div class="col-md-12 my-2">
                        {{ $invoices->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

