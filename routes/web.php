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
Auth::routes(['verified'=> 'true']);

Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/dashboard','AdminController@index');
    Route::resource('/category','CategoryController');
    Route::resource('/tag','TagController');
    Route::resource('/brand','BrandController');
    Route::resource('/product','ProductController');
    Route::resource('/role','RoleController');
    Route::resource('/post','PostController');
    Route::resource('/subscriber','SubscriberController');
});

Route::namespace('Author')->group(function () {
    Route::get('author/dashboard', 'DashoardController@index');
    Route::resource('/post','PostController');
    Route::get('/', 'FrontendController@index');
    Route::get('/products/all','FrontendController@products');
    Route::get('/product/details/{id}', 'FrontendController@product_detail');
    Route::get('/product/wishlist', 'FrontendController@wishlist');
    Route::post('/add_to_cart','CartController@addCart');
    Route::get('/showCart','CartController@showCart');
    Route::get('/cart/delete/{id}','CartController@carDelete');
    Route::post('cart/update/{id}','CartController@cartUpdate');
    Route::get('/product/checkout', 'FrontendController@checkout');
    Route::get('/blog', 'FrontendController@blog');
    Route::get('/blog_single','FrontendController@blog_single');
    Route::get('/about','FrontendController@about');
    Route::get('/contact','FrontendController@contact');
    Route::post('/subscriber', 'SubscriberController@store')->name('subscriber.store');
});




