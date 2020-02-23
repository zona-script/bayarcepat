<?php


namespace App\JavaH2H;


use App\Enums\PriceEnum;
use App\Enums\RoleEnum;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JavaH2H
{
    protected $userID;
    protected $key;
    protected $secret;
    protected $liveUpdate;

    protected $endPoint = 'https://javah2h.com/api/connect/';

    public function __construct($liveUpdate = false)
    {
        $this->userID = getenv('JAVAH2H_USERID');
        $this->key = getenv('JAVAH2H_KEY');
        $this->secret = getenv('JAVAH2H_SECRET');
        $this->liveUpdate = $liveUpdate;
    }


    public function requestSaldoDeposit($bank = 'mandiri', $nominal)
    {
        return $this->request($this->endPoint, [
            'form_params' => [
                'inquiry' => 'D',
                'bank' => $bank,
                'nominal' => $nominal
            ]
        ]);
    }

    public function cekSaldo()
    {
        return $this->request($this->endPoint, [
            'form_params' => [
                'inquiry' => 'S'
            ]
        ]);
    }

    public function statusTransaksi($trxid)
    {
        return $this->request($this->endPoint, [
            'form_params' => [
                'inquiry' => 'STATUS',
                'trxid_api' => $trxid
            ]
        ]);
    }

    public function beliPulsa($code, $phone, $trxid, $sequence = 1)
    {
        return $this->request($this->endPoint, [
            'form_params' => [
                'inquiry' => 'I', // konstan
                'code' => $code, // kode produk
                'phone' => $phone, // nohp pembeli
                'trxid_api' => $trxid, // Trxid / Reffid dari sisi client
                'no' => $sequence, // untuk isi lebih dari 1x dlm sehari, isi urutan 1,2,3,4,dst
            ]
        ]);
    }

    public function beliPLN($code, $idCustomer, $phone_number = '', $trxid, $sequence = 1)
    {
        return $this->request($this->endPoint, [
            'form_params' => [
                'inquiry' => 'PLN', // konstan
                'code' => $code, // kode produk
                'idcust' => $idCustomer, // nomor meter atau id pln
                'trxid_api' => $trxid, // Trxid / Reffid dari sisi client
                'no' => $sequence, // untuk isi lebih dari 1x dlm sehari, isi urutan 2,3,4,dst
            ]
        ]);
    }


    public function getPulsa()
    {
        $pathName = 'pulsa.json';
        if ($this->liveUpdate) {
            $data =  $this->request($this->endPoint, [
                'form_params' => [
                    'inquiry' => 'HARGA',
                    'code' => 'PULSA'
                ]
            ]);
            $this->saveJson($pathName, $data);
            return $data;
        }

        return $this->readJson($pathName);
    }

    public function getPLN()
    {
        $pathName = 'pln.json';
        if ($this->liveUpdate) {
            $data =  $this->request($this->endPoint, [
                'form_params' => [
                    'inquiry' => 'HARGA',
                    'code' => 'PLN'
                ]
            ]);
            $this->saveJson($pathName, $data);
            return $data;
        }

        return $this->readJson($pathName);
    }

    public function getVoucherGame()
    {
        $pathName = 'game.json';
        if ($this->liveUpdate) {
            $data =  $this->request($this->endPoint, [
                'form_params' => [
                    'inquiry' => 'HARGA',
                    'code' => 'GAME'
                ]
            ]);
            $this->saveJson($pathName, $data);
            return $data;
        }

        return $this->readJson($pathName);
    }

    private function saveJson($name, $data)
    {

        if ($data['result'] == 'success') {
            Storage::disk('local')
                ->put($name, collect($data)->toJson());
        }
    }

    private function readJson($path)
    {
        $contents = Storage::disk('local')
            ->get($path);

        return collect(json_decode($contents));
    }

    private function request(string $url, array $body)
    {
        $bodyAndHeader = Arr::add($body, 'headers', $this->getHeader());
        $client = new Client([
            'Connection' => 'close',
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_FRESH_CONNECT => true,
        ]);
        $response = $client->request('POST', $url, $bodyAndHeader);
        unset($client);
        return collect(json_decode($response->getBody()));

        /*
         * By defauly we use Guzzle, a curl wrapper.
         * If you need use CURL without wrapper uncomment this.
         *
         * */
//        $data = $body['form_params'];
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->getHeaderString());
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        $result = json_decode(curl_exec($ch));
//        return collect($result);
    }

    private function getHeader()
    {
        return [
            'h2h-userid' => $this->userID,
            'h2h-key' => $this->key,
            'h2h-secret' => $this->secret,
        ];
    }

    private function getHeaderString()
    {
        return array(
            'h2h-userid: ' . $this->userID,
            'h2h-key: ' . $this->key, // lihat hasil autogenerate di member area
            'h2h-secret: ' . $this->secret, // lihat hasil autogenerate di member area
        );
    }
}
