<?php


namespace App\Enums;


use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class CurrencyRateEnum
{
    public static $fee = 750;

    public static function live($USD = 1)
    {
//        https://www.freeforexapi.com/api/live?pairs=USDIDR

        $client = new Client([
            'Connection' => 'close',
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_FRESH_CONNECT => true,
        ]);
        $response = $client->request('GET', 'https://www.freeforexapi.com/api/live?pairs=USDIDR');
        unset($client);

        $currency = json_decode($response->getBody())->rates->USDIDR->rate;
        $currency = ($currency - 200);

        return collect([
            'price' => $currency,
            'amount_usd' => $USD,
            'amount_idr_with_fee' => collect(self::fee($USD, $currency))['amount'],
            'amount_idr_without_fee' => self::withoutFee($currency, $USD),
            'fee_idr' => collect(self::fee($USD, $currency))['fee'],
        ]);
    }

    private static function withoutFee($currency, $usd)
    {
        return (int) ($currency * $usd);
    }

    public static function fee($usd = 1, $price)
    {
//        $usd = floor($usd);
//        $usd = ceil($usd);

        if ($usd >= 1 && $usd < 11) {
            return [
                'amount' => self::count(900, $usd, $price),
                'fee' => 900
            ];
        } else if ($usd >= 11 && $usd < 51) {
            return [
                'amount' => self::count(850, $usd, $price),
                'fee' => 850
            ];
        } else if ($usd >= 51 && $usd < 151) {
            return [
                'amount' => self::count(800, $usd, $price),
                'fee' => 800
            ];
        } else if ($usd >= 151 && $usd < 401) {
            return [
                'amount' => self::count(750, $usd, $price),
                'fee' => 750
            ];
        } else if ($usd >= 401 && $usd < 601) {
            return [
                'amount' => self::count(600, $usd, $price),
                'fee' => 600
            ];
        } else if ($usd >= 601 && $usd < 801) {
            return [
                'amount' => self::count(500, $usd, $price),
                'fee' => 500
            ];
        } else if ($usd >= 801 && $usd < 1001) {
            return [
                'amount' => self::count(400, $usd, $price),
                'fee' => 400
            ];
        } else {
            die('Transaksi GAGAL, Jumlah uang kurang atau lebih.');
        }
    }

    private static function count($fee, $usd, $price)
    {
        $withoutFee = self::withoutFee($price, $usd);
        $fee = ($fee * $usd);

        return ($withoutFee - $fee);
    }
}
