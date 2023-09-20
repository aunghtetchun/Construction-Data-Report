@extends('dashboard.app')

@section('title')
    Site Info
@endsection

@section('content')

    @component('component.breadcrumb', ['data' => []])
        @slot('last')
            Site Info
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component('component.card')
                @slot('icon')
                    <i class="feather-file text-primary"></i>
                @endslot
                @slot('title')
                    {{$site->name}} Info
                @endslot
                @slot('button')
                @endslot
                @slot('body')
                    <div>
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Count</th>
                                    <th scope="col" >Order Count</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($targets as $p)
                                    <tr>
                                        <th scope="row">{{ $p->id }}</th>
                                        <td>{{ $p->getItem->name }}</td>
                                        <td>{{ $p->count }}</td>
                                        <td>{{ $p->total_count }}</td>
                                        <td>
                                            @if($p->count < $p->total_count )
                                            <span class="badge p-2 badge-danger">Limit Over</span>
    
                                        @elseif($p->count < $p->total_count+50 )
                                            <span class="badge p-2 badge-warning"> Warning</span>
                                       
                                        @else
                                        <span class="badge p-2 badge-success"> Limit OK</span>

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
