@extends('layouts.master')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-white mt-2">Project List</h3>
                
            </div>

            <div class="panel-body">
                <div class="row ">
                    <div class="row mt-3 px-3">
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
                                            <a href="" class="col-xs-12"><button
                                                    type="button" class="btn btn-primary btn-sm mb-3">Clear <i
                                                        class="fa-solid fa-eraser"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto col-xs-12">
                            
                                <a href="{{ route('create-new-client') }}" class="col-xs-12 mx-md-2"><button
                                        type="button" class="btn btn-sm btn-primary">Add New Project <i
                                            class="fa-solid fa-plus"></i></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class='text-center'>Project Id</th>
                                    <th class='text-center'>Project Name</th>
                                    <th class='text-center'>Client Name</th>
                                    <th class='text-center'>Proforma Invoice</th>
                                    <th class='text-center'>No. of Requirement</th>
                                    <th class='text-center'>Decision Maker Name/Email/Contact</th>
                                    <th class='text-center'>Amount</th>
                                    <th class='text-center'>Added By</th>
                                    <th class='text-center'>Added On</th>
                                    <th class='text-center'>Status</th>
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
                                    <td>
                                        <div class="d-flex gap-3">
                                           <a href="{{route('edit-new-client')}}"><button type="submit" class="btn btn-sm btn-primary">Edit</button></a>
                                           <a href="{{route('view-client')}}"> <button type="submit" class="btn btn-sm btn-primary">View</button></a>
                                               <a href="{{route('add-lead')}}"> <button type="submit" class="btn btn-sm btn-primary">Add Lead</button></a>
                                        </div>
                                        
                                    </td>
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