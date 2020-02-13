@extends('layouts.aa')

@section('content')

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: -114px">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                @foreach($Carouselslide1 as $Carouse)
                    <img class="d-block w-100" src="{{url('/')}}/{{$Carouse->image}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h4>  @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif
                        </h4>
                        <p>nhr</p>
                    </div>
                @endforeach
            </div>
            @foreach($Carouselslide as $Carouse1)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{url('/')}}/{{$Carouse1->image}}" alt="Second slide">
                </div>
            @endforeach


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
                    <div><a href="" ><img class=" w-100" src="{{ asset('upload\home-banner\Acc-2.jpg') }}"></a></div>
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

        <div class="container">
            <div class="row">
                <h1 class="font-sans font-bold" >New</h1>
            </div>
            <div class="row">
                @foreach($new_products as $new)
                    <div class="col-md-3">
                        <div class="hiden position-relative">
                            <div class="hiden-conten">
                                <div class="position-relative">
                                    <div>
                                        <a href="{{route('product-detail',$new->id)}}"><img class="w-100" src="{{ asset('upload\hinh thoi.png') }}"></a>
                                    </div>
                                    <div class="priceq">
                                        <a  href="{{route('product-detail',$new->id)}}"
                                            style="color:red;text-decoration: none">
                                            {{number_format($new->price)}}$
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="chufree position-absolute">
                                <div>
                                    <img class="w-100" src="{{ asset('upload\new.png') }}">
                                </div>
                            </div>
                            <div class="position-absolute" style="z-index:4">
                                <a href="{{route('product-detail',$new->id)}}">
                                    <img class="w-100" src="{{ asset('upload\Capturegg123.png') }}">
                                </a>
                            </div>
                            <img style=" border:1px solid rgba(122,122,122,0.42);" class="w-100"
                                 src="{{url('/')}}/{{$new->product_image_intro}}">
                        </div>
                        <a href="{{route('product-detail',$new->id)}}" style="text-decoration: none">
                            <h4 class="name-sp">{{$new->product_name}}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <h1 class="font-sans font-bold">Sale</h1>
            </div>
            <div class="row">
                @foreach($sale_products as $sale)
                    <div class="col-md-3">
                        <div class="hiden position-relative">
                            <div class="hiden-conten">
                                <div class="position-relative">
                                    <div>
                                        <a href="{{route('product-detail',$sale->id)}}"><img class="w-100" src="{{ asset('upload\hinh thoi.png') }}"></a>
                                    </div>
                                    <div class="priceq">
                                        <a class="price2" href="{{route('product-detail',$sale->id)}}" style="color:red;text-decoration: line-through;">
                                            {{number_format($sale->price)}}$
                                        </a>
                                        <br>
                                        <a class="price2" href="{{route('product-detail',$sale->id)}}" style="color:red;text-decoration: none">
                                            {{number_format($sale->sale_price)}}$
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="chufree position-absolute">
                                <div>
                                    <img class="w-100" src="{{ asset('upload\sale.png') }}">
                                </div>
                            </div>
                            <div class="position-absolute" style="z-index:4">
                                <a href="{{route('product-detail',$sale->id)}}">
                                    <img class="w-100" src="{{ asset('upload\Capturegg123.png') }}">
                                </a>
                            </div>
                            <img style=" border:1px solid rgba(122,122,122,0.42);" class="w-100"
                                 src="{{url('/')}}/{{$sale->product_image_intro}}">
                        </div>
                        <a href="{{route('product-detail',$sale->id)}}" style="text-decoration: none">
                            <h4 class="name-sp">{{$sale->product_name}}</h4>
                        </a>
                    </div>
                @endforeach
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
                <div class="col-md-4"><img class="d-block w-100" src="{{ asset('upload\AKGQC209-15.jpg') }}">
                    <h4 style="margin-top: 10px">NHỮNG KIỂU ÁO KHOÁC PHAO NAM ĐẸP CHO MÙA ĐÔNG</h4>
                    <h6>Bạn đang muốn làm mới mình với những chiếc áo khoác nam cá tính vừa hữu dụng vừa thời trang,...</h6>
                </div>
                <div class="col-md-4"><img class="d-block w-100" src="{{ asset('upload\AKGQC209-15.jpg') }}">
                    <h4 style="margin-top: 10px">NHỮNG KIỂU ÁO KHOÁC PHAO NAM ĐẸP CHO MÙA ĐÔNG</h4>
                    <h6>Bạn đang muốn làm mới mình với những chiếc áo khoác nam cá tính vừa hữu dụng vừa thời trang,...</h6>
                </div>
                <div class="col-md-4"><img class="d-block w-100" src="{{ asset('upload\AKGQC209-15.jpg') }}">
                    <h4 style="margin-top: 10px">NHỮNG KIỂU ÁO KHOÁC PHAO NAM ĐẸP CHO MÙA ĐÔNG</h4>
                    <h6>Bạn đang muốn làm mới mình với những chiếc áo khoác nam cá tính vừa hữu dụng vừa thời trang,...</h6>
                </div>
            </div>
        </div>
        <hr>
        <div>

        </div>
    </div>


@endsection



