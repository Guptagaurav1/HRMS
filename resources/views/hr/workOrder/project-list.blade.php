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
                    <h2 class="mt-2">Project list</h2>
                </div>
                <div class="row px-3 mb-3">
                    <div class="col-md-12 d-flex justify-content-end ml-5">
                       
                        <a href="{{route('add-project')}}"><button class="btn btn-sm btn-primary" style="margin-left: 120px;margin-top:25px">Add Project</button></a>
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

                <div class="col-md-12 d-flex justify-content-start mx-3">
                  
                     <form class="row g-3" method="get" action="{{route('project-list')}}">
                         <div class="col-auto">
                             <input type="text" name="search" class="form-control" value="{{$search}}" placeholder="Search" required>
                         </div>
                         <div class="col-auto">
                             <button type="submit" class="btn btn-primary mb-3"> Search</button>
                             <a href="{{ route('project-list') }}">
                             <button type="button" class="btn btn-secondary mb-3">Clear <i
                             class="fa-solid fa-eraser"></i></button></a>
                         </div>
                     </form>
                 </div>
              
                <div class="table-responsive">
                    <table id="project-table" class="table table-bordered table-hover display nowrap" style="width: 100%">
                        <thead>
                            <tr>
                                <th class="srno-column">S.No.</th>
                                <th>Organisation Name</th>
                                <th>Project Name</th>
                                <th>Project Number</th>
                                <th>Empanelment Reference</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($projects))
                                 @foreach($projects as $key => $value)
                                     <tr>
                                         <td class="srno-column">{{$key+1}}</td>
                                         <td>{{$value->organizations->name}}</td>
                                         <td>{{$value->project_name}}</td>
                                         <td>{{$value->project_number}}</td>
                                         <td>{{$value->empanelment_reference }}</td>
                                       
                                         <td>
                                         <a href="{{route('edit-project',$value->id)}}"><button type="submit" class="btn btn-primary mb-3"> Edit</button></a>
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
                    <div>
                         {{ $projects->links() }}
                    </div>
                   
                    <div class="table-bottom-control"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

<script src="{{asset('assets/js/select2-init.js')}}"></script>
<script src="{{asset('assets/js/hr/project.js')}}"></script>
@endsection


