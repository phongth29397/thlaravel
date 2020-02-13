@extends('admin.layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Edit Danh Sách</font></font></h6>
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
                        <form action="{{route('post-edit-carouselslide',$Carouselslide->id)}}" method="post"  enctype="multipart/form-data">

                            <table class="table  table-bordered">
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        <img class="image-categoy-edit" src="{{url('/')}}/{{$Carouselslide->image}}"/>
                                        <input type="file" name="image" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>
                                        <textarea name="description" class="form-control">{{$Carouselslide->description}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Full_Description</th>
                                    <td>
                                        <textarea name="full_description" class="form-control">{{$Carouselslide->full_description}}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="pull-right">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a class="btn btn-primary" href="{{route('list-carousel-slide')}}">Cancel</a>
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
@endsection



