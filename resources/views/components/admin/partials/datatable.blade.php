<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    {!! $dataTable->table(['class' => 'table table-striped dt-responsive'], false) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<x-slot name="topStyle">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link href="{{ URL::asset('assets/admin/css/datatable.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .dataTables_length {
            margin-left: 10px;
            padding-top: 0.5em;
        }

        .ic-img-32 {
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }

        .dataTable .dropdown-menu {
            transform: translate3d(-162px, -60px, 0px) !important;
        }

        .dataTables_wrapper:after {
            height: 30px;
        }
    </style>
</x-slot>

<x-slot name="topScript">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
    <script>
        $('.dataTableBuilder').removeClass('table-bordered')
    </script>
    <script>
        function StatusUpdate(id) {
            $.ajax({
                data: {
                    id: id
                },
                url: '/admin/status-update/' + id,
                type: 'get',
                success: function(response) {
                    location.reload();
                    toastr.success('Status Update Successfuly');
                },
                error: function(request, error) {},
            });
        }
    </script>
    {!! $dataTable->scripts() !!}
</x-slot>
