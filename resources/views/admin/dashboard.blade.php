<x-admin.app title="Dashboard">
    <div class="page-title-box">
        <div class="row align-items-center">

            <div class="col-sm-12">
                <h4 class="page-title">Dashboard</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Welcome, 
                        {{-- {{ getSetting('site_title') }} --}}
                    </li>
                </ol>

            </div>
            <div class="pt-5">
                <a class="btn btn-primary" href="{{route('admin.projects.create')}}">Add a new projects</a>
                
            </div>
        </div>
    </div>
    <!-- end row -->

</x-admin.app>
