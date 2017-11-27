<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public function menu(){
        return $this->belongsTo('App\Menu', 'menuid');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'categoryid');
    }

    public function menuLocation(){
        return $this->belongsTo('App\MenuLocation', 'menu_locationid');
    }

    public function menuType(){
        return $this->belongsTo('App\MenuType', 'menu_typeid');
    }
}