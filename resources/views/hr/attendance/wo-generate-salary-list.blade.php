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
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </symbol>
                    </svg>

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
                                    <th>Leaves Taken</th>
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
                                            
                                            <td>{{$wo_emp->empDetail->emp_code}}</td>
                                            <td>{{$wo_emp->empDetail->emp_name}}</td>
                                            <td><input type="number" name="at_appr_leave" readonly value="{{$wo_emp->approve_leave}}"></td>
                                            <td><input type="number" name="lwp_leave" readonly value="{{$wo_emp->lwp_leave}}"></td>
                                            <td>{{$wo_emp->empDetail->getPersonalDetail->emp_gender??NULL}}</td>
                                            <td>{{$wo_emp->empDetail->getBankDetail->getBankData->name_of_bank??NULL}} \{{$wo_emp->empDetail->getBankDetail->emp_account_no??NULL}}</td>
                                            <td>{{$wo_emp->empDetail->emp_doj??NULL}}</td>
                                            <td>@if($wo_emp->empDetail->emp_dor??NULL) {{$wo_emp->empDetail->emp_dor}} @else N/A @endif</td>
                                            <td>{{$wo_emp->empDetail->emp_place_of_posting??NULL}}</td>
                                            <td>{{$wo_emp->empDetail->emp_designation??NULL}}</td>
                                          
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