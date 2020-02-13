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
                            <th>STT</th>
                            <th>Họ Tên</th>
                            <th>Phone</th>
                            <th>Ngày Đặt</th>
                            <th>Tổng</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                            @foreach($orders as $orders1)
                                <tr>
                                    <td>{{$i++}} </td>
                                    <td>{{$orders1->first_name}} {{$orders1->last_name}}</td>
                                    <td>{{$orders1->phone}}</td>
                                    <td>{{$orders1->created_at}}</td>
                                    <td>{{$orders1->total}}</td>
                                    <td>{{$orders1->status}}</td>
                                    <td style="width: 184px">
                                        <a href="{{route('see-order',$orders1->id)}}" class="btn btn-primary" ><i class="fas fa-eye">&nbsp&nbsp</i>Xem</a>
                                        <a href="" class="btn btn-primary" ><i class="fas fa-prescription-bottle">&nbsp&nbsp</i>Hủy</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



        </div>
    </div>
@endsection