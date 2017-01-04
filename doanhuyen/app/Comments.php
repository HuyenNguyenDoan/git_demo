<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Comments extends Model
{
    protected $table ="comment";
    public $timestamps = false;
      public function Product()
     {
     	return $this->belongsTo('App\Product','id_product','id');
     }
       public function User()
     {
     	return $this->belongsTo('App\User','id_user','id');
     }

}
