@extends('layouts.master', ['title' => 'Update Details Request List'])


@section('contents')

<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header ">
                    <h3 class="mt-2 text-center" >Profile Detail Change Request Log</h3>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3 mt-2">
                        <div class="col-auto">
                            <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('profile.profile-detail-request-list')}}" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></a>
                        </div>
                    </form>
                </div>
                <div class="table-responsive mt-3 ">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Request ID</th>
                                <th class="rid-column">Change Request for</th>
                                <th>Changes Detail</th>
                                <th class="attributes-column">Assigned To</th>
                                <th>Requested On</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($requests as $request)
                            <tr>
                                <td class="srno-column">{{$request->req_id}}</td>
                                <td class="rid-column">{{$request->changedColumn->name}}</td>
                                <td class="text-wrap">{{$request->description}}</td>
                                <td class="attributes-column">{{$request->assigned_to}}</td>
                                <td>{{date('jS F, Y', strtotime($request->created_at))}}</td>                        
                                <td><span class="badge text-bg-success">{{$request->status}}</span></td>   
                            </tr>
                            @empty
                                <tr>
                                    <td class="text-danger text-center" colspan="6">No record found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

