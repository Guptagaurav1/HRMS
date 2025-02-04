@extends('layouts.master')

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Upcoming 40 days Birthday List</h2>
            </div>
           
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
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
                            <td class="attributes-column">ADVANCE PHP,Oracale Database,Oracle Database,SQL
                                
                                Skill,Communication Skill,Writing Skills,Research Skills,Digital Marketing,dotnet</td>
                            <td>234567890@gmail.com</td>
                            <td>26rd December, 2024</td>
                            <td>No Image</td>
                            <td>
                                <a href="{{route('birthday-template')}}"><button class="btn btn-sm btn-primary">View Template Image</button></a>
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
