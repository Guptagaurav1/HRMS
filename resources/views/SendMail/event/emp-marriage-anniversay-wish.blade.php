<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Anniversary Mail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Table wrapper to hold the background image */
        .image-wrapper {
            width: 100%;
            background-image: url('https://demo.ndgc-etl.com/HRMS/hrm/event_template/marriage_anniversary/ma_image/bg_ma.jpg');
            background-size: contain;
            background-position: left;
            text-align: center;
            position: relative;
            height: 503px; /* Adjust height as needed */
        }

        /* Text overlay for username */
        .username {
            /* position: absolute; */
            margin-top: 160px; /* Adjust based on image */
            margin-left: 40%;
            transform: translateX(-50%);
            font-size: 28px;
            font-weight: bold;
            /* color: #ba0404; */
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .greeting_msg, .regards {
            padding: 0px;
            text-align: left;
            width: 100%;
            margin-top: 20px;
        }

        .greeting_msg p, .regards p {
            font-size: 16px;
            margin: 10px 0;
        }


        h1,
        h2,
        h3,
        h4 {
            margin: 0px;
            padding: 0px;
        }

        .birthday {
            width: 600px;
            margin: auto;
            height: 600px;
        }

        .bg-img {
            width: 600px;
            position: absolute;
        }

        .user-details {
            position: relative;
            top: 220px;
            left: 180px;
            color: #3f2e18;
            width: 500px;
        }

        .wishes {
            text-align: center;
            font-family: Courgette;
            font-style: normal;
            font-weight: 300;
            font-size: 28px;
            margin-top:60px;
        }

        .user-name {
            text-align: center;
            font-size: 24px;
            margin: 0px;
            font-family: Alpha54;
        }

        .quote {
            text-align: center;
            font-family: courgette;
            font-size: 24px;
            font-weight: 300;
            margin-top: 20px;
        }

        .congrates {
            text-align: center;
            font-family: courgette;
            font-size: 28px;
            margin-top: 15px;

        }
    </style>
</head>
<body>

    <div class="email-container">
        <!-- Greeting Message Section -->
        <div class="greeting_msg">
            <p>{!! $mailData['message'] !!}</p>
        </div>

        <!-- Image Wrapper Section with Background Image -->
        <table class="image-wrapper" role="presentation" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <!-- Username Text Over Image -->
                    <div class="username">
                        <h3 class="wishes">Marriage Anniversary</h3>
                        <h4 class="user-name">Dear {{ $mailData['name'] }}</h4>
                        <h4 class="quote">Best wishes to you both<br>on this momentous occasion.</h4>
                        <h4 class="congrates">Congratulation!</h4>
                    </div>
                </td>
            </tr>
        </table>

        <!-- Regards Section -->
        <div class="regards">
            <p>Regards,</p>
            <p>Prakhar Software Solution Limited Team</p>
        </div>
    </div>

</body>
</html>
