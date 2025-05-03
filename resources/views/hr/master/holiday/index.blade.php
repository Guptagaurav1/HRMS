@extends('layouts.master', ['title' => 'Holidays'])
@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h3 class="mt-2">Holidays</h3>
                    <ul class="breadcrumb">
                        <li>
                            @if (auth()->user()->role->role_name == "hr")
                                <a href="{{ route('hr_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "hr_operations")
                                <a href="{{ route('hr_operations_dashboard') }}">Dashboard</a>
                            @elseif(auth()->user()->role->role_name == "sales_manager")
                                <a href="{{ route('sales.manager_dashboard') }}">Dashboard</a>
                            @else
                            @endif
                        </li>
                        <li>Holidays List</li>
                    </ul>
                </div>
                <div class="col-md-12  mt-5">
                    <div class="row mx-2">
                        <div class="col-md-6">
                            <form class="row form">
                                <div class="col-auto col-xs-12 mb-3">
                                    <input type="search" class="form-control" name="search" placeholder="Search by name and type"
                                        value="{{ $search }}" required>
                                </div>
                                <div class="col-auto col-xs-12">
                                    <button type="submit" class="btn btn-sm btn-primary mb-3">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                  
                                </div>
                                <div class="col-auto col-xs-12">
                                <a href="{{ route('holiday.list') }}" class="btn btn-sm btn-primary mb-3">Clear <i
                                class="fa-solid fa-eraser"></i></a>

                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 col-md-6 text-end">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#addHoliday">Add Holiday</button>
                        </div>
                    </div>
                </div>

                    <!-- New Search form design  -->



                <div class="table-responsive vh-100">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Holiday Name</th>
                                    <th>Holiday Date</th>
                                    <th>Holiday Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($holidays as $holiday)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $holiday->holiday_name }}</td>
                                        <td>{{ date('jS F, Y', strtotime($holiday->holiday_date)) }}</td>
                                        <td>{{ $holiday->holiday_type }}</td>
                                        <td><button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editHoliday"
                                                data-bs-whatever="{{ $holiday->id }}">Edit</button>
                                                @if($holiday->status == '1')
                                            <button class="btn btn-danger mx-2 deactive" data-id="{{$holiday->id}}">Deactive</button>
                                            @endif
                                            @if($holiday->status == '0')
                                            <button class="btn btn-success mx-2 active" data-id="{{$holiday->id}}">Active</button>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-danger text-center" colspan="5">No Record Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 my-2">
                        {{ $holidays->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    {{-- Add Holiday Modal --}}
    <div class="modal fade" id="addHoliday" tabindex="-1" aria-labelledby="addHolidayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light" id="addHolidayLabel">Add Holiday</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="add-holiday">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Holiday Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="holiday_name" placeholder="Enter Holiday Name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Holiday Date<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="holiday_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Holiday Type<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="message-text" name="holiday_type" required>
                                <option value="" selected>Select Type</option>
                                <option value="National Holiday">National Holiday</option>
                                <option value="Gazetted Holiday">Gazetted Holiday</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Holiday Modal --}}
    <div class="modal fade" id="editHoliday" tabindex="-1" aria-labelledby="editHolidayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-light">Update Holiday</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="update-holiday">
                    @csrf
                    <div class="d-none">
                        <input type="hidden" name="holiday_id" value="" required>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Holiday Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="holiday_name"
                                placeholder="Enter Holiday Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Holiday Date<span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="holiday_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Holiday Type<span
                                    class="text-danger">*</span></label>
                            <select class="form-select" id="message-text" name="holiday_type" required>
                                <option value="">Select Type</option>
                                <option value="National Holiday">National Holiday</option>
                                <option value="Gazetted Holiday">Gazetted Holiday</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/masters/holiday.js') }}"></script>
@endsection
