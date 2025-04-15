@extends('layouts.master', ['title' => 'Offer Letter Shared List'])



@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header ">
                    <h4 class=" mt-2 text-center">Offer Letter Shared Candidate List</h4>
                    <div>
                            <ul class="breadcrumb">
                                <li> @if (auth()->user()->role->role_name="hr")
                                   <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                @endif
                                </li>
                                <li>Offer Letter Shared List</li>
                            </ul>
                    </div>

                </div>

                <div class="col-md-12 d-flex justify-content-start mx-3">
                        <form class="row g-3 mt-4">
                            <div class="col-auto col-xs-12">
                                <input type="search" class="form-control" placeholder="Search" name="search" value="" required>
                            </div>
                            <div class="col-auto col-xs-12">
                                <button type="submit" class="btn btn-primary  mb-3"> Search <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                            <div class="col-auto col-xs-12">
                                <a href="" class="btn btn-primary  mb-3"> Clear </a>
                                        
                            </div>
                        </form>
                    </div>
                <div class="row px-3 mt-1">
                    <div class="col-md-3">
                        {{-- <label class="form-label">Skills <span style="color: red">*</span></label>
                            <input type="text" class="form-control form-control-sm"> --}}
                    </div>
                    <div class="col-md-3">
                        {{-- <label class="form-label">Reporting Email</label>
                        <select id="inputState" class="form-select">
                            <option selected>Not Specify</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                            <option>Select 1</option>
                        </select>
                        </label> --}}
                    </div>
                    <div class="col-md-6">
                        {{-- <a href="{{'view-letter'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Skills</button></a> --}}
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column text-center">S No.</th>
                                <th class="rid-column text-center">Name</th>
                                <th class="text-center">Contact Details</th>
                                <th class="attributes-column text-center">Job Position</th>
                                <th class="text-center">Client Name</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Experience</th>
                                <th class="text-center">Recruitment Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $record)
                            <tr>
                                <td class="srno-column text-center">{{$loop->iteration}}</td>
                                <td class="rid-column text-center">{{$record->firstname." ".$record->lastname}}</td>
                                <td class="text-center attributes-column">{{$record->email." / ".$record->phone}}</td>
                                <td class="text-center">{{$record->job_position}}</td>
                                <td class="text-center">{{$record->getPositionDetail ? $record->getPositionDetail->client_name : ''}}</td>
                                <td class="text-center"> 
                                    {{$record->location}}
                                </td>
                                <td class="text-center">{{$record->experience}}</td>
                                <td class="text-center">
                                    @if($record->recruitment_status == 0)
                                    <span class="badge alert-success">Recruitment Process</span>
                                    @else
                                    <span class="badge alert-info">Direct Process</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if(auth()->user()->hasPermission('applicant-recruitment-details-summary'))
                                    <a href="{{route('applicant-recruitment-details-summary', ['rec_id' => $record->id, 'position' => $record->pos_req_id])}}"><button class="btn btn-sm btn-primary">View  <i class="fa-solid fa-eye"></i></button></a>
                                    @endif
                                </td>

                            </tr>
                            @empty
                                <tr>
                                    <td class="td text-danger text-center" colspan="9">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12 d-flex justify-content-center my-2">
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection


