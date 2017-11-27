<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SlideController extends Controller
{
    public function convert(){
        $encrypted = Crypt::encryptString('Hello world.');

        $decrypted = Crypt::decryptString($encrypted);

        return response([$encrypted, $decrypted]);
    }
}