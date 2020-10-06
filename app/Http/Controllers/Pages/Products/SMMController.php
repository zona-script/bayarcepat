<?php

namespace App\Http\Controllers\Pages\Products;

use App\Http\Controllers\Controller;
use App\Models\PanelProduct;
use Illuminate\Http\Request;

class SMMController extends Controller
{
    public function __invoke()
    {
        $panels = PanelProduct::orderBy('category', 'asc')
            ->distinct()
            ->get()
            ->groupBy('category');

        $products = [];
        foreach ($panels as $key => $product) {
            $temp['key'] = md5($key);
            $temp['name'] = $key;
            $temp['products'] = $product;
            $products[] = $temp;
        }

        return view('pages.products.smm', compact('products'));
    }
}
