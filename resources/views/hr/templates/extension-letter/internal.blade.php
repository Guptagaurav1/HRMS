<style>
        
    .footer{
        position: absolute;
        bottom: 0px;
        left: 0px;
    }
    </style>
    <div class='header'>
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
    <div style='margin:0pt 18pt;'>
        <br><br><br>
        <p><em>Date: {{$empdetails->today_date}}</em></p>
        <p style='text-align:center;'><strong><em><u>Extension Letter</u></em></strong></p><br>
        <p style='line-height: 21px;'><em>Employee Name: {{$empdetails->candidate_name}} <br>
        Employee Code: {{$empdetails->emp_code}} <br>
        Work order No. {{$empdetails->work_order}} <br><br>
        
        Dear {{$empdetails->candidate_name}},</em></p>
        <p style='line-height: 21px;'><em>This has reference to the Appointment Ref: {{$empdetails->emp_code}}, we are pleased to extend your appointment with us as {{$empdetails->designation}}. Accordingly, you will now be entitled to a monthly CTC of Rs. {{$empdetails->ctc}}/-. Taxes /EPF/ ESIC as applicable shall be deducted at source from your salary. Remaining terms of Appointment remain as per the original Appointment letter.</em></p>
        <p style='line-height: 21px;'><em>Your employment duration would be from {{$empdetails->start_date}} to {{$empdetails->end_date}} and the Appointment stands withdrawn thereafter, unless the date is extended and communicated to you in writing.</em></p>
        <p style='line-height: 21px;'><em>Please return one copy of the letter dully signed by you as token of your acceptance to this extension letter.</em></p>
        <p style='line-height: 21px;'><em>We look forward to a long and mutually beneficial association.</em></p>
        <p style='line-height: 21px;'><em>For&nbsp;</em><strong><em>Prakhar Software Solutions Ltd</em></strong></p>
        <p style='text-align:justify; line-height:normal;'><img src='images/sign.png' style='height:50px; width:100px' /></p>
        <p style='line-height: 5px;'><em>Rahul Kumar</em></p>
        <p style='line-height: 5px;'><em>Manager-</em>HR<em>&nbsp;&amp; Operation&rsquo;s</em></p>
        
    </div>
    <div class='footer'>
        <table>
            <tbody>
                <td>
                    <img src='images/prakhar footer.png' width='750' height='100' alt='footer-image' />
                </td>
            </tbody>
        </table>
    </div>