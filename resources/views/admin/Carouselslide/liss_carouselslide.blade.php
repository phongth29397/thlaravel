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
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category_name</th>
                        <th>Parent</th>
                        <th>Lever1</th>
                        <th>Ordering</th>
                        <th><a href="{{route('Add-Carouselslide')}}" class="btn btn-primary">AddCarouselslide</a></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>image</th>
                        <th>description</th>
                        <th>full_description</th>
                        <th>full_description</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($Carouselslide1 as $Carouse)
                        <tr>
                            <td>{{$Carouse->id}}</td>
                            <td><img width="170px" class="product-image-intro" src="{{url('/')}}/{{$Carouse->image}}"></td>
                            <td>{{$Carouse->description}}</td>
                            <td>{{$Carouse->full_description}}</td>
                            <td>{{$Carouse->full_description}}</td>
                            <td><a href="{{route('sua-carouselslide',$Carouse->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($Carouselslide as $Carousel)
                        <tr>
                            <td>{{$Carousel->id}}</td>
                            <td><img width="170px" class="product-image-intro" src="{{url('/')}}/{{$Carousel->image}}"></td>
                            <td>{{$Carousel->description}}</td>
                            <td>{{$Carousel->full_description}}</td>
                            <td>{{$Carousel->full_description}}</td>
                            <td><a href="{{route('sua-carouselslide',$Carousel->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('xoa-carouselslide',$Carousel->id)}}" class="btn btn-primary">Delete</a>

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
