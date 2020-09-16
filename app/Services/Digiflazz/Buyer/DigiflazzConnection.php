<?php
namespace App\Services\Digiflazz\Buyer;

use App\Traits\StorageServicesTrait;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class DigiflazzConnection
{
    use StorageServicesTrait;
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

    public function checkBalance()
    {
        $jsonBody = [
            "cmd" => "deposit",
            "username" => $this->username,
            "sign" => $this->signGenerate("depo")
        ];

        return $this->request('https://api.digiflazz.com/v1/cek-saldo', $jsonBody);
    }

    public function price($cmd = 'prepaid', $code = '')
    {
        $jsonBody = [
            "cmd" => $cmd,
            "username" => $this->username,
            "sign" => $this->signGenerate("pricelist")
        ];

        if (!blank($code)) {
            $jsonBody = Arr::add($jsonBody, 'code', $code);
        }


        $pathName = 'digiflazz-' . $cmd . '.json';
//        if ($this->existJson($pathName)) {
//            return $this->readJson($pathName);
//        }
        $data = $this->request('https://api.digiflazz.com/v1/price-list', $jsonBody);
        $this->saveJson($pathName, $data);

        return $data;
    }

    public function createDeposit($amount = '', $bank = 'MANDIRI', $ownerName)
    {
        $jsonBody = [
            "username" => $this->username,
            "amount" => $amount,
            "bank" => $bank,
            "owner_name" => $ownerName,
            "sign" => $this->signGenerate("deposit")
        ];

        return $this->request('https://api.digiflazz.com/v1/deposit', $jsonBody);
    }


    /*
     * Cek Tagihan
     * PLN, HP, INTERNET, BPJS KESEHATAN, MULTIFINANCE
     * */
    public function checkBillPostpaid($buyerSKUCode, $customerNumber, $refID, $testing = false)
    {
        $jsonBody = [
            "commands"=> "inq-pasca",
            "username" => $this->username,
            "buyer_sku_code	" => $buyerSKUCode,
            "customer_no" => $customerNumber,
            "ref_id" => $refID,
            "sign" => $this->signGenerate($refID)
        ];

        if ($testing) {
            $jsonBody = Arr::add($jsonBody, 'testing', $testing);
        }

        return $this->request('https://api.digiflazz.com/v1/transaction', $jsonBody);
    }

    public function buyPrepaid($buyerSKUCode, $customerNumber, $refID, $testing = false, $msg = '')
    {
//        $jsonBody = [
//            "username" => $this->username,
//            "buyer_sku_code	" => "xld10",
//            "customer_no" => "087800001230",
//            "ref_id" => "test1",
//            "sign" => $this->signGenerate("test1")
//        ];

        $jsonBody = [
            "username" => $this->username,
            "buyer_sku_code	" => $buyerSKUCode,
            "customer_no" => $customerNumber,
            "ref_id" => $refID,
            "sign" => $this->signGenerate($refID)
        ];

        if ($testing) {
            $jsonBody = Arr::add($jsonBody, 'testing', $testing);
        }

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

    // create sign signature
    protected function signGenerate($keyUniqueEndPoint, $force = false)
    {
        if ($force) {
            return $keyUniqueEndPoint;
        }

        return md5($this->username . $this->key . $keyUniqueEndPoint);
    }
}
