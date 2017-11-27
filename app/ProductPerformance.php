<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPerformance extends Model
{
    protected $table = 'product_performance';

    public function productGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_groupid');
    }
}