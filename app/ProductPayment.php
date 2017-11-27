<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPayment extends Model
{
    protected $table = 'product_payment';

    public function product(){
        return $this->belongsTo('App\Product', 'productid');
    }

    public function productOrder(){
        return $this->belongsTo('App\ProductOrder', 'product_orderid');
    }
}