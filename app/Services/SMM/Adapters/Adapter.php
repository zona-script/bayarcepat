<?php

namespace App\Services\SMM\Adapters;

use App\Models\PanelProduct;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

abstract class Adapter
{
    // authtentikasi
    protected $authentication = [
        'key' => ''
    ];

    // object smm panel provider
    protected $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function getProfile()
    {
        // minimal harus return balance;
        return [
            'balance' => '0'
        ];
    }

    public function getServices()
    {
        // formatnya harus
        $services = [
            [
                'service_id' => '',
                'name' => '',
                'price' => '',
                'min' => '',
                'max' => '',
                'category' => '',
                'note' => '',
            ]
        ];

        return $services;
    }

    public function syncServices()
    {
        $services = $this->getServices();

        foreach ($services as $service) {
            try {
                PanelProduct::create([
                    'provider_panel_id' => $this->provider->id,
                    'service_id' => $service['service_id'],
                    'name' => $service['name'],
                    'price' => $service['price'],
                    'min' => $service['min'],
                    'max' => $service['max'],
                    'category' => $service['category'],
                    'note' => $service['note'] ?? '',
                ]);
            } catch (QueryException $exception) {
                $panelProduct = PanelProduct::where('service_id', $service['service_id'])
                    ->where('provider_panel_id', $this->provider->id)
                    ->first();

                $panelProduct->price = $service['price'];
                $panelProduct->min = $service['min'];
                $panelProduct->max = $service['max'];
                $panelProduct->note = $service['note'] ?? '';
                $panelProduct->save();
            }
        }
    }

    // return harus ID
    public function order(Request $request)
    {

    }

    public function orderStatus($payload)
    {
    }
}
