@extends('dashboard.app')

@section('title')
    TZT
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Leader List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Leader List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Manager</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Label One</th>
                                    <th scope="col">Label Two</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaders as $wp)
                                    <tr>
                                        <td>{{ $wp->id }}</td>
                                        <td>{{ $wp->name }}</td>
                                        <td>{{ $wp->email }}</td>
                                        <td>{{ App\User::find($wp->manager_id)->name  }}</td>
                                        <td>{{ $wp->address }}</td>
                                        <td>{{ $wp->label_one }}</td>
                                        <td>{{ $wp->label_two }}</td>
                                        <td>{{ $wp->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.editLeader', $wp->id) }}"
                                                class="btn mx-2 btn-info btn-sm">
                                                <i class="feather-edit"></i> Edit
                                            </a>
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
