<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Type_of_wood extends Model
{
     protected $table ="type_of_wood";
    // public timestamp= false;
      public function Product()
     {
     	return $this->hasMany('App\Product','type_of_wood_id','id');
     }
}
