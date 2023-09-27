@props([
    'title' => '',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    
    <title>Imparo Ventures</title>


    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset(config('settings.favicon', 'assets/admin/images/logo.png')) }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset(config('settings.favicon', 'assets/admin/images/logo.png')) }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset(config('settings.favicon', 'assets/admin/images/logo.png')) }}">
    <link rel="mask-icon" href="{{ asset(config('settings.favicon', 'assets/admin/images/logo.png')) }}"
        color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Scripts -->
    {{-- @routes
    @vite('resources/js/app.js') --}}
    {{-- @inertiaHead --}}

    <x-admin.partials.styles>
        <x-slot name="topStyle">
            {{ $topStyle ?? '' }}
        </x-slot>

        <x-slot name="bottomStyle">
            {{ $bottomStyle ?? '' }}
        </x-slot>
    </x-admin.partials.styles>



</head>

<body class="antialiased">

    <div id="overylyset" style="display: none;">
        <div class="loader">
        </div>
    </div>


    {{ $slot ?? '' }}





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
