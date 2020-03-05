<?php

namespace App\Enums;


class BayarCepatPayEnum
{
    public static $titleWithdrawal = 'Penarikan Saldo';
    public static $titleDeposit = 'Deposit Uang';
    public static $titleSendMoney = 'Pengiriman Uang';
    public static $titleRefund = 'Refund (Pengembalian) Uang';
    public static $titleProduct = 'Pembelian Produk';
    public static $titlePay = 'Pembayaran Transaksi';
    public static $titleMarket = 'Pembelian Produk Marketplace';
    public static $title = '';

    public static $typeIN = 1;
    public static $typeOUT = 2;
}
