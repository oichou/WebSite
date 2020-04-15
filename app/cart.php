<?php

namespace App;

class Cart
{
  public $products_id = null;
  public $total_product = 0;
  public $total_price = 0;
  public $discounts = ["hambouk"=>20];
  public $discountsused = 0;

  /**
   * create an instance  .
   *
   * @param  App/Cart  $oldcart
   * @return void
   */

  public function __construct($oldcart){
    if($oldcart){
      $this->products_id   = $oldcart->products_id;
      $this->total_product = $oldcart->total_product;
      $this->total_price   = $oldcart->total_price;
      $this->discountsused   = $oldcart->discountsused;
    }
  }

  /**
   * Add a product to our instance.
   *
   * @param  \App\Product  $product
   * @return void
   */

  public function add($product){
    if ($this->products_id) {
        if (array_key_exists($product->id,$this->products_id)) {
          $this->products_id["$product->id"]++;
        }else {
          $this->products_id += ["$product->id"=>1];
        }
    }else {
        $this->products_id = ["$product->id"=>1];
    }
    $this->total_product ++;
    $this->total_price += $product->price;
  }

  public function remove($product){
    $this->total_price   -= $this->products_id["$product->id"] * $product->price ;
    $this->total_product -= $this->products_id["$product->id"];
    unset($this->products_id["$product->id"]);
    if($this->total_price < 0)$this->total_price=0;
  }

  public function set_total_price($price){
    $this->total_price += $price;
  }

  public function set_quantity($product,$qty)
  {
    $this->total_product = $this->total_product - $this->products_id["$product->id"]+$qty;
    $this->total_price   -= $this->products_id["$product->id"] * $product->price;
    $this->set_total_price($product->price * $qty);
    $this->products_id["$product->id"] = $qty;
  }

  public function applydiscount($coupon){
    if (array_key_exists($coupon,$this->discounts)) {
      $this->total_price -= $this->total_price * $this->discounts["$coupon"] /100;
      $this->discountsused += 1;
    }
  }
  public function empty()
  {
    return ($this->total_price == 0 && $this->total_product == 0) ;
  }


}
?>
