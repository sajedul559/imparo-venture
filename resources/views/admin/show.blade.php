<x-admin.app :title="$page_title">

    <div class="page-title-box">
        <div class="row align-items-center">
            <x-admin.partials.breadcumb :title="$page_title"></x-admin.partials.breadcumb>
        </div>
    </div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Right Sidebar -->
                    <div class="email-area mb-3">

                        <div class="card shadow-sm">

                                <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-toolbar mb-3" role="toolbar">
                                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><a href="{{ route('admin.users.index') }}" class="text-white">Back User List</a></button>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4">
                                            <div class="flex-grow-1">
                                               <table>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email Address</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->email  }}</td>

                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->moblile }}</td>
                                                </tr>
                                                <tr>
                                                    <th>User Type</th>
                                                    <td> </td>
                                                    <td>:</td>
                                                    <td></td>
                                                    <td>{{ $item->type }}</td>
                                                </tr>

                                               </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-start mb-3">User Profile pic</h4>
                                        <div class="text-start">
                                        <img src="{{ asset('/storage') }}/{{$item->image}}"
                                            alt="Site Logo" class="rounded-circle img-fluid" style="height: 150px;width:150px">
                                        </div>
                                    </div>
                                 </div>

                                </div>
                        </div>

                    </div> <!-- end Col-9 -->

                </div>

            </div><!-- End row -->

        </div> <!-- container-fluid -->
    </div>
</x-admin.app>
