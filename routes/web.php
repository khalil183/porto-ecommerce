<?php
use Illuminate\Support\Facades\Route;



// custom user login and registration
Route::get('login','Auth\LoginController@userLoginFrom')->name('login');
Route::post('login','Auth\LoginController@userLogin')->name('login');
Route::get('register','Auth\RegisterController@showRegisterForm')->name('register');
Route::post('register','Auth\RegisterController@userRegister')->name('register');
Route::get('verify/{token}','Auth\EmailVerifiedController@verify')->name('verify');
Route::get('logout','Auth\LoginController@logout')->name('logout');


// website content
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/details/{slug}','HomeController@productDetails')->name('product.details');


// Shopping Cart
Route::get('/cart','CartController@index')->name('cart');
Route::post('/store/cart','CartController@store')->name('store.cart');
Route::post('/update/cart','CartController@update')->name('update.cart');
Route::get('/destroy/cart/item/{rowId}','CartController@destroy')->name('destroy.cart.item');
Route::get('/destroy/cart/','CartController@allDestroy')->name('destroy.cart');

// Checkout
Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout/store','CheckoutController@store')->name('checkout.store');

//User Profile
Route::group(['as'=> 'user.', 'prefix' => 'user'],function (){
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::post('update/profile/','ProfileController@update')->name('update.profile');

    // manage order
    Route::get('/order','ProfileController@order')->name('order');
    Route::get('/order/show/{orderId}','ProfileController@orderShow')->name('order.show');

    // manage user wishlist
    Route::get('wishlist','WishlistController@index')->name('wishlist');
    Route::get('wishlist/store/{id}','WishlistController@store')->name('wishlist.store');
    Route::get('wishlist/destroy/{id}','WishlistController@destroy')->name('wishlist.destroy');

    // product Review
    Route::get('product/review/{productId}','ReviewController@store')->name('product.review');
});




// admin route
Route::group(['as'=> 'admin.', 'namespace' => 'Admin', 'prefix' => 'admin'],function (){

    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::get('/login','Auth\LoginController@showAdminLoginForm')->name('login');
    Route::post('/login','Auth\LoginController@storeLoginInfo')->name('login');
    Route::get('/logout','Auth\LoginController@adminLogout')->name('logout');

    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');

    Route::get('order','OrderController@index')->name('order');
    Route::get('order/show/{orderId}','OrderController@show')->name('order.show');
    Route::get('order/accept/{orderId}','OrderController@orderAccept')->name('order.accept');
    Route::get('order/cancel/{orderId}','OrderController@orderCancel')->name('order.cancel');

    Route::get('review','ReviewController@index')->name('review');
    Route::get('review/approve/{id}','ReviewController@approve')->name('review.approve');
    Route::get('review/deny/{id}','ReviewController@deny')->name('review.deny');



});
