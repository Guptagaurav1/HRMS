@extends('layouts.master', ['title' => 'Leave Request Form'])
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center ">
            <div class="col-lg-8 col-md-10">
                <div class="card">
                    <div class="panel-header py-3 px-2 ">
                        <h5 class="mb-0">Apply Leave</h5>
                    </div>

                    <form class="form">
                        @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <label for="recipient" class="form-label">To</label>
                                <input type="email" class="form-control" name="to"
                                    value="leaves@prakharsoftwares.com" readonly>
                            </div>
                            <div class="col-md-6 mb-1">
                                <label for="to" class="form-label">Concern Department Head:</label>
                                <input type="text" class="form-control" id="to" name="to"
                                    value="{{ auth('employee')->user()->reporting_email }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cc" class="form-label">CC</label>
                                <input type="text" class="form-control" id="cc" name="cc"
                                    placeholder="Enter comma seperated emails">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" class="form-control">Reason for Absence: <span
                                        class="text-danger">*</span></label>
                                <select id="inputState" class="form-control" required>
                                    <option value="">Select Any One</option>
                                    <option value="Sick leave">Sick Leave</option>
                                    <option value="Casual leave">Casual Leave</option>
                                    <option value="Birthday leave">Birthday Leave</option>
                                    <option value="Anniversary leave">Anniversary Leave</option>
                                    <option value="Half Day leave">Half Day Leave</option>
                                    <option value="Short Day leave">Short Day Leave</option>
                                    <option value="Tour/Travel leave">Official Tour/Travel </option>
                                    <option value="Comp Off leave">Comp Off</option>
                                    <option value="Other leave">Other</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="leave_dates"
                                    class="btn btn-sm btn-primary multiDatePicker text-light"
                                    style="color: white; width: 100%;" placeholder="Select Date" autocomplete="off"
                                    value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="body" class="form-label">Message / Query</label>
                                <textarea class="form-control" id="comment" name="comment" rows="6" placeholder="Dear Sir,"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end pb-3 px-3">
                        <button type="submit" class="btn btn-primary ">Confirm <i
                                class="fa-solid fa-paper-plane"></i></button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src={{asset('assets/vendor/js/calenderOpen.js')}}></script> --}}
    <script src="{{ asset('assets/js/leave-request.js') }}"></script>
@endsection
