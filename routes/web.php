<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/{id}', 'ProductsController@show')->name('products.show');
<<<<<<< HEAD
=======
Route::get('/overview','UserPanelController@index')->name('overview');
Route::get('/profile','UserPanelController@getProfile')->name('profile')->middleware('auth');;
Route::get('/orders','UserPanelController@getOrders')->name('orders');
Route::get('profile.fname', 'UserPanelController@updatefName')->name('profile.fname');
Route::get('profile.lname', 'UserPanelController@updatelName')->name('profile.lname');
Route::get('profile.email', 'UserPanelController@updateEmail')->name('profile.email');
Route::get('profile.phone', 'UserPanelController@updatePhone')->name('profile.phone');
Route::get('profile.birth', 'UserPanelController@updateBirth')->name('profile.birth');
Route::get('profile.username', 'UserPanelController@updateUsername')->name('profile.username');

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');

Route::get('/admin','AdminController@index')->name('admin.index');
Route::get('/table','AdminController@showtable')->name('admin.showtable');
>>>>>>> 81b105b89e5c76ec1ba7196b8c6968396874f6d2

Route::get('/overview','UserPanelController@index')->name('overview')->middleware('auth');
Route::get('/profile','UserPanelController@getProfile')->name('profile')->middleware('auth');
Route::get('/orders','UserPanelController@getOrders')->name('orders')->middleware('auth');

Route::get('/admin','AdminController@index')->name('admin.index');
Route::get('/admin/{table}','AdminController@showtable')->name('admin.showtable');
Route::get('/admin/removefrom/{table}/{id}','AdminController@removefrom')->name('admin.removefrom');
Route::post('/product/discount','AdminController@productdiscount')->name('admin.productdiscount');
Route::get('/newproduct',function(){
  return view('newproduct');
})->name('newproduct');

Route::post('/newproduct','ProductController@create')->name('product.create');

Route::post('/cart/discount','CartController@discount')->name('cart.discount');
Route::post('/cart/change','CartController@changequantity')->name('cart.changequantity');
// List articles

Route::get('/cart', 'CartController@index')->name('cart.index');

//add article to the carte
Route::get('/cart/{product}', 'CartController@addProduct')->name('cart.addProduct');

//remove an article from the cart
Route::delete('/cart/{product}', 'CartController@removeProduct')->name('cart.removeProduct');
// this is the probleme i cant do both add and remove with the same url
Auth::routes();
