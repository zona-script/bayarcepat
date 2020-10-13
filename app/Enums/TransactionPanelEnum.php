<?php


namespace App\Enums;


use Illuminate\Support\Str;

class TransactionPanelEnum
{
    const PENDING = 1;
    const PROCESSING = 2;
    const PARTIAL = 3;
    const ERROR = 4;
    const SUCCESS = 5;

    public static function fromString($value) {
        $value = Str::lower($value);

        switch ($value) {
            case 'pending':
                return self::PENDING;
                break;
            case 'processing':
                return self::PROCESSING;
                break;
            case 'partial':
                return self::PARTIAL;
                break;
            case 'error':
                return self::ERROR;
                break;
            case 'success':
                return self::SUCCESS;
            default:
                throw new \Exception();
        }
    }
}
