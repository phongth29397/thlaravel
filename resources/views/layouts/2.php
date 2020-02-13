<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/fontawesome-free-5.11.2-web/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/f7.css') }}" rel="stylesheet">



</head>
<body>

<div class="header-2019" >
    <div class="container-2019" >
        <div style="height: 10px"></div>
        <div class="header-top" >
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <div class="header-top-item"><i class="fas fa-share-alt"></i>Hệ thống Showroom11</div>
                        <div class="header-top-item"><i class="fas fa-phone fa-flip-horizontal"></i>Bán hàng trực tuyến</div>
                        <div class="header-top-item"><i class="fas fa-dollar-sign"></i>Bán hàng trả góp</div>
                        <div class="header-top-item"><i class="fas fa-tags"></i>Khuyến mãi</div>
                        <div class="header-top-item"><i class="fas fa-rss"></i>Tin hay mỗi ngày</div>
                        <div class="header-top-item"><i class="fas fa-shield-alt"></i>Tra cứu bảo hành</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom" style="display: none" >
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                        <ul class="list-controllers">
                            <li><a href="{{route('gio-hang')}}"><i class="fas fa-shield-alt"></i>Giỏ hàng</a></li>
                            <li><a href="{{route('dang-nhap')}}"><i class="fas fa-shield-alt"></i>Đăng nhập</a></li>
                            <li><a href="{{route('dang-nhap')}}"><i class="fas fa-shield-alt"></i>Đăng kí</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom2" style="display: none">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{route('home')}}"><img class="logo"  src="{{ asset('upload\t1-7-15705234857161486648520.png') }}" alt=""></a>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-offset-3">
                    <div class="area-search">
                        <form action="{{route('tim-kiem')}} " method="post">
                            <input type="text" name="keyword" class="form-control keyword" ><i class="fas fa-search"></i>
                            <p><b>Từ khóa:</b>Giày thể thao</p>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $list_root_category=DB::table("Categories")->where('parent','=',null)->get();/*video 34 phust 48:00*/
    $list_sub_category=DB::table("Categories")->where('parent','!=',null)->get();/*video 34 phust 48:00*/
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img src="{{ asset('upload\t1-7-15705234857161486648520.png') }}" width="50" height="50" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home<span class="sr-only">(current)</span></a>
            </li>
            @foreach($list_root_category as $root_category)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{route('danh-muc',$root_category->id)}}">
                        {{$root_category->category_name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($list_sub_category as $sub_category)
                            @if($sub_category->parent==$root_category->id)
                                <a class="dropdown-item"href="{{route('danh-muc',$sub_category->id)}}">{{$sub_category->category_name}}</a>
                            @endif
                        @endforeach
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            @endforeach
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


<div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="display: none">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                ssss

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    @extends('layouts.aa')
</div>
</body>
</html>
