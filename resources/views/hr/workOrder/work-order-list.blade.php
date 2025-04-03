@extends('layouts.master')

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">WorkOrder Report</h2>
                <div class="text-start">
                    <a href="{{ route('hr_dashboard') }}">
                        <div class="back-button-box">
                            <button type="button" class="btn btn-back">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
            <!-- <div class="row px-3 mt-3">
                    <div class="col-md-12 d-flex gap-3">
                        <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary">CSV</button></a>
                        <a href="{{'add-work-order'}}"><button class="btn btn-sm btn-primary">Add Work Order</button></a>
                    </div>
                   
                </div> -->

                <div class="col-md-12 d-flex justify-content-start px-2 mt-4">
                    <form class="" method="get">
                        <div class="d-flex gap-3 col-md-6">
                            <div class="col-auto mb-3">
                                <input type="text" name="search" value="{{ $searchValue }}" class="form-control"
                                    placeholder="Search" required>
                            </div>
                            <div class="col-auto d-flex gap-4">
                                <button type="submit" class="btn btn-primary mb-3">Search <i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            @if(auth()->user()->hasPermission('work-order-list'))
                                <a href="{{ route('work-order-list') }}">
                                    <button type="button" class="btn btn-secondary mb-3">Clear <i
                                            class="fa-solid fa-eraser"></i></button>
                                </a>
                            @endif
    
                            </div>
                        </div>
                    </form>
                        <div class="d-flex gap-3 col-md-6">
                            <div class="col-md-12 d-flex justify-content-end gap-5">
                                @if(auth()->user()->hasPermission('addnew-candidate'))
                                    <a href="{{'addnew-candidate'}}"><button class="btn btn-sm btn-primary">CSV  <i class="fa-solid fa-file-export"></i></button></a>
                                @endif
                                @if(auth()->user()->hasPermission('add-work-order'))
                                    <a href="{{'add-work-order'}}"><button class="btn btn-sm btn-primary">Add Work
                                        Order  <i class="fa-solid fa-plus"></i></button></a>
                                @endif
                            </div>
                        
                        </div>
    
                </div>
            <div class="row px-3 mt-2">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                </div>
                @endif
            </div>
            <div class="col-md-12 d-flex justify-content-start px-2">
                <form class="row g-3" method="get">
                    <div class="col-sm-12 col-md-2">
                        <label class="form-label">Organisation <span class="text-danger">*</span></label>
                        <select id="organisation" class="form-select" name="organisation">
                            <option value="">--Select Organisation--</option>
                            @foreach($organization_data as $key => $organization_data)
                            <option value="{{$organization_data->id}}" @if ($organization_data->id ==
                                $organisation) selected @endif>
                                {{ $organization_data->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('organisation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <label class="form-label text-wrap"> Project Name <span class="text-danger">*</span></label>
                        <select name="project_name" id="project_name" class="form-select" value="{{$project_name}}"
                            style="min-width: 150px;">
                            <option value="">Select Project</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if ($project->id == $project_name) selected @endif>
                                    {{ $project->project_name }}
                                </option>
                            @endforeach
                        
                        </select>
                        @error('project_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label for="start_date">Start date</label>
                        <input type="date" name="start_date" value="{{$woStart}}" class="form-control">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <label for="end_date">End date</label>
                        <input type="date" name="end_date" value="{{$woEnd}}" class="form-control">
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <button type="submit" class="btn btn-primary mt-4">Filter <i
                                class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="{{ route('work-order-list') }}">
                            <button type="button" class="btn btn-secondary mt-4">Clear <i
                                    class="fa-solid fa-eraser"></i></button>
                        </a>
                    </div>
                </form>
            </div>
             

            <form method="post" action="{{ route('work-order-report') }}">
            <div class="table-responsive mt-4">
               
                    @csrf
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll"></th>
                                    <th class="srno-column text-center">Organisation Name</th>
                                    <th class="rid-column text-center">Work Order Number</th>
                                    <th class="text-center">Empanelment No.</th>
                                    <th class="attributes-column">Issue Date</th>
                                    <th class="text-center">Project Number</th>
                                    <th class="text-center">Project Name</th>
                                    <th class="text-center">Project Coordinator Name</th>
                                    <th class="text-center">Start Date</th>
                                    <th class="text-center">End Date</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Contact Details</th>
                                    <th class="text-center">Added On</th>
                                    <th class="text-center">Attachment</th>
                                    <th class="text-center">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($totalWorkOrders as $value)
                                <tr>
                                    <td><input type="checkbox" name="checkbox[]" value="{{$value->id}}"></td>
                                    <td class="srno-column text-center">{{$value->project->organizations->name}}</td>
                                    <td class="rid-column text-center attributes-column">{{$value->wo_number}}</td>
                                    <td class="text-center">{{$value->project->empanelment_reference}}</td>
                                    <td class="attributes-column text-center">{{$value->wo_date_of_issue}}</td>
                                    <td class="text-center">{{$value->project->project_number}}</td>
                                    <td class="text-center attributes-column">{{$value->project->project_name}}</td>
                                    <td class="text-center">{{$value->wo_project_coordinator}}</td>
                                    <td class="text-center">{{$value->wo_start_date}}</td>
                                    <td class="text-center">{{$value->wo_end_date}}</td>
                                    <td class="text-center">{{$value->wo_amount}}</td>
                                    <td class="text-center attributes-column">{{ $value->contacts_details }}</td>
                                    <td class="text-center">{{$value->created_at}}</td>
                                    <td>
                                        @if(!empty($value->wo_attached_file))
                                        <a href="{{ asset('storage/uploadWorkOrder/' . $value->wo_attached_file) }}"
                                            target="_blank" class="btn btn-primary mb-3">
                                            <span class="badge badge-primary">Download <i
                                                    class="fa-solid fa-download"></i></span>
                                        </a>
                                        @else
                                        {{ 'Not Uploaded' }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(auth()->user()->hasPermission('edit-work-order'))
                                            <a href="{{route('edit-work-order',$value->id)}}" class="btn btn-primary mb-3">
                                                <span class="badge badge-primary">Edit <i
                                                        class="fa-solid fa-pen-to-square"></i></span>
                                            </a>
                                        @endif
                                        @if(auth()->user()->hasPermission('view-work-order'))
                                        <a href="{{route('view-work-order',$value->id)}}" class="btn btn-primary mb-3">
                                            <span class="badge badge-primary">View <i
                                                    class="fa-solid fa-eye"></i></span>
                                        </a><br>
                                        @endif
                                        @if(auth()->user()->hasPermission('go-to-attendance'))
                                            <a href="{{route('go-to-attendance',$value->id)}}" class="btn btn-primary mb-3">
                                                <span class="badge badge-primary">Go To Attendance <i
                                                        class="fa-solid fa-clipboard-user"></i></span>
                                            </a>
                                        @endif
                                            <br>
                                        @if(auth()->user()->hasPermission('work-order-salary-sheet'))
                                            <a href="{{route('work-order-salary-sheet')}}" class="btn btn-primary mb-3">
                                                <span class="badge badge-primary">Go To Salary Sheet <i
                                                        class="fa-solid fa-file-contract"></i></span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="15" class="text-center"><span class="text-danger">No Record
                                            Found</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="py-3 px-2">
                            {{ $totalWorkOrders->links() }}
                        </div>
                    </div>
                   
               
            </div>
            <div class="col-md-12 text-end py-4 px-3">
                        <button class="btn btn-primary" type="submit">Generate Work  Report <i class="fa-solid fa-file-import"></i></button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>
<script src="{{asset('assets/js/hr/work-order.js')}}"></script>
@endsection