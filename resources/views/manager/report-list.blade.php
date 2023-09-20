@extends('dashboard.author')

@section('title')
    TZT
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Report List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    Report List
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Leader</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $wp)
                                    <tr>
                                        <td>{{ $wp->id }}</td>
                                        <td>{{ $wp->getLeader->name }}</td>
                                        <td>{{ $wp->count }}</td>
                                        <td>
                                            @if($wp->status == 'waiting')
                                                <span class="badge badge-warning p-2">{{ $wp->status }}</span>
                                            @else
                                                <span class="badge badge-success p-2">{{ $wp->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $wp->date }}</td>
                                        <td>
                                            @if($wp->status=='waiting')
                                            <div class="d-flex flex-wrap">
                                                <form method="POST" action="{{ route('manager.approve',$wp->id) }}" onsubmit="return confirm('Are you sure you want to approve this item?');">
                                                    @csrf
                                                    @method('PUT')                                            
                                                    <button type="submit" class="btn mr-1  btn-success">Approve</button>
                                                </form>
                                                <form method="POST" action="{{ route('manager.reject',$wp->id) }}" onsubmit="return confirm('Are you sure you want to reject this item?');">
                                                    @csrf
                                                    @method('DELETE')                                            
                                                    <button type="submit" class="btn btn-danger">Reject</button>
                                                </form>
                                            </div>
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
