<?php


namespace App\JavaH2H;


use App\JavaH2H\Reformat\Ewallet;
use App\JavaH2H\Reformat\Game;
use App\JavaH2H\Reformat\GiftCard;
use App\JavaH2H\Reformat\Internet;
use App\JavaH2H\Reformat\OjekOnline;
use App\JavaH2H\Reformat\Pln;
use App\JavaH2H\Reformat\Pulsa;
use App\JavaH2H\Reformat\PulsaTransfer;
use App\JavaH2H\Reformat\ReformatInterace;
use App\JavaH2H\Reformat\SmsDanTelepon;
use App\JavaH2H\Reformat\Wifi;

class FormatFactory
{
    public static function createGame($data)
    {
        return new Game($data);
    }

    public static function createPulsa($data)
    {
        return new Pulsa($data);
    }

    public static function createPLN($data)
    {
        return new Pln($data);
    }

    public static function createInternet($data)
    {
        return new Internet($data);
    }


    public static function createEwallet($data)
    {
        return new Ewallet($data);
    }

    public static function createSmsDanTelepon($data)
    {
        return new SmsDanTelepon($data);
    }

    public static function createPulsaTransfer($data)
    {
        return new PulsaTransfer($data);
    }

    public static function createWifi($data)
    {
        return new Wifi($data);
    }

    public static function createGiftCard($data)
    {
        return new GiftCard($data);
    }
}
