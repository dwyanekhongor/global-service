<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroupSponsored extends Model
{
    protected $table = 'product_group_sponsored';

    public function productGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_groupid');
    }
}