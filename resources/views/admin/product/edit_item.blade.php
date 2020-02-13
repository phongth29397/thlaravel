@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">EDIT Sản PHẩm</font></font></h6>
                </div>
                <div class="card-body">
                    <div class="view-edit-product">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('post-sua-san-pham',$product->id)}}" method="post" enctype="multipart/form-data">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Product name</th>
                                    <th><input type="text" class="form-control" value="{{$product->product_name}}" name="product_name"></th>
                                </tr>
                                <tr>
                                    <th>Product image intro</th>
                                    <th>
                                        <img class="product-image-intro-edit" src="{{url('/')}}/{{$product->product_image_intro}}">
                                        <input type="file" class="form-control" name="product_image_intro">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Category</th>
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
                                            <div class="col-md-2">S<input type="number" name="S" value="{{$product->S}}"></div>
                                            <div class="col-md-2">M<input type="number" name="M" value="{{$product->M}}"></div>
                                            <div class="col-md-2">L<input type="number" name="L" value="{{$product->L}}"></div>
                                            <div class="col-md-2">XL<input type="number" name="XL" value="{{$product->XL}}"></div>
                                            <div class="col-md-2">XXL<input type="number" name="XXL" value="{{$product->XXL}}"></div>
                                        </div>
                                    </th>
                                </tr>

                                <tr>
                                    <th>Publish</th>
                                    <th>

                                        <select name="publish">
                                            <option     <?php echo $product->publish==1?' selected ':'' ?> value="1">Yes</option><?php echo $product->publish==0?' selected ':'' ?> value="0">No</option>
                                            <option     <?php echo $product->publish==0?' selected ':'' ?> value="0">No</option> <?php echo $product->publish==1?' selected ':'' ?> value="1">Yes</option>
                                        </select>

                                    </th>
                                </tr>
                                <tr>
                                    <th>New</th>
                                    <th>

                                        <select name="new">
                                            <option     <?php echo $product->new==1?' selected ':'' ?> value="1">Yes</option><?php echo $product->new==0?' selected ':'' ?> value="0">Old</option>
                                            <option     <?php echo $product->new==0?' selected ':'' ?> value="0">No</option> <?php echo $product->new==1?' selected ':'' ?> value="1">New</option>
                                        </select>

                                    </th>
                                </tr>
                                <tr>
                                    <th>price</th>
                                    <th>
                                        <input type="text" name="price" value="{{$product->price}}" class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Sale price</th>
                                    <th>
                                        <input type="text" name="sale_price" value="{{$product->sale_price}}" class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Ordering</th>
                                    <th>
                                        <input type="text" name="ordering" value="{{$product->ordering}}" class="form-control">
                                    </th>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <th>
                                        <textarea class="form-control" name="description">{{$product->description}}</textarea>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Full description</th>
                                    <th>
                                        <textarea class="form-control" id="full_description" name="full_description">{{$product->full_description}}</textarea>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <a href="{{route('danh-sach-san-pham')}}" class="btn btn-primary">Cancel</a>
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
    </div>


@endsection