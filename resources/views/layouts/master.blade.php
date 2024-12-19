<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HRMS</title>
    <link rel="stylesheet" href="{{'assets/vendor/css/all.min.css'}}"/>
    <link rel="stylesheet" href="{{'assets/vendor/css/OverlayScrollbars.min.css'}}"/>
    <link rel="stylesheet" href="{{'assets/vendor/css/jquery.dataTables.min.css'}}"/>
    <link rel="stylesheet" href="{{'assets/vendor/css/daterangepicker.css'}}"/>
    <link rel="stylesheet" href="{{'assets/vendor/css/bootstrap.min.css'}}"/>
    <link rel="stylesheet" href="{{'assets/css/style.css'}}"/>
    <link rel="stylesheet" id="primaryColor" href="{{'assets/css/blue-color.css'}}"/>
    <link rel="stylesheet" id="rtlStyle" href="#"/>
    <link rel="stylesheet" href="assets/vendor/css/dropzone.min.css">
    <link rel="stylesheet" href="assets/vendor/css/jquery.uploader.css">
</head>
<body>
    @include('layouts.header')
    @yield('contents')
    @include('layouts.sidebar')
    @include('layouts.footer')
 
    
    
    
    <script src="{{'assets/vendor/js/jquery-3.6.0.min.js'}}"></script>
    <script src="{{'assets/vendor/js/jquery.overlayScrollbars.min.js'}}"></script>
    <script src="{{'assets/vendor/js/apexcharts.js'}}"></script>
    <script src="{{'assets/vendor/js/apexcharts.js'}}"></script>
    <script src="{{'assets/vendor/js/moment.min.js'}}"></script>
    <script src="{{'assets/vendor/js/daterangepicker.js'}}"></script>
    <script src="{{'assets/vendor/js/bootstrap.bundle.min.js'}}"></script>
    <script src="{{'assets/js/dashboard.js'}}"></script>
    <script src="{{'assets/js/main.js'}}"></script>
    <script src="{{'assets/vendor/js/dropzone.min.js'}}"></script>
    <script src="{{'assets/vendor/js/jquery.uploader.min.js'}}"></script>
    <script src="{{'assets/vendor/js/ckeditor.js'}}"></script>
    <script src="{{'assets/js/main.js'}}"></script> 
    <script src="{{'assets/js/dropzone-init.js'}}"></script> 
    <script src="{{'assets/vendor/js/jquery-3.6.0.min.js'}}"></script>
       
    <script src="{{'assets/vendor/js/jquery.overlayScrollbars.min.js'}}"></script>
  
    <script src="{{'assets/vendor/js/jquery.dataTables.min.js'}}"></script>
    
    <script src="assets/js/main.js"></script>
    <script>
        var rtlReady = $('html').attr('dir', 'ltr');
        if (rtlReady !== undefined) {
            localStorage.setItem('layoutDirection', 'ltr');
        }
    </script>
</body>

</html>