<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
class ProductController extends Controller
{
    //
    public function getDetailProduct($id,Request $request){
        $products=Products::find($id);
        return view('product_detail',compact('products'));
    }
}
