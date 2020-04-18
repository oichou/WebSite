<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  protected $fillable = ['name','quantity','category','brand','description','basic_price','price','promo','promo_percentage','path' ];
    function setpromotion($promo,$etat){
      if($etat == true)
      {
        $this->attributes['price'] = $this->attributes['basic_price'] - ($this->attributes['basic_price']*$promo/100);
        $this->attributes['promo_percentage'] = $promo;
        $this->attributes['promo'] = true;
      }
      else {
        $this->attributes['price'] = $this->attributes['basic_price'];
        $this->attributes['promo_percentage'] = 0;
        $this->attributes['promo'] = false;

      }
    }
}
