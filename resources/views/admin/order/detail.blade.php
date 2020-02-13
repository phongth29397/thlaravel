@extends('admin.layouts.admin')
@section('content')

    <div class="row">

            <div class="col-lg-6">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chi Tiết Khách Hàng</font></font></h6>
                    </div>
                    <div class="card-body">

                            <table class="table table-bordered">
                                <tr>
                                    <th>Email</th>
                                    <td>{{$customers->email}}</td>
                                </tr>
                                <tr>
                                    <th>Họ</th>
                                    <td>{{$customers->first_name}}</td>
                                </tr>
                                <tr>
                                    <th>Tên</th>
                                    <td>{{$customers->last_name}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$customers->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Địa Chỉ</th>
                                    <td>{{$customers->address}}</td>
                                </tr>
                            </table>

                    </div>
                </div>
                <div>
                   11
                </div>
            </div>


        <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chi Tiết Đơn Hàng</font></font></h6>
                </div>
                <div class="card-body">
                    @php
                        $list_order_status=[
                            "pending",
                            "processing",
                            "completed",
                            "cancel",
                        ]
                    @endphp
                    <div class="view-list-order-detail">
                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif
                        <form action="{{route('post-edit-order',$order->id)}}" method="post">
                            <table class="table table-bordered">
                                <tr>
                                    <th>STT</th>
                                    <td>{{$order->id}}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>{{$order->total}}</td>
                                </tr>
                                <tr>
                                    <th>Trạng Thái</th>
                                    <td>
                                        <select class="form-control" name="status">
                                            @foreach($list_order_status as $status)
                                                <option <?php echo $status==$order->status?'  selected ':'' ?> value="{{$status}}">{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created at</th>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                            </table>
                            <h3>List Product</h3>
                            <table class="table table-bordered">
                                <thead>
                                <th>Đơn Hàng</th>
                                <th>Sản Phẩm</th>
                                <th>Size</th>
                                <th>Số Lượng</th>
                                <th>Product_price</th>
                                </thead>
                                <tbody>
                                @foreach($list_product as $list)
                                    <tr>

                                        <td>{{$list->order_id}}</td>
                                        <td>{{$list->product_name}}</td>
                                        <td>{{$list->size}}</td>
                                        <td>{{$list->product_qty}}</td>
                                        <td>{{$list->product_price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>
                                <td class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right">

                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a class="btn btn-primary" href="{{route('edit-order',$order->id)}}">Edit Order</a>
                                        </div>
                                    </div>
                                </td>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets\admin\vendor/jquery/jquery.js') }}"></script>
    <!-- Bootstrap core JavaScript <script src="{{ asset('assets\admin\vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>-->




    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets\admin\vendor/jquery-easing/jquery.easing.js') }}"></script>



    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets\admin/js/sb-admin-2.min.js') }}"></script>



    <!-- Page level plugins -->
    <script src="{{ asset('assets\admin\vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets\admin\vendor/datatables/dataTables.bootstrap4.js') }}"></script>




    <!-- Page level custom scripts -->
    <script src="{{ asset('assets\admin\js/demo/datatables-demo.js') }}" rel="stylesheet"></script>


@endsection
