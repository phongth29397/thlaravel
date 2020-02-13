@extends('layouts.aa')
@section('content')
    <div class="view-cart">
        <div class="container box-shadow" style="min-height: 500px;">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>Size</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach (Cart::content() as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->options->size}}</td>
                        <td>{{$item->price}}</td>
                        <td> <input id="{{$item->id}}{{$item->options->size}}" value="{{$item->qty}}"></td>
                        <td>
                            <form action="{{route('remove-item-cart',$item->rowId)}}" method="post">
                                <button class="btn btn-primary">Delete</button>
                                {{csrf_field()}}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">Tổng</td>
                    <td class="font-sans font-bold">{{$total = Cart::subtotal(0)}}</td>
                </tr>
                </tfoot>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-12" >
                    <div class="pull-right">
                        <div>
                        <form id="update-cart2" action="{{route('update-cart')}}" method="post">
                            @foreach (Cart::content() as $it)
                                <input type="hidden" id="{{$it->rowId}}" name="{{$it->rowId}}" value="{{$it->qty}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @endforeach
                        </form>
                        </div>
                        <a class="btn btn-primary" onclick="myFunction();">Cập Nhật</a>
                        <a class="btn btn-primary" href="{{route('thanh-toan')}}">Thanh toán</a>
                        <a class="btn btn-primary" href="{{route('home')}}">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            @foreach (Cart::content() as $item)
            document.getElementById("{{$item->rowId}}").value =document.getElementById("{{$item->id}}{{$item->options->size}}").value;
            @endforeach
            event.preventDefault();document.getElementById('update-cart2').submit();
        }
    </script>
@endsection

