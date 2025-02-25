@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>
@endsection

@section('contents')

<div class="panel-header">
    <h5>Company Master Data</h5>
</div>
<div class="col-md-12 col-xs-12 col-sm-12">
    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive dataTable" id="datatable">
            <tbody>
                @forelse($details as $detail)
                <tr>
                    <th colspan="4"><center> Company Details</center></th>
                </tr>
                <tr>
                    <th id="bb">Company Name</th>
                    <td data-label="Company Name">{{$detail->company_name}}</td>
                    <th id="bb">Company Email</th>
                    <td data-label="Company Email">{{$detail->company_email}}</td>
                </tr>

                <tr>
                    <th id="bb">Company Contact</th>
                    <td data-label="Company Contact">{{$detail->company_contact}}</td>
                    <th id="bb">Company City</th>
                    <td data-label="Company City">{{$detail->company_city}}</td>
                </tr>

                <tr>
                    <th id="bb">Website</th>
                    <td data-label="Website">{{$detail->website}}</td>
                    <th id="bb">Registration No.</th>
                    <td data-label="Registration No.">{{$detail->service_tax_registration_no}}</td>
                </tr>

                <tr>
                    <th id="bb">GSTIN No.</th>
                    <td data-label="GSTIN No.">{{$detail->gstin_no}}</td>
                    <th id="bb">SAC Code</th>
                    <td data-label="SAC Code">{{$detail->sac_code}}</td>
                </tr>

                <tr>
                    <th id="bb">Service Tax Reg.No.</th>
                    <td data-label="Service Tax Reg.No.">{{$detail->service_tax_registration_no}}</td>
                    <th id="bb">PAN No.</th>
                    <td data-label="PAN No.">{{$detail->pan_no}}</td>
                </tr>

                <tr>
                    <th id="bb">Company Address</th>
                    <td colspan="" data-label="Company Address">{{$detail->company_address}}</td>
                </tr>

                <tr>
                    <th colspan="4"><center> Bank Details</center></th>
                </tr>
                

                <tr>
                    <th id="bb">Payee Name</th>
                    <td data-label="Payee Name">{{$detail->bank_payee_name}}</td>
                    <th id="bb">Bank Name</th>
                    <td data-label="Bank Name">{{$detail->bank_name}}</td>
                </tr>

                <tr>
                    <th id="bb">Branch Name</th>
                    <td data-label="Branch Name">{{$detail->branch_name}}</td>
                    <th id="bb">IFSC Code</th>
                    <td data-label="IFSC Code">{{$detail->ifsc_code}}</td>
                </tr>

                <tr>
                    <th id="bb">Account No.</th>
                    <td data-label="Account No.">{{$detail->account_no}}</td>
                    <th id="bb">Branch Address</th>
                    <td data-label="Branch Address">{{$detail->branch_address}}</td>
                </tr>

                <tr>
                    <th id="bb">Bank Email</th>
                    <td data-label="Bank Email">{{$detail->bank_email}}</td>
                    <th id="bb">Payment Mode</th>
                    <td data-label="Payment Mode">{{$detail->payment_type}}</td>
                </tr>
                @empty 
                    <tr>
                        <td class="text-danger text-center">No Record found</td>
                    </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>
</div>

@endsection

