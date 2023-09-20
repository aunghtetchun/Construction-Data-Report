@extends('dashboard.lite')
@section("title") Login @endsection
@section('head')
    <style>
        .login-content{
            background: white url('{{ asset('dashboard/images/login-img.svg') }}');
            background-size: contain;
            background-position: left;
            background-repeat: no-repeat;
        }
        @media screen and (max-width: 420px){
            .login-content{
                background: white;
            }
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-8 m-auto">
            <div class="card login-content shadow animate__animated animate__zoomInDown">
                <div class="card-content">
                    <div class="row ">
                        <div class="col-12 col-md-6">
                            <img src="" class="w-100" alt="">
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="p-4">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="avatar shadow-sm border border-light mr-2" alt="">
                                    <p class="text-uppercase font-weight-bold text-primary mb-0">Admin Login</p>
                                </div>
                                <hr>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email" class="text-secondary font-weight-bold d-flex align-items-end">
                                            <i class="feather-mail text-primary h4 mb-0 mr-2"></i>
                                            <span class="">User Name</span>
                                        </label>

                                        <div class="form-group">
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="text-secondary font-weight-bold d-flex align-items-end">
                                            <i class="feather-lock text-primary h4 mb-0 mr-2"></i>
                                            <span class="">Password</span>
                                        </label>

                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group mb-0">

                                        <button type="submit" class="btn btn-primary w-50 btn-rounded">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
