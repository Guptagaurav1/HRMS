@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>

@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">WorkOrder Report</h2>
                </div>
                <div class="row px-3 mb-3">
                    <div class="col-md-12 d-flex justify-content-end ml-5">
                        
                        <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">CSV</button></a>
                        <a href="{{'add-work-order'}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Work Order</button></a>
                    </div>
                </div>
                <div class="row px-3 mt-2">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @else
                        <div class="alert alert-error alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                <div class="col-md-12 d-flex justify-content-start px-2">
                    <form class="row g-3" method="get">
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-12 col-md-2">
                                <label class="form-label">Organisation <span class="text-danger">*</span></label>
                                <select name="organisation"  id="organisation"  class="form-select" style="min-width: 150px;">
                                    <option value="">--Select Organisation--</option>
                                    @foreach($organization as $key => $organization_data)
                                        <option value="{{$organization_data->id}}" @if ($organization_data->id == old('organisation')) selected @endif>
                                        {{ $organization_data->name }}</option>
                                    @endforeach
                                </select>
                                @error('organisation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label class="form-label text-wrap"> Project Name <span class="text-danger">*</span></label>
                                <select name="project_name" id="project_name" class="form-select" value="{{$project_name}}" style="min-width: 150px;"></select>
                                @error('project_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <label for="start_date">Start date</label>
                                <input type="date" name="start_date" value="{{$woStart}}" class="form-control" >
                            </div>
                            <div class="col-sm-12 col-md-2 fix">
                                <label for="end_date">End date</label>
                                <input type="date" name="end_date" value="{{$woEnd}}" class="form-control"  >
                            </div>
                            <div class="col-sm-12 col-md-3 mt-4">
                                <label for="end_date"></label>
                                <button type="submit" class="btn btn-primary mb-3">Filter <i class="fa-solid fa-magnifying-glass"></i></button>
                                <a href="{{ route('work-order-list') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12 d-flex justify-content-start px-2">
                    <form class="row g-3" method="get">
                        <div class="col-auto mb-3">
                            <input type="text" name="search" value="{{ $searchValue }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                            <a href="{{ route('work-order-list') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                        </div>
                    </form>
                </div>
              
               
                <div class="table-responsive">
                    <form method="post" action="{{ route('work-order-report')}}" >
                        @csrf
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="">
                                <thead>
                                    <tr>
                                    <th ><input type="checkbox" name=checkAll></th>
                                        <th class="srno-column">Organisation Name</th>
                                        <th class="rid-column">Work Order Number</th>
                                        <th>Empanelment No.</th>
                                        <th class="attributes-column">Issue Date</th>
                                        
                                        <th>Project Number</th>
                                        <th>Project Name</th>
                                        <th>Project Coordinator Name</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Amount</th>
                                        
                                        <th>Contact Details</th>
                                        <th>Added On</th>
                                        <th>Attachment</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($totalWorkOrders as $value)
                                    <tr>
                                        <td><input type="checkbox" name=checkbox[] value="{{$value->id}}" ></td>
                                        <td class="srno-column">{{$value->project->organizations->name}}</td>
                                        <td class="rid-column">{{$value->wo_number}}</td>
                                        <td>{{$value->project->empanelment_reference}}</td>
                                        <td class="attributes-column">{{$value->wo_date_of_issue}}</td>
                                    
                                        <td>{{$value->project->project_number}}</td>
                                        <td>{{$value->project->project_name}}</td>
                                        <td>{{$value->wo_project_coordinator}}</td>
                                        <td>{{$value->wo_start_date}}</td>
                                        <td>{{$value->wo_end_date}}</td>
                                        <td>{{$value->wo_amount}}</td>
                                        
                                        <td>{{ $value->contacts_details }}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td>@if(!empty($value->wo_attached_file))
                                                <!-- <a href="{{ asset('storage/uploadWorkOrder/' . $value->wo_attached_file) }}"  target="_blank" class="btn btn-primary mb-3">Download</a> -->
                                                <a href="{{ asset('storage/uploadWorkOrder/' . $value->wo_attached_file) }}" target="_blank" class="btn btn-primary mb-3">Download</a>
                                            @else
                                                {{ 'Not Uploaded' }}
                                            @endif</td>
                                        <td><a href="{{route('edit-work-order',$value->id)}}" class="btn btn-primary mb-3">Edit</a>
                                        <a href="{{route('view-work-order',$value->id)}}" class="btn btn-primary mb-3"> View</a><br> 
                                        <a href="{{route('go-to-attendance',$value->id)}}" class="btn btn-primary mb-3">Go To Attandence</a><br> 
                                        <a href="{{route('work-order-salary-sheet')}}" class="btn btn-primary mb-3">Go To Salary Sheet</a></td>
                                    </tr>
                                    @empty
                                    <tr >
                                        <td colspan="15" class="text-center"><span class="text-danger">No Record Found</span></td>
                                    </tr> 
                                    @endforelse
                                
                            
                                </tbody>
                            </table>
                            <div class="text-end">
                                {{ $totalWorkOrders->links() }}
                            </div>
                        </div>
                        <div calss="mt-3 md-3">
                             <button class="btn btn-primary" target="_balnk" type ="submit">Generate Work-Order Report</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
<script src="{{asset('assets/js/hr/work-order.js')}}"></script>
<script>
    
</script>
@endsection


