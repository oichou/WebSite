<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Use App\Product;
Use App\Address;
Use App\order;
use App\Ordersproduct;

class OrderController extends Controller
{
  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Product
   */
  protected function create($data) {
    // dd($request->input('promo'));
      return Order::create([
          'user_id'       => $data['user_id'],
          'price'         => $data['price'],
          'date_order'    => $data['date_order'],
          'date_delivery' => $data['date_delivery'],
      ]);
    }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
        $currentuser = Auth::user();
        $order       = Order::find($id);
        // dd($order->id);
        if(!$order)
          return view('errors/outofstock');
        if($order->user_id != $currentuser->id)
          return view('errors/403');
        $details = Ordersproduct::where('order_id','=',$order->id)->get();
        $ppqs = [];
        // dd($details);
        foreach ($details as $detail) {
          $product = Product::find($detail->product_id);
          $ppqs []= [$product,$detail->product_price,$detail->quantity];
        }
        // dd($ppqs);
        return view('/purchase/orderdetail')->with([
            'user'  => $currentuser,
            'order' => $order,
            'ppqs'  => $ppqs,
        ]);
      }
}
