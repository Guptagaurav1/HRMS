@extends('layouts.master', ['title' => 'Mail Logs'])

@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h2 class="mt-2">Helpdesk Mail Log</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{get_dashboard()}}">Dashboard</a>
                    </li>
                        <li>Helpdesk Mail Log</li>
                    </ul>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
              <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>

            @if(session()->has('success'))
            <div class="col-md-12 my-2">
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
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

            <div class="col-md-12 d-flex justify-content-start mx-3">
                <form class="row g-3 py-2 mt-4">
                    <div class="col-auto col-xs-12">
                        <input type="search" class="form-control" placeholder="Search" name="search" value="{{$search}}" required>
                    </div>
                    <div class="col-auto col-xs-12">
                        <button type="submit" class="btn btn-sm btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="col-auto col-xs-12">
                        <a href="{{route('email-list')}}" class="btn btn-sm btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></a>
                    </div>
                </form>
            </div>
           
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                    <thead>
                        <tr>
                            <th class="text-center">S No.</th>
                            <th class="text-center">Receiver Mail Id</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Content</th>
                            <th class="text-center">CC</th>
                            <th class="text-center">Attachment</th>
                            <th class="text-center">Sent Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($emails as $email)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$email->to_mail}}</td>
                            <td class="text-center">{{$email->subject}}</td>
                            <td class="text-center">{!! $email->content !!}</td>
                            <td class="text-center">{{$email->cc}}</td>
                            <td class="text-center">{{$email->attatchment}}</td>
                            <td class="text-center">{{date('jS F, Y', strtotime($email->created_at))}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-danger text-center" colspan="7">No Record Found</td>
                       </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center my-2">
                {{$emails->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

