@extends('layouts.master')
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-md-2">WorkOrder Report</h2>
                <div>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{get_dashboard()}}">Dashboard</a>
                        </li>
                        <li>Work Order Report</li>
                    </ul>
                </div>
            </div>


            <div class="row mt-2 px-4">
                <div class="col-md-10 col-xs-12">
                    <form class="" method="get">
                        <div class="row">
                            <div class="col-auto col-xs-12">
                                <input type="text" name="search" value="{{ $searchValue }}" class="form-control"
                                    placeholder="Search" required>
                            </div>
                            <div class="col-auto col-xs-12">
                                <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i> </button>
                            </div>
                            <div class="col-auto col-xs-12">
                                @if(auth()->user()->hasPermission('work-order-list'))

                                <a href="{{ route('work-order-list') }}" class="col-xs-12">
                                    <button type="button" class="btn btn-primary mb-3">Clear <i
                                            class="fa-solid fa-eraser"></i></button>
                                </a>
                                @endif

                            </div>
                    </form>

                </div>
            </div>


            <div class="col-auto col-xs-12">
                @if(auth()->user()->hasPermission('add-work-order'))
                <a href="{{'add-work-order'}}" class="col-xs-12"><button class="btn btn-sm btn-primary">Add Work
                        Order <i class="fa-solid fa-plus"></i></button></a>
                @endif
            </div>
        </div>


        <div class="row px-3 mt-2">

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>

            @if(session()->has('success'))
            <div class="col-md-12">
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
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
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
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
                    <a href="{{ route('work-order-list') }}" class="col-xs-12">
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
        <form method="get" action="{{ route('work-order-report') }}">
            <div class="table-responsive mt-4">

                <div class="col-sm-12">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                        id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="checkAll" id="all"></th>
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
                                <td class="srno-column text-center">{{$value->project ? $value->project->organizations->name : ''}}</td>
                                <td class="rid-column text-center attributes-column">{{$value->wo_number}}</td>
                                <td class="text-center">{{$value->project ? $value->project->empanelment_reference : ''}}</td>
                                <td class="attributes-column text-center">{{$value->wo_date_of_issue}}</td>
                                <td class="text-center">{{$value->project ? $value->project->project_number : ''}}</td>
                                <td class="text-center attributes-column">{{$value->project ? $value->project->project_name : ''}}</td>
                                <td class="text-center attributes-column">{{$value->wo_project_coordinator}}</td>
                                <td class="text-center">{{$value->wo_start_date}}</td>
                                <td class="text-center">{{$value->wo_end_date}}</td>
                                <td>INR {{ number_format($value->wo_amount, 2) }}</td>
                                <td class="text-center attributes-column">{{ $value->contacts_details }}</td>
                                <td class="text-center">{{$value->created_at}}</td>
                                <td>
                                    @if(!empty($value->wo_attached_file))
                                    <a href="{{ asset('uploadWorkOrder/' . $value->wo_attached_file) }}"
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
                                        <span class="badge badge-primary">View <i class="fa-solid fa-eye"></i></span>
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
                <button class="btn btn-primary" type="submit">Generate Work Report <i
                        class="fa-solid fa-file-import"></i></button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('script')

<script src="{{asset('assets/js/hr/workOrder/work-order.js')}}"></script>
<script>
    $("#all").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection