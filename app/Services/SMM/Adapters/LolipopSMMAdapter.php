<?php

namespace App\Services\SMM\Adapters;

use App\Enums\Balance;
use App\Enums\BalanceTitle;
use App\Enums\TransactionPanelEnum;
use App\Exceptions\LessBalanceException;
use App\Exceptions\ProductNotFoundException;
use App\Exceptions\SMMProviderRequestException;
use App\Models\Balances;
use App\Models\PanelProduct;
use App\Models\TransactionPanel;
use App\Services\Balance\BalanceFactory;
use App\Services\Transactions\TransactionSMM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function order(Request $request)
    {
        $product = PanelProduct::find($request->product_id);

        if (blank($product)) {
            throw new ProductNotFoundException();
        }

        if ($request->user()->balance < $product->price) {
            throw new LessBalanceException();
        }

        $transactionPanel = TransactionPanel::create([

        ]);

        $balance = BalanceFactory::make(
            $request->user(),
            Balance::OUT,
            $product->price,
            BalanceTitle::TRANSACTION_SMM,
            '',
            $transactionPanel->id,
        );

        $response = Http::asForm()
            ->post($this->provider->get_services_url, $this->authentication)->json();

        // JIKA TRANSAKSI tidak berhasil
        if (!$response['status']) {
            $balance = BalanceFactory::make(
                $request->user(),
                Balance::IN,
                $product->price,
                BalanceTitle::TRANSACTION_REFUND_SMM,
                '',
                $transactionPanel->id,
            );

            $transactionPanel->status = TransactionPanelEnum::ERROR;
            $transactionPanel->save();
        }


    }
}
