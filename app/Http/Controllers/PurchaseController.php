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
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
use App\Ordersproduct;
Use App\Payments;

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
          // total cart and modify our bdd
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
          Product::where('id','=', $product->id)->update(['quantity' =>$quantity]);
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

        // create order and ordersproduct
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
            // checkout
    $pay = new Payments();
    $amount['amount'] = $total;
    $amount['currency'] = "USD";
    if($request->submit == 'cc'){
      $order->method = 'Credit Card';
      $order->save();
      // $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
      // $payload = @file_get_contents('php://input');
      // dd($request->_token);
        // $card['card'] = (int)$request->input('card_number');
        // $card['expiremonth'] = (int)$request->input('expires')[0].(int)$request->input('expires')[1];
        // $card['expireyear'] = '20'.(int)$request->input('expires')[3].(int)$request->input('expires')[4];
        // $card['cvv'] = (int)$request->input('ccv');
        // $check = $pay->setcard($card);
        $response = $pay->makeStripePayment($amount,$request->_token);
        // dd($response);
    }elseif ($request->submit == 'paypal') {
        $response = $pay->makePaypalPayment($amount);
        $order->method = 'paypal';
        $order->save();
        // dd($response);
        // We get 'approval_url' a paypal url to go to for payments.
        foreach($response[0]->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        // set a custom data in a session
        Session::put('response',$response[0]);
        Session::put('ApiContext',$response[1]);
        Session::put('order',$order);
        // We redirect to paypal tp make payment
        if(isset($redirect_url)) {
            return redirect($redirect_url);
        }
        // If we don't have redirect url, we have unknown error.
        return redirect()->action('PurchaseController@echec');
      }
      else {
        return redirect()->action('PurchaseController@echec');
      }
        // $order->token = $response->getData()['TOKEN'];
        // $order->save();
        // $response->redirect();
    }
    // else {
    //   // gestion erreur
    // }
    // if($check){
    //   if($response->isSuccessful())
    //     dd("ee");
    //   elseif ($response->isRedirect()){
    //     $order->token = $response->getData()['TOKEN'];
    //     $order->save();
    //     $response->redirect();
    //   }
    //   else
    //     dd($response->getMessage().'rr');
    //          // return $response->getMessage();
    // }
    // else{
    //   dd($check);
    // }


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

  public function checkpaypal($check){
    // dd($address);
    $order = Session::get('order');

    $ordersproduct = Ordersproduct::where('order_id','=',$order->id)->get();
    // dd($ordersproduct);
      if($check === 'success'){
        // If $_GET data not available... no payments was made.
        if (!isset($_GET))
              redirect()->action('PurchaseController@echec');

        // We retrieve the payment from the paymentId.
        $paymentId  = $_GET['paymentId'];
        $apiContext = Session::get('ApiContext');
        $payment = Payment::get($paymentId, $apiContext);

        // We create a payment execution with the PayerId
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        // Then we execute the payment.
        $result = $payment->execute($execution, $apiContext);
        // dd($result);

        if($result->state == 'approved'){
          $order->statut='Received';
          $order->PayerID=$_GET['PayerID'];
          $order->transaction_id=$_GET['paymentId'];
          $order->save();
          return redirect()->action('PurchaseController@success');
          // $cart     = Session::has('cart') ? Session::get('cart') : null;
          // $total_product=$cart->total_product;
          // $total_price=$cart->total_price;
          // $discountamount = 0;
          // $per = 0;
          // $discountisused = false;
          // if($cart->discountisused)
          // {
          // $per=$cart->discounts[$cart->discountused];
          // $discountamount=$cart->discountamount;
          // $discountisused = $cart->discountisused;
          // }
          // Session::forget('cart');
          // Session::forget('response');
          // Session::forget('ApiContext');
          // Session::forget('order');
          // return view('purchase/success')->with([
          //   'user'          => $currentuser,
          //   'address'       => $address,
          //   'total_product' => $total_product,
          //   'total_price'   => $total_price,
          //   'order'         => $order,
          //   'per'           => $per,
          //   'discountamount'=> $discountamount,
          //   'discountisused'=> $discountisused,
          //   // 'products'      => $products,
          //   // 'subtotal'      => $subtotal,
          // ]);
        }
        else {
            $order->statut='Echec';
            $order->save();
            foreach ($ordersproduct as $products) {
                $ordersproduct = Ordersproduct::where('order_id','=',$order->id)->get();
                $product = Product::find($products->product_id);
                $product->quantity += $products->quantity;
                $product->save();
              }
              return redirect()->action('PurchaseController@echec');
        }
      }
      elseif ($check === 'echec') {
        $order->statut='echec';
        $order->save();
        foreach ($ordersproduct as $products) {
            $ordersproduct = Ordersproduct::where('order_id','=',$order->id)->get();
            $product = Product::find($products->product_id);
            $product->quantity += $products->quantity;
            $product->save();
      }
      return redirect()->action('PurchaseController@echec');
  }

}

  public function success() {
    $currentuser    = Auth::user();
    $address        = Address::find($currentuser->adress_id);
    $cart           = Session::has('cart') ? Session::get('cart') : null;
    $total_product  = $cart->total_product;
    $total_price    = $cart->total_price;
    $discountamount = 0;
    $per            = 0;
    $discountisused = false;

    if($cart->discountisused) {
    $per=$cart->discounts[$cart->discountused];
    $discountamount=$cart->discountamount;
    $discountisused = $cart->discountisused;
    }

    $order = Session::get('order');
    // Session::forget('cart');
    // Session::forget('response');
    // Session::forget('ApiContext');
    // Session::forget('order');
    return view('purchase/success')->with([
      'user'          => $currentuser,
      'address'       => $address,
      'total_product' => $total_product,
      'total_price'   => $total_price,
      'order'         => $order,
      'per'           => $per,
      'discountamount'=> $discountamount,
      'discountisused'=> $discountisused,
      // 'products'      => $products,
      // 'subtotal'      => $subtotal,
    ]);
  }

  public function echec() {
    return view('purchase/echec');
  }
}
