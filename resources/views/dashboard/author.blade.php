<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset(\App\Custom::$info['c-logo']) }}">
    <link rel="stylesheet" href="{{ asset(\App\Custom::$info['main_css']) }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/feather-icons-web/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/animate_it/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/data_table/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/venobox/venobox.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('dashboard/vendor/multi_img_up/dist/image-uploader.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/vendor/select_2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
    @yield('head')
</head>

<body>

    <div class="container-fluid">
        @guest
            @yield('content')
        @endguest
        @auth
            <div class="row">
                <!--        aside left start -->
                <div class="col-12 col-md-6 col-lg-3 col-xl-2 vh-100 aside-menu p-0">
                    @include('dashboard.anav')
                </div>
                <!--        aside left end -->
                <div class="col-12 col-md-12 col-lg-9 col-xl-10 vh-100 mt-2 content">
                    <div class="container-fluid">
                        <div class="row">


                            <!-- content start-->
                            <div class="col-12 px-0">
                                @include('dashboard.header')
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 loader">
                                            <div class="d-flex justify-content-center align-items-center vh-100 ">
                                                <div class="spinner-grow text-primary" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 py-3 min-vh-100 page-content" style="display: none;">
                                            <!--                                    card area start-->
                                            @yield('content')

                                            <!--                                    card area end-->
                                        </div>

                                        <div class="col-12 p-0 my-3">
                                            <div
                                                class="alert-secondary  rounded d-flex flex-column flex-md-row justify-content-between text-secondary py-2 px-3">
                                                <div>
                                                    Copy Right @ {{ \App\Custom::$info['short_name'] }} {{ date('Y') }}
                                                </div>
                                                <div>
                                                    Developed By <a class="text-primary font-weight-bold"
                                                        href="https://www.facebook.com/accesscode2022">Access Code</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--content end                    -->

                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>

    @include('dashboard.toast')

    <!-- Scripts -->
    <script src="{{ asset('dashboard/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('dashboard/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/data_table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/data_table/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/venobox/venobox.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/multi_img_up/dist/image-uploader.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/select_2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/app.js') }}"></script>

    @yield('foot')

</body>

</html>
