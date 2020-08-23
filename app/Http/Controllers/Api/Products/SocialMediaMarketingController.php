<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\PanelProduct;
use Illuminate\Http\Request;

class SocialMediaMarketingController extends Controller
{
    public function index(Request $request)
    {
        $panelProducts = PanelProduct::orderBy('category', 'asc')
            ->distinct()
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
}
