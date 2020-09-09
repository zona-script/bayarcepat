<?php

namespace App\Http\Controllers\Pages\Products;

use App\Http\Controllers\Controller;
use App\Services\Digiflazz\Buyer\DigiflazzBuyer;
use Illuminate\Http\Request;

class PostpaidController extends Controller
{
    public function __invoke()
    {
        $products = (new DigiflazzBuyer())->getPostpaid()->groupBy('brand')->get();

        return view('pages.products.postpaid', compact('products'));
    }
}
