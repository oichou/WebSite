<?php

namespace App;

class Cart
{
  public $products_id = null;
  protected $total_product = 0;
  protected $total_price = 0;

  public function __construct($oldcart){
    if($oldcart){
      $this->products_id   = $oldcart->products_id;
      $this->total_product = $oldcart->total_product;
      $this->total_price   = $oldcart->total_price;
    }
  }
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
    $this->total_price += $product->price;
  }
}
?>
