<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Mail</title>
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
            background-image: url('/events/birthday/bg_two.jpg');
            background-size: cover;
            background-position: left;
            text-align: center;
            position: relative;
            height: 420px; /* Adjust height as needed */
        }

        /* Text overlay for username */
        .username {
            /* position: absolute; */
            margin-top: 90px; /* Adjust based on image */
            margin-left: 40%;
            transform: translateX(-50%);
            font-size: 28px;
            font-weight: bold;
            color: #ba0404;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        }

        .greeting_msg, .regards {
            padding: 20px;
            text-align: left;
            width: 100%;
            margin-top: 20px;
        }

        .greeting_msg p, .regards p {
            font-size: 16px;
            margin: 10px 0;
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
                        Dear {{ $mailData['name'] }}
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
