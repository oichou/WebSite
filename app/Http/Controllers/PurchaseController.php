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
        //   Product::where('id','=', $product->id)->update(['quantity' =>$quantity]);
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
    // dd($request->input('card_number'));
    $currentuser = Auth::user();
    $address = Address::find($currentuser->adress_id);
    $order = Order::create([
          'user_id'           => $currentuser->id,
          'price'             => $total,
          'date_order'        => now(),
          'date_delivery'     => now()->addDays(12)->todatestring(),
      ]);
    foreach ( $products as $key ) {
      $ordersproduct = Ordersproduct::create([
          'order_id'      => $order->id,
          'product_id'    => $key[0]->id,
          'product_price' => $key[0]->price,
          'quantity'      => $key[1],
        ]);
    }
    $pay = new Payment();
    $card['card'] = (int)$request->input('card_number');
    $card['expiremonth'] = (int)$request->input('expires')[0].(int)$request->input('expires')[1];
    $card['expireyear'] = '20'.(int)$request->input('expires')[3].(int)$request->input('expires')[4];
    $card['cvv'] = (int)$request->input('ccv');
    $check = $pay->setcard($card);
    if($check){
      $amount['amount'] = $total;
      $amount['currency'] = "USD";
      $response=$pay->makepayment($amount);
      if($response->isSuccessful())
        dd("ee");
      elseif ($response->isRedirect()){
        $order->token = $response->getData()['TOKEN'];
        $order->save();
        $response->redirect();
      }
      else
        dd($response->getMessage().'rr');
             // return $response->getMessage();
    }
    else{
      dd($check);
    }


      // Session::forget('cart');
      // return view('purchase/success')->with([
      //   'user'          => $currentuser,
      //   'address'       => $address,
      //   'items'         => $items,
      //   'products'      => $products,
      //   'subtotal'      => $subtotal,
      //   'total'         => $cart->total_price,
      //   'cart'          => $cart,
      //   'ordernumber'   => $order->id,
      //   'date_order'    => $order->date_order,
      //   'date_delivery' => $order->date_delivery,
      // ]);
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

  public function check($check){
    $currentuser = Auth::user();
    $address = Address::find($currentuser->adress_id);
    // dd($address);
    $order = Order::where('token',$_GET['token'])->get();
    // dd($order[0]->id);
    $ordersproduct = Ordersproduct::where('order_id','=',$order[0]->id)->get();

      if($check === 'success'){
        if(true){
          $cart     = Session::has('cart') ? Session::get('cart') : null;
          $total_product=$cart->total_product;
          $total_price=$cart->total_price;
          $discountamount = 0;
          $per = 0;
          $discountisused = false;
          if($cart->discountisused)
          {
          $per=$cart->discounts[$cart->discountused];
          $discountamount=$cart->discountamount;
          $discountisused = $cart->discountisused;
          }
          // Session::forget('cart');
          return view('purchase/success')->with([
            'user'          => $currentuser,
            'address'       => $address,
            'total_product' => $total_product,
            'total_price'   => $total_price,
            'order'         => $order[0],
            'per'           => $per,
            'discountamount'=> $discountamount,
            'discountisused'=> $discountisused,
            // 'products'      => $products,
            // 'subtotal'      => $subtotal,
          ]);
        }
        $_GET['PayerID'];
        $_GET['token'];
      }
      elseif ($check === 'echec') {
        foreach ($ordersproduct as $products) {
            $product = Product::findOrNew($products->product_id);
            // $product->update($key[0]);
            $product->quantity = $products->quantity;
            $product->save();
      }
      $ordersproduct->delete();
      $order->delete();
      return view('purchase/echec');
  }

}
}
