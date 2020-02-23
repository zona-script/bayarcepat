<?php

namespace App\Http\Controllers\Api\Harga;

use App\Http\Controllers\Controller;
use App\JavaH2H\JavaH2HBuilder;
use Illuminate\Http\Request;

class HargaController extends Controller
{

    public function index()
    {
        return [
            'success' => true,
            'message' => 'gunakan /nama-produk '
        ];
    }

    public function pulsa()
    {
        return JavaH2HBuilder::make()
            ->getPulsa()
            ->groupBy()
            ->get();
    }

    public function voucherGame()
    {
        return JavaH2HBuilder::make()
            ->getVoucherGame()
            ->groupBy()
            ->get();
    }

    public function pln()
    {
        $result = JavaH2HBuilder::make()
            ->getPLN()
            ->get();

        return response()
            ->json($result);
    }

    public function internet()
    {
        return JavaH2HBuilder::make()
            ->getInternet()
            ->groupBy()
            ->get();
    }

    public function ewallet()
    {
        return JavaH2HBuilder::make()
            ->getEwallet()
            ->groupBy()
            ->get();
    }

    public function smsdanTelepon()
    {
        return JavaH2HBuilder::make()
            ->getSmsDanTelepon()
            ->groupBy()
            ->get();
    }

    public function pulsaTransfer()
    {
        return JavaH2HBuilder::make()
            ->getPulsaTransfer()
            ->groupBy()
            ->get();
    }

    public function wifi()
    {
        return JavaH2HBuilder::make()
            ->getWifi()
            ->get();
    }

    public function giftCard()
    {
        return JavaH2HBuilder::make()
            ->getGiftCard()
            ->groupBy()
            ->get();
    }
}
