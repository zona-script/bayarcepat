<?php

if (!function_exists('money_format_rupiah')) {
    function money_format_rupiah($money)
    {
        return number_format($money, 0, ".", ".");
    }
}
