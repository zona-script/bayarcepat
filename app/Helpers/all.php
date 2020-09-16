<?php

if (!function_exists('money_format_rupiah')) {
    function money_format_rupiah($money)
    {
        return number_format($money, 0, ".", ".");
    }
}

function number_format_rupiah($money)
{
    return money_format_rupiah($money);
}

if (!function_exists('transaction_status_to_str')) {
    function transaction_status_to_str($status)
    {
        return \App\Enums\TransactionEnum::status($status);
    }
}

if (!function_exists('get_all_http_method')) {
    function get_all_http_method($search = '')
    {
        $collections = [
            'GET', 'POST', 'PUT', 'PUTCH', 'DELETE'
        ];

        if (!blank($search)) {
            foreach ($collections as $collection) {
                if ($collection == $search) {
                    return true;
                }
            }

            return false;
        }

        return $collections;
    }
}


if (!function_exists('number_or_numeric_to_boolean')) {
    function number_or_numeric_to_boolean($value, $valid = false) {
        if (is_numeric($value)) {
            if ($value == 1 && $valid == true){
                return true;
            } else if($value > 0) {
                return true;
            }

            return false;
        }

        return false;
    }
}
