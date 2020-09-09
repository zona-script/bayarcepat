<?php


namespace App\Services\SocialMediaMarketing;


use Illuminate\Support\Facades\Http;

class SocialMediaMarketing implements SocialMediaMarketingInterface
{
    protected $provider;
    protected string $apiKey;
    protected string $apiId;
    protected $response;

    protected $type = 'order';

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    protected function data()
    {
        $headers = [];
        $url = '';
        $data = [
            'api_id' => '',
            'api_key' => '',
            'id' => ''
        ];

        $this->request($headers, $url, $data);
    }

    protected function appendHeader($headers = [])
    {

    }

    protected function request($headers, $url, $data)
    {
        $this->response = Http::withHeaders($headers)
                ->post($url, $data);
    }

    public function result()
    {

    }
}
