<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categories;
use Session;
class CategoryController extends Controller

{


    function getListCategory()
    {

        $categories = categories::orderBy('id', 'DESC')->get();

        return view('admin.category.list_category', compact('categories'));
    }

    /**/
    function getAddCategory()
    {
        $list_root_category=DB::table("Categories")->where('parent','=',null)->get();/*video 34 phust 48:00*/

        $list_sub_category=DB::table("Categories")->where('parent','!=',null)->get();/*video 34 phust 48:00*/
        $list_lever1=DB::table("Categories")->where('lever1','=',null )->where('parent','!=',null)->get();/*video 34 phust 48:00*/

        return view('admin.category.add_category',compact('list_root_category','list_sub_category','list_lever1'));
    }
    /**/

    /**/
    function postaddCategory(Request $request)
    {
        $post = $request->all();
        if ($post['parent'] == null)
        {
            $post['lever1']=null;
        }
        $request->validate([
            'category_name' => 'required|unique:Categories|max:255',
           // 'image_category' => 'required',
            'ordering' => 'required',
            'description' => 'required',
        ]);
        $categoriModel = new Categories();
        $categoriModel->category_name = $post['category_name'];
        //$categoriModel->image_category = $post['image_category'];
        $categoriModel->ordering = $post['ordering'];
        $categoriModel->description = $post['description'];
        $categoriModel->parent = $post['parent'];
        $categoriModel->lever1 = $post['lever1'];
        $categoriModel->published = 1;
        $categoriModel->save();
        //if ($categoriModel->save()) {
        //    if ($request->hasFile('image_category')) {
        //        $file = $request->image_category;
         //       // nếu cần validate file upload lên thì sử dụng mấy biến này
         //       $file_name = $file->getClientOriginalName();
          //      $extension_file = $file->getClientOriginalExtension();
         //       $temp_file = $file->getRealPath();
          //      $file_size = $file->getSize();
          //      $file_type = $file->getMimeType();
          //      $random = random_int(10000, 50000);
          //      $file->move('upload/category', $random . $file->getClientOriginalName());
          //      $categoriModel->image_category = "upload/category/" . $random . $file->getClientOriginalName();
          //     $categoriModel->save();
           // }
        //}
        Session::flash('message', 'Bạn đã thêm thành công, cám ơn bạn');
        return redirect(route('list-danh-muc'));
    }
    /**/

    /**/
    function getEditCategory($id, Request $request)
    {
        $category = Categories::find($id);
        $list_root_category=DB::table("Categories")->where('parent','=',null)->get();

        return view('admin.category.edit_category', compact('category','list_root_category'));
    }
    /**/

    /**/
    function postEditCategory($id, Request $request)
    {
        $post = $request->all();

        $request->validate([
            'category_name' => 'required|unique:categories,id|max:255',
            'ordering' => 'required',
            'description' => 'required'
        ]);
        $categoriModel = Categories::find($id);
        $categoriModel->category_name = $post['category_name'];
        $categoriModel->ordering = $post['ordering'];
        $categoriModel->parent = $post['parent'];
        $categoriModel->description = $post['description'];
        if ($categoriModel->save()) {
            if ($request->hasFile('image_category')) {
                $file = $request->image_category;
                $random = random_int(10000, 99999);
                $file->move('upload/category', $random . $file->getClientOriginalName());
                $categoriModel->image_category = "upload/category/" . $random . $file->getClientOriginalName();
                $categoriModel->save();

            }


        }
        return redirect(route('list-danh-muc'));
    }
    /**/
    function getDeleteCategory($id,Request $request){
        $category=Categories::find($id);
        $category->delete();
        return redirect(route('list-danh-muc'));
    }
    /**/
}
