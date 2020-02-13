<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Orders;
use App\products;
use App\Order_product;
use App\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class OrderController extends Controller
{
    function getAllOrder(Request $request)
    {
        $orders = DB::table('Orders')->leftJoin('customers', 'customers.id', '=', 'Orders.customer_id')->orderByRaw('customer_id DESC')->get();

        return view('admin.order.list_order',compact('orders'));
    }
    function getOrderDetail($id,Request $request)
    {
        $order=Orders::find($id);//dùng thẻ này thì không cần forech
        $order_product=DB::table("Order_product")->where('order_id','=',$id)->get();
        $customers=customers::find($id);//dùng thẻ này thì không cần forech


        $list_product=Orders::getAllProductByOrderId($id);

        return view('admin.order.detail',compact('order','list_product','order_product','customers'));
    }
    function updateOrder($id,Request $request){

        $post=$request->all();
        $status=$post['status'];
        $order=Orders::find($id);
        $order->status=$status;
        $order->save();
        Session::flash('message', 'Bạn đã cập nhật thành công, cám ơn bạn');
        $list_product=Orders::getAllProductByOrderId($id);
        $customers=customers::find($id);//dùng thẻ này thì không cần forech
        return view('admin.order.detail',compact('order','list_product','customers'));
    }
    function editorder($id,Request $request){
        $order_product=DB::table("Order_product")->where('order_id','=',$id)->get();
        $selected_product=DB::table("products")->get();
        $customers=customers::find($id);


        return view('admin.order.edit_order',compact('order_product','selected_product','customers'));
    }

    function ppp($id,Request $request){

        $post=$request->all();
        unset($post['_token']); /* xóa 1 phần tử khỏi mảng */
        /*   Array
                    (
                    [2] => Array
                        (
                            [id] => Sản Phẩm 3
                            [product_qty] => 9
                        )

                    [3] => Array
                        (
                            [id] => Sản Phẩm 4
                            [product_qty] => 8
                        )

                )*/
        foreach($post as $k => $v){
        $order_product=Order_product::find($k);
        $order_product->product_name=$v['id'];
        $order_product->product_qty=$v['product_qty'];
        $order_product->save();
        }

        /*print_r(($post['acb2']),false);*/
        $order_product=DB::table("Order_product")->where('order_id','=',$id)->get();
        $selected_product=DB::table("products")->get();
        $customers=customers::find($id);


        return view('admin.order.edit_order',compact('order_product','selected_product','customers'));
    }
}
