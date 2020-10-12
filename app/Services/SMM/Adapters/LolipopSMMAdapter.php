<?php


namespace App\Services\SMM\Adapters;


use App\Exceptions\SMMProviderRequestException;
use Illuminate\Support\Facades\Http;

class LolipopSMMAdapter extends Adapter implements AdapterInterface
{
    protected $authentication = [
        'api_id' => '7623',
        'api_key' => '0f4140-66b39b-91920a-8895df-7a7bf9',
    ];

    public function getProfile(): array
    {
        $response = collect(json_decode(Http::asForm()
            ->post($this->provider->get_profile_url, $this->authentication)
            ->body()))
            ->toArray();

        if (!$response['status']) {
            throw new SMMProviderRequestException($response['data']);
        }

        return [
            'balance' => $response['data']->balance
        ];
    }

    public function getServices()
    {
        $response = Http::asForm()
            ->post($this->provider->get_services_url, $this->authentication)->json();

        if (!$response['status']) {
            throw new SMMProviderRequestException($response['data']);
        }

        $services = [];
        foreach ($response['data'] as $item) {
            $service = [];
            $service['service_id'] = $item['id'];
            $service['name'] = $item['name'];
            $service['price'] = $item['price'];
            $service['min'] = $item['min'];
            $service['max'] = $item['max'];
            $service['category'] = $item['category'];
            $service['note'] = $item['description'];

            $services[] = $service;
        }

        return $services;
    }
}
