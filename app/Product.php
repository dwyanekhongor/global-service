<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function productGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_groupid');
    }
}