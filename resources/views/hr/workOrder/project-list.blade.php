@extends('layouts.master')
@section('contents')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Project List</h2>
                <div>
                    <ul class="breadcrumb">
                        <li> @if (auth()->user()->role->role_name="hr")
                            <a href="{{route('hr_dashboard')}}">Dashboard</a>
                            @endif
                        </li>
                        <li>Project List</li>
                    </ul>
                </div>
            </div>


            <div class="mt-2">
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

            <div class="col-md-12 d-flex justify-content-between mx-3">

                <form class="row g-3" method="get" action="{{route('project-list')}}">
                    <div class="col-auto">
                        <input type="text" name="search" class="form-control" value="{{$search}}" placeholder="Search"
                            required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3"> Search <i
                                class="fa-solid fa-magnifying-glass"></i></button>
                        <a href="{{ route('project-list') }}">
                            <button type="button" class="btn btn-primary mb-3">Clear <i
                                    class="fa-solid fa-eraser"></i></button></a>
                    </div>
                </form>
                <div class="">
                    @if(auth()->user()->hasPermission('add-project'))
                    <div class="col-md-12 d-flex justify-content-end px-4">
                        <a href="{{route('add-project')}}"><button class="btn btn-sm btn-primary">Add Project <i
                                    class="fa-solid fa-plus"></i></button></a>
                    </div>
                    @endif
                </div>

            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                    id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="srno-column text-center">S.No.</th>
                            <th class="text-center">Organisation Name</th>
                            <th class="text-center">Project Name</th>
                            <th class="text-center">Project Number</th>
                            <th class="text-center">Empanelment Reference</th>
                            <th class="text-center">Added on</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($projects))
                        @foreach($projects as $key => $value)
                        <tr>
                            <td class="srno-column">{{$key+1}}</td>
                            <td class="text-center">{{$value->organizations->name}}</td>
                            <td class="text-center attributes-column">{{$value->project_name}}</td>
                            <td class="text-center">{{$value->project_number}}</td>
                            <td class="text-center attributes-column">{{$value->empanelment_reference }}</td>
                            <td class="text-center">{{$value->created_at }}</td>
                            <td class="text-center">
                                <a href="{{route('edit-project',$value->id)}}"><button type="submit"
                                        class="btn btn-primary"> Edit <i
                                            class="fa-solid fa-pen-to-square"></i></button></a>
                                <a href="{{route('add-work-order',$value->id)}}"><button class="btn btn-primary"><i
                                            class="fa-solid fa-plus"></i> WorkOrder</button></a>
                            </td>
                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td class="text-danger text-center" colspan="12">No Record Found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="py-3 px-2">
                    {{ $projects->links() }}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/hr/project.js')}}"></script>
@endsection