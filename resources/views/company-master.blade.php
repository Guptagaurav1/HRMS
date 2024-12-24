@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/jquery-ui.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/css/select2.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}"/>

@endsection

@section('contents')

<div class="panel-header">
    <h5>Company Master Data</h5>
</div>
<div class="col-md-12 col-xs-12 col-sm-12">
    <!-- Table wrapper for responsiveness -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive dataTable" id="datatable">
            <tbody>
                <tr>
                    <th colspan="4"><center> Company Details</center></th>
                </tr>
                <tr>
                    <th id="bb">Company Name</th>
                    <td data-label="Company Name">Prakhar Software Solutions Pvt. Ltd.</td>
                    <th id="bb">Company Email</th>
                    <td data-label="Company Email">info@prakhasoftwares.com</td>
                </tr>

                <tr>
                    <th id="bb">Company Contact</th>
                    <td data-label="Company Contact">+91 1179626411</td>
                    <th id="bb">Company City</th>
                    <td data-label="Company City">New Delhi</td>
                </tr>

                <tr>
                    <th id="bb">Website</th>
                    <td data-label="Website">https://www.prakharsoftwares.com/</td>
                    <th id="bb">Registration No.</th>
                    <td data-label="Registration No.">U72900DL2014PTC262988</td>
                </tr>

                <tr>
                    <th id="bb">GSTIN No.</th>
                    <td data-label="GSTIN No.">07AAHCP5991R1ZD</td>
                    <th id="bb">SAC Code</th>
                    <td data-label="SAC Code">998313</td>
                </tr>

                <tr>
                    <th id="bb">Service Tax Reg.No.</th>
                    <td data-label="Service Tax Reg.No.">AAHCP5991RSD001</td>
                    <th id="bb">PAN No.</th>
                    <td data-label="PAN No.">AAHCP5991R</td>
                </tr>

                <tr>
                    <th id="bb">Company Address</th>
                    <td colspan="" data-label="Company Address">C - 11, LGF, Opp. State Bank of India, Malviya Nagar New Delhi - 110017</td>
                </tr>

                <tr>
                    <th colspan="4"><center> Bank Details</center></th>
                </tr>
                

                <tr>
                    <th id="bb">Payee Name</th>
                    <td data-label="Payee Name">PRAKHAR SOFTWARE SOLUTIONS PVT. LTD</td>
                    <th id="bb">Bank Name</th>
                    <td data-label="Bank Name">YES BANK LTD</td>
                </tr>

                <tr>
                    <th id="bb">Branch Name</th>
                    <td data-label="Branch Name">Mother Diary Road, Shakarpur, Delhi - 110092</td>
                    <th id="bb">IFSC Code</th>
                    <td data-label="IFSC Code">YESB0000107</td>
                </tr>

                <tr>
                    <th id="bb">Account No.</th>
                    <td data-label="Account No.">010 7838 0000 3722</td>
                    <th id="bb">Branch Address</th>
                    <td data-label="Branch Address">Mother Diary Road, Shakarpur, Delhi - 110092</td>
                </tr>

                <tr>
                    <th id="bb">Bank Email</th>
                    <td data-label="Bank Email">sahasha@prakharsoftwares.com</td>
                    <th id="bb">Payment Mode</th>
                    <td data-label="Payment Mode">DD/Cheque</td>
                </tr>

                <tr>
                    <th colspan="4"><center> Company Details</center></th>
                </tr>

                <tr>
                    <th id="bb">Company Name</th>
                    <td data-label="Company Name">Indian Institute of Drone Technology</td>
                    <th id="bb">Company Email</th>
                    <td data-label="Company Email">idea@theiidt.com</td>
                </tr>

                <tr>
                    <th id="bb">Company Contact</th>
                    <td data-label="Company Contact">+91 1179626411</td>
                    <th id="bb">Company City</th>
                    <td data-label="Company City">New Delhi</td>
                </tr>

                <tr>
                    <th id="bb">Website</th>
                    <td data-label="Website">https://www.prakharsoftwares.com/</td>
                    <th id="bb">Registration No.</th>
                    <td data-label="Registration No.">U72900DL2014PTC262988</td>
                </tr>

                <tr>
                    <th id="bb">GSTIN No.</th>
                    <td data-label="GSTIN No.">07AAHCP5991R1ZD</td>
                    <th id="bb">SAC Code</th>
                    <td data-label="SAC Code">998313</td>
                </tr>

                <tr>
                    <th id="bb">Service Tax Reg.No.</th>
                    <td data-label="Service Tax Reg.No.">AAHCP5991RSD001</td>
                    <th id="bb">PAN No.</th>
                    <td data-label="PAN No.">AAHCP5991R</td>
                </tr>

                <tr>
                    <th id="bb">Company Address</th>
                    <td colspan="3" data-label="Company Address">C - 11, LGF, Opp. State Bank of India, Malviya Nagar New Delhi - 110017</td>
                </tr>

                <tr>
                    <th colspan="4"><center> Bank Details</center></th>
                </tr>

                <tr>
                    <th id="bb">Payee Name</th>
                    <td data-label="Payee Name">PRAKHAR SOFTWARE SOLUTIONS PVT. LTD</td>
                    <th id="bb">Bank Name</th>
                    <td data-label="Bank Name">YES BANK LTD</td>
                </tr>

                <tr>
                    <th id="bb">Branch Name</th>
                    <td data-label="Branch Name">Mother Diary Road, Shakarpur, Delhi - 110092</td>
                    <th id="bb">IFSC Code</th>
                    <td data-label="IFSC Code">YESB0000107</td>
                </tr>

                <tr>
                    <th id="bb">Account No.</th>
                    <td data-label="Account No.">010 7838 0000 3722</td>
                    <th id="bb">Branch Address</th>
                    <td data-label="Branch Address">Mother Diary Road, Shakarpur, Delhi - 110092</td>
                </tr>

                <tr>
                    <th id="bb">Bank Email</th>
                    <td data-label="Bank Email">sahasha@prakharsoftwares.com</td>
                    <th id="bb">Payment Mode</th>
                    <td data-label="Payment Mode">DD/Cheque</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('assets/vendor/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/select2-init.js') }}"></script>
@endsection
