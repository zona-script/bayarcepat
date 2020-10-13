<?php

namespace App\Http\Controllers\Api\Products;

use App\Exceptions\LessBalanceException;
use App\Exceptions\ProductNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\PanelProduct;
use App\Services\SMM\Factories\SMMFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SocialMediaMarketingController extends Controller
{
    public function index(Request $request)
    {
        $panelProducts = PanelProduct::orderBy('category', 'asc')
            ->distinct()
            ->whereHas('providerPanel',  function (Builder $query) {
                $query->isActive();
            })
            ->isAvailable()
            ->get()
            ->groupBy('category');

        $categories = [];
        foreach ($panelProducts as $key => $product) {
            $temp['key'] = md5($key);
            $temp['name'] = $key;
            $temp['products'] = $product;
            $categories[] = $temp;
        }

        return $categories;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|string',
            'target' => 'required|string',
            'quantity' => 'required|string',
            'custom_comments' => 'nullable|string',
            'custom_link' => 'nullable|string',
        ]);

        $panelProduct = '';
        $smmProvider = '';

        try {
            SMMFactory::make($smmProvider)
                ->order($request);
        } catch (ProductNotFoundException $exception) {
            return response()->json([
                'status' => false,
                'message' => 'Produk tidak ditemukan, mohon menghubungi kami dengan isi pesan [[#ERROR829]].'
            ], 422);
        } catch (LessBalanceException $exception){
            return response()->json([
                'status' => false,
                'message' => 'Saldo anda tidak mencukupi.'
            ], 402);
        }
    }
}
