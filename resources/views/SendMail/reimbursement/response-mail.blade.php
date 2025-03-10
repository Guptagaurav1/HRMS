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
    </style>
</head>

<body style="background-color: #f3f5f7; margin: 0 !important; padding: 0 !important;">

    <!-- HIDDEN PREHEADER TEXT -->

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding: 0px 10px 0px 10px;">

                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="padding: 20px 20px 20px 20px; border-radius: 4px 4px 0px 0px;">
                            <img src="{{ asset('assets/icons/logo_p.png') }}" style="margin: 0; width:30%"></h2>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" valign="top"
                            style="padding: 30px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Poppins', sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 2px; line-height:
                            48px;">
                        </td>
                        
                    </tr>

                </table>

            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td align="center" style="padding: 0px 10px 0px 10px;">
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                    <tr>
                        <td align="center" bgcolor="#ffffff" valign="top" width="600">

                            {!! $maildata->content !!}

                            <div style="background: white; width: 600px; padding: 10px 25px 20px 25px; " align="left">
                                <table cellpadding="2px" cellspacing="10px"
                                    style="background-color: white; font-family: " Poppins", sans-serif;
                                    font-size:15px;">

                                    <tr>
                                        <td colspan="2">
                                            <h3
                                                style="color: green; font-weight: bold; font-size: 15px; font-family:arial; margin: 0px; padding: 0px;">
                                                Prakhar Software Solutions Pvt. Ltd.</h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="85"><b>Email:</b> </td>
                                        <td>{{ $maildata->comp_email }} </td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone:</b> </td>
                                        <td>+91 {{ $maildata->comp_phone }} </td>
                                    </tr>

                                    <tr>
                                        <td><b>Website: </b> </td>
                                        <td>{{ $maildata->comp_website }} </td>
                                    </tr>
                                    <tr>
                                        <td><b>Address:</b></td>
                                        <td>{{ $maildata->comp_address }} </td>
                                    </tr>

                                </table>

                                <div class="icon" style="width: auto; margin-top: 0px;">
                                    <a href="https://twitter.com/PrakharSoftwar1#" style="margin: 0px 5px;"><img
                                            src="{{ asset('assets/icons/twitter_icon.png') }}" width="25"></a>
                                    <a href="https://www.facebook.com/Prakhar-Softwares-Solutions-Pvt-Ltd-258364067918404/"
                                        style="margin: 0px 5px;"><img
                                            src="{{ asset('assets/icons/facebook_icon.png') }}" width="25"></a>
                                    <a href="https://www.linkedin.com/company/prakhar-software/mycompany/"
                                        style="margin: 0px 5px;"><img
                                            src="{{ asset('assets/icons/linkedin_icon.png') }}" width="25"></a>
                                    <a href="https://www.youtube.com/channel/UCd2qQbaaZ09mPy1PvHZ0aAQ/featured"
                                        style="margin: 0px 5px;"><img src="{{ asset('assets/icons/youtube_icon.png') }}"
                                            width="25"></a>
                                    <a href="https://www.instagram.com/prakharsoftwares/" style="margin: 0px 5px;"><img
                                            src="{{ asset('assets/icons/Instagram_icon.png') }}" width="25"></a>
                                    <a href="https://za.pinterest.com/prakharsoftwares/_saved/"
                                        style="margin: 0px 5px;"><img
                                            src="{{ asset('assets/icons/pinterest_icon.png') }}" width="25"></a>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <!-- FOOTER -->
                    <tr>
                        <td align="center" style="padding: 10px 10px 50px 10px;">

                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width: 600px;">
                                <tr>
                                    <td bgcolor="#ffffff" align="left"
                                        style="padding: 15px 30px 30px 30px; color: #aaaaaa; font-family: ' Poppins',
                                        sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                                        <p style="margin: 0;">You received this email because you just signed up for a
                                            new account.
                                            If it looks weird, <a href="#" target="_blank"
                                                style="color: #999999; font-weight: 700;">view it in your browser</a>.
                                        </p>
                                    </td>
                                </tr>
                                <!-- COPYRIGHT -->
                                <tr>
                                    <td align="center"
                                        style="padding: 30px 30px 30px 30px; color: #333333; font-family: 'Poppins',
                                        sans-serif; font-size: 12px; font-weight: 400; line-height: 18px;">
                                        <p style="margin: 0;">Copyright © {{ date('Y') }} <a
                                                href="{{ $maildata->url }}">PSSPL</a>. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                </table>

</body>

</html>
