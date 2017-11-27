<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $message_stored = 'Амжилттай хадгалагдлаа';
    public $message_updated = 'Амжилттай шинэчилэгдлээ';
    public $message_destroyed = 'Амжилттай устгагдлаа';

    public $validator_required = ' хоосон байна';
    public $validator_numeric = ' буруу тэмдэгт агуулсан байна';
    public $validator_email = ' оруулсан утга буруу байна';
    public $validator_min = ' урт хүрэлцэхгүй байна';
    public $validator_max = ' урт хэтэрсэн байна';
    public $validator_digits = ' урт тохирохгүй байна';

    public $data_size = 10;
}