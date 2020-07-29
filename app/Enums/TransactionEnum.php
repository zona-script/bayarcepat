<?php


namespace App\Enums;


use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class TransactionEnum
{
    public static $categoryMarket = 1;
    public static $categoryProduct = 2;
    public static $categoryMarketDigital = 3;
    public static $categoryPayment = 4;

    public static $typeProduct = 1;
    public static $typeBayarCepatPayDeposit = 2;
    public static $typeBayarCepatPaySendMoney = 3;
    public static $typeBayarCepatPayReceiveMoney = 8;
    public static $typeBayarCepatPayWithdrawal = 4;
    public static $typeBayarCepatPayRefund = 5;
    public static $typeBayarCepatPayPay = 6;
    public static $typeMarket = 7;

    public static $statusProcess = 1;
    public static $statusCancel = 2;
    public static $statusSuccess = 3;
    public static $statusRefund = 4;
    public static $statusWaitingPayment = 5;
    public static $statusFailed = 6;
    public static $statusWaitingConfirmation = 7;

    public static function status($number)
    {
        if ($number == self::$statusProcess) {
            return 'sedang di proses';
        }else if ($number == self::$statusCancel){
            return 'dibatalkan';
        }else if ($number == self::$statusSuccess){
            return 'sukses';
        }else if ($number == self::$statusRefund){
            return 'dikembalikan (refund)';
        }else if ($number == self::$statusWaitingPayment){
            return 'menunggu pembayaran';
        }else if ($number == self::$statusFailed){
            return 'Gagal (failed)';
        }else if ($number == self::$statusWaitingConfirmation){
            return 'Admin Sedang melakukan konfirmasi';
        }else {
            return 'tidak di ketahui (harap hubungi kami)';
        }
    }

    public static function type($number)
    {
        if ($number == self::$typeProduct) {
            return BayarCepatPayEnum::$titleProduct;
        } else if ($number == self::$typeBayarCepatPayDeposit){
            return BayarCepatPayEnum::$titleDeposit;
        } else if ($number == self::$typeBayarCepatPaySendMoney){
            return BayarCepatPayEnum::$titleSendMoney;
        } else if ($number == self::$typeBayarCepatPayReceiveMoney){
            return BayarCepatPayEnum::$titleReceiveMoney;
        } else if ($number == self::$typeBayarCepatPayWithdrawal){
            return BayarCepatPayEnum::$titleWithdrawal;
        } else if ($number == self::$typeBayarCepatPayRefund){
            return BayarCepatPayEnum::$titleRefund;
        } else if ($number == self::$typeBayarCepatPayPay){
            return BayarCepatPayEnum::$titlePay;
        } else if ($number == self::$typeMarket){
            return BayarCepatPayEnum::$titleMarket;
        } else {
            return 'tidak di ketahui (harap hubungi kami)';
        }
    }

    public static function makeForProduct($phoneNumber, $product, $returnJson = false, $id_customer = '')
    {
        $data = [
            'phone_number' => $phoneNumber,
            'product' => $product
        ];

        if (!blank($id_customer)) {
            $data = Arr::add($data, 'id_customer', $id_customer);
        }

        if ($returnJson) {
            return json_encode($data);
        }

        return $data;
    }

    public static function makeDepositInformation($bank, $userBank, $type = 'bank', $fee = null)
    {
        return [
            'bank' => $bank,
            'user_bank' => $userBank,
            'type' => $type,
            'fee' => $fee
        ];
    }

    public function makeMarket($phoneNumber, $product, $type = 'prabayar')
    {
        $data = [
            'phone_number' => $phoneNumber,
            'product' => $product
        ];

        if (!blank($type)) {
            $data = Arr::add($data, 'type', $type);
        }

        return $data;
    }
}
