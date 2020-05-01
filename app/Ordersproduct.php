<?php

namespace App;
Use Cart;

use Illuminate\Database\Eloquent\Model;

class Ordersproduct extends Model
{
  protected $table = 'ordersproducts';

  protected $fillable = [
        'order_id', 'product_id', 'quantity'
    ];

  public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
