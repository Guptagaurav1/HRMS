@extends('layouts.master', ['title' => 'Bank Details'])
@section('contents')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-header">
                <h3 class="text-white mt-2">Banks Details</h3>
                <div>
                    <ul class="breadcrumb">
                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Banks Details</li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="row ">
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
                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                            role="alert">
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
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
                            role="alert">
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

                    <div class="row  mt-4">
                        <div class="col-md-10">
                            <form method="get">
                                <div class="row">
                                    <div class="col-auto col-xs-12">
                                        <input type="text" name="search" value="{{$search}}" class="form-control"
                                            placeholder="Search" required>

                                    </div>
                                    <div class="col-auto col-xs-12">
                                        <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i
                                                class="fa-solid fa-magnifying-glass"></i></button>

                                    </div>
                                    <div class="col-auto col-xs-12">
                                        <a href="{{ route('bank-details')}}" class="col-xs-12"><button
                                                type="button" class="btn btn-primary btn-sm mb-3">Clear <i
                                                    class="fa-solid fa-eraser"></i></button></a>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto col-xs-12">
                            @if(auth()->user()->hasPermission('add-bank'))

                            <a href="{{route('add-bank')}}" class="col-xs-12 mx-md-4"><button
                                    class="btn btn-sm btn-primary">Add Bank <i
                                        class="fa-solid fa-plus"></i></button></a>

                            @endif

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class='text-center'>Sr No.</th>
                                    <th class='text-center'>Bank Name</th>
                                    <th class='text-center'>Type Of Bank</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($banks as $bank)
                                <tr>
                                    <td class='text-center'>{{ $loop->iteration }}</td>
                                    <td class='text-center'>{{ $bank->name_of_bank }}</td>
                                    <td class='text-center'>{{ $bank->type_of_bank }}</td>
                                    <td class='text-center'>
                                        @if($bank->status)
                                        <button class="btn btn-sm btn-danger deactivate"
                                            data-id="{{$bank->id}}">DeActivate</button>
                                        @else
                                        <button class="btn btn-sm btn-primary activate"
                                            data-id="{{$bank->id}}">Activate</button>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-danger text-center" colspan="4">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="col-md-12">
                            {{$banks->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('script')
    <script src="{{asset('assets/js/bank-details.js')}}"></script>

    @endsection