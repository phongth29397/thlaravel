@extends('layouts.aa')

@section('content')
    <div class="view-new">
        <div class="container">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="discount-products">
                <div class="wrapper-title-discount-product">
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <div class="col-4"><h2 class="title-discount-product font-bold">Đơn hàng</h2></div>
                        <div class="col-4">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container box-shadow" style="min-height: 900px;">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Kích cỡ</th>
                        <th>Số lượng</th>
                        <th>Đơn Giá</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $seeorder)
                        <tr>
                            <td style="width: 200px">
                                <button  style="border: none" data-toggle="modal" data-target="#exampleModal{{$seeorder->id}}">
                                    {{$seeorder->product_name}}
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$seeorder->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">{{$seeorder->product_name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="d-block w-100" src="{{url('/')}}/{{$seeorder->product_image_intro}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$seeorder->size}}</td>
                            <td>{{$seeorder->product_qty}}</td>
                            <td>{{$seeorder->product_price}}</td>


                        </tr>
                    @endforeach
                    </tbody>


                    <tr>
                        <td colspan="3">Tổng = Số lượng x Đơn Giá</td>

                    @foreach($total as $total1)
                        <td class="font-sans font-bold">{{$total1->total}}</td>
                    @endforeach

                    </tr>

                </table>
            </div>



        </div>
        <div class="container">



        </div>
    </div>
@endsection