<x-admin.app>

    {{-- <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="pb-3">
                <a class="btn btn-primary" href="{{route('admin.projects.create')}}">Create a new project</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $page)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->category->name}}</td>
                                <td>{{ucwords($page->status)}}</td>
                                <td>
                                    <img src="{{asset('images/page/project/')}}/{{$page->image}}" class="home-image">
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.projects.edit',$page->id)}}" title="Edit"><i class="mdi mdi-square-edit-outline"></i> </a>
                                    <a href="{{route('admin.projects.delete',$page->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>

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
