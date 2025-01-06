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
                <h2 class="mt-2">Leave Regularization List</h2>
            </div>
            <div class="col-md-12 text-center py-3 ">
                <label>Select Month :</label><br>
                <input type="text" name="birthday" value="10/24/1984" />
                <button type="submit" class="btn btn-primary">Chec</button>
            </div>
            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 mt-2">
                    <div class="col-auto mb-3">
                        <input type="text" class="form-control" placeholder="Search" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">Emp Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Contact Details</th>
                            <th class="text-center">Leave Dates</th>
                            <th class="text-center">Send Mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">PSSPL/DEL/2019-20/0035 </td>
                            <td class="text-center">Shakuntala Namdeo</td>
                            <td class="text-center">OPERATION MANAGER.</td>
                            <td class="attributes-column">
                                1234567890 / hr@prakharsoftwares.com
                            </td>
                            <td class="text-center">
                                <a href="{{'view-letter'}}">
                                    <button class="btn btn-sm btn-primary">Select Dates</button>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{'view-letter'}}">
                                    <button class="btn btn-sm btn-primary">Send Mail</button>
                                </a>
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