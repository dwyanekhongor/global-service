<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSponsored extends Model
{
    protected $table = 'product_sponsored';

    public function product(){
        return $this->belongsTo('App\Product', 'productid');
    }
}