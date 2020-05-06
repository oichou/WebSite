<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;
Use Cart;
Use App\User;
Use App\Product;
Use App\Address;
Use App\order;
use App\Ordersproduct;
Use App\Payment;
// use Omnipay\Common\CreditCard;
// use Omnipay\Omnipay;
// use Payment\Payment;

class PurchaseController extends Controller
{
  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'card_number' => ['required','numeric','min:16','max:16'],
      'expires'     => ['required','string','min:5','max:5'],
      'ccv'         => ['required','numeric','min:3','max:3'],
      'holder'      => ['required','string','max:55'],
      ]);
  }

  public function purchase(Request $request){
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
          return view('errors/outofstock');
        $products [] = [$product,$value];
        $quantity = $product->quantity - $value;
        // if($quantity)
        //   Product::where('id', $product->id)->update(['quantity' =>$quantity]);
        // else
        //   Product::where('id', $product->id)->delete();
        $subtotal  += $product->price * $value;
      }
      $items = $cart->total_product;
      $total = $cart->total_price;
    }
    // supprimer les produit de la table if succes je laisse else je remets
    // creer blade succes and erreur
    // creer dans la table order ce quil faut
    // ajoute f checkout if he want to save cc or note
    //
    // $pay = new Payment();
    // $card['card'] = $request->input('card_number');
    // $card['expiremonth'] = $request->input('expires')[0].$request->input('expires')[1];
    // $card['expireyear'] = '20'.$request->input('expires')[3].$request->input('expires')[4];
    // $card['cvv'] = $request->input('ccv');
    // $check = $pay->setcard($card);
    // if($check){
    //   $amount['amount'] = $total;
    //   $amount['currency'] = "USD";
    //   $response=$pay->makepayment($amount);
    //   // dd($response);
    //   if($response->isSuccessful())
    //     dd($response->getMessage().' yes=');
    //   elseif ($response->isRedirect())
    //     dd('Redirect to offsite payment gateway');
    //   else
    //     dd($response->getMessage());
    //          // return $response->getMessage();
    // }
    // else{
    //   dd($check);
    // }

    $currentuser = Auth::user();
    // if($success){
      $address = Address::find($currentuser->adress_id);
      $order = Order::create([
          'user_id'           => $currentuser->id,
          'price'             => $total,
          'date_order'        => now(),
          'date_delivery'     => now()->addDays(12)->todatestring(),
      ]);
      foreach ( $products as $key ) {
        // dd($key);
        $ordersproduct = Ordersproduct::create([
          'order_id'      => $order->id,
          'product_id'    => $key[0]->id,
          'product_price' => $key[0]->price,
          'quantity'      => $key[1],
        ]);
    }
      return view('purchase/success')->with([
        'user'          => $currentuser,
        'address'       => $address,
        'items'         => $items,
        'products'      => $products,
        'subtotal'      => $subtotal,
        'total'         => $total,
        'cart'          => $cart,
        'ordernumber'   => $order->id,
        'date_order'    => $order->date_order,
        'date_delivery' => $order->date_delivery,
      ]);
    // }
    // else{
    //   foreach ($products as $key) {
    //     $product = findOrNew($key[0]->id);
    //     $product->update($key[0]);
    //     $product->quantity = $key[1];
    //     $product->save();
    //     return view('purchase/echec');
    //   }
    // }
  }

}
