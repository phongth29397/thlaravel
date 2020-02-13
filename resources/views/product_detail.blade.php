@extends('layouts.aa')

@section('content')

    <div class="view-product-detail" style="font-family: Sans-Serif">
        <div class="container" style="margin-bottom: 100px">
            <nav>
                <a class="navbar-brand" href="#">Trang Chủ</a>
                <a class='navbar-brand' href="#">|</a>
                <a class="navbar-brand" href="#">New</a>
            </nav>
            <div class="row">
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-9 col-xs-12">
                                <img style="width: 100%" src="{{url('/')}}\{{$products->product_image_intro}}">
                            </div>
                            <div class="col-md-3">
                                <img style="width: 100%;margin-bottom: 15px" src="{{url('/')}}\{{$products->product_image_intro}}">
                                <img style="width: 100%;margin-bottom: 15px" src="{{url('/')}}\{{$products->product_image_intro}}">
                                <img style="width: 100%;margin-bottom: 15px" src="{{url('/')}}\{{$products->product_image_intro}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <form action="{{route('add-to-cart',$products->id)}}" method="post">

                                <h1>Sản phẩm {{$products->product_name}}</h1>

                                <div class="prices" style="color:red;font-size: 24px;font-weight: bold;height: 100px;line-height: 100px">
                                    <span class="price">
                                       @if($products->sale_price)
                                                {{number_format($products->sale_price)}}$
                                            @else
                                                {{number_format($products->price)}}$
                                            @endif
                                    </span>

                                    <span class="price" style="color:red;text-decoration: line-through">
                                         @if($products->sale_price)
                                            {{number_format($products->price)}}$
                                            @else

                                            @endif
                                    </span>


                                </div>
                                <div class="Size" style="height: 100px;">
                                        <fieldset data-role="controlgroup">
                                            <legend>Choose your SIZE:</legend>
                                            <label for="S">S</label>
                                            <input type="radio" name="size" id="S" value="S" checked>
                                            <label for="M">M</label>
                                            <input type="radio" name="size" id="M" value="M">
                                            <label for="L">L</label>
                                            <input type="radio" name="size" id="L" value="L">
                                            <label for="XL">XL</label>
                                            <input type="radio" name="size" id="XL" value="XL">
                                            <label for="XXL">XXL</label>
                                            <input type="radio" name="size" id="XXL" value="XXL">
                                        </fieldset>
                                </div>

                                <div class="quality" style="height: 100px">
                                    <span class="quality"><h1>Số lượng</h1></span>
                                    <select name="quality">
                                        @for($i=1;$i<=10;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor;
                                    </select>
                                </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Thêm hàng</button>
                            <br>
                            <hr>
                                <div>THÊM VÀO SANH SÁCH YÊU THÍCH </div>
                            <br>
                                <div>Mã:N/a</div>
                            <br>
                                <div>Danh Mục:Áo, Áo khoác, Áo Khoác Bomber, NEW, Sản phẩm, Thời Trang Nam </div>
                            <br>
                                <div>Từ Khóa:Áo, áo khoác, Áo Khoác Bomber, áo khoác da, áo khoác gió, áo khoác gió nam, áo khoác nam, áo phao, cửa hàng áo khoác, cửa hàng áo khoác gió nam, NEW, sản phẩm áo khoác, shop áo khoác, shop áo khoác nam</div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row">
               <div class="col-xl-3">

                   <div style="height: 30px;border: red">
                       Mô tả
                   </div>
                   <div>
                       Mô tả
                   </div>
                   <div>
                       Mô tả
                   </div>


               </div>


               <div class="col-xl-9">a</div>


            </div>
        </div>
    </div>
    <hr>

    <div class="container">
        <div class="row">
            <h1 style="font-family: Sans-Serif;font-weight: bold">Các sản phẩm liêm quan</h1>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="hiden" style="position: relative;">
                    <div class="hiden-conten" >
                        <div style="position: relative;">
                            <div>
                                <img  style="width:100%;" src="{{ asset('upload\hinh thoi.png') }}">
                            </div>
                            <div class="priceq">
                                10000$
                            </div>
                        </div>
                    </div>

                    <div class="chufree" style="position: absolute;top: -5px;right: -10px;z-index: 3;">
                        <div >
                            <img  class="w-100" src="{{ asset('upload\new.png') }}">
                        </div>
                    </div>
                    <img style=" border:1px solid rgba(122,122,122,0.42);" class="w-100" src="{{ asset('upload\G1011-750k-2-copy-Copy-480x635.jpg') }}">
                    <h4 style="text-align: center;margin-top: 10px;font-family: Sans-Serif;font-weight: bold">Ten San Pham</h4>
                </div>
            </div>
        </div>

    </div>

@endsection
