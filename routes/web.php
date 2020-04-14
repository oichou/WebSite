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
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/{id}', 'ProductsController@show')->name('products.show');
Route::get('/overview','UserPanelController@index')->name('overview');
Route::get('/profile','UserPanelController@getProfile')->name('profile');
Route::get('/orders','UserPanelController@getOrders')->name('orders');
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index');

Route::get('/cart/{product}', 'CartController@addProduct')->name('cart.addProduct');

Auth::routes();
