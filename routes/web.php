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
Route::get('/overview','UserPanelController@index')->name('overview');
Route::get('/profile','UserPanelController@getProfile')->name('profile')->middleware('auth');;
Route::get('/orders','UserPanelController@getOrders')->name('orders');
Route::get('/admin','AdminController@index')->name('admin.index');
Route::get('/table','AdminController@showtable')->name('admin.showtable');


Route::post('/cart/discount','CartController@discount')->name('cart.discount');
Route::post('/product/discount','AdminController@productdiscount')->name('admin.productdiscount');


Route::post('/cart/change','CartController@changequantity')->name('cart.changequantity');
// List articles
Route::get('/cart', 'CartController@index')->name('cart.index');

//add article to the carte
Route::get('/cart/{product}', 'CartController@addProduct')->name('cart.addProduct');

//remove an article from the cart
Route::delete('/cart/{product}', 'CartController@removeProduct')->name('cart.removeProduct');
// this is the probleme i cant do both add and remove with the same url
Auth::routes();
