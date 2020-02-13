<?php

namespace App\Http\Controllers\Admin;
use App\Carouselslide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarouselslideController extends Controller
{
    function getAllCarouselslide()
    {

        $Carouselslide = Carouselslide::orderBy('id')->where('id','!=',1)->get();
        $Carouselslide1=Carouselslide::orderBy('id')->where('id','=',1)->get();/*video 34 phust 48:001*/
        return view('admin.Carouselslide.liss_carouselslide', compact('Carouselslide','Carouselslide1'));
    }

    function addCarouselslide()
    {
        return view('admin.Carouselslide.add_carouselslide');
    }

    function postaddcarouselslide(Request $request)
    {
        $post = $request->all();
        $request->validate([
            'image' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);
        $CarouselslideModel = new Carouselslide();
        $CarouselslideModel->image = $post['image'];
        $CarouselslideModel->description = $post['description'];
        $CarouselslideModel->full_description = $post['full_description'];
        if ($CarouselslideModel->save()) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $random = random_int(10000, 99999);
                $file->move('upload/category', $random . $file->getClientOriginalName());
                $CarouselslideModel->image = "upload/category/" . $random . $file->getClientOriginalName();
                $CarouselslideModel->save();
            }
        }
        return redirect(route('list-carousel-slide'));
    }

    function editcarouselslide($id,Request $request)
    {

        $Carouselslide = Carouselslide::find($id);
        return view('admin.Carouselslide.editcarouselslide', compact('Carouselslide'));
    }

    function postEditcarouselslide($id,Request $request)
    {
        $post = $request->all();
        $request->validate([
            'image' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);
        $CarouselslideModel = Carouselslide::find($id);
        $CarouselslideModel->description = $post['description'];
        $CarouselslideModel->full_description = $post['full_description'];
        if ($CarouselslideModel->save()) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $random = random_int(10000, 99999);
                $file->move('upload/category', $random . $file->getClientOriginalName());
                $CarouselslideModel->image = "upload/category/" . $random . $file->getClientOriginalName();
                $CarouselslideModel->save();
            }
        }
        return redirect(route('list-carousel-slide'));
    }
    function getDeleteCarouselslide($id,Request $request){

        $category=Carouselslide::find($id);
        $category->delete();
        return redirect(route('list-carousel-slide'));
    }
}
