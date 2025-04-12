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
                        <li> @if (auth()->user()->role->role_name="hr")
                            <a href="{{route('hr_dashboard')}}">Dashboard</a>
                            @endif
                        </li>
                        <li>Salary List</li>
                    </ul>
                </div>
                </div>
                <p class="text-danger px-3 py-3">** Seacrh applicable on Emp Id/Name/Work Order Number/Designation</p>
                <div class="col-md-12 text-end p-2">
                    <button type="submit" class="btn btn-primary ">CSV</button>
                </div>
                <div class="col-md-12 d-flex justify-content-start mx-3">
                    <form class="row g-3">
                        <div class="col-auto col-xs-12 mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search" value="{{$search}}" required>
                        </div>
                        <div class="col-auto col-xs-12">
                            <button type="submit" class="btn btn-primary mb-3">Search</button>
                            <a href="{{ route('salary-list') }}" class="col-xs-12"><button type="button" class="btn btn-primary mb-3">Clear <i class="fa-solid fa-eraser"></i></button></a>
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
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover digi-dataTable all-employee-table table-striped"
                            id="allEmployeeTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Employee Code</th>
                                    <th class="text-center">Work Order</th>
                                    <th class="text-center">Date of Joining</th>
                                   
                                    <th class="text-center">Employee Name</th>
                                    <th class="text-center">Designation</th>
                                    <th class="text-center">CTC</th>
                                    <th class="text-center">Gross Pay</th>
                                    <th class="text-center">Net Pay</th>
                                    <th class="text-center">Basic Pay</th>
                                    <th class="text-center">HRA</th>
                                    <th class="text-center">DA</th>
                                    <th class="text-center">Conveyance</th>
                                    <th class="text-center">Special Allowance</th>
                                    <th class="text-center">Medical Allowance</th>
                                    <th class="text-center">PF Employer</th>
                                    <th class="text-center">ESI Employer</th>
                                    <th class="text-center">TAX</th>
                                    <th class="text-center">TDS Deduction</th>
                                    <th class="text-center">PF No.</th>
                                    <th class="text-center">ESI No.</th>
                                    <th class="text-center">Bank name</th>
                                    <th class="text-center">Account no</th>
                                    <th class="text-center">IFSC Code</th>
                                    <th class="text-center">Contact No</th>
                                    <th class="text-center">Email Id</th>
                                    <th class="text-center">Remarks</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($salary as $key => $value)
                                    <tr>
                                        <td title="Emp. Code" class="text-center">{{$value->sl_emp_code}}</td>
                                        <td title="Work Order" class="text-center">{{$value->empDetail->emp_work_order}}</td>
                                        <td title="D.O.J" class="text-center">{{$value->sa_emp_doj}}</td>
                                        <td title="EMp. Name" class="text-center">{{$value->sal_emp_name}}</td>
                                        <td title="Dessination" class="text-center">{{$value->sal_emp_designation}}	</td>
                                        <td title="CTC" class="text-center">{{$value->sal_ctc}}</td>
                                        <td title="Gross" class="text-center">{{$value->sal_gross}}</td>
                                        <td title="Net Salary" class="text-center">{{$value->sal_net}}</td>
                                        <td title="Basic Salary" class="text-center">{{$value->sal_basic}}</td>
                                        <td title="HRA" class="text-center">{{$value->sal_hra}}</td>
                                        <td title="Salary DA" class="text-center">{{$value->sal_da}}</td>
                                        <td title="Salary Conveyance" class="text-center">{{$value->sal_conveyance}}</td>
                                        <td title="Salary Special allowance" class="text-center">{{$value->sal_special_allowance}}</td>
                                        <td title="Medical Allowance" class="text-center">{{$value->medical_allowance}}</td>
                                        <td title="Salary PF Employer" class="text-center">{{$value->sal_pf_employer}}</td>
                                        <td title="ESI Employer" class="text-center">{{$value->sal_esi_employer}}</td>
                                        <td title="TDS Tax Amount">{{$value->tds_tax_amount}}</td>

                                        <td title="TDS Deduction" class="text-center">{{$value->tds_deduction}}</td>
                                        <td title="PF No." class="text-center">{{$value->empDetail->getBankDetail->emp_pf_no??NULL}}</td>
                                        <td title="ESI No." class="text-center">{{$value->empDetail->getBankDetail->emp_esi_no??NULL}}</td>
                                        <td title="Bank No." class="text-center">{{$value->empDetail->getBankDetail->getBankData->name_of_bank??NULL}}</td>
                                        <td title="Account No." class="text-center">{{$value->empDetail->getBankDetail->emp_account_no??NULL}}</td>
                                        <td class="text-center">{{$value->empDetail->getBankDetail->emp_ifsc}}</td>
                                        <td title="Phone" class="text-center">{{$value->empDetail->emp_phone_first}}</td>
                                        <td title="Email" class="text-center">{{$value->empDetail->emp_email_first}}</td>
                                        <td title="Remark" class="text-center">{{$value->sal_remark}}</td>
                                        <td class="text-center"><a href="{{route('edit-salary',$value->id)}}"><button class="btn btn-sm btn-primary">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                                        <a data-id="{{ $value->id }}"  class="delete-salary"><button class="btn btn-sm btn-danger"  title="Delete">Delete <i class="fa-solid fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center"><span class="text-danger">No Record Found</span></td>
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


@endsection

@section('script')

<script src="{{asset('assets/js/hr/salary.js')}}"></script>
@endsection