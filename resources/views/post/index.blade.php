@extends('dashboard.app')

@section('title')
    Post List
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Post List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Post List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Worker</th>
                                    <th scope="col" style="width: 100px;">Title</th>
                                    {{-- <th scope="col">Price</th> --}}
                                    <th scope="col">Description</th>
                                    <th scope="col" style="width: 100px;">Info</th>
                                    <th scope="col" >Controls</th>
                                    <th scope="col">Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Post::latest()->get() as $p)
                                    <tr>
                                        <th scope="row">{{ $p->id }}</th>
                                        <td>{{ $p->getUser->name }}</td>
                                        <td>{{ $p->title }}</td>
                                        {{-- <td>{{ $p->price }}</td> --}}
                                        <td>{{ \App\Custom::toShort(strip_tags(html_entity_decode($p->description)), 40) }}</td>
                                        <td>
                                            @if ($p->status =="approve")
                                                <span class="badge badge-secondary p-2 mr-1">{{$p->getWork->name}}</span>
                                                <span class="badge badge-warning p-2 mr-1">{{$p->getJob->name}}</span>
                                            @endif
                                        </td>
                                        <td class="control-group d-flex" style="vertical-align: middle; text-align: center">

                                            @if ($p->status == 'waiting')
                                                <button data-toggle="modal" data-target="#post{{ $p->id }}"
                                                    class="btn mr-2 btn-success btn-sm">
                                                    <i class="fas fa-check-square"></i> Approve
                                                </button>
                                                <form action="{{ route('post.destroy', $p->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href=""
                                                        onClick="return confirm('Are you sure you want to cancel?')"
                                                        class="btn btn-sm btn-danger text-left">
                                                        <i class="fas fa-times-circle"></i> Reject
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('post.destroy', $p->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href=""
                                                        onClick="return confirm('Are you sure you want to cancel?')"
                                                        class="btn btn-sm btn-danger text-left">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            @endif

                                            <a href="{{ route('post.show', $p->id) }}" class="btn mx-2 btn-info btn-sm">
                                                <i class="feather-eye"></i> View
                                            </a>
                                            {{-- <a href="{{ route('post.edit',$p->id) }}" class="btn  btn-outline-warning btn-sm">
                                            <i class="feather-edit"></i>
                                        </a> --}}
                                        </td>

                                        <td>{{ $p->created_at->diffForHumans() }}</td>
                                    </tr>
                                    <div>
                                        <div class="modal fade" id="post{{ $p->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">အချက်အလက်ရွေးချယ်ပါ
                                                            ({{ $p->title }})
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <form action="{{ route('post.approve') }}" method="post"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="post_id" value="{{ $p->id }}">
                                                                <div class="form-row justify-content-around ">
                                                                    <div class="form-group col-md-6 px-3 ">
                                                                        <div class="form-group">
                                                                            <label for="work">Work Type</label>
                                                                            <select name="work" id="work"
                                                                                class="form-control select2">
                                                                                <option selected disabled>Select Work Type</option>
                                                                                @foreach (\App\Information::where('type', 'work')->latest()->get() as $c)
                                                                                    <option value="{{ $c->id }}">
                                                                                        {{ $c->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('work')
                                                                                <small class="invalid-feedback font-weight-bold"
                                                                                    role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6 px-3 ">
                                                                        <div class="form-group">
                                                                            <label for="job">Job Type</label>
                                                                            <select name="job" id="job"
                                                                                class="form-control select2">
                                                                                <option selected disabled>Select Job Type</option>
                                                                                @foreach (\App\Information::where('type', 'job')->latest()->get() as $c)
                                                                                    <option value="{{ $c->id }}">
                                                                                        {{ $c->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('job')
                                                                                <small class="invalid-feedback font-weight-bold"
                                                                                    role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6 px-3 ">
                                                                        <div class="form-group">
                                                                            <label for="city">မြို့နယ် </label>
                                                                            <select name="city" id="city"
                                                                                class="form-control select2">
                                                                                @foreach (\App\Information::where('type', 'city')->latest()->get() as $c)
                                                                                    <option value="{{ $c->id }}"
                                                                                        {{ $p->city == $c->id ? 'selected' : '' }}>
                                                                                        {{ $c->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('city')
                                                                                <small class="invalid-feedback font-weight-bold"
                                                                                    role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6 px-3 ">
                                                                        <div class="form-group">
                                                                            <label for="location">တည်နေရာ</label>
                                                                            <select name="location" id="location"
                                                                                class="form-control select2">
                                                                                @foreach (\App\Information::where('type', 'location')->latest()->get() as $c)
                                                                                    <option value="{{ $c->id }}"
                                                                                        {{ $p->location == $c->id ? 'selected' : '' }}>
                                                                                        {{ $c->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('location')
                                                                                <small class="invalid-feedback font-weight-bold"
                                                                                    role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn ml-3 btn-primary "><i
                                                                        class="fas fa-plus-square mr-1"></i> Approve</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button type="button" class="btn btn-primary">Save changes</button>
                                            </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $(".table").dataTable({
            "order": [
                [0, "desc"]
            ]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass(
            "px-0");
    </script>
@endsection
