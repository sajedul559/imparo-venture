<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        {{-- <a href="{{ route('admin.dashboard') }}" class="logo"> --}}

            {{-- <a href="{{ route('admin.dashboard.index') }}" class="logo"> --}}
            <span>
                <img style="width:93%" class="pt-3" src="{{asset('assets/frontend/images/logo/logo-color.png')}}"
                        alt="logo" srcset="">
                {{-- @if (getSetting('site_logo'))
                    <img class="pt-3" src="{{ getImage(getSetting('site_logo'), 'logo') }}"
                        alt="{{ getSetting('site_title') ?? '' }}" srcset="">
                @else
                    <img class="pt-3" src="{{ getImage(getSetting('site_logo'), 'logo') }}"
                        alt="{{ getSetting('site_title') ?? '' }}" srcset="">
                    <h4 class="pt-3 text-white">{{ getSetting('site_title') ?? 'At Home Booking' }}</h4>
                @endif --}}
            </span>
            <i>
                {{-- <h4 class="pt-3" style="font-size: 10px">{{ getSetting('site_title') }}</h4> --}}
                {{-- <h4 class="pt-3" style="font-size: 10px">Edison</h4> --}}

            </i>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">Go
                    Home</a>
            </li>
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="{{ url('/') }}" target="_blank" rel="noopener noreferrer">{{ucwords(Auth::user()->username)}}</a>
            </li>
            

            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-fullscreen noti-icon"></i>
                </a>
            </li>

            <!-- notification -->

            <!-- end notification -->

            {{-- <li class="dropdown notification-list list-inline-item">
                @if (Auth::guard('admin')->user())
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown"
                            href="" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('favicon.ico')}}" alt="user"
                                class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ route('admin.index') }}"><i
                                    class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-account-edit m-r-5"></i>
                                Edit Profile
                            </a>
                            <x-form action="{{ route('admin.logout') }}">
                                <button class="dropdown-item text-danger" type="submit">
                                    <i class="mdi mdi-power text-danger"></i> Logout
                                </button>
                            </x-form>
                        </div>
                    </div>
                @endif
            </li> --}}

        </ul>

        {{-- <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
            <li class="d-none d-sm-block">
            </li>
        </ul> --}}

    </nav>

</div>
<!-- Top Bar End -->
