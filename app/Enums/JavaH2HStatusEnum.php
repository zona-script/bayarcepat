<?php


namespace App\Enums;


class JavaH2HStatusEnum
{
    public static function make($status)
    {
        // <= 2:Gagal, 3:Refund, 4:Sukses

        if ($status == 0) {
            return 'Diproses';
        } elseif ($status == 2) {
            return 'Gagal';
        } elseif ($status == 3) {
            return 'Refund';
        } elseif ($status == 4) {
            return 'Sukses';
        }else {
            return 'tidak di kenal (harap menghubungi kami)';
        }
    }
}
