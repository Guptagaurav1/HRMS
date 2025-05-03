@extends('layouts.master', ['title' => 'Company Details'])

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="panel">
                <div class="panel-header">
                    <h2 class="mt-2">Company Details</h2>
                    <div>
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
                        <li><a href="{{route('company.list')}}">Company List</a></li>
                        <li>Company Details</li>
                    </ul>
                </div>
                </div>
                <div class="panel-body p-3">
                    <div class="col-md-12 col-xs-12 col-sm-12">

                        <div class="table-responsive">
                            <table
                                class="table table-striped text-center align-middle table-hover table-responsive dataTable"
                                id="datatable">
                                <tbody>
                                    <tr>
                                        <th colspan="4" class="text-dark fw-bold">
                                            <center> Company Details</center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th id="bb">Company Name</th>
                                        <td data-label="Company Name">{{ $company->name }}</td>
                                        <th id="bb">Company Email</th>
                                        <td data-label="Company Email" class="text-center">{{ $company->email }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th id="bb">Company Contact</th>
                                        <td data-label="Company Contact">{{ $company->mobile }}</td>
                                        <th id="bb">Company City</th>
                                        <td data-label="Company City" class="text-center">{{ $company->company_city }}</td>
                                    </tr>

                                    <tr>
                                        <th id="bb">Website</th>
                                        <td data-label="Website">{{ $company->website }}</td>
                                        <th id="bb">Registration No.</th>
                                        <td data-label="Registration No." class="text-center">
                                            {{ $company->service_tax_registration_no }}</td>
                                    </tr>

                                    <tr>
                                        <th id="bb">GSTIN No.</th>
                                        <td data-label="GSTIN No.">{{ $company->gstin_no }}</td>
                                        <th id="bb">SAC Code</th>
                                        <td data-label="SAC Code" class="text-center">{{ $company->sac_code }}</td>
                                    </tr>

                                    <tr>
                                        <th id="bb">Service Tax Reg.No.</th>
                                        <td data-label="Service Tax Reg.No.">{{ $company->service_tax_registration_no }}
                                        </td>
                                        <th id="bb">PAN No.</th>
                                        <td data-label="PAN No." class="text-center">{{ $company->pan_no }}</td>
                                    </tr>

                                    <tr>
                                        <th id="bb">Company Address</th>
                                        <td colspan="" data-label="Company Address">{{ $company->company_address }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th colspan="4" class="text-dark fw-bold">
                                            <center> Bank Details</center>
                                        </th>
                                    </tr>


                                    <tr>
                                        <th id="bb">Payee Name</th>
                                        <td data-label="Payee Name">{{ $company->bank_payee_name }}</td>
                                        <th id="bb">Bank Name</th>
                                        <td data-label="Bank Name" class="text-center">{{ $company->bank_name }}</td>
                                    </tr>

                                    <tr>
                                        <th id="bb">Branch Name</th>
                                        <td data-label="Branch Name">{{ $company->branch_name }}</td>
                                        <th id="bb">IFSC Code</th>
                                        <td data-label="IFSC Code" class="text-center">{{ $company->ifsc_code }}</td>
                                    </tr>

                                    <tr>
                                        <th id="bb">Account No.</th>
                                        <td data-label="Account No.">{{ $company->account_no }}</td>
                                        <th id="bb">Branch Address</th>
                                        <td data-label="Branch Address" class="text-center">{{ $company->branch_address }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th id="bb">Bank Email</th>
                                        <td data-label="Bank Email">{{ $company->bank_email }}</td>
                                        <th id="bb">Payment Mode</th>
                                        <td data-label="Payment Mode" class="text-center">{{ $company->payment_type }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
