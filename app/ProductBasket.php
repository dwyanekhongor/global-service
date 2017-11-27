<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBasket extends Model
{
    protected $table = 'product_basket';

    public function product(){
        return $this->belongsTo('App\Product', 'productid');
    }

    public function user(){
        return $this->belongsTo('App\User', 'userid');
    }
}