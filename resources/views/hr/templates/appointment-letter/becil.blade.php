<style>
    #sec_div {
        page-break-before: always;
    }

    #first_footer {
        position: absolute;
        bottom: 0px;
        left: 0px;
    }
</style>
<div class="header">
    <table>
        <tbody>
            <tr>
                <td>
                    <img src="images/prakhar header.png" width="750" height="50" alt="header-image" />
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div style="margin: 0px 30px; font-size:14px;">
    <p style="text-align: center;"><strong><em><u>Appointment Letter</u></em></strong></p>

    <p><samp>Date - <strong>{{ $empdetails->today_date }}</strong><br />
            Dear&nbsp;<strong>{{ $empdetails->candidate_name }},</strong><br />
            Employee Code: <strong>{{ $empdetails->emp_code }}</strong><br />
            Date of joining: <strong>{{ $empdetails->doj }}</strong></samp></p>

    <p><em>With reference to your application and subsequent discussion, it gives us immense pleasure to offer you an
            appointment in <strong>Prakhar Software Solutions Pvt Ltd.</strong></em></p>

    <p><em>This is in reference to your employment engagement with us On-going &amp; Up-coming eGovernance &amp; IT
            related Projects on contractual basis.</em>
    </p>

    <p><samp>Details of Terms and Conditions:</samp></p>

    <ol>
        <li><em>We are pleased to inform you that you have been selected for the post of
            </em><strong>{{ $empdetails->designation }}</strong> <em>for one of our esteemed clients.</em></li>
        <li><em>Your &ldquo;Annual compensation&rdquo; is attached herewith as in Annexure-A</em></li>
        <li><em>Your employment with us will be governed by terms and conditions referred in Annexure-B </em></li>
        <li><em>Your services are effective from {{ $empdetails->doj }} to {{ $empdetails->doe }}.</em>
        </li>
        <li><em>Please sign in the duplicate copy of this letter (Photocopy enclosed) on all the sheets at the bottom on
                the left corner, and return to the Human resource Department of our Corporate Office at Delhi.</em></li>
    </ol>

    <p><em>We welcome you to Prakhar Software Solutions Pvt Ltd and look forward to a long term association. </em></p>

    <p><samp><strong>Salary Structure(Annexure A)</strong></samp></p>

    <table align="center" border="1" cellpadding="0" cellspacing="0" style="width:607px">
        <tbody>
            <tr>
                <td colspan="4">
                    <p><samp><strong>Annual Cost to Company&nbsp; {{ $empdetails->sal_ctc }}*12 = {{ $empdetails->ctc_pa }} Lakh
                                PA</strong></samp>
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:128px"><samp><strong>Earning Components</strong></samp></td>
                <td style="width:186px"><samp><strong>Amount</strong></samp></td>
                <td style="width:159px"><samp><strong>Deductions</strong></samp></td>
                <td style="width:133px"><samp><strong>Amount</strong></samp></td>
            </tr>
            <tr>
                <td style="width:128px"><samp>Basic</samp></td>
                <td style="width:186px"><samp>{{ $empdetails->basic }}</samp></td>
                <td style="width:159px"><samp>PF(Employee)</samp></td>
                <td style="width:133px"><samp>{{ $empdetails->sal_pf_emmployee }}</samp></td>
            </tr>
            <tr>
                <td style="width:128px"><samp>HRA</samp></td>
                <td style="width:186px"><samp>{{ $empdetails->hra }}</samp></td>
                <td style="width:159px"><samp>ESI(Employee)</samp></td>
                <td style="width:133px"><samp>{{ $empdetails->sal_esi_employee }}</samp></td>
            </tr>
            <tr>
                <td style="width:128px"><samp>Conveyance</samp></td>
                <td style="width:186px"><samp>{{ $empdetails->conveyance }}</samp></td>
                <td style="width:159px"><samp>Medical Insurance</samp></td>
                <td style="width:133px"><samp>{{ $empdetails->sal_medical_ins }}</samp></td>
            </tr>
            <tr>
                <td style="width:128px"><samp>Telephone Allowance</samp></td>
                <td style="width:186px"><samp>{{ $empdetails->sal_telephone }}</samp></td>
                <td style="width:159px">&nbsp;</td>
                <td style="width:133px">&nbsp;</td>
            </tr>
            <tr>
                <td style="width:128px"><samp>Medical Allowance</samp></td>
                <td style="width:186px"><samp>{{ $empdetails->sal_pa }}</samp></td>
                <td style="width:159px">&nbsp;</td>
                <td style="width:133px">&nbsp;</td>
            </tr>
            <tr>
                <td style="width:128px"><em>Special Allowance</em></td>
                <td style="width:186px"><samp>{{ $empdetails->sal_special_allowance }}</samp></td>
                <td style="width:159px">&nbsp;</td>
                <td style="width:133px">&nbsp;</td>
            </tr>
            <tr>
                <td style="width:128px"><samp>Total Earning</samp></td>
                <td style="width:186px"><samp>{{ $empdetails->sal_gross }}</samp></td>
                <td style="width:159px"><samp>Total Deduction</samp></td>
                <td style="width:133px"><samp>{{ $empdetails->deduction }}</samp></td>
            </tr>
            <tr>
                <td style="width:128px"><samp>Net Pay</samp></td>
                <td colspan="3" style="width:479px"><samp>Rs.{{ $empdetails->sal_net }}</samp></td>
            </tr>
            <tr>
                <td style="width:128px"><samp>In words</samp></td>
                <td colspan="3" style="width:479px"><samp>{{ $empdetails->word }}</samp></td>
            </tr>
        </tbody>
    </table>
    <br />
    <table align="center" border="1" cellpadding="0" cellspacing="0" style="width:607px">
        <tbody>
            <tr>
                <td style="width:501px"><samp>Employer&rsquo;s Contribution to PF</samp></td>
                <td style="width:106px"><samp>{{ $empdetails->sal_pf_employer }}</samp></td>
            </tr>
            <tr>
                <td style="width:501px"><samp>Employer&rsquo;s Contribution to ESI</samp></td>
                <td style="width:106px"><samp>{{ $empdetails->sal_esi_employer }}</samp></td>
            </tr>
        </tbody>
    </table>

    <p><samp>For <strong>Prakhar Software Solutions Pvt.&nbsp;Ltd.</strong></samp><br />
        <em><samp>
                <img src="images/sign.png" style="height:40px; width:100px" /><br />
                <strong>Rahul verma</strong><br />Head - HR &amp; Operations&nbsp;</samp></em>
    </p>
</div>
<div class="footer" id="first_footer">
    <table>
        <tbody>
            <td>
                <img src="images/prakhar footer.png" width="750" height="100" alt="footer-image" />
            </td>
        </tbody>
    </table>
</div>

{{-- Format 2 --}}
<style>
    @media print {
        #page-break {
            page-break-before: always;
        }
    }
</style>
<div id="page-break" style="margin: 50px 40px;">
    <p style="text-align:center;"><samp><strong><u>Annexure-B</u></strong></samp></p>

    <p><samp>General Terms and Conditions of Employment.</samp></p>

    <ol>
        <li><em>The candidate is initially appointed to work at the Client location. However, he/she is liable to be
                transferred to any department or establishment forming part of the Company, or any Group Company,
                anywhere in India, temporarily or permanently. Working Days / Hours may vary based on the client
                requirements. And will be informed by the client</em></li>
        <li><em>If he/she undergoes a training abroad and/or in India for which the company incurs considerable
                efforts/cost for any project specific requirement etc. you might be required to sign an agreement as a
                token of commitment, the terms of which will be decided by the company depending on the training period,
                location, travelling cost, lodging, boarding and other expenses incidental to the training.</em></li>
        <li><em>Rules &ndash; General:- During the term of employment, the candidate will employ himself/herself
                efficiently, honestly, faithfully and to the best of your ability and shall devote your whole time and
                attention to promote the interest of the company and generally carry out duties and work as assigned to
                you. You shall obey and comply with all the lawful orders and directions given to him/her by his
                reporting Manager &amp; concerned superior in the Client organization.</em></li>
        <li><em>Candidate will not indulge into unprofessional practices and in case, it is found that while you are not
                following client organization&rsquo;s policies, rules and guidelines, the company would be at liberty to
                take disciplinary and legal action against you.</em></li>
        <li><em>Transfer and Deployment:- you may be transferred to any other location in such capacity as the Company
                may from time to time determine or any department, establishment, factory or branch of the Company or
                its affiliate, associate or subsidiary. In such cases, the candidate will be governed by the terms and
                conditions of services applicable to the new assignment.</em></li>
        <li><em>This engagement is terminable with a fifteen (15) days&rsquo; notice period from employer&rsquo;s side
                and two (2) months&rsquo; notice period from employee&rsquo;s side. </em></li>
        <li><em>In case the candidate is found engaged in doing any work other than the task assigned to him/her or is
                found not useful to the project or he/she leaves the project without any notice, his/her contract will
                be terminated. If he/she damages any equipment, property and third party liabilities, his/her contract
                will be terminated reserving the rights for compensation of damages that are incurred. </em></li>
        <li><em>This document is highly confidential, and sharing of this document with anybody such as colleagues,
                Client etc., will lead to terminate of your employment without
                notice.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </em></li>
        <li><em>Working Hours/Leave of Engaged Manpower:- Candidate will be entitled to Casual Leave only as per Govt.
                Rules. However, they may have to work on weekly off day/holidays as per the requirement for which
                Compensatory Leave can be sanctioned.</em></li>
        <li><em>Share your monthly MPR with Signed and Stamped from your reporting manager on mpr@prakharsoftwares.com
                and for any issues please mail on helpdesk@prakharsoftwares.com</em></li>
        <li><em>The professionals will be facilitated by Desktop/laptop etc. for doing the project work. All these have
                to be returned by them to the concerned department/office before leaving the job. However, if any,
                doesn&rsquo;t do so the service provider will be responsible to revert the same either from the engaged
                manpower or by themselves. In this case, the candidate company may seek the fully refundable security
                deposit from the candidates and on completion of his/her tenure with the company, the same may be
                returned. </em></li>
    </ol>

    <p><em><strong><em>Declaration:</em></strong><em>&nbsp;Every candidate has to sign the below-said
                declaration.</em></em></p>

    <p><samp><strong>Declaration:</strong> I
            &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;...S/o
            /D/o
            /W/o&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.Sincerely
            assure you to maintain complete discipline and do my best to perform my duties. I also authorize the
            management of Prakhar Software Solutions Pvt Ltd to ask me to leave any time without any notice, in case of
            any misconduct on my part or if I am found violating any rules and regulations laid by the company from time
            to time or fail to meet the defined performance standards during the training and employment. </samp></p>

    <p><samp>Candidate
            Name/Signature&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</samp>
    </p>

    <p><samp>(Save Papers save Trees)</samp></p>

</div>
