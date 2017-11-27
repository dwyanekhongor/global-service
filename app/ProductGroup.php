<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $table = 'product_group';

    public function productGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_groupid');
    }
}