<?php


namespace App\Partners\Digiflazz;


class DigiflazzEnum
{
    public static $_00 = '00';
    public static $_01 = '01';
    public static $_02 = '02';
    public static $_03 = '03';
    public static $_40 = '40';
    public static $_41 = '41';
    public static $_42 = '42';
    public static $_43 = '43';
    public static $_44 = '44';
    public static $_45 = '45';
    public static $_46 = '46';
    public static $_47 = '47';
    public static $_49 = '49';
    public static $_50 = '50';
    public static $_51 = '51';
    public static $_52 = '52';
    public static $_53 = '53';
    public static $_54 = '54';
    public static $_55 = '55';
    public static $_56 = '56';
    public static $_60 = '60';
    public static $_61 = '61';
    public static $_62 = '62';
    public static $_63 = '63';
    public static $_64 = '64';
    public static $_65 = '65';
    public static $_66 = '66';
    public static $_67 = '67';
    public static $_68 = '68';
    public static $_99 = '99';

    public static $_statusSuccess = '00';
    public static $_statusPending = '03';
    public static $_statusPendingDFRouterIssue = '99';

    public static $whereSuccess = 'success';
    public static $wherePending = 'pending';
    public static $whereFailed= 'gagal';

    public static function where($status = '')
    {
        if (self::whereInSuccess($status)) {
            return 'success';
        } elseif (self::whereInPending($status)) {
            return 'pending';
        } elseif (self::whereInGagal($status)) {
            return 'gagal';
        }

        die('GAGAL, HARAP MENGHUBUNGI ADMIN, KODE ERROR 35001');
    }

    public static function whereInSuccess($status = '')
    {
        if ($status == '00') {
            return true;
        }

        return false;
    }

    public static function whereInPending($status = '')
    {
        $data = ['03', '99'];

        foreach ($data as $item) {
            if ($status == $item) {
                return true;
            }
        }

        return false;
    }

    public static function whereInGagal($status = '')
    {
        $data = ['00', '03', '99'];

        foreach ($data as $item) {
            if ($status == $item) {
                return false;
            }
        }

        return true;
    }

    public static function whereInFailed($status)
    {
        return self::whereInGagal($status);
    }
}
