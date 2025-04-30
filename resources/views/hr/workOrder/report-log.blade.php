@extends('layouts.master')
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Report Logs</h2>
                    <div>
                        <ul class="breadcrumb">
                            <li> @if (auth()->user()->role->role_name="hr")
                                <a href="{{route('hr_dashboard')}}">Dashboard</a>
                                @endif
                            </li>
                            <li>Report Logs</li>
                        </ul>
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

                <div class="col-md-12 d-flex justify-content-between mx-3">
                  
                     <form class="row g-3">
                         <div class="col-auto">
                             <input type="search" name="search" class="form-control" value="{{$search}}" placeholder="Search by added by" required>
                         </div>
                         <div class="col-auto">
                             <button type="submit" class="btn btn-primary mb-3"> Search <i class="fa-solid fa-magnifying-glass"></i></button>
                             <a href="{{ route('report-log') }}">
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
                       
                                 @forelse($report as $key => $value)
                                     <tr>
                                         <td class="srno-column">{{$key+1}}</td>
                                         <td class="text-center">{{$value->doc}}</td>
                                         <td class="text-center">{{$value->first_name??NULL }}</td>
                                         <td class="text-center">{{$value->created_at??NULL }}</td>
                                         <td class="text-center">
                                         <button type="button" class="btn btn-primary hide-text" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                         share</button>
                                         
                                            @section('modal')

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Report Email</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="form compose-email" method="post" action="{{route('send-report-mail')}}">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                   
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=&su={{ urlencode('Check this out') }}&body={{ urlencode('Hey! Check out this awesome content: '. asset('work-order/wo-report/' . $value->doc)) }}" target="_blank">
                                                                            <button type="button" class="btn btn-success" >Share via Gmail </button>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <a href="https://wa.me/?text={{asset('work-order/wo-report/' . $value->doc) }}" target="_blank">
                                                                            <button type="button" class="btn btn-primary" >Share via whatsapp</button>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

                                            @endsection
                                         </td>
                                     </tr>
                                     @empty
                                 <tr>
                                     <td class="text-danger text-center" colspan="12">No Record Found</td>
                                 </tr>
                                 @endforelse
                                 
                        </tbody>
                    </table>
                  
                    <div class="py-3 px-2">
                         {{ $report->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{asset('assets/js/hr/project.js')}}"></script>
@endsection


