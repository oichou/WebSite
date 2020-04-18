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
Route::get('profile.fname', 'UserPanelController@updatefName')->name('profile.fname');
Route::get('profile.lname', 'UserPanelController@updatelName')->name('profile.lname');
Route::get('profile.email', 'UserPanelController@updateEmail')->name('profile.email');
Route::get('profile.phone', 'UserPanelController@updatePhone')->name('profile.phone');
Route::get('profile.birth', 'UserPanelController@updateBirth')->name('profile.birth');
Route::get('profile.username', 'UserPanelController@updateUsername')->name('profile.username');

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index');

Route::get('/cart/{product}', 'CartController@addProduct')->name('cart.addProduct');
Route::get('/cart/remove/{product}', 'CartController@removeProduct')->name('cart.removeProduct');
// this is the probleme i cant do both add and remove with the same url
Auth::routes();
