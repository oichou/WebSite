<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'price', 'date_order' ,'date_delivery',
        'street', 'city', 'state', 'country', 'cp', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function setattributes($data) {
      foreach ($data as $key => $value) {
        $this->attributes[$key] = $value;
      }
    }

}
