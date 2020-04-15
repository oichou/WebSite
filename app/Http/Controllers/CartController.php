<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Product;
use App\Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = [];
        $total = 0;
        $cart     = Session::has('cart') ? Session::get('cart') : null;
        if($cart){
          foreach ($cart->products_id as $key => $value) {
            $qty = $value;
            $product = Product::find(intval($key));
            $products [] = [$product,$qty];
          }
          $total = $cart->total_price;
        }
        // dd($products);
        return view('cart')->with([
          'products' => $products,
          'total'    => $total,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * add a newly product to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Product $product)
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        // dd($oldcart);
        $mycart  = new Cart($oldcart);
        $mycart->add($product);
        Session::put('cart',$mycart);
        return redirect()->route('cart.index');
    }

    /**
     * add a newly product to the cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeProduct(Product $product)
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        // dd($oldcart);
        $mycart  = new Cart($oldcart);
        $mycart->remove($product);
        Session::put('cart',$mycart);
        // Session::forget('cart');

        return redirect()->route('cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changequantity()
    {

      $id=(int)request()->id;
      $quantity=(int)request()->quantity;
      $product = Product::find($id);
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
      $mycart  = new Cart($oldcart);
      if(request()->c == 'p' && $quantity == $product->quantity)
          return [
            "error" => "no more product"
          ];
      if(request()->c == 'm' && $quantity <= 1)
      {
        return ["error" => "you should have at least one item or remove it",];
        // return redirect()->action('CartController@removeProduct',$product);
      }
      if(request()->c == 'p')
      $mycart->set_quantity($product,$quantity+1);
      if(request()->c == 'm')
      $mycart->set_quantity($product,$quantity-1);
      // dd($mycart);
      Session::put('cart',$mycart);
      return [
        "quantity"       => $mycart->products_id["$product->id"],
        "total_price"    => $mycart->total_price,
        "total_product"  => $mycart->total_product,
      ];

    }

    public function discount() {
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
      $mycart  = new Cart($oldcart);
      $discount = request()->discount;
      if($mycart->discountsused > 0)
      {
        return [
          "error" => "you already have a discount",
        ];
      }
      $price = $mycart->total_price;
      $mycart->applydiscount($discount);
      Session::put('cart',$mycart);
      return [
        "e"              => $mycart->discountsused,
        "total_price"    => $mycart->total_price,
        "coupon"         => $mycart->discounts["$discount"],
        "discount"       => $price - $mycart->total_price,
      ];


    }
    public function empty()
    {
      session()->forget('cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
