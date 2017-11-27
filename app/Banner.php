<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    public function bannerPosition(){
        return $this->belongsTo('App\BannerPosition', 'banner_positionid');
    }
}