<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPerformanceItem extends Model
{
    protected $table = 'product_performance_item';

    public function productPerformance(){
        return $this->belongsTo('App\ProductPerformance', 'product_performanceid');
    }
}