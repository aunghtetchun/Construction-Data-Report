@extends('dashboard.app')

@section("title") Edit Site @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Site " => route("site.index"),
    ]])
        @slot("last") Edit Site @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Site @endslot
                @slot('button')
                    <a href="{{route('site.index')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                <form method="POST" action="{{ route('site.update',$site->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $site->name}}">
                    </div>
            
                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea name="details" class="form-control" id="details" >{{ $site->details}}</textarea>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Update Site</button>
                </form>

                    @endslot
            @endcomponent
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
               
                <div class="card-body">
                    <h6 class="text-uppercase">Add Item Limit</h6>
                    <hr/>
                    @foreach(App\Item::get() as $item)
                    <form method="POST" action="{{ route('target.store') }}">
                        @csrf
                        <div class="row">
                            <div class="pr-0 col-md-6">
                                <div class="form-group">
                                    <label for="item_id">Item</label>
                                    <input type="text" disabled class="form-control" value="{{$item->name}}">
                                    <input type="hidden" class="form-control" id="item_id" value="{{$item->id}}" name="item_id">
                                    <input type="hidden" class="form-control" id="site_id" value="{{$site->id}}" name="site_id">
                                </div>
                            </div>
                            <div class="px-1 col-md-3">
                                <div class="form-group">
                                    <label for="count">Count</label>
                                    @if(App\Target::where('item_id',$item->id)->where('site_id',$site->id)->exists())
                                    <input type="text" class="form-control" value="{{App\Target::where('item_id',$item->id)->where('site_id',$site->id)->first()->count}}" id="count" name="count">
                                    @else
                                    <input type="text" class="form-control"  id="count" name="count">
                                    @endif
                                </div>
                            </div>
                            <div class="pl-0 col-md-3">
                                <label for="count" class="d-block">*</label>
                                @if(App\Target::where('item_id',$item->id)->where('site_id',$site->id)->exists())
                                <button type="submit" class="btn btn-primary">Update</button>
                                @else
                                <button type="submit" class="btn btn-primary">Add</button>
                                @endif
                            </div>
                        </div>        
                
                    </form>
                    @endforeach
                </div>
            </div>
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
