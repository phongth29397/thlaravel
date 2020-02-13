@extends('admin.layouts.admin')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Chi Tiết Đơn Hàng</font></font></h6>
                </div>
                <div class="card-body">
                    <div class="view-list-order-detail">


                            <h3>Danh Sách Sản Phẩm Trong Đơn Hàng{{$customers->id}}</h3>
                        <form action="{{route('edit',$customers->id)}}" method="post">
                            <table class="table table-bordered">
                                <thead>
                                <th>Order_id</th>
                                <th>Product_id</th>
                                <th>Product_name</th>
                                <th>Số Lượng</th>
                                <th>Size</th>
                                <th>Product_price</th>
                                </thead>
                                <tbody>
                                @foreach($order_product as $list)
                                    <tr>
                                        <td>{{$list->order_id}}</td>
                                        <td>{{$list->product_id}}</td>
                                        <td style="width: 250px">
                                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="{{$list->id}}[id]">
                                                <option selected>{{$list->product_name}}</option>

                                                @foreach( $selected_product as $select)
                                                <option value="{{$select->product_name}}">{{$select->product_name}}</option>
                                                @endforeach
                                            </select>


                                        <td><input type="text" name="{{$list->id}}[product_qty]" value="{{$list->product_qty}}"></td>
                                        <td>{{$list->size}}</td>
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
                                            <a class="btn btn-primary" href="">Add Order</a>
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
