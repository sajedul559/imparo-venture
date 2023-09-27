<x-admin.app>

    {{-- <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="pb-3">
                <a class="btn btn-primary" href="{{route('featurs.create')}}">Create a new feature</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th>Name</th>
                                <th>Image</th>

                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $data)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$data->name}}</td>
                                <td>
                                    <img src="{{asset('images/feature/')}}/{{$data->image}}" class="home-image">
                                </td>
                                @if ($data->status =='active')

                                <td><span class="badge badge-success">{{ucwords($data->status)}}</span></td>
                                @else
                                <td><span class="badge badge-danger">{{ucwords($data->status)}}</span></td>

                                @endif
                               
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{route('featurs.edit',$data->id)}}" title="Edit"><i class="mdi mdi-square-edit-outline"></i> </a>
                                    <a href="{{route('feature.delete',$data->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>

                                </td>
                            </tr>
                            @endforeach
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <x-slot name="topStyle">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">



        <link rel="stylesheet" href="/">

            <style>
                .subtext {
                    font-size: 13px;
                    color: #acb3bc;
                }
                .choose-btn{
                    border-radius: 0px !important;
                    border-end-end-radius: 5px !important;
                    border-start-end-radius: 5px !important;
                }
            </style>
    </x-slot>
    <x-slot name="bottomScript">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
          <script>
            $(document).on("click", "#delete", function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                        swal({
                            title: "Are you Want to delete?",
                            text: "Once Delete, This will be Permanently Delete!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.href = link;
                            } else {
                            swal("Safe Data!");
                            }
                        });
                    });
            $(document).on("click", "#logout", function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    swal({
                        title: "Are want to logout?",
                        text: "Once Logout, Session will destroyed!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = link;
                        } else {
                        swal("Back to dashboard!");
                        }
                    });
                });
        </script>
    </x-slot>
</x-admin.app>
