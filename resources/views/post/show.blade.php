@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Tzt" => "#",
        "Tzt" => "#"
    ]])
        @slot("last") See Post @endslot
    @endcomponent
    <div class="row">
        <div class="col-12 col-md-8">
            @component("component.card")
                @slot('icon') <i class="fa-fw feather-file text-primary"></i> @endslot
                @slot('title') Post @endslot
                @slot('button')
                    <a href="{{ route('post.index') }}" class="btn btn-sm btn-outline-primary">
                        <i class="fa-fw fas fa-list fa-fw"></i>
                    </a>
                        {{-- <a href="{{ route('post.edit',$post->id) }}" class="btn  btn-outline-warning btn-sm">
                            <i class="fa-fw feather-edit"></i>
                        </a>
                        <form class="d-inline-block" action="{{ route('post.destroy',$post->id) }}"  method="post">
                            @csrf
                            @method("DELETE")
                            <button href="" class="btn btn-sm btn-outline-danger text-left">
                                <i class="fa-fw feather-trash-2"></i>
                            </button>
                        </form> --}}
                @endslot
                @slot('body')
                    <div class="card-body">
                        @isset($post)
                            <div class="d-flex flex-wrap justify-content-around ">
                                <div class="col-12 ">
                                    <h5>{{ $post->title }} </h5>
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-secondary p-2 mr-1">{{ $post->getCity->name }}</span>
                                        <span class="badge badge-success p-2 mr-1">{{ $post->getLocation->name }}</span>
                                        @if ($post->status =='approve')
                                        <span class="badge badge-info p-2 mr-1">{{ $post->getWork->name }}</span>
                                        <span class="badge badge-warning p-2 mr-1">{{ $post->getJob->name }}</span>
                                        @endif
                                    </div>

                                    <div>{!! $post->description !!} </div>
                                </div>
                                <div class="col-12 mt-3 col-md-12">
                                    <div class="d-flex flex-wrap">
                                        @foreach($post->getPhoto as $photo)
                                            <div class="col-6 p-2" style="width: 40px;">
                                                <a class="venobox" data-gall="myGallery" href="{{ asset("/storage/post/".$photo->name) }}">
                                                    <img class="w-100" src="{{ asset("/storage/post/".$photo->name) }}" alt="" >
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endisset
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')

@endsection
