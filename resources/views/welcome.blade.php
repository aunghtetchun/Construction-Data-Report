
@extends('dashboard.wedding-ui')

@section("title") Welcome Page @endsection

@section('content')
        <div class="col-6 col-sm-12 p-0">
        </div>
        <div class="col-6 col-sm-12 p-0">
            <div class="mx-auto col-12 col-md-6 col-lg-6 d-flex flex-wrap h-100 align-items-center justify-content-center bg-gray">
                <h1 class="col-12 display-4 text-center mb-4">TZT</h1>
                <h1 class="col-12 text-center mb-5">Welcome!!</h1>
                <a href="{{ route('login')}}" class="">
                    <button class="btn btn-lg btn-info w-100 text-center">Log In</button>
                </a>    
            </div> 
        </div>
      
@endsection




