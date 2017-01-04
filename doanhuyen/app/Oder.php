<?php

namespace App;
use App\Customer;
use Illuminate\Database\Eloquent\Model;
class Oder extends Model
{
     protected $table ="order";
     public $timestamps = false;
      public function Product()
     {
     	return $this->belongsTo('App\Product','product_id','id');
     }
     public function Customer()
     {
     	return $this->belongsTo('App\Customer','customer_id','id');
     }
      public function OrderDetails()
     {
          return $this->hasMany('App\OrderDetails','order_id','id');
     }

     

   
}
