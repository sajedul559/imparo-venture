<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                {!! $dataTable->table(['class'=>'table table-striped table-bordered dt-responsive nowrap no-footer dtr-inline'], false) !!}
            </div>
        </div>
    </div>
</div>
</div>

<x-slot name="topStyle">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link href="{{ URL::asset('asset/admin/css/datatable.css') }}" rel="stylesheet" type="text/css" />
    
    <style>
        .dataTables_length {
            margin-left: 10px;
            padding-top: 0.5em;
        }
    </style>
</x-slot>

<x-slot name="topScript">
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
</x-slot>