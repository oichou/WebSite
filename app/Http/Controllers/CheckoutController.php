<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Cart;
Use App\User;
Use App\Product;
Use App\Address;
use Session;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $currentuser = Auth::user();
    $adr_id      = $currentuser->adress_id;
    if($adr_id === null)
    {
      // return view('/addressform/checkout',);
          return redirect()->route('adress.form',['for' => 'checkout']);
    }
    $adress = Address::find($adr_id);
    $products = [];
    $total    = 0;
    $items    = 0;
    $cart     = Session::has('cart') ? Session::get('cart') : null;
    if($cart){
      foreach ($cart->products_id as $key => $value) {
        $qty         = $value;
        $product     = Product::find(intval($key));
        $products [] = [$product,$qty];
      }
      $total = $cart->total_price;
      $items = $cart->total_product;
    }

    return view('checkout')->with([
      'adress'      => $adress,
      'user'        => $currentuser,
      'products'    => $products,
      'total'       => $total,
      'items'       => $items,
    ]);
  }
}
