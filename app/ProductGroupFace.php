<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroupFace extends Model
{
    protected $table = 'product_group_face';

    public function productGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_groupid');
    }
}