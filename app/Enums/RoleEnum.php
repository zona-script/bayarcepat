<?php


namespace App\Enums;


class RoleEnum
{
    public static $roleAdmin = 'admin';
    public static $roleBuyer = 'buyer';
    public static $roleReseller = 'reseller';
    public static $roleDeveloper = 'developer';

    public static function getAdmin()
    {
        return [
            self::$roleAdmin
        ];
    }
    public static function getConsumer()
    {
        return [
            self::$roleBuyer
        ];
    }
    public static function getReseller()
    {
        return [
            self::$roleReseller
        ];
    }
    public static function getDeveloper()
    {
        return [
            self::$roleDeveloper
        ];
    }

    public static function getAll()
    {
        return [
            self::$roleAdmin,
            self::$roleBuyer,
            self::$roleDeveloper
        ];
    }
}
