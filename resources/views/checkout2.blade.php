@extends('layouts.aa')

@section('content')
    <div class="view-checkout">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="discount-products">
                    <div class="wrapper-title-discount-product">
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4"><h2 style="font-weight: bold;text-align: center" class="title-discount-product">Thanh Toán</h2></div>
                            <div class="col-4">
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <a class="navbar-brand" href="#">Trang Chủ</a>
                    <a class='navbar-brand' href="#">|</a>
                    <a class="navbar-brand" href="#">Thanh Toán</a>
                </nav>
                <hr>

            <form action="{{route('thanh-toan')}}" method="post">

                <div class="row">
                    <div class="col-md-6">
                        <p>* {{ Auth::user()->name }} *</p>
                        <p>* {{ Auth::user()->type }} *</p>
                        <div class="align-content-center">
                        </div>
                        <br>
                        <div style="font-family: Sans-Serif;font-weight: bold;font-size: 32px">Thông tin khách hàng</div>
                        <div class="row row-input">
                            <div class="col-md-12">
                                <label class="label">Địa chỉ email *</label>
                                <input type="text" readonly="readonly"  class="form-control" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <br>

                        <div class="row row-input">
                            <div class="col-md-6">
                                <label class="label">Họ *</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Họ"  value="{{$customers->first_name}}">
                            </div>
                            <div class="col-md-6">
                                <label class="label">Tên *</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Tên" value="{{$customers->last_name}}">
                            </div>
                        </div>
                        <br>
                        <div class="row row-input">
                            <div class="col-md-4">
                                <label class="label">Giới tính </label>
                                <select class="form-control" name="gioi_tinh">
                                    <option value="nam">Chọn....</option>
                                    <option value="nam">Nam</option>
                                    <option value="nư">Nư</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label class="label">Số Điên Thoại *</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Số Điện Thoại" value="{{$customers->phone}}">
                            </div>
                        </div>
                        <br>
                        <div class="row row-input">
                            <div class="col-md-12">
                                <label class="label">Địa Chỉ *</label>
                                <textarea name="address" class="form-control" placeholder="Địa Chỉ">{{$customers->address}}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row row-input">
                            <div class="col-md-12">
                                <label class="label">THÔNG TIN BỔ SUNG </label>
                                <textarea name="thong tin" class="form-control" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." ></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div style="font-family: Sans-Serif;font-weight: bold;font-size: 32px;margin-top: 100px">Thông tin Đơn Hàng</div>
                        <br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="">Sản Phẩm</th>
                                <th scope="col">Tổng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Cart::content() as $item)
                            <tr>

                                <th scope="row">{{$item->name}}x{{$item->qty}}x{{$item->options->size}}</th>
                                <td>{{$item->price}}</td>

                            </tr>
                            @endforeach
                            <tr>
                                <th scope="row">Tiền Hàng</th>

                                <td>{{$total = Cart::subtotal(0)}}</td>

                            </tr>
                            <tr>
                                <th scope="row">Thành Tiền</th>

                                    <td>{{$total = Cart::subtotal(0)}}</td>

                            </tr>
                            </tbody>

                        </table>
                        <div class="row-input">
                            <button class="btn btn-primary pull-right" type="submit">Thanh Toán</button>
                        </div>
                    </div>


                </div>
                {{csrf_field()}}
            </form>
        </div>

    </div>
    <br>
    <hr style="margin-bottom: 100px">
@endsection
