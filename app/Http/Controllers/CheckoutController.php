<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Cart;
Use App\User;
Use App\Product;
Use App\Address;
use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;
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
    $products = [];
    $total    = 0;
    $items    = 0;
    $subtotal = 0;
    $discount = null;
    $cart     = Session::has('cart') ? Session::get('cart') : null;
    if($cart){
      foreach ($cart->products_id as $key => $value) {
        $product     = Product::find(intval($key));
        if($product->quantity < $value)
          return redirect()->route('error',['whichone' => 'outofstock' ]);
        $products [] = [$product,$value];
        $subtotal += $product->price * $value;
      }
      $total = $cart->total_price;
      $items = $cart->total_product;
      if($cart->discountisused)
        $discount = [$cart->discounts[$cart->discountused],$cart->discountamount];
    }

    $currentuser = Auth::user();
    $adr_id      = $currentuser->adress_id;
    if($adr_id === null)
        return redirect()->route('adress.form',['for' => 'checkout']);
    $adress = Address::find($adr_id);

    return view('checkout')->with([
      'adress'      => $adress,
      'user'        => $currentuser,
      'products'    => $products,
      'subtotal'    => $subtotal,
      'total'       => $total,
      'discount'    => $discount,
      'items'       => $items,
    ]);
  }
}
