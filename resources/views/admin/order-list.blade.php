@extends('dashboard.app')

@section('title')
    TZT
@endsection
@section('head')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                <div class="mr-1 d-inline-block" style="min-width: 200px;">
                    <select id="pageLengthSelector" class="form-control  select2 px-5">
                        <option selected value="all">All Manager</option>
                        @foreach(App\User::where('role','manager')->get() as $m)
                        <option value="{{$m->id}}">{{$m->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mr-1 d-inline-block">
                    <div class="input-group ">
                        <input type='text' class="form-control h-100 autoapply created-date" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="fas fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                
                @endslot
                @slot('body')
                    <div class="tb">

                    </div>
                @endslot
            @endcomponent
        </div>
        

    </div>
@endsection
@section('foot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                              ">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.1/daterangepicker.min.js"
integrity="sha512-X8J16mW7T88N9Hd7J8/+JF/q5ZQJV801ugWFTZOEDkC9KNjMqaQI4EjZBgJCAEaPoH3GYteap6oEpJ1tpjEX8w=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // moment.locale("my");
        // pdfMake.fonts = {
        //     Arial: {
        //         normal: 'psumm.ttf',
        //         bold: 'psumm.ttf',
        //         italics: 'psumm.ttf',
        //         bolditalics: 'psumm.ttf'
        //     }
        // };
        var plist = [];
        var tableLength = 100;
        var manager_id='all';
        $('#pageLengthSelector').on('change', function() {
                manager_id = $(this).val(); // Get the value from the input field
                var dateRangePicker = $('.autoapply.created-date').data('daterangepicker');
                var startDate = dateRangePicker.startDate.format('YYYY-MM-DD');
                var endDate = dateRangePicker.endDate.format('YYYY-MM-DD');
                listFilter(startDate, endDate);

            });
        $(document).ready(function() {
            $('.select2').select2();
            $('.autoapply.created-date').daterangepicker({
                opens: 'left',
                startDate: moment(),
                endDate: moment().subtract(-1, 'days'),
                ranges: {
                    'Today': [moment(), moment().subtract(-1, 'days')],
                    'Yesterday': [moment().subtract(1, 'days'), moment()],
                    'Last 7 Days': [moment().subtract(7, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
            }, function(start, end, label) {
                st = start.format('YYYY-MM-DD');
                en = end.format('YYYY-MM-DD');
                listFilter(st, en);
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
            let start = moment().format('YYYY-MM-DD');
            let end = moment().subtract(-1, 'days').format('YYYY-MM-DD');

            listFilter(start, end);
        });

        function listFilter(start, end) {
            $('.tb').html(
                '<div class="table-responsive"><table id="datatable" class="table table-striped mb-0"><thead><tr><th>#</th><th>Site Name</th><th>Item Name</th><th>အရေအတွက်</th><th>ရက်စွဲ</th><th>Status</th><th>Action</th><th>Manager Name</th></tr></thead><tbody></tbody></table></div>'
            );
            $(".card-body").LoadingOverlay("show", {
                background: "rgba(105,214,255,0.5)"
            });
            $.ajax({
                url: `/order/data`,
                type: 'GET',
                dataType: 'json',
                data: {
                    "start": start,
                    "end": end,
                    "manager_id": manager_id
                },
                success: function(response) {
                    $(".card-body").LoadingOverlay("hide", true);
                    console.log(response.length);
                   
                    plist = response;
                    if (response.length >= 1) {
                        $("#datatable").dataTable({
                            "order": [
                                [0, "asc"]
                            ],
                            data: plist,
                            columns: [{
                                    data: null,
                                    render: function(data, type, row, meta) {
                                        return meta.row + 1;
                                    }
                                },
                               
                                {
                                    data: 'site_id',
                                    "render": function(data, type, row, meta) {
                                        return row.get_site.name;

                                    }
                                },
                                {
                                    data: 'item_id',
                                    "render": function(data, type, row, meta) {
                                        return row.get_item.name;

                                    }
                                },
                                {
                                    data: 'count',
                                },
                                {
                                    data: 'date',
                                },
                                {
                                    data: 'status',
                                    "render": function(data, type, row, meta) {
                                        return '<span class="badge badge-info px-2 py-1" id="status'+row.id+'">'+data+'</span>';

                                    }
                                },
                                {
                                    data: null,
                                    render: function(data, type, row) {
                                        if (row.status == 'waiting') {
                                            return '<button id="approve' +
                                                row.id +
                                                '" onClick=approveRecord(' + row.id +
                                                ',"approved") class="btn mt-1 text-center text-white py-1 btn-success"><i class="fas fa-user-slash"></i> Approve</button><button id="reject' +
                                                row.id +
                                                '" onClick=approveRecord(' + row.id +
                                                ',"reject") class="btn mt-1 text-center text-white py-1 btn-danger"><i class="fas fa-user-slash"></i> Reject</button>'
                                        } else{
                                            return "";
                                        }
                                    }
                                },  
                                {
                                    data: 'manager_id',
                                    "render": function(data, type, row, meta) {
                                        return row.get_manager.name;

                                    }
                                },   
                                                  
                             
                            ],
                            dom: 'Bfrtip',
                            buttons: [
                               'excel', 'colvis'
                            ],
                            "pageLength": tableLength,
                            // columnDefs: [{
                            //         targets: [5],
                            //         visible: false
                            //     },
                            //     {
                            //         targets: [6],
                            //         visible: false
                            //     },
                            //     {
                            //         targets: [7],
                            //         visible: false
                            //     },
                            //     {
                            //         targets: [4],
                            //         visible: false
                            //     },
                            // ],
                            // /premier/happy/' +row.id +'
                        });
                     
                    }
                }
            });
        }

        function approveRecord(id,status) {
            $("#approve" + id).parent().parent().LoadingOverlay("show", {
                background: "rgba(105,214,255,0.5)"
            });
            $.ajax({
                url: "/order/approve",
                type: 'POST',
                dataType: 'json',
                data: {
                    "id": id,
                    "status": status
                },
                success: function(response) {
                    $("#approve" + id).parent().parent().LoadingOverlay("hide", true);
                    $("#approve" + id).remove();
                    $("#reject" + id).remove();
                    $("#status" + id).text('approved');
                }
            });

        }
    
        $(".dataTables_length,.dataTables_filter,.dataTable,.dataTables_paginate,.dataTables_info").parent().addClass(
            "px-0");
    </script>
@endsection
