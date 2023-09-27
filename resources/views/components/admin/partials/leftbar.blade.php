<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i><span>
                            Dashboard </span>
                    </a>
                </li>

                @if (Auth::user()->type =='admin')
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <span> Adminstration <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i>
                            </span> </span> </a>
                    <ul class="submenu">

                            <li>
                                <a href="{{ route('admin.index') }}">
                                    <span>Admin Lists</span>
                                </a>
                            </li>
                        
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>Category <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i>
                            </span> </span> </a>
                    <ul class="submenu">

                            <li>
                                <a href="{{route('categories.index')}}" class="waves-effect"> <span>All</span></a>
                            </li>
                           

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>Feature <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i>
                            </span> </span> </a>
                    <ul class="submenu">

                            <li>
                                <a href="{{route('featurs.index')}}" class="waves-effect"> <span>All</span></a>
                            </li>
                           

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>Homepage Banner <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i>
                            </span> </span> </a>
                    <ul class="submenu">

                            <li>
                                <a href="{{route('homePage.index')}}" class="waves-effect"> <span>All</span></a>
                            </li>
                           

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>Project <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i>
                            </span> </span> </a>
                    <ul class="submenu">

                            <li>
                                <a href="{{route('admin.projects.index')}}" class="waves-effect"> <span>All</span></a>
                            </li>
                            <li>
                                <a href="{{route('admin.projects.ongoing')}}" class="waves-effect"> <span>Ongoing</span></a>
                            </li>
                            <li>
                                <a href="{{route('admin.projects.upcoming')}}" class="waves-effect"> <span>Upcoming</span></a>
                            </li>
                            <li>
                                <a href="{{route('admin.projects.completed')}}" class="waves-effect"> <span>Completed</span></a>
                            </li>
                          

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>Company <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i>
                            </span> </span> </a>
                    <ul class="submenu">

                            <li>
                                <a href="{{route('admin.company.index')}}" class="waves-effect"> <span>Lists</span></a>
                            </li>
                           
                          

                    </ul>
                </li>
                @endif

               
               
                @if (Auth::user()->type =='moderator')
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <span>Project <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i>
                            </span> </span> </a>
                    <ul class="submenu">

                            {{-- <li>
                                <a href="{{route('admin.projects.index')}}" class="waves-effect"> <span>All</span></a>
                            </li> --}}
                            <li>
                                <a href="{{route('admin.projects.ongoing')}}" class="waves-effect"> <span>Ongoing</span></a>
                            </li>
                            <li>
                                <a href="{{route('admin.projects.upcoming')}}" class="waves-effect"> <span>Upcoming</span></a>
                            </li>
                            <li>
                                <a href="{{route('admin.projects.completed')}}" class="waves-effect"> <span>Completed</span></a>
                            </li>
                          

                    </ul>
                </li>
                @endif

               


                {{-- <li>
                    <a href="{{route('projectPage.create')}}" class="waves-effect"><span> Project page create</span></a>
                </li> --}}
                <li>
                    {{-- <x-form action="{{ route('admin.logout') }}">
                        <button class="dropdown-item text-danger" type="submit">
                            <i class="mdi mdi-power text-danger"></i> Logout
                        </button>
                    </x-form> --}}
                    <a href="{{route('admin.logout')}}" class="waves-effect"> <i
                        class="ti-logout"></i><span> Logout</span></a>
                </li>
               
                  

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
