<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-old.min.css')}}">
    <style>
        /* Styles go here */
        table td,
        table th {
            padding: 2px 10px !important;
        }

        .page-header,
        .page-header-space {
            height: 120px;
        }

        .page-footer,
        .page-footer-space {
            height: 220px;

        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .page-header {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .page {
            page-break-after: always;
        }

        @page {
            margin: 20mm
        }

        @media print {
            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }

            button {
                display: none;
            }

            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="page-header">
        <img src="{{ asset('recruitment/images/prakhar_header.png') }}" alt="Naukriyan Logo" width="100%">
    </div>

    <div class="page-footer">
        <img src="{{ asset('recruitment/images/prakhar_footer.png') }}" alt="Naukriyan Logo" width="100%">
    </div>

    <table style="margin-top:5%;">

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page container">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 style="float:right;">Human Resource Inventory</h3>
                            </div>

                            <table class="table table-bordered my-2">
                                <tr>
                                    <th>Applied For</th>
                                    <td>{{ ucwords($details->job_position) }}</td>
                                </tr>
                                <tr>
                                    <th>Client Name</th>
                                    <td>{{ $details->pos_req_id ? ucwords($details->getPositionDetail->client_name) : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Name Of Candidate / Applicant</th>
                                    <td>{{ ucwords($details->firstname . ' ' . $details->lastname) }}</td>
                                </tr>

                                <tr>
                                    <th>Address Of Correspondence(With PO,Pin code)</th>
                                    <td>{{ $details->getAddressDetail ? $details->getAddressDetail->emp_local_address : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Permanent Address(With PO,Pin code)</th>
                                    <td>{{ $details->getAddressDetail ? $details->getAddressDetail->emp_permanent_address : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Father's Name </th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->emp_father_name : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Father's Mobile</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->emp_father_mobile : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Date Of Birth (DD.MM.YYYY)</th>
                                    <td>{{ $details->dob }}</td>
                                </tr>

                                <tr>
                                    <th>Date Of Joining (DD.MM.YYYY)</th>
                                    <td>{{ $details->doj }}</td>
                                </tr>
                                <tr>
                                    <th>Date Of Marriage (DD.MM.YYYY)</th>
                                    <td>{{ !empty($details->getPersonalDetail) ? $details->getPersonalDetail->emp_dom : ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Spouse Name(Wife / Husband)</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->emp_husband_wife_name : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Location / Bhawan (of deployment)</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->preferred_location : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Department / Project Name</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Name Of Local Project Coordinator</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Local Project Coordinator Mobile</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Local Project Coordinator Email ID</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Gender (Male/Female)</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->emp_gender : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Marital Status(Single / Married)</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->emp_marital_status : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Preffered Location</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->preferred_location : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Current Job Location</th>
                                    <td>{{ ucwords($details->location) }}</td>
                                </tr>

                                <tr>
                                    <th>Name Of Hometown and State</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Mobile Number -1</th>
                                    <td>{{ $details->phone }}</td>
                                </tr>

                                <tr>
                                    <th>Mobile Number - 2</th>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Email Id -1</th>
                                    <td>{{ $details->email }}</td>
                                </tr>

                                <tr>
                                    <th>Email Id - 2</th>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Educational Qualification -10th(Year & Marks in %)</th>
                                    <td>{{ !empty($details->getEducationDetail->{'emp_tenth_percentage'}) ? $details->getEducationDetail->{'emp_tenth_year'} . ' & ' . $details->getEducationDetail->{'emp_tenth_percentage'} . '%' : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Educational Qualification -12th(Year & Marks in %)</th>
                                    <td>{{ !empty($details->getEducationDetail->{'emp_twelve_percentage'}) ? $details->getEducationDetail->{'emp_twelve_year'} . ' & ' . $details->getEducationDetail->{'emp_twelve_percentage'} . '%' : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Qualification -Graduation (Year & Marks in %)</th>
                                    <td>{{ !empty($details->getEducationDetail->emp_graduation_percentage) ? $details->getEducationDetail->emp_graduation_year . ' & ' . $details->getEducationDetail->emp_graduation_percentage . '%' : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Full Time / Part Time / Distance & Year of Passing</th>
                                    <td>{{ $details->getEducationDetail ? $details->getEducationDetail->emp_graduation_mode : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Qualification -Post Graduation (Year & Marks in %)</th>
                                    <td>{{ !empty($details->getEducationDetail->emp_postgraduation_percentage) ? $details->getEducationDetail->emp_postgraduation_year . ' & ' . $details->getEducationDetail->emp_postgraduation_percentage . '%' : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Full Time / Part Time / Distance & Year of Passing</th>
                                    <td>{{ $details->getEducationDetail ? $details->getEducationDetail->emp_postgraduation_mode : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Additional Qualification /Course /Diploma(With %)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Full Time / Part Time / Distance & Year of Passing</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Functional Area (Please refer to Annexure - I)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Technology / Platform (Please refer to Annexure - I)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Skill Sets / Database (Please refer to Annexure - I)</th>
                                    <td>{{ ucwords($details->skill) }}</td>
                                </tr>

                                <tr>
                                    <th>Latest Employer (From -To)</th>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th>Total Experience (In Years + Months)</th>
                                    <td>{{ $details->experience . ' Years' }}</td>
                                </tr>

                                <tr>
                                    <th>Relevant Experience (In Years + Months)</th>
                                    <td>{{ $details->experience . ' Years' }}</td>
                                </tr>

                                <tr>
                                    <th>Current Salary(Gross / Month)</th>
                                    <td>{{ $details->getCompanyDetail ? $details->getCompanyDetail->salary_ctc : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Take Home Salary(as per Bank Statement)</th>
                                    <td>{{ $details->getCompanyDetail ? $details->getCompanyDetail->take_home_salary : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Passport No.</th>
                                    <td>{{ $details->getIdProofDetail ? $details->getIdProofDetail->emp_passport_no : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Pan No.</th>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->emp_pan : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Bank Account No.</th>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->emp_account_no : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Bank Name</th>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->bank_id : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Branch Name</th>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->emp_branch : '' }}</td>
                                </tr>

                                <tr>
                                    <th>RTGS Code</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>IFSC Code</th>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->emp_ifsc : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Photograph</th>
                                    <td>{{ !empty($details->getPersonalDetail) ? ($details->getPersonalDetail->emp_photo ? 'Attached' : 'Not Attached') : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Copy of Cancelled Check or Passbook </th>
                                    <td>{{ !empty($details->getIdProofDetail->bank_doc) ? 'Attached' : 'Not Attached' }}</td>
                                </tr>

                                <tr>
                                    <th>Blood Group</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->emp_blood_group : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Language Known</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->language_known : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Reference With Mobile No.</th>
                                    <td>{{ $details->reference_name . ' / ' . $details->reference_name }}</td>
                                </tr>

                            </table>
                            <!-- For ESI Details -->
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center">Signature</th>
                                    <th class="text-center">Passport Size</th>
                                </tr>

                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"><img
                                            src="{{asset('recruitment/candidate_documents/sign/'. $details->getPersonalDetail->emp_signature.'') }}" alt=""
                                            height="50" width="100"></td>
                                    <td class="text-center"><img
                                            src="{{asset('recruitment/candidate_documents/passport_size_photo/'.$details->getPersonalDetail->emp_photo.'') }}"
                                            alt="" height="100" width="100"></td>
                                </tr>
                            </table>

                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center" colspan="2">New Format for Employees and Family Details
                                        for ESI Card(For those
                                        who applied under ESIC)</th>
                                </tr>

                                <tr>
                                    <th>Name</th>
                                    <td>{{ $details->firstname . ' ' . $details->lastname }}</td>
                                </tr>
                                <tr>
                                    <th>Father's Name</th>
                                    <td>{{ $details->getPersonalDetail ? $details->getPersonalDetail->emp_father_name : '' }}</td>
                                </tr>
                                <tr>
                                    <th>Aadhar No.</th>
                                    <td>{{ $details->getIdProofDetail ? $details->getIdProofDetail->emp_aadhaar_no : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Contact No.</th>
                                    <td>{{ $details->phone }}</td>
                                </tr>

                                <tr>
                                    <th>Date Of Joining</th>
                                    <td>{{ $details->doj }}</td>
                                </tr>

                                <tr>
                                    <th>Date of Birth as Per Aadhar card (DD/MM/YYYY)</th>
                                    <td>{{ $details->dob }}</td>
                                </tr>

                                <tr>
                                    <th>Permanent Address</th>
                                    <td>{{ $details->getAddressDetail ? $details->getAddressDetail->emp_permanent_address : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Present Address</th>
                                    <td>{{ $details->getAddressDetail ? $details->getAddressDetail->emp_local_address : '' }}</td>
                                </tr>

                                <tr>
                                    <th>Previous ESI No.(If Any)</th>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->emp_esi_no : '' }}</td>
                                </tr>
                            </table>

                            <!-- For Bank Details -->
                            <table class="table table-bordered">
                                <tr>
                                    <th class="text-center" colspan="3">Bank Details</th>
                                </tr>

                                <tr>
                                    <th>Bank Name</th>
                                    <th>IFSC Code</th>
                                    <th>Account No.</th>
                                </tr>

                                <tr>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->getBankData->name_of_bank : '' }}</td>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->emp_ifsc : '' }}</td>
                                    <td>{{ $details->getBankDetail ? $details->getBankDetail->emp_account_no : '' }}</td>
                                </tr>

                            </table>



                            <div class="page" style="line-height:2;margin-top:40%;">

                                <div class="horizontal">
                                    <!-- For Family Deatils -->
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center" colspan="6">Family Details</th>
                                        </tr>

                                        <tr>
                                            <th>S.No</th>
                                            <th>Family Members</th>
                                            <th>Relationship with the Member</th>
                                            <th>Aadhar No.</th>
                                            <th>DOB as per Adhaar No.</th>
                                            <th>Stay with Member</th>
                                        </tr>
                                        @foreach($details->getNomineeDetail as $member)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $member->family_member_name }}</td>
                                            <td>{{ $member->relation_with_mem }}</td>
                                            <td>{{ $member->aadhar_card_no }}</td>
                                            <td>{{ $member->dob }}</td>
                                            <td>{{ $member->stay_with_mem }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="2">Nominee</th>
                                            <td colspan="4">{{$details->getNomineeDetail ? $details->getNomineeDetail[0]->nominee : ''}}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Dispensary Name near you</th>
                                            <td colspan="4">{{$details->getNomineeDetail ? $details->getNomineeDetail[0]->dispensary_near_you : ''}}</td>
                                        </tr>
                                    </table>
                                    <label><strong>POINT TO BE NOTED:</strong></label>
                                    <ul style="list-style:none;">
                                        <li><strong>1.Scan copy of adhaar card of yours.</strong></li>
                                        <li><strong>2.Scan copy of adhaar card of your family member.</strong></li>
                                        <li><strong>3.Kindly mention the Date of Birth in DD/MM/YYYY format as per
                                                card.</strong></li>
                                    </ul>

                                    <p style="font-style:italic;"><strong><u>Disclaimer : </u></strong> This
                                        Communication is of company’s
                                        representative.
                                        The company has the right to keep your information confidential and use it only
                                        in providing an
                                        employment opportunity for educated, talented and hardworking,
                                        candidates/professionals.
                                        If any individual found in sharing an inappropriate and falsification
                                        information to company’s
                                        representative or any third party, or also being involved in receiving or giving
                                        an kind of financial
                                        help or commission or support in lieu of providing the employment to his/her
                                        friend, relatives,
                                        colleagues etc. Will go through the legal proceedings.
                                        The company has the right to take a necessary action.<b><u> All the fields are
                                                mandatory and please
                                                follow the writing rules while filing this information. No Experience
                                                Please.</u></b>
                                        <b>Prakhar Software Solutions Pvt Ltd and it subsidiary has the rights to go for
                                            any reference check
                                            without intimation resource to validate the information</b>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="page container" style="line-height: 3;"> -->

                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>

</body>

</html>
