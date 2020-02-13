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
    <link href="{{ asset('css/header3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/fontawesome-free-5.11.2-web/css/all.css') }}" rel="stylesheet">







</head>
<body>
@php
    $list_root_category=DB::table("Categories")->where('parent','=',null)->get();/*video 34 phust 48:00*/
    $list_sub_category=DB::table("Categories")->where('parent','!=',null)->where('lever1','=',null)->get();/*video 34 phust 48:00*/
    $list_lever1_category=DB::table("Categories")->where('lever1','!=',null)->get();/*video 34 phust 48:00*/
@endphp

<div id="app" >

    <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="position: -webkit-sticky;position: sticky;top: 0;padding: 5px;z-index: 99;background: rgba(255, 255, 255, 0.6);" onmouseover="bigImg(this)" onmouseout="normalImg(this)">
        <script>
            function bigImg(x) {
                x.style.background = "rgba(255, 255, 255, 1)";
            }
            function normalImg(x) {
                x.style.background = "rgba(255, 255, 255, 0.5)";
            }
        </script>
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{ asset('upload\admin-ajax-1.png') }}" width="70" height="70" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto" style="font-size: 20px;font-family: Sans-Serif">
                    <ul class="navbar-nav mr-auto*" style="margin-right: 55px">
                        <li class="nav-item active">
                            <a class=""  href="#"><span class="sr-only" >(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('home')}}"><i class="fas fa-home"></i></i>&nbsp&nbsp</i>Trang Chủ</a></li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('new')}}">&nbsp&nbspNew&nbsp&nbsp</a></li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('sale')}}">&nbsp&nbspSale&nbsp&nbsp</a></li>
                        </li>
                        <li class="nav-item" style="display:none;">
                            <a class="nav-link"  href="{{route('gio-hang')}}">&nbsp&nbspCart&nbsp&nbsp</a></li>
                        </li>
                        @foreach($list_root_category as $root_category)
                            <li class="nav-item dropdown" style="display:none;">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="{{route('danh-muc',$root_category->id)}}">
                                    &nbsp&nbsp{{$root_category->category_name}}
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


                        @foreach($list_root_category as $root_category)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
                                    &nbsp&nbsp{{$root_category->category_name}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                    @foreach($list_sub_category as $sub_category)
                                                        @if($sub_category->parent==$root_category->id)
                                                            <th>
                                                                <a class="dropdown-item" href="{{route('danh-muc',$sub_category->id)}}" style="width: 150px;font-weight: bold;font-family: Sans-Serif">{{$sub_category->category_name}}</a>
                                                                <div class="dropdown-divider"></div>
                                                            </th>
                                                        @endif
                                                    @endforeach
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        @foreach($list_sub_category as $sub_category)
                                                            @if($sub_category->parent==$root_category->id)
                                                                <td>
                                                                    <ul style="margin: 0;padding: 0;">
                                                                        @foreach($list_lever1_category as $lever1_category)
                                                                            @if($lever1_category->lever1==$sub_category->id)
                                                                                <div style="margin-left: 10px" >
                                                                                    <a class="dropdown-item" href="{{route('lever1',$lever1_category->id)}}" style="font-family: Sans-Serif">{{$lever1_category->category_name}}</a>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>


                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('gio-hang')}}">&nbsp&nbspBộ Sưu Tập&nbsp&nbsp</a></li>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link"  href="{{route('gio-hang')}}">&nbsp&nbspGiỏ Hàng&nbsp&nbsp</a></li>
                        </li>
                    </ul>

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
                                <i class="fas fa-user-alt">&nbsp&nbsp</i>{{ Auth::user()->name }} <span class="caret"></span>
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

    <main class="py-4" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: -114px">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('upload\Ảnh-bìa-web-1920x800-3.jpg') }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Ảnh 1</h5>
                        <p>nhr</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('upload\Baner-thời-trang-nam-1.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('upload\Ảnh-bìa-web-1920x800-kids4.jpg') }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="home-baner" style="margin-top: 50px">
            <div class="row w-100">
                <div class="col-md-4" style="padding: 0;margin: 0">
                    <div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
                        <div><img class=" w-100" src="{{ asset('upload\home-banner\Acc-2.jpg') }}"></div>
                        <div><img class=" w-100" src="{{ asset('upload\home-banner\giày.jpg') }}"></div>

                    </div>

                </div>
                <div class="col-md-4" style="margin: 0;padding: 0">
                    <div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
                        <img class=" w-100" src="{{ asset('upload\home-banner\ảnh-up-web-giữa.jpg') }}">
                    </div>
                </div>

                <div class="col-md-4" style="margin: 0;padding: 0">
                    <div class="col-lg-12" style="padding-left: 0px;padding-right: 0px;">
                        <img class=" w-100" src="{{ asset('upload\home-banner\tuyển-dụng.jpg') }}">
                        <img class=" w-100" src="{{ asset('upload\home-banner\mix.jpg') }}">
                    </div>

                </div>
            </div>
            <hr>
            <hr>

            <div class="container">
                <div class="row">
                    <h1 style="font-family: Sans-Serif;font-weight: bold">Sale</h1>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="hiden" style="position: relative;">
                            <div class="hiden-conten">
                                <div style="position: relative;">
                                    <div>
                                        <img style="width:100%;" src="{{ asset('upload\hinh thoi.png') }}">
                                    </div>
                                    <div class="priceq">
                                        10000$
                                    </div>
                                </div>
                            </div>

                            <div class="chufree" style="position: absolute;top: -5px;right: -10px;z-index: 3;">
                                <div>
                                    <img class="w-100" src="{{ asset('upload\new.png') }}">
                                </div>
                            </div>
                            <img style=" border:1px solid rgba(122,122,122,0.42);" class="w-100"
                                 src="{{ asset('upload\G1011-750k-2-copy-Copy-480x635.jpg') }}">
                            <h4 style="text-align: center;margin-top: 10px;font-family: Sans-Serif;font-weight: bold">Ten
                                San Pham</h4>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="margin-top: 50px">
            <div class="container">
                <div class="new-content" style="text-align: center;text-decoration: underline">
                    <h1>New</h1>
                    <br>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-4"><img class="d-block w-100" src="{{ asset('upload\AKGQC209-15.jpg') }}"><h4
                                style="margin-top: 10px">NHỮNG KIỂU ÁO KHOÁC PHAO NAM ĐẸP CHO MÙA ĐÔNG</h4><h6>Bạn đang muốn làm
                            mới mình với những chiếc áo khoác nam cá tính vừa hữu dụng vừa thời trang,...</h6></div>
                    <div class="col-md-4"><img class="d-block w-100" src="{{ asset('upload\AKGQC209-15.jpg') }}"><h4
                                style="margin-top: 10px">NHỮNG KIỂU ÁO KHOÁC PHAO NAM ĐẸP CHO MÙA ĐÔNG</h4><h6>Bạn đang muốn làm
                            mới mình với những chiếc áo khoác nam cá tính vừa hữu dụng vừa thời trang,...</h6></div>
                    <div class="col-md-4"><img class="d-block w-100" src="{{ asset('upload\AKGQC209-15.jpg') }}"><h4
                                style="margin-top: 10px">NHỮNG KIỂU ÁO KHOÁC PHAO NAM ĐẸP CHO MÙA ĐÔNG</h4><h6>Bạn đang muốn làm
                            mới mình với những chiếc áo khoác nam cá tính vừa hữu dụng vừa thời trang,...</h6></div>

                </div>
            </div>
            <hr>
            <div>

            </div>
        </div>
    </main>
    <div class="container">
        @extends('layouts.footer')
    </div>
</div>
</body>
</html>
