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
        $total    = 0;
        $discount = null;
        $subtotal = 0;
        $cart     = Session::has('cart') ? Session::get('cart') : null;

        if($cart){
          foreach ($cart->products_id as $key => $value) {
            $product = Product::find(intval($key));
            if($product->quantity >= $value){
              $products [] = [$product,$value];
              $subtotal += $product->price * $value;
            }
          }
          $total = $cart->total_price;
          if($cart->discountisused)
          // dd($cart);
            $discount = [$cart->discounts[$cart->discountused],$cart->discountamount];
        }
        return view('cart')->with([
          'products' => $products,
          'total'    => $total,
          'subtotal' => $subtotal,
          'discount' => $discount,
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
     * @param  \Illuminate\Http\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Product $product)
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $mycart  = new Cart($oldcart);
        $mycart->add($product);
        Session::put('cart',$mycart);
        return redirect()->route('cart.index');
    }

    /**
     * remove a product from the cart.
     *
     * @param  \Illuminate\Http\Product  $product
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
     * increase and decrease the quantity of a product
     *
     * @param
     * @return
     */
    public function changequantity()
    {

      $id=(int)request()->id;
      $quantity=(int)request()->quantity;
      $product = Product::find($id);
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
      $mycart  = new Cart($oldcart);
      // if(request()->c == 'p' && $quantity == $product->quantity)
      //     return [
      //       "error" => "no more product"
      //     ];
      // if(request()->c == 'm' && $quantity <= 1)
      // {
      //   return ["error" => "you should have at least one item or remove it",];
      //   // return redirect()->action('CartController@removeProduct',$product);
      // }
      if(request()->c == 'p'){
        if($quantity >= $product->quantity)
          return ["error" => "no more product"];
        $mycart->set_quantity($product,$quantity+1);
        if($mycart->discountisused)
          $mycart->discountamount += $product->price*$mycart->discounts[$mycart->discountused]/100;
      }
      if(request()->c == 'm'){
        if($quantity <= 1 )
          return ["error" => "you should have at least one item or remove it",];
        $mycart->set_quantity($product,$quantity-1);
        if($mycart->discountisused)
          $mycart->discountamount -= $product->price*$mycart->discounts[$mycart->discountused]/100;
      }
      Session::put('cart',$mycart);
      return [
        "quantity"       => $mycart->products_id["$product->id"],
        "discount"       => $mycart->discountamount,
        "total_price"    => $mycart->total_price,
        "total_product"  => $mycart->total_product,
      ];

    }

    /**
     * apply a discount
     *
     * @param
     * @return
     */
    public function discount() {
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
      $mycart  = new Cart($oldcart);
      $discount = request()->discount;
      if($mycart->discountisused)
        return ["error" => "you already have a discount",];
      if(!array_key_exists($discount,$mycart->discounts))
        return ["error" => "Invalide Coupon",];
      // $price = $mycart->total_price;
      $mycart->applydiscount($discount);
      Session::put('cart',$mycart);
      return [
        "total_price"    => $mycart->total_price,
        "coupon"         => $mycart->discounts["$discount"],
        "discount"       => $mycart->discountamount,
      ];


    }
    public function empty($name)
    {
      Session::forget($name);
      return redirect()->route('cart.index');
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
