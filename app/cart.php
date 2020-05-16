<?php

namespace App;

class Cart
{
  public $products_id = null;
  public $total_product = 0;
  public $total_price = 0;
  // public $payement = 0;
  public $discounts = ["hambouk"=>20,"angers"=>15,"XAEA-12"=>33,"n7bkrbk"=>5];
  public $discountisused = false;
  public $discountused = '';
  public $discountamount = 0;
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
      $this->discountisused = $oldcart->discountisused;
      $this->discountused   = $oldcart->discountused;
      $this->discounts      = $oldcart->discounts;
      $this->discountamount = $oldcart->discountamount;
      // $this->total_product = ($oldcart->total_product>=0) ? $oldcart->total_product : 0;
      // $this->total_price   = ($oldcart->total_product>=0) ? $oldcart->total_price : 0;

    }
  }

  /**
   * Add a product to our instance.
   *
   * @param  \App\Product  $product
   * @return void
   */

  public function add($product){
     $ajout = false;
      if ($this->products_id) {
          if (array_key_exists($product->id,$this->products_id)) {
            if ($product->quantity >= $this->products_id["$product->id"]++){
              $this->products_id["$product->id"]++;
              $ajout = true;
            }
          }else {
              if($product->quantity >= 1){
                $this->products_id += ["$product->id"=>1];
                $ajout = true;
              }
          }
      }else {
          if($product->quantity >= 1){
            $this->products_id = ["$product->id"=>1];
            $ajout = true;
          }
      }
      if($ajout){
        $this->total_product ++;
        if($this->discountisused){
          $this->total_price += ($product->price - $product->price * $this->discounts[$this->discountused]/100);
          $this->discountamount += $product->price*$this->discounts[$this->discountused]/100;
        }

        else
          $this->total_price += $product->price;
      }
}

  public function remove($product){
    $this->total_product -= $this->products_id["$product->id"];
    if($this->discountisused){
      $this->total_price -= ($product->price - $product->price * $this->discounts[$this->discountused]/100);
      $this->discountamount -= $product->price*$this->discounts[$this->discountused]/100;
    }
    else
      $this->total_price   -= $this->products_id["$product->id"] * $product->price ;
    unset($this->products_id["$product->id"]);
    if($this->total_price <= 0)
      $this->total_price=0;
    if($this->total_product <= 0)
      $this->total_product=0;
  }

  public function set_total_price($price){
      $this->total_price += $price;
  }

  public function set_quantity($product,$qty)
  {

    if($this->discountisused){
      $this->total_price    -= $this->products_id["$product->id"] * ($product->price - $product->price * $this->discounts[$this->discountused]/100);
      // $this->discountamount += $product->price*$this->discounts[$this->discountused]/100;
      $this->set_total_price(($product->price-$product->price*$this->discounts[$this->discountused]/100)*$qty);
    }
    else{
      $this->total_price   -= $this->products_id["$product->id"] * $product->price;
      $this->set_total_price($product->price * $qty);
    }
    $this->total_product  = $this->total_product - $this->products_id["$product->id"]+$qty;
    $this->products_id["$product->id"] = $qty;
  }

  public function applydiscount($coupon){
      $this->discountamount = $this->total_price * $this->discounts["$coupon"] /100;
      $this->total_price -= $this->total_price * $this->discounts["$coupon"] /100;
      $this->discountisused = true;
      $this->discountused = $coupon;
  }
  public function empty()
  {
    return ($this->total_price == 0 && $this->total_product == 0) ;
  }


}
?>
