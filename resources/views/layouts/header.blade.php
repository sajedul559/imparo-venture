<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Set character encoding for the document -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Viewport for responsive web design -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,viewport-fit=cover" />
    <!-- Document Title -->
    <title>Imparo Ventures</title>
    <!-- Meta Description -->
    <meta name="description" content="A simple HTML5 Template for new projects." />
    <!--Keyword-->
    <meta name="keywords"
        content="cryptocurrency, financial, financial company, HYIP, hyip business, HYIP,hyip website, illustration hyip" />
    <!--Author-->
    <meta name="author" content="ITClan BD-Mamunur Rashid" />
    <!--Favicon-->
    <link rel="icon" href="./assets/images/logo/favicon.ipngco" />
    <link rel="icon" href="{{asset('assets/frontend/images/logo/favicon.i')}}" />
    <link rel="icon" href="./assets/images/logo/favicon.png" type="image/svg+xml" />
    <link rel="icon" href="{{asset('assets/frontend/images/logo/favicon.png')}}" type="image/svg+xml" />

    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css">


    <!-- ==== CSS Dependencies Start ==== -->
    <link rel="stylesheet" href="{{asset('assets/frontend/vendors/vendor-min.css')}}" />
    <!-- ==== CSS Dependencies End ==== -->
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
    <!--Custom css use development purpose-->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/custom.css')}}" />
    <link rel="stylesheet" href="./assets/css/custom.css" />
</head>

<body>
    <div class="ic-loading">
        <div class="ic-loader">
            <div class="loader-inner ball-scale-multiple">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!--Header Start-->
    <header>
        <div class="menu_bar">
            <div class="container container-width">
                <div class="row">
                    <div class="col menu-bar__logo">
                        <a href="/"><img src="{{asset('assets/frontend/images/logo/logo.png')}}" alt="" /></a>
                    </div>
                    <div class="menu-bar__menu-lists col">
                        <ul>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="{{asset('assets/frontend/images/menu-hambuerger.svg')}}" class="white-menu" alt="" />
                                    <img src="{{asset('assets/frontend/images/menu-hambuerger-black.svg')}}" class="black-menu" alt="" />
                                     <img src="{{asset('assets/frontend/images/close.svg')}}" class="close" alt="" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class='toggle-slide-menu-wrap'>
            <div class="toggle-slide-menu">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                    <li class='hasChild'><span>projects</span>
                        <ul>
                            @foreach ($categories as $data)
                                <li><a href="{{route('project',$data->slug)}}">{{$data->name}}</a></li>
                               
                            @endforeach
                            
                        </ul>
                    </li>
                    <li class='hasChild'><span>Company</span>
                        <ul>
                            @foreach ($companys as $data)
                             <li><a href="{{route('company.details',$data->slug)}}">{{$data->title}}</a></li>
                            @endforeach
                           
                        </ul>
                    </li>
                    <li class='hasChild'><span>Inquiry</span>
                        <ul>
                            <li><a href="{{route('buyer')}}">Buyers</a></li>
                            <li><a href="{{route('landowner')}}">landowners</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('contact')}}">Contact</a></li>

                </ul>
            </div>
        </div>
    </header>
    <!--Header End-->
    <x-notify.notify></x-notify.notify>

</body>