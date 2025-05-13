@extends('layouts.master', ['title' => 'Leave Request Receipt'])

@section('style')
<style>
@media print {
    body, .panel, .printarea {
        background: white !important;
    }

    .color-dark {
        color: black !important;
    }

    .table-responsive {
        overflow: visible !important;
    }

    .table th, .table td {
        color: black !important;
    }

   
label{
    
    color: black !important;
    background-color: black;
}

    .btn, .d-flex.justify-content-end {
        display: none !important;
    }

    @page {
        size: A4 portrait;
        margin: 10mm;
    }

    .printarea {
        page-break-inside: avoid;
    }

}
</style>
@endsection




@section('contents')
    <div class="fluid-container">
        <div class="row">
           
            <div class="col-md-12">
                <div class="panel printarea">
                    <div class="d-flex align-items-center justify-content-between px-4 py-3">
                        <img src="{{ asset('assets/images/PrakharNEWLogo.png') }}" alt="Logo" width="120"
                            class="text-center my-2">
                            <img src="{{asset('assets\images\11years.png')}}" alt="Logo" style="width:90px">
                    </div>

                    <div class="invoice-header d-flex justify-content-center align-items-centerSS">
                        <div class="row justify-content-center w-100">
                            <div class="col-xl-7 col-lg-12 col-sm-12 text-center" id="invoice-center">
                                <h3 class="prakhrar-heading color-dark">PRAKHAR SOFTWARE SOLUTIONS PVT. LTD</h3>
                                <p class="color-dark">LGF, C-11, Malviya Nagar (Opp. SBI Bank), New Delhi - 110017</p>
                                <p class="color-dark">Ph.No. 01140631622 &nbsp;&nbsp; Mail: hr@prakharsoftwares.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 table-responsive table-size">
                        <table class="table table-borderless table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <tbody>
                                <tr class="">
                                    <th class="dark color-dark">
                                        Leave Code :
                                    </th>
                                    <td class="color-dark">{{ $data->leave_code }}</td>
                                    <th class="dark">
                                        Applied Date:
                                    </th>
                                    <td class="color-dark">{{ date('M d, Y', strtotime($data->created_at)) }}</td>
                                </tr>
                                <tr>
                                    <th class="dark color-dark">
                                        Name :
                                    </th>
                                    <td class="color-dark">{{ $data->emp_name }}</td>
                                    <th class="dark color-dark">
                                        EMP Code :
                                    </th>
                                    <td class="color-dark">{{ $data->emp_code }}</td>
                                </tr>
                                <tr>
                                    <th class="dark color-dark">
                                        Designation :
                                    </th>
                                    <td class="color-dark">{{ $data->emp_designation }}</td>
                                    <th class="dark color-dark">
                                        Department :
                                    </th>
                                    <td class="color-dark">{{ $data->department }}</td>
                                </tr>
                                <tr>
                                    <th class="dark color-dark">
                                        Type Of Leave Requested :
                                    </th>
                                    <td colspan="3">
                                        <input class="form-check-input color-dark" type="checkbox"
                                            {{ $data->reason_for_absence == 'Sick leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label color-dark" for="gridCheck">
                                            Sick Leave
                                        </label>
                                        <input class="form-check-input color-dark" type="checkbox"
                                            {{ $data->reason_for_absence == 'Casual leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label color-dark" for="gridCheck">
                                            Casual Leave
                                        </label>

                                        <input class="form-check-input" type="checkbox"
                                            {{ $data->reason_for_absence == 'Birthday leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Birthday Leave
                                        </label>

                                        <input class="form-check-input" type="checkbox"
                                            {{ $data->reason_for_absence == 'Aniversary leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Anniversary Leave
                                        </label>

                                        <input class="form-check-input" type="checkbox"
                                            {{ $data->reason_for_absence == 'Half Day leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Half Day Leave
                                        </label>

                                        <input class="form-check-input" type="checkbox"
                                            {{ $data->reason_for_absence == 'Short Day leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Short Day Leave
                                        </label>
                                        <br>

                                        <input class="form-check-input" type="checkbox"
                                            {{ $data->reason_for_absence == 'Tour/Travel leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Official Tour/Travel
                                        </label>

                                        <input class="form-check-input" type="checkbox"
                                            {{ $data->reason_for_absence == 'Comp Off leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Comp Off
                                        </label>
                                        <input class="form-check-input" type="checkbox"
                                            {{ $data->reason_for_absence == 'Other leave' ? 'checked' : 'disabled' }}>
                                        <label class="form-check-label" for="gridCheck">
                                            Other
                                        </label>
                                    </td>

                                </tr>

                                <tr>
                                    <th class="dark">
                                        Date of Leave :
                                    </th>
                                    <td colspan="3">{{ $data->absence_dates }}</td>

                                </tr>
                                <tr>
                                    <th class="dark">
                                        Total No. Of days :
                                    </th>
                                    <td colspan="3">
                                        {{ $data->total_days }} </td>
                                </tr>
                                <tr>
                                    <th class="dark">
                                        Reason For Absence :
                                    </th>
                                    <td colspan="3" class="res_com">{{ $data->reason_for_absence }} </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 ">
                            <p class="px-1 color-dark"><span class="text-danger">Note : </span>You must submit request for absence,
                                other than sick leave, two days prior to
                                the first day of your absent and please attach supportive document for sick leave</p>
                        </div>
                    </div>
                    <div class="panel-header">
                        <h6 class="color-dark">Approval/Disapproval Section</h6>
                    </div>
                    <div class="row mt-2 px-2">
                        <div class="col-md-6">
                            <input class="form-check-input" type="checkbox"
                                {{ $data->status == 'Approved' || $data->status == 'Reapproved' ? 'checked' : 'disabled' }}>
                            <label class="form-check-label" for="gridCheck">
                                Approved
                        </div>
                        <div class="col-md-6">
                            <input class="form-check-input" type="checkbox"
                                {{ $data->status == 'Disapproved' || $data->status == 'Redisapproved' ? 'checked' : 'disabled' }}>
                            <label class="form-check-label" for="gridCheck">
                                Rejected
                        </div>
                    </div>
                    <div class="panel-header">
                        <h6 class="color-dark">Comment/Remarks</h6>
                    </div>
                    <div class="row mt-2 px-2">
                        <div class="col-md-8 payment">
                            <p>Date : <span class="text-black">{{ date('M d, Y', strtotime($data->created_at)) }}</span>
                            </p>
                        </div>
                        <div class="col-md-4 payment">
                            <p class="text-dark">Approved By :
                                <span>{{ $data->first_name . ' ' . $data->last_name . ' - ' . $data->role_name }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end gap-2">
                <div>
                <a href="{{ route('applied-request-list') }}" class="btn btn-sm btn-secondary">Cancel</a>

                </div>
                <div>
                <button class="btn btn-sm btn-primary" onclick="printmydoc()"> Print <i
                        class="fa-solid fa-print"></i></button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/hr/request-recept.js') }}"></script>
@endsection
