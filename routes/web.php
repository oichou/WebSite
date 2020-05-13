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
Route::get('/checkout', 'CheckoutController@index')->name('checkout')->middleware('auth');

  // Routes for the contact page

Route::get('/contact', 'contactController@index')->name('contact');
Route::post('/sendemail/send', 'contactController@send');


Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/offers', 'ProductsController@offers')->name('offers');
Route::get('/products/{id}', 'ProductsController@show')->name('products.show');

  // Routes for the UserPanel Page
Route::get('/overview','UserPanelController@index')->name('overview')->middleware('auth');
Route::get('/profile','UserPanelController@getProfile')->name('profile')->middleware('auth');
Route::get('/orders','UserPanelController@getOrders')->name('orders')->middleware('auth');
Route::get('profile.fname', 'UserPanelController@updatefName')->name('profile.fname')->middleware('auth');
Route::get('profile.lname', 'UserPanelController@updatelName')->name('profile.lname')->middleware('auth');
Route::get('profile.email', 'UserPanelController@updateEmail')->name('profile.email')->middleware('auth');
Route::get('profile.phone', 'UserPanelController@updatePhone')->name('profile.phone')->middleware('auth');
Route::get('profile.birth', 'UserPanelController@updateBirth')->name('profile.birth')->middleware('auth');
Route::get('profile.username', 'UserPanelController@updateUsername')->name('profile.username')->middleware('auth');

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth');

Route::get('/outofstock', function () {
    return view('errors/outofstock');
});

Route::get('error/{whichone}','ErrorController@index')->name('error')->middleware('auth');

Route::get('/admin','AdminController@index')->name('admin.index')->middleware('auth');
Route::get('/table','AdminController@showtable')->name('admin.showtable')->middleware('auth');

Route::get('/addressform/{for}','AdressController@form')->name('adress.form')->middleware('auth');
Route::post('/addressform/{for}','AdressController@create')->name('adress.create')->middleware('auth');


Route::get('/overview','UserPanelController@index')->name('overview')->middleware('auth');
Route::get('/profile','UserPanelController@getProfile')->name('profile')->middleware('auth');
Route::get('/orders','UserPanelController@getOrders')->name('orders')->middleware('auth');

Route::get('/admin','AdminController@index')->name('admin.index')->middleware('auth');
Route::get('/admin/{table}','AdminController@showtable')->name('admin.showtable')->middleware('auth');
Route::get('/admin/removefrom/{table}/{id}','AdminController@removefrom')->name('admin.removefrom')->middleware('auth');
Route::post('/product/discount','AdminController@productdiscount')->name('admin.productdiscount')->middleware('auth');
Route::post('/admin/chmod','AdminController@chmod')->name('admin.chmod')->middleware('auth');
Route::get('/newproduct',function(){
  return view('newproduct');
})->name('newproduct')->middleware('auth');


Route::get('/update/product/{id}','ProductController@createform')->name('createformeditproduct')->middleware('auth');
Route::post('/update/product/{id}','ProductController@update')->name('updateproduct')->middleware('auth');

Route::get('/update/order/{id}','OrderController@createform')->name('createformeditorder')->middleware('auth');
Route::post('/update/order/{id}','OrderController@update')->name('updateorder')->middleware('auth');

Route::post('/newproduct','ProductController@create')->name('product.create')->middleware('auth');
// Route::post('/editprodut/{id}', 'ProductController@edit')->name('product.edit');

Route::post('/cart/discount','CartController@discount')->name('cart.discount');
Route::post('/cart/change','CartController@changequantity')->name('cart.changequantity');
// List articles

Route::get('/cart', 'CartController@index')->name('cart.index');

//add article to the carte
Route::get('/cart/{product}', 'CartController@addProduct')->name('cart.addProduct');
Route::get('/session/{name}','CartController@empty')->name('cart.empty');
//remove an article from the cart
Route::delete('/cart/{product}', 'CartController@removeProduct')->name('cart.removeProduct');
// this is the probleme i cant do both add and remove with the same url
Auth::routes();

// purchase blade
// Route::get('/success','PurchaseController@purchase')->name('purchase.success');
Route::get('/checkpaypal/{check}','PurchaseController@checkpaypal')->name('purchase.checkpaypal')->middleware('auth');

Route::get('/psuccess','PurchaseController@success')->name('purchase.success')->middleware('auth');
Route::get('/perror','PurchaseController@echec')->name('purchase.echec')->middleware('auth');

// Route::get('/check/{check}', function () {
//     return 'Bonjour ' . $_GET['token'];
// });
// Route::get('/bonjour', function () {
//     return 'Bonjour ' . $_GET['prenom'];
// });

Route::post('/send','contactController@send')->name('send');

Route::post('/purchase','PurchaseController@purchase')->name('purchase')->middleware('auth');
// Route::get('/echec',function(){
//   return view('/purchase/echec');
// })->name('purchase.success');

Route::get('/order/{id}','OrderController@show')->name('order.show')->middleware('auth');
Route::get('/order','OrderController@create')->name('order.create')->middleware('auth');
// ajouter plus tard une verification pour les site avec argument abort 404

//search some articles
Route::get('/search','searchController@index')->name('search');

// Routes about Categories:
Route::get('/phones', function () { return redirect()->route('products.index', ['category'=>'phone']); })->name('phones');
Route::get('/laptops', function () { return redirect()->route('products.index', ['category'=>'laptop']); })->name('laptops');
Route::get('/tablets', function () { return redirect()->route('products.index', ['category'=>'tablet']); })->name('tablets');
Route::get('/cameras', function () { return redirect()->route('products.index', ['category'=>'camera']); })->name('cameras');
Route::get('/gaming', function () { return redirect()->route('products.index', ['category'=>'Gaming']); })->name('gaming');
Route::get('/accessoires', function () { return redirect()->route('products.index', ['category'=>'accessorie']); })->name('accessoires');
