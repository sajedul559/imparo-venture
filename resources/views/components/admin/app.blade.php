<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title inertia>{{ $title ?? config('settings.site_title', 'Imparo Ventrues') }}</title>

    {{-- <link rel="shortcut icon" href="{{ asset(config('settings.favicon', 'assets/admin/images/favicon.ico')) }}"> --}}
    <link rel="icon" href="{{asset('assets/frontend/images/logo/favicon.png')}}" type="image/svg+xml" />

    {{-- <link rel="icon" href="./assets/images/logo/favicon.png" type="image/svg+xml" /> --}}

    <x-admin.partials.styles>
        <x-slot name="topStyle">
            {{ $topStyle ?? '' }}
        </x-slot>

        <x-slot name="bottomStyle">
            {{ $bottomStyle ?? '' }}
        </x-slot>
    </x-admin.partials.styles>

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <div id="overylyset" style="display: none;">
            <div class="loader">
            </div>
        </div>
        {{-- <x-admin.master> --}}
        <x-admin.partials.topbar></x-admin.partials.topbar>
        <x-admin.partials.leftbar></x-admin.partials.leftbar>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    {{ $slot ?? '' }}
                </div>
            </div>

            <x-admin.partials.footer></x-admin.partials.footer>
        </div>

    </div>
    <!-- END wrapper -->
    <x-admin.partials.scripts>
        <x-slot name="topScript">
            {{ $topScript ?? '' }}
        </x-slot>

        <x-slot name="bottomScript">
            {{ $bottomScript ?? '' }}
        </x-slot>

    </x-admin.partials.scripts>

    <x-notify.notify></x-notify.notify>

</body>

</html>
