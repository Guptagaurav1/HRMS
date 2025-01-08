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
                    <h5>Users List</h5>
                    <div class="btn-box">
                        <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Add User</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped" id="allEmployeeTable">
                        <thead>
                            <tr>
                                <th class="srno-column">Sr No.</th>
                                <th class="rid-column">Role</th>
                                <th>Name/Email/Contact</th>
                                <th>Created Date</th>
                                <th>Recently Updated Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td class="srno-column">{{$key+1}}</td>
                                    <td class="rid-column">{{$user->department->department}}</td>
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
                                        <a href="{{ route('users.update', $user->id) }}"><button class="btn btn-sm btn-primary">Edit</button></a>
                                        
                                        <button 
                                            class="status-toggle btn btn-{{ $user->status == 1 ? 'success' : 'danger' }}" 
                                            data-id="{{ $user->id }}"
                                            data-status="{{ $user->status }}">
                                            {{ $user->status == 1 ? 'Activate' : 'Deactivate' }}
                                        </button> 
                                    </td>
                                </tr>
                            @endforeach
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
@endsection
