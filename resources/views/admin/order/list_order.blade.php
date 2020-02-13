@extends('admin.layouts.admin')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Kh</th>
                        <th>SĐT</th>
                        <th>Tổng</th>
                        <th>Trạng thái</th>
                        <th>Created at</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Đơn Hàng</th>
                        <th>Tổng</th>
                        <th>Trạng thái</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->first_name}}{{$order->last_name}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->total}} $</td>
                            <td>{{$order->status}}</td>
                            <td style="width: 300px">
                                {{$order->created_at}}
                                <a href="{{route('chi-tiet-don-hang',$order->id)}}" class="btn btn-primary">Xem</a>
                                <a href="" class="btn btn-primary">Delete</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets\admin\vendor/jquery/jquery.js') }}"></script>
    <!-- Bootstrap core JavaScript<script src="{{ asset('assets\admin\vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>-->




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



