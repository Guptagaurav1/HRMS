<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <title>{{$title ? $title : 'HRMS'}}</title>
    @yield('style')
</head>

<body class="light-theme">
    <div class="main-content">
        @yield('content')

    </div>
    <div>
        @yield('modal')
    </div>
<script src="{{ asset('assets/vendor/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/master.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/masters/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

</script>
<script>
    const SITE_URL = "{{ config('js.site_url')}}";
</script>
@yield('script')
</body>

</html>