<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\products;
//todo use App\products; phải có file Providers trùng tên với bảng trogn databay mới gọi được bảng ở đây là Providers/Products.php
class ProductController extends Controller
{


    function getListProduct()
    {
        $products = products::orderBy('id', 'DESC')->get();
        return view('admin.product.list_product', compact('products'));
    }

    function getAddProduct()
    {

        /*$list_sub_category=DB::table("Categories")->where('parent','!=',null)->get();*//*video 34 phust 48:00*/
        $list_lever1=DB::table("Categories")->where('parent','!=',null)->where('lever1','!=',null)->get();/*video 34 phust 48:001*/

        return view('admin.product.add_new_item',compact('list_lever1'));
    }
/**/
    function postAddProduct(Request $request){
        $post = $request->all();
        $category_lever1=DB::table("Categories")->where('id','=',$post['category_id'])->value('lever1');
         /*
        $category_lever2=DB::table("Categories")->where('id','=',$post['category_id'])->get();
        foreach ($category_lever1 as $user) {
        }

        $productModel = new products();
        $productModel->category_lever1 = $user->lever1;*/

        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'ordering' => 'required',
            //TODO lat nua phai lam upload product
            'product_image_intro' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);

        $productModel = new products();
        $productModel->product_name = $post['product_name'];
        $productModel->category_id = $post['category_id'];
        $productModel->category_lever1 = $category_lever1;
        $productModel->S = $post['S'];
        $productModel->M = $post['M'];
        $productModel->L = $post['L'];
        $productModel->XL = $post['XL'];
        $productModel->XXL = $post['XXL'];
        $productModel->total_size = $post['S']+$post['M']+$post['L']+$post['XL']+$post['XXL'];
        $productModel->publish = $post['publish'];
        $productModel->new = $post['new'];
        $productModel->price = $post['price'];
        $productModel->sale_price = $post['sale_price'];
        $productModel->ordering = $post['ordering'];
        $productModel->description = $post['description'];
        $productModel->full_description = $post['full_description'];
        $productModel->created_at = date('Y-m-d H:i:s');
        $productModel->updated_at = date('Y-m-d H:i:s');
        if ($productModel->save()) {
            if ($request->hasFile('product_image_intro')) {
                $file = $request->product_image_intro;
                // nếu cần validate file upload lên thì sử dụng mấy biến này
                $file_name = $file->getClientOriginalName();
                $extension_file = $file->getClientOriginalExtension();
                $temp_file = $file->getRealPath();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $random = random_int(10000, 50000);
                $file->move('upload/products', $random . $file->getClientOriginalName());
                $productModel->product_image_intro = "upload/products/" . $random . $file->getClientOriginalName();
                $productModel->save();
            }
        }
        return redirect(route('danh-sach-san-pham'));
    }
 /**/
    function getEditProduct($id){
        $product=products::find($id);
        $list_lever1=DB::table("Categories")->where('parent','!=',null)->where('lever1','!=',null)->get();/*video 34 phust 48:001*/
        return view('admin.product.edit_item',compact('product','list_lever1'));
    }

    /**/
    function postEditProduct($id,Request $request){
        $post=$request->all();
        $request->validate([
            'product_name' => 'required|unique:products,id|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'ordering' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);
        $productModel=Products::find($id);
        $productModel->product_name=$post['product_name'];
        $productModel->category_id=$post['category_id'];
        $productModel->publish=$post['publish'];
        $productModel->new=$post['new'];
        $productModel->S = $post['S'];
        $productModel->M = $post['M'];
        $productModel->L = $post['L'];
        $productModel->XL = $post['XL'];
        $productModel->XXL = $post['XXL'];
        $productModel->total_size = $post['S']+$post['M']+$post['L']+$post['XL']+$post['XXL'];
        $productModel->price=$post['price'];
        $productModel->sale_price=$post['sale_price'];
        $productModel->ordering=$post['ordering'];
        $productModel->description=$post['description'];
        $productModel->full_description=$post['full_description'];
        $productModel->created_at=date('Y-m-d H:i:s');
        $productModel->updated_at=date('Y-m-d H:i:s');
        if($productModel->save()){
            if ($request->hasFile('product_image_intro')) {
                $file = $request->product_image_intro;
                // nếu cần validate file upload lên thì sử dụng mấy biến này
                $file_name=$file->getClientOriginalName();
                $extension_file=$file->getClientOriginalExtension();
                $temp_file=$file->getRealPath();
                $file_size=$file->getSize();
                $file_type=$file->getMimeType();
                $random=random_int(10000,50000);
                $file->move('upload/productssssss', $random.$file->getClientOriginalName());
                $productModel->product_image_intro="upload/products/".$random.$file->getClientOriginalName();
                $productModel->save();
            }
        }
        return redirect(route('danh-sach-san-pham'));
    }

    /**/
    function getDeleteProduct($id,Request $request){
        $category=products::find($id);
        $category->delete();
        return redirect(route('danh-sach-san-pham'));
    }
    /**/
}
