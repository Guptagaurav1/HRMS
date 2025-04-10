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
   
</style>
<div id="sec1">
    <div>
        <img src='images/prakhar header.png' width='750' height='50' alt='header-image' />
    </div>
    <br><br>
   
    <div style="margin:0pt 50px;">
        <p style="line-height: 21px;">Date: {{$empdetails->today_date}} <br><br>
            <strong>Employee Name: {{$empdetails->candidate_name}},</strong><br>
            <strong>Employee Code: {{$empdetails->emp_code}}</strong><br><br>
           
        </p>
        <br>
        <p style="text-align:center;"><strong><u>TO WHOMSOEVER IT MAY CONCERN</u></strong></p><br>
       
        <p style="line-height: 21px;">This is to certify that <strong>{{$empdetails->candidate_name}}</strong> was working with us on contract as <strong>{{$empdetails->designation}}</strong>
            <br>From {{$empdetails->doj}} to {{$empdetails->dol}} and was deputed to our client <strong>Goa Natural Gas Pvt.Ltd.</strong> at Goa
            </p><br><br><br><br>
        <p>For <strong>We wish {{$empdetails->gen1}} all the best for {{$empdetails->gen2}} future endeavors and relieve {{$empdetails->gen1}} from our services</strong></p>
        <p><img src='images/sign.png' style='height:50px; width:100px' /></p>
        <p>Rahul Kumar</p>
        <p>Manager &ndash; HR &amp; Operations</p>
    </div>
    <div class="footer1">
        <img src='images/prakhar footer.png' width='750' height='100' alt='footer-image' />
    </div>
</div>

