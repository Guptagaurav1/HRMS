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
                <h3 class="mt-2">Employee Credenial Log</h3>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3 mt-3">
                <form class="row g-3">
                    <div class="col-auto ">

                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                </form>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="srno-column">ID.</th>
                            <th class="rid-column">Emp Code</th>
                            <th>Name</th>
                            <th class="attributes-column">Work Order</th>
                            <th>Email</th>
                            <th>Sent Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="srno-column">1</td>
                            <td class="rid-column">PSSPL/2022-23/2382</td>
                            <td>Ghanshyam Kumar</td>
                            <td class="attributes-column">BECIL/CG/CMSCL/MAN/2425/1367</td>
                            <td>sonukksahu20@gmail.com</td>
                            <td>
                                27th December, 2024
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