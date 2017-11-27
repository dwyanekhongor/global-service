<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_account';

    public function bank(){
        return $this->belongsTo('App\Bank', 'bankid');
    }
}