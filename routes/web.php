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



Route::get('/product_detail', function () {
    return view('product_detail');
});
Route::get('login', function () {
    return view('regiter_login');
});

Route::any('/', 'HomeController@home');
Route::get('/user_add', 'UserController@user_add');
Route::get('/web', 'WebController@index');
Route::any('/category-id/{id}', 'HomeController@getProductById');
Route::any('/category-id/{id}/{slug}', 'HomeController@getProductById');
Route::get('/product-detail/{id}', 'HomeController@productDetail');

Route::post('/login', 'UserController@login');
Route::any('/register', 'UserController@user_add');

Route::any('/logout', 'UserController@logout');

Route::get('/cart', 'UserController@cart');
Route::get('/remove_cart_item/{id}', 'UserController@removeCartItem');
Route::get('/addtowishlistmsg', 'UserController@addtowishlistmsg');
Route::get('/addtocart/{id}', 'UserController@addToCart');
Route::get('/login-register', 'UserController@login_page');


Route::group([ 'middleware' => 'auth'], function() {
    Route::get('/wishlist', 'UserController@wishlist');
    Route::get('/friend_wishlist', 'UserController@friendWishlist');
    Route::get('/remove_wishlist_item/{id}', 'UserController@removeWishlistItem');

    Route::any('/share_wishlist', 'UserController@shareWishlist');
    Route::get('/addtowishlist/{id}', 'UserController@addtowishlist');
});




