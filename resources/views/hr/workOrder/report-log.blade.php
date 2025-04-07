@extends('layouts.master')
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Report Logs</h2>
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
                             <input type="text" name="search" class="form-control" value="" placeholder="Search" required>
                         </div>
                         <div class="col-auto">
                             <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                             <a href="{{ route('project-list') }}">
                             <button type="button" class="btn btn-secondary mb-3">Clear <i
                             class="fa-solid fa-eraser"></i></button></a>
                         </div>
                     </form>
                    
                
                 </div>
              
                <div class="table-responsive">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column text-center">S.No.</th>
                                <th class="text-center">Document</th>
                                <th class="text-center">Added By</th>
                                <th class="text-center">Added on</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- @if(!empty($report)) -->
                                 @foreach($report as $key => $value)
                                     <tr>
                                         <td class="srno-column">{{$key+1}}</td>
                                         <td class="text-center">{{$value->doc}}</td>
                                         <td class="text-center">{{$value->user->first_name??NULL }}</td>
                                         <td class="text-center">{{$value->created_at??NULL }}</td>
                                         <td class="text-center">
                                         <a href=""><button type="submit" class="btn btn-primary"> Share <i class="fa-solid fa-pen-to-square"></i></button></a>
                                         
                                         </td>
                                     </tr>
                                   
                                 @endforeach
                                 <!-- @else -->
                                 <tr>
                                     <td class="text-danger text-center" colspan="12">No Record Found</td>
                                 </tr>
                                 <!-- @endif -->
                        </tbody>
                    </table>
                    @if(!empty($report))
                    <div class="py-3 px-2">
                         {{ $report->links() }}
                    </div>
                    @endif
                   
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/hr/project.js')}}"></script>
@endsection


