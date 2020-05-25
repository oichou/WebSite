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
     * add a newly product to the cart.
     *
     * @param  \Illuminate\Http\Product  $product
     * @return void
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
     * @return void
     */
    public function removeProduct(Product $product)
    {
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $mycart  = new Cart($oldcart);
        if(count($mycart->products_id) <= 1)
          return redirect()->route('cart.empty' ,['name'=>'cart']);
        $mycart->remove($product);
        Session::put('cart',$mycart);

        return redirect()->route('cart.index');
    }


    /**
     * increase and decrease the quantity of a product
     *
     * @param
     * @return void
     */
    public function changequantity()
    {

      $id=(int)request()->id;
      $quantity=(int)request()->quantity;
      $product = Product::find($id);
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
      $mycart  = new Cart($oldcart);

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
     * @return void
     */
    public function discount() {
      $oldcart = Session::has('cart') ? Session::get('cart') : null;
      $mycart  = new Cart($oldcart);
      $discount = request()->discount;
      if($mycart->discountisused)
        return ["error" => "you already have a discount",];
      if(!array_key_exists($discount,$mycart->discounts))
        return ["error" => "Invalide Coupon",];
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

}
