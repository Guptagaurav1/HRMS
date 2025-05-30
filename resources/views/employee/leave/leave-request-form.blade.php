@extends('layouts.master', ['title' => 'Leave Request Form'])


@section('contents')
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center ">
            <div class="col-lg-8 col-md-10">
                <div class="card">
                    <div class="panel">
                         <div class="panel-header ">
                        <h2 class="mb-0">Apply Leave</h2>
                    </div>
                    </div>
                   

                    <form class="form apply-leave" action="{{ route('leave.store_request') }}" method="POST">
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
                                    <input type="email" class="form-control" name="department_head_email"
                                        value="{{ auth('employee')->user()->reporting_email }}" readonly>
                                    @error('department_head_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cc" class="form-label">CC</label>
                                    <input type="text" class="form-control" name="cc"
                                        placeholder="Enter comma seperated emails">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" class="form-control">Reason for Absence: <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="reason_for_absence" required>
                                        <option value="">Select Any One</option>
                                        <option value="Sick Leave">Sick Leave</option>
                                        <option value="Casual Leave">Casual Leave</option>
                                        <option value="Birthday Leave">Birthday Leave</option>
                                        <option value="Anniversary Leave">Anniversary Leave</option>
                                        <option value="Half Day Leave">Half Day Leave</option>
                                        <option value="Short Day Leave">Short Day Leave</option>
                                        <option value="Tour/Travel Leave">Official Tour/Travel </option>
                                        <option value="Comp Off Leave">Comp Off</option>
                                        <option value="Other Leave">Other</option>
                                    </select>
                                    @error('reason_for_absence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12" >
                                    <input  type="text" name="absence_dates"
                                        class="btn btn-sm btn-secondary  multiDatePicker text-white"
                                        style="color: white; width: 100%;" placeholder="Select Date" autocomplete="off"
                                        value="" required>
                                    @error('absence_dates')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="body" class="form-label">Message / Query</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="6" placeholder="Dear Sir,"></textarea>
                                    @error('comment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end pb-3 px-3">
                            <a href="{{route('applied-request-list')}}" class="btn btn-secondary mx-2">Cancel</a>
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
    <script src="{{ asset('assets/js/leave-request.js') }}"></script>
@endsection
