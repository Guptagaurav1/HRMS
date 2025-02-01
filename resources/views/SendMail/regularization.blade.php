<!-- <!DOCTYPE html> -->
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        /* FONTS */
        @import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i");

        /* CLIENT-SPECIFIC STYLES */
        * {
            box-sizing: border-box;
        }

        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        .fa {
            padding: 20px;
            font-size: 30px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        h3 {
            font-weight: 500;
        }
    </style>
</head>

<body style="background-color: #f3f5f7; color:#002060; margin: 0 !important; padding: 0 !important;">

    <!-- HIDDEN PREHEADER TEXT -->

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- COPY BLOCK -->
        <tr>
            <td align="center">
                <table align="center" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="left" bgcolor="#ffffff" valign="top" style="padding: 30px 30px 20px 30px;color:#002060;">
                            <h2 style=" font-weight: 600; text-align:center;"><u>Leave Regularization</u></h2></br>
                            <h2 style="font-size: 17px; font-weight: 600; text-align:left;">Dear {{$mailData['emp_name']}},</h2>
                            <h3>This is to inform you that the attendance has been marked as absent as per biometric system for the following dates given below:-</h3>
                            <h3>{!! $mailData['absent_dates'] !!}</h3>
                            <h3>In the event that you are on leave as per the above dates, please reply and submit the HRMS Leave application with approval as soon as possible.</h3>
                            <h3 style="font-weight:600;"><u>Attendance / Log</u></h3>
                            <h3>All employees are requested to record their first Log IN (first entry to office for the day) & last Log OUT (last log out for the day) timings using the thumb impression in Biometrics which is available at work location on daily basis to capture employee daily attendance.</h3>
                            <h3><span style="color:red;font-weight:bold;"><u>Note:-</u></span> <br>
                            <ul>
                                <li>Now onwards, please apply for leave through HRMS.</li>
                                <li>If he/she does not submit the form/revert untill 4th of the month then it is considered as Leave without Pay for that particular date.</li>
                            </ul>
                            </h3>
                            <h3>Let me know for any further assistance. </h3>

                            <h4 style="line-height: 20px; margin-bottom: 4px;"><u>Thanks & Regards</u><br>

                                Rahul Verma <br>
                                Human Resource - Team <br>
                                Prakhar Software Solutions Pvt Ltd <br>
                                T: 011-79626411 <br>
                                E: hr@prakharsoftwares.com <br>
                                Web: www.prakharsoftwares.com <br>
                                Office: C-11, LGF, Malviya Nagar, New Delhi-110017
                            </h4>
                            <div class="icon" style="width: auto; margin-top: 0px;">
                                <a href="https://twitter.com/PrakharSoftwar1#" style="margin: 0px 5px;"><img src="{{asset('assets/icons/twitter_icon.png')}}" width="25"></a>
                                <a href="https://www.facebook.com/Prakhar-Softwares-Solutions-Pvt-Ltd-258364067918404/" style="margin: 0px 5px;"><img src="{{asset('assets/icons/facebook_icon.png')}}" width="25"></a>
                                <a href="https://www.linkedin.com/company/prakhar-software/mycompany/" style="margin: 0px 5px;"><img src="{{asset('assets/icons/linkedin_icon.png')}}" width="25"></a>
                                <a href="https://www.youtube.com/channel/UCd2qQbaaZ09mPy1PvHZ0aAQ/featured" style="margin: 0px 5px;"><img src="{{asset('assets/icons/youtube_icon.png')}}" width="25"></a>
                                <a href="https://www.instagram.com/prakharsoftwares/" style="margin: 0px 5px;"><img src="{{asset('assets/icons/Instagram_icon.png')}}" width="25"></a>
                                <a href="https://za.pinterest.com/prakharsoftwares/_saved/" style="margin: 0px 5px;"><img src="{{asset('assets/icons/pinterest_icon.png')}}" width="25"></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 20px 20px 20px 20px; border-radius: 4px 4px 0px 0px;color:#002060;">
                            <img src="{{asset('assets/icons/logo_p.png')}}" style="margin: 0; width:40%"></h2>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="center" style="padding: 15px 30px 30px 30px;color:#002060;">
                            <p style="margin: 0;">You received this email because you just signed up for a new account.
                                If it looks weird, <a href="#" target="_blank" style="color:#002060; font-weight: 700;">view it in your browser</a>.</p></br>
                            <p style="margin: 0;">Copyright © $date <a href="prakharsoftwares.com">PSSPL</a>. All rights reserved.</p>
                        </td>
                    </tr>
                </table>

</body>

</html>