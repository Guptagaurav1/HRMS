@extends('layouts.master', ['title' => 'Salary Slip'])

@section('contents')
<div class="fluid-container">
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-1">Salary List</h2>
                    <div>
                    <ul class="breadcrumb">
                        <li><a href="{{ get_dashboard() }}">Dashboard</a></li>
                        <li>Salary List</li>
                    </ul>
                    </div>
                </div>


                <p class="text-danger px-3 py-2">** Search applicable on Emp Id/Name/Work Order Number/Designation</p>



                <div class="row">
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
            </div>



                <!-- New Search Field -->


                <div class="row px-2 mt-3">
                    <div class="col-md-10">
                        <form method="get">
                            <div class="row">
                                <div class="col-auto col-xs-12">
                                    <input type="text" name="search" value="{{$search}}" class="form-control"
                                        placeholder="Search" required>

                                </div>
                                <div class="col-auto col-xs-12">
                                    <button type="submit" class="btn  btn-primary">Search <i
                                            class="fa-solid fa-magnifying-glass"></i></button>

                                </div>
                                <div class="col-auto col-xs-12">
                                    <a href="{{ route('salary-list') }}" class="col-xs-12"><button type="button"
                                            class="btn btn-primary  ">Clear <i
                                                class="fa-solid fa-eraser"></i></button>
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto col-xs-12">
                        <a href="{{route('export-salary')}}">
                            <button type="submit" class="btn btn-primary ">CSV</button></a>

                    </div>
                </div>

                <!-- Error Message -->

                @if($message = Session::get('success'))
                <div class="col-md-12">
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            {{ $message }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif



                @if($message = Session::get('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            {{ $message }}
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif


              

                <div class="table-responsive">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="text-center attributes-column">Employee Code</th>
                                    <th class="text-center attributes-column">Work Order</th>
                                    <th class="text-center attributes-column">Date of Joining</th>
                                    <th class="text-center attributes-column">Employee Name</th>
                                    <th class="text-center attributes-column">Designation</th>
                                    <th class="text-center attributes-column">CTC</th>
                                    <th class="text-center attributes-column">Gross Pay</th>
                                    <th class="text-center attributes-column">Net Pay</th>
                                    <th class="text-center attributes-column">Basic Pay</th>
                                    <th class="text-center attributes-column">HRA</th>
                                    <th class="text-center attributes-column">DA</th>
                                    <th class="text-center attributes-column">Conveyance</th>
                                    <th class="text-center attributes-column">Special Allowance</th>
                                    <th class="text-center attributes-column">Medical Allowance</th>
                                    <th class="text-center attributes-column">PF Employer</th>
                                    <th class="text-center attributes-column">ESI Employer</th>
                                    <th class="text-center attributes-column">TAX</th>
                                    <th class="text-center attributes-column">TDS Deduction</th>
                                    <th class="text-center attributes-column">PF No.</th>
                                    <th class="text-center attributes-column">ESI No.</th>
                                    <th class="text-center attributes-column">Bank name</th>
                                    <th class="text-center attributes-column">Account no</th>
                                    <th class="text-center attributes-column">IFSC Code</th>
                                    <th class="text-center attributes-column">Contact No</th>
                                    <th class="text-center attributes-column">Email Id</th>
                                    <th class="text-center attributes-column">Remarks</th>
                                    <th class="text-center attributes-column">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($salary as $key => $value)
                                <tr>
                                    <td title="Emp. Code" class="text-center attributes-column">{{$value->sl_emp_code}}
                                    </td>
                                    <td title="Work Order" class="text-center attributes-column">
                                        {{$value->empDetail->emp_work_order}}</td>
                                    <td title="D.O.J" class="text-center attributes-column">{{date('jS F, Y', strtotime($value->sa_emp_doj))}}</td>
                                    <td title="EMp. Name" class="text-center attributes-column">{{$value->sal_emp_name}}
                                    </td>
                                    <td title="Dessination" class="text-center attributes-column">
                                        {{$value->sal_emp_designation}} </td>
                                    <td title="CTC" class="text-center attributes-column">{{$value->sal_ctc}}</td>
                                    <td title="Gross" class="text-center attributes-column">{{$value->sal_gross}}</td>
                                    <td title="Net Salary" class="text-center attributes-column">{{$value->sal_net}}
                                    </td>
                                    <td title="Basic Salary" class="text-center attributes-column">{{$value->sal_basic}}
                                    </td>
                                    <td title="HRA" class="text-center attributes-column">{{$value->sal_hra}}</td>
                                    <td title="Salary DA" class="text-center attributes-column">{{$value->sal_da}}</td>
                                    <td title="Salary Conveyance" class="text-center attributes-column">
                                        {{$value->sal_conveyance}}</td>
                                    <td title="Salary Special allowance" class="text-center attributes-column">
                                        {{$value->sal_special_allowance}}</td>
                                    <td title="Medical Allowance" class="text-center attributes-column">
                                        {{$value->medical_allowance}}</td>
                                    <td title="Salary PF Employer" class="text-center attributes-column">
                                        {{$value->sal_pf_employer}}</td>
                                    <td title="ESI Employer" class="text-center attributes-column">
                                        {{$value->sal_esi_employer}}</td>
                                    <td title="TDS Tax Amount" class="attributes-column">{{$value->tds_tax_amount}}</td>

                                    <td title="TDS Deduction" class="text-center attributes-column">
                                        {{$value->tds_deduction}}</td>
                                    <td title="PF No." class="text-center attributes-column">
                                        {{$value->empDetail->getBankDetail->emp_pf_no??NULL}}</td>
                                    <td title="ESI No." class="text-center attributes-column">
                                        {{$value->empDetail->getBankDetail->emp_esi_no??NULL}}</td>
                                    <td title="Bank No." class="text-center attributes-column">
                                        {{$value->empDetail->getBankDetail->getBankData->name_of_bank??NULL}}</td>
                                    <td title="Account No." class="text-center attributes-column">
                                        {{$value->empDetail->getBankDetail->emp_account_no??NULL}}</td>
                                    <td class="text-center attributes-column">
                                        {{$value->empDetail->getBankDetail->emp_ifsc}}
                                    </td>
                                    <td title="Phone" class="text-center attributes-column">
                                        {{$value->empDetail->emp_phone_first}}</td>
                                    <td title="Email" class="text-center attributes-column">
                                        {{$value->empDetail->emp_email_first}}</td>
                                    <td title="Remark" class="text-center attributes-column">{{$value->sal_remark}}</td>
                                    <td class="text-center"><a href="{{route('edit-salary',$value->id)}}"><button
                                                class="btn btn-sm btn-primary">Edit <i
                                                    class="fa-solid fa-pen-to-square"></i></button></a>
                                        <a data-id="{{ $value->id }}" class="delete-salary"><button
                                                class="btn btn-sm btn-danger" title="Delete">Delete <i
                                                    class="fa-solid fa-trash"></i></button></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center"><span class="text-danger">No Record Found</span>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                        </table>
                        {{$salary->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>


@endsection

@section('script')

<script src="{{asset('assets/js/hr/salary.js')}}"></script>
@endsection