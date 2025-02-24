<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1.0">
    <title>
        404 Page Not Found
    </title>
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">
</head>

<body>
    <div class="error-container">
        <h1> 404 </h1>
        <p>
            Oops! The page you're
            looking for is not here.
        </p>
        <a href="{{route('login')}}">
            Go Back to Home
        </a>
    </div>
</body>

</html>
