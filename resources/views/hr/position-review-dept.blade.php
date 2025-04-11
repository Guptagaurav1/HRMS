@extends('layouts.master')


   
</style>
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header ">
                    <h4>Position Review Department</h4>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Req Id</th>
                                <th class="rid-column">Total Requirements</th>
                                <th>Position Title</th>
                                <th>Client Name</th>
                                <th>Position Request Date</th>
                                <th>Date of Fulfillment</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>Completed Requirements</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="srno-column">1</td>
                                <td class="rid-column">5</td>
                                <td>Front End Developer</td>
                                <td>Zepto</td>
                                <td>10-02-2023</td>
                                <td>10-02-2024</td>
                                <td>IT</td>
                                <td>Faridabad</td>
                                <td>Done</td>
                                <td><span class="badge alert-success">Not Active</span></td> <!-- Fixed closing tag -->
                            </tr>
                        </tbody>
                    </table>
                   
                </div>
               
            </div>
            <div class="text-end mt-3 px-2">
                <a href="{{route('position-request')}}">
                <button class="btn btn-sm btn-primary">
                    Create New PR <i class="fa-solid fa-square-plus"></i>
                </button>
                </a>
                </div>
        </div>
    </div>
@endsection


