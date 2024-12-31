@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<style>
    button {
    white-space: nowrap; /* Prevents text from wrapping */
}

</style>

@endsection

        
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    
                   
                    <h2 class="mt-2">Employee List</h2>
                </div>
                <div class="row" class="mt-5">
                    <p style="color: red;margin-left:15px; font-size:13px">** Seacrh applicable on Emp Id/Name/Work Order Number/Designation/Contact/Email (Official/ Personal )/Job Place/Qualification</p>

                </div>
                <div class="panel-body">
                    <div class="table-filter-option">
                        <div class="row g-3">
                            <div class="col-xl-10 col-9 col-xs-12">
                                <div class="row g-3">
                                    <div class="col">
                                        
                                            
                                 <button class="btn btn-sm btn-primary w-100">CSV</button>
                                            
                                        
                                    </div>
                                    
                                    <div class="col">
                                        <button class="btn btn-sm btn-primary"><i class="fa-solid fa-key"></i> Send Credential</button>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-2 col-3 col-xs-12 d-flex justify-content-end">
                                <div id="employeeTableLength"></div>
                            </div>
                        </div>
                    </div>
                    
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="markAllEmployee">
                                    </div>
                                </th>
                                
                                <th>Emp Id</th>
                                <th>Name</th>
                                <th>Work Order No</th>
                                <th>Designation</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date Of Joining</th>
                                <th>Job Place</th>
                                <th>Experience</th>
                                <th>Highest Qualification</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th> Send Appointment Letter</th>
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
                                <td>
                                  NGP/23134
                                </td>
                                <td>Developer</td>
                                <td>+1 234 567 890</td>
                                <td>@gmail.com</td>
                                <td>
                                    <span class="address-txt">23 Sept</span>
                                </td>
                                <td>Nagpur</td>
                            <td>3-years</td>
                             <td>Btech</td>
                             <td><span class="active-mark"><i class="fa-regular fa-check"></i></span> Active</td>
                             <td> <a href="{{'edit-employee'}}"><button class="btn btn-sm btn-primary"> <i class="fa-solid fa-pen-to-square"></i> Edit</button></td></a>
                           
                             <td class="d-flex gap-2 flex-column"> 

                                <a href="{{'send-letter'}}"><button class="btn btn-sm btn-primary"> <i class="fa-solid fa-share-from-square"></i> Send Letter</button></a>
                                <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary"> <i class="fa-solid fa-eye"></i> View Letter</button></a>
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
   
        
   
    
   
    