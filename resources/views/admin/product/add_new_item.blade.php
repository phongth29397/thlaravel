@extends('admin.layouts.admin')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ADD Sản Phẩm</font></font></h6>
                </div>
                <div class="card-body">
                    <form action="{{route('post-add-product')}}" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered">
                            <tr>
                                <th>Product name</th>
                                <th><input type="text" class="form-control" name="product_name"></th>
                            </tr>
                            <tr>
                                <th>Product image intro</th>
                                <th>
                                    <input type="file" class="form-control" name="product_image_intro">
                                </th>
                            </tr>
                            <tr>
                                <th>Category=Thể loại</th>
                                <th>
                                    <select name="category_id">
                                        @foreach($list_lever1 as $lever1)
                                            <option value="{{$lever1->id}}">{{$lever1->category_name}}</option>
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th>Size</th>
                                <th >
                                    <div class="row">
                                        <div class="col-md-2">S<input type="number" name="S" value="1000"></div>
                                        <div class="col-md-2">M<input type="number" name="M" value="1000"></div>
                                        <div class="col-md-2">L<input type="number" name="L" value="1000"></div>
                                        <div class="col-md-2">XL<input type="number" name="XL" value="1000"></div>
                                        <div class="col-md-2">XXL<input type="number" name="XXL" value="1000"></div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>Publish</th>
                                <th>
                                    <select name="publish">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>

                                </th>
                            </tr>
                            <tr>
                                <th>New</th>
                                <th>
                                    <select name="new">
                                        <option value="1">New</option>
                                        <option value="0">Old</option>
                                    </select>

                                </th>
                            </tr>
                            <tr>
                                <th>price</th>
                                <th>
                                    <input type="text" name="price" class="form-control" value="100000">
                                </th>
                            </tr>
                            <tr>
                                <th>Sale price</th>
                                <th>
                                    <input type="text" name="sale_price" class="form-control" value="99000">
                                </th>
                            </tr>
                            <tr>
                                <th>Ordering</th>
                                <th>
                                    <input type="text" name="ordering" class="form-control" value="1">
                                </th>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <th>
                                    <textarea class="form-control" name="description">1</textarea>
                                </th>
                            </tr>
                            <tr>
                                <th>Full description</th>
                                <th>
                                    <textarea class="form-control" id="full_description" name="full_description">1</textarea>
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        {{csrf_field()}}
                    </form>
                    <script type="text/javascript">
                        //CKEDITOR.replace( 'full_description' );
                    </script>
                </div>
            </div>
        </div>
    </div>


@endsection