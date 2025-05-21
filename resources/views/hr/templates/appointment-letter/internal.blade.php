<style>
    #sec_div {
        page-break-before: always;
    }
    #first_footer{
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
<div style="margin: 50px 40px 0px 40px; font-size:14px;">
    <p>Reference No: <strong>{{$empdetails->emp_code}}</strong><br />
        Date - <strong>{{$empdetails->today_date}}</strong><br /></p>

    <p style="text-align: center;">Sub: <strong>Offer of Appointment</strong><br /></p>

    <p><strong>Dear&nbsp;{{$empdetails->candidate_name}},</strong><br /></p>


    <p>1. We are pleased to appoint you as <strong>{{$empdetails->designation}}</strong> Operating out of our <strong>Prakhar Software
            Solutions Ltd, {{$empdetails->place_of_posting}}</strong> branch.</p>
    <p>2. Your &ldquo;Annual compensation&rdquo; is attached herewith as in Annexure-A</p>
    <p>3. Your employment with us will be governed by terms and conditions referred in Annexure-B </p>
    <p>4. Your services are effective from the date of your joining i.e. <strong>{{$empdetails->doj}}</strong>.</p>
    <p>5. Please sign in the duplicate copy of the letter (Photo copy enclosed) on all the sheets at the bottom on the
        left corner, and return to the Human resource Dept.</p>
    <p>6. You are requested to report to Reporting head at <strong>{{$empdetails->doj}} at 9:30 am</strong> to complete the joining
        formalities at <strong>Prakhar Software Solutions Ltd,</strong> C-11, LGF, Malviya Nagar, New Delhi-110017.
    </p>


    <p>We welcome you to Prakhar Software Solutions Ltd, and look forward to a long and mutually beneficial
        association.</p>
    <p>For <strong>Prakhar Software Solutions Ltd.</strong></p>
    <br />

    <p><img src="images/sign.png" style="height:50px; width:100px" /><br /><br />
        Rahul Verma<br />Manager - HR &amp; Operations&nbsp;</p>


    <p>Encl: Annexure-A (Salary Structure), Annexure-B (Terms & Conditions of Employment)
        Annexure-C (Timing Rules) Annexure-D (Employment Verification Form)
    </p>
    <br /><br /><br />
    <!-- <br /><br /><br /><br /> -->
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
<br />
<div id="sec_div">
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

    <div style="margin: 50px 40px 0px 40px; font-size:14px;">
        <p style="text-align: center;"><strong>Annexure-A</strong></p>
        <p><strong>Name: </strong>{{$empdetails->candidate_name}}<br />
            <strong>Designation: </strong>{{$empdetails->designation}}<br />
            <strong>Employee Code: </strong>{{$empdetails->emp_code}}<br />
        </p>

        <p style="text-align: center;"><strong><u>Salary Structure</u></strong></p>


        <table align="center" border="1" cellpadding="0" cellspacing="0" style="width:602px">
            <tbody>
                <tr>
                    <td style="width:602px"><span style="font-size:12px"><strong>&nbsp;Cost to Company (CTC) Per Year =
                                {{$empdetails->ctc_pa}} p.a</strong></span></td>
                </tr>
            </tbody>
        </table>


        <p>&nbsp;</p>


        <table align="center" border="1" cellpadding="0" cellspacing="0" style="width:607px">
            <tbody>
                <tr>
                    <td style="width:128px"><strong>Earning Components</strong></td>
                    <td style="width:186px"><strong>Amount</strong></td>
                    <td style="width:159px"><strong>Deductions</strong></td>
                    <td style="width:133px"><strong>Amount</strong></td>
                </tr>
                <tr>
                    <td style="width:128px">Basic</td>
                    <td style="width:186px">{{$empdetails->basic}}</td>
                    <td style="width:159px">PF(Employee)</td>
                    <td style="width:133px">{{$empdetails->sal_pf_emmployee}}</td>
                </tr>
                <tr>
                    <td style="width:128px">HRA</td>
                    <td style="width:186px">{{$empdetails->hra}}</td>
                    <td style="width:159px">ESI(Employee)</td>
                    <td style="width:133px">{{$empdetails->sal_esi_employee}}</td>
                </tr>
                <tr>
                    <td style="width:128px">Conveyance</td>
                    <td style="width:186px">{{$empdetails->conveyance}}</td>
                    <td style="width:159px">Medical Insurance</td>
                    <td style="width:133px">{{$empdetails->sal_medical_ins}}</td>
                </tr>
                <tr>
                    <td style="width:128px">Medical Allowance</td>
                    <td style="width:186px">{{$empdetails->sal_pa}}</td>
                    <td style="width:159px">&nbsp;</td>
                    <td style="width:133px">&nbsp;</td>
                </tr>
                <tr>
                    <td style="width:128px">Spl Allowance</td>
                    <td style="width:186px">{{$empdetails->sal_special_allowance}}</td>
                    <td style="width:159px">&nbsp;</td>
                    <td style="width:133px">&nbsp;</td>
                </tr>
                <tr>
                    <td style="width:128px">Total Earning</td>
                    <td style="width:186px">{{$empdetails->sal_gross}}</td>
                    <td style="width:159px">Total Deduction</td>
                    <td style="width:133px">{{$empdetails->deduction}}</td>
                </tr>
                <tr>
                    <td style="width:128px">Net Pay</td>
                    <td colspan="3" style="width:479px">Rs.{{$empdetails->sal_net}}</td>
                </tr>
                <tr>
                    <td style="width:128px">In words</td>
                    <td colspan="3" style="width:479px">Rupees {{$empdetails->word}} only</td>
                </tr>
            </tbody>
        </table>

        <p>&nbsp;</p>

        <table align="center" border="1" cellpadding="0" cellspacing="0" style="width:607px">
            <tbody>
                <tr>
                    <td style="width:501px">PF (Employer)</td>
                    <td style="width:106px">{{$empdetails->sal_pf_employer}}</td>
                </tr>
                <tr>
                    <td style="width:501px">ESI (Employer)</td>
                    <td style="width:106px">{{$empdetails->sal_esi_employer}}</td>
                </tr>
            </tbody>
        </table>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>For <strong>Prakhar Software Solutions Ltd.</strong></p>

        <p><img src="images/sign.png" style="height:50px; width:100px" /><br /><br />
            Rahul Verma<br />Manager - HR &amp; Operations&nbsp;</p>
        <br /><br /><br /><br /><br /><br /><br /><br />
    </div>
    <div class="footer">
        <table>
            <tbody>
                <td>
              <img src="images/prakhar footer.png" width="750" height="100" alt="footer-image" />
                </td>
            </tbody>
        </table>
    </div>
</div>
{{-- Format 2 --}}
<div style="margin-right: 10px;">
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Annexure-B</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>1. Assignments/Transfer/Deputation</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;">You are initially appointed to work in our <strong>Malviya Nagar, New Delhi</strong> office.&nbsp; However, you are liable to be transferred to any department or establishment forming part of the Company, or any Group Company, anywhere in India, temporarily or permanently.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <h1 style="margin-top:0pt; margin-bottom:0pt; page-break-after:avoid; font-size:12pt;">2. Probation</h1>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You shall be on probation for a period of six (6) months and may be confirmed as a permanent employee upon successful completion of your probation. During the probation period, the Company reserves the right to terminate your services without notice / Employee must serve 30 days&rsquo; notice period, compensation or giving any reason.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>3. Confirmation</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You are expected to stay in the organization for at least 1 Year (inclusive of the probation period). On confirmation as a regular employee, you will be required to give Thirty Days&rsquo; notice in case you decide to leave the services of the Company. Similarly, the Company can terminate your service by giving the required notice or salary thereof.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong><em><span>&nbsp;</span></em></strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong><em><span>Note: In case of employee leaving organization with in a period of 1 Year and/or without completing Notice Period, company is not liable to give any relieving or experience letter.</span></em></strong></p>
    <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>4. Service Conditions</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">In addition to the above, you will be governed by the terms and conditions as per Annexure-B.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">We welcome you as a member of our organization and look forward to your long and fruitful association with the Company.&nbsp; Kindly return the duplicate of this letter and Annexures, duly signed at the place provided therein, in token of your confirmation and acceptance of the above.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Working Hours</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;">Your daily working hours which includes a half hour&rsquo;s lunch break will be 9.30 am to 6.30 pm. (Monday to Saturday)</p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;">** Working Days / Hours may vary basing upon the work and client requirements.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Flexible Working Hours/Work from Home</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">No work from home is allowed.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; page-break-after:avoid; line-height:150%; widows:0; orphans:0; font-size:12pt;"><strong>Holidays</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">The paid holidays in a year will be Nine (09) including national holidays.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Out of 9 holidays 3 will be Mandatory National holidays and rest 6 can be taken by employee at the time of festivals with prior approval.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Company will be providing 1 paid leave on Employee&rsquo;s birthday or marriage anniversary as per choice.</p>
    <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>Leave</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Other than public holidays each employee is eligible for 12 days of paid leave. Leave crediting will be done every month, proportionately for the service they have completed. The leave can be availed for any absence for a day in full or half, or in multiples of the same<span style="">.</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Note: Any (uninformed leave) and any leave over and above your entitled leave will be treated as leave without pay.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Sanctioning of leave is at Management discretion based on exigencies of business or seriousness of the case.</p><br />
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>In case of Leaves take more than specified quota 3 warning letters will be issued to Employee and after which company can terminate employee in case of excessive absenteeism.</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><em><span>&nbsp;</span></em></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Leave Policy</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Types of Leaves</p>
    <ul style="margin:0pt; padding-left:0pt;" type="disc">
        <li style="margin-left:28.52pt; padding-left:7.48pt; font-size:12pt;"><span>Privileged Leave, 1.25 p.m. (After completion of 1 Year of Employment with company)</span></li>
        <li style="margin-left:28.52pt; padding-left:7.48pt; font-size:12pt;"><span>Casual Leave/ Sick Leave, 1 per month.</span></li>
    </ul>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You will be eligible for comp offs in case of working on Sundays.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Privileged Leave&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">This has been designed to give you vacation periods for rest and relaxation and to provide time off for your personal needs. You will however be entitled to this leave 15 days after completion of 1 year of your service. This cannot be carried forward and has to be consumed in following year.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Casual Leave/Sick Leave</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">The period of such leave is limited to 12 days in a calendar year and is granted in such a manner that the total period of absence including holidays. CL cannot be taken as a matter of right and has to be approved in writing or through E-mail. SL should be accompanied with a medical certificate.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Leave Accumulation/ Carry Forward</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">No policy as of now for leave carry forward.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span>&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>Encashment of Leave:</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">There is no encashment of leave policy. However, if the employee couldn&rsquo;t take leave due to continuously being on work due to some project, management may allow encashment of leave on case to case basis. PL may be adjusted with notice period after 1 year.&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Note: No leaves are allowed during Notice period; however notice period can be reduced using remaining leaves.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>Leave Administration Policy:</strong></p>
    <ol style="margin:0pt; padding-left:0pt;" type="i">
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">Leave can be availed only with the approval of the Reporting Manager. Before proceeding on leave, the employee has to apply for leave through leave application and get the approval. Approval can be taken over the Email as well.</li>
    
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">However, in case of emergency wherein the employee is unable to do the above, information should reach the Reporting Manager within 2 hours of absence.</li>
    
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">Any unauthorized absence exceeding 2 days will be treated as &lsquo;not reported for work&rsquo; and the Management will take necessary action.</li>
    
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">If employee does not have balance (both in Paid as well as Advance) to his credit and he/she applied for leave, the leave availed will be automatically treated as &quot;Leave without Pay&quot; and this will add negative remarks in this appraisal.</li>
    
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">The leave cycle for the purpose of calculation of leave is January to December of every year.</li>
    </ol>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>Welfare Provisions</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <ol style="margin:0pt; padding-left:0pt;" type="i">
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">The company shall make contributions to the Provident Fund as prescribed by law from time to time.</li>
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">You shall be eligible for Life Insurance and Medical Insurance Coverage as per Company Policy.</li>
    </ol>
    <br /><br /><br /><br /><br />
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>INCREMENT POLICY</strong></p>
    <ol style="margin:0pt; padding-left:0pt;" type="i">
        <li style="margin-left:23pt; padding-left:13pt; font-size:12pt;">To encourage performance of the deserving employees, company has an increment policy. After careful analysis, each employee has to fill up a self-appraisal form which should be revalued by the HOD of the concerned department to award increments to the employees. This will be applicable to those employees who complete at <strong>least 12 months</strong> of service with the organization.</li>
    </ol>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Rules &amp; Regulations&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You shall observe all rules and regulations imposed by the Company. The rules and regulations referred to herein would include and relate to general work habits. <strong>Work instructions of superiors, routine working orders, procedures of the Company, attitude towards work and any conduct,</strong> which the Company shall in its sole discretion, deem to be detrimental to its interest.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Time, Attention and Duties</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <ol style="margin-right:19.33pt; padding-left:0pt;" type="i">
        <li style="padding-left:10.67pt; font-size:12pt;">Employee during the term of his/her employment shall devote full time, attention and skills exclusively to the business of the company and you shall not perform, indulge or be concerned or interested either directly or indirectly in <strong>any business or work other than that of the Company.</strong></li>
    
        <li style="padding-left:10.33pt; font-size:12pt;">Employee shall diligently and faithfully perform all your duties and act in all aspects according to the instructions and directions given to you through the Company&rsquo;s duly authorized officers.</li>
    
        <li style="widows:0; orphans:0; padding-left:10pt; font-size:12pt;">Employee must not be employed or interested directly or indirectly in any other trade or business, employment, occupation and whatsoever during the complete tenure of his/her employment</li>
    </ol>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong><u>Work ethics:</u></strong></p>
    <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;">Following are some of the actions that may result in the termination of employment:</p>
    <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;">&nbsp;</p>
    <ol style="margin-right:29.33pt; padding-left:0pt;" type="i">
        <li style="widows:0; orphans:0; padding-left:10.67pt; font-size:12pt;">Theft or inappropriate removal or possession of company property.</li>
        <li style="widows:0; orphans:0; padding-left:10.33pt; font-size:12pt;">Falsification of timekeeping records, the application form, or any other company records</li>
        <li style="widows:0; orphans:0; padding-left:10pt; font-size:12pt;">Working under the influence of alcohol or illegal drugs</li>
        <li style="widows:0; orphans:0; padding-left:10.67pt; font-size:12pt;">Possession, distribution, sale, transfer, or use of alcohol or illegal drugs in the workplace, while on duty, or while operating employer leased or owned vehicles or equipment</li>
        <li style="widows:0; orphans:0; padding-left:10pt; font-size:12pt;">Fighting or threatening violence in the workplace</li>
        <li style="widows:0; orphans:0; padding-left:10.67pt; font-size:12pt;">Negligence or improper conduct leading to damage of employer leased or owned property or customer property</li>
        <li style="widows:0; orphans:0; padding-left:10.33pt; font-size:12pt;">Insubordination or other disrespectful conduct</li>
        <li style="widows:0; orphans:0; padding-left:10pt; font-size:12pt;">Sexual or other unlawful harassment</li>
        <li style="widows:0; orphans:0; padding-left:10.67pt; font-size:12pt;">Possession of dangerous or unauthorized materials, such as explosives or firearms, in the workplace</li>
        <li style="widows:0; orphans:0; padding-left:10pt; font-size:12pt;">Excessive absenteeism or any absence without notice.</li>
        <li style="widows:0; orphans:0; padding-left:10.67pt; font-size:12pt;">Unauthorized disclosure of business &quot;secrets&quot; or confidential information</li>
        <li style="widows:0; orphans:0; padding-left:10.33pt; font-size:12pt;">Unlawful possession of company&rsquo;s documents, sharing of information or documents with the competitor or any unauthorized person who is not directly concerned with the work.</li>
        <li style="widows:0; orphans:0; padding-left:10pt; font-size:12pt;">Unsatisfactory performance and gambling in the workplace or on company premises shall not be entertained.</li>
        <li style="widows:0; orphans:0; padding-left:10.67pt; font-size:12pt;">Failure to immediately report a work-related injury, or misuse of company funds/money/equipment&rsquo;s/property</li>
    </ol>
    <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;"><strong>Few Additional Points</strong></p>
    <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; widows:0; orphans:0; font-size:12pt;"><strong>&nbsp;</strong></p>
    <ol style="margin:0pt; padding-left:0pt;" type="1">
        <li style="margin-left:32pt; margin-bottom:10pt; padding-left:4pt; font-size:12pt;">No leaves are allowed in notice period, remaining leaves can be used to reduce notice period time.</li>
    
        <li style="margin-left:32pt;  margin-bottom:10pt; padding-left:4pt; font-size:12pt;">Company assets should be in premises after resignation and it should not be with employee during notice period.</li>
    
        <li style="margin-left:32pt;  margin-bottom:10pt; padding-left:4pt; font-size:12pt;">Laptops should not be carried to home, if in case emergency it is required than it should be done with prior approval in email from manager and should be return back on next working day.</li>
    
        <li style="margin-left:32pt;  margin-bottom:10pt; padding-left:4pt; font-size:12pt;">Salaries/CTC should be kept strictly confidential from colleagues as it is totally based on individual performance and capability.</li>
    
        <li style="margin-left:32pt;  margin-bottom:10pt; padding-left:4pt; font-size:12pt;">Increment and Promotions are completely based on performance, capability, behavior analysis of the individual.</li>
    
        <li style="margin-left:32pt;  margin-bottom:10pt; padding-left:4pt; font-size:12pt;">Excessive absenteeism and in discipline are strictly not allowed.</li>
    
        <li style="margin-left:32pt;  margin-bottom:10pt; widows:0; orphans:0; padding-left:4pt; font-size:12pt;">Salary increment will be considered only after completion of 1 year.</li>
    </ol>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Duty of Secrecy and Confidentiality</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <ol style="margin-right:30.33pt; padding-left:0pt;" type="i">
        <li style="padding-left:10.67pt; font-size:12pt;">Employee shall not at any time hereafter, without the consent in writing of the Company except under legal process, divulge or utilize any matter relating to the Company&rsquo;s transactions or dealings, which are of confidential nature.</li>
    
        <li style="padding-left:10.33pt; font-size:12pt;">Employee agrees and recognizes that the services to be rendered to him under this agreement require special skill, training and experience.&nbsp; You agree to undergo training for the purpose of acquiring such skills.</li>
    
        <li style="padding-left:10pt; font-size:12pt;">Employee shall not disclose orally or in writing to any person, firm or corporation any information regarding the affairs or business of the Company and/or its customers and clients, including but not limited to: dealings, practice, business, affairs, confidential information and trade secrets of the Company and/or its clients, whatsoever and howsoever, and all other matters which may come to your knowledge by reason of your employment with the company.</li>
    
        <li style="padding-left:10.67pt; font-size:12pt;">You hereby undertake and agree with full knowledge that the nature of the Company&rsquo;s business and job assigned to you and all information whether oral or in writing or on tape or stored in computers or laptop, processors, electrical , mechanical, telephonic conversations are strictly confidential and are valuable secrets belonging solely to the Company and no one else. All relevant databases of clients and candidates developed by the employee in the course of the duties shall be sole and exclusive property of the Company.</li>
    
        <li style="padding-left:10pt; font-size:12pt;">Employee shall be true and faithful to the Company in all his accounts, dealing and transactions, relating to the business of the Company and shall at all times, when required, render a true and just account thereof to the Company or such persons as shall be authorized to receive the sum.</li>
    
        <li style="padding-left:10.67pt; font-size:12pt;">Employee shall be responsible for safekeeping and return, in good condition and order, of all Company&rsquo;s property, which may be in his use, custody or charge.</li>
    
        <li style="padding-left:10.33pt; font-size:12pt;">A high standard code of conduct is expected from an employee and any behavior reflecting unfavorably on him/her, the Company is questionable and liable for disciplinary action.</li>
    
        <li style="padding-left:10pt; font-size:12pt;">Employee shall also be required to abide by terms and conditions in addition to those mentioned above, which are in force for the time being, or may be framed from time to time.</li>
    </ol>
    <p style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:72pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You agree without any condition or reservation that after the termination of this Agreement, or any ground whatsoever, you will deliver immediately to the company, all correspondences letters, price lists, manuals, mailing lists, list of Clients, advertising materials, all supplies, keys, diskettes, tapes or any other document, object or equipment belonging to the company.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Non Solicitation of Customer or Company&rsquo;s Staff</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;You agree that after the termination of this Agreement; for the period of one year; on behalf of your own or of any person, firm or company you are liable not to directly or indirectly:</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <ol style="margin-right:30.33pt; padding-left:0pt;" type="i">
        <li style="padding-left:10.67pt; font-size:12pt;">Canvass, procure, solicit or endeavor to take away from the Company, the business of any person who are or have been customers or clients of the Company. The expression &ldquo;customers or clients of the Company&rdquo; includes all person, business, corporation or any third party who was involved with company&nbsp; for temporary and permanent placement services rendered during the one year preceding your termination of employment.</li>
        <li style="padding-left:10.33pt; font-size:12pt;">Endeavour to entice away from the Company, any person who is or has at any time during the two (2) years immediately preceding the termination of this Agreement, been employed or engaged by the Company.</li>
    </ol>
    <p style="margin-top:0pt; margin-left:54pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Non-Competition</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You also agree that after the termination of this Agreement by any party on any ground whatsoever, you will not be employed for a period of one (1) year by any person, firm or corporation situated and carrying on business in India for a period of one (1) year from the date of termination of this Agreement, either alone, or jointly with or as manager agent, consultant or employee of any person, firm or company directly or indirectly carry on or be engaged in any activity or business which shall be in competition with the business of the Company.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Loss and Damage</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You also agree that if you breach any of the terms and conditions stipulated in this Agreement, you will be liable for any loss or damage suffered directly or indirectly by the Company as a result of your action.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Amendment</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">The Company shall be at liberty to amend the whole or any part of this Agreement after its execution if it considers it necessary and reasonable but only after two (2) weeks&rsquo; notice is duly given to you informing you of the proposed amendment(s).</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <h5 style="margin-top:0pt; margin-bottom:0pt; page-break-after:avoid; font-size:12pt;">Termination</h5>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <ol style="margin-right:30.33pt; padding-left:0pt;" type="i">
        <li style="padding-left:10.67pt; font-size:12pt;">After the period of probation referred to in Clause above, either party may terminate this agreement by giving one month&rsquo;s notice or one month&rsquo;s salary in lieu of notice.</li>
        <li style="padding-left:10.33pt; font-size:12pt;">The Company reserves the right to immediately terminate this Agreement should it in its sole discretion come to a conclusion that your conduct is not satisfactory or beneficial to the interests of the Company or that you are in breach of any of the terms and conditions contained herein. You will not be entitled to any salary in lieu of notice.</li>
    </ol>
    <h5 style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; page-break-after:avoid; font-size:12pt;"><em><span>&nbsp;</span></em></h5>
    <h5 style="margin-top:0pt; margin-bottom:0pt; page-break-after:avoid; font-size:12pt;">Notice Period- Non-Serve case</h5>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">In case employee is not able to serve Notice Period (Exceptional: Extreme Medical Reason) company is not liable to give Experience Letter, Reliving letter and may file case of Dual Employment in regards of Employee.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Conduct</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Any act of indiscipline / misconduct / holding the company to ransom / creating union / any misconduct / unprofessional behavior in the organization cannot be tolerated by the company and can attract termination and immediate dismissal without any notice, costs or benefits.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>EMPLOYEE CONFIDENTIAL INFORMATION, AUTHORSHIP AND INVENTIONS AGREEMENT&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">This Agreement made between the Employee and the Employer</p>
    <ol style="margin:0pt; padding-left:0pt;" type="a">
        <li style="margin-left:35.32pt; padding-left:0.68pt; font-size:12pt;">Resident Registration No.</li>
        <li style="margin-left:36pt; padding-left:0pt; font-size:12pt;">PAN&nbsp; ID No<strong>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;,&nbsp;</strong></li>
        <li style="margin-left:35.32pt; padding-left:0.68pt; font-size:12pt;">Aadhaar&nbsp; No: <strong>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</strong>,&nbsp; an Indian (the &ldquo;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&rdquo;) and</li>
    </ol>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(b) <strong>Prakhar Software Solutions Ltd</strong>. an Indian corporation.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">WHEREAS, both the parties mutually agree to the following terms and conditions:</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>NOW THIS AGREEMENT WITNESSETH AS FOLLOWS:&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>1.Noncompetition</strong>: The Employee agrees to, during his/her employment with the Company, to perform for the Company such duties as it may designate from time to time and will devote his/her full time and best efforts to the business of the Company and will not during the term of his/her employment, and for two (2) years thereafter, without the prior written consent of the Company engage in any competitor directly or indirectly participate in or assist any business which is a current or potential supplier, customer of the Company.</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">2. <strong>Nonsolicitation:&nbsp;</strong>During the term of his/her employment&nbsp; with the Company, and for two (2) years thereafter, the Employee shall not directly&nbsp; or indirectly, without the prior written consent of the Company,&nbsp; solicit, recruit, encourage&nbsp; or induce any employees, directors, consultants, contractors or subcontractors&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">of the Company to leave the employment of the Company, either on his/her own behalf or on behalf of any other person or entity.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">3. <strong>Confidentiality</strong><strong>&nbsp;&nbsp;</strong><strong>Obligation:</strong> &ldquo;Confidential&nbsp; Information&rdquo;&nbsp; is all information&nbsp; related to any aspect of the business of the Company which is either information not known by actual or potential competitors of the Company or is proprietary information of the Company, whether of a technical nature or otherwise. Confidential Information includes inventions, disclosures, processes, systems, methods, formulae,&nbsp; devices,&nbsp; patents,&nbsp; patent&nbsp; applications,&nbsp;&nbsp; trademarks, intellectual&nbsp; properties,&nbsp; instruments,&nbsp;&nbsp; materials,&nbsp; products,&nbsp; patterns, compilations,&nbsp; programs,&nbsp; techniques,&nbsp; sequences,&nbsp; designs,&nbsp; research&nbsp; or development&nbsp; activities and&nbsp; plans,&nbsp; specifications,&nbsp; computer programs,&nbsp; source&nbsp; codes,&nbsp; mask&nbsp; works, works&nbsp; of authorship,&nbsp; costs of production,&nbsp; prices&nbsp; or other financial&nbsp; data, volume of sales, promotional methods, marketing plans, lists of names or classes of customers or personnel, lists of suppliers, business plans, business opportunities,&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">or financial&nbsp; statements. The Employee&nbsp; will hold all Company&nbsp; Confidential&nbsp; Information&nbsp; in confidence&nbsp; and will not disclose,&nbsp; use, copy, publish,&nbsp; summarize, or remove&nbsp; from the premises&nbsp; of the Company&nbsp; any Confidential&nbsp; Information, except&nbsp; as necessary to carry out his/her assigned responsibilities&nbsp; as a Company employee. The Employee :&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(a) shall not disclose or leak to the outside what belongs to their technical skills and confidential information&nbsp; acquired during their work.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(b) shall not disclose or withdraw any documents or documents stored on the PC while they are working at the&nbsp; Company without the prior written consent of the Company.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(c) shall not disclose, leak or provide Confidential Information of Company that they have acquired during their work to&nbsp;&nbsp; a third party including its competitors without prior approval of the Company.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(d) shall actively cooperate with the Company when conducting audits relating to their performance.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(e) shall not take photographs anywhere in the office.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">4. <strong>Information of Others:&nbsp;</strong>The Employee&nbsp; will safeguard&nbsp; and keep confidential&nbsp; the proprietary&nbsp; information&nbsp; of customers,&nbsp; vendors, consultants, shareholders&nbsp; and&nbsp; other&nbsp; parties&nbsp; with&nbsp; which&nbsp; the&nbsp; Company&nbsp; does&nbsp; business&nbsp; to the&nbsp; same&nbsp; extent&nbsp; as if it were&nbsp; Company Confidential&nbsp; Information. The Employee will not, during his/her employment&nbsp; with the Company, use or disclose to the Company any confidential,&nbsp; trade secret, or other proprietary&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">information&nbsp; or material of any previous employer or other person, and will not bring onto the Company&rsquo;s premises any unpublished document or any other property belonging to any former employer without the written consent of that former employer.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">5. <strong>Company</strong><strong>&nbsp;&nbsp;</strong><strong>Property:</strong> All works, programs,&nbsp; papers, records,&nbsp; data, notes, drawings,&nbsp; files, documents,&nbsp; samples,&nbsp; devices,&nbsp; products, equipment, and other materials, including copies in whatever form and translations into any other language, relating to the business of the Company that the Employee possesses or creates during the term of his Company employment,&nbsp; whether or not confidential, are and shall remain the sole and exclusive property of the Company. The Employee shall agree to fulfill his responsibilities for company properties in accordance with the following guidelines:</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(a) Employees shall not disclose or use jointly assigned user IDs, passwords, or entrance pass with others.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(b) Employees&nbsp; shall securely&nbsp; manage&nbsp; the information&nbsp; assets (documents,&nbsp; photographs,&nbsp; electronic&nbsp; files, storage&nbsp; media,&nbsp; computer equipment, etc.)</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">provided by the company from unauthorized modification, copying, damage or loss.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(c) Employees shall not access unauthorized information or facilities, use in-house data processing facilities only to perform company- related tasks, and should not store personal information within these facilities.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(d) Employees&nbsp; shall not use unauthorized&nbsp; programs,&nbsp; information&nbsp; storage media (USB, Zip Drive, CD-ROM,&nbsp; external HDD, etc.)</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Within the company.&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(e) Employees shall not leak applications purchased from the company or programs developed by the company out of the company.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(f) Employees&nbsp; will comply with corporate&nbsp; control procedures&nbsp; when outsourcing&nbsp; proprietary&nbsp; information&nbsp; assets and know that the</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Company can inspect documents that are sent through the corporate network to protect the Company&rsquo;s information assets.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(g) Employees shall agree to abide by the company&apos;s information protection policies, guidelines and procedures.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(h) Employees shall agree to comply with the rules in accordance with the rules for managing document rights when creating, using and disposing</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">of work-related documents.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">6. <strong>Ownership of Inventions and Works of Authorship:</strong> All inventions,&nbsp; ideas, designs, circuits, schematics,&nbsp; formulas, algorithms, trade secrets, works of authorship, mask works, developments,&nbsp; processes, techniques, improvements,&nbsp; and related know-how which result from work performed&nbsp; by the Employee,&nbsp; alone or with others,&nbsp; on behalf of the Company&nbsp; or from access&nbsp; to the Company Confidential Information&nbsp; or property or which the Employee&nbsp; may otherwise create in the performance&nbsp; of his/her job duties at any time during his/her employment with</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">the Company whether or not patentable, copyrightable,&nbsp; or qualified for mask work protection and all translation rights related thereto (collectively, the &ldquo;Inventions and Works&rdquo;) shall be the property of the Company, and, to the greatest&nbsp; extent&nbsp; permitted&nbsp; by law, shall be &ldquo;works&nbsp; made&nbsp; for hire.&rdquo; The Employee hereby assigns and agrees to assign&nbsp; to the Company&nbsp; or its designee&nbsp; his/her entire right, title, and interest in and to all Inventions and Works, including&nbsp; all rights to obtain, register,&nbsp; perfect,&nbsp; and enforce&nbsp; patents,&nbsp; copyrights,&nbsp; mask work rights, and other intellectual&nbsp; property&nbsp; protection for Inventions&nbsp; and Works. The Company shall compensate the Employee for the assignment of entire right, title and interest in and to all Inventions and Works in accordance with applicable laws. The Employee will disclose promptly and in writing to the individual designated by the Company or to his/her immediate supervisor all Inventions and Works which he/she has made, authored or reduced to practice. During his/her employment with the Company and for five (5) year(s) thereafter, the Employee will assist the Company (at its expense) to obtain and enforce patents, copyrights, mask work rights, and other forms of intellectual property protection on Inventions and Works.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">7. <strong>Prior Contracts:</strong> The Employee represents that there are no other contracts to assign inventions or works that are now in existence between him/her and any other person or entity. The Employee further represents that he/she has no other employment, consultancies, or undertakings which would restrict and impair his/her performance of this Agreement.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">8. <strong>Agreements with Government Authorities and Other Third Parties</strong>: The Employee acknowledges that the Company from time to time may have agreements</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">with other persons or with certain government authorities or agencies thereof and third parties which impose obligations or restrictions on the Company regarding&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Inventions and Works made during the course of work under such agreements or regarding the confidential nature of such work. The Employee agrees to be bound by all such obligations or restrictions and to take all action necessary to discharge the obligations of the Company thereunder.&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">9. <strong>No Employment Agreement:</strong> The Employee agrees that nothing herein shall constitute an agreement of the Company to employ him/her for any specific period of time.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">10. <strong>Return of Confidential Information Assets:</strong> In the event of the termination of the Employee&rsquo;s employment,&nbsp; the Employee&nbsp; will promptly deliver all such materials to the Company. Even after that, all kinds of information assets that may be harmful to the company due to leakage of the company&apos;s secrets as well as all other business secrets should not be leaked at all.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">11. <strong>Miscellaneous:</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">a. <strong>Governing Law:</strong> This Agreement shall be governed by, and construed in accordance with, the laws of India.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">b. <strong>Enforcement:</strong> If any provision of this Agreement shall be determined to be invalid or unenforceable for any reason, it shall be amended rather than voided, if possible, in order to achieve the intent of the parties to the extent possible. In any event, all other provisions of this Agreement shall be deemed valid, and enforceable to the full extent possible.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">c. <strong>Injunctive Relief;</strong> Consent to Jurisdiction. The Employee acknowledges and agrees that damages&nbsp; will not be an adequate remedy in the event of a breach of any of the Employee&rsquo;s obligations under this Agreement. The Employee therefore agrees that the Company shall be entitled (without limitation of any other rights or remedies otherwise available to the Company) to obtain an injunction or other measures from any court of competent jurisdiction&nbsp; prohibiting&nbsp; the continuance&nbsp; or recurrence&nbsp; of any breach of this Agreement. The Employee&nbsp; hereby submits himself/herself&nbsp; to the jurisdiction&nbsp; and venue of the courts in India for purposes of any such action.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">d. <strong>Attorneys&rsquo; Fees:</strong> If either party seeks to enforce its rights under this Agreement by legal proceedings&nbsp; or otherwise, the non- prevailing party shall</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">pay all costs and expenses of the prevailing party.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">e. <strong>Waiver</strong>: The waiver by the Company of a breach of any provision of this Agreement&nbsp; shall not operate or be construed as a waiver of any</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">subsequent breach of the same or any other provision hereof.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">f. <strong>Binding Effect:</strong> This Agreement shall be binding upon and shall inure to the benefit of the successors, executors, administrators, heirs, representatives,</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">and assigns, as the case may be, of the parties.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">g. <strong>Headings:</strong> The section headings herein are intended for reference and shall not by themselves determine the construction or interpretation of this Agreement.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Entire Agreement; Modifications:</strong> This Agreement contains the entire agreement between the Company and the Employee concerning the subject matter hereof and supersedes any and all prior and contemporaneous negotiations, correspondence, understandings, and agreements, whether oral or written, respecting that subject matter.&nbsp; All modifications to this Agreement must be in writing and duly signed by both parties.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">IN WITNESS WHEREOF, the parties have executed this Agreement on the date first.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Herein above written.<span style="font-size:11pt;">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Name: <span style="width:1.01pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><strong>Prakhar Software Solutions Ltd</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Date:</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Please confirm that the above terms and conditions are acceptable to you, and that you accept the appointment by signing a copy of the appointment letter.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Annexure C</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Probation Period / Internship Period: Regarding Leaves</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">In Probation Period / Internship Period only 6 leaves are allowed. One leave for a each month. If Management has found excess leaves during the period then your Probation or Internship period will be extended for another month.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">For every 5 excess leaves in total probation period or internship, it will be extended for another one month, and if 5-10 excess leaves- then your probation period or Internship period will be extended for another 2 Months irrespective of reason.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">No leave is allowed in notice period.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Permanent Employee: Regarding Leaves</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">If Management has found excess leaves during the period of one year then your Increment period will be postponed for another month. For every 5 excess leaves in total year, it will be extended for another one month, and if 5-10 excess leaves- then your increment will be postponed for another 2 Months irrespective of reason.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">No leave is allowed in notice period.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Hours of work</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">As an employee, you are expected to work additional hours as when reasonably necessary for the effective performance of your job or as business demands necessitate.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Breaks</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">It is important that you take the breaks which are given to you.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Breaks are important for your rest and well-being.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Attendance and timekeeping</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You are expected to attend work and organized meetings punctually at the times required. This is an integral part of reliability and professional conduct.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Employees are required to arrive by 9.30 a.m. However, a flexi entry between 9:30AM and 09:45AM will be allowed.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Any start time after 10:00AM will be counted as permission and should be availed in the lines of the procedures for permission.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">If you are going to be late for work, you must call ahead to inform the reporting manager and HR Head.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You should inform your manager when you leave the office premises during working hours, except during lunch breaks. This will ensure that you can be located in the event of an emergency.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Permissions</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">In case if the employee avails permission in the morning he should call upon his reporting person and inform him of his late coming and later should submit the approved permission form to the HR Dept.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Permission should be approved by their concerned reporting person and submitted to the HR dept .</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Usage of Biometric</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Employees are advised to use the biometric as and when they reach the office.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">The employee will be marked absent in case he/she has not punched on biometric while entering the office.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Please acknowledge to this letter in acknowledgment of receipt of this letter. Hope to see you complying with the company rules.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Please note that coming late to work affects not only your work it affects the entire process you are involved in.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">You are here by advised to be punctual to work.</p>
    <p style="margin-top:0pt; margin-bottom:0pt; widows:0; orphans:0;">&nbsp;</p>
    <p style="margin-top:0.05pt; margin-bottom:0pt; widows:0; orphans:0; font-size:13pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong><u>Changes / Modifications</u></strong></p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Company reserves the right, in its sole discretion, to modify the policies stated above anytime and employees would be notified.</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Welcome to Prakhar Software Solutions Ltd.</strong></p>
    <h2 style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; page-break-after:avoid; widows:0; orphans:0; font-size:12pt;">&nbsp;</h2>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Yours faithfully,</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Rahul Verma</p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Manager - HR &amp; Operations</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt;"><strong>&nbsp;&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Acceptance</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">I, &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;., have read and understood the terms and conditions as mentioned above and do hereby acknowledge and accept the same.</p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Signature</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Date</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>Annexure-D</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>&nbsp;</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>Please fill the following:</strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><strong>&nbsp;</strong></p>
    <table cellpadding="0" cellspacing="0" border="1" >
        <tbody>
            <tr>
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:middle;">
                    <h1 style="margin-top:0pt; margin-bottom:0pt; page-break-after:avoid; font-size:12pt;">Particulars Declared By Candidate</h1>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;"><strong>Your Verification Inputs</strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <h3 style="margin-top:0pt; margin-bottom:0pt; page-break-after:avoid; widows:0; orphans:0; font-size:12pt;">Candidate&rsquo;s Name</h3>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Employee ID</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Company Name</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Company Location</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Company Tel. No.</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:17.6pt;">
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <h2 style="margin-top:3pt; margin-bottom:3pt; page-break-after:avoid; widows:0; orphans:0; font-size:12pt;">Period of Employment</h2>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-left:3.6pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:8.05pt;">
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Designation</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-left:3.6pt; margin-bottom:0pt; line-height:12pt;"><span style="font-size:12pt;">&nbsp;</span></p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; line-height:12pt;"><span style="font-size:12pt;">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:17.6pt;">
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Remuneration</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-left:3.6pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:15.35pt;">
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Supervisor Name &amp; Designation&nbsp;</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-left:3.6pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:22.35pt;">
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Reason for Leaving</strong></p>
                </td>
                <td style="width:137.1pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
                <td style="width:137.3pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width:90.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Nature of Separation (HR Comments)</strong></p>
                </td>
                <td colspan="2" style="width:285.2pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:0pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
            <tr style="height:17.5pt;">
                <td style="width:90.4pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;"><strong>Additional HR Comments</strong></p>
                </td>
                <td colspan="2" style="width:285.2pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                    <p style="margin-top:3pt; margin-bottom:3pt; font-size:12pt;">&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>
</div>