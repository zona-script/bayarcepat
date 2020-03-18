<?php

if (!function_exists('money_format_rupiah')) {
    function money_format_rupiah($money)
    {
        return number_format($money, 0, ".", ".");
    }
}

if (!function_exists('transaction_status_to_str')) {
    function transaction_status_to_str($status)
    {
        return \App\Enums\TransactionEnum::status($status);
    }
}
