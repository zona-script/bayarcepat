<?php

namespace App\Partners\Digiflazz;

use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class Digiflazz
{
    protected $apiKey;
    protected $username;
    protected $sign='';

    public function __construct()
    {
        $this->key = config()->get('partner.digiflazz.key');
        $this->username = config()->get('partner.digiflazz.username');

        return $this;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getSign()
    {
        return $this->sign;
    }

    public function setSign(string $sign)
    {
        $this->sign = $sign;
        return $this;
    }

    public function cekSaldo()
    {
        $jsonBody = [
            "cmd" => "deposit",
            "username" => $this->username,
            "sign" => $this->signGenerate("depo")
        ];

        return $this->request('https://api.digiflazz.com/v1/cek-saldo', $jsonBody);
    }

    /*
     * Cek harga
     * prepaid or pasca */
    public function cekHarga($cmd = 'prepaid', $code = '')
    {
        $jsonBody = [
            "cmd" => $cmd,
            "username" => $this->username,
            "sign" => $this->signGenerate("pricelist")
        ];

        return $this->request('https://api.digiflazz.com/v1/price-list', $jsonBody);
    }

    public function cekHargaPrepaid($code = '')
    {
        return $this->cekHarga('prepaid', $code);
    }

    public function cekHargaPasca($code = '')
    {
        return $this->cekHarga('pasca', $code);
    }

    public function getPrabayar($code = '')
    {
        return $this->cekHarga('prepaid', $code);
    }

    public function getPascabayar($code = '')
    {
        return $this->cekHarga('pasca', $code);
    }

    public function deposit($amount, $bank, $ownerName)
    {
        $this->endPoint = $this->setEndPointAppend("deposit");
        $jsonBody = [
            "username" => $this->username,
            "amount" => $amount,
            "bank" => $bank,
            "owner_name" => $ownerName,
            "sign" => $this->signGenerate("deposit")
        ];

        return $this->request($this->endPoint, $jsonBody);
    }

    public function request($uri, $jsonBody)
    {
        $client = new Client([
            'Connection' => 'close',
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_FRESH_CONNECT => true,
        ]);
        $response = $client->request('POST', $uri, [
            'headers' => [
                'Accept' => 'application/json',
            ],
            'json' => $jsonBody
        ]);
        unset($client);
        return collect(json_decode($response->getBody()));
    }

    protected function signGenerate($keyUniqueEndPoint)
    {
        return md5($this->username.$this->key.$keyUniqueEndPoint);
    }
}
