<?php


namespace App\Enums;


use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class CurrencyRateEnum
{
    public static $fee = 750;

    public static function live()
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
        $result = [
            'live' => $currency,
            'live_with_fee' => ($currency - self::$fee)
        ];

        return $result;
    }
}
