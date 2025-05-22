<!-- <!DOCTYPE html> -->
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        /* FONTS */
        @import url("https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700");

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
            font-family: "Poppins", sans-serif;
            background-color: #f8f8f8;
            /* Light background color */
        }

        /* MOBILE STYLES */
        @media screen and (max-width: 600px) {
            h1 {
                font-size: 30px !important;
                line-height: 32px !important;
            }

            .email-card {
                width: 100% !important;
                padding: 15px !important;
            }
        }

        /* CARD LAYOUT STYLES */
        .email-card {
            max-width: 600px;
            background-color: #ffffff;
            margin: 0 auto;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        /* HEADER STYLES */
        .email-header {
            padding: 30px 20px 20px 20px;
            background-color: #ffffff;
            border-radius: 12px 12px 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #e1e6e8;
            /* Light border for distinction */
        }

        .email-header img {
            width: 40%;
            margin-bottom: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .email-header img:hover {
            transform: scale(1.05);
        }

        /* MAIN CONTENT STYLES */
        .email-content {
            padding: 30px;
            background-color: #ffffff;
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.05);
        }

        .email-content h1 {
            font-size: 28px;
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
            text-align: center;
        }

        .email-content p {
            margin-bottom: 20px;
        }

        /* BUTTON STYLES */
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #45a049;
        }

        /* TABLE STYLES */
        .info-table {
            width: 100%;
            background-color: #fff;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .info-table th,
        .info-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
            font-size: 14px;
        }

        .info-table th {
            background-color: #4CAF50;
            color: white;
        }

        .info-table tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        /* SOCIAL ICONS STYLES */
        .social-icons {
            text-align: center;
            margin-top: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            transition: transform 0.3s ease;
        }

        .social-icons a:hover {
            transform: scale(1.1);
        }

        .social-icons img {
            width: 30px;
        }

        /* FOOTER STYLES */
        .email-footer {
            text-align: center;
            padding: 30px;
            background-color: #ffffff;
            border-top: 2px solid #ddd;
            font-size: 12px;
            color: #777;
        }

        .email-footer p {
            margin: 0;
        }

        .email-footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .email-footer .social-icons {
            margin-top: 10px;
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
                        <td class="email-header" align="center">
                            <img src="{{ asset('assets/icons/logo_p.png') }}" style="margin: 0; width:20%"
                                alt="Logo">
                            <img src="{{ asset('assets\images\11years.png') }}" style="margin: 0; width:10%"
                                alt="Logo">
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <!-- COPY BLOCK -->
        <tr>
            <td align="center" style="padding: 0px 10px 0px 10px;">
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" class="email-card">
                    @if (isset($mailData->name))
                        <tr>
                            <td align="center">
                                <p style="margin-top: 10px;"><b>Dear {{ $mailData->name }},</b></p>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <td style="font-size: 20px; text-align: center;">
                            Welcome to Prakhar Software Solutions!
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff" valign="top" width="600">
                            <div class="email-content">
                                <h4>We found your profile suitable for {{ $mailData->job_position }}</h4></br>
                                <table border='1'>
                                    <tbody>
                                        <th colspan='2'>Details:</th>

                                        <tr>
                                            <td>Position</td>
                                            <td>{{ $mailData->job_position }}</td>
                                        </tr>

                                        <tr>
                                            <td>Department</td>
                                            <td>{{ $mailData->department }}</td>
                                        </tr>

                                        <tr>
                                            <td>Location</td>
                                            <td>{{ $mailData->city . ' - ' . $mailData->state }}</td>
                                        </tr>

                                        <tr>
                                            <td>Education</td>
                                            <td>{{ $mailData->education }}</td>
                                        </tr>

                                        <tr>
                                            <td>Skills</td>
                                            <td>{{ $mailData->skill_sets }}</td>
                                        </tr>

                                        <tr>
                                            <td>Experience</td>
                                            <td>{{ $mailData->exp }}</td>
                                        </tr>

                                        <tr>
                                            <td>Remarks:</td>
                                            <td>{{ $mailData->remarks }}</td>
                                        </tr>
                                    </tbody>

                                </table>
                                <br>
                                <h4><b>Job Description</b></h4></br>
                                <pre style='text-align: left; font-weight:600; margin: 0px 15px;'>{{ $mailData->job_description }}</pre><br><br>
                                <h4>Apply! to grab an opportunity </h4><a href='{{ $mailData->link }}'>Click
                                    here</a></br>
                                <h4>Best of luck.</h4></br>
                                </br></br>
                                <h4 style='text-align: left;
                            margin-left: 30px;'>Thanks &
                                    Regards,</h4></br></br>

                                <h4 style='text-align: left;
                            margin-left: 30px;'>
                                    {{ $mailData->sender_name }}</h4></br>
                                <h4 style='text-align: left;
                            margin-left: 30px;'>Email:-
                                    {{ $mailData->sender_from }}</h4></br>
                                <h4 style='text-align: left;
                            margin-left: 30px;'>Mobile:-
                                    {{ $mailData->sender_phone }}</h4></br>
                                <h4>Note: If you have any query just reply to this email or contact no. which is listed
                                    above. </h4>";


                                    {{-- Company Info --}}
                                    <table class="info-table">
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $mailData->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>+91 {{ $mailData->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Website</th>
                                            <td>{{ $mailData->website }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $mailData->address }}</td>
                                        </tr>
                                    </table>
                            </div>


                            <!-- Social Icons -->
                            <div class="social-icons">


                                <a href="https://www.linkedin.com/company/prakhar-software/mycompany/"
                                    style="margin: 0px 5px;"> <img src="{{ asset('assets/images/linkedin.png') }}"
                                        alt="LinkedIn"></a>


                                <a href="https://twitter.com/PrakharSoftwar1#" style="margin: 0px 5px;"><img
                                        src="{{ asset('assets\images\itwitter.png') }}" width="25"></a>


                                <a href="https://www.youtube.com/channel/UCd2qQbaaZ09mPy1PvHZ0aAQ/featured"
                                    style="margin: 0px 5px;"><img src="{{ asset('assets/icons/youtube_icon.png') }}"
                                        width="25"></a>
                                <a href="https://www.instagram.com/prakharsoftwares/" style="margin: 0px 5px;"><img
                                        src="{{ asset('assets/icons/Instagram_icon.png') }}" width="25"></a>
                                <a href="https://za.pinterest.com/prakharsoftwares/_saved/"
                                    style="margin: 0px 5px;"><img src="{{ asset('assets/icons/pinterest_icon.png') }}"
                                        width="25"></a>
                                <a href="https://www.facebook.com/Prakhar-Softwares-Solutions-Pvt-Ltd-258364067918404/"
                                    style="margin: 0px 5px;"><img src="{{ asset('assets/images/facebook.png') }}"
                                        width="25" alt="Facebook"></a>
                            </div>
                        </td>
                    </tr>
                    <!-- FOOTER -->
                    <tr>
                        <td align="center" style="padding: 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width: 600px;">
                                <tr>
                                    <td class="email-footer" align="center" style="padding: 15px;">
                                        <p style="margin: 0; font-weight: bold;">You received this email because you
                                            signed up for a new account. If it looks weird, view it in your browser.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="email-footer" align="center" style="padding: 15px; color: #333;">
                                        <p style="margin: 0; font-weight: bold;">Copyright © {{ date('Y') }} <a
                                                href="{{ websiteUrl() }}" style="color: #4CAF50;">Prakhar Software
                                                Solutions</a>. All rights reserved.</p>
                                        <!-- <p style="margin: 0; font-weight: bold;">Copyright © {{ date('Y') }} <a
                                                href="{{ $mailData->url }}" style="color: #4CAF50;">Prakhar Software
                                                Solutions</a>. All rights reserved.</p> -->
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

</body>

</html>
