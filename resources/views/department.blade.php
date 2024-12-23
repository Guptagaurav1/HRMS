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
                    <h5>Department</h5>
                </div>
                <div class="row px-3 mt-2">
                    <div class="col-md-3">
                        <label class="form-label">Department<span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm">
                       
                        

                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Skills</label>
                        <select id="inputState" class="form-select">
                            <option selected>Select</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                        </select>

                        </label>
                        
                    </div>
                    <div class="col-md-6">
                        <a href="#"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Department</button></a>
                        
                    </div>
                </div>
                
                <div class="panel-body">
                   
                    
                    
                    <table class="table table-dashed table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                
                                
                                <th>Sr No.</th>
                                <th>Department</th>
                                
                                
                                <th>Action</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>HR</td>
                             <td> 
                                <a href="{{'send-letter'}}"><button class="btn btn-sm btn-primary">Edit </button></a>
                                <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary">Delete</button></a>
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
<script src={{asset('assets/vendor/js/jquery-ui.min.js')}}></script>
<script src={{asset('assets/vendor/js/select2.min.js')}}></script>
<script src={{asset('assets/js/select2-init.js')}}></script>


@endsection
   
        
   
    
   
    
