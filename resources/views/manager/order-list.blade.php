@extends('dashboard.author')

@section('title')
    TZT
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Order List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Order List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created_at</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $wp)
                                    <tr>
                                        <td>{{ $wp->id }}</td>
                                        <td>{{ $wp->getItem->name }}</td>
                                        <td>{{ $wp->count }}</td>
                                        <td>{{ $wp->date }}</td>
                                        <td>
                                            @if($wp->status == 'waiting')
                                                <small class="badge badge-warning">{{ $wp->status }}</small>
                                            @else
                                                <small class="badge badge-success">{{ $wp->status }}</small>
                                            @endif
                                        </td>
                                        <td>{{ $wp->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if($wp->status == 'waiting')
                                            <a href="{{ route('manager.editOrder', $wp->id) }}"
                                                class="btn mx-2 btn-info btn-sm">
                                                <i class="feather-edit"></i> Edit
                                            </a>
                                            <form method="POST" action="{{ route('manager.deleteOrder', $wp->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                            
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">
                                                    <i class="feather-trash-2"></i> Delete
                                                </button>
                                            </form>
                                            @endif
                                        </td>
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
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#previewImg").attr("src", e.target.result);

                }

                reader.readAsDataURL(file);
            }
        }
        $(".table").dataTable();
        $(".table").destory();
        $(".table").dataTable({
            "order": [
                [0, "desc"]
            ]
        });
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").worker().addClass(
            "px-0");
    </script>
@endsection
