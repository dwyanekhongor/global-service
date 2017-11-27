<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMail extends Model
{
    protected $table = 'contact_mail';

    public function contact(){
        return $this->belongsTo('App\Contact', 'contactid');
    }
}