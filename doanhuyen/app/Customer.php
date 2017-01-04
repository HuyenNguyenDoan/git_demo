<?php

namespace App;use App\Oder;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model
{
    protected $table = "customer";
    public $timestamps= false;
     public function Order()
     {
     	return $this->hasMany('App\Oder','customer_id','id');
     }
}
