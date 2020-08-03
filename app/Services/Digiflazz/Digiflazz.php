<?php

namespace App\Services\Digiflazz\Buyer;

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

        if (!blank($code)) {
            $jsonBody = Arr::add($jsonBody, 'code', $code);
        }

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


    /*
     * Cek Tagihan
     * PLN, HP, INTERNET, BPJS KESEHATAN, MULTIFINANCE
     * */

    public function cekTagihan($buyerSKUCode, $customerNumber, $refID)
    {
        $jsonBody = [
            "commands"=> "inq-pasca",
            "username" => $this->username,
            "buyer_sku_code	" => $buyerSKUCode,
            "customer_no" => $customerNumber,
            "ref_id" => $refID,
//            "sign" => $this->signGenerate("ref_id")
            "sign" => $this->signGenerate($refID)
        ];

        return $this->request('https://api.digiflazz.com/v1/transaction', $jsonBody);
    }

    public function cekTagihanPLN($buyerSKUCode, $customerNumber, $refID = '')
    {
        return $this->cekTagihan($buyerSKUCode, $customerNumber, $refID);
    }

    public function cekTagihanPDAM($buyerSKUCode, $customerNumber, $refID = '')
    {
        return $this->cekTagihan($buyerSKUCode, $customerNumber, $refID);
    }

    public function cekTagihanHP($buyerSKUCode, $customerNumber, $refID = '')
    {
        return $this->cekTagihan($buyerSKUCode, $customerNumber, $refID);
    }

    public function cekTagihanInternet($buyerSKUCode, $customerNumber, $refID = '')
    {
        return $this->cekTagihan($buyerSKUCode, $customerNumber, $refID);
    }

    public function cekTagihanBPJSKesehatan($buyerSKUCode, $customerNumber, $refID = '')
    {
        return $this->cekTagihan($buyerSKUCode, $customerNumber, $refID);
    }

    public function cekTagihanMultifinance($buyerSKUCode, $customerNumber, $refID = '')
    {
        return $this->cekTagihan($buyerSKUCode, $customerNumber, $refID);
    }

    /* *
     * BELI
     * referensi: https://developer.digiflazz.com/api/buyer/topup/
     * */
    public function beli($buyerSKUCode, $customerNumber, $refID, $msg = '')
    {
        $jsonBody = [
            "username" => $this->username,
            "buyer_sku_code	" => "xld10",
            "customer_no" => "087800001230",
            "ref_id" => "test1",
            "sign" => $this->signGenerate("test1")
        ];

//        $jsonBody = [
//            "username" => $this->username,
//            "buyer_sku_code	" => $buyerSKUCode,
//            "customer_no" => $customerNumber,
//            "ref_id" => $refID,
////            "sign" => $this->signGenerate("ref_id")
//            "sign" => $this->signGenerate($refID)
//        ];

        if (!blank($msg)) {
            $jsonBody = Arr::add($jsonBody, 'msg', $msg);
        }

        return $this->request('https://api.digiflazz.com/v1/transaction', $jsonBody);
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

    protected function signGenerate($keyUniqueEndPoint, $force = false)
    {
        if ($force) {
            return $keyUniqueEndPoint;
        }
        return md5($this->username . $this->key . $keyUniqueEndPoint);
    }
}
