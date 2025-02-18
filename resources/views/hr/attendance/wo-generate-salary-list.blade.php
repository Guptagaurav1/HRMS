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
                    <h2 class="mt-2">Salary Calculated</h2>
                </div>
                <div class="row d-flex  justify-content-between mt-1" id="">
                    <div class="col-md-6 px-3 workcenter ">
                        <label>Work Order Number :  {{$wo_number}}</label>
                        
                    </div>
                    <div class="col-md-2 workcenter">
                        <label>Total Entry</label>
                        <span>Entry: 0</span>
                    </div>
                  
                </div>
              
                <div class="col-sm-6 col-md-12 py-2 mt-3 text-center">
                    <p class="fw-bold fs-6 work-order-No">
                    View Attendance for Work order : {{$wo_number}}<br>
                        <span>Work order: {{$wo_number}}</span>
                    </p>
                </div>
                <form method="get" action="{{ route('wo-generate-salary')}}" >
                    <div class="col-md-12 text-center py-3 ">
                        <label>Select Month : {{$m_y}}</label><br>
                           <h4>Salary Calculated</h4>
                        </div>
                   
                   
                    <div class="col-md-12 d-flex justify-content-start mx-3 mt-3">
                        <div class="col-auto">
                            <input name="search" type="text" class="form-control" placeholder="Search" >
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search</button>
                        </div>
                    </div>
                </form>
                <div class="row px-3 mt-2">
                @if($message = Session::get('success'))
                <div class="col-md-12">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                         <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                         {{ $message }}
                        </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                @if($message = Session::get('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="12" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{$message}}
                        </div>
                     
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                </div>
                <div class="table-responsive">
                  
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    
                                    <th class="rid-column">Emp. Code</th>
                                    <th>Name</th>
                                    <th>Approved Leave</th>
                                    <th>LWP</th>
                                    <th>Gender</th>
                                    <th>Bank Name / Account No</th>
                                    <th>Joining Date</th>
                                    <th>DOR</th>
                                    <th>Posting Place</th>
                                    <th>Designation</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                @if(!empty($wo_emps) && ($wo_emps != ' ') )
                                @foreach($wo_emps as $wo_emp)
                                <tr>
                                            
                                            <td>{{$wo_emp->emp_code}}</td>
                                            <td>{{$wo_emp->emp_name}}</td>
                                            <td><input type="number" name="at_appr_leave" readonly value="{{$wo_emp->approve_leave}}"></td>
                                            <td><input type="number" name="lwp_leave" readonly value="{{$wo_emp->lwp_leave}}"></td>
                                            <td>{{$wo_emp->emp_gender}}</td>
                                            <td>{{$wo_emp->emp_bank}} \{{$wo_emp->emp_account_no}}</td>
                                            <td>{{$wo_emp->emp_doj}}</td>
                                            <td>@if($wo_emp->emp_dor) {{$wo_emp->emp_dor}} @else N/A @endif</td>
                                            <td>{{$wo_emp->emp_place_of_posting}}</td>
                                            <td>{{$wo_emp->emp_designation}}</td>
                                          
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                        <td class="text-danger text-center" colspan="12">No Record Found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- @if(!empty($wo_emps) && ($wo_emps != ' ')) -->
                        <div>
                            {{ $wo_emps->links() }}
                        </div>
                       
                        <!-- @endif -->
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
<script src={{asset('assets/vendor/js/calenderOpen.js')}}></script>

@endsection