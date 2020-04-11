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

Route::get('/', function () {
    return view('home');
});
Route::get('admin', function () {
    return view('admin');
});
Route::get('/categories', function () {
    return view('categories');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/check', function () {
    return view('check');
});
Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/categories', 'HomeController@categories')->name('categories');

Auth::routes();

Route::get('/product', 'HomeController@product')->name('product');

Auth::routes();

Route::get('/cart', 'HomeController@cart')->name('cart');

Auth::routes();

Route::get('/check', 'HomeController@check')->name('check');

Auth::routes();

Route::get('/check', 'HomeController@contact')->name('contact');
