<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/details/{slug}','HomeController@productDetails')->name('product.details');

// Shopping Cart
Route::get('cart','CartController@index')->name('cart');
Route::post('/store/cart','CartController@store')->name('store.cart');
Route::post('/update/cart','CartController@update')->name('update.cart');
Route::get('/destroy/cart/item/{rowId}','CartController@destroy')->name('destroy.cart.item');
Route::get('/destroy/cart/','CartController@allDestroy')->name('destroy.cart');


Route::get('/admin/dashboard','Admin\AdminController@index')->name('admin.index');

Route::get('/admin/login','Admin\Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login','Admin\Auth\LoginController@storeLoginInfo')->name('admin.login');
Route::get('/admin/logout','Admin\Auth\LoginController@adminLogout')->name('admin.logout');

Route::group(['as'=> 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'],function (){

    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::get('/login','Auth\LoginController@showAdminLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@storeLoginInfo')->name('login');
    Route::get('/logout','Auth\LoginController@adminLogout')->name('logout');

    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');

});
