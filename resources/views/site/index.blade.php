@extends('dashboard.app')

@section('title')
    Site List
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Site List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Site List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Details</th>
                                    <th scope="col" >Controls</th>
                                    <th scope="col">Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Site::latest()->get() as $p)
                                    <tr>
                                        <th scope="row">{{ $p->id }}</th>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->details}}</td>
                                        <td class="control-group d-flex" style="vertical-align: middle; text-align: center">
                                                {{-- <form action="{{ route('item.destroy', $p->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button href=""
                                                        onClick="return confirm('Are you sure you want to cancel?')"
                                                        class="btn btn-sm btn-danger text-left">
                                                        <i class="fas fa-times-circle"></i> Reject
                                                    </button>
                                                </form> --}}
                                            <a href="{{ route('site.edit', $p->id) }}" class="btn mx-2 btn-warning btn-sm">
                                                <i class="feather-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('site.show', $p->id) }}" class="btn mx-2 btn-info btn-sm">
                                                <i class="feather-info"></i> Info
                                            </a>
                                        </td>
                                        <td>{{ $p->created_at->diffForHumans() }}</td>
                                    </tr>
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
         $(".table").dataTable();
        $(".table").destory();
        $(".table").dataTable({
            "order": [
                [0, "desc"]
            ]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass(
            "px-0");
    </script>
@endsection
