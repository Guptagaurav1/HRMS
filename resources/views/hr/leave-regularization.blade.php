@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

@endsection

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Leave Regularization List</h2>
            </div>
            <div class="col-md-12 text-center py-3">
                <label>Select Month :</label><br>
                <input name="startDate" id="startDate" class="date-picker" placeholder="mm-year" />
                <button type="submit" class="btn btn-primary">Check</button>
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
                            <td class="text-center">
                                <a href="{{ route('employee-details') }}"
                                    class="text-primary">PSSPL/DEL/2019-20/0035</a>
                            </td>
                            <td class="text-center">Shakuntala Namdeo</td>
                            <td class="text-center">OPERATION MANAGER.</td>
                            <td class="attributes-column">
                                1234567890 / hr@prakharsoftwares.com
                            </td>
                            <td class="text-center">
                                <div class="mbsc-form-group">
                                    <input type="text" id="multiDatePicker" name="leave_dates"
                                        class="btn btn-sm btn-primary multiDatePicker" style="color: white;"
                                        placeholder="Select Date" autocomplete="off" value="">
                                </div>

                            </td>
                            <td class="text-center">
                                <a href="{{ route('view-letter')}}">
                                    <button type="button" class="btn btn-sm btn-primary">Send Mail</button>
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
<script src={{asset('assets/vendor/js/calenderOpen.js')}}></script>
@endsection