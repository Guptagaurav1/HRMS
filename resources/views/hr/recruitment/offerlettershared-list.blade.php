@extends('layouts.master', ['title' => 'Offer Letter Shared List'])

@section('style')

<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
<style>
    .alert-success {
    color: #fff;
    background-color: rgba(38, 185, 154, .88);
    border-color: rgba(38, 185, 154, .88);
}
</style>

@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header ">
                    <h4 class=" mt-2 text-center">Offer Letter Shared Candidate List</h4>
                </div>
                <div class="row px-3 mt-2">
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
                                <th class="srno-column">S No.</th>
                                <th class="rid-column">Name</th>
                                <th>Contact Details</th>
                                <th class="attributes-column">Job Position</th>
                                <th>Client Name</th>
                                <th>Location</th>
                                <th>Experience</th>
                                <th>Recruitment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $record)
                            <tr>
                                <td class="srno-column">{{$loop->iteration}}</td>
                                <td class="rid-column">{{$record->firstname." ".$record->lastname}}</td>
                                <td>{{$record->email." / ".$record->phone}}</td>
                                <td>{{$record->job_position}}</td>
                                <td>{{$record->getPositionDetail ? $record->getPositionDetail->client_name : ''}}</td>
                                <td> 
                                    {{$record->location}}
                                </td>
                                <td>{{$record->experience}}</td>
                                <td>
                                    @if($record->recruitment_status == 0)
                                    <span class="badge alert-success">Recruitment Process</span>
                                    @else
                                    <span class="badge alert-info">Direct Process</span>
                                    @endif
                                </td>
                                <td><a href="{{route('applicant-recruitment-details-summary', ['rec_id' => $record->id, 'position' => $record->pos_req_id])}}"><button class="btn btn-sm btn-primary">View  <i class="fa-solid fa-eye"></i></button></a></td>
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


