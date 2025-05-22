<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Work Anniversary</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .birthday-container {
            width: auto;
            margin: 0 auto;
            background-image: url('/events/work-anniversary/work_anniversary_bg_without.jpg');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            text-align: center;
            color: #8d3200;
            padding: 120px 40px;
            box-sizing: border-box;
        }

        .highlight {
            font-size: 22px;
            font-weight: bold;
            margin-top: 50px;
        }

        .user-name {
            font-size: 28px;
            font-weight: bold;
            margin: 20px 0 5px;
        }

        .user-designation {
            font-size: 18px;
            font-weight: 400;
            text-transform: capitalize;
        }

        .happy {
            font-family: 'Freehand521 BT', cursive;
            font-size: 40px;
            margin: 30px 0 10px;
        }

        .year {
            font-size: 80px;
            color: #e8a600;
            font-weight: bold;
            margin: 0;
        }

        .work-anniversary {
            font-family: 'Freehand521 BT', cursive;
            font-size: 28px;
            margin-top: 10px;
            font-weight: bold;
        }

        .greeting_msg,
        .regards {
            padding: 0px;
            text-align: left;
            width: 100%;
            margin-top: 20px;
        }

        .greeting_msg p,
        .regards p {
            font-size: 16px;
            margin: 10px 0;
        }
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
        
    </style>
</head>

<body>
    <div class="greeting_msg">
        <p>{!! $mailData['message'] !!}</p>
    </div>
    <div class="birthday-container" style="background-image: url({{asset('events/work-anniversary/work_anniversary_bg_without.jpg')}})">
        <div class="highlight">
            ON COMPLETING YOUR {{ $mailData['year'] }} YEAR AT WORK
        </div>

        <div class="user-name">
            {{ $mailData['name'] }}
        </div>
        <div class="user-designation">
            {{ $mailData['designation'] }}
        </div>

        <div class="happy">Happy</div>
        <div class="year">{{ $mailData['year'] }}</div>
        <div class="work-anniversary">Work Anniversary</div>
    </div>
    <!-- Regards Section -->
    <!-- Regards Section -->
    <table class="info-table">
        <tr>
            <th>Email</th>
            <td>{{ $mailData['comp_email'] }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>+91 {{ $mailData['comp_phone'] }}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td>{{ $mailData['comp_website'] }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $mailData['comp_address'] }}</td>
        </tr>
    </table>

    <!-- Social Icons -->
    <div class="social-icons" align="center" bgcolor="#ffffff">


        <a href="https://www.linkedin.com/company/prakhar-software/mycompany/" style="margin: 0px 5px;"> <img
                src="{{ asset('assets/images/linkedin.png') }}" alt="LinkedIn"></a>


        <a href="https://twitter.com/PrakharSoftwar1#" style="margin: 0px 5px;"><img
                src="{{ asset('assets\images\itwitter.png') }}" width="25"></a>


        <a href="https://www.youtube.com/channel/UCd2qQbaaZ09mPy1PvHZ0aAQ/featured" style="margin: 0px 5px;"><img
                src="{{ asset('assets/icons/youtube_icon.png') }}" width="25"></a>
        <a href="https://www.instagram.com/prakharsoftwares/" style="margin: 0px 5px;"><img
                src="{{ asset('assets/icons/Instagram_icon.png') }}" width="25"></a>
        <a href="https://za.pinterest.com/prakharsoftwares/_saved/" style="margin: 0px 5px;"><img
                src="{{ asset('assets/icons/pinterest_icon.png') }}" width="25"></a>
        <a href="https://www.facebook.com/Prakhar-Softwares-Solutions-Pvt-Ltd-258364067918404/"
            style="margin: 0px 5px;"><img src="{{ asset('assets/images/facebook.png') }}" width="25"
                alt="Facebook"></a>
    </div>

    <table>
        <tr>
            <td align="center" style="padding: 30px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td class="email-footer" align="center" style="padding: 15px;">
                            <p style="margin: 0; font-weight: bold;">You received this email because you signed up
                                for a new account. If it looks weird, view it in your browser.</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-footer" align="center" style="padding: 15px; color: #333;">
                            <p style="margin: 0; font-weight: bold;">Copyright © {{ date('Y') }} <a
                                    href="{{ websiteUrl() }}" style="color: #4CAF50;">Prakhar Software
                                    Solutions</a>. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
