<!DOCTYPE html>
<html lang="en" data-menu="vertical" data-nav-size="nav-default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{!empty($title) ? $title : 'HRMS'}}</title>
    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="{{asset('assets/vendor/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/OverlayScrollbars.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/jquery.dataTables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/daterangepicker.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    <link rel="stylesheet" id="primaryColor" href="{{asset('assets/css/blue-color.css')}}"/>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" id="rtlStyle" href="#"/>
    <link href="{{asset('assets/css/sweetalert2.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multidatespicker/1.6.6/jquery-ui.multidatespicker.css">
    
    @yield('style')
</head>
<body class="body-padding body-p-top light-theme">
     <!-- preloader start -->
    <div class="preloader d-none">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end -->

    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="main-content">
        @yield('contents')
        @include('layouts.footer')
    </div>

    <script src="{{asset('assets/vendor/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js/apexcharts.js')}}"></script>
    <!-- <script src="{{asset('assets/vendor/js/jquery.dataTables.min.js')}}"></script> -->
    <script src="{{asset('assets/vendor/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/js/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert2.all.min.js')}}"></script>

    <script>
        const SITE_URL = "{{ config('js.site_url')}}";
    </script>
    <script src="{{asset('assets/js/master.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-multidatespicker/1.6.6/jquery-ui.multidatespicker.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     @yield('script')
  
    <script>
        var rtlReady = $('html').attr('dir', 'ltr');
        if (rtlReady !== undefined) {
            localStorage.setItem('layoutDirection', 'ltr');
        }

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
</body>

</html>