<style>
    .first_header {
        position: fixed;
        left: 0;
        top: 0;
    }

    .first_footer {
        position: absolute;
        left: 0;
        bottom: 0;
    }
</style>
<div class='header first_header' id='first_header'>
    <table>
        <tbody>
            <tr>
                <td>
                    <img src='images/prakhar header.png' width='750' height='50' alt='header-image' />
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div style='margin: 50px;   font-size:14px;'>
    <p style='text-align: center;'><strong><em><u>Appointment Letter</u></em></strong></p>
    <p><samp>Date - <strong>{{ $empdetails->today_date }}</strong><br />
            Dear&nbsp;<strong>{{ $empdetails->candidate_name }},</strong><br />
            Employee Code: <strong>{{ $empdetails->emp_code }}</strong><br />
            Date of joining: <strong>{{ $empdetails->doj }}</strong></samp>
    </p>
    <br>
    <p><em>With reference to your application and subsequent discussion, it gives us immense pleasure to offer you
            an
            appointment in <strong>Prakhar Software Solutions Ltd.</strong></em>
    </p>
    <p><em>This is in reference to your employment engagement with us under our Contract with Goa Natural Gas
            Private
            Limited for Providing Technical and Non-Technical Manpower for City Gas Distribution Project of
            <strong>Goa
                Natural Gas Private Limited located at Goa</strong> on a contractual basis.</em>
    </p>
    <br>
    <p>Details of Terms and Conditions:</p>
    <ol>
        <li><em>We are pleased to inform you that you have been selected for the post of
            </em><strong>{{ $empdetails->designation }}</strong>.
        </li>
        <li><em>Your &ldquo;Annual compensation&rdquo; is attached herewith as in Annexure-A</em></li>
        <li><em>Your employment with us will be governed by terms and conditions referred in Annexure-B </em></li>
        <li><em>Your services are effective from the date of your joining {{ $empdetails->doj }} to
                {{ $empdetails->doe }}.</em>
        </li>
        <li><em>Please sign in the duplicate copy of this letter (Photocopy enclosed) on all the sheets at the
                bottom on
                the left corner, and return to the Human resource Department of our Corporate Office at Delhi.
            </em>
        </li>
    </ol>
    <p><em>We welcome you to Prakhar Software Solutions Ltd and look forward to a long term association. </em>
    </p>
    <br>
    <p style='text-align: center;'><samp><strong>Annexure A</strong>(Salary Structure)</samp></p>
    <table align='center' border='1' cellpadding='0' cellspacing='0' style='width:607px'>
        <tbody>
            <tr>
                <td colspan='4'>
                    <p><samp><strong>Annual Cost to Company&nbsp; {{ $empdetails->sal_ctc }}*12 =
                                {{ $empdetails->ctc_pa }} Lakh
                                PA</strong></samp>
                    </p>
                </td>
            </tr>
            <tr>
                <td style='width:150px'><samp><strong>Earning Components</strong></samp></td>
                <td style='width:150px'><samp><strong>Amount</strong></samp></td>
                <td style='width:150px'><samp><strong>Deductions</strong></samp></td>
                <td style='width:150px'><samp><strong>Amount</strong></samp></td>
            </tr>
            <tr>
                <td style='width:150px'><samp>Basic</samp></td>
                <td style='width:150px'><samp>{{ $empdetails->basic }}</samp></td>
                <td style='width:150px'><samp>PF(Employee)</samp></td>
                <td style='width:150px'><samp>{{ $empdetails->sal_pf_emmployee }}</samp></td>
            </tr>
            <tr>
                <td style='width:150px'><samp>HRA</samp></td>
                <td style='width:150px'><samp>{{ $empdetails->hra }}</samp></td>
                <td style='width:150px'><samp>ESI(Employee)</samp></td>
                <td style='width:150px'><samp>{{ $empdetails->sal_esi_employee }}</samp></td>
            </tr>
            <tr>
                <td style='width:150px'><samp>Transportation Allowance</samp></td>
                <td style='width:150px'><samp>{{ $empdetails->conveyance }}</samp></td>
                <td style='width:150px'><samp>&nbsp;</samp></td>
                <td style='width:150px'><samp>&nbsp;</samp></td>
            </tr>
            <tr>
                <td style='width:150px'><samp><strong>Gross</strong></samp></td>
                <td style='width:150px'><samp><strong>{{ $empdetails->sal_gross }}</strong></samp></td>
                <td style='width:150px'><samp><strong>Total Deduction</strong></samp></td>
                <td style='width:150px'><samp><strong>{{ $empdetails->deduction }} </strong></samp></td>
            </tr>
            <tr>
                <td style='width:150px'>PF (Employer)</td>
                <td style='width:150px'>{{ $empdetails->sal_pf_employer }}</td>
                <td style='width:150px'>&nbsp;</td>
                <td style='width:150px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:100px'><em>ESI (Employer)</em></td>
                <td style='width:100px'><samp>{{ $empdetails->sal_esi_employer }}</samp></td>
                <td style='width:100px'>&nbsp;</td>
                <td style='width:100px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:100px'><em>Ex-gratia in lieu of bonus</em></td>
                <td style='width:100px'><samp>{{ $empdetails->bonus }}</samp></td>
                <td style='width:100px'>&nbsp;</td>
                <td style='width:100px'>&nbsp;</td>
            </tr>
            <tr>
                <td style='width:100px'><strong>(CTC)</strong></td>
                <td style='width:100px'><strong>{{ $empdetails->sal_ctc }}</strong></td>
                <td style='width:100px'><strong> Net Pay</strong></td>
                <td style='width:100px'><strong>Rs.{{ $empdetails->sal_net }}</strong></td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <div>
        <strong>Transportation Allowance:</strong> will be paid every month in CTC subject to possessing
        two/four-wheeler and having a valid Driving license and utilizing it for official/site activities.
        <br><br>

        <br><br>
    </div>
</div>
<div class='footer first_footer' id='first_footer'>
    <table>
        <tbody>
            <td>
                <img src='images/prakhar footer.png' width='750' height='100' alt='footer-image' />
            </td>
        </tbody>
    </table>
</div>
<div class='header first_header' id='first_header'>
    <table>
        <tbody>
            <tr>
                <td>
                    <img src='images/prakhar header.png' width='750' height='50' alt='header-image' />
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div style='margin: 50px ; margin-bottom:300px; font-size:14px;'>
    <div>
        <p> <strong>Working hours:</strong> Normal working hours will be 8 hours a day can be defined in shift pattern
            of 8 hours & 6 day a week (excluding lunch break).</p>
        <p><strong>Holidays:</strong> 09 closed office days in a year (3 national holidays & 6 festival holidays).</p>
        <p><strong>Over time:</strong> In order to meet the exigencies of work You will have to work on holidays and for
            extended hours on any working day. For such extended hours of work of minimum 02 hours or more, additional
            payment of Rs 250/- per working day shall be paid only to site employees. </p>
    </div>
    <p>
    <p><strong>Leaves:</strong> 1.25 day per calendar month (15 days over a period of 12 months)</p>
    <ul>
        <li>One day leave can be taken in two half day leaves.</li>
        <li>Leave may be accumulated till tenure of the contract</li>
        <li>The leave will be granted by the agency after obtaining the consent of reporting manager /EIC.
        </li>
        <li>Leaves cannot be encashed and are to be availed before completion of tenure.</li>
    </ul>
    </p>
    <p><strong>Time sheet processing:</strong> The number of hours put by you shall be booked on clients prescribed
        timesheets as instructed by the clients officers supervising the work who will approve the timesheet. </p>
    <p><strong>Note: Any issues please mail on helpdesk@prakharsoftwares.com</strong></p>
    <br><br>
    <p><samp>For <strong>Prakhar Software Solutions Ltd.</strong></samp><br />
        <em><samp>
                <img src='images/sign.png' style='height:40px; width:100px' /><br />
                <strong>Rahul verma</strong><br />Head - HR &amp; Operations&nbsp;</samp></em>
    </p>
</div>
<div class='footer first_footer' id='first_footer'>
    <table>
        <tbody>
            <td>
                <img src='images/prakhar footer.png' width='750' height='100' alt='footer-image' />
            </td>
        </tbody>
    </table>
</div>

{{-- Format 2 --}}
<style>
    #page-break {
        page-break-before: always !important;
        /* position: relative;
        bottom: 150;
        left: 0; */
    }

    @media print {
        #page-break {
            page-break-before: always !important;
        }
    }
</style>
<div id='page-break' style='margin:0px 50px; padding-top: 20px;  '>
    <p style='text-align:center;'><samp><strong><u>Annexure-B</u></strong></samp></p>

    <p><samp>General Terms and Conditions of Employment.</samp></p>

    <ol>
        <li style='padding-bottom: 20px;'><em>The candidate is initially appointed to work at the Client location.
                However, he/she is liable to be transferred to any department or establishment forming part of the
                Company, or any Group Company, anywhere in India, temporarily or permanently. Working Days / Hours may
                vary based on the client requirements. And will be informed by the client</em></li>
        <li style='padding-bottom: 20px;'>Contract duration and availing of leave during the tenure:
            <ul>
                <li><em>Your services shall be on contract basis for a period of 12 months and the same can be
                        extendable or reduced and also are transferable.</em></li>
            </ul>
            <ul>
                <li><em>Any leave availed without intimation will lead to deduction to daily component of your salary.
                        In case of sickness leading to absence from work for more than 3 days, it is mandatory that a
                        certificate from general physician /medical practitioner is produced in support.</em></li>
            </ul>
        </li>
        <li style='padding-bottom: 20px;'><em>Rules &ndash; General:- During the term of employment, the candidate will
                employ himself/herself efficiently, honestly, faithfully and to the best of your ability and shall
                devote your whole time and attention to promote the interest of the company and generally carry out
                duties and work as assigned to you. You shall obey and comply with all the lawful orders and directions
                given to him/her by his reporting Manager &amp; concerned superior in the Client organization.</em></li>
        <li style='padding-bottom: 20px;'><em>Candidate will not indulge into unprofessional practices and in case, it
                is found that while you are not following client organization&rsquo;s policies, rules and guidelines,
                the company would be at liberty to take disciplinary and legal action against you.</em></li>
        <li style='padding-bottom: 20px;'><em>Further candidate shall not divulge any details of the companys
                operations, affairs or secrets or that of our client as named above and or any our /their associates to
                any person/firm or organization without the express consent obtained well in advance through their
                respective authorized signatory, in writing or nor shall you use or attempt to use any information which
                may directly injure or cause loss or may lead indirectly to injury or cause loss to the company or to
                their client.</em></li>
        <li style='padding-bottom: 20px;'><em>You shall not carry /disclose/damage/destroy a document, drawings, sketch,
                data etc. whether in original or physical copy or electronic form, whether at work place or anywhere
                else, willfully or otherwise. As such, you shall maintain strict secrecy of all documents and data of
                our client, failing which we may be compelled to take legal action against you.</em></li>
        <li style='padding-bottom: 20px;'><em>Your services shall strictly be of contractual in nature and basis. Your
                services shall be entirely governed by the requirement of our client as contractually agreed by the
                managements of the company and our client. You will have neither any claim nor recourse to a permanent
                employment with the company or our client, on termination of this contractual appointment or any time in
                future.</em></li>
        <li style='padding-bottom: 20px;'><em>Transfer and Deployment:- you may be transferred to any other location in
                such capacity as the Company may from time to time determine or any department, establishment, factory
                or branch of the Company or its affiliate, associate or subsidiary. In such cases, the candidate will be
                governed by the terms and conditions of services applicable to the new assignment.</em></li>
        <li style='padding-bottom: 20px;'>We reserve the right to terminate this contract within 24 hours if:
            <ul>
                <li>You fail to extend the services to the satisfaction of the person to whom you will be required to
                    report during your work period or any person nominated by client</li>
            </ul>
            <ul>
                <li> You remain absent from duty without proper intimation/approval to/from the person to whom you will
                    be required to report during your work period or any person nominated by the client.</li>
            </ul>
            <ul>
                <li>
                    Should our client request your immediate removal from the place of work, we shall not be held liable
                    to produce any communication from our client to the said cause and effect.
                </li>
            </ul>
        </li>
        <li style='padding-bottom: 20px;'><em> In case you wish to opt out from rendering services and terminate the
                contract, you will be required to give 30(thirty) days&rsquo; notice by way of written document to the
                person named as the contact person from the company and the person to whom you will be required to
                report during your work period or the EIC.</em></li>
        <li style='padding-bottom: 20px;'><em>This engagement is terminable with a fifteen (15) days&rsquo; notice
                period from employer&rsquo;s side and two (2) months&rsquo; notice period from employee&rsquo;s side.
            </em></li>
        <li style='padding-bottom: 20px; padding-top: 50px;'><em>In case the candidate is found engaged in doing any
                work other than the task assigned to him/her or is found not useful to the project or he/she leaves the
                project without any notice, his/her contract will be terminated. If he/she damages any equipment,
                property and third party liabilities, his/her contract will be terminated reserving the rights for
                compensation of damages that are incurred. </em></li>
        <li style='padding-bottom: 20px;'><em>This document is highly confidential, and sharing of this document with
                anybody such as colleagues, client etc., will lead to terminate of your employment without notice.</em>
        </li>
        <li style='padding-bottom: 20px;'><em>Upon completion of service or earlier termination of this contract, you
                shall return to the company all data materials and other work product.</em></li>
    </ol>

    <p><em><strong><em>Declaration:</em></strong><em>&nbsp;Every candidate has to sign the below-said
                declaration.</em></em></p>

    <p><samp><strong>Declaration:</strong> I
            &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...S/o
            /D/o
            /W/o&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.Sincerely
            assure you to maintain complete discipline and do my best to perform my duties. I also authorize the
            management of Prakhar Software Solutions Ltd to ask me to leave any time without any notice, in case of
            any misconduct on my part or if I am found violating any rules and regulations laid by the company from time
            to time or fail to meet the defined performance standards during the training and employment. </samp></p>

    <p><samp>Candidate
            Name/Signature&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</samp>
    <p><samp>(Save Papers save Trees)</samp></p>
    </p>

</div>
