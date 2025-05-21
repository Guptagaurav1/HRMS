<style>
    .footer1{
        position: absolute;
        bottom: 0px;
        left: 0px;
    }
    .footer2 {
        position: absolute;
        bottom: -460px;
        left: 0px;
    }
    #sec1{
        height: 100%;
        position:relative;
    }
    #sec2 {
        /* height: 100%; */
        /* position:relative; */
        page-break-before: always;
    }
</style>
<div id="sec1">
    <div>
        <img src='images/prakhar header.png' width='750' height='50' alt='header-image' />
    </div>
    <br><br><br>
    <div style="margin:0pt 50px;">
        <p style="line-height: 21px;">Date: {{$empdetails->today_date}} <br><br>
            <strong>Employee Name: {{$empdetails->candidate_name}},</strong><br>
            <strong>Employee Code: {{$empdetails->emp_code}}</strong><br><br>
            Dear {{$empdetails->candidate_name}},
        </p>
        <br>
        <p style="text-align:center;"><strong><u>Relieving from the Services</u></strong></p><br>
        <p style="line-height: 21px;">This is with reference to your letter of resignation from the services of Prakhar
            Software Solutions Ltd. In this connection, we wish to inform you that the company has accepted your
            resignation. Accordingly, you stand relieved from the services of Prakhar Software Solutions Ltd. with
            effect from close of office hours on {{$empdetails->dol}}.</p>
        <p style="line-height: 21px;">All of us at Prakhar Software Solutions Ltd. convey our best wishes to you in
            all your future endeavors.</p><br><br><br><br>
        <p>For <strong>Prakhar Software Solutions Ltd</strong></p>
        <p><img src='images/sign.png' style='height:50px; width:100px' /></p>
        <p>Rahul Kumar</p>
        <p>Manager &ndash; HR &amp; Operations</p>
    </div>
    <div class="footer1">
        <img src='images/prakhar footer.png' width='750' height='100' alt='footer-image' />
    </div>
</div>

<div id="sec2">
    <div>
        <img src='images/prakhar header.png' width='750' height='50' alt='header-image' />
    </div>
    <br><br><br>
    <div style="margin:0pt 50px;">
        <p style="line-height: 21px;">Date: {{$empdetails->today_date}}<br><br>
        <strong>Employee Name: {{$empdetails->candidate_name}},</strong><br>
        <strong>Employee Code: {{$empdetails->emp_code}}</strong>
        </p>
        <br>
        <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:-36pt; text-align:center;">
            <strong><u>TO
                    WHOMSOEVER IT MAY CONCERN</u></strong></p><br>
        <p style="line-height: 21px;">This is to certify that <strong>{{$empdetails->candidate_name}}</strong> was working with us from {{$empdetails->doj}} to {{$empdetails->dol}}. {{$empdetails->gen}} last designation held was <strong>{{$empdetails->designation}}</strong>. <br>
        According to {{$empdetails->gen}} performance reports received from {{$empdetails->gen}} reporting manager {{$empdetails->gen}} performance during the said period has been satisfactory. <br>
        We wish {{$empdetails->gen}} all the best in {{$empdetails->gen}} future endeavor.</p><br><br><br>
        <p>For <strong>Prakhar Software Solutions Ltd</strong></p>
        <p><img src='images/sign.png' style='height:50px; width:100px' /></p>
        <p>Rahul Kumar</p>
        <p>Manager &ndash; HR &amp; Operations</p>
    </div>
    <div class="footer2">
        <img src='images/prakhar footer.png' width='750' height='100' alt='footer-image' />
    </div>
</div>