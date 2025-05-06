@extends('layouts.master', ['title' => 'Clients'])
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="text-white mt-2">Client List</h3>

                </div>

                <div class="panel-body">
                    <div class="row ">
                        <div class="row mt-3 px-3">
                            <div class="row px-2">
                                <div class="col-md-10">
                                    <form method="get">
                                        <div class="row">
                                            <div class="col-auto col-xs-12">
                                                <input type="search" name="search" class="form-control"
                                                    placeholder="Search" required>
                                            </div>
                                            <div class="col-auto col-xs-12">
                                                <button type="submit" class="btn  btn-primary btn-sm mb-3">Search <i
                                                        class="fa-solid fa-magnifying-glass"></i></button>

                                            </div>
                                            <div class="col-auto col-xs-12">
                                                <a href="{{ route('sales-clients.list') }}" class="col-xs-12"><button
                                                        type="button" class="btn btn-primary btn-sm mb-3">Clear <i
                                                            class="fa-solid fa-eraser"></i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto col-xs-12">

                                    <a href="{{ route('sales-clients.add') }}" class="col-xs-12 mx-md-2"><button
                                            type="button" class="btn btn-sm btn-primary">Add New Client <i
                                                class="fa-solid fa-plus"></i></button></a>
                                </div>
                            </div>
                        </div>

                        {{-- Show Messages --}}

                        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        @if (session()->has('success'))
                            <div class="col-md-12">
                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show"
                                    role="alert">
                                    <svg class="bi flex-shrink-0 me-2" fill="#fff" width="24" height="24" role="img"
                                        aria-label="Success:">
                                        <use xlink:href="#check-circle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="col-md-12">
                                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show"
                                    role="alert">
                                    <svg class="bi flex-shrink-0 me-2" fill="#b02a37" width="24" height="24" role="img"
                                        aria-label="Danger:">
                                        <use xlink:href="#exclamation-triangle-fill" />
                                    </svg>
                                    <div>
                                        {{ session()->get('message') }}
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif

                        {{-- Client List Table --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                                id="allEmployeeTable">
                                <thead>
                                    <tr>
                                        <th class='text-center'>Client Id</th>
                                        <th class='text-center'>Client Name</th>
                                        <th class='text-center'>Department Name</th>
                                        <th class='text-center'>Address</th>
                                        <th class='text-center'>Decision Maker</th>

                                        <th class='text-center'>Added By</th>
                                        <th class='text-center'>Added On</th>

                                        <th class='text-center'>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($clients as $client)
                                        @php
                                            $decision_maker = 'Not Available';
                                            if (!empty($client->d_maker_name)) {
                                                $decision_maker = $client->d_maker_name;
                                            }
                                            if (!empty($client->d_maker_email)) {
                                                $decision_maker .= ' / ' . $client->d_maker_email;
                                            }
                                            if (!empty($client->d_maker_phone)) {
                                                $decision_maker .= ' / ' . $client->d_maker_phone;
                                            }
                                        @endphp
                                        <tr>
                                            <td class='text-center'>{{ $client->id }}</td>
                                            <td class='text-center attributes-column'>{{ $client->client_name }}</td>
                                            <td class='text-center attributes-column'>{{ $client->department_name }}</td>
                                            <td class='text-center attributes-column'>{{ $client->company_address }}</td>

                                            <td class='text-center attributes-column'>{{ $decision_maker }}</td>
                                            <td class='text-center attributes-column'>
                                                {{ $client->user ? $client->user->first_name . ' ' . $client->user->last_name : '' }}
                                            </td>
                                            <td class='text-center attributes-column'>
                                                {{ date('jS F, Y', strtotime($client->created_at)) }}</td>
                                            <td>
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('sales-clients.edit', ['id' =>  $client->id ]) }}"><button type="submit"
                                                            class="btn btn-sm btn-primary">Edit</button></a>
                                                    <a href="{{ route('sales-clients.view', ['id' =>  $client->id ]) }}"> <button type="submit"
                                                            class="btn btn-sm btn-primary">View</button></a>
                                                    <a href="{{ route('sales-projects.add', ['id' =>  $client->id ]) }}"> <button type="submit"
                                                            class="btn btn-sm btn-primary">Add Project</button></a>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-danger text-center" colspan="8">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>

                        {{-- Pagination --}}
                        <div class="col-md-12 my-2 p-2">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
    @endsection
