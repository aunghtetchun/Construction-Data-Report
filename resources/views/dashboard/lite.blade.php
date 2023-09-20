<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{ asset(\App\Custom::$info['main_css']) }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/feather-icons-web/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/animate_it/animate.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
    <link href="{{ asset('dashboard/vendor/select_2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">


    @yield('head')
</head>

<body class="loading">

    <div class="min-vh-100 d-flex justify-content-between align-items-center">
        @yield('content')
    </div>
    <script src="{{ asset('dashboard/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
    "></script>
    <script src="{{ asset('dashboard/vendor/select_2/dist/js/select2.min.js') }}"></script>

    @yield('foot')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>
