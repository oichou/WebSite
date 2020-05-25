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

    if($cart) {
      foreach ($cart->products_id as $key => $value) {
        $product     = Product::find(intval($key));

        if($product->quantity < $value)
          return redirect()->route('error',['whichone' => 'outofstock' ]);

        $products [] = [$product,$value];
        $quantity    = $product->quantity - $value;

        Product::where('id','=', $product->id)->update(['quantity' =>$quantity]);

        $subtotal  += $product->price * $value;
      }

      $items = $cart->total_product;
      $total = $cart->total_price;

    }

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
    $pay                = new Payments();
    $amount['amount']   = $total;
    $amount['currency'] = "USD";
    Session::put('order',$order);
    if($request->method == 'cc') {

      try {

          $response = $pay->makeStripePayment($amount,$request->stripeToken);
          $statut   = $response->status;
      } catch(\Stripe\Exception\CardException $e) {
        // Since it's a decline, \Stripe\Exception\CardException will be caught
        $statut = null;
      } catch (\Stripe\Exception\RateLimitException $e) {
        // Too many requests made to the API too quickly
        $statut = null;
      } catch (\Stripe\Exception\InvalidRequestException $e) {
        // Invalid parameters were supplied to Stripe's API
        $statut = null;
      } catch (\Stripe\Exception\AuthenticationException $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
        $statut = null;
      } catch (\Stripe\Exception\ApiConnectionException $e) {
        // Network communication with Stripe failed
        $statut = null;
      } catch (\Stripe\Exception\ApiErrorException $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
        $statut = null;
      } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
        $statut = null;
      }
      $order->method         = 'Credit Card';
      $order->transaction_id = $request->stripeToken;
      $order->save();

      if($statut == 'succeeded'){
        $order->statut = 'Received';
        $order->save();
        return redirect()->action('PurchaseController@success');
      }

      else{
        $order->statut = 'Echec';
        $order->save();
        $ordersproduct = Ordersproduct::where('order_id','=',$order->id)->get();
        foreach ($ordersproduct as $products) {

            $ordersproduct      = Ordersproduct::where('order_id','=',$order->id)->get();
            $product            = Product::find($products->product_id);
            $product->quantity += $products->quantity;
            $product->save();
        return redirect()->action('PurchaseController@echec');
      }
    }

    } elseif ($request->method == 'paypal') {

        $response      = $pay->makePaypalPayment($amount);
        $order->method = 'paypal';
        $order->save();

        // We get 'approval_url' a paypal url to go to for payments.
        foreach($response[0]->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url   = $link->getHref();
                break;
            }
        }

        // set a custom data in a session
        Session::put('response',$response[0]);
        Session::put('ApiContext',$response[1]);

        //  redirect to paypal tp make payment
        if(isset($redirect_url)) {
            return redirect($redirect_url);
        }

        // If we don't have redirect url, we have unknown error.
        return redirect()->action('PurchaseController@echec');
      } else {
        return redirect()->action('PurchaseController@echec');
      }
    }

  public function checkpaypal($check){

    $order = Session::get('order');

    $ordersproduct = Ordersproduct::where('order_id','=',$order->id)->get();

      if($check === 'success'){

        // If $_GET data not available... no payments was made.
        if (!isset($_GET))
              redirect()->action('PurchaseController@echec');

        // We retrieve the payment from the paymentId.
        $paymentId  = $_GET['paymentId'];
        $apiContext = Session::get('ApiContext');
        $payment    = Payment::get($paymentId, $apiContext);

        // We create a payment execution with the PayerId
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        // Then we execute the payment.
        $result = $payment->execute($execution, $apiContext);

        if($result->state == 'approved') {

          $order->statut  = 'Received';
          $order->PayerID = $_GET['PayerID'];
          $order->transaction_id=$_GET['paymentId'];
          $order->save();
          Session::forget('ApiContext');
          Session::forget('response');
          return redirect()->action('PurchaseController@success');

        } else {

            $order->statut = 'Echec';
            $order->save();

            foreach ($ordersproduct as $products) {

                $ordersproduct = Ordersproduct::where('order_id','=',$order->id)->get();
                $product       = Product::find($products->product_id);
                $product->quantity += $products->quantity;
                $product->save();

              }
              return redirect()->action('PurchaseController@echec');
        }
      } elseif ($check === 'echec') {

        $order->statut = 'Echec';
        $order->save();

        foreach ($ordersproduct as $products) {

            $ordersproduct      = Ordersproduct::where('order_id','=',$order->id)->get();
            $product            = Product::find($products->product_id);
            $product->quantity += $products->quantity;
            $product->save();
      }
      return redirect()->action('PurchaseController@echec');
  }

}

  public function success() {

    try {

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
    $discountamount = $cart->discountamount;
    $discountisused = $cart->discountisused;

    }

    $order = Session::get('order');
    Session::forget('cart');

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

    ]);
    } catch (\Exception $e) {

      return redirect()->route('error',['whichone' => '504' ]);

    }
  }

  public function echec() {

    try {

      return view('purchase/echec');

    } catch (\Exception $e) {

        return redirect()->route('error',['whichone' => '504' ]);
    }

  }
}
