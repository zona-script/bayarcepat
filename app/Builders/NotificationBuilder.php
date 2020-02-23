<?php


namespace App\Builders;


class NotificationBuilder
{
    public function __construct()
    {
    }

    public static function make()
    {
        return new BayarCepatBuilder();
    }
}
