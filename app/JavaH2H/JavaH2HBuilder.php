<?php

namespace App\JavaH2H;

use App\JavaH2H\Reformat\Game;
use App\JavaH2H\Reformat\ReformatInterace;

class JavaH2HBuilder
{
    protected $javaH2H;

    public static function make($liveUpdate = false)
    {
        return new self($liveUpdate);
    }

    public function __construct($liveUpdate = false)
    {
        $this->javaH2H = new JavaH2H($liveUpdate);
    }

    public function getPulsa()
    {
        return FormatFactory::createPulsa($this->javaH2H->getPulsa());
    }

    public function getPLN()
    {
        return FormatFactory::createPLN($this->javaH2H->getPLN());
    }

    public function getVoucherGame()
    {
        return FormatFactory::createGame($this->javaH2H->getVoucherGame());
    }

    public function getInternet()
    {
        return FormatFactory::createInternet($this->javaH2H->getPulsa());
    }

    public function getEwallet()
    {
        return FormatFactory::createEwallet($this->javaH2H->getPulsa());
    }

    public function getSmsDanTelepon()
    {
        return FormatFactory::createSmsDanTelepon($this->javaH2H->getPulsa());
    }

    public function getPulsaTransfer()
    {
        return FormatFactory::createPulsaTransfer($this->javaH2H->getPulsa());
    }

    public function getWifi()
    {
        return FormatFactory::createWifi($this->javaH2H->getPulsa());
    }

    public function getGiftCard()
    {
        return FormatFactory::createGiftCard($this->javaH2H->getPulsa());
    }

    public function findPulsa($productCode)
    {
        $data = collect($this->getPulsa()->getDataRaw())
            ->where('code', $productCode)
            ->values()
            ->first();

        return $data;
    }


    public function findPLN($productCode)
    {
        $data = collect($this->getPLN()->getDataRaw())
            ->where('code', $productCode)
            ->values()
            ->first();

        return $data;
    }


    public function findVoucherGame($productCode)
    {
        $data = collect($this->getVoucherGame()->getDataRaw())
            ->where('code', $productCode)
            ->values()
            ->first();

        return $data;
    }

    public function buyPulsa($code, $phone, $trxid, $sequence = 1)
    {
        return $this->javaH2H->beliPulsa($code, $phone, $trxid, $sequence);
    }

    public function buyPLN($code, $idCustomer, $phoneNumber = '', $trxid, $sequence = 1)
    {
        return $this->javaH2H->beliPLN($code, $idCustomer, $phoneNumber, $trxid, $sequence);
    }

    public function buyGame($code, $phone, $trxid, $sequence = 1)
    {
        die('Belum Bisa Digunakan.');
       return 'Belum Bisa';
    }

    public function getSaldo()
    {
        return $this->javaH2H->cekSaldo();
    }

    public function getJavaH2H()
    {
        return $this->javaH2H;
    }
}
