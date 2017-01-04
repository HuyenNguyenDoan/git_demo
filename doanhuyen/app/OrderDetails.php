<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = "order_details";
    public $timestamps = false;
    public function Order()
     {
     	return $this->belongsTo('App\Oder','order_id','id');
     }
}
