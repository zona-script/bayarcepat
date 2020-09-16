<?php


namespace App\Services\SocialMediaMarketing;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

abstract class Base implements SocialMediaMarketingInterface
{
    protected $provider;
    protected $providerArray;
    public function __construct($provider)
    {
        $this->provider = $provider;
        $this->providerArray = collect($this->provider)->toArray();
    }

    public function request($url, $payload, $method)
    {
        $method = Str::upper($method);
        switch ($method) {
            case 'GET':
                $response = Http::asForm()
                    ->get($url, $payload);
                break;
            case 'POST':
                $response = Http::asForm()
                    ->post($url, $payload);
                break;
            case 'PUT':
                $response = Http::asForm()
                    ->put($url, $payload);
                break;
            case 'PATCH':
                $response = Http::asForm()
                    ->patch($url, $payload);
                break;
            case 'DELETE':
                $response = Http::asForm()
                    ->delete($url, $payload);
                break;
            default:
                $response = Http::asForm()
                    ->post($url, $payload);
        }

        return $response;
    }
}
