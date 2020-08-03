<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RandomRefID
{
    public static function make()
    {
        $date = Carbon::now();
        $randomStr = Str::random();

        return md5($date . $randomStr);
    }
}
