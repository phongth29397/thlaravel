@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thêm Danh Sách</font></font></h6>
                </div>
                <div class="card-body">
                            <div class="view-edit-category">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('post-them-category')}}" method="post"  enctype="multipart/form-data">
                                    <table class="table  table-bordered">
                                        <tr>
                                            <th>Category name</th>
                                            <td><input type="text" class="form-control" name="category_name"></td>
                                        </tr>
                                        <tr>
                                            <th>Parent</th>
                                            <td>
                                                <select name="parent" id="parent">
                                                    <option value="">Root</option>
                                                    @foreach($list_root_category as $category)
                                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Lever1</th>
                                            <td>
                                                <select name="lever1">
                                                    <option value="">Root</option>
                                                    @foreach($list_lever1 as $lever1)
                                                        <option style="display: none" id='asd' class="a{{$lever1->parent}}" value="{{$lever1->id}}">{{$lever1->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Image</th>
                                            <td><input type="file" name="image_category" class="form-control" value=""></td>
                                        </tr>
                                        <tr>
                                            <th>ordering</th>
                                            <td><input type="text" name="ordering" class="form-control" value="1"></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>
                                                <textarea name="description" class="form-control">1</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="pull-right">
                                                    <button class="btn btn-primary" type="submit">Save</button>
                                                    <a class="btn btn-primary" href="{{route('list-danh-muc')}}">Cancel</a>
                                                </div>

                                            </td>
                                        </tr>
                                    </table>
                                    {{csrf_field()}}
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#parent').on('change', function() {
                @foreach($list_root_category as $category)
                if ($(this).val()=='{{$category->id}}')
                {
                    @foreach($list_lever1 as $lever1)
                    $(".a{{$lever1->parent}}").css("display", "none");
                    @endforeach
                    $(".a{{$category->id}}").css("display", "block");
                }
                ;
                @endforeach
            });
            $('#parent').on('change', function() {
                if ($(this).val()=='')
                {
                    @foreach($list_lever1 as $lever1)
                    $(".a{{$lever1->parent}}").css("display", "none");
                    @endforeach
                }
                ;

            });
        });
    </script>
@endsection
