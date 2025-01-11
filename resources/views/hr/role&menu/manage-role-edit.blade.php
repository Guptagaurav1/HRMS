@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

@endsection

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Update Role</h3>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="text" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-4 px-3">
                    <label class="form-label">Role Name <span class="text-danger">*</span></label>
                    <select id="inputState" class="form-select">
                        <option selected>Select Role</option>
                        <option>Select 1</option>
                        <option>Select 1</option>
                        <option>Select 1</option>
                    </select>
                </div>
                <div class="col-12 panel_1">
                    <label class="form-label">Select Roles *</label>
                    <div class="table-responsive mt-3 ">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="srno-column">Home.</th>
                                    <th class="rid-column">Master Data</th>
                                    <th>Master Data</th>
                                    <th class="attributes-column">Master Data</th>
                                    <th>Master Data</th>
                                    <th>Master Data</th>
                                    <th>Master Data</th>
                                    <th>Master Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="srno-column">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Home
                                        </label>
                                    </td>
                                    <td class="rid-column"><input class="form-check-input" type="checkbox"
                                            id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Department
                                        </label>
                                    </td>
                                    <td>NA</td>
                                    <td class="attributes-column">NA</td>
                                    <td>Nothing</td>
                                    <td>
                                        NA
                                    </td>
                                    <td>NA</td>
                                    <td>
                                        NA
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end py-4 px-3">
                    <button class="btn btn-sm btn-primary">
                        Update Role <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection