@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Upcoming 40 days Work Anniversary List</h2>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3 mt-3">
                <form class="row g-3 py-2 mt-2">
                    <div class="col-auto ">
                        <input type="search" class="form-control" placeholder="Search" name="search" >
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('work-anniversary-wish-log')}}" class="btn btn-primary mb-3">Reset</a>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="srno-column">S.No.</th>
                            <th class="rid-column">EMP Code</th>
                            <th>Work Order</th>
                            <th class="attributes-column">Name</th>
                            <th>Email</th>
                            <th>Date of Joining</th>
                            <th>Year Completed</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="srno-column">1</td>
                            <td class="rid-column">PSSPL/2023-24/3380</td>
                            <td>GEMC-511687718522647</td>
                            <td class="attributes-column">ADVANCE PHP,Oracale Database,Oracle Database,SQL
                                Database,HTML,CSS,CORE PHP,JAVA,WORDPRESS,NODE JS,ANGULAR JS,GrapesJs,SDK,Android
                                Studio,Rest Api,MYSQL,Firebase,Indesign,python,Laravel,Mongo
                                DB,Nodejs,Javascript,Golang,PHP,MongoDB,Interpersonal Skill,Vuejs,ReactJs,Negotiation
                                Skill,Communication Skill,Writing Skills,Research Skills,Digital Marketing,dotnet</td>
                            <td>234567890@gmail.com</td>
                            <td>26rd December, 2024</td>
                            <td>2</td>
                            <td>No Image</td>
                            <td>
                                <a href="{{route("work-anniversary-list-template")}}"><button class="btn btn-sm btn-primary">View Template Image</button></a>
                                <a href="#"><button class="btn btn-sm btn-primary">Send Email</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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