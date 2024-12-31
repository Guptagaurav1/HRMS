@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>

@endsection

@section('contents')
        

    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h5>View Letter</h5>
                  
                </div>
                <div class="panel-body">
                    {{-- <div class="table-filter-option">
                        <div class="row g-3">
                            <div class="col-xl-10 col-9 col-xs-12">
                                <div class="row g-3">
                                    <div class="col">
                                        
                                            
                                 <button class="btn btn-sm btn-primary w-100">CSV</button>
                                            
                                        
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn btn-sm btn-primary">Send Credential</button>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-2 col-3 col-xs-12 d-flex justify-content-end">
                                <div id="employeeTableLength"></div>
                            </div>
                        </div>
                    </div>
                     --}}
                    <table class="table table-dashed table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="markAllEmployee">
                                    </div>
                                </th>
                                
                                <th>Emp Id</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Document Type</th>
                                <th>Salary</th>
                                <th>Sended On</th>
                                <th>Document</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    ID-1002
                                </td>
                                <td>Gaurav </td>
                                <td>Developer</td>
                                <td>Appointment</td>
                                <td>29991</td>
                                
                                <td>Salary Structure</td>
                            
                           
                             <td> <button class="btn btn-sm btn-primary">View Document</button></td>
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
    <script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
    <script src={{asset('assets/vendor/js/select2.min.js')}}></script>
    <script src={{asset('assets/js/select2-init.js')}}></script>
    
    
    @endsection
   
        
   
    
   
    
