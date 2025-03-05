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
                    <h3 class="text-white mt-2">Users List</h3>
                    
                </div>
                <div class="text-end px-2 mt-3">
                    <a href="{{route('add-user')}}"><button type="button" class="btn btn-primary mb-3">Add User <i class="fa-solid fa-plus"></i></button></a>
                </div>
                <div class="col-md-12 d-flex justify-content-start px-2">
                    <form class="row g-3" method="get">
                        <div class="col-auto mb-3">
                            <input type="text" name="search" value="{{ $search }}" class="form-control" placeholder="Search" required>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                            <a href="{{ route('users') }}"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
                        </div>
                    </form>
                </div>
                <div class="row">
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Sr No.</th>
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
                                    <td class="srno-column">{{$key+1}}</td>
                                    <td class="rid-column">{{$user->role->role_name??NULL}}</td>
                                    <td>{{$user->first_name}} {{$user->last_name}} / {{$user->email}} / {{$user->phone}}</td>
                                    <td class="attributes-column">{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td data-id="{{ $user->id }}" class="status-text">
                                        @if ($user->status == '1')
                                           {{ 'Active' }} 
                                        @else 
                                           {{ 'Inactive' }}
                                        @endif
                                    </td>
                                    <td> 
                                        <a href="{{ route('edit-user', $user->id) }}"><button class="btn btn-sm btn-primary" title="Edit">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                        <a data-id="{{ $user->id }}"  class="delete-user"><button class="btn btn-sm btn-danger"  title="Delete">Delete <i class="fa-solid fa-trash"></i></button></a>
                                        
                                        <button 
                                            class="status-toggle btn btn-{{ $user->status == 1 ? 'success' : 'danger' }}" 
                                            data-id="{{ $user->id }}"
                                            data-status="{{ $user->status }}">
                                            {{ $user->status == 1 ? 'Activate' : 'Deactivate' }}
                                        </button> 
                                    </td>
                                </tr>
                                @empty
                                <tr >
                                    <td colspan="5" class="text-center"><span class="text-danger">No Record Found</span></td>
                                </tr> 
                            @endforelse
                        </tbody>
                    </table>
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
<script src="{{asset('assets/vendor/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/vendor/js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/select2-init.js')}}"></script>

<script src="{{asset('assets/js/users/user.js')}}"></script>

@endsection
