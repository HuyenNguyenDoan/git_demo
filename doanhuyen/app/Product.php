<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
     protected $table ="product";
     public $timestamps = false;
      public function Category()
     {
     	return $this->belongsTo('App\Category','category_id','id');
     }
      public function Type_of_wood()
     {
     	return $this->belongsTo('App\Type_of_wood','category_id','id');
     }
     public function Comment()
     {
     	return $this->hasMany('App\Comments','id_product','id');
     }
      public function Oder()
     {
        return $this->hasMany('App\Oder','product_id','id');
     }

       public function Image()
     {
        return $this->hasMany('App\Images','id_product','id');
     }
}
