<?php


namespace App\Services\SocialMediaMarketing;


use Illuminate\Support\Facades\Http;

class SMMConnection
{
    protected $providerPanel;
    public function __construct($providerPanel)
    {
        $this->providerPanel = $providerPanel;
    }


    protected function connection($data)
    {
        return Http::asForm()->post($this->endpoint, $data);
    }
}
