<?php

namespace App\Helpers;

use App\Exceptions\OptionNotAvailableException;
use App\Exceptions\OptionNotFoundException;
use App\Models\Option;

class OptionHelper
{
    public static function check($key, $expectationValue)
    {
        $option = Option::where('name', $key)
            ->where('value', $expectationValue)
            ->first();

        if (blank($option)) {
            throw new OptionNotAvailableException($option->message ?? 'Option not Found.');
        }
    }
}
