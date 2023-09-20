@extends('dashboard.app')

@section("title") Edit Item @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Item " => route("item.index"),
    ]])
        @slot("last") Edit Item @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Item @endslot
                @slot('button')
                    <a href="{{route('item.index')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('item.update',$item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $item->name}}">
                    </div>
            
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" class="form-control" id="details" >{{ $item->details}}</textarea>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Update Item</button>
                </form>

                    @endslot
            @endcomponent
        </div>
       
                      

    </div>
@endsection
@section('foot')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 140,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true
            });



        });
    </script>
@endsection
