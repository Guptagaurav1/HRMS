@extends('layouts.master', ['title' => 'Edit Leave Request'])
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
@endsection

@section('contents')
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center ">
            <div class="col-lg-8 col-md-10">
                <div class="card">
                    <div class="panel-header py-3 px-2 ">
                        <h5 class="mb-0">Edit Leave</h5>
                    </div>

                    <form class="form edit-leave" action="{{ route('leave.update_request') }}" method="POST">
                        @csrf
                        <div class="d-none">
                            <input type="hidden" name="leave_id" value="{{ $id }}">
                        </div>
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
                                        placeholder="Enter comma seperated emails" value="{{$leave->cc}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" class="form-control">Reason for Absence: <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="reason_for_absence" required>
                                        <option value="">Select Any One</option>
                                        <option value="Sick Leave" {{$leave->reason_for_absence == 'Sick Leave' ? 'selected' : ''}}>Sick Leave</option>
                                        <option value="Casual Leave" {{$leave->reason_for_absence == 'Casual Leave' ? 'selected' : ''}}>Casual Leave</option>
                                        <option value="Birthday Leave" {{$leave->reason_for_absence == 'Birthday Leave' ? 'selected' : ''}}>Birthday Leave</option>
                                        <option value="Anniversary Leave" {{$leave->reason_for_absence == 'Anniversary Leave' ? 'selected' : ''}}>Anniversary Leave</option>
                                        <option value="Half Day Leave" {{$leave->reason_for_absence == 'Half Day Leave' ? 'selected' : ''}}>Half Day Leave</option>
                                        <option value="Short Day Leave" {{$leave->reason_for_absence == 'Short Day Leave' ? 'selected' : ''}}>Short Day Leave</option>
                                        <option value="Tour/Travel Leave" {{$leave->reason_for_absence == 'Travel Leave' ? 'selected' : ''}}>Official Tour/Travel </option>
                                        <option value="Comp Off Leave" {{$leave->reason_for_absence == 'Comp Off Leave' ? 'selected' : ''}}>Comp Off</option>
                                        <option value="Other Leave" {{$leave->reason_for_absence == 'Other Leave' ? 'selected' : ''}}>Other</option>
                                    </select>
                                    @error('reason_for_absence')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="text" name="absence_dates"
                                        class="btn btn-sm btn-primary multiDatePicker text-light"
                                        style="color: white; width: 100%;" placeholder="Select Date" autocomplete="off"
                                        value="{{$leave->absence_dates}}" required>
                                    @error('absence_dates')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="body" class="form-label">Message / Query</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="6" placeholder="Dear Sir,">
                                        {{$leave->comment}}
                                    </textarea>
                                    @error('comment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end pb-3 px-3">
                            <a href="{{route('applied-request-list')}}" class="btn btn-primary mx-2">Cancel</a>
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
    <script src="{{ asset('assets/js/edit-leave-request.js') }}"></script>
@endsection
