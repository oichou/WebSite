<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Use App\Product;
Use App\Address;
Use App\order;
use App\Ordersproduct;

class OrderController extends Controller
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
           'price'             => ['required', 'numeric','min:1'],
           'method'            => ['required', 'string' ,'max:255'],
           'transaction_id'    => ['required', 'string' ,'max:255'],
           'PayerID'           => ['required', 'string' ,'max:255'],
           'statut'            => ['required', 'numeric'],
           'date_order'        => ['required', 'date'],
           'date_delivery'     => ['required', 'date'],
       ]);
   }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Order
   */
  protected function create($data) {
    // dd($request->input('promo'));
      return Order::create([
          'user_id'        => $data['user_id'],
          'method'         => $data['method'],
          'transaction_id' => $data['transaction_id'],
          'PayerID'        => $data['PayerID'],
          'statut'         => $data['statut'],
          'date_order'     => $data['date_order'],
          'date_delivery'  => $data['date_delivery'],
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
      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function createform($id)
      {
        $admin = Auth::user();
        if(!$admin->is_admin)
          return redirect()->route('error',['whichone' => '403' ]);
          $order = Order::find($id);
          // dd($product);
          return view('dashboard/edit/editorder')->with([
              'admin'   => $admin,
              'order'   => $order,
          ]);
        }
          // /**
          //  * edit the order .
          //  *
          //  * @param  int  $id
          //  * @return \Illuminate\Http\Response
          //  */
          // public function edit($id)
          // {
          //     $order = Order::find($id);
          //     // $order->statut =request()->statut;
          //     // dd($updates);
          //     $order->update(request()->all());
          //     // $order->updated_at = now();
          //     // $order->save();
          //     dd($order);
          //     return redirect()->route('admin.showtable', ['table' => 'Order']);
          //
          // }
          /**
           * Update the specified resource in storage.
           *
           * @param  \Illuminate\Http\Request  $request
           * @param  int  $id
           * @return \Illuminate\Http\Response
           */
          public function update(Request $request, $id)
          {
            $admin = Auth::user();
            if(!$admin->is_admin)
              return redirect()->route('error',['whichone' => '403' ]);
            $order = Order::find($id);
            // $order->statut =request()->statut;
            // dd($updates);
            $order->update(request()->all());
            // $order->updated_at = now();
            // $order->save();
            dd($order);
            return redirect()->route('admin.showtable', ['table' => 'Order']);
          }
}
