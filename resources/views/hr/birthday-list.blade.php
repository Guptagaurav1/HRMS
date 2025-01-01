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
                    <h2 class="mt-2">Upcoming 40 days Birthday List</h2>
                </div>
                <div class="row px-3 mt-2">
                    <div class="col-md-3">
                        {{-- <label class="form-label">Skills <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm"> --}}
                    </div>
                    <div class="col-md-3">
                        {{-- <label class="form-label">Reporting Email</label>
                        <select id="inputState" class="form-select">
                            <option selected>Not Specify</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                        </select>
                        </label> --}}
                    </div>
                   
                </div>
                
                <div class="panel-body">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th class="rid-column">EMP Code</th>
                                <th>Work Order</th>
                                <th class="attributes-column">Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column">PSSPL/2023-24/3380</td>
                                <td>GEMC-511687718522647</td>
                                <td class="attributes-column">ADVANCE PHP,Oracale Database,Oracle Database,SQL Database,HTML,CSS,CORE PHP,JAVA,WORDPRESS,NODE JS,ANGULAR JS,GrapesJs,SDK,Android Studio,Rest Api,MYSQL,Firebase,Indesign,python,Laravel,Mongo DB,Nodejs,Javascript,Golang,PHP,MongoDB,Interpersonal Skill,Vuejs,ReactJs,Negotiation Skill,Communication Skill,Writing Skills,Research Skills,Digital Marketing,dotnet</td>
                                <td>234567890@gmail.com</td>
                                <td>26rd December, 2024</td>
                                <td>No Image</td>
                                
                                <td> 
                                    <a href="#"><button class="btn btn-sm btn-primary">View Template Image</button></a>
                                    <a href="#"><button class="btn btn-sm btn-primary">Send Email</button></a>
                                    
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


