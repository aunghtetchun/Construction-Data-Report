
@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection

@section('content')
            @component("component.card")
            @slot('icon') <i class="feather-file text-primary"></i> @endslot
            @slot('title') {{ auth()->user()->name }}  @endslot
            @slot('button')
            @if(!App\Report::where('date',now()->toDateString())->exists())

                    <a href="{{route('leader.createReport')}}" class="btn btn-sm py-2 btn-outline-success">
                        <i class="fas fa-plus fa-fw"></i>Add Report
                    </a>
                    @endif

                    <div class="d-inline-block">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
            @endslot
            @slot('body')
            @if(App\Report::where('date',now()->toDateString())->exists())

           <div class="alert alert-success">
            သင်ဒီနေ့အတွက် Report တင်ပြီးပါပြီ...
           </div>
           @endif
            @endslot
        @endcomponent
@endsection




