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
                <h3 class="mt-2">My Team User List ( You Are HR Head )</h3>
              
            </div>
            <p class="px-3 mt-2">Your Team User Listed Below
            </p>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3">
                    <div class="col-auto mb-3">
                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                    
                </form>
            </div>
            
            <div class="table-responsive">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th >Name</th>
                                <th>Email / Contact</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Manish Kumar Pathania</td>
                                <td>manish.pathania@prakharsoftwares.com / 9958466912</td>
                                <td>HR</td>
                                <td>EMPLOYEE</td>
                                <td>15th November, 2024</td>
                            </tr>
                            <tr>
                                <td>Kriti Singhvi</td>
                                <td>kriti.singhvi@prakharsoftwares.com / 9821298777</td>
                                <td>IT</td>
                                <td>EMPLOYEE</td>
                                <td>15th November, 2024</td>
                            </tr>
                            <tr>
                                <td>Mayank Puri</td>
                                <td>mayank.puri@prakharsoftwares.com / 9717368860</td>
                                <td>IT</td>
                                <td>EMPLOYEE</td>
                                <td>14th November, 2024</td>
                            </tr>
                            <tr>
                                <td>Nikhil Baswal</td>
                                <td>nikhil.baswal@prakharsoftwares.com / 9711546517</td>
                                <td>IT</td>
                                <td>EMPLOYEE</td>
                                <td>10th October, 2024</td>
                            </tr>
                            <tr>
                                <td>Nidhi Sharma</td>
                                <td>nidhi.sharma@prakharsoftwares.com / 9654386141</td>
                                <td>HR</td>
                                <td>EMPLOYEE</td>
                                <td>30th September, 2024</td>
                            </tr>
                         
                        </tbody>
                    </table>
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
@endsection
