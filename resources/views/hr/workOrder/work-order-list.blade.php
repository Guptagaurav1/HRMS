@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery-ui.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
@endsection

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
                        <div class="d-flex gap-3 col-md-8">
                            <div class="col-md-12 d-flex justify-content-end gap-5">
                                
                                @if(auth()->user()->hasPermission('add-work-order'))
                                    <a href="{{'add-work-order'}}"><button class="btn btn-sm btn-primary">Add Work
                                        Order  <i class="fa-solid fa-plus"></i></button></a>
                                @endif
                            </div>
                        
                        </div>
    
                </div>
            <div class="row px-3 mt-2">
             
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
        
                @if(session()->has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                            {{session()->get('message')}}
                            </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if(session()->has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{session()->get('message')}}
                        </div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-12 d-flex justify-content-start px-2">
                <form class="row g-3" method="get">
                    <div class="col-sm-12 col-md-2">
                        <label class="form-label">Organisation <span class="text-danger">*</span></label>
                        <select id="organisation" class="form-select" name="organisation" value="{{$organisation??NULL}}">
                            <option value="">Select Organisation</option>
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
                        <select name="project_name" id="project_name" class="form-select" value="{{$project_name??NULL}}"
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
             
            @if(auth()->user()->hasPermission('add-work-order'))
               
                <form class="col-md-12 text-end px-3" action="{{route('export-work-order')}}" method="post">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="search" value="{{ $searchValue??NULL }}">
                        <input type="hidden" name="project_name" value="{{ $project_name??NULL }}">
                        <input type="hidden" name="organisation" value="{{ $organisation??NULL }}">
                        <input type="hidden" name="start_date" value="{{ $woStart??NULL }}">
                        <input type="hidden" name="end_date" value="{{ $woEnd??NULL }}">
                    </div>
                    <button type="submit" class="btn btn-link p-0 text-decoration-none">Download CSV <i
                            class="fa-solid fa-download"></i></button>
                </form>

            @endif
            <form method="post" action="{{ route('work-order-report') }}">          
            <div class="table-responsive mt-4">
               
                    @csrf
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll"></th>
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
                                    <td><input type="checkbox" name="checkbox[]" value="{{$value->id}}"></td>
                                    <td class="srno-column">{{$value->project->organizations->name}}</td>
                                    <td class="rid-column">{{$value->wo_number}}</td>
                                    <td>{{$value->project->empanelment_reference}}</td>
                                    <td class="attributes-column">{{$value->wo_date_of_issue}}</td>
                                    <td>{{$value->project->project_number}}</td>
                                    <td>{{$value->project->project_name}}</td>
                                    <td>{{$value->wo_project_coordinator}}</td>
                                    <td>{{$value->wo_start_date}}</td>
                                    <td>{{$value->wo_end_date}}</td>
                                    <td>INR {{ number_format($value->wo_amount, 2) }}</td>
                                    <td>{{ $value->contacts_details }}</td>
                                    <td>{{$value->created_at}}</td>
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
                                                <span class="badge badge-primary">Attendance <i
                                                        class="fa-solid fa-clipboard-user"></i></span>
                                            </a>
                                        @endif
                                            
                                        @if(auth()->user()->hasPermission('wo-sal-attendance'))
                                            <a href="{{route('wo-sal-attendance')}}" class="btn btn-primary mb-3">
                                                <span class="badge badge-primary">Salary <i
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