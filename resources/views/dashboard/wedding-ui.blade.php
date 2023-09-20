<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, wedding-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('wedding/vendor/feather-icons-web/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/animate_it/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/data_table/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/css/kyalphyu.css') }}">
    <link rel="stylesheet" href="{{ asset('wedding/vendor/venobox/venobox.css') }}">
    <link href="{{ asset('dashboard/vendor/select_2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">


    @yield('head')
<style>
    .card{
        width: 100% !important;
    }
</style>
</head>

<body>

    <div class="container-fluid loading" style="background:  #f7efe9">
        <div class="row justify-content-center pt-5" style="min-height: 100vh">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6  p-0 d-flex flex-wrap justify-content-center">
            @yield('content')
        </div>
@include("dashboard.toast")

    </div>
</div>


          
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('wedding/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('wedding/js/bootstrap.js') }}"></script>
    <script src="{{ asset('wedding/vendor/data_table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('wedding/vendor/data_table/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('wedding/vendor/venobox/venobox.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
            "></script>
    <script src="{{ asset('dashboard/vendor/select_2/dist/js/select2.min.js') }}"></script>

    <script src="{{ asset('wedding/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.venobox').venobox({ // default: ''
                frameheight: '600px', // default: ''
                bgcolor: '#5dff5e', // default: '#fff'
                titleattr: 'data-title', // default: 'title'
                numeratio: true, // default: false
                infinigall: true, // default: false
            });
            $('.select2').select2();
        });
    </script>
    @yield('foot')
</body>

</html>
