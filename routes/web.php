<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@indexadmin')->name('admin');
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');


Route::get("product-detail/{id}",['as'=>'product-detail','uses'=>"ProductController@getDetailProduct"]);

Route::post("add-to-cart/{id}",['as'=>'add-to-cart','uses'=>"CartController@postAddTocart"]);
Route::get("thanh-toan",['as'=>'thanh-toan','uses'=>"CartController@payNow"]);

Route::post("update-cart",['as'=>'update-cart','uses'=>"CartController@updateCart"]);
Route::get("danh-muc/{id}",['as'=>'danh-muc','uses'=>"HomeController@parent"]);
Route::get("lever1/{id}",['as'=>'lever1','uses'=>"HomeController@lever1"]);
Route::post("thanh-toan",['as'=>'thanh-toan','uses'=>"CartController@postpayNow"]);
Route::post("remove-item-cart/{rowid}",['as'=>'remove-item-cart','uses'=>"CartController@removeItemCart"]);
//TODO Sua dang nhap
Route::get("dang-nhap",['as'=>'dang-nhap','uses'=>"HomeController@dangnhap"]);
//TODO Sua tim kiem
Route::post("tim-kiem",['as'=>'tim-kiem','uses'=>"CartController@removeItemCart"]);
//TODO Sua gioi-thieu
Route::post("gioi-thieu",['as'=>'gioi-thieu','uses'=>"CartController@removeItemCart"]);
//TODO Sua lien-he
Route::post("lien-he",['as'=>'lien-he','uses'=>"CartController@removeItemCart"]);

Route::get("gio-hang/",['as'=>'gio-hang','uses'=>"CartController@index"]);

Route::get("new",['as'=>'new','uses'=>"HomeController@new"]);
Route::get("sale",['as'=>'sale','uses'=>"HomeController@sale"]);
Route::get("donhang/{email}",['as'=>'donhang','uses'=>"HomeController@donhang"]);
Route::get("donhang/{email}",['as'=>'donhang','uses'=>"HomeController@donhang"]);
Route::get("see-order/{id}",['as'=>'see-order','uses'=>"HomeController@seeorder"]);


Route::group(['prefix'=>'admin','namespace'=>"Admin"],function(){
    Route::group(['prefix' => 'san-pham'], function () {
        //root/admin/san-pham/danh-sach
        Route::get("danh-sach",['as'=>'danh-sach-san-pham','uses'=>"ProductController@getListProduct"]);
        //root/admin/san-pham/them
        Route::get("them", ['as' => 'them-san-pham', 'uses' => 'ProductController@getAddProduct']);
        //root/admin/san-pham/them
        Route::post("them", ['as' => 'post-add-product', 'uses' => 'ProductController@postAddProduct']);
        //root/admin/san-pham/sua-san-pham/3
        Route::get("sua-san-pham/{id}", ['as' => 'sua-san-pham', 'uses' => 'ProductController@getEditProduct']);
        //root/admin/san-pham/sua-san-pham/3
        Route::post("sua-san-pham/{id}", ['as' => 'post-sua-san-pham', 'uses' => 'ProductController@postEditProduct']);

        Route::get("xoa-san-pham/{id}", ['as' => 'xoa-san-pham', 'uses' => 'ProductController@getDeleteProduct']);
    });
    //root/admin/danh-muc
    Route::group(['prefix' => 'danh-muc'], function () {
        //root/admin/danh-muc/list-danh-muc
        Route::get("list-danh-muc",['as'=>'list-danh-muc','uses'=>"CategoryController@getListCategory"]);
        //root/admin/danh-muc/them-danh-muc
        Route::get("them", ['as' => 'them-danh-muc', 'uses' => 'CategoryController@getAddCategory']);
        //root/admin/danh-muc/them-danh-muc
        Route::get("sua-danh-muc/{id}", ['as' => 'sua-danh-muc', 'uses' => 'CategoryController@getEditCategory']);
        //root/admin/danh-muc/xoa-danh-muc
        Route::get("xoa-danh-muc/{id}", ['as' => 'xoa-danh-muc', 'uses' => 'CategoryController@getDeleteCategory']);

        //root/admin/danh-muc/post-them-category
        Route::post('post-them-category',['as'=>"post-them-category",'uses'=>'CategoryController@postaddCategory']);
        //root/admin/post-edit-category
        Route::post('post-edit-category/{id}',['as'=>"post-edit-category",'uses'=>'CategoryController@postEditCategory']);
    });

    Route::group(['prefix' => 'don-hang'], function () {
        //root/admin/don-hang/list-don-hang
        Route::get("list-don-hang",['as'=>'list-don-hang','uses'=>"OrderController@getAllOrder"]);

        //root/admin/don-hang/chi-tiet-don-hang
        Route::get("chi-tiet-don-hang/{id}",['as'=>'chi-tiet-don-hang','uses'=>"OrderController@getOrderDetail"]);

        Route::get("edit-order/{id}",['as'=>'edit-order','uses'=>"OrderController@editorder"]);

        Route::post("update-order/{id}",['as'=>'post-edit-order','uses'=>"OrderController@updateOrder"]);

        Route::post("edit/{id}",['as'=>'edit','uses'=>"OrderController@ppp"]);




    });

    Route::group(['prefix' => 'carousel-slide'], function () {
        http://localhost/th_laravel1/public/admin/carousel-slide/list-carousel-slide
        Route::get("list-carousel-slide",['as'=>'list-carousel-slide','uses'=>"CarouselslideController@getAllCarouselslide"]);

        Route::get("Add-Carouselslide",['as'=>'Add-Carouselslide','uses'=>"CarouselslideController@addCarouselslide"]);

        Route::post('post-them-carouselslide',['as'=>"post-them-carouselslide",'uses'=>'CarouselslideController@postaddcarouselslide']);

        Route::get('sua-carouselslide/{id}',['as'=>"sua-carouselslide",'uses'=>'CarouselslideController@editcarouselslide']);

        Route::post('post-edit-carouselslide/{id}',['as'=>"post-edit-carouselslide",'uses'=>'CarouselslideController@postEditcarouselslide']);

        Route::get("xoa-carouselslide/{id}",['as'=>'xoa-carouselslide','uses'=>"CarouselslideController@getDeleteCarouselslide"]);






    });
});

