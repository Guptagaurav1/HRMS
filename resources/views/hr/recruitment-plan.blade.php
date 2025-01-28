@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />

@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="text-white mt-2">Recruitment Plan</h3>
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
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Sr No.</th>
                                <th class="rid-column">Req id.</th>
                                <th>No. Of Position</th>
                                <th class="attributes-column">Position Title</th>
                                <th>Client Name</th>
                                <th>Date Needed</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>Attachment</th>
                                <th>Assigned Status</th>
                                <th>Action</th>
                                <th>Assign To</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column">R-5</td>
                                <td>HR_OPERATIONS</td>
                                <td class="attributes-column">Home, Recruitment Report, Recruitment List, Compose Mail, User Job Position RList</td>
                                <td>2022-04-26 15:12:35</td>
                                <td>HR_OPERATIONS</td>
                                <td>HR_OPERATIONS</td>
                                <td>HR_OPERATIONS</td>
                                <td>Download <a href> <i class="fa-solid fa-download"></i></a></td>
                               <td class="text-center"> <span class="badge bg-success">Success</span></td>
                                <td> 
                                    <a href="{{'recruitment-plan-page-summary'}}"><button class="btn btn-sm btn-primary">View  <i class="fa-solid fa-eye"></i></button></a>
                                  
                                </td>
                                <td colspan="3"> 
                                    <select id="inputState" class="form-select">
                                        <option selected>Not Selected</option>
                                        <option>Select 1</option>
                                        <option>Select 1</option>
                                        <option>Select 1</option>
                                    </select>
                                    <a href="#"><button class="btn btn-sm btn-primary mt-2 px-5" >Assign <i class="fa-solid fa-list-check"></i></button></a>
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


