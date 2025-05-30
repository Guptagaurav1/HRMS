@extends('layouts.master')
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="text-white mt-2">Users List</h3>
                    <div>
                        <ul class="breadcrumb">
                            <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                            <li>Users List</li>
                        </ul>
                    </div>
                    
                </div>
                
                <div class="col-md-12 col-xs-12 d-flex justify-content-between flex-wrap align-items-center px-2 mt-4">
                    <form class="row g-3 mt-2" method="get">
                        <div class="col-auto col-xs-12 mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                           
                        </div>
                        <div class="col-auto col-xs-12">
                        <a href="{{ route('users') }}" class="col-xs-12"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                        </div>
                    </form>
                    <div class="col-auto col-xs-12">
                    <a href="{{route('add-user')}}" class="col-xs-12"><button type="button" class="btn btn-primary mb-3">Add User <i class="fa-solid fa-plus"></i></button></a>
                </div>
                </div>
                <div class="row">
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
                <div class="table-responsive mt-5">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column text-center">Sr No.</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Name/Email/Contact</th>
                                <th class="text-center">Created Date</th>
                                <th class="text-center">Recently Updated Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                                <tr>
                                    <td class="srno-column text-center">{{$key+1}}</td>
                                    <td class="rid-column text-center">{{$user->role->fullname??NULL}}</td>
                                    <td class="text-center attributes-column">{{$user->first_name}} {{$user->last_name}} / {{$user->email}} / {{$user->phone}}</td>
                                    <td class="attributes-column text-center">{{date('jS F, Y', strtotime($user->created_at))}}</td>
                                    <td class="text-center">{{date('jS F, Y', strtotime($user->updated_at))}}</td>
                                    <td data-id="{{ $user->id }}" class="status-text text-center">
                                        @if ($user->status == '1')
                                           {{ 'Active' }} 
                                        @else 
                                           {{ 'Inactive' }}
                                        @endif
                                    </td>
                                    <td class="text-center"> 
                                        @if(auth()->user()->hasPermission('edit-user'))
                                            <a href="{{ route('edit-user', $user->id) }}"><button class="btn btn-sm btn-primary" title="Edit">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                        @endif
                                        @if(auth()->user()->hasPermission('delete-user'))
                                            <a data-id="{{ $user->id }}"  class="delete-user"><button class="btn btn-sm btn-danger"  title="Delete">Delete <i class="fa-solid fa-trash"></i></button></a>
                                        @endif
                                        @if(auth()->user()->hasPermission('users.update-status'))
                                            <button 
                                                class="status-toggle btn btn-{{ $user->status == 1 ? 'success' : 'danger' }}" 
                                                data-id="{{ $user->id }}"
                                                data-status="{{ $user->status }}">
                                                {{ $user->status == 1 ? 'Activate' : 'Deactivate' }}
                                            </button> 
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr >
                                    <td colspan="12" class="text-center"><span class="text-danger">No Record Found</span></td>
                                </tr> 
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- pagination --}}
                <div class="col-md-12 my-2 p-2">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    // adctivate and deactive by using ajax
    $(document).ready(function() {
        $('.status-toggle').on('click', function() {
            // event.preventDefault(); // Prevent page refresh
            var userId = $(this).data('id');
            var currentStatus = $(this).data('status');
            var newStatus = currentStatus === 1 ? 0 : 1; // Toggle between 1 (active) and 0 (inactive)

            // Send the CSRF token with the request
            $.ajax({
                
                url: '{{ route('users.update-status', ':user') }}'.replace(':user', userId),
                type: 'POST',
                data: {
                    status: newStatus,
                    _token: $('meta[name="csrf-token"]').attr('content'), 
                },
                success: function(response) {
                    
                    if (response.status == 1) {
                    
                        $('button[data-id="' + userId + '"]')
                            .text('Activate')
                            .removeClass('btn-danger')
                            .addClass('btn-success')
                            .data('status', 1);
                            $('td[data-id="' + userId + '"].status-text').text('Active');
                    
                    } else {
                    
                        $('button[data-id="' + userId + '"]')
                            .text('Deactivate')
                            .removeClass('btn-success')
                            .addClass('btn-danger')
                            .data('status', 0);
                            $('td[data-id="' + userId + '"].status-text').text('Inactive');
                    }
                    alert(response.message);  // Show success message
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText); // Log any error response for debugging
                    alert("An error occurred. Please try again.");
                }
            });
        });
    });
</script>
<script src="{{asset('assets/js/users/user.js')}}"></script>

@endsection
