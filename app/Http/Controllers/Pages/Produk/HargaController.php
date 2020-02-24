<?php

namespace App\Http\Controllers\Pages\Produk;

use App\Http\Controllers\Controller;
use App\JavaH2H\JavaH2HBuilder;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function pulsa()
    {
        $contents = [
            'Pulsa Reguler' => JavaH2HBuilder::make()
                ->getPulsa()
                ->groupBy()
                ->get(),
            'Pulsa Transfer' => JavaH2HBuilder::make()
                ->getPulsaTransfer()
                ->groupBy()
                ->get()
        ];

        return view('pages.harga.pulsa', compact('contents'));
    }

    public function voucherGame()
    {
        $contents = JavaH2HBuilder::make()
            ->getVoucherGame()
            ->groupBy()
            ->get();

        return view('pages.harga.voucher-game', compact('contents'));
    }

    public function pln()
    {
        $contents = JavaH2HBuilder::make()
            ->getPLN()
            ->get();

        return view('pages.harga.pln', compact('contents'));
    }

    public function internet()
    {
        $contents = JavaH2HBuilder::make()
            ->getInternet()
            ->groupBy()
            ->get();

        return view('pages.harga.internet', compact('contents'));
    }

    public function ewallet()
    {
        $contents = JavaH2HBuilder::make()
            ->getEwallet()
            ->groupBy()
            ->get();

        return view('pages.harga.ewallet', compact('contents'));
    }

    public function nelfonSms()
    {
        $contents = JavaH2HBuilder::make()
            ->getSmsDanTelepon()
            ->groupBy()
            ->get();

        return view('pages.harga.telepon-dan-sms', compact('contents'));
    }

    public function wifi()
    {
        $contents = JavaH2HBuilder::make()
            ->getWifi()
            ->get();

        return view('pages.harga.wifi', compact('contents'));
    }

    public function giftCard()
    {
        $contents = JavaH2HBuilder::make()
            ->getGiftCard()
            ->groupBy()
            ->get();

        return view('pages.harga.gift-card', compact('contents'));
    }
}
