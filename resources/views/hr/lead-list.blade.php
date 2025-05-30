@extends('layouts.master')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-white mt-2">Lead List</h3>
                
            </div>

            <div class="panel-body">
                <div class="row ">
                    <div class="row  px-3">
                        <div class="row px-2">
                            <div class="col-md-10">
                                <form method="get">
                                    <div class="row">
                                        <div class="col-auto col-xs-12">
                                            <input type="text" name="search" class="form-control" placeholder="Search"
                                                required>
                                        </div>
                                        <div class="col-auto col-xs-12">
                                            <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i
                                                    class="fa-solid fa-magnifying-glass"></i></button>

                                        </div>
                                        <div class="col-auto col-xs-12">
                                            <a href="{{ route('departments.index') }}" class="col-xs-12"><button
                                                    type="button" class="btn btn-primary btn-sm mb-3">Clear <i
                                                        class="fa-solid fa-eraser"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto col-xs-12">
                            
                                <a href="{{ route('add-lead') }}" class="col-xs-12 mx-md-2"><button
                                        type="button" class="btn btn-sm btn-primary">Add Lead <i
                                            class="fa-solid fa-plus"></i></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class='text-center'>Lead Id</th>
                                    <th class='text-center'>Title</th>
                                    <th class='text-center'>Project Name</th>
                                    <th class='text-center'>Deadline</th>
                                    <th class='text-center'>Category</th>
                                    <th class='text-center'>Source</th>
                                    <th class='text-center'>Assigned</th>
                                    <th class='text-center'>Status</th>
                                    <th class='text-center'>Created At</th>
                                    <th class='text-center'>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='text-center'>2595</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'>Research in Environment Division</td>
                                    <td class='text-center attributes-column'><span class="badge text-bg-primary">Primary</span></td> 
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

    @endsection