<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


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
