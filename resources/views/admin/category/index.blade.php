<x-admin.app>

    {{-- <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="pb-3">
                <a class="btn btn-primary" href="{{route('categories.create')}}">Create a new category</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $data)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$data->name}}</td>
                                @if ($data->status =='active')

                                <td><span class="badge badge-success">{{ucwords($data->status)}}</span></td>
                                @else
                                <td><span class="badge badge-danger">{{ucwords($data->status)}}</span></td>

                                @endif
                               
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{route('categories.edit',$data->id)}}" title="Edit"><i class="mdi mdi-square-edit-outline"></i> </a>
                                    <a href="{{route('category.delete',$data->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>

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
        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script> --}}

        <script src="{{asset('assets/admin/js/init-summernote.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
            function selectRefresh() {
                $(".skill").select2({
                    tags: true,
                    tokenSeparators: [',', ' ']
                    });
            }
        
            function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#image-preview').attr('src', e.target.result);
                            $('#image-preview').hide();
                            $('#image-preview').fadeIn(650);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
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
