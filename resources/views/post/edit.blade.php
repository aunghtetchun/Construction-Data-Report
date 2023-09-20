@extends('dashboard.app')

@section("title") Edit Post @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "Golf Event" => route("wedding_package.index"),
    ]])
        @slot("last") Edit Golf Event @endslot
    @endcomponent

    <div class="row">
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Edit Golf Event @endslot
                @slot('button')
                    <a href="{{route('wedding_package.index')}}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-list fa-fw"></i>
                    </a>
                @endslot
                @slot('body')
                        <form action="{{ route('wedding_package.update',$post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $post->title }}" placeholder="Title">
                                @error('title')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $post->price }}" placeholder="Price">
                                @error('price')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="start">Start</label>
                                <input type="date" class="form-control @error('start') is-invalid @enderror" name="start"
                                    id="start" value="{{ old('start') }}" placeholder="Start">
                                @error('start')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="end">End</label>
                                <input type="date" class="form-control @error('end') is-invalid @enderror" name="end"
                                    id="end" value="{{ old('end') }}" placeholder="End">
                                @error('end')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('street') is-invalid @enderror" name="description" id="description">{!!  $post->description !!}</textarea>
                                @error('description')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary " ><i class="fas fa-plus-square mr-1"></i> Update Golf Event</button>
                        </form>

                    @endslot
            @endcomponent
        </div>
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Golf Event Photo @endslot
                @slot('button')

                @endslot
                @slot('body')
                        <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-inline">
                                <input type="hidden" name="wedding_package_id" value="{{ $post->id }}">
                                <input type="file"   multiple class="form-control p-1 mr-2 @error('images') is-invalid @enderror" accept="image/png, .jpeg, .jpg, image/gif" name="images[]" id="images" value="" >
                                <button type="submit" class="btn btn-primary" >Upload</button>
                                @error('images')
                                <small class="invalid-feedback font-weight-bold" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </form>
                        <div class="d-flex my-2" style="overflow-x: scroll;" >
                            @foreach($post->getPhoto as $photo)
                                <div class="my-3"  >
                                    <div class="mr-2">
                                        <img src="{{ asset("/storage/wedding_package/".$photo->name) }}" alt="" style="height: 100px">
                                        <form action="{{ route('photo.destroy',$photo->id) }}"  method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button href="" class="btn mt-1 btn-sm btn-outline-danger text-left">
                                                <i class="feather-trash-2"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                @endslot
            @endcomponent
                @component("component.card")
                    @slot('icon') <i class="feather-file text-primary"></i> @endslot
                    @slot('title') Cost Calculate @endslot
                    @slot('button')

                    @endslot
                    @slot('body')
                        <form action="{{ route('package-detail.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="wedding_package_id" value="{{ $post->id }}">
                                <div class="col">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="Title">
                                    @error('title')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control @error('cost') is-invalid @enderror" name="cost" id="cost" value="{{ old('cost') }}" placeholder="Cost">
                                    @error('cost')
                                    <small class="invalid-feedback font-weight-bold" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" >Add</button>
                            </div>
                        </form>
                            <table class="table table-hover mt-3 mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Cost</th>
{{--                                    <th scope="col">Control</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($post->getPackageDetail as $pd)
                                    <tr>
                                        <td>{{ $pd->id }}</td>
                                        <td>{{ $pd->title }}
                                            <form class="d-inline-block" action="{{ route('order.destroy',$pd->id) }}"  method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm btn-outline-danger text-left">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $pd->cost }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-center"><b>Total </b></td>
                                    <td >
                                        {{ $post->getPackageDetail->sum('cost') }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
