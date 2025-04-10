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
            background-image: url('https://demo.ndgc-etl.com/HRMS/hrm/event_template/work_anniversary/images/work_anniversary_bg_without.jpg');
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
    </style>
</head>
<body>
    <div class="greeting_msg">
        <p>{!! $mailData['message'] !!}</p>
    </div>
    <div class="birthday-container">
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
     <div class="regards">
        <p>Regards,</p>
        <p>Prakhar Software Solution Limited Team</p>
    </div>
</body>
</html>
