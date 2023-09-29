@extends('dashboard.wedding-ui')

@section("title") Sample Page @endsection

@section('content')
<div class="col-12 px-0">
    @component("component.card")
    @slot('icon') <i class="feather-file text-primary"></i> @endslot
    @slot('title') {{ auth()->user()->name }} Account @endslot
    @slot('button')
            {{-- <a href="{{route('leader.createReport')}}" class="btn btn-sm py-2 btn-outline-success">
                <i class="fas fa-plus fa-fw"></i>Add Report
            </a> --}}
            <div class="d-inline-block">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
           
    @endslot
    @slot('body')
        <form method="POST" action="{{ route('leader.storeReport') }}">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="label_one_count">{{auth()->user()->label_one}} အရေအတွက်</label>
                <input type="number" name="label_one_count" value="" class="form-control" id="label_one_count" required>
            </div>
            <div class="form-group">
                <label for="label_two_count">{{auth()->user()->label_two}} အရေအတွက်</label>
                <input type="number" name="label_two_count" value="" class="form-control" id="label_two_count" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date" value="{{ now()->toDateString() }}" disabled>
            </div>        
            <button type="submit" class="btn btn-primary">Add Report</button>
            @endslot
        </form>
 
       
    @endslot
@endcomponent
</div>
         
       
@endsection




