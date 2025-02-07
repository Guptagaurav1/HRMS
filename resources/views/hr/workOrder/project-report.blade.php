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
                    <h2 class="mt-2">Work-Order Project Report</h2>
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
                 
                    <form class="row g-3" method="get" action="{{route('work-order-list')}}">
                        <div class="col-auto">
                            <input type="text" name="search" class="form-control" placeholder="Search" required>
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
                                <th class="srno-column">S.No.</th>
                                <th>Organisation Name</th>
                                <th>Project Name</th>
                                <th>Work Order count</th>
                                <th>Work Order Amount</th>
                                <th>Generate Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($woProjects))
                                @foreach($woProjects as $key => $value)
                                    <tr>
                                        <td class="srno-column">{{$key+1}}</td>
                                        <td>{{$value->project->organizations->name}}</td>
                                        <td>{{$value->project->project_number}}</td>
                                        <td>{{$value->total_wo}}</td>
                                        <td> INR {{ number_format($value->amount, 2) }}</td>
                                      
                                        <td>
                                            <a href="{{route('wo-project-report',$value->project->id)}}" target="_balnk"><button type="submit" class="btn btn-primary mb-3">Generate Report</button></a>
                                        </td>

                                        
                                    </tr>
                                  
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-danger text-center" colspan="12">No Record Found</td>
                                </tr>
                                @endif
                               
                        </tbody>
                    </table>
                    <div>
                        {{ $woProjects->links() }}
                    </div>
                   
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


